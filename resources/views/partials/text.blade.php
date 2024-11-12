
<div class="modal fade" id="textsModal" tabindex="-1" aria-labelledby="add-texts" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="add-texts">Add Text</h5>
        <button type="button" id="text-modal-close" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
    
        
        <label for="font-style" class="form-label mt-3">Font Style:</label>
        <select class="form-control form-select" name="" id="font-style">
            <option value="Times New Roman">Times New Roman</option>
            <option value="inlay">Calibri</option>
        </select>

        <label for="font-size" class="form-label mt-3">Font Size:</label>
        <select class="form-control form-select" name="" id="font-size">
            <option value="8">8</option>
            <option value="12">12</option>
        </select>

        <label for="text-orientation" class="form-label mt-3">Text Orientation:</label>
        <select class="form-control form-select" name="" id="text-orientation">
            <option value="horizontal">Horizontal</option>
            <option value="vertical">vertical</option>
        </select>
        

        <label for="font-color" class="form-label mt-3">Font Color:</label>
        <input type="color" id="font-color" class="form-color form-control" />

        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
        <button type="button" id="add-text" class="btn btn-primary">Add</button>
      </div>
    </div>
  </div>
</div>