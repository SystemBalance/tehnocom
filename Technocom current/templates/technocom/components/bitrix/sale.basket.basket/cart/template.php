<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
$arUrls = Array(
	"delete" => $APPLICATION->GetCurPage()."?".$arParams["ACTION_VARIABLE"]."=delete&id=#ID#",
	"delay" => $APPLICATION->GetCurPage()."?".$arParams["ACTION_VARIABLE"]."=delay&id=#ID#",
	"add" => $APPLICATION->GetCurPage()."?".$arParams["ACTION_VARIABLE"]."=add&id=#ID#",
);

$arBasketJSParams = array(
	'SALE_DELETE' => GetMessage("SALE_DELETE"),
	'SALE_DELAY' => GetMessage("SALE_DELAY"),
	'SALE_TYPE' => GetMessage("SALE_TYPE"),
	'TEMPLATE_FOLDER' => $templateFolder,
	'DELETE_URL' => $arUrls["delete"],
	'DELAY_URL' => $arUrls["delay"],
	'ADD_URL' => $arUrls["add"]
);
?>
<script type="text/javascript">
	var basketJSParams = <?=CUtil::PhpToJSObject($arBasketJSParams);?>
</script>
<?
$APPLICATION->AddHeadScript($templateFolder."/script.js");

include($_SERVER["DOCUMENT_ROOT"].$templateFolder."/functions.php");

//print_r($arResult);

if (strlen($arResult["ERROR_MESSAGE"]) <= 0)
{
	?>
	<div id="warning_message">
		<?
		if (is_array($arResult["WARNING_MESSAGE"]) && !empty($arResult["WARNING_MESSAGE"]))
		{
			foreach ($arResult["WARNING_MESSAGE"] as $v)
				echo ShowError($v);
		}
		?>
	</div>
    <?php
    $normalCount = count($arResult["ITEMS"]["AnDelCanBuy"]);
    $normalHidden = ($normalCount == 0) ? "style=\"display:none\"" : "";

    $delayCount = count($arResult["ITEMS"]["DelDelCanBuy"]);
    $delayHidden = ($delayCount == 0) ? "style=\"display:none\"" : "";

    $subscribeCount = count($arResult["ITEMS"]["ProdSubscribe"]);
    $subscribeHidden = ($subscribeCount == 0) ? "style=\"display:none\"" : "";

    $naCount = count($arResult["ITEMS"]["nAnCanBuy"]);
    $naHidden = ($naCount == 0) ? "style=\"display:none\"" : "";
    ?>

    <div class="x_tabs">
        <div class="x_tabs__links">
            <a class="selected" href="#"><span>Готовые к заказу (<span class="count__recycle">2</span>)</span></a>
            <a href="#"><span>Отложенные (<span class="count__hold">1</span>)</span></a>
        </div>
        <div class="x_tabs__item selected">


<?            include($_SERVER["DOCUMENT_ROOT"].$templateFolder."/basket_items.php");?>



        </div>

        <!--  Отложенные -->
        <div class="x_tabs__item">
            <table class="table__hold">
                <thead><tr><th width="1130" class="recycle-table__name">Название</th><th width="230"></th><th>Стоимость</th><th></th></tr></thead>
                <tbody>
                <tr>
                    <td class="recycle-page__name"><div><img src="img/temp-recycle.jpg"><a href="#">Пильная шина Iggesund Forest R8 2801-55</a><div class="recycle-page__art">арт. А0000020233</div></div></td>
                    <td></td>
                    <td><div data-cost="3400" class="recycle-page__sum"><span>3 400</span> руб.</div></td>
                    <td class="recycle-page__actions_hold"><a class="link__green btn__addrecycle" href="#">Добавить в корзину для оформления заказа</a><br><a href="#" class="btn__delete">Удалить</a></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>



<? /*








	<?



	?>
		<form method="post" action="<?=POST_FORM_ACTION_URI?>" name="basket_form" id="basket_form">
			<div id="basket_form_container">
				<div class="bx_ordercart">
					<div class="bx_sort_container">
						<span><?=GetMessage("SALE_ITEMS")?></span>
						<a href="javascript:void(0)" id="basket_toolbar_button" class="current" onclick="showBasketItemsList()"><?=GetMessage("SALE_BASKET_ITEMS")?><div id="normal_count" class="flat" style="display:none">&nbsp;(<?=$normalCount?>)</div></a>
						<a href="javascript:void(0)" id="basket_toolbar_button_delayed" onclick="showBasketItemsList(2)" <?=$delayHidden?>><?=GetMessage("SALE_BASKET_ITEMS_DELAYED")?><div id="delay_count" class="flat">&nbsp;(<?=$delayCount?>)</div></a>
						<a href="javascript:void(0)" id="basket_toolbar_button_subscribed" onclick="showBasketItemsList(3)" <?=$subscribeHidden?>><?=GetMessage("SALE_BASKET_ITEMS_SUBSCRIBED")?><div id="subscribe_count" class="flat">&nbsp;(<?=$subscribeCount?>)</div></a>
						<a href="javascript:void(0)" id="basket_toolbar_button_not_available" onclick="showBasketItemsList(4)" <?=$naHidden?>><?=GetMessage("SALE_BASKET_ITEMS_NOT_AVAILABLE")?><div id="not_available_count" class="flat">&nbsp;(<?=$naCount?>)</div></a>
					</div>
					<?
					include($_SERVER["DOCUMENT_ROOT"].$templateFolder."/basket_items.php");
					include($_SERVER["DOCUMENT_ROOT"].$templateFolder."/basket_items_delayed.php");
					include($_SERVER["DOCUMENT_ROOT"].$templateFolder."/basket_items_subscribed.php");
					include($_SERVER["DOCUMENT_ROOT"].$templateFolder."/basket_items_not_available.php");
					?>
				</div>
			</div>
			<input type="hidden" name="BasketOrder" value="BasketOrder" />
			<!-- <input type="hidden" name="ajax_post" id="ajax_post" value="Y"> -->
		</form>
	<?
 */
}
else
{
	ShowError($arResult["ERROR_MESSAGE"]);
}

?>