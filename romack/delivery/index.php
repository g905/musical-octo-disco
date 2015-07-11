<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Доставка и оплата");
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
			<div class="row center-row">
				<div class="col-xs-push-1 col-xs-5 center">
					<img src="<?=SITE_TEMPLATE_PATH?>/images/moto.png">
				</div>
				<div class="col-xs-24 col-xs-push-1 center">
					<h2 class="h2">Условия доставки</h2>
					<p>
						Мы отправляем нашу продукцию по всей России и в страны СНГ транспортными компаниями <br><img src="<?=SITE_TEMPLATE_PATH?>/images/companies11.png"><img src="<?=SITE_TEMPLATE_PATH?>/images/companies12.png"><img src="<?=SITE_TEMPLATE_PATH?>/images/companies13.png"><br>
						При этом мы экономим Ваше время и деньги и передаем груз в транспортную компанию сами.  Обычно цена доставки на порядок ниже стоимости самой партии кроваток и не является определяющим фактором.
					</p>
				</div>
			</div>
			<div class="row center-row">
				<div class="col-xs-5 col-xs-push-1 center">
					<img src="<?=SITE_TEMPLATE_PATH?>/images/purse.png">
				</div>
				<div class="col-xs-24 col-xs-push-1 center">
					<h2 class="h2">Условия оплаты</h2>
					<p>
						После оформления заказа менеджеры нашей компании пришлют Вам счет на оплату. Оплата производится путем безналичного перечисления денежных средств через банк. Так же мы принимаем оплату от физических лиц через различные платежные системы<img src="<?=SITE_TEMPLATE_PATH?>/images/companies21.png"><img src="<?=SITE_TEMPLATE_PATH?>/images/companies22.png"><br>
						Уточните удобный для Вас способ оплаты у менеджеров отдела продаж по телефону 8 (909) 714-98-40
					</p>
				</div>
			</div>
			<div class="row center-row">
				<div class="col-xs-5 col-xs-push-1 center">
					<img src="<?=SITE_TEMPLATE_PATH?>/images/warranty.png">
				</div>
				<div class="col-xs-24 col-xs-push-1 center">
					<h2 class="h2">Гарантия</h2>
					<p>
						В соответствии с законодательством Российской Федерации срок предъявления претензий по качеству продукции - 14 календарных дней. 
					</p>
				</div>
			</div>
		</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>