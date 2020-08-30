<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_voucher extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library('session');
        $this->load->model('M_voucher');
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
        $data['voucher'] = $this->M_voucher->getvoucher();
        $this->load->view('master/voucher/v_voucher',$data); 
        $this->load->view('template/footer');
    }

    function add()
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('tipeuser');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $modul = 'voucher';
        $kode = $this->M_Setting->cekkode($modul);
        foreach ($kode as $modul) {
            $a = $modul->kodefinal;
            date_default_timezone_set('Asia/Jakarta');
            $tgl = date('dmY');
            $a = str_replace("tanggal", $tgl, $a);
            $data = $this->M_voucher->getvoucher();
            $id = count($data)+1;
            $a = str_replace("no", $id, $a);
        }
        $idnama = $this->session->userdata('nama');
        $name = str_replace("username", $idnama, $a);
        $data['kode'] = $name;
        // $data['tipeuser'] = $this->M_User->gettipeuser();
        $this->load->view('master/voucher/v_addvoucher', $data); 
        // $this->load->view('master/user/v_modal');
        $this->load->view('template/footer');
    }

    function cek_voucherkode(){
        $tabel = 'tb_voucher';
        $cek = 'kodevoucher';
        $kode = $this->input->post('kodevoucher');
        $hasil_kode = $this->M_Setting->cek($cek,$kode,$tabel);
        if(count($hasil_kode)!=0){ 
            echo '1';
        }else{
            echo '2';
        }
    }

    function cek_voucher(){
        # ambil Kualifikasiname dari form
        
        $kode = $this->input->post('id_voucher');
                # select ke model member Kualifikasiname yang diinput Kualifikasi
        $hasil_kode = $this->M_voucher->getspek($kode);
         
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
        $this->M_voucher->tambahdata($id);
        
        $id_submenu = '35';
        $ket = 'tambah data voucher';
        $this->M_Setting->userlog($id, $id_submenu, $ket);

        $this->session->set_flashdata('Sukses', "Data Voucher Berhasil Di Tambahkan.");
        redirect('C_voucher');
    }

    function view($ida)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('tipeuser');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['voucher'] = $this->M_voucher->getspek($ida);
        $this->load->view('master/voucher/v_vvoucher',$data); 
        $this->load->view('template/footer');
    }

    function edit($iduser)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('tipeuser');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['voucher'] = $this->M_voucher->getspek($iduser);
        $data['tipeuser'] = $this->M_User->gettipeuser();
        $this->load->view('master/voucher/v_evoucher',$data); 
        $this->load->view('template/footer');
    }

    function editvoucher()
    {   

        $id = $this->session->userdata('id_user');
        $this->M_voucher->edit($id);

        $id_submenu = '35';
        $ket = 'edit tipe voucher';
        $this->M_Setting->userlog($id, $id_submenu, $ket);

        $this->session->set_flashdata('Sukses', "Data Voucher Berhasil Di Perbarui.");
        redirect('C_voucher');
    }

    function hapus($id){
        $where = array('id_voucher' => $id);
        $this->M_Setting->delete($where,'tb_voucher');

        $ida = $this->session->userdata('id_user');
        $id_submenu = '35';
        $ket = 'hapus data voucher '.$id;
        $this->M_Setting->userlog($ida, $id_submenu, $ket);

        $this->session->set_flashdata('Sukses', "Data Voucher Berhasil Di Hapus.");
        redirect('C_voucher');
    }
}