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
                        <li class="breadcrumb-item active" aria-current="page">Add New Post</li>
                    </ol>
                </nav>
            </div>
        </div>

        <!-- Post Form Card -->
        <div class="card">
            <div class="card-body p-4">
                <h5 class="card-title">Add New Post</h5>
                <hr>
                <div class="form-body mt-4">
                    <div class="row">
                        <div class="col">
                            <form id="PostForm" method="post" enctype="multipart/form-data" novalidate>

                                <!-- Post Title -->
                                <div class="mb-3">
                                    <label for="postTitle" class="form-label">Post Title</label>
                                    <input type="text" name="post_title" class="form-control" id="postTitle"
                                           placeholder="Enter post title" required>
                                    <div class="invalid-feedback">Please enter the post title.</div>
                                </div>

                                <!-- Post Description with CKEditor -->
                                <div class="mb-3">
                                    <label for="postDescription" class="form-label">Post Description</label>
                                    <textarea name="post_description" class="form-control" id="postDescription" rows="6"
                                              placeholder="Enter post description"></textarea>
                                    <div class="invalid-feedback">Please enter the post description.</div>
                                </div>

                                <!-- Post Price -->
                                <div class="mb-3">
                                    <label for="postPrice" class="form-label">Price</label>
                                    <input type="number" name="price" class="form-control" id="postPrice"
                                           placeholder="Enter price" required>
                                    <div class="invalid-feedback">Please enter the price.</div>
                                </div>

                                <!-- Upload File (Video or Image) -->
                                <div class="mb-3">
                                    <label for="postFile" class="form-label">Upload File (Video/Image)</label>
                                    <input type="file" name="post_file" class="form-control" id="postFile"
                                           accept="video/*,image/*" required>
                                    <div class="invalid-feedback">Please upload a video or image.</div>
                                </div>

                                <!-- Submit Button -->
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary w-100">Save Post</button>
                                </div>
                            </form>
                        </div>
                    </div><!--end row-->
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>

<script>
CKEDITOR.replace('postDescription');

$(document).ready(function () {
    $("#PostForm").on("submit", function (e) {
        e.preventDefault();

        // Update CKEditor textarea
        for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].updateElement();
        }

        var form = $(this)[0];
        var formData = new FormData(form);

        $.ajax({
            url: "<?= base_url('admin/post/save'); ?>",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            dataType: "json",
            beforeSend: function () {
                Swal.fire({
                    title: 'Please wait...',
                    text: 'Saving post details',
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
                        text: res.message || 'Post saved successfully!',
                        showConfirmButton: false,
                        timer: 2000
                    }).then(() => {
                        window.location.href = "<?= base_url('admin/post'); ?>";
                    });
                } else {
                    Swal.fire({ icon: 'error', title: 'Error', text: res.message || 'Something went wrong!' });
                }
            },
            error: function (xhr, status, error) {
                Swal.close();
                Swal.fire({ icon: 'error', title: 'Request Failed', text: 'Could not save post. Please try again!' });
                console.error(error);
            }
        });
    });
});
</script>
