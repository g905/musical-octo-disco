<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if (!is_array($arResult["arMap"]) || count($arResult["arMap"]) < 1)
	return;
	                                
$arRootNode = Array();
foreach($arResult["arMap"] as $index => $arItem)
{
	if ($arItem["LEVEL"] == 0)
		$arRootNode[] = $index;
}

$allNum = count($arRootNode);
$colNum = ceil($allNum / $arParams["COL_NUM"]);

$currentArray = "";
// adl 23.05.14 Разбиваем на два массива - один только разделы без подразделов(исключая Контакты), второй все разделы с подразделами и контакты
// adl 03.06.14 Второй массив разбиваем ещё на два - информация и продукция
foreach($arResult["arMap"] as $index => $arItem) {
	if ((($arItem["NAME"] == "Главная")||/*($arItem["NAME"] == "Доставка и оплата")||*/($arItem["NAME"] == "Заказать"))&&($arItem["LEVEL"] == 0)) {
		$arResultMain[] = $arItem;
		unset($arResult["arMap"][$index]);
	}
	if (($currentArray == "production")&&($arItem["LEVEL"] > 0)) {
		$arResultProduction[] = $arItem;
		unset($arResult["arMap"][$index]);
	}
	if (($currentArray == "information")&&($arItem["LEVEL"] > 0)) {
		$arResultInformation[] = $arItem;
		unset($arResult["arMap"][$index]);
	}
	if (($arItem["NAME"] == "Продукция")&&($arItem["LEVEL"] == 0)) {
		$currentArray = "production";
	}
	if (($arItem["NAME"] == "Информация")&&($arItem["LEVEL"] == 0)) {
		$currentArray = "information";
	}
	if (($arItem["NAME"] == "Контакты")&&($arItem["LEVEL"] == 0)) {
		$currentArray = "";
	}
}
?>

			<div class="row">

				<div class="col-xs-5 text-center" id="foot1">
					<ul class="media-list">
		<?foreach($arResultMain as $index => $arItem0):?>
						<li><h4 class="h3"><a href="<?=$arItem0["FULL_PATH"]?>"><?=$arItem0["NAME"]?></a></h4></li>
		<?endforeach?>
					</ul>
				</div>

				<div class="col-xs-10 text-center" id="foot2">
					<h3 class="h3"><a href="/products/">Продукция</a></h3>
					<div id="links">
						<ul class="media-list text-left">
		<?foreach($arResultProduction as $index => $arItem1):?>
							<li><a href="<?=$arItem1["FULL_PATH"]?>"><?=$arItem1["NAME"]?></a></li>
		<?endforeach?>
						</ul>
					</div>
				</div>

				<div class="col-xs-9 text-center" id="foot3">
					<h3 class="h3" style="margin-left: 36px;"><a href="/delivery/">Доставка и оплата</a></h3>
					<!--div id="links">
						<ul class="media-list text-left ulmenu">
		<?foreach($arResultInformation as $index => $arItem2):?>
							<li><a href="<?=$arItem2["FULL_PATH"]?>"><?=$arItem2["NAME"]?></a></li>
		<?endforeach?>
						</ul>
					</div-->
				</div>

				<div class="col-xs-7 text-center" id="foot4">
					<h3 class="h3"><a href="/contacts/">Контакты</a></h3>
					<div id="links">
					<?$APPLICATION->IncludeComponent(
						"bitrix:main.include",
						"",
						Array(
							"AREA_FILE_SHOW" => "sect",
							"AREA_FILE_SUFFIX" => "contacts_pre_bottom",
							"AREA_FILE_RECURSIVE" => "Y",
							"EDIT_TEMPLATE" => ""
						),
					false
					);?>				
					</div>
				</div>
			</div>