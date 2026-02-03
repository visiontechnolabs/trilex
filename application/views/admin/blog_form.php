<div class="page-wrapper">
    <div class="page-content">

        <!-- Breadcrumb -->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item">
                            <a href="dashboard.html">
                                <i class="bx bx-home-alt"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Add New Blog</li>
                    </ol>
                </nav>
            </div>
        </div>

        <!-- Blog Form Card -->
        <div class="card">
            <div class="card-body p-4">
                <h5 class="card-title">Add New Blog</h5>
                <hr>
                <div class="form-body mt-4">
                    <div class="row">
                        <div class="col">
                            <form id="BlogForm" method="post" enctype="multipart/form-data" novalidate>

                                <!-- Main Category -->
                                <div class="mb-3">
                                    <label for="blogCategory" class="form-label">Select Category</label>
                                    <select name="blog_category" class="form-control" id="blogCategory">
                                        <option value="">-- Select Category --</option>
                                    </select>
                                </div>

                                <!-- Blog Title -->
                                <div class="mb-3">
                                    <label for="blogTitle" class="form-label">Blog Title</label>
                                    <input type="text" name="blog_title" class="form-control" id="blogTitle"
                                           placeholder="Enter blog title" required>
                                    <div class="invalid-feedback">Please enter the blog title.</div>
                                </div>

                                <!-- Blog Content with CKEditor -->
                                <div class="mb-3">
                                    <label for="blogContent" class="form-label">Blog Content</label>
                                    <textarea name="blog_content" class="form-control" id="blogContent" rows="6"
                                              placeholder="Enter blog content"></textarea>
                                    <div class="invalid-feedback">Please enter the blog content.</div>
                                </div>

                               

                                <!-- Upload Blog Image -->
                                <div class="mb-3">
                                    <label for="blogImage" class="form-label">Upload Blog Image</label>
                                    <input type="file" name="blog_image" class="form-control" id="blogImage"
                                           accept="image/*" required>
                                    <div class="invalid-feedback">Please upload a blog image.</div>
                                </div>

                                <!-- Submit Button -->
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary w-100">Save Blog</button>
                                </div>
                            </form>
                        </div>
                    </div><!--end row-->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>

<script>
CKEDITOR.replace('blogContent');

$(document).ready(function () {
    // Load categories on page load
    loadCategories();

    function loadCategories() {
        $.ajax({
            url: "<?= base_url('admin/post/get_main_categories'); ?>",
            type: "GET",
            dataType: "json",
            success: function (res) {
                console.log('Categories response:', res);
                if (res.status && res.data && res.data.length > 0) {
                    let options = '<option value="">-- Select Category --</option>';
                    $.each(res.data, function (i, cat) {
                        options += `<option value="${cat.id}">${cat.title}</option>`;
                    });
                    $('#blogCategory').html(options);
                } else {
                    console.warn('No categories found or status is false');
                    $('#blogCategory').html('<option value="">No categories available</option>');
                }
            },
            error: function (xhr, status, error) {
                console.error('Error loading categories:', error);
                console.error('Response:', xhr.responseText);
                $('#blogCategory').html('<option value="">Error loading categories</option>');
            }
        });
    }

    $("#BlogForm").on("submit", function (e) {
        e.preventDefault();

        // Update CKEditor textarea
        for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].updateElement();
        }

        var form = $(this)[0];
        var formData = new FormData(form);

        $.ajax({
            url: "<?= base_url('admin/post/save_blog'); ?>",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            dataType: "json",
            beforeSend: function () {
                Swal.fire({
                    title: 'Please wait...',
                    text: 'Saving blog details',
                    allowOutsideClick: false,
                    didOpen: () => Swal.showLoading()
                });
            },
            success: function (res) {
                Swal.close();
                if (res.status) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: res.message || 'Blog saved successfully!',
                        showConfirmButton: false,
                        timer: 2000
                    }).then(() => {
                        window.location.href = "<?= base_url('admin/post/blog'); ?>";
                    });
                } else {
                    Swal.fire({ icon: 'error', title: 'Error', text: res.message || 'Something went wrong!' });
                }
            },
            error: function (xhr, status, error) {
                Swal.close();
                Swal.fire({ icon: 'error', title: 'Request Failed', text: 'Could not save blog. Please try again!' });
                console.error(error);
            }
        });
    });
});
</script>