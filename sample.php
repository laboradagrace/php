<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2>Manage <b>Medicines</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="" class="btn btn-success" data-toggle="modal" data-target="#addMedModal"><i class="material-icons">&#xE147;</i> <span>Add New Medicine</span></a>		
					</div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
						<th>Id</th>
                        <th>Brand Name</th>
                        <th>Generic Name</th>
						<th>Type</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
					<?php
						include ("medicine.php");
						$medarr = [];
						
						$link = mysqli_connect("localhost", "root", "", "pntraining");
						
						// Check connection
						if($link === false){
							die("ERROR: Could not connect. " . mysqli_connect_error());
						}
						
						// Attempt select query execution
						$sql = "SELECT * FROM medicines";
						$result = mysqli_query($link, $sql);
						if($result){
							if(mysqli_num_rows($result) > 0){
								while($row = mysqli_fetch_array($result)){
									$id = $row["id"];
									echo "<tr>";
									echo "<td>". $id. "</td>";
									array_push($medarr, $id = $row["id"]);
									echo "<td>". $brandname = $row["Brandname"]. "</td>";
									echo "<td>". $genericname = $row["Genericname"]. "</td>";
									echo "<td>". $type = $row["type"]. "</td>";
									echo "<td>". $price = $row["price"]. "</td>";
									echo "<td>". $quantity = $row["quantity"]. "</td>";
							
									echo '<td>
									<a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
									' ;
									echo"<a href='delMed.php?id=". $row['id'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
									echo "</tr>";
								}
								
							} else{
								echo "No records matching your query were found.";
							}
						} else{
							echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
						}
						mysqli_close($link);
					?>
                    
                </tbody>
            </table>
			
        </div>
    </div>
	<!-- add Modal HTML -->
	<div id="addMedModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action ="addMed.php" method= "post">
					<div class="modal-header">						
						<h4 class="modal-title">Add Medicine</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Brand name</label>
							<input type="text" class="form-control" name = "brandname" required>
						</div>
						<div class="form-group">
							<label>Generic name</label>
							<input type="text" class="form-control" name = "genericname" required>
						</div>
						<div class="form-group">
							<label>type</label>
							<textarea class="form-control" name = "type" required></textarea>
						</div>
						<div class="form-group">
							<label>price</label>
							<input type="text" class="form-control" name = "price" required>
                        </div>
                        <div class="form-group">
							<label>quantity</label>
							<input type="text" class="form-control" name = "quantity" required>
						</div>					
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-success" value="Add" name = "submit">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Edit Modal HTML -->
	<div id="editEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
					<div class="modal-header">						
						<h4 class="modal-title">Edit Employee</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Name</label>
							<input type="text" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Address</label>
							<textarea class="form-control" required></textarea>
						</div>
						<div class="form-group">
							<label>Phone</label>
							<input type="text" class="form-control" required>
						</div>					
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-info" value="Save">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Delete Modal HTML -->
	<div id="deleteEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action = "delMed.php" method = "post">
					<div class="modal-header">						
						<h4 class="modal-title">Delete Medicine</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<p>Are you sure you want to delete these Records?</p>
						<p class="text-warning"><small>This action cannot be undone.</small></p>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" name = "submit" class="btn btn-danger" value="Delete" >
					</div>
				</form>
			</div>
		</div>
	</div>
<form action = "logout.php" method = "post">
	<button type="submit" name= "logout" class="btn">Logout</button>
</form>

