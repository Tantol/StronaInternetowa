{include file="header.html.php"}
{if !isset($login)}
  <div class="alert alert-danger" role="alert">Zaloguj sie !</div>
{else}
<div class="container jumbotron">
<h1>
  <translate>Edit address</translate>
</h1>
{if isset($addresses)}
  <form action="http://{$smarty.server.HTTP_HOST}{$subdir}Address/edit" method="post" id="addressForm">
    <input type="hidden" id="id" name="id" value="{$addresses['id']}"> 
            <div class="form-group">
              <label for="street">
                <translate>Street</translate>
              </label>
              <input type="text" class="form-control" name="street" value="{$addresses['street']}" required>
            </div>
            <div class="form-group">
              <label for="town">
                <translate>Town</translate>
              </label>
              <input type="text" class="form-control" name="town" value="{$addresses['town']}" required>
            </div>
            <div class="form-group">
              <label for="streetNumber">
                <translate>Street Number</translate>
              </label>
              <input type="text" class="form-control" name="streetNumber" value="{$addresses['streetNumber']}" required>
            </div>
            <div class="form-group">
              <label for="houseUnitNumber">
                <translate>House Unit Number</translate>
              </label>
              <input type="text" class="form-control" name="houseUnitNumber" value="{$addresses['houseUnitNumber']}" required>
            </div>
            <div class="form-group">
              <label for="postCode">
                <translate>Post Code</translate>
              </label>
              <input type="text" class="form-control" name="postCode" value="{$addresses['postCode']}" required>
            </div>
            <div class="form-group">
              <label for="postOffice">
                <translate>Post Office</translate>
              </label>
              <input type="text" class="form-control" name="postOffice" value="{$addresses['postOffice']}" required>
            </div>
            <div class="form-footer">
              <input type="submit" class="btn btn-default" value="Edit" data-dismiss="modal"/>
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
