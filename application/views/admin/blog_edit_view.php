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
                        <li class="breadcrumb-item active" aria-current="page">Edit Blog Category</li>
                    </ol>
                </nav>
            </div>
        </div>

        <!-- Service Form Card --> 
        <div class="card">
            <div class="card-body p-4"> 
                <h5 class="card-title">Edit Blog Category</h5>
                <hr>

                <div class="form-body mt-4">
                    <form id="BlogForm" novalidate>

                        <!-- Hidden ID -->
                        <input type="hidden" name="blog_id" value="<?= $blog->id ?>">

                        <!-- Category -->
                        <div class="mb-3">
                            <label class="form-label">Blog Category</label>
                            <select name="category_id" class="form-control" required>
                                <option value="">Select Category</option>
                                <?php foreach ($categories as $cat): ?>
                                    <option value="<?= $cat->id ?>"
                                        <?= ($cat->id == $service->category_id) ? 'selected' : '' ?>>
                                        <?= $cat->title ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <!-- Service Title -->
                        <div class="mb-3">
                            <label class="form-label">Blog Title</label>
                            <input type="text"
                                   name="blog_title"
                                   class="form-control"
                                   value="<?= htmlspecialchars($blog->title) ?>"
                                   required>
                        </div>

                        <!-- Service Description -->
                        <div class="mb-3">
                            <label class="form-label">Blog Description</label>
                            <textarea name="blog_description"
                                      id="blogContent"
                                      class="form-control"
                                      rows="6"><?= htmlspecialchars($blog->description) ?></textarea>
                        </div>

                        <!-- Submit -->
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary w-100">
                                Update Blog Category
                            </button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>

<script>
    CKEDITOR.replace('blogContent');

    $(document).ready(function () {
        $("#BlogForm").on("submit", function (e) {
            e.preventDefault();

            // Sync CKEditor
            for (instance in CKEDITOR.instances) {
                CKEDITOR.instances[instance].updateElement();
            }

            let formData = new FormData(this);

            $.ajax({
                url: "<?= base_url('update_blog'); ?>",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                dataType: "json",
                beforeSend: function () {
                    Swal.fire({
                        title: 'Please wait...',
                        text: 'Updating blog',
                        allowOutsideClick: false,
                        didOpen: () => Swal.showLoading()
                    });
                },
                success: function (res) {
                    Swal.close();
                    if (res.status) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Updated!',
                            text: res.message,
                            timer: 2000,
                            showConfirmButton: false
                        }).then(() => {
                            window.location.href = "<?= base_url('all_service'); ?>";
                        });
                    } else {
                        Swal.fire('Error', res.message, 'error');
                    }
                },
                error: function () {
                    Swal.close();
                    Swal.fire('Error', 'Something went wrong!', 'error');
                }
            });
        });
    });
</script>
