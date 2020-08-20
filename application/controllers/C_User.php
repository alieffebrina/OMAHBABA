<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_User extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library('session');
        $this->load->model('M_User');
        $this->load->model('M_Setting');
    }

    function index()
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('id_user');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['user'] = $this->M_User->getuser();
        $this->load->view('master/user/v_user',$data); 
        $this->load->view('template/footer');
    }

    function add()
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('id_user');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['provinsi'] = $this->M_Setting->getprovinsi();
        $data['cabang'] = $this->M_Setting->getcabangss();
        $data['tipeuser'] = $this->M_User->gettipeuser();
        $this->load->view('master/user/v_adduser', $data); 
        $this->load->view('template/footer');
    }

    function cek_user(){
        # ambil Kualifikasiname dari form
        
        $kode = $this->input->post('user');
                # select ke model member Kualifikasiname yang diinput Kualifikasi
        $hasil_kode = $this->M_User->cek_user($kode);
         
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
        $this->M_User->tambahdata();
        $this->session->set_flashdata('SUCCESS', "Record Added Successfully!!");
        redirect('C_User');
    }

    public function tambahtipeuser()
    {   
        $this->M_User->tambahtipeuser();
        $data = $this->M_User->gettipeuser();
            $lists = "<option value=''>Pilih</option>";
        foreach($data as $data){
              $lists .= "<option value=".$data->id_tipeuser.">".$data->tipeuser."</option>"; // Tambahkan tag option ke variabel $lists
            }
        $callback = array('list_tipeuser'=>$lists); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota
        echo json_encode($callback); // konversi varibael $callback menjadi JSON

    }

    function view($ida)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('id_user');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['user'] = $this->M_User->getspek($ida);
        $this->load->view('master/user/v_vuser',$data); 
        $this->load->view('template/footer');
    }

    function edit($iduser)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('id_user');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['provinsi'] = $this->M_Setting->getprovinsi();
        $data['cabang'] = $this->M_Setting->getcabangss();
        $data['user'] = $this->M_User->getspek($iduser);
        $this->load->view('master/user/v_euser',$data); 
        $this->load->view('template/footer');
    }

    function edituser()
    {   
        $this->M_User->edit();
        $this->session->set_flashdata('SUCCESS', "Record Added Successfully!!");
        redirect('C_User');
    }

    function hapus($id){
        $where = array('id_user' => $id);
        $this->M_Setting->delete($where,'tb_staf');
        $this->session->set_flashdata('SUCCESS', "Record Added Successfully!!");
        redirect('C_User');
    }

}