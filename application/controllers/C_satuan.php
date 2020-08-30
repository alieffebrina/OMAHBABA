<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_satuan extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library('session');
        $this->load->model('M_satuan');
        $this->load->model('M_Setting');
    }

    function index()
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('tipeuser');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['satuan'] = $this->M_satuan->getsatuan();
        $this->load->view('master/satuan/v_addsatuan',$data); 
        $this->load->view('template/footer');
    }

    function add()
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('tipeuser');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['satuan'] = $this->M_Setting->getsatuan();
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
        $cek = $this->M_satuan->tambahdata($id);

        $id_submenu = '5';
        $ket = 'tambah data satuan';
        $this->M_Setting->userlog($id, $id_submenu, $ket);

        if($cek){
            $this->session->set_flashdata('Sukses', "Data Satuan Berhasil Di Tambahkan.");
            
        }else{
            $this->session->set_flashdata('Sukses', "Data Satuan Tidak Boleh Sama Ataupun Kosong.");
        }
        redirect('C_satuan');
    }

    public function tambahsatuan()
    {   
        $id = $this->session->userdata('id_user');
        $this->M_satuan->tambahdata($id);

        $id_submenu = '5';
        $ket = 'tambah data satuan';
        $this->M_Setting->userlog($id, $id_submenu, $ket);

        $data = $this->M_satuan->getsatuan();
            $lists = "<option value=''>Pilih</option>";
        foreach($data as $data){
              $lists .= "<option value=".$data->id_satuan.">".$data->satuan."</option>"; // Tambahkan tag option ke variabel $lists
            }
        $callback = array('list_satuan'=>$lists); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota
        echo json_encode($callback); // konversi varibael $callback menjadi JSON

    }

    function view($ida)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('tipeuser');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['satuan'] = $this->M_satuan->getspek($ida);
        $this->load->view('master/satuan/v_vsatuan',$data); 
        $this->load->view('template/footer');
    }

    function edit($iduser)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('tipeuser');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['satuan'] = $this->M_satuan->getspek($iduser);
        $this->load->view('master/satuan/v_esatuan',$data); 
        $this->load->view('template/footer');
    }

    function editsatuan()
    {   

        $id = $this->session->userdata('id_user');
        $this->M_satuan->edit($id);

        $id_submenu = '5';
        $ket = 'edit data satuan';
        $this->M_Setting->userlog($id, $id_submenu, $ket);

        $this->session->set_flashdata('Sukses', "Data satuan Berhasil Di Perbarui");
        redirect('C_satuan');
    }

    function hapus($id){
        $where = array('id_satuan' => $id);
        $this->M_Setting->delete($where,'tb_satuan');

        $id_submenu = '5';
        $ket = 'hapus data satuan'.$id;
        $this->M_Setting->userlog($id, $id_submenu, $ket);

        $this->session->set_flashdata('Sukses', "Data satuan Berhasil Di Hapus");
        redirect('C_satuan');
    }

}