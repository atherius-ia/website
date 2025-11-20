<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * CMS Sekolahku | CMS (Content Management System) dan PPDB Online GRATIS untuk sekolah SD, SMP/Sederajat, SMA/Sederajat
 * @version    1.4.7
 * @author     Anton Sofyan | https://facebook.com/antonsofyan
 * @copyright  (c) 2014-2016
 * @link       http://sekolahku.web.id
 * @since      Version 1.4.7
 *
 * PERINGATAN :
 * 1. TIDAK DIPERKENANKAN MEMPERJUALBELIKAN APLIKASI INI TANPA SEIZIN DARI PIHAK PENGEMBANG APLIKASI.
 * 2. TIDAK DIPERKENANKAN MENGHAPUS KODE SUMBER APLIKASI.
 * 3. TIDAK MENYERTAKAN LINK KOMERSIL (JASA LAYANAN HOSTING DAN DOMAIN) YANG MENGUNTUNGKAN SEPIHAK.
 */

class Formulir_ppdb extends MY_Controller {

	public function __construct() {
      parent::__construct();
   }

   public function index() {
   	$view = 'ppdb/ppdb-cetak-formulir-kosong';
   	if ($this->setting['jenjang'] == 'SD') {
   		$view = 'ppdb-sd/ppdb-cetak-formulir-kosong';
   	} else if ($this->setting['jenjang'] == 'SMK') {
   		$view = 'ppdb-smk/ppdb-cetak-formulir-kosong';
   	}
      $this->load->view($view);
   }
}