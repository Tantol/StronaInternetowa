<?php
	namespace Models;
	use \PDO;
	class Access extends Model {
		public function login($login, $password){
			//tutaj powinno nastąpić weryfikacja podanych danych
			//z tymi zapisanymi w bazie
			
			if($this->pdo === null){
                $data['error'] = \Config\Database\DBErrorName::$connection;
                return $data;
            }
            $data = array();
            $data['User'] = array();
            try	{
                $stmt = $this->pdo->prepare('SELECT * FROM '.\Config\Database\DBConfig::$tableUser.' WHERE '
				.\Config\Database\DBConfig\User::$login.' =:login');
				$stmt->bindValue(':login', $login, PDO::PARAM_STR);
                $stmt->execute();
				$User = $stmt->fetch();
                $stmt->closeCursor();
                if($User && !empty($User))
                    $data['User'] = $User;
            }
            catch(\PDOException $e)	{
                $data['error'] = \Config\Database\DBErrorName::$query;
            }
			if($User['password'] == $password && $password != '')
			{
				//zainicjalizowanie sesji
				\Tools\Access::login($login);
                return $data;
			}
            $data['error'] = \Config\Website\ErrorName::$wrongdata;
			return $data;
		}	
		public function logout(){
			\Tools\Access::logout();
		}
	}
