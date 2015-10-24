<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Ищем дилеров нашей продукции");
?> 
            <div class="nav">

<?$APPLICATION->IncludeComponent(
	"bitrix:breadcrumb",
	"nost",
	Array(
		"START_FROM" => "0",
		"PATH" => "",
		"SITE_ID" => "-"
	),
false
);?>    
            
            </div>
		<a name="cont"></a> 
		<div class="container subtext">
			Мы ищем дилеров нашей продукции!
		</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>