<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title><?=$site_title;?></title>
	<meta name="description" content="<?=$meta_description;?>">
	<meta name="keywords" content="<?=$meta_keywords;?>">
	<meta name="author" content="<?=$author;?>">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport" />
	<?php if (file_exists('./assets/images/'.$this->setting['logo'])) {echo '<link rel="shortcut icon" href="'.base_url('assets/images/'.$this->setting['logo']).'">';} else {echo '<link rel="shortcut icon" href="'.base_url('assets/images/icon.png').'">';} ?>
	<?=link_tag('views/themes/default/assets/plugin/slider/flexslider.css');?>
	<?=link_tag('views/themes/default/assets/plugin/prettyphoto/css/prettyphoto.css');?>
	<?=link_tag('views/themes/default/assets/css/style.css');?>
	<?=link_tag('views/themes/default/assets/css/custom.css');?>
	<?=link_tag('views/themes/default/assets/css/form.css');?>
	<?=link_tag('views/themes/default/assets/font-awesome/css/font-awesome.css');?>
	<script src="<?=base_url('assets/backend/js/jquery.min.js');?>" type="text/javascript"></script>
	<script src="<?=base_url('views/themes/default/assets/js/jquery.accordion.source.js');?>" type="text/javascript"></script>
	<script src="<?=base_url('views/themes/default/assets/plugin/slider/jquery.flexslider-min.js');?>" type="text/javascript"></script>
	<script src="<?=base_url('views/themes/default/assets/plugin/prettyphoto/js/jquery.prettyPhoto.js');?>" type="text/javascript"></script>
	<script src="<?=base_url('views/themes/default/assets/js/plugins.library.js');?>" type="text/javascript"></script>
	<script src="<?=base_url('views/themes/default/assets/js/init.js');?>" type="text/javascript"></script>
	<script src="<?=base_url('assets/js/action.js');?>" type="text/javascript"></script>
</head>
<body>
<style type="text/css">
.f-nav{  /* To fix main menu container */
    z-index: 9999;
    position: fixed;
    left: 0;
    top: 0;
    width: 100%;
}
</style>
<script type="text/javascript">
$("document").ready(function($){
	$(".accordion").slideUp();
	$('ul').accordion();
	$("#openmobi").click(function(){
		$(".accordion").slideToggle();
  	});

	var nav = $('#primary-navigator');
	$(window).scroll(function () {
		if ($(this).scrollTop() > 125) {
			nav.addClass("f-nav");
		} else {
			nav.removeClass("f-nav");
		}
	});
});
</script>
<div id="wrapper">
	<section id="top-bar" class="clearfix">
		<div class="container">
			<ul id="top-nav" class="clearfix">
				<li id="clock"></li>
				<li id="rss-feed"><a href="<?=site_url('home/rss');?>" target="_blank">RSS</a></li>
				<li id="subscribe"><a href="<?=site_url('home/peta_situs');?>">Peta Situs</a></li>
			</ul>
		</div>
	</section>
	<header id="primary-header">
		<div class="header">
		    <div class="logo"> 
			    <a href="<?=base_url();?>"><img src="<?=base_url('assets/images/' . $this->setting['header_image']);?>" alt="LOGO"/></a>
			</div>
			<div class="social">
			    
				<div class="schinfo">
			        <div class="sch inleft">
				    <?=$this->setting['alamat'] != '' ? 'Alamat : ' . $this->setting['alamat'] : ''?>
				    </div>
				    <div class="sch inleft">
				    <?=$this->setting['kecamatan'] != '' ? '' . $this->setting['kecamatan'] : ''?>
				    </div>
				    <div class="sch inleft">
				    <?=$this->setting['kabupaten'] != '' ? '' . $this->setting['kabupaten'] : ''?>
				    </div>
				    <div class="sch incenter">
				    <?=$this->setting['telp'] != '' ? '' . $this->setting['telp'] : ''?>
				    </div>
			    </div>
			</div>
			<div class="clearfix"></div>
		</div>
	</header>
    <div id="fixed-wrapper">
	
	<div class="mobimenu">
	        <div id="openmobi"><span>MENU</span></div>
            <ul class="accordion">
			    <li <?=isset($home) ? 'class="current"' : '';?>>
				    <a href="<?=base_url();?>"><?=strtoupper($menu['home'] == '' ? 'Beranda' : $menu['home']);?></a>
				</li>
				<?php $parent = $this->m_global->get_parent_page();
				foreach ($parent as $nav) {
				   echo '<li ';
				   echo isset($page) ? 'class="current"' : 'class="level1"';
				   echo '>';
				   $href = site_url('home/readmore/' . $nav['post_id'] . '/' . $nav['slug']);
		         if (count($nav['child']) > 0) {
		            $href = '#';
		         }
				   echo anchor($href, strtoupper($nav['post_title']));
				   $sub_nav = recursive_list($nav['child']);
				   if ($sub_nav != '') {
				      echo '<ul>';
				      echo recursive_list($nav['child']);
				      echo '</ul>';
				   }
				   echo '</li>';
				}
				?>
				<li <?=isset($direktori) ? 'class="current"' : 'class="level1"';?>><a href="#"><?=strtoupper($menu['direktori'] == '' ? 'Data' : $menu['direktori']);?></a>
					<ul>
						<li><a href="<?=site_url('home/ptk');?>"><?=strtoupper($menu['direktori_ptk'] == '' ? 'Data Guru' : $menu['direktori_guru']);?></a></li>
						<li><a href="<?=site_url('home/siswa');?>"><?=strtoupper($menu['direktori_siswa'] == '' ? 'Data Siswa' : $menu['direktori_siswa']);?></a></li>
					</ul>
				</li>
