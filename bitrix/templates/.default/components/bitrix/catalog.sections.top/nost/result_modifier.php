<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
// adl 02.09.13 ��������� ������ ������������ ��������� � ������� �� ���������
foreach ($arResult["SECTIONS"] as $k => $arSection)
{
	if ($arSection["IBLOCK_SECTION_ID"] == $arParams["SECTION_ID"]) {
		$arResult["SECTIONS"][$k] = $arSection;
}	else
		unset($arResult["SECTIONS"][$k]);
}
?>