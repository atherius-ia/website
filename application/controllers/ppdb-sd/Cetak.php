<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * CMS Sekolahku | CMS (Content Management System) dan PPDB Online GRATIS untuk sekolah SD, SMP/Sederajat, SMA/Sederajat
 * @version    1.4.3
 * @author     Anton Sofyan | http://facebook.com/antonsofyan
 * @copyright  (c) 2014-2015
 * @link       http://sekolahku.web.id
 * @since      Version 1.4.3
 *
 * PERINGATAN : 
 * 1. TIDAK DIPERKENANKAN MEMPERJUALBELIKAN APLIKASI INI TANPA SEIZIN DARI PIHAK PENGEMBANG APLIKASI.
 * 2. TIDAK DIPERKENANKAN MENGHAPUS KODE SUMBER APLIKASI
 */

class Cetak extends MY_Controller {

	public function index()
	{
		$id = decode_url($this->uri->segment(4));
		if ($id) {
			$this->data['query'] = $this->m_global->find('view_siswa', 'id', $id)->row_array();
			$this->load->view('ppdb-sd/ppdb-cetak-formulir', $this->data);
		} else {
			$alert = '<div class="alert alert-danger">Anda tidak diperkenankan memanipulasi URL</div>';
		    $this->session->set_flashdata('alert', $alert);
		    redirect('ppdb-sd/registration');
		}
	}
}