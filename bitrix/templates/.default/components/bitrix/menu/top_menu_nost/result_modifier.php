<?
// adl 03.08.14 ���뢠�� ��譨� �㭪�� ���� "���ଠ��"
foreach ($arResult as $key=>$res) {
	if ((strpos($res["LINK"], "/information/") !== false)&&($res["IS_PARENT"]<> 1)) {
		unset($arResult[$key]);
	}
}
?>