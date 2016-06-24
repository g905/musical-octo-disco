<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Оформить заказ");
?> 
            <div class="nav">

<?$APPLICATION->IncludeComponent(
	"bitrix:breadcrumb",
	"nost",
	Array(
		"START_FROM" => "0",
		"PATH" => "",
		"SITE_ID" => "-"
	),
false
);?>    
            
            </div>

Для оформления заказа воспользуйтесь приведенной ниже формой или пришлите заявку на электронную почту. 
Наш E-mail: <b>558963@nost.ru</b>.  На любой Ваш вопрос Вам ответят менеджеры клиентского отдела, телефон горячей линии <b>8-800-700-66-78</b>
звонок по РФ бесплатный.
<br/>
<br/>


<?$APPLICATION->IncludeComponent(
	"altasib:feedback.form",
	"nost",
	Array(
		"ACTIVE_ELEMENT" => "Y",
		"ADD_LEAD" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"ALX_CHECK_NAME_LINK" => "N",
		"BACKCOLOR_ERROR" => "#ffffff",
		"BBC_MAIL" => "info@101link.ru",
		"BORDER_RADIUS" => "3px",
		"CATEGORY_SELECT_NAME" => "Выберите категорию",
		"CHECK_ERROR" => "Y",
		"COLOR_ERROR" => "#8E8E8E",
		"COLOR_ERROR_TITLE" => "#A90000",
		"COLOR_HINT" => "#000000",
		"COLOR_INPUT" => "#727272",
		"COLOR_MESS_OK" => "#963258",
		"COLOR_NAME" => "#000000",
		"COMPONENT_TEMPLATE" => ".default",
		"EVENT_TYPE" => "ALX_FEEDBACK_FORM",
		"FB_TEXT_NAME" => "",
		"FB_TEXT_SOURCE" => "PREVIEW_TEXT",
		"FORM_ID" => "1",
		"HIDE_FORM" => "N",
		"IBLOCK_ID" => "11",
		"IBLOCK_TYPE" => "altasib_feedback",
		"IMG_ERROR" => "/upload/altasib.feedback.gif",
		"IMG_OK" => "/upload/altasib.feedback.ok.gif",
		"JQUERY_EN" => "N",
		"LOCAL_REDIRECT_ENABLE" => "Y",
		"LOCAL_REDIRECT_URL" => "/buy_now/thank_you.php",
		"MASKED_INPUT_PHONE" => array("PHONE"),
		"MESSAGE_OK" => "Сообщение отправлено!",
		"NAME_ELEMENT" => "ALX_DATE",
		"PROPERTY_FIELDS" => array("PHONE","FIO","EMAIL","FEEDBACK_TEXT", "PRODUCT", "COLOR", "MATERIAL", "QUANTITY", "OKLEYKA", "OKLEYKA_DESCR", "CITY", "PAYMENT", "REQUISITES"),
		"PROPERTY_FIELDS_REQUIRED" => array("PHONE"),
		"PROPS_AUTOCOMPLETE_EMAIL" => array(),
		"PROPS_AUTOCOMPLETE_NAME" => array(),
		"PROPS_AUTOCOMPLETE_PERSONAL_PHONE" => array(),
		"PROPS_AUTOCOMPLETE_VETO" => "N",
		"REWIND_FORM" => "N",
		"SECTION_MAIL_ALL" => "558963@nost.ru",
		"SEND_MAIL" => "N",
		"SHOW_MESSAGE_LINK" => "Y",
		"SIZE_HINT" => "10px",
		"SIZE_INPUT" => "12px",
		"SIZE_NAME" => "12px",
		"USERMAIL_FROM" => "Y",
		"USE_CAPTCHA" => "N",
		"WIDTH_FORM" => "50%"
	)
);?>

