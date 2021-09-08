<legend>Laporan Data Buku</legend>

<button class="btn btn-primary" type="button" onclick="window.open('<?php echo base_URL(); ?>cetak/data_buku', '_blank')">Cetak</button> 
<br>
	<h5>Total Buku yang dimiliki : <?=$jml?></h5>
	<table style="width: 100%; font-size: 10px"  class="table table-condensed">
		<tr>
			<th width="5%">No</th>
			<th width="8%">No Induk</th>
			<th width="5%">Klasifikasi</th>
			<th width="30%">Judul</th>
			<th width="10%">Pengarang</th>
			<th width="10%">Penerbit</th>
			<th width="5%">Tahun Terbit</th>
			<th width="5%">Jumlah Hal</th>
			<th width="5%">Jml Judul/<br>Eksemplar</th>
			<th width="10%">ISBN</th>
			<th width="7%">Lokasi</th>
			
		</tr>
		<?php 
		if (empty($data)) {
			echo "<tr><td colspan='7' style='text-align: center'> - Tidak ada data - </td></tr>";
		} else {
			$no = 1;
			foreach($data as $d) {
		?>
		<tr>
			<td style="text-align: center"><?=$no?></td>
			<td style="text-align: center"><?=$d->induk_1;?>-<?=$d->induk_2;?>/SDM</td>
			<td style="text-align: center"><?=$d->kelas_kode?>/<?=substr(strtoupper($d->pengarang), 0, 3);?>/<?=substr(strtoupper($d->judul), 0, 1);?></td>
			<td style="text-align: left"><?=$d->judul?></td>
			<td style="text-align: left"><?=$d->pengarang?></td>
			<td style="text-align: center"><?=$d->penerbit?></td>
			<td style="text-align: center"><?=$d->th_terbit?></td>
			<td style="text-align: center"><?=$d->jml_hal?></td>
			<td style="text-align: center"><?=$d->jml_judul?>/<?=$d->jml_eksp?></td>
			<td style="text-align: center"><?=$d->isbn?></td>
			<td style="text-align: center"><?=getLokasi($d->id_lokasi)?></td>
			
		</tr>	
		<?php
			$no++;
			}
		}
		?>
	</table>