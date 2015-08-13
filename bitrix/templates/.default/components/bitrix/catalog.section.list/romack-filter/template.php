<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
			<div class="row">
				<div class="col-xs-30">
					<div class="bordery">
						<table class="table table-bordered navitable">
							<tbody>
								<tr>
	<td>                                        
		<a href="<?=$arParams["MAIN_PATH"]?>" <?if ($arParams["CUR_PATH"] == $arParams["MAIN_PATH"]):?>id="active"<?endif?>>
				Все
		</a>
	</td>
<?
$td_in_tr = $arParams["ITEMS_IN_ROW"];
$cur = 0;
foreach($arResult["SECTIONS"] as $arSection):
	if (($cur%$td_in_tr==0)&&($cur > 0)) echo "<tr>";
	$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_EDIT"));
	$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_DELETE"), array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM')));
	$pos_blank = strpos(trim($arSection["NAME"]), " ");
?>
	<td id="<?=$this->GetEditAreaId($arSection['ID']);?>">
		<a href="<?=$arSection["SECTION_PAGE_URL"]?>" <?if ($arParams["CUR_PATH"] == $arSection["SECTION_PAGE_URL"]):?>id="active"<?endif?>>
			<?=$arSection["NAME"]?>
		</a>
	</td>
<?
	$cur++;
	if ($cur%$td_in_tr==0) echo "</tr>"
?>
<?endforeach?>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
