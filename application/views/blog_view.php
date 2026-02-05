<div id="blogs" class="page active">

    <!-- HERO -->
    <section class="hero-section">
        <div class="container text-center blog-hero">
            <h1 class="display-4 fw-bold">Our Blogs</h1>
            <p class="lead">Read insights, guides, and updates from our experts</p>
        </div>
    </section>

    <div class="container py-5" style="max-width:1050px;">

        <!-- CATEGORY FILTER -->
        <div class="category-filter">
            <h4><i class="fas fa-filter me-2"></i>Filter by Category</h4>

            <div class="category-scroll">
                <button class="category-btn active" data-id="all">All Blogs</button>
                <?php foreach ($categories as $cat): ?>
                    <button class="category-btn" data-id="<?= $cat->id; ?>">
                        <?= htmlspecialchars($cat->title); ?>
                    </button>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- SEARCH BAR -->
        <div class="search-wrapper mb-4">
            <div class="search-box">
                <input type="text" id="searchInput" placeholder="Search blogs by title or content..."
                    class="search-input">

                <button id="searchBtn" class="search-btn">
                    <i class="fas fa-search"></i>
                </button>

                <div id="searchLoader" class="search-loader" style="display:none;">
                    <i class="fas fa-spinner fa-spin"></i>
                </div>
            </div>
        </div>

        <!-- BLOG LIST (AJAX ONLY – SINGLE SOURCE) -->
        <div class="row" id="blogContainer"></div>

        <!-- PAGINATION CONTROLS -->
        <div id="paginationWrapper" class="text-center my-5 w-100">
            <div class="pagination-container">
                <button id="prevBtn" class="page-btn" disabled>&laquo;</button>

                <div id="pageNumbers" class="page-numbers"></div>

                <button id="nextBtn" class="page-btn">&raquo;</button>
            </div>
        </div>

    </div>
</div>

