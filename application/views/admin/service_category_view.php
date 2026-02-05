<div class="page-wrapper">
  <div class="page-content">

    <div class="d-flex justify-content-between align-items-center mb-3">
      <input type="text" id="search" class="form-control w-25" placeholder="Search category...">

      <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
        <i class="bx bx-plus"></i> Add Category
      </button>
    </div>

    <div class="table-responsive">
      <table class="table mb-0">
        <thead class="table-light">
          <tr>
            <th>#</th>
            <th>Title</th>
            <th>Parent</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody id="service_category"></tbody>
      </table>
    </div>

  </div>
</div>

<!-- Add/Edit Category Modal -->
<div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTitle">Add Category</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form id="addCategoryForm">
          <input type="hidden" id="edit_id" name="edit_id">
          <div class="mb-3">
            <label class="form-label">Main Category (optional)</label>
            <select id="main_category" name="main_category" class="form-select">
              <option value="">-- None (Create Main Category) --</option>
            </select>
          </div>

          <div class="mb-3">
            <label class="form-label">Category Title</label>
            <input type="text" name="title" class="form-control" placeholder="Enter category title" required>
          </div>

          <div class="text-end">
            <button type="submit" class="btn btn-success" id="submitBtn">Add</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<nav>
  <ul class="pagination justify-content-center" id="pagination"></ul>
</nav>

<style>
  /* ===== CLEAN ADMIN PAGINATION (SERVICE CATEGORY PAGE) ===== */

  #pagination {
    margin-top: 15px;
  }

  /* Align in center */
  #pagination.pagination {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 8px;
  }

  /* Page buttons */
  #pagination .page-item .page-link {
    min-width: 42px;
    height: 42px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 8px;
    /* soft square look */
    border: 1px solid #007bff;
    /* your brand color */
    color: #007bff;
    font-weight: 600;
    background: #ffffff;
    transition: all 0.2s ease-in-out;
  }

  /* Hover */
  #pagination .page-link:hover {
    background: #007bff;
    color: white;
  }

  /* Active page */
  #pagination .active .page-link {
    background: #007bff;
    color: white;
    border-color: #007bff;
  }

  /* Disabled (Previous / Next) */
  #pagination .disabled .page-link {
    color: #b0b0b0;
    border-color: #ddd;
    background: #f5f5f5;
    pointer-events: none;
  }

  /* Make Previous/Next same size */
  #pagination .page-item:first-child .page-link,
  #pagination .page-item:last-child .page-link {
    padding: 0 12px;
  }
</style>

