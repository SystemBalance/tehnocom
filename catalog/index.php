<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Каталог");
if (LEVEL == 1) $sectionViewMode = "TILE";
else $sectionViewMode = "TEXT";
?>
  <div class="d_space"></div>
<?if(LEVEL==1):?>
  <div class="title-line"><span>Полный каталог товаров</span></div>
  <div class="d_decription">
    <p>Объединяем лучшее!</p>
    <span>Техноком — крупный дистрибьютор известных зарубежных и отечественных брендов в области пневматики и гидравлики. Основным направлением деятельности является поставка запасных частей и расходных материалов для лесозаготовительной и дорожно-строительной техники.</span>
    <div>
      <a href="#" title="" class="d_sertificat">Сертификаты</a>
      <a href="#" title="" class="d_discount">Товары со скидкой</a>
    </div>
  </div>
<?else:?>
  <?$APPLICATION->IncludeComponent("bitrix:breadcrumb","breadcrumb-left",Array(
      "START_FROM" => "0",
      "PATH" => "",
      "SITE_ID" => "TE"
    )
  );?>
<?endif;?>
<?$APPLICATION->IncludeComponent("bitrix:catalog", "catalog", Array(
    "IBLOCK_TYPE" => "catalog",	// Тип инфоблока
    "IBLOCK_ID" => "13",	// Инфоблок
    "RUBRICS_IBLOCK_ID" => "16",
    "HIDE_NOT_AVAILABLE" => "N",
    "BASKET_URL" => "/personal/cart/",	// URL, ведущий на страницу с корзиной покупателя
    "ACTION_VARIABLE" => "action",	// Название переменной, в которой передается действие
    "PRODUCT_ID_VARIABLE" => "id",	// Название переменной, в которой передается код товара для покупки
    "SECTION_ID_VARIABLE" => "SECTION_ID",	// Название переменной, в которой передается код группы
    "PRODUCT_QUANTITY_VARIABLE" => "quantity",	// Название переменной, в которой передается количество товара
    "ADD_PROPERTIES_TO_BASKET" => "Y",	// Добавлять в корзину свойства товаров и предложений
    "PRODUCT_PROPS_VARIABLE" => "prop",	// Название переменной, в которой передаются характеристики товара
    "PARTIAL_PRODUCT_PROPERTIES" => "Y",	// Разрешить добавлять в корзину товары, у которых заполнены не все характеристики
    "SEF_MODE" => "Y",	// Включить поддержку ЧПУ
    "SEF_FOLDER" => "/catalog/",	// Каталог ЧПУ (относительно корня сайта)
    "AJAX_MODE" => "N",	// Включить режим AJAX
    "AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
    "AJAX_OPTION_STYLE" => "Y",	// Включить подгрузку стилей
    "AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
    "CACHE_TYPE" => "A",	// Тип кеширования
    "CACHE_TIME" => "36000000",	// Время кеширования (сек.)
    "CACHE_FILTER" => "N",	// Кешировать при установленном фильтре
    "CACHE_GROUPS" => "Y",	// Учитывать права доступа
    "SET_TITLE" => "Y",	// Устанавливать заголовок страницы
    "SET_STATUS_404" => "Y",	// Устанавливать статус 404, если не найдены элемент или раздел
    "ADD_SECTIONS_CHAIN" => "Y",
    "ADD_ELEMENT_CHAIN" => "Y",	// Включать название элемента в цепочку навигации
    "USE_ELEMENT_COUNTER" => "Y",	// Использовать счетчик просмотров
    "USE_FILTER" => "N",	// Показывать фильтр
    "FILTER_NAME" => "",	// Фильтр
    "FILTER_FIELD_CODE" => array(	// Поля
      0 => "",
      1 => "",
    ),
    "FILTER_PROPERTY_CODE" => array(	// Свойства
      0 => "",
      1 => "",
    ),
    "FILTER_PRICE_CODE" => array(	// Тип цены
      0 => "",
    ),
    "FILTER_OFFERS_FIELD_CODE" => array(
      0 => "",
      1 => "",
      2 => "",
    ),
    "FILTER_OFFERS_PROPERTY_CODE" => array(
      0 => "",
      1 => "",
    ),
    "FILTER_VIEW_MODE" => "VERTICAL",	// Вид отображения умного фильтра
    "USE_REVIEW" => "Y",
    "MESSAGES_PER_PAGE" => "10",
    "USE_CAPTCHA" => "Y",
    "REVIEW_AJAX_POST" => "Y",
    "URL_TEMPLATES_READ" => "",
    "SHOW_LINK_TO_FORUM" => "Y",
    "POST_FIRST_MESSAGE" => "N",
    "USE_COMPARE" => "N",	// Использовать компонент сравнения
    "PRICE_CODE" => array(	// Тип цены
      0 => "",
    ),
    "USE_PRICE_COUNT" => "N",	// Использовать вывод цен с диапазонами
    "SHOW_PRICE_COUNT" => "1",	// Выводить цены для количества
    "PRICE_VAT_INCLUDE" => "Y",	// Включать НДС в цену
    "PRICE_VAT_SHOW_VALUE" => "N",	// Отображать значение НДС
    "PRODUCT_PROPERTIES" => "",	// Характеристики товара, добавляемые в корзину
    "USE_PRODUCT_QUANTITY" => "Y",	// Разрешить указание количества товара
    "CONVERT_CURRENCY" => "Y",
    "CURRENCY_ID" => "RUB",
    "OFFERS_CART_PROPERTIES" => array(
      0 => "",
      1 => "",
      2 => "",
    ),
    "SHOW_TOP_ELEMENTS" => "N",	// Выводить топ элементов
    "SECTION_COUNT_ELEMENTS" => "N",	// Показывать количество элементов в разделе
    "SECTION_TOP_DEPTH" => "3",	// Максимальная отображаемая глубина разделов
    "SECTIONS_VIEW_MODE" => $sectionViewMode,	// Вид списка подразделов
    "SECTIONS_SHOW_PARENT_NAME" => "Y",	// Показывать название раздела
    "PAGE_ELEMENT_COUNT" => "15",	// Количество элементов на странице
    "LINE_ELEMENT_COUNT" => "3",	// Количество элементов, выводимых в одной строке таблицы
    "ELEMENT_SORT_FIELD" => "sort",	// По какому полю сортируем товары в разделе
    "ELEMENT_SORT_ORDER" => "asc",	// Порядок сортировки товаров в разделе
    "ELEMENT_SORT_FIELD2" => "id",	// Поле для второй сортировки товаров в разделе
    "ELEMENT_SORT_ORDER2" => "desc",	// Порядок второй сортировки товаров в разделе
    "LIST_PROPERTY_CODE" => array(	// Свойства
      1 => "ARTICLE",
      2 => "PRODUCTION",
      3 => "H2",
      4 => "H3",
      5 => "KB_URL",
      6 => "PRICE1",
      7 => "PRICE2",
      8 => "PRICE3",
      9 => "PRICE4",
      10 => "PHOTOS",
      11 => "VIDEO_YOUTUBE",
    ),
    "INCLUDE_SUBSECTIONS" => "Y",	// Показывать элементы подразделов раздела
    "LIST_META_KEYWORDS" => "",	// Установить ключевые слова страницы из свойства раздела
    "LIST_META_DESCRIPTION" => "",	// Установить описание страницы из свойства раздела
    "LIST_BROWSER_TITLE" => "",	// Установить заголовок окна браузера из свойства раздела
    "LIST_OFFERS_FIELD_CODE" => array(
      0 => "",
      1 => "",
      2 => "",
      3 => "",
    ),
    "LIST_OFFERS_PROPERTY_CODE" => array(
      0 => "",
      1 => "",
      2 => "",
      3 => "",
      4 => "",
      5 => "",
    ),
    "LIST_OFFERS_LIMIT" => "0",
    "DETAIL_PROPERTY_CODE" => array(	// Свойства
      1 => "ARTICLE",
      2 => "PRODUCTION",
      3 => "H2",
      4 => "H3",
      5 => "KB_URL",
      6 => "PRICE1",
      7 => "PRICE2",
      8 => "PRICE3",
      9 => "PRICE4",
      10 => "PHOTOS",
      11 => "VIDEO_YOUTUBE",
    ),
    "DETAIL_META_KEYWORDS" => "KEYWORDS",	// Установить ключевые слова страницы из свойства
    "DETAIL_META_DESCRIPTION" => "META_DESCRIPTION",	// Установить описание страницы из свойства
    "DETAIL_BROWSER_TITLE" => "TITLE",	// Установить заголовок окна браузера из свойства
    "DETAIL_OFFERS_FIELD_CODE" => array(
      0 => "",
      1 => "",
    ),
    "DETAIL_OFFERS_PROPERTY_CODE" => array(
      0 => "",
      1 => "",
      2 => "",
      3 => "",
      4 => "",
      5 => "",
    ),
    "SECTION_FIELDS" => array(
      "UF_SECTION"
    ),
    "LINK_IBLOCK_TYPE" => "",	// Тип инфоблока, элементы которого связаны с текущим элементом
    "LINK_IBLOCK_ID" => "",	// ID инфоблока, элементы которого связаны с текущим элементом
    "LINK_PROPERTY_SID" => "",	// Свойство, в котором хранится связь
    "LINK_ELEMENTS_URL" => "link.php?PARENT_ELEMENT_ID=#ELEMENT_ID#",	// URL на страницу, где будет показан список связанных элементов
    "USE_ALSO_BUY" => "Y",
    "ALSO_BUY_ELEMENT_COUNT" => "3",
    "ALSO_BUY_MIN_BUYES" => "2",
    "USE_STORE" => "Y",	// Показывать блок "Количество товара на складе"
    "USE_STORE_PHONE" => "Y",
    "USE_STORE_SCHEDULE" => "Y",
    "USE_MIN_AMOUNT" => "N",
    "STORE_PATH" => "/store/#store_id#",
    "MAIN_TITLE" => "Наличие на складах",
    "OFFERS_SORT_FIELD" => "sort",
    "OFFERS_SORT_ORDER" => "asc",
    "OFFERS_SORT_FIELD2" => "id",
    "OFFERS_SORT_ORDER2" => "desc",
    "PAGER_TEMPLATE" => "arrows",	// Шаблон постраничной навигации
    "DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
    "DISPLAY_BOTTOM_PAGER" => "Y",	// Выводить под списком
    "PAGER_TITLE" => "Товары",	// Название категорий
    "PAGER_SHOW_ALWAYS" => "N",	// Выводить всегда
    "PAGER_DESC_NUMBERING" => "N",	// Использовать обратную навигацию
    "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000000",	// Время кеширования страниц для обратной навигации
    "PAGER_SHOW_ALL" => "N",	// Показывать ссылку "Все"
    "ADD_PICT_PROP" => "-",	// Дополнительная картинка основного товара
    "LABEL_PROP" => "NEWPRODUCT",	// Свойство меток товара
    "PRODUCT_DISPLAY_MODE" => "Y",
    "OFFER_ADD_PICT_PROP" => "MORE_PHOTO",
    "OFFER_TREE_PROPS" => array(
      0 => "COLOR_REF",
      1 => "SIZES_SHOES",
      2 => "SIZES_CLOTHES",
      3 => "",
    ),
    "DETAIL_DISPLAY_NAME" => "Y",	// Выводить название элемента
    "DETAIL_ADD_DETAIL_TO_SLIDER" => "N",	// Добавлять детальную картинку в слайдер
    "SHOW_DISCOUNT_PERCENT" => "Y",
    "SHOW_OLD_PRICE" => "Y",
    "DETAIL_SHOW_MAX_QUANTITY" => "N",
    "MESS_BTN_BUY" => "Купить",	// Текст кнопки "Купить"
    "MESS_BTN_ADD_TO_BASKET" => "В корзину",	// Текст кнопки "Добавить в корзину"
    "MESS_BTN_COMPARE" => "Сравнение",	// Текст кнопки "Сравнение"
    "MESS_BTN_DETAIL" => "Подробнее",	// Текст кнопки "Подробнее"
    "MESS_NOT_AVAILABLE" => "Нет в наличии",	// Сообщение об отсутствии товара
    "TOP_VIEW_MODE" => "SECTION",
    "DETAIL_USE_VOTE_RATING" => "Y",	// Включить рейтинг товара
    "DETAIL_VOTE_DISPLAY_AS_RATING" => "rating",	// В качестве рейтинга показывать
    "DETAIL_USE_COMMENTS" => "Y",
    "DETAIL_BLOG_USE" => "Y",
    "DETAIL_VK_USE" => "N",
    "DETAIL_FB_USE" => "Y",
    "DETAIL_FB_APP_ID" => "",
    "DETAIL_BRAND_USE" => "N",
    "AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
    "SEF_URL_TEMPLATES" => array(
      "sections" => "",
      "section" => "#SECTION_CODE#/",
      "element" => "#SECTION_CODE#/#ELEMENT_ID#/",
      "compare" => "",
    )
  ),
  false
);?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>