<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();
?></div></section>
<?if($GLOBALS["APPLICATION"]->GetCurPage() == "/"):?>
	<section id="objects">
		<div class="content">
		<div class="objects-list-title">
			<div class="section-title">Наши объекты</div>
			<a href="/objects/">Посмотреть еще ›</a>
		</div>
			<?$APPLICATION->IncludeComponent("bitrix:news.list", "scrollbox", Array(
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
		"DETAIL_URL" => "#SITE_DIR#/objects/#ELEMENT_CODE#/",	// URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
		"DISPLAY_BOTTOM_PAGER" => "N",	// Выводить под списком
		"DISPLAY_DATE" => "N",	// Выводить дату элемента
		"DISPLAY_NAME" => "N",	// Выводить название элемента
		"DISPLAY_PICTURE" => "Y",	// Выводить изображение для анонса
		"DISPLAY_PREVIEW_TEXT" => "N",	// Выводить текст анонса
		"DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
		"FIELD_CODE" => array(	// Поля
			0 => "",
			1 => "",
		),
		"FILTER_NAME" => "",	// Фильтр
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",	// Скрывать ссылку, если нет детального описания
		"IBLOCK_ID" => "6",	// Код информационного блока
		"IBLOCK_TYPE" => "catalog",	// Тип информационного блока (используется только для проверки)
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",	// Включать инфоблок в цепочку навигации
		"INCLUDE_SUBSECTIONS" => "N",	// Показывать элементы подразделов раздела
		"MESSAGE_404" => "",	// Сообщение для показа (по умолчанию из компонента)
		"NEWS_COUNT" => "",	// Количество новостей на странице
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
);?></div>
</section>
<?endif;?>
<footer>
	<div class="content">
		<div class="footer">
			<div class="bottom-nav">
			<div class="bottom-nav-hr"></div>
				<?$APPLICATION->IncludeComponent("bitrix:menu", "bottom", Array(
	"ROOT_MENU_TYPE" => "catalog",	// Тип меню для первого уровня
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
			</div>
			<div class="bottom-nav">
			<div class="bottom-nav-hr"></div>
				<?$APPLICATION->IncludeComponent(
	"bitrix:menu",
	"bottom",
	array(
		"ROOT_MENU_TYPE" => "top",
		"MAX_LEVEL" => "1",
		"CHILD_MENU_TYPE" => "left",
		"USE_EXT" => "N",
		"DELAY" => "N",
		"ALLOW_MULTI_SELECT" => "N",
		"MENU_CACHE_TYPE" => "N",
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"MENU_CACHE_GET_VARS" => array(
		),
		"COMPONENT_TEMPLATE" => "bottom",
		"MENU_THEME" => ""
	),
	false
);?>
			</div>
			<div class="bottom-content">
				<div class="topleft"><div id="form_id_FID1" class="alx_feedback_popup"><span>Задать вопрос</span> менеджеру</div></div>
				<div class="topright">
					<div class="phone">
						<?$APPLICATION->IncludeFile(
								$APPLICATION->GetTemplatePath("/include/phone_footer.php"),
								Array(),
								Array("MODE"=>"php")
							);?>
					</div>
				</div>
				<div class="bottomleft">
					<div class="social">
					<?$APPLICATION->IncludeFile(
							$APPLICATION->GetTemplatePath("/include/social_b.php"),
							Array(),
							Array("MODE"=>"php")
						);?>
					</div>
				</div>
				<div class="bottomright">
					Пишите нам:<br>
					<?$APPLICATION->IncludeFile(
							$APPLICATION->GetTemplatePath("/include/email.php"),
							Array(),
							Array("MODE"=>"php")
						);?>
				</div>
			</div>
		</div>
		<div class="bottom-bar">
			<div class="copyright">
				<?$APPLICATION->IncludeFile(
							$APPLICATION->GetTemplatePath("/include/copyright.php"),
							Array(),
							Array("MODE"=>"php")
						);?>
			</div>
			<div class="developer">
				<?$APPLICATION->IncludeFile(
							$APPLICATION->GetTemplatePath("/include/developer.php"),
							Array(),
							Array("MODE"=>"php")
						);?>
			</div>
		</div>
	</div>
</footer>
	<?$APPLICATION->IncludeComponent(
	"altasib:feedback.form",
	"popup",
	array(
		"ACTIVE_ELEMENT" => "Y",
		"ADD_HREF_LINK" => "N",
		"ALX_LINK_POPUP" => "Y",
		"ALX_LOAD_PAGE" => "N",
		"ALX_NAME_LINK" => "",
		"BBC_MAIL" => "",
		"CATEGORY_SELECT_NAME" => "Выберите категорию",
		"CHECKBOX_TYPE" => "CHECKBOX",
		"CHECK_ERROR" => "Y",
		"COLOR_OTHER" => "#009688",
		"COLOR_SCHEME" => "BRIGHT",
		"COLOR_THEME" => "",
		"EVENT_TYPE" => "",
		"FB_TEXT_NAME" => "Ваш вопрос",
		"FB_TEXT_SOURCE" => "PREVIEW_TEXT",
		"FORM_ID" => "1",
		"IBLOCK_ID" => "9",
		"IBLOCK_TYPE" => "altasib_feedback",
		"INPUT_APPEARENCE" => array(
			0 => "DEFAULT",
		),
		"JQUERY_EN" => "N",
		"LINK_SEND_MORE_TEXT" => "Отправить ещё одно сообщение",
		"LOCAL_REDIRECT_ENABLE" => "N",
		"MASKED_INPUT_PHONE" => array(
			0 => "PHONE",
		),
		"MESSAGE_OK" => "Ваше сообщение было успешно отправлено",
		"NAME_ELEMENT" => "FIO",
		"POPUP_ANIMATION" => "0",
		"POPUP_DELAY" => "0",
		"PROPERTY_FIELDS" => array(
			0 => "FIO",
			1 => "EMAIL",
			2 => "PHONE",
			3 => "FEEDBACK_TEXT",
		),
		"PROPERTY_FIELDS_REQUIRED" => array(
			0 => "FIO",
			1 => "EMAIL",
			2 => "PHONE",
			3 => "FEEDBACK_TEXT",
		),
		"PROPS_AUTOCOMPLETE_EMAIL" => array(
			0 => "EMAIL",
		),
		"PROPS_AUTOCOMPLETE_NAME" => array(
			0 => "FIO",
		),
		"PROPS_AUTOCOMPLETE_PERSONAL_PHONE" => array(
			0 => "PHONE",
		),
		"PROPS_AUTOCOMPLETE_VETO" => "N",
		"SECTION_FIELDS_ENABLE" => "N",
		"SECTION_MAIL_ALL" => "zhelezkin@craftmetall.ru, info@npo-monolit.ru",
		"SEND_IMMEDIATE" => "N",
		"SEND_MAIL" => "N",
		"SHOW_LINK_TO_SEND_MORE" => "N",
		"SHOW_MESSAGE_LINK" => "N",
		"USERMAIL_FROM" => "N",
		"USER_EVENT" => "",
		"USE_CAPTCHA" => "N",
		"WIDTH_FORM" => "33%",
		"COMPONENT_TEMPLATE" => "popup",
		"AGREEMENT" => "Y",
		"USER_CONSENT" => "Y",
		"USER_CONSENT_INPUT_LABEL" => "Нажимая кнопку «Отправить», я даю свое согласие на обработку моих персональных данных, в соответствии с Федеральным законом от 27.07.2006 года №152-ФЗ «О персональных данных», на условиях и для целей, определенных в «Согласии на обработку персональных данных»",
		"USER_CONSENT_ID" => "1",
		"USER_CONSENT_IS_CHECKED" => "N",
		"USER_CONSENT_IS_LOADED" => "N",
		"ADD_EVENT_FILES" => "N"
	),
	false
);?>
<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter48658745 = new Ya.Metrika2({
                    id:48658745,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true,
                    webvisor:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/tag.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks2");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/48658745" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
	</body>
</html>
