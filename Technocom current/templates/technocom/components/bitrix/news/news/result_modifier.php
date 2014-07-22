<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
if (CHTTP::GetLastStatus() == "404 Not Found") require $_SERVER["DOCUMENT_ROOT"]."/404.php";
$level = count(explode("/", trim($APPLICATION->GetCurPage(), "/")));
$arResult["SECTIONS"] = array();
if ($arParams["USE_CATEGORIES"]=="Y" && $level == 1) {
  $cache = new CPHPCache();
  $cache_time = 86400;
  $cache_id = "articlesSections";
  $cache_path = "/articlesSections/";
  if ($cache->InitCache($cache_time, $cache_id, $cache_path)) {
    $result = $cache->GetVars();
    if (is_array($result["articlesSections"])
      && (count($result["articlesSections"]) > 0))
        $sections = $result["articlesSections"];
  }
  if (!is_array($sections)) {
    CModule::IncludeModule("iblock");
    $result = CIBlockSection::GetList(
      Array(
        "NAME"=>"ASC"
      ),
      Array(
        "IBLOCK_ID"=>$arParams["IBLOCK_ID"],
        "ACTIVE"=>"Y"
      )
    );
    $sections = array();
    while ($row = $result -> Fetch()) $sections[] = $row;
    $cache->StartDataCache($cache_time, $cache_id, $cache_path);
    $cache->EndDataCache(array("articlesSections"=>$sections));
  }
  $arResult["SECTIONS"] = $sections;
}
?>
