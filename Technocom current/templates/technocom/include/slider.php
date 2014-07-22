<?if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();?>
<?
$cache = new CPageCache();
$cache_time = 86400;
$cache_id = "slider";
$cache_path = '/slider/';
if ($cache_time > 0 &&
    $cache->InitCache($cache_time, $cache_id, $cache_path)) {
  $cache->Output();
} else {
  CModule::IncludeModule("iblock");
  $result = CIBlockElement::GetList(
    Array("ID"=>"DESC"),
    Array(
      "IBLOCK_ID"=>17,
      "ACTIVE"=>"Y"
    ),
    false,
    false,
    Array()
  );
  while ($row = $result->Fetch()) $slider[] = $row;
  $cache->StartDataCache($cache_time, $cache_id, $cache_path);
?>
    <div class="main-slider">
      <div class="main-slider__pic cycle-slideshow" data-cycle-fx="scrollHorz" data-cycle-timeout="0" data-cycle-next=".main-slider__next" data-cycle-pager=".main-slider__pager" data-cycle-pager-template="<button></button" data-cycle-pager-active-class="is-active">
        <?foreach($slider as $slide):?>
          <img src="<?=CFile::GetPath($slide["PREVIEW_PICTURE"]);?>" alt="">
        <?endforeach;?>
      </div>
      <div class="main-slider__block">
        <div class="main-slider__pager"></div>
        <div class="main-slider__list cycle-slideshow" data-cycle-fx="scrollHorz" data-cycle-timeout="0" data-cycle-next=".main-slider__next" data-cycle-slides=".main-slider__item" data-cycle-pager=".main-slider__pager" data-cycle-pager-template="">
          <?foreach($slider as $slide):?>
            <div class="main-slider__item">
              <div class="main-slider__title"><a href="<?=$slide["CODE"];?>"><?=$slide["NAME"];?></a></div>
              <div class="main-slider__text"><?=$slide["PREVIEW_TEXT"];?></div>
            </div>
          <?endforeach;?>
        </div>
      </div>
    </div>
<?
  $cache->EndDataCache();
}
?>