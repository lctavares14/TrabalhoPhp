<!DOCTYPE html>
<html>
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
 <title></title>
 </head>
 <body>
 <?php
 require_once 'conexao.php'; 
 $conexao = new Conexao(DB_SERVER, DB_NAME, DB_USERNAME, DB_PASSWORD);
 require_once 'alterar.php'; 
 ?>
<form action="cadastrar.php" method="POST">
Código:<br/>
<input type="text" name="codigo" placeholder="Nome do livro" value="<?=$codlivro?>"><br/><br
/>
Nome:<br/>
<input type="text" name="nome" placeholder="Nome do livro"><br/><br
/>
Descrição:<br/>
<input type="text" name="descricao" placeholder="Descricao do livro"><br
/><br/>
<br/><br/>
<input type="hidden" name="id" >
<!--Alteramos aqui tamb�m, para poder mostrar o texto Cadastrar, ou Salvar, de
acordo com o momento. :)-->
<button type="submit">Cadastrar</button>
</form>
<br>
<br>
<table width="400px" border="1" cellspacing="0">

<tr>
<td><strong>Id</strong></td>
<td><strong>Código</strong></td>
<td><strong>Nome</strong></td>
<td><strong>Descricao</strong></td>
<td><strong>Ação</strong></td>
</tr>
<?php
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
</table>
 </body>
</html>
