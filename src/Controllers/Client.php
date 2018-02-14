<?php
namespace Controllers;

class Client extends Controller {

  public function index(){
    $view = $this->getView('Client');
    $view->index();
  }

  public function addform(){
    $accessController = new \Controllers\Access();
    $accessController->islogin();
    
    $view = $this->getView('Client');
    $view->addform();
  }
  
  public function add(){
    $accessController = new \Controllers\Access();
    if ($accessController->islogin()){
    $model = $this->getModel('Client');
    $data = $model->add($_POST['firstName'], $_POST['lastName'], $_POST['PIN'], $_POST['addressId'], $_POST['contactDetailsId']);

    /*****/if(isset($data['error'])){
      \Tools\Session::set('error', $data['error']);
    } else if(isset($data['message'])){
      \Tools\Session::set('message', $data['message']);
    }

    $this->redirect('Client/');
    } else {
      \Tools\Session::set('message', \Config\Website\MessageName::$mustlogin);
      $this->redirect('Client');
    }
  }

  public function delete($id){
    $accessController = new \Controllers\Access();
    if ($accessController->islogin()){
    $model=$this->getModel('Client'); 
    $data = $model->delete($id);

    /*****/if(isset($data['error'])){
      \Tools\Session::set('error', $data['error']);
    } else if(isset($data['message'])){
      \Tools\Session::set('message', $data['message']);
    }

    $this->redirect('Client/');
    } else {
      \Tools\Session::set('message', \Config\Website\MessageName::$mustlogin);
      $this->redirect('Client');
  }
  }

  public function editform($id){
    $accessController = new \Controllers\Access();
    if ($accessController->islogin()){
    if(isset($data['error'])){
      \Tools\Session::set('error', $data['error']);
      $this->redirect('?controller=Client&action=getAll');
    }
    $view = $this->getView('Client');
    $view->editform($id);
    } else {
      \Tools\Session::set('message', \Config\Website\MessageName::$mustlogin);
      $this->redirect('Client');
  }
  }

  public function update(){
    $accessController = new \Controllers\Access();
    if ($accessController->islogin()){
    $model=$this->getModel('Client');
    $data = $model->update($_POST['id'], $_POST['firstName'], $_POST['lastName'], $_POST['PIN'], $_POST['addressId'], $_POST['contactDetailsId']);
    
    /******/if(isset($data['error'])){
      \Tools\Session::set('error', $data['error']);
    } else if(isset($data['message'])){
      \Tools\Session::set('message', $data['message']);
    }
    
    $this->redirect('Client/');
    } else {
      \Tools\Session::set('message', \Config\Website\MessageName::$mustlogin);
      $this->redirect('Client');
        
  }
  }


}