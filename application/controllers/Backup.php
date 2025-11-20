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

class Backup extends MY_Controller {

   public function __construct() {
      parent::__construct();
   }

	public function index() {
		if ($this->session->userdata('level') != 'administrator') {
			exit('You cannot access this page!');
		} else {
			$this->load->dbutil();
			$prefs = array(
				'format'   => 'zip',
				'filename' => 'BACKUP-DATABASE-'.date("Y-m-d H-i-s").'.sql'
			);
			$backup =& $this->dbutil->backup($prefs); 
			$file_name = 'backup-on-'. date("Y-m-d-H-i-s") .'.zip';
			$this->zip->download($file_name);
		}
	}
}