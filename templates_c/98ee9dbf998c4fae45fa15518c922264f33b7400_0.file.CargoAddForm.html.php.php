<?php
/* Smarty version 3.1.30, created on 2017-12-11 15:53:25
  from "C:\xampp\htdocs\Zarczynski_Piotr\templates\CargoAddForm.html.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a2e9be5180445_29972830',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '98ee9dbf998c4fae45fa15518c922264f33b7400' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Zarczynski_Piotr\\templates\\CargoAddForm.html.php',
      1 => 1512994672,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html.php' => 1,
    'file:footer.html.php' => 1,
  ),
),false)) {
function content_5a2e9be5180445_29972830 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<h1>
  <translate>Add cargo</translate>
</h1>
<form action="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Cargo/add" method="post">
  <translate>LoadOrdId</translate> <input type="text" name="loadOrdId" /><br />
  <translate>DriverId</translate> <input type="text" name="driverId" /><br />
  <translate>StartAddressId</translate> <input type="text" name="startAddressId" /><br />
  <translate>EndAddressId</translate> <input type="text" name="endAddressId" /><br />
  <translate>Price</translate> <input type="text" name="price" /><br />
  <translate>CategoryId</translate> <input type="text" name="categoryId" /><br />
  <translate>Note</translate> <input type="text" name="note" /><br />
  <input type="submit" value="Add"/>
</form>
<?php $_smarty_tpl->_subTemplateRender("file:footer.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
