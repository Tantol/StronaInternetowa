{include file="header.html.php"}
{if !isset($login)}
  <div class="alert alert-danger" role="alert">Zaloguj sie !</div>
{else}
<div class="container jumbotron">
<h1>
  <translate>Edit load order</translate>
</h1>
{if isset($loadOrd)}
<form action="http://{$smarty.server.HTTP_HOST}{$subdir}LoadOrd/edit" method="post" id="loadOrdForm">
  <input type="hidden" id="id" name="id" value="{$loadOrd['id']}">
  <div class="form-group">
              <label for="clientId">
                <translate>ClientId</translate>
                  <a href="http://{$smarty.server.HTTP_HOST}{$subdir}Client/editForm/{$loadOrd['clientId']}">
                    <translate>Edit</translate>
                  </a>
              </label>
              {html_options name=clientId options=$client selected={$loadOrd['clientId']} class="form-control"}
            </div>
            <div class="form-group">
              <label for="moverId">
                <translate>MoverId</translate>
                  <a href="http://{$smarty.server.HTTP_HOST}{$subdir}Worker/editForm/{$loadOrd['moverId']}">
                    <translate>Edit</translate>
                  </a>
              </label>
              {html_options name=moverId options=$worker selected={$loadOrd['moverId']} class="form-control"}
            </div>
            <div class="form-group">
              <label for="inclusivePrice">
                <translate>InclusivePrice</translate>
              </label>
              <input type="text" class="form-control" name="inclusivePrice" value="{$loadOrd['inclusivePrice']}" required>
            </div>
            <div class="form-group">
              <label for="note">
                <translate>Note</translate>
              </label>
              <input type="text" class="form-control" name="note" value="{$loadOrd['note']}" required>
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