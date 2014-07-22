<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if (empty($arResult)) return;
?>
			<ul class="catalog__list">
<?
foreach($arResult as $arItem):
?>
				<li class="catalog__item">
					<a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a>
				</li>
<?
endforeach;
?>
			</ul>
