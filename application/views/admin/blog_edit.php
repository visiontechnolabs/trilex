<div class="page-wrapper">
    <div class="page-content">

        <!-- Breadcrumb -->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item">
                            <a href="<?= base_url('admin/dashboard'); ?>">
                                <i class="bx bx-home-alt"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Blog</li>
                    </ol>
                </nav>
            </div>
        </div>

        <!-- Blog Form Card -->
        <div class="card">
            <div class="card-body p-4">
                <h5 class="card-title">Edit Blog</h5>
                <hr>
                <div class="form-body mt-4">
                    <div class="row">
                        <div class="col">
                            <form id="BlogForm" method="post" enctype="multipart/form-data" novalidate>

                                <!-- Hidden Fields -->
                                <input type="hidden" name="blog_id" value="<?= $blog_edit->id ?>">
                                <input type="hidden" name="old_file" value="<?= $blog_edit->file_path ?>">

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
                                        value="<?= htmlspecialchars($blog_edit->title) ?>"
                                        placeholder="Enter blog title" required>
                                    <div class="invalid-feedback">Please enter the blog title.</div>
                                </div>

                                <!-- Blog Content with CKEditor -->
                                <div class="mb-3">
                                    <label for="blogContent" class="form-label">Blog Content</label>
                                    <textarea name="blog_content" class="form-control" id="blogContent" rows="6">
                                         <?= htmlspecialchars($blog_edit->description) ?>
                                    </textarea>
                                    <div class="invalid-feedback">Please enter the blog content.</div>
                                </div>



                                <!-- Upload Blog Image -->
                                <?php if (!empty($blog_edit->file_path)): ?>
                                    <div class="mb-3">
                                        <label class="form-label">Current File</label><br>
                                        <?php if (preg_match('/\.(mp4|avi|mov|mkv)$/i', $blog_edit->file_path)): ?>
                                            <video width="250" controls>
                                                <source src="<?= base_url($blog_edit->file_path) ?>">
                                            </video>
                                        <?php else: ?>
                                            <img src="<?= base_url($blog_edit->file_path) ?>" width="150" class="rounded">
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>

                                <!-- Upload New File -->
                                <div class="mb-3">
                                    <label class="form-label">Change File (Optional)</label>
                                    <input type="file" name="blog_image" class="form-control" accept="image/*">

                                </div>

                                <!-- Submit Button -->
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary w-100">Update Blog</button>
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
                    if (res.status && res.data.length > 0) {
                        let options = '<option value="">-- Select Category --</option>';
                        $.each(res.data, function (i, cat) {
                            options += `<option value="${cat.id}">${cat.title}</option>`;
                        });
                        $('#blogCategory').html(options);
                        
                        // If blog has a category, select it
                        let currentCategoryId = <?= isset($blog_edit->category_id) ? $blog_edit->category_id : 'null' ?>;
                        if (currentCategoryId) {
                            $('#blogCategory').val(currentCategoryId);
                        }
                    }
                },
                error: function (xhr, status, error) {
                    console.error('Error loading categories:', error);
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
                            window.location.href = "<?= base_url('blogs'); ?>";
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