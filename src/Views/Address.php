<?php
namespace Views;

class Address extends View {
  
  public function index(){
    $model = $this->getModel('Address');
    if ($model){
      $data = $model->getAll();
      $this->set('addresses', $data['addresses']);
    }
    
    if(isset($data['error'])){
      $this->set('error', $data['error']);
    }
    
    if(isset($data['msg'])){
      $this->set('message', $data['msg']);
    }
    if(isset($_SESSION['message'])){
            $this->set('message', $_SESSION['message']);
            \Tools\Session::clear('message');
          }
    $this->set('customScript', array('datatables.min', 'table.min'));
    $this->render('AddressGetAll');
  }
  
  public function addform(){
    $this->set('customScript', 'AddressFormCheck');
    $this->render('AddressAddForm');
  }
  
  public function editform($id){
    $model = $this->getModel('Address');
    if($model) {
      $data = $model->getOne($id);
      if(isset($data['addresses']))
        $this->set('addresses', $data['addresses']);
      if(isset($data['error']))
        $this->set('error', $data['error']);
      $this->set('customScript', 'AddressFormCheck');
      $this->render('AddressEditForm');
      return true;
    }
    return false;
  }    
  
}


