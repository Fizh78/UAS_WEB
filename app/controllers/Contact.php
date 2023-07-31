<?php 

class Contact extends Controller {
    public function index()
    {
        $data['judul'] = 'Daftar Contact Message';
        $data['contact'] = $this->model('Contact_model')->getAllContact();
        $this->view('template-admin/header', $data);
        $this->view('template-admin/sidebar', $data);
        $this->view('dashboard/contact/index', $data);
        $this->view('template-admin/footer');
    }

    public function tambah()
    {
        if ($this->model('Contact_model')->tambahDataContact($_POST) > 0) {
            $response = array('status' => 'success', 'message' => 'Form submitted successfully');
        } else {
            $response = array('status' => 'error', 'message' => 'Form submission failed');
        }
        header('Content-Type: application/json');
        echo json_encode($response);
        exit;
    }



    public function hapus($id)
    {
        if( $this->model('Contact_model')->hapusDataContact($id) > 0 ) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/contact');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/contact');
            exit;
        }
    }



}