<?php
	include '../koneksi.php';
?>
<h1 align="center">Antrian Test</h1>

<div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">List Antrian</h6>    
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
                <th>Gender</th>
                <th>Tanggal Test</th>    
                <th>Aksi</th>      
              </tr>      
            </thead>
            <tbody>
            	<?php
						$sql = "SELECT babysitter.user_id, babysitter.nama, babysitter.email, babysitter.no_telp, babysitter.gender, tgl_test.tanggal_test FROM babysitter INNER JOIN tgl_test ON babysitter.user_id = tgl_test.user_id";
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
            		<td><?php echo $row['gender']; ?></td>
            		<td><?php echo $row['tanggal_test']; ?></td>
            		<td><a href="index.php?page=testsaw&idbs=<?php echo $row['user_id'];?>&tgltest=<?php echo $row['tanggal_test'];?>" class="btn btn-info">Lakukan Test</a></td>
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

