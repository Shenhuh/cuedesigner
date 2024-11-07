<div class="d-flex justify-content-between align-items-start mt-4 m-3">
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#jointModal"><i class="bi bi-plus me-2 text-white"></i>Add Joint</button>
    <!-- <p class="d-sm-block d-none"><i class="bi bi-info-circle me-2"></i>joints are only applied for Butt Sleeve and Forearm</p> -->
</div>



<div class="container mt-4 mb-4" style="overflow-y: auto;">
    <div class="table-responsive">
        <table class="table table-modern table-hover" id="joint">
            <thead>
                <tr>
                    <th scope="col">Joint ID#</th>
                    <th scope="col">Joint</th>
                    <th scope="col">Image</th>
                    <th scope="col">Price</th>
                </tr>
            </thead>
            <tbody>
                @if($joints->isEmpty())
                    <p>No joint found.</p>
                @else
                @foreach($joints as $joint)
                    <tr data-id="{{ $joint->id }}" class="jointData">
                        <td scope="row">{{ $joint->id }}</td>
                        <td>{{ $joint->name }}</td>
                        <td>
                            <img src="{{ asset('storage/' . $joint->imagePath) }}" width="90" height="90" alt="{{ $joint->name }}">
                        </td> 
                        <td>${{ $joint->price }}</td>
                    </tr>
                @endforeach

                @endif
            </tbody>
        </table>
    </div>
</div>  




<div class="modal fade" id="jointModal" tabindex="-1" aria-labelledby="add-joint" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="add-joint">Add Joint</h5>
        <button type="button" class="btn-close" id="joint-modal-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <p><i class="bi bi-info-circle me-2"></i>Only <strong>PNG</strong> and <strong>JPG</strong> files are accepted, and the file size must not exceed <strong>2MB</strong>.</p>
        <div class="mb-3">
            <label for="formFile" class="form-label">Upload Image of Joint</label>
            <input class="form-control joint-image" type="file" id="formFile">
        </div>
        <div class="mb-3 mt-3">
            <label for="joint-name" class="form-label">Joint Name</label>
            <input type="text" class="form-control joint-name" id="joint-name">
        </div>
        <label for="joint-amount" class="form-label">Joint Amount</label>
        <div class="input-group mb-3">
            <span class="input-group-text bg-white"><i class="bi bi-currency-dollar"></i></span>
            <input id="joint-amount" type="number" class="form-control joint-amount" aria-label="Amount (to the nearest dollar)">
            
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" id="save-joint">Add</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="editJointModal" tabindex="-1" aria-labelledby="edit-joint" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title" id="edit-joint">Edit Joint #<span id="joint-id"></span></h5>

        <button type="button" class="btn-close" id="edit-joint-modal-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <input type="hidden" id="joint-id-hidden">
        <p><i class="bi bi-info-circle me-2"></i>Only <strong>PNG</strong> and <strong>JPG</strong> files are accepted, and the file size must not exceed <strong>2MB</strong>.</p>
        <div class="mb-3">
            <label for="edit-joint-image" class="form-label">Change Image Joint</label>
            <input id="edit-joint-image" class="form-control joint-image" type="file">
        </div>
        <div class="mb-3">
            <label for="edit-joint-name" class="form-label">Edit Joint Name</label>
            <input type="text" id="edit-joint-name" class="form-control joint-name">
        </div>
        <label for="edit-joint-amount" class="form-label">Edit Joint Amount</label>
        <div class="input-group mb-3">
            <span class="input-group-text bg-white"><i class="bi bi-currency-dollar"></i></span>
            <input id="edit-joint-amount" type="number" class="form-control joint-amount" aria-label="Amount (to the nearest dollar)">
            
        </div>
    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger" id="delete-joint" data-bs-dismiss="modal">Delete</button>
        <button type="button" class="btn btn-primary" id="update-joint">Update</button>
      </div>
    </div>
  </div>
</div>