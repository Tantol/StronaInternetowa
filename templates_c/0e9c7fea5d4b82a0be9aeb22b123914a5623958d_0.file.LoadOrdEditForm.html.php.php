<?php
/* Smarty version 3.1.30, created on 2018-01-15 20:28:42
  from "C:\xampp\htdocs\Zarczynski_Piotr\templates\LoadOrdEditForm.html.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a5d00eae5bc31_87556879',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0e9c7fea5d4b82a0be9aeb22b123914a5623958d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Zarczynski_Piotr\\templates\\LoadOrdEditForm.html.php',
      1 => 1516044522,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html.php' => 1,
    'file:footer.html.php' => 1,
  ),
),false)) {
function content_5a5d00eae5bc31_87556879 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_function_html_options')) require_once 'C:\\xampp\\htdocs\\Zarczynski_Piotr\\vendor\\smarty\\smarty\\libs\\plugins\\function.html_options.php';
$_smarty_tpl->_subTemplateRender("file:header.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php if (!isset($_smarty_tpl->tpl_vars['login']->value)) {?>
  <div class="alert alert-danger" role="alert">Zaloguj sie !</div>
<?php } else { ?>
<div class="container jumbotron">
<h1>
  <translate>Edit load order</translate>
</h1>
<?php if (isset($_smarty_tpl->tpl_vars['loadOrd']->value)) {?>
<form action="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
LoadOrd/edit" method="post" id="loadOrdForm">
  <input type="hidden" id="id" name="id" value="<?php echo $_smarty_tpl->tpl_vars['loadOrd']->value['id'];?>
">
  <div class="form-group">
              <label for="clientId">
                <translate>ClientId</translate>
                  <a href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Client/editForm/<?php echo $_smarty_tpl->tpl_vars['loadOrd']->value['clientId'];?>
">
                    <translate>Edit</translate>
                  </a>
              </label>
              <?php ob_start();
echo $_smarty_tpl->tpl_vars['loadOrd']->value['clientId'];
$_prefixVariable1=ob_get_clean();
echo smarty_function_html_options(array('name'=>'clientId','options'=>$_smarty_tpl->tpl_vars['client']->value,'selected'=>$_prefixVariable1,'class'=>"form-control"),$_smarty_tpl);?>
<br/>
            </div>
            <div class="form-group">
              <label for="moverId">
                <translate>MoverId</translate>
                  <a href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Worker/editForm/<?php echo $_smarty_tpl->tpl_vars['loadOrd']->value['moverId'];?>
">
                    <translate>Edit</translate>
                  </a>
              </label>
              <?php ob_start();
echo $_smarty_tpl->tpl_vars['loadOrd']->value['moverId'];
$_prefixVariable2=ob_get_clean();
echo smarty_function_html_options(array('name'=>'moverId','options'=>$_smarty_tpl->tpl_vars['worker']->value,'selected'=>$_prefixVariable2,'class'=>"form-control"),$_smarty_tpl);?>
<br/>
            </div>
            <div class="form-group">
              <label for="inclusivePrice">
                <translate>InclusivePrice</translate>
              </label>
              <input type="text" class="form-control" name="inclusivePrice" value="<?php echo $_smarty_tpl->tpl_vars['loadOrd']->value['inclusivePrice'];?>
" required>
            </div>
            <div class="form-group">
              <label for="note">
                <translate>Note</translate>
              </label>
              <input type="text" class="form-control" name="note" value="<?php echo $_smarty_tpl->tpl_vars['loadOrd']->value['note'];?>
" required>
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
