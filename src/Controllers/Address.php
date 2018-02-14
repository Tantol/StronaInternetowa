<?php
namespace Controllers;

class Address extends Controller {

  public function index(){
    $view = $this->getView('Address');
    $view->index();
  }

  public function addform(){                    
    $view = $this->getView('Address');
    $view->addform();
  }
  
  public function add(){
    \Tools\Session::set('message', 'tessst');
    $accessController = new \Controllers\Access();
    if ($accessController->islogin()){
    $model = $this->getModel('Address');
    $data = $model->add($_POST['street'], $_POST['town'], $_POST['streetNumber'], $_POST['houseUnitNumber'], $_POST['postCode'], $_POST['postOffice']);

    /*****/if(isset($data['error'])){
      \Tools\Session::set('error', $data['error']);
    } else if(isset($data['message'])){
      \Tools\Session::set('message', $data['message']);
    } else if(isset($data['msg'])){
      $this->set('message', $data['msg']);
    }
    $this->redirect('Address/');
    } else {
      \Tools\Session::set('message', \Config\Website\MessageName::$mustlogin);
      $this->redirect('Address');
    }
  }

  public function delete($id){
    $accessController = new \Controllers\Access();
    if ($accessController->islogin()){
    $model=$this->getModel('Address'); 
    $data = $model->delete($id);

    /*****/if(isset($data['error'])){
      \Tools\Session::set('error', $data['error']);
    } else if(isset($data['message'])){
      \Tools\Session::set('message', $data['message']);
    }
    $this->redirect('Address/');
    } else {
      \Tools\Session::set('message', \Config\Website\MessageName::$mustlogin);
      $this->redirect('Address');
    }
  }

  public function editform($id){
    $accessController = new \Controllers\Access();
    if ($accessController->islogin()){
    if(isset($data['error'])){
      \Tools\Session::set('error', $data['error']);
      $this->redirect('Address/');
    }
    $view = $this->getView('Address');
    $view->editform($id);
      } else {
      \Tools\Session::set('message', \Config\Website\MessageName::$mustlogin);
      $this->redirect('Address');
    }
  }

  public function update(){
    $accessController = new \Controllers\Access();
    if ($accessController->islogin()){
    $model=$this->getModel('Address');
    $data = $model->update($_POST['id'], $_POST['street'], $_POST['town'], $_POST['streetNumber'], $_POST['houseUnitNumber'], $_POST['postCode'], $_POST['postOffice']);
    
    /******/if(isset($data['error'])){
      \Tools\Session::set('error', $data['error']);
    } else if(isset($data['message'])){
      \Tools\Session::set('message', $data['message']);
    }
    $this->redirect('Address/');
    } else {
      \Tools\Session::set('message', \Config\Website\MessageName::$mustlogin);
      $this->redirect('Address');
    }
  }


}