<?php
if (isset($_POST['action'])) {
 switch ($_POST['action']){
  case 'create':
    echo "sex";
    break;
 }
}
Class Productos{
  public function getProducts(){
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
      CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer '. $_SESSION['token']
       ),
    ));
    $response = curl_exec($curl);
    curl_close($curl);
    $response = json_decode($response);
    if (isset($response->code) && $response->code > 0) {
      return $response->data;
    }else{
      return array();
    }
  }
  public function createProduct(){
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => array('name' => 'playear azul','slug' => 'playera-azul-21-forever-3','description' => 'hermosa playera de color azul de la marca 21 forever','features' => 'La lavadora cuenta con capacidad de lavado de 18 kg, diseño exterior de color gris, su funcionamiento integra tecnología air bubble 4d, sistema de lavado por pulsador, 5 ciclos de lavado mas ciclo ariel , tina de acero inoxidable, 9 niveles de agua y 3 niveles de temperatura. Ofrece llenado con cascada de agua waterrfall, timer para inicio retardado y manija de apertura ez soft','brand_id' => '1','cover'=> new CURLFILE('/C:/Users/jsoto/Downloads/00750101111561L.webp')),
      CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer '. $_SESSION['token']
      ),
    ));
    $response = curl_exec($curl);
    curl_close($curl);
    echo $response;
  }
}
?>