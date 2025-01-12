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
            'username' => 'tesprogrammer120125C15',
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
        $kategori = array_unique($kategori);
        $harga = $this->input->post('harga[]');
        $status = $this->input->post('status[]');
        $status = array_unique($status);
        $data = array();

        foreach ($kategori as $row) {
            $data[] = array(
                'nama_kategori'     => $row,
            );
        }
        $this->db->select('nama_kategori');
        $this->db->from('kategori');
        $this->db->where_in('nama_kategori', $kategori);
        $query = $this->db->get();
        $name_k = $query->result_array();
        if (!$name_k) {
            $this->db->insert_batch('kategori', $data);
        }
        $data = array();

        foreach ($status as $row) {
            $data[] = array(
                'nama_status' => $row,
            );
        }
        $this->db->select('nama_status');
        $this->db->from('status');
        $this->db->where_in('nama_status', $status);
        $query = $this->db->get();
        $name_s = $query->result_array();
        if (!$name_s) {
            $this->db->insert_batch('status', $data);
        }

        $this->db->select('id_status');
        $this->db->from('status');
        $this->db->where_in('nama_status', $status);
        $query = $this->db->get();
        $this->db->select('id_kategori');
        $this->db->from('kategori');
        $this->db->where_in('nama_kategori', $kategori); //
        $querykategori = $this->db->get();

        $status_id = $query->result_array();
        $kategori_id = $querykategori->result_array(); //

        $data = array();
        foreach ($nama_produk as $row) {
            foreach ($harga as $rowharga) {
                foreach ($status_id as $rowstatus) {
                    foreach ($kategori_id as $rowkategori) {
                        $data[] = array(
                            'status_id' => $rowstatus['id_status'],
                            'kategori_id' => $rowkategori['id_kategori'],
                            'nama_produk' => $row,
                            'harga' => $rowharga,
                        );
                    }
                }
            }
        }
        $this->db->select('nama_produk');
        $this->db->from('produk');
        $this->db->where_in('nama_produk', $nama_produk);
        $query = $this->db->get();
        $name_p = $query->result_array();
        if (!$name_p) {
            $this->db->insert_batch('produk', $data);
        }
    }
}
