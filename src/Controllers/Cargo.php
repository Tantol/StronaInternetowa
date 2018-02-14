<?php
namespace Controllers;

class Cargo extends Controller {

  public function index(){
    $view = $this->getView('Cargo');
    $view->index();
  }

  public function addform(){
    $accessController = new \Controllers\Access();
    $accessController->islogin();
    
    $view = $this->getView('Cargo');
    $view->addform();
  }
  
  public function add(){
    $accessController = new \Controllers\Access();
    if ($accessController->islogin()){
    $model = $this->getModel('Cargo');
    $data = $model->add($_POST['loadOrdId'], $_POST['driverId'], $_POST['startAddressId'], $_POST['endAddressId'], $_POST['price'], $_POST['categoryId'], $_POST['note']);

    /*****/if(isset($data['error'])){
      \Tools\Session::set('error', $data['error']);
    } else if(isset($data['message'])){
      \Tools\Session::set('message', $data['message']);
    }

    $this->redirect('Cargo/');
    } else {
      \Tools\Session::set('message', \Config\Website\MessageName::$mustlogin);
      $this->redirect('Cargo');
    }
  }

  public function delete($id){
    $accessController = new \Controllers\Access();
    if ($accessController->islogin()){
    $model=$this->getModel('Cargo'); 
    $data = $model->delete($id);

    /*****/if(isset($data['error'])){
      \Tools\Session::set('error', $data['error']);
    } else if(isset($data['message'])){
      \Tools\Session::set('message', $data['message']);
    }

    $this->redirect('Cargo/');
    } else {
      \Tools\Session::set('message', \Config\Website\MessageName::$mustlogin);
      $this->redirect('Cargo');
    }
  }

  public function editform($id){
    $accessController = new \Controllers\Access();
    if ($accessController->islogin()){
    if(isset($data['error'])){
      \Tools\Session::set('error', $data['error']);
      $this->redirect('Cargo/');
    }  
    $view = $this->getView('Cargo');
    $view->editform($id);
    } else {
      \Tools\Session::set('message', \Config\Website\MessageName::$mustlogin);
      $this->redirect('Cargo');
    }
  }

  public function update(){
    $accessController = new \Controllers\Access();
    if ($accessController->islogin()){
    $model=$this->getModel('Cargo');
    $data = $model->update($_POST['id'], $_POST['loadOrdId'], $_POST['driverId'], $_POST['startAddressId'], $_POST['endAddressId'], $_POST['price'], $_POST['categoryId'], $_POST['note']);
    
    /******/if(isset($data['error'])){
      \Tools\Session::set('error', $data['error']);
    } else if(isset($data['message'])){
      \Tools\Session::set('message', $data['message']);
    }
    
    $this->redirect('Cargo/');
    } else {
      \Tools\Session::set('message', \Config\Website\MessageName::$mustlogin);
      $this->redirect('Cargo');
    }
  }


}