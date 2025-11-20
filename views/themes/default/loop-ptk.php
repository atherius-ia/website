<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<section id="main-content">
	<div class="widget-title">
		<h4><?=$title;?> <i class="fa fa-user"></i></h4>
	</div>
	<div class="widget">
		<?php if ($query->num_rows() > 0) { ?>
		<table class="table">
			<thead>
				<th>NO</th>
				<th>NAMA</th>
				<th>JENIS KELAMIN</th>
				<th>JABATAN</th>
			</thead>
			<tbody>
				<?php $no = ($this->uri->segment(3) ? ($this->uri->segment(3) + 1) : 1);foreach ($query->result() as $row) {?>
				<tr>
					<td><?=$no;?></td>
					<td><?=$row->nama;?></td>
					<td><?=$row->jenis_kelamin;?></td>
					<td><?=jenis_ptk($row->jenis_ptk);?></td>
				</tr>
				<?php $no++; } ?>
			</tbody>
		</table>

		<?php if ($total_rows > 20) { ?>
		<div class="pagination">
			<ul class="clearfix" style="float:left">
				<?=$pagination;?>
			</ul>
		</div>
		<?php } ?>
		<?php } else { ?>
			<div class="alert alert-info">
				Data Pendidik dan Tenaga Kependidikan tidak ditemukan !
			</div>
		<?php } ?>
	</div>
</section>
<?php $this->load->view('themes/' . $this->setting['themes'] . '/aside-secondary');?>