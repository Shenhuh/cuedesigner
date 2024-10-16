<div class="d-flex justify-content-between align-items-start mt-4 m-3">
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#jointModal"><i class="bi bi-plus me-2 text-white"></i>Add Joint</button>
    <!-- <p class="d-sm-block d-none"><i class="bi bi-info-circle me-2"></i>joints are only applied for Butt Sleeve and Forearm</p> -->
</div>



<div class="container mt-4 mb-4" style="overflow-y: auto;">
    <div class="table-responsive">
        <table class="table table-modern table-hover" id="completed-orders">
            <thead>
                <tr>
                    <th scope="col">Joint ID#</th>
                    <th scope="col">Joint</th>
                    <th scope="col">Image</th>
                    <th scope="col">Price</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">#13424</th>
                    <td>3/8"-10</td>
                    <td><img src="{{ asset('/assets/welcome-bg.jpg') }}" width="90" height="90"></td>
       
                    <td>84$</td>
                </tr>
                <tr>
                    <th scope="row">#24343</th>
                    <td>McDermott Quick Release</td>
                    <td><img src="{{ asset('/assets/welcome-bg.jpg') }}" width="90" height="90"></td>
       
                    <td>30$</td>
                </tr>
                <tr>
                    <th scope="row">#34534</th>
                    <td>Radial</td>
                    <td><img src="{{ asset('/assets/welcome-bg.jpg') }}" width="90" height="90"></td>
       
                    <td>20$</td>
                </tr>
                <tr>
                    <th scope="row">#45453</th>
                    <td>Uni-Loc</td>
                    <td><img src="{{ asset('/assets/welcome-bg.jpg') }}" width="90" height="90"></td>

                    <td>10$</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>  




<div class="modal fade" id="jointModal" tabindex="-1" aria-labelledby="add-joint" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="add-joint">Add Joint</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <p><i class="bi bi-info-circle me-2"></i>Only <strong>PNG</strong> and <strong>JPG</strong> files are accepted, and the file size must not exceed <strong>2MB</strong>.</p>
        <div class="mb-3">
            <label for="formFile" class="form-label">Upload Image of Joint</label>
            <input class="form-control" type="file" id="formFile">
        </div>
        <div class="mb-3 mt-3">
            <label for="exampleFormControlInput1" class="form-label">Joint Name</label>
            <input type="text" class="form-control" id="exampleFormControlInput1">
        </div>
        <label for="joint-amount" class="form-label">Joint Amount</label>
        <div class="input-group mb-3">
            <span class="input-group-text bg-white"><i class="bi bi-currency-dollar"></i></span>
            <input id="joint-amount" type="number" class="form-control" aria-label="Amount (to the nearest dollar)">
            
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary">Add</button>
      </div>
    </div>
  </div>
</div>