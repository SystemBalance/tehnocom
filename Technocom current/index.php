<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("��������");
?><?php
                //error_reporting(E_ALL);
                //ini_set('display_errors',1);

//�������� ��������
CModule::IncludeModule('iblock');
$cities = CIBlockElement::GetList(
    array("SORT"=>"DESC"),
    array('IBLOCK_ID'=>19),
    false,
    false,
    array(
        'PROPERTY_PHONES',
        'PROPERTY_ADDRESS',
        'PROPERTY_EMAIL',
        'PROPERTY_BUTTON',
        'PROPERTY_JOB_TIME',
//        'PROPERTY_LATITUDE',
//        'PROPERTY_LONGITUDE',
//        'PROPERTY_ZOOM',
        'PROPERTY_MAP',
        'ID',
        'IBLOCK_ID'
    )
);
//
//while($city = $cities->GetNextElement()){
//
//}
//
//    $arFields = $city->GetFields();
//    echo "<pre>";
//    print_r($arFields);
//    echo "</pre>";
//    echo "<pre>";
//    print_r($city);
//    echo "</pre>";
//
//
//    <? if(count($arResult["ITEMS"]) > 0){ // ���� ���� ������� ��� �����������, ��
//    $PLACEMARKS = array(); //������� ������ ��������
//    $i=0;
//    foreach($arResult["ITEMS"] as $arElement) { //�������� ������
//        foreach ($arElement["DISPLAY_PROPERTIES"] as $pid=>$arProperty) {
//            if($pid=="MAP") { //�������� ���������� �������
//                $MAP = explode (",", $arProperty["VALUE"]);} // � ��������� �� � ������ �����)
//            $TEXT = "<table><tr><td><a href="".$arElement["DETAIL_PAGE_URL"].""><img src="".$arElement['PREVIEW_PICTURE']['SRC']."" \/></a></td><td>".$arElement["NAME"]."<br />".$arElement["PREVIEW_TEXT"]."</td></tr></table>";//���������� ��������� ���� �������. �������� ������������ html � php.
//                 $PLACEMARKS[$i]["LON"] = $MAP[1]; //��������� ������ ������� �������
//            $PLACEMARKS[$i]["LAT"] = $MAP[0]; //
//            $PLACEMARKS[$i]["TEXT"] = $TEXT;  //
//         };
//        $i++; //
//    };//������� � ���������� �������, ���� �� ����
//};

//    print_r($city);
//    print_r($city);


//die();
$cityArray = array();
while($city = $cities->GetNext()){
    $cityArray[$city['ID']] = $city;
}
//print_r($cityArray);

$c = array_pop($cityArray);
$cMapData = explode(',',$c['PROPERTY_MAP_VALUE']);

////���� �� ������� ���������� ���������
//CModule::IncludeModule('sale');
//$arLocs = CSaleLocation::GetByID(22, LANGUAGE_ID);
//echo $arLocs["COUNTRY_NAME"]." - ".$arLocs["CITY_NAME"];
?>

  <div class="d_space"></div>
  <div class="title-line"><h1>��������</h1></div>
    <!-- BEGIN contacts -->
    <div class="contacts">
        <div class="contacts__text">�������� � ������ ������������ ��� ������ � �����, ����� ������ ������ � �������� �������.</div>

        <div class="clearfix">
            <div class="contacts__left">

                <ul class="contacts__regions">
                    <li><a href="#">�����-��������� � �������</a>
                        <ul>
                            <li><a href="#">�����-���������</a></li>
                            <li><a href="#">������</a></li>
                        </ul>
                    </li>
                    <li><a href="#">������������� �������</a>
                        <ul>
                            <li><a href="#">�����-���������</a></li>
                            <li><a href="#">������</a></li>
                        </ul>
                    </li>
                    <li><a href="#">����������� �������</a>
                        <ul>
                            <li><a href="#">�����-���������</a></li>
                            <li><a href="#">������</a></li>
                        </ul>
                    </li>
                    <li><a href="#">���������� ����</a>
                        <ul>
                            <li><a href="#">�����-���������</a></li>
                            <li><a href="#">������</a></li>
                        </ul>
                    </li>
                    <li><a href="#">����������� �������</a></li>
                    <li><a href="#">��������� �������</a></li>
                    <li><a href="#">������������ ����</a></li>
                    <li><a href="#">������������� �������</a></li>
                </ul>
            </div>
            <div class="contacts__right">
                <div class="clearfix">
                    <div class="contacts__rleft">
                        <div class="contacts__loc">
                            �����-���������
                            <!-- @todo city �������� -->
                            <div class="small"><?=$c['PROPERTY_ADDRESS_VALUE'];?></div>
                        </div>
                        <?
                            foreach($c['PROPERTY_PHONES_VALUE'] as $phone){
                                echo '
                                <div class="contacts__tel">
                                    '.$phone.'
                                    <div class="small">'.$c['PROPERTY_JOB_TIME_VALUE'].'</div>
                                </div>';
                            }
                        ?>
                        <div class="contacts__email">
                            <a href="mailto:<?=$c['PROPERTY_EMAIL_VALUE'];?>"><?=$c['PROPERTY_EMAIL_VALUE'];?></a>
                        </div>
                    </div>
                    <!-- @todo -->
                    <div class="contacts__rright">
                        <div><a href="#" class="contacts__online"><span>������-�����������</span></a></div>
                        <div><a href="#" class="contacts__callback"><span>�������� �������� ������</span></a></div>
                        <div><a href="skype:tehnocom.spb" class="contacts__skype"><span>tehnocom.spb</span></a></div>
                    </div>
                </div>
                <div class="contacts__map">
                    <?
//                    ini_set('display_errors',1);
//                    error_reporting(E_ALL);
                    $APPLICATION->IncludeComponent("bitrix:map.google.view", ".default", array(
	"INIT_MAP_TYPE" => "ROADMAP",
	"MAP_DATA" => "a:4:{s:10:\"google_lat\";d:59.890415495520266;s:10:\"google_lon\";d:30.37759988042602;s:12:\"google_scale\";i:16;s:10:\"PLACEMARKS\";a:1:{i:0;a:3:{s:4:\"TEXT\";s:41:\"����������� ����.###RN###��. ������, 53/1\";s:3:\"LON\";d:30.37715435028076;s:3:\"LAT\";d:59.88999183407113;}}}",
	"MAP_WIDTH" => "1593",
	"MAP_HEIGHT" => "971",
	"CONTROLS" => array(
		0 => "SMALL_ZOOM_CONTROL",
		1 => "TYPECONTROL",
		2 => "SCALELINE",
	),
	"OPTIONS" => array(
		0 => "ENABLE_SCROLL_ZOOM",
		1 => "ENABLE_DBLCLICK_ZOOM",
		2 => "ENABLE_DRAGGING",
		3 => "ENABLE_KEYBOARD",
	),
	"MAP_ID" => $c["PROPERTY_MAP_VALUE_ID"]
	),
	false
);?>
                </div>
            </div>
        </div>
    </div>
    <!-- END contacts -->
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>