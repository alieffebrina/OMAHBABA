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
        $id = $this->session->userdata('id_user');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['suplier'] = $this->M_suplier->getsuplier();
        $this->load->view('master/suplier/v_suplier',$data); 
        $this->load->view('template/footer');
    }

    function add()
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('id_user');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
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

    public function tambah()
    {   

        $id = $this->session->userdata('id_user');
        $this->M_suplier->tambahdata($id);
        // $data = $this->M_suplier->cekkodesuplier();
        // foreach ($data as $id) {
        //     $id =$id;
        //     $this->M_suplier->tambahakses($id);
        // }
        $this->session->set_flashdata('SUCCESS', "Record Added Successfully!!");
        redirect('C_suplier');
    }

    function view($ida)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('id_user');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['suplier'] = $this->M_suplier->getspek($ida);
        $this->load->view('master/suplier/v_vsuplier',$data); 
        $this->load->view('template/footer');
    }

    function edit($iduser)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('id_user');
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
        $this->session->set_flashdata('SUCCESS', "Record Added Successfully!!");
        redirect('C_suplier');
    }

    function hapus($id){
        $where = array('id_suplier' => $id);
        $this->M_Setting->delete($where,'tb_suplier');
        $this->session->set_flashdata('SUCCESS', "Record Added Successfully!!");
        redirect('C_suplier');
    }

}