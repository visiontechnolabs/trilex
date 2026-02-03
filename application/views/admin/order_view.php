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

    </div>

</div>
<!-- </div> -->
<!-- </div> -->
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
            <select class="form-select action-dropdown" data-id="${order.id}">
                <option value="">Select Action</option>
                <option value="1">Approve</option>
                <option value="2">Pending</option>
                <option value="0">Reject</option>
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
    let maxButtons = 3;
    let startPage = Math.max(1, page - 1);
    let endPage = Math.min(totalPages, startPage + maxButtons - 1);

    let html = '';
    if(page > 1){
        html += `<li class="page-item"><button class="page-link" id="prevPage">Prev</button></li>`;
    }

    for(let i=startPage; i<=endPage; i++){
        html += `<li class="page-item ${i===page ? 'active' : ''}">
                    <button class="page-link page-btn" data-page="${i}">${i}</button>
                </li>`;
    }

    if(page < totalPages){
        html += `<li class="page-item"><button class="page-link" id="nextPage">Next</button></li>`;
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
    if(status === '') return;

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
                    text: 'Order status has been updated successfully.'
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
});

// Initial load
$(document).ready(function(){ fetchOrders(); });
</script>
