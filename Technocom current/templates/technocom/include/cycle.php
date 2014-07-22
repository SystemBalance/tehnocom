<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
  die();

CModule::IncludeModule("iblock");

$RUBRIC_ID
  = isset($RUBRIC_ID) ? $RUBRIC_ID : 0;
$CAPTION_TYPE
  = isset($CAPTION_TYPE) ? $CAPTION_TYPE : "BG";
$CAPTION_NAME
  = isset($CAPTION_NAME) ? $CAPTION_NAME : "Лучшие продажи";

$sections = array();
$products = array();

$pArOrder = array(
  "rand"=>true
);
$pArFilter = array("ACTIVE" => "Y");
$pArGroupBy = false;
$pArNavStartParmas = array();
$pArSelectFields = array(
  "ID",
  "NAME",
  "IBLOCK_SECTION_ID",
  "PREVIEW_PICTURE",
  "PROPERTY_PRICE1",
  "PROPERTY_PRICE2",
  "PROPERTY_PRICE3",
  "PROPERTY_PRICE4",
  "PROPERTY_ARTICLE"
);
if ($RUBRIC_ID != 0) $pArFilter["SECTION_ID"] = $RUBRIC_ID;
else $pArFilter["PROPERTY_TOP_VALUE"] = 1;

$sArOrder = array();
$sArFilter = array(
  "ACTIVE" => "Y",
  "IBLOCK_ID" => 13
);
$sBIncCnt = false;
$sSelect = array();
$sNavStartParams = false;

$result = CIBlockSection::GetList(
  $sArOrder,
  $sArFilter,
  $sBIncCnt,
  $sSelect,
  $sNavStartParams
);
while ($row= $result -> Fetch()) $sections[$row["ID"]] = $row;

$result = CIBlockElement::GetList(
  $pArOrder,
  $pArFilter,
  $pArGroupBy,
  $pArNavStartParmas,
  $pArSelectFields
);
while ($row = $result -> Fetch()) {
  $section = $sections[$row["IBLOCK_SECTION_ID"]];
  if ($sections[$row["IBLOCK_SECTION_ID"]]["DEPTH_LEVEL"] == 2)
    $section = $sections[$sections[$row["IBLOCK_SECTION_ID"]]["IBLOCK_SECTION_ID"]];
  $row["URL"] = "/catalog/" . $section["CODE"] . "/" . $row["ID"] . "/";
  $products[] = $row;
}

if (empty($products)) return false;

switch ($CAPTION_TYPE) {
  case 'BG':
    echo "<div class=\"title-bg\">$CAPTION_NAME</div>";
    break;
  case 'LINE-BLUE':
    echo "<div class=\"title-line blue\"><span>$CAPTION_NAME</span></div>";
    break;
  case 'LINE-YELLOW';
    echo "<div class=\"title-line yellow\"><span>$CAPTION_NAME</span></div>";
    break;
}

?>
<div class="slider js-slider">
  <div class="x_slider">
    <div class="slider__list">
      <?foreach($products as $product):?>
      <div class="slider__item">
        <div class="product">
          <div class="product__pic">
            <a href="<?=$product["URL"]?>">
              <img src="<?=CFile::GetPath($product["PREVIEW_PICTURE"])?>" alt="<?=$product["NAME"]?>">
            </a>
          </div>
          <div class="product__title"><?=$product["NAME"]?></div>
          <div class="product__code">арт. <?=$product["PROPERTY_ARTICLE_VALUE"]?></div>
          <div class="product__details">
            <div class="product__price"><?=$product["PROPERTY_PRICE1_VALUE"]?> <i class="icon-rub"></i></div>
            <div class="product__buy">
              <a class="btn btn_small btn_green" href="#">Купить</a>
            </div>
          </div>
        </div>
      </div>
      <?endforeach;?>
    </div>
  </div>
  <button class="slider__prev"></button>
  <button class="slider__next"></button>
</div>