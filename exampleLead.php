<?php
$params = json_encode([
    'direction_id' => 1, //  ОБЯЗАТЕЛЬНО, если не указан offer_id
    // 'offer_id' => 1, //  ОБЯЗАТЕЛЬНО, если не указан direction_id
    'branch_id' => 0, //  id города (ОБЯЗАТЕЛЬНО)
    'phones' => [
        '79999999990', //  Телефон клиента (ОБЯЗАТЕЛЬНО)
    ],
    'name' => 'Тест Тестович',  //  ФИО клиента (ОБЯЗАТЕЛЬНО)
    'description' => 'Test order', //  Описание работ
]);
$idp = 'XXXXXXX'; //  впишите ваш IDP, указан в начале раздела

$curl = curl_init();

curl_setopt_array($curl, [
    CURLOPT_URL => "https://api2.servicelead.top/lead?source=partner&idp=" . rawurlencode($idp),
    
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => $params,
    CURLOPT_HTTPHEADER => [
        "Content-Type: application/json"
    ],
]);

$response = curl_exec($curl);
$info = curl_getinfo($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    if ($info['http_code'] != 200) {
        print "Error: ";
        print_r($response);
    }
}

