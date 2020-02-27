<?php
$arClasses = array(
	'CLS\\General\\CLSIBlockEvent' => 'lib/CLSIBlockEvent.php',
	'CLS\\General\\CLSIBlockElementMacros' => 'lib/CLSIBlockElementMacros.php'
);

CModule::AddAutoloadClasses('logicasoft.iblockevent', $arClasses);

$arJSDescription = array(
	'js' => '/bitrix/js/ogicasoft.iblockevent/script.js',
	'css' => '/bitrix/js/ogicasoft.iblockevent/css/options.css',
	'rel' => array('popup', 'ajax', 'fx', 'ls', 'date', 'json')
);


CJSCore::RegisterExt('logicasoft.iblockevent', $arJSDescription);

IncludeModuleLangFile(__FILE__);
?>