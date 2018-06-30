<?php
require_once 'conexao.php';
$conexao = new Conexao(DB_SERVER, DB_NAME, DB_USERNAME, DB_PASSWORD);

if(isset($_POST["id_livro"]) && is_numeric($_GET["id_livro"])){
$id = $_GET["id_livro"];
$result_livro = "SELECT * FROM livros WHERE id='$id'";
$resultado_livro = mysqli_query($conn, $result_livro);
$total_livro = mysqli_num_rows($resultado_livro);
while($rows_livros = mysqli_fetch_assoc($resultado_livro)) {
        $codigo_livro  = $rows_livros['cod_livro'];
        $nome_livro    = $rows_livros['nome_livro'];
        $desc_livro    = $rows_livros['desc_livro'];
}
$dado = $conexao->selectPeloId('livro', "id_livro",$id);
$codlivro = $codigo_livro;
$nomelivro = $nome_livro;
$descricaolivro = $desc_livro;
}
else{
$id = -1;
$codlivro = "";
$nomelivro = "";
$descricaolivro = "";
}
?>