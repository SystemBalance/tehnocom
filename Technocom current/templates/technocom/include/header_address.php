<?php
//Подключаем IBlock
CModule::IncludeModule('iblock');

//DEBUG
ini_set("display_errors",1);

//Определяем регион
if(CModule::IncludeModule("altasib.geoip"))
{
    $arData = ALX_GeoIP::GetAddr();

    //Тест города
    //Получаем инфоблок город по имени города
//    $arData['city'] = 'Ухта';
//    $arData['city'] = 'Сыктывкар';

    $arSelect = Array("ID", "NAME","IBLOCK_SECTION_ID", "PROPERTY_*");
    $arFilter = Array("IBLOCK_ID"=>27, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y","NAME"=>$arData['city']);
    $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);

    if (intval($res->SelectedRowsCount())==1){  //Найден один город все ок
        $city = $res->GetNextElement();
        //Array ( [ID] => 21478 [~ID] => 21478 [NAME] => Ухта [~NAME] => Ухта [IBLOCK_SECTION_ID] => 2350 [~IBLOCK_SECTION_ID] => 2350 )
        $city = $city->GetFields();

        //Получаем инфоблок контакты по городу
        $arSelect = Array("*", "PROPERTY_*");
        $arFilter = Array("IBLOCK_ID"=>19, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y",
            "PROPERTY_CITY"=>$city['ID']
        );
        $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);

        if (intval($res->SelectedRowsCount())>0){  //Найдены контактные данные
            $contacts = $res->GetNextElement();
            $contacts = $contacts->GetFields();
        } else {
            //В городе нет контактов. Ищем в регионе:
            //Получаем инфоблок контакты по региону
            $arSelect = Array("*", "PROPERTY_*");
            $arFilter = Array("IBLOCK_ID"=>19, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y",
                "PROPERTY_REGION"=>$city['IBLOCK_SECTION_ID']
            );
            $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);

            if (intval($res->SelectedRowsCount())>0){  //Найдены контактные данные
                $contacts = $res->GetNextElement();
                $contacts = $contacts->GetFields();
            }
        }
    }
}

if(!isset($contacts)){
    //Либо город не определился, либо в городе и в регионе нет филлиалов.
    //Подставляем питер
    //Получаем инфоблок контакты по городу
    //Питер ID = 1580;
    $arSelect = Array("*", "PROPERTY_*");
    $arFilter = Array("IBLOCK_ID"=>19, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y",
        "ID"=>1580
    );
    $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);
    if (intval($res->SelectedRowsCount())>0){  //Найдены контактные данные
        $contacts = $res->GetNextElement();
        $contacts = $contacts->GetFields();
    }
}

//$contacts
//PROPERTY_43    Телефон
//PROPERTY_44    Адрес
//PROPERTY_45    e-mail
//PROPERTY_177   skype
//NAME           Город

$_SESSION['CONTACTS'] = $contacts;

//Выводим ближайшие контактные данные
?><div class="header__left">
    <div class="header__address"><?=$contacts['NAME'];//Имя города?>
        <p><?=$contacts['PROPERTY_44'];//Адрес офиса?></p>
        <a href="/contacts/">Все филиалы компании</a>
    </div>
    <div class="header__phone"><?=$contacts['PROPERTY_43'][0];//Телефон (первый) ?></div>
</div>

<!-- contacts block. center -->
<div class="header__center">
    <a class="online-assist" onclick="javascript:jivo_api.open();"><i class="online-assist__pic"></i><span>Онлайн-консультант</span></a><br />
    <a class="callback"><i class="callback__pic"></i><span>Заказать обратный звонок</span></a><br />
    <a class="skype" href="skype:<?=$contacts['PROPERTY_177'];//Скайп?>"><i class="skype__pic"></i><span><?=$contacts['PROPERTY_177'];//Скайп?></span></a>
</div>