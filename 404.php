<?
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');
CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Ошибка 404");
?>
  <div class="page_not">
  <div class="text_err">404</div>
  <div class="title-not">Такой страницы не существует <br/>или она была удалена</div>
  <div class="info_search">Воспользуйтесь поиском или выберете интересующий раздел.</div>
  <div class="catalog__top">
    <div class="catalog__search">
      <input type="text" class="input" placeholder="Введите название или код товара">
    </div>
    <button class="btn">Найти</button>
  </div>
  <!-- BEGIN footer -->
  <footer class="footer not_found">
    <div class="footer__catalog not_found">
      <ul>
        <li><a href="#">Харвестеры и форвардеры</a></li>
        <li><a href="#">Мульчеры</a></li>
        <li><a href="#">Краноманипуляторные установки</a></li>
        <li><a href="#">Погрузочно-разгрузочные механизмы</a></li>
        <li><a href="#">Рубительные машины</a></li>
        <li><a href="#">Харвестерные головы</a></li>
        <li><a href="#">Пильные шины, цепи и аксессуары</a></li>
        <li><a href="#">Ротаторы и подвески</a></li>
        <li><a href="#">Грейферы</a></li>
        <li><a href="#">Распределители</a></li>
      </ul>
      <ul>
        <li><a href="#">Гидравлические РВД</a></li>
        <li><a href="#">Промышленные шланги</a></li>
        <li><a href="#">Станки для сборки РВД</a></li>
        <li><a href="#">Защитные спирали</a></li>
        <li><a href="#">Адаптеры</a></li>
        <li><a href="#">Арматура (муфты и фитинги)</a></li>
        <li><a href="#">Трубные соединения и крепеж</a></li>
        <li><a href="#">Аккумуляторы давления</a></li>
        <li><a href="#">Манометры</a></li>
        <li><a href="#">Быстроразъемные соединения (БРС)</a></li>
      </ul>
      <ul>
        <li><a href="#">Навесное оборудование для комунальной техники</a></li>
        <li><a href="#">Износостойкая сталь</a></li>
        <li><a href="#">Фары и лампы</a></li>
        <li><a href="#">Шины колесные</a></li>
        <li><a href="#">Цепи противоскольжения</a></li>
        <li><a href="#">Гусеницы и моногусеницы</a></li>
        <li><a href="#">Заготовки штоков и гильз</a></li>
        <li><a href="#">Насосы и моторы</a></li>
        <li><a href="#">Уплотнения</a></li>
        <li><a href="#">Подшипники</a></li>
      </ul>
      <ul>
        <li><a href="#">Клапаны и гидрозамки</a></li>
        <li><a href="#">Масло и смазки</a></li>
        <li><a href="#">Смазочный инструмент</a></li>
        <li><a href="#">Топливозаправочный инструмент</a></li>
        <li><a href="#">Фильтры</a></li>
        <li><a href="#">Приборы диагностики</a></li>
        <li><a href="#">Ремонтные составы</a></li>
        <li><a href="#">Хомуты</a></li>
        <li><a href="#">Метизы</a></li>
        <li><a href="#">Товары со скидкой</a></li>
      </ul>
    </div>
  </footer>
  <!-- END footer -->
<?
$APPLICATION->IncludeFile(
  SITE_TEMPLATE_PATH."/include/cycle.php",
  array(
    "CAPTION_TYPE"=>"LINE-BLUE",
    "CAPTION_NAME"=>"Вам может быть интересно"
  )
);
?>
<?
$APPLICATION->IncludeFile(
  SITE_TEMPLATE_PATH."/include/cycle.php",
  array("CAPTION_TYPE"=>"LINE-YELLOW")
);
?>
  </div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>