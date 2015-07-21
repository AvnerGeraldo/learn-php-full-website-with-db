<?php
/**
 * Created by PhpStorm.
 * User: Avner
 * Date: 17/07/2015
 * Time: 19:37
 */

require_once("conexao.php");
require_once("controllerProdutos.php");

echo "#### Executando Fixture ####\n<BR>";
$conn = conectarDB();



echo "Removendo tabela tbProdutos";
$conn->query("DROP TABLE IF EXISTS tbprodutos");
echo " - OK\n<BR>";

echo "Criando tabela tbProdutos";
$conn->query("CREATE TABLE tbprodutos(
  id_produto INT NOT NULL AUTO_INCREMENT,
  nome_produto VARCHAR(250) CHARACTER SET 'utf8' NOT NULL,
  descricao_produto TEXT CHARACTER SET 'utf8' NOT NULL,
  valor_produto FLOAT NOT NULL,
  PRIMARY KEY(id_produto)
);");
echo " - OK\n<BR>";

echo "Inserindo dados na tabela tbProdutos\n";
for( $i = 0; $i <= 9; $i++ ) {
    $produto        = "Produto#{$i}";
    $descricao      = "<p>{$produto}</p><br><p>Morbi vestibulum mattis auctor. Proin ullamcorper quam eget nisl pellentesque, eu sodales ante porta.</p>";
    $valor          = $i;

    $stmt = $conn->prepare("INSERT INTO tbprodutos(nome_produto, descricao_produto, valor_produto) VALUES(:produto, :descricao , :valor)");
    $stmt->bindValue("produto", $produto);
    $stmt->bindValue("descricao", $descricao);
    $stmt->bindValue("valor", $valor);
    $stmt->execute();
}


echo "Removendo tabela tbPaginas";
$conn->query("DROP TABLE IF EXISTS tbpaginas");
echo " - OK\n<BR>";

    echo "Criando tabela tbPaginas";
    $conn->query("CREATE TABLE IF NOT EXISTS tbpaginas(
  id_pagina INT NOT NULL AUTO_INCREMENT,
  nome_pagina VARCHAR(100)  NOT NULL,
  link_pagina VARCHAR(100)  NOT NULL,
  conteudo_pagina LONGTEXT NOT NULL,
  PRIMARY KEY(id_pagina)
);");
    echo " - OK\n<BR>";

    echo "Inserindo dados na tabela tbPaginas\n<BR>";
//HOME
$nome_pagina = "Home";
$link_pagina = "index";
$conteudo_pagina = "Página Principal";
$conteudo_pagina = htmlentities($conteudo_pagina, ENT_QUOTES, 'ISO-8859-1');
$stmt = $conn->prepare("INSERT INTO tbPaginas(nome_pagina, link_pagina, conteudo_pagina) VALUES(:pagina, :link , :conteudo)");
$stmt->bindValue("pagina", $nome_pagina);
$stmt->bindValue("link", $link_pagina);
$stmt->bindValue("conteudo", $conteudo_pagina);
$stmt->execute();

//Empresa
$nome_pagina        = "Empresa";
$link_pagina        = "empresa";
$conteudo_pagina    = "Página empresa";
$conteudo_pagina = htmlentities($conteudo_pagina, ENT_QUOTES, 'ISO-8859-1');
$stmt = $conn->prepare("INSERT INTO tbPaginas(nome_pagina, link_pagina, conteudo_pagina) VALUES(:pagina, :link , :conteudo)");
$stmt->bindValue("pagina", $nome_pagina);
$stmt->bindValue("link", $link_pagina);
$stmt->bindValue("conteudo", $conteudo_pagina);
$stmt->execute();

//Produtos
$nome_pagina        = "Produtos";
$link_pagina        = "produtos";
$cProdutos = new controllerProdutos();
$listaProdutos = $cProdutos->listaProdutos();

$conteudo_pagina = '<h2>Pagina de Produtos</h2><br>';
foreach($listaProdutos as $produto) {
    $conteudo_pagina .= '<div id="list-products" class="col-sm-4 col-md-4">
        <div class="thumbnail">
            <div class="img-responsive"></div>
            <div class="caption">
                <div class="row">
                    <div class="col-md-6 col-xs-6">
                        <h3>'.$produto['nome_produto'].'</h3>
                    </div>
                    <div class="col-md-6 col-xs-6 price">
                        <h3>
                            <label>R$ '.number_format($produto['valor_produto'], 2, ",", ".") .'</label></h3>
                    </div>
                </div>
                <p>'.nl2br($produto['descricao_produto']). '</p>
                <p></p>
            </div>
        </div>
    </div>';
}

$conteudo_pagina = htmlentities($conteudo_pagina, ENT_QUOTES, 'ISO-8859-1');
$stmt = $conn->prepare("INSERT INTO tbPaginas(nome_pagina, link_pagina, conteudo_pagina) VALUES(:pagina, :link , :conteudo)");
$stmt->bindValue("pagina", $nome_pagina);
$stmt->bindValue("link", $link_pagina);
$stmt->bindValue("conteudo", $conteudo_pagina);
$stmt->execute();



//Serviços
$nome_pagina        = "Serviços";
$link_pagina        = "servicos";
$conteudo_pagina    = "Página Serviços";
$conteudo_pagina = htmlentities($conteudo_pagina, ENT_QUOTES, 'ISO-8859-1');
$stmt = $conn->prepare("INSERT INTO tbPaginas(nome_pagina, link_pagina, conteudo_pagina) VALUES(:pagina, :link , :conteudo)");
$stmt->bindValue("pagina", $nome_pagina);
$stmt->bindValue("link", $link_pagina);
$stmt->bindValue("conteudo", $conteudo_pagina);
$stmt->execute();

//Contato
$nome_pagina        = "Contato";
$link_pagina        = "contato";
$conteudo_pagina    = null;
$stmt = $conn->prepare("INSERT INTO tbPaginas(nome_pagina, link_pagina, conteudo_pagina) VALUES(:pagina, :link , :conteudo)");
$stmt->bindValue("pagina", $nome_pagina);
$stmt->bindValue("link", $link_pagina);
$stmt->bindValue("conteudo", $conteudo_pagina);
$stmt->execute();