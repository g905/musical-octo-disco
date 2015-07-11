<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

	// Получаем детальный текст элемента
	$obElement = CIBlockElement::GetByID($arResult["ID"]);
 	if ($arEl = $obElement->GetNext())
		$detail = $arEl["DETAIL_TEXT"];

	// Форма заказа
	if (strpos($detail, "<!--form-here-->") !== false) {
			$APPLICATION->IncludeComponent(
				"fake:main.feedback",
				"",
				Array(
					"USE_CAPTCHA" => "N",
					"OK_TEXT" => "Спасибо, ваше сообщение принято.",
					"EMAIL_TO" => "3412558963@mail.ru",
					"REQUIRED_FIELDS" => array("NAME","PHONE","MESSAGE"),
					"EVENT_MESSAGE_ID" => array("7")
				)
			);
	}
?>
