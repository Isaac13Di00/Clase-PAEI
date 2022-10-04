<?php
if (isset($_POST['action'])) {
  switch ($_POST['action']){
    case 'create':
      session_start();
    $producto = new Productos();
    $_SESSION['name-product'] = $_POST['name'];
    $_SESSION['slug-product'] = $_POST['slug'];
    $_SESSION['description-product'] = $_POST['description'];
    $_SESSION['features-product'] = $_POST['features'];
    $_SESSION['brand_id-product'] = $_POST['brand_id'];
    $_SESSION['cover-product'] = $producto->confImage();
    $producto->createProduct();
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
      CURLOPT_POSTFIELDS => array(
        'name' => $_SESSION['name-product'],
        'slug' => $_SESSION['slug-product'],
        'description' => $_SESSION['description-product'],
        'features' => $_SESSION['features-product'],
        'brand_id' => $_POST['brand_id'],
        'cover'=> new CURLFILE($_SESSION['cover-product'])),
      CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer ' . $_SESSION['token']
      ),
    ));

    $response = json_decode(curl_exec($curl));
    curl_close($curl);
    if (isset($response->code) && $response->code > 0) {
      header("Location: ../products/products.php");
    }else{
      header("Location: ../products/products.php?error=true");
      
    }

  }
  public function confImage(){
    $target_path  = '../public/upload_img/' . basename( $_FILES['cover']['name']); 
    move_uploaded_file($_FILES['cover']['tmp_name'], $target_path);
    return $target_path;
  }
}
?>