<?
AddEventHandler("main", "OnAfterUserRegister", Array("MyClass", "OnAfterUserRegisterHandler"));
class MyClass
{
    function OnAfterUserRegisterHandler(&$arFields)
    {
        $arEventFields= array(
            "LOGIN" => $arFields["LOGIN"],
            "NAME" => $arFields["NAME"],
            "LAST_NAME" => $arFields["LAST_NAME"],
            "PASSWORD" => $arFields["PASSWORD"],
            "EMAIL" => $arFields["EMAIL"],
            "SERVER_NAME" => "tehnocom.net",
        );
        CEvent::Send("MAIN_USER_INFO", SITE_ID, $arEventFields, "N", 2);
    }
}
?>