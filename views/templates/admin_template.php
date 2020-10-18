<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title><?php echo utf8_encode($this->home['site_titulo']); ?></title>
<!--        <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>-->
        <link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets/img/icon.png"/>
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/morris.css"/>
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/estiloAdmin.css"/>
        <script src="<?php echo BASE_URL ?>assets/js/jquery-3.1.1.min.js"></script>
        <script src="<?php echo BASE_URL ?>assets/js/Chart.min.js"></script>



    </head>
    <body>
        <?php
        $u = new Usuarios();
        $usuarios = $u->usuarioLogado();
        foreach ($usuarios as $usuario) {
            
        }
        date_default_timezone_set("America/Sao_Paulo");
        $date = new DateTime();
//echo $date->format("d/m/Y - H:i:s");
        ?>
        <div class="container_admin">
            <div class="container_menu_left">
                <div class="menu_left">
                    <div class="menu_left_perfil">
                        <div class="menu_left_perfil_foto">
                            <img src="<?php echo BASE_URL; ?>assets/img/usuario/<?php echo $usuario['img'] ?>">

                        </div>
                        <div class="menu_left_perfil_admin">
                            <p><?php echo (isset($usuario['nome'])) ? utf8_encode($usuario['nome']) : utf8_encode($usuario['usuario']); ?></p> 
                        </div>
                    </div>
                    <div class="menu_left_menu">
                        <ul>
<!--                            <li><a href="<?php echo BASE_URL; ?>admin">admin</a>
                                <div class="menu_hover">
                                    <ul>
                                        <li><a href="<?php echo BASE_URL; ?>admin/adicionarCliente">cadastrar cliente</a></li>
                                        <li><a href="<?php echo BASE_URL; ?>admin/adicionarFornecedor">cadastrar fornecedor</a></li>
                                        <li><a href="<?php echo BASE_URL; ?>admin/adicionarServico">cadastrar tipo de serviço</a></li>
                                        <li><a href="<?php echo BASE_URL; ?>admin/deletarCliente">excluir cliente do cadastro</a></li>
                                        <li><a href="<?php echo BASE_URL; ?>admin/deletarFornecedor">excluir fornecedor do cadastro</a></li>
                                        <li><a href="<?php echo BASE_URL; ?>admin/editarCliente">editar cadastro do cliente</a></li>
                                        <li><a href="<?php echo BASE_URL; ?>admin/editarFornecedor">editar cadastro do fornecedor</a></li>
                                        <li><a href="<?php echo BASE_URL; ?>admin/deletarServico">excluir um tipo de serviço</a></li>
                                        <li><a href="<?php echo BASE_URL; ?>admin/editarServico">editar um tipo de serviço</a></li>
                                        <li><a href="<?php echo BASE_URL; ?>admin/pesquisarCliente">pesquisar um cliente</a></li>
                                        <li><a href="<?php echo BASE_URL; ?>admin/pesquisarServico">pesquisar um tipo de servico</a></li>
                                    </ul>
                                </div>
                            </li>-->
                            <li><a href="<?php echo BASE_URL; ?>cms">painel</a>
                                <div class="menu_hover">
                                    <ul>
                                        <li><a href="<?php echo BASE_URL; ?>cms/adicionarPostagem">adicionar nova postagem</a></li>
                                        <li><a href="<?php echo BASE_URL; ?>cms/deletarPostagem">excluir uma postagem</a></li>
                                        <li><a href="<?php echo BASE_URL; ?>cms/editarPostagem">editar uma postagem</a></li>
<!--                                        <li><a href="<?php echo BASE_URL; ?>cms/adicionarFoto">adicionar foto na galeria</a></li>-->
<!--                                        <li><a href="<?php echo BASE_URL; ?>cms/deletarFoto">excluir foto da galeria</a></li>-->
<!--                                        <li><a href="<?php echo BASE_URL; ?>cms/adicionarPagina">adicionar nova pagina</a></li>-->
<!--                                        <li><a href="<?php echo BASE_URL; ?>cms/deletarPagina">excluir uma pagina</a></li>-->
<!--                                        <li><a href="<?php echo BASE_URL; ?>cms/adicionarDepoimento">adicionar um depoimento</a></li>-->
<!--                                        <li><a href="<?php echo BASE_URL; ?>cms/editarDepoimento">editar um depoimento</a></li>-->
<!--                                        <li><a href="<?php echo BASE_URL; ?>cms/deletarDepoimento">excluir um depoimento</a></li>-->
<!--                                        <li><a href="<?php echo BASE_URL; ?>cms/trocarSlide">trocar o slide</a></li>-->
                                    </ul>
                                </div>
                            </li>
                            <li><a href="<?php echo BASE_URL; ?>usuarios">usuarios</a>
                                <div class="menu_hover">
                                    <ul>
                                        <li><a href="<?php echo BASE_URL; ?>usuarios/adicionarUsuario">adicionar novo usuario</a></li>
                                        <li><a href="<?php echo BASE_URL; ?>usuarios/deletarUsuario">excluir um usuario</a></li>
                                        <li><a href="<?php echo BASE_URL; ?>usuarios/usuariosCadastrados">usuarios cadastrados</a></li>
                                    </ul>
                                </div>
                            </li>
