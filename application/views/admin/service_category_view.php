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

<!-- Add Category Modal -->
<div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Category</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form id="addCategoryForm">
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
            <button type="submit" class="btn btn-success">Add</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<nav>
  <ul class="pagination justify-content-center" id="pagination"></ul>
</nav>

<script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
<script>
  $(document).ready(function () {
    $(document).ready(function () {

      // ✅ Load all categories in table
      function loadCategories() {
        $.ajax({
          url: "<?= base_url('admin/service/get_all_categories'); ?>",
          type: "GET",
          dataType: "json",
          success: function (res) {
            if (res.status && res.data.length > 0) {
              let rows = '';
              $.each(res.data, function (index, cat) {
                rows += `
              <tr>
                <td>${index + 1}</td>
                <td>${cat.title}</td>
                <td>${cat.parent_title ? cat.parent_title : '— Main Category —'}</td>
                <td>
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
          success: function (res) {
            let options = '<option value="">-- None (Create Main Category) --</option>';
            if (res.status && res.data.length > 0) {
              $.each(res.data, function (i, cat) {
                options += `<option value="${cat.id}">${cat.title}</option>`;
              });
            }
            $('#main_category').html(options);
          }
        });
      }
      $(document).on('click', '.deleteCategory', function () {
        let id = $(this).data('id');
        if (confirm('Are you sure you want to delete this category?')) {
          $.ajax({
            url: "<?= base_url('admin/service/delete_category/'); ?>" + id,
            type: "POST",
            dataType: "json",
            success: function (res) {
              alert(res.message);
              if (res.status) loadCategories();
            }
          });
        }
      });
      // Open modal and load categories
      $('#addCategoryModal').on('show.bs.modal', function () {
        loadMainCategories();
      });

      // Submit form
      $('#addCategoryForm').on('submit', function (e) {
        e.preventDefault();

        $.ajax({
          url: "<?= base_url('admin/service/add_category'); ?>",
          type: "POST",
          data: $(this).serialize(),
          dataType: "json",
          success: function (res) {
            alert(res.message);
            if (res.status) {
              $('#addCategoryForm')[0].reset();
              $('#addCategoryModal').modal('hide');
              loadMainCategories(); // reload dropdown
            }
          }
        });
      });

      function loadServices(page = 1, search = '') {
  $.ajax({
    url: "<?= base_url('admin/service/get_services_ajax'); ?>",
    type: "GET",
    data: { page: page, search: search },
    dataType: "json",
    success: function (res) {
      $('#service_table').html(res.html);
      $('#pagination').html(res.pagination);
    }
  });
}

// Initial Load
loadServices();

// Pagination Click
$(document).on('click', '.page-link', function (e) {
  e.preventDefault();
  let page = $(this).data('page');
  let search = $('#search').val();
  loadServices(page, search);
});

// Search
$('#search').on('keyup', function () {
  loadServices(1, $(this).val());
});


    });
  });
</script>