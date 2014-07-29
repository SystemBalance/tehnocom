<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die(); ?>
<?


if(count($arResult["ITEMS"]) > 0){ // ���� ���� ������� ��� �����������, ��
    $PLACEMARKS = array(); //������� ������ ��������
    $i=0;
    foreach($arResult["ITEMS"] as $arElement) { //�������� ������
        foreach ($arElement["DISPLAY_PROPERTIES"] as $pid=>$arProperty) {
            if($pid=="MAP") { //�������� ���������� �������
                $MAP = explode (",", $arProperty["VALUE"]);} // � ��������� �� � ������ �����)
            $TEXT = '<a href="'.$arElement["DETAIL_PAGE_URL"].'"><img src="'.$arElement['PREVIEW_PICTURE']['SRC'].'" \/></a><br />'.$arElement["NAME"].'<br />'.$arElement["PREVIEW_TEXT"].'';
            //���������� ��������� ���� �������. �������� ������������ html � php.
            $PLACEMARKS[$i]["LON"] = $MAP[1]; //��������� ������ ������� �������

            $PLACEMARKS[$i]["LAT"] = $MAP[0]; //
            $PLACEMARKS[$i]["TEXT"] = $TEXT;  //
        };
        $i++; //
    };//������� � ���������� �������, ���� �� ����
};
print_r($arResult);
print_r($PLACEMARKS);
?>
<? // ������ �������� $PLACEMARKS ����� ?>
<? // �������� ��������� ������������ ����� ?>
<!---->
<?// $APPLICATION->IncludeComponent("bitrix:map.google.view",
//    "",
//    array("INIT_MAP_TYPE" => "HYBRID",
//        "MAP_DATA" => serialize(
//            array(
//                'google_lat' => $MAP[0], // ���������� ������ �����
//                'google_lon' => $MAP[1], // ���������� ���������� ���������� �������
//                'google_scale' => 10, // ������� ����� 0-20
//                'PLACEMARKS' => $PLACEMARKS // �������������� ����� ������ ��������
//            )
//        ),
//        "MAP_WIDTH" => "900", // ������ �����
//        "MAP_HEIGHT" => "500", // ������
//        "CONTROLS" => array( // ������������ �������� �����
//            0 => "SMALL_ZOOM_CONTROL",
//            1 => "TYPECONTROL",
//            2 => "SCALELINE",
//        ),
//        "OPTIONS" => array(// ��������� ���������� �����
//            0 => "ENABLE_SCROLL_ZOOM",
//            1 => "ENABLE_DBLCLICK_ZOOM",
//            2 => "ENABLE_DRAGGING",
//            3 => "ENABLE_KEYBOARD",
//        ),
//        "MAP_ID" => "" // �� ����� ����� �� �����
//    ),
//    false,
//    array("ACTIVE_COMPONENT" => "Y")
//);?>

<?

$arTransParams = array(
    'INIT_MAP_TYPE' => $arParams['INIT_MAP_TYPE'],
    'INIT_MAP_LON' => $arResult['POSITION']['google_lon'],
    'INIT_MAP_LAT' => $arResult['POSITION']['google_lat'],
    'INIT_MAP_SCALE' => $arResult['POSITION']['google_scale'],
    'MAP_WIDTH' => $arParams['MAP_WIDTH'],
    'MAP_HEIGHT' => $arParams['MAP_HEIGHT'],
    'CONTROLS' => $arParams['CONTROLS'],
    'OPTIONS' => $arParams['OPTIONS'],
    'MAP_ID' => $arParams['MAP_ID'],
);

if ($arParams['DEV_MODE'] == 'Y')
{
    $arTransParams['DEV_MODE'] = 'Y';
    if ($arParams['WAIT_FOR_EVENT'])
        $arTransParams['WAIT_FOR_EVENT'] = $arParams['WAIT_FOR_EVENT'];
}
?>
    <div class="bx-yandex-view-layout">
        <div class="bx-yandex-view-map">
            <?

            $APPLICATION->IncludeComponent('bitrix:map.google.system', '.default', $arTransParams, false, array('HIDE_ICONS' => 'Y'));
            ?>
        </div>
    </div>
<?


?>
<?if (is_array($arResult['POSITION']['PLACEMARKS']) && ($cnt = count($arResult['POSITION']['PLACEMARKS']))):?>
    <script type="text/javascript">

        function BX_SetPlacemarks_<?echo $arParams['MAP_ID']?>()
        {
            <?
                for($i = 0; $i < $cnt; $i++):
            ?>
            BX_GMapAddPlacemark(<?echo CUtil::PhpToJsObject($arResult['POSITION']['PLACEMARKS'][$i])?>, '<?echo $arParams['MAP_ID']?>');
            <?
                endfor;
            ?>
        }

        function BXShowMap_<?echo $arParams['MAP_ID']?>() {
            if(typeof window["BXWaitForMap_view"] == 'function')
            {
                BXWaitForMap_view('<?echo $arParams['MAP_ID']?>');
            }
            else
            {
                /* If component's result was cached as html,
                 * script.js will not been loaded next time.
                 * let's do it manualy.
                 */

                (function(d, s, id)
                {
                    var js, bx_gm = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id)) return;
                    js = d.createElement(s); js.id = id;
                    js.src = "<?=$templateFolder.'/script.js'?>";
                    bx_gm.parentNode.insertBefore(js, bx_gm);
                }(document, 'script', 'bx-google-map-js'));

                var gmWaitIntervalId = setInterval( function(){

                        if(typeof window["BXWaitForMap_view"] == 'function')
                        {
                            BXWaitForMap_view("<?echo $arParams['MAP_ID']?>");
                            clearInterval(gmWaitIntervalId);
                        }
                    }, 300
                );
            }
        }

        BX.ready(BXShowMap_<?echo $arParams['MAP_ID']?>);
    </script>
<?endif;?>