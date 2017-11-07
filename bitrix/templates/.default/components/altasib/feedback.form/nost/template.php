<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<link rel="stylesheet" href="<?=$templateFolder;?>/chosen/chosen.css">    
<link rel="stylesheet" href="<?=$templateFolder;?>/chosen/jquery.formstyler.css">
<link rel="stylesheet" href="<?=$templateFolder;?>/chosen/demo.css">         
<script>
		(function($) {
		$(function() {
			$('input[type="number"]').styler({
				selectSearch: true
			});
		});
		})(jQuery);
</script>

<? $fVerComposite = (defined("SM_VERSION") && version_compare(SM_VERSION, "14.5.0") >= 0 ? true : false); ?>
<? if($fVerComposite) $this->setFrameMode(true); ?>

<?$ALX = "FID".$arParams["FORM_ID"];?>

<? if($arResult["FANCYBOX_".$ALX]!='Y' && !isset($arResult["FANCYBOX_".$ALX]) && $arParams['ALX_CHECK_NAME_LINK']=='Y'): ?>
	<a class="alx_feedback_popup" id="form_id_<?=$ALX?>" href=""><?=$arParams["ALX_NAME_LINK"];?></a>
<?
	$bShort = ($APPLICATION->get_cookie("ALTASIB_FDB_SEND_".$ALX) != 'Y');
	if($arParams['ALX_LOAD_PAGE']=='Y' && $bShort):?>
<script type="text/javascript">
<!--
$(window).load(function(){
	$('#form_id_<?=$ALX?>').fancybox({
		'ajax':{type:"POST",data:'OPEN_POPUP_<?=$ALX?>=Y'},
		'titleShow':false,
		'type':'ajax',
		'href':'',
		'overlayShow':false,
		'autoDimensions':false,
		'afterShow':function(){
			if(typeof AltasibFeedbackOnload_<?=$ALX?>!='undefined')
				AltasibFeedbackOnload_<?=$ALX?>();
		},
		helpers:{overlay:null}
	}).trigger('click');
});
-->
</script>
<?
	endif;
?>
<?
else:
?>
<script type="text/javascript">
<!--
<?if(is_array($arParams["PROPERTY_FIELDS"]) && is_array($arParams["MASKED_INPUT_PHONE"]) && !empty($arParams["MASKED_INPUT_PHONE"])):?>
$(function($){
<?	foreach($arParams["MASKED_INPUT_PHONE"] as $propCode):
		if(in_array($propCode, $arParams["PROPERTY_FIELDS"])):
?>
	$('input[name="FIELDS[<?=$propCode?>_<?=$ALX?>]"]').mask("9 (999) 999-99-99",{placeholder:'_'});
<?
		endif;
	endforeach;?>
});
<?endif;?>
<?
if($arParams['ALX_CHECK_NAME_LINK']=='Y'):
?>
$('#fb_close_<?=$ALX?>').click(function(){
	var bTypeFD=false;
	if(typeof FormData=='function'){
		var formData=new FormData(this.form);
		bTypeFD=true;
	}else
		var formData=$(this.form).serializeArray();

	$.fancybox.hideActivity;

	$.ajax({
		url:window.location.href,
		type:'POST',
		data:formData,
		async:false,
		cache:false,
		frameWidth:300,
		processData:(bTypeFD?false:true),
		contentType:(bTypeFD?false:'application/x-www-form-urlencoded;charset=UTF-8'),
		success:function(returndata){
			$.fancybox(returndata,{
				'width':400,
				'autoDimensions':false,
				'afterShow':function(){
<?					if($arParams['LOCAL_REDIRECT_ENABLE'] == 'Y'):?>
					if(typeof AltasibFeedbackRedirect_<?=$ALX?>!='undefined')
						AltasibFeedbackRedirect_<?=$ALX?>();
<?					endif?>
					if(typeof AltasibFeedbackOnload_<?=$ALX?>!='undefined')
						AltasibFeedbackOnload_<?=$ALX?>();
				},
				helpers:{overlay:null}
			});
		}
	});
	return false;
});
<?
endif;?>
<?
if($arParams["REWIND_FORM"] == "Y" && ((count($arResult["FORM_ERRORS"]) > 0) || ($_REQUEST["success_".$ALX] == "yes"))):?>
$(document).ready(function(){
	document.location.hash="alx_position_feedback";
});
<?endif?>
if(typeof ALX_ReloadCaptcha!='function'){
	function ALX_ReloadCaptcha(csid,ALX){
		document.getElementById("alx_cm_CAPTCHA_"+ALX).src='/bitrix/tools/captcha.php?captcha_sid='+csid+'&rnd='+Math.random();
	}
	function ALX_SetNameQuestion(obj,ALX){
		var qw=obj.selectedIndex;
		document.getElementById("type_question_name_"+ALX).value=obj.options[qw].text;
	}
}
-->
</script>
<?
$errorField = array();

foreach($arResult["FORM_ERRORS"] as $error):
	foreach($error as $k => $v):
		$errorField[] = $k;
	endforeach;
endforeach;

?>
<?if($arParams["REWIND_FORM"] == "Y" && ((count($arResult["FORM_ERRORS"]) > 0) || ($arResult["success_".$ALX] == "yes"))):?>
	<a name="alx_position_feedback"></a>
<?endif?>

<div class="alx_feed_back_form alx_feed_back_default" id="alx_feed_back_default_<?=$ALX?>" style="width:100% !important">
<?if(((count($arResult["FORM_ERRORS"]) == 0) && ($arResult["success_".$ALX] == "yes")) || ((count($arResult["FORM_ERRORS"]) == 0) && ($_REQUEST["success_".$ALX] == "yes"))):?>
	<div class="alx_feed_back_form_error_block">
		<table cellpadding="0" cellspacing="0" border="0" class="alx_feed_back_form_error_block_tbl">
		<tr>
			<td class="alx_feed_back_form_error_pic"><?=CFile::ShowImage($arParams["IMG_OK"])?></td>
			<td class="alx_feed_back_form_mess_ok_td_list">
				<div class="alx_feed_back_form_mess_ok"><?=$arParams["MESSAGE_OK"];?></div>
			</td>
		</tr>
		</table>
	</div>
