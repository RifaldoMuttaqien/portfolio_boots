<?php

class M_unpas extends CI_Model
{
    public function getBlogs($data)

    {

        return $this->db->get("blog");
    }

    function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    function get_data($table)
    {
        return $this->db->get($table);
    }
    function ambil_data()
    {
        return $this->db->get("blog");
        return $this->db->get("about");
    }

    public function insertBlog($data)
    {
        $this->db->insert('blog', $data);
        return $this->db->insert_id();
    }

    public function getSingleBlog($field, $value)
    {
        $this->db->where($field, $value);
        $query = $this->db->get('blog');
        return $query->row();
    }

    public function updateBlog($id, $post)
    {
        $this->db->where('id', $id);
        $this->db->update('blog', $post);
        return $this->db->affected_rows();
    }
    public function deleteGallery($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('blog');
        return $this->db->affected_rows();
    }
    // menangkanp detail about
    public function getAboutData()
    {
        return $this->db->get("about")->result();
    }

    public function getBlogData()
    {
        return $this->db->get("blog")->result();
    }
    public function updateJumbotronImage($data)
    {
        $this->db->insert('profile', $data);
        return $this->db->insert_id();
    }
    public function getJumbotronImage()
    {
        $query = $this->db->get('profile'); // Assuming 'profile' is the table name containing the jumbotron image data
        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->cover_profile;
        } else {
            return null;
        }
    }
    public function getBlogCount()
    {
        return $this->db->count_all('blog'); // Replace 'your_blog_table_name' with your actual table name
    }
    public function getAboutCount()
    {
        return $this->db->count_all('about'); // Replace 'your_blog_table_name' with your actual table name
    }

    public function getSingleAbout($field, $value)
    {
        $this->db->where($field, $value);
        $query = $this->db->get('about');
        return $query->row_array();
    }
    public function deleteAbout($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('about');
        return $this->db->affected_rows();
    }
}
