
<!-- resources/views/dynamic-content.blade.php -->

<div class="container mt-5 bg-white mt-5 rounded-3 shadow">
    <ul class="designer-settings-tab nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" 
        role="tab" aria-controls="home" aria-selected="true">Textures</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" 
        role="tab" aria-controls="profile" aria-selected="false">Clip Arts</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" 
        role="tab" aria-controls="contact" aria-selected="false">Wrap</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" 
        role="tab" aria-controls="contact" aria-selected="false">Wood</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" 
        role="tab" aria-controls="contact" aria-selected="false">Joints</button>
    </li>
    </ul>

    <div class="tab-content overflow-auto" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            @include('admin.partials._texture')
        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            @include('admin.partials._cliparts')
        </div>
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
            @include('admin.partials._wrap')
        </div>
    </div>
</div>


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="add-texture" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="add-texture">Add Texture</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p><i class="bi bi-info-circle me-2"></i>Only <strong>PNG</strong> and <strong>JPG</strong> files are accepted, and the file size must not exceed <strong>2MB</strong>.</p>
        <div class="mb-3">
            <label for="formFile" class="form-label">Upload Image Texture</label>
            <input class="form-control" type="file" id="formFile">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Texture Name</label>
            <input type="text" class="form-control" id="exampleFormControlInput1">
        </div>
 
        <label for="texture-amount" class="form-label">Texture Amount</label>
        <div class="input-group mb-3">
            <span class="input-group-text bg-white"><i class="bi bi-currency-dollar"></i></span>
            <input id="texture-amount" type="number" class="form-control" aria-label="Amount (to the nearest dollar)">
            
        </div>
    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary">Add</button>
      </div>
    </div>
  </div>
</div>