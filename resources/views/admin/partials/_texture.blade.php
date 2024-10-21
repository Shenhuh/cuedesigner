<div class="d-flex justify-content-between align-items-start mt-4 m-3">
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-plus me-2 text-white"></i>Add Texture</button>
    <p class="d-sm-block d-none"><i class="bi bi-info-circle me-2"></i>Textures are only applied for Butt Sleeve and Forearm</p>
</div>



<div class="container mt-4 mb-4" style="overflow-y: auto;">
    <div class="table-responsive">
        <table class="table table-modern table-hover" id="completed-orders">
            <thead>
                <tr>
                    <th scope="col">Texture ID#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Image</th>
                    <th scope="col">Design Type</th>
                    <th scope="col">Price</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">#13424</th>
                    <td>John Doe</td>
                    <td><img src="{{ asset('/assets/welcome-bg.jpg') }}" width="90" height="90"></td>
                    <td>Engraved</td>
                    <td>84$</td>
                </tr>
                <tr>
                    <th scope="row">#24343</th>
                    <td>Jane Smith</td>
                    <td><img src="{{ asset('/assets/welcome-bg.jpg') }}" width="90" height="90"></td>
                    <td>Engraved</td>
                    <td>30$</td>
                </tr>
                <tr>
                    <th scope="row">#34534</th>
                    <td>Mark Johnson</td>
                    <td><img src="{{ asset('/assets/welcome-bg.jpg') }}" width="90" height="90"></td>
                    <td>Engraved</td>
                    <td>20$</td>
                </tr>
                <tr>
                    <th scope="row">#45453</th>
                    <td>Emily Davis</td>
                    <td><img src="{{ asset('/assets/welcome-bg.jpg') }}" width="90" height="90"></td>
                    <td>Stain</td>
                    <td>10$</td>
                </tr>
            </tbody>
        </table>
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
