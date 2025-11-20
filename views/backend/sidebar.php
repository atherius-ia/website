<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<ul class="sidebar-menu">
    <li>
        <a href="<?=base_url();?>" target="_blank">
            <i class="fa fa-rocket"></i> <span>VISIT SITE</span>
        </a>
    </li>
    <li <?=isset($dashboard) ? 'class="active"' : '';?>>
        <a href="<?=site_url('dashboard');?>">
            <i class="fa fa-dashboard"></i> <span>DASHBOARD</span>
        </a>
    </li>
    <li class="treeview <?=isset($siswa) ? 'active' : '';?>">
        <a href="#">
            <i class="fa fa-user"></i> <span>DATA SISWA</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li <?=isset($aktif) ? 'class="active"' : '';?>><a href="<?=site_url('siswa/status/aktif');?>"><i class="fa fa-check-square-o"></i> Siswa Aktif</a></li>
            <li <?=isset($add_siswa) ? 'class="active"' : '';?>><a href="<?=site_url('siswa/create');?>"><i class="fa fa-plus"></i> Tambah Data Siswa</a></li>
            <li <?=isset($import_siswa) ? 'class="active"' : '';?>><a href="<?=site_url('siswa/import');?>"><i class="fa fa-file-excel-o"></i> Import Data Siswa</a></li>
            <li <?=isset($naik_kelas) ? 'class="active"' : '';?>><a href="<?=site_url('naik_kelas');?>"><i class="fa fa-level-up"></i> Kenaikan Kelas</a></li>
            <li <?=isset($set_kelas) ? 'class="active"' : '';?>><a href="<?=site_url('set_kelas');?>"><i class="fa fa-wrench"></i> Pengaturan Kelas</a></li>
        </ul>
    </li>
    <li class="treeview <?=isset($ptk) ? 'active' : '';?>">
        <a href="#">
            <i class="fa fa-user"></i> <span>DATA GURU</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li <?=isset($ptk_list) ? 'class="active"' : '';?>><a href="<?=site_url('ptk');?>"><i class="fa fa-users"></i> Daftar Guru</a></li>
            <li <?=isset($ptk_input) ? 'class="active"' : '';?>><a href="<?=site_url('ptk/create');?>"><i class="fa fa-plus"></i> Tambah Data Guru</a></li>
            <li <?=isset($ptk_import) ? 'class="active"' : '';?>><a href="<?=site_url('ptk/import');?>"><i class="fa fa-file-excel-o"></i> Import Data Guru</a></li>
        </ul>
    </li>
    <?php if ($this->setting['jenjang'] == 'SMK' && is_dir(APPPATH . 'controllers/ppdb-smk')) {?>
    <li class="treeview <?=isset($ppdb) ? 'active' : '';?>">
        <a href="#">
            <i class="fa fa-cog"></i> <span>PPDB ONLINE</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li <?=isset($pendaftar) ? 'class="active"' : '';?>><a href="<?=site_url('ppdb-smk/siswa');?>"><i class="fa fa-user"></i> Data Pendaftar</a></li>
            <li <?=isset($jalur_pendaftaran) ? 'class="active"' : '';?>><a href="<?=site_url('jalur_pendaftaran');?>"><i class="fa fa-code-fork"></i> Jalur Pendaftaran</a></li>
            <li <?=isset($set_ppdb) ? 'class="active"' : '';?>><a href="<?=site_url('pengaturan');?>"><i class="fa fa-wrench"></i> Pengaturan</a></li>
            <li <?=isset($seleksi) ? 'class="active"' : '';?>><a href="<?=site_url('ppdb-smk/seleksi');?>"><i class="fa fa-filter"></i> Proses Seleksi</a></li>
            <li <?=isset($diterima) ? 'class="active"' : '';?>><a href="<?=site_url('ppdb-smk/hasil_seleksi/diterima');?>"><i class="fa fa-check-square-o"></i> Siswa Diterima</a></li>
            <li <?=isset($tidak_diterima) ? 'class="active"' : '';?>><a href="<?=site_url('ppdb-smk/hasil_seleksi/tidak_diterima');?>"><i class="fa fa-times"></i> Siswa Tidak Diterima</a></li>
            <li <?=isset($statistik) ? 'class="active"' : '';?>><a target="_blank" href="<?=site_url('ppdb-smk/statistik');?>"><i class="fa fa-bar-chart-o"></i> Statistik Pendaftaran</a></li>
            <li <?=isset($verifikasi) ? 'class="active"' : '';?>><a href="<?=site_url('ppdb-smk/verifikasi');?>"><i class="fa fa-folder-open-o"></i> Verifikasi Pendaftaran</a></li>
        </ul>
    </li>
    <?php }
