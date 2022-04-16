<?php

header("Access-Control-Allow-Origin: *");
//header("Access-Control-Allow-Origin: http://localhost/");
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header('Content-Type: application/json');

session_start();

// Cria a Sessão
if((!isset ($_SESSION['sessionId']) == true )  )
{
    $_SESSION["sessionId"] = rand(10000000,90000000).(rand(8,12)*rand(12,55));
    
} else {
 //   echo "Sessão do Usúario: ".$_SESSION["sessionId"]. "<br>";
}

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
   "sessionId" => $_SESSION["sessionId"],
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
$array = ($response); 
//var_dump($array); 
//echo $array;

$mJson = '{"SessionID":"'.$_SESSION["sessionId"].'",'.'"pergunta":"'.$pergunta.'","resposta":"'.$array.'"}';
echo $mJson;

