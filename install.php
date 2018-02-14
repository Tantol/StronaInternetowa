<!doctype html>
<html lang="pl">
<head>
  <meta charset="utf-8">
  <title>Instalacja</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
  require 'vendor/autoload.php';

  use Config\Database\DBConfig as DB;
  use Config\Database\DBConnection as DBConnection;

  DBConnection::setDBConnection(DB::$user,DB::$password, 
              DB::$hostname, DB::$databaseType, DB::$port);	
  try {
      $pdo =  DBConnection::getHandle();
  }catch(\PDOException $e){
      echo \Config\Database\DBErrorName::$connection;
      exit(1);
  }    
  /*
      delete old tables from db   
  */

  // delete table cargo
  $query = 'DROP TABLE IF EXISTS `'.DB::$tableCargo.'`';
  try { 
    $pdo->exec($query);
  }
  catch(PDOException $e) {
      echo \Config\Database\DBErrorName::$delete_table.DB::$tableCargo;
  }
  // delete table LoadOrd
  $query = 'DROP TABLE IF EXISTS `'.DB::$tableLoadOrd.'`';
  try { 
    $pdo->exec($query);
  }
  catch(PDOException $e) {
      echo \Config\Database\DBErrorName::$delete_table.DB::$tableLoadOrd;
  }
  // delete table category
  $query = 'DROP TABLE IF EXISTS `'.DB::$tableCategory.'`';
  try { 
    $pdo->exec($query);
  }
  catch(PDOException $e) {
      echo \Config\Database\DBErrorName::$delete_table.DB::$tableCategory;
  }
  // delete table user
  $query = 'DROP TABLE IF EXISTS `'.DB::$tableUser.'`';
  try { 
    $pdo->exec($query);
  }
  catch(PDOException $e) {
      echo \Config\Database\DBErrorName::$delete_table.DB::$tableUser;
  }
  // delete table client
  $query = 'DROP TABLE IF EXISTS `'.DB::$tableClient.'`';
  try { 
    $pdo->exec($query);
  }
  catch(PDOException $e) {
      echo \Config\Database\DBErrorName::$delete_table.DB::$tableClient;
  }   
  // delete table worker
  $query = 'DROP TABLE IF EXISTS `'.DB::$tableWorker.'`';
  try { 
    $pdo->exec($query);
  }
  catch(PDOException $e) {
      echo \Config\Database\DBErrorName::$delete_table.DB::$tableWorker;
  } 
  // delete table contact details
  $query = 'DROP TABLE IF EXISTS `'.DB::$tableContactDetails.'`';
  try { 
    $pdo->exec($query);
  }
  catch(PDOException $e) {
      echo \Config\Database\DBErrorName::$delete_table.DB::$tableContactDetails;
  }
  // delete table address
  $query = 'DROP TABLE IF EXISTS `'.DB::$tableAddress.'`';
  try { 
    $pdo->exec($query);
  }
  catch(PDOException $e) {
      echo \Config\Database\DBErrorName::$delete_table.DB::$tableAddress;
  } 
  /*
      create new tables
  */
  // create table category
  $query = 'CREATE TABLE IF NOT EXISTS `'.DB::$tableCategory.'` (
      `'.DB\Category::$id.'` INT AUTO_INCREMENT, 
      `'.DB\Category::$name.'` VARCHAR(30) NOT NULL,
      PRIMARY KEY ('.DB\Category::$id.')) ENGINE=InnoDB;';
  try
  {
      $pdo->exec($query);
  }
  catch(PDOException $e)
  {
      echo \Config\Database\DBErrorName::$create_table.DB::$tableCategory;
  }
  // create table address
  $query = 'CREATE TABLE IF NOT EXISTS `'.DB::$tableAddress.'` (
      `'.DB\Address::$id.'` INT AUTO_INCREMENT, 
      `'.DB\Address::$street.'` VARCHAR(50) NOT NULL,
      `'.DB\Address::$town.'` VARCHAR(50) NOT NULL,
      `'.DB\Address::$streetNumber.'` INT NOT NULL,
      `'.DB\Address::$houseUnitNumber.'` VARCHAR(10) NULL,
      `'.DB\Address::$postCode.'` CHAR(6) NOT NULL,
      `'.DB\Address::$postOffice.'` VARCHAR(50) NULL,
      PRIMARY KEY ('.DB\Address::$id.')) ENGINE=InnoDB;';
  try
  {
      $pdo->exec($query);
  }
  catch(PDOException $e)
  {
      echo \Config\Database\DBErrorName::$create_table.DB::$tableAddress;
  }
  // create table contact details
  $query = 'CREATE TABLE IF NOT EXISTS `'.DB::$tableContactDetails.'` (
      `'.DB\ContactDetails::$id.'` INT AUTO_INCREMENT, 
      `'.DB\ContactDetails::$telephoneNumber.'` VARCHAR(30) NOT NULL,
      `'.DB\ContactDetails::$fax.'` VARCHAR(30) NOT NULL,
      `'.DB\ContactDetails::$contactAddressId.'` INT NOT NULL,
      PRIMARY KEY ('.DB\ContactDetails::$id.'),
      FOREIGN KEY ('.DB\ContactDetails::$contactAddressId.') REFERENCES '.DB::$tableAddress.'('.DB\Address::$id.') ON DELETE CASCADE
      ) ENGINE=InnoDB;';
  try
  {
      $pdo->exec($query);
  }
  catch(PDOException $e)
  {
      echo \Config\Database\DBErrorName::$create_table.DB::$tableContactDetails;
  }
  // create table client
  $query = 'CREATE TABLE IF NOT EXISTS `'.DB::$tableClient.'` (
      `'.DB\Client::$id.'` INT AUTO_INCREMENT, 
      `'.DB\Client::$firstName.'` VARCHAR(30) NOT NULL,
      `'.DB\Client::$lastName.'` VARCHAR(40) NOT NULL,
      `'.DB\Client::$PIN.'` INT NOT NULL,
      `'.DB\Client::$addressId.'` INT NOT NULL,
      `'.DB\Client::$contactDetailsId.'` INT NOT NULL,
      PRIMARY KEY ('.DB\Client::$id.'),
      FOREIGN KEY ('.DB\Client::$addressId.') REFERENCES '.DB::$tableAddress.'('.DB\Address::$id.') ON DELETE CASCADE,
      FOREIGN KEY ('.DB\Client::$contactDetailsId.') REFERENCES '.DB::$tableContactDetails.'('.DB\ContactDetails::$id.') ON DELETE CASCADE
      ) ENGINE=InnoDB;';
  try
  {
      $pdo->exec($query);
  }
  catch(PDOException $e)
  {
      echo \Config\Database\DBErrorName::$create_table.DB::$tableClient;
  }
  // create table worker
  $query = 'CREATE TABLE IF NOT EXISTS `'.DB::$tableWorker.'` (
      `'.DB\Worker::$id.'` INT AUTO_INCREMENT, 
      `'.DB\Worker::$firstName.'` VARCHAR(30) NOT NULL,
      `'.DB\Worker::$lastName.'` VARCHAR(40) NOT NULL,
      `'.DB\Worker::$PIN.'` INT NOT NULL,
      `'.DB\Worker::$addressId.'` INT NOT NULL,
      `'.DB\Worker::$contactDetailsId.'` INT NOT NULL,
      `'.DB\Worker::$job.'` varchar(10) NOT NULL,
      PRIMARY KEY ('.DB\Worker::$id.'),
      FOREIGN KEY ('.DB\Worker::$addressId.') REFERENCES '.DB::$tableAddress.'('.DB\Address::$id.') ON DELETE CASCADE,
      FOREIGN KEY ('.DB\Worker::$contactDetailsId.') REFERENCES '.DB::$tableContactDetails.'('.DB\ContactDetails::$id.') ON DELETE CASCADE
      ) ENGINE=InnoDB;';
  try
  {
      $pdo->exec($query);
  }
  catch(PDOException $e)
  {
      echo \Config\Database\DBErrorName::$create_table.DB::$tableWorker;
  }
  // create table user
  $query = 'CREATE TABLE IF NOT EXISTS `'.DB::$tableUser.'` (
      `'.DB\User::$id.'` INT NOT NULL AUTO_INCREMENT,
      `'.DB\User::$login.'` VARCHAR(30) NOT NULL,
      `'.DB\User::$email.'` VARCHAR(40) NOT NULL,
      `'.DB\User::$password.'` VARCHAR(50) NOT NULL,
      `'.DB\User::$registerDate.'` DATETIME NOT NULL,
      `'.DB\User::$clientId.'` INT NULL,
      `'.DB\User::$workerId.'` INT NULL,
      PRIMARY KEY ('.DB\User::$id.'),
      FOREIGN KEY ('.DB\User::$clientId.') REFERENCES '.DB::$tableClient.'('.DB\Client::$id.') ON DELETE CASCADE,
      FOREIGN KEY ('.DB\User::$workerId.') REFERENCES '.DB::$tableWorker.'('.DB\Worker::$id.') ON DELETE CASCADE
      ) ENGINE=InnoDB;';    
  try
  {
      $pdo->exec($query);
  }
  catch(PDOException $e)
  {
      echo \Config\Database\DBErrorName::$create_table.DB::$tableUser;
  }	
  // create table LoadOrd
  $query = 'CREATE TABLE IF NOT EXISTS `'.DB::$tableLoadOrd.'` (
      `'.DB\LoadOrd::$id.'` INT AUTO_INCREMENT, 
      `'.DB\LoadOrd::$clientId.'` INT NOT NULL,
      `'.DB\LoadOrd::$moverId.'` INT NOT NULL,
      `'.DB\LoadOrd::$inclusivePrice.'` INT NOT NULL,
      `'.DB\LoadOrd::$note.'` VARCHAR(50) NULL,
      PRIMARY KEY ('.DB\LoadOrd::$id.'),
      FOREIGN KEY ('.DB\LoadOrd::$clientId.') REFERENCES '.DB::$tableClient.'('.DB\Client::$id.') ON DELETE CASCADE,
      FOREIGN KEY ('.DB\LoadOrd::$moverId.') REFERENCES '.DB::$tableWorker.'('.DB\Worker::$id.') ON DELETE CASCADE
      ) ENGINE=InnoDB;';
  try
  {
      $pdo->exec($query);
  }
  catch(PDOException $e)
  {
      echo \Config\Database\DBErrorName::$create_table.DB::$tableLoadOrd;
  }
  // create table cargo
  $query = 'CREATE TABLE IF NOT EXISTS `'.DB::$tableCargo.'` (
      `'.DB\Cargo::$id.'` INT AUTO_INCREMENT, 
      `'.DB\Cargo::$loadOrdId.'` INT NOT NULL,
      `'.DB\Cargo::$driverId.'` INT NOT NULL,
      `'.DB\Cargo::$startAddressId.'` INT NOT NULL,
      `'.DB\Cargo::$endAddressId.'` INT NOT NULL,
      `'.DB\Cargo::$price.'` INT NOT NULL,
      `'.DB\Cargo::$categoryId.'` INT NOT NULL,
      `'.DB\Cargo::$note.'` VARCHAR(100) NULL,
      PRIMARY KEY ('.DB\Cargo::$id.'),
      FOREIGN KEY ('.DB\Cargo::$driverId.') REFERENCES '.DB::$tableWorker.'('.DB\Worker::$id.') ON DELETE CASCADE,
      FOREIGN KEY ('.DB\Cargo::$startAddressId.') REFERENCES '.DB::$tableAddress.'('.DB\Address::$id.') ON DELETE CASCADE,
      FOREIGN KEY ('.DB\Cargo::$endAddressId.') REFERENCES '.DB::$tableAddress.'('.DB\Address::$id.') ON DELETE CASCADE,
      FOREIGN KEY ('.DB\Cargo::$categoryId.') REFERENCES '.DB::$tableCategory.'('.DB\Category::$id.') ON DELETE CASCADE,
      FOREIGN KEY ('.DB\Cargo::$loadOrdId.') REFERENCES '.DB::$tableLoadOrd.'('.DB\LoadOrd::$id.') ON DELETE CASCADE
      ) ENGINE=InnoDB;';
  try
  {
      $pdo->exec($query);
  }
  catch(PDOException $e)
  {
      echo \Config\Database\DBErrorName::$create_table.DB::$tableCargo;
  }
  /*
      push data to tables
  */  
  // push to User
  $usersArray = array();
    // -> first pushing clients and workers
    $clientsArray = array();
    $workersArray = array();
      // -> first pushing client / worker address and contactDetails
      $addressesArray = array();
      $contactDetailsArray = array();
  
    // push client
      // push client address
      $addressesArray[] = array(
                                'street' => 'kwiatowa',
                                'town' => 'warszawa',
                                'streetNumber' => '12',
                                'houseUnitNumber' => '1B',
                                'postCode' => '66-666',
                                'postOffice' => 'warszawa');
      // push client contact details 
      $contactDetailsArray[] = array(
                                    'telephoneNumber' => '+48 445 456 123',
                                    'fax' => '445 778 111',
                                    'contactAddressId' => '1');
    // push client to array
    $clientsArray[] = array(
                      'firstName' => 'Jan',
                      'lastName' => 'Kowalski',
                      'pin' => '6546579',
                      'addressId' => '1',
                      'contactDetailsId' => '1');
  // push client to users array
  $usersArray[] = array(
                        'login' => 'janKowalski',
                        'email' => 'janKowalski@nieznan.xy',
                        'password' => '123',
                        'registerDate' => '2017-10-22 19:53:02',
                        'clientId' => '1',
                        'workerId' => NULL);
  
    // push worker (mover)
      // push worker address
      $addressesArray[] = array(
                                'street' => 'jalowa',
                                'town' => 'kalisz',
                                'streetNumber' => '1',
                                'houseUnitNumber' => '3A',
                                'postCode' => '77-777',
                                'postOffice' => 'kalisz');
      // push worker contact details 
      $contactDetailsArray[] = array(
                                    'telephoneNumber' => '+48 111 422 123',
                                    'fax' => '434 728 111',
                                    'contactAddressId' => '2');
    // push worker to array
    $workersArray[] = array(
                      'firstName' => 'Rafal',
                      'lastName' => 'Nowak',
                      'pin' => '5811548',
                      'addressId' => '2',
                      'contactDetailsId' => '2',
                      'job' => 'mover');
  
  
  // push worker to users array
  $usersArray[] = array(
                        'login' => 'rafalNowak',
                        'email' => 'rafalNowak@nieznan.xy',
                        'password' => '123',
                        'registerDate' => '2017-10-22 19:53:02',
                        'clientId' => NULL,
                        'workerId' => '1');
  
    // push worker (driver)
      // push worker address
      $addressesArray[] = array(
                                'street' => 'inna',
                                'town' => 'walbrzych',
                                'streetNumber' => '3',
                                'houseUnitNumber' => '4C',
                                'postCode' => '11-111',
                                'postOffice' => 'wal');
      // push worker contact details 
      $contactDetailsArray[] = array(
                                    'telephoneNumber' => '+48 222 422 123',
                                    'fax' => '222 728 111',
                                    'contactAddressId' => '3');
    // push worker to array
    $workersArray[] = array(
                      'firstName' => 'Zbigniew',
                      'lastName' => 'Cebula',
                      'pin' => '48796451',
                      'addressId' => '3',
                      'contactDetailsId' => '3',
                      'job' => 'driver');
  // push worker to users array
  $usersArray[] = array(
                        'login' => 'zbigniewCebula',
                        'email' => 'zbigniewCebula@nieznan.xy',
                        'password' => '123',
                        'registerDate' => '2017-10-22 19:53:02',
                        'clientId' => NULL,
                        'workerId' => '2');
  
  // push category
  $categoriesArray = array();
  $categoriesArray[] = array(
                            'name' => 'szklo');
  $categoriesArray[] = array(
                            'name' => 'materialy wybuchowe');
  
  // push LoadOrd
  $LoadOrdsArray = array();
  $LoadOrdsArray[] = array(
                        'clientId' => '1',
                        'moverId' => '1',
                        'inclusivePrice' => '10',
                        'note' => 'uwaga_na');
  // push cargo
  $cargosArray = array();
  $cargosArray[] = array(
                      'loadOrdId' => '1',
                      'driverId' => '2',
                      'startAddressId' => '1',
                      'endAddressId' => '2',
                      'price' => '200',
                      'categoryId' => '1',
                      'note' => 'uwaga na palete nr 2');
    $cargosArray[] = array(
                      'loadOrdId' => '1',
                      'driverId' => '2',
                      'startAddressId' => '2',
                      'endAddressId' => '3',
                      'price' => '500',
                      'categoryId' => '2',
                      'note' => 'uwaga na palete nr 5');

  // execute addresses
  try
  {
      $stmt = $pdo -> prepare('INSERT INTO `'.DB::$tableAddress.'` (`'.DB\Address::$street.'`, `'.DB\Address::$town.'`, `'.DB\Address::$streetNumber.'`, `'.DB\Address::$houseUnitNumber.'`, `'.DB\Address::$postCode.'`, `'.DB\Address::$postOffice.'`) VALUES(:street, :town, :streetNumber, :houseUnitNumber, :postCode, :postOffice)');	
      foreach($addressesArray as $addressesArray)
      {
          //strval($float), nie ma typu PDO::PARAM_FLOAT
          $stmt -> bindValue(':street', $addressesArray['street'], PDO::PARAM_STR);
          $stmt -> bindValue(':town', $addressesArray['town'], PDO::PARAM_STR);
          $stmt -> bindValue(':streetNumber', $addressesArray['streetNumber'], PDO::PARAM_INT);
          $stmt -> bindValue(':houseUnitNumber', $addressesArray['houseUnitNumber'], PDO::PARAM_STR);
          $stmt -> bindValue(':postCode', $addressesArray['postCode'], PDO::PARAM_STR);
          $stmt -> bindValue(':postOffice', $addressesArray['postOffice'], PDO::PARAM_STR);
          $stmt -> execute(); 
      }
  }
  catch(PDOException $e)
  {
      echo \Config\Database\DBErrorName::$noadd;
  }
  // execute contact details
  try
  {
      $stmt = $pdo -> prepare('INSERT INTO `'.DB::$tableContactDetails.'` (`'.DB\ContactDetails::$telephoneNumber.'`, `'.DB\ContactDetails::$fax.'`, `'.DB\ContactDetails::$contactAddressId.'`) VALUES(:telephoneNumber, :fax, :contactAddressId)');	
      foreach($contactDetailsArray as $contactDetailsArray)
      {
          //strval($float), nie ma typu PDO::PARAM_FLOAT
          $stmt -> bindValue(':telephoneNumber', $contactDetailsArray['telephoneNumber'], PDO::PARAM_STR);
          $stmt -> bindValue(':fax', $contactDetailsArray['fax'], PDO::PARAM_STR);
          $stmt -> bindValue(':contactAddressId', $contactDetailsArray['contactAddressId'], PDO::PARAM_INT);
          $stmt -> execute(); 
      }
  }
  catch(PDOException $e)
  {
      echo \Config\Database\DBErrorName::$noadd;
  } 
  // execute clients
  try
  {
      $stmt = $pdo -> prepare('INSERT INTO `'.DB::$tableClient.'` (`'.DB\Client::$firstName.'`, `'.DB\Client::$lastName.'`, `'.DB\Client::$PIN.'`, `'.DB\Client::$addressId.'`, `'.DB\Client::$contactDetailsId.'`) VALUES(:firstName, :lastName, :pin, :addressId, :contactDetailsId)');	
      foreach($clientsArray as $clientsArray)
      {
          //strval($float), nie ma typu PDO::PARAM_FLOAT
          $stmt -> bindValue(':firstName', $clientsArray['firstName'], PDO::PARAM_STR);
          $stmt -> bindValue(':lastName', $clientsArray['lastName'], PDO::PARAM_STR);
          $stmt -> bindValue(':pin', $clientsArray['pin'], PDO::PARAM_INT);
          $stmt -> bindValue(':addressId', $clientsArray['addressId'], PDO::PARAM_INT);
          $stmt -> bindValue(':contactDetailsId', $clientsArray['contactDetailsId'], PDO::PARAM_INT);
          $stmt -> execute(); 
      }
  }
  catch(PDOException $e)
  {
      echo \Config\Database\DBErrorName::$noadd;
  }
  // execute workers
  try
  {
      $stmt = $pdo -> prepare('INSERT INTO `'.DB::$tableWorker.'` (`'.DB\Worker::$firstName.'`, `'.DB\Worker::$lastName.'`, `'.DB\Worker::$PIN.'`, `'.DB\Worker::$addressId.'`, `'.DB\Worker::$contactDetailsId.'`, `'.DB\Worker::$job.'`) VALUES(:firstName, :lastName, :pin, :addressId, :contactDetailsId, :job)');	
      foreach($workersArray as $workersArray)
      {
          //strval($float), nie ma typu PDO::PARAM_FLOAT
          $stmt -> bindValue(':firstName', $workersArray['firstName'], PDO::PARAM_STR);
          $stmt -> bindValue(':lastName', $workersArray['lastName'], PDO::PARAM_STR);
          $stmt -> bindValue(':pin', $workersArray['pin'], PDO::PARAM_INT);
          $stmt -> bindValue(':addressId', $workersArray['addressId'], PDO::PARAM_INT);
          $stmt -> bindValue(':contactDetailsId', $workersArray['contactDetailsId'], PDO::PARAM_INT);
          $stmt -> bindValue(':job', $workersArray['job'], PDO::PARAM_INT);
          $stmt -> execute(); 
      }
  }
  catch(PDOException $e)
  {
      echo \Config\Database\DBErrorName::$noadd;
  }
  // execute users
  try
  {
      $stmt = $pdo -> prepare('INSERT INTO `'.DB::$tableUser.'` (`'.DB\User::$login.'`, `'.DB\User::$email.'`, `'.DB\User::$password.'`, `'.DB\User::$registerDate.'`, `'.DB\User::$clientId.'`, `'.DB\User::$workerId.'`) VALUES(:login, :email, :password, :registerDate, :clientId, :workerId)');	
      foreach($usersArray as $usersArray)
      {
          //strval($float), nie ma typu PDO::PARAM_FLOAT
          $stmt -> bindValue(':login', $usersArray['login'], PDO::PARAM_STR);
          $stmt -> bindValue(':email', $usersArray['email'], PDO::PARAM_STR);
          $stmt -> bindValue(':password', $usersArray['password'], PDO::PARAM_STR);
          $stmt -> bindValue(':registerDate', $usersArray['registerDate'], PDO::PARAM_STR);
          $stmt -> bindValue(':clientId', $usersArray['clientId'], PDO::PARAM_INT);
          $stmt -> bindValue(':workerId', $usersArray['workerId'], PDO::PARAM_INT);
          $stmt -> execute(); 
      }
  }
  catch(PDOException $e)
  {
      echo \Config\Database\DBErrorName::$noadd;
      echo $e;
  }
  // execute categories
  try
  {
      $stmt = $pdo -> prepare('INSERT INTO `'.DB::$tableCategory.'` (`'.DB\Category::$name.'`) VALUES(:name)');	
      foreach($categoriesArray as $categoriesArray)
      {
          //strval($float), nie ma typu PDO::PARAM_FLOAT
          $stmt -> bindValue(':name', $categoriesArray['name'], PDO::PARAM_STR);
          $stmt -> execute(); 
      }
  }
  catch(PDOException $e)
  {
      echo \Config\Database\DBErrorName::$noadd;
  }
  // execute LoadOrd
  try
  {
      $stmt = $pdo -> prepare('INSERT INTO `'.DB::$tableLoadOrd.'` (`'.DB\LoadOrd::$clientId.'`, `'.DB\LoadOrd::$moverId.'`, `'.DB\LoadOrd::$inclusivePrice.'`, `'.DB\LoadOrd::$note.'`) VALUES(:clientId, :moverId, :inclusivePrice, :note)');	
      foreach($LoadOrdsArray as $LoadOrdsArray)
      {
          //strval($float), nie ma typu PDO::PARAM_FLOAT
          $stmt -> bindValue(':clientId', $LoadOrdsArray['clientId'], PDO::PARAM_INT);
          $stmt -> bindValue(':moverId', $LoadOrdsArray['moverId'], PDO::PARAM_INT);
          $stmt -> bindValue(':inclusivePrice', $LoadOrdsArray['inclusivePrice'], PDO::PARAM_INT);
          $stmt -> bindValue(':note', $LoadOrdsArray['note'], PDO::PARAM_STR);
          $stmt -> execute(); 
      }
  }
  catch(PDOException $e)
  {
      echo \Config\Database\DBErrorName::$noadd;
  }
  // execute cargo
  try
  {
      $stmt = $pdo -> prepare('INSERT INTO `'.DB::$tableCargo.'` (`'.DB\Cargo::$loadOrdId.'`, `'.DB\Cargo::$driverId.'`, `'.DB\Cargo::$startAddressId.'`, `'.DB\Cargo::$endAddressId.'`, `'.DB\Cargo::$price.'`, `'.DB\Cargo::$categoryId.'`, `'.DB\Cargo::$note.'`) VALUES(:loadOrdId, :driverId, :startAddressId, :endAddressId, :price, :categoryId, :note)');	
      foreach($cargosArray as $cargosArray)
      {
          //strval($float), nie ma typu PDO::PARAM_FLOAT
          $stmt -> bindValue(':loadOrdId', $cargosArray['loadOrdId'], PDO::PARAM_INT);
          $stmt -> bindValue(':driverId', $cargosArray['driverId'], PDO::PARAM_INT);
          $stmt -> bindValue(':startAddressId', $cargosArray['startAddressId'], PDO::PARAM_INT);
          $stmt -> bindValue(':endAddressId', $cargosArray['endAddressId'], PDO::PARAM_INT);
          $stmt -> bindValue(':price', $cargosArray['price'], PDO::PARAM_INT);
          $stmt -> bindValue(':categoryId', $cargosArray['categoryId'], PDO::PARAM_INT);
          $stmt -> bindValue(':note', $cargosArray['note'], PDO::PARAM_STR);
          $stmt -> execute(); 
      }
  }
  catch(PDOException $e)
  {
      echo \Config\Database\DBErrorName::$noadd;
  }
  echo "<b>Instalacja aplikacji zakończona!</b>"
?>
</body>
</html>