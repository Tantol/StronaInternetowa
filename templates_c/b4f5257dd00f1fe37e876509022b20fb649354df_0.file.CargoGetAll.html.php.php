<?php
/* Smarty version 3.1.30, created on 2018-01-15 20:48:00
  from "C:\xampp\htdocs\Zarczynski_Piotr\templates\CargoGetAll.html.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a5d05703d7371_43928344',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b4f5257dd00f1fe37e876509022b20fb649354df' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Zarczynski_Piotr\\templates\\CargoGetAll.html.php',
      1 => 1516045643,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html.php' => 1,
  ),
),false)) {
function content_5a5d05703d7371_43928344 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_function_html_options')) require_once 'C:\\xampp\\htdocs\\Zarczynski_Piotr\\vendor\\smarty\\smarty\\libs\\plugins\\function.html_options.php';
?>

<?php $_smarty_tpl->_subTemplateRender("file:header.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="container jumbotron">
<h1>Lista zamowien</h1>
<?php if (isset($_smarty_tpl->tpl_vars['cargo']->value)) {
if (count($_smarty_tpl->tpl_vars['cargo']->value) === 0) {?>
	<b>Brak zamowien w bazie!</b><br/><br/>
<?php } else { ?>
<div class="row">
<!--- Contact table --->
      <div class="col-md-10">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>
                <translate>Id</translate>
              </th>
              <th>
                <translate>Id load order</translate>
              </th>
              <th>
                <translate>Edit</translate>
              </th>
              <th>
                <translate>Delete</translate>
              </th>
            </tr>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cargo']->value, 'loadOrdId', false, 'id');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['id']->value => $_smarty_tpl->tpl_vars['loadOrdId']->value) {
?>
            <tr>
              <th>
                <?php echo $_smarty_tpl->tpl_vars['id']->value;?>
.
              </th>
              <th>
                <?php echo $_smarty_tpl->tpl_vars['loadOrdId']->value;?>

              </th>
              <th>
                <a href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Cargo/editForm/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">Edit</a>
              </th>
              <th>
                <a href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Cargo/delete/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">usuń</a>
              </th>
            </tr>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

          </thead>
          <tbody>
          </tbody>
        </table>
      </div>
  <!--- /.table-collapse --->
<?php }
}
if (isset($_smarty_tpl->tpl_vars['error']->value)) {?>
    <strong><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</strong>
<?php }?>
    <div class="col-md-2">
      <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#modalAddCargo">Dodaj zamowienie</button>
    </div>
  </div>
</div>

<!-- Modal section -->
  <div id="modalAddCargo" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">
            <translate>Add new cargo</translate>
          </h4>
        </div>
        <div class="modal-body">
          <form action="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Cargo/add" method="post" id="cargoForm">
            <div class="form-group">
              <label for="loadOrdId">
                <translate>LoadOrdId</translate>
              </label>
              <?php echo smarty_function_html_options(array('name'=>'loadOrdId','options'=>$_smarty_tpl->tpl_vars['loadOrd']->value,'class'=>"form-control"),$_smarty_tpl);?>

            </div>
            <div class="form-group">
              <label for="town">
                <translate>DriverId</translate>
              </label>
              <?php echo smarty_function_html_options(array('name'=>'driverId','options'=>$_smarty_tpl->tpl_vars['worker']->value,'class'=>"form-control"),$_smarty_tpl);?>

            </div>
            <div class="form-group">
              <label for="startAddressId">
                <translate>StartAddressId</translate>
              </label>
              <?php echo smarty_function_html_options(array('name'=>'startAddressId','options'=>$_smarty_tpl->tpl_vars['addressStart']->value,'class'=>"form-control"),$_smarty_tpl);?>

            </div>
            <div class="form-group">
              <label for="endAddressId">
                <translate>EndAddressId</translate>
              </label>
              <?php echo smarty_function_html_options(array('name'=>'endAddressId','options'=>$_smarty_tpl->tpl_vars['addressEnd']->value,'class'=>"form-control"),$_smarty_tpl);?>

            </div>
            <div class="form-group">
              <label for="price">
                <translate>Price</translate>
              </label>
              <input type="text" class="form-control" name="price" required>
            </div>
            <div class="form-group">
              <label for="categoryId">
                <translate>CategoryId</translate>
              </label>
              <?php echo smarty_function_html_options(array('name'=>'categoryId','options'=>$_smarty_tpl->tpl_vars['category']->value,'class'=>"form-control"),$_smarty_tpl);?>

            </div>
            <div class="form-group">
              <label for="note">
                <translate>Note</translate>
              </label>
              <input type="text" class="form-control" name="note" required>
            </div>
            <div class="modal-footer">
              <input type="submit" class="btn btn-default" value="Add"/>
              <input type="button" class="btn btn-default" value="Close" data-dismiss="modal"/>
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

        </div>

      </div>

    </div>
  </div>
  <!--- /.modal-collapse --->
  	<div class="container">
        <?php if (isset($_smarty_tpl->tpl_vars['message']->value)) {?>
  <div class="alert alert-success" role="alert"><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</div>
  <?php }?>      
  <?php if (isset($_smarty_tpl->tpl_vars['error']->value)) {?>
  <div class="alert alert-danger" role="alert"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</div>
  <?php }?>  
	  <!-- Site footer -->
      <footer class="footer">
        <p>&copy; MVC + Smarty + Bootstrap</p>
      </footer>
	</div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <?php echo '<script'; ?>
 src="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
js/jquery.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
js/jquery-ui.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
js/bootstrap.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
js/jquery.cookie.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
js/jquery.validate.min.js"><?php echo '</script'; ?>
>	
	<?php echo '<script'; ?>
 src="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
js/CargoFormCheck.js"><?php echo '</script'; ?>
>
  </body>
</html><?php }
}
