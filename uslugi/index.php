<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Услуги — НПО Монолит");
$APPLICATION->SetPageProperty("TITLE", "Услуги");
$APPLICATION->SetTitle("Услуги");
?><strong>НАШИ УСЛУГИ.</strong>


<div class="items-list services-page">
	<div class="project-item">
		 <a href="/uslugi/project/">
			<div class="sort">01</div>
			<div class="project-item-img"><img src="/upload/medialibrary/c16/project.png" alt="проектирование" title="Проектирование"></div>
			<div class="project-item-title">Проектирование</div>
		 </a>
	</div>
	<div class="project-item">
		<a href="/uslugi/metalloobrabotka/">
			<div class="sort">02</div>
			<div class="project-item-img"><img src="/upload/medialibrary/8b4/metall.png" alt="металлообработка" title="Металлообработка"></div>
			<div class="project-item-title">Металлообработка</div>
		</a>
	</div>
	<div class="project-item" id="bx_3218110189_67">
		<a href="/uslugi/montazh/">
			<div class="sort">03</div>
			<div class="project-item-img"><img src="/upload/medialibrary/f6e/montazh.png" alt="монтаж" title="Монтаж"></div>
			<div class="project-item-title">Монтаж</div>
		</a>
	</div>
</div>
<br>
<a class="slide-button" href="/cooperation/" title="Начать сотрудничество">Начать сотрудничество</a><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>