<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("–егистраци€");
?> 
<div class="d_space"></div>
 
<div class="title-line"> 
  <h1>–егистраци€</h1>
 </div>
 
<div class="d_reg-bg"> 
  <div class="d_regtext"> 
    <div class="d_regbox1"> 
      <p>„то мне даст регистраци€?</p>
     
      <ul> 
        <li>ѕолучите начальную <a href="#" >скидку 3%</a> заполнив все пол€ при регистрации</li>
       
        <li>Ёкономьте благодара€ системе накопительных скидок</li>
       
        <li> онтролируйте свои заказы и отслеживайте их состо€ние</li>
       
        <li>ѕолучайте самые свежие новости о товарах, новинках и распродажах</li>
       
        <li><strong>ѕерсональный менеджер доступен по любым видам св€зи и всегда в курсе дела</strong> </li>
       </ul>
     </div>
   
    <div class="d_regbox2"> 
      <p>Ёто займет всего минуту!</p>
     
      <ul> 
        <li>ѕросто заполните форму чуть ниже и станте зарегистрированным клиентом нашего магазина</li>
       
        <li>–егистрацию можно пройти и частным <strong>лицам и организаци€м</strong>. Ќаши специалисты найдут и индивидуальный, и комплексный подход к любому вопросу</li>
       
        <li>Ёто займет всего <strong>1-2 минуты</strong>, после чего вы получите доступ к личному кабинету</li>
       </ul>
     </div>
   </div>
	<div>

</div>
  <div class="d_regtabs"> <button class="d_pushone"><span>я частное лицо</span></button> <button class="d_pushtwo"><span>я представл€ю 
        <br />
       организацию</span></button> 
    <div class="d_box1"> 
<?$APPLICATION->IncludeComponent("bitrix:main.register","fiz",Array(
        "USER_PROPERTY_NAME" => "", 
        "SEF_MODE" => "Y", 
        "SHOW_FIELDS" => Array("NAME", "PERSONAL_PHONE", "PERSONAL_CITY"), 
        "REQUIRED_FIELDS" => Array("NAME", "PERSONAL_PHONE", "PERSONAL_CITY"), 
        "AUTH" => "Y", 
        "USE_BACKURL" => "Y", 
        "SUCCESS_PAGE" => "", 
        "SET_TITLE" => "Y", 
        "USER_PROPERTY" => Array(), 
        "SEF_FOLDER" => "/", 
        "VARIABLE_ALIASES" => Array()
    )
);?> 
</div>
   
    <div class="d_box2"> 
<?$APPLICATION->IncludeComponent("bitrix:main.register","jur",Array(
        "USER_PROPERTY_NAME" => "", 
        "SEF_MODE" => "Y", 
        "SHOW_FIELDS" => Array("NAME", "PERSONAL_PHONE", "PERSONAL_CITY", "WORK_COMPANY"), 
        "REQUIRED_FIELDS" => Array("NAME", "PERSONAL_PHONE", "PERSONAL_CITY", "WORK_COMPANY"), 
        "AUTH" => "Y", 
        "USE_BACKURL" => "Y", 
        "SUCCESS_PAGE" => "", 
        "SET_TITLE" => "Y", 
        "USER_PROPERTY" => Array("UF_LEGAL","UF_DETAILS"), 
        "SEF_FOLDER" => "/", 
        "VARIABLE_ALIASES" => Array()
    )
);?> 
 </div>
   </div>
 </div>
 <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>