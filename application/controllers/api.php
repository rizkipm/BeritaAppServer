	<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class api extends CI_Controller {
	function __construct(){
		parent::__construct();

		date_default_timezone_set('Asia/Jakarta');
		error_reporting(E_ALL);
		ini_set('display_errors', 1);
		
	}

	//bikin method baru untuk mengambil data kategori
	public function getKategori(){ 
		$data = array(); // menjadikan data sebagai array

		//proses query untuk mengambil data dari tb_kategori
		$sql = "SELECT * FROM tb_kategori  ORDER by id_kategori DESC";
        //proses eksekusi query
		$q = $this->db->query($sql);
		//apakah  data nya kosong atau tidak 
		if($q->num_rows() > 0){				
			//kondisi ketika data tidak kosong
			//menampilkan data result nya true
			$data['result'] = 'true';
			//menampilkan msg nya data kategori
			$data['msg'] = 'Data  Kategori';
			//menampilkan data request
			$data['data'] = $q->result();
		}else{
			//apabila data nya kosong
			//menampilkan nilai result false
			$data['result'] = 'false';
			//menampilkan message tidak ada data kategori
			$data['msg'] = 'Tidak ada data kategori';
		}
		//menampilkan hasil data kedalam bentuk json
		echo json_encode($data);
	}


	//bikin method baru untuk mengambil data kategori
	public function getBerita(){ 
		$data = array(); // menjadikan data sebagai array

		//proses query untuk mengambil data dari tb_kategori
		$sql = "SELECT * FROM berita, tb_kategori WHERE berita.id_cat = tb_kategori.id_kategori ORDER BY berita.id_berita DESC";
        //proses eksekusi query
		$q = $this->db->query($sql);
		//apakah  data nya kosong atau tidak 
		if($q->num_rows() > 0){				
			//kondisi ketika data tidak kosong
			//menampilkan data result nya true
			$data['result'] = 'true';
			//menampilkan msg nya data kategori
			$data['msg'] = 'Data  Berita';
			//menampilkan data request
			$data['data'] = $q->result();
		}else{
			//apabila data nya kosong
			//menampilkan nilai result false
			$data['result'] = 'false';
			//menampilkan message tidak ada data kategori
			$data['msg'] = 'Tidak ada data Berita';
		}
		//menampilkan hasil data kedalam bentuk json
		echo json_encode($data);
	}

	//method berita by id kategori
	public function getBeritaByIdKategori(){
		$data = array(); 
		$id_kategori = $this->input->post('id_kategori');
		//proses query untuk mengambil data dari berita
		$sql = "SELECT * FROM berita, tb_kategori WHERE berita.id_cat = tb_kategori.id_kategori and berita.id_cat = '$id_kategori' ORDER BY berita.id_berita DESC";
        //proses eksekusi query
		$q = $this->db->query($sql);
		//apakah  data nya kosong atau tidak 
		if($q->num_rows() > 0){				
			//kondisi ketika data tidak kosong
			//menampilkan data result nya true
			$data['result'] = 'true';
			$data['msg'] = 'Data  Berita';
			//menampilkan data request
			$data['data'] = $q->result();
		}else{
			//apabila data nya kosong
			//menampilkan nilai result false
			$data['result'] = 'false';
			//menampilkan message tidak ada data kategori
			$data['msg'] = 'Tidak ada data Berita';
		}
		//menampilkan hasil data kedalam bentuk json
		echo json_encode($data);
	}



	
}

//http://localhost/KamusApp/index.php/api/getAllKamus
	
