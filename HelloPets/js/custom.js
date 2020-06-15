// Detail Donasi
$('.donasidetail').click(function(){
	$('#myDonasi').modal();
	var id		=	$(this).attr('data-id')
	var tgl		=	$(this).attr('data-tgl')
	var id_user	=	$(this).attr('data-usrid')
	var nama	=	$(this).attr('data-nama')
	var nominal	=	$(this).attr('data-nominal')
	var desc	=	$(this).attr('data-desk')

	$("#myDonasiid").html(id);
	$("#myDonasitgl").html(tgl);
	$('#myDonasiidusr').html(id_user);
	$('#myDonasinama').html(nama);
	$('#myDonasinominal').html(nominal);
	$('#myDonasidesc').html(desc);
	// $("input:text").val(desc);

	console.log('desc ', desc);
})

// Detail Adopsi

$('.detailadopsi').click(function(){
	$('#myAdopsi').modal();
	var id			=	$(this).attr('data-id')
	var idusr		=	$(this).attr('data-idusr')
	var nmuser		=	$(this).attr('data-nmuser')
	var nmhewan		=	$(this).attr('data-nmhewan')
	var jhewan		=	$(this).attr('data-jhewan')
	var uhewan		=	$(this).attr('data-uhewan')
	var gender		=	$(this).attr('data-gender')
	var mail		=	$(this).attr('data-mail')
	var telp		=	$(this).attr('data-telp')
	var alamat		=	$(this).attr('data-alamat')
	var desk		=	$(this).attr('data-desk')
	var mdesk		=	$(this).attr('data-mdesk')
	var pict		= 	$(this).attr('data-pict')
	var status		=	$(this).attr('data-status')
	var pictloc 	=	"../img/adopt-pict/" + pict
	var homepictloc =	"img/adopt-pict/" + pict


	$("#myAdoptid").html(id);
	$("#myAdoptidusrl").html(idusr);
	$('#myAdoptnmuser').html(nmuser);
	$('#myAdoptnmhewan').html(nmhewan);
	$('#myAdoptjhewan').html(jhewan);
	$('#myAdoptuhewan').html(uhewan);
	$("#myAdoptgender").html(gender);
	$("#myAdoptmail").html(mail);
	$('#myAdopttelp').html(telp);
	$('#myAdoptalamat').html(alamat);
	$('#myAdoptdesk').html(desk);
	$('#myAdoptmdesk').html(mdesk);
	$('#myAdoptpict').attr("src",pictloc);
	$('#myAdoptstatus').html(status);
	$('#adoptpict').attr("src",homepictloc);


	console.log(homepictloc);


})

// Detail Hewan Pengajuan Adopsi

$('.detailhewan').click(function(){
	$('#myhewan').modal();
	var id			=	$(this).attr('data-id')
	var nmuser		=	$(this).attr('data-nmuser')
	var nmhewan		=	$(this).attr('data-nmhewan')
	var jhewan		=	$(this).attr('data-jhewan')
	var uhewan		=	$(this).attr('data-uhewan')
	var gender		=	$(this).attr('data-gender')
	var desk		=	$(this).attr('data-desk')
	var mdesk		=	$(this).attr('data-mdesk')
	var pict		= 	$(this).attr('data-pict')
	var pictloc 	=	"../img/adopt-pict/" + pict
	var homepictloc =	"../img/adopt-pict/" + pict


	$("#myAdoptid").html(id);
	$('#myAdoptnmuser').html(nmuser);
	$('#myAdoptnmhewan').html(nmhewan);
	$('#myAdoptjhewan').html(jhewan);
	$('#myAdoptuhewan').html(uhewan);
	$("#myAdoptgender").html(gender);
	$('#myAdoptdesk').html(desk);
	$('#myAdoptmdesk').html(mdesk);
	$('#myAdoptpict').attr("src",pictloc);
	$('#myAdoptstatus').html(status);
	$('#adoptpict').attr("src",homepictloc);


	console.log(homepictloc);


})


