<?php
namespace Models;
use \PDO;
class Client extends Model {

  public function getAll(){
    if($this->pdo === null){
      $data['error'] = \Config\Database\DBErrorName::$connection;
      return $data;
    }
    $data = array();
    $data['$clients'] = array();
    try	{
      $stmt = $this->pdo->query('SELECT * FROM `'.\Config\Database\DBConfig::$tableClient.'`');
      $clients = array();
      while ($row = $stmt -> fetch()){
        $clients[$row['id']] = $row['firstName'];
      }
      $stmt->closeCursor();
      if($clients && !empty($clients)){
        $data['clients'] = $clients;
      }
    }
    catch(\PDOException $e)	{
      $data['error'] = \Config\Database\DBErrorName::$query;
    }	
    return $data;
  }  

  public function getAllForSelect(){
    $data = $this->getAll();
    $clients = array();            
    if(!isset($data['error'])){        
      foreach($data['clients'] as $client){                  
        $clients[$clients[\Config\Database\DBConfig\Client::$id]] = $clients[\Config\Database\DBConfig\Client::$firstName];
      }
    }
    return $clients;            
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
    $data['clients'] = array();
    try	{
      $stmt = $this->pdo->prepare('SELECT * FROM  `'.\Config\Database\DBConfig::$tableClient.'` WHERE  `'.\Config\Database\DBConfig\Client::$id.'`=:id');   
      $stmt->bindValue(':id', $id, PDO::PARAM_INT); 
      $result = $stmt->execute(); 
      $clients = $stmt->fetchAll();
      $stmt->closeCursor();
      if($clients && !empty($clients)){
        $data['clients'] = $clients[0];
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

  public function add($firstName, $lastName, $PIN, $addressId, $contactDetailsId){
    /*****/if($this->pdo === null){
      $data['error'] = \Config\Database\DBErrorName::$connection;
      return $data;
    } else if($firstName === null || $lastName === null || $PIN === null || $addressId === null || $contactDetailsId === null){
      $data['error'] = \Config\Database\DBErrorName::$empty;
      return $data;
    }
    $data = array();
    try	{
      $stmt = $this -> pdo -> prepare('INSERT INTO `'.\Config\Database\DBConfig::$tableClient.'` (`'.\Config\Database\DBConfig\Client::$firstName.'`, `'.\Config\Database\DBConfig\Client::$lastName.'`, `'.\Config\Database\DBConfig\Client::$PIN.'`, `'.\Config\Database\DBConfig\Client::$addressId.'`, `'.\Config\Database\DBConfig\Client::$contactDetailsId.'`) VALUES(:firstName, :lastName, :PIN, :addressId, :contactDetailsId)'); 
      
      $stmt -> bindValue(':firstName', $firstName, PDO::PARAM_STR);
      $stmt -> bindValue(':lastName', $lastName, PDO::PARAM_STR);
      $stmt -> bindValue(':PIN', $PIN, PDO::PARAM_INT);
      $stmt -> bindValue(':addressId', $addressId, PDO::PARAM_INT);
      $stmt -> bindValue(':contactDetailsId', $contactDetailsId, PDO::PARAM_INT);
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
      $stmt = $this->pdo->prepare('DELETE FROM  `'.\Config\Database\DBConfig::$tableClient.'` WHERE  `'.\Config\Database\DBConfig\Client::$id.'`=:id');   
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

  public function update($id, $firstName, $lastName, $PIN, $addressId, $contactDetailsId){
    $data = array();
    /*****/if($this->pdo === null){
      $data['error'] = \Config\Database\DBErrorName::$connection;
      return $data;
    } else if($id === null || $firstName === null || $lastName === null || $PIN === null || $addressId === null || $contactDetailsId === null){
      $data['error'] = \Config\Database\DBErrorName::$empty;
      return $data;
    }
    try	{
      $stmt = $this->pdo->prepare('UPDATE  `'.\Config\Database\DBConfig::$tableClient.'` SET
                `'.\Config\Database\DBConfig\Client::$firstName.'`=:firstName, `'.\Config\Database\DBConfig\Client::$lastName.'`=:lastName, `'.\Config\Database\DBConfig\Client::$PIN.'`=:PIN, `'.\Config\Database\DBConfig\Client::$addressId.'`=:addressId, `'.\Config\Database\DBConfig\Client::$contactDetailsId.'`=:contactDetailsId
                WHERE `'.\Config\Database\DBConfig\Client::$id.'`=:id');

      $stmt -> bindValue(':id', $id, PDO::PARAM_INT);
      $stmt -> bindValue(':firstName', $firstName, PDO::PARAM_STR);
      $stmt -> bindValue(':lastName', $lastName, PDO::PARAM_STR);
      $stmt -> bindValue(':PIN', $PIN, PDO::PARAM_INT);
      $stmt -> bindValue(':addressId', $addressId, PDO::PARAM_INT);
      $stmt -> bindValue(':contactDetailsId', $contactDetailsId, PDO::PARAM_INT);
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
