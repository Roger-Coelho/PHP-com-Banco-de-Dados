<?php

  //Classe Cidade
  class Cidade{

    //Variável estática
    private static $conn;
  
    //Método para a conexão com o banco de dados
    public static function getConnection(){
      if(empty(self::$conn)){
  		  $conexao = parse_ini_file('config/livro.ini');
  		  $host = $conexao['host'];
  		  $name = $conexao['name'];
  		  $user = $conexao['user'];
  		  $pass = $conexao['pass'];
  		
        self::$conn = new PDO("mysql:host={$host};port=3306;dbname={$name}", $user, $pass);
        self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      }
      return self::$conn;
    }
  
    //Método para retorno das informações presentes na tabela cidade
    public static function all(){
      $conn = self::getConnection();
    
      $result = $conn->query("SELECT * FROM cidade");
      return $result->fetchall();
    }
  }
?>