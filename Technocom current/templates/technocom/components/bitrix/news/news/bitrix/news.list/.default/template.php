<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?if($arParams["USE_CATEGORIES"]=="Y"):?>
  <?foreach($arParams["SECTIONS"] as $section):$i=0;?>
    <div class="d_text">
      <h2 id="section-<?=$section["ID"]?>"><?=$section["NAME"]?></h2>
      <div class="news-list">
        <?foreach($arResult["ITEMS"] as $arKey => $arItem):if($arItem["IBLOCK_SECTION_ID"]==$section["ID"]):$i++;?>
          <?
          $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
          $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
          ?>
          <div class="d_preview" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
            <?if(isset($arItem["PREVIEW_PICTURE"])):?><div class="d_forimg"><img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=$arItem["NAME"]?>" /></div><?endif;?>
            <div class="d_fotext">
              <h2><a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem["NAME"]?></a></h2>
              <span><?=$arItem["PREVIEW_TEXT"]?></span>
            </div>
          </div>
          <div class="clearfix"></div>
        <?unset($arResult["ITEMS"][$arKey]);endif;endforeach;?>
        <?if($i==0):?><p style="margin-top: 80px;">Раздел пуст</p><?endif;?>
      </div>
    </div>
  <?endforeach;?>
<?else:?>
  <div class="d_text">
    <div class="news-list">
      <?if(empty($arResult["ITEMS"])):?>
        <p>Список пуст</p>
      <?else:?>
        <?foreach($arResult["ITEMS"] as $arItem):?>
          <?
          $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
          $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
          ?>
          <div class="d_preview" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
            <?if(isset($arItem["PREVIEW_PICTURE"])):?><div class="d_forimg"><img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=$arItem["NAME"]?>" /></div><?endif;?>
            <div class="d_fotext">
              <h2><a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem["NAME"]?></a></h2>
              <span><?=$arItem["PREVIEW_TEXT"]?></span>
            </div>
          </div>
          <div class="clearfix"></div>
        <?endforeach;?>
        <?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
          <br /><?=$arResult["NAV_STRING"]?>
        <?endif;?>
      <?endif;?>
    </div>
  </div>
<?endif;?>