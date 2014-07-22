<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if (empty($arResult)) return;
?>
    <nav class="footer__nav">
<?
foreach($arResult as $arItem):
?>
					<a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a>
<?
endforeach;
?>
			</nav>
