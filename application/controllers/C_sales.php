<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_sales extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library('session');
        $this->load->model('M_sales');
        $this->load->model('M_User');
        $this->load->model('M_Setting');
        if(!$this->session->userdata('id_user')){
            redirect('C_Login');
        }
    }

    function index()
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('tipeuser');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['sales'] = $this->M_sales->getsales();
        $this->load->view('master/sales/v_sales',$data); 
        $this->load->view('template/footer');
    }

    function add()
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('tipeuser');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $modul = 'sales';
        $kode = $this->M_Setting->cekkode($modul);
        foreach ($kode as $modul) {
            $a = $modul->kodefinal;
            date_default_timezone_set('Asia/Jakarta');
            $tgl = date('dmY');
            $a = str_replace("tanggal", $tgl, $a);
            $data = $this->M_sales->getsales();
            $id = count($data)+1;
            $a = str_replace("no", $id, $a);
        }
        $idnama = $this->session->userdata('nama');
        $name = str_replace("username", $idnama, $a);
        $data['kode'] = $name;
        $data['provinsi'] = $this->M_Setting->getprovinsi();
        $data['cabang'] = $this->M_Setting->getcabangss();
        $data['tipeuser'] = $this->M_User->gettipeuser();
        $this->load->view('master/sales/v_addsales', $data); 
        $this->load->view('master/user/v_modal');
        $this->load->view('template/footer');
    }

    function cek_saleskode(){
        $tabel = 'tb_sales';
        $cek = 'nopegawai';
        $kode = $this->input->post('nopegawai');
        $hasil_kode = $this->M_Setting->cek($cek,$kode,$tabel);
        if(count($hasil_kode)!=0){ 
            echo '1';
        }else{
            echo '2';
        }
    }

    function cek_sales(){
        # ambil Kualifikasiname dari form
        
        $kode = $this->input->post('id_sales');
                # select ke model member Kualifikasiname yang diinput Kualifikasi
        $hasil_kode = $this->M_sales->getspek($kode);
         
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
        $this->M_sales->tambahdata($id);
        
        $id_submenu = '33';
        $ket = 'tambah data sales';
        $this->M_Setting->userlog($id, $id_submenu, $ket);

        $this->session->set_flashdata('SUCCESS', "Record Added Successfully!!");
        redirect('C_sales');
    }

    function view($ida)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('tipeuser');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['sales'] = $this->M_sales->getspek($ida);
        $this->load->view('master/sales/v_vsales',$data); 
        $this->load->view('template/footer');
    }

    function edit($iduser)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('tipeuser');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['provinsi'] = $this->M_Setting->getprovinsi();
        $data['cabang'] = $this->M_Setting->getcabangss();
        $data['sales'] = $this->M_sales->getspek($iduser);
        $data['tipeuser'] = $this->M_User->gettipeuser();
        $this->load->view('master/sales/v_esales',$data); 
        $this->load->view('template/footer');
    }

    function editsales()
    {   

        $id = $this->session->userdata('id_user');
        $this->M_sales->edit($id);

        $id_submenu = '33';
        $ket = 'edit tipe sales';
        $this->M_Setting->userlog($id, $id_submenu, $ket);

        $this->session->set_flashdata('SUCCESS', "Record Added Successfully!!");
        redirect('C_sales');
    }

    function hapus($id){
        $where = array('id_sales' => $id);
        $this->M_Setting->delete($where,'tb_sales');

        $ida = $this->session->userdata('id_user');
        $id_submenu = '33';
        $ket = 'hapus data sales '.$id;
        $this->M_Setting->userlog($ida, $id_submenu, $ket);

        $this->session->set_flashdata('SUCCESS', "Record Added Successfully!!");
        redirect('C_sales');
    }
}