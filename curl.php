<?php
$username='KVLZNJLLHCMSONK1JPSF';
$password='DEmo2000';



$xml = '<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE paymentService PUBLIC "-//WorldPay//DTD WorldPay PaymentService v1//EN" "http://dtd.worldpay.com/paymentService_v1.dtd">
<paymentService version="1.4" merchantCode="DEMO">
 <submit>
  <order orderCode="'.$_POST['ordernum'].'" installationId="1447940">
   <description>test order</description>
   <amount value="'.$_POST['amount'].'" currencyCode="'.$_POST['currency'].'" exponent="0"/>
   <orderContent>
    <![CDATA[
     
    ]]>
   </orderContent>
   <paymentMethodMask>
    <include code="ALL"/>
   </paymentMethodMask>
   <shopper>
    <shopperEmailAddress>sp@worldpay.com</shopperEmailAddress>
   </shopper>
   <shippingAddress>
    <address>
     <firstName>John</firstName>
     <lastName>Doe</lastName>
     <street>The Science Park</street>
     <houseNumber>270</houseNumber>
     <postalCode>CB4 0WE</postalCode>
     <city>Cambridge</city>
     <countryCode>GB</countryCode>
    </address>
   </shippingAddress>
  </order>
 </submit>
</paymentService>';

$url = "https://secure-test.worldpay.com/jsp/merchant/xml/paymentService.jsp"; // URL to make some test
$ch = curl_init($url);

echo $_POST['amount'];


curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
curl_setopt($ch, CURLOPT_POSTFIELDS, "xml=" . $xml);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($ch, CURLOPT_USERPWD, $username . ":" . $password);

$data = curl_exec($ch);
echo '<pre>';
echo htmlentities($data);
echo '</pre>';

$redirect_url = simplexml_load_string($data); 

$json = json_encode($redirect_url);
echo $json;

$arr = json_decode($json, true);
$url = $arr['reply']['orderStatus']['reference'];

$newOrderNum = $_POST['ordernum'] + 1;

file_put_contents("./ordercode.txt", $newOrderNum);

if(curl_errno($ch))
    print curl_error($ch);
else
    curl_close($ch);

header("Location: ".$url);
die();

?>