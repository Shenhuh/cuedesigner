<div class="d-flex justify-content-between align-items-start mt-4 m-3">
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#clipartsModal"><i class="bi bi-plus me-2 text-white"></i>Add Clipart</button>
    <!-- <p class="d-sm-block d-none"><i class="bi bi-info-circle me-2"></i>clipartss are only applied for Butt Sleeve and Forearm</p> -->
</div>



<div class="container mt-4 mb-4" style="overflow-y: auto;">
    <div class="table-responsive">
        <table class="table table-modern table-hover" id="completed-orders">
            <thead>
                <tr>
                    <th scope="col">Clipart ID#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Image</th>
                    <th scope="col">Design Type</th>
                    <th scope="col">Price</th>
                </tr>
            </thead>
            <tbody>
                @if($cliparts->isEmpty())
                    <p>No cliparts found.</p>
                @else
                @foreach($cliparts as $clipart)
                    <tr data-id="{{ $clipart->id }}" class="clipartData">
                        <td scope="row">{{ $clipart->id }}</td>
                        <td>{{ $clipart->name }}</td>
                        <td>
                            <img src="{{ asset('storage/' . $clipart->imagePath) }}" width="90" height="90" alt="{{ $clipart->name }}">
                        </td>
                        <td>{{ $clipart->type }}</td>
                        <td>${{ $clipart->price }}</td>
                    </tr>
                @endforeach

                @endif
            </tbody>
        </table>
    </div>
</div>  



<div class="modal fade" id="clipartsModal" tabindex="-1" aria-labelledby="add-cliparts" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="add-cliparts">Add Clipart</h5>
        <button type="button" id="clipart-modal-close" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <p><i class="bi bi-info-circle me-2"></i>Only <strong>PNG</strong> and <strong>JPG</strong> files are accepted, and the file size must not exceed <strong>2MB</strong>.</p>
        <div class="mb-3">
            <label for="clipart-file" class="form-label">Upload Image of Clipart</label>
            <input class="form-control clipart-image" type="file" id="clipart-file">
        </div>
        <div class="mb-3 mt-3">
            <label for="clipart-name" class="form-label">Clipart Name</label>
            <input type="text" class="form-control clipart-name" id="clipart-name">
        </div>
        <div class="mb-3">
            <label for="clipart-select" class="form-label">Designt Type</label>
            <select class="form-select clipart-type" id="clipart-select" aria-label="Default select example">
                <option selected>Engraving</option>
                <option value="1">Inlay</option>
            </select>    
        </div>
        <label for="clipart-amount" class="form-label">Clipart Price</label>
        <div class="input-group mb-3">
            <span class="input-group-text bg-white"><i class="bi bi-currency-dollar"></i></span>
            <input id="clipart-amount" type="number" class="form-control clipart-amount" aria-label="Amount (to the nearest dollar)">
            
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
        <button type="button" id="save-clipart" class="btn btn-primary">Add</button>
      </div>
    </div>
  </div>
</div>