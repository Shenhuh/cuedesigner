@extends('layouts.app')

@section('content')
<div class="container" style="">
    <div class="dashboard-container m-3"> 
        <div class="row g-4">
            <div class="col-md-2">
                <div class="card box rounded-3 dashboard-top-card h-100 d-flex flex-column">
                    <div class="card-body d-flex flex-column">
                        <h6 class="card-title">
                            <i class="bi bi-brush me-2"></i> Total Designs
                        </h6>
                        <div class="d-flex flex-column text-center card-text mt-auto">
                            <strong class="text-black" style="font-size: 16px;">1024</strong>
                            <span class="text-black" style="font-size: 12px;">Ready for Manufacturing</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2"> <!-- Responsive column -->
                <div class="card box rounded-3 dashboard-top-card h-100 d-flex flex-column"> <!-- Card with rounded corners -->
                    <div class="card-body d-flex flex-column">
                        <h6 class="card-title">
                            <i class="bi bi-check-circle me-2"></i><!-- Add right margin to the icon -->
                            Completed
                        </h6>
                        <div class="d-flex flex-column text-center card-text mt-4">
                            <strong class="text-black" style="font-size: 16px;">733</strong>
                            <span class="text-black" style="font-size: 12px;">Received and Paid by Customers</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2"> <!-- Responsive column -->
                <div class="card box rounded-3 dashboard-top-card h-100 d-flex flex-column"> <!-- Card with rounded corners -->
                    <div class="card-body d-flex flex-column">
                        <h6 class="card-title">
                            <i class="bi bi-clock-history me-2"></i>
                            Ongoing
                        </h6>
                        <div class="d-flex flex-column text-center card-text mt-4">
                            <strong class="text-black" style="font-size: 16px;">103</strong>
                            <span class="text-black" style="font-size: 12px;">Being Manufactured</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2"> <!-- Responsive column -->
                <div class="card box rounded-3 dashboard-top-card h-100 d-flex flex-column"> <!-- Card with rounded corners -->
                    <div class="card-body d-flex flex-column">
                        <h6 class="card-title">
                            <i class="bi bi-archive me-2"></i>
                            Drafted
                        </h6>
                        <div class="d-flex flex-column text-center card-text mt-4">
                            <strong class="text-black" style="font-size: 16px;">52</strong>
                            <span class="text-black" style="font-size: 12px;">Saved Designs</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4"> <!-- Responsive column -->
                <div class="card box rounded-3 dashboard-top-card h-100 d-flex flex-column"> <!-- Card with rounded corners -->
                    <div class="card-body d-flex flex-column">
                        <h6 class="card-title">
                            <i class="bi bi-calendar2-check me-2"></i>
                            Recently Completed
                        </h6>
                        <div class="d-flex flex-column text-center card-text mt-4">
                            <strong class="text-black" style="font-size: 16px;">#79237</strong>
                            <span class="text-black" style="font-size: 12px;">Ordered by: <strong>John Doe</strong></span>
                            <span class="text-black" style="font-size: 12px;">Completed: 09/09/2024 11:24PM PST</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>     
    </div>
    
    <div class="container mt-4">
        <div class="card box rounded-3 dashboard-top-card h-100 d-flex flex-column"> <!-- Card with rounded corners -->
            <div class="card-body d-flex flex-column">
                <h6 class="card-title">
                <i class="bi bi-cart-dash me-2"></i>
                    Ongoing Orders
                </h6>
                <div class="table-responsive">
                    <table class="table table-modern table-hover">
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
                        <tr> <!-- Removed the extra <td> and corrected the <th> placement -->
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
    
    <div class="container">
        <div class="row">
            <div class="col-md-8"> <!-- Main dashboard section -->
                <div class="dashboard-container mt-4"> 
                    <div class="row g-4">           
                        <div class="col-md-6"> <!-- Responsive column -->
                            <div class="card box rounded-3 dashboard-top-card h-100 d-flex flex-column"> <!-- Card with rounded corners -->
                                <div class="card-body d-flex flex-column">
                                    <h6 class="card-title">
                                        <i class="bi bi-stoplights me-2"></i>
                                        Traffic
                                    </h6>
                                    <div class="d-flex flex-column text-center card-text mt-4">
                                        <strong class="text-black" style="font-size: 16px;">79237</strong>
                                        <span class="text-black" style="font-size: 12px;">Visitors Peak</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6"> <!-- Responsive column -->
                            <div class="card box rounded-3 dashboard-top-card h-100 d-flex flex-column"> <!-- Card with rounded corners -->
                                <div class="card-body d-flex flex-column">
                                    <h6 class="card-title">
                                        <i class="bi bi-eye me-2"></i>
                                        Current Visitors
                                    </h6>
                                    <div class="d-flex flex-column text-center card-text mt-4">
                                        <strong class="text-black" style="font-size: 16px;">37</strong>
                                        <span class="text-black" style="font-size: 12px;">Visitors currently designing</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12"> <!-- Responsive column -->
                            <div class="card box rounded-3 dashboard-top-card h-100 d-flex flex-column"> <!-- Card with rounded corners -->
                                <div class="card-body d-flex flex-column">
                                    <div class="d-flex justify-content-between align-items-center"> <!-- Flexbox for title and button -->
                                        <h6 class="card-title mb-0"> <!-- Remove bottom margin from title -->
                                            <i class="bi bi-megaphone me-2"></i>
                                            Add Announcement
                                        </h6>
                                        <button class="btn btn-primary ms-2">Announce</button> <!-- Button at the same level -->
                                    </div>
                                    <div class="d-flex flex-column text-center card-text mt-4">
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 2rem;"></textarea>
                                            <label for="floatingTextarea2">Write here</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>     
                </div>
            </div>
            <div class="col-md-4 mt-4"> <!-- Side card section -->
                <div class="card box rounded-3 dashboard-top-card h-100 d-flex flex-column"> <!-- Card with rounded corners -->
                    <div class="card-body d-flex flex-column">
                        <h6 class="card-title">
                            <i class="bi bi-graph-down me-2"></i>
                            Traffic Graph
                        </h6>
                        <div class="d-flex flex-column text-center card-text mt-4">
                            <canvas id="myChart" width="400" height="200"></canvas>
                            <span class="text-black" style="font-size: 12px;">Visitors currently designing</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
</div>
@endsection
