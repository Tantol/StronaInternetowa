<?php
namespace Models;
use \PDO;
class User extends Model {

  public function getAll(){
    if($this->pdo === null){
      $data['error'] = \Config\Database\DBErrorName::$connection;
      return $data;
    }
    $data = array();
    $data['$user'] = array();
    try	{
      $stmt = $this->pdo->query('SELECT * FROM `'.\Config\Database\DBConfig::$tableUser.'`');
      $user = array();
      while ($row = $stmt -> fetch()){
        $user[$row['id']] = $row['login'];
      }
      $stmt->closeCursor();
      if($user && !empty($user)){
        $data['user'] = $user;
      }
    }
    catch(\PDOException $e)	{
      $data['error'] = \Config\Database\DBErrorName::$query;
    }	
    return $data;
  }  

  public function getAllForSelect(){
    $data = $this->getAll();
    $user = array();            
    if(!isset($data['error'])){        
      foreach($data['user'] as $user){                  
        $user[$user[\Config\Database\DBConfig\User::$id]] = $user[\Config\Database\DBConfig\User::$id];
      }
    }
    return $user;            
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
    $data['user'] = array();
    try	{
      $stmt = $this->pdo->prepare('SELECT * FROM  `'.\Config\Database\DBConfig::$tableUser.'` WHERE  `'.\Config\Database\DBConfig\User::$id.'`=:id');   
      $stmt->bindValue(':id', $id, PDO::PARAM_INT); 
      $result = $stmt->execute(); 
      $user = $stmt->fetchAll();
      $stmt->closeCursor();
      if($user && !empty($user)){
        $data['user'] = $user[0];
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

  public function add($login, $email, $password, $registerDate, $clientId, $workerId){
    /*****/if($this->pdo === null){
      $data['error'] = \Config\Database\DBErrorName::$connection;
      return $data;
    } else if($login === null || $email === null || $password === null || $registerDate === null){
      $data['error'] = \Config\Database\DBErrorName::$empty;
      return $data;
    }
    $data = array();
    try	{
      $stmt = $this -> pdo -> prepare('INSERT INTO `'.\Config\Database\DBConfig::$tableUser.'` (`'.\Config\Database\DBConfig\User::$login.'`,
      `'.\Config\Database\DBConfig\User::$email.'`, `'.\Config\Database\DBConfig\User::$password.'`, `'.\Config\Database\DBConfig\User::$registerDate.'`, `'.\Config\Database\DBConfig\User::$clientId.'`, `'.\Config\Database\DBConfig\User::$workerId.'`) VALUES(:login, :email, :password, :registerDate, :clientId, :workerId)');                   

      $stmt -> bindValue(':login', $login, PDO::PARAM_STR);
      $stmt -> bindValue(':email', $email, PDO::PARAM_STR);
      $stmt -> bindValue(':password', $password, PDO::PARAM_STR);
      $stmt -> bindValue(':registerDate', $registerDate, PDO::PARAM_STR);
      
      if ($clietnId === null){
        $stmt -> bindValue(':clientId', NULL, PDO::PARAM_INT);
        $stmt -> bindValue(':workerId', $workerId, PDO::PARAM_INT);
      } else {
        $stmt -> bindValue(':clientId', $clientId, PDO::PARAM_INT);
        $stmt -> bindValue(':workerId', NULL, PDO::PARAM_INT);
      }
      
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
      echo $e;
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
      $stmt = $this->pdo->prepare('DELETE FROM  `'.\Config\Database\DBConfig::$tableUser.'` WHERE  `'.\Config\Database\DBConfig\Worker::$id.'`=:id');   
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

  public function update($id, $login, $email, $password, $registerDate, $clientId, $workerId){
    $data = array();
    /*****/if($this->pdo === null){
      $data['error'] = \Config\Database\DBErrorName::$connection;
      return $data;
    } else if($id === null || $login === null || $email === null || $password === null || $registerDate === null){
      $data['error'] = \Config\Database\DBErrorName::$empty;
      return $data;
    }
    try	{
      $stmt = $this->pdo->prepare('UPDATE  `'.\Config\Database\DBConfig::$tableUser.'` SET
                `'.\Config\Database\DBConfig\User::$login.'`=:login,
                `'.\Config\Database\DBConfig\User::$email.'`=:email,
                `'.\Config\Database\DBConfig\User::$password.'`=:password,
                `'.\Config\Database\DBConfig\User::$registerDate.'`=:registerDate,
                `'.\Config\Database\DBConfig\User::$clientId.'`=:clientId,
                `'.\Config\Database\DBConfig\User::$workerId.'`=:workerId
                WHERE `'.\Config\Database\DBConfig\User::$id.'`=:id');

      $stmt -> bindValue(':id', $id, PDO::PARAM_INT);
      $stmt -> bindValue(':login', $login, PDO::PARAM_STR);
      $stmt -> bindValue(':email', $email, PDO::PARAM_STR);
      $stmt -> bindValue(':password', $password, PDO::PARAM_STR);
      $stmt -> bindValue(':registerDate', $registerDate, PDO::PARAM_STR);
      
      if ($clietnId === null){
        $stmt -> bindValue(':clientId', NULL, PDO::PARAM_INT);
        $stmt -> bindValue(':workerId', $workerId, PDO::PARAM_INT);
      } else {
        $stmt -> bindValue(':clientId', $clientId, PDO::PARAM_INT);
        $stmt -> bindValue(':workerId', NULL, PDO::PARAM_INT);
      }
      
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
