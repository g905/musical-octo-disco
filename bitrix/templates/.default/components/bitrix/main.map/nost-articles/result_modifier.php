<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
// adl 01.10.13 ��������� ������ ���� �� ������ "����������"
foreach($arResult["arMapStruct"] as $index => $arItem) {

	if ($arItem["FULL_PATH"] != "/information/")
		unset($arResult["arMapStruct"][$index]);

}

?>