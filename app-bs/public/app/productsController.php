<?php
  class Productos{
    public function producto(){
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
          'Token: !KcgoR1g8lTVA7',
          'Authorization: Bearer 103|WNVCYhxZTwNAv1KfZGjSmDM4nSJcDrbUxZ6uCNLG',
          'Cookie: XSRF-TOKEN=eyJpdiI6InY2M1F0T1Q1NEg2OGNZSm0yVExlZHc9PSIsInZhbHVlIjoieHBPZTd3SFdyODBOaEZrNWpVK1BRbTloTXZRclpiYTFkaE1SWENLY0w0NmZvSitIT2NOdGlvWmFBcVdvMlk5M2FNb3oreU5ma3kwWlRKcDhidkZveWszQjN1Zy8yVTV4Wm9kVnNBeHdXTXZNWFBndHplYXBpd2dHakhacFZSSEIiLCJtYWMiOiIwYmQ3YTUyNmZiZTMxNTY2MzVmZjZhYzYxMjJiMDU2ZTk4NmU2MTNhMWRkNjRiMGEyNjkzOTFlMDQ2NTlkODBmIiwidGFnIjoiIn0%3D; laravel_session=eyJpdiI6ImFrWHZuY1orTHZwaWRKWXpCdkpnQ0E9PSIsInZhbHVlIjoiOThrbklBd0M0SlUrT2hwOWRxSzNTdUgzUnhrQytSa2Nhd1JVdk9kcmxhSlA4Z3p2V1hWajZXU3BiL2xtMlZDU1phU0xzeHNQamJ3RFlHa0M4d1Q3VW1yYVJ3NUFuakpleDBMSmVkODQ2aCtFWm1rdFNrMkJvbWRBRkc4TlYyNGQiLCJtYWMiOiI3M2E0OTNlM2M4YjM4NGFmOWYyYTFhOTk2YmMyMTFmZTdhZWRiOGU1ZTU3ZTk0YTc0ZDU3NWM1NTIyNmNhNTc2IiwidGFnIjoiIn0%3D'
        ),
      ));
      $response = (array)json_decode(curl_exec($curl), true);
      curl_close($curl);
      return $response['data'];
      }
  }

?>