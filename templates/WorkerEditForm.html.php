{include file="header.html.php"}
{if !isset($login)}
  <div class="alert alert-danger" role="alert">Zaloguj sie !</div>
{else}
<div class="container jumbotron">
<h1>
  <translate>Edit worker</translate>
</h1>
{if isset($worker)}
<form action="http://{$smarty.server.HTTP_HOST}{$subdir}Worker/edit" method="post" id="workerForm">
  <input type="hidden" id="id" name="id" value="{$worker['id']}">
            <div class="form-group">
              <label for="firstName">
                <translate>First Name</translate>
              </label>
              <input type="text" class="form-control" name="firstName" value="{$worker['fisrtName']}" required>
            </div>
            <div class="form-group">
              <label for="lastName">
                <translate>Last Name</translate>
              </label>
              <input type="text" class="form-control" name="lastName" value="{$worker['lastName']}" required>
            </div>
            <div class="form-group">
              <label for="PIN">
                <translate>PIN</translate>
              </label>
              <input type="text" class="form-control" name="PIN" value="{$worker['pin']}" required>
            </div>
            <div class="form-group">
              <label for="addressId">
                <translate>Address Id</translate>
                  <a href="http://{$smarty.server.HTTP_HOST}{$subdir}Address/editForm/{$worker['addressId']}">
                    <translate>Edit</translate>
                  </a>
              </label>
              {html_options name=addressId options=$address selected={$worker['addressId']} class="form-control"}
            </div>
            <div class="form-group">
              <label for="contactDetailsId">
                <translate>Contact Details Id</translate>
                  <a href="http://{$smarty.server.HTTP_HOST}{$subdir}ContactDetails/editForm/{$worker['contactDetailsId']}">
                    <translate>Edit</translate>
                  </a>
              </label>
              {html_options name=contactDetailsId options=$contactDetails selected={$worker['contactDetailsId']} class="form-control"}
            </div>
            <div class="form-group">
              <label for="job">
                <translate>Job</translate>
              </label>
              <input type="text" class="form-control" name="job" value="{$worker['job']}" required>
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