?>

    <?php if ($this->setting['jenjang'] == 'SD' && is_dir(APPPATH . 'controllers/ppdb-sd')) {?>
    <li class="treeview <?=isset($ppdb) ? 'active' : '';?>">
        <a href="#">
            <i class="fa fa-cog"></i> <span>PPDB ONLINE</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">

            <li <?=isset($pendaftar) ? 'class="active"' : '';?>><a href="<?=site_url('ppdb-sd/siswa');?>"><i class="fa fa-user"></i> Data Pendaftar</a></li>
            <li <?=isset($jalur_pendaftaran) ? 'class="active"' : '';?>><a href="<?=site_url('jalur_pendaftaran');?>"><i class="fa fa-code-fork"></i> Jalur Pendaftaran</a></li>
            <li <?=isset($set_ppdb) ? 'class="active"' : '';?>><a href="<?=site_url('pengaturan');?>"><i class="fa fa-wrench"></i> Pengaturan</a></li>
            <li <?=isset($seleksi) ? 'class="active"' : '';?>><a href="<?=site_url('ppdb-sd/seleksi');?>"><i class="fa fa-filter"></i> Proses Seleksi</a></li>
            <li <?=isset($diterima) ? 'class="active"' : '';?>><a href="<?=site_url('ppdb-sd/hasil_seleksi/diterima');?>"><i class="fa fa-check-square-o"></i> Siswa Diterima</a></li>
            <li <?=isset($tidak_diterima) ? 'class="active"' : '';?>><a href="<?=site_url('ppdb-sd/hasil_seleksi/tidak_diterima');?>"><i class="fa fa-times"></i> Siswa Tidak Diterima</a></li>
            <li <?=isset($statistik) ? 'class="active"' : '';?>><a target="_blank" href="<?=site_url('ppdb-sd/statistik');?>"><i class="fa fa-bar-chart-o"></i> Statistik Pendaftaran</a></li>
            <li <?=isset($verifikasi) ? 'class="active"' : '';?>><a href="<?=site_url('ppdb-sd/verifikasi');?>"><i class="fa fa-folder-open-o"></i> Verifikasi Pendaftaran</a></li>
        </ul>
    </li>
    <?php }
?>

    <?php if ($this->setting['jenjang'] == 'SMP' || $this->setting['jenjang'] == 'SMA' && is_dir(APPPATH . 'controllers/ppdb')) {?>
    <li class="treeview <?=isset($ppdb) ? 'active' : '';?>">
        <a href="#">
            <i class="fa fa-cog"></i> <span>PPDB ONLINE</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li <?=isset($pendaftar) ? 'class="active"' : '';?>><a href="<?=site_url('ppdb/siswa');?>"><i class="fa fa-user"></i> Data Pendaftar</a></li>
            <li <?=isset($jalur_pendaftaran) ? 'class="active"' : '';?>><a href="<?=site_url('jalur_pendaftaran');?>"><i class="fa fa-code-fork"></i> Jalur Pendaftaran</a></li>
            <li <?=isset($set_ppdb) ? 'class="active"' : '';?>><a href="<?=site_url('pengaturan');?>"><i class="fa fa-wrench"></i> Pengaturan</a></li>
            <li <?=isset($seleksi) ? 'class="active"' : '';?>><a href="<?=site_url('ppdb/seleksi');?>"><i class="fa fa-filter"></i> Proses Seleksi</a></li>
            <li <?=isset($diterima) ? 'class="active"' : '';?>><a href="<?=site_url('ppdb/hasil_seleksi/diterima');?>"><i class="fa fa-check-square-o"></i> Siswa Diterima</a></li>
            <li <?=isset($tidak_diterima) ? 'class="active"' : '';?>><a href="<?=site_url('ppdb/hasil_seleksi/tidak_diterima');?>"><i class="fa fa-times"></i> Siswa Tidak Diterima</a></li>
            <li <?=isset($statistik) ? 'class="active"' : '';?>><a target="_blank" href="<?=site_url('ppdb/statistik');?>"><i class="fa fa-bar-chart-o"></i> Statistik Pendaftaran</a></li>
            <li <?=isset($verifikasi) ? 'class="active"' : '';?>><a href="<?=site_url('ppdb/verifikasi');?>"><i class="fa fa-folder-open-o"></i> Verifikasi Pendaftaran</a></li>
        </ul>
    </li>
    <?php }
?>

    <li class="treeview <?=isset($posts) ? 'active' : '';?>">
        <a href="#">
            <i class="fa fa-thumb-tack"></i> <span>POSTS</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li <?=isset($add_post) ? 'class="active"' : '';?>><a href="<?=site_url('posts/create');?>"><i class="fa fa-plus"></i> Add New</a></li>
            <li <?=isset($post) ? 'class="active"' : '';?>><a href="<?=site_url('posts');?>"><i class="fa fa-list"></i> All Posts</a></li>
            <li <?=isset($categories) ? 'class="active"' : '';?>><a href="<?=site_url('category');?>"><i class="fa fa-tags"></i> Categories</a></li>
            <li <?=isset($sekilas_info) ? 'class="active"' : '';?>><a href="<?=site_url('sekilas_info');?>"><i class="fa fa-info-circle"></i> Sekilas Info</a></li>
            <li <?=isset($pengumuman) ? 'class="active"' : '';?>><a href="<?=site_url('pengumuman');?>"><i class="fa fa-bullhorn"></i> Pengumuman</a></li>
        </ul>
    </li>
    <li class="treeview <?=isset($pages) ? 'active' : '';?>">
        <a href="#">
            <i class="fa fa-files-o"></i> <span>PAGES</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li <?=isset($add_page) ? 'class="active"' : '';?>><a href="<?=site_url('pages/create');?>"><i class="fa fa-plus"></i> Add New</a></li>
            <li <?=isset($page) ? 'class="active"' : '';?>><a href="<?=site_url('pages');?>"><i class="fa fa-list"></i> All Pages</a></li>
            <li <?=isset($page_order) ? 'class="active"' : '';?>><a href="<?=site_url('pages/page_order');?>"><i class="fa fa-sort-alpha-asc"></i> Page Order</a></li>
        </ul>
    </li>
    <?php if ($this->session->userdata('level') == 'administrator') { ?>
    <li <?=isset($users) ? 'class="active"' : '';?>>
        <a href="<?=site_url('users');?>">
            <i class="fa fa-user"></i> <span>PENGGUNA</span>
        </a>
    </li>
    <?php } ?>
</ul>	