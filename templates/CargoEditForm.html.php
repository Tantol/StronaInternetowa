{include file="header.html.php"}
{if !isset($login)}
  <div class="alert alert-danger" role="alert">Zaloguj sie !</div>
{else}
<div class="container jumbotron">
<h1>
  <translate>Edit cargo</translate>
</h1>
{if isset($cargo)}
<div class="row">
  <div class="col-md-4">
<form action="http://{$smarty.server.HTTP_HOST}{$subdir}Cargo/edit" method="post" id="cargoForm">
  <input type="hidden" id="id" name="id" value="{$cargo['id']}"> 
            <div class="form-group">
              <label for="loadOrdId">
                <translate>LoadOrdId</translate>
                  <a href="http://{$smarty.server.HTTP_HOST}{$subdir}LoadOrd/editForm/{$cargo['loadOrdId']}">
                    <translate>Edit</translate>
                  </a>
              </label>
              {html_options name=loadOrdId options=$loadOrd selected={$cargo['loadOrdId']} class="form-control"}
            </div>
            <div class="form-group">
              <label for="town">
                <translate>DriverId</translate>
                  <a href="http://{$smarty.server.HTTP_HOST}{$subdir}Worker/editForm/{$cargo['driverId']}">
                    <translate>Edit</translate>
                  </a>
              </label>
              {html_options name=driverId options=$worker selected={$cargo['driverId']} class="form-control"}
            </div>
            <div class="form-group">
              <label for="startAddressId">
                <translate>StartAddressId</translate>
                  <a href="http://{$smarty.server.HTTP_HOST}{$subdir}Address/editForm/{$cargo['startAddressId']}">
                    <translate>Edit</translate>
                  </a>
              </label>
              {html_options name=startAddressId options=$addressStart selected={$cargo['startAddressId']} class="form-control"}
            </div>
            <div class="form-group">
              <label for="endAddressId">
                <translate>EndAddressId</translate>
                  <a href="http://{$smarty.server.HTTP_HOST}{$subdir}Address/editForm/{$cargo['endAddressId']}">
                    <translate>Edit</translate>
                  </a>
              </label>
              {html_options name=endAddressId options=$addressEnd selected={$cargo['endAddressId']} class="form-control"}
            </div>
            <div class="form-group">
              <label for="price">
                <translate>Price</translate>
              </label>
              <input type="text" class="form-control" name="price" required value="{$cargo['price']}"/>
            </div>
            <div class="form-group">
              <label for="categoryId">
                <translate>CategoryId</translate>
                  <a href="http://{$smarty.server.HTTP_HOST}{$subdir}Category/editForm/{$cargo['categoryId']}">
                    <translate>Edit</translate>
                  </a>
              </label>
              {html_options name=categoryId options=$category selected={$cargo['categoryId']} class="form-control"}
            </div>
            <div class="form-group">
              <label for="note">
                <translate>Note</translate>
              </label>
              <input type="text" class="form-control" name="note" value="{$cargo['note']}" required>
            </div>
            <div class="modal-footer">
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
</div>
</div>
{/if}
{include file="footer.html.php"}