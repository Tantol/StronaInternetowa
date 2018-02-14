<?php
	namespace Controllers;
	
    class Category extends Controller {
	
		public function index(){
			$view = $this->getView('Category');
            $view->index();
		}
      	
        public function addform(){
            $accessController = new \Controllers\Access();
            $accessController->islogin();
            $view = $this->getView('Category');
			$view->addform();
        }
        public function add(){
            $accessController = new \Controllers\Access();
    if ($accessController->islogin()){
            $model=$this->getModel('Category');
            $data = $model->add($_POST['name']);
            if(isset($data['error']))
                \Tools\Session::set('error', $data['error']);
            if(isset($data['message']))
                \Tools\Session::set('message', $data['message']);
            $this->redirect('Category/');
      } else {
      \Tools\Session::set('message', \Config\Website\MessageName::$mustlogin);
      $this->redirect('Category');
    }
        }
        public function delete($id){
          $accessController = new \Controllers\Access();
    if ($accessController->islogin()){
			if($id !== null)
			{
				//za operację na bazie danych odpowiedzialny jest model
				//tworzymy obiekt modelu i zlecamy usunięcie kategorii
				$model=$this->getModel('Category');
                if($model) {
				    $data = $model->delete($id);
                    //nie przekazano komunikatów o błędzie
                }
				//powiadamiamy odpowiedni widok, że nastąpiła aktualizacja bazy                
				$this->redirect('Category/');
			}
			else
				$this->redirect('Category/');
          } else {
      \Tools\Session::set('message', \Config\Website\MessageName::$mustlogin);
      $this->redirect('Category');
    }
        }
        public function editform($id){
          $accessController = new \Controllers\Access();
    if ($accessController->islogin()){
            if(isset($data['error'])){
                \Tools\Session::set('error', $data['error']);
                $this->redirect('Category/');
            }
            $view = $this->getView('Category');
			$view->editform($id);
      } else {
      \Tools\Session::set('message', \Config\Website\MessageName::$mustlogin);
      $this->redirect('Category');
    }
        }
        public function update(){
          $accessController = new \Controllers\Access();
    if ($accessController->islogin()){
            $model=$this->getModel('Category');
            $data = $model->update($_POST['id'], $_POST['name']);
            if(isset($data['error']))
                \Tools\Session::set('error', $data['error']);
            if(isset($data['message']))
                \Tools\Session::set('message', $data['message']);
            $this->redirect('Category/');
      } else {
      \Tools\Session::set('message', \Config\Website\MessageName::$mustlogin);
      $this->redirect('Category');
    }
        }
            
			
	}
