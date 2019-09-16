<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class MedController extends CI_Controller{

	public function index(){
		
		redirect('beranda');
	}

	public function sitemap(){
		$data['urlslist'] = $this->MedModel->m_getURLS();
		$this->load->view("sitemap_view",$data);
	}

//---------------------------------------------------------------------------------------------------------------------user view interface

	public function tag($src){
		$try = $this->MedModel->m_searching($src);
		if ($try->num_rows() > 0) {
			$data['msg_cari'] = 'Hasil pencarian "'.$src.'"';
			$data['konten'] = $try->result();
		}else{
			$data['msg_cari'] = 'Pencarian "'.$src.'" tidak ditemukan';
		}
		$this->load->view('reading_interface/search',$data);
	}

	public function cari(){
		$src = $this->input->post("cari");
		$try = $this->MedModel->m_searching($src);
		if ($try->num_rows() > 0) {
			$data['msg_cari'] = 'Hasil pencarian "'.$src.'"';
			$data['konten'] = $try->result();
		}else{
			$data['msg_cari'] = 'Pencarian "'.$src.'" tidak ditemukan';
		}
		$this->load->view('reading_interface/search',$data);
}

	public function artikel($jdl){
		$judulx = explode("-", $jdl);
		$judul = implode(" ", $judulx);

		//statistik
		$ip      = $_SERVER['REMOTE_ADDR'];
		$tanggal = date("Y-m-d");
		$waktu   = time();
		$id_ar = $this->MedModel->m_readArtikel_title($judul)->ID_ARTIKEL; //ambil id
		$s = $this->MedModel->m_cek_stat($ip, $tanggal, $id_ar); //cek sdh pernah berkunjung
// 		echo $s->num_rows()." -- ";
		if($s->num_rows() < 1){
// 			echo "belum ";
			$this->MedModel->m_set_stat($ip, $tanggal, $id_ar);

			$totalpengunjung  = $this->MedModel->m_view_stat($id_ar);
			$id_exist = $this->MedModel->m_cek_artikel_stat_id($id_ar);

			if($id_exist < 1){
				//echo $id_ar;
				$this->MedModel->m_insert_artikel_stat($id_ar, $totalpengunjung);
			}else {
				$this->MedModel->m_upd_artikel_stat($id_ar, $totalpengunjung);
			}
		}
// 		echo $totalpengunjung;

		$data['konten'] = $this->MedModel->m_readArtikel_title($judul);
		$this->load->view('reading_interface/view', $data);
	}

	public function kontak(){
		$data['msg'] = "";
		if($this->input->post('submit')){
			$this->load->library('form_validation');
	    $this->form_validation->set_rules('subs', 'Your Email', 'trim|required|valid_email');

			if($this->form_validation->run() == FALSE){
				$data['msg'] = "fail";
			}else{
				$data['msg'] = "success";
				$mail = $this->input->post("subs");
				$this->MedModel->m_subscribe($mail);
			}
			$this->load->view('reading_interface/kontak',$data);
		}else{
			$this->load->view('reading_interface/kontak',$data);
		}
	}

	public function kategori($ktg){
		$ktgx = explode("-",  $ktg);
		$data['kategori'] = implode(" ", $ktgx);
		$data['konten'] = $this->MedModel->m_get_kategori($data['kategori']);
		$this->load->view('reading_interface/kategori', $data);
	}

	public function tentang(){
		$this->load->view('reading_interface/tentang');
	}

	public function beranda(){
		// init params
		$data = array();
		$limit_per_page = 6;
		$page = ($this->uri->segment(2)) ? ($this->uri->segment(2) - 1) : 0;
		$total_records = $this->MedModel->m_count_all_artikel();

		if ($total_records > 0){
			// get current page records
			$data["dataartikel"] = $this->MedModel->get_current_page_records($limit_per_page, $page*$limit_per_page);

			$config['base_url'] = base_url().'beranda';
			$config['total_rows'] = $total_records;
			$config['per_page'] = $limit_per_page;
			$config["uri_segment"] = 2;

			// custom paging configuration
			$config['num_links'] = 2;
			$config['use_page_numbers'] = TRUE;
			$config['reuse_query_string'] = TRUE;

			$config['full_tag_open'] = '<ul class="pagination">';
			$config['full_tag_close'] = '</ul>';

			$config['first_link'] = '&laquo;';
			$config['first_tag_open'] = '<li class="firstlink">';
			$config['first_tag_close'] = '</li>';

			$config['last_link'] = '&raquo;';
			$config['last_tag_open'] = '<li class="lastlink">';
			$config['last_tag_close'] = '</li>';

			$config['next_link'] = '&gt;';
			$config['next_tag_open'] = '<li class="nextlink">';
			$config['next_tag_close'] = '</li>';

			$config['prev_link'] = '&lt;';
			$config['prev_tag_open'] = '<li class="prevlink">';
			$config['prev_tag_close'] = '</li>';

			$config['cur_tag_open'] = '<li class="active"><a href="#">';
			$config['cur_tag_close'] = '</a></li>';

			$config['num_tag_open'] = '<li class="">';
			$config['num_tag_close'] = '</li>';

			$this->pagination->initialize($config);

			// build paging links
			$data["links"] = $this->pagination->create_links();
		}

		//$data['dataartikel'] = $this->MedModel->m_readAll_artikel();
		$data['popular_post'] = $this->MedModel->m_popular(6);
		$this->load->view('reading_interface/index', $data);
	}
//---------------------------------------------------------------------------------------------------------------------administrator interface
	public function register(){
		$data['msg'] = "";
		if($this->input->post('submit')){
			$this->load->library('form_validation');
	    // field name, error message, validation rules
	    $this->form_validation->set_rules('fname', 'User Name', 'trim|required|min_length[3]');
	    $this->form_validation->set_rules('email', 'Your Email', 'trim|required|valid_email');
	    $this->form_validation->set_rules('pass', 'Password', 'trim|required|min_length[8]|max_length[32]');
	    $this->form_validation->set_rules('repass', 'Password Confirmation', 'trim|required|matches[pass]');

			$get_kode = $this->MedModel->m_get_code($this->input->post('kode'));
			$code = $get_kode->row();
			$email = $this->input->post('email');
			$cekEmail = $this->MedModel->m_cek_mail($email);

	    if($this->form_validation->run() == FALSE || $get_kode->num_rows() < 1 || strtolower($code->STATUS) == "aktiv" || $cekEmail > 1 ) {
				if($get_kode->num_rows() < 1){
					$data['msg'] = 'The Code field is invalid code';
				}else if(strtolower($code->STATUS) == "aktiv"){
					$data['msg'] = 'The Code is used by another person';
				}else if($cekEmail > 1){
					$data['msg'] = 'The Email is used by another person';
				}
	      $this->load->view('daftar',$data);
	    } else {
	      // post values
				//echo $this->input->post("userfile");
	      $fname = $this->input->post('fname');
	      $lname = $this->input->post('lname');
	      $gender = $this->input->post('gender');
	      $job = $this->input->post('pekerjaan');
				$about = $this->input->post('tentang');
				$password = $this->input->post('pass');

				$config['upload_path'] = './asset/profile/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
				$config['overwrite'] = TRUE;

				$this->load->library('upload', $config);
				if ($this->upload->do_upload()){
					$gbr = $this->upload->data();
					//Compress Image
		      $config['image_library']='gd2';
		      $config['source_image']='/asset/profile/'.$gbr['file_name'];
		      $config['create_thumb']= FALSE;
		      $config['maintain_ratio']= FALSE;
		      $config['quality']= '60%';
		      //$config['width']= 272;
		      //$config['height']= 204;
		      $config['new_image']= '/asset/profile/'.$gbr['file_name'];
		      $this->load->library('image_lib', $config);
		      $this->image_lib->resize();
				}

				$image = $gbr['file_name'];
				$id_code = $code->ID_KODE;
				$name = $fname." ".$lname;
				$passwordx = md5($password);

				// insert values in database
				$this->MedModel->m_add_writer($name, $gender, $job, $about, $email, $passwordx, $image, $id_code);
				$this->MedModel->m_set_code($id_code, "aktiv");

				$data['msg'] = 'success';
				$this->load->view('daftar',$data);
	    }
		}else{
			$this->load->view('daftar',$data);
		}
	}

	public function login(){
		$this->session->unset_userdata('username', '');
		$this->load->view('login');
	}

	//------------------view login
	function proses_login() {
		$mail = $this->input->post('email');
		$password = $this->input->post('password');
		$passwordx = md5($password);
		$q = $this->MedModel->m_verify($mail, $passwordx);

		if ($q->num_rows() == 1) {
			$mailx = $q->row_array();
			$this->session->set_userdata('username',$mailx['NAMA']);
			$data['user'] = $mailx['NAMA'];
			redirect('page/utama/'.$data['user']);
		}
		else {
			redirect('login');
		}
	}

	//-----------------view page
	public function page(){
		$data['panggil'] = $this->uri->segment(2);
		$data['user'] = urldecode($this->uri->segment(3));
		$data['msg'] = $this->uri->segment(4);
		$data['cari'] = $this->uri->segment(5);
		$data['foto'] = $this->MedModel->m_data_penulis($data['user'])->GAMBAR;

		if($this->session->userdata('username')==''){
			redirect('login');
		}else if($this->session->userdata('username')!=$data['user']){
			redirect('login');
		}else{
			if($data['panggil']=='artikel'){
				if($data['msg']=='edit'){
					$id = $this->uri->segment(5);
					$data['dataedit'] = $this->MedModel->m_readArtikel_by($id);
					$data['dataartikel'] = $this->MedModel->m_readAll_artikel();
				}
				else if($data['cari'] != ''){
					$data['dataartikel'] = $this->MedModel->m_srch_artikel($data['cari']);
				}
				else{
					$data['dataartikel'] = $this->MedModel->m_readAll_artikel();
				}
				$data['datahistori'] = $this->MedModel->m_readAll_histori();
			}
			else if($data['panggil']=='utama'){
				$data['jml_art'] = $this->MedModel->m_count_artikel($data['user']);
				$data['popular_post'] = $this->MedModel->m_popular_by($data['user'], 5);
				$data['datautama'] = $this->MedModel->m_get_artikel_info($data['user'], 1);

				$data['datakategori'] = $this->MedModel->m_kategori($data['user']);
				$data['jmlkategori'] = array();
				foreach($data['datakategori'] as $ind){
					$tamp =  $this->MedModel->m_count_kategori($data['user'], $ind->KATEGORI);
					array_push($data['jmlkategori'], $tamp);
				}
			}
			else if($data['panggil']=='profile'){
				$data['dataadmin'] = $this->MedModel->m_data_penulis($data['user']);
			}
			else if($data['panggil']=='signout'){
				redirect('login');
			}
			$this->load->view('page_root',$data);
		}
	}

	//---------setting password
	public function set_password($userx){
		$latePass = $this->input->post('currentPass');
		$newPass = $this->input->post('newPass');
		$conPass = $this->input->post('conPass');
		$passwordx = md5($latePass);
		$user = urldecode($userx);
		$mail = $this->MedModel->m_data_penulis($user)->EMAIL_USER;

		$q = $this->MedModel->m_verify($mail, $passwordx);
		if ($newPass == $conPass) {
			if ($q->num_rows() == 1) {
				$passwordy = md5($newPass);
				$this->MedModel->m_change_pass($mail, $passwordy);

				redirect('page/pengaturan/'.$user.'/success');
			}else{
				redirect('page/pengaturan/'.$user.'/failure');
			}
		}else {
			redirect('page/pengaturan/'.$user.'/dismatch');
		}
	}

	//--------------------artikel_post
	public function save_post($userx){
		$config['upload_path'] = './asset/images/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
		$config['overwrite'] = TRUE;
		//$config['encrypt_name'] = TRUE;

		$this->load->library('upload', $config);
		if ($this->upload->do_upload()){
			$gbr = $this->upload->data();
			//Compress Image
      $config['image_library']='gd2';
      $config['source_image']='./asset/images/'.$gbr['file_name'];
      $config['create_thumb']= FALSE;
      $config['maintain_ratio']= FALSE;
      $config['quality']= '60%';
      //$config['width']= 272;
      //$config['height']= 204;
      $config['new_image']= './asset/images/'.$gbr['file_name'];
      $this->load->library('image_lib', $config);
      $this->image_lib->resize();

			$gambar=$gbr['file_name'];
			$jdl = $this->input->post('judul');
	    $isi = $this->input->post('berita');
			$ktg = $this->input->post('kategori');
			$user =  urldecode($userx);
			$tag = $this->input->post('tag');

			if($this->input->post('sbm')){
				if($this->input->post('sbm') == "post"){
					$this->MedModel->m_create_post($ktg, $jdl, $isi, $gambar, $user, $tag, 1);
				}else{
					$this->MedModel->m_create_post($ktg, $jdl, $isi, $gambar, $user, $tag, 0);
				}
				redirect('page/artikel/'.$user.'/post');
			}else{
				redirect('page/artikel/'.$user.'/add');
			}
		}
	}

	//--------------------artikel_delete
	public function del_post(){
		$user =  urldecode($this->uri->segment(2));
		$id = $this->uri->segment(3);
		$post = $this->uri->segment(4);

		$this->MedModel->m_del_mypost($id);
		if($post==1){
			redirect('page/artikel/'.$user.'/post');
		}else{
			redirect('page/artikel/'.$user.'/draft');
		}
	}
	//--------------------artikel_update
	public function update_post(){
		$user =  urldecode($this->uri->segment(2));
		$id = $this->uri->segment(3);
    //echo $this->input->post('sbm');
		if($this->input->post('sbm')){
		  //echo "submit";
			$config['upload_path'] = './asset/images/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
			$config['overwrite'] = TRUE;

			$this->load->library('upload', $config);
			if ($this->upload->do_upload()){
				$gbr = $this->upload->data();
				//Compress Image
	      $config['image_library']='gd2';
	      $config['source_image']='./asset/images/'.$gbr['file_name'];
	      $config['create_thumb']= FALSE;
	      $config['maintain_ratio']= FALSE;
	      $config['quality']= '60%';
	      //$config['width']= 710;
	      //$config['height']= 420;
	      $config['new_image']= './asset/images/'.$gbr['file_name'];
	      $this->load->library('image_lib', $config);
	      $this->image_lib->resize();

				$gambar=$gbr['file_name'];
				$jdl = $this->input->post('judul');
		    $isi = $this->input->post('berita');
				$ktg = $this->input->post('kategori');
				$tag = $this->input->post('tag');

				if($this->input->post('sbm')){
					if($this->input->post('sbm') == "post"){
					 	//echo "post";
						$this->MedModel->m_upd_mypost($id, $ktg, $jdl, $isi, $gambar, $tag, 1);
					}else{
					 	//echo "draf";
						$this->MedModel->m_upd_mypost($id, $ktg, $jdl, $isi, $gambar, $tag, 0);
					}
					redirect('page/artikel/'.$user.'/post');
				}else{
					redirect('page/artikel/'.$user.'/add');
				}
			}
		}else{
			redirect('page/artikel/'.$user.'/edit/'.$id);
		}
	}

	//--------------------artikel_search
	public function search_post(){
    $search = $this->input->post('search');
		$user =  urldecode($this->uri->segment(2));
		$mode = $this->uri->segment(3);

		if($mode=='post'){
			redirect('page/artikel/'.$user.'/post/'.$search);
		}else{
			redirect('page/artikel/'.$user.'/draft/'.$search);
		}
	}
}
