<?php
$maquina = "localhost";
$usernamebd = "root"; 
$passworddb = ""; 
$bd = "formacao"; 

$ligacao = new mysqli($maquina,$usernamebd,$passworddb,$bd);
if($ligacao->connect_error){
    die("connection failed:" .$ligacao->connect_error);
    
}