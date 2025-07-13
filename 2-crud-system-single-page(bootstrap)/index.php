<?php
    if ($_SERVER['REQUEST_METHOD']=='POST') 
	{
        // Only works if addContactBtn button clicked.
		if(isset($_POST['addContactBtn']))
        {
            echo($_POST['nameInput']);
            echo($_POST['contactInput']);
            echo($_FILES['profilePicbtn']['name']);
        }
	}
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
                        
                        <!-- Model Add Button -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addContact">
                            + Contact
                        </button>  

                        <!-- Modal Add Contact -->
                        <div class="modal fade" id="addContact" aria-hidden="true">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="modal-dialog">
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
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
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
                                        <button type="button" class="btn btn-none" data-bs-toggle="modal" data-bs-target="#updatePic">
                                            <img src="theme/img/01.jpg" class="rounded-circle" style="width:50px;">
                                        </button>
                                    </td>
                                    <td>Anisur Rahman</td>
                                    <td>01871123427</td>
                                    <td>
                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editContact">
                                            Edit
                                        </button>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteContact">
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                                <!-- Modal Update Pic -->
                                <div class="modal fade" id="updatePic" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Update Pic</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <img src="theme/img/01.jpg" class="rounded-circle" style="width:200px;">

                                            <div class="mb-3">
                                                <label for="formFile" class="form-label">Upload <Picture></Picture></label>
                                                <input class="form-control" type="file" id="formFile">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Updoad</button>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal Edit Contact -->
                                <div class="modal fade" id="editContact" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
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
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save</button>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal Delete Contact -->
                                <div class="modal fade bg-danger" id="deleteContact" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                            <button type="button" class="btn btn-danger">Yes</button>
                                        </div>
                                        </div>
                                    </div>
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