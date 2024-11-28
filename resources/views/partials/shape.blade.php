
<div class="modal fade" id="shapeModal" tabindex="-1" aria-labelledby="upload" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="add-texts">Add Shape</h5>
        <button type="button" id="text-modal-close" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
    
         <label for="design" class="form-label">Select a shape:</label>
        <select class="form-select" id="selected-shape">
            
            @foreach ($shapes as $shape)
            <option value="{{ $shape->polygonData }}">{{ $shape->name }}</option>
            @endforeach
        </select>



        <div class="row mt-4">
            <div class="col">
                <label for="stroke-color" class="form-label">Stroke Color</label>
                <input type="color" class="form-control form-control-color" id="stroke-color" value="#CCCCCC">
            </div>
            <div class="col">
                <label for="fill-color" class="form-label">Fill Color</label>
                <input type="color" class="form-control form-control-color" id="fill-color" value="#CCCCCC">
            </div>
        </div>
        <div class="form-check mt-4">
            <input type="checkbox" class="form-check-input" id="transparent">
            <label for="transparent" class="form-check-label">Transparent Color</label>
        </div>
        <div class="row mt-4">
            <label for="stroke-width" class="form-label">Stroke Width</label>
            <input type="number" class="form-control" id="stroke-width" value="8">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
        <button id="add-shape" class="btn btn-primary">Add Shape</button>
      </div>
    </div>
  </div>
</div>