<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if (!is_array($arResult["arMapStruct"]) || count($arResult["arMapStruct"]) < 1)
	return;
?>
<ul>
<?
foreach($arResult["arMapStruct"] as $arSection1):
	foreach($arSection1["CHILDREN"] as $arSection2):
?>
	<li>
		<a href="<?=$arSection2["FULL_PATH"];?>">
			<?=$arSection2["NAME"]?>
		</a>
	</li>
	<?endforeach?>
<?endforeach?>
</ul>
