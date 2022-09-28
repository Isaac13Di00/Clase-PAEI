<?php

use function PHPSTORM_META\type;

if (isset($_POST['login'])&&!empty($_POST['email'])&&!empty($_POST['password'])) {
  $curl = curl_init();
  curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://crud.jonathansoto.mx/api/login',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => array('email' => $_POST['email'],'password' => $_POST['password']),
  ));
  $response = (array)json_decode(curl_exec($curl));
  curl_close($curl);
  // echo $response['code'];
  if ($response['code'] == 2) {
    header("Location: products.php");
  }
}else{
  echo "sexo";
}
?>