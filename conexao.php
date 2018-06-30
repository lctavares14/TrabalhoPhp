<?php
//Vari�veis de acesso Db
define('DB_SERVER', 'localhost');
define('DB_NAME', 'biblioteca');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
//inicio da classe de conexao
class Conexao {
 var $db, $conn;
 public function __construct($server, $database, $username, $password){
 $this->conn = mysqli_connect($server, $username, $password);
 $this->db = mysqli_select_db($this->conn,$database);
 }

public function insert($tabela, $dados) {
 foreach ($dados as $key => $value) {
 $keys[] = $key;
 $insertvalues[] = '\'' . $value . '\'';
 }
 $keys = implode(',', $keys);
 $insertvalues = implode(',', $insertvalues);
 $sql = "INSERT INTO $tabela ($keys) VALUES ($insertvalues)";
 return $this->executar($sql);
 }


 public function select($tabela, $colunas = "*") {
    $sql = "SELECT $colunas FROM $tabela";
    $result = $this->executar($sql);
    while ($row = mysqli_fetch_array($result)) {
        $return[] = $row;
    }
    return $return;
}
public function selectPeloId($tabela, $colunas = "*",$colunaId,$id) {
    $sql = "SELECT $colunas FROM $tabela WHERE $colunaId = $id";
    $result = $this->executar($sql);
    $row = mysql_fetch_array($result);
    return $row;
}
public function update($tabela, $colunaPrimay, $id, $dados) {
 foreach ($dados as $key => $value) {
 $sets[] = $key . '=\'' . $value . '\'';
 }
 $sets = implode(',', $sets);
 $sql = "UPDATE $tabela SET $sets WHERE $colunaPrimay = '$id'";
 return $this->executar($sql);
 }

 public function executar($sql){    
     return mysqli_query($this->conn,$sql);     
 }
}
?>