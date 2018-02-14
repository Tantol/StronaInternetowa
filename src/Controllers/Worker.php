<?php
namespace Controllers;

class Worker extends Controller {

  public function index(){
    $view = $this->getView('Worker');
    $view->index();
  }

  public function addform(){
    $accessController = new \Controllers\Access();
    $accessController->islogin();
    
    $view = $this->getView('Worker');
    $view->addform();
  }
  
  public function add(){
    $accessController = new \Controllers\Access();
    if ($accessController->islogin()){
    $model = $this->getModel('Worker');
    $data = $model->add($_POST['firstName'], $_POST['lastName'], $_POST['PIN'], $_POST['addressId'], $_POST['contactDetailsId'], $_POST['job']);

    /*****/if(isset($data['error'])){
      \Tools\Session::set('error', $data['error']);
    } else if(isset($data['message'])){
      \Tools\Session::set('message', $data['message']);
    }

    $this->redirect('Worker/');
    } else {
      \Tools\Session::set('message', \Config\Website\MessageName::$mustlogin);
      $this->redirect('Worker');
    }
  }

  public function delete($id){
    $accessController = new \Controllers\Access();
    if ($accessController->islogin()){
    $model=$this->getModel('Worker'); 
    $data = $model->delete($id);

    /*****/if(isset($data['error'])){
      \Tools\Session::set('error', $data['error']);
    } else if(isset($data['message'])){
      \Tools\Session::set('message', $data['message']);
    }

    $this->redirect('Worker/');
    } else {
      \Tools\Session::set('message', \Config\Website\MessageName::$mustlogin);
      $this->redirect('Worker');
    }
  }

  public function editform($id){
    $accessController = new \Controllers\Access();
    if ($accessController->islogin()){
    if(isset($data['error'])){
      \Tools\Session::set('error', $data['error']);
      $this->redirect('Worker/');
    }  
    $view = $this->getView('Worker');
    $view->editform($id);
    } else {
      \Tools\Session::set('message', \Config\Website\MessageName::$mustlogin);
      $this->redirect('Worker');
    }
  }

  public function update(){
    $accessController = new \Controllers\Access();
    if ($accessController->islogin()){
    $model=$this->getModel('Worker');
    $data = $model->update($_POST['id'], $_POST['firstName'], $_POST['lastName'], $_POST['PIN'], $_POST['addressId'], $_POST['contactDetailsId'], $_POST['job']);
    
    /******/if(isset($data['error'])){
      \Tools\Session::set('error', $data['error']);
    } else if(isset($data['message'])){
      \Tools\Session::set('message', $data['message']);
    }
    
    $this->redirect('Worker/');
    } else {
      \Tools\Session::set('message', \Config\Website\MessageName::$mustlogin);
      $this->redirect('Worker');
    }
  }


}