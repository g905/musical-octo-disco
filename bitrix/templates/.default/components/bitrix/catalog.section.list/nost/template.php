<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
			<div class="row proizv">
				<h1 class="h2" style="font-size:28px; color:#000;">Шашки на такси</h1>
					<div class="our-products">
<script type="text/javascript">
	$j23 = jQuery.noConflict();
</script>
<?
// adl 26.10.14 Дебильные массивы, задающие какие товары из каких категорий брать
  $arProducts['39'] = Array(197,198,338,102,104); // преимум
  $arProducts['6'] = Array(Array(9, 51),Array(9, 43),Array(25, 86),Array(26, 89),Array(28, 182)); // стандарт
  $arProducts['5'] = Array(122,123,124,169,121); // короба
  $arProducts['7'] = Array(114,118,116,117,115); // учебки
  $arProducts['8'] = Array(110,111,112,113,0); // наклейки

?>

<?
foreach($arResult["SECTIONS"] as $arSection):
	$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_EDIT"));
	$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_DELETE"), array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM')));
?>

<?
// Получаем пять элементов заданной категории, чтобы вывести их свойства
$arSelect = Array("ID", "IBLOCK_ID", "NAME", "DATE_ACTIVE_FROM", "CODE", "DETAIL_PICTURE", "PROPERTY_*");
for($i=0; $i<5; $i++) {
	// Для категории "Шашки на такси" особенный алгоритм выбора товаров
	if ($arSection['ID'] <> 6) 
		$arFilter = Array("IBLOCK_ID"=>2, "SECTION_ID"=>$arSection["ID"], "ID"=> $arProducts[$arSection['ID']][$i], "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
	else
		$arFilter = Array("IBLOCK_ID"=>2, "SECTION_ID"=>$arProducts[$arSection["ID"]][$i][0], "ID"=> $arProducts[$arSection['ID']][$i][1], "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
	$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>5), $arSelect);
	$res_res[$i] = $res;
}
?>

			<div class="row">
				<div class="category">
					<a href="<?=$arSection["SECTION_PAGE_URL"]?>" style="display:block;text-decoration:none;" onmouseenter="$j23('#img<?=$arSection['ID'];?>').removeClass('taxiPict').addClass('taxiPictHover');" onmouseleave="$j23('#img<?=$arSection['ID'];?>').removeClass('taxiPictHover').addClass('taxiPict');">
						<p  class="title" style="box-shadow: inset 0px 0px 14px #A9A3A3;border-radius: 18px;padding: 4px 18px;">
							<img src="<?=SITE_TEMPLATE_PATH?>/images/texi.png" id="img<?=$arSection['ID'];?>" class="taxiPict" style="position: relative;margin: -30px 12px 0;"><span id="title_a" style="text-decoration:none;font-size:21px;"><?=$arSection["NAME"];?></span>
							<span class="goto-section1" style="text-decoration:underline;float: right;">Посмотреть все <?=$arSection["ELEMENT_CNT"]?> товаров</span>
						</p>
					</a>
					<div class="products">
					<?

					?>
<?for($v=0; $v<5; $v++) {
 $ob = $res_res[$v]->GetNextElement();
 if (!$ob) continue;
 $arFields = $ob->GetFields();  
 $arProps = $ob->GetProperties(); 

 // Вычисляем цену "от" - самая минимальная цена, всегда 3-ая позиция с строчке скидок берется
 $price_from = $arProps["PRICE"]["VALUE"];
 if (trim($arProps["DISCOUNT_TABLE"]["VALUE"]) <> '') {
	$arDiscount = preg_split("/[:;]/" , $arProps["DISCOUNT_TABLE"]["VALUE"]); 
	// adl 05.04.15 В $arDiscount[5] могуть быть проценты и не проценты, также там может быть два значения
	$arDisc = explode("," , $arDiscount[5]);
	$discount = ($arDisc[1] == "") ? $arDisc[0] : $arDisc[1];

	// Разбираем в процентах у нас скидки или в абсолютных значениях
	if (strpos($discount, "%") === false)
		$price_from = $discount;
	else
		$price_from = $arProps["PRICE"]["VALUE"] - $arProps["PRICE"]["VALUE"]*$discount/100;
 }


$full_path = '/products/'.$arSection["CODE"].'/';

if ($arSection["ID"] == 6) { // Только для стандартных шашек получаем полный путь до продукции
	$nav = CIBlockSection::GetNavChain(false,$arProducts[$arSection["ID"]][$v][0]);
	while($arSectionPath = $nav->GetNext()){
		if ($arProducts[$arSection["ID"]][$v][0] == $arSectionPath[ID])
			$full_path = $arSectionPath["SECTION_PAGE_URL"];
	} 
}

 $arFields["DETAIL_PICTURE"] = CFile::GetFileArray($arFields["DETAIL_PICTURE"]);

// adl 27.09.15 Добавляем надпись "Шашки на такси" для некоторых категорий
$add_text = "";
if (($arSection["ID"] == 6)||($arSection["ID"] == 39)) { 
	$add_text = "Шашки на такси<br/>";
}
?>

						<div class="col-xs-6">
							<a class="item anchor" href="<?=$full_path?><?=$arFields["CODE"]?>.html">
								<img src="/thumb/160x104xcut<?=$arFields["DETAIL_PICTURE"]["SRC"]?>" alt="<?=$arFields["NAME"];?>" title="<?=$arFields["NAME"];?>" class="product-img" />
								<span class="product-name"><?=$add_text;?>&#8220;<?=$arFields["NAME"];?>&#8221;</span>
								<p class="product-price">от <?=$price_from;?> р</p>
								<span class="product-size"><?=$arProps["SIZE"]["VALUE"];?></span>
							</a>
						</div>
<?}?>
						<div class="clearfix"></div>						
					</div>
				</div>
			</div>






<?endforeach?>
					</div>
			</div>
