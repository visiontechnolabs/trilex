<?php

class Post extends CI_Controller
{
    public function __construct()
    {

        parent::__construct();

        $this->load->library('session');



        $this->load->helper('url');

        $this->load->model('general_model');





        if (!$this->session->userdata('admin')) {



            redirect('admin');
        }
    }

    public function index()
    {

        $this->load->view('admin/header');
        $this->load->view('admin/post_view');
        $this->load->view('admin/footer');
    }
    public function fetch_posts()
    {
        $search = $this->input->get('search');
        $page   = (int) $this->input->get('page') ?: 1;
        $limit  = 5;
        $offset = ($page - 1) * $limit;

        /* ----------- CORRECT COUNT (MOST IMPORTANT FIX) ----------- */
        $this->db->from('posts');
        if (!empty($search)) {
            $this->db->like('title', $search);
        }
        $total = $this->db->count_all_results();

        /* ----------- FRESH QUERY TO FETCH DATA ----------- */
        $this->db->from('posts');
        if (!empty($search)) {
            $this->db->like('title', $search);
        }
        $this->db->order_by('id', 'DESC');
        $this->db->limit($limit, $offset);

        $posts = $this->db->get()->result();

        /* ----------- BUILD TABLE HTML ----------- */
        $html  = '';
        $index = $offset + 1;

        foreach ($posts as $post) {

            $status_ui = $post->isActive
                ? '<div class="d-flex align-items-center text-success">
                    <i class="bx bx-radio-circle-marked align-middle font-18 me-1"></i>
                    <span>Active</span>
               </div>'
                : '<div class="d-flex align-items-center text-danger">
                    <i class="bx bx-radio-circle-marked align-middle font-18 me-1"></i>
                    <span>Inactive</span>
               </div>';

            $eye_icon = $post->isActive
                ? '<a href="javascript:void(0);" class="toggle-status text-info" 
                 data-id="' . $post->id . '" title="Deactivate">
                 <i class="bx bx-show"></i>
               </a>'
                : '<a href="javascript:void(0);" class="toggle-status text-danger" 
                 data-id="' . $post->id . '" title="Activate">
                 <i class="bx bx-hide"></i>
               </a>';

            $action_ui = '<div class="d-flex order-actions">
                        <a href="' . base_url('admin/post/post_edit/' . $post->id) . '" 
                           class="me-3 text-primary" title="Edit">
                            <i class="bx bx-edit"></i>
                        </a>
                        ' . $eye_icon . '
                      </div>';

            $html .= '<tr>
                    <td>' . $index++ . '</td>
                    <td>' . $post->title . '</td>
                    <td>' . $post->price . '</td>
                    <td>' . $status_ui . '</td>
                    <td>' . $action_ui . '</td>
                  </tr>';
        }

        if (empty($html)) {
            $html = '<tr><td colspan="5" class="text-center">No posts found</td></tr>';
        }

        /* ----------- PAGINATION WITH « and » ----------- */
        $total_pages = ceil($total / $limit);
        $pagination  = '';

        if ($total_pages > 1) {

            // « Previous
            $pagination .= '
        <li class="page-item ' . ($page <= 1 ? 'disabled' : '') . '">
            <a class="page-link" href="#" data-page="' . ($page - 1) . '">&laquo;</a>
        </li>';

            // Page numbers
            for ($i = 1; $i <= $total_pages; $i++) {
                $active = ($i == $page) ? 'active' : '';
                $pagination .= '
            <li class="page-item ' . $active . '">
                <a class="page-link" href="#" data-page="' . $i . '">' . $i . '</a>
            </li>';
            }

            // Next »
            $pagination .= '
        <li class="page-item ' . ($page >= $total_pages ? 'disabled' : '') . '">
            <a class="page-link" href="#" data-page="' . ($page + 1) . '">&raquo;</a>
        </li>';
        }

        echo json_encode([
            'html'       => $html,
            'pagination' => $pagination
        ]);
    }





    public function toggle_status($id)
    {
        $post = $this->db->get_where('posts', ['id' => $id])->row();
        if ($post) {
            $new_status = $post->isActive ? 0 : 1;
            $this->db->update('posts', ['isActive' => $new_status], ['id' => $id]);
            echo json_encode(['status' => $new_status]);
        }
    }

    public function add_post()
    {
        $this->load->view('admin/header');
        $this->load->view('admin/post_form');
        $this->load->view('admin/footer');
    }

