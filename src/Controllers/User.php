<?php
namespace Controllers;

class User extends Controller {

  public function index(){
    $view = $this->getView('User');
    $view->index();
  }

  public function addform(){
    $accessController = new \Controllers\Access();
    $accessController->islogin();
    
    $view = $this->getView('User');
    $view->addform();
  }
  
  public function add(){
    $model = $this->getModel('User');
    $data = $model->add($_POST['login'], $_POST['email'], $_POST['password'], $_POST['registerDate'], $_POST['clientId'], $_POST['workerId']);

    /*****/if(isset($data['error'])){
      \Tools\Session::set('error', $data['error']);
    } else if(isset($data['message'])){
      \Tools\Session::set('message', $data['message']);
    }

    $this->redirect('User/');
  }

  public function delete($id){
    $accessController = new \Controllers\Access();
    if ($accessController->islogin()){
    $model=$this->getModel('User'); 
    $data = $model->delete($id);

    /*****/if(isset($data['error'])){
      \Tools\Session::set('error', $data['error']);
    } else if(isset($data['message'])){
      \Tools\Session::set('message', $data['message']);
    }

    $this->redirect('User/'); 
    } else {
      \Tools\Session::set('message', \Config\Website\MessageName::$mustlogin);
      $this->redirect('User');
    }
  }

  public function editform($id){
    $accessController = new \Controllers\Access();
    if ($accessController->islogin()){
    if(isset($data['error'])){
      \Tools\Session::set('error', $data['error']);
      $this->redirect('User/');
    }
    $view = $this->getView('User');
    $view->editform($id);
    } else {
      \Tools\Session::set('message', \Config\Website\MessageName::$mustlogin);
      $this->redirect('User');
    }
  }

  public function update(){
    $accessController = new \Controllers\Access();
    if ($accessController->islogin()){
    $model=$this->getModel('User');
    $data = $model->update($_POST['id'], $_POST['login'], $_POST['email'], $_POST['password'], $_POST['registerDate'], $_POST['clientId'], $_POST['workerId']);
    
    /******/if(isset($data['error'])){
      \Tools\Session::set('error', $data['error']);
    } else if(isset($data['message'])){
      \Tools\Session::set('message', $data['message']);
    }
    
    $this->redirect('User/');
    } else {
      \Tools\Session::set('message', \Config\Website\MessageName::$mustlogin);
      $this->redirect('User');
    }
  }


}