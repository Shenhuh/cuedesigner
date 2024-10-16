<div class="d-flex justify-content-between align-items-start mt-4 m-3">
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#woodModal"><i class="bi bi-plus me-2 text-white"></i>Add Wood</button>
    <!-- <p class="d-sm-block d-none"><i class="bi bi-info-circle me-2"></i>woods are only applied for Butt Sleeve and Forearm</p> -->
</div>



<div class="container mt-4 mb-4" style="overflow-y: auto;">
    <div class="table-responsive">
        <table class="table table-modern table-hover" id="completed-orders">
            <thead>
                <tr>
                    <th scope="col">Wood ID#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Image</th>
                    <th scope="col">Price</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">#13424</th>
                    <td>John Doe</td>
                    <td><img src="{{ asset('/assets/welcome-bg.jpg') }}" width="90" height="90"></td>
       
                    <td>84$</td>
                </tr>
                <tr>
                    <th scope="row">#24343</th>
                    <td>Jane Smith</td>
                    <td><img src="{{ asset('/assets/welcome-bg.jpg') }}" width="90" height="90"></td>
       
                    <td>30$</td>
                </tr>
                <tr>
                    <th scope="row">#34534</th>
                    <td>Mark Johnson</td>
                    <td><img src="{{ asset('/assets/welcome-bg.jpg') }}" width="90" height="90"></td>
       
                    <td>20$</td>
                </tr>
                <tr>
                    <th scope="row">#45453</th>
                    <td>Emily Davis</td>
                    <td><img src="{{ asset('/assets/welcome-bg.jpg') }}" width="90" height="90"></td>

                    <td>10$</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>  




<div class="modal fade" id="woodModal" tabindex="-1" aria-labelledby="add-wood" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="add-wood">Add Wood</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <p><i class="bi bi-info-circle me-2"></i>Only <strong>PNG</strong> and <strong>JPG</strong> files are accepted, and the file size must not exceed <strong>2MB</strong>.</p>
      <div class="mb-3">
            <label for="formFile" class="form-label">Upload Image of Wood</label>
            <input class="form-control" type="file" id="formFile">
        </div>
        <div class="mb-3 mt-3">
            <label for="exampleFormControlInput1" class="form-label">Wood Name</label>
            <input type="text" class="form-control" id="exampleFormControlInput1">
        </div>
        <label for="wood-amount" class="form-label">Wood Amount</label>
        <div class="input-group mb-3">
            <span class="input-group-text bg-white"><i class="bi bi-currency-dollar"></i></span>
            <input id="wood-amount" type="number" class="form-control" aria-label="Amount (to the nearest dollar)">
            
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary">Add</button>
      </div>
    </div>
  </div>
</div>