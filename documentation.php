<?php

/**
 * documentation.php
 * arquivo responsavel por apresentaruma breve resenha do sistema
 * projeto MVC-puro
 * @author Daniel Florêncio
 * @copyright (c) 2018, Daniel Florêncio - StylusPrime.com
 */
?>
<pre>
 * documentation.php
 * arquivo responsavel por apresentar uma breve resenha do sistema
 * projeto MVC-puro
 * @author Daniel Florêncio
 * @copyright (c) 2018, Daniel Florêncio - StylusPrime.com

//este arquivo só pode ser acessado na raiz do projeto para consulta//

- na raiz do projeto temos o arquivo .htaccess e ele é responsavel por construir o mod_rewrite
- o arquivo index.php tambem existente na raiz do projeto é reponsavel por iniciar todo o sistema, nele se inicia uma sessão, depois ele requer o config.php
que por sua vez faz a conexão com o banco de dados do sistema, 
posteriormente o index implementa o metodo de autoload que busca em qual pasta que está determinada classe para estancia-la automaticamente quando solicitada
este metodo identifica a classe sem precisar ir buscar em qual pasta do projeto ela está guardada
em seguida no index estanciamos a classe Core que é a classe que dá o pontapé inicial para o sistema, instanciada a classe Core chamamos o metodo run dasta 
classe que identifica a url acessada e providencia a navegação pelo sistema 
 
 
</pre>