<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_warnagaram extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library('session');
        $this->load->model('M_warna');
        $this->load->model('M_Setting');
    }

    function index()
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('tipeuser');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['warna'] = $this->M_warna->getwarna();
        $this->load->view('master/warna/v_addwarnagaram',$data); 
        $this->load->view('template/footer');
    }

    function add()
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('tipeuser');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['warna'] = $this->M_Setting->getwarna();
        $this->load->view('master/warna/v_addwarnagaram', $data);
        $this->load->view('template/footer');
    }

    function cek_warna(){
        # ambil Kualifikasiname dari form
        
        $kode = $this->input->post('warna');
                # select ke model member Kualifikasiname yang diinput Kualifikasi
        $hasil_kode = $this->M_warna->cek_warna($kode);
         
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
        $cek = $this->M_warna->tambahdata($id);

        $id_submenu = '34';
        $ket = 'tambah data warna';
        $this->M_Setting->userlog($id, $id_submenu, $ket);

        if($cek){
            $this->session->set_flashdata('Sukses', "Data warna Berhasil Di Tambahkan.");
            
        }else{
            $this->session->set_flashdata('Sukses', "Data warna Tidak Boleh Sama Ataupun Kosong.");
        }
        redirect('C_warnagaram');
    }

    public function tambahwarna()
    {   
        $id = $this->session->userdata('id_user');
        $this->M_warna->tambahdata($id);

        $id_submenu = '34';
        $ket = 'tambah data warna';
        $this->M_Setting->userlog($id, $id_submenu, $ket);

        $data = $this->M_warna->getwarna();
            $lists = "<option value=''>Pilih</option>";
        foreach($data as $data){
              $lists .= "<option value=".$data->id_warna.">".$data->warna."</option>"; // Tambahkan tag option ke variabel $lists
            }
        $callback = array('list_warna'=>$lists); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota
        echo json_encode($callback); // konversi varibael $callback menjadi JSON

    }

    function view($ida)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('tipeuser');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['warna'] = $this->M_warna->getspek($ida);
        $this->load->view('master/warna/v_vwarnagaram',$data); 
        $this->load->view('template/footer');
    }

    function edit($iduser)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('tipeuser');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['warna'] = $this->M_warna->getspek($iduser);
        $this->load->view('master/warna/v_ewarnagaram',$data); 
        $this->load->view('template/footer');
    }

    function editwarna()
    {   

        $id = $this->session->userdata('id_user');
        $this->M_warna->edit($id);

        $id_submenu = '34';
        $ket = 'edit data warna';
        $this->M_Setting->userlog($id, $id_submenu, $ket);

        $this->session->set_flashdata('Sukses', "Data warna Berhasil Di Perbarui");
        redirect('C_warnagaram');
    }

    function hapus($id){
        $where = array('id_warna' => $id);
        $this->M_Setting->delete($where,'tb_warna');

        $id_submenu = '34';
        $ket = 'hapus data warna'.$id;
        $this->M_Setting->userlog($id, $id_submenu, $ket);

        $this->session->set_flashdata('Sukses', "Data warna Berhasil Di Hapus");
        redirect('C_warnagaram');
    }

}