<!--                            <li><a href="<?php echo BASE_URL; ?>financeiro">finaceiro</a>
                                <div class="menu_hover">
                                    <ul>
                                        <li><a href="<?php echo BASE_URL; ?>financeiro/adicionarCapital">adicionar novo capital</a></li>
                                        <li><a href="<?php echo BASE_URL; ?>financeiro/contasPagar">ver contas pra pagar</a></li>
                                        <li><a href="<?php echo BASE_URL; ?>financeiro/relatorioCaixas">ver utilização dos caixas</a></li>
                                        <li><a href="<?php echo BASE_URL; ?>financeiro/cadastrarConta">cadadastrar contas</a></li>
                                        <li><a href="<?php echo BASE_URL; ?>financeiro/contaPaga">informar contas quitadas</a></li>
                                        <li><a href="<?php echo BASE_URL; ?>financeiro/abrirCaixa">abrir caixa de venda</a></li>
                                        <li><a href="<?php echo BASE_URL; ?>financeiro/caixaAberto">caixas em aberto</a></li>
                                        <li><a href="<?php echo BASE_URL; ?>financeiro/fecharCaixa">fechar um caixa</a></li>
                                        <li><a href="<?php echo BASE_URL; ?>financeiro/pesquisarFornecedor">pesquisar por um fornecedor</a></li>
                                        <li><a href="<?php echo BASE_URL; ?>financeiro/vendas">vendas</a></li>

                                    </ul>
                                </div>
                            </li>
                            <li><a href="<?php echo BASE_URL; ?>estoque">estoque</a>
                                <div class="menu_hover">
                                    <ul>
                                        <li><a href="<?php echo BASE_URL; ?>estoque/adicionarProduto">adicionar produto ao cadastro</a></li>
                                        <li><a href="<?php echo BASE_URL; ?>estoque/visualizarProdutos">produtos cadastrados</a></li>
                                        <li><a href="<?php echo BASE_URL; ?>estoque/pesquisarProduto">pesquisar por produto</a></li>
                                        <li><a href="<?php echo BASE_URL; ?>estoque/abaixoEstoque">produtos abaixo do estoque</a></li>
                                        <li><a href="<?php echo BASE_URL; ?>estoque/pesquisarFornecedor">pesquisar por um fornecedor</a></li>
                                        <li><a href="<?php echo BASE_URL; ?>estoque/adicionarEstoque">adicionar ao estoque</a></li>
                                        <li><a href="<?php echo BASE_URL; ?>estoque/baixaManualEstoque">baixa manual em estoque</a></li>
                                        <li><a href="<?php echo BASE_URL; ?>estoque/deletarProduto">excluir produto do cadastro</a></li>
                                        <li><a href="<?php echo BASE_URL; ?>estoque/editarProduto">editar cadastro do produto</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li><a href="<?php echo BASE_URL; ?>venda">venda</a></li>-->
                        </ul>    
                    </div>
                </div>
            </div>
            <div class="container_supAdmin">
                <div class="menu_sup">
                    <ul>

                        <li><button><a href="<?php echo BASE_URL; ?>configurarUsuario">configurar sua conta</a></button></li>
                        <li><button><a href="<?php echo BASE_URL; ?>">voltar ao site</a></button></li>
                        <li><button><a href="<?php echo BASE_URL; ?>admin/logout">sair com segurança</a></button></li>

                    </ul>
                </div>



                <div class="containerConteudo">
                    <?php
                    $this->loadViewInTemplate($viewName, $viewData);
                    ?>
                </div>
            </div>
        </div>
        <footer>
            <div class="rodape">
                <h1>@Daniel Florêncio</h1>
                <h2><a  href="http://www.stylusprime.com" class="link" rel="nofollow" target="_blank" >desenvolvido e organizado por <span class='animated lightSpeedInRight' style="color: blue">StylusPrime</span> &copy; Todos os direitos reservados</a></h2>
                <!--    <h2>"Se você pensa que pode ou se pensa que não pode, de qualquer forma você está certo."  - Henry Ford</h2>-->
            </div>
        </footer>



        <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery-3.1.1.min.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery.mask.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/script.js"></script>

        <script src="<?php echo BASE_URL ?>assets/js/Chart.min.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/graficos.js"></script>
    </body>
</html>