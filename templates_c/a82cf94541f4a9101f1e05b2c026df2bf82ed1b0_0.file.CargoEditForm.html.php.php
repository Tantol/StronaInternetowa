<?php
/* Smarty version 3.1.30, created on 2018-01-15 19:16:40
  from "C:\xampp\htdocs\Zarczynski_Piotr\templates\CargoEditForm.html.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a5cf0086ebf21_70523172',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a82cf94541f4a9101f1e05b2c026df2bf82ed1b0' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Zarczynski_Piotr\\templates\\CargoEditForm.html.php',
      1 => 1516040198,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html.php' => 1,
    'file:footer.html.php' => 1,
  ),
),false)) {
function content_5a5cf0086ebf21_70523172 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_function_html_options')) require_once 'C:\\xampp\\htdocs\\Zarczynski_Piotr\\vendor\\smarty\\smarty\\libs\\plugins\\function.html_options.php';
$_smarty_tpl->_subTemplateRender("file:header.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php if (!isset($_smarty_tpl->tpl_vars['login']->value)) {?>
  <div class="alert alert-danger" role="alert">Zaloguj sie !</div>
<?php } else { ?>
<div class="container jumbotron">
<h1>
  <translate>Edit cargo</translate>
</h1>
<?php if (isset($_smarty_tpl->tpl_vars['cargo']->value)) {?>
<div class="row">
  <div class="col-md-4">
<form action="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Cargo/edit" method="post" id="cargoForm">
  <input type="hidden" id="id" name="id" value="<?php echo $_smarty_tpl->tpl_vars['cargo']->value['id'];?>
"> 
            <div class="form-group">
              <label for="loadOrdId">
                <translate>LoadOrdId</translate>
                  <a href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
LoadOrd/editForm/<?php echo $_smarty_tpl->tpl_vars['cargo']->value['loadOrdId'];?>
">
                    <translate>Edit</translate>
                  </a>
              </label>
              <?php ob_start();
echo $_smarty_tpl->tpl_vars['cargo']->value['loadOrdId'];
$_prefixVariable1=ob_get_clean();
echo smarty_function_html_options(array('name'=>'loadOrdId','options'=>$_smarty_tpl->tpl_vars['loadOrd']->value,'selected'=>$_prefixVariable1,'class'=>"form-control"),$_smarty_tpl);?>
<br/>
            </div>
            <div class="form-group">
              <label for="town">
                <translate>DriverId</translate>
                  <a href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Worker/editForm/<?php echo $_smarty_tpl->tpl_vars['cargo']->value['driverId'];?>
">
                    <translate>Edit</translate>
                  </a>
              </label>
              <?php ob_start();
echo $_smarty_tpl->tpl_vars['cargo']->value['driverId'];
$_prefixVariable2=ob_get_clean();
echo smarty_function_html_options(array('name'=>'driverId','options'=>$_smarty_tpl->tpl_vars['worker']->value,'selected'=>$_prefixVariable2,'class'=>"form-control"),$_smarty_tpl);?>
<br/>
            </div>
            <div class="form-group">
              <label for="startAddressId">
                <translate>StartAddressId</translate>
                  <a href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Address/editForm/<?php echo $_smarty_tpl->tpl_vars['cargo']->value['startAddressId'];?>
">
                    <translate>Edit</translate>
                  </a>
              </label>
              <?php ob_start();
echo $_smarty_tpl->tpl_vars['cargo']->value['startAddressId'];
$_prefixVariable3=ob_get_clean();
echo smarty_function_html_options(array('name'=>'startAddressId','options'=>$_smarty_tpl->tpl_vars['addressStart']->value,'selected'=>$_prefixVariable3,'class'=>"form-control"),$_smarty_tpl);?>
<br/>
            </div>
            <div class="form-group">
              <label for="endAddressId">
                <translate>EndAddressId</translate>
                  <a href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Address/editForm/<?php echo $_smarty_tpl->tpl_vars['cargo']->value['endAddressId'];?>
">
                    <translate>Edit</translate>
                  </a>
              </label>
              <?php ob_start();
echo $_smarty_tpl->tpl_vars['cargo']->value['endAddressId'];
$_prefixVariable4=ob_get_clean();
echo smarty_function_html_options(array('name'=>'endAddressId','options'=>$_smarty_tpl->tpl_vars['addressEnd']->value,'selected'=>$_prefixVariable4,'class'=>"form-control"),$_smarty_tpl);?>
<br/>
            </div>
            <div class="form-group">
              <label for="price">
                <translate>Price</translate>
              </label>
              <input type="text" class="form-control" name="price" required value="<?php echo $_smarty_tpl->tpl_vars['cargo']->value['price'];?>
"/>
            </div>
            <div class="form-group">
              <label for="categoryId">
                <translate>CategoryId</translate>
                  <a href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Category/editForm/<?php echo $_smarty_tpl->tpl_vars['cargo']->value['categoryId'];?>
">
                    <translate>Edit</translate>
                  </a>
              </label>
              <?php ob_start();
echo $_smarty_tpl->tpl_vars['cargo']->value['categoryId'];
$_prefixVariable5=ob_get_clean();
echo smarty_function_html_options(array('name'=>'categoryId','options'=>$_smarty_tpl->tpl_vars['category']->value,'selected'=>$_prefixVariable5,'class'=>"form-control"),$_smarty_tpl);?>
<br/>
            </div>
            <div class="form-group">
              <label for="note">
                <translate>Note</translate>
              </label>
              <input type="text" class="form-control" name="note" value="<?php echo $_smarty_tpl->tpl_vars['cargo']->value['note'];?>
" required>
            </div>
            <div class="modal-footer">
              <input type="submit" class="btn btn-default" value="Edit"/>
              <!--
              <button type="submit" class="btn btn-default" data-dismiss="modal">
                <translate>Submit</translate>
              </button>
              <button type="button" class="btn btn-default" data-dismiss="modal">
                <translate>Close</translate>
              </button>
              -->
            </div>
</form>
<?php }?>

<?php if (isset($_smarty_tpl->tpl_vars['error']->value)) {?>
<strong><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</strong>
<?php }?>
    </div>
</div>
</div>
<?php }
$_smarty_tpl->_subTemplateRender("file:footer.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