<script type="text/javascript">
<!--
function AltasibFeedbackRedirect_<?=$ALX?>(){
	<?if($arParams['LOCAL_REDIRECT_ENABLE'] == 'Y' && strlen($arParams['LOCAL_REDIRECT_URL']) > 0):?>
	document.location.href='<?=(trim(htmlspecialcharsEx($arParams['LOCAL_REDIRECT_URL'])));?>';
	<?endif?>
}
-->
</script>
<?endif?>
<?if($arParams["CHECK_ERROR"] == "Y"):?>
<?if(count($arResult["FORM_ERRORS"]) > 0):?>
	<div class="alx_feed_back_form_error_block">
		<table cellpadding="0" cellspacing="0" border="0" class="alx_feed_back_form_error_block_tbl">
		<tr>
			<td class="alx_feed_back_form_error_pic"><?=CFile::ShowImage($arParams["IMG_ERROR"])?></td>
			<td class="alx_feed_back_form_error_td_list">
			<div class="alx_feed_back_form_title_error"><?=GetMessage("ALX_TP_REQUIRED_ERROR")?></div>
				<ul class="alx_feed_back_form_error_list">
<?					foreach($arResult["FORM_ERRORS"] as $error):?>
<?						foreach($error as $v):?>
							<li><span>-</span> <?=$v?></li>
<?						endforeach?>
<?					endforeach?>
				</ul>
			</td>
		</tr>
		</table>
	</div>
<?endif?>
<?endif?>
<?
$hide = false;
if($arParams["HIDE_FORM"] == "Y" && ($_REQUEST["success_".$ALX] == "yes" || $arResult["success_".$ALX] == "yes"))
	$hide = true;

$actionPage = $APPLICATION->GetCurPage();
if(strpos($actionPage, "index.php") !== false)
	$actionPage = $APPLICATION->GetCurDir();
?>
<?if(!$hide):?>
<div class="myform_wrap">
<form id="f_feedback_<?=$ALX?>" name="f_feedback_<?=$ALX?>" action="<?=$actionPage?>" method="post" enctype="multipart/form-data" class="myform">
	<input type="hidden" name="FEEDBACK_FORM_<?=$ALX?>" value="Y" />
<?	echo bitrix_sessid_post()?>
<?	if(count($arResult["TYPE_QUESTION"]) >= 1):?>
		<div class="alx_feed_back_form_item_pole">
			<div class="alx_feed_back_form_name"><?=$arParams["CATEGORY_SELECT_NAME"]?></div>
			<div class="alx_feed_back_form_inputtext_bg">
				<input type="hidden" id="type_question_name_<?=$ALX?>" name="type_question_name_<?=$ALX?>" value="<?=$arResult["TYPE_QUESTION"][0]["NAME"]?>">
				<select id="type_question_<?=$ALX?>" name="type_question_<?=$ALX?>" onchange="ALX_SetNameQuestion(this, '<?=$ALX?>');">
<?					foreach($arResult["TYPE_QUESTION"] as $arField):?>
<?						if(trim(htmlspecialcharsEx($_POST["type_question"])) == $arField["ID"]):?>
							<option value="<?=$arField["ID"]?>" selected><?=$arField["NAME"]?></option>
<?						else:?>
							<option value="<?=$arField["ID"]?>"><?=$arField["NAME"]?></option>
<?						endif?>
<?					endforeach?>
				</select>
			</div>
		</div>
<?	endif?>
<?	$k = 0;
	$countArr = count($arResult["FIELDS"]);
	$bFBtext = false;
	$strFBtext = '';
?>


<?	if(is_array($arParams["PROPERTY_FIELDS"])
		&& in_array("FEEDBACK_TEXT", $arParams["PROPERTY_FIELDS"]))
	{
		$strFBtext = '<div class="alx_feed_back_form_item_pole" style="display:none">';
		if(in_array("FEEDBACK_TEXT_".$ALX, $errorField, true))
		{
			$strFBtext .= '<div class="alx_feed_back_form_item_pole alx_feed_back_form_error_pole">';
		}
		$strFBtext .= '<div class="alx_feed_back_form_name">';
		if(!empty($arParams["FB_TEXT_NAME"]))
			$strFBtext .= $arParams["FB_TEXT_NAME"];
		else
			$strFBtext .= GetMessage("ALX_TP_MESSAGE_TEXTMESS");

		if(in_array("FEEDBACK_TEXT_".$ALX, $arParams["PROPERTY_FIELDS_REQUIRED"]))
		{
			$strFBtext .= '<span class="alx_feed_back_form_required_text">*</span>';
		}
		$strFBtext .= '</div>
			<div class="alx_feed_back_form_inputtext_bg" id="error_EMPTY_TEXT"><textarea cols="" rows="" id="EMPTY_TEXT'.$ALX.'" name="FEEDBACK_TEXT_'.$ALX.'">'.$arResult["FEEDBACK_TEXT"].'</textarea></div>';
		if(in_array("FEEDBACK_TEXT_".$ALX, $errorField, true))
		{
			$strFBtext .= '</div>';
		}
		$strFBtext .= '</div>';
	}
?>

<?	foreach($arResult["FIELDS"] as $key=>$arField):?>

<?
			/*LIST*/
		if($arField["TYPE"] == "L"):
			if($arField["LIST_TYPE"] == "L"):

			elseif($arField["LIST_TYPE"] == "C"): ?>
					<? if ($arField["CODE"] == "OKLEYKA_FID1"): ?>
						<? $okleykaVisible = 'style="display:none"';?>
						  <br>
<?						foreach($arField["ENUM"] as $v):
							if(!isset($_POST["FIELDS"][$arField["CODE"]]) && !isset($arResult["FORM_ERRORS"]["EMPTY_FIELD"][$arField["CODE"]])):?>
								<input id="<?=$v["ID"]?>" onclick="if (this.checked) document.getElementById('OKLEYKA_DESCR_FID1').style.display='block'; else document.getElementById('OKLEYKA_DESCR_FID1').style.display='none';" type="checkbox" name="FIELDS[<?=$arField["CODE"]?>][]" value="<?=$v["ID"]?>" <?if($v["DEF"] == "Y") {$okleykaVisible = 'style="display:block"';echo 'checked="checked"';}?>><label for="<?=$v["ID"]?>" style="margin-top: 12px;"><span></span><?=$v["VALUE"]?></label><br/>
