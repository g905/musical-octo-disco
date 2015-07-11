<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
// adl 26.07.14 Переходим на ЧПУ, поэтому SECTION_ID нужно получать спец. функцией
$curSectionID = CIBlockFindTools::GetSectionID(
    $arResult["VARIABLES"]["SECTION_ID"],
    $arResult["VARIABLES"]["SECTION_CODE"],
    array("IBLOCK_ID" => $arParams["IBLOCK_ID"])
);
   
$arFilter = Array(
	"SECTION_ID"=>$curSectionID/*$arResult["VARIABLES"]["SECTION_ID"]*/
);
?>

<?if(CModule::IncludeModule("iblock")):?>

            <div class="nav">

<?$APPLICATION->IncludeComponent(
	"bitrix:breadcrumb",
	"romack",
	Array(
		"START_FROM" => "0",
		"PATH" => "",
		"SITE_ID" => "-"
	),
false
);?>    
            
            </div>


<?if (CIBlockSection::GetCount($arFilter)>0):?>
<?
// adl 02.10.13 Фильтр по категориям
	$APPLICATION->IncludeComponent(
	"bitrix:catalog.section.list",
	"romack-filter",
	Array(
		"IBLOCK_TYPE" => "products",
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		"SECTION_ID" => $curSectionID/*$arResult["VARIABLES"]["SECTION_ID"]*/,
		"SECTION_CODE" => "",
		"SECTION_URL" => "",
		"COUNT_ELEMENTS" => "Y",
		"TOP_DEPTH" => "1",
		"SECTION_FIELDS" => array("NAME", "SORT", "DESCRIPTION", "PICTURE", "DETAIL_PICTURE"),
		"SECTION_USER_FIELDS" => array(),
		"ADD_SECTIONS_CHAIN" => "Y",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_NOTES" => "",
		"CACHE_GROUPS" => "Y",
		"ITEMS_IN_ROW" => 8,
		"MAIN_PATH" => "/products/".$arResult["VARIABLES"]["SECTION_CODE"]/*$arResult["VARIABLES"]["SECTION_ID"]*/."/",
		"CUR_PATH" => "/products/".$arResult["VARIABLES"]["SECTION_CODE"]/*$arResult["VARIABLES"]["SECTION_ID"]*/."/"
	)
	);
?>
<?              
// adl 02.09.13 Выводим все подкатегории с товарами(для категории шашек)
$APPLICATION->IncludeComponent(
	"bitrix:catalog.sections.top",
	"romack",
	Array(
		"IBLOCK_TYPE" => "products",
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		"SECTION_FIELDS" => array(),
		"SECTION_USER_FIELDS" => array(),
		"SECTION_SORT_FIELD" => "sort",
		"SECTION_SORT_ORDER" => "asc",
		"ELEMENT_SORT_FIELD" => "sort",
		"ELEMENT_SORT_ORDER" => "asc",
		"FILTER_NAME" => "arrFilter",
		"SECTION_URL" => "/products/#SECTION_CODE_PATH#/",
		"DETAIL_URL" => "/products/#SECTION_CODE_PATH#/#ELEMENT_CODE#.html",
		"BASKET_URL" => "/personal/basket.php",
		"ACTION_VARIABLE" => "action",
		"PRODUCT_ID_VARIABLE" => "id",
		"PRODUCT_QUANTITY_VARIABLE" => "quantity",
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"SECTION_ID_VARIABLE" => "SECTION_ID",
		"DISPLAY_COMPARE" => "N",
		"SECTION_COUNT" => "20",
		"ELEMENT_COUNT" => "500",
		"LINE_ELEMENT_COUNT" => "4",
		"PROPERTY_CODE" => array("COLOR", "SIZE", "DISCOUNT_TABLE"),
		"PRICE_CODE" => array(),
		"USE_PRICE_COUNT" => "N",
		"SHOW_PRICE_COUNT" => "1",
		"PRICE_VAT_INCLUDE" => "Y",
		"PRODUCT_PROPERTIES" => array(),
		"USE_PRODUCT_QUANTITY" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"SECTION_ID" => $curSectionID/*$arResult["VARIABLES"]["SECTION_ID"]*/
	)
);
?>
<?else:?>
<?if($arParams["USE_FILTER"]=="Y"):?>
<?$APPLICATION->IncludeComponent(
	"bitrix:catalog.filter",
	"",
	Array(
		"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		"FILTER_NAME" => $arParams["FILTER_NAME"],
		"FIELD_CODE" => $arParams["FILTER_FIELD_CODE"],
 		"PROPERTY_CODE" => $arParams["FILTER_PROPERTY_CODE"],
		"PRICE_CODE" => $arParams["FILTER_PRICE_CODE"],
		"CACHE_TYPE" => $arParams["CACHE_TYPE"],
		"CACHE_TIME" => $arParams["CACHE_TIME"],
		"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
	),
	$component
);
?>
<br />
<?endif?>
<?if($arParams["USE_COMPARE"]=="Y"):?>
<?$APPLICATION->IncludeComponent(
	"bitrix:catalog.compare.list",
	"",
	Array(
		"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		"NAME" => $arParams["COMPARE_NAME"],
		"DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["element"],
		"COMPARE_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["compare"],
	),
	$component
);?>
<br />
<?endif?>
<? if ($arParams["IBLOCK_TYPE"]=="articles")
	$template = "romack-articles";
   else
	$template = "romack";?>

