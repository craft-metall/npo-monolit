<?
//делаю полу костлыем, т.к. иначе надо переделывать много шаблонов каталога, где напрямую прописаны ссылки.
CModule::IncludeModule("iblock");
$rs = CIBlockSection::GetList(
  array(),
  array(
    "IBLOCK_ID" => "8",
    "SECTION_ID" => 6,
  )
);
$arSections = array(
  Array(
		strtoupper("Элементы обрамления"), 
		"/sendvich-paneli/elementy-obramleniya/", 
		Array("/sendvich-paneli/elementy-obramleniya/",), 
		Array(
      "IS_PARENT" => 1,
      "DEPTH_LEVEL" => 1,
      "FROM_IBLOCK" => 1
    ), 
		"" 
	),
  
);
while ($ar = $rs->GetNext()) {
  $arSections[] =   Array(
		strtoupper($ar["NAME"]), 
		$ar["SECTION_PAGE_URL"], 
		Array(
      "/sendvich-paneli/elementy-obramleniya/",
    ), 
		Array(
      //"IS_PARENT" => 0,
      "DEPTH_LEVEL" => 2,
      "FROM_IBLOCK" => 1
    ), 
		"" 
	);

  //ppp($ar,'ar');
}

$aMenuLinks = $arSections;
?>