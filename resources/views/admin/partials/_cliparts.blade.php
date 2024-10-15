<div class="d-flex justify-content-between align-items-start mt-4 m-3">
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-plus me-2 text-white"></i>Add Clipart</button>
    <!-- <p class="d-sm-block d-none"><i class="bi bi-info-circle me-2"></i>Textures are only applied for Butt Sleeve and Forearm</p> -->
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