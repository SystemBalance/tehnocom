<?php
//���������� IBlock
CModule::IncludeModule('iblock');

//DEBUG
ini_set("display_errors",1);

//���������� ������
if(CModule::IncludeModule("altasib.geoip"))
{
    $arData = ALX_GeoIP::GetAddr();

    //���� ������
    //�������� �������� ����� �� ����� ������
//    $arData['city'] = '����';
//    $arData['city'] = '���������';

    $arSelect = Array("ID", "NAME","IBLOCK_SECTION_ID", "PROPERTY_*");
    $arFilter = Array("IBLOCK_ID"=>27, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y","NAME"=>$arData['city']);
    $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);

    if (intval($res->SelectedRowsCount())==1){  //������ ���� ����� ��� ��
        $city = $res->GetNextElement();
        //Array ( [ID] => 21478 [~ID] => 21478 [NAME] => ���� [~NAME] => ���� [IBLOCK_SECTION_ID] => 2350 [~IBLOCK_SECTION_ID] => 2350 )
        $city = $city->GetFields();

        //�������� �������� �������� �� ������
        $arSelect = Array("*", "PROPERTY_*");
        $arFilter = Array("IBLOCK_ID"=>19, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y",
            "PROPERTY_CITY"=>$city['ID']
        );
        $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);

        if (intval($res->SelectedRowsCount())>0){  //������� ���������� ������
            $contacts = $res->GetNextElement();
            $contacts = $contacts->GetFields();
        } else {
            //� ������ ��� ���������. ���� � �������:
            //�������� �������� �������� �� �������
            $arSelect = Array("*", "PROPERTY_*");
            $arFilter = Array("IBLOCK_ID"=>19, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y",
                "PROPERTY_REGION"=>$city['IBLOCK_SECTION_ID']
            );
            $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);

            if (intval($res->SelectedRowsCount())>0){  //������� ���������� ������
                $contacts = $res->GetNextElement();
                $contacts = $contacts->GetFields();
            }
        }
    }
}

if(!isset($contacts)){
    //���� ����� �� �����������, ���� � ������ � � ������� ��� ���������.
    //����������� �����
    //�������� �������� �������� �� ������
    //����� ID = 1580;
    $arSelect = Array("*", "PROPERTY_*");
    $arFilter = Array("IBLOCK_ID"=>19, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y",
        "ID"=>1580
    );
    $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);
    if (intval($res->SelectedRowsCount())>0){  //������� ���������� ������
        $contacts = $res->GetNextElement();
        $contacts = $contacts->GetFields();
    }
}

//$contacts
//PROPERTY_43    �������
//PROPERTY_44    �����
//PROPERTY_45    e-mail
//PROPERTY_177   skype
//NAME           �����

$_SESSION['CONTACTS'] = $contacts;

//������� ��������� ���������� ������
?><div class="header__left">
    <div class="header__address"><?=$contacts['NAME'];//��� ������?>
        <p><?=$contacts['PROPERTY_44'];//����� �����?></p>
        <a href="/contacts/">��� ������� ��������</a>
    </div>
    <div class="header__phone"><?=$contacts['PROPERTY_43'][0];//������� (������) ?></div>
</div>

<!-- contacts block. center -->
<div class="header__center">
    <a class="online-assist" onclick="javascript:jivo_api.open();"><i class="online-assist__pic"></i><span>������-�����������</span></a><br />
    <a class="callback"><i class="callback__pic"></i><span>�������� �������� ������</span></a><br />
    <a class="skype" href="skype:<?=$contacts['PROPERTY_177'];//�����?>"><i class="skype__pic"></i><span><?=$contacts['PROPERTY_177'];//�����?></span></a>
</div>