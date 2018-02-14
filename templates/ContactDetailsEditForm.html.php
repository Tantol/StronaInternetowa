{include file="header.html.php"}
{if !isset($login)}
  <div class="alert alert-danger" role="alert">Zaloguj sie !</div>
{else}
<div class="container jumbotron">
<h1>
  <translate>Edit contact details</translate>
</h1>
{if isset($contactDetails)}
<form action="http://{$smarty.server.HTTP_HOST}{$subdir}ContactDetails/edit" method="post" id="contactDetailsForm">
  <input type="hidden" id="id" name="id" value="{$contactDetails['id']}">
   <div class="form-group">
              <label for="telephoneNumber">
                <translate>Telephone Number</translate>
              </label>
              <input type="text" class="form-control" name="telephoneNumber" value="{$contactDetails['telephoneNumber']}" required>
            </div>
            <div class="form-group">
              <label for="fax">
                <translate>Fax</translate>
              </label>
              <input type="text" class="form-control" name="fax" value="{$contactDetails['fax']}" required>
            </div>
            <div class="form-group">
              <label for="contactAddressId">
                <translate>ContactAddressId</translate>
                  <a href="http://{$smarty.server.HTTP_HOST}{$subdir}Address/editForm/{$contactDetails['contactAddressId']}">
                    <translate>Edit</translate>
                  </a>
              </label>
              {html_options name=contactAddressId options=$address selected={$contactDetails['contactAddressId']} class="form-control"}
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