<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();
?>
<!DOCTYPE html>
<html lang="ru">
	<head>
		<title><?$APPLICATION->ShowTitle()?></title>
		<!-- Meta -->
		<meta charset="<?=LANG_CHARSET?>">
		<?$APPLICATION->ShowMeta("keywords")?>
		<?$APPLICATION->ShowMeta("description")?>
		<?if(count($_GET)):?><link rel="canonical" href="<?= 'https://npo-monolit.ru' . explode("?", $_SERVER['REQUEST_URI'])[0]; ?>"/><?endif;?>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<!-- Google Tag Manager -->
			<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
			new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
			j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
			'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
			})(window,document,'script','dataLayer','GTM-5DG2GWT');</script>
<!-- End Google Tag Manager -->
		<!-- !Meta -->
<!--		<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" />-->
<!--		<link rel="apple-touch-icon" sizes="76x76" href="/apple-touch-icon.png">-->
<!--		<link rel="manifest" href="/site.webmanifest">-->
<!--		<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">-->
<!--		<meta name="msapplication-TileColor" content="#ffffff">-->
<!--		<meta name="theme-color" content="#ffffff">-->
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="manifest" href="/site.webmanifest">
        <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#4d7a9b">
        <meta name="msapplication-TileColor" content="#4d7a9b">
        <meta name="theme-color" content="#376382">
		<!-- CSS -->
		<!--<link href="https://fonts.googleapis.com/css?family=Open+Sans:800&amp;subset=cyrillic" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700&amp;subset=cyrillic" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700&amp;subset=cyrillic" rel="stylesheet">-->
		<link href="/bitrix/templates/monolit/css/fonts.css" rel="stylesheet">
		<?$APPLICATION->SetAdditionalCSS("/bitrix/templates/monolit/reset.css");?>
		<?$APPLICATION->SetAdditionalCSS("/bitrix/templates/monolit/css/bootstrap.css");?>
		<?$APPLICATION->ShowCSS();?>
		<?$APPLICATION->SetAdditionalCSS("/bitrix/templates/monolit/js/fancybox/jquery.fancybox.css?v=2.1.5");?>
		<!-- !CSS -->
		<?$APPLICATION->AddHeadScript("https://code.jquery.com/jquery-3.0.0.min.js")?>
		<?$APPLICATION->ShowHeadStrings();?>
        <?$APPLICATION->ShowHeadScripts();?>
		<?$APPLICATION->AddHeadScript("/bitrix/templates/monolit/js/scrollbox/plugins.js")?>
		<?$APPLICATION->AddHeadScript("/bitrix/templates/monolit/js/scrollbox/sly.min.js")?>
		<?$APPLICATION->AddHeadScript("/bitrix/templates/monolit/js/scrollbox/horizontal.js")?>
		<?$APPLICATION->AddHeadScript("/bitrix/templates/monolit/js/isotope/isotope.pkgd.min.js")?>
		<?$APPLICATION->AddHeadScript("/bitrix/templates/monolit/js/fancybox/jquery.fancybox.js?v=2.1.5")?>
		<?$APPLICATION->AddHeadScript("/bitrix/templates/monolit/js/bootstrap.js")?>
		<?$APPLICATION->AddHeadScript("/bitrix/templates/monolit/js/dropdown.js")?>
		<?$APPLICATION->AddHeadScript("/bitrix/templates/monolit/js/main.js")?>
		<?IncludeTemplateLangFile(__FILE__);?>
		<!--[if lt IE 9]>
			<script src="/bitrix/templates/monolit/js/html5shiv.js"></script>
		<![endif]-->
        <?
        if (!$USER->IsAuthorized()) {
          CJSCore::Init(array('ajax', 'json', 'ls', 'session', 'jquery', 'popup', 'pull'));
        }
        ?>
	</head>
	<body <?if($GLOBALS["APPLICATION"]->GetCurPage() != "/"):?>class="internal"<?endif;?>>
	<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5DG2GWT"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
		<div id="panel">
			<?$APPLICATION->ShowPanel();?>
		</div>
		<header>
			<div class="content">
				<div class="top-bar">
					<nav class="top">
						<?$APPLICATION->IncludeComponent("bitrix:menu", "top", Array(
	"ROOT_MENU_TYPE" => "top",	// Тип меню для первого уровня
		"MAX_LEVEL" => "1",	// Уровень вложенности меню
		"CHILD_MENU_TYPE" => "left",	// Тип меню для остальных уровней
		"USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
		"DELAY" => "N",	// Откладывать выполнение шаблона меню
		"ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
		"MENU_CACHE_TYPE" => "N",	// Тип кеширования
		"MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
		"MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
		"MENU_CACHE_GET_VARS" => "",	// Значимые переменные запроса
		"COMPONENT_TEMPLATE" => "",
		"MENU_THEME" => ""
	),
	false
);?>
					</nav>
					<div class="email">
					<?$APPLICATION->IncludeFile(
							$APPLICATION->GetTemplatePath("/include/email.php"),
							Array(),
							Array("MODE"=>"php")
						);?>
					</div>
					<div class="social">
					<?//$APPLICATION->IncludeFile(
					//		$APPLICATION->GetTemplatePath("/include/social.php"),
					//		Array(),
					//		Array("MODE"=>"php")
					//	);?>
					</div>
				</div>
				<div class="header">
					<div class="logo">
						<?if ($GLOBALS["APPLICATION"]->GetCurPage() == "/"):?><img src="/bitrix/templates/monolit/images/logotype.png" alt="НПО Монолит"><h1>Монолит <span>научно-производственное предприятие</span></h1>
						<?else:?>
						<a href="/" title="На главную" target="_self"><img src="/bitrix/templates/monolit/images/logotype.png" alt="НПО Монолит"><div>Монолит <span>научно-производственное предприятие</span></div></a>
						<?endif;?>
                        <div class="btn-search-mob"><img width="25" alt="Поиск" title="Поиск" src="/upload/src-b.png"></div>

					</div>
                    <?
                        $APPLICATION->IncludeComponent("bitrix:search.form", "mobile", Array(

                        ),
                            false
                        );?>
					<div id="form_id_FID1" class="alx_feedback_popup"><span>Задать вопрос</span> менеджеру</div>

                    <div class="phone">
                        <?$APPLICATION->IncludeFile(
                            $APPLICATION->GetTemplatePath("/include/phone.php"),
                            Array(),
                            Array("MODE"=>"php")
                        );?>
                    </div>
				</div>

				<nav class="navbar navbar-expand-md navbar-dark  bg-dark">
				<?$APPLICATION->IncludeComponent(
	"bitrix:menu",
	"new_mobile",
	array(
		"ROOT_MENU_TYPE" => "catalog",
		"MAX_LEVEL" => "2",
		"CHILD_MENU_TYPE" => "left",
		"USE_EXT" => "Y",
		"DELAY" => "N",
		"ALLOW_MULTI_SELECT" => "N",
		"MENU_CACHE_TYPE" => "N",
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"MENU_CACHE_GET_VARS" => array(
		),
		"COMPONENT_TEMPLATE" => "catalog",
		"MENU_THEME" => ""
	),
	false
);?>
							<?$APPLICATION->IncludeComponent("bitrix:search.form", "top", Array(

	),
	false
);?>
					</nav>
			</div>
		</header>
		<?if($GLOBALS["APPLICATION"]->GetCurPage() == "/"):?>
		<section id="slider">
			<?$APPLICATION->IncludeComponent(
				"bisexpert:owlslider",
				"main",
				array(
					"AUTO_HEIGHT" => "Y",
					"AUTO_PLAY" => "Y",
					"AUTO_PLAY_SPEED" => "5000",
					"CACHE_TIME" => "3600",
					"CACHE_TYPE" => "A",
					"COMPOSITE" => "Y",
					"COUNT" => "2",
					"DISABLE_LINK_DEV" => "Y",
					"DRAG_BEFORE_ANIM_FINISH" => "Y",
					"ENABLE_JQUERY" => "N",
					"ENABLE_OWL_CSS_AND_JS" => "Y",
					"HEIGHT_RESIZE" => "750",
					"IBLOCK_ID" => "1",
					"IBLOCK_TYPE" => "content",
					"IMAGE_CENTER" => "Y",
					"INCLUDE_SUBSECTIONS" => "Y",
					"IS_PROPORTIONAL" => "Y",
					"ITEMS_SCALE_UP" => "N",
					"LINK_URL_PROPERTY_ID" => "1",
					"MAIN_TYPE" => "iblock",
					"MOUSE_DRAG" => "Y",
					"NAVIGATION" => "Y",
					"NAVIGATION_TYPE" => "arrows",
					"PAGINATION" => "N",
					"PAGINATION_NUMBERS" => "N",
					"PAGINATION_SPEED" => "800",
					"RANDOM" => "N",
					"RANDOM_TRANSITION" => "N",
					"RESPONSIVE" => "Y",
					"REWIND_SPEED" => "1000",
					"SCROLL_COUNT" => "1",
					"SECTION_ID" => "0",
					"SHOW_DESCRIPTION_BLOCK" => "Y",
					"SLIDE_SPEED" => "200",
					"SORT_DIR_1" => "asc",
					"SORT_DIR_2" => "asc",
					"SORT_FIELD_1" => "id",
					"SORT_FIELD_2" => "",
					"SPECIAL_CODE" => "unic",
					"STOP_ON_HOVER" => "Y",
					"TEXT_PROPERTY_ID" => "4",
					"TOUCH_DRAG" => "Y",
					"TRANSITION_TYPE_FOR_ONE_ITEM" => "default",
					"WIDTH_RESIZE" => "1920",
					"COMPONENT_TEMPLATE" => "main"
				),
				false
			);?>
		</section>
		<section id="application">
			<?$APPLICATION->IncludeComponent("bitrix:catalog.section", "spheres_nolink", Array(
	"ACTION_VARIABLE" => "action",	// Название переменной, в которой передается действие
		"ADD_PROPERTIES_TO_BASKET" => "Y",	// Добавлять в корзину свойства товаров и предложений
		"ADD_SECTIONS_CHAIN" => "N",	// Включать раздел в цепочку навигации
		"ADD_TO_BASKET_ACTION" => "ADD",
		"AJAX_MODE" => "N",	// Включить режим AJAX
		"AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
		"AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
		"AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
		"AJAX_OPTION_STYLE" => "Y",	// Включить подгрузку стилей
		"BACKGROUND_IMAGE" => "-",	// Установить фоновую картинку для шаблона из свойства
		"BASKET_URL" => "/personal/basket.php",	// URL, ведущий на страницу с корзиной покупателя
		"BROWSER_TITLE" => "-",	// Установить заголовок окна браузера из свойства
		"CACHE_FILTER" => "N",	// Кешировать при установленном фильтре
		"CACHE_GROUPS" => "Y",	// Учитывать права доступа
		"CACHE_TIME" => "36000000",	// Время кеширования (сек.)
		"CACHE_TYPE" => "A",	// Тип кеширования
		"COMPATIBLE_MODE" => "Y",	// Включить режим совместимости
		"CONVERT_CURRENCY" => "N",	// Показывать цены в одной валюте
		"CUSTOM_FILTER" => "",
		"DETAIL_URL" => "",	// URL, ведущий на страницу с содержимым элемента раздела
		"DISABLE_INIT_JS_IN_COMPONENT" => "N",	// Не подключать js-библиотеки в компоненте
		"DISPLAY_BOTTOM_PAGER" => "N",	// Выводить под списком
		"DISPLAY_COMPARE" => "N",	// Разрешить сравнение товаров
		"DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
		"ELEMENT_SORT_FIELD" => "sort",	// По какому полю сортируем элементы
		"ELEMENT_SORT_FIELD2" => "id",	// Поле для второй сортировки элементов
		"ELEMENT_SORT_ORDER" => "asc",	// Порядок сортировки элементов
		"ELEMENT_SORT_ORDER2" => "desc",	// Порядок второй сортировки элементов
		"FILTER_NAME" => "arrFilter",	// Имя массива со значениями фильтра для фильтрации элементов
		"HIDE_NOT_AVAILABLE" => "N",	// Недоступные товары
		"HIDE_NOT_AVAILABLE_OFFERS" => "N",	// Недоступные торговые предложения
		"IBLOCK_ID" => "3",	// Инфоблок
		"IBLOCK_TYPE" => "content",	// Тип инфоблока
		"INCLUDE_SUBSECTIONS" => "Y",	// Показывать элементы подразделов раздела
		"LAZY_LOAD" => "N",
		"LINE_ELEMENT_COUNT" => "",	// Количество элементов выводимых в одной строке таблицы
		"LOAD_ON_SCROLL" => "N",
		"MESSAGE_404" => "",	// Сообщение для показа (по умолчанию из компонента)
		"MESS_BTN_ADD_TO_BASKET" => "В корзину",
		"MESS_BTN_BUY" => "Купить",
		"MESS_BTN_DETAIL" => "Подробнее",
		"MESS_BTN_SUBSCRIBE" => "Подписаться",
		"MESS_NOT_AVAILABLE" => "Нет в наличии",
		"META_DESCRIPTION" => "-",	// Установить описание страницы из свойства
		"META_KEYWORDS" => "-",	// Установить ключевые слова страницы из свойства
		"OFFERS_LIMIT" => "5",	// Максимальное количество предложений для показа (0 - все)
		"PAGER_BASE_LINK_ENABLE" => "N",	// Включить обработку ссылок
		"PAGER_DESC_NUMBERING" => "N",	// Использовать обратную навигацию
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",	// Время кеширования страниц для обратной навигации
		"PAGER_SHOW_ALL" => "N",	// Показывать ссылку "Все"
		"PAGER_SHOW_ALWAYS" => "N",	// Выводить всегда
		"PAGER_TEMPLATE" => ".default",	// Шаблон постраничной навигации
		"PAGER_TITLE" => "Товары",	// Название категорий
		"PAGE_ELEMENT_COUNT" => "7",	// Количество элементов на странице
		"PARTIAL_PRODUCT_PROPERTIES" => "N",	// Разрешить добавлять в корзину товары, у которых заполнены не все характеристики
		"PRICE_CODE" => "",	// Тип цены
		"PRICE_VAT_INCLUDE" => "Y",	// Включать НДС в цену
		"PRODUCT_ID_VARIABLE" => "id",	// Название переменной, в которой передается код товара для покупки
		"PRODUCT_PROPERTIES" => "",	// Характеристики товара
		"PRODUCT_PROPS_VARIABLE" => "prop",	// Название переменной, в которой передаются характеристики товара
		"PRODUCT_QUANTITY_VARIABLE" => "quantity",	// Название переменной, в которой передается количество товара
		"PRODUCT_SUBSCRIPTION" => "Y",
		"PROPERTY_CODE" => array(	// Свойства
			0 => "",
			1 => "",
		),
		"RCM_PROD_ID" => $_REQUEST["PRODUCT_ID"],
		"RCM_TYPE" => "personal",
		"SECTION_CODE" => "",	// Код раздела
		"SECTION_ID" => $_REQUEST["SECTION_ID"],	// ID раздела
		"SECTION_ID_VARIABLE" => "SECTION_ID",	// Название переменной, в которой передается код группы
		"SECTION_URL" => "",	// URL, ведущий на страницу с содержимым раздела
		"SECTION_USER_FIELDS" => array(	// Свойства раздела
			0 => "",
			1 => "",
		),
		"SEF_MODE" => "N",	// Включить поддержку ЧПУ
		"SET_BROWSER_TITLE" => "N",	// Устанавливать заголовок окна браузера
		"SET_LAST_MODIFIED" => "N",	// Устанавливать в заголовках ответа время модификации страницы
		"SET_META_DESCRIPTION" => "N",	// Устанавливать описание страницы
		"SET_META_KEYWORDS" => "N",	// Устанавливать ключевые слова страницы
		"SET_STATUS_404" => "N",	// Устанавливать статус 404
		"SET_TITLE" => "N",	// Устанавливать заголовок страницы
		"SHOW_404" => "N",	// Показ специальной страницы
		"SHOW_ALL_WO_SECTION" => "N",	// Показывать все элементы, если не указан раздел
		"SHOW_CLOSE_POPUP" => "N",
		"SHOW_DISCOUNT_PERCENT" => "N",
		"SHOW_FROM_SECTION" => "N",
		"SHOW_MAX_QUANTITY" => "N",
		"SHOW_OLD_PRICE" => "N",
		"SHOW_PRICE_COUNT" => "1",	// Выводить цены для количества
		"TEMPLATE_THEME" => "blue",
		"USE_ENHANCED_ECOMMERCE" => "N",
		"USE_MAIN_ELEMENT_SECTION" => "N",	// Использовать основной раздел для показа элемента
		"USE_PRICE_COUNT" => "N",	// Использовать вывод цен с диапазонами
		"USE_PRODUCT_QUANTITY" => "N",	// Разрешить указание количества товара
		"COMPONENT_TEMPLATE" => "board"
	),
	false
);?>
		</section>
		<section id="advantages">
			<?$APPLICATION->IncludeComponent("bitrix:news.list", "advantages", Array(
	"ACTIVE_DATE_FORMAT" => "d.m.Y",	// Формат показа даты
		"ADD_SECTIONS_CHAIN" => "N",	// Включать раздел в цепочку навигации
		"AJAX_MODE" => "N",	// Включить режим AJAX
		"AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
		"AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
		"AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
		"AJAX_OPTION_STYLE" => "Y",	// Включить подгрузку стилей
		"CACHE_FILTER" => "N",	// Кешировать при установленном фильтре
		"CACHE_GROUPS" => "Y",	// Учитывать права доступа
		"CACHE_TIME" => "36000000",	// Время кеширования (сек.)
		"CACHE_TYPE" => "A",	// Тип кеширования
		"CHECK_DATES" => "Y",	// Показывать только активные на данный момент элементы
		"DETAIL_URL" => "",	// URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
		"DISPLAY_BOTTOM_PAGER" => "N",	// Выводить под списком
		"DISPLAY_DATE" => "N",	// Выводить дату элемента
		"DISPLAY_NAME" => "N",	// Выводить название элемента
		"DISPLAY_PICTURE" => "Y",	// Выводить изображение для анонса
		"DISPLAY_PREVIEW_TEXT" => "Y",	// Выводить текст анонса
		"DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
		"FIELD_CODE" => array(	// Поля
			0 => "",
			1 => "",
		),
		"FILTER_NAME" => "",	// Фильтр
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",	// Скрывать ссылку, если нет детального описания
		"IBLOCK_ID" => "4",	// Код информационного блока
		"IBLOCK_TYPE" => "content",	// Тип информационного блока (используется только для проверки)
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",	// Включать инфоблок в цепочку навигации
		"INCLUDE_SUBSECTIONS" => "N",	// Показывать элементы подразделов раздела
		"MESSAGE_404" => "",	// Сообщение для показа (по умолчанию из компонента)
		"NEWS_COUNT" => "6",	// Количество новостей на странице
		"PAGER_BASE_LINK_ENABLE" => "N",	// Включить обработку ссылок
		"PAGER_DESC_NUMBERING" => "N",	// Использовать обратную навигацию
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",	// Время кеширования страниц для обратной навигации
		"PAGER_SHOW_ALL" => "N",	// Показывать ссылку "Все"
		"PAGER_SHOW_ALWAYS" => "N",	// Выводить всегда
		"PAGER_TEMPLATE" => ".default",	// Шаблон постраничной навигации
		"PAGER_TITLE" => "Новости",	// Название категорий
		"PARENT_SECTION" => "",	// ID раздела
		"PARENT_SECTION_CODE" => "",	// Код раздела
		"PREVIEW_TRUNCATE_LEN" => "",	// Максимальная длина анонса для вывода (только для типа текст)
		"PROPERTY_CODE" => array(	// Свойства
			0 => "",
			1 => "",
		),
		"SET_BROWSER_TITLE" => "N",	// Устанавливать заголовок окна браузера
		"SET_LAST_MODIFIED" => "N",	// Устанавливать в заголовках ответа время модификации страницы
		"SET_META_DESCRIPTION" => "N",	// Устанавливать описание страницы
		"SET_META_KEYWORDS" => "N",	// Устанавливать ключевые слова страницы
		"SET_STATUS_404" => "N",	// Устанавливать статус 404
		"SET_TITLE" => "N",	// Устанавливать заголовок страницы
		"SHOW_404" => "N",	// Показ специальной страницы
		"SORT_BY1" => "SORT",	// Поле для первой сортировки новостей
		"SORT_BY2" => "SORT",	// Поле для второй сортировки новостей
		"SORT_ORDER1" => "ASC",	// Направление для первой сортировки новостей
		"SORT_ORDER2" => "ASC",	// Направление для второй сортировки новостей
		"COMPONENT_TEMPLATE" => ".default",
		"STRICT_SECTION_CHECK" => "N",	// Строгая проверка раздела для показа списка
	),
	false
);?>
		</section>
		<?endif;?>
		<section id="workarea">
		<?if($GLOBALS["APPLICATION"]->GetCurPage() != "/"):?>
				<div class="content">
				<?$APPLICATION->IncludeComponent("bitrix:breadcrumb","monolit",Array(
						"START_FROM" => "0",
						"PATH" => "",
						"SITE_ID" => "s1"
					)
				);?>
				</div>
		<?endif;?>
		<div class="content">
		<?if($GLOBALS["APPLICATION"]->GetCurPage() != "/" && $GLOBALS["APPLICATION"]->GetCurDir() != "/search/"):?>
			<h1 class="h1-catalog-title"><?$APPLICATION->ShowTitle(false);?></h1>
		<?endif;?>
