<?php
#receber as variaveis do form
$montadora = $_POST["montadora"];
$modelo = $_POST["modelo"];
$carro = $_POST["carro"];
$ano = $_POST["ano"];
$motor = $_POST["motor"];

//Resultados
echo "<h1>Resultado da consulta</h1>";
echo "Montadora="." $montadora"."<br>";
echo "Modelo="." $modelo"."<br>";
echo "Carro="." $carro"."<br>";
echo "Ano="." $ano"."<br>";
echo "Motor="." $motor"."<br>";