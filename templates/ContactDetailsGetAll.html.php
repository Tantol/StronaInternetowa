{include file="header.html.php"}
<div class="container jumbotron">
<h1>Lista danych kontaktowych</h1>
{if isset($contactDetails)}
{if $contactDetails|@count === 0}
	<b>Brak danych kontaktowych w bazie!</b><br/><br/>
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
                <translate>Telephone Number</translate>
              </th>
              <th>
                <translate>Edit</translate>
              </th>
              <th>
                <translate>Delete</translate>
              </th>
            </tr>
            {foreach $contactDetails as $id => $telephoneNumber}
            <tr>
              <th>
                {$id}.
              </th>
              <th>
                {$telephoneNumber}
              </th>
              <th>
                <a href="http://{$smarty.server.HTTP_HOST}{$subdir}ContactDetails/editForm/{$id}">Edit</a>
              </th>
              <th>
                <a href="http://{$smarty.server.HTTP_HOST}{$subdir}ContactDetails/delete/{$id}">usuń</a>
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
      <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#modalAddContactDetails">Dodaj zamowienie</button>
    </div>
  </div>
</div>

<!-- Modal section -->
  <div id="modalAddContactDetails" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">
            <translate>Add contact details</translate>
          </h4>
        </div>
        <div class="modal-body">
          <form action="http://{$smarty.server.HTTP_HOST}{$subdir}ContactDetails/add" method="post" id="contactDetailsForm">
            <div class="form-group">
              <label for="telephoneNumber">
                <translate>Telephone Number</translate>
              </label>
              <input type="text" class="form-control" name="telephoneNumber" required>
            </div>
            <div class="form-group">
              <label for="fax">
                <translate>Fax</translate>
              </label>
              <input type="text" class="form-control" name="fax" required>
            </div>
            <div class="form-group">
              <label for="contactAddressId">
                <translate>ContactAddressId</translate>
              </label>
              {html_options name=contactAddressId options=$address class="form-control"}
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
	<script src="http://{$smarty.server.HTTP_HOST}{$subdir}js/ContactDetailsFormCheck.js"></script>
  </body>
</html>