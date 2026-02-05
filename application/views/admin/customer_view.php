<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Table</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item">
                            <a href="<?= base_url('dashboard'); ?>"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">All Customers</li>
                    </ol>
                </nav>
            </div>
        </div>

        <hr>

        <div class="card">
            <div class="card-body">
                <div class="d-lg-flex align-items-center mb-4 gap-3">
                    <input type="text" id="search_customer" class="form-control w-25" placeholder="Search customer...">
                </div>

                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Total Orders</th>
                                <th>Account Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="customer"></tbody>
                    </table>
                </div>
            </div>
        </div>


        <nav aria-label="Page navigation example">
            <ul class="pagination round-pagination justify-content-center" id="pagination"></ul>
        </nav>
    </div>
</div>

<style>
    /* ===== CUSTOMER PAGE PAGINATION (CLEAN ADMIN STYLE) ===== */

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
    }

    /* Active page */
    #pagination .active .page-link {
        background: #007bff;
        color: white;
        border-color: #007bff;
    }

    /* Disabled / edge buttons */
    #pagination .disabled .page-link {
        color: #b0b0b0;
        border-color: #ddd;
        background: #f5f5f5;
        pointer-events: none;
    }

    /* Make Prev / Next look same as numbers */
    #pagination #prevPage,
    #pagination #nextPage {
        padding: 0 12px;
    }
</style>

<script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
<script>
    let currentPage = 1;
    let currentSearch = '';
    let limit = 10;

    function fetchCustomers(page = 1, search = '') {
        $.ajax({
            url: "<?= base_url('admin/customer/fetch_customers_ajax'); ?>",
            type: "POST",
            data: {
                page: page,
                search: search
            },
            dataType: "json",
            success: function(res) {
                if (res.status === 'success') {
                    currentPage = res.current_page;
                    limit = res.limit;
                    currentSearch = search;

                    let html = '';
                    if (res.customers.length === 0) {
                        html = '<tr><td colspan="6" class="text-center">No customers found.</td></tr>';
                    } else {
                        res.customers.forEach((cust, index) => {
                            let statusText = cust.isActive == 1 ? 'Active' : 'Deactive';
                            let statusClass = cust.isActive == 1 ? 'badge bg-success' : 'badge bg-danger';
                            let disableBtn = cust.isActive == 0 ? 'disabled' : '';

                            html += `<tr>
                            <td>${index + 1 + (currentPage-1)*limit}</td>
                            <td>${cust.name ?? '-'}</td>
                            <td>${cust.email ?? '-'}</td>
                            <td>${cust.total_orders ?? 0}</td>
                            <td><span class="${statusClass}">${statusText}</span></td>
                            <td>
                                <button class="btn btn-sm btn-danger deactivate-user" data-id="${cust.id}" ${disableBtn}>
                                    <i class="bx bx-user-x"></i>
                                </button>
                            </td>
                        </tr>`;
                        });
                    }

                    $('#customer').html(html);
                    renderPagination(res.total_customers, currentPage);
                }
            }
        });
    }

    function renderPagination(total, page) {
        const totalPages = Math.ceil(total / limit);
        let html = '';
        if (page > 1) html += `<li class="page-item"><button class="page-link" id="prevPage">Prev</button></li>`;
        for (let i = 1; i <= totalPages; i++) {
            html += `<li class="page-item ${i === page ? 'active' : ''}">
                    <button class="page-link page-btn" data-page="${i}">${i}</button>
                 </li>`;
        }
        if (page < totalPages) html += `<li class="page-item"><button class="page-link" id="nextPage">Next</button></li>`;
        $('#pagination').html(html);
    }

    $(document).on('click', '.page-btn', function() {
        const page = parseInt($(this).data('page'));
        fetchCustomers(page, currentSearch);
    });
    $(document).on('click', '#prevPage', function() {
        if (currentPage > 1) fetchCustomers(currentPage - 1, currentSearch);
    });
    $(document).on('click', '#nextPage', function() {
        fetchCustomers(currentPage + 1, currentSearch);
    });
    $('#search_customer').on('keyup', function() {
        let search = $(this).val();
        fetchCustomers(1, search);
    });

    // Deactivate user
    $(document).on('click', '.deactivate-user', function() {
        let userId = $(this).data('id');
        Swal.fire({
            title: 'Are you sure?',
            text: "You want to deactivate this user?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, deactivate it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "<?= base_url('admin/customer/deactivate_user'); ?>",
                    type: "POST",
                    data: {
                        id: userId
                    },
                    dataType: "json",
                    success: function(res) {
                        if (res.status === 'success') {
                            Swal.fire('Done!', res.message, 'success');
                            fetchCustomers(currentPage, currentSearch);
                        } else {
                            Swal.fire('Error', res.message, 'error');
                        }
                    }
                });
            }
        });
    });

    $(document).ready(function() {
        fetchCustomers();
    });
</script>