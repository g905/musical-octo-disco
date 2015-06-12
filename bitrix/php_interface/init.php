<?
//adl 12.06.15 Своя функция для написания seo-заголовков
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/iblock/lib/template/functions/fabric.php');

use Bitrix\Main;

$eventManager = Main\EventManager::getInstance();
$eventManager->addEventHandler("iblock", "OnTemplateGetFunctionClass", "myOnTemplateGetFunctionClass");

function myOnTemplateGetFunctionClass(Bitrix\Main\Event $event) {
   $arParam = $event->getParameters();
   $functionClass = $arParam[0];
   if (is_string($functionClass) && class_exists($functionClass) && $functionClass=='limit_nost'){
      $result = new Bitrix\Main\EventResult(1,$functionClass);
      return $result;
   }
}

class limit_nost extends Bitrix\Iblock\Template\Functions\FunctionBase
{
   public function onPrepareParameters(\Bitrix\Iblock\Template\Entity\Base $entity, $parameters)
   {
      $arguments = array();
      /** @var \Bitrix\Iblock\Template\NodeBase $parameter */
      foreach ($parameters as $parameter)
      {
         $arguments[] = $parameter->process($entity);
      }
      return $arguments;
   }

   public function calculate(array $parameters)
   {          
         //последний параметр - длина строки
         $length = array_pop($parameters);

         //берем определенное количество символов после того, как вырежем все html-теги и удалим переносы строки
         return substr(str_replace(array("\r\n", "\r", "\n"), '', strip_tags(implode(" ", $parameters))), 0, $length);

   }
}

?>