<?php

$host = "https://partner.test-stable.shopeemobile.com";
//$host = "https://partner.shopeemobile.com";

function authShop($partnerId, $partnerKey)
{
    global $host;
    $path = "/api/v2/shop/auth_partner";
    $redirectUrl = "https://vantagem.techuniverse.com.br/";

    $timest = time();
    $baseString = sprintf("%s%s%s", $partnerId, $path, $timest);
    $sign = hash_hmac('sha256', $baseString, $partnerKey);
    $url = $host . $path . "?partner_id=" . $partnerId . "&timestamp=" . $timest . "&sign=" . $sign . "&redirect=" . $redirectUrl;
    return $url;
}

$partnerId = 1014766;
$partnerKey = "745250414646776d524c4d456c6f6669736a61466150584c6569626e64527849";

//$partnerId = 2005150;
//$partnerKey = "6b555664654a4c427779697263594d4e59414e426258786e78754f436e705859";


echo authShop($partnerId, $partnerKey);

?>