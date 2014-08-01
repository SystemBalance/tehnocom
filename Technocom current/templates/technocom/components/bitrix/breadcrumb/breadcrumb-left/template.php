
<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
if (CHTTP::GetLastStatus() == "404 Not Found") return;
if (isset($arResult[3]) && $arResult[3]["TITLE"]==$arResult[2]["TITLE"]) {
  unset($arResult[3]);
  unset($arResult[2]["LINK"]);
}
//delayed function must return a string
if(empty($arResult))
	return "";
	
$strReturn = '<div class="d_crumbs">';

$num_items = count($arResult);
for($index = 0, $itemSize = $num_items; $index < $itemSize; $index++)
{
	$title = htmlspecialcharsex($arResult[$index]["TITLE"]);
	
	if($arResult[$index]["LINK"] <> "" && $index != $itemSize-1)
		$strReturn .= '<a href="'.$arResult[$index]["LINK"].'">'.$title.'</a> > ';
	else
		$strReturn .= '<span>'.$title.'</span>';
}

$strReturn .= '</div>';

return $strReturn;
?>