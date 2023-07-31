<?php 

class DashboardPortfolio extends Controller {

    public function index()
    {
        $data['judul'] = 'Daftar Portfolio';
        $data['portfolio'] = $this->model('Dashboard_portfolio_model')->getAllPortfolio();
        $this->view('template-admin/header', $data);
        $this->view('template-admin/sidebar', $data);
        $this->view('dashboard/portfolio/index', $data);
        $this->view('template-admin/footer');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Portfolio';
        $data['portfolio'] = $this->model('Event_model')->getPortfolioById($id);
        $this->view('template-admin/header', $data);
        $this->view('template-admin/sidebar', $data);
        $this->view('dashboard/portfolio/index', $data);
        $this->view('template-admin/footer');
    }

    public function create() {
        $data['judul'] = 'Daftar Portfolio';
        $data['portfolio'] = $this->model('Dashboard_portfolio_model')->getAllPortfolio();
        $this->view('template-admin/header', $data);
        $this->view('template-admin/sidebar', $data);
        $this->view('dashboard/portfolio/create', $data);
        $this->view('template-admin/footer');
    }
    public function edit($id) {
        $data['judul'] = 'Daftar Portfolio';
        $data['portfolio'] = $this->model('Dashboard_portfolio_model')->editPortfolio($id);
        $this->view('template-admin/header', $data);
        $this->view('template-admin/sidebar', $data);
        $this->view('dashboard/portfolio/edit', $data);
        $this->view('template-admin/footer');
    }

    public function tambah()
    {
        
        if( $this->model('Dashboard_portfolio_model')->tambahDataPortfolio($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/DashboardPortfolio');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/DashboardPortfolio');
            exit;
        }
    }

    public function hapus($id)
    {
        if( $this->model('Dashboard_portfolio_model')->hapusDataPortfolio($id) > 0 ) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/DashboardPortfolio');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/DashboardEvent');
            exit;
        }
    }

    public function getubah()
    {
        echo json_encode($this->model('Dashboard_portfolio_model')->getPortfolioById($_POST['id']));
    }

    public function ubah()
    {
        if( $this->model('Dashboard_portfolio_model')->ubahDataPortfolio($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/DashboardPortfolio');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/DashboardPortfolio');
            exit;
        } 
    }

}