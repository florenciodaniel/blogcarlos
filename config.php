<?php
/**
 * config.php
 * arquivo responsavel por fazer conexão ao banco de dados
 * projeto clinica veterinaria petplay
 * @author Daniel Florêncio
 * @copyright (c) 2018, Daniel Florêncio - StylusPrime.com
 */


//requerendo arquivo para saber se estamos  no computador ou no servidor externo
require 'environment.php';

global $config;
global $db;//global criada para que em qualquer canto euq eu precise de conexão ao banco eu chamo esta global

$config = array();
//aqui definos as variaveis para conexão com o banco de dados da maquina local
if(ENVIRONMENT == 'development') {//se ENVIRONMENT estiver definido com development lá no environment.php estamos na maquina local
	define("BASE_URL", "http://localhost/blogcarlos/");
	$config['dbname'] = 'blogcarlos';
	$config['host'] = 'localhost';
	$config['dbuser'] = 'root';
	$config['dbpass'] = '';
} else {//caso contrario estamos no nosso servidor externo
 //aqui definimos as variaveis para conectar ao bancos de dados do nosso servidor externo
 
	define("BASE_URL", "http://www.stylustec.xyz/");
	$config['dbname'] = 'u723896824_pet';
	$config['host'] = 'mysql.hostinger.com.br';
	$config['dbuser'] = 'u723896824_flore';
	$config['dbpass'] = 'Supergisele02';
}

$db = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'], $config['dbuser'], $config['dbpass']);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);