<?							else:?>
								<input id="<?=$v["ID"]?>" onclick="if (this.checked) document.getElementById('OKLEYKA_DESCR_FID1').style.display='block'; else document.getElementById('OKLEYKA_DESCR_FID1').style.display='none';" type="checkbox" name="FIELDS[<?=$arField["CODE"]?>][]" value="<?=$v["ID"]?>" <?if(in_array($v['ID'], $_POST["FIELDS"][$arField["CODE"]])) {$okleykaVisible = 'style="display:block"';echo 'checked="checked"';}?>><label for="<?=$v["ID"]?>" style="margin-top: 12px;"><span></span><?=$v["VALUE"]?></label><br/>
<?							endif;
						endforeach;?>
				  	  </div>
					<? elseif ($arField["CODE"] == "COLOR_FID1"): ?>
	<div class="color col-xs-30  col-sm-14 col-md-7">
		<label class="" id="" for="">
			<span class="zalol"><?echo $arField["NAME"]?> <?if($arField["REQUIRED"]):?><span class="alx_feed_back_form_required_text">*</span><?endif;?></span>
			<div class="alx_feed_back_form_hint"><?=$arField["HINT"]?></div>
		</label>
		<!--radiobutton begin-->
		<fieldset>
		<div class="radio1">
<?                                              foreach($arField["ENUM"] as $v):
							if(!isset($_POST["FIELDS"][$arField["CODE"]]) && !isset($arResult["FORM_ERRORS"]["EMPTY_FIELD"][$arField["CODE"]])):?>
								<input id="<?=$v["ID"]?>" type="radio" name="FIELDS[<?=$arField["CODE"]?>]" value="<?=$v["ID"]?>" <?if($v['DEF'] == 'Y') echo 'checked="checked"';?>><label for="<?=$v["ID"]?>"><span></span><?=$v["VALUE"]?></label><br />
<?							else:?>
								<input id="<?=$v["ID"]?>" type="radio" name="FIELDS[<?=$arField["CODE"]?>]" value="<?=$v["ID"]?>" <?if($v['ID'] == $_POST["FIELDS"][$arField["CODE"]]) echo 'checked="checked"';?>><label for="<?=$v["ID"]?>"><span></span><?=$v["VALUE"]?></label><br />
<?							endif;
						endforeach;?>
		</div>
		<fieldset>
			<!--radiobutton end-->
	</div>
					<? elseif ($arField["CODE"] == "MATERIAL_FID1"): ?>

	<div class="matter col-xs-30  col-sm-15 col-md-7">
		<label class="" id="" for="">
			<span class="zalol"><?echo $arField["NAME"]?> <?if($arField["REQUIRED"]):?><span class="alx_feed_back_form_required_text">*</span><?endif;?></span>
			<div class="alx_feed_back_form_hint"><?=$arField["HINT"]?></div>
		</label>
		<!--radiobutton begin-->
		<fieldset>
		<div class="radio1">
<?                                              foreach($arField["ENUM"] as $v):
							if(!isset($_POST["FIELDS"][$arField["CODE"]]) && !isset($arResult["FORM_ERRORS"]["EMPTY_FIELD"][$arField["CODE"]])):?>
								<input id="<?=$v["ID"]?>" type="radio" name="FIELDS[<?=$arField["CODE"]?>]" value="<?=$v["ID"]?>" <?if($v['DEF'] == 'Y') echo 'checked="checked"';?>><label for="<?=$v["ID"]?>"><span></span><?=$v["VALUE"]?></label><br />
<?							else:?>
								<input id="<?=$v["ID"]?>" type="radio" name="FIELDS[<?=$arField["CODE"]?>]" value="<?=$v["ID"]?>" <?if($v['ID'] == $_POST["FIELDS"][$arField["CODE"]]) echo 'checked="checked"';?>><label for="<?=$v["ID"]?>"><span></span><?=$v["VALUE"]?></label><br />
<?							endif;
						endforeach;?>
		</div>
		<fieldset>
			<!--radiobutton end-->
	</div>
<div class="clearfix"></div>
					<? elseif ($arField["CODE"] == "PAYMENT_FID1"): ?>
						<? $paymentVisible = 'style="display:none"';
						if ($_POST["FIELDS"][$arField["CODE"]] == '14') $paymentVisible = 'style="display:block"';
						?>
<div class="wrap1">
	<div class="opl col-xs-30 col-sm-15 col-md-15">
		<label class="" id="" for="">
			<span class="zalol"><?echo $arField["NAME"]?> <?if($arField["REQUIRED"]):?><span class="alx_feed_back_form_required_text">*</span><?endif;?></span>
			<div class="alx_feed_back_form_hint"><?=$arField["HINT"]?></div>
		</label>
		<!--radiobutton begin-->
		<fieldset> 
		<div class="radio1">
<?                                              foreach($arField["ENUM"] as $v):
							if(!isset($_POST["FIELDS"][$arField["CODE"]]) && !isset($arResult["FORM_ERRORS"]["EMPTY_FIELD"][$arField["CODE"]])):?>
								<input id="<?=$v["ID"]?>" onclick="if (this.value==14) document.getElementById('REQUISITES_FID1').style.display='block'; else document.getElementById('REQUISITES_FID1').style.display='none';"  type="radio" name="FIELDS[<?=$arField["CODE"]?>]" value="<?=$v["ID"]?>" <?if($v['DEF'] == 'Y') echo 'checked="checked"';?>><label for="<?=$v["ID"]?>"><span></span><?=$v["VALUE"]?></label>
