<?php
echo "this is the repo";
$url = "https://secure-test.worldpay.com/jsp/merchant/xml/paymentService.jsp";
$username='KVLZNJLLHCMSONK1JPSF';
$password='DEmo2000';
$xml = '<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE paymentService PUBLIC "-//WorldPay//DTD WorldPay PaymentService v1//EN" "http://dtd.worldpay.com/paymentService_v1.dtd">
<paymentService version="1.4" merchantCode="DEMO">
 <submit>
  <order orderCode="jsxml3688569571" installationId="1447940">
   <description>test order</description>
   <amount value="100" currencyCode="EUR" exponent="2"/>
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

$headers = array(
    "Content-type: text/xml",
    "Charset: UTF-8"
);

$ch = curl_init(); 
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($ch, CURLOPT_USERPWD, $username . ":" . $password);

$data = curl_exec($ch); 
echo $data;
if(curl_errno($ch))
    print curl_error($ch);
else
    curl_close($ch);
?>
