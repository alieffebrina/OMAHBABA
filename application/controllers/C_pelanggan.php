<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_pelanggan extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library('session');
        $this->load->model('M_pelanggan');
        $this->load->model('M_Setting');
    }

    function index()
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('tipeuser');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['pelanggan'] = $this->M_pelanggan->getpelanggan();
        $this->load->view('master/pelanggan/v_pelanggan',$data); 
        $this->load->view('template/footer');
    }

    function add()
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('tipeuser');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $modul = 'pelanggan';
        $kode = $this->M_Setting->cekkode($modul);
        foreach ($kode as $modul) {
            $a = $modul->kodefinal;
            date_default_timezone_set('Asia/Jakarta');
            $tgl = date('dmY');
            $a = str_replace("tanggal", $tgl, $a);
            $data = $this->M_pelanggan->getpelanggan();
            $id = count($data)+1;
            $a = str_replace("no", $id, $a);
        }
        $idnama = $this->session->userdata('nama');
        $name = str_replace("username", $idnama, $a);
        $data['kode'] = $name;
        $data['provinsi'] = $this->M_Setting->getprovinsi();
        $this->load->view('master/pelanggan/v_addpelanggan', $data); 
        $this->load->view('template/footer');
    }

    // function cek_pelanggan(){
    //         // Ambil data ID Provinsi yang dikirim via ajax post
    //         $iduser = $this->input->post('id_pelanggan');
            
    //         $hasil_kode = $this->M_pelanggan->getspek($iduser);
            
    //         // Buat variabel untuk menampung tag-tag option nya
    //         // Set defaultnya dengan tag option Pilih
    //         // $lists = " <input type='text' class='form-control' id='nama_pelanggan' name='nama_pelanggan' readonly>";
            
    //         foreach($hasil_kode as $data){
    //           $lists = " <input type='text' class='form-control' id='nama' name='nama' value='".$data->nama."' readonly>"; // Tambahkan tag option ke variabel $lists
    //           $ala = $data->alamat;
    //           $limit = $data->limit;
    //           // $lists = "ok";
    //         }
            
    //         // $lists = " <input type='text' class='form-control' id='nama_pelanggan' name='nama_pelanggan' value='".$hasil_kode."' readonly>";

    //         $callback = array('list_pelanggan'=>$lists, 'list_alamat'=>$ala, 'limit'=>$limit); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota
    //         echo json_encode($callback); // konversi varibael $callback menjadi JSON
    // }

    function cek_pelanggankode(){
        $tabel = 'tb_pelanggan';
        $cek = 'nopelanggan';
        $kode = $this->input->post('nopelanggan');
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
        $this->M_pelanggan->tambahdata($id);
        
        $id_submenu = '8';
        $ket = 'tambah data pelanggan';
        $this->M_Setting->userlog($id, $id_submenu, $ket);

        $this->session->set_flashdata('Sukses', "Data Pelanggan Berhasil Di Tambahkan.");
        redirect('C_pelanggan');
    }

    function view($ida)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('tipeuser');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['pelanggan'] = $this->M_pelanggan->getspek($ida);
        $this->load->view('master/pelanggan/v_vpelanggan',$data); 
        $this->load->view('template/footer');
    }

    function edit($iduser)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('tipeuser');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['provinsi'] = $this->M_Setting->getprovinsi();
        $data['pelanggan'] = $this->M_pelanggan->getspek($iduser);
        $this->load->view('master/pelanggan/v_epelanggan',$data); 
        $this->load->view('template/footer');
    }

    function editpelanggan()
    {   

        $id = $this->session->userdata('id_user');
        $this->M_pelanggan->edit($id);

        $id_submenu = '8';
        $ket = 'edit tipe pelanggan';
        $this->M_Setting->userlog($id, $id_submenu, $ket);

        $this->session->set_flashdata('Sukses', "Data Pelanggan Berhasil Di Perbarui.");
        redirect('C_pelanggan');
    }

    function hapus($id){
        $where = array('id_pelanggan' => $id);
        $this->M_Setting->delete($where,'tb_pelanggan');

        $ida = $this->session->userdata('id_user');
        $id_submenu = '8';
        $ket = 'hapus data pelanggan '.$id;
        $this->M_Setting->userlog($ida, $id_submenu, $ket);

        $this->session->set_flashdata('Sukses', "Data Pelanggan Berhasil Di Hapus.");
        redirect('C_pelanggan');
    }

}