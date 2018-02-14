<?php
/* Smarty version 3.1.30, created on 2018-01-15 19:02:43
  from "C:\xampp\htdocs\Zarczynski_Piotr\templates\ClientEditForm.html.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a5cecc36df452_21866337',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '03d9315901bfb8d2358b84a01e55cb4f08edb2f5' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Zarczynski_Piotr\\templates\\ClientEditForm.html.php',
      1 => 1516039360,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html.php' => 1,
    'file:footer.html.php' => 1,
  ),
),false)) {
function content_5a5cecc36df452_21866337 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_function_html_options')) require_once 'C:\\xampp\\htdocs\\Zarczynski_Piotr\\vendor\\smarty\\smarty\\libs\\plugins\\function.html_options.php';
$_smarty_tpl->_subTemplateRender("file:header.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php if (!isset($_smarty_tpl->tpl_vars['login']->value)) {?>
  <div class="alert alert-danger" role="alert">Zaloguj sie !</div>
<?php } else { ?>
<div class="container jumbotron">
<h1>
  <translate>Edit client</translate>
</h1>
<?php if (isset($_smarty_tpl->tpl_vars['client']->value)) {?>
<form action="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Client/edit" method="post" id="clientForm">
  <input type="hidden" id="id" name="id" value="<?php echo $_smarty_tpl->tpl_vars['client']->value['id'];?>
">
  <div class="form-group">
              <label for="firstName">
                <translate>First Name</translate>
              </label>
              <input type="text" class="form-control" name="firstName" value="<?php echo $_smarty_tpl->tpl_vars['client']->value['firstName'];?>
" required>
            </div>
            <div class="form-group">
              <label for="lastName">
                <translate>LastName</translate>
              </label>
              <input type="text" class="form-control" name="lastName" value="<?php echo $_smarty_tpl->tpl_vars['client']->value['lastName'];?>
" required>
            </div>
            <div class="form-group">
              <label for="PIN">
                <translate>PIN</translate>
              </label>
              <input type="text" class="form-control" name="PIN" value="<?php echo $_smarty_tpl->tpl_vars['client']->value['pin'];?>
" required>
            </div>
            <div class="form-group">
              <label>Address
                <a href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
ContactDetails/editForm/<?php echo $_smarty_tpl->tpl_vars['client']->value['addressId'];?>
">
                    <translate>Edit</translate>
                  </a>
              </label>
                  <?php ob_start();
echo $_smarty_tpl->tpl_vars['client']->value['addressId'];
$_prefixVariable1=ob_get_clean();
echo smarty_function_html_options(array('name'=>'addressId','options'=>$_smarty_tpl->tpl_vars['address']->value,'selected'=>$_prefixVariable1,'class'=>"form-control"),$_smarty_tpl);?>

                <br/>
              </div>
              <!--
              <label for="addressId">
                <translate>AddressId</translate>
              </label>
              <input type="text" class="form-control" name="addressId" value="<?php echo $_smarty_tpl->tpl_vars['client']->value['addressId'];?>
" required>
            </div>
            -->
            <div class="form-group">
              <label for="contactDetailsId">
                <translate>ContactDetailsId</translate>
                  <a href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
ContactDetails/editForm/<?php echo $_smarty_tpl->tpl_vars['client']->value['contactDetailsId'];?>
">
                    <translate>Edit</translate>
                  </a>
              </label>
                <?php ob_start();
echo $_smarty_tpl->tpl_vars['client']->value['contactDetailsId'];
$_prefixVariable2=ob_get_clean();
echo smarty_function_html_options(array('name'=>'contactDetailsId','options'=>$_smarty_tpl->tpl_vars['contactDetails']->value,'selected'=>$_prefixVariable2,'class'=>"form-control"),$_smarty_tpl);?>
<br/>
              </div>
              <!--
              <input type="text" class="form-control" name="contactDetailsId" value="<?php echo $_smarty_tpl->tpl_vars['client']->value['contactDetailsId'];?>
" required>
            </div>
            -->
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
