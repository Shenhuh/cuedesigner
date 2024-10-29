<div class="d-flex justify-content-between align-items-start mt-4 m-3">
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#textureModal"><i class="bi bi-plus me-2 text-white"></i>Add Texture</button>
    <p class="d-sm-block d-none"><i class="bi bi-info-circle me-2"></i>Textures are only applied for Butt Sleeve and Forearm</p>
</div>



<div class="container mt-4 mb-4" style="overflow-y: auto;">
    <div class="table-responsive">
        <table class="table table-modern table-hover" id="completed-orders">
            <thead>
                <tr>
                    <th scope="col">ID#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Image</th>
                    <th scope="col">Design Type</th>
                    <th scope="col">Price</th>
                </tr>
            </thead>
            <tbody style="height:300px !important;">
                @if($textures->isEmpty())
                    <p>No textures found.</p>
                @else
                @foreach($textures as $texture)
                    <tr>
                        <td scope="row">{{ $texture->id }}</td>
                        <td>{{ $texture->name }}</td>
                        <td>
                            <img src="{{ asset('storage/' . $texture->imagePath) }}" width="90" height="90" alt="{{ $texture->name }}">
                        </td>
                        <td>{{ $texture->type }}</td>
                        <td>${{ $texture->price }}</td>
                    </tr>
                @endforeach

                @endif
            </tbody>
        </table>
    </div>
</div>  



<div class="modal fade" id="textureModal" tabindex="-1" aria-labelledby="add-texture" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="add-texture">Add Texture</h5>
        <button type="button" class="btn-close" id="texture-modal-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p><i class="bi bi-info-circle me-2"></i>Only <strong>PNG</strong> and <strong>JPG</strong> files are accepted, and the file size must not exceed <strong>2MB</strong>.</p>
        <div class="mb-3">
            <label for="texture-ing" class="form-label">Upload Image Texture</label>
            <input class="form-control texture-image" type="file">
        </div>
        <div class="mb-3">
            <label for="texture-name" class="form-label">Texture Name</label>
            <input type="text" class="form-control texture-name">
        </div>
        <div class="mb-3">
            <label for="texture-type" class="form-label">Texture Type</label>
            <select class="form-select texture-type" aria-label="Default select example">
                <option value="stain" selected>Stain</option>
                <option value="paint">Paint</option>
            </select>    
        </div>
        <label for="texture-amount" class="form-label">Texture Amount</label>
        <div class="input-group mb-3">
            <span class="input-group-text bg-white"><i class="bi bi-currency-dollar"></i></span>
            <input id="texture-amount" type="number" class="form-control texture-amount" aria-label="Amount (to the nearest dollar)">
            
        </div>
    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" id="save-texture">Add</button>
      </div>
    </div>
  </div>
</div>
