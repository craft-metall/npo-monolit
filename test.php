<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("ROBOTS", "noindex, nofollow");
$APPLICATION->SetTitle("test");
?><?php 
        ini_set( 'display_errors', 0 );
        error_reporting( E_ALL );
        $from = "info@npo-monolit.ru";
        $to = "bismolbalaxa@gmail.com";
        $subject = "PHP Mail Test script";
        $message = "This is a test to check the PHP Mail functionality";
        $headers = "From:" . $from;
        mail($to,$subject,$message, $headers);
        echo "Test email sent";
    ?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>