<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div class="catalog-title">
<?
$ar_result=CIBlockSection::GetList(Array("SORT"=>"ASC"), Array("IBLOCK_ID"=>$arResult["IBLOCK_ID"], "ID"=>$arResult["ID"]),false, Array("UF_H1")); 
$res=$ar_result->GetNext();

$header = ($res["UF_H1"] =='') ? $arResult["NAME"] : $res["UF_H1"];
?>
<?if ($header != ""):?>
	<div class="title">
		<h1><?=$header?></h1>
	</div>
<?endif?>
<?                         
	if ($arResult["ID"] == 5) $product_name = "Световые рекламные короба";
	elseif ($arResult["ID"] == 7) $product_name = "Короба для автошкол";
	elseif ($arResult["ID"] == 8) $product_name = "Магнитные наклейки на такси";
	elseif ($arResult["ID"] == 0) $product_name = "";
	else $product_name = '<img src="'.SITE_TEMPLATE_PATH.'/images/product_name.gif" alt="Наименование продукции" title="Наименование продукции" />';
	

?>
<? // adl 24.10.13 Для световых коробов текст будет внизу
  if ($arResult["ID"] != 5):?>
<?if ($arResult["DESCRIPTION"]!=""):?>
	<div class="catalog-description">
		<?=$arResult["DESCRIPTION"]?>
	</div>
<?endif?>
<?endif?>
<div class="r-catalog">
<?
foreach($arResult["ITEMS"] as $cell=>$arElement):
	$this->AddEditAction($arElement['ID'], $arElement['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arElement['ID'], $arElement['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CATALOG_ELEMENT_DELETE_CONFIRM')));
?>
	<div class="col-xs-10" style="background: #ffffff;" <?/*onmouseover="this.style.borderColor='#ED4444';" onmouseout="this.style.borderColor='#bcbcbc';"*/?> >
		<div class="item">
			<div class="item-inner">
				<a href="<?=$arElement["DETAIL_PAGE_URL"]?>">
					<img src="/thumb/247x185xin<?=$arElement["DETAIL_PICTURE"]["SRC"]?>" width="247" height="185" alt="<?=$arElement["NAME"]?>" title="<?=$arElement["NAME"]?>" />
					<span class="item-category"><?=$product_name;?></span>
					<h3 class="item-name">&#8220;<?=$arElement["NAME"]?>&#8221;</h3>
				</a>
<? if ($arResult["ID"] != 0) { ?>
				<div class="prop-block" id="prop-size">
					<p class="prop-name">Размер</p>
					<p class="prop-value"><?=$arElement["PROPERTIES"]["SIZE"]["VALUE"];?></p>
				</div>
				<div class="prop-block" id="prop-color">
					<p class="prop-name">Цвет</p>
					<p class="prop-value"><?=str_replace('оранжевый', 'оранж.', strtolower($arElement["PROPERTIES"]["COLOR"]["VALUE"]));?></p>
				</div>
				<div class="order-block">
					<p class="item-price"><?=$arElement["PROPERTIES"]["PRICE"]["VALUE"];?></p>
					<form id="buy<?=$arElement["ID"]?>" action="/buy_now/" method="post">
						<input type="hidden" name="product_id" value="<?=$arElement["ID"]?>"/>
					</form>
					<a style="cursor:pointer" class="item-order" onclick="document.getElementById('buy<?=$arElement["ID"]?>').submit();">Заказать</a>
				</div>

<?	if (trim($arElement["PROPERTIES"]["DISCOUNT_TABLE"]["VALUE"]) <> '') {
		$arDiscount = preg_split("/[:;]/" , $arElement["PROPERTIES"]["DISCOUNT_TABLE"]["VALUE"]);

		// adl 05.04.15 В поле скидки может быть два значения, разбираем это
		$arDisc1 = explode("," , $arDiscount[1]);
		$arDisc2 = explode("," , $arDiscount[3]);
		$arDisc3 = explode("," , $arDiscount[5]);

		// Вычисляем реальную скидку на продукцию
		foreach ($arDisc1 as &$disc)
			if (strpos($disc, "%") !== false) $disc = $arElement["PROPERTIES"]["PRICE"]["VALUE"] - $arElement["PROPERTIES"]["PRICE"]["VALUE"]*$disc/100;
		foreach ($arDisc2 as &$disc)
			if (strpos($disc, "%") !== false) $disc = $arElement["PROPERTIES"]["PRICE"]["VALUE"] - $arElement["PROPERTIES"]["PRICE"]["VALUE"]*$disc/100;
		foreach ($arDisc3 as &$disc)
			if (strpos($disc, "%") !== false) $disc = $arElement["PROPERTIES"]["PRICE"]["VALUE"] - $arElement["PROPERTIES"]["PRICE"]["VALUE"]*$disc/100;

		unset($disc);

		// В зависимости от того, есть или нет вторая скидка - формируем все три строчки
		if ($arDisc1[1] != "")
			$string1 = "<del>" . $arDisc1[0] . "</del>&nbsp;<font color='#FF2B23'>" . $arDisc1[1] . "</font>";
		else
			$string1 = $arDisc1[0];
		if ($arDisc2[1] != "")
			$string2 = "<del>" . $arDisc2[0] . "</del>&nbsp;<font color='#FF2B23'>" . $arDisc2[1] . "</font>";
		else
			$string2 = $arDisc2[0];
		if ($arDisc3[1] != "")
			$string3 = "<del>" . $arDisc3[0] . "</del>&nbsp;<font color='#FF2B23'>" . $arDisc3[1] . "</font>";
		else
			$string3 = $arDisc3[0];

		$whole_string = $string1 . "<br/>" . $string2 . "<br/>" . $string3; // Собираем все три строчки в одну
	?>
				<div class="all-prices">
					<p class="prices">
<?=$whole_string;?>
<?/*=($arElement["PROPERTIES"]["PRICE"]["VALUE"] - $arElement["PROPERTIES"]["PRICE"]["VALUE"]*$arDiscount[1]/100);?>
<br><?=($arElement["PROPERTIES"]["PRICE"]["VALUE"] - $arElement["PROPERTIES"]["PRICE"]["VALUE"]*$arDiscount[3]/100);?>
<br><?=($arElement["PROPERTIES"]["PRICE"]["VALUE"] - $arElement["PROPERTIES"]["PRICE"]["VALUE"]*$arDiscount[5]/100);*/?></p>
					<p class="count">От <?=$arDiscount[0];?> шт.<br>От <?=$arDiscount[2];?> шт.<br>От <?=$arDiscount[4];?> шт.</p>
				</div>
				<p class="item-note">* От <?=$arDiscount[6];?> шт. <?=strtolower($arDiscount[7]);?>.</p>
<? } // цены ?>
<? } // если не услуги ?>
			</div>
		</div>
	</div>

<?
endforeach; // foreach($arResult["ITEMS"] as $arElement):
?>
</div>
<? // adl 24.10.13 Для световых коробов текст будет внизу
  if ($arResult["ID"] == 5):?>
<?if ($arResult["DESCRIPTION"]!=""):?>
	<div class="catalog-description" clear="both" style="display:inline-block;">
		<?=$arResult["DESCRIPTION"]?>
	</div>
<?endif?>
<?endif?>
</div>
