<?php
/**
 * environment.php
 * arquivo responsavel por definir se estamos no ambiente de produção (produzindo em nosso computador-development) 
 * ou no servidor externo (produto final para o site - production)
 * @copyright (c) 2018, Daniel Florêncio - StylusPrime.com
 */   

////// NÃO ENVIAR ESTE ARQUIVO PARA O SERVIDOR EXTERNO SE LÁ JÁ ESTIVER UM SEMELHANTE/////////////////////////////



//para uso local usamos esta constante
define("ENVIRONMENT", "development");


// para uso no servidor externo usamos esta e comentamos a anterior
//define("ENVIRONMENT", "production");
?>