    public function post_edit($id)
    {
        $data['post_edit'] = $this->general_model->getOne('posts', ['id' => $id]);

        if (!$data['post_edit']) {
            show_404();
        }

        $this->load->view('admin/header');
        $this->load->view('admin/post_edit', $data);
        $this->load->view('admin/footer');
    }


    public function save()
    {
        $id = $this->input->post('post_id');

        $data = [
            'title' => $this->input->post('post_title'),
            'description' => $this->input->post('post_description'),
            'price' => $this->input->post('price'),
        ];

        if (!empty($_FILES['post_file']['name'])) {
            $config['upload_path'] = './uploads/posts/';
            $config['allowed_types'] = 'jpg|jpeg|png|mp4|avi|mov|mkv';
            $config['file_name'] = time();

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('post_file')) {
                echo json_encode(['status' => false, 'message' => strip_tags($this->upload->display_errors())]);
                return;
            }

            $upload = $this->upload->data();
            $data['file_path'] = 'uploads/posts/' . $upload['file_name'];
        } else {
            $data['file_path'] = $this->input->post('old_file');
        }

        if ($id) {
            $this->general_model->update('posts', ['id' => $id], $data);
            $msg = 'Post updated successfully!';
        } else {
            $data['created_on'] = date('Y-m-d H:i:s');
            $this->general_model->insert('posts', $data);
            $msg = 'Post added successfully!';
        }

