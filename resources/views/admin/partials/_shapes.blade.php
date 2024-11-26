<div class="d-flex justify-content-between align-items-start mt-4 m-3">
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#shapeModal"><i class="bi bi-plus me-2 text-white"></i>Add Shape</button>
    <!-- <p class="d-sm-block d-none"><i class="bi bi-info-circle me-2"></i>shapes are only applied for Butt Sleeve and Forearm</p> -->
</div>



<div class="container mt-4 mb-4" style="overflow-y: auto;">
    <div class="table-responsive">
        <table class="table table-modern table-hover" id="shapesTable">
            <thead>
                <tr>
                    <th scope="col">Shape ID#</th>
                    <th scope="col">Shape</th>
                    <th scope="col">Polygon Data</th>
                    <th scope="col">Price</th>
                </tr>
            </thead>
            <tbody>
                @if($shapes->isEmpty())
                    <p>No shape found.</p>
                @else
                @foreach($shapes as $shape)
                    <tr data-id="{{ $shape->id }}" class="shapeData">
                        <td scope="row">{{ $shape->id }}</td>
                        <td>{{ $shape->name }}</td>
                        <td>
                        {{ $shape->polygonData }}
                        </td> 
                        <td>${{ $shape->price }}</td>
                    </tr>
                @endforeach

                @endif
            </tbody>
        </table>
    </div>
</div>  




<div class="modal fade" id="shapeModal" tabindex="-1" aria-labelledby="add-shape" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="add-shape">Add Shape</h5>
        <button type="button" class="btn-close" id="shape-modal-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <p><i class="bi bi-info-circle me-2"></i>Polygon Data is the x and y coordinates to form the shape.</p>
        <div class="mb-3 mt-3">
            <label for="shape-name" class="form-label">Shape Name</label>
            <input type="text" class="form-control shape-name" id="shape-name">
        </div>
        <div class="mb-3 mt-3">
            <label for="shape-data" class="form-label">Polygon Data</label>
            <input type="text" class="form-control shape-data" id="shape-data">
        
      </div>
      <label for="shape-amount" class="form-label">Shape Amount</label>
        <div class="input-group mb-3">
            <span class="input-group-text bg-white"><i class="bi bi-currency-dollar"></i></span>
            <input id="shape-amount" type="number" class="form-control shape-amount" aria-label="Amount (to the nearest dollar)">
            
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" id="save-shape">Add</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="editShapeccModal" tabindex="-1" aria-labelledby="edit-shape" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title" id="edit-shape">Edit Shape #<span id="shape-id"></span></h5>

        <button type="button" class="btn-close" id="edit-shape-modal-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <input type="hidden" id="shape-id-hidden">
        <p><i class="bi bi-info-circle me-2"></i>Only <strong>PNG</strong> and <strong>JPG</strong> files are accepted, and the file size must not exceed <strong>2MB</strong>.</p>
        <div class="mb-3">
            <label for="edit-shape-image" class="form-label">Change Image Shape</label>
            <input id="edit-shape-image" class="form-control shape-image" type="file">
        </div>
        <div class="mb-3">
            <label for="edit-shape-name" class="form-label">Edit Shape Name</label>
            <input type="text" id="edit-shape-name" class="form-control shape-name">
        </div>
        <label for="edit-shape-amount" class="form-label">Edit Shape Amount</label>
        <div class="input-group mb-3">
            <span class="input-group-text bg-white"><i class="bi bi-currency-dollar"></i></span>
            <input id="edit-shape-amount" type="number" class="form-control shape-amount" aria-label="Amount (to the nearest dollar)">
            
        </div>
    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger" id="delete-shape" data-bs-dismiss="modal">Delete</button>
        <button type="button" class="btn btn-primary" id="update-shape">Update</button>
      </div>
    </div>
  </div>
</div>