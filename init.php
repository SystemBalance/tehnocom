<?
AddEventHandler("main", "OnAfterUserRegister", Array("MyClass", "OnAfterUserRegisterHandler"));
class MyClass
{
   function OnAfterUserRegisterHandler(&$arFields)
	{
	     $message = "Информационное сообщение сайта Интернет-магазин\n";
	     $message.="Ваш логин: ".$arFields["LOGIN"]."\nВаш парол: ".$arFields["PASSWORD"]."\n";
	     mail($arFields["EMAIL"], 'Регистрационные данные с сайта shop.ru', $message, 'sale@shop.ru');
	}
}
?>