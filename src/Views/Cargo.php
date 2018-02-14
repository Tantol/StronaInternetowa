<?php
namespace Views;

class Cargo extends View {
  
  public function index(){
    $model = $this->getModel('Cargo');
    if($model){
      $data = $model->getAll();
      $this->set('cargo', $data['cargo']);
    }
    
      $model = $this->getModel('LoadOrd');
      $data = $model->getAll();
      $this->set('loadOrd', $data['loadOrd']);
      
      $model = $this->getModel('Address');
      $data = $model->getAll();
      $this->set('addressStart', $data['addresses']);
      
      $model = $this->getModel('Address');
      $data = $model->getAll();
      $this->set('addressEnd', $data['addresses']);
      
      $model = $this->getModel('Category');
      $data = $model->getAll();
      $this->set('category', $data['categories']);
    
    if(isset($data['error'])){
      $this->set('error', $data['error']);
    }
    
    $this->set('customScript', array('datatables.min', 'table.min'));
    $this->render('CargoGetAll');
  }
  
  public function addform(){
    $this->set('customScript', 'CargoFormCheck');
    $this->render('CargoAddForm');
  }
  
  public function editform($id){
    $model = $this->getModel('Cargo');
    if($model) {
      $data = $model->getOne($id);
      if(isset($data['cargo']))
        $this->set('cargo', $data['cargo']);
      if(isset($data['error']))
        $this->set('error', $data['error']);
      $this->set('customScript', 'CargoFormCheck');
      
      $model = $this->getModel('LoadOrd');
      $data = $model->getAll();
      $this->set('loadOrd', $data['loadOrd']);
      
      $model = $this->getModel('Address');
      $data = $model->getAll();
      $this->set('addressStart', $data['addresses']);
      
      $model = $this->getModel('Address');
      $data = $model->getAll();
      $this->set('addressEnd', $data['addresses']);
      
      $model = $this->getModel('Category');
      $data = $model->getAll();
      $this->set('category', $data['categories']);
      
      $this->render('CargoEditForm'); 
      return true;
    }
    return false;
  }    
  
}


