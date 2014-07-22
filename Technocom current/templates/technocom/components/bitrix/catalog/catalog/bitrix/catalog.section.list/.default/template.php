<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);

$arViewModeList = $arResult['VIEW_MODE_LIST'];

$arViewStyles = array(
	'LIST' => array(
		'CONT' => 'bx_sitemap',
		'TITLE' => 'bx_sitemap_title',
		'LIST' => 'bx_sitemap_ul',
	),
	'LINE' => array(
		'CONT' => 'bx_catalog_line',
		'TITLE' => 'bx_catalog_line_category_title',
		'LIST' => 'bx_catalog_line_ul',
		'EMPTY_IMG' => $this->GetFolder().'/images/line-empty.png'
	),
	'TEXT' => array(
		'CONT' => '',
		'TITLE' => 'bx_catalog_text_category_title',
		'LIST' => 'domtabs js-tabs'
	),
	'TILE' => array(
		'CONT' => 'bx_catalog_tile',
		'TITLE' => 'bx_catalog_tile_category_title',
		'LIST' => 'bx_catalog_tile_ul',
		'EMPTY_IMG' => $this->GetFolder().'/images/tile-empty.png'
	)
);
$arCurView = $arViewStyles[$arParams['VIEW_MODE']];

$strSectionEdit = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_EDIT");
$strSectionDelete = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_DELETE");
$arSectionDeleteParams = array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM'));

?><?
if ('Y' == $arParams['SHOW_PARENT_NAME'] && 0 < $arResult['SECTION']['ID'])
{
	$this->AddEditAction($arResult['SECTION']['ID'], $arResult['SECTION']['EDIT_LINK'], $strSectionEdit);
	$this->AddDeleteAction($arResult['SECTION']['ID'], $arResult['SECTION']['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);

	?>
  <div class="d_space"></div>
  <div class="title-line"><span><h1
        id="<? echo $this->GetEditAreaId($arResult['SECTION']['ID']); ?>"
        ><?
        echo (
        isset($arResult['SECTION']["IPROPERTY_VALUES"]["SECTION_PAGE_TITLE"]) && $arResult['SECTION']["IPROPERTY_VALUES"]["SECTION_PAGE_TITLE"] != ""
          ? $arResult['SECTION']["IPROPERTY_VALUES"]["SECTION_PAGE_TITLE"]
          : $arResult['SECTION']['NAME']
        );
        ?></h1></span></div>
  <div class="d_decription2"><?=$arResult['SECTION']['DESCRIPTION']?></div>
  <?
}
if (0 < $arResult["SECTIONS_COUNT"])
{
?>
<?if($arParams['VIEW_MODE']!='TILE'):?><ul class="<? echo $arCurView['LIST']; ?>"><?else:?><div class="d_catalog"><?endif;?>
<?
	switch ($arParams['VIEW_MODE'])
	{
		case 'LINE':
			foreach ($arResult['SECTIONS'] as &$arSection)
			{
				$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
				$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);

				if (false === $arSection['PICTURE'])
					$arSection['PICTURE'] = array(
						'SRC' => $arCurView['EMPTY_IMG'],
						'ALT' => (
							'' != $arSection["IPROPERTY_VALUES"]["SECTION_PICTURE_FILE_ALT"]
							? $arSection["IPROPERTY_VALUES"]["SECTION_PICTURE_FILE_ALT"]
							: $arSection["NAME"]
						),
						'TITLE' => (
							'' != $arSection["IPROPERTY_VALUES"]["SECTION_PICTURE_FILE_TITLE"]
							? $arSection["IPROPERTY_VALUES"]["SECTION_PICTURE_FILE_TITLE"]
							: $arSection["NAME"]
						)
					);
				?><li id="<? echo $this->GetEditAreaId($arSection['ID']); ?>">
				<a
					href="<? echo $arSection['SECTION_PAGE_URL']; ?>"
					class="bx_catalog_line_img"
					style="background-image: url(<? echo $arSection['PICTURE']['SRC']; ?>);"
					title="<? echo $arSection['PICTURE']['TITLE']; ?>"
				></a>
				<h2 class="bx_catalog_line_title"><a href="<? echo $arSection['SECTION_PAGE_URL']; ?>"><? echo $arSection['NAME']; ?></a><?
				if ($arParams["COUNT_ELEMENTS"])
				{
					?> <span>(<? echo $arSection['ELEMENT_CNT']; ?>)</span><?
				}
				?></h2><?
				if ('' != $arSection['DESCRIPTION'])
				{
					?><p class="bx_catalog_line_description"><? echo $arSection['DESCRIPTION']; ?></p><?
				}
				?><div style="clear: both;"></div>
				</li><?
			}
			unset($arSection);
			break;
		case 'TEXT':
      $i = 0;
			foreach ($arResult['SECTIONS'] as &$arSection)
			{
        $i++;
				$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
				$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);

				?><li><a href="#t<?=$arSection['ID']?>"<?if($i==1)echo " class=\"d_activetab\"";?>><? echo $arSection['NAME']; ?></a><?
				if ($arParams["COUNT_ELEMENTS"])
				{
					?> <span>(<? echo $arSection['ELEMENT_CNT']; ?>)</span><?
				}
				?></li><?
			}
			unset($arSection);
			break;
		case 'TILE':
			foreach ($arResult['RUBRICS'] as $arSection)
			{
				?><div class="d_product">
          <img src="<?=CFile::GetPath($arSection['PREVIEW_PICTURE'])?>" alt="<?=$arSection['NAME']?>" />
          <div>
            <ul class="d_one">
              <?foreach($arResult['SECTIONS'] as $arKeyL2 => $arSectionL2):?>
                <?if(1 == $arSectionL2['RELATIVE_DEPTH_LEVEL'] && $arSectionL2['UF_SECTION'] == $arSection['ID']):?>
                  <li>
                    <a href="<?=$arSectionL2['SECTION_PAGE_URL']?>"><?=$arSectionL2['NAME']?></a>
                  </li>
                  <?$arr=array();?>
                  <?foreach($arResult['SECTIONS'] as $arKeyL3 => $arSectionL3):?>
                    <?if($arSectionL3['RELATIVE_DEPTH_LEVEL'] > 1 && $arSectionL3["IBLOCK_SECTION_ID"] == $arSectionL2['ID']):?>
                      <?$arr[] = $arSectionL3;?>
                      <?unset($arResult['SECTIONS'][$arKeyL3]);?>
                    <?endif;?>
                  <?endforeach;?>
                  <?if(count($arr)==2):?>
                    <li class="d_greysmall">
                      <a href="<?=$arSectionL2['SECTION_PAGE_URL']."#t".$arr[0]['ID']?>"><?=$arr[0]['NAME']?></a> è <a href="<?=$arSectionL2['SECTION_PAGE_URL']."#t".$arr[1]['ID']?>"><?=$arr[1]['NAME']?></a>
                    </li>
                  <?else:foreach($arr as $val):?>
                    <li class="d_greysmall">
                      <a href="<?=$arSectionL2['SECTION_PAGE_URL']."#t".$val['ID']?>"><?=$val['NAME']?></a>
                    </li>
                  <?endforeach;endif;?>
                <?unset($arResult['SECTIONS'][$arKeyL2]);?>
                <?endif;?>
              <?endforeach;?>
            </ul>
          </div>
        </div><?
          }
			break;
		case 'LIST':
			break;
	}
?>
  <?if($arParams['VIEW_MODE']!='TILE'):?></ul><?else:?></div><?endif;?>
<?

}
?>