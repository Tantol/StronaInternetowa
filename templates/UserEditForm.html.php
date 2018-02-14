{include file="header.html.php"}
{if !isset($login)}
  <div class="alert alert-danger" role="alert">Zaloguj sie !</div>
{else}
<div class="container jumbotron">
<h1>
  <translate>Edit user</translate>
</h1>
{if isset($user)}
<form action="http://{$smarty.server.HTTP_HOST}{$subdir}User/edit" method="post" id="userForm">
  <input type="hidden" id="id" name="id" value="{$user['id']}">
  <div class="form-group">
              <label for="login">
                <translate>Login</translate>
              </label>
              <input type="text" class="form-control" name="login" value="{$user['login']}" required>
            </div>
  <div class="form-group">
              <label for="email">
                <translate>Email</translate>
              </label>
              <input type="text" class="form-control" name="email" value="{$user['email']}" required>
            </div>
  <div class="form-group">
              <label for="password">
                <translate>Password</translate>
              </label>
              <input type="text" class="form-control" name="password" value="{$user['password']}" required>
            </div>
  <div class="form-group">
              <label for="registerDate">
                <translate>RegisterDate</translate>
              </label>
              <input type="text" class="form-control" name="registerDate" value="{$user['registerDate']}" required>
            </div>
  <div class="form-group">
              <label for="clientId">
                <translate>Client</translate>
                <a href="http://{$smarty.server.HTTP_HOST}{$subdir}Client/editForm/{$user['clientId']}">
                  <translate>Edit</translate>
    </a>
              </label>
              {html_options name=clientId options=$client selected={$user['clientId']} class="form-control"}
            </div>
  <div class="form-group">
              <label for="workerId">
                <translate>Worker</translate>
                <a href="http://{$smarty.server.HTTP_HOST}{$subdir}Worker/editForm/{$user['workerId']}">
                  <translate>Edit</translate>
    </a>
              </label>
              {html_options name=workerId options=$worker selected={$user['workerId']} class="form-control"}
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
{/if}
{if isset($error)}
<strong>{$error}</strong>
{/if}
</div>
{/if}
{include file="footer.html.php"}