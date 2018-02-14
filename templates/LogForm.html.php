{include file="header.html.php"}
{if !isset($login)}
<div class="container">
<div class="page-header">
  <h1>Zaloguj się do systemu</h1>
</div>
<form id="logform" action="http://{$smarty.server.HTTP_HOST}{$subdir}Access/login" method="post">
  <div class="form-group">
    <label for="name">Login</label>
    <input type="text" class="form-control" id="login" name="login" placeholder="Wprowadź login">
  </div>
  <div class="form-group">
    <label for="name">Hasło</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Wprowadź hasło">
  </div>   
  <div class="alert alert-danger collapse" role="alert"></div>  
  {if isset($message)}
  <div class="alert alert-success" role="alert">{$message}</div>
  {/if}      
  {if isset($error)}
  <div class="alert alert-danger" role="alert">{$error}</div>
  {/if}       
  <button type="submit" class="btn btn-default">Zaloguj</button>  
</form>
</div>
{else}
  <div class="alert alert-danger" role="alert">Jestes zalogowany !</div>
{/if}
{include file="footer.html.php"}