<?php if ($this->setting['ppdb_status'] == 'open'  && ($this->setting['jenjang'] == 'SMP' || $this->setting['jenjang'] == 'SMA')) {?>
				<li <?=isset($ppdb) ? 'class="current"' : 'class="level1"';?>><a href="#"><?=strtoupper($menu['ppdb'] == '' ? 'PPDB' : $menu['ppdb']);?> <?=$this->setting['ppdb_tahun'];?></a>
					<ul>
						<li><a href="<?=site_url('ppdb/registration');?>"><?=strtoupper($menu['daftar_sekarang'] == '' ? 'Daftar Sekarang' : $menu['daftar_sekarang']);?></a></li>
						<li><a href="<?=site_url('ppdb/check');?>"><?=strtoupper($menu['hasil_seleksi'] == '' ? 'Hasil Seleksi' : $menu['hasil_seleksi']);?></a></li>
						<li><a href="<?=site_url('ppdb/cetak_formulir');?>"><?=strtoupper($menu['cetak_formulir'] == '' ? 'Cetak Formulir' : $menu['cetak_formulir']);?></a></li>
						<li><a href="<?=site_url('ppdb/statistik');?>"><?=strtoupper($menu['grafik_ppdb'] == '' ? 'Grafik PPDB' : $menu['grafik_ppdb']);?></a></li>
						<li><a href="<?=site_url('formulir_ppdb/index');?>"><?=strtoupper($menu['download_formulir'] == '' ? 'Download formulir' : $menu['download_formulir']);?></a></li>
					</ul>
				</li>
				<?php } ?>

				<?php if ($this->setting['ppdb_status'] == 'open' && $this->setting['jenjang'] == 'SMK') {?>
				<li <?=isset($ppdb) ? 'class="current"' : 'class="level1"';?>><a href="#"><?=strtoupper($menu['ppdb'] == '' ? 'PPDB' : $menu['ppdb']);?> <?=$this->setting['ppdb_tahun'];?></a>
					<ul>
						<li><a href="<?=site_url('ppdb-smk/registration');?>"><?=strtoupper($menu['daftar_sekarang'] == '' ? 'Daftar Sekarang' : $menu['daftar_sekarang']);?></a></li>
						<li><a href="<?=site_url('ppdb-smk/check');?>"><?=strtoupper($menu['hasil_seleksi'] == '' ? 'Hasil Seleksi' : $menu['hasil_seleksi']);?></a></li>
						<li><a href="<?=site_url('ppdb-smk/cetak_formulir');?>"><?=strtoupper($menu['cetak_formulir'] == '' ? 'Cetak Formulir' : $menu['cetak_formulir']);?></a></li>
						<li><a href="<?=site_url('ppdb-smk/statistik');?>"><?=strtoupper($menu['grafik_ppdb'] == '' ? 'Grafik PPDB' : $menu['grafik_ppdb']);?></a></li>
						<li><a href="<?=site_url('formulir_ppdb/index');?>"><?=strtoupper($menu['download_formulir'] == '' ? 'Download formulir' : $menu['download_formulir']);?></a></li>
					</ul>
				</li>
				<?php } ?>

				<?php if ($this->setting['ppdb_status'] == 'open' && $this->setting['jenjang'] == 'SD') {?>
				<li <?=isset($ppdb) ? 'class="current"' : 'class="level1"';?>><a href="#"><?=strtoupper($menu['ppdb'] == '' ? 'PPDB' : $menu['ppdb']);?> <?=$this->setting['ppdb_tahun'];?></a>
					<ul>
						<li><a href="<?=site_url('ppdb-sd/registration');?>"><?=strtoupper($menu['daftar_sekarang'] == '' ? 'Daftar Sekarang' : $menu['daftar_sekarang']);?></a></li>
						<li><a href="<?=site_url('ppdb-sd/check');?>"><?=strtoupper($menu['hasil_seleksi'] == '' ? 'Hasil Seleksi' : $menu['hasil_seleksi']);?></a></li>
						<li><a href="<?=site_url('ppdb-sd/cetak_formulir');?>"><?=strtoupper($menu['cetak_formulir'] == '' ? 'Cetak Formulir' : $menu['cetak_formulir']);?></a></li>
						<li><a href="<?=site_url('ppdb-sd/statistik');?>"><?=strtoupper($menu['grafik_ppdb'] == '' ? 'Grafik PPDB' : $menu['grafik_ppdb']);?></a></li>
						<li><a href="<?=site_url('formulir_ppdb/index');?>"><?=strtoupper($menu['download_formulir'] == '' ? 'Download formulir' : $menu['download_formulir']);?></a></li>
					</ul>
				</li>
				<?php } ?>

				<?php if ($file_category->num_rows() > 0) { ?>
				<li <?=isset($berkas) ? 'class="current"' : 'class="level1"';?>><a href="#"><?=strtoupper($menu['download'] == '' ? 'Download' : $menu['download']);?></a>
					<ul>
						<?php foreach ($file_category->result() as $files) {
					      echo '<li><a href="' . site_url('home/files/' . $files->category_id) . '">' . strtoupper($files->category) . '</a>';
					      $sub_category = $this->db->where('parent', $files->category_id)->get('file_category');
					      if ($sub_category->num_rows() > 0) {
					         echo '<ul>';
					         foreach ($sub_category->result() as $category) {
					            echo '<li><a href="' . site_url('home/files/' . $category->category_id) . '">' . strtoupper($category->category) . '</a></li>';
					         }
					         echo '</ul>';
					      }
					      echo '</li>';
					   }
					   ?>
					</ul>
				</li>
				<?php } ?>

				<li <?=isset($event) ? 'class="current"' : '';?>><a href="<?=site_url('home/agenda_sekolah');?>"><?=strtoupper($menu['event'] == '' ? 'Agenda' : $menu['event']);?></a></li>
				<li <?=isset($gallery) ? 'class="current"' : '';?>><a href="<?=site_url('home/album');?>"><?=strtoupper($menu['gallery'] == '' ? 'Galeri' : $menu['gallery']);?></a>
				</li>
				<li <?=isset($contact) ? 'class="current"' : '';?>><a href="<?=site_url('home/hubungi_kami');?>"><?=strtoupper($menu['hubungi_kami'] == '' ? 'Hubungi Kami' : $menu['hubungi_kami']);?></a></li>
			
			</ul>
	</div>
	
	<nav id="primary-navigator">
		<div class="container">
			<ul id="primary-navigator-list" class="tree-menu">
				<li <?=isset($home) ? 'class="current"' : '';?>><a href="<?=base_url();?>"><?=strtoupper($menu['home'] == '' ? 'Beranda' : $menu['home']);?></a></li>
				<?php $parent = $this->m_global->get_parent_page();
				foreach ($parent as $nav) {
				   echo '<li ';
				   echo isset($page) ? 'class="current"' : '';
				   echo '>';
				   $href = site_url('home/readmore/' . $nav['post_id'] . '/' . $nav['slug']);
		         if (count($nav['child']) > 0) {
		            $href = '#';
		         }
				   echo anchor($href, strtoupper($nav['post_title']));
				   $sub_nav = recursive_list($nav['child']);
				   if ($sub_nav != '') {
				      echo '<ul>';
				      echo recursive_list($nav['child']);
				      echo '</ul>';
				   }
				   echo '</li>';
				}
				?>
				<li <?=isset($direktori) ? 'class="current"' : '';?>><a href="#"><?=strtoupper($menu['direktori'] == '' ? 'Data' : $menu['direktori']);?></a>
					<ul>
						<li><a href="<?=site_url('home/ptk');?>"><?=strtoupper($menu['direktori_guru'] == '' ? 'Data Guru' : $menu['direktori_guru']);?></a></li>
						<li><a href="<?=site_url('home/siswa');?>"><?=strtoupper($menu['direktori_siswa'] == '' ? 'Data Siswa' : $menu['direktori_siswa']);?></a></li>
					</ul>
				</li>
				
				<?php if ($this->setting['ppdb_status'] == 'open'  && ($this->setting['jenjang'] == 'SMP' || $this->setting['jenjang'] == 'SMA')) {?>
				<li <?=isset($ppdb) ? 'class="current"' : 'class="level1"';?>><a href="#"><?=strtoupper($menu['ppdb'] == '' ? 'PPDB' : $menu['ppdb']);?> <?=$this->setting['ppdb_tahun'];?></a>
					<ul>
						<li><a href="<?=site_url('ppdb/registration');?>"><?=strtoupper($menu['daftar_sekarang'] == '' ? 'Daftar Sekarang' : $menu['daftar_sekarang']);?></a></li>
						<li><a href="<?=site_url('ppdb/check');?>"><?=strtoupper($menu['hasil_seleksi'] == '' ? 'Hasil Seleksi' : $menu['hasil_seleksi']);?></a></li>
						<li><a href="<?=site_url('ppdb/cetak_formulir');?>"><?=strtoupper($menu['cetak_formulir'] == '' ? 'Cetak Formulir' : $menu['cetak_formulir']);?></a></li>
						<li><a href="<?=site_url('formulir_ppdb/index');?>"><?=strtoupper($menu['download_formulir'] == '' ? 'Download formulir' : $menu['download_formulir']);?></a></li>
					</ul>
				</li>
				<?php } ?>

				<?php if ($this->setting['ppdb_status'] == 'open' && $this->setting['jenjang'] == 'SMK') {?>
				<li <?=isset($ppdb) ? 'class="current"' : 'class="level1"';?>><a href="#"><?=strtoupper($menu['ppdb'] == '' ? 'PPDB' : $menu['ppdb']);?> <?=$this->setting['ppdb_tahun'];?></a>
					<ul>
						<li><a href="<?=site_url('ppdb-smk/registration');?>"><?=strtoupper($menu['daftar_sekarang'] == '' ? 'Daftar Sekarang' : $menu['daftar_sekarang']);?></a></li>
						<li><a href="<?=site_url('ppdb-smk/check');?>"><?=strtoupper($menu['hasil_seleksi'] == '' ? 'Hasil Seleksi' : $menu['hasil_seleksi']);?></a></li>
						<li><a href="<?=site_url('ppdb-smk/cetak_formulir');?>"><?=strtoupper($menu['cetak_formulir'] == '' ? 'Cetak Formulir' : $menu['cetak_formulir']);?></a></li>
						<li><a href="<?=site_url('ppdb-smk/statistik');?>"><?=strtoupper($menu['grafik_ppdb'] == '' ? 'Grafik PPDB' : $menu['grafik_ppdb']);?></a></li>
						<li><a href="<?=site_url('formulir_ppdb/index');?>"><?=strtoupper($menu['download_formulir'] == '' ? 'Download formulir' : $menu['download_formulir']);?></a></li>
					</ul>
				</li>
				<?php } ?>

				<?php if ($this->setting['ppdb_status'] == 'open' && $this->setting['jenjang'] == 'SD') {?>
				<li <?=isset($ppdb) ? 'class="current"' : 'class="level1"';?>><a href="#"><?=strtoupper($menu['ppdb'] == '' ? 'PPDB' : $menu['ppdb']);?> <?=$this->setting['ppdb_tahun'];?></a>
					<ul>
						<li><a href="<?=site_url('ppdb-sd/registration');?>"><?=strtoupper($menu['daftar_sekarang'] == '' ? 'Daftar Sekarang' : $menu['daftar_sekarang']);?></a></li>
						<li><a href="<?=site_url('ppdb-sd/check');?>"><?=strtoupper($menu['hasil_seleksi'] == '' ? 'Hasil Seleksi' : $menu['hasil_seleksi']);?></a></li>
						<li><a href="<?=site_url('ppdb-sd/cetak_formulir');?>"><?=strtoupper($menu['cetak_formulir'] == '' ? 'Cetak Formulir' : $menu['cetak_formulir']);?></a></li>
						<li><a href="<?=site_url('ppdb-sd/statistik');?>"><?=strtoupper($menu['grafik_ppdb'] == '' ? 'Grafik PPDB' : $menu['grafik_ppdb']);?></a></li>
						<li><a href="<?=site_url('formulir_ppdb/index');?>"><?=strtoupper($menu['download_formulir'] == '' ? 'Download formulir' : $menu['download_formulir']);?></a></li>
					</ul>
				</li>
				<?php } ?>

				<?php if ($file_category->num_rows() > 0) { ?>
				<li <?=isset($berkas) ? 'class="current"' : 'class="level1"';?>><a href="#"><?=strtoupper($menu['download'] == '' ? 'Download' : $menu['download']);?></a>
					<ul>
						<?php foreach ($file_category->result() as $files) {
					      echo '<li><a href="' . site_url('home/files/' . $files->category_id) . '">' . strtoupper($files->category) . '</a>';
					      $sub_category = $this->db->where('parent', $files->category_id)->get('file_category');
					      if ($sub_category->num_rows() > 0) {
					         echo '<ul>';
					         foreach ($sub_category->result() as $category) {
					            echo '<li><a href="' . site_url('home/files/' . $category->category_id) . '">' . strtoupper($category->category) . '</a></li>';
					         }
					         echo '</ul>';
					      }
					      echo '</li>';
					   }
					   ?>
					</ul>
				</li>
				<?php } ?>

				<li <?=isset($event) ? 'class="current"' : '';?>><a href="<?=site_url('home/agenda_sekolah');?>"><?=strtoupper($menu['event'] == '' ? 'Agenda' : $menu['event']);?></a></li>
				<li <?=isset($gallery) ? 'class="current"' : '';?>><a href="<?=site_url('home/album');?>"><?=strtoupper($menu['gallery'] == '' ? 'Galeri' : $menu['gallery']);?></a>
				</li>
				<li <?=isset($contact) ? 'class="current"' : '';?>><a href="<?=site_url('home/hubungi_kami');?>"><?=strtoupper($menu['hubungi_kami'] == '' ? 'Hubungi Kami' : $menu['hubungi_kami']);?></a></li>
			</ul>
		</div>
	</nav>

    </div>

    <section id="content-wrapper" class="container">
    <?php $this->load->view($content);?>
    </section>