<?							else:?>
								<input id="<?=$v["ID"]?>" onclick="if (this.value==14) document.getElementById('REQUISITES_FID1').style.display='block'; else document.getElementById('REQUISITES_FID1').style.display='none';" type="radio" name="FIELDS[<?=$arField["CODE"]?>]" value="<?=$v["ID"]?>" <?if($v['ID'] == $_POST["FIELDS"][$arField["CODE"]]) echo 'checked="checked"';?>><label for="<?=$v["ID"]?>"><span></span><?=$v["VALUE"]?></label>
<?							endif;
						endforeach;?>
		</div>
		<fieldset>
	</div>
					<?endif?>
<?				
				endif;
			/*HTML/TEXT*/
		elseif($arField["USER_TYPE"] == "HTML"):?>
<?		/*Date or DateTime*/?>
<?		elseif($arField["USER_TYPE"] == "Date" || $arField["USER_TYPE"] == "DateTime"):?>
<?			/*ELEMENTS*/?>
<?		elseif($arField["TYPE"] == "E"):?>
<?			/*SECTIONS*/?>
<?		elseif($arField["TYPE"] == "G"):?>
<?			/*STRING*/?>
<?		elseif($arField["TYPE"] != "F"):?>
			<? if ($arField["CODE"] == "PRODUCT_FID1"):?>
<div class="wrap1 row">
	<div class="model col-xs-30 col-sm-16 col-md-10" id="error_<?=$arField["CODE"]?>">
	<label class="" id="" for=""><span class="zalol">
		<? echo $arField["NAME"]?></span><?if($arField["REQUIRED"]):?><span class="alx_feed_back_form_required_text">*</span><?endif;?>
		<div class="alx_feed_back_form_hint"><?=$arField["HINT"]?></div>
	</label>
		<div class="sel_styled_cont">
		<span class="sel_styled_inner"></span>
		<select data-placeholder="Выберите модель" class="chosen-select" style="width:100%;" tabindex="4" name="FIELDS[<?=$arField["CODE"]?>][]" id="modelID">
			<?if(CModule::IncludeModule("iblock")):?>
			<? // adl 08.10.13 Получаем список всех товаров с ценами
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
            <option value="<?=$arEl["NAME"]?>(<?=$arEl["CATEGORY"]?>)" <?=($_POST["product_id"]==$arEl["ID"])?"selected":""?>><?=$arEl["NAME"]?></option>
				<?
						}
						else {
				?>
            <option value="<?=$arEl["NAME"]?>(<?=$arEl["CATEGORY"]?>)" <?=($_POST["product_id"]==$arEl["ID"])?"selected":""?>><?=$arEl["NAME"]?></option>
				<?		}
					}
				endif?>
          </select>
		  </div> 
			<? elseif ($arField["CODE"] == "QUANTITY_FID1"):?>
	<div class="count col-xs-30  col-sm-15 col-md-6"  id="error_<?=$arField["CODE"]?>">
		<label class="" id="" for="<?=$arField["CODE"]?>">
			<span class="zalol"><?echo $arField["NAME"]?> <?if($arField["REQUIRED"]):?><span class="alx_feed_back_form_required_text">*</span><?endif;?></span>
			<div class="alx_feed_back_form_hint"><?=$arField["HINT"]?></div>
		</label>
		 
			<div class="number-plus-minus">
			
<?				if(!empty($_POST["FIELDS"][$arField["CODE"]])):?>
					<input type="number" id="<?=$arField["CODE"]?>" name="FIELDS[<?=$arField["CODE"]?>]" value="<?=trim(htmlspecialcharsEx($_POST["FIELDS"][$arField["CODE"]]))?>" class="alx_feed_back_form_inputtext" min="5"/>
<?				elseif(!empty($arField["AUTOCOMPLETE_VALUE"])):
					$readonly = "";
					if($arParams["PROPS_AUTOCOMPLETE_VETO"]=="Y")
						if($arField["CODE"] == "FIO_".$ALX || $arField["CODE"] == "EMAIL_".$ALX || $arField["CODE"] == "PHONE_".$ALX)
							$readonly = 'readonly = "readonly" ';
?>
					<input type="number" id="<?=$arField["CODE"]?>" name="FIELDS[<?=$arField["CODE"]?>]" <?=$readonly?>value="<?=trim(htmlspecialcharsEx($arField["AUTOCOMPLETE_VALUE"]));?>" class="alx_feed_back_form_inputtext"  min="5"/>
<?				else:?>
					<input type="number" id="<?=$arField["CODE"]?>" name="FIELDS[<?=$arField["CODE"]?>]" value="<?=$arField["DEFAULT_VALUE"]?>" class="alx_feed_back_form_inputtext" onblur="if(this.value==''){this.value='<?=$arField["DEFAULT_VALUE"]?>'}" onclick="if(this.value=='<?=$arField["DEFAULT_VALUE"]?>'){this.value=''}"  min="5"/>
<?				endif;?>
			</div>
	
	</div>
	

			<? elseif ($arField["CODE"] == "OKLEYKA_DESCR_FID1"):?>

	<br>
			
<?				if(!empty($_POST["FIELDS"][$arField["CODE"]])):?>
					<textarea type="text" <?=$okleykaVisible;?> cols="59" rows="4" id="<?=$arField["CODE"]?>" name="FIELDS[<?=$arField["CODE"]?>]"  class="coment1" placeholder="Опишите максимально полно какую оклейку Вы хотите видеть (необязательное поле)"><?=trim(htmlspecialcharsEx($_POST["FIELDS"][$arField["CODE"]]))?></textarea>
<?				elseif(!empty($arField["AUTOCOMPLETE_VALUE"])):
					$readonly = "";
					if($arParams["PROPS_AUTOCOMPLETE_VETO"]=="Y")
						if($arField["CODE"] == "FIO_".$ALX || $arField["CODE"] == "EMAIL_".$ALX || $arField["CODE"] == "PHONE_".$ALX)
							$readonly = 'readonly = "readonly" ';
?>
					<textarea type="text" <?=$okleykaVisible;?> cols="59" rows="4" id="<?=$arField["CODE"]?>" name="FIELDS[<?=$arField["CODE"]?>]" <?=$readonly?> class="coment1" placeholder="Опишите максимально полно какую оклейку Вы хотите видеть (необязательное поле)"><?=trim(htmlspecialcharsEx($arField["AUTOCOMPLETE_VALUE"]));?></textarea>
