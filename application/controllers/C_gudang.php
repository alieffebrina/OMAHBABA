<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_gudang extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library('session');
        $this->load->model('M_gudang');
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
        $data['gudang'] = $this->M_gudang->getgudang();
        $this->load->view('master/gudang/v_gudang',$data); 
        $this->load->view('template/footer');
    }

    function add()
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('tipeuser');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['gudang'] = $this->M_Setting->getgudang();
        $data['provinsi'] = $this->M_Setting->getprovinsi();
        $this->load->view('master/gudang/v_addgudang', $data); 
        $this->load->view('template/footer');
    }

    function cek_gudang(){
        # ambil Kualifikasiname dari form
        
        $kode = $this->input->post('gudang');
                # select ke model member Kualifikasiname yang diinput Kualifikasi
        $hasil_kode = $this->M_gudang->cek_gudang($kode);
         
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
        $this->M_gudang->tambahdata($id);

        $id_submenu = '39';
        $ket = 'tambah data gudang';
        $this->M_Setting->userlog($id, $id_submenu, $ket);

        $this->session->set_flashdata('SUCCESS', "Record Added Successfully!!");
        redirect('C_gudang');
    }

    public function tambahgudang()
    {   
        $id = $this->session->userdata('id_user');
        $this->M_gudang->tambahdata($id);

        $id_submenu = '39';
        $ket = 'tambah data gudang';
        $this->M_Setting->userlog($id, $id_submenu, $ket);

        $data = $this->M_gudang->getgudang();
            $lists = "<option value=''>Pilih</option>";
        foreach($data as $data){
              $lists .= "<option value=".$data->id_gudang.">".$data->gudang."</option>"; // Tambahkan tag option ke variabel $lists
            }
        $callback = array('list_gudang'=>$lists); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota
        echo json_encode($callback); // konversi varibael $callback menjadi JSON

    }

    function view($ida)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('tipeuser');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['gudang'] = $this->M_gudang->getspek($ida);
        $this->load->view('master/gudang/v_vgudang',$data); 
        $this->load->view('template/footer');
    }

    function edit($iduser)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('id_user');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['provinsi'] = $this->M_Setting->getprovinsi();
        $data['gudang'] = $this->M_gudang->getspek($iduser);
        $this->load->view('master/gudang/v_egudang',$data); 
        $this->load->view('template/footer');
    }

    function editgudang()
    {   

        $id = $this->session->userdata('id_user');
        $this->M_gudang->edit($id);

        $id_submenu = '39';
        $ket = 'edit data gudang';
        $this->M_Setting->userlog($id, $id_submenu, $ket);

        $this->session->set_flashdata('Sukses', "Data Gudang Berhasil Di Perbarui.");
        redirect('C_gudang');
    }

    function hapus($id){
        $where = array('id_gudang' => $id);
        $this->M_Setting->delete($where,'tb_gudang');


        $id_submenu = '39';
        $ket = 'hapus data gudang';
        $this->M_Setting->userlog($id, $id_submenu, $ket);

        $this->session->set_flashdata('Sukses', "Data Gudang Berhasil Di Hapus.");
        redirect('C_gudang');
    }

}