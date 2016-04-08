<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
    <div class="contenttext-item">
        <div>
            <h1><?=$arResult["NAME"]?></h1>
            <div class="itemstext"><?=$arResult["DETAIL_TEXT"]?></div>
        </div>
    </div>
<?$APPLICATION->IncludeComponent( "coffeediz:schema.org.Article",
	"",
	Array(
		"COMPONENT_TEMPLATE" => ".default",
		"SHOW" => "Y",
		"TYPE" => "",
		"LEARNING_RESOURCE_TYPE" => "",
		"NAME" => $arResult["NAME"],
		"ARTICLEBODY" => $arResult["DETAIL_TEXT"],
		"ABOUT" => $arResult["DETAIL_TEXT"],
		"GENRE" => "",
		"ARTICLE_SECTION" => array(""),
		"KEYWORDS" => array(""),
		"IN_LANGUAGE" => "ru",
		"DATA_PUBLISHED" => "",
		"AUTHOR_TYPE" => "",
		"PARAM_RATING_SHOW" => "N",
	),
	false,
	array('HIDE_ICONS' => 'Y')
);?>