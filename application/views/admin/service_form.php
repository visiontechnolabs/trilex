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
            <li class="breadcrumb-item active" aria-current="page">Add New Service</li>
          </ol>
        </nav>
      </div> 
    </div>

    <!-- Add Service Form Card -->
    <div class="card">
      <div class="card-body p-4">
        <h5 class="card-title">Add New Service</h5>
        <hr>
        <div class="form-body mt-4">
          <div class="row">
            <div class="col">
              <form id="serviceForm" method="post" enctype="multipart/form-data" novalidate>

                <!-- Main Category -->
                <div class="mb-3">
                  <label for="serviceCategory" class="form-label">Main Category</label>
                  <select name="main_category" id="serviceCategory" class="form-select" required>
                    <option value="">-- Select Main Category --</option>
                    <?php foreach ($categories as $cat): ?>
                      <option value="<?= $cat->id; ?>"><?= $cat->title; ?></option>
                    <?php endforeach; ?>
                  </select>
                  <div class="invalid-feedback">Please select a main category.</div>
                </div>

                <!-- Dynamic Subcategory (hidden initially) -->
                <div class="mb-3 d-none" id="subCategoryDiv">
                  <label for="subCategory" class="form-label">Sub Category</label>
                  <select name="subcategory_id" id="subCategory" class="form-select">
                    <option value="">-- Select Sub Category --</option>
                  </select>
                </div>

                <!-- Service Title -->
                <div class="mb-3">
                  <label for="serviceTitle" class="form-label">Service Title</label>
                  <input type="text" name="title" id="serviceTitle" class="form-control" placeholder="Enter service title" required>
                  <div class="invalid-feedback">Please enter the service title.</div>
                </div>

                <!-- Service Description -->
                <div class="mb-3">
                  <label for="serviceDescription" class="form-label">Service Description</label>
                  <textarea name="description" id="serviceDescription" class="form-control" rows="6" placeholder="Enter detailed description"></textarea>
                  <div class="invalid-feedback">Please enter a service description.</div>
                </div>

                <!-- Submit Button -->
                <div class="mb-3">
                  <button type="submit" class="btn btn-primary w-100">Save Service</button>
                </div>
              </form>
            </div>
          </div><!-- end row -->
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Include CKEditor -->
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>

<script>
$(document).ready(function () {
  CKEDITOR.replace('serviceDescription');

  // 🧭 Load subcategories dynamically
  $('#serviceCategory').on('change', function () {
    const parent_id = $(this).val();

    if (!parent_id) {
      $('#subCategoryDiv').addClass('d-none');
      return;
    }

    $.ajax({
      url: "<?= base_url('admin/service/get_subcategories'); ?>",
      type: "POST",
      data: { parent_id },
      success: function (response) {
        const res = JSON.parse(response);
        if (res.status && res.data.length > 0) {
          let options = '<option value="">-- Select Sub Category --</option>';
          $.each(res.data, function (i, cat) {
            options += `<option value="${cat.id}">${cat.title}</option>`;
          });
          $('#subCategory').html(options);
          $('#subCategoryDiv').removeClass('d-none');
        } else {
          $('#subCategoryDiv').addClass('d-none');
        }
      }
    });
  });

  // 💾 Handle Form Submission
  $('#serviceForm').on('submit', function (e) {
    e.preventDefault();
    const description = CKEDITOR.instances.serviceDescription.getData();

    if ($('#serviceCategory').val() === '' || $('#serviceTitle').val().trim() === '' || description.trim() === '') {
      Swal.fire('Error', 'Please fill all required fields.', 'error');
      return;
    }

    const formData = new FormData(this);
    formData.set('description', description);

   $.ajax({
  url: "<?= base_url('admin/service/save_service'); ?>",
  type: "POST",
  data: formData,
  processData: false,
  contentType: false,
  dataType: "json", // jQuery automatically parses JSON
  success: function (res) {
    if (res.status === true) {
      Swal.fire('Success', res.message, 'success');
      $('#serviceForm')[0].reset();
      $('#subCategoryDiv').addClass('d-none');
      CKEDITOR.instances.serviceDescription.setData('');
      
      // Redirect to services list after 1.5 seconds
      setTimeout(function() {
        window.location.href = "<?= base_url('all_service'); ?>";
      }, 1500);
    } else {
      Swal.fire('Error', res.message, 'error');
    }
  },
  error: function (xhr, status, error) {
    console.error("AJAX Error:", xhr.responseText);
    Swal.fire('Error', 'Something went wrong. Please try again.', 'error');
  }
});
});


});
</script>
