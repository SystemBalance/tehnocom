<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if (empty($arResult)) return;
?>
			<ul class="menu__list">
<?
foreach($arResult as $arItem):
?>
				<li class="menu__item">
					<a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a>
				</li>
<?
endforeach;
?>
			</ul>
