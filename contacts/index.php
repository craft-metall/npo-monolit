<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Контакты — НПО Монолит");
$APPLICATION->SetPageProperty("TITLE", "Контакты");
$APPLICATION->SetTitle("Контакты");
?>
<div class="contacts-container" style="margin-left:0;padding-top:1rem;">
    <div class="contacts-block">
        <span itemprop="name" style="display:none">НПО Монолит</span> <span itemprop="telephone" style="display:none">+7 (499) 110-35-09</span>
        <div class="contacts-content">
            <p><strong>Адрес офиса продаж <span itemprop="addressLocality">г. Москва</span>: </strong><span itemprop="streetAddress">
            Проезд Завода «Серп и Молот» д. 6, корп. 1, этаж 7, офис 713, БЦ Ростэк</span><br>
            <strong>Адрес производства:</strong> МО, Ногинский район, поселок городского типа имени Воровского, участок 3<br>
            <strong>Email:</strong> <a href="mailto:info@npo-monolit.ru">info@npo-monolit.ru</a><br>
            <strong>Телефон:</strong> <a href="tel:84991103509">+7 (499) 110-35-09</a></p>
        </div>
        <div class="contacts-mark">
                <iframe src="https://yandex.ru/map-widget/v1/?z=12&ol=biz&oid=244470347844" width="498" height="400" frameborder="0"></iframe>
        </div>
    </div>
    <div class="contacts-block">
        <div class="contacts-content">
            <p><strong>Адрес офиса продаж <span itemprop="addressLocality">г. Краснодар</span>: </strong>
                <span itemprop="streetAddress">ул. Северная, д. 527/2</span><br>
                <strong>Адрес производства:</strong> Краснодар, ул. Тихорецкая, 12<br>
                <strong>Email:</strong> <a href="mailto:info@npo-monolit.ru">info@npo-monolit.ru</a><br>
                <strong>Телефон:</strong> <a href="tel:84991103509">+7 (499) 110-35-09</a></p>
        </div>
        <div class="contacts-mark">
            <iframe src="https://yandex.ru/map-widget/v1/?z=12&ol=biz&oid=148582952699" width="498" height="400" frameborder="0"></iframe>
        </div>
    </div>
    <div class="contacts-block">
        <div class="contacts-content">
            <p><strong>Адрес офиса продаж <span itemprop="addressLocality">г. Ростов-на-Дону</span>: <br></strong><span itemprop="streetAddress">
            ул. Страны Советов, д. 7</span><br>
                <strong>Адрес производства:</strong> Ростов-на-Дону, ул. Страны Советов, д. 7<br>
                <strong>Email:</strong> <a href="mailto:info@npo-monolit.ru">info@npo-monolit.ru</a><br>
                <strong>Телефон:</strong> <a href="tel:84991103509">+7 (499) 110-35-09</a></p>
        </div>
        <div class="contacts-mark">
            <iframe src="https://yandex.ru/map-widget/v1/?z=12&ol=biz&oid=38415350019" width="498" height="400" frameborder="0"></iframe>
        </div>
    </div>
    <div class="contacts-block">
        <div class="contacts-content">
            <p><strong>Адрес офиса продаж <span itemprop="addressLocality">г. Екатеринбург</span>: <br></strong><span itemprop="streetAddress">
            Малышева, д. 51 БЦ «Высоцкий»</span><br>
                <strong>Адрес производства:</strong> Свердловская область, <br>п. Большой Исток, ул. Свердлова, 42-а<br>
                <strong>Email:</strong> <a href="mailto:info@npo-monolit.ru">info@npo-monolit.ru</a><br>
                <strong>Телефон:</strong> <a href="tel:84991103509">+7 (499) 110-35-09</a></p>
        </div>
        <div class="contacts-mark">
            <iframe src="https://yandex.ru/map-widget/v1/?z=12&ol=biz&oid=56111341323" width="498" height="400" frameborder="0"></iframe>
        </div>
    </div>
    <div class="contacts-block">
        <div class="contacts-content">
            <p><strong>Адрес офиса продаж <span itemprop="addressLocality">г. Санкт-Петербург</span>: <br></strong><span itemprop="streetAddress">
            ул. Кропоткина, д. 1</span><br>
                <strong>Адрес производства:</strong> Поселок Металлострой, Северный проезд 8А. 7<br>
                <strong>Email:</strong> <a href="mailto:info@npo-monolit.ru">info@npo-monolit.ru</a><br>
                <strong>Телефон:</strong> <a href="tel:84991103509">+7 (499) 110-35-09</a></p>
        </div>
        <div class="contacts-mark">
            <iframe src="https://yandex.ru/map-widget/v1/?z=12&ol=biz&oid=92865357780" width="498" height="400" frameborder="0"></iframe>
        </div>
    </div>
</div>


<?$APPLICATION->IncludeFile(
								$APPLICATION->GetTemplatePath("/include/feedback_form.php"),
								Array(),
								Array("MODE"=>"php")
							);?>

    <!--    <div class="contacts-social-block">-->
<!--        <h3>Мы в социальных сетях:</h3>-->
<!--        <a class="vk" href="#"><img src="/bitrix/templates/monolit/images/icon_vk_b.png" alt="Вконтакте" title="Вконтакте" width="15" height="9">Вконтакте</a>-->
<!--        <div>-->
<!--            /-->
<!--        </div>-->
<!--        <a class="fb" href="#"><img alt="Facebook" src="/bitrix/templates/monolit/images/icon_fb_b.png" title="Facebook" width="6" height="12">Facebook</a>-->
<!--        <div>-->
<!--            /-->
<!--        </div>-->
<!--        <a class="yb" href="#"><img alt="YouTube" src="/bitrix/templates/monolit/images/icon_yb_b.png" title="YouTube" width="13" height="10">Youtube</a>-->
<!--        <div>-->
<!--            /-->
<!--        </div>-->
<!--        <a class="inst" href="#"><img alt="Instagram" src="/bitrix/templates/monolit/images/icon_inst_b.png" title="Instagram" width="12" height="12">Instagram</a>-->
<!--    </div>-->
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
