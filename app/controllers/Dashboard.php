<?php 

class Dashboard extends Controller {
    public function index()
    {
        
        $data['judul'] = 'Home';
        $data['users'] = $this->model('Dashboard_model')->getCountUsers();
        $data['portfolio'] = $this->model('Dashboard_model')->getCountPortfolio();
        $data['contact'] = $this->model('Dashboard_model')->getCountContact();
        $this->view('template-admin/header', $data);
        $this->view('template-admin/sidebar', $data);
        $this->view('dashboard/index', $data);
        $this->view('template-admin/footer');
    }
}