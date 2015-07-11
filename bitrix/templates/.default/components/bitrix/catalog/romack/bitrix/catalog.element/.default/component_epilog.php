<?		
global $APPLICATION;

// adl 14.12.14 Подключаем фансибокс
$APPLICATION->AddHeadScript($templateFolder."/fancybox/jquery.fancybox.pack.js");
$APPLICATION->SetAdditionalCSS($templateFolder."/fancybox/jquery.fancybox.css");

?>