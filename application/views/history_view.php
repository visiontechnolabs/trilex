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
            data: {
                page: page,
                status: status
            },
            dataType: "json",
            success: function(res) {
                if (res.status === 'success') {

                    totalOrders = res.total_orders;
                    limit = res.limit;
                    currentPage = res.current_page;
                    currentFilter = status;

                    let html = '';

                    if (res.orders.length === 0) {
                        html = '<div class="alert alert-primary">No transactions found.</div>';
                    } else {
                        res.orders.forEach(order => {

                            let statusText = '⏳PENDING';
                            let statusClass = 'status-pending';

                            if (order.status == 0) {
                                statusText = '❌REJECTED';
                                statusClass = 'status-rejected';
                            } else if (order.status == 1) {
                                statusText = '✔️APPROVED';
                                statusClass = 'status-approved';
                            }

                            html += `
                        <div class="transaction-item">
                            <div class="transaction-header">
                                <div class="product-info">
                                    <div class="product-title">
                                        ${order.product_title ?? 'Untitled Product'}
                                    </div>
                                    <div class="transaction-date">
                                        ${order.created_on 
                                            ? new Date(order.created_on)
                                                .toLocaleDateString('en-US', 
                                                { month:'long', day:'numeric', year:'numeric' }) 
                                            : '-'}
                                    </div>
                                </div>
                                <div class="status-section">
                                    <span class="status-badge ${statusClass}">
                                        ${statusText}
                                    </span>
                                </div>
                            </div>

                            <div class="transaction-details">
                                <div class="detail-item">
                                    <div class="detail-label">Price</div>
                                    <div class="detail-value price-value">
                                        ₹${order.product_price ?? 0}
                                    </div>
                                </div>

                                <div class="detail-item">
                                    <div class="detail-label">Transaction ID</div>
                                    <div class="detail-value">
                                        ${order.transaction_ref ?? '-'}
                                    </div>
                                </div>

                                <div class="detail-item">
                                    <div class="detail-label">Purchase Date</div>
                                    <div class="detail-value">
                                        ${order.created_on ?? '-'}
                                    </div>
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

    /* ========== CLEAN CONSISTENT PAGINATION ========== */

    function renderPagination() {
        const totalPages = Math.ceil(totalOrders / limit);
        let html = '';

        if (totalPages > 1) {

            // « Previous
            html += `
        <li class="page-item ${currentPage <= 1 ? 'disabled' : ''}">
            <button class="page-link" data-page="${currentPage - 1}">&laquo;</button>
        </li>`;

            // Page numbers
            for (let i = 1; i <= totalPages; i++) {
                html += `
            <li class="page-item ${i === currentPage ? 'active' : ''}">
                <button class="page-link" data-page="${i}">${i}</button>
            </li>`;
            }

            // Next »
            html += `
        <li class="page-item ${currentPage >= totalPages ? 'disabled' : ''}">
            <button class="page-link" data-page="${currentPage + 1}">&raquo;</button>
        </li>`;
        }

        $('#paginationList').html(html);
    }

    /* ========== SINGLE CLICK HANDLER FOR ALL PAGINATION ========== */

    $(document).on('click', '#paginationList .page-link', function(e) {
        e.preventDefault();
        let page = parseInt($(this).data('page'));
        if (!page) return;
        fetchOrders(page, currentFilter);
    });

    /* ========== FILTER BUTTONS ========== */

    $('.filter-btn').click(function() {
        $('.filter-btn').removeClass('active');
        $(this).addClass('active');

        const status = $(this).data('status');
        fetchOrders(1, status);
    });

    /* ========== INITIAL LOAD ========== */

    $(document).ready(function() {
        fetchOrders();
    });
</script>