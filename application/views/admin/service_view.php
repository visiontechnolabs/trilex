<div class="page-wrapper">

    <div class="page-content">

        <!--breadcrumb-->

        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">

            <div class="breadcrumb-title pe-3">Table</div>

            <div class="ps-3">

                <nav aria-label="breadcrumb">

                    <ol class="breadcrumb mb-0 p-0">

                        <li class="breadcrumb-item">

                            <a href="<?= base_url('service'); ?>"><i class="bx bx-home-alt"></i></a>

                        </li>

                        <li class="breadcrumb-item active" aria-current="page">All Services</li>

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

                                <th>Category</th>

                                <th>Title</th>

                                <th>DIscription</th>

                                <th>Action</th>

                            </tr>

                        </thead>

                        <tbody id="blog"></tbody>

                    </table>

                </div>

            </div>

        </div>

        <nav>
            <ul class="pagination justify-content-center" id="pagination"></ul>
        </nav>

    </div>

</div>
</div>

<script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function () {

        loadServices(1, '');

        function loadServices(page, search) {
            $.ajax({
                url: "<?= base_url('admin/service/get_services_ajax') ?>",
                type: "GET",
                data: { page: page, search: search },
                success: function (res) {
                    let data = JSON.parse(res);
                    $('#blog').html(data.html);
                    $('#pagination').html(data.pagination);
                }
            });
        }

        // Pagination
        $(document).on('click', '#pagination a', function (e) {
            e.preventDefault();
            let page = $(this).data('page');
            let search = $('#search').val();
            loadServices(page, search);
        });

        // Search
        $('#search').on('keyup', function () {
            loadServices(1, $(this).val());
        });

        // Delete
        $(document).on('click', '.delete-service', function () {
            let id = $(this).data('id');

            Swal.fire({
                title: 'Are you sure?',
                text: 'This service will be permanently deleted!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {

                    $.ajax({
                        url: "<?= base_url('admin/service/delete_service') ?>",
                        type: "POST",
                        dataType: "json",
                        data: {
                            id: id,
                            '<?= $this->security->get_csrf_token_name(); ?>':
                                '<?= $this->security->get_csrf_hash(); ?>'
                        },
                        success: function (res) {
                            if (res.status) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Deleted!',
                                    text: res.message,
                                    timer: 1500,
                                    showConfirmButton: false
                                });

                                let page = $('#pagination li.active a').data('page') || 1;
                                let search = $('#search').val();
                                loadServices(page, search);
                            } else {
                                Swal.fire('Error', res.message, 'error');
                            }
                        },
                        error: function () {
                            Swal.fire('Error', 'Delete request failed!', 'error');
                        }
                    });
                }
            });
        });


    });
</script>