<!-- ================= CSS (REQUIRED) ================= -->
<style>
    :root {
        --primary-color: #1C768F;
        --primary-dark: #155868;
    }

    #paginationWrapper {
        display: none;
    }

    .pagination-container {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 10px;
        width: 100%;
    }

    .page-numbers {
        display: flex;
        gap: 8px;
    }

    .page-num {
        padding: 8px 14px;
        border-radius: 8px;
        border: 1.8px solid #6c7cff;
        background: #ffffff;
        color: #6c7cff;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .page-num.active {
        background: #1C768F;
        color: #fff;
        border-color: #1C768F;
    }

    .page-num:hover {
        background: #1C768F;
        color: #fff;
    }

    .page-btn {
        padding: 8px 18px;
        border-radius: 10px;
        border: 2px solid #6c7cff;
        background: #ffffff;
        color: #6c7cff;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .page-btn:hover {
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
        color: #fff;
    }

    .page-btn:disabled {
        opacity: 0.5;
        cursor: not-allowed;
    }

    @media(max-width:576px) {
        .page-num {
            padding: 6px 10px;
            font-size: 0.9rem;
        }
    }

    /* ================= HERO SECTION ================= */
    .blog-hero {
        text-align: center;
        padding: 3rem 1rem;
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
        color: #fff;
        border-radius: 16px;
        margin-bottom: 1rem;
    }

    .blog-hero h1 {
        font-size: 2.5rem;
        margin-bottom: 0.5rem;
    }

    .blog-hero p {
        color: #cbd5f5;
    }

    /* Blog Card Layout */
    .product-card {
        height: 100%;
        display: flex;
        flex-direction: column;
        border-radius: 16px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
    }

    .card-body {
        display: flex;
        flex-direction: column;
        height: 100%;
    }

    /* Image */
    .product-image {
        width: 100%;
        height: 220px;
        object-fit: cover;
        object-position: center;
        border-top-left-radius: 16px;
        border-top-right-radius: 16px;
    }

    /* Title */
    .card-title {
        min-height: 56px;
    }

    .card-text {
        font-size: 0.95rem;
        line-height: 1.6;
        color: #666;

        display: -webkit-box;
        -webkit-line-clamp: 4;
        -webkit-box-orient: vertical;
        overflow: hidden;

        margin-bottom: 20px;
    }

    /* Button at Bottom */
    .card-body .btn {
        margin-top: auto;
    }

    /* No results */
    .no-results {
        padding: 60px 0;
        color: #777;
    }

    /* ================= SEARCH BAR ================= */
    /* ========== MODERN SEARCH BAR ========== */
    .search-wrapper {
        display: flex;
        justify-content: center;
        width: 100%;
    }

    .search-box {
        position: relative;
        width: 100%;
        max-width: 650px;
        display: flex;
        align-items: center;
        background: #fff;
        border-radius: 50px;
        border: 2px solid #6c7cff;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
        padding: 6px;
    }

    .search-input {
        width: 100%;
        border: none;
        outline: none;
        padding: 12px 20px;
        font-size: 1rem;
        border-radius: 50px;
    }

    .search-input:focus {
        outline: none;
    }

    .search-btn {
        width: 48px;
        height: 48px;
        border-radius: 50%;
        border: none;
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: 0.3s ease;
    }

    .search-btn:hover {
        transform: scale(1.05);
    }

    .search-loader {
        position: absolute;
        right: 70px;
        color: #6c7cff;
    }

    /* ================= CATEGORY FILTER UI ================= */

    .category-filter {
        background: #ffffff;
        padding: 25px 30px;
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        margin-bottom: 50px;
    }

    .category-filter h4 {
        font-weight: 600;
        margin-bottom: 20px;
        color: #222;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .category-buttons {
        display: flex;
        flex-wrap: wrap;
        gap: 14px;
    }

    /* Button */
    .category-btn {
        padding: 10px 26px;
        border-radius: 30px;
        border: 2px solid var(--primary-color);
        background: #ffffff;
        color: var(--primary-color);
        font-weight: 500;
        text-decoration: none;
        transition: all 0.3s ease;
        font-size: 0.95rem;
    }

    /* Hover */
    .category-btn:hover {
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
        color: #ffffff;
        box-shadow: 0 6px 15px rgba(28, 118, 143, 0.35);
        transform: translateY(-2px);
    }

    /* Active */
    .category-btn.active {
        background: linear-gradient(135deg, #6366f1, #8b5cf6);
        color: #ffffff;
        box-shadow: 0 6px 18px rgba(108, 124, 255, 0.45);
    }

    /* ================= CATEGORY SCROLL BAR ================= */

    .category-scroll {
        display: flex;
        gap: 14px;
        overflow-x: auto;
        padding-bottom: 10px;
        scrollbar-width: thin;
    }

    .category-scroll::-webkit-scrollbar {
        height: 6px;
    }

    .category-scroll::-webkit-scrollbar-thumb {
        background: #6c7cff;
        border-radius: 10px;
    }

    .category-btn {
        white-space: nowrap;
        padding: 10px 26px;
        border-radius: 30px;
        border: 2px solid #6c7cff;
        background: #fff;
        color: #6c7cff;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .category-btn:hover,
    .category-btn.active {
        background: #1C768F;
        color: #fff;
        box-shadow: 0 6px 15px rgba(108, 124, 255, 0.35);
    }

    /* ================= NO BLOG MESSAGE ================= */

    .no-blog-box {
        text-align: center;
        padding: 80px 20px;
        background: #f9fafc;
        border-radius: 16px;
        border: 1px dashed #d0d5ff;
        color: #555;
    }

    .no-blog-box i {
        font-size: 3rem;
        color: #6c7cff;
        margin-bottom: 15px;
    }

    .no-blog-box h4 {
        font-weight: 600;
        margin-bottom: 8px;
    }

    .no-blog-box p {
        font-size: 0.95rem;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const buttons = document.querySelectorAll('.category-btn');
        const blogContainer = document.getElementById('blogContainer');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');

        let currentPage = 1;
        let selectedCategory = "all";
        let searchQuery = "";
        let totalPages = 1;
        let searchTimeout;
        let serverSearch = "";

        // Function to perform search with debouncing
        function performSearch() {
            searchQuery = searchInput.value.trim().toLowerCase();
            currentPage = 1;

            document.getElementById('searchLoader').style.display = 'block';

            // Load blogs first
            loadBlogs(currentPage, selectedCategory, searchQuery);
        }

        // Debounced search function
        function debouncedSearch() {
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(performSearch, 500); // 500ms delay
        }

        function loadBlogs(page = 1, category = "all", search = "") {
            blogContainer.innerHTML =
                '<div class="col-12 text-center py-5">' +
                '<i class="fas fa-spinner fa-spin fa-2x"></i>' +
                '<p>Loading blogs...</p></div>';

            // Show search loader if this is a search operation
            const searchLoader = document.getElementById('searchLoader');
            if (search.trim() !== "") {
                searchLoader.style.display = 'block';
            }

            fetch("<?= base_url('blog/fetchBlogs'); ?>", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/x-www-form-urlencoded"
                    },

                    body: "category_id=" + encodeURIComponent(category) +
                        "&page=" + page +
                        "&search=" + encodeURIComponent(serverSearch)
                })
                .then(res => res.text())
                .then(html => {

                    let tempDiv = document.createElement("div");
                    tempDiv.innerHTML = html;

                    // 👉 EXACT MATCH to your controller output
                    let blogs = Array.from(tempDiv.querySelectorAll(".col-lg-4.col-md-6"));

                    let query = searchQuery.toLowerCase().trim();

                    // If user typed something
                    if (query.length > 0) {

                        let startsWith = [];
                        let contains = [];

                        blogs.forEach(blog => {

                            let titleEl = blog.querySelector("h5"); // your actual title tag

                            if (!titleEl) return;

                            let title = titleEl.innerText.toLowerCase();

                            if (title.startsWith(query)) {
                                startsWith.push(blog);
                            } else if (title.includes(query)) {
                                contains.push(blog);
                            }
                        });

                        blogContainer.innerHTML = "";

                        // 👉 REAL "No blogs found" CONDITION
                        if (startsWith.length === 0 && contains.length === 0) {

                            blogContainer.innerHTML = `
            <div class="col-12">
                <div class="no-blog-box">
                    <i class="fas fa-search"></i>
                    <h4>No blogs found</h4>
                    <p>No blogs match "<strong>${query}</strong>"</p>
                </div>
            </div>
            `;

                        } else {
                            // Show results in correct priority
                            startsWith.forEach(b => blogContainer.appendChild(b));
                            contains.forEach(b => blogContainer.appendChild(b));
                        }

                    }
                    // 👉 If search box is empty → show normal results
                    else {
                        blogContainer.innerHTML = html;
                    }

                    const paginationInfo = document.getElementById('paginationInfo');
                    if (paginationInfo) {
                        totalPages = parseInt(paginationInfo.dataset.total) || 1;
                        currentPage = parseInt(paginationInfo.dataset.current) || 1;
                    }

                    updatePaginationControls();
                    searchLoader.style.display = 'none';
                })
                .catch(err => {
                    blogContainer.innerHTML =
                        '<div class="col-12 text-center text-danger py-5">Error loading blogs</div>';
                    searchLoader.style.display = 'none';
                    console.error(err);
                });
        }

        function updatePaginationControls() {
            const paginationWrapper = document.getElementById('paginationWrapper');
            const pageNumbersDiv = document.getElementById('pageNumbers');

            // Show / hide wrapper
            if (totalPages <= 1) {
                paginationWrapper.style.display = 'none';
                return;
            } else {
                paginationWrapper.style.display = 'flex';
            }

            // Enable / disable prev-next
            prevBtn.disabled = (currentPage <= 1);
            nextBtn.disabled = (currentPage >= totalPages);

            // Clear old numbers
            pageNumbersDiv.innerHTML = "";

            // Create page numbers
            for (let i = 1; i <= totalPages; i++) {
                let btn = document.createElement("button");
                btn.className = "page-num";
                btn.innerText = i;

                if (i === currentPage) {
                    btn.classList.add("active");
                }

                btn.addEventListener("click", function() {
                    currentPage = i;
                    loadBlogs(currentPage, selectedCategory, searchQuery);
                    window.scrollTo({
                        top: 0,
                        behavior: "smooth"
                    }); // nice UX
                });

                pageNumbersDiv.appendChild(btn);
            }
        }

        // Category click
        buttons.forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();

                buttons.forEach(b => b.classList.remove('active'));
                this.classList.add('active');

                selectedCategory = this.dataset.id;
                currentPage = 1;

                loadBlogs(currentPage, selectedCategory, searchQuery);
            });
        });

        // Next button
        nextBtn.addEventListener('click', function() {
            if (currentPage < totalPages) {
                currentPage++;
                loadBlogs(currentPage, selectedCategory, searchQuery);
                window.scrollTo({
                    top: 0,
                    behavior: "smooth"
                });
            }
        });

        // Previous button
        prevBtn.addEventListener('click', function() {
            if (currentPage > 1) {
                currentPage--;
                loadBlogs(currentPage, selectedCategory, searchQuery);
                window.scrollTo({
                    top: 0,
                    behavior: "smooth"
                });
            }
        });

        // Search functionality
        const searchInput = document.getElementById('searchInput');
        const searchBtn = document.getElementById('searchBtn');

        // Dynamic search on input (with debouncing)
        searchInput.addEventListener('input', debouncedSearch);

        // Search button click (immediate search)
        searchBtn.addEventListener('click', function() {
            clearTimeout(searchTimeout); // Cancel any pending debounced search
            performSearch();
        });

        // Enter key press (immediate search)
        searchInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                clearTimeout(searchTimeout); // Cancel any pending debounced search
                performSearch();
            }
        });

        // Auto load blogs
        loadBlogs(currentPage, "all", searchQuery);
    });
</script>