        echo json_encode(['status' => true, 'message' => $msg]);
    }

    public function blog()
    {
        $this->load->view('admin/header');
        $this->load->view('admin/blog_view');
        $this->load->view('admin/footer');
    }
    public function add_blog()
    {
        $this->load->view('admin/header');
        $this->load->view('admin/blog_form');
        $this->load->view('admin/footer');
    }

    public function blog_category()
    {
        $this->load->view('admin/header');
        $this->load->view('admin/blog_category_view');
        $this->load->view('admin/footer');
    }

    public function blog_edit($id)
    {
        $data['blog_edit'] = $this->general_model->getOne('blogs', ['id' => $id]);

        if (!$data['blog_edit']) {
            show_404();
        }

        $this->load->view('admin/header');
        $this->load->view('admin/blog_edit', $data);
        $this->load->view('admin/footer');
    }

    public function save_blog()
    {
        $id = $this->input->post('blog_id');

        $data = [
            'title' => $this->input->post('blog_title'),
            'description' => $this->input->post('blog_content'),
            'category_id' => $this->input->post('blog_category') ?: null,
        ];

        // ===== IMAGE UPLOAD =====
        if (!empty($_FILES['blog_image']['name'])) {

            if (!is_dir('./uploads/blogs')) {
                mkdir('./uploads/blogs', 0777, true);
            }

            $config = [
                'upload_path' => './uploads/blogs/',
                'allowed_types' => 'jpg|jpeg|png',
                'file_name' => time(),
                'overwrite' => true
            ];

            $this->load->library('upload');
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('blog_image')) {
                echo json_encode([
                    'status' => false,
                    'message' => strip_tags($this->upload->display_errors())
                ]);
                return;
            }

            $upload = $this->upload->data();
            $data['file_path'] = 'uploads/blogs/' . $upload['file_name'];
        }

        if ($id) {
            $this->db->where('id', $id)->update('blogs', $data);
            $msg = 'Blog updated successfully!';
        } else {
            $data['created_on'] = date('Y-m-d H:i:s');
            $data['isActive'] = 1;
            $this->db->insert('blogs', $data);
            $msg = 'Blog added successfully!';
        }

        echo json_encode(['status' => true, 'message' => $msg]);
    }

    public function get_blogs_ajax()
    {
        try {
            $search = $this->input->get('search');
            $page = (int) $this->input->get('page');
            $page = $page > 0 ? $page : 1;

            $limit = 5; // ✅ ONLY 5 BLOGS PER PAGE (ONE PLACE ONLY)
            $offset = ($page - 1) * $limit;

            /* ---------- COUNT ---------- */
            $this->db->from('blogs');
            if (!empty($search)) {
                $this->db->like('title', $search);
            }
            $total = $this->db->count_all_results();

            /* ---------- FETCH BLOGS ---------- */
            $this->db
                ->select('b.*, c.title AS category_title')
                ->from('blogs b')
                ->join('blog_category c', 'c.id = b.category_id', 'left')
                ->order_by('b.id', 'DESC')
                ->limit($limit, $offset);

            if (!empty($search)) {
                $this->db->like('b.title', $search);
            }

            $blogs = $this->db->get()->result();

            /* ---------- BUILD HTML ---------- */
            $html = '';
            $index = $offset + 1;

            if ($blogs) {
                foreach ($blogs as $blog) {

                    $categoryName = $blog->category_title ?: 'No Category';
                    $categoryClass = $blog->category_title ? 'bg-success' : 'bg-danger';

                    $statusUI = $blog->isActive
                        ? '<div class="d-flex align-items-center text-success">
                            <i class="bx bx-radio-circle-marked font-18 me-1"></i>
                            <span>Active</span>
                       </div>'
                        : '<div class="d-flex align-items-center text-danger">
                            <i class="bx bx-radio-circle-marked font-18 me-1"></i>
                            <span>Inactive</span>
                       </div>';

                    $eyeIcon = $blog->isActive
                        ? '<a href="javascript:void(0)" class="toggle-status text-info" data-id="' . $blog->id . '">
                            <i class="bx bx-show"></i>
                       </a>'
                        : '<a href="javascript:void(0)" class="toggle-status text-danger" data-id="' . $blog->id . '">
                            <i class="bx bx-hide"></i>
                       </a>';

                    $html .= '
                <tr>
                    <td>' . $index++ . '</td>
                    <td>
                        <img src="' . base_url($blog->file_path) . '" width="60" height="60"
                             style="object-fit:cover;border-radius:6px;">
                    </td>
                    <td>' . htmlspecialchars($blog->title) . '</td>
                    <td><span class="badge ' . $categoryClass . '">' . $categoryName . '</span></td>
                    <td>' . $statusUI . '</td>
                    <td>
                        <div class="d-flex order-actions">
                            ' . $eyeIcon . '
                            <a href="' . base_url('admin/post/blog_edit/' . $blog->id) . '" 
                               class="ms-3 text-primary">
                                <i class="bx bx-edit"></i>
                            </a>
                        </div>
                    </td>
                </tr>';
                }
            } else {
                $html = '<tr><td colspan="6" class="text-center text-muted">No blogs found</td></tr>';
            }

            /* ---------- PAGINATION ---------- */
            $totalPages = ceil($total / $limit);
            $pagination = '';

            if ($totalPages > 1) {

                // Prev
                $pagination .= '
            <li class="page-item ' . ($page <= 1 ? 'disabled' : '') . '">
                <a class="page-link" href="#" data-page="' . ($page - 1) . '">&laquo;</a>
            </li>';

                for ($i = 1; $i <= $totalPages; $i++) {
                    $pagination .= '
                <li class="page-item ' . ($i == $page ? 'active' : '') . '">
                    <a class="page-link" href="#" data-page="' . $i . '">' . $i . '</a>
                </li>';
                }

                // Next
                $pagination .= '
            <li class="page-item ' . ($page >= $totalPages ? 'disabled' : '') . '">
                <a class="page-link" href="#" data-page="' . ($page + 1) . '">&raquo;</a>
            </li>';
            }

            echo json_encode([
                'html' => $html,
                'pagination' => $pagination
            ]);
        } catch (Exception $e) {
            echo json_encode([
                'html' => '<tr><td colspan="6" class="text-danger text-center">' . $e->getMessage() . '</td></tr>',
                'pagination' => ''
            ]);
        }
    }




    public function toggle_status_blog($id)
    {
        $blog = $this->db->get_where('blogs', ['id' => $id])->row();
        if (!$blog) {
            echo json_encode(['status' => false]);
            return;
        }

        $newStatus = ($blog->isActive == 1) ? 0 : 1;
        $this->db->where('id', $id)->update('blogs', ['isActive' => $newStatus]);

        echo json_encode(['status' => $newStatus]);
    }

    public function get_main_categories()
    {
        try {
            $result = $this->db
                ->select('id, title')
                ->from('blog_category')
                ->order_by('id', 'DESC')
                ->get()
                ->result();

            echo json_encode([
                'status' => true,
                'data' => $result
            ]);
        } catch (Exception $e) {
            echo json_encode([
                'status' => false,
                'message' => $e->getMessage()
            ]);
        }
    }


    public function add_category()
    {
        $title = trim($this->input->post('title'));

        if (empty($title)) {
            echo json_encode([
                'status' => false,
                'message' => 'Please enter a category title'
            ]);
            return;
        }

        $data = [
            'title' => $title,
            'created_on' => date('Y-m-d H:i:s')
        ];

        $this->db->insert('blog_category', $data);

        echo json_encode([
            'status' => true,
            'message' => 'Category added successfully'
        ]);
    }

    public function get_all_categories()
    {
        try {
            $search = $this->input->get('search');
            $page = (int) $this->input->get('page');
            $page = $page > 0 ? $page : 1;

            $limit = 5; // ✅ 5 categories per page
            $offset = ($page - 1) * $limit;

            /* ---------- COUNT ---------- */
            $this->db->from('blog_category');
            if (!empty($search)) {
                $this->db->like('title', $search);
            }
            $total = $this->db->count_all_results();

            /* ---------- FETCH CATEGORIES ---------- */
            $this->db
                ->select('id, title')
                ->from('blog_category')
                ->order_by('id', 'DESC')
                ->limit($limit, $offset);

            if (!empty($search)) {
                $this->db->like('title', $search);
            }

            $categories = $this->db->get()->result();

            /* ---------- BUILD HTML ---------- */
            $html = '';
            $index = $offset + 1;

            if ($categories) {
                foreach ($categories as $cat) {
                    $html .= '
                <tr>
                    <td>' . $index++ . '</td>
                    <td>' . htmlspecialchars($cat->title) . '</td>
                    <td>
                        <button class="btn btn-sm btn-warning editCategory"
                                data-id="' . $cat->id . '"
                                data-title="' . htmlspecialchars($cat->title) . '">
                            <i class="bx bx-edit"></i>
                        </button>

                        <button class="btn btn-sm btn-danger deleteCategory"
                                data-id="' . $cat->id . '">
                            <i class="bx bx-trash"></i>
                        </button>
                    </td>
                </tr>';
                }
            } else {
                $html = '<tr><td colspan="3" class="text-center text-muted">No categories found</td></tr>';
            }

            /* ---------- PAGINATION ---------- */
            $totalPages = ceil($total / $limit);
            $pagination = '';

            if ($totalPages > 1) {

                // Prev
                $pagination .= '
            <li class="page-item ' . ($page <= 1 ? 'disabled' : '') . '">
                <a class="page-link" href="#" data-page="' . ($page - 1) . '">&laquo;</a>
            </li>';

                for ($i = 1; $i <= $totalPages; $i++) {
                    $pagination .= '
                <li class="page-item ' . ($i == $page ? 'active' : '') . '">
                    <a class="page-link" href="#" data-page="' . $i . '">' . $i . '</a>
                </li>';
                }

                // Next
                $pagination .= '
            <li class="page-item ' . ($page >= $totalPages ? 'disabled' : '') . '">
                <a class="page-link" href="#" data-page="' . ($page + 1) . '">&raquo;</a>
            </li>';
            }

            echo json_encode([
                'status' => true,
                'html' => $html,
                'pagination' => $pagination
            ]);
        } catch (Exception $e) {
            echo json_encode([
                'status' => false,
                'html' => '<tr><td colspan="3" class="text-danger text-center">' . $e->getMessage() . '</td></tr>',
                'pagination' => ''
            ]);
        }
    }



    public function delete_category($id)
    {
        if (!$id) {
            echo json_encode(['status' => false, 'message' => 'Invalid category ID']);
            return;
        }

        // Delete main category
        $this->db->where('id', $id)->delete('blog_category');

        echo json_encode(['status' => true, 'message' => 'Category deleted successfully']);
    }

    public function update_category()
    {
        $id = $this->input->post('category_id');
        $title = trim($this->input->post('title'));

        if (empty($title)) {
            echo json_encode([
                'status' => false,
                'message' => 'Please enter a category title'
            ]);
            return;
        }

        if (!$id) {
            echo json_encode([
                'status' => false,
                'message' => 'Invalid category ID'
            ]);
            return;
        }

        $data = [
            'title' => $title
        ];

        $this->db->where('id', $id)->update('blog_category', $data);

        if ($this->db->affected_rows() > 0) {
            echo json_encode([
                'status' => true,
                'message' => 'Category updated successfully'
            ]);
        } else {
            echo json_encode([
                'status' => true,
                'message' => 'No changes made'
            ]);
        }
    }
}
