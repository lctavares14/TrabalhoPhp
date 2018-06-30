<?php
//Vari�veis de acesso Db
define('DB_SERVER', 'localhost');
define('DB_NAME', 'biblioteca');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
//inicio da classe de conexao
class Conexao {
 var $db;
 var $conn;
 public function __construct($server, $database, $username, $password){
 $this->$conn = mysql_connect($server, $username, $password);
 $this->$db = mysql_select_db($database,$this->$conn);
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
    while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
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
     return mysql_query($sql,$this->conn);     
 }
}
?>