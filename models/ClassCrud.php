<?php
namespace Models;

class ClassCrud extends ClassConexao
{
   //Atributos
   private $crud;
   private $contador;

   //Preparação das declativas
   private function prepareExecute($query , $parametros)
   {
       $this->countParametros($parametros);
       $this->crud=$this->conectaDB("127.0.0.1", "crud", "root", "")->prepare($query);

       if($this->contador > 0){
           for($i=1; $i <= $this->contador; $i++){
               $this->crud->bindValue($i,$parametros[$i-1]);
           }
       }

       $this->crud->execute();
   }

   //Contador de parâmetros
   private function countParametros($parametros)
   {
       $this->contador=count($parametros);
   }

   //Inserção no Banco de Dados
   public function insertDB($table , $where , $parametros){
       $this->prepareExecute("INSERT INTO {$table} VALUES ({$where})", $parametros);
       return $this->crud;
   }

   //Select no Banco de Dados
   public function selectDB($fields, $table, $where, $parametros){
        $this->prepareExecute("SELECT {$fields} FROM {$table} {$where}", $parametros);
        return $this->crud;
   }

   //Atualizar no Banco de Dados
   public function updateDB($table, $set, $where, $parametros){
        $this->prepareExecute("UPDATE {$table} SET {$set} WHERE {$where}", $parametros);
        return $this->crud;
   }

   //Deletar no Banco de Dados
   public function deleteDB($table, $where, $parametros){
        $this->prepareExecute("delete from {$table} where {$where}", $parametros);
        return $this->crud;
   }

}

?>

