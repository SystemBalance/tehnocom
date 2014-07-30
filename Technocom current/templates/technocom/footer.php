<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?if(ERROR_404 != "Y"):?>
    <footer class="footer">
      <?$APPLICATION->IncludeComponent("bitrix:menu","footer",Array(
          "ROOT_MENU_TYPE" => "footer",
          "MAX_LEVEL" => "1",
          "CHILD_MENU_TYPE" => "footer",
          "USE_EXT" => "Y",
          "DELAY" => "N",
          "ALLOW_MULTI_SELECT" => "Y",
          "MENU_CACHE_TYPE" => "Y",
          "MENU_CACHE_TIME" => "2592000",
          "MENU_CACHE_USE_GROUPS" => "Y",
          "MENU_CACHE_GET_VARS" => ""
        )
      );?>
      <div class="footer__catalog">
        <?$APPLICATION->IncludeComponent("bitrix:menu","footer-catalog",Array(
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
        <?$APPLICATION->IncludeComponent("bitrix:menu","footer-catalog",Array(
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
        <?$APPLICATION->IncludeComponent("bitrix:menu","footer-catalog",Array(
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
        <?$APPLICATION->IncludeComponent("bitrix:menu","footer-catalog",Array(
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
        );?><?php
        $contacts = $_SESSION['CONTACTS'];
        //$contacts
        //PROPERTY_43    Телефон
        //PROPERTY_44    Адрес
        //PROPERTY_45    e-mail
        //PROPERTY_177   skype
        //NAME           Город
//        print_r($contacts);
        ?>
      </div>
      <div class="footer__info">
        <div class="footer__logo"></div>
        <div class="footer__contacts"><span><?=$contacts['NAME'];//Имя города?></span>, <?=$contacts['PROPERTY_ADDRESS_VALUE'];//Адрес офиса?> (<a href="/contacts/">схема проезда</a>) <?=$contacts['PROPERTY_PHONES_VALUE'][0];//Телефон (первый) ?> <a href="mailto:<?=$contacts['PROPERTY_EMAIL_VALUE'];//e-mail ?>"><?=$contacts['PROPERTY_EMAIL_VALUE'];//e-mail ?></a></div>
      </div>
    </footer>
    <?endif;?>
  </div>
<script src="<?=SITE_TEMPLATE_PATH;?>/js/lib/head.js" data-headjs-load="<?=SITE_TEMPLATE_PATH;?>/js/init.js"></script>
</body>
</html>