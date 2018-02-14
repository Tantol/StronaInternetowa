<?php
namespace Models;
use \PDO;
class LoadOrd extends Model {

  public function getAll(){
    if($this->pdo === null){
      $data['error'] = \Config\Database\DBErrorName::$connection;
      return $data;
    }
    $data = array();
    $data['$loadOrd'] = array();
    try	{
      $stmt = $this->pdo->query('SELECT * FROM `'.\Config\Database\DBConfig::$tableLoadOrd.'`');
      $loadOrd = array();
      while ($row = $stmt -> fetch()){
        $loadOrd[$row['id']] = $row['clientId'];
      }
      $stmt->closeCursor();
      if($loadOrd && !empty($loadOrd)){
        $data['loadOrd'] = $loadOrd;
      }
    }
    catch(\PDOException $e)	{
      $data['error'] = \Config\Database\DBErrorName::$query;
    }	
    return $data;
  }  

  public function getAllForSelect(){
    $data = $this->getAll();
    $loadOrd = array();            
    if(!isset($data['error'])){        
      foreach($data['loadOrd'] as $loadOrd){                  
        $loadOrd[$loadOrd[\Config\Database\DBConfig\LoadOrd::$id]] = $loadOrd[\Config\Database\DBConfig\LoadOrd::$id];
      }
    }
    return $loadOrd;            
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
    $data['loadOrd'] = array();
    try	{
      $stmt = $this->pdo->prepare('SELECT * FROM  `'.\Config\Database\DBConfig::$tableLoadOrd.'` WHERE  `'.\Config\Database\DBConfig\LoadOrd::$id.'`=:id');   
      $stmt->bindValue(':id', $id, PDO::PARAM_INT); 
      $result = $stmt->execute(); 
      $loadOrd = $stmt->fetchAll();
      $stmt->closeCursor();
      if($loadOrd && !empty($loadOrd)){
        $data['loadOrd'] = $loadOrd[0];
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

  public function add($clientId, $moverId, $inclusivePrice, $note){
    /*****/if($this->pdo === null){
      $data['error'] = \Config\Database\DBErrorName::$connection;
      return $data;
    } else if($clientId === null || $moverId === null || $inclusivePrice === null || $note === null){
      $data['error'] = \Config\Database\DBErrorName::$empty;
      return $data;
    }
    $data = array();
    try	{
      $stmt = $this -> pdo -> prepare('INSERT INTO `'.\Config\Database\DBConfig::$tableLoadOrd.'` (`'.\Config\Database\DBConfig\LoadOrd::$clientId.'`, `'.\Config\Database\DBConfig\LoadOrd::$moverId.'`, `'.\Config\Database\DBConfig\LoadOrd::$inclusivePrice.'`, `'.\Config\Database\DBConfig\LoadOrd::$note.'`) VALUES(:clientId, :moverId, :inclusivePrice, :note)');                   

      $stmt -> bindValue(':clientId', $clientId, PDO::PARAM_INT);
      $stmt -> bindValue(':moverId', $moverId, PDO::PARAM_INT);
      $stmt -> bindValue(':inclusivePrice', $inclusivePrice, PDO::PARAM_INT);
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
      $stmt = $this->pdo->prepare('DELETE FROM  `'.\Config\Database\DBConfig::$tableLoadOrd.'` WHERE  `'.\Config\Database\DBConfig\LoadOrd::$id.'`=:id');   
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

  public function update($id, $clientId, $moverId, $inclusivePrice, $note){
    $data = array();
    /*****/if($this->pdo === null){
      $data['error'] = \Config\Database\DBErrorName::$connection;
      return $data;
    } else if($id === null || $clientId === null || $moverId === null || $inclusivePrice === null || $note === null){
      $data['error'] = \Config\Database\DBErrorName::$empty;
      return $data;
    }
    try	{
      $stmt = $this->pdo->prepare('UPDATE  `'.\Config\Database\DBConfig::$tableLoadOrd.'` SET
                `'.\Config\Database\DBConfig\LoadOrd::$clientId.'`=:clientId, `'.\Config\Database\DBConfig\LoadOrd::$moverId.'`=:moverId, `'.\Config\Database\DBConfig\LoadOrd::$inclusivePrice.'`=:inclusivePrice, `'.\Config\Database\DBConfig\LoadOrd::$note.'`=:note
                WHERE `'.\Config\Database\DBConfig\LoadOrd::$id.'`=:id');

      $stmt -> bindValue(':id', $id, PDO::PARAM_INT);
      $stmt -> bindValue(':clientId', $clientId, PDO::PARAM_INT);
      $stmt -> bindValue(':moverId', $moverId, PDO::PARAM_INT);
      $stmt -> bindValue(':inclusivePrice', $inclusivePrice, PDO::PARAM_INT);
      $stmt -> bindValue(':note', $note, PDO::PARAM_STR);;
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
