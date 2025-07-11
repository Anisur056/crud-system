<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>crud-multipage-read</title>
	<link rel="stylesheet" href="bootstrap.min.css">
  </head>
  <body>
    <section class="container py-5">
      <div class="card table-responsive">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5>Crud-Multipage-read</h5>
          <a href="add.php" class="btn btn-sm btn-primary">+ Add Name</a>
        </div>
        <div class="card-body">
          <table class="table table-hover table-bordered table-sm">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
				<?php
					require ("db-config.php");
					$sql = "SELECT * FROM `tbl_user`";
					$execute = mysqli_query($dbConnection,$sql);
					while($data = mysqli_fetch_assoc($execute)):?>
						<tr>
							<th scope="row"><?= $data['id'] ?></th>
							<td><?= $data['name'] ?></td>
							<td>
								<a class="btn btn-sm btn-info" href='update.php?id=<?= $data['id'] ?>'>Edit</a>
								<a class="btn btn-sm btn-danger" href='delete.php?id=<?= $data['id'] ?>'>Delete</a><br>
							</td>
						</tr>
				<?php endwhile; ?>
            </tbody>
          </table>
        </div>
      </div>
    </section>


    <script src="bootstrap.bundle.min.js"></script>
  </body>
</html>