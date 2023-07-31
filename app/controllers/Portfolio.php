<?php 

class Event extends Controller {
    public function index()
    {
        $data['judul'] = 'Daftar Event';
        $data['event'] = $this->model('Dashboard_event_model')->getAllEvent();
        $this->view('templates/header', $data);
        $this->view('event/index', $data);
        $this->view('templates/footer');
    }
    public function create()
    {
        $data['judul'] = 'Create Event';
        $data['event'] = $this->model('Dashboard_event_model')->getAllEvent();
        $this->view('templates/header', $data);
        $this->view('event/create', $data);
        $this->view('templates/footer');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Event';
        $data['event'] = $this->model('Event_model')->getEventById($id);
        $this->view('templates/header', $data);
        $this->view('event/detail', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        if( $this->model('Event_model')->tambahDataEvent($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/event');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/event');
            exit;
        }
    }

    public function hapus($id)
    {
        if( $this->model('Event_model')->hapusDataEvent($id) > 0 ) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/event');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/wvwnt');
            exit;
        }
    }

    public function getubah()
    {
        echo json_encode($this->model('Event_model')->getEventById($_POST['id']));
    }

    public function ubah()
    {
        if( $this->model('Event_model')->ubahDataEvent($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/event');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/event');
            exit;
        } 
    }

    public function cari()
    {
        $data['judul'] = 'Daftar Event';
        $data['event'] = $this->model('Event_model')->cariDataEvent();
        $this->view('templates/header', $data);
        $this->view('event/index', $data);
        $this->view('templates/footer');
    }

}