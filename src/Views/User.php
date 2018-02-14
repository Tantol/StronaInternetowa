<?php
namespace Views;

class User extends View {
  
  public function index(){
    $model = $this->getModel('User');
    
    if($model){
      $data = $model->getAll();
      $this->set('user', $data['user']);
    }
    
    if(isset($data['error'])){
      $this->set('error', $data['error']);
    }
    
    $this->set('customScript', array('datatables.min', 'table.min'));
    $this->render('UserGetAll');
  }
  
  public function addform(){
    $this->set('customScript', 'UserFormCheck');
    $this->render('UserAddForm');
  }
  
  public function editform($id){
    $model = $this->getModel('User');
    if($model) {
      $data = $model->getOne($id);
      if(isset($data['user']))
        $this->set('user', $data['user']);
      if(isset($data['error']))
        $this->set('error', $data['error']);
      $this->set('customScript', 'UserFormCheck');
      $this->render('UserEditForm');
      return true;
    }
    return false;
  }    
  
}


