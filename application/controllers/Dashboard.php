<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_unpas');
        // cek session yang login, 
        // jika session status tidak sama dengan session telah_login, berarti pengguna belum login
        // maka halaman akan di alihkan kembali ke halaman login.
        if ($this->session->userdata('status') != "login") {
            redirect(base_url() . 'login?alert=belumLogin');
        }
    }
    public function index()
    {
        $this->load->model('m_unpas'); // Load the model if not already loaded

        // Fetch the count of blog entries
        $blogCount = $this->m_unpas->getBlogCount(); // Replace 'getBlogCount' with your actual method
        $aboutCount = $this->m_unpas->getAboutCount(); // Replace 'getBlogCount' with your actual method

        // Pass the count to the view
        $data['blogCount'] = $blogCount;
        $data['aboutCount'] = $aboutCount;
        $data['cover'] = 'path_to_your_image.jpg';
        $this->load->view('dashboard/v_index', $data);
    }

    public function gallery_add()
    {
        $this->load->library('upload');

        if ($this->input->post()) {
            $data = array(
                'content' => $this->input->post('content')
            );

            // File Upload Configuration
            $config['upload_path'] = './uploads/'; // Change this to the actual upload directory path
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['max_size'] = 2048; // 2 MB maximum file size

            $this->upload->initialize($config);

            if ($this->upload->do_upload('cover')) {
                $upload_data = $this->upload->data();
                $data['cover'] = $upload_data['file_name'];
                $this->m_unpas->insertBlog($data);
                redirect('/');
            } else {
                $error = $this->upload->display_errors();
                // Handle the error here, e.g. display it to the user
                // echo $error;
            }
        }

        $this->load->view('dashboard/v_gallery');
    }


    public function gallery_detail()
    {
        $data['blog'] = $this->m_unpas->ambil_data()->result();
        $this->load->view('dashboard/v_gallery_detail', $data);
    }
    public function edit($id)
    {
        $data['blog'] = $this->m_unpas->getSingleBlog('id', $id);

        if ($this->input->post()) {
            $post['content'] = $this->input->post('content');

            // Check if a new cover image is uploaded
            if ($_FILES['cover']['name']) {
                $this->load->library('upload');

                // File Upload Configuration
                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size'] = 2048; // 2 MB maximum file size

                $this->upload->initialize($config);

                if ($this->upload->do_upload('cover')) {
                    $upload_data = $this->upload->data();
                    $post['cover'] = $upload_data['file_name'];
                } else {
                    $error = $this->upload->display_errors();
                    // Handle the error here, e.g. display it to the user
                    // echo $error;
                }
            }

            $id = $this->m_unpas->updateBlog($id, $post);
            if ($id) {
                echo "Data Berhasil disimpan";
            } else {
                echo "Data gagal disimpan";
            }
        }

        $this->load->view('dashboard/v_gallery_edit', $data);
    }

    public function about_add()
    {
        if ($this->input->post()) {
            $data['content'] = $this->input->post('content');
            print_r($data);

            $id = $this->m_unpas->insertBlog($data);

            if ($id)
                echo "Data berhasil disimpan";
        } else
            echo "Data gagal disimpan";
        $this->load->view('dashboard/v_about');
    }

    public function about_detail()
    {
        $data['about'] = $this->m_unpas->getAboutData(); // Ganti 'your_model' dengan model yang sesuai
        $this->load->view('dashboard/v_about_detail', $data);
    }


    public function about_edit($id)
    {
        $data['about'] = $this->m_unpas->getSingleAbout('id', $id);
        $this->load->view('dashboard/v_about_edit', $data);
    }
    public function about_delete($id)
    {
        $this->load->model('M_unpas');

        // Delete the about data based on the provided ID
        $result = $this->M_unpas->deleteAbout($id);

        if ($result > 0) {
            // Successfully deleted, redirect to the same page or another appropriate page
            redirect('dashboard'); // Change to your desired redirection
        } else {
            // Handle deletion failure (optional)
            // Display an error message or take appropriate action
        }
    }
    public function upload_jumbotron_image()
    {
        $this->load->library('upload');

        if ($this->input->post()) {
            $config['upload_path'] = './uploads/'; // Change this to the actual upload directory path
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['max_size'] = 2048; // 2 MB maximum file size

            $this->upload->initialize($config);

            if ($this->upload->do_upload('cover')) {
                $upload_data = $this->upload->data();
                $data['cover'] = $upload_data['file_name'];
                $this->m_unpas->insertBlog($data);
                redirect('/');
            } else {
                $error = $this->upload->display_errors();
                // Handle the error here, e.g. display it to the user
                // echo $error;
            }
        }
    }



    public function delete($id)
    {
        $this->m_unpas->deleteGallery($id);
        redirect('dashboard/gallery_detail');
    }
}
