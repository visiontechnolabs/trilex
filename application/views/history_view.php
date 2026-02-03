<div class="container mt-3">
    <h5 class="form-section-title">📋 Booking & Transaction History</h5>

    <div class="filter-section">
        <button class="filter-btn active" data-status="all">All</button>
        <button class="filter-btn" data-status="approved">Approved</button>
        <button class="filter-btn" data-status="rejected">Rejected</button>
        <button class="filter-btn" data-status="pending">Pending</button>
    </div>

    <div id="transactionList"></div>

    <div class="pagination-section mt-4 d-flex justify-content-center">
    <nav>
        <ul class="pagination mb-0" id="paginationList">
            <li class="page-item">
                <button id="prevPage" class="page-link">Prev</button>
            </li>
            <!-- Page buttons will be appended here dynamically -->
            <li class="page-item">
                <button id="nextPage" class="page-link">Next</button>
            </li>
        </ul>
    </nav>
</div>

</div>

<script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>

<script>
let currentPage = 1;
let currentFilter = 'all';
let totalOrders = 0;
let limit = 5;

function fetchOrders(page = 1, status = 'all') {
    $.ajax({
        url: "<?= base_url('home/fetch_orders'); ?>",
        type: "POST",
        data: { page: page, status: status },
        dataType: "json",
        success: function (res) {
            if (res.status === 'success') {
                totalOrders = res.total_orders;
                limit = res.limit;
                currentPage = res.current_page;
                currentFilter = status;

                let html = '';
                if (res.orders.length === 0) {
                    html = '<div class="alert alert-primary"> No transactions found.</div>';
                } else {
                    res.orders.forEach(order => {
                        let statusText = 'PENDING';
                        let statusClass = 'status-pending';
                        if (order.status == 0) { statusText = 'REJECTED'; statusClass = 'status-rejected'; }
                        else if (order.status == 1) { statusText = 'APPROVED'; statusClass = 'status-approved'; }

                        html += `
                        <div class="transaction-item">
                            <div class="transaction-header">
                                <div class="product-info">
                                    <div class="product-title">${order.product_title ?? 'Untitled Product'}</div>
                                    <div class="transaction-date">${order.created_on ? new Date(order.created_on).toLocaleDateString('en-US', { month:'long', day:'numeric', year:'numeric' }) : '-'}</div>
                                </div>
                                <div class="status-section">
                                    <span class="status-badge ${statusClass}">${statusText}</span>
                                </div>
                            </div>
                            <div class="transaction-details">
                                <div class="detail-item">
                                    <div class="detail-label">Price</div>
                                    <div class="detail-value price-value">₹${order.product_price ?? 0}</div>
                                </div>
                                <div class="detail-item">
                                    <div class="detail-label">Transaction ID</div>
                                    <div class="detail-value">${order.transaction_ref ?? '-'}</div>
                                </div>
                                <div class="detail-item">
                                    <div class="detail-label">Purchase Date</div>
                                    <div class="detail-value">${order.created_on ?? '-'}</div>
                                </div>
                            </div>
                        </div>`;
                    });
                }

                $('#transactionList').html(html);
                renderPagination();
            }
        }
    });
}

function renderPagination() {
    const totalPages = Math.ceil(totalOrders / limit);
    const maxButtons = 3;

    let startPage = Math.max(1, currentPage - 1);
    let endPage = Math.min(totalPages, startPage + maxButtons - 1);

    let pageHtml = '';

    for (let i = startPage; i <= endPage; i++) {
        pageHtml += `
            <li class="page-item ${i === currentPage ? 'active' : ''}">
                <button class="page-link page-btn" data-page="${i}">${i}</button>
            </li>
        `;
    }

    // Replace previous page buttons (remove old page numbers)
    $('#paginationList li.page-btn-li').remove();

    // Insert page buttons between Prev and Next
    $(pageHtml)
        .addClass('page-btn-li') // mark buttons so we can remove old ones next time
        .insertBefore($('#nextPage').parent()); // append before Next button

    $('#prevPage').prop('disabled', currentPage === 1);
    $('#nextPage').prop('disabled', currentPage === totalPages);
}

// Event listeners
$(document).on('click', '.page-btn', function () {
    const page = parseInt($(this).data('page'));
    fetchOrders(page, currentFilter);
});




$('#prevPage').click(function () {
    if (currentPage > 1) fetchOrders(currentPage - 1, currentFilter);
});

$('#nextPage').click(function () {
    const totalPages = Math.ceil(totalOrders / limit);
    if (currentPage < totalPages) fetchOrders(currentPage + 1, currentFilter);
});

$('.filter-btn').click(function () {
    $('.filter-btn').removeClass('active');
    $(this).addClass('active');
    const status = $(this).data('status');
    fetchOrders(1, status);
});

// Initial load
$(document).ready(function () {
    fetchOrders();
});
</script>