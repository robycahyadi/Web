<?php	
	include '../koneksi.php';

/*	Nilai bobot kriteria (c1 = 30% , c2 = 20% , c3 = 25% , c4 = 15%, c5 = 10%)*/
	$bobotkriteria = array(0.30,0.20,0.25,0.15,0.10);

?>
<h1 align="center">ini halaman hasil test</h1>


<div class="container">
<!-- 	Tabel Matrik Awal -->
	<div class="card shadow mb-4">
      	<div class="card-header py-3">
          	<h6 class="m-0 font-weight-bold text-primary">Matrik Awal</h6>    
      	</div>      
      	<div class="card-body">
      		<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
      			<thead>
      				<tr>
      					<th>ID Babysitter</th>
      					<th>Nama</th>
      					<th>Kecakapan</th>
      					<th>Penampilan</th>
      					<th>Tes kesehatan</th>
      					<th>Pengetahuan</th>
                                    <th>Wawancara</th>
      					<th>Jumlah Poin</th>
      					<th>Tgl Test</th>
      				</tr>
      			</thead>
      			<tbody>
      				<?php
      					$q1 = mysqli_query($koneksi,"SELECT*FROM babysitter INNER JOIN h_test on babysitter.user_id = h_test.user_id");
      		
      					while ($d1 = mysqli_fetch_assoc($q1)) {
      						
      						$jml_poin = ($d1['c1'])+($d1['c2'])+($d1['c3'])+($d1['c4'])+($d1['c5']);
      				?>
      					<tr>
      						<td><?php echo $d1['user_id'];?></td>
      						<td><?php echo $d1['nama'];?></td>
      						<td><?php echo $d1['c1'];?></td>
      						<td><?php echo $d1['c2'];?></td>
      						<td><?php echo $d1['c3'];?></td>
      						<td><?php echo $d1['c4'];?></td>
      						<td><?php echo $d1['c5'];?></td>
      						<td><?php echo $jml_poin ?></td>
      						<td><?php echo $d1['tanggal_test'];?></td>
      					</tr>

      				<?php

      					}
      				?>
      			</tbody>
      		</table>

      	</div>
    </div>
<!--     Tabel Matrik Normalisasi -->
    <div class="card shadow mb-4">
      	<div class="card-header py-3">
          	<h6 class="m-0 font-weight-bold text-primary">Matrik Normalisasi</h6>    
      	</div>      
      	<div class="card-body">
      		<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      			<thead>
      				<tr>
      					<th>ID Babysitter</th>
      					<th>Nama</th>
      					<th>Kecakapan</th>
      					<th>Penampilan</th>
      					<th>Psikotest</th>
      					<th>Kesehatan</th>
      					<th>Wawancara</th>
      				</tr>
      			</thead>
      			<tbody>
      				<?php
      					$qmax = "SELECT max(c1) AS maxc1,
		      					max(c2) AS maxc2, 
		      					max(c3) AS maxc3, 
		      					max(c4) AS maxc4, 
		      					max(c5) AS maxc5
		      				   FROM h_test";
		      			$dmax = mysqli_query($koneksi,$qmax);
		      			$rmax = mysqli_fetch_array($dmax);
		      			$q2   = "SELECT*FROM babysitter INNER JOIN h_test on babysitter.user_id = h_test.user_id";
		      			$d2   = mysqli_query($koneksi,$q2);
		      			while ($r2 = mysqli_fetch_array($d2)) {
		      			?>

		      		<tr>
		      			<td><?php echo $r2['user_id'];?></td>
		      			<td><?php echo $r2['nama'];?></td>
		      			<!-- <td><?php echo round($r2['c1']/$rmax['maxc1'],2); ?></td>
		      			<td><?php echo round($r2['c2']/$rmax['maxc2'],2); ?></td>
		      			<td><?php echo round($r2['c3']/$rmax['maxc3'],2); ?></td>
		      			<td><?php echo round($r2['c4']/$rmax['maxc4'],2); ?></td>
		      			<td><?php echo round($r2['c5']/$rmax['maxc5'],2); ?></td> -->
		      			<td><?php echo $r2['c1']/$rmax['maxc1']; ?></td>
		      			<td><?php echo $r2['c2']/$rmax['maxc2']; ?></td>
		      			<td><?php echo $r2['c3']/$rmax['maxc3']; ?></td>
		      			<td><?php echo $r2['c4']/$rmax['maxc4']; ?></td>
		      			<td><?php echo $r2['c5']/$rmax['maxc5']; ?></td>
		      		</tr>

		      		<?php
		      			}
      				?>
      			</tbody>
      		</table>

      	</div>
    </div>
<!--     Tabel Penilaian -->
    <div class="card shadow mb-4">
      	<div class="card-header py-3">
          	<h6 class="m-0 font-weight-bold text-primary">Penilaian</h6>    
      	</div>      
      	<div class="card-body">
      		<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      			<thead>
      				<tr>
      					<th>ID Babysitter</th>
      					<th>Nama</th>
      					<th>Total Poin</th>
      					<th>Nilai SAW</th>
                                    <th>Status</th>
      				</tr>
      			</thead>
      			<tbody>
      				<?php 
      					$q3   = "SELECT*FROM babysitter INNER JOIN h_test on babysitter.user_id = h_test.user_id";
		      			$d3   = mysqli_query($koneksi,$q3);
		      			while ($r3 = mysqli_fetch_array($d3)) {

		      				$jumlah = ($r3['c1'])+($r3['c2'])+($r3['c3'])+($r3['c4'])+($r3['c5']);
		      				$poin   = round(	
		      									(($r3['c1']/$rmax['maxc1'])*$bobotkriteria[0])+
		      									(($r3['c2']/$rmax['maxc2'])*$bobotkriteria[1])+
		      									(($r3['c3']/$rmax['maxc3'])*$bobotkriteria[2])+
		      									(($r3['c4']/$rmax['maxc4'])*$bobotkriteria[3])+
		      									(($r3['c5']/$rmax['maxc5'])*$bobotkriteria[4]),3
		      								);
                                          if ($jumlah>=15) {
                                                $status = 'Lulus';
                                          }
                                          else{
                                                $status = 'Tidak Lulus';
                                          }
		      				$data[]=array(
		      						'id'     => ($r3['user_id']),
		      						'nama'   => ($r3['nama']),
		      						'jumlah' => $jumlah,
		      						'poin'   => $poin,
                                                      'status' => $status
		      				);

		      			}
		      			foreach ($data as $key => $isi) {
		      				$uid[$key] =$isi['id'];
		      				$nama[$key]=$isi['nama'];
		      				$jml[$key] =$isi['jumlah'];
		      				$saw[$key] =$isi['poin'];
                                          $stat[$key]=$isi['status'];
            
		      			}
		      			foreach ($data as $item) { ?>
		      			
		      			<tr>
		      				<td><?php echo $item['id'];  ?></td>
		      				<td><?php echo $item['nama']; ?></td>
		      				<td><?php echo $item['jumlah'];  ?></td>
		      				<td><?php echo $item['poin'];  ?></td>
                                          <td><?php echo $item['status'];?></td>
		      			</tr>
		      		<?php
		      			}
      				?>
      				
      			</tbody>
      		</table>

      	</div>
    </div>
</div>