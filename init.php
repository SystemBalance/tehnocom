<?
AddEventHandler("main", "OnAfterUserRegister", Array("MyClass", "OnAfterUserRegisterHandler"));
class MyClass
{
   function OnAfterUserRegisterHandler(&$arFields)
	{
	     $message = "�������������� ��������� ����� ��������-�������\n";
	     $message.="��� �����: ".$arFields["LOGIN"]."\n��� �����: ".$arFields["PASSWORD"]."\n";
	     mail($arFields["EMAIL"], '��������������� ������ � ����� shop.ru', $message, 'sale@shop.ru');
	}
}
?>