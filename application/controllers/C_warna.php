<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_warna extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library('session');
        $this->load->model('M_warna');
        $this->load->model('M_Setting');
        if(!$this->session->userdata('id_user')){
            redirect('C_Login');
        }
    }

    function index()
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('id_user');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['warna'] = $this->M_warna->getwarna();
        $this->load->view('master/warna/v_warna',$data); 
        $this->load->view('template/footer');
    }

    function add()
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('id_user');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['warna'] = $this->M_Setting->getwarna();
        $this->load->view('master/warna/v_addwarna', $data); 
        $this->load->view('template/footer');
    }

    function cek_warna(){
        # ambil Kualifikasiname dari form
        
        $kode = $this->input->post('warna');
                # select ke model member Kualifikasiname yang diinput Kualifikasi
        $hasil_kode = $this->M_warna->cek_warna($kode);
         
                # pengecekan value $hasil_Kualifikasiname
        if(count($hasil_kode)!=0){
          # kalu value $hasil_Kualifikasiname tidak 0
                  # echo 1 untuk pertanda Kualifikasiname sudah ada pada db    
                       echo '1';
        }else{
                  # kalu value $hasil_Kualifikasiname = 0
                  # echo 2 untuk pertanda Kualifikasiname belum ada pada db
            echo '2';
        }
         
    }

    public function tambah()
    {   

        $id = $this->session->userdata('id_user');
        $cek= $this->M_warna->tambahdata($id);
        // $data = $this->M_satuan->cekkodesatuan();
        // foreach ($data as $id) {
        //     $id =$id;
        //     $this->M_satuan->tambahakses($id);
        // }
        if($cek){
            $this->session->set_flashdata('Sukses', "Data warna Berhasil Di Tambahkan.");
        }else{
            $this->session->set_flashdata('Sukses', "Data warna Tidak Boleh Sama Ataupun Kosong.");
        }
        redirect('C_warna/add');
    }

    function view($ida)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('id_user');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['warna'] = $this->M_warna->getspek($ida);
        $this->load->view('master/warna/v_vwarna',$data); 
        $this->load->view('template/footer');
    }

    function edit($iduser)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('id_user');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        //$data['provinsi'] = $this->M_Setting->getprovinsi();
        $data['warna'] = $this->M_warna->getspek($iduser);
        $this->load->view('master/warna/v_ewarna',$data); 
        $this->load->view('template/footer');
    }

    function editwarna()
    {   

        $id = $this->session->userdata('id_user');
        $this->M_warna->edit($id);
        $this->session->set_flashdata('Sukses', "Data warna Berhasil Di Perbarui.");
        redirect('C_warna/add');
    }

    function hapus($id){
        $where = array('id_warna' => $id);
        $this->M_Setting->delete($where,'tb_warna');
        $this->session->set_flashdata('Sukses', "Data warna Berhasil Di Hapus.");
        redirect('C_warna/add');
    }

}