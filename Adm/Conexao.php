<?php
	$servidor="localhost";
	$banco="bdyourparty";
	$usuario="root";
	$senha="";

	$pdo = new PDO("mysql:host=$servidor;dbname=$banco",$usuario,$senha);		
?>