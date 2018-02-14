<?php
namespace Models;
use \PDO;
class ContactDetails extends Model {

  public function getAll(){
    if($this->pdo === null){
      $data['error'] = \Config\Database\DBErrorName::$connection;
      return $data;
    }
    $data = array();
    $data['$contactDetails'] = array();
    try	{
      $stmt = $this->pdo->query('SELECT * FROM `'.\Config\Database\DBConfig::$tableContactDetails.'`');
      $contactDetails = array();
      while ($row = $stmt -> fetch()){
        $contactDetails[$row['id']] = $row['telephoneNumber'];
      }
      $stmt->closeCursor();
      if($contactDetails && !empty($contactDetails)){
        $data['contactDetails'] = $contactDetails;
      }
    }
    catch(\PDOException $e)	{
      $data['error'] = \Config\Database\DBErrorName::$query;
    }	
    return $data;
  }  

  public function getAllForSelect(){
    $data = $this->getAll();
    $contactDetails = array();            
    if(!isset($data['error'])){        
      foreach($data['contactDetails'] as $contactDetails){                  
        $contactDetails[$contactDetails[\Config\Database\DBConfig\Address::$id]] = $contactDetails[\Config\Database\DBConfig\ContactDetails::$id];
      }
    }
    return $contactDetails;            
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
    $data['contactDetails'] = array();
    try	{
      $stmt = $this->pdo->prepare('SELECT * FROM  `'.\Config\Database\DBConfig::$tableContactDetails.'` WHERE  `'.\Config\Database\DBConfig\ContactDetails::$id.'`=:id');   
      $stmt->bindValue(':id', $id, PDO::PARAM_INT); 
      $result = $stmt->execute(); 
      $contactDetails = $stmt->fetchAll();
      $stmt->closeCursor();
      if($contactDetails && !empty($contactDetails)){
        $data['contactDetails'] = $contactDetails[0];
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

  public function add($telephoneNumber, $fax, $contactAddressId){
    /*****/if($this->pdo === null){
      $data['error'] = \Config\Database\DBErrorName::$connection;
      return $data;
    } else if($telephoneNumber === null || $fax === null || $contactAddressId === null){
      $data['error'] = \Config\Database\DBErrorName::$empty;
      return $data;
    }
    $data = array();
    try	{
      $stmt = $this -> pdo -> prepare('INSERT INTO `'.\Config\Database\DBConfig::$tableContactDetails.'` (`'.\Config\Database\DBConfig\ContactDetails::$telephoneNumber.'`, `'.\Config\Database\DBConfig\ContactDetails::$fax.'`, `'.\Config\Database\DBConfig\ContactDetails::$contactAddressId.'`) VALUES(:telephoneNumber, :fax, :contactAddressId)');                   

      $stmt -> bindValue(':telephoneNumber', $telephoneNumber, PDO::PARAM_STR);
      $stmt -> bindValue(':fax', $fax, PDO::PARAM_STR);
      $stmt -> bindValue(':contactAddressId', $contactAddressId, PDO::PARAM_INT);
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
      $stmt = $this->pdo->prepare('DELETE FROM  `'.\Config\Database\DBConfig::$tableContactDetails.'` WHERE  `'.\Config\Database\DBConfig\ContactDetails::$id.'`=:id');   
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

  public function update($id, $telephoneNumber, $fax, $contactAddressId){
    $data = array();
    /*****/if($this->pdo === null){
      $data['error'] = \Config\Database\DBErrorName::$connection;
      return $data;
    } else if($id === null || $telephoneNumber === null || $fax === null || $contactAddressId === null){
      $data['error'] = \Config\Database\DBErrorName::$empty;
      return $data;
    }
    try	{
      $stmt = $this->pdo->prepare('UPDATE  `'.\Config\Database\DBConfig::$tableContactDetails.'` SET
                `'.\Config\Database\DBConfig\ContactDetails::$telephoneNumber.'`=:telephoneNumber, `'.\Config\Database\DBConfig\ContactDetails::$fax.'`=:fax, `'.\Config\Database\DBConfig\ContactDetails::$contactAddressId.'`=:contactAddressId
                WHERE `'.\Config\Database\DBConfig\ContactDetails::$id.'`=:id');

      $stmt -> bindValue(':id', $id, PDO::PARAM_INT);
      $stmt -> bindValue(':telephoneNumber', $telephoneNumber, PDO::PARAM_STR);
      $stmt -> bindValue(':fax', $fax, PDO::PARAM_STR);
      $stmt -> bindValue(':contactAddressId', $contactAddressId, PDO::PARAM_INT);
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