// Detail post
$('.postdetail').click(function(){
	$('#myPost').modal();
	var nuser		=	$(this).attr('data-nuser')
	var nhewan		=	$(this).attr('data-nhewan')
	var jhewan 		=	$(this).attr('data-jhewan')
	var mail		=	$(this).attr('data-mail')
	var telp		=	$(this).attr('data-telp')
	var alamat		=	$(this).attr('data-alamat')
	var desc		=	$(this).attr('data-desc')
	var pict		=	$(this).attr('data-pict')
	var pictloc 	=	"../img/post-pict/" + pict
	var homepictloc =	"img/post-pict/" + pict


	$("#myPostnuser").html(nuser);
	$("#myPostnhewan").html(nhewan);
	$('#myPostjhewan').html(jhewan);
	$('#myPostmail').html(mail);
	$('#myPosttelp').html(telp);
	$('#myPostalamat').html(alamat);
	$('#myPostdesc').html(desc);
	$('#myPostpict').attr("src",pictloc);
	$('#myPosthomepict').attr("src",homepictloc);

	console.log('desc ', homepictloc);
})


// Detail post
$('.detailcmnt').click(function(){
	$('#myPostComment').modal();

	var nama		=	$(this).attr('data-nama')
	var mail 		=	$(this).attr('data-email')
	var telp		=	$(this).attr('data-telp')
	var alamat		=	$(this).attr('data-alamat')
	var ket		=	$(this).attr('data-ket')
	var pict		=	$(this).attr('data-pict')
	var pictloc 	=	"../img/comment-pict/" + pict


	$("#myCommentNama").html(nama);
	$("#myCommentMail").html(mail);
	$('#myCommentTelp').html(telp);
	$('#myCommentAlamat').html(alamat);
	$('#myCommentKet').html(ket);
	$('#myCommentPict').attr("src",pictloc);

	console.log('desc ', homepictloc);
})


// Detail User
$('.userdetail').click(function(){
	$('#userData').modal();
	var id			=	$(this).attr('data-id')
	var nama		=	$(this).attr('data-nama')
	var email		=	$(this).attr('data-email')
	var telp		=	$(this).attr('data-telp')
	var alamat		=	$(this).attr('data-alamat')
	var pict		=	$(this).attr('data-pict')
	var pictloc 	=	"../img/profile_pict/" + pict

	$("#usrDataid").html(id);
	$("#usrDatanama").html(nama);
	$('#usrDataemail').html(email);
	$('#usrDatatelp').html(telp);
	$('#usrDataalamat').html(alamat);
	$('#usrDatapict').attr("src",pictloc);

	console.log('desc ', pictloc);

})



// Approve & delete
$('.delete').click(function(){
    var id=$(this).data('id');
    $('#modalDelete').attr('href','functions.php?action=deleteadopt&id='+id);
})

$('.approve').click(function(){
    var id=$(this).data('id');
    $('#modalApprove').attr('href','functions.php?action=approveadopt&id='+id);
})

$('.ajukanadopsi').click(function(){
    var id=$(this).data('id');
    $('#ajukan').attr('href','index.php?page=isi-form-pengajuan&iddns='+id);
})

$('.postcomment').click(function(){
    var id=$(this).data('id');
    $('#comment').attr('href','index.php?page=postcomment&idpost='+id);
})

$('.founded').click(function(){
    var id=$(this).data('id');
    $('#modalFound').attr('href','functions.php?action=founded&id='+id);
})

$('.userDeletePost').click(function(){
    var id=$(this).data('id');
    $('#userDelPost').attr('href','functions.php?action=deletePost&id='+id);
})

$('.userDeleteAdopt').click(function(){
    var id=$(this).data('id');
    $('#userDelAdopt').attr('href','functions.php?action=deleteAdopt&id='+id);
})

$('.admDeletePost').click(function(){
    var id=$(this).data('id');
    $('#admDelPost').attr('href','functions.php?action=deletePost&id='+id);
})




// Update Profile Pict
function readURL(input) {
	if (input.files && input.files[0]) {
		var reader = new FileReader();

		reader.onload = function (e) {
			$('#pict')
			.attr('src', e.target.result);
		};

		reader.readAsDataURL(input.files[0]);
	}
}
