<!-- resources/views/dynamic-content.blade.php -->
<div class="container">
<div class="container mt-4">
    <div class="card box rounded-3 dashboard-top-card h-100 d-flex flex-column"> <!-- Card with rounded corners -->
        <div class="card-body d-flex flex-column">
            <div class="d-flex justify-content-between align-items-center"> <!-- Flex container for title and search -->
                <h6 class="card-title mb-0">
                    <i class="bi bi-cart-dash me-2"></i>
                    Ongoing Orders
                </h6>
              
            </div>
            <div class="table-responsive mt-3">
                <table class="table table-modern table-hover" id="orders">
                    <thead>
                        <tr>
                            <th scope="col">Order ID#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Status</th>
                            <th scope="col">ETC</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">#13424</th>
                            <td>John Doe</td>
                            <td><span class="badge rounded-pill bg-success">Ongoing</span></td>
                            <td>09/12/2024</td>
                        </tr>
                        <tr>
                            <th scope="row">#24343</th>
                            <td>Jane Smith</td>
                            <td><span class="badge rounded-pill bg-warning text-dark">Waiting for Materials</span></td>
                            <td>09/17/2024</td>
                        </tr>
                        <tr>
                            <th scope="row">#34534</th>
                            <td>Mark Johnson</td>
                            <td><span class="badge rounded-pill bg-primary">To be Processed</span></td>
                            <td>09/24/2024</td>
                        </tr>
                        <tr>
                            <th scope="row">#45453</th>
                            <td>Emily Davis</td>
                            <td><span class="badge rounded-pill bg-primary">To be Processed</span></td>
                            <td>10/05/2024</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

</div>
