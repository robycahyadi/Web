<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h1 mb-0 text-gray-800">Form Pengajuan Adopsi</h1>
</div>

<div class="card shadow mb-4">
	<div class="card-body">
		<form action="functions.php?action=ajukanadopt" method="post">
			<div class="row">
				<div class="col">
					<div class="form-group">
						<label for="ID">ID Adopsi</label>
						<input type="text" name="idAdopt" id="ID" class="form-control" value="<?= $_GET['iddns'];?>" readonly>
					</div>
					<div class="form-group">
						<label for="nama">Nama</label>
						<input type="text" name="nama" id="nama" class="form-control"value="<?= $_SESSION['nama'];?>" readonly>
					</div>
					<div class="form-group">
						<label for="telp">No.Telp</label>
						<input type="text" name="telp" id="telp" class="form-control" value="<?= $_SESSION['telp'];?>" readonly>
					</div>
					<div class="form-group">
						<label for="alamat"></label>
						<input type="text" name="alamat" id="alamat" class="form-control" value="<?= $_SESSION['alamat'];?>" readonly>
					</div>
				</div>
				<div class="col">
					<label for="pengalaman">Bagaimana pengetahuan yang anda miliki tentang hewan yang akan anda adopsi ?</label>
					<div class="form-group" id="pengalaman">
						<input type="radio" name="pengalaman" id="baik" value="Baik" required>
						<label for="baik">Baik</label>
						<input type="radio" name="pengalaman" id="cukup" value="cukup" required>
						<label for="cukup">Cukup</label>
						<input type="radio" name="pengalaman" id="kurang" value="kurang" required>
						<label for="kurang">Kurang</label>
					</div>
					<div class="form-group">
						<label for="alasan">Mengapa anda ingin mengadopsi hewan ini ?</label>
						<textarea class="form-control" id="alasan" name="alasan" required></textarea>
					</div>
					<div class="form-group">
						<input type="checkbox" name="tos" id="tos" required>
						<label for="tos">I agree to the <a href="#" data-toggle="modal" data-target="#modalTOS">Terms of Service and Privacy Policy</a></label>
					</div>
				</div>
			</div>

		</div>
		<div class="card-footer">
			<button type="submit" class="btn btn-success">Ajukan</button>
		</div>
	</form>
</div>

<!-- Modal TOS -->
<div class="modal fade" id="modalTOS" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Harap disimak dengan baik</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<h5 class="card-title">Syarat & Ketentuan</h5>
				<div class="card-text">
					<ol>
						<li>Adopsi adalah bentuk dukungan akan perbaikan animal welfare, yakni memberikan kesempatan kedua hewan-hewan ini untuk mendapatkan cinta dan rumah yang penuh kasih sayang</li>
						<li>Adopsi ini <strong>GRATIS</strong> dan tidak dipungut biaya apapun</li>
						<li>Adopsi ini gratis, namun tidak berarti hewan-hewan ini tidak dilindungi oleh hukum. Hewan yang diadopsi tetap akan ada dalam pengawasan kami untuk keberadaan dan keselamatannya.</li>
						<li>Para adopter <strong>WAJIB PRO-STERIL</strong> untuk menjaga populasi.</li>
						<li>Adopter wajib memberikan syarat dasar hidup layak bagi hewan-hewan yang diadopsi, antara lain namun tidak terbatas pada: makan dan minum layak standar hewan, tempat tinggal layak, tidak dirantai dan dikandang sepanjang waktu, wajib vaksinasi rutin tahunan, kesanggupan merawat jika nanti sakit dan diperlukan tindakan medis.</li>
						<li>Adopter <strong>DILARANG MEMINDAH-TANGANKAN/MENJUAL</strong>/tindakan apapun yang berkaitan dengan keberadaan hewan yang diadopsi tanpa sepengetahuan dan ijin dari pihak HalloPets dan pihak Asal hewan tersebut.</li>
						<li>Hewan yang diadopsi wajib dilaporkan kondisinya per 1 (satu) bulan sekali minimum via email, Twitter, maupun Facebook HalloPets</li>
						<li>Jika ada permasalahan apapun, baik dari perilaku, perlawanan dari lingkungan, dan sejenisnya, adopter <strong>WAJIB</strong> memberitahukan kepada HalloPets untuk mencari solusi bersama.</li>
						<li>HalloPets berhak untuk turut campur dan mengawasi proses penyelesaian masalah yang terkait dengan hewan yang di adopsi dari Aplikasi HalloPets</li>
						<li>Para adopter <strong>WAJIB MENDUKUNG ANTI PERDAGANGAN DAGING ANJING/KUCING dan TIDAK MENGKONSUMSI DAGING ANJING/KUCING</strong> sebagai bentuk komitmen dukungan terhadap animal welfare</li>
						<li>Adopter tidak diperbolehkan memberikan menu yang melenceng dari kodrat hewani para hewan yang di adopsi, dalam hal ini, anjing merupakan hewan omnivore (makan daging dan sayuran) dan kucing merupakan hewan karnivora (pemakan daging/non-sayuran). Anjing wajib mendapatkan menu sehat dan tidak full vegetarian agar mendapatkan nutrisi yang diperlukan.</li>
						<li>Admin HalloPets berhak menolak permintaan Anda untuk mengadopsi hewan.</li>
						<li>Pihak HalloPets dan Pengampungan Hewan Asal berhak untuk mengunjungi hewan yang telah diadopsi secara berkala untuk memantau perkembangan hidupnya. Pemilik baru harus mengizinkan Pihak HalloPets untuk mengambil foto hewan tersebut dan mempublikasikan foto-foto terkait sebagai bukti pertanggungjawaban.</li>
					</ol> 
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
  <!-- End Modal TOS -->