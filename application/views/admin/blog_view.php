<div class="page-wrapper">

    <div class="page-content">

        <!--breadcrumb-->

        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">

            <div class="breadcrumb-title pe-3">Table</div>

            <div class="ps-3">

                <nav aria-label="breadcrumb">

                    <ol class="breadcrumb mb-0 p-0">

                        <li class="breadcrumb-item">

                            <a href="<?= base_url('dashboard'); ?>"><i class="bx bx-home-alt"></i></a>

                        </li>

                        <li class="breadcrumb-item active" aria-current="page">All Blogs</li>

                    </ol>

                </nav>

            </div>

        </div>

        <!--end breadcrumb-->

        <hr>

        <div class="card">

            <div class="card-body">

                <div class="d-lg-flex align-items-center mb-4 gap-3">

                    <input type="text" id="search" class="form-control w-25" placeholder="Search post...">

                </div>

                <div class="table-responsive">

                    <table class="table mb-0">

                        <thead class="table-light">

                            <tr>

                                <th>Index#</th>

                                <th>Image</th>

                                <th>Title</th>

                                <th>Category</th>

                                <th>Status</th>

                                <th>Action</th>

                            </tr>

                        </thead>

                        <tbody id="blog"></tbody>

                    </table>

                </div>

            </div>

        </div>

        <nav aria-label="Page navigation">
            <ul class="pagination trilex-pagination" id="pagination"></ul>
        </nav>

    </div>

</div>
</div>

<style>
    /* ===== TRILEX VERTICAL BOXED PAGINATION ===== */

    .trilex-pagination {
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        text-align: center;
        gap: 6px;
    }

    /* Each page box */
    .trilex-pagination .page-item .page-link {
        width: 42px;
        height: 42px;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 1px solid #007bff;
        color: #007bff;
        font-weight: 600;
        border-radius: 8px;
        /* Slightly rounded like your image */
        background: white;
    }

    /* Active page */
    .trilex-pagination .active .page-link {
        background: #007bff;
        color: white;
    }

    /* Hover effect */
    .trilex-pagination .page-link:hover {
        background: #0056b3;
        color: white;
    }
</style>
<script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function() {

        let currentPage = 1;

        // Initial load
        loadBlogs(currentPage, '');

        // Load blogs function
        function loadBlogs(page, search) {
            currentPage = page;

            $.ajax({
                url: "<?= base_url('admin/post/get_blogs_ajax') ?>",
                type: "GET",
                data: {
                    page: page,
                    search: search
                },
                dataType: "json",
                success: function(data) {
                    if (data.html !== undefined) {
                        $('#blog').html(data.html);
                        $('#pagination').html(data.pagination);


                    } else {
                        $('#blog').html(
                            '<tr><td colspan="6" class="text-center text-muted">No blogs found</td></tr>'
                        );
                    }
                },
                error: function() {
                    $('#blog').html(
                        '<tr><td colspan="6" class="text-center text-danger">Error loading blogs</td></tr>'
                    );
                }
            });
        }

        // Pagination click
        $(document).on('click', '#pagination a', function(e) {
            e.preventDefault();

            let page = $(this).data('page');
            if (!page) return;

            let search = $('#search').val();
            loadBlogs(page, search);
        });

        // Search
        $('#search').on('keyup', function() {
            let search = $(this).val();
            loadBlogs(1, search);
        });

        // Toggle status (Active / Inactive)
        $(document).on('click', '.toggle-status', function() {
            let id = $(this).data('id');

            $.ajax({
                url: "<?= base_url('admin/post/toggle_status_blog/') ?>" + id,
                type: "GET",
                dataType: "json",
                success: function(res) {

                    Swal.fire({
                        icon: res.status == 1 ? 'success' : 'warning',
                        title: res.status == 1 ? 'Activated' : 'Deactivated',
                        text: res.status == 1 ?
                            'Blog is now active!' : 'Blog is now inactive!',
                        timer: 1200,
                        showConfirmButton: false
                    });

                    loadBlogs(currentPage, $('#search').val());
                },
                error: function() {
                    console.error('Error toggling blog status');
                }
            });
        });

    });
</script>