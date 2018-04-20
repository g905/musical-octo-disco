<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
			<div class="row proizv">
				<h2 class="h2" style="font-size:28px; color:#000;">Мы производим</h2>
					<div class="our-products">
<?
// adl 26.10.14 Дебильные массивы, задающие какие товары из каких категорий брать
  $arProducts['40'] = Array(356,360,361,362,363); 
  $arProducts['41'] = Array(array(45,382), array(46,443), array(48,423), array(49,404), array(47,397));
//  $arProducts['42'] = Array(368,369,370,371,372); 
  $arProducts['53'] = Array(477, 472, 476, 470, 468); 
  $arProducts['55'] = Array(965, 966, 968, 970, 969); 
  $arProducts['56'] = Array(974, 976, 973, 975, 972); 
  $arProducts['57'] = Array(1229, 1226, 1227, 1228, 1230);  // junior
  $arProducts['58'] = Array(1412, 1411, 1413, 1410, 1409);  // energy-m
  $arProducts['59'] = Array(1414, 1415, 1418, 1416, 1417);  // energy
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
	if ($arSection['ID'] <> 41) 
		$arFilter = Array("IBLOCK_ID"=>8, "SECTION_ID"=>$arSection["ID"], "ID"=> $arProducts[$arSection['ID']][$i], "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
	else
		$arFilter = Array("IBLOCK_ID"=>8, "SECTION_ID"=>$arProducts[$arSection["ID"]][$i][0], "ID"=> $arProducts[$arSection['ID']][$i][1], "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
	$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>5), $arSelect);
	$res_res[$i] = $res;
}
?>

			<div class="row">
				<div class="category">
					<p class="title">
						<a href="<?=$arSection["SECTION_PAGE_URL"]?>" style="text-decoration:none;font-size:21px;"><?=$arSection["NAME"];?></a>
						<a href="<?=$arSection["SECTION_PAGE_URL"]?>" class="goto-section"></a>
					</p>
					<div class="products">
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
?>

						<div class="col-xs-6">
							<a class="item anchor" href="<?=$full_path?><?=$arFields["CODE"]?>.html">
								<img src="/thumb/160x104xin<?=$arFields["DETAIL_PICTURE"]["SRC"]?>" alt="<?=$arFields["NAME"];?>" title="<?=$arFields["NAME"];?>" class="product-img" />
								<span class="product-name">&#8220;<?=$arFields["NAME"];?>&#8221;</span>
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
