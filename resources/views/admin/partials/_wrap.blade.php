<div class="d-flex justify-content-between align-items-start mt-4 m-3">
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#wrapModal"><i class="bi bi-plus me-2 text-white"></i>Add Wrap</button>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#wrapMaterialModal"><i class="bi bi-plus me-2 text-white"></i>Add Material Type</button>   
    <!-- <p class="d-sm-block d-none"><i class="bi bi-info-circle me-2"></i>wraps are only applied for Butt Sleeve and Forearm</p> -->
</div>



<div class="container mt-4 mb-4" style="overflow-y: auto;">
    <div class="table-responsive">
        <table class="table table-modern table-hover" id="completed-orders">
            <thead>
                <tr>
                    <th scope="col">Wrap ID#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Image</th>
                    <th scope="col">Material Type</th>
                    <th scope="col">Price</th>
                </tr>
            </thead>
            <tbody>
                @if($wraps->isEmpty())
                    <p>No wrap found.</p>
                @else
                @foreach($wraps as $wrap)
                    <tr data-id="{{ $wrap->id }}" class="wrapData">
                        <td scope="row">{{ $wrap->id }}</td>
                        <td>{{ $wrap->name }}</td>
                        <td>
                            <img src="{{ asset('storage/' . $wrap->imagePath) }}" width="90" height="90" alt="{{ $wrap->name }}">
                        </td>
                        <td>{{ $wrap->material_type }}</td>
                        <td>${{ $wrap->price }}</td>
                    </tr>
                @endforeach

                @endif
            </tbody>
        </table>
    </div>
</div>  




<div class="modal fade" id="wrapMaterialModal" tabindex="-1" aria-labelledby="add-wrap" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="add-wrap">Add wrap</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h6>Current Materials</h6>
        <div class="table-responsive">
            <table class="table table-modern table-hover" id="completed-orders">
                <thead>
                    <tr>
                        <th scope="col">Wrap ID#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">#13424</th>
                        <td>John Doe</td>
                        <td>
                            <button class="btn btn-danger btn-sm">
                                <i class="bi bi-x text-white"></i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">#24343</th>
                        <td>Jane Smith</td>
                        <td>
                            <button class="btn btn-danger btn-sm">
                                <i class="bi bi-x text-white"></i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">#34534</th>
                        <td>Mark Johnson</td>
                        <td>
                            <button class="btn btn-danger btn-sm">
                                <i class="bi bi-x text-white"></i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">#45453</th>
                        <td>Emily Davis</td>
                        <td>
                            <button class="btn btn-danger btn-sm">
                                <i class="bi bi-x text-white"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="mb-3 mt-3">
            <label for="exampleFormControlInput1" class="form-label">Add New Material Type</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Material Name">
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary">Add</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="wrapModal" tabindex="-1" aria-labelledby="add-wrap" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="add-wrap">Add Wrap</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" id="wrap-modal-close" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <p><i class="bi bi-info-circle me-2"></i>Only <strong>PNG</strong> and <strong>JPG</strong> files are accepted, and the file size must not exceed <strong>2MB</strong>.</p>
        <div class="mb-3">
            <label for="formFile" class="form-label">Upload Image of Wrap</label>
            <input class="form-control wrap-image" type="file" id="formFile">
        </div>
        <div class="mb-3 mt-3">
            <label for="wrap-name" class="form-label">Wrap Name</label>
            <input type="text" class="form-control wrap-name" id="wrap-name">
        </div>
        <div class="mb-3 mt-3">
            <label for="material-type" class="form-label">Material Type</label>
            <input type="text" class="form-control wrap-type" id="material-type">
        </div>
        <label for="wrap-amount" class="form-label">Wrap Price</label>
        <div class="input-group mb-3">
            <span class="input-group-text bg-white"><i class="bi bi-currency-dollar"></i></span>
            <input id="wrap-amount" type="number" class="form-control wrap-amount" aria-label="Amount (to the nearest dollar)">
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" id="save-wrap">Add</button>
      </div>
    </div>
  </div>
</div>