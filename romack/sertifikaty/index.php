<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Сертификаты");
?>
<div class="nav">
<?$APPLICATION->IncludeComponent(
	"bitrix:breadcrumb",
	"nost",
	Array(
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"PATH" => "",
		"SITE_ID" => "s2",
		"START_FROM" => "0"
	)
);?>
</div>
<script>
    jQuery(document).ready(function() {
        jQuery('.big-image').fancybox();
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
						Все изделия под Торговой Маркой Romack производятся в соответствии с сертификатом соответствия № ТС RU С RU.АБ93.В.02528 Серия RU № 0615892<br>
						Код ТН ВЭД ТС 9403 60 100 9 Соответствует требованиям технического регламента таможенного союза ТР ТС 025/2012 "О безопасности мебельной продукции"<br>
						Сертификат выдан 20.10.2017 органом по сертификации ООО "Сертификационный центр в области машиностроения" г.Москва.<br><br>
						Срок действия сертификата до 19.10.2022г.
					</p>
				</div>
			</div>
		</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>