<?php

$host = "https://databases-auth.000webhost.com";
$user = "id15843228_fawaznajib";
$pass = "Sm0|m>jCfa5Qx(L5";
$database = "id15843228_humanresource";
$koneksi = mysqli_connect ($host, $user, $pass, $database);
if($koneksi){
}else{
    echo("tidak terkoneksi dengan database");
}
?>
