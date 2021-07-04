<?php
$mode	= $this->uri->segment(3);

if ($mode == "edt" || $mode == "act_edt") {
	$act		= "act_edt";
	$idp		= $datpil->id;
	$kode		= $datpil->kode;
	$nama		= $datpil->nama;
	$readonly	= "readonly";
	
} else {
	$act		= "act_add";
	$idp		= "";
	$kode		= "";
	$nama		= "";
	$readonly	= "";
}
?>
<form action="<?=base_URL()?>apps/r_kelas/<?=$act?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">	
<input type="hidden" name="idp" value="<?=$idp?>">

	<fieldset><legend>Form</legend>
	<?php echo $this->session->flashdata("k");?>
	
	<label style="width: 150px; float: left">Kode</label><input class="span1" type="text" name="kode"  value="<?=$kode?>" <?=$readonly?>><br>
	<label style="width: 150px; float: left">Nama</label><input class="span8" type="text" name="nama" placeholder="Nama" value="<?=$nama?>" required><br>
	<button type="submit" class="btn btn-primary">Submit</button>
	</fieldset>
</form>