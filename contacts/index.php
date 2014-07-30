<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Контакты");
?><?php
                //error_reporting(E_ALL);
                //ini_set('display_errors',1);

//Выбираем контакты
CModule::IncludeModule('iblock');
$contactList = CIBlockElement::GetList(
    array("SORT"=>"DESC"),
    array('IBLOCK_ID'=>19),
    false,
    false,
    array(
        'PROPERTY_PHONES',
        'PROPERTY_ADDRESS',
        'PROPERTY_EMAIL',
        'PROPERTY_BUTTON',
        'PROPERTY_SKYPE',
        'PROPERTY_JOB_TIME',
        'PROPERTY_REGION',
//        'PROPERTY_REGION.NAME',
        'PROPERTY_CITY',
        'PROPERTY_CENTER',
        'PROPERTY_MAP',

        'ID',
        'IBLOCK_ID',
        'NAME'
    )
);

//Массив контактов
$contactArray = array();
//Массив регионов
$sectionList = array();
while($cont = $contactList->GetNext()){
    $contactArray[$cont['PROPERTY_REGION_VALUE']][$city['ID']] = $cont;
    $sectionList[$cont['PROPERTY_REGION_VALUE']] = $cont['PROPERTY_REGION_VALUE'];
}


$c = array_pop($cityArray);




$cMapData = explode(',',$c['PROPERTY_MAP_VALUE']);

////Мало ли родными средствами получится
//CModule::IncludeModule('sale');
//$arLocs = CSaleLocation::GetByID(22, LANGUAGE_ID);
//echo $arLocs["COUNTRY_NAME"]." - ".$arLocs["CITY_NAME"];
?> 
<div class="d_space"></div>
 
<div class="title-line"> 
  <h1>Контакты</h1>
 </div>
 
<!-- BEGIN contacts -->
 
<div class="contacts"> 
  <div class="contacts__text">Выберите в списке интересующий вас регион и город, чтобы узнать адреса и телефоны филиала.</div>
 
  <div class="clearfix"> 
    <div class="contacts__left"> 
      <ul class="contacts__regions">
          <?    //Выводим филиалы по городам
          $sections = CIBlockSection::GetList(array("SORT"=>"ASC"), array('IBLOCK_ID' => 27, 'ID' => $sectionList),  true);
          while($sect = $sections->GetNext()){
          echo '<li><a href="#'.$sect['ID'].'" >'.$sect['NAME'].'</a>';
              echo '<ul> ';

                  foreach($contactArray[$sect['ID']] as $conts){
                      echo '<li><a href="#'.$conts['ID'].'" >'.$conts['NAME'].'</a></li>';
                  }
                  echo '           </ul>
          </li>';
          }
          ?>
       </ul>
     </div>
   
    <div class="contacts__right"> 
      <div class="clearfix"> 
        <div class="contacts__rleft"> 
          <div class="contacts__loc"> Санкт-Петербург 
<!-- @todo city привязка -->
 
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
          <div class="contacts__email"> <a href="mailto:<?=$c['PROPERTY_EMAIL_VALUE'];?>" ><?=$c['PROPERTY_EMAIL_VALUE'];?></a> </div>
         </div>
       
<!-- @todo -->
 
        <div class="contacts__rright"> 
          <div><a onclick="javascript:jivo_api.open();" class="contacts__online" ><span>Онлайн-консультант</span></a></div>
         
          <div><a href="#" class="contacts__callback" ><span>Заказать обратный звонок</span></a></div>
         
          <div><a href="skype:tehnocom.spb" class="contacts__skype" ><span>tehnocom.spb</span></a></div>
         </div>
       </div>
     
      <div class="contacts__map"> <?$APPLICATION->IncludeComponent(
	"bitrix:map.google.view",
	"tehno_scale",
	Array(
		"INIT_MAP_TYPE" => "ROADMAP",
		"MAP_DATA" => "a:4:{s:10:\"google_lat\";d:59.890415495520266;s:10:\"google_lon\";d:30.37759988042602;s:12:\"google_scale\";i:16;s:10:\"PLACEMARKS\";a:1:{i:0;a:3:{s:4:\"TEXT\";s:41:\"Центральный офис.###RN###ул. Салова, 53/1\";s:3:\"LON\";d:30.37715435028076;s:3:\"LAT\";d:59.88999183407113;}}}",
		"MAP_WIDTH" => "1593",
		"MAP_HEIGHT" => "971",
		"CONTROLS" => array(0=>"SMALL_ZOOM_CONTROL",1=>"TYPECONTROL",2=>"SCALELINE",),
		"OPTIONS" => array(0=>"ENABLE_SCROLL_ZOOM",1=>"ENABLE_DBLCLICK_ZOOM",2=>"ENABLE_DRAGGING",3=>"ENABLE_KEYBOARD",),
		"MAP_ID" => $c["PROPERTY_MAP_VALUE_ID"]
	)
);?></div>
     </div>
   </div>
 </div>
 
<!-- END contacts -->
 <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>