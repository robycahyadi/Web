<?php 
	include '../koneksi.php';
?>

<h1 align="center">BabySitter</h1>

<br>
	<div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">List Babysitter</h6>    
      </div>      
      <div class="card-body">      
        <div class="table-responsive">      
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">      
            <thead>      
              <tr>      
                <th>ID Baby</th>      
                <th>Nama</th>      
                <th>Email</th>      
                <th>No.Telp</th>
                <th>TGL Lahir</th>      
                <th>Gender</th>      
                <th>Alamat</th>
                <th>Aksi</th>      
              </tr>      
            </thead>
            <tbody>
            	<?php
                        $sql="SELECT*FROM babysitter";
                        if (!$result=  mysqli_query($koneksi, $sql)){
                        die('Error:'.mysqli_error($koneksi));
                        }  else {
                        if (mysqli_num_rows($result)> 0){
                        while ($row=  mysqli_fetch_assoc($result)){
                ?>
            	<tr>
            		<td><?php echo $row['user_id']; ?></td>
            		<td><?php echo $row['nama']; ?></td>
            		<td><?php echo $row['email']; ?></td>
            		<td><?php echo $row['no_telp']; ?></td>
            		<td><?php echo $row['tgl_lahir']; ?></td>
            		<td><?php echo $row['gender']; ?></td>
            		<td><?php echo $row['alamat']; ?></td>
            		<td><a href="index.php?page=info_baby&idbs=<?php echo $row['user_id'];?>" class="btn btn-info">Detail</a></td>
            	</tr>
            <?php } } else { ?>
            	<tr>
            		<td>Maaf Data Tidak Ditemukan</td>
            	</tr>
           	<?php }}?>
            </tbody>      
         </table>       
        </div>      
      </div>           
    </div> 
