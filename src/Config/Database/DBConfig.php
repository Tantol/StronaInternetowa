<?php
  namespace Config\Database;

  class DBConfig  {
    // data base name
    public static $databaseName = 'piotr';
    // seccurity data
    public static $hostname = 'localhost';
    public static $databaseType = 'mysql';
    public static $port = '3306';
    public static $user = 'piotr';
    public static $password = '1234';
    // tables (...)
    // web accounts
    public static $tableUser = 'User';
    // clients and workers info
    public static $tableClient = 'Client';
    public static $tableWorker = 'Worker';
    public static $tableContactDetails = 'ContactDetails';
    // services
    public static $tableCargo = 'Cargo';
    public static $tableLoadOrd = 'LoadOrd';
    public static $tableCategory = 'Category';
    // (...)
    public static $tableAddress = 'Address';
    


               
        
	}
