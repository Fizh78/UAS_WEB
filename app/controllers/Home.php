<?php 

class Home extends Controller {
    public function index()
    {
        $data['judul'] = 'Home';
        $data['image'] = $this->model('Home_model')->getLatestPortfolio();
        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }

    public function services(){
        $data['judul'] = 'Home';
        $data['image'] = $this->model('Home_model')->getUser();
        $this->view('templates/header', $data);
        $this->view('services/index', $data);
        $this->view('templates/footer');
    }
    public function contact(){
        $data['judul'] = 'Home';
        $data['nama'] = $this->model('Home_model')->getUser();
        $this->view('templates/header', $data);
        $this->view('contact/index', $data);
        $this->view('templates/footer');
    }
    public function portfolio(){
        $data['judul'] = 'Home';
        $data['portfolio'] = $this->model('Dashboard_portfolio_model')->getAllPortfolio();
        $this->view('templates/header', $data);
        $this->view('portfolio/index', $data);
        $this->view('templates/footer');
    }
    public function detail_portfolio($id){
        $data['judul'] = 'Home';
        $data['portfolio'] = $this->model('Dashboard_portfolio_model')->detail($id);
        $this->view('templates/header', $data);
        $this->view('portfolio/detail', $data);
        $this->view('templates/footer');
    }
}