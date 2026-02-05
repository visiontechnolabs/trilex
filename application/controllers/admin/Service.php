<?php

class Service extends CI_Controller
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
        $this->load->view('admin/service_category_view');
        $this->load->view('admin/footer');
    }
    public function get_main_categories()
    {
        $query = $this->db->where('parent_id IS NULL', null, false)->get('service_category');
        $data = $query->result();

        echo json_encode([
            'status' => true,
            'data' => $data
        ]);
    }

    public function add_category()
    {
        $parent_id = $this->input->post('main_category');
        $title = trim($this->input->post('title'));

        if (empty($title)) {
            echo json_encode(['status' => false, 'message' => 'Please enter a category title']);
            return;
        }

        $data = [
            'parent_id' => !empty($parent_id) ? $parent_id : null,
            'title' => $title,
            'created_on' => date('Y-m-d H:i:s')
        ];

        $this->db->insert('service_category', $data);

        echo json_encode(['status' => true, 'message' => 'Category added successfully']);
    }
    public function get_all_categories()
    {
        $page = $this->input->get('page') ? (int)$this->input->get('page') : 1;
        $limit = $this->input->get('limit') ? (int)$this->input->get('limit') : 5;
        $search = $this->input->get('search') ? trim($this->input->get('search')) : '';
        $offset = ($page - 1) * $limit;

        // Build base query
        $this->db->select('c1.id, c1.title, c1.parent_id, c2.title as parent_title');
        $this->db->from('service_category c1');
        $this->db->join('service_category c2', 'c1.parent_id = c2.id', 'left');
        if (!empty($search)) {
            $this->db->like('c1.title', $search);
        }

        // Get total count
        $total = $this->db->count_all_results('', false); // false to not reset query

        // Apply order and limit for data
        $this->db->order_by('c1.id', 'DESC');
        $this->db->limit($limit, $offset);
        $query = $this->db->get();

        $total_pages = ceil($total / $limit);

        echo json_encode([
            'status' => true,
            'data' => $query->result(),
            'pagination' => [
                'current_page' => $page,
                'total_pages' => $total_pages,
                'total_records' => $total,
                'limit' => $limit
            ]
        ]);
    }

    public function update_category()
    {
        $id = $this->input->post('edit_id');
        $title = $this->input->post('title');
        $main_category = $this->input->post('main_category');

        if (!$id || !$title) {
            echo json_encode(['status' => false, 'message' => 'Invalid data']);
            return;
        }

        $data = ['title' => $title];
        if ($main_category) {
            $data['parent_id'] = $main_category;
        } else {
            $data['parent_id'] = null;
        }

        $this->db->where('id', $id);
        $this->db->update('service_category', $data);

        echo json_encode(['status' => true, 'message' => 'Category updated successfully']);
    }
    public function add_service()
    {
        $data['categories'] = $this->db
            ->where('parent_id IS NULL', null, false)
            ->get('service_category')
            ->result();
        $this->load->view('admin/header');
        $this->load->view('admin/service_form', $data);
        $this->load->view('admin/footer');
    }
    public function get_subcategories()
    {
        $parent_id = $this->input->post('parent_id');
        $subcategories = $this->db->where('parent_id', $parent_id)->get('service_category')->result();

        if (!empty($subcategories)) {
            echo json_encode(['status' => true, 'data' => $subcategories]);
        } else {
            echo json_encode(['status' => false, 'data' => []]);
        }
    }
    public function save_service()
    {
        header('Content-Type: application/json');

        $main_category = $this->input->post('main_category');
        $subcategory_id = $this->input->post('subcategory_id');
        $title = trim($this->input->post('title'));
        $description = $this->input->post('description');

        // 🔍 Validate required fields
        if (empty($main_category) || empty($title) || empty($description)) {
            echo json_encode(['status' => false, 'message' => 'All fields are required']);
            return;
        }

        $final_category_id = !empty($subcategory_id) ? $subcategory_id : $main_category;

        $created_on = date('Y-m-d H:i:s');

        $sql = "INSERT INTO services (category_id, title, description, created_on) 
            VALUES (?, ?, ?, ?)";

        $query = $this->db->query($sql, [
            $final_category_id,
            $title,
            $description,
            $created_on
        ]);

        if ($this->db->affected_rows() > 0) {
            echo json_encode(['status' => true, 'message' => 'Service added successfully']);
        } else {
            echo json_encode(['status' => false, 'message' => 'Failed to add service']);
        }
    }

    public function list_services()
    {
        $this->load->view('admin/header');
        $this->load->view('admin/service_view');
        $this->load->view('admin/footer');
    }

    public function get_services_ajax()
    {
        $page   = (int) $this->input->get('page') ?: 1;
        $search = $this->input->get('search');
        $limit  = 5;
        $offset = ($page - 1) * $limit;

        /* ---------- CORRECT COUNT (MOST IMPORTANT FIX) ---------- */
        $this->db->from('services');
        if (!empty($search)) {
            $this->db->like('title', $search);
        }
        $total = $this->db->count_all_results();

        /* ---------- FETCH DATA (NEW QUERY BUILDER) ---------- */
        $this->db->select('services.*, service_category.title as category');
        $this->db->from('services');
        $this->db->join(
            'service_category',
            'service_category.id = services.category_id',
            'left'
        );

        if (!empty($search)) {
            $this->db->like('services.title', $search);
        }

        $this->db->order_by('services.id', 'DESC');
        $this->db->limit($limit, $offset);

        $query = $this->db->get()->result();

        /* ---------- BUILD TABLE HTML ---------- */
        $html = '';
        $i = $offset + 1;

        foreach ($query as $row) {
            $html .= '
        <tr>
            <td>' . $i++ . '</td>
            <td>' . ($row->category ?? '-') . '</td>
            <td>' . $row->title . '</td>
            <td>' . substr(strip_tags($row->description), 0, 80) . '</td>
            <td>
                <a href="' . base_url('admin/service/edit_service/' . $row->id) . '" 
                   class="btn btn-sm btn-primary">
                   <i class="bx bx-edit"></i>
                </a>

                <button class="btn btn-sm btn-danger delete-service" 
                        data-id="' . $row->id . '">
                   <i class="bx bx-trash"></i>
                </button>
            </td>
        </tr>';
        }

        if (empty($html)) {
            $html = '<tr><td colspan="5" class="text-center">No services found</td></tr>';
        }

        /* ---------- FIXED PAGINATION WITH « » ---------- */
        $pages = ceil($total / $limit);
        $pagination = '';

        if ($pages > 1) {

            // « Previous
            $pagination .= '
        <li class="page-item ' . ($page <= 1 ? 'disabled' : '') . '">
            <a href="#" class="page-link" data-page="' . ($page - 1) . '">&laquo;</a>
        </li>';

            // Page numbers
            for ($i = 1; $i <= $pages; $i++) {
                $active = ($i == $page) ? 'active' : '';
                $pagination .= '
            <li class="page-item ' . $active . '">
                <a href="#" class="page-link" data-page="' . $i . '">' . $i . '</a>
            </li>';
            }

            // Next »
            $pagination .= '
        <li class="page-item ' . ($page >= $pages ? 'disabled' : '') . '">
            <a href="#" class="page-link" data-page="' . ($page + 1) . '">&raquo;</a>
        </li>';
        }

        echo json_encode([
            'html' => $html,
            'pagination' => $pagination
        ]);
    }


    public function edit_service($id)
    {
        $data['service'] = $this->db->where('id', $id)->get('services')->row();
        $data['categories'] = $this->db->get('service_category')->result();

        if (!$data['service']) {
            redirect('all_service');
        }

        $this->load->view('admin/header');
        $this->load->view('admin/service_edit_view', $data);
        $this->load->view('admin/footer');
    }

    public function update_service()
    {
        $id = $this->input->post('service_id');

        if (!$id) {
            echo json_encode(['status' => false, 'message' => 'Invalid Service ID']);
            return;
        }

        $data = [
            'category_id' => $this->input->post('category_id'),
            'title' => $this->input->post('service_title'),
            'description' => $this->input->post('service_description'),
        ];

        $this->db->where('id', $id)->update('services', $data);

        echo json_encode([
            'status' => true,
            'message' => 'Service updated successfully'
        ]);
    }

    public function delete_service()
    {
        header('Content-Type: application/json');

        $id = $this->input->post('id');

        if (!$id) {
            echo json_encode([
                'status' => false,
                'message' => 'Service ID missing'
            ]);
            return;
        }

        // Convert to integer for safety
        $id = (int) $id;

        // Check if record exists
        $query = $this->db->get_where('services', ['id' => $id]);

        if ($query->num_rows() == 0) {
            echo json_encode([
                'status' => false,
                'message' => 'Record not found in database'
            ]);
            return;
        }

        // DELETE the record
        $this->db->delete('services', ['id' => $id]);

        if ($this->db->affected_rows() > 0) {
            echo json_encode([
                'status' => true,
                'message' => 'Service deleted successfully'
            ]);
        } else {
            echo json_encode([
                'status' => false,
                'message' => 'Delete failed at DB level'
            ]);
        }
    }
}
