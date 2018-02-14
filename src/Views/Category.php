<?php
namespace Views;

class Category extends View {
  public function index(){
    $model = $this->getModel('Category');
    if($model){
      $data = $model->getAll();
      $this->set('categories', $data['categories']);
    }
    
    if(isset($data['error']))
      $this->set('error', $data['error']);
    $this->set('customScript', array('datatables.min', 'table.min'));
    $this->render('CategoryGetAll');
  }
  public function addform(){
    $this->set('customScript', 'CategoryFormCheck');
    $this->render('CategoryAddForm');
  }
  public function editform($id){
    $model = $this->getModel('Category');
    if($model) {
      $data = $model->getOne($id);
      if(isset($data['categories']))
        $this->set('categories', $data['categories']);
      if(isset($data['error']))
        $this->set('error', $data['error']);
      $this->set('customScript', 'CategoryFormCheck');
      $this->render('CategoryEditForm');
      return true;
    }
    return false;
  }        
}