<?				else:?>
					<textarea type="text" <?=$okleykaVisible;?> cols="59" rows="4" id="<?=$arField["CODE"]?>" name="FIELDS[<?=$arField["CODE"]?>]" class="coment1" onblur="if(this.value==''){this.value='<?=$arField["DEFAULT_VALUE"]?>'}" onclick="if(this.value=='<?=$arField["DEFAULT_VALUE"]?>'){this.value=''}" placeholder="Опишите максимально полно какую оклейку Вы хотите видеть (необязательное поле)"><?=$arField["DEFAULT_VALUE"]?></textarea>
<?				endif;?>
	</div>

			<? elseif ($arField["CODE"] == "FIO_FID1"):?>
<div class="contakts">
	<div class="contakt col-xs-30  col-sm-15 col-md-7 col-md-offset-1">
		<label class="" id="" for="<?=$arField["CODE"]?>">
			<span class="zalol"><?echo $arField["NAME"]?> <?if($arField["REQUIRED"]):?><span class="alx_feed_back_form_required_text">*</span><?endif;?></span>
			<div class="alx_feed_back_form_hint"><?=$arField["HINT"]?></div>
		</label>
<?				if(!empty($_POST["FIELDS"][$arField["CODE"]])):?>
					<input type="text" id="<?=$arField["CODE"]?>" name="FIELDS[<?=$arField["CODE"]?>]" value="<?=trim(htmlspecialcharsEx($_POST["FIELDS"][$arField["CODE"]]))?>" class="alx_feed_back_form_inputtext" min="5"/>
<?				elseif(!empty($arField["AUTOCOMPLETE_VALUE"])):
					$readonly = "";
					if($arParams["PROPS_AUTOCOMPLETE_VETO"]=="Y")
						if($arField["CODE"] == "FIO_".$ALX || $arField["CODE"] == "EMAIL_".$ALX || $arField["CODE"] == "PHONE_".$ALX)
							$readonly = 'readonly = "readonly" ';
?>
					<input type="text" id="<?=$arField["CODE"]?>" name="FIELDS[<?=$arField["CODE"]?>]" <?=$readonly?>value="<?=trim(htmlspecialcharsEx($arField["AUTOCOMPLETE_VALUE"]));?>" class="alx_feed_back_form_inputtext"  min="5"/>
<?				else:?>
					<input type="text" id="<?=$arField["CODE"]?>" name="FIELDS[<?=$arField["CODE"]?>]" value="<?=$arField["DEFAULT_VALUE"]?>" class="alx_feed_back_form_inputtext" onblur="if(this.value==''){this.value='<?=$arField["DEFAULT_VALUE"]?>'}" onclick="if(this.value=='<?=$arField["DEFAULT_VALUE"]?>'){this.value=''}"  min="5"/>
<?				endif;?>
    </div>  
			<? elseif ($arField["CODE"] == "PHONE_FID1"):?>
	<div class="contakt col-xs-30  col-sm-15 col-md-7">
		<label class="" id="" for="<?=$arField["CODE"]?>">
			<span class="zalol"><?echo $arField["NAME"]?> <?if($arField["REQUIRED"]):?><span class="alx_feed_back_form_required_text">*</span><?endif;?></span>
			<div class="alx_feed_back_form_hint"><?=$arField["HINT"]?></div>
		</label>
<?				if(!empty($_POST["FIELDS"][$arField["CODE"]])):?>
					<input type="text" id="<?=$arField["CODE"]?>" name="FIELDS[<?=$arField["CODE"]?>]" value="<?=trim(htmlspecialcharsEx($_POST["FIELDS"][$arField["CODE"]]))?>" class="alx_feed_back_form_inputtext" min="5"/>
<?				elseif(!empty($arField["AUTOCOMPLETE_VALUE"])):
					$readonly = "";
					if($arParams["PROPS_AUTOCOMPLETE_VETO"]=="Y")
						if($arField["CODE"] == "FIO_".$ALX || $arField["CODE"] == "EMAIL_".$ALX || $arField["CODE"] == "PHONE_".$ALX)
							$readonly = 'readonly = "readonly" ';
?>
					<input type="text" id="<?=$arField["CODE"]?>" name="FIELDS[<?=$arField["CODE"]?>]" <?=$readonly?>value="<?=trim(htmlspecialcharsEx($arField["AUTOCOMPLETE_VALUE"]));?>" class="alx_feed_back_form_inputtext"  min="5"/>
<?				else:?>
					<input type="text" id="<?=$arField["CODE"]?>" name="FIELDS[<?=$arField["CODE"]?>]" value="<?=$arField["DEFAULT_VALUE"]?>" class="alx_feed_back_form_inputtext" onblur="if(this.value==''){this.value='<?=$arField["DEFAULT_VALUE"]?>'}" onclick="if(this.value=='<?=$arField["DEFAULT_VALUE"]?>'){this.value=''}"  min="5"/>
<?				endif;?>
    </div>
			<? elseif ($arField["CODE"] == "CITY_FID1"):?>
	<div class="contakt col-xs-30  col-sm-15 col-md-7">
		<label class="" id="" for="<?=$arField["CODE"]?>">
			<span class="zalol"><?echo $arField["NAME"]?> <?if($arField["REQUIRED"]):?><span class="alx_feed_back_form_required_text">*</span><?endif;?></span>
			<div class="alx_feed_back_form_hint"><?=$arField["HINT"]?></div>
		</label>
<?				if(!empty($_POST["FIELDS"][$arField["CODE"]])):?>
					<input type="text" id="<?=$arField["CODE"]?>" name="FIELDS[<?=$arField["CODE"]?>]" value="<?=trim(htmlspecialcharsEx($_POST["FIELDS"][$arField["CODE"]]))?>" class="alx_feed_back_form_inputtext" min="5"/>
