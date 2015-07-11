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
<?if ($arResult["DESCRIPTION"]!=""):?>
	<div class="catalog-description">
		<?=$arResult["DESCRIPTION"]?>
	</div>
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
					<p class="prop-value"><?=strtolower($arElement["PROPERTIES"]["COLOR"]["VALUE"]);?></p>
				</div>
<? } // если не услуги ?>
			</div>
		</div>
	</div>

<?
endforeach; // foreach($arResult["ITEMS"] as $arElement):
?>
</div>
</div>
