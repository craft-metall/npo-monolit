<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Металлопрокат по специальной цене");
$APPLICATION->SetPageProperty("description", "Купить металлопрокат доставкой. Цена по телефону 8 (800) 333-36-86 Компания «Крафт Групп»");


$pos = strpos($_SERVER['REQUEST_URI'], '?');
if ($pos > 0) {
 $uri = substr($_SERVER['REQUEST_URI'],0,$pos);
}
else {
 $uri = $_SERVER['REQUEST_URI'];
}

$APPLICATION->SetPageProperty('canonical', $uri);

$APPLICATION->IncludeComponent(
	"bitrix:news",
	"special",
	array(
		"DISPLAY_DATE" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_AS_RATING" => "rating",
		"TAGS_CLOUD_ELEMENTS" => "150",
		"PERIOD_NEW_TAGS" => "",
		"FONT_MAX" => "50",
		"FONT_MIN" => "10",
		"COLOR_NEW" => "3E74E6",
		"COLOR_OLD" => "C0C0C0",
		"TAGS_CLOUD_WIDTH" => "100%",
		"USE_SHARE" => "N",
		"SEF_MODE" => "Y",
		"AJAX_MODE" => "N",
		"IBLOCK_TYPE" => "catalog",
		"IBLOCK_ID" => "18",
		"USE_SEARCH" => "N",
		"USE_RSS" => "N",
		"USE_RATING" => "N",
		"USE_CATEGORIES" => "N",
		"USE_REVIEW" => "N",
		"USE_FILTER" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_ORDER1" => "DESC",
		"SORT_BY2" => "SORT",
		"SORT_ORDER2" => "ASC",
		"CHECK_DATES" => "Y",
		"PREVIEW_TRUNCATE_LEN" => "",
		"LIST_ACTIVE_DATE_FORMAT" => "d.m.Y",
		"LIST_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"DISPLAY_NAME" => "N",
		"META_KEYWORDS" => "-",
		"META_DESCRIPTION" => "-",
		"BROWSER_TITLE" => "-",
		"DETAIL_ACTIVE_DATE_FORMAT" => "d.m.Y",
		"DETAIL_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"DETAIL_DISPLAY_TOP_PAGER" => "N",
		"DETAIL_DISPLAY_BOTTOM_PAGER" => "Y",
		"DETAIL_PAGER_TITLE" => "Страница",
		"DETAIL_PAGER_TEMPLATE" => "",
		"DETAIL_PAGER_SHOW_ALL" => "Y",
		"SET_STATUS_404" => "Y",
		"SET_TITLE" => "Y",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
		"ADD_SECTIONS_CHAIN" => "Y",
		"ADD_ELEMENT_CHAIN" => "Y",
		"USE_PERMISSIONS" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"PAGER_TEMPLATE" => "modern",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"PAGER_TITLE" => "Спецпредложения",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"SEF_FOLDER" => "/special/",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"COMPONENT_TEMPLATE" => "actions",
		"SET_LAST_MODIFIED" => "N",
		"STRICT_SECTION_CHECK" => "N",
		"DETAIL_SET_CANONICAL_URL" => "N",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"SHOW_404" => "N",
		"MESSAGE_404" => "",
		"FILTER_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"NEWS_COUNT" => "20",
		"DETAIL_PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"SEF_URL_TEMPLATES" => array(
			"news" => "",
			"section" => "",
			"detail" => "#ELEMENT_CODE#/",
		)
	),
	false
);?>

<div class="row mb-4">
<!-- <div class="col-12 col-sm-3 col-md-2 text-center">-->
<!--  <div class="border border-light p-3 mb-3">-->
<!--   <a class="btn text-uppercase" href="/catalog/" title="Каталог">-->
<!--    <img src="/upload/iblock/d7a/d7a9bf8897d585d4793a38149a38a527.png" width="47" height="38" alt="Каталог" title="Каталог">-->
<!--   </a><br/>-->
<!--   <a class="btn text-uppercase" href="/catalog/" title="Каталог">-->
<!--    Каталог-->
<!--   </a>-->
<!--  </div>-->
 </div>
 <div class="col-12 col-sm-9 col-md-10 text-justify">
     <p>«Научно–производственное предприятие Монолит» осуществляет проектирование, изготовление и монтаж металлоконструкций для объектов гражданского и промышленного строительства, быстровозводимых зданий сельскохозяйственного назначения, а также конструкций любой сложности для инфраструктур дорожного и энергетического строительства.</p>
		<p>Изготовим широкий ассортимент элементов металлоконструкций: стеновые и кровельные сэндвич-панели, элементы обрамления и комплектующие, профнастил, трубопроводная арматура, детали трубопровода и фланцы, арматурные каркасы, анкерные блоки и болты.</p>
		<p>Выполняем любые виды металлообработки: резка и гибка, сварочные и фрезерные работы.</p>
		<p>Благодаря собственному отделу проектирования и широкому региональному присутствию выполним работы в указанные сроки и по оптимальной цене.</p>
		<p>Наши специалисты обеспечат полное техническое сопровождение на всех этапах строительства.</p>
		<p>Работая с нами, вы получаете возможность комплектации и строительства объекта под ключ!</p>
 </div>
</div>

<!--<div class="h2 no-bg-img text-center">Спецпредложения в других регионах</div>-->
<!--<div class="row text-center">-->
<!-- <div class="col-12">-->
<?//
//	foreach ($sites as $i => $site):
//  if (key_exists($site['LID'], $arr_sites) and SITE_ID != $site['LID']):
//   if ($i > 1):
//    ?><!--&nbsp;--><?//
//   endif;
//   ?><!--<a class="btn btn-primary my-1" href="--><?//=(\CMain::IsHTTPS() ? "https" : "http") ?><!--://--><?//=$site['SERVER_NAME']?><!--/special/">--><?//=$arr_sites[$site['LID']]['name'];?><!--</a>--><?//
//  endif;
// endforeach;?>
<!-- </div>-->
<!--</div>-->

<hr class="my-5">

<div class="h1 no-bg-img text-center">
 Для того, чтобы сделать заказ,<br>
 заполните форму или позвоните по телефону <span class="no-wrap">8 800 333-36-86</span>
</div>


<div class="amocrm__form">
 <script>var amo_forms_params = {"id":376059,"hash":"65b6879e1883ce6086e40f604d705a78","locale":"ru"};</script><script id="amoforms_script" async="async" charset="utf-8" src="https://forms.amocrm.ru/forms/assets/js/amoforms.js"></script>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
