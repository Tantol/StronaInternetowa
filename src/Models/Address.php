<?php
namespace Models;
use \PDO;
class Address extends Model {

  public function getAll(){
    if($this->pdo === null){
      $data['error'] = \Config\Database\DBErrorName::$connection;
      return $data;
    }
    $data = array();
    $data['$addresses'] = array();
    try	{
      $stmt = $this->pdo->query('SELECT * FROM `'.\Config\Database\DBConfig::$tableAddress.'`');
      $addresses = array();
      while ($row = $stmt -> fetch()){
        $addresses[$row['id']] = $row['street'];
      }
      $stmt->closeCursor();
      if($addresses && !empty($addresses)){
        $data['addresses'] = $addresses;
      }
    }
    catch(\PDOException $e)	{
      $data['error'] = \Config\Database\DBErrorName::$query;
    }	
    return $data;
  }  

  public function getAllForSelect(){
    $data = $this->getAll();
    $addresses = array();            
    if(!isset($data['error'])){        
      foreach($data['addresses'] as $address){                  
        $addresses[$address[\Config\Database\DBConfig\Address::$id]] = $address[\Config\Database\DBConfig\Address::$street];
      }
    }
    return $addresses;            
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
    $data['addresses'] = array();
    try	{
      $stmt = $this->pdo->prepare('SELECT * FROM  `'.\Config\Database\DBConfig::$tableAddress.'` WHERE  `'.\Config\Database\DBConfig\Address::$id.'`=:id');   
      $stmt->bindValue(':id', $id, PDO::PARAM_INT); 
      $result = $stmt->execute(); 
      $addresses = $stmt->fetchAll();
      $stmt->closeCursor();
      if($addresses && !empty($addresses)){
        $data['addresses'] = $addresses[0];
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

  public function add($street, $town, $streetNumber, $houseUnitNumber, $postCode, $postOffice) {
            $data = array();
            $data['msg'] = 'OK';
            if($street === null || $town === null || $streetNumber === null || $postCode === null)
            {         
                \Tools\Session::set('message', 'Nieokreślony parametr');    
                return $data;
            }
			try
			{		  
				$stmt = $this -> pdo -> prepare('INSERT INTO `'.\Config\Database\DBConfig::$tableAddress.'` (`'.\Config\Database\DBConfig\Address::$street.'`, `'.\Config\Database\DBConfig\Address::$town.'`, `'.\Config\Database\DBConfig\Address::$streetNumber.'`, `'.\Config\Database\DBConfig\Address::$houseUnitNumber.'`, `'.\Config\Database\DBConfig\Address::$postCode.'`, `'.\Config\Database\DBConfig\Address::$postOffice.'`) VALUES(:street, :town, :streetNumber, :houseUnitNumber, :postCode, :postOffice)');                   

      $stmt -> bindValue(':street', $street, PDO::PARAM_STR);
      $stmt -> bindValue(':town', $town, PDO::PARAM_STR);
      $stmt -> bindValue(':streetNumber', $streetNumber, PDO::PARAM_INT);
      $stmt -> bindValue(':houseUnitNumber', $houseUnitNumber, PDO::PARAM_STR);
      $stmt -> bindValue(':postCode', $postCode, PDO::PARAM_STR);
      $stmt -> bindValue(':postOffice', $postOffice, PDO::PARAM_STR);
      $result = $stmt -> execute();
      $stmt->closeCursor();
			}
			catch(\PDOException $e)
			{
                \Tools\Session::set('message', 'Połączenie z bazą nie powidoło się!');
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
      $stmt = $this->pdo->prepare('DELETE FROM  `'.\Config\Database\DBConfig::$tableAddress.'` WHERE  `'.\Config\Database\DBConfig\Address::$id.'`=:id');   
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

  public function update($id, $street, $town, $streetNumber, $houseUnitNumber, $postCode, $postOffice){
    $data = array();
    /*****/if($this->pdo === null){
      $data['error'] = \Config\Database\DBErrorName::$connection;
      return $data;
    } else if($id === null || $street === null || $town === null || $streetNumber === null || $postCode === null){
      $data['error'] = \Config\Database\DBErrorName::$empty;
      return $data;
    }
    try	{
      $stmt = $this->pdo->prepare('UPDATE  `'.\Config\Database\DBConfig::$tableAddress.'` SET
                `'.\Config\Database\DBConfig\Address::$street.'`=:street, `'.\Config\Database\DBConfig\Address::$town.'`=:town, `'.\Config\Database\DBConfig\Address::$streetNumber.'`=:streetNumber, `'.\Config\Database\DBConfig\Address::$houseUnitNumber.'`=:houseUnitNumber, `'.\Config\Database\DBConfig\Address::$postCode.'`=:postCode, `'.\Config\Database\DBConfig\Address::$postOffice.'`=:postOffice WHERE `'.\Config\Database\DBConfig\Address::$id.'`=:id');

      $stmt->bindValue(':id', $id, PDO::PARAM_INT);
      $stmt -> bindValue(':street', $street, PDO::PARAM_STR);
      $stmt -> bindValue(':town', $town, PDO::PARAM_STR);
      $stmt -> bindValue(':streetNumber', $streetNumber, PDO::PARAM_INT);
      $stmt -> bindValue(':houseUnitNumber', $houseUnitNumber, PDO::PARAM_STR);
      $stmt -> bindValue(':postCode', $postCode, PDO::PARAM_STR);
      $stmt -> bindValue(':postOffice', $postOffice, PDO::PARAM_STR);
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
