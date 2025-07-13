<?php
    // database configuration.
    try 
    {
        $db_host = "localhost";
        $db_user = "root";
        $db_pass = "";
        $db_name = "test";
        
        $pdo = new PDO("mysql:host=$db_host;dbname=$db_name",$db_user,$db_pass);
    } 
    catch (PDOException $e) 
    {
        die($e->getMessage());
    }
?>

<?php

    // verify if request method is post & submited via html form.
    if ($_SERVER['REQUEST_METHOD']==='POST') 
	{
        // Only works if addContactBtn button clicked.
		if(isset($_POST['addContactBtn']))
        {
            // Takes values of submited html form.
            // in html {name="..."} attribute in required.
            $name = $_POST['nameInput'];
            $contact = $_POST['contactInput'];

            // Verify if file exists/ uploded or not, if does then upload profile pic. 
            if(file_exists($_FILES['profilePicbtn']['tmp_name']))
            {
                // Takes name value of the uploded file.
                $profie_pic = $_FILES['profilePicbtn']['name'];

                // Takes uploded file extension.
                $file_array = explode('.',$profie_pic);
                $file_ext = $file_array[1];

                // Takes tamporary uploaded file location.
                $tmp_location = $_FILES['profilePicbtn']['tmp_name'];

                // Name the uploded file a new random number name.
                // New location for uploding profile image.
                $move_file_location = 'uploads/'.rand().'.'.$file_ext;

                // Move tamporary file to uploads folder
                move_uploaded_file($tmp_location, $move_file_location);
            }else{
                // If file not exists or uploded, then set profile image default.
                $move_file_location = 'uploads/default.jpg';
            }

            // Sql command to insert data.
            $insert = $pdo->prepare('INSERT INTO `tbl_user` (`name`,`contact`,`pic`) VALUES(?,?,?)');
            $insert->execute([$name, $contact, $move_file_location]);

        }

        // Only works if addContactBtn button clicked.
		if(isset($_POST['updateContentBtn']))
        {
            echo("update");
            //UPDATE VALUES WITH PREPARE STATEMENT............./////////////////////////////////
            // $update = $pdo->prepare('UPDATE phone SET phone=? WHERE id=?');
            // $update->execute(['+977 2687434','3']);
        }

        // Only works if addContactBtn button clicked.
		if(isset($_POST['deleteContentBtn']))
        {
            echo("delete");
            //DELETE VALUES WITH PREPARE STATEMENT............./////////////////////////////////
            // $delete = $pdo->prepare('DELETE FROM phone WHERE id=?');
            // $delete->execute(['4']);
        }
	}

	//SELECT VALUES WITH PREPARE STATEMENT............./////////////////////////////////
	// $select = $pdo->prepare('SELECT * FROM phone WHERE name=? LIMIT 5');
	// $select->execute(['RAIHAN UDDIN']);

	// while ($row = $select->fetch()) {
	// 	echo '<table><tr>';
	// 	echo '<td>'.$row['id'].'<td>';
	// 	echo '<td>'.$row['name'].'<td>';
	// 	echo '<td>'.$row['phone'].'<td>';
	// 	echo '<td>'.$row['date'].'<td>';
	// 	echo '</tr></table>';
	// }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>crud-system-single-page(bootstrap)</title>
        <link rel="stylesheet" href="theme/css/bootstrap.min.css">
        <link rel="stylesheet" href="theme/css/app.css">
    </head>
    <body>
        <main>
            <div class="container">
                <div class="card my-5">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span class="fs-5">crud-system-single-page(bootstrap)</span>
                        
                        <!-- Button: add button for open modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addContact">
                            + Contact
                        </button>  

                        <!-- Modal: open add contact form modal-->
                        <div class="modal fade" id="addContact" aria-hidden="true">
                            <div class="modal-dialog">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-6">Add Contact</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-floating mb-3">
                                                <input name="nameInput" type="text" class="form-control" id="floatingInput" placeholder="">
                                                <label for="floatingInput">Name (Fast Name, Last Name)</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input name="contactInput" type="text" class="form-control" id="floatingInput" placeholder="">
                                                <label for="floatingInput">Contact (+88 01000 000 000)</label>
                                            </div>
                                            <div class="form-control mb-3">
                                                <label for="formFileSm" class="form-label">Upload Pic</label>
                                                <input name="profilePicbtn" class="form-control" id="formFileSm" type="file">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button name="addContactBtn" type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-sm table-hover">
                            <thead>
                                <tr>
                                    <th>Profile</th>
                                    <th>Name</th>
                                    <th>Contact</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <img src="theme/img/01.jpg" class="rounded-circle" style="width:50px;">
                                    </td>
                                    <td>Anisur Rahman</td>
                                    <td>01871123427</td>
                                    <td>
                                        <!-- Button: edit button for open edit modal form -->
                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editContact">
                                            Edit
                                        </button>

                                        <!-- Button: delete button for open delete modal form -->
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteContact">
                                            Delete
                                        </button>
                                    </td>
                                </tr>

                                <!-- Modal: open edit contact form modal -->
                                <div class="modal fade" id="editContact" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <form method="post" enctype="multipart/form-data">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Contact</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="floatingInput" placeholder="">
                                                    <label for="floatingInput">Name (Fast Name, Last Name)</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="floatingInput" placeholder="">
                                                    <label for="floatingInput">Contact (+88 01000 000 000)</label>
                                                </div>
                                                <div class="form-control mb-3">
                                                    <label for="formFileSm" class="form-label">Upload Pic</label>
                                                    <input name="profilePicbtn" class="form-control" id="formFileSm" type="file">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button name="updateContentBtn" type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <!-- Modal: open delete contact form modal -->
                                <div class="modal fade bg-danger" id="deleteContact" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <form method="post">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Contact</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Are You Want to Delete this Contact?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">No</button>
                                                <button name="deleteContentBtn" type="submit" class="btn btn-danger">Yes</button>
                                            </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>








        <script src="theme/js/bootstrap.bundle.min.js"></script>
        <script src="theme/js/app.js"></script>
    </body>
</html>