<?php
/* Smarty version 3.1.30, created on 2018-01-15 20:57:15
  from "C:\xampp\htdocs\Zarczynski_Piotr\templates\UserGetAll.html.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a5d079b032eb9_29469880',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c1e5768ea150fc0e1fa8b600c2f52a2eb4f3e193' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Zarczynski_Piotr\\templates\\UserGetAll.html.php',
      1 => 1516046131,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html.php' => 1,
  ),
),false)) {
function content_5a5d079b032eb9_29469880 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_function_html_options')) require_once 'C:\\xampp\\htdocs\\Zarczynski_Piotr\\vendor\\smarty\\smarty\\libs\\plugins\\function.html_options.php';
$_smarty_tpl->_subTemplateRender("file:header.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="container jumbotron">
<h1>Lista uzytkownikow</h1>
<?php if (isset($_smarty_tpl->tpl_vars['user']->value)) {
if (count($_smarty_tpl->tpl_vars['user']->value) === 0) {?>
	<b>Brak uzytkownikow w bazie!</b><br/><br/>
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
                <translate>Login</translate>
              </th>
              <th>
                <translate>Edit</translate>
              </th>
              <th>
                <translate>Delete</translate>
              </th>
            </tr>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['user']->value, 'login', false, 'id');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['id']->value => $_smarty_tpl->tpl_vars['login']->value) {
?>
            <tr>
              <th>
                <?php echo $_smarty_tpl->tpl_vars['id']->value;?>
.
              </th>
              <th>
                <?php echo $_smarty_tpl->tpl_vars['login']->value;?>

              </th>
              <th>
                <a href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
User/editForm/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">Edit</a>
              </th>
              <th>
                <a href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
User/delete/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
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
      <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#modalAddUser">Dodaj uzytkownika</button>
    </div>
  </div>
</div>

<!-- Modal section -->
  <div id="modalAddUser" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">
            <translate>Add new user</translate>
          </h4>
        </div>
        <div class="modal-body">
          <form action="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
User/add" method="post" id="userForm">
            <div class="form-group">
              <label for="login">
                <translate>Login</translate>
              </label>
              <input type="text" class="form-control" name="login" required>
            </div>
            <div class="form-group">
              <label for="email">
                <translate>Email</translate>
              </label>
              <input type="text" class="form-control" name="email" required>
            </div>
            <div class="form-group">
              <label for="password">
                <translate>Password</translate>
              </label>
              <input type="password" class="form-control" name="password" required>
            </div>
            <div class="form-group">
              <label for="registerDate">
                <translate>Register Date</translate>
              </label>
              <input type="text" class="form-control" name="registerDate" required>
            </div>
            <div class="form-group">
              <label for="clientId">
                <translate>Client Id</translate>
              </label>
              <?php echo smarty_function_html_options(array('name'=>'clientId','options'=>$_smarty_tpl->tpl_vars['client']->value,'class'=>"form-control"),$_smarty_tpl);?>

            </div>
            <div class="form-group">
              <label for="workerId">
                <translate>Worker Id</translate>
              </label>
              <?php echo smarty_function_html_options(array('name'=>'workerId','options'=>$_smarty_tpl->tpl_vars['worker']->value,'class'=>"form-control"),$_smarty_tpl);?>

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
js/UserFormCheck.js"><?php echo '</script'; ?>
>
  </body>
</html><?php }
}
