<?
// adl 03.08.14 Скрываем лишние пункты меню "Информация"
foreach ($arResult as $key=>$res) {
	if ((strpos($res["LINK"], "/information/") !== false)&&($res["IS_PARENT"]<> 1)) {
		unset($arResult[$key]);
	}
}
?>