<?				elseif(!empty($arField["AUTOCOMPLETE_VALUE"])):
					$readonly = "";
					if($arParams["PROPS_AUTOCOMPLETE_VETO"]=="Y")
						if($arField["CODE"] == "FIO_".$ALX || $arField["CODE"] == "EMAIL_".$ALX || $arField["CODE"] == "PHONE_".$ALX)
							$readonly = 'readonly = "readonly" ';
?>
					<input type="text" id="<?=$arField["CODE"]?>" name="FIELDS[<?=$arField["CODE"]?>]" <?=$readonly?>value="<?=trim(htmlspecialcharsEx($arField["AUTOCOMPLETE_VALUE"]));?>" class="alx_feed_back_form_inputtext"  min="5"/>
<?				else:?>
					<input type="text" id="<?=$arField["CODE"]?>" name="FIELDS[<?=$arField["CODE"]?>]" value="<?=$arField["DEFAULT_VALUE"]?>" class="alx_feed_back_form_inputtext" onblur="if(this.value==''){this.value='<?=$arField["DEFAULT_VALUE"]?>'}" onclick="if(this.value=='<?=$arField["DEFAULT_VALUE"]?>'){this.value=''}"  min="5"/>
<?				endif;?>
    </div>
			<? elseif ($arField["CODE"] == "EMAIL_FID1"):?>

	<div class="contakt col-xs-30  col-sm-15 col-md-7">
		<label class="" id="" for="<?=$arField["CODE"]?>">
			<span class="zalol"><?echo $arField["NAME"]?> <?if($arField["REQUIRED"]):?><span class="alx_feed_back_form_required_text">*</span><?endif;?></span>
			<div class="alx_feed_back_form_hint"><?=$arField["HINT"]?></div>
		</label>
<?				if(!empty($_POST["FIELDS"][$arField["CODE"]])):?>
					<input type="text" id="<?=$arField["CODE"]?>" name="FIELDS[<?=$arField["CODE"]?>]" value="<?=trim(htmlspecialcharsEx($_POST["FIELDS"][$arField["CODE"]]))?>" class="alx_feed_back_form_inputtext" min="5"/>
<?				elseif(!empty($arField["AUTOCOMPLETE_VALUE"])):
					$readonly = "";
					if($arParams["PROPS_AUTOCOMPLETE_VETO"]=="Y")
						if($arField["CODE"] == "FIO_".$ALX || $arField["CODE"] == "EMAIL_".$ALX || $arField["CODE"] == "PHONE_".$ALX)
							$readonly = 'readonly = "readonly" ';
?>
					<input type="text" id="<?=$arField["CODE"]?>" name="FIELDS[<?=$arField["CODE"]?>]" <?=$readonly?>value="<?=trim(htmlspecialcharsEx($arField["AUTOCOMPLETE_VALUE"]));?>" class="alx_feed_back_form_inputtext"  min="5"/>
<?				else:?>
					<input type="text" id="<?=$arField["CODE"]?>" name="FIELDS[<?=$arField["CODE"]?>]" value="<?=$arField["DEFAULT_VALUE"]?>" class="alx_feed_back_form_inputtext" onblur="if(this.value==''){this.value='<?=$arField["DEFAULT_VALUE"]?>'}" onclick="if(this.value=='<?=$arField["DEFAULT_VALUE"]?>'){this.value=''}"  min="5"/>
<?				endif;?>
    </div>
</div>
			<? elseif ($arField["CODE"] == "REQUISITES_FID1"):?>
			
	
	<div class="mybut hidden-xs col-xs-30 col-sm-15 col-md-15">
	
			<div style="" class="myform-buttons-wrapper col-xs-30  col-md-15">
			
			
			
<script type="text/javascript">
function val() {
	
    	var $j3 = jQuery.noConflict();
	var col = $j3('#QUANTITY_FID1').val();
	if (col < 5) {
		alert('Невозможно оформить заказ менее 5 изделий');
		return false;
	}
	return true;
}
</script>
            <button onclick="if (val()) form.submit();" id="fb_close_<?=$ALX?>" name="SEND_FORM_<?=$ALX?>" type="submit" class="" style="border: none; background: none;" >
              <img src="<?=$templateFolder;?>/images/zak3.png" alt="Сделать заказ" style="height: 40px;">
            </button>
			</div>
			<div style="" class="myform-buttons-wrapper col-xs-30 col-md-15" >
			<button form="f_feedback_<?=$ALX?>" onclick="form.reset();var $j4 = jQuery.noConflict(); $j4('#modelID').trigger('chosen:updated');" id="fb_close_<?=$ALX?>" name="SEND_FORM_<?=$ALX?>" type="reset" class="" style="border: none; background: none;" >
				<img src="<?=$templateFolder;?>/images/zak4.png"  alt="Очистить форму" style="height: 40px;">
			</button>
		  </div>
		  <p class="politic col-xs-30">Отправляя свои данные, я принимаю условия <a target="_blank" href="/politika.php">политики конфиденциальности</a></p>
		</div>

<div class="clearfix"></div>
<?				if(!empty($_POST["FIELDS"][$arField["CODE"]])):?>
					<textarea <?=$paymentVisible;?> type="text"  cols="" rows="4" style="margin-left:0" id="<?=$arField["CODE"]?>" name="FIELDS[<?=$arField["CODE"]?>]"  class="coment2" placeholder="Укажите Ваши реквизиты для выставления счета и прочие комментарии по заказу (необязательное поле) 1. Полный почтовый адрес организации ( пример: 125009 Москва ул Петровка 25...) 2. Наименование организации. (пример: ООО 'Салют' или ИП Груздев Василий Алибабаевич)"><?=trim(htmlspecialcharsEx($_POST["FIELDS"][$arField["CODE"]]))?></textarea>
<?				elseif(!empty($arField["AUTOCOMPLETE_VALUE"])):
					$readonly = "";
					if($arParams["PROPS_AUTOCOMPLETE_VETO"]=="Y")
						if($arField["CODE"] == "FIO_".$ALX || $arField["CODE"] == "EMAIL_".$ALX || $arField["CODE"] == "PHONE_".$ALX)
							$readonly = 'readonly = "readonly" ';
