@extends('layouts.app')
@section('content')
<style>
    #canvas1 {
        border: 1px solid black;
    }

    #renderer {
        border: 1px solid black;
        width: 1024px;
        height: 1024px;
        position: relative;
    }
    .canvas-container:nth-of-type(2) {
      display: none;
    }

 
</style>

<div class="d-flex" style="height: 100vh;">

    <div class="d-flex flex-column flex-shrink-0 bg-light" style="width: 4.5rem;">
        <a href="/" class="d-block p-3 link-dark text-decoration-none" title="Icon-only" data-bs-toggle="tooltip" data-bs-placement="right">
            <svg class="bi" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
            <span class="visually-hidden">Icon-only</span>
        </a>
        <ul class="nav nav-pills nav-flush flex-column mb-auto text-center">
            <li class="nav-item">
                <a href="#" class="nav-link active py-3 border-bottom side-tools" id="textures-button" aria-current="page" title="Home" data-bs-toggle="tooltip" data-bs-placement="right">
                <i class="bi bi-card-image"></i>
                </a>
            </li>
            <li>
                <a href="#" class="nav-link py-3 border-bottom side-tools" title="Dashboard" data-bs-toggle="tooltip" data-bs-placement="right">
                    <svg class="bi" width="24" height="24" role="img" aria-label="Dashboard"><use xlink:href="#speedometer2"/></svg>
                </a>
            </li>
            <li>
                <a href="#" class="nav-link py-3 border-bottom side-tools" title="Orders" data-bs-toggle="tooltip" data-bs-placement="right">
                    <svg class="bi" width="24" height="24" role="img" aria-label="Orders"><use xlink:href="#table"/></svg>
                </a>
            </li>
            <li>
                <a href="#" class="nav-link py-3 border-bottom side-tools" title="Products" data-bs-toggle="tooltip" data-bs-placement="right">
                    <svg class="bi" width="24" height="24" role="img" aria-label="Products"><use xlink:href="#grid"/></svg>
                </a>
            </li>
            <li>
                <a href="#" class="nav-link py-3 border-bottom side-tools" title="Customers" data-bs-toggle="tooltip" data-bs-placement="right">
                    <svg class="bi" width="24" height="24" role="img" aria-label="Customers"><use xlink:href="#people-circle"/></svg>
                </a>
            </li>
        </ul>
        <div class="dropdown border-top">
            <a href="#" class="d-flex align-items-center justify-content-center p-3 link-dark text-decoration-none dropdown-toggle" id="dropdownUser3" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="https://github.com/mdo.png" alt="mdo" width="24" height="24" class="rounded-circle">
            </a>
            <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser3">
                <li><a class="dropdown-item" href="#">New project...</a></li>
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Sign out</a></li>
            </ul>
        </div>  
        </div>
    <div class="d-flex" style="height: 100vh;">

        <div class="bg-light" id="panel-tools" style="width: 20rem; height: 100vh;">
            <h2 class="p-3">Panel Title</h2>
            <p class="p-3">Content goes here...</p>
        </div>
      
    <div class="bg-light" style="flex-grow: 1; overflow-y: auto; height: 100vh; overflow-x:hidden;">
        <canvas id="canvas1" class="border" height="4096" width="447"></canvas>
    </div>
    <div class="bg-light" style="flex-grow: 1; overflow-y: auto; height: 100vh; overflow-x:hidden;">

    <div id="renderer" class="border">
            <!-- Your canvas/renderer here -->
        </div>
    </div>

</div>

</div>


<canvas id="canvas2" height="4096" width="4096" style="display:none;"></canvas>

@endsection
