<?php
/* Smarty version 3.1.30, created on 2017-12-02 16:07:52
  from "C:\xampp\htdocs\Zarczynski_Piotr\templates\AddressAddForm.html.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a22c1c81a8470_75546941',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd2f5d2bce0cae77f03f323a7db10acc05ddd21fa' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Zarczynski_Piotr\\templates\\AddressAddForm.html.php',
      1 => 1512225666,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html.php' => 1,
    'file:footer.html.php' => 1,
  ),
),false)) {
function content_5a22c1c81a8470_75546941 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<h1>
  <translate>Add address</translate>
</h1>
<form action="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Address/add" method="post">
  <translate>Street</translate> <input type="text" name="street" /><br />
  <translate>Town</translate> <input type="text" name="town" /><br />
  <translate>StreetNumber</translate> <input type="text" name="streetNumber" /><br />
  <translate>HouseUnitNumber</translate> <input type="text" name="houseUnitNumber" /><br />
  <translate>PostCode</translate> <input type="text" name="postCode" /><br />
  <translate>PostOffice</translate> <input type="text" name="postOffice" /><br />
  <input type="submit" value="Add"/>
</form>

<?php $_smarty_tpl->_subTemplateRender("file:footer.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
