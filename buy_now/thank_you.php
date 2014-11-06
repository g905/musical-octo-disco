<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Оформить заказ");
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

<p>&nbsp;</p>
<div style="text-align: center;font-family:Verdana;">

<h1>Спасибо за обращение в ПК "НОСТ"!</h1>
Ваш заказ успешно отправлен.
<br/><br/>
А пока мы его обрабатываем Вы можете посетить раздел <a href="/photo/" title="Фото">"<font color="blue">Фото</font>"</a> или <a href="/video/" title="Видео">"<font color="blue">Видео</font>"</a> на нашем сайте.

</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>