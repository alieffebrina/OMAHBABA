<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_suplier extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library('session');
        $this->load->model('M_suplier');
        $this->load->model('M_Setting');
    }

    function index()
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('tipeuser');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['suplier'] = $this->M_suplier->getsuplier();
        $this->load->view('master/suplier/v_suplier',$data); 
        $this->load->view('template/footer');
    }

    function add()
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('tipeuser');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $modul = 'suplier';
        $kode = $this->M_Setting->cekkode($modul);
        foreach ($kode as $modul) {
            $a = $modul->kodefinal;
            date_default_timezone_set('Asia/Jakarta');
            $tgl = date('dmY');
            $a = str_replace("tanggal", $tgl, $a);
            $data = $this->M_suplier->getsuplier();
            $id = count($data)+1;
            $a = str_replace("no", $id, $a);
        }
        $idnama = $this->session->userdata('nama');
        $name = str_replace("username", $idnama, $a);
        $data['kode'] = $name;
        $data['provinsi'] = $this->M_Setting->getprovinsi();
        $this->load->view('master/suplier/v_addsuplier', $data); 
        $this->load->view('template/footer');
    }

    function cek_suplier(){
            // Ambil data ID Provinsi yang dikirim via ajax post
            $iduser = $this->input->post('id_suplier');
            
            $hasil_kode = $this->M_suplier->getspek($iduser);
            
            // Buat variabel untuk menampung tag-tag option nya
            // Set defaultnya dengan tag option Pilih
            // $lists = " <input type='text' class='form-control' id='nama_suplier' name='nama_suplier' readonly>";
            
            foreach($hasil_kode as $data){
              $lists = " <input type='text' class='form-control' id='nama_suplier' name='nama_suplier' value='".$data->nama_suplier."' readonly>"; // Tambahkan tag option ke variabel $lists
              $ala = $data->alamat;
              $limit = $data->limit;
              // $lists = "ok";
            }
            
            // $lists = " <input type='text' class='form-control' id='nama_suplier' name='nama_suplier' value='".$hasil_kode."' readonly>";

            $callback = array('list_suplier'=>$lists, 'list_alamat'=>$ala, 'limit'=>$limit); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota
            echo json_encode($callback); // konversi varibael $callback menjadi JSON
    }

    function cek_suplierkode(){
        $tabel = 'tb_suplier';
        $cek = 'nosuplier';
        $kode = $this->input->post('nosuplier');
        $hasil_kode = $this->M_Setting->cek($cek,$kode,$tabel);
        if(count($hasil_kode)!=0){ 
            echo '1';
        }else{
            echo '2';
        }
    }

    public function tambah()
    {   

        $id = $this->session->userdata('id_user');
        $this->M_suplier->tambahdata($id);
        
        $id_submenu = '9';
        $ket = 'tambah data suplier';
        $this->M_Setting->userlog($id, $id_submenu, $ket);

        $this->session->set_flashdata('SUCCESS', "Record Added Successfully!!");
        redirect('C_suplier');
    }

    function view($ida)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('tipeuser');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['suplier'] = $this->M_suplier->getspek($ida);
        $this->load->view('master/suplier/v_vsuplier',$data); 
        $this->load->view('template/footer');
    }

    function edit($iduser)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('tipeuser');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['provinsi'] = $this->M_Setting->getprovinsi();
        $data['suplier'] = $this->M_suplier->getspek($iduser);
        $this->load->view('master/suplier/v_esuplier',$data); 
        $this->load->view('template/footer');
    }

    function editsuplier()
    {   

        $id = $this->session->userdata('id_user');
        $this->M_suplier->edit($id);

        $id_submenu = '9';
        $ket = 'edit tipe suplier';
        $this->M_Setting->userlog($id, $id_submenu, $ket);

        $this->session->set_flashdata('SUCCESS', "Record Added Successfully!!");
        redirect('C_suplier');
    }

    function hapus($id){
        $where = array('id_suplier' => $id);
        $this->M_Setting->delete($where,'tb_suplier');

        $ida = $this->session->userdata('id_user');
        $id_submenu = '9';
        $ket = 'hapus data suplier '.$id;
        $this->M_Setting->userlog($ida, $id_submenu, $ket);

        $this->session->set_flashdata('SUCCESS', "Record Added Successfully!!");
        redirect('C_suplier');
    }

}