<footer id="sub-footer">
    <div id="footcont" class="clearfix">
		<div class="infooter">
		    <div class="footer-title">
	            	<h4>DATA SEKOLAH</h4>
	        </div>
			<div class="list">
			    <h4><?=strtoupper($this->setting['nama_sekolah']);?></h4>
			    <p><?=$this->setting['alamat'];?> <br/>
			    <p><?=$this->setting['kecamatan'];?>
			    <?=$this->setting['kabupaten'] != '' ? ', ' . $this->setting['kabupaten'] : ''?> <br/><br/>
				<i class="fa fa-phone"></i> <?=$this->setting['telp'] != '' ? ' ' . $this->setting['telp'] : ''?><br/>
				<i class="fa fa-envelope"></i> <?=$this->setting['email'] != '' ? ' ' . $this->setting['email'] : ''?>
			    </p>
			</div>
		</div>
		<div class="infooter">
		    <div class="footer-title">
	            	<h4><?=$menu['kategori']==''?'KATEGORI':$menu['kategori'];?></h4>
	        </div>
		    <?php if ($categories->num_rows() > 0) { ?>
        	<div class="list">
	        	<ul class="ul-list clearfix">
	        		<?php foreach ($categories->result() as $category)
		        	{
		    		echo '<li>'.anchor('home/category/'.$category->category_id, $category->category.' <span>'.$category->jumlah.'</span>').'</li>';
		        	}
		        	?>
		        </ul>
	        </div>
	        <?php } ?>	    
		</div>
		<div class="infooter">
		    <div class="footer-title">
	            <h4><?=$menu['arsip']==''?'ARSIP':$menu['arsip'];?> <?=date('Y');?></h4>
	        </div>
			<?php if ($archives->num_rows() > 0) { ?>
	        <div class="list">
		        <ul class="ul-list clearfix">
		        	<?php foreach ($archives->result() as $archive)
			        {
			     	echo '<li>'.anchor('home/archive/'.$archive->kode.'/'.date('Y'), bulan($archive->kode).' <span>'.$archive->jumlah.'</span>', array('title' => 'Arsip berita bulan '.bulan($archive->kode))).'</li>';
		        	}
		        	?>
		        </ul>
	        </div>
	        <?php } ?>
		</div>
			</div>
		<div id="copyright-wrapper" class="clearfix">
		    <div class="footcopy">
			    <div class="copyright">Copyright © <?=date('Y');?> <?=$this->setting['nama_sekolah'];?>. All Rights Reserved.</div>
			    <div class="dev"><span class="eloper"><?=edited();?></span><span class="eloper">| <?=developed();?></span></div>
			</div>
		</div>
</footer>
</div>
</body>
</html>		