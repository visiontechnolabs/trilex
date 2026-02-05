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

                        <li class="breadcrumb-item active" aria-current="page">All Post</li>

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

                                <!-- <th>Image/video</th> -->

                                <th>Title</th>
                                <th>Price</th>

                                <th>Status</th>

                                <th>Action</th>

                            </tr>

                        </thead>

                        <tbody id="post"></tbody>

                    </table>

                </div>

            </div>

        </div>

        <nav aria-label="Page navigation example">

            <ul class="pagination round-pagination justify-content-center" id="pagination"></ul>

        </nav>

    </div>

</div>
</div>

<style>
    /* ===== POSTS PAGE – ENHANCED PAGINATION ===== */

    #pagination {
        margin-top: 18px;
    }

    /* Center alignment */
    #pagination.pagination {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 8px;
    }

    /* Page buttons */
    #pagination .page-item .page-link {
        min-width: 40px;
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
        transform: translateY(-1px);
    }

    /* Active page */
    #pagination .active .page-link {
        background: #007bff;
        color: white;
        border-color: #007bff;
        box-shadow: 0 2px 6px rgba(11, 60, 93, 0.3);
    }

    /* Disabled buttons (Prev/Next) */
    #pagination .disabled .page-link {
        color: #b0b0b0;
        border-color: #ddd;
        background: #f5f5f5;
        pointer-events: none;
    }

    /* Make arrows same size as numbers */
    #pagination .page-item:first-child .page-link,
    #pagination .page-item:last-child .page-link {
        padding: 0 12px;
    }

    /* Mobile adjustment */
    @media (max-width: 576px) {
        #pagination .page-item .page-link {
            min-width: 34px;
            height: 34px;
            font-size: 0.85rem;
        }
    }
</style>

<script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>

<script>
    $(document).ready(function() {

        function load_posts(page = 1, search = '') {
            $.ajax({
                url: '<?= base_url("admin/post/fetch_posts") ?>',
                type: 'GET',
                data: {
                    page: page,
                    search: search
                },
                dataType: 'json',
                success: function(res) {
                    $('#post').html(res.html);
                    $('#pagination').html(res.pagination);
                }
            });
        }

        load_posts();

        $('#search').on('keyup', function() {
            let search = $(this).val();
            load_posts(1, search);
        });

        $(document).on('click', '#pagination li a', function(e) {
            e.preventDefault();
            let page = $(this).data('page');
            let search = $('#search').val();
            load_posts(page, search);
        });

        // Toggle status
        $(document).on('click', '.status-toggle', function() {
            let id = $(this).data('id');
            let icon = $(this);
            $.ajax({
                url: '<?= base_url("admin/post/toggle_status") ?>/' + id,
                success: function(res) {
                    let data = JSON.parse(res);
                    if (data.status == 1) {
                        icon.removeClass('bx-x-circle text-danger').addClass('bx-check-circle text-success');
                    } else {
                        icon.removeClass('bx-check-circle text-success').addClass('bx-x-circle text-danger');
                    }
                }
            });
        });

        // Toggle status using eye/eye-slash icon
        $(document).on('click', '.toggle-status', function() {
            let id = $(this).data('id');
            $.ajax({
                url: '<?= base_url("admin/post/toggle_status") ?>/' + id,
                success: function(res) {
                    let data = JSON.parse(res);
                    // Reload current page to update status + icon
                    let search = $('#search').val();
                    let currentPage = $('#pagination li.active a').data('page') || 1;
                    load_posts(currentPage, search);
                }
            });
        });

    });
</script>