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

                        <li class="breadcrumb-item active" aria-current="page">All Orders</li>

                    </ol>

                </nav>

            </div>

        </div>

        <!--end breadcrumb-->

        <hr>

        <div class="card">

            <div class="card-body">

                <div class="d-lg-flex align-items-center mb-4 gap-3">
                    <input type="text" id="search_order" class="form-control w-25" placeholder="Search order...">
                </div>


                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Index#</th>
                                <th>User name</th>
                                <th>User Email</th>
                                <th>Product</th>
                                <th>Payment Receipt</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="order"></tbody>
                    </table>
                </div>

            </div>

        </div>

        <nav aria-label="Page navigation example">
            <ul class="pagination round-pagination justify-content-center" id="pagination"></ul>
        </nav>

        <div class="pagination-info" id="pagination-info"></div>

    </div>

</div>
<!-- </div> -->
<!-- </div> -->
<style>
    /* Enhanced Action Dropdown Styling */
    .action-dropdown {
        border-radius: 6px !important;
        border: 1px solid #dee2e6 !important;
        font-size: 0.875rem !important;
        font-weight: 500 !important;
        transition: all 0.2s ease !important;
        background-image: none !important;
        padding: 0.375rem 2rem 0.375rem 0.75rem !important;
    }

    .action-dropdown:focus {
        border-color: #86b7fe !important;
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25) !important;
    }

    .action-dropdown:hover {
        border-color: #86b7fe !important;
    }

    /* Status indicator styling */
    .action-dropdown option {
        padding: 8px !important;
        background-color: white !important;
    }

    .action-dropdown option[value="1"] {
        background-color: rgba(40, 167, 69, 0.1) !important;
        color: #28a745 !important;
    }

    .action-dropdown option[value="2"] {
        background-color: rgba(255, 193, 7, 0.1) !important;
        color: #ffc107 !important;
    }

    .action-dropdown option[value="0"] {
        background-color: rgba(220, 53, 69, 0.1) !important;
        color: #dc3545 !important;
    }

    /* Dark mode styling for dropdown */
    [data-bs-theme="dark"] .action-dropdown {
        background-color: #374151 !important;
        border-color: #4a5568 !important;
        color: #e2e8f0 !important;
    }

    [data-bs-theme="dark"] .action-dropdown:focus {
        border-color: #63b3ed !important;
        box-shadow: 0 0 0 0.25rem rgba(99, 179, 237, 0.25) !important;
    }

    [data-bs-theme="dark"] .action-dropdown option {
        background-color: #2d3748 !important;
        color: #e2e8f0 !important;
    }

    [data-bs-theme="dark"] .action-dropdown option[value="1"] {
        background-color: rgba(40, 167, 69, 0.2) !important;
        color: #28a745 !important;
    }

    [data-bs-theme="dark"] .action-dropdown option[value="2"] {
        background-color: rgba(255, 193, 7, 0.2) !important;
        color: #ffc107 !important;
    }

    [data-bs-theme="dark"] .action-dropdown option[value="0"] {
        background-color: rgba(220, 53, 69, 0.2) !important;
        color: #dc3545 !important;
    }

    /* Current status indicator */
    .action-dropdown option[selected] {
        font-weight: 600 !important;
        border-left: 3px solid currentColor !important;
    }

    /* SweetAlert custom styling for pending button */
    .swal-confirm-pending {
        color: #212529 !important;
    }

    .swal-confirm-pending:hover {
        background-color: #e0a800 !important;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .action-dropdown {
            min-width: 120px !important;
            font-size: 0.8rem !important;
        }
    }

    /* Enhanced Pagination Styling */
    /* ===== ORDER PAGE – CLEAN ADMIN PAGINATION ===== */

    #pagination {
        margin: 2rem 0;
    }

    /* Center alignment */
    #pagination.pagination {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 6px;
    }

    /* Page buttons */
    #pagination .page-item .page-link {
        min-width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 8px;
        border: 1px solid #007bff;
        /* your brand color */
        background: #ffffff;
        color: #007bff;
        font-weight: 600;
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

    /* Disabled pages (Prev/Next or dots) */
    #pagination .disabled .page-link {
        background: #f3f4f6;
        border-color: #e5e7eb;
        color: #9ca3af;
        pointer-events: none;
    }

    /* Make arrows same size as numbers */
    #pagination #prevPage,
    #pagination #nextPage {
        padding: 0 10px;
    }

    /* Mobile adjustment */
    @media (max-width: 576px) {
        #pagination .page-item .page-link {
            min-width: 34px;
            height: 34px;
            font-size: 0.85rem;
        }
    }


    /* Dark mode pagination styling */
    [data-bs-theme="dark"] .page-link {
        background-color: #374151 !important;
        border-color: #4a5568 !important;
        color: #e2e8f0 !important;
    }

    [data-bs-theme="dark"] .page-link:hover {
        background-color: #4a5568 !important;
        border-color: #5a6478 !important;
        color: #e2e8f0 !important;
    }

    [data-bs-theme="dark"] .page-item.active .page-link {
        background-color: #63b3ed !important;
        border-color: #63b3ed !important;
        color: #1a202c !important;
        box-shadow: 0 2px 8px rgba(99, 179, 237, 0.3) !important;
    }

    [data-bs-theme="dark"] .page-item.disabled .page-link {
        background-color: #2d3748 !important;
        border-color: #4a5568 !important;
        color: #9ca3af !important;
    }

    /* Pagination info display */
    .pagination-info {
        text-align: center;
        margin-top: 1rem;
        color: #6c757d;
        font-size: 0.875rem;
    }

    [data-bs-theme="dark"] .pagination-info {
        color: #9ca3af;
    }

    /* Mobile responsive pagination */
    @media (max-width: 576px) {
        .page-link {
            min-width: 35px !important;
            height: 35px !important;
            padding: 0.25rem 0.5rem !important;
            font-size: 0.875rem !important;
        }

        .page-link i {
            font-size: 1rem !important;
        }

        .pagination {
            flex-wrap: wrap;
            gap: 2px;
        }

        .page-item {
            margin: 0 1px;
        }
    }
</style>
<script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
<script>
    let currentPage = 1;
    let currentSearch = '';
    let limit = 5;

    function fetchOrders(page = 1, search = '') {
        $.ajax({
            url: "<?= base_url('admin/customer/fetch_orders_ajax'); ?>",
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

                    if (res.orders.length === 0) {
                        html = '<tr><td colspan="8" class="text-center">No orders found.</td></tr>';
                    } else {
                        res.orders.forEach((order, index) => {

                            let statusText = 'PENDING';
                            let statusClass = 'badge bg-warning';

                            if (order.status == 0) {
                                statusText = 'REJECTED';
                                statusClass = 'badge bg-danger';
                            } else if (order.status == 1) {
                                statusText = 'APPROVED';
                                statusClass = 'badge bg-success';
                            }

                            html += `
                        <tr>
                            <td>${index + 1 + (currentPage-1)*limit}</td>
                            <td>${order.name ?? '-'}</td>
                            <td>${order.email ?? '-'}</td>
                            <td>${order.product_title ?? '-'}</td>
                            <td>
                                ${order.payment_receipt 
                                    ? `<a href="<?= base_url('uploads/receipts/'); ?>${order.payment_receipt}" target="_blank">View</a>` 
                                    : '-'}
                            </td>
                            <td>₹${order.product_price ?? '0'}</td>
                            <td><span class="${statusClass}">${statusText}</span></td>
                            <td>
                                <select class="form-select action-dropdown" data-id="${order.id}" style="min-width: 140px;">
                                    <option value="">Select Action</option>
                                    <option value="1" ${order.status == 1 ? 'selected' : ''}>Approve</option>
                                    <option value="2" ${order.status == 2 ? 'selected' : ''}>Pending</option>
                                    <option value="0" ${order.status == 0 ? 'selected' : ''}>Reject</option>
                                </select>
                            </td>
                        </tr>`;
                        });
                    }

                    $('#order').html(html);
                    renderPagination(res.total_orders, currentPage);
                }
            }
        });
    }

    /* -------------------- CLEAN SIMPLE PAGINATION -------------------- */

    function renderPagination(totalOrders, page) {
        const totalPages = Math.ceil(totalOrders / limit);
        let html = '';

        if (totalPages > 1) {

            // « Previous
            html += `<li class="page-item ${page <= 1 ? 'disabled' : ''}">
                    <button class="page-link" data-page="${page - 1}">&laquo;</button>
                 </li>`;

            // Page numbers
            for (let i = 1; i <= totalPages; i++) {
                html += `<li class="page-item ${i === page ? 'active' : ''}">
                        <button class="page-link" data-page="${i}">${i}</button>
                     </li>`;
            }

            // Next »
            html += `<li class="page-item ${page >= totalPages ? 'disabled' : ''}">
                    <button class="page-link" data-page="${page + 1}">&raquo;</button>
                 </li>`;
        }

        $('#pagination').html(html);
    }

    /* ---------- SINGLE CLICK HANDLER FOR ALL PAGINATION ---------- */
    $(document).on('click', '#pagination .page-link', function(e) {
        e.preventDefault();
        let page = parseInt($(this).data('page'));
        if (!page) return;
        fetchOrders(page, currentSearch);
    });

    /* ---------- SEARCH ---------- */
    $('#search_order').on('keyup', function() {
        fetchOrders(1, $(this).val());
    });

    /* ---------- ACTION DROPDOWN ---------- */
    $(document).on('change', '.action-dropdown', function() {

        const orderId = $(this).data('id');
        const status = $(this).val();

        if (status === '') return;

        Swal.fire({
            title: 'Confirm Action',
            text: 'Are you sure?',
            icon: 'question',
            showCancelButton: true,
        }).then((result) => {

            if (result.isConfirmed) {
                $.ajax({
                    url: "<?= base_url('admin/customer/update_order_status'); ?>",
                    type: "POST",
                    data: {
                        id: orderId,
                        status: status
                    },
                    dataType: "json",
                    success: function(res) {
                        if (res.status === 'success') {
                            Swal.fire('Done!', res.message, 'success');
                            fetchOrders(currentPage, currentSearch);
                        } else {
                            Swal.fire('Error', res.message, 'error');
                        }
                    }
                });
            }
        });
    });

    /* ---------- INITIAL LOAD ---------- */
    $(document).ready(function() {
        fetchOrders();
    });
</script>