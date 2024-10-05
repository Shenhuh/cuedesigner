@extends('layouts.app')

@section('content')
<div class="dashboard-container m-3"> <!-- Add top margin -->
    <div class="row g-4"> <!-- Row with gap between columns -->
        <div class="col-md-2"> <!-- Responsive column for 4 boxes (12 / 4 = 3) -->
            <div class="card box rounded-3 dashboard-top-card"> <!-- Card with rounded corners -->
                <div class="card-body">
                    <h6 class="card-title">
                        <i class="bi bi-brush me-2"></i> <!-- Add right margin to the icon -->
                        Total Designs
                    </h6>
                    <div class="d-flex flex-column text-center card-text mt-4">
                        <strong class="text-black" style="font-size: 16px;">1024</strong>
                        <span class="text-black" style="font-size: 12px;">Ready for Manufacturing</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2"> <!-- Responsive column -->
            <div class="card box rounded-3 dashboard-top-card"> <!-- Card with rounded corners -->
                <div class="card-body">
                    <h6 class="card-title">
                        <i class="bi bi-check-circle me-2"></i><!-- Add right margin to the icon -->
                        Completed & Delivered
                    </h6>
                    <div class="d-flex flex-column text-center card-text mt-4">
                        <strong class="text-black" style="font-size: 16px;">733</strong>
                        <span class="text-black" style="font-size: 12px;">Received and Paid by Customers</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2"> <!-- Responsive column -->
            <div class="card box rounded-3 dashboard-top-card"> <!-- Card with rounded corners -->
                <div class="card-body">
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
            <div class="card box rounded-3 dashboard-top-card"> <!-- Card with rounded corners -->
                <div class="card-body">
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
    </div>
</div>


@endsection
