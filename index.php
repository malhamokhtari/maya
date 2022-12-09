<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP CRUD using Ajax and DataTables</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<?php
                include 'navbar.php';
         ?>


        <link rel="stylesheet" href="style.css" >
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="DataTables/datatables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.0/css/buttons.dataTables.min.css">
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="DataTables/datatables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.0/js/dataTables.buttons.min.js"></script>

    <script src="js/script.js"></script>
    <style>
        button.dt-button.btn-primary{
            background:var(--bs-primary)!important;
            color:white;
        }
    </style>
</head>

<body class="">
<nav class="navbar navbar-expand-lg navbar-light bg-dark bg-gradient">
  <div class="container">
  </div>
</nav>

    <div class="container py-7 h-100">
        <div class="row">
            <div class="col-lg-12">
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12" id="msg"></div>
	</div>
<label>
<select id="status" class="select-css">

                        <option value="">Sort by</option>
                        <option value="GR1">GR1</option>
                        <option value="GR2">GR2</option>
                        <option value="GR3">GR3</option>


                    </select>
</label>
        <div class="row">
            <div class="col-lg-12">
                <table class="table table-hover table-bordered table-striped" id="authors-tbl">
                    <thead>
                        <tr class="bg-dark text-light bg-gradient bg-opacity-150">
                            <th class="px-1 py-1 text-center">id</th>
                            <th class="px-1 py-1 text-center">First Name</th>
                            <th class="px-1 py-1 text-center">Last Name</th>
			                <th class="px-1 py-1 text-center">Email</th>
                            <th class="px-1 py-1 text-center">Age</th>
                             <th class="px-1 py-1 text-center">Groupes</th>
                            <th class="px-1 py-1 text-center">Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <!-- Add Modal -->
<div class="row">
    <div class="modal fade" id="add_modal" data-bs-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Author</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <form action="" id="new-author-frm">
                            <div class="form-group">
                                <label for="first_name" class="control-label">First Name</label>
                                <input type="text" class="form-control rounded-0" id="first_name" name="first_name" required>
                            </div>
                            <div class="form-group">
                                <label for="last_name" class="control-label">Last Name</label>
                                <input type="text" class="form-control rounded-0" id="last_name" name="last_name" required>
                            </div>
                            <div class="form-group">
                                <label for="email" class="control-label">Email</label>
                                <input type="email" class="form-control rounded-0" id="email" name="email" required>
			    </div>
                            <div class="form-group">
                                <label for="age" class="control-label">Age</label>
                                <input type="number" onkeydown="javascript: return event.keyCode == 69 ? false : true"  class="form-control rounded-0" id="age" name="age" required>
                            </div>
							<div class="form-group">
                                <label for="groupes" class="control-label">Groupes</label>
                                <select type="text" class="form-control rounded-0" id="groupes" name="groupes" required>
												s<option value="GR1">GR1</option>
												<option value="GR2">GR2</option>
												<option value="GR3">GR3</option>
								</select>

			    </div>
                            

                            
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" form="new-author-frm">Save</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- /Add Modal -->
    <!-- Edit Modal -->
    <div class="modal fade" id="edit_modal" data-bs-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Author's Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <form action="" id="edit-author-frm">
                            <input type="hidden" name="id">
                            <div class="form-group">
                                <label for="first_name" class="control-label">First Name</label>
                                <input type="text" class="form-control rounded-0" id="first_name" name="first_name" required>
                            </div>
                            <div class="form-group">
                                <label for="last_name" class="control-label">Last Name</label>
                                <input type="text" class="form-control rounded-0" id="last_name" name="last_name" required>
                            </div>
                            <div class="form-group">
                                <label for="email" class="control-label">Email</label>
                                <input type="text" class="form-control rounded-0" id="email" name="email" required>
			    </div>
                            <div class="form-group">
                                <label for="age" class="control-label">Age</label>
                                <input type="number" onkeydown="javascript: return event.keyCode == 69 ? false : true"  class="form-control rounded-0" id="age" name="age" required>
                            </div>
							<div class="form-group">
                                <label for="groupes" class="control-label">Groupes</label>
                                <select type="text" class="form-control rounded-0" id="groupes" name="groupes" required>
												<option value="GR1">GR1</option>
												<option value="GR2">GR2</option>
												<option value="GR3">GR3</option>	
                    </select>
												
			    </div>
                            
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" form="edit-author-frm">Save</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- /Edit Modal -->
    <!-- Delete Modal -->
    <div class="modal fade" id="delete_modal" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirm</h5>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <form action="" id="delete-author-frm">
                            <input type="hidden" name="id">
                            <p>Are you sure to delete <b><span id="name"></span></b> from the list?</p>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger" form="delete-author-frm">Yes</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">No</button>
                </div>
            </div>
        </div>
    </div>
    <!-- /Delete Modal -->
</body>

</html>


