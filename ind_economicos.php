<?php 

//MONEDAS///

$apiUrl = 'http://mindicador.cl/api';
//Es necesario tener habilitada la directiva allow_url_fopen para usar file_get_contents
if ( ini_get('allow_url_fopen') ) {
    $json = file_get_contents($apiUrl);
} else {
    //De otra forma utilizamos cURL
    $curl = curl_init($apiUrl);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $json = curl_exec($curl);
    curl_close($curl);
}

$dailyIndicators = json_decode($json);
echo 'El valor actual de la UF es $' . $dailyIndicators->uf->valor ."<br>";
echo 'El valor actual del Dólar observado es $' . $dailyIndicators->dolar->valor."<br>";
echo 'El valor actual del Dólar acuerdo es $' . $dailyIndicators->dolar_intercambio->valor."<br>";
echo 'El valor actual del Euro es $' . $dailyIndicators->euro->valor."<br>";
echo 'El valor actual del IPC es ' . $dailyIndicators->ipc->valor."<br>";
echo 'El valor actual de la UTM es $' . $dailyIndicators->utm->valor."<br>";
echo 'El valor actual del IVP es $' . $dailyIndicators->ivp->valor."<br>";
echo 'El valor actual del Imacec es ' . $dailyIndicators->imacec->valor."<br>";

//FIN MONEDAS//

 ?>