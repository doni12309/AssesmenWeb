<?php
class Donasi extends CI_Controller {

  function __construct()
  {
      parent::__construct();
      $this->load->model('MDonasi');
      $this->load->library('form_validation');
  }

	public function index()
	{
    $data['list_donasi'] = $this->MDonasi->get_all();
		$this->load->view('donasi', $data);
	}

  public function tambah()
  {
      $data = array(
          'action' => site_url('Donasi/tambah_action'),
          'id_donasi' => set_value('id_donasi'),
          'nama_donatur' => set_value('nama_donatur'),
          'nama_produk' => set_value('nama_produk'),
          'jumlah' => set_value('jumlah'),
          'alamat_donatur' => set_value('alamat_donatur'),
          'tanggal_donasi' => set_value('tanggal_donasi')
      );
      $this->load->view('form', $data); 
  }

  public function tambah_action()
  {
    $data = array(
      'nama_donatur' => $this->input->post('nama_donatur',TRUE),
      'nama_produk' => $this->input->post('nama_produk',TRUE),
      'jumlah' => $this->input->post('jumlah',TRUE),
      'alamat_donatur' => $this->input->post('alamat_donatur',TRUE),
      'tanggal_donasi' => $this->input->post('tanggal_donasi',TRUE),
    );
    $this->MDonasi->insert($data);
    $this->session->set_flashdata('message', 'Create Record Success');
    redirect(site_url('Donasi'));
  }

  // Update
  public function update($id_donasi) 
  {
    $row = $this->MDonasi->get_by_id($id_donasi);
    if ($row) {
      $data = array(
        'action' => site_url('Donasi/update_action'),
        'id_donasi' => set_value('id_donasi', $row->id_donasi),
        'nama_donatur' => set_value('nama_donatur', $row->nama_donatur),
        'nama_produk' => set_value('nama_produk', $row->nama_produk),
        'jumlah' => set_value('jumlah', $row->jumlah),
        'alamat_donatur' => set_value('alamat_donatur', $row->alamat_donatur),
        'tanggal_donasi' => set_value('tanggal_donasi', $row->tanggal_donasi),
      );
      $this->load->view('form', $data);
    }
  }

  public function update_action()
  {
    $data = array(
      'nama_donatur' => $this->input->post('nama_donatur',TRUE),
      'nama_produk' => $this->input->post('nama_produk',TRUE),
      'jumlah' => $this->input->post('jumlah',TRUE),
      'alamat_donatur' => $this->input->post('alamat_donatur',TRUE),
      'tanggal_donasi' => $this->input->post('tanggal_donasi',TRUE),
    );

    $this->MDonasi->update($this->input->post('id_donasi', TRUE), $data);
    $this->session->set_flashdata('message', 'Update Record Success');
    redirect(site_url('Donasi'));
  }
  // Delete
  public function delete($id_donasi) 
  {
    $this->MDonasi->delete($id_donasi);
    $this->session->set_flashdata('message', 'Delete Record Success');
    redirect(site_url('Donasi'));
  }  

}
