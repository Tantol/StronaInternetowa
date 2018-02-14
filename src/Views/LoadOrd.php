<?php
namespace Views;

class LoadOrd extends View {
  
  public function index(){
    $model = $this->getModel('LoadOrd');
    
    if($model){
      $data = $model->getAll();
      $this->set('loadOrd', $data['loadOrd']);
    }

    
    if(isset($data['error'])){
      $this->set('error', $data['error']);
    }
    
    $this->set('customScript', array('datatables.min', 'table.min'));
    $this->render('LoadOrdGetAll');
  }
  
  public function addform(){
    $this->set('customScript', 'LoadOrdFormCheck');
    $this->render('LoadOrdAddForm');
  }
  
  public function editform($id){
    $model = $this->getModel('LoadOrd');
    if($model) {
      $data = $model->getOne($id);
      if(isset($data['loadOrd']))
        $this->set('loadOrd', $data['loadOrd']);
      if(isset($data['error']))
        $this->set('error', $data['error']);
      $this->set('customScript', 'LoadOrdFormCheck');
      
      $this->render('LoadOrdEditForm');
      return true;
    }
    return false;
  }    
  
}


