<fieldset><legend>Pilih Anggota</legend>

<?php echo $this->session->flashdata("k");?>


<form action="<?=base_URL()?>apps/trans/add" method="post" accept-charset="utf-8" enctype="multipart/form-data" name="f_pilih_anggota" onsubmit="return cek()" >	

<div class="well">
<label style="width: 150px; float: left">Nama Anggota</label>

<input type="hidden" name="id_anggota" id="id_anggota"> &nbsp;
<input class="span2" type="text" name="induk" id="induk"placeholder="No Induk" required readonly> &nbsp;
<input class="span4" type="text" name="nama" id="nama" placeholder="Nama Anggota" readonly> &nbsp; 
<input type="button" class="btn btn-warning" style="margin-top: -10px" onclick="openanggota()" value="Cari"><br>

<!--<input class="span2" type="text" name="id_anggota" placeholder="ID Anggota" required readonly> &nbsp;<input class="span4" type="text" name="nama_anggota" placeholder="Nama Anggota"> &nbsp; <a href="" class="btn btn-warning" style="margin-top: -10px">Cari</a>--><br>
<?php 
$q_instansi	= $this->db->query("SELECT * FROM r_config LIMIT 1")->row();
?>

<label style="width: 150px; float: left">Jumlah Buku</label><input class="span1" type="text" name="jml_buku" required> &nbsp;&nbsp;*) Maksimal <?=$q_instansi->maks_buku?><br>

<label style="width: 150px; float: left"></label><button type="submit" class="btn btn-primary">Lanjutkan</button>
</div>
</form></fieldset>

<div class="modal hide fade" id="myModal">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h3>Cari Anggota</h3>
	</div>

	<div class="modal-body">
		<form class="form" method="post" id="cari_kode">
			<input type="text" id="kata_kunci" class="span10" name="kata_kunci" autofocus placeholder="kata kunci : no induk / nama" required style="width: 80%">
			<button type="submit" class="btn btn-success" style="margin-top: -10px;">Cari</button>
		</form>
		<div id="hasil_cari"></div>
	</div>
	<div class="modal-footer">
		<a href="#" class="btn" id="" class="close" data-dismiss="modal" aria-hidden="true">Close</a>
	</div>
</div>

<script type="text/javascript">
$(document).on("ready", function() {
	$("#cari_kode").submit(function(event) {
		event.preventDefault();
		$.ajax({
			type: "POST",
			url: "<?php echo base_url(); ?>apps/trans/carianggota",
			data: $("#cari_kode").serialize(),
			success: function(response) {
				$("#hasil_cari").html(response);
			}
		});
		return false;
    });
});

function openanggota() {
	$("#kata_kunci").val('');
	$("#hasil_cari").html('');
	$('#myModal').modal("show");
}

function isikan_kode(id, induk, nama) {
	$("#id_anggota").val(id);
	$("#induk").val(induk);
	$("#nama").val(nama);
	$('#myModal').modal('hide');
	return false;
}

function cek() {
	var x=document.forms["f_pilih_anggota"]["jml_buku"].value;

	if (x > <?=$q_instansi->maks_buku?>) {
	  alert("Maksimal jumlah peminjaman adalah <?=$q_instansi->maks_buku?> buku..!!");
	  return false;
	}
}
</script>