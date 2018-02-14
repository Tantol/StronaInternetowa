{include file="header.html.php"}
<div class="container jumbotron">
<h1>Lista adresow</h1>
{if isset($addresses)}
{if $addresses|@count === 0}
	<b>Brak adresow w bazie!</b><br/><br/>
{else}
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
                <translate>Street</translate>
              </th>
              <th>
                <translate>Edit</translate>
              </th>
              <th>
                <translate>Delete</translate>
              </th>
            </tr>
            {foreach $addresses as $id => $street}
            <tr>
              <th>
                {$id}.
              </th>
              <th>
                {$street}
              </th>
              <th>
                <a href="http://{$smarty.server.HTTP_HOST}{$subdir}Address/editForm/{$id}">Edit</a>
              </th>
              <th>
                <a href="http://{$smarty.server.HTTP_HOST}{$subdir}Address/delete/{$id}">usuń</a>
              </th>
            </tr>
            {/foreach}
          </thead>
          <tbody>
          </tbody>
        </table>
      </div>
  <!--- /.table-collapse --->
{/if}
{/if}
{if isset($error)}
    <strong>{$error}</strong>
{/if}
    <div class="col-md-2">
      <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#modalAddAddress">Dodaj adres</button>
    </div>
  </div>
</div>

<!-- Modal section -->
  <div id="modalAddAddress" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">
            <translate>Add new address</translate>
          </h4>
        </div>
        <div class="modal-body">
          <form action="http://{$smarty.server.HTTP_HOST}{$subdir}Address/add" method="post" id="addressForm">
            <div class="form-group">
              <label for="street">
                <translate>Street</translate>
              </label>
              <input type="text" class="form-control" name="street" required>
            </div>
            <div class="form-group">
              <label for="town">
                <translate>Town</translate>
              </label>
              <input type="text" class="form-control" name="town" required>
            </div>
            <div class="form-group">
              <label for="streetNumber">
                <translate>Street Number</translate>
              </label>
              <input type="text" class="form-control" name="streetNumber" required>
            </div>
            <div class="form-group">
              <label for="houseUnitNumber">
                <translate>House Unit Number</translate>
              </label>
              <input type="text" class="form-control" name="houseUnitNumber" required>
            </div>
            <div class="form-group">
              <label for="postCode">
                <translate>Post Code</translate>
              </label>
              <input type="text" class="form-control" name="postCode" required>
            </div>
            <div class="form-group">
              <label for="postOffice">
                <translate>Post Office</translate>
              </label>
              <input type="text" class="form-control" name="postOffice" required>
            </div>
            <div class="modal-footer">
              <input type="submit" class="btn btn-default" value="Add" data-dismiss="modal"/>
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
	<div class="container">
  {if isset($message)}
  <div class="alert alert-success" role="alert">{$message}</div>
  {/if}      
  {if isset($error)}
  <div class="alert alert-danger" role="alert">{$error}</div>
  {/if}  
	  <!-- Site footer -->
      <footer class="footer">
        <p>&copy; MVC + Smarty + Bootstrap</p>
      </footer>
	</div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="http://{$smarty.server.HTTP_HOST}{$subdir}js/jquery.min.js"></script>
	<script src="http://{$smarty.server.HTTP_HOST}{$subdir}js/jquery-ui.min.js"></script>
    <script src="http://{$smarty.server.HTTP_HOST}{$subdir}js/bootstrap.min.js"></script>
	<script src="http://{$smarty.server.HTTP_HOST}{$subdir}js/jquery.cookie.js"></script>
	<script src="http://{$smarty.server.HTTP_HOST}{$subdir}js/jquery.validate.min.js"></script>	
    <script src="http://{$smarty.server.HTTP_HOST}{$subdir}js/AddressFormCheck.js"></script>
</body>
</html>