<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

//delayed function must return a string
if(empty($arResult))
	return "";

$strReturn = '	
	<div class="container subtext">
		<div class="row">
			<ol class="breadcrumb">';

// adl 10.09.13 Чтобы выяснить текущий путь
global $APPLICATION;
$curPage = $APPLICATION->GetCurPage(true);


for($index = 0, $itemSize = count($arResult); $index < $itemSize; $index++)
{
	$title = htmlspecialcharsex($arResult[$index]["TITLE"]);
	if($itemSize > $index + 1)
		$strReturn .= '<li><a href="'.$arResult[$index]["LINK"].'" title="'.$title.'" class="but">'.$title.'</a></li>';
	else
		$strReturn .= '<li class="active">'.$title.'</li>';
}

$strReturn .= '		</ol>
		</div>
	</div>';

return $strReturn;
?>