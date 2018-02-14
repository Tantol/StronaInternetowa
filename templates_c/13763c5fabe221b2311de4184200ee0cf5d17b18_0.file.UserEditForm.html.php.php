<?php
/* Smarty version 3.1.30, created on 2018-01-15 21:17:30
  from "C:\xampp\htdocs\Zarczynski_Piotr\templates\UserEditForm.html.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a5d0c5a4c9f33_60677209',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '13763c5fabe221b2311de4184200ee0cf5d17b18' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Zarczynski_Piotr\\templates\\UserEditForm.html.php',
      1 => 1516047439,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html.php' => 1,
    'file:footer.html.php' => 1,
  ),
),false)) {
function content_5a5d0c5a4c9f33_60677209 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_function_html_options')) require_once 'C:\\xampp\\htdocs\\Zarczynski_Piotr\\vendor\\smarty\\smarty\\libs\\plugins\\function.html_options.php';
$_smarty_tpl->_subTemplateRender("file:header.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php if (!isset($_smarty_tpl->tpl_vars['login']->value)) {?>
  <div class="alert alert-danger" role="alert">Zaloguj sie !</div>
<?php } else { ?>
<div class="container jumbotron">
<h1>
  <translate>Edit user</translate>
</h1>
<?php if (isset($_smarty_tpl->tpl_vars['user']->value)) {?>
<form action="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
User/edit" method="post" id="userForm">
  <input type="hidden" id="id" name="id" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
">
  <div class="form-group">
              <label for="login">
                <translate>Login</translate>
              </label>
              <input type="text" class="form-control" name="login" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['login'];?>
" required>
            </div>
  <div class="form-group">
              <label for="email">
                <translate>Email</translate>
              </label>
              <input type="text" class="form-control" name="email" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['email'];?>
" required>
            </div>
  <div class="form-group">
              <label for="password">
                <translate>Password</translate>
              </label>
              <input type="text" class="form-control" name="password" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['password'];?>
" required>
            </div>
  <div class="form-group">
              <label for="registerDate">
                <translate>RegisterDate</translate>
              </label>
              <input type="text" class="form-control" name="registerDate" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['registerDate'];?>
" required>
            </div>
  <div class="form-group">
              <label for="clientId">
                <translate>Client</translate>
                <a href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Client/editForm/<?php echo $_smarty_tpl->tpl_vars['user']->value['clientId'];?>
">
                  <translate>Edit</translate>
    </a>
              </label>
              <?php ob_start();
echo $_smarty_tpl->tpl_vars['user']->value['clientId'];
$_prefixVariable1=ob_get_clean();
echo smarty_function_html_options(array('name'=>'clientId','options'=>$_smarty_tpl->tpl_vars['client']->value,'selected'=>$_prefixVariable1,'class'=>"form-control"),$_smarty_tpl);?>

            </div>
  <div class="form-group">
              <label for="workerId">
                <translate>Worker</translate>
                <a href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Worker/editForm/<?php echo $_smarty_tpl->tpl_vars['user']->value['workerId'];?>
">
                  <translate>Edit</translate>
    </a>
              </label>
              <?php ob_start();
echo $_smarty_tpl->tpl_vars['user']->value['workerId'];
$_prefixVariable2=ob_get_clean();
echo smarty_function_html_options(array('name'=>'workerId','options'=>$_smarty_tpl->tpl_vars['worker']->value,'selected'=>$_prefixVariable2,'class'=>"form-control"),$_smarty_tpl);?>

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
<?php }
if (isset($_smarty_tpl->tpl_vars['error']->value)) {?>
<strong><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</strong>
<?php }?>
</div>
<?php }
$_smarty_tpl->_subTemplateRender("file:footer.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
