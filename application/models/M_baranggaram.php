<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_baranggaram extends CI_Model {

	function getbaranggaram(){

        $this->db->select('tb_kategori.kategori,ts2.satuan satuan_konversi,ts1.satuan nama_satuan, tb_warna.warna, tb_gudang.gudang, tb_cabang.namacabang, tb_baranggaram.*');
        $this->db->join('tb_satuan ts1', 'ts1.id_satuan = tb_baranggaram.id_satuan');
        $this->db->join('tb_konversi', 'tb_konversi.id_konversi = tb_baranggaram.id_konversi');
        $this->db->join('tb_satuan ts2', 'tb_konversi.satuan = ts2.id_satuan');
        $this->db->join('tb_gudang', 'tb_gudang.id_gudang = tb_baranggaram.id_gudang');
        $this->db->join('tb_cabang', 'tb_cabang.id_cabang = tb_baranggaram.id_cabang');
        $this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_baranggaram.id_kategori');
        $this->db->join('tb_warna', 'tb_warna.id_warna = tb_baranggaram.id_warna');
        $this->db->order_by('barang','ASC');
        $query = $this->db->get('tb_baranggaram');
        return $query->result();
    
    }

    function getnama($ida){
        $this->db->select('tb_kategori.kategori,ts2.satuan satuan_konversi,ts1.satuan nama_satuan, tb_warna.warna, tb_gudang.gudang, tb_cabang.namacabang, tb_baranggaram.*');
        $this->db->join('tb_satuan ts1', 'ts1.id_satuan = tb_baranggaram.id_satuan');
        $this->db->join('tb_konversi', 'tb_konversi.id_konversi = tb_baranggaram.id_konversi');
        $this->db->join('tb_satuan ts2', 'tb_konversi.satuan = ts2.id_satuan');
        $this->db->join('tb_gudang', 'tb_gudang.id_gudang = tb_baranggaram.id_gudang');
        $this->db->join('tb_cabang', 'tb_cabang.id_cabang = tb_baranggaram.id_cabang');
        $this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_baranggaram.id_kategori');
        $this->db->join('tb_warna', 'tb_warna.id_warna = tb_baranggaram.id_warna');
        $where = array(
            'id_barang' => $ida
        );
        return $this->db->get_where('tb_baranggaram',$where)->result();
    }

    // function getnama($ida){
    //     $where = array(
    //         'id_barang' => $ida
    //     );
    //     return $this->db->get_where('tb_baranggaram',$where)->result();
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
            'merk' => $this->input->post('merk'),
            'hargabeli' => $harga_str,
            'stok' => $this->input->post('stok'),
            'stokmin' => $this->input->post('stokmin'),
            'id_user' => $id,
            'tglupdate' => date('Y-m-d'),
            'id_konversi' => $this->input->post('qttkonversi'),
            'hasil_konversi' => $this->input->post('hasil_konversi')
        );
        
        $this->db->insert('tb_baranggaram', $barang);
    }

    function cekkodebarang(){
        $this->db->select_max('id_barang');
        $idbarang = $this->db->get('tb_baranggaram');
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
       $this->db->select('tb_kategori.kategori,ts2.satuan satuan_konversi,ts1.satuan nama_satuan, tb_warna.warna, tb_gudang.gudang, tb_cabang.namacabang, tb_baranggaram.*');
        $this->db->join('tb_satuan ts1', 'ts1.id_satuan = tb_baranggaram.id_satuan');
        $this->db->join('tb_konversi', 'tb_konversi.id_konversi = tb_baranggaram.id_konversi');
        $this->db->join('tb_satuan ts2', 'tb_konversi.satuan = ts2.id_satuan');
        $this->db->join('tb_gudang', 'tb_gudang.id_gudang = tb_baranggaram.id_gudang');
        $this->db->join('tb_cabang', 'tb_cabang.id_cabang = tb_baranggaram.id_cabang');
        $this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_baranggaram.id_kategori');
        $this->db->join('tb_warna', 'tb_warna.id_warna = tb_baranggaram.id_warna');
        $this->db->order_by('barang','ASC');
        $where = array(
            'id_barang' => $iduser
        );
        $query = $this->db->get_where('tb_baranggaram', $where);
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
            'merk' => $this->input->post('merk'),
            'hargabeli' => $harga_str,
            'stok' => $this->input->post('stok'),
            'stokmin' => $this->input->post('stokmin'),
            'id_user' => $id,
            'tglupdate' => date('Y-m-d'),
            'id_konversi' => $this->input->post('qttkonversi'),
            'hasil_konversi' => $this->input->post('hasil_konversi')
        );

        $where = array(
            'id_barang' =>  $this->input->post('id'),
        );
        
        $this->db->where($where);
        $this->db->update('tb_baranggaram',$barang);
    }

    
}