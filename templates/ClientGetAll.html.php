{include file="header.html.php"}
<div class="container jumbotron">
<h1>Lista klientow</h1>
{if isset($clients)}
{if $clients|@count === 0}
	<b>Brak klientow w bazie!</b><br/><br/>
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
                <translate>First name</translate>
              </th>
              <th>
                <translate>Edit</translate>
              </th>
              <th>
                <translate>Delete</translate>
              </th>
            </tr>
            {foreach $clients as $id => $firstName}
            <tr>
              <th>
                {$id}.
              </th>
              <th>
                {$firstName}
              </th>
              <th>
                <a href="http://{$smarty.server.HTTP_HOST}{$subdir}Client/editForm/{$id}">Edit</a>
              </th>
              <th>
                <a href="http://{$smarty.server.HTTP_HOST}{$subdir}Client/delete/{$id}">usuń</a>
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
          <form action="http://{$smarty.server.HTTP_HOST}{$subdir}Client/add" method="post" id="clientForm">
            <!--
              <translate>First Name</translate> <input type="text" name="firstName" /><br />
  <translate>Last Name</translate> <input type="text" name="lastName" /><br />
  <translate>PIN</translate> <input type="text" name="PIN" /><br />
  <translate>AddressId</translate> <input type="text" name="addressId" /><br />
  <translate>ContactDetailsId</translate> <input type="text" name="contactDetailsId" /><br />
-->
            <div class="form-group">
              <label for="firstName">
                <translate>First Name</translate>
              </label>
              <input type="text" class="form-control" name="firstName" required>
            </div>
            <div class="form-group">
              <label for="lastName">
                <translate>LastName</translate>
              </label>
              <input type="text" class="form-control" name="lastName" required>
            </div>
            <div class="form-group">
              <label for="PIN">
                <translate>PIN</translate>
              </label>
              <input type="text" class="form-control" name="PIN" required>
            </div>
            <div class="form-group">
              <label for="addressId">
                <translate>AddressId</translate>
              </label>
              {html_options name=addressId options=$address class="form-control"}
            </div>
            <div class="form-group">
              <label for="contactDetailsId">
                <translate>ContactDetailsId</translate>
              </label>
              {html_options name=contactDetailsId options=$contactDetails class="form-control"}
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
	<script src="http://{$smarty.server.HTTP_HOST}{$subdir}js/ClientFormCheck.js"></script>
  </body>
</html>