?>
					<textarea <?=$paymentVisible;?> type="text"  cols="" rows="4" style="margin-left:0" id="<?=$arField["CODE"]?>" name="FIELDS[<?=$arField["CODE"]?>]" <?=$readonly?> class="coment2" placeholder="Укажите Ваши реквизиты для выставления счета и прочие комментарии по заказу (необязательное поле) 1. Полный почтовый адрес организации ( пример: 125009 Москва ул Петровка 25...) 2. Наименование организации. (пример: ООО 'Салют' или ИП Груздев Василий Алибабаевич)"><?=trim(htmlspecialcharsEx($arField["AUTOCOMPLETE_VALUE"]));?></textarea>
<?				else:?>
					<textarea <?=$paymentVisible;?> type="text"  cols="" rows="4" style="margin-left:0" id="<?=$arField["CODE"]?>" name="FIELDS[<?=$arField["CODE"]?>]" class="coment2" onblur="if(this.value==''){this.value='<?=$arField["DEFAULT_VALUE"]?>'}" onclick="if(this.value=='<?=$arField["DEFAULT_VALUE"]?>'){this.value=''}" placeholder="Укажите Ваши реквизиты для выставления счета и прочие комментарии по заказу (необязательное поле) 1. Полный почтовый адрес организации ( пример: 125009 Москва ул Петровка 25...) 2. Наименование организации. (пример: ООО 'Салют' или ИП Груздев Василий Алибабаевич)"><?=$arField["DEFAULT_VALUE"]?></textarea>
<?				endif;?>
<div class="mybut visible-xs col-xs-30 col-sm-15 col-md-15">
			<div style="" class="myform-buttons-wrapper col-xs-30  col-md-15">
            <button onclick="if (val()) form.submit();" id="fb_close_<?=$ALX?>" name="SEND_FORM_<?=$ALX?>" type="submit" class="" style="border: none; background: none;" >
              <img src="<?=$templateFolder;?>/images/zak3.png"  alt="Сделать заказ" style="height: 40px;">
            </button>
			</div>
			<div style="" class="myform-buttons-wrapper col-xs-30 col-md-15" >
			<button onclick="form.reset();var $j5 = jQuery.noConflict(); $j5('#modelID').trigger('chosen:updated');" id="fb_close_<?=$ALX?>" name="SEND_FORM_<?=$ALX?>" type="reset" class="" style="border: none; background: none;" >
				<img src="<?=$templateFolder;?>/images/zak4.png" alt="Очистить форму" style="height: 40px;">
			</button>
		  </div>
		  <p class="politic col-xs-30">Отправляя свои данные, я принимаю условия <a target="_blank" href="/politika.php">политики конфиденциальности</a></p>
		</div>
</div>		
			<?endif?>

<?		endif?>
<?
		if(!$bFBtext && ($arResult["FIELDS"][$key+1]["SORT"]>10000 || $key==$countArr-1)):?>

<?			echo $strFBtext;
			$bFBtext = true;

		endif;?>

<?	endforeach?>

<?
	if(!$bFBtext)
	{
		echo $strFBtext;
		$bFBtext = true;
	}
?>

<?/*	if($arParams["USE_CAPTCHA"]):?>
<?		if($arParams["CAPTCHA_TYPE"] != 'recaptcha'):?>
				<div class="alx_feed_back_form_item_pole">
<?				if(in_array("ALX_CP_WRONG_CAPTCHA", $errorField, true)):?><div class="alx_feed_back_form_item_pole alx_feed_back_form_error_pole"><?endif?>
					<div class="alx_feed_back_form_name"><?=GetMessage("ALX_TP_MESSAGE_INPUTF")?> <span class="alx_feed_back_form_required_text">*</span></div>

<?			if($fVerComposite) $frame = $this->createFrame()->begin('loading... <img src="/bitrix/themes/.default/start_menu/main/loading.gif">');?>
						<?$capCode = $GLOBALS["APPLICATION"]->CaptchaGetCode();?>
					<input type="hidden" name="captcha_sid" value="<?=htmlspecialcharsEx($capCode)?>">
						<div><img id="alx_cm_CAPTCHA_<?=$ALX?>" src="/bitrix/tools/captcha.php?captcha_sid=<?=htmlspecialcharsEx($capCode)?>" width="180" height="40"></div>
						<div style="margin-bottom:6px;"><small><a href="#" onclick="capCode='<?=htmlspecialcharsEx($capCode)?>'; ALX_ReloadCaptcha(capCode, '<?=$ALX?>'); return false;"><?=GetMessage("ALX_TP_RELOADIMG")?></a></small></div>
<?			if($fVerComposite) $frame->end();?>

						<div class="alx_feed_back_form_inputtext_bg"><input type="text" class="alx_feed_back_form_inputtext" id="captcha_word<?=$ALX?>" name="captcha_word" size="30" maxlength="50" value=""></div>
<?				if(in_array("ALX_CP_WRONG_CAPTCHA", $errorField, true)):?></div><?endif?>

				</div>
<?		else:?>
<?			if (isset($arResult["SITE_KEY"])):?>
				<div class="alx_feed_back_form_item_pole">
<?				if(in_array("ALX_CP_WRONG_CAPTCHA", $errorField, true)):?><div class="alx_feed_back_form_item_pole alx_feed_back_form_error_pole"><?endif?>
					<div class="alx_feed_back_form_name"><?=GetMessage("ALX_TP_MESSAGE_RECAPTCHA")?><span class="alx_feed_back_form_required_text">*</span></div>

<?			if($fVerComposite) $frame2 = $this->createFrame()->begin('loading... <img src="/bitrix/themes/.default/start_menu/main/loading.gif">');?>
					<script type="text/javascript">
					var AltasibFeedbackOnload_<?=$ALX?>=function(){
						grecaptcha.render('html_element_recaptcha',{'sitekey':'<?=$arResult["SITE_KEY"];?>',
							'theme':'<?=$arParams["RECAPTCHA_THEME"];?>','type':'<?=$arParams["RECAPTCHA_TYPE"];?>'});
					};
<?					if($arParams['ALX_CHECK_NAME_LINK']=='Y'):?>
					$(window).load(function(){
						if(typeof AltasibFeedbackOnload_<?=$ALX?>!='undefined')
							AltasibFeedbackOnload_<?=$ALX?>();
					});
<?					endif?>
<?					if($arParams['AJAX_MODE']=='Y'):?>
					var AltasibFeedbackOnAjaxSuccess=function(data,config){
						if(typeof AltasibFeedbackOnload_<?=$ALX?>!='undefined')
							AltasibFeedbackOnload_<?=$ALX?>();
						top.BX.removeCustomEvent(window,'onAjaxSuccess',AltasibFeedbackOnAjaxSuccess);
					};
					top.BX.addCustomEvent(window,"onAjaxSuccess",AltasibFeedbackOnAjaxSuccess);
<?					endif?>
					</script>
					<div class="g-recaptcha" id="html_element_recaptcha" onload="AltasibFeedbackOnload_<?=$ALX?>()" data-sitekey="<?=$arResult["SITE_KEY"]?>"></div>

<?			if($fVerComposite) $frame2->end();?>

<?				if(in_array("ALX_CP_WRONG_CAPTCHA", $errorField, true)):?></div><?endif?>

				</div>
<?			endif;?>
<?		endif;?>
<?	endif*/?>
</form>
</div>
<div class="row">
<div class="col-md-6">

