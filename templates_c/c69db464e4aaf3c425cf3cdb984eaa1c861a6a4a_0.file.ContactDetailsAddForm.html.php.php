<?php
/* Smarty version 3.1.30, created on 2017-12-03 00:42:16
  from "C:\xampp\htdocs\Zarczynski_Piotr\templates\ContactDetailsAddForm.html.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a233a5872a030_72929590',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c69db464e4aaf3c425cf3cdb984eaa1c861a6a4a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Zarczynski_Piotr\\templates\\ContactDetailsAddForm.html.php',
      1 => 1512257234,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html.php' => 1,
    'file:footer.html.php' => 1,
  ),
),false)) {
function content_5a233a5872a030_72929590 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<h1>
  <translate>Add contact details</translate>
</h1>
<form action="http://<?php echo '<?php ';?>echo $_SERVER['HTTP_HOST']<?php echo '?>';?>/<?php echo '<?=';?>
    \Config\Website\Config::$subdir <?php echo '?>';?>ContactDetails/add" method="post">
  <translate>Telephone Number</translate> <input type="text" name="telephoneNumber" /><br />
  <translate>Fax</translate> <input type="text" name="fax" /><br />
  <translate>ContactAddressId</translate> <input type="text" name="contactAddressId" /><br />
  <input type="submit" value="Add"/>
</form>
<?php $_smarty_tpl->_subTemplateRender("file:footer.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
