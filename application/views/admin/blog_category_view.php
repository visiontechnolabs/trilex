<div class="page-wrapper">
    <div class="page-content">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <input type="text" id="search" class="form-control w-25" placeholder="Search category...">

            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
                <i class="bx bx-plus"></i> Add Blog Category
            </button>
        </div>

        <div class="table-responsive">
            <table class="table mb-0">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="blog_category"></tbody>
            </table>
        </div>

        <nav class="mt-4">
            <ul class="pagination justify-content-center" id="pagination"></ul>
        </nav>

    </div>
</div>

<!-- Add Category Modal -->
<div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Blog Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="addCategoryForm">
                    <div class="mb-3">
                        <label class="form-label">Blog Category Title</label>
                        <input type="text" name="title" class="form-control" placeholder="Enter blog category title"
                            required>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-success">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit Category Modal -->
<div class="modal fade" id="editCategoryModal" tabindex="-1" aria-labelledby="editCategoryModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Blog Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="editCategoryForm">
                    <input type="hidden" name="category_id" id="editCategoryId">
                    <div class="mb-3">
                        <label class="form-label">Blog Category Title</label>
                        <input type="text" name="title" id="editCategoryTitle" class="form-control"
                            placeholder="Enter blog category title" required>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    /* ===== CLEAN ADMIN PAGINATION ===== */
    #pagination {
        margin-top: 15px;
    }

    /* Container alignment */
    #pagination.pagination {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 6px;
    }

    /* Each page box */
    #pagination .page-item .page-link {
        width: 40px;
        height: 40px;
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

    /* Hover effect */
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

    /* Disabled arrows */
    #pagination .disabled .page-link {
        color: #b0b0b0;
        border-color: #ddd;
        background: #f5f5f5;
        pointer-events: none;
    }
</style>

<script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>


<script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
<script>
    $(document).ready(function() {

        let currentPage = 1;

        loadCategories(currentPage, '');

        // Load categories (WITH pagination)
        function loadCategories(page, search) {
            currentPage = page;

            $.ajax({
                url: "<?= base_url('admin/post/get_all_categories'); ?>",
                type: "GET",
                data: {
                    page: page,
                    search: search
                },
                dataType: "json",
                success: function(res) {

                    if (!res.status) {
                        $('#blog_category').html(
                            '<tr><td colspan="3" class="text-center text-danger">' +
                            (res.message || 'Error loading categories') +
                            '</td></tr>'
                        );
                        $('#pagination').html('');
                        return;
                    }

                    $('#blog_category').html(res.html);
                    $('#pagination').html(res.pagination);
                },
                error: function() {
                    $('#blog_category').html(
                        '<tr><td colspan="3" class="text-center text-danger">Server error</td></tr>'
                    );
                }
            });
        }

        // Pagination click
        $(document).on('click', '#pagination a', function(e) {
            e.preventDefault();
            let page = $(this).data('page');
            if (!page) return;

            loadCategories(page, $('#search').val());
        });

        // Search
        $('#search').on('keyup', function() {
            loadCategories(1, $(this).val());
        });

        // Add category
        $('#addCategoryForm').on('submit', function(e) {
            e.preventDefault();

            $.post(
                "<?= base_url('admin/post/add_category'); ?>",
                $(this).serialize(),
                function(res) {
                    alert(res.message);
                    if (res.status) {
                        $('#addCategoryForm')[0].reset();
                        $('#addCategoryModal').modal('hide');
                        loadCategories(currentPage, $('#search').val());
                    }
                },
                'json'
            );
        });

        // Open edit modal
        $(document).on('click', '.editCategory', function() {
            $('#editCategoryId').val($(this).data('id'));
            $('#editCategoryTitle').val($(this).data('title'));
            $('#editCategoryModal').modal('show');
        });

        // Update category
        $('#editCategoryForm').on('submit', function(e) {
            e.preventDefault();

            $.post(
                "<?= base_url('admin/post/update_category'); ?>",
                $(this).serialize(),
                function(res) {
                    alert(res.message);
                    if (res.status) {
                        $('#editCategoryModal').modal('hide');
                        loadCategories(currentPage, $('#search').val());
                    }
                },
                'json'
            );
        });

        // Delete category
        $(document).on('click', '.deleteCategory', function() {
            let id = $(this).data('id');

            if (!confirm('Delete this category?')) return;

            $.post(
                "<?= base_url('admin/post/delete_category/'); ?>" + id,
                function(res) {
                    alert(res.message);
                    if (res.status) {
                        loadCategories(currentPage, $('#search').val());
                    }
                },
                'json'
            );
        });

    });
</script>