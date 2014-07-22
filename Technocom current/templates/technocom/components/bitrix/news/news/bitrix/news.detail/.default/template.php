<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="news-detail">
  <div class="d_titles">
    <h1><?=$arResult["NAME"]?></h1>
    <?if(isset($arResult["DISPLAY_PROPERTIES"]["H2"]["VALUE"])):?><h2><?=$arResult["DISPLAY_PROPERTIES"]["H2"]["VALUE"]?></h2><?endif;?>
    <p><?=$arResult["PREVIEW_TEXT"]?></p>
  </div>
  <div class="d_textwrapper2">
    <div class="d_textimg">
      <?$i=0;foreach($arResult["DISPLAY_PROPERTIES"]["IMAGES"]["FILE_VALUE"] as $image):$i++;?>
        <?if($i>1):?><div class="d_emptyspace"></div><?endif;?>
        <img src="<?=$image["SRC"]?>"<?if(isset($image["DESCRIPTION"])):?> alt="<?=$image["DESCRIPTION"]?>"<?endif;?> />
        <?if(isset($image["DESCRIPTION"])):?><div><?=$image["DESCRIPTION"]?></div><?endif;?>
      <?endforeach;?>
    </div>
    <div class="d_article">
      <?=$arResult["DETAIL_TEXT"]?>
      <div class="clearfix"></div>
      <a style="display: block; float: right; margin-top: 100px;" href="<?=$arParams["IBLOCK_URL"]?>">Вернуться к списку <?=$arParams["BACK_LINK_TITLE"]?></a>
      <div class="clearfix"></div>
    </div>
  </div>
</div>