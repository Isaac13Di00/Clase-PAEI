<?php
$user = new User();
if (isset($_POST['action'])) {
 switch ($_POST['action']){
   case 'create':
    $response = $user->login($_POST['email'], $_POST['password']);
    session_start();
    $_SESSION['id'] = $response['id'];
    $_SESSION['name'] = $response['name'];
    $_SESSION['lastname'] = $response['lastname'];
    $_SESSION['email'] = $response['email'];
    $_SESSION['token'] = $response['token'];
    header("Location: products.php");
    break;
 }
}
Class User{
  public function login($email, $password)  {
    if (isset($_POST['action'])) {
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
        if ($response['code'] == 2) {
          return $response;
        }else{
          header("Location: ");
        }
      }
    }
  }
}

?>