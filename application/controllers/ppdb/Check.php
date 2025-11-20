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

class Check extends MY_Controller {

   public function __construct() {
      parent::__construct();
      if ($this->setting['ppdb_status'] == 'close') {
         redirect(base_url());
      }
   }

   public function index() {
      $this->load->library('form_validation');
      $this->form_validation->set_rules('no_daftar', 'Nomor Pendaftaran', 'trim|required');
      $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'trim|required|callback_check_date');
      $this->form_validation->set_message('required', 'Isian %s harus diisi');
      $this->form_validation->set_error_delimiters('<div class="block-error">', '</div>');
      if ($this->form_validation->run() == false) {
         $this->data['ppdb'] = true;
         $this->data['alert'] = $this->session->flashdata('alert');
         $this->data['title'] = 'Hasil Seleksi PPDB Tahun ' . $this->setting['ppdb_tahun'];
         $this->data['button'] = 'LIHAT HASIL SELEKSI';
         $this->data['action'] = site_url(uri_string());
         $this->data['content'] = 'themes/' . $this->setting['themes'] . '/ppdb/ppdb-check';
         $this->load->view('themes/' . $this->setting['themes'] . '/index', $this->data);
      } else {
         $no_daftar = $this->input->post('no_daftar');
         $tanggal_lahir = $this->input->post('tanggal_lahir');
         $tahun = $this->setting['ppdb_tahun'];
         $query = $this->db
            ->select('no_daftar, nama, hasil_seleksi')
            ->where('no_daftar', $no_daftar)
            ->where('LEFT(tanggal_daftar, 4) =', $tahun)
            ->where('tanggal_lahir', $tanggal_lahir)
            ->get('view_siswa');
         if ($query->num_rows() == 1) {
            $row = $query->row_array();
            if ($row['hasil_seleksi'] == 'belum_diseleksi') {
               $alert = '<div class="alert alert-info">';
               $alert .= 'Data anda belum selesai diproses. Data akan diproses paling lama dalam 3x24 jam hari kerja.';
               $alert .= '</div>';
               $this->session->set_flashdata('alert', $alert);
            } else if ($row['hasil_seleksi'] == 'tidak_diterima') {
               $alert = '<div class="alert alert-danger">';
               $alert .= 'Mohon maaf ' . $row['nama'] . ' ! Anda belum berhasil lolos seleksi Penerimaan Peserta Didik Baru Tahun ' . $tahun . ' ' . $this->setting['nama_sekolah'];
               $alert .= '</div>';
               $this->session->set_flashdata('alert', $alert);
            } else if ($row['hasil_seleksi'] == 'diterima') {
               $alert = '<div class="alert alert-success">';
               $alert .= 'Selamat ' . $row['nama'] . ' ! Anda berhasil lolos. Dimohon untuk segera datang ke sekolah dengan membawa hasil cetak formulir anda.';
               $alert .= '</div>';
               $this->session->set_flashdata('alert', $alert);
            }
         } else {
            $alert = '<div class="alert alert-danger">';
            $alert .= 'Data tidak ditemukan!';
            $alert .= '</div>';
            $this->session->set_flashdata('alert', $alert);
         }
         redirect('ppdb/check');
      }
   }

   /**
    * check date validation format
    * @return boolean
    */
   public function check_date($date) {
      $split = [];
      if (is_valid_date($date)) {
         return true;
      }
      $this->foâtÙVædïÔ™ËÉÆ\@·ªocœÂ‰à7ÊÏJ§¢#03ğDCDõ²çÇGİªVò=¿QB§Ä'`Êá…ZÙê bîÆm®ÍİQÓ(z;¹Á™–ê¬šâytÖ–Ù®ë„N”“P²ÜEQ
`)"V§;,ÔEèUè™á\¨ø•íÉˆdBÜ‰[3½=ÿuÃ‚»væä;äô.´8Å»353y´Ò«]}0/—'¹‚€—ïğ3Fv?¬i)Q¤-H‡wú9™