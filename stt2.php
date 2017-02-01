<?php
$url = 'https://www.google.com/speech-api/v1/recognize?xjerr=1&client=chromium&lang=en-US';
$audio = file_get_contents($dfile);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: audio/x-flac; rate=16000'));
curl_setopt($ch, CURLOPT_POSTFIELDS, $audio);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$json = curl_exec($ch);
curl_close($ch);
$data = json_decode($json, true);
print_r($data);
//estudiar este $data para sacar el resultado.

//necesito mandar para aca con ajax un request con la url de el archivo .flac
?>