<?/*
<form class="jotform-form" action="http://submit.jotform.co/submit.php" method="post" name="form_32752235554858" id="32752235554858" accept-charset="utf-8">
  <input type="hidden" name="formID" value="32752235554858" />
  <div class="form-all">
    <ul class="form-section">
      <li id="cid_5" class="form-input-wide">
        <div class="form-header-group">
          <h1 id="header_5" class="form-header">
            Оформить заказ
          </h1>
        </div>
      </li>
      <li class="form-line" id="id_1">
        <label class="form-label-left" id="label_1" for="input_1">
          Модель<span class="form-required">*</span>
        </label>
        <div id="cid_1" class="form-input" style="width:660px;">
          <select class="form-dropdown validate[required]" style="width:530px" id="input_1" name="q1_input1">
<?if(CModule::IncludeModule("iblock")):?>
<? // adl 08.10.13 Получаем список всех товаров с ценами
	global $USER;
	$arSelect = Array();
	$arFilter = Array("IBLOCK_ID"=>"2", "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
	$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>1050), $arSelect);
	$i=0;
	$v=0;
	while($ob = $res->GetNextElement())
	{
	  $arFields["ITEMS"][$i] = $ob->GetFields();
	  $arFields["ITEMS"][$i]["PROPERTIES"] = $ob->GetProperties();
	  $arFields["ITEMS"][$i]["PRICE"] = number_format($arFields["ITEMS"][$i]["PROPERTIES"]["PRICE"]["VALUE"], 0, '.', ' '); 
	  $arFields["ITEMS"][$i]["PRICE"] .= " ".$arFields["ITEMS"][$i]["PROPERTIES"]["PRICECURRENCY"]["VALUE_ENUM"];
  	  $ar_groups = $ob->GetGroups();
	  // вытягиваем нужные нам данные
	  while($ob1 = $ar_groups->GetNextElement()) {
		$ob_group = $ob1->GetFields();
		$arRes[$v]["CATEGORY"] = $ob_group["NAME"];
		$arRes[$v]["NAME"] = $arFields["ITEMS"][$i]["NAME"];
		$arRes[$v]["SORT"] = $ob_group["SORT"] * 10000 + $arFields["ITEMS"][$i]["SORT"];
		$arRes[$v]["ID"] = $arFields["ITEMS"][$i]["ID"];
		$v++;
          }
	  $i++;          
	}

	// сортируем получившийся массив
	uasort($arRes, function($first, $second) {
		if ($first["SORT"] == $second["SORT"]) {
		return 0;
		}

		return ($first["SORT"] < $second["SORT"]) ? -1 : 1;
	});	
	// формируем список по отсортированным данным
	$name_cat = "";
	foreach($arRes as $arEl) {
		if ($name_cat != $arEl["CATEGORY"]) {
			$name_cat = $arEl["CATEGORY"];
?>
            <option value="null" style="font-weight:bold" disabled=""><?=$arEl["CATEGORY"]?></option>
            <option value="<?=$arEl["NAME"]?>(<?=$arEl["CATEGORY"]?>)" <?=($_POST["product_id"]==$arEl["ID"])?"selected":""?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$arEl["NAME"]?></option>
<?
		}
		else {
?>
            <option value="<?=$arEl["NAME"]?>(<?=$arEl["CATEGORY"]?>)" <?=($_POST["product_id"]==$arEl["ID"])?"selected":""?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$arEl["NAME"]?></option>
<?		}
?>
<?	}
?>
<?endif?>
          </select>
        </div>
      </li>
      <li class="form-line form-line-column" id="id_3" style="width:21%;">
        <label class="form-label-top" id="label_3" for="input_3">
          Цвет<span class="form-required">*</span>
        </label>
        <div id="cid_3" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_3_0" name="q3_input3" checked="checked" value="Оранжевый" />
              <label for="input_3_0"> Оранжевый </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_3_1" name="q3_input3" value="Белый" />
              <label for="input_3_1"> Белый </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_3_2" name="q3_input3" value="Желтый" />
              <label for="input_3_2"> Желтый </label></span><span class="clearfix"></span>
          </div>
        </div>
      </li>
      <li class="form-line form-line-column" id="id_4" style="width:22%;">
        <label class="form-label-top" id="label_4" for="input_4">
          Материал<span class="form-required">*</span>
        </label>
        <div id="cid_4" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_4_0" name="q4_input4" checked="checked" value="Полистирол" />
              <label for="input_4_0"> Полистирол </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_4_1" name="q4_input4" value="Поликарбонат" />
              <label for="input_4_1"> Поликарбонат </label></span><span class="clearfix"></span>
          </div>
        </div>
      </li>
      <li class="form-line form-line-column" id="id_7" style="width:22%;">
        <label class="form-label-top" id="label_7" for="input_7">
          Количество<span class="form-required">*</span>
        </label>
        <div id="cid_7" class="form-input-wide">
          <input type="number" id="input_7" name="q7_input7" data-type="input-spinner" class="form-spinner-input form-textbox validate[required]" data-spinnermin="10"/>
        </div>
      </li>
      <li class="form-line form-line-column" id="id_14" style="width:22%;">
        <label class="form-label-top" id="label_14" for="input_14">
          Количество<span class="form-required">*</span>
        </label>
        <div id="cid_14" class="form-input-wide">
          <input type="number" id="input_14" name="q14_input14" data-type="input-spinner" class="form-spinner-input form-textbox validate[required]" data-spinnermin="1" />
        </div>
      </li>
      <li class="form-line form-line-column" id="id_8" style="width:22%;">
        <label class="form-label-top" id="label_8" for="input_8">
          Доп. услуги<span class="form-required">*</span>
        </label>
        <div id="cid_8" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_8_0" name="q8_input8" checked="checked" value="Без оклейки" />
              <label for="input_8_0"> Без оклейки </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_8_1" name="q8_input8" value="С оклейкой" />
              <label for="input_8_1"> С оклейкой </label></span><span class="clearfix"></span>
          </div>
        </div>
      </li>
      <li class="form-line" id="id_9">
        <label class="form-label-left" id="label_9" for="input_9"> Комментарий по оклейке </label>
        <div id="cid_9" class="form-input" style="width:660px;">
          <textarea id="input_9" class="form-textarea" name="q9_input9" cols="79" rows="6"></textarea>
        </div>
      </li>
      <li class="form-line form-line-column form-line-column-clear" id="id_10">
        <label class="form-label-top" id="label_10" for="input_10">
          Ваше имя<span class="form-required">*</span>
        </label>
        <div id="cid_10" class="form-input-wide">
          <input type="text" class=" form-textbox validate[required]" data-type="input-textbox" id="input_10" name="q10_input10" size="38" value="" />
        </div>
      </li>
      <li class="form-line form-line-column" id="id_11">
        <label class="form-label-top" id="label_11" for="input_11">
          Ваш телефон, Город<span class="form-required">*</span>
        </label>
        <div id="cid_11" class="form-input-wide">
          <input type="text" class=" form-textbox validate[required]" data-type="input-textbox" id="input_11" name="q11_input11" size="38" value="" />
        </div>
      </li>
      <li class="form-line form-line-column" id="id_12">
        <label class="form-label-top" id="label_12" for="input_12">
          Ваш e-mail<span class="form-required">*</span>
        </label>
        <div id="cid_12" class="form-input-wide">
          <input type="text" class=" form-textbox validate[required, Email]" data-type="input-textbox" id="input_12" name="q12_Email" size="38" value="" />
        </div>
      </li>
      <li class="form-line form-line-column" id="id_15" style="margin-left:25%;width:50%;">
        <label class="form-label-top" id="label_15" for="input_15">
          Способ оплаты заказа<span class="form-required">*</span>
        </label>
        <div id="cid_15" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_15_0" name="q15_input15" checked="checked" value="Оплата от частного лица" />
              <label for="input_15_0"> От частного лица </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_15_1" name="q15_input15" value="Оплата от организации по счету" />
              <label for="input_15_1"> От организации по счету </label></span><span class="clearfix"></span>
          </div>
        </div>
      </li>
      <li class="form-line" id="id_13">
        <label class="form-label-left" id="label_13" for="input_13"> Реквизиты </label>
        <div id="cid_13" class="form-input" style="width:660px;">
          <textarea id="input_13" class="form-textarea" name="q13_input13" cols="79" rows="6"></textarea>
        </div>
      </li>
      <li class="form-line" id="id_2">
        <div id="cid_2" class="form-input-wide">
          <div style="text-align:center" class="form-buttons-wrapper">
            <button id="input_2" type="submit" class="form-submit-button form-submit-button-simple_red">
              Сделать заказ
            </button>
          </div>
        </div>
      </li>
      <li style="display:none">
        Should be Empty:
        <input type="text" name="website" value="" />
      </li>
    </ul>
  </div>
  <input type="hidden" id="simple_spc" name="simple_spc" value="32752235554858" />
  <script type="text/javascript">
  document.getElementById("si" + "mple" + "_spc").value = "32752235554858-32752235554858";
  </script>
</form>
*/?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>