</div>
<div class="col-md-6">

</div>
</div>
<?endif?>
</div>
<style type="text/css">
#alx_feed_back_default_<?=$ALX?>{
	width:<?=str_replace(" ", "", $arParams["WIDTH_FORM"])?> !important;
}
#alx_feed_back_default_<?=$ALX?> .alx_feed_back_form_error_block{
	background-color:<?=str_replace(" ", "", $arParams["BACKCOLOR_ERROR"])?>;
}
#alx_feed_back_default_<?=$ALX?> .alx_feed_back_form_error_list{
	color:<?=str_replace(" ", "", $arParams["COLOR_ERROR"])?>;
	font-size:<?=str_replace(" ", "", $arParams["SIZE_INPUT"])?>;
}
#alx_feed_back_default_<?=$ALX?> .alx_feed_back_form_title_error{
	color:<?=str_replace(" ", "", $arParams["COLOR_ERROR_TITLE"])?>;
	font-size:<?=str_replace(" ", "", $arParams["SIZE_NAME"])?>;
}
#alx_feed_back_default_<?=$ALX?> .alx_feed_back_form_mess_ok{
	font-size:<?=str_replace(" ", "", $arParams["SIZE_NAME"])?>;
	color:<?=str_replace(" ", "", $arParams["COLOR_MESS_OK"])?>;
}
#alx_feed_back_default_<?=$ALX?> .alx_feed_back_form_feedback_poles .alx_feed_back_form_name{
	font-size:<?=str_replace(" ", "", $arParams["SIZE_NAME"])?>;
	color:<?=str_replace(" ", "", $arParams["COLOR_NAME"])?>;
}
#alx_feed_back_default_<?=$ALX?> .alx_feed_back_form_feedback_poles .alx_feed_back_form_hint{
	font-size:<?=str_replace(" ", "", $arParams["SIZE_HINT"])?>;
	color:<?=str_replace(" ", "", $arParams["COLOR_HINT"])?>;
}
#alx_feed_back_default_<?=$ALX?> .alx_feed_back_form_feedback_poles .alx_feed_back_form_inputtext_bg input,
#alx_feed_back_default_<?=$ALX?> .alx_feed_back_form_feedback_poles .alx_feed_back_form_inputtext_bg textarea,
#alx_feed_back_default_<?=$ALX?> .alx_feed_back_form_feedback_poles .alx_feed_back_form_inputtext_bg select,
#alx_feed_back_default_<?=$ALX?> .alx_feed_back_form_feedback_poles .alx_feed_back_form_filename,
#alx_feed_back_default_<?=$ALX?> .alx_feed_back_form_feedback_poles .alx_feed_back_form_file_button_bg{
	font-size:<?=str_replace(" ", "", $arParams["SIZE_INPUT"])?>;
	color:<?=str_replace(" ", "", $arParams["COLOR_INPUT"])?>;
	font-family:tahoma;
}
#alx_feed_back_default_<?=$ALX?> .alx_feed_back_form_feedback_poles .alx_feed_back_form_file_input_add{
	font-size:<?=str_replace(" ", "", $arParams["SIZE_INPUT"])?> !important;
	color:<?=str_replace(" ", "", $arParams["COLOR_INPUT"])?>;
}
#alx_feed_back_default_<?=$ALX?> .alx_feed_back_form_feedback_poles .alx_feed_back_form_required_text{
	color:red;
}
</style>

<?endif;?>

<?if($arParams['ALX_CHECK_NAME_LINK']=='Y'):?>
<script type="text/javascript">
$(document).ready(function(){var a;$("a").click(function(){"alx_feedback_popup"==$(this).attr("class")&&(a=$(this).attr("id").split("_")[2]);$(".alx_feedback_popup").fancybox({ajax:{type:"POST",data:"OPEN_POPUP_"+a+"=Y"},titleShow:!1,type:"ajax",href:"",afterShow:function(){"undefined"!=typeof AltasibFeedbackOnload_<?=$ALX?>&&AltasibFeedbackOnload_<?=$ALX?>()},overlayShow:!1,autoDimensions:!1,helpers:{overlay:null}})})});
</script>
<?endif?>

<script src="<?=$templateFolder;?>/chosen/chosen.jquery.js" type="text/javascript"></script>
<script src="<?=$templateFolder;?>/chosen/jquery.formstyler.js" type="text/javascript"></script>
<script src="<?=$templateFolder;?>/chosen/demo.js" type="text/javascript"></script>
<script type="text/javascript">
    var config = {
      '.chosen-select'           : {},
      '.chosen-select-deselect'  : {allow_single_deselect:true},
      '.chosen-select-no-single' : {disable_search_threshold:10},
      '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
      '.chosen-select-width'     : {width:"95%"}
    }

    var $j1 = jQuery.noConflict();
    for (var selector in config) {
      $j1(selector).chosen(config[selector]);
    }
</script>
