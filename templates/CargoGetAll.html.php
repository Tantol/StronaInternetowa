
{include file="header.html.php"}
<div class="container jumbotron">
<h1>Lista zamowien</h1>
{if isset($cargo)}
{if $cargo|@count === 0}
	<b>Brak zamowien w bazie!</b><br/><br/>
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
                <translate>Id load order</translate>
              </th>
              <th>
                <translate>Edit</translate>
              </th>
              <th>
                <translate>Delete</translate>
              </th>
            </tr>
            {foreach $cargo as $id => $loadOrdId}
            <tr>
              <th>
                {$id}.
              </th>
              <th>
                {$loadOrdId}
              </th>
              <th>
                <a href="http://{$smarty.server.HTTP_HOST}{$subdir}Cargo/editForm/{$id}">Edit</a>
              </th>
              <th>
                <a href="http://{$smarty.server.HTTP_HOST}{$subdir}Cargo/delete/{$id}">usuń</a>
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
      <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#modalAddCargo">Dodaj zamowienie</button>
    </div>
  </div>
</div>

<!-- Modal section -->
  <div id="modalAddCargo" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">
            <translate>Add new cargo</translate>
          </h4>
        </div>
        <div class="modal-body">
          <form action="http://{$smarty.server.HTTP_HOST}{$subdir}Cargo/add" method="post" id="cargoForm">
            <div class="form-group">
              <label for="loadOrdId">
                <translate>LoadOrdId</translate>
              </label>
              {html_options name=loadOrdId options=$loadOrd class="form-control"}
            </div>
            <div class="form-group">
              <label for="town">
                <translate>DriverId</translate>
              </label>
              {html_options name=driverId options=$worker class="form-control"}
            </div>
            <div class="form-group">
              <label for="startAddressId">
                <translate>StartAddressId</translate>
              </label>
              {html_options name=startAddressId options=$addressStart class="form-control"}
            </div>
            <div class="form-group">
              <label for="endAddressId">
                <translate>EndAddressId</translate>
              </label>
              {html_options name=endAddressId options=$addressEnd class="form-control"}
            </div>
            <div class="form-group">
              <label for="price">
                <translate>Price</translate>
              </label>
              <input type="text" class="form-control" name="price" required>
            </div>
            <div class="form-group">
              <label for="categoryId">
                <translate>CategoryId</translate>
              </label>
              {html_options name=categoryId options=$category class="form-control"}
            </div>
            <div class="form-group">
              <label for="note">
                <translate>Note</translate>
              </label>
              <input type="text" class="form-control" name="note" required>
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
	<script src="http://{$smarty.server.HTTP_HOST}{$subdir}js/CargoFormCheck.js"></script>
  </body>
</html>