<script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
<script>
  $(document).ready(function() {

    var selectedParent = null; // Variable to store selected parent for edit

    // ✅ Load categories with pagination
    function loadCategories(page = 1, search = '') {
      $.ajax({
        url: "<?= base_url('admin/service/get_all_categories'); ?>",
        type: "GET",
        data: {
          page: page,
          search: search,
          limit: 5
        },
        dataType: "json",
        success: function(res) {
          if (res.status && res.data.length > 0) {
            let rows = '';
            let startIndex = (page - 1) * 10 + 1;
            $.each(res.data, function(index, cat) {
              rows += `
              <tr>
                <td>${startIndex + index}</td>
                <td>${cat.title}</td>
                <td>${cat.parent_title ? cat.parent_title : '— Main Category —'}</td>
                <td>
                  <button class="btn btn-sm btn-warning me-1 editCategory" data-id="${cat.id}" data-title="${cat.title.replace(/"/g, '&quot;')}" data-parent="${cat.parent_id || ''}">
                    <i class="bx bx-edit"></i>
                  </button>
                  <button class="btn btn-sm btn-danger deleteCategory" data-id="${cat.id}">
                    <i class="bx bx-trash"></i>
                  </button>
                </td>
              </tr>
            `;
            });
            $('#service_category').html(rows);
          } else {
            $('#service_category').html('<tr><td colspan="4" class="text-center text-muted">No categories found</td></tr>');
          }

          // Generate pagination
          if (res.pagination) {
            let pagination = '';
            let current_page = res.pagination.current_page;
            let total_pages = res.pagination.total_pages;

            if (total_pages > 1) {
              // Previous
              pagination += `<li class="page-item ${current_page == 1 ? 'disabled' : ''}">
                <a class="page-link" href="#" data-page="${current_page - 1}">&laquo;</a>
              </li>`;

              // Pages
              for (let i = 1; i <= total_pages; i++) {
                pagination += `<li class="page-item ${i == current_page ? 'active' : ''}">
                  <a class="page-link" href="#" data-page="${i}">${i}</a>
                </li>`;
              }

              // Next
              pagination += `<li class="page-item ${current_page == total_pages ? 'disabled' : ''}">
                <a class="page-link" href="#" data-page="${current_page + 1}">&raquo;</a>
              </li>`;
            }

            $('#pagination').html(pagination);
          }
        },
        error: function(xhr, status, error) {
          console.log('AJAX Error:', error);
          $('#service_category').html('<tr><td colspan="4" class="text-center text-danger">Error loading categories. Check console for details.</td></tr>');
        }
      });
    }

    // ✅ Call on page load
    loadCategories();

    // Load main categories
    function loadMainCategories() {
      $.ajax({
        url: "<?= base_url('admin/service/get_main_categories'); ?>",
        type: "GET",
        dataType: "json",
        success: function(res) {
          let options = '<option value="">-- None (Create Main Category) --</option>';
          if (res.status && res.data.length > 0) {
            $.each(res.data, function(i, cat) {
              options += `<option value="${cat.id}">${cat.title}</option>`;
            });
          }
          $('#main_category').html(options);
          // Set selected parent if editing
          if (selectedParent !== null) {
            $('#main_category').val(selectedParent);
            selectedParent = null;
          }
        }
      });
    }

    // Edit category
    $(document).on('click', '.editCategory', function() {
      let id = $(this).data('id');
      let title = $(this).data('title');
      let parent = $(this).data('parent');

      $('#edit_id').val(id);
      $('input[name="title"]').val(title);
      selectedParent = parent; // Store for later setting after categories load
      $('#modalTitle').text('Edit Category');
      $('#submitBtn').text('Update');
      $('#addCategoryModal').modal('show');
    });

    // Delete category
    $(document).on('click', '.deleteCategory', function() {
      let id = $(this).data('id');
      if (confirm('Are you sure you want to delete this category?')) {
        $.ajax({
          url: "<?= base_url('admin/service/delete_category/'); ?>" + id,
          type: "POST",
          dataType: "json",
          success: function(res) {
            alert(res.message);
            if (res.status) loadCategories();
          }
        });
      }
    });

    // Open modal and load categories
    $('#addCategoryModal').on('show.bs.modal', function() {
      if (!$('#edit_id').val()) {
        // Reset form for add
        $('#addCategoryForm')[0].reset();
        $('#edit_id').val('');
        $('#modalTitle').text('Add Category');
        $('#submitBtn').text('Add');
      }
      loadMainCategories();
    });

    // Submit form
    $('#addCategoryForm').on('submit', function(e) {
      e.preventDefault();

      let url = $('#edit_id').val() ? "<?= base_url('admin/service/update_category'); ?>" : "<?= base_url('admin/service/add_category'); ?>";

      $.ajax({
        url: url,
        type: "POST",
        data: $(this).serialize(),
        dataType: "json",
        success: function(res) {
          alert(res.message);
          if (res.status) {
            $('#addCategoryForm')[0].reset();
            $('#addCategoryModal').modal('hide');
            loadMainCategories();
            loadCategories();
          }
        }
      });
    });

    // Pagination Click
    $(document).on('click', '.page-link', function(e) {
      e.preventDefault();
      let page = $(this).data('page');
      let search = $('#search').val();
      loadCategories(page, search);
    });

    // Search
    $('#search').on('keyup', function() {
      loadCategories(1, $(this).val());
    });

  });
</script>