<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_returpenjualan extends CI_Model {

    function cekreturpenjualantgl(){
        $vbulan = date("m"); 
        $where = array(
            'month(tanggalretur)' => $vbulan
        );
        return $this->db->get_where('tb_returjual',$where)->result();
    }

    // function cekkodereturpenjualan(){
    //     $this->db->select_max('nourut');
    //     $idbarang = $this->db->get('tb_returjual');
    //     return $idbarang->row();
    // }

    function getall(){
        $this->db->join('tb_penjualan', 'tb_penjualan.id_penjualan = tb_returjual.id_penjualan');
        $this->db->join('tb_pelanggan', 'tb_pelanggan.id_pelanggan = tb_penjualan.id_pelanggan');
        $this->db->join('tb_dtlreturjual', 'tb_dtlreturjual.id_retur = tb_returjual.id_returpenjualan');
        $this->db->join('tb_dtljual', 'tb_dtlreturjual.id_detailpenjualan = tb_dtljual.id_detailpenjualan');
        $this->db->join('tb_barang', 'tb_barang.id_barang = tb_dtlreturjual.id_barang');
        $this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_barang.id_kategori');
        $this->db->join('tb_satuan', 'tb_satuan.id_satuan = tb_barang.id_satuan');
        
        return $this->db->get('tb_returjual')->result();
    }
    function getreturpenjualan($ida){
        $this->db->join('tb_penjualan', 'tb_penjualan.id_penjualan = tb_returjual.id_penjualan');
        $this->db->join('tb_pelanggan', 'tb_pelanggan.id_pelanggan = tb_penjualan.id_pelanggan');
        $where = array(
            'tb_returjual.id_returpenjualan' => $ida
        );
        return $this->db->get_where('tb_returjual', $where)->result();
    }
   
    function getdetailreturpenjualan($ida){
        $this->db->join('tb_dtljual', 'tb_dtljual.id_detailpenjualan = tb_dtlreturjual.id_detailpenjualan');
        $this->db->join('tb_barang', 'tb_barang.id_barang = tb_dtlreturjual.id_barang');
        $this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_barang.id_kategori');
        $this->db->join('tb_satuan', 'tb_satuan.id_satuan = tb_barang.id_satuan');
        $where = array(
            'tb_dtlreturjual.id_retur' => $ida
        );
        return $this->db->get_where('tb_dtlreturjual', $where)->result();
    }


    function tambahdata($id){
        // $jenisretur = $this->input->post('jenisretur');
        // if ($jenisretur == 'nota'){
        //     $status = 1;
        // } else {
        //     $status = 0;
        // }

        $this->load->model('M_barang');
        date_default_timezone_set('Asia/Jakarta');
        $status=1;
        $retur = array(
            // 'id_user' => $id,
            'id_returpenjualan' => $this->input->post('id_returpenjualan'),
            'id_penjualan' => $this->input->post('id_penjualan'),
            'tanggalretur' => date('Y-m-d'),
            // 'jenisretur' => $this->input->post('jenisretur'),
            'ketretur' => $this->input->post('ketretur'),
            // 'total' => $this->input->post('total'),
            'status' => $status

        );
        // echo'<pre>';print_r($penjualan);exit;
        $this->db->insert('tb_returjual', $retur);
        
        $id_detailpenjualan = $this->input->post('id_detailpenjualan');
        $jumlahretur=$this->input->post('jumlahretur');
        $id_barang=$this->input->post('id_barang');
        $satuan=$this->input->post('satuan');
        $harga=$this->input->post('harga');
        if(!empty($id_detailpenjualan)){
            foreach ($id_detailpenjualan as $key=>$value) {
                if($value!=0){
                    $stok=$this->M_barang->getspek($id_barang[$key]);
                     $status_detail=1;     
                    if($stok[0]->stok >=$jumlahretur[$key]){
                        $query = "UPDATE tb_barang SET stok=(stok-".$jumlahretur[$key].") WHERE id_barang='".$id_barang[$key]."'";
                            $this->db->query($query);
                        $status_detail=1;
                    }else{
                        $status=0;$status_detail=0;
                    }

                    $data = array('id_retur' => $retur['id_returpenjualan'],
                        'id_detailpenjualan' => $value,
                        'jumlahretur' => $jumlahretur[$key],
                        'id_barang' => $id_barang[$key],
                        'satuan' => $satuan[$key],
                        'harga' =>$harga[$key],
                        'status' => $status_detail);

                    $this->db->insert('tb_dtlreturjual', $data);

                    $query = "UPDATE tb_barang SET stokretur=(stokretur+".$jumlahretur[$key].") WHERE id_barang='".$id_barang[$key]."'";
                            $this->db->query($query);

                    // cek stok barang
                    
                }
            }
        }
        if ($status==0){
            $query = "UPDATE tb_returjual SET status=".$status." WHERE id_returpenjualan='".$retur['id_returpenjualan']."'";
                            $this->db->query($query);
        }
    }

    function ganti_status($id){
        $detailretur=$this->getdetailreturpenjualan($id);
        $result=true;
        foreach ($detailretur as $key => $value) {
            if($value->status==0){
                $stok=$this->M_barang->getspek($value->id_barang);     
                if($stok[0]->stok >=$value->jumlahretur){
                    $query = "UPDATE tb_barang SET stok=(stok-".$value->jumlahretur.") WHERE id_barang='".$value->id_barang."'";
                        $this->db->query($query);
                    $query = "UPDATE tb_dtlreturjual SET status=1 WHERE id_detailreturpenjualan='".$value->id_detailreturpenjualan."'";
                            $this->db->query($query);
                }else{
                    $result=false;
                }
            }
        }
        if ($result){
            $query = "UPDATE tb_returjual SET status=1 WHERE id_returpenjualan='".$id."'";
                            $this->db->query($query);
        }
        return $result;
    }
}