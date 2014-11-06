<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<ul>
<?
foreach($arResult["SECTIONS"] as $arSection):
?>
	<li>
		<a href="<?=$arSection["SECTION_PAGE_URL"];?>">
			<?=$arSection["NAME"]?>
		</a>
	</li>
<?endforeach?>
</ul>