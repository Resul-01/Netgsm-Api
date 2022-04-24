<?php 

/*
	GİTHUB : Resul-01
	PROFİLE URL : https://github.com/Resul-01
	KONU : Netgsm apilerini kullanarak tekil sms gönderim işlemi.

*/

$kullaniciAdi = 'GİRİNİZ'; // Netgsm kullanıcı adınız.
$kullaniciParola = 'GİRİNİZ'; // Netgsm kullanıcı şifreniz.
$mesajBasligi = 'GİRİNİZ'; // Netgsm mesaj başlığınız.
$mesaj = 'GİRİNİZ'; // Gönderilecek mesaj içeriği.
$gonderNo = 'GİRİNİZ'; // Sms gönderilecek telefon numarası.



$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => 'http://soap.netgsm.com.tr:8080/Sms_webservis/SMS?wsdl/',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => '<?xml version="1.0"?>
    <SOAP-ENV:Envelope xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/"
                 xmlns:xsd="http://www.w3.org/2001/XMLSchema"
      xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
        <SOAP-ENV:Body>
            <ns3:smsGonder1NV2 xmlns:ns3="http://sms/">
                <username>'.$kullaniciAdi.'</username>
                <password>'.$kullaniciParola.'</password>
                <header>'.$mesajBasligi.'</header>
                <msg>'.$mesaj.'</msg>
                <gsm>'.$gonderNo.'</gsm>
                <filter>11</filter>
                <encoding>TR</encoding>
            </ns3:smsGonder1NV2>
        </SOAP-ENV:Body>
    </SOAP-ENV:Envelope>',
    CURLOPT_HTTPHEADER => array(
        'Content-Type: text/xml'
    ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;


 ?>