<?

function ppp($p,$name){
    global $APPLICATION,$USER;
		if ($USER->IsAdmin()){
			echo "<br/>-----------------$name START -------------------<br/>";
			echo "<pre>";
			print_r($p);
			echo "</pre>";
			echo "<br/>-----------------$name END -------------------<br/>";
		}
}


//maxim api
function ddd($text){
    global $APPLICATION,$USER;
		if ($USER->IsAdmin()){
			echo "<br/>-----------------$text DIE START-------------------<br/>";
			echo "<pre>";
			print_r($p);
			echo "</pre>";
			echo "<br/>-----------------$text DIE END -------------------<br/>";
die();		
}
}

function pp($p,$name){
			echo "<br/>-----------------$name START -------------------<br/>";
			echo "<pre>";
			print_r($p);
			echo "</pre>";
			echo "<br/>-----------------$name END -------------------<br/>";
}

function m($number){
    global $USER;
		if($USER->IsAdmin()){
			echo "test step: $number<br/>";
		}
}

function mm($number){
		echo "test step: $number<br/>";
} 






include_once($_SERVER['DOCUMENT_ROOT']."/bitrix/modules/wsrubi.smtp/classes/general/wsrubismtp.php");
?>