<?php
 require_once 'conexao.php';
 $conexao = new Conexao(DB_SERVER, DB_NAME, DB_USERNAME, DB_PASSWORD);
 //Incluímos um código aqui...
$id = -1;
$codlivro = "";
$nome = "";
$descricao = "";
 $dados = array('cod_livro' => $_POST["codigo"], 'nome_livro' => $_POST["nome"], 'desc_livro' => $_POST["descricao"]);
 if($id == -1){
 $insert = $conexao->insert('livro', $dados);
 if($insert == true){
 echo 'inserido';
 }
 header("Location:index.php");
}
 ?>