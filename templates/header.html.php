<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template with MVC</title>
    <!-- Bootstrap -->
    <link href="http://{$smarty.server.HTTP_HOST}{$subdir}css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom styles for this template -->
    <link href="http://{$smarty.server.HTTP_HOST}{$subdir}css/starter-template.css" rel="stylesheet">
    
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="https://getbootstrap.com/docs/3.3/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

  </head>
  <body>
    <nav class="navbar navbar-default navbar-fixed-top">
    <!--<nav class="navbar navbar-default navbar-static-top">-->
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
            <li><a href="http://{$smarty.server.HTTP_HOST}{$subdir}Category">Lista kategorii</a></li>
            <li><a href="http://{$smarty.server.HTTP_HOST}{$subdir}Address">Lista adresow</a></li>
            <li><a href="http://{$smarty.server.HTTP_HOST}{$subdir}Cargo">Lista zamowien</a></li>
            <li><a href="http://{$smarty.server.HTTP_HOST}{$subdir}LoadOrd">Lista ladunkow</a></li>
            <li><a href="http://{$smarty.server.HTTP_HOST}{$subdir}Client">Lista klientow</a></li>
            <li><a href="http://{$smarty.server.HTTP_HOST}{$subdir}ContactDetails">Lista danych kontaktowych</a></li>
            <li><a href="http://{$smarty.server.HTTP_HOST}{$subdir}User">Lista uzytkownikow</a></li>
            <li><a href="http://{$smarty.server.HTTP_HOST}{$subdir}Worker">Lista pracownikow</a></li>
            {if !isset($login)}
		      <li><a href="http://{$smarty.server.HTTP_HOST}{$subdir}Access/logform">Zaloguj</a></li>
              <li><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#modalAddUser">Zarejestruj sie</button></li>
		    {else}
		      <li><a href="http://{$smarty.server.HTTP_HOST}{$subdir}Access/logout">Wyloguj</a></li>
		    {/if}
        </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

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
          <form action="http://{$smarty.server.HTTP_HOST}{$subdir}User/add" method="post" id="userForm">
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
              {html_options name=clientId options=$client class="form-control"}
            </div>
            <div class="form-group">
              <label for="workerId">
                <translate>Worker Id</translate>
              </label>
              {html_options name=workerId options=$worker class="form-control"}
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