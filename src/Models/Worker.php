<?php
namespace Models;
use \PDO;
class Worker extends Model {

  public function getAll(){
    if($this->pdo === null){
      $data['error'] = \Config\Database\DBErrorName::$connection;
      return $data;
    }
    $data = array();
    $data['$workers'] = array();
    try	{
      $stmt = $this->pdo->query('SELECT * FROM `'.\Config\Database\DBConfig::$tableWorker.'`');
      $workers = array();
      while ($row = $stmt -> fetch()){
        $workers[$row['id']] = $row['fisrtName'];
      }
      $stmt->closeCursor();
      if($workers && !empty($workers)){
        $data['workers'] = $workers;
      }
    }
    catch(\PDOException $e)	{
      $data['error'] = \Config\Database\DBErrorName::$query;
    }	
    return $data;
  }  

  public function getAllForSelect(){
    $data = $this->getAll();
    $workers = array();            
    if(!isset($data['error'])){        
      foreach($data['workers'] as $worker){                  
        $workers[$workers[\Config\Database\DBConfig\Worker::$id]] = $workers[\Config\Database\DBConfig\Worker::$firstName];
      }
    }
    return $workers;            
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
    $data['workers'] = array();
    try	{
      $stmt = $this->pdo->prepare('SELECT * FROM  `'.\Config\Database\DBConfig::$tableWorker.'` WHERE  `'.\Config\Database\DBConfig\Worker::$id.'`=:id');   
      $stmt->bindValue(':id', $id, PDO::PARAM_INT); 
      $result = $stmt->execute(); 
      $workers = $stmt->fetchAll();
      $stmt->closeCursor();
      if($workers && !empty($workers)){
        $data['workers'] = $workers[0];
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

  public function add($firstName, $lastName, $PIN, $addressId, $contactDetailsId, $job){
    /*****/if($this->pdo === null){
      $data['error'] = \Config\Database\DBErrorName::$connection;
      return $data;
    } else if($firstName === null || $lastName === null || $PIN === null || $addressId === null || $contactDetailsId === null || $job === null){
      $data['error'] = \Config\Database\DBErrorName::$empty;
      return $data;
    }
    $data = array();
    try	{
      $stmt = $this -> pdo -> prepare('INSERT INTO `'.\Config\Database\DBConfig::$tableWorker.'` (`'.\Config\Database\DBConfig\Worker::$firstName.'`, `'.\Config\Database\DBConfig\Worker::$lastName.'`, `'.\Config\Database\DBConfig\Worker::$PIN.'`, `'.\Config\Database\DBConfig\Worker::$addressId.'`, `'.\Config\Database\DBConfig\Worker::$contactDetailsId.'`, `'.\Config\Database\DBConfig\Worker::$job.'`) VALUES(:firstName, :lastName, :PIN, :addressId, :contactDetailsId, :job)');                   

      $stmt -> bindValue(':firstName', $firstName, PDO::PARAM_STR);
      $stmt -> bindValue(':lastName', $lastName, PDO::PARAM_STR);
      $stmt -> bindValue(':PIN', $PIN, PDO::PARAM_INT);
      $stmt -> bindValue(':addressId', $addressId, PDO::PARAM_INT);
      $stmt -> bindValue(':contactDetailsId', $contactDetailsId, PDO::PARAM_INT);
      $stmt -> bindValue(':job', $job, PDO::PARAM_STR);
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
      $stmt = $this->pdo->prepare('DELETE FROM  `'.\Config\Database\DBConfig::$tableWorker.'` WHERE  `'.\Config\Database\DBConfig\Worker::$id.'`=:id');   
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

  public function update($id, $firstName, $lastName, $PIN, $addressId, $contactDetailsId, $job){
    $data = array();
    /*****/if($this->pdo === null){
      $data['error'] = \Config\Database\DBErrorName::$connection;
      return $data;
    } else if($id === null || $firstName === null || $lastName === null || $PIN === null || $addressId === null || $contactDetailsId === null || $job === null){
      $data['error'] = \Config\Database\DBErrorName::$empty;
      return $data;
    }
    try	{
      $stmt = $this->pdo->prepare('UPDATE  `'.\Config\Database\DBConfig::$tableWorker.'` SET
                `'.\Config\Database\DBConfig\Worker::$firstName.'`=:firstName, `'.\Config\Database\DBConfig\Worker::$lastName.'`=:lastName, `'.\Config\Database\DBConfig\Worker::$PIN.'`=:pin, `'.\Config\Database\DBConfig\Worker::$addressId.'`=:addressId, `'.\Config\Database\DBConfig\Worker::$contactDetailsId.'`=:contactDetailsId, `'.\Config\Database\DBConfig\Worker::$job.'`=:job WHERE `'.\Config\Database\DBConfig\Worker::$id.'`=:id');

      $stmt -> bindValue(':id', $id, PDO::PARAM_INT);
      $stmt -> bindValue(':firstName', $firstName, PDO::PARAM_STR);
      $stmt -> bindValue(':lastName', $lastName, PDO::PARAM_STR);
      $stmt -> bindValue(':pin', $PIN, PDO::PARAM_INT);
      $stmt -> bindValue(':addressId', $addressId, PDO::PARAM_INT);
      $stmt -> bindValue(':contactDetailsId', $contactDetailsId, PDO::PARAM_INT);
      $stmt -> bindValue(':job', $job, PDO::PARAM_STR);
      $stmt -> execute(); 

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
