<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_User extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library('session');
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
        $data['user'] = $this->M_User->getuser();
        $this->load->view('master/user/v_user',$data); 
        $this->load->view('template/footer');
    }

    function tipeuser()
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('tipeuser');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['tipe'] = $this->M_User->gettipeuser();
        $this->load->view('master/user/v_tipeuser',$data); 
        $this->load->view('template/footer');
    }

    function add()
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('tipeuser');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $modul = 'staf';
        $kode = $this->M_Setting->cekkode($modul);
        foreach ($kode as $modul) {
            $a = $modul->kodefinal;
            date_default_timezone_set('Asia/Jakarta');
            $tgl = date('dmY');
            $a = str_replace("tanggal", $tgl, $a);
            $data = $this->M_User->getuser();
            $id = count($data)+1;
            $a = str_replace("no", $id, $a);
        }
        $idnama = $this->session->userdata('nama');
        $name = str_replace("username", $idnama, $a);
        $data['kode'] = $name;
        $data['provinsi'] = $this->M_Setting->getprovinsi();
        $data['cabang'] = $this->M_Setting->getcabangss();
        $data['tipeuser'] = $this->M_User->gettipeuser();
        $this->load->view('master/user/v_adduser', $data); 
        $this->load->view('master/user/v_modal');
        $this->load->view('template/footer');
    }

    function cek_user(){
        $tabel = 'tb_staf';
        $cek = 'username';
        $kode = $this->input->post('user');
        $hasil_kode = $this->M_Setting->cek($cek,$kode,$tabel);
        if(count($hasil_kode)!=0){ 
            echo '1';
        }else{
            echo '2';
        }
         
    }

    function cek_kodeuser(){
        $tabel = 'tb_staf';
        $cek = 'nopegawai';
        $kode = $this->input->post('nopegawai');
        $hasil_kode = $this->M_Setting->cek($cek,$kode,$tabel);
        if(count($hasil_kode)!=0){ 
            echo '1';
        }else{
            echo '2';
        }
         
    }

    public function tambah()
    {   
        $this->M_User->tambahdata();

        $id = $this->session->userdata('id_user');
        $id_submenu = '1';
        $ket = 'tambah data staf';
        $this->M_Setting->userlog($id, $id_submenu, $ket);

        $this->session->set_flashdata('SUCCESS', "Record Added Successfully!!");
        redirect('C_User');
    }

    public function tambahtipeuser()
    {   
        $this->M_User->tambahtipeuser();
        $data = $this->M_User->cekkodetipeuser();
        foreach ($data as $id) {
            $id = $id;
            $this->M_User->tambahakses($id);
        }

        $id = $this->session->userdata('id_user');
        $id_submenu = '2';
        $ket = 'tambah data tipe user';
        $this->M_Setting->userlog($id, $id_submenu, $ket);

        $data = $this->M_User->gettipeuser();
            $lists = "<option value=''>Pilih</option>";
        foreach($data as $data){
              $lists .= "<option value=".$data->id_tipeuser.">".$data->tipeuser."</option>"; // Tambahkan tag option ke variabel $lists
            }
        $callback = array('list_tipeuser'=>$lists); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota
        echo json_encode($callback); // konversi varibael $callback menjadi JSON

    }

    public function tambahtipeuserindex(){   
        $this->M_User->tambahtipeuser();
        
        $data = $this->M_User->cekkodetipeuser();
        foreach ($data as $id) {
            $id = $id;
            $this->M_User->tambahakses($id);
        }

        $id = $this->session->userdata('id_user');
        $id_submenu = '2';
        $ket = 'tambah data tipe user';
        $this->M_Setting->userlog($id, $id_submenu, $ket);

        $this->session->set_flashdata('SUCCESS', "Record Added Successfully!!");
        redirect('C_User/tipeuser');
    }

    function view($ida)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('tipeuser');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['user'] = $this->M_User->getspek($ida);
        $this->load->view('master/user/v_vuser',$data); 
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
        $data['tipeuser'] = $this->M_User->gettipeuser();
        $data['user'] = $this->M_User->getspek($iduser);
        $this->load->view('master/user/v_euser',$data); 
        $this->load->view('template/footer');
    }

    function edittipe($tipe)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('tipeuser');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['tipeedit'] = $this->M_User->gettipe($tipe);
        $data['tipe'] = $this->M_User->gettipeuser();
        $this->load->view('master/user/v_etipeuser',$data); 
        $this->load->view('template/footer');
    }

    function edituser()
    {   
        $this->M_User->edit();

        $id = $this->session->userdata('id_user');
        $id_submenu = '2';
        $ket = 'edit data user';
        $this->M_Setting->userlog($id, $id_submenu, $ket);

        $this->session->set_flashdata('SUCCESS', "Record Update Successfully!!");
        redirect('C_User');
    }

    function edittipeuser()
    {   
        $this->M_User->edittipeuser();

        $id = $this->session->userdata('id_user');
        $id_submenu = '2';
        $ket = 'edit tipe user';
        $this->M_Setting->userlog($id, $id_submenu, $ket);

        $this->session->set_flashdata('SUCCESS', "Record Update Successfully!!");
        redirect('C_User/tipeuser');
    }

    function hapus($id){
        $where = array('id_user' => $id);

        $ida = $this->session->userdata('id_user');
        $id_submenu = '2';
        $ket = 'hapus data user '.$id;
        $this->M_Setting->userlog($ida, $id_submenu, $ket);

        $this->M_Setting->delete($where,'tb_staf');
        $this->session->set_flashdata('SUCCESS', "Record Delete Successfully!!");
        redirect('C_User');
    }

    function hapustipeuser($id){
        $where = array('id_tipeuser' => $id);

        $ida = $this->session->userdata('id_user');
        $id_submenu = '2';
        $ket = 'hapus tipe user '.$id;
        $this->M_Setting->userlog($ida, $id_submenu, $ket);

        $this->M_Setting->delete($where,'tb_tipeuser');
        $this->session->set_flashdata('SUCCESS', "Record Delete Successfully!!");
        redirect('C_User/tipeuser');
    }

}