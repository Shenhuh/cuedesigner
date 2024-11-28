
<div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="upload" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="add-texts">Upload Image </h5>
        <button type="button" id="text-modal-close" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
    
        
        <input type="file" id="upload-clipart" class="form-control" accept=".png, .jpg, .jpeg">
        <label for="select-clipart-type" class="form-label mt-3">Select Type of design:</label>
        <select class="form-control form-select" name="" id="select-clipart-type">
            <option value="engraved">Engraved</option>
            <option value="inlay">Inlay</option>
        </select>


        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
        <button class="btn btn-primary" id="upload-image">Upload</button>
      </div>
    </div>
  </div>
</div>