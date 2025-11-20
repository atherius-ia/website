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

class Themes extends MY_Controller {

   private $pk = 'id';
   private $table = 'options';

   public function __construct() {
      parent::__construct();
   }

   public function index() {
      if ($_POST) {         
         $this->db
            ->where('variable', 'themes')
            ->update($this->table, ['value' => $this->input->post('themes')]);
         $this->session->set_flashdata('alert', alert('success', status('updated')));
         redirect(uri_string());
      } else {
         $this->data['title'] = 'Themes';
         $this->data['button'] = 'SAVE';
         $this->data['action'] = site_url(uri_string());
         $this->data['setting'] = $this->data['themes'] = TRUE;
         $this->data['alert'] = $this->session->flashdata('alert');
         $this->data['content'] = 'themes';
         $this->load->view('backend/index', $this->data);
      }
   }
}

/* End of file Themes.php */
/* Location: ./application/controllers/ppdb/Themes.php */