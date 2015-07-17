<?php
/**
 * Created by PhpStorm.
 * User: Avner
 * Date: 17/07/2015
 * Time: 19:37
 */

require_once("conexao.php");

echo "#### Executando Fixture ####\n<BR>";
$conn = conectarDB();

echo "Removendo tabela";
$conn->query("DROP TABLE IF EXISTS tbprodutos");
echo " - OK\n<BR>";

echo "Criando tabela";
$conn->query("CREATE TABLE tbprodutos(
  id_produto INT NOT NULL AUTO_INCREMENT,
  nome_produto VARCHAR(250) CHARACTER SET 'utf8' NOT NULL,
  valor_produto FLOAT NOT NULL,
  PRIMARY KEY(id_produto)
);");
echo " - OK\n<BR>";

echo "Inserindo dados na tabela\n";
for( $i = 0; $i <= 9; $i++ ) {
    $produto    = "Produto#{$i}";
    $valor      = $i;

    $stmt = $conn->prepare("INSERT INTO tbprodutos(nome_produto, valor_produto) VALUES(:produto, :valor)");
    $stmt->bindValue("produto", $produto);
    $stmt->bindValue("valor", $valor);
    $stmt->execute();
}
