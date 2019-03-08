<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Petugas extends CI_Controller {
    function __construct(){
      parent::__construct();
      // cek session yang login, jika session status tidak sama dengan session petugas_login,maka halaman akan di alihkan kembali ke halaman login.
      if($this->session->userdata('status')!="petugas_login"){
        redirect(base_url().'login?alert=belum_login');
      }
    }
    function index(){
      $this->load->view('petugas/v_header');
      $this->load->view('petugas/v_index');
      $this->load->view('petugas/v_footer');
    }
    function logout(){
  		$this->session->sess_destroy();
  		redirect(base_url().'login.?alert=logout');
  	}
    function ganti_password(){
  		$this->load->view('petugas/v_header');
  		$this->load->view('petugas/v_ganti_password');
  		$this->load->view('petugas/v_footer');
  	}
  	function ganti_password_aksi(){
  	   $baru = $this->input->post('password_baru');
  	   $ulang = $this->input->post('password_ulang');
  	   $this->form_validation->set_rules('password_baru','Password Baru','required|matches[password_ulang]');
  	   $this->form_validation->set_rules('password_ulang','Ulangi Password','required');
  	if($this->form_validation->run()!=false){
  						$id = $this->session->userdata('id');
  						$where = array('id' => $id);
  						$data = array('password' => md5($baru));
  						$this->m_data->update_data($where,$data,'petugas');
  						redirect(base_url().'petugas/ganti_password/?alert=sukses');
  	}else{
  						$this->load->view('petugas/v_header');
  						$this->load->view('petugas/v_ganti_password');
  						$this->load->view('petugas/v_footer');
  	}
  	}
    function anggota(){
      // mengambil data dari database
        $data['anggota'] = $this->m_data->get_data('anggota')->result();
        $this->load->view('petugas/v_header');
        $this->load->view('petugas/v_anggota',$data);
        $this->load->view('petugas/v_footer');
    }
    function anggota_tambah(){
  	$this->load->view('petugas/v_header');
  	$this->load->view('petugas/v_anggota_tambah');
  	$this->load->view('petugas/v_footer');
  	}

    function anggota_tambah_aksi(){
  		$nama = $this->input->post('nama');
  		$nik = $this->input->post('nik');
  		$alamat = $this->input->post('alamat');

  		$data = array(
  			'nama' => $nama,
  			'nik' => $nik,
  			'alamat' => $alamat
  		);

  		// insert data ke database
  		$this->m_data->insert_data($data,'anggota');

  		// mengalihkan halaman ke halaman data anggota
  		redirect(base_url().'petugas/anggota');
  	}
  		function anggota_edit($id){
  			$where=array('id'=>$id);
  			// mengambil data dari database sesuai id
  			$data['anggota'] = $this->m_data->edit_data($where,'anggota')->result();
  			$this->load->view('petugas/v_header');
  			$this->load->view('petugas/v_anggota_edit',$data);
  			$this->load->view('petugas/v_footer');
  		}
  		function anggota_update(){
  			$id = $this->input->post('id');
  			$nama = $this->input->post('nama');
  			$nik = $this->input->post('nik');
  			$alamat = $this->input->post('alamat');

  			$where = array(
  					'id' => $id
  				);
  				// cek apakah form password di isi atau tidak
  					$data = array(
  						'nama' => $nama,
              'nik' => $nik,
              'alamat' => $alamat
            );

  					// update data ke database
  					$this->m_data->update_data($where,$data,'anggota');


  			// mengalihkan halaman ke halaman data petugas
  			redirect(base_url().'petugas/anggota');
  		}
  		function anggota_hapus($id){
  			$where = array(
  					'id' => $id
  					);
  					// menghapus data petugas dari database sesuai id
            $this->m_data->delete_data($where,'anggota');
            // mengalihkan halaman ke halaman data petugas
            redirect(base_url().'petugas/anggota');
  	  }
      function anggota_kartu($id){
        $where = array('id' => $id);
        //mengambil data dari database berdasarkan id;
        $data['anggota']=$this->m_data->edit_data($where,'anggota')->result();
        $this->load->view('petugas/v_anggota_kartu',$data);
      }

      function buku(){
        //megambil data dari Database
        $data['buku']= $this->m_data->get_data('buku')->result();
        $this->load->view('petugas/v_header');
        $this->load->view('petugas/v_buku',$data);
        $this->load->view('petugas/v_footer');
      }

      function buku_tambah(){
        $this->load->view('petugas/v_header');
        $this->load->view('petugas/v_buku_tambah');
        $this->load->view('petugas/v_footer');
      }

      function buku_tambah_aksi(){
        $judul = $this->input->post('judul');
        $tahun = $this->input->post('tahun');
        $penulis = $this->input->post('penulis');

        $data = array(
          'judul'=> $judul,
          'tahun'=> $tahun,
          'penulis'=>$penulis,
          'status'=> 1
        );
        //insert to Database
        $this->m_data->insert_data($data,'buku');
        //mengalihkan halaman ke halaman data buku
        redirect(base_url().'petugas/buku');
      }

      function buku_edit($id){
        $where = array('id' => $id);
        //mengambildata dari Database
        $data['buku']=$this->m_data->edit_data($where,'buku')->result();
        $this->load->view('petugas/v_header');
        $this->load->view('petugas/v_buku_edit',$data);
        $this->load->view('petugas/v_footer');

      }
}
