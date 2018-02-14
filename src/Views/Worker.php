<?php
namespace Views;

class Worker extends View {
  
  public function index(){  
    $model = $this->getModel('Worker');
    
    if($model){
      $data = $model->getAll();
      $this->set('workers', $data['workers']);
    }
    
    $model = $this->getModel('Address');
      $data = $model->getAll();
      $this->set('address', $data['addresses']);
      
      $model = $this->getModel('ContactDetails');
      $data = $model->getAll();
      $this->set('contactDetails', $data['contactDetails']);
    
    
    if(isset($data['error'])){
      $this->set('error', $data['error']);
    }
    
    $this->set('customScript', array('datatables.min', 'table.min'));
    $this->render('WorkerGetAll');
  }
  
  public function addform(){
    $this->set('customScript', 'WorkerFormCheck');
    $this->render('WorkerAddForm');
  }
  
  public function editform($id){
    $model = $this->getModel('Worker');
    if($model) {
      $data = $model->getOne($id);
      if(isset($data['workers']))
        $this->set('worker', $data['workers']);
      if(isset($data['error']))
        $this->set('error', $data['error']);
      $this->set('customScript', 'WorkerFormCheck');
      
      $model = $this->getModel('Address');
      $data = $model->getAll();
      $this->set('address', $data['addresses']);
      
      $model = $this->getModel('ContactDetails');
      $data = $model->getAll();
      $this->set('contactDetails', $data['contactDetails']);
      
      $this->render('WorkerEditForm');
      return true;
    }
    return false;
  }    
  
}


