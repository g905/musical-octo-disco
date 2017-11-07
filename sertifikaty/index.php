<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Наши сертификаты");
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

<h1 style="margin-left:13px;">Наши сертификаты</h1>
		<a name="cont"></a> 
		<div class="container subtext">
			<div class="row center-row">
				<div class="col-xs-push-1 col-xs-5 center">
					<img src="http://mtdata.ru/u7/photo5A8F/20015166689-0/original.jpg">
				</div>
				<div class="col-xs-24 col-xs-push-1 center">
					<h2 class="h2">Сертификат №1</h2>
					<p>
						текст будет добавлен позже
					</p>
				</div>
			</div>
			<div class="row center-row">
				<div class="col-xs-5 col-xs-push-1 center">
					<img src="http://mtdata.ru/u7/photo5A8F/20015166689-0/original.jpg">
				</div>
				<div class="col-xs-24 col-xs-push-1 center">
					<h2 class="h2">Сертификат №2</h2>
					<p>
						текст будет добавлен позже
					</p>
				</div>
			</div>
			<div class="row center-row">
				<div class="col-xs-5 col-xs-push-1 center">
					<img src="http://mtdata.ru/u7/photo5A8F/20015166689-0/original.jpg">
				</div>
				<div class="col-xs-24 col-xs-push-1 center">
					<h2 class="h2">Сертификат №3</h2>
					<p>
						текст будет добавлен позже
					</p>
				</div>
			</div>
		</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>