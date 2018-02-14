<?php
/* Smarty version 3.1.30, created on 2018-01-15 20:24:11
  from "C:\xampp\htdocs\Zarczynski_Piotr\templates\ContactDetailsEditForm.html.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a5cffdb5ba783_91288496',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b630ba45248477cc9aba8dffcd385b50a6a1cef1' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Zarczynski_Piotr\\templates\\ContactDetailsEditForm.html.php',
      1 => 1516044249,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html.php' => 1,
    'file:footer.html.php' => 1,
  ),
),false)) {
function content_5a5cffdb5ba783_91288496 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_function_html_options')) require_once 'C:\\xampp\\htdocs\\Zarczynski_Piotr\\vendor\\smarty\\smarty\\libs\\plugins\\function.html_options.php';
$_smarty_tpl->_subTemplateRender("file:header.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php if (!isset($_smarty_tpl->tpl_vars['login']->value)) {?>
  <div class="alert alert-danger" role="alert">Zaloguj sie !</div>
<?php } else { ?>
<div class="container jumbotron">
<h1>
  <translate>Edit contact details</translate>
</h1>
<?php if (isset($_smarty_tpl->tpl_vars['contactDetails']->value)) {?>
<form action="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
ContactDetails/edit" method="post" id="contactDetailsForm">
  <input type="hidden" id="id" name="id" value="<?php echo $_smarty_tpl->tpl_vars['contactDetails']->value['id'];?>
">
   <div class="form-group">
              <label for="telephoneNumber">
                <translate>Telephone Number</translate>
              </label>
              <input type="text" class="form-control" name="telephoneNumber" value="<?php echo $_smarty_tpl->tpl_vars['contactDetails']->value['telephoneNumber'];?>
" required>
            </div>
            <div class="form-group">
              <label for="fax">
                <translate>Fax</translate>
              </label>
              <input type="text" class="form-control" name="fax" value="<?php echo $_smarty_tpl->tpl_vars['contactDetails']->value['fax'];?>
" required>
            </div>
            <div class="form-group">
              <label for="contactAddressId">
                <translate>ContactAddressId</translate>
                  <a href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Address/editForm/<?php echo $_smarty_tpl->tpl_vars['contactDetails']->value['contactAddressId'];?>
">
                    <translate>Edit</translate>
                  </a>
              </label>
              <?php ob_start();
echo $_smarty_tpl->tpl_vars['contactDetails']->value['contactAddressId'];
$_prefixVariable1=ob_get_clean();
echo smarty_function_html_options(array('name'=>'contactAddressId','options'=>$_smarty_tpl->tpl_vars['address']->value,'selected'=>$_prefixVariable1,'class'=>"form-control"),$_smarty_tpl);?>
<br/>
            </div>
            <div class="form-footer">
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
<?php }
$_smarty_tpl->_subTemplateRender("file:footer.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
