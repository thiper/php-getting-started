<?php

require('../vendor/autoload.php');

$url = "https://api-dialogflow.herokuapp.com/dialogflow";

//INICIA O CURL
$curl = curl_init();

$headers = [
    'Authorization: Bearer PROD_ACCESS_TOKEN',
    'Content-Type: application/json'   
];

$pergunta = $_REQUEST['pergunta'];

//POST POST

$post = [
  
   "queryText" => $pergunta,
   "sessionId" => "12345asde",
   "languageCode" => "pt-BR"
];


$json = json_encode($post);

curl_setopt_array($curl, [
    CURLOPT_URL                 => $url,
    CURLOPT_CUSTOMREQUEST       => 'POST',
    CURLOPT_RETURNTRANSFER      => true,
    CURLOPT_HTTPHEADER          => $headers,
    CURLOPT_POSTFIELDS          => $json

]);


//EXECUTA A REQUISIÇÃO
$response = curl_exec($curl);


//FECHA A CONEXÃO
curl_close($curl);


//IMPRIME O RESPONSE
$array = $response;
//var_dump($array); 
echo $array;

?>