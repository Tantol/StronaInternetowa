<?php
namespace Models;
use \PDO;
class Cargo extends Model {

  public function getAll(){
    if($this->pdo === null){
      $data['error'] = \Config\Database\DBErrorName::$connection;
      return $data;
    }
    $data = array();
    $data['$cargo'] = array();
    try	{
      $stmt = $this->pdo->query('SELECT * FROM `'.\Config\Database\DBConfig::$tableCargo.'`');
      $cargo = array();
      while ($row = $stmt -> fetch()){
        $cargo[$row['id']] = $row['loadOrdId'];
      }
      $stmt->closeCursor();
      if($cargo && !empty($cargo)){
        $data['cargo'] = $cargo;
      }
    }
    catch(\PDOException $e)	{
      $data['error'] = \Config\Database\DBErrorName::$query;
    }	
    return $data;
  }  

  public function getAllForSelect(){
    $data = $this->getAll();
    $cargo = array();            
    if(!isset($data['error'])){        
      foreach($data['cargo'] as $cargo){                  
        $cargo[$cargo[\Config\Database\DBConfig\Cargo::$id]] = $cargo[\Config\Database\DBConfig\Cargo::$loadOrdId];
      }
    }
    return $cargo;            
  }
  public function getOne($id){
    /*****/if($this->pdo === null){
      $data['error'] = \Config\Database\DBErrorName::$connection;
      return $data;
    } else if($id === null){
      $data['error'] = \Config\Database\DBErrorName::$nomatch;
      return $data;
    }          
    $data = array();
    $data['cargo'] = array();
    try	{
      $stmt = $this->pdo->prepare('SELECT * FROM  `'.\Config\Database\DBConfig::$tableCargo.'` WHERE  `'.\Config\Database\DBConfig\Cargo::$id.'`=:id');  
      $stmt->bindValue(':id', $id, PDO::PARAM_INT); 
      $result = $stmt->execute(); 
      $cargo = $stmt->fetchAll();
      $stmt->closeCursor();
      if($cargo && !empty($cargo)){
        $data['cargo'] = $cargo[0];
      } else {
        $data['error'] = \Config\Database\DBErrorName::$nomatch;
      }
    }
    catch(\PDOException $e)	{
      var_dump($e);
      $data['error'] = \Config\Database\DBErrorName::$query;
    }	
    return $data;
  }        

  public function add($loadOrdId, $driverId, $startAddressId, $endAddressId, $price, $categoryId, $note){
    /*****/if($this->pdo === null){
      $data['error'] = \Config\Database\DBErrorName::$connection;
      return $data;
    } else if($loadOrdId === null || $driverId === null || $startAddressId === null || $endAddressId === null || $price === null || $categoryId === null || $note === null){
      $data['error'] = \Config\Database\DBErrorName::$empty;
      return $data;
    }
    $data = array();
    try	{
      $stmt = $this -> pdo -> prepare('INSERT INTO `'.\Config\Database\DBConfig::$tableCargo.'` (`'.\Config\Database\DBConfig\Cargo::$loadOrdId.'`, `'.\Config\Database\DBConfig\Cargo::$driverId.'`, `'.\Config\Database\DBConfig\Cargo::$startAddressId.'`, `'.\Config\Database\DBConfig\Cargo::$endAddressId.'`, `'.\Config\Database\DBConfig\Cargo::$price.'`, `'.\Config\Database\DBConfig\Cargo::$categoryId.'`, `'.\Config\Database\DBConfig\Cargo::$note.'`) VALUES(:loadOrdId, :driverId, :startAddressId, :endAddressId, :price, :categoryId, :note)');                   

      $stmt -> bindValue(':loadOrdId', $loadOrdId, PDO::PARAM_INT);
      $stmt -> bindValue(':driverId', $driverId, PDO::PARAM_INT);
      $stmt -> bindValue(':startAddressId', $startAddressId, PDO::PARAM_INT);
      $stmt -> bindValue(':endAddressId', $endAddressId, PDO::PARAM_INT);
      $stmt -> bindValue(':price', $price, PDO::PARAM_INT);
      $stmt -> bindValue(':categoryId', $categoryId, PDO::PARAM_INT);
      $stmt -> bindValue(':note', $note, PDO::PARAM_STR);
      $result = $stmt -> execute();  
      if(!$result){
        $data['error'] = \Config\Database\DBErrorName::$noadd;
      } else{
        $data['message'] = \Config\Database\DBMessageName::$addok;
      }
      $stmt->closeCursor();                 
    }
    catch(\PDOException $e)	{
      $data['error'] = \Config\Database\DBErrorName::$query;
    }	
    return $data;
  }

  public function delete($id){
    $data = array();
    if($this->pdo === null){
      $data['error'] = \Config\Database\DBErrorName::$connection;
      return $data;
    }
    if($id === null){
      $data['error'] = \Config\Database\DBErrorName::$nomatch;
      return $data;
    }
    try	{
      $stmt = $this->pdo->prepare('DELETE FROM  `'.\Config\Database\DBConfig::$tableCargo.'` WHERE  `'.\Config\Database\DBConfig\Cargo::$id.'`=:id');   
      $stmt->bindValue(':id', $id, PDO::PARAM_INT); 
      $result = $stmt->execute(); 
      if(!$result){
        $data['error'] = \Config\Database\DBErrorName::$nomatch;
      } else {
        $data['message'] = \Config\Database\DBMessageName::$deleteok;
      }
      $stmt->closeCursor();                 
    }
    catch(\PDOException $e)	{
      $data['error'] = \Config\Database\DBErrorName::$query;
    }
    return $data;
  }  

  public function update($id, $loadOrdId, $driverId, $startAddressId, $endAddressId, $price, $categoryId, $note){
    $data = array();
    /*****/if($this->pdo === null){
      $data['error'] = \Config\Database\DBErrorName::$connection;
      return $data;
    } else if($id === null || $loadOrdId === null || $driverId === null || $startAddressId === null || $endAddressId === null || $price === null || $categoryId === null || $note === null){
      $data['error'] = \Config\Database\DBErrorName::$empty;
      return $data;
    }
    try	{
      $stmt = $this->pdo->prepare('UPDATE  `'.\Config\Database\DBConfig::$tableCargo.'` SET
                `'.\Config\Database\DBConfig\Cargo::$loadOrdId.'`=:loadOrdId, `'.\Config\Database\DBConfig\Cargo::$driverId.'`=:driverId, `'.\Config\Database\DBConfig\Cargo::$startAddressId.'`=:startAddressId, `'.\Config\Database\DBConfig\Cargo::$endAddressId.'`=:endAddressId, `'.\Config\Database\DBConfig\Cargo::$price.'`=:price, `'.\Config\Database\DBConfig\Cargo::$categoryId.'`=:categoryId, `'.\Config\Database\DBConfig\Cargo::$note.'`=:note WHERE `'.\Config\Database\DBConfig\Cargo::$id.'`=:id');

      $stmt -> bindValue(':id', $id, PDO::PARAM_INT);
      $stmt -> bindValue(':loadOrdId', $loadOrdId, PDO::PARAM_INT);
      $stmt -> bindValue(':driverId', $driverId, PDO::PARAM_INT);
      $stmt -> bindValue(':startAddressId', $startAddressId, PDO::PARAM_INT);
      $stmt -> bindValue(':endAddressId', $endAddressId, PDO::PARAM_INT);
      $stmt -> bindValue(':price', $price, PDO::PARAM_INT);
      $stmt -> bindValue(':categoryId', $categoryId, PDO::PARAM_INT);
      $stmt -> bindValue(':note', $note, PDO::PARAM_STR);
      $result = $stmt->execute();
      $rows = $stmt->rowCount();
      if(!$result){
        $data['error'] = \Config\Database\DBErrorName::$nomatch;
      }
      else {
        $data['message'] = \Config\Database\DBMessageName::$updateok;
      }
      $stmt->closeCursor();                 
    }
    catch(\PDOException $e)	{
      $data['error'] = \Config\Database\DBErrorName::$query;
    }
    return $data;
  }         
}
