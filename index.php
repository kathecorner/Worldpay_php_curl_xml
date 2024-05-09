<?php
$username='KVLZNJLLHCMSONK1JPSF';
$password='DEmo2000';

$xml = '<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE paymentService PUBLIC "-//WorldPay//DTD WorldPay PaymentService v1//EN" "http://dtd.worldpay.com/paymentService_v1.dtd">
<paymentService version="1.4" merchantCode="SCTEAMHPPECOMCSC">
 <submit>
  <order orderCode="SCTEAMHPPECOMCSC26629" installationId="1419715">
   <description>test order</description>
   <amount value="100" currencyCode="EUR" exponent="2"/>
   <orderContent>
    <![CDATA[
     
    ]]>
   </orderContent>
   <paymentMethodMask>
    <include code="ALL"/>
   </paymentMethodMask>
   <shopper>å
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

if(curl_errno($ch))
    print curl_error($ch);
else
    curl_close($ch);

?>
