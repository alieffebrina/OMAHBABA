<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_barang extends CI_Model {

	function getbarang(){
		$this->db->select('tb_barang.*, tb_gudang.gudang, tb_cabang.namacabang, tb_satuan.satuan,tb_kategori.kategori,tb_warna.warna');
        $this->db->join('tb_gudang', 'tb_gudang.id_gudang = tb_barang.id_gudang');
        $this->db->join('tb_cabang', 'tb_cabang.id_cabang = tb_barang.id_cabang');
        $this->db->join('tb_satuan', 'tb_satuan.id_satuan = tb_barang.id_satuan');
        $this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_barang.id_kategori');
        $this->db->join('tb_warna', 'tb_warna.id_warna = tb_barang.id_warna');
        $query = $this->db->get('tb_barang');
    	return $query->result();
    }

    // function getnama($ida){
    //     $where = array(
    //         'id_barang' => $ida
    //     );
    //     return $this->db->get_where('tb_barang',$where)->result();
    // }

    function tambahdata($id){
        $harga = $this->input->post('rupiah');
        $harga_str = preg_replace("/[^0-9]/", "", $harga);

        $barang = array(
            'barang' => $this->input->post('barang'),
            'barcode' => $this->input->post('barcode'),
            'expaid' => date('Y-m-d'),
            'id_gudang' => $this->input->post('gudang'),
            'id_cabang' => $this->input->post('namacabang'),
            'id_satuan' => $this->input->post('satuan'),
            'id_kategori' => $this->input->post('kategori'),
            'id_warna' => $this->input->post('warna'),
            'ukuran' => $this->input->post('ukuran'),
            'merk' => $this->input->post('merk'),
            'stok' => $this->input->post('stok'),
            'stokmin' => $this->input->post('stokmin'),
            'hargabeli' => $harga_str,
            
            'id_user' => $id,
            'tglupdate' => date('Y-m-d')
        );
        
        $this->db->insert('tb_barang', $barang);
    }

    function cekkodebarang(){
        $this->db->select_max('id_barang');
        $idbarang = $this->db->get('tb_barang');
        return $idbarang->row();
    }

    //function tambahakses($id){
    //    $total = $this->db->count_all_results('tb_submenu');

    //    for($i=0; $i<$total; $i++){
    //        $fungsi = array('id_submenu' => $i+1 , 
    //            'id_user' => $id);

    //        $this->db->insert('tb_akses', $fungsi);            
    //    }
    //}

    function getspek($iduser){
        $this->db->select('tb_barang.*, tb_gudang.gudang, tb_cabang.namacabang, tb_satuan.satuan,tb_kategori.kategori,tb_warna.warna');
        $this->db->join('tb_gudang', 'tb_gudang.id_gudang = tb_barang.id_gudang');
        $this->db->join('tb_cabang', 'tb_cabang.id_cabang = tb_barang.id_cabang');
        $this->db->join('tb_satuan', 'tb_satuan.id_satuan = tb_barang.id_satuan');
        $this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_barang.id_kategori');
        $this->db->join('tb_warna', 'tb_warna.id_warna = tb_barang.id_warna');
        $where = array(
            'id_barang' => $iduser
        );
        $query = $this->db->get_where('tb_barang', $where);
    	return $query->result();
    }

    function edit($id){
        $harga = $this->input->post('rupiah');
        $harga_str = preg_replace("/[^0-9]/", "", $harga);

        $barang = array(
            'barang' => $this->input->post('barang'),
            'barcode' => $this->input->post('barcode'),
            'expaid' => date('Y-m-d'),
            'id_gudang' => $this->input->post('gudang'),
            'id_cabang' => $this->input->post('namacabang'),
            'id_satuan' => $this->input->post('satuan'),
            'id_kategori' => $this->input->post('kategori'),
            'id_warna' => $this->input->post('warna'),
            'ukuran' => $this->input->post('ukuran'),
            'merk' => $this->input->post('merk'),
            'stok' => $this->input->post('stok'),
            'stokmin' => $this->input->post('stokmin'),
            'hargabeli' => $harga_str,
            
            'id_user' => $id,
            'tglupdate' => date('Y-m-d')
        );

        $where = array(
            'id_barang' =>  $this->input->post('id'),
        );
        
        $this->db->where($where);
        $this->db->update('tb_barang',$barang);
    }

    
}