<?php
/* Smarty version 3.1.30, created on 2017-12-30 00:28:44
  from "C:\xampp\htdocs\Zarczynski_Piotr\templates\LogForm.html.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a46cfacca1708_37002671',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fdf282fd9347d4124d97b164fef9c5f6a6b2715e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Zarczynski_Piotr\\templates\\LogForm.html.php',
      1 => 1514589310,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html.php' => 1,
    'file:footer.html.php' => 1,
  ),
),false)) {
function content_5a46cfacca1708_37002671 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php if (!isset($_smarty_tpl->tpl_vars['login']->value)) {?>
<div class="container">
<div class="page-header">
  <h1>Zaloguj się do systemu</h1>
</div>
<form id="logform" action="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Access/login" method="post">
  <div class="form-group">
    <label for="name">Login</label>
    <input type="text" class="form-control" id="login" name="login" placeholder="Wprowadź login">
  </div>
  <div class="form-group">
    <label for="name">Hasło</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Wprowadź hasło">
  </div>   
  <div class="alert alert-danger collapse" role="alert"></div>  
  <?php if (isset($_smarty_tpl->tpl_vars['message']->value)) {?>
  <div class="alert alert-success" role="alert"><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</div>
  <?php }?>      
  <?php if (isset($_smarty_tpl->tpl_vars['error']->value)) {?>
  <div class="alert alert-danger" role="alert"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</div>
  <?php }?>       
  <button type="submit" class="btn btn-default">Zaloguj</button>  
</form>
</div>
<?php } else { ?>
  <div class="alert alert-danger" role="alert">Jestes zalogowany !</div>
<?php }
$_smarty_tpl->_subTemplateRender("file:footer.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
