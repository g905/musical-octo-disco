<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<h1>Мы производим</h1>
<? $i = 0; ?>
<?foreach($arResult["SECTIONS"] as $arSection):?>
<div class="r-catalog" clear="both" style="display:inline-block;<?if ($i==0) {echo 'margin-top: -50px;';$i++;}?>">
<?
	$ar_result=CIBlockSection::GetList(Array("SORT"=>"ASC"), Array("IBLOCK_ID"=>$arSection["IBLOCK_ID"], "ID"=>$arSection["ID"]),false, Array("UF_ADDTITLE")); 
	$res=$ar_result->GetNext();
?>	
	<div class="title" style="background: #ebebeb;">
		<p><?=($res["UF_ADDTITLE"] =='') ? $arSection["NAME"] : $res["UF_ADDTITLE"];?></p>
	</div>
	<?
		foreach($arSection["ITEMS"] as $arElement):
	?>
	<?
		$this->AddEditAction($arElement['ID'], $arElement['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arElement['ID'], $arElement['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BCST_ELEMENT_DELETE_CONFIRM')));
	?>                                                         
	<div class="col-xs-10" style="background: #ffffff;" <?/*onmouseover="this.style.borderColor='#ED4444';" onmouseout="this.style.borderColor='#bcbcbc';"*/?> >
		<div class="item">
			<div class="item-inner">
				<a href="<?=$arElement["DETAIL_PAGE_URL"]?>" style="color: #000;">
					<img src="/thumb/247x185xin<?=$arElement["DETAIL_PICTURE"]["SRC"]?>" width="247" height="185" alt="<?=$arElement["NAME"]?>" title="<?=$arElement["NAME"]?>" />
					<span class="item-category"><img src="<?=SITE_TEMPLATE_PATH;?>/images/product_name.gif" alt="Наименование продукции" title="Наименование продукции"/></span>
					<h3 class="item-name">&#8220;<?=$arElement["NAME"]?>&#8221;</h3>
				</a>
				<div class="prop-block" id="prop-size">
					<p class="prop-name">Размер</p>
					<p class="prop-value"><?=$arElement["PROPERTIES"]["SIZE"]["VALUE"];?></p>
				</div>
				<div class="prop-block" id="prop-color">
					<p class="prop-name">Цвет</p>
					<p class="prop-value"><?=str_replace('оранжевый', 'оранж.', strtolower($arElement["PROPERTIES"]["COLOR"]["VALUE"]));?></p>
				</div>
				<div class="order-block">
					<p class="item-price"><?=$arElement["PROPERTIES"]["PRICE"]["VALUE"];?><span style="font-family: Tahoma;font-size: 14px;"> Руб.</span></p>
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
			$string1 = "<del>" . $arDisc1[0] . "</del>&nbsp;<font color='#FF2B23'>" . $arDisc1[1] . "</font><span style='font-family: Tahoma;font-size: 14px; color:#FF2B23'> руб.</span>";
		else
			$string1 = $arDisc1[0]."<span style='font-family: Tahoma;font-size: 14px;'> руб.</span>";
		if ($arDisc2[1] != "")
			$string2 = "<del>" . $arDisc2[0] . "</del>&nbsp;<font color='#FF2B23'>" . $arDisc2[1] . "</font><span style='font-family: Tahoma;font-size: 14px; color:#FF2B23'> руб.</span>";
		else
			$string2 = $arDisc2[0]."<span style='font-family: Tahoma;font-size: 14px;'> руб.</span>";
		if ($arDisc3[1] != "")
			$string3 = "<del>" . $arDisc3[0] . "</del>&nbsp;<font color='#FF2B23'>" . $arDisc3[1] . "</font><span style='font-family: Tahoma;font-size: 14px; color:#FF2B23'> руб.</span>";
		else
			$string3 = $arDisc3[0]."<span style='font-family: Tahoma;font-size: 14px;'> руб.</span>";

		// adl 20.03.2016 уменьшаем отступ справа, если цифры очень большие
		$pad_right = '';
		if ( (($arDisc1[0]>999)&&($arDisc1[1]>999)) || (($arDisc2[0]>999)&&($arDisc2[1]>999)) || (($arDisc3[0]>999)&&($arDisc3[1]>999)) ) $pad_right = 'style="padding-right:5px;"';


		$whole_string = $string1 . "<br/>" . $string2 . "<br/>" . $string3; // Собираем все три строчки в одну

	?>
				<div class="all-prices">
					<p class="prices" <?=$pad_right;?>>
<?=$whole_string;?>
<?/*=($arElement["PROPERTIES"]["PRICE"]["VALUE"] - $arElement["PROPERTIES"]["PRICE"]["VALUE"]*$arDiscount[1]/100);?>
<br><?=($arElement["PROPERTIES"]["PRICE"]["VALUE"] - $arElement["PROPERTIES"]["PRICE"]["VALUE"]*$arDiscount[3]/100);?>
<br><?=($arElement["PROPERTIES"]["PRICE"]["VALUE"] - $arElement["PROPERTIES"]["PRICE"]["VALUE"]*$arDiscount[5]/100);*/?></p>
					<p class="count">От <?=$arDiscount[0];?> шт.<br>От <?=$arDiscount[2];?> шт.<br>От <?=$arDiscount[4];?> шт.</p>
				</div>
				<p class="item-note">* От <?=$arDiscount[6];?> шт. <?=strtolower($arDiscount[7]);?>.</p>
<? } ?>
			</div>
		</div>
	</div>
	<?
		endforeach; // foreach($arResult["ITEMS"] as $arElement):
	?>
</div>
<?endforeach?>
<?/* Баннер "Не забудьте посетить раздел "Премиум""*/?>
<?
$nextSect = CIBlockSection::GetList(array(), array('IBLOCK_ID' => 2, 'ID' => 39), false, array('CODE', 'ID') )->fetch(); 
?>
<?
// Получаем пять элементов заданной категории, чтобы вывести их свойства
$arSelect = Array("ID", "IBLOCK_ID", "NAME", "DATE_ACTIVE_FROM", "CODE", "DETAIL_PICTURE", "PROPERTY_*");
$arFilter = Array("IBLOCK_ID"=>2, "SECTION_ID"=>$nextSect["ID"], "ID"=> array(102,103,104,192,188), "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>5), $arSelect);
?>
		<div class="banner-wide">
			<div class="category">
				<p class="title">
					<a href="/products/<?=$nextSect["CODE"]?>/" class="like-title" style="color:red;">Не забудьте посетить раздел "Премиум"</a>
					<a href="/products/<?=$nextSect["CODE"]?>/" class="goto-section"></a>
				</p>
				<div class="products">
<?while($ob = $res->GetNextElement()){ 
 $arFields = $ob->GetFields();  
 $arProps = $ob->GetProperties();
 $arFields["DETAIL_PICTURE"] = CFile::GetFileArray($arFields["DETAIL_PICTURE"]);
?>
					<div class="col-xs-6">
						<a href="/products/<?=$nextSect["CODE"]?>/<?=$arFields["CODE"]?>.html" title="<?=$arFields["NAME"];?>" style="text-decoration:none;color: #000;">
						<div class="item">
							<img src="/thumb/160x104xcut<?=$arFields["DETAIL_PICTURE"]["SRC"]?>" alt="<?=$arFields["NAME"];?>" title="<?=$arFields["NAME"];?>" class="product-img" />
							<span class="product-name">&#8220;<?=$arFields["NAME"];?>&#8221;</span>
							<p class="product-price">от <?=$arProps["PRICE"]["VALUE"];?> р</p>
							<span class="product-size"><?=$arProps["SIZE"]["VALUE"];?></span>
						</div>
						</a>
					</div>
<?}?>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
