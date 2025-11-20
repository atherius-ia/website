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

class Header extends MY_Controller {

   private $pk = 'id';
   private $table = 'options';

   public function __construct() {
      parent::__construct();
   }

   public function index() {
      if (isset($_POST['submit'])) {
         if (empty($_FILES['file']['name'])) {
            $this->session->set_flashdata('alert', alert('warning', 'Anda belum memilih gambar untuk di upload !'));
         } else {
            $file = $this->upload();
            if ($file['status'] == 'success') {
               $query = $this->db
                              ->select('value')
                              ->where('variable', 'header_image')
                              ->limit(1)
                              ->get('options')->row();
               @unlink('./assets/images/' . $query->value);
               $this->db->where('variable', 'header_image')->update($this->table, ['value' => $file['data']['file_name']]);
               $this->session->set_flashdata('alert', alert('success', status('created')));
            } else {
               $this->session->set_flashdata('alert', alert('error', $file['data']));
            }
         }
         redirect(current_url());
      } else {
         $img = config_themes($this->setting['themes']);
         $this->data['title'] = 'Header Website';
         $this->data['button'] = 'UPLOAD';
         $this->data['action'] = site_url(uri_string());
         $this->data['setting'] = $this->data['header'] = TRUE;
         $this->data['alert'] = $this->session->flashdata('alert');
         $this->data['pixel'] = $img['config']['header']['width'].' X '.$img['config']['header']['height'].' Pixel';
         $this->data['content'] = 'sekolah/upload_header';
         $this->load->view('backend/index', $this->data);
      }
   }

   private function upload() {
      $img = config_themes($this->setting['themes']);
      create_dir('./assets/images/');
      $config['upload_path'] = './assets/images/';
      $config['allowed_types'] = 'jpg|jpeg|png|gif';
      $config['max_size'] = 0;
      $config['encrypt_name'] = TRUE;
      $this->load->library('upload', $config);
      if (!$this->upload->do_upload('file')) {
         return [
            'status' => 'error',
            'data' => $this->upload->display_errors(),
         ];
      } else {
         $data = $this->upload->data();
         $resize['image_library'] = 'gd2';
         $resize['source_image'] = './assets/images/' . $data['file_name'];
         $resize['maintain_ratio'] = FALSE;
         $resize['width'] = $img['config']['header']['width'];
         $resize['height'] = $img['config']['header']['height'];
         $this->load->library('image_lib', $resize);
         $this->image_lib->resize();
         return [
            'status' => 'success',
            'data' => $this->upload->data(),
         ];
      }
   }
}

/* End of file header.php */
/* Location: ./application/controllers/header.php */