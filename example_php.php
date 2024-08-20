<?php

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, '<base_url>/api/ukoncene_obstaravania?id[]=1,2&obstaravatel_id[]=1&cpv[]=73000000-2,45214100-1&datum_zverejnenia_od=2023-01-01&datum_zverejnenia_do=2023-12-31&limit=50&offset=0');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');

$headers = array();
$headers[] = 'ApiToken: <api_token>';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);

?>
