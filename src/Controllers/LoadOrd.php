<?php
namespace Controllers;

class LoadOrd extends Controller {

  public function index(){
    $view = $this->getView('LoadOrd');
    $view->index();

  }

  public function addform(){
    $accessController = new \Controllers\Access();
    $accessController->islogin();
    
    $view = $this->getView('LoadOrd');
    $view->addform();
  }
  
  public function add(){
    $accessController = new \Controllers\Access();
    if ($accessController->islogin()){
    $model = $this->getModel('LoadOrd');
    $data = $model->add($_POST['clientId'], $_POST['moverId'], $_POST['inclusivePrice'], $_POST['note']);

    /*****/if(isset($data['error'])){
      \Tools\Session::set('error', $data['error']);
    } else if(isset($data['message'])){
      \Tools\Session::set('message', $data['message']);
    }

    $this->redirect('LoadOrd/');
    } else {
      \Tools\Session::set('message', \Config\Website\MessageName::$mustlogin);
      $this->redirect('LoadOrd');
    }
  }

  public function delete($id){
    $accessController = new \Controllers\Access();
    if ($accessController->islogin()){
    $model=$this->getModel('LoadOrd'); 
    $data = $model->delete($id);

    /*****/if(isset($data['error'])){
      \Tools\Session::set('error', $data['error']);
    } else if(isset($data['message'])){
      \Tools\Session::set('message', $data['message']);
    }

    $this->redirect('LoadOrd/');
    } else {
      \Tools\Session::set('message', \Config\Website\MessageName::$mustlogin);
      $this->redirect('LoadOrd');
    }
  }

  public function editform($id){
    $accessController = new \Controllers\Access();
    if ($accessController->islogin()){
    if(isset($data['error'])){
      \Tools\Session::set('error', $data['error']);
      $this->redirect('LoadOrd/');
    }
    $view = $this->getView('LoadOrd');
    $view->editform($id);
    } else {
      \Tools\Session::set('message', \Config\Website\MessageName::$mustlogin);
      $this->redirect('LoadOrd');
    }
  }

  public function update(){
    $accessController = new \Controllers\Access();
    if ($accessController->islogin()){
    $model=$this->getModel('LoadOrd');
    $data = $model->update($_POST['id'], $_POST['clientId'], $_POST['moverId'], $_POST['inclusivePrice'], $_POST['note']);
    
    /******/if(isset($data['error'])){
      \Tools\Session::set('error', $data['error']);
    } else if(isset($data['message'])){
      \Tools\Session::set('message', $data['message']);
    }
    
    $this->redirect('LoadOrd/');
    } else {
      \Tools\Session::set('message', \Config\Website\MessageName::$mustlogin);
      $this->redirect('LoadOrd');
    }
  }


}