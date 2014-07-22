<?if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();?>
<?IncludeTemplateLangFile(__FILE__);?>
<?define("LEVEL",count(explode("/", trim($APPLICATION->GetCurPage(), "/"))));?>
<? include 'include/geo_ip.php';?>
<!doctype html>
<html>
<head>
  <title><?$APPLICATION->ShowTitle();?></title>
  <link rel="icon" type="image/png" href="<?=SITE_TEMPLATE_PATH;?>/favicon.png" />
  <link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH;?>/zoom.php?r=<?=mt_rand(0, 9999999999);?>" type="text/css" >
  <link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH;?>/js/lib/fancybox/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" >
<?$APPLICATION->ShowHead();?>


</head>
<body>
<?$APPLICATION->ShowPanel();?>
  <div class="out">
    <div class="header">
      <a href="/" class="logo"></a>
      <div class="header__left">
        <div class="header__address">
          <?$APPLICATION->IncludeFile(SITE_TEMPLATE_PATH."/include/text/city.php");?>
          <p><?$APPLICATION->IncludeFile(SITE_TEMPLATE_PATH."/include/text/address.php");?></p>
          <a href="/contacts/">Все филиалы компании</a>
        </div>
        <div class="header__phone"><?$APPLICATION->IncludeFile(SITE_TEMPLATE_PATH."/include/text/phone.php");?></div>
      </div>

        <!-- contacts block. center -->
      <div class="header__center">
        <a class="online-assist"><i class="online-assist__pic"></i><span>Онлайн-консультант</span></a><br />
        <a class="callback"><i class="callback__pic"></i><span>Заказать обратный звонок</span></a><br />
        <a class="skype" href="skype:tehnocom.spb"><i class="skype__pic"></i><span>tehnocom.spb</span></a>
      </div>

        <!-- User block. center -->
        <div class="header__right user">
        <div class="user__row">
          <a class="user__link user__link_company" href="/profile/"><span>ООО «Техстройгазалмазнефтеуголь Северо-Запад»</span></a>
        </div>
        <div class="user__row user__row_mod">
          <a class="user__link user__link_basket" href="/cart/"><span>Корзина</span> (3)</a>
          <a class="user__link user__link_mail" href="/profile/"><span>Сообщения</span> (4)</a>
          <a class="user__link user__link_grey" href="/logout/"><span>Выход</span></a>
        </div>
        <div class="user__row">
          <a class="user__link user__link_grey user__link_pad" href="/cart/"><span>Отложено</span> (4)</a>
        </div>
      </div>


    </div>
    <div class="menu">
      <div class="catalog">
        <a href="/catalog/" class="catalog__anchor">Каталог товаров</a>
        <div class="catalog__block">
          <div class="catalog__top">
            <div class="catalog__search">
              <input type="text" class="input" placeholder="Введите название или код товара">
            </div>
            <button class="btn">Найти</button>
          </div>
          <div class="catalog__bottom">
            <?$APPLICATION->IncludeComponent("bitrix:menu","header-catalog",Array(
                "ROOT_MENU_TYPE" => "catalog-1",
                "MAX_LEVEL" => "1",
                "CHILD_MENU_TYPE" => "catalog-1",
                "USE_EXT" => "Y",
                "DELAY" => "N",
                "ALLOW_MULTI_SELECT" => "Y",
                "MENU_CACHE_TYPE" => "Y",
                "MENU_CACHE_TIME" => "2592000",
                "MENU_CACHE_USE_GROUPS" => "Y",
                "MENU_CACHE_GET_VARS" => ""
              )
            );?>
            <?$APPLICATION->IncludeComponent("bitrix:menu","header-catalog",Array(
                "ROOT_MENU_TYPE" => "catalog-2",
                "MAX_LEVEL" => "1",
                "CHILD_MENU_TYPE" => "catalog-2",
                "USE_EXT" => "Y",
                "DELAY" => "N",
                "ALLOW_MULTI_SELECT" => "Y",
                "MENU_CACHE_TYPE" => "Y",
                "MENU_CACHE_TIME" => "2592000",
                "MENU_CACHE_USE_GROUPS" => "Y",
                "MENU_CACHE_GET_VARS" => ""
              )
            );?>
            <?$APPLICATION->IncludeComponent("bitrix:menu","header-catalog",Array(
                "ROOT_MENU_TYPE" => "catalog-3",
                "MAX_LEVEL" => "1",
                "CHILD_MENU_TYPE" => "catalog-3",
                "USE_EXT" => "Y",
                "DELAY" => "N",
                "ALLOW_MULTI_SELECT" => "Y",
                "MENU_CACHE_TYPE" => "Y",
                "MENU_CACHE_TIME" => "2592000",
                "MENU_CACHE_USE_GROUPS" => "Y",
                "MENU_CACHE_GET_VARS" => ""
              )
            );?>
            <?$APPLICATION->IncludeComponent("bitrix:menu","header-catalog",Array(
                "ROOT_MENU_TYPE" => "catalog-4",
                "MAX_LEVEL" => "1",
                "CHILD_MENU_TYPE" => "catalog-4",
                "USE_EXT" => "Y",
                "DELAY" => "N",
                "ALLOW_MULTI_SELECT" => "Y",
                "MENU_CACHE_TYPE" => "Y",
                "MENU_CACHE_TIME" => "2592000",
                "MENU_CACHE_USE_GROUPS" => "Y",
                "MENU_CACHE_GET_VARS" => ""
              )
            );?>
          </div>
        </div>
      </div>
      <?$APPLICATION->IncludeComponent("bitrix:menu","header",Array(
          "ROOT_MENU_TYPE" => "header",
          "MAX_LEVEL" => "1",
          "CHILD_MENU_TYPE" => "header",
          "USE_EXT" => "Y",
          "DELAY" => "N",
          "ALLOW_MULTI_SELECT" => "Y",
          "MENU_CACHE_TYPE" => "Y",
          "MENU_CACHE_TIME" => "2592000",
          "MENU_CACHE_USE_GROUPS" => "Y",
          "MENU_CACHE_GET_VARS" => ""
        )
      );?>
    </div>