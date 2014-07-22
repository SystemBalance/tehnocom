<?if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();?>
<?
$cache = new CPageCache();
$cache_time = 86400;
$cache_id = "production";
$cache_path = "/production/";
if ($cache_time > 0 &&
    $cache->InitCache($cache_time, $cache_id, $cache_path)) {
  $cache->Output();
} else {
  CModule::IncludeModule("iblock");
  $result = CIBlockElement::GetList(
    Array("ID"=>"DESC"),
    Array(
      "IBLOCK_ID"=>18,
      "ACTIVE"=>"Y"
    ),
    false,
    false,
    Array()
  );
  $partners = array();
  while ($row = $result->Fetch()) $partners[] = $row;
  $cache->StartDataCache($cache_time, $cache_id, $cache_path);
?>
<div class="title-line"><span>Продукция от мировых производителей</span></div>
<div class="brands">
  <div class="brands__text">Оригинальная продукция с заводов-производителей, подбор аналогов по кодам и артикулам, консультации от профильных специалистов.</div>
  <div class="brands__slider">
    <div class="brands__list cycle-slideshow"
         data-cycle-fx="carousel"
         data-cycle-timeout="0"
         data-cycle-next=".brands__next"
         data-cycle-prev=".brands__prev"
         data-cycle-slides=".brands__item"
         data-cycle-carousel-visible="4">
<?foreach($partners as $partner):?>
      <div class="brands__item"><a href="<?=$partner["CODE"];?>"><img src="<?=CFile::GetPath($partner["PREVIEW_PICTURE"]);?>" alt="<?=$partner["NAME"];?>"></a></div>
<?endforeach;?>
    </div>
    <button class="brands__prev"></button>
    <button class="brands__next"></button>
  </div>
</div>
<?
  $cache->EndDataCache();
}
?>