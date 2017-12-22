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

<script>
	var i$ = jQuery.noConflict();
        i$(document).ready(function() {
            i$('.big-image').fancybox();
        });
</script>            

<h1 style="margin-left:13px;">Сертификаты соответствия</h1>
		<a name="cont"></a> 
		<div class="container subtext">
			<div class="row center-row">
				<div class="col-xs-push-1 col-xs-5 center">
					<a href="/sertifikaty/pic/cerificate.jpg" class="big-image" rel="images" title="Сертификат">
						<img style="width: 300px;" src="/sertifikaty/pic/cerificate.jpg">
					</a>
				</div>
				<div class="col-xs-24 col-xs-push-1 center">
					<h2 class="h2">Сертификат соответствия на продукцию</h2>
					<p>
						Все изделия под Торговой Маркой "НОСТ" производятся в соответствии с сертификатом соответствия РОСС RU.АД44.Н05839. <br><br>
						Сертификат выдан 12.10.2017 органом по сертификации ООО "СертЦентр" г.Ульяновск.<br>
						Срок действия сертификата до 11.10.2020.
					</p>
				</div>
			</div>
		</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>