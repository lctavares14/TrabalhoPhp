<?php
 require_once 'conexao.php';
 $conexao = new Conexao(DB_SERVER, DB_NAME, DB_USERNAME, DB_PASSWORD); 
foreach ($conexao->select('livro') as $aux_query)
{
echo '<tr>';
echo ' <td>'.$aux_query["id_livro"].'</td>';
echo ' <td>'.$aux_query["cod_livro"].'</td>';
echo ' <td>'.$aux_query["nome_livro"].'</td>';
echo ' <td>'.$aux_query["desc_livro"].'</td>';
echo ' <td><a href="'.$_SERVER["PHP_SELF"].'?id='.$aux_query["id_livro"].'">Editar</a></td>';
echo ' <td><a href="'.$_SERVER["PHP_SELF"].'?id='.$aux_query["id_livro"].
'&del=true">Excluir</a></td>';
echo '</tr>';
}
?>