         <?php $profile = showProfile(); 
         	foreach ($profile as $data) {
         		# code...
         	}
         ?>
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Profile</h1>
          </div> 

          <!-- Content Row -->

          <div class="row">
          	
          	<div class="col-xl-4 col-md-6 mb-4">

          		<div class="card shadow mb-4 border-bottom-primary">
          			<div class="card-header py-3">
	                	<h6 class="m-0 font-weight-bold text-primary">Profile Picture</h6>
	                </div>
	                <div class="card-body" align="center">
	                	<?php if (!empty($data["pict"])) :?>
	                		<img class="img-profile rounded-circle" style="width:160px; height: 160px;" src="../img/profile_pict/<?= $data["pict"]; ?>">
                		<?php else : ?>
                			<img class="img-profile rounded-circle" style="width:160px; height: 160px;" src="../img/profil_pict.png">
                		<?php endif; ?>
	                </div>
	                <div class="card-footer py-3" align="right">
	                	<button class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Update</button>
	                </div>
              	</div>
          		
          	</div>

          	<div class="col-xl-8 col-md-6 mb-4">

          		<div class="card shadow mb-4 border-bottom-primary">
          			<div class="card-header py-3">
	                	<h6 class="m-0 font-weight-bold text-primary">Profile Data</h6>
	                </div>
	                <div class="card-body">
	                	<div class="table-responsive">
	                		<table class="table" width="100%" cellspacing="0">
	                			<tbody>
	                				<tr>
	                					<td>ID</td>
	                					<td>:</td>
	                					<td><?= $data["id"]; ?> </td>
	                				</tr>
	                				<tr>
	                					<td>Nama</td>
	                					<td>:</td>
	                					<td><?= $data["nama"]; ?> </td>
	                				</tr>
	                				<tr>
	                					<td>Email</td>
	                					<td>:</td>
	                					<td><?= $data["email"]; ?> </td>
	                				</tr>
	                				<tr>
	                					<td>No.Telp</td>
	                					<td>:</td>
	                					<td><?= $data["telp"]; ?> </td>
	                				</tr>
	                				<tr>
	                					<td>Alamat</td>
	                					<td>:</td>
	                					<td><?= $data["alamat"]; ?> </td>
	                				</tr>
	                			</tbody>
	                			
	                		</table>
	                	</div>
	                </div>
	                <div class="card-footer py-3" align="right">
	                	<button class="btn btn-success" data-toggle="modal" data-target="#Modal">Update</button>
	                </div>
              	</div>
          		
          	</div>


          </div>
          <!-- end content row -->

          <!-- Modal Login Register -->
      <!-- Login -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" align="center" id="exampleModalLabel">Update Profile Picture</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="functions.php?action=pictupload" method="post" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="form-group" align="center">
                  <img class="img-profile rounded-circle" id="pict" style="width:160px; height: 160px;" src="../img/profile_pict/<?= $data["pict"]; ?>">
                </div>
                <div class="form-group">
                	<input type='file' name="picture" onchange="readURL(this);" />
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-success" value="Update">
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- Register -->
      <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="ModalLabel">Update Profile Data</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="functions.php?action=updateprofile" method="post">
              <div class="modal-body">
              	<div class="form-group">
                  <label for="name">ID</label>
                  <input type="text" name="id" class="form-control" id="name" aria-describedby="emailHelp" value="<?= $data['id'];  ?>"  readonly>
                </div>
               <div class="form-group">
                  <label for="name">Nama</label>
                  <input type="text" name="nama" class="form-control" id="name" aria-describedby="emailHelp" value="<?= $data['nama'];  ?>" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email</label>
                  <input type="email" name="mail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $data['email'];  ?>" readonly>
                </div>
                <div class="form-group">
                  	<label for="phone">No Telp</label>
 					<input type="tel" id="phone" class="form-control" name="phone" placeholder="08xxxxxxxxxx" pattern="[0-9]{4}[0-9]{4}[0-9]{4}" value="<?= $data['telp'];  ?>" required>
 					<small id="emailHelp" class="form-text text-muted">Format: 08xxxxxxxxxx</small>
                </div>
                <div class="form-group">
                  <label for="cpass">Alamat</label>
                  <textarea name="alamat" class="form-control" id="cpass" placeholder="<?= $data['alamat'];  ?>" required><?= $data['alamat'];  ?></textarea>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Update</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- end Modal -->