<style type="text/css">
table { font-size: 12px; font-family: arial }
tr, td { vertical-align: top; padding: 0px }
</style>

<div style="width: 210mm; margin: 0.5mm;">
<?php
$i = $this->db->query("SELECT * FROM r_config LIMIT 1")->row();

foreach ($data as $d) {
?>

<div style="; margin-right: 10px; margin-top: 5px; margin-bottom: 18px; width: 90mm; height: 60mm; display: inline; float: left; border: solid 1px; padding: 5px">
<table width="100%">
<tr>
<td style="text-align: center; width: 100px" rowspan="2">NO.</td>
<td style="text-align: center" colspan="2"><img src="<?=base_URL()?>aset/<?=$i->logo?>" style="width: 50px; height: 50px"></td>
</tr>
<tr>
<td style="" colspan="2"><b style="font-size: 12px">PERPUSTAKAAN <?=strtoupper($i->nama)?></b><br><span style="font-size: 10px">Alamat : <?=$i->alamat?></span></td>
</tr>
<tr><td colspan="4" style="text-align: center"><hr></td></tr>

<tr><td>Nama Pengarang</td><td>:</td><td> <b><?=$d->pengarang?></b></td></tr>
<tr><td>Judul</td><td>:</td><td><b><?=$d->judul?></b></td></tr>
<tr><td>Edisi</td><td>:</td><td><b><?=$d->jml_hal?></b></td></tr>
<tr><td>Jilid</td><td>:</td><td><b><?=$d->jml_hal?></b></td></tr>
<tr><td>Jumlah Halaman</td><td>:</td><td><b><?=$d->jml_hal?></b></td></tr>

</table>
</div>

<?php 
}
?>

</div>