{include file="header.html.php"}
{if !isset($login)}
  <div class="alert alert-danger" role="alert">Zaloguj sie !</div>
{else}
<div class="container jumbotron">
<h1>
  <translate>Edit client</translate>
</h1>
{if isset($client)}
<form action="http://{$smarty.server.HTTP_HOST}{$subdir}Client/edit" method="post" id="clientForm">
  <input type="hidden" id="id" name="id" value="{$client['id']}">
  <div class="form-group">
              <label for="firstName">
                <translate>First Name</translate>
              </label>
              <input type="text" class="form-control" name="firstName" value="{$client['firstName']}" required>
            </div>
            <div class="form-group">
              <label for="lastName">
                <translate>LastName</translate>
              </label>
              <input type="text" class="form-control" name="lastName" value="{$client['lastName']}" required>
            </div>
            <div class="form-group">
              <label for="PIN">
                <translate>PIN</translate>
              </label>
              <input type="text" class="form-control" name="PIN" value="{$client['pin']}" required>
            </div>
            <div class="form-group">
              <label>Address
                <a href="http://{$smarty.server.HTTP_HOST}{$subdir}ContactDetails/editForm/{$client['addressId']}">
                    <translate>Edit</translate>
                  </a>
              </label>
                  {html_options name=addressId options=$address selected={$client['addressId']} class="form-control"}
                
              </div>
              <!--
              <label for="addressId">
                <translate>AddressId</translate>
              </label>
              <input type="text" class="form-control" name="addressId" value="{$client['addressId']}" required>
            </div>
            -->
            <div class="form-group">
              <label for="contactDetailsId">
                <translate>ContactDetailsId</translate>
                  <a href="http://{$smarty.server.HTTP_HOST}{$subdir}ContactDetails/editForm/{$client['contactDetailsId']}">
                    <translate>Edit</translate>
                  </a>
              </label>
                {html_options name=contactDetailsId options=$contactDetails selected={$client['contactDetailsId']} class="form-control"}
              </div>
              <!--
              <input type="text" class="form-control" name="contactDetailsId" value="{$client['contactDetailsId']}" required>
            </div>
            -->
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