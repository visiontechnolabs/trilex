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
.pagination {
    margin: 2rem 0;
    display: flex;
    justify-content: center;
}

.page-item {
    margin: 0 2px;
}

.page-link {
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    min-width: 40px !important;
    height: 40px !important;
    padding: 0.5rem 0.75rem !important;
    border-radius: 8px !important;
    border: 1px solid #dee2e6 !important;
    background-color: #fff !important;
    color: #495057 !important;
    text-decoration: none !important;
    font-weight: 500 !important;
    transition: all 0.2s ease !important;
    cursor: pointer !important;
}

.page-link:hover {
    background-color: #f8f9fa !important;
    border-color: #adb5bd !important;
    color: #495057 !important;
    transform: translateY(-1px) !important;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1) !important;
}

.page-item.active .page-link {
    background-color: #007bff !important;
    border-color: #007bff !important;
    color: #fff !important;
    box-shadow: 0 2px 8px rgba(0,123,255,0.3) !important;
}

.page-item.disabled .page-link {
    background-color: #e9ecef !important;
    border-color: #dee2e6 !important;
    color: #6c757d !important;
    cursor: not-allowed !important;
}

.page-link i {
    font-size: 1.1rem !important;
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
    box-shadow: 0 2px 8px rgba(99,179,237,0.3) !important;
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
let limit = 10;

function fetchOrders(page = 1, search = '') {
    $.ajax({
        url: "<?= base_url('admin/customer/fetch_orders_ajax'); ?>",
        type: "POST",
        data: { page: page, search: search },
        dataType: "json",
        success: function(res) {
            if(res.status === 'success') {
                currentPage = res.current_page;
                limit = res.limit;
                currentSearch = search;

                let html = '';
                if(res.orders.length === 0){
                    html = '<tr><td colspan="8" class="text-center">No orders found.</td></tr>';
                } else {
                    res.orders.forEach((order, index) => {
    let statusText = 'PENDING';
    let statusClass = 'badge bg-warning';

    if(order.status == 0) { 
        statusText = 'REJECTED'; 
        statusClass = 'badge bg-danger'; 
    } else if(order.status == 1) { 
        statusText = 'APPROVED'; 
        statusClass = 'badge bg-success'; 
    } else if(order.status == 2) {
        statusText = 'PENDING'; 
        statusClass = 'badge bg-warning'; 
    }

    html += `<tr>
        <td>${index + 1 + (currentPage-1)*limit}</td>
        <td>${order.name ?? '-'}</td>
        <td>${order.email ?? '-'}</td>
        <td>${order.product_title ?? '-'}</td>
        <td>${order.payment_receipt ? `<a href='<?= base_url('uploads/receipts/'); ?>${order.payment_receipt}' target='_blank'>View</a>` : '-'}</td>
        <td>₹${order.product_price ?? '0'}</td>
        <td><span class="${statusClass}">${statusText}</span></td>
        <td>
            <select class="form-select action-dropdown" data-id="${order.id}" style="min-width: 140px;">
                <option value="" ${order.status == '' ? 'selected' : ''}>Select Action</option>
                <option value="1" ${order.status == 1 ? 'selected' : ''} style="color: #28a745; font-weight: 500;">
                    ✓ Approve
                </option>
                <option value="2" ${order.status == 2 ? 'selected' : ''} style="color: #ffc107; font-weight: 500;">
                    ⏱️ Pending
                </option>
                <option value="0" ${order.status == 0 ? 'selected' : ''} style="color: #dc3545; font-weight: 500;">
                    ✗ Reject
                </option>
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

function renderPagination(totalOrders, page) {
    const totalPages = Math.ceil(totalOrders / limit);
    let maxButtons = 5; // Show more pages
    let startPage = Math.max(1, page - Math.floor(maxButtons / 2));
    let endPage = Math.min(totalPages, startPage + maxButtons - 1);

    // Adjust start page if we're near the end
    if (endPage - startPage + 1 < maxButtons) {
        startPage = Math.max(1, endPage - maxButtons + 1);
    }

    let html = '';

    // Previous button
    if(page > 1){
        html += `<li class="page-item">
                    <button class="page-link" id="prevPage" title="Previous Page">
                        <i class="bx bx-chevron-left"></i>
                    </button>
                </li>`;
    }

    // First page + ellipsis if needed
    if (startPage > 1) {
        html += `<li class="page-item">
                    <button class="page-link page-btn" data-page="1">1</button>
                </li>`;
        if (startPage > 2) {
            html += `<li class="page-item disabled">
                        <span class="page-link">...</span>
                    </li>`;
        }
    }

    // Page numbers
    for(let i = startPage; i <= endPage; i++){
        html += `<li class="page-item ${i === page ? 'active' : ''}">
                    <button class="page-link page-btn" data-page="${i}">${i}</button>
                </li>`;
    }

    // Last page + ellipsis if needed
    if (endPage < totalPages) {
        if (endPage < totalPages - 1) {
            html += `<li class="page-item disabled">
                        <span class="page-link">...</span>
                    </li>`;
        }
        html += `<li class="page-item">
                    <button class="page-link page-btn" data-page="${totalPages}">${totalPages}</button>
                </li>`;
    }

    // Next button
    if(page < totalPages){
        html += `<li class="page-item">
                    <button class="page-link" id="nextPage" title="Next Page">
                        <i class="bx bx-chevron-right"></i>
                    </button>
                </li>`;
    }

    $('#pagination').html(html);
}

// Events
$(document).on('click', '.page-btn', function(){ fetchOrders(parseInt($(this).data('page')), currentSearch); });
$(document).on('click', '#prevPage', function(){ if(currentPage>1) fetchOrders(currentPage-1, currentSearch); });
$(document).on('click', '#nextPage', function(){ fetchOrders(currentPage+1, currentSearch); });
$('#search_order').on('keyup', function(){ fetchOrders(1, $(this).val()); });

// Action dropdown change
$(document).on('change', '.action-dropdown', function(){
    const orderId = $(this).data('id');
    const status = $(this).val();
    const statusText = status === '1' ? 'approve' : status === '2' ? 'mark as pending' : status === '0' ? 'reject' : '';

    if(status === '') return;

    const confirmText = `Are you sure you want to ${statusText} this order?`;
    const confirmButtonColor = status === '1' ? '#28a745' : status === '2' ? '#ffc107' : '#dc3545';

    Swal.fire({
        title: 'Confirm Action',
        text: confirmText,
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: confirmButtonColor,
        cancelButtonColor: '#6c757d',
        confirmButtonText: `Yes, ${statusText.charAt(0).toUpperCase() + statusText.slice(1)}!`,
        customClass: {
            confirmButton: status === '2' ? 'swal-confirm-pending' : ''
        }
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "<?= base_url('admin/customer/update_order_status'); ?>",
                type: "POST",
                data: { id: orderId, status: status },
                dataType: "json",
                success: function(res){
                    if(res.status === 'success'){
                        Swal.fire({
                            icon: 'success',
                            title: 'Status Updated!',
                            text: `Order has been ${statusText}d successfully.`,
                            timer: 2000,
                            showConfirmButton: false
                        });
                        fetchOrders(currentPage, currentSearch);
                    } else {
                        Swal.fire({ icon: 'error', title: 'Error', text: res.message });
                    }
                },
                error: function(){
                    Swal.fire({ icon: 'error', title: 'Error', text: 'Something went wrong.' });
                }
            });
        } else {
            // Reset dropdown if cancelled
            $(this).val($(this).find('option[selected]').val() || '');
        }
    });
});

// Initial load
$(document).ready(function(){ fetchOrders(); });
</script>
