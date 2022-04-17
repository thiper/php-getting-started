<?php

 // CORS HEADERS
 header("Access-Control-Allow-Origin: *");
 header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Cache-Control, Pragma, Authorization, Accept, Accept-Encoding");

 header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
 header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past

/* if (!(isset($_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW']) 
 && $_SERVER['PHP_AUTH_USER'] == 'myuser' 
 && $_SERVER['PHP_AUTH_PW'] == 'mypswd')) {

 header('WWW-Authenticate: Basic realm="Restricted area"');
 header('HTTP/1.1 401 Unauthorized');

 $data['result'] = 'HTTP/1.1 401 Unauthorized';
} else {
 $data['result'] = 'HTTP/1.1 200 Ok';
} */

$date = date_create();
//echo date_format($date, 'U = Y-m-d H:i:s') . "\n";
echo date_format($date, 'd-m-y H:i:s');



