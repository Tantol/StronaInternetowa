<?php
/* Smarty version 3.1.30, created on 2017-12-30 00:06:20
  from "C:\xampp\htdocs\Zarczynski_Piotr\templates\AddressEditForm.html.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a46ca6cd3a210_71253064',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '97c8e430a2713fc7246d527da3bbe611cf4da15d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Zarczynski_Piotr\\templates\\AddressEditForm.html.php',
      1 => 1514588763,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html.php' => 1,
    'file:footer.html.php' => 1,
  ),
),false)) {
function content_5a46ca6cd3a210_71253064 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php if (!isset($_smarty_tpl->tpl_vars['login']->value)) {?>
  <div class="alert alert-danger" role="alert">Zaloguj sie !</div>
<?php } else { ?>
<div class="container jumbotron">
<h1>
  <translate>Edit address</translate>
</h1>
<?php if (isset($_smarty_tpl->tpl_vars['addresses']->value)) {?>
  <form action="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Address/edit" method="post" id="addressForm">
    <input type="hidden" id="id" name="id" value="<?php echo $_smarty_tpl->tpl_vars['addresses']->value['id'];?>
"> 
            <div class="form-group">
              <label for="street">
                <translate>Street</translate>
              </label>
              <input type="text" class="form-control" name="street" value="<?php echo $_smarty_tpl->tpl_vars['addresses']->value['street'];?>
" required>
            </div>
            <div class="form-group">
              <label for="town">
                <translate>Town</translate>
              </label>
              <input type="text" class="form-control" name="town" value="<?php echo $_smarty_tpl->tpl_vars['addresses']->value['town'];?>
" required>
            </div>
            <div class="form-group">
              <label for="streetNumber">
                <translate>Street Number</translate>
              </label>
              <input type="text" class="form-control" name="streetNumber" value="<?php echo $_smarty_tpl->tpl_vars['addresses']->value['streetNumber'];?>
" required>
            </div>
            <div class="form-group">
              <label for="houseUnitNumber">
                <translate>House Unit Number</translate>
              </label>
              <input type="text" class="form-control" name="houseUnitNumber" value="<?php echo $_smarty_tpl->tpl_vars['addresses']->value['houseUnitNumber'];?>
" required>
            </div>
            <div class="form-group">
              <label for="postCode">
                <translate>Post Code</translate>
              </label>
              <input type="text" class="form-control" name="postCode" value="<?php echo $_smarty_tpl->tpl_vars['addresses']->value['postCode'];?>
" required>
            </div>
            <div class="form-group">
              <label for="postOffice">
                <translate>Post Office</translate>
              </label>
              <input type="text" class="form-control" name="postOffice" value="<?php echo $_smarty_tpl->tpl_vars['addresses']->value['postOffice'];?>
" required>
            </div>
            <div class="form-footer">
              <input type="submit" class="btn btn-default" value="Edit" data-dismiss="modal"/>
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
?>

<?php }
}
