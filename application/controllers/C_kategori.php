<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_kategori extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library('session');
        $this->load->model('M_kategori');
        $this->load->model('M_Setting');
    }

    function index()
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('tipeuser');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['kategori'] = $this->M_kategori->getkategori();
        $this->load->view('master/kategori/v_addkategori',$data); 
        $this->load->view('template/footer');
    }

    function add()
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('tipeuser');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['kategori'] = $this->M_kategori->getkategori();
        $this->load->view('master/kategori/v_addkategori', $data); 
        $this->load->view('template/footer');
    }

    function cek_kategori(){
        # ambil Kualifikasiname dari form
        
        $kode = $this->input->post('kategori');
                # select ke model member Kualifikasiname yang diinput Kualifikasi
        $hasil_kode = $this->M_kategori->cek_kategori($kode);
         
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
        $cek = $this->M_kategori->tambahdata($id);

        $id_submenu = '4';
        $ket = 'tambah data kategori';
        $this->M_Setting->userlog($id, $id_submenu, $ket);

        if($cek){
            $this->session->set_flashdata('Sukses', "Data Kategori Berhasil Di Tambahkan.");
           
        }else{
             $this->session->set_flashdata('Sukses', "Data Kategori Tidak Boleh Sama Ataupun Kosong.");
        }
        redirect('C_kategori');
    }

    public function tambahkategori()
    {   
        $id = $this->session->userdata('id_user');
        $this->M_kategori->tambahdata($id);

        $id_submenu = '4';
        $ket = 'tambah data kategori';
        $this->M_Setting->userlog($id, $id_submenu, $ket);

        $data = $this->M_kategori->getkategori();
            $lists = "<option value=''>Pilih</option>";
        foreach($data as $data){
              $lists .= "<option value=".$data->id_kategori.">".$data->kategori."</option>"; // Tambahkan tag option ke variabel $lists
            }
        $callback = array('list_kategori'=>$lists); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota
        echo json_encode($callback); // konversi varibael $callback menjadi JSON

    }

    function view($ida)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('tipeuser');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['kategori'] = $this->M_kategori->getspek($ida);
        $this->load->view('master/kategori/v_vkategori',$data); 
        $this->load->view('template/footer');
    }

    function edit($iduser)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('tipeuser');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['kategori'] = $this->M_kategori->getspek($iduser);
        $this->load->view('master/kategori/v_ekategori',$data); 
        $this->load->view('template/footer');
    }

    function editkategori()
    {   

        $id = $this->session->userdata('id_user');
        $this->M_kategori->edit($id);

        $id_submenu = '4';
        $ket = 'edit data kategori';
        $this->M_Setting->userlog($id, $id_submenu, $ket);

        $this->session->set_flashdata('Sukses', "Data Kategori Berhasil Di Perbarui");
        redirect('C_kategori');
    }

    function hapus($id){
        $where = array('id_kategori' => $id);
        $this->M_Setting->delete($where,'tb_kategori');

        $id_submenu = '4';
        $ket = 'hapus data kategori'.$id;
        $this->M_Setting->userlog($id, $id_submenu, $ket);

        $this->session->set_flashdata('Sukses', "Data Kategori Berhasil Di Hapus");
        redirect('C_kategori');
    }

}