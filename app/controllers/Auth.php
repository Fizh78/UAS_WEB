<?php

class Auth extends Controller {
    
    public function index() 
    {
        $this->view('auth/login');
    }

    public function register() 
    {
        $this->view('auth/register');
    }

    public function createUser()
    {
        if( $this->model('Auth_model')->createUser($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/auth');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/auth');
            exit;
        }
    }

    public function login()
    {
        if (isset($_POST['email']) && isset($_POST['password'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $data['login'] = $this->model('Auth_model')->getUser($email, $password);
            
            if ($data['login']['role'] == "ADMIN") {
                // Login berhasil, setel variabel sesi untuk menandai bahwa pengguna telah login sebagai admin
                session_start();
                $_SESSION['isLoggedIn'] = true;
                $_SESSION['isAdmin'] = true;
                $_SESSION['username'] = $data['login']['username']; // Ganti 'username' dengan nama field yang sesuai dalam tabel user
                // Arahkan pengguna ke halaman yang sesuai
                header('Location: ' . BASEURL . '/');
                exit();
            } else if ($data['login']['role'] == "USER") {
                // Login berhasil, setel variabel sesi untuk menandai bahwa pengguna telah login sebagai user
                session_start();
                $_SESSION['isLoggedIn'] = true;
                $_SESSION['isAdmin'] = false;
                $_SESSION['isUser'] = true; // Tambahkan session untuk menandai bahwa pengguna adalah user
                
                // Simpan nama user dalam session untuk ditampilkan di navbar
                $_SESSION['username'] = $data['login']['username']; // Ganti 'username' dengan nama field yang sesuai dalam tabel user
                
                // Arahkan pengguna ke halaman yang sesuai
                header('Location: ' . BASEURL . '/');
                exit();
            } else {
                header('Location: ' . BASEURL . '/');
                exit();
            }
        } else {
            header('Location: ' . BASEURL . '/auth');
            exit();
        }
    }


    public function logout()
    {
        // Perform any necessary cleanup or logout actions here

        // Destroy the session and unset session variables
        if (session_status() == PHP_SESSION_NONE){
            session_start();
            $_SESSION['isLoggedIn'] = false; // atau unset($_SESSION['isLoggedIn']);
            session_unset();
            session_destroy();
        }

        session_destroy();
        // Redirect to the login page or any other desired page
        header('Location: ' . BASEURL . '/');
        exit();
    }

}