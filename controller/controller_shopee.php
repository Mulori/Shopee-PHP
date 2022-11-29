<?php
 ini_set('display_error', 1);
 error_reporting(E_ALL);

$tipoAmbiente = json_decode($_POST['data'], true, 512, JSON_UNESCAPED_UNICODE);

if($tipoAmbiente == 1){
    $host = "https://partner.shopeemobile.com";
}else{
    $host = "https://partner.test-stable.shopeemobile.com";
}

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

if($tipoAmbiente == 1){ //Ambiente de Produção
    $partnerId = 2005150;
    $partnerKey = "6b555664654a4c427779697263594d4e59414e426258786e78754f436e705859";
}else{ //Ambiente de Homologação
    $partnerId = 1014766;
    $partnerKey = "745250414646776d524c4d456c6f6669736a61466150584c6569626e64527849";
}





echo authShop($partnerId, $partnerKey);

?>