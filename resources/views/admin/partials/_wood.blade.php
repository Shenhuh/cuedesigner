<div class="d-flex justify-content-between align-items-start mt-4 m-3">
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#woodModal"><i class="bi bi-plus me-2 text-white"></i>Add Wood</button>
    <!-- <p class="d-sm-block d-none"><i class="bi bi-info-circle me-2"></i>woods are only applied for Butt Sleeve and Forearm</p> -->
</div>



<div class="container mt-4 mb-4" style="overflow-y: auto;">
    <div class="table-responsive">
        <table class="table table-modern table-hover" id="woods">
            <thead>
                <tr>
                    <th scope="col">Wood ID#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Image</th>
                    <th scope="col">Price</th>
                </tr>
            </thead>
            <tbody>
                @if($woods->isEmpty())
                    <p>No wood found.</p>
                @else
                @foreach($woods as $wood)
                    <tr data-id="{{ $wood->id }}" class="woodData">
                        <td scope="row">{{ $wood->id }}</td>
                        <td>{{ $wood->name }}</td>
                        <td>
                            <img src="{{ asset('storage/' . $wood->imagePath) }}" width="90" height="90" alt="{{ $wood->name }}">
                        </td> 
                        <td>${{ $wood->price }}</td>
                    </tr>
                @endforeach

                @endif
            </tbody>
        </table>
    </div>
</div>  




<div class="modal fade" id="woodModal" tabindex="-1" aria-labelledby="add-wood" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="add-wood">Add Wood</h5>
        <button type="button" id="wood-modal-close" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <p><i class="bi bi-info-circle me-2"></i>Only <strong>PNG</strong> and <strong>JPG</strong> files are accepted, and the file size must not exceed <strong>2MB</strong>.</p>
      <div class="mb-3">
            <label for="wood-image" class="form-label">Upload Image of Wood</label>
            <input class="form-control wood-image" type="file" id="wood-image">
        </div>
        <div class="mb-3 mt-3">
            <label for="wood-name" class="form-label">Wood Name</label>
            <input type="text" class="form-control wood-name" id="wood-name">
        </div>
        <label for="wood-amount" class="form-label">Wood Amount</label>
        <div class="input-group mb-3">
            <span class="input-group-text bg-white"><i class="bi bi-currency-dollar"></i></span>
            <input id="wood-amount" type="number" class="form-control wood-amount" aria-label="Amount (to the nearest dollar)">
            
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" id="save-wood">Add</button>
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="editWoodModal" tabindex="-1" aria-labelledby="edit-wood" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title" id="edit-wood">Edit Wood #<span id="wood-id"></span></h5>

        <button type="button" class="btn-close" id="edit-wood-modal-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <input type="hidden" id="wood-id-hidden">
        <p><i class="bi bi-info-circle me-2"></i>Only <strong>PNG</strong> and <strong>JPG</strong> files are accepted, and the file size must not exceed <strong>2MB</strong>.</p>
        <div class="mb-3">
            <label for="edit-wood-image" class="form-label">Change Image Wood</label>
            <input id="edit-wood-image" class="form-control wood-image" type="file">
        </div>
        <div class="mb-3">
            <label for="edit-wood-name" class="form-label">Edit Wood Name</label>
            <input type="text" id="edit-wood-name" class="form-control wood-name">
        </div>
        <label for="edit-wood-amount" class="form-label">Edit Wood Amount</label>
        <div class="input-group mb-3">
            <span class="input-group-text bg-white"><i class="bi bi-currency-dollar"></i></span>
            <input id="edit-wood-amount" type="number" class="form-control wood-amount" aria-label="Amount (to the nearest dollar)">
            
        </div>
    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger" id="delete-wood" data-bs-dismiss="modal">Delete</button>
        <button type="button" class="btn btn-primary" id="update-wood">Update</button>
      </div>
    </div>
  </div>
</div>