<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data extends CI_Controller
{


    public function Index()
    {
        $this->load->view('data/index');
    }
    public function GetData()
    {
        $this->curl->create('https://recruitment.fastprint.co.id/tes/api_tes_programmer');

        $post = array(
            'username' => 'tesprogrammer120125C23',
            'password' => '20d9c74411e2684a9ee34d43767b6a06'
        );
        $this->curl->post($post);

        $vars = array('foo' => 'bar');
        $this->curl->set_cookies($vars);



        // echo $this->curl->execute();
        $result = $this->curl->execute();
        $response = json_decode($result, true);
        // print_r()

        // $data['produk'] = json_decode($result);
        if (isset($response['data'])) {
            $data['produk'] = $response['data'];
        } else {
            $data['produk'] = [];
        }

        $this->load->view('data/produk', $data);
    }
    public function SaveData()
    {
        $nama_produk = $this->input->post('nama_produk[]');
        $kategori = $this->input->post('kategori[]');
        $kategori_insert = array_unique($kategori);
        $harga = $this->input->post('harga[]');
        $status = $this->input->post('status[]');
        $status_insert = array_unique($status);
        $data = array();

        foreach ($kategori_insert as $row) {
            $data[] = array(
                'nama_kategori'     => $row,
            );
        }
        $this->db->select('nama_kategori');
        $this->db->from('kategori');
        $this->db->where_in('nama_kategori', $kategori_insert);
        $query = $this->db->get();
        $name_k = $query->result_array();
        if (!$name_k) {
            $this->db->insert_batch('kategori', $data);
        }
        $data = array();

        foreach ($status_insert as $row) {
            $data[] = array(
                'nama_status' => $row,
            );
        }
        $this->db->select('nama_status');
        $this->db->from('status');
        $this->db->where_in('nama_status', $status_insert);
        $query = $this->db->get();
        $name_s = $query->result_array();
        if (!$name_s) {
            $this->db->insert_batch('status', $data);
        }

        $this->db->select('id_status, nama_status');
        $this->db->from('status');
        $this->db->where_in('nama_status', array_unique($status));
        $query = $this->db->get();
        $status_mapping = array_column($query->result_array(), 'id_status', 'nama_status');


        $this->db->select('id_kategori, nama_kategori');
        $this->db->from('kategori');
        $this->db->where_in('nama_kategori', array_unique($kategori));
        $query = $this->db->get();
        $kategori_mapping = array_column($query->result_array(), 'id_kategori', 'nama_kategori');

        $batch_data = [];
        foreach ($nama_produk as $key => $value) {
            $batch_data[] = [
                'nama_produk' => $value,
                'harga' => $harga[$key],
                'kategori_id' => $kategori_mapping[$kategori[$key]] ?? null,
                'status_id' => $status_mapping[$status[$key]] ?? null,
            ];
        }
        $this->db->select('nama_produk');
        $this->db->from('produk');
        $this->db->where_in('nama_produk', $nama_produk);
        $query = $this->db->get();
        $name_p = $query->result_array();
        if (!$name_p) {
            $this->db->insert_batch('produk', $batch_data);
        }
    }


    public function ViewAllData()
    {
        $this->db->select('*');
        $this->db->from('produk');
        $query_p = $this->db->get();
        $this->db->select('*');
        $this->db->from('kategori');
        $query_k = $this->db->get();
        $this->db->select('*');
        $this->db->from('status');
        $query_s = $this->db->get();
        $data['produk'] = $query_p->result_array();
        $data['kategori'] = $query_k->result_array();
        $data['status'] = $query_s->result_array();
        $this->load->view('data/allproduk', $data);
    }
    public function ViewDataJual()
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->where('status_id', 1);
        $query_p = $this->db->get();
        $this->db->select('*');
        $this->db->from('kategori');
        $query_k = $this->db->get();
        $this->db->select('*');
        $this->db->from('status');
        $query_s = $this->db->get();
        $data['produk'] = $query_p->result_array();
        $data['kategori'] = $query_k->result_array();
        $data['status'] = $query_s->result_array();
        $this->load->view('data/produkjual', $data);
    }
}
