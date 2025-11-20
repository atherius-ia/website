<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<section id="main-content">
	<div class="widget-title">
		<h4><?=$title;?> <i class="fa fa-user"></i> </h4>
	</div>
	<div class="widget">
		<div class="form-wrapper">
			<form method="POST" action="<?=site_url('home/redirect_kelas');?>">
				<ol class="form">
					<li>
						<select style="width:auto;" name="kelas_id" onChange='this.form.submit()'>
							<option value="">Kelas :</option>
							<?php
							foreach ($q_kelas->result() as $kelas) {
							   echo '<option value="';
							   echo $kelas->kelas_id;
							   if ($this->uri->segment(3) == $kelas->kelas_id) {
							      echo '"selected>';
							   } else {
							      echo '">';
							   }
							   echo $kelas->kelas;
							   echo '</option>';
							}
							?>
						</select>
					</li>
				</ol>

			</form>
		</div>
		<?php if ($query->num_rows() > 0) { ?>
		<table class="table">
			<thead>
				<th>NO</th>
				<th>NISN</th>
				<th>NAMA</th>
				<th>JENIS KELAMIN</th>
			</thead>
			<tbody>
				<?php
				if ($this->uri->segment(2) == 'siswa') {
			      $no = $this->uri->segment(3) == FALSE ? 1 : $this->uri->segment(3) + 1;
			   } else if ($this->uri->segment(2) == 'kelas') {
			      $no = $this->uri->segment(4) == FALSE ? 1 : $this->uri->segment(4) + 1;
			   }
			   ?>

				<?php foreach ($query->result() as $row) { ?>
				<tr>
					<td><?=$no;?></td>
					<td><?=$row->nisn;?></td>
					<td><?=$row->nama;?></td>
					<td><?=$row->jenis_kelamin;?></td>
				</tr>
		
				<?php $no++; } ?>
			</tbody>
		</table>

		<?php if ($total_rows > 20) {?>
		<div class="pagination">
			<ul class="clearfix" style="float:left">
				<?=$pagination;?>
			</ul>
		</div>
		<?php } ?>
		<?php } else { ?>
			<div class="alert alert-info">
				Data siswa tidak ditemukan !
			</div>
		<?php } ?>
	</div>
</section>
<?php $this->load->view('themes/' . $this->setting['themes'] . '/aside-secondary');?>