<?if(CModule::IncludeModule("iblock")):?>
<? //adl 02.10.13 Получаем родительскую категорию текущей подкатегории
	$arFilter1["ID"] = $curSectionID/*$arResult["VARIABLES"]["SECTION_ID"]*/;
	$rsSections = CIBlockSection::GetList(array(), $arFilter1, $arSelect);
	$arRes["SECTION"] = $rsSections->GetNext();
	$mainID = $arRes["SECTION"]["IBLOCK_SECTION_ID"]; 
	$sResult = CIBlockSection::GetByID($mainID);
	if($sArResult = $sResult->GetNext()) {
		$mainCode = $sArResult["CODE"];
	}
?>
<? // adl 02.10.13 Только для подкатегорий выводим фильтр, для главных категорий не надо
if ($mainCode != null):
?>
<?                                         
// adl 02.10.13 Фильтр по категориям
	$APPLICATION->IncludeComponent(
	"bitrix:catalog.section.list",
	"romack-filter",
	Array(
		"IBLOCK_TYPE" => "products",
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		"SECTION_ID" => $mainID,
		"SECTION_CODE" => "",
		"SECTION_URL" => "",
		"COUNT_ELEMENTS" => "Y",
		"TOP_DEPTH" => "1",
		"SECTION_FIELDS" => array("NAME", "SORT", "DESCRIPTION", "PICTURE", "DETAIL_PICTURE"),
		"SECTION_USER_FIELDS" => array(),
		"ADD_SECTIONS_CHAIN" => "Y",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_NOTES" => "",
		"CACHE_GROUPS" => "Y",
		"ITEMS_IN_ROW" => 8,
		"MAIN_PATH" => "/products/".$mainCode."/",
		"CUR_PATH" => "/products/".$mainCode."/".$arResult["VARIABLES"]["SECTION_CODE"]/*$arResult["VARIABLES"]["SECTION_ID"]*/."/"
	)
	);
?>
<?endif?>
<?
	// adl 28.09.14 Добавляем название категории в хлебные крошки
	$APPLICATION -> AddChainItem($arRes["SECTION"]["NAME"]);
?>
<?endif?>


<?$APPLICATION->IncludeComponent(
	"bitrix:catalog.section",
	$template,
	Array(
		"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		"ELEMENT_SORT_FIELD" => $arParams["ELEMENT_SORT_FIELD"],
		"ELEMENT_SORT_ORDER" => $arParams["ELEMENT_SORT_ORDER"],
 		"PROPERTY_CODE" => $arParams["LIST_PROPERTY_CODE"],
		"META_KEYWORDS" => $arParams["LIST_META_KEYWORDS"],
		"META_DESCRIPTION" => $arParams["LIST_META_DESCRIPTION"],
		"BROWSER_TITLE" => $arParams["LIST_BROWSER_TITLE"],
		"INCLUDE_SUBSECTIONS" => $arParams["INCLUDE_SUBSECTIONS"],
		"BASKET_URL" => $arParams["BASKET_URL"],
		"ACTION_VARIABLE" => $arParams["ACTION_VARIABLE"],
		"PRODUCT_ID_VARIABLE" => $arParams["PRODUCT_ID_VARIABLE"],
		"SECTION_ID_VARIABLE" => $arParams["SECTION_ID_VARIABLE"],
		"FILTER_NAME" => $arParams["FILTER_NAME"],
		"DISPLAY_PANEL" => $arParams["DISPLAY_PANEL"],
		"CACHE_TYPE" => $arParams["CACHE_TYPE"],
		"CACHE_TIME" => $arParams["CACHE_TIME"],
		"CACHE_FILTER" => $arParams["CACHE_FILTER"],
		"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
		"SET_TITLE" => $arParams["SET_TITLE"],
		"SET_STATUS_404" => $arParams["SET_STATUS_404"],
		"DISPLAY_COMPARE" => $arParams["USE_COMPARE"],
		"PAGE_ELEMENT_COUNT" => $arParams["PAGE_ELEMENT_COUNT"],
		"LINE_ELEMENT_COUNT" => $arParams["LINE_ELEMENT_COUNT"],
		"PRICE_CODE" => $arParams["PRICE_CODE"],
		"USE_PRICE_COUNT" => $arParams["USE_PRICE_COUNT"],
		"SHOW_PRICE_COUNT" => $arParams["SHOW_PRICE_COUNT"],

		"PRICE_VAT_INCLUDE" => $arParams["PRICE_VAT_INCLUDE"],

		"DISPLAY_TOP_PAGER" => $arParams["DISPLAY_TOP_PAGER"],
		"DISPLAY_BOTTOM_PAGER" => $arParams["DISPLAY_BOTTOM_PAGER"],
		"PAGER_TITLE" => $arParams["PAGER_TITLE"],
		"PAGER_SHOW_ALWAYS" => $arParams["PAGER_SHOW_ALWAYS"],
		"PAGER_TEMPLATE" => $arParams["PAGER_TEMPLATE"],
		"PAGER_DESC_NUMBERING" => $arParams["PAGER_DESC_NUMBERING"],
		"PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
		"PAGER_SHOW_ALL" => $arParams["PAGER_SHOW_ALL"],

		"SECTION_ID" => $curSectionID/*$arResult["VARIABLES"]["SECTION_ID"]*/,
		"SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
		"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
		"DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["element"],
	),
	$component
);
?>
<?endif?>
<?endif?>