<?php
/* Smarty version 3.1.30, created on 2017-12-03 02:01:22
  from "C:\xampp\htdocs\Zarczynski_Piotr\templates\CategoryAddForm.html.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a234ce2317905_93311156',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7d28771360299d780072e3bb915fc0db13db7836' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Zarczynski_Piotr\\templates\\CategoryAddForm.html.php',
      1 => 1512262880,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html.php' => 1,
    'file:footer.html.php' => 1,
  ),
),false)) {
function content_5a234ce2317905_93311156 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<h1>Dodaj kategorię</h1>
<form action="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Category/add" method="post">
    Nazwa kategorii: <input type="text" name="name" /><br />
    <input type="submit" value="Dodaj" />
</form>
<?php $_smarty_tpl->_subTemplateRender("file:footer.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
