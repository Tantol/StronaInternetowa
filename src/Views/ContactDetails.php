<?php
namespace Views;

class ContactDetails extends View {
  
  public function index(){ 
    $model = $this->getModel('ContactDetails');
    
    if($model){
      $data = $model->getAll();
      $this->set('contactDetails', $data['contactDetails']);
    }
    
    $model = $this->getModel('Address');
      $data = $model->getAll();
      $this->set('address', $data['addresses']);
    
    if(isset($data['error'])){
      $this->set('error', $data['error']);
    }
    
    $this->set('customScript', array('datatables.min', 'table.min'));
    $this->render('ContactDetailsGetAll');
  }
  
  public function addform(){
    $this->set('customScript', 'ContactDetailsFormCheck');
    $this->render('ContactDetailsAddForm');
  }
  
  public function editform($id){
    $model = $this->getModel('ContactDetails');
    if($model) {
      $data = $model->getOne($id);
      if(isset($data['contactDetails']))
        $this->set('contactDetails', $data['contactDetails']);
      if(isset($data['error']))
        $this->set('error', $data['error']);
      $this->set('customScript', 'ContactDetailsFormCheck');
      
      $model = $this->getModel('Address');
      $data = $model->getAll();
      $this->set('address', $data['addresses']);
      
      $this->render('ContactDetailsEditForm');
      return true;
    }
    return false;
  }    
  
}


