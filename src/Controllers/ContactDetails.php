<?php
namespace Controllers;

class ContactDetails extends Controller {

  public function index(){
    $view = $this->getView('ContactDetails');
    $view->index();
  }

  public function addform(){
    $accessController = new \Controllers\Access();
    $accessController->islogin();
    
    $view = $this->getView('ContactDetails');
    $view->addform();
  }
  
  public function add(){
    $accessController = new \Controllers\Access();
    if ($accessController->islogin()){
    $model = $this->getModel('ContactDetails');
    $data = $model->add($_POST['telephoneNumber'], $_POST['fax'], $_POST['contactAddressId']);

    /*****/if(isset($data['error'])){
      \Tools\Session::set('error', $data['error']);
    } else if(isset($data['message'])){
      \Tools\Session::set('message', $data['message']);
    }

    $this->redirect('ContactDetails/');
    } else {
      \Tools\Session::set('message', \Config\Website\MessageName::$mustlogin);
      $this->redirect('ContactDetails');
    }
  }

  public function delete($id){
    $accessController = new \Controllers\Access();
    if ($accessController->islogin()){
    $model=$this->getModel('ContactDetails'); 
    $data = $model->delete($id);

    /*****/if(isset($data['error'])){
      \Tools\Session::set('error', $data['error']);
    } else if(isset($data['message'])){
      \Tools\Session::set('message', $data['message']);
    }

    $this->redirect('ContactDetails/');
    } else {
      \Tools\Session::set('message', \Config\Website\MessageName::$mustlogin);
      $this->redirect('ContactDetails');
    }
  }

  public function editform($id){
    $accessController = new \Controllers\Access();
    if ($accessController->islogin()){
    if(isset($data['error'])){
      \Tools\Session::set('error', $data['error']);
      $this->redirect('ContactDetails/');
    }
    $view = $this->getView('ContactDetails');
    $view->editform($id);
    } else {
      \Tools\Session::set('message', \Config\Website\MessageName::$mustlogin);
      $this->redirect('ContactDetails');
    }
  }

  public function update(){
    $accessController = new \Controllers\Access();
    if ($accessController->islogin()){
    $model=$this->getModel('ContactDetails');
    $data = $model->update($_POST['id'], $_POST['telephoneNumber'], $_POST['fax'], $_POST['contactAddressId']);
    
    /******/if(isset($data['error'])){
      \Tools\Session::set('error', $data['error']);
    } else if(isset($data['message'])){
      \Tools\Session::set('message', $data['message']);
    }
    
    $this->redirect('ContactDetails/');
    } else {
      \Tools\Session::set('message', \Config\Website\MessageName::$mustlogin);
      $this->redirect('ContactDetails');
    }
  }


}