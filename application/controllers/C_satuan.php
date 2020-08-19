<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_satuan extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library('session');
        $this->load->model('M_satuan');
        $this->load->model('M_Setting');
        if(!$this->session->userdata('id_user')){
            redirect('C_Login');
        }
    }

    // function index()
    // {
    //     $this->load->view('template/header');
    //     $id = $this->session->userdata('id_user');
    //     $data['menu'] = $this->M_Setting->getmenu1($id);
    //     $this->load->view('template/sidebar.php', $data);
    //     $data['satuan'] = $this->M_satuan->getsatuan();
    //     $this->load->view('master/satuan/v_satuan',$data); 
    //     $this->load->view('template/footer');
    // }

    function add()
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('id_user');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['satuan'] = $this->M_satuan->getsatuan(); 
        $this->load->view('master/satuan/v_addsatuan', $data);
        $this->load->view('template/footer');
    }

    function cek_satuan(){
        # ambil Kualifikasiname dari form
        
        $kode = $this->input->post('satuan');
                # select ke model member Kualifikasiname yang diinput Kualifikasi
        $hasil_kode = $this->M_satuan->cek_satuan($kode);
         
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
        $cek= $this->M_satuan->tambahdata($id);
        // $data = $this->M_satuan->cekkodesatuan();
        // foreach ($data as $id) {
        //     $id =$id;
        //     $this->M_satuan->tambahakses($id);
        // }
        if($cek){
            $this->session->set_flashdata('Sukses', "Data Berhasil Di Tambahkan.");
        }else{
            $this->session->set_flashdata('Sukses', "Data Tidak Boleh Sama Ataupun Kosong.");
        }
        redirect('C_satuan/add');
    }

    function view($ida)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('id_user');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['satuan'] = $this->M_satuan->getspek($ida);
        $this->load->view('master/satuan/v_vsatuan',$data); 
        $this->load->view('template/footer');
    }

    function edit($iduser)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('id_user');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        //$data['provinsi'] = $this->M_Setting->getprovinsi();
        $data['satuan'] = $this->M_satuan->getspek($iduser);
        $this->load->view('master/satuan/v_esatuan',$data); 
        $this->load->view('template/footer');
    }

    function editsatuan()
    {   

        $id = $this->session->userdata('id_user');
        $this->M_satuan->edit($id);
        $this->session->set_flashdata('Sukses', "Data Berhasil Diperbarui.");
        redirect('C_satuan/add');
    }

    function hapus($id){
        $where = array('id_satuan' => $id);
        $this->M_Setting->delete($where,'tb_satuan');
        $this->session->set_flashdata('Sukses', "Data Berhasil Dihapus");
        redirect('C_satuan/add');
    }

}