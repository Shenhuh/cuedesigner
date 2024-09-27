@extends('layouts.app')
@section('content')
<style>
    #canvas1 {
        border: 1px solid black;
    }

    #renderer {
        border: 1px solid black;
        width: 100vh;
        height: 100vh;
        position: relative;
    }
    .canvas-container:nth-of-type(2) {
      display: none;
    }
    .texture-option img {
    border: 2px solid #ccc;
    padding: 5px;
    cursor: pointer;
    transition: transform 0.3s;
}

    .texture-option img:hover {
        transform: scale(1.05);
        border-color: #000;
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

    <div class="d-flex">

        <div class="bg-white" id="panel-tools" style="width: 25rem; ">
            <div class="container m-2">
                <div class="panel">

                    <label for="select-part" class="form-label">Select Part:</label>
                    <select class="form-select form-control" id="select-part">
                        <option value="butt-cap">Butt Cap</option>
                        <option value="butt-sleeve">Butt Sleeve</option>
                        <option>Butt Wrap</option>
                        <option>Forearm</option>
        
                    </select>
                </div>
                <div id="content-panel" class="bg-white mt-3">
                    <div id="butt-cap" class="content">
                        <!-- <h4>Wood Type</h4>
                        <label for="design" class="form-label">Choose Wood Type:</label>
                        <select class="form-select">
                            <option>Maple</option>
                            <option>Ebony</option>
                            <option>Rosewood</option>
                            <option>Cocobolo</option>
    
                        </select> -->
    
                        <h4>Butt Cap</h4>
                        <label for="design" class="form-label">Choose Design/Material:</label>
                        <select class="form-select">
                            <option>Black</option>
                            <option>White</option>
                            <option>Bone</option>
                            <option>Stainless Steel</option>
    
                        </select>
    
                        <label for="engrave-text" class="mt-3">Engrave Text</label>
                        <input type="text" name="" id="engrave-text" class="form-control" />

                        <button class="btn btn-primary mt-3 w-100">Add</button>
                    </div>
                    <div id="butt-sleeve" class="content" style="display: none;">
                        
                        <h4>Butt Sleeve</h4>
                      
    
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                   Material
                                </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <label for="design" class="form-label">Choose Design/Material:</label>
                                        <select id="butt-cap-material" class="form-control form-select mr-4">
                                            <option value="butt-cap-stain">Stain</option>
                                            <option value="butt-cap-paint">Paint</option>
                                        </select>
                                    </div>
                                    <div class="container mt-4">
                                        <div id="butt-cap-stain" class="row load-stain d-flex overflow-y-auto mt-4" style="height: 350px;">
                                            <!-- Image 1 -->
                                            <div class="col-4">
                                                <div class="texture-option">
                                                <img src="{{ asset('./images/welcome-bg.jpg') }}" alt="Stain 1" class="img-fluid stain" data-id="1">
                                                    <p class="text-center">Stain 1</p>
                                                </div>
                                            </div>
                                            <!-- Image 2 -->
                                            <div class="col-4">
                                                <div class="texture-option">
                                                    <img src="{{ asset('./images/welcome-bg.jpg') }}" alt="Stain 2" class="img-fluid" onclick="selectTexture('stain2')">
                                                    <p class="text-center">Stain 2</p>
                                                </div>
                                            </div>
                                            <!-- Image 3 -->
                                            <div class="col-4">
                                                <div class="texture-option">
                                                <img src="{{ asset('./images/welcome-bg.jpg') }}" alt="Stain 3" class="img-fluid" onclick="selectTexture('stain3')">
                                                    <p class="text-center">Stain 3</p>
                                                </div>
                                            </div>
                                            <!-- Image 4 -->
                                            <div class="col-4">
                                                <div class="texture-option">
                                                <img src="{{ asset('./images/welcome-bg.jpg') }}" alt="Paint 1" class="img-fluid" onclick="selectTexture('paint1')">
                                                    <p class="text-center">Paint 1</p>
                                                </div>
                                            </div>
                                            <!-- Image 5 -->
                                            <div class="col-4">
                                                <div class="texture-option">
                                                <img src="{{ asset('./images/welcome-bg.jpg') }}" alt="Paint 2" class="img-fluid" onclick="selectTexture('paint2')">
                                                    <p class="text-center">Paint 2</p>
                                                </div>
                                            </div>
                                            <!-- Image 6 -->
                                            <div class="col-4">
                                                <div class="texture-option">
                                                <img src="{{ asset('./images/welcome-bg.jpg') }}" alt="Paint 3" class="img-fluid" onclick="selectTexture('paint3')">
                                                    <p class="text-center">Paint 3</p>
                                                </div>
                                            </div>
                                            <!-- Image 7 -->
                                            <div class="col-4">
                                                <div class="texture-option">
                                                <img src="{{ asset('./images/welcome-bg.jpg') }}" alt="Custom 1" class="img-fluid" onclick="selectTexture('custom1')">
                                                    <p class="text-center">Custom 1</p>
                                                </div>
                                            </div>
                                            <!-- Image 8 -->
                                            <div class="col-4">
                                                <div class="texture-option">
                                                <img src="{{ asset('./images/welcome-bg.jpg') }}" alt="Custom 2" class="img-fluid" onclick="selectTexture('custom2')">
                                                    <p class="text-center">Custom 2</p>
                                                </div>
                                            </div>
                                            <!-- Image 9 -->
                                            <div class="col-4">
                                                <div class="texture-option">
                                                <img src="{{ asset('./images/welcome-bg.jpg') }}" alt="Custom 3" class="img-fluid" onclick="selectTexture('custom3')">
                                                    <p class="text-center">Custom 3</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="butt-cap-paint" class="row load-paint d-none overflow-y-auto mt-4" style="height: 350px;">
                                            <!-- Image 1 -->
                                            <div class="col-4">
                                                <div class="texture-option">
                                                <img src="{{ asset('./images/welcome-bg.jpg') }}" alt="Stain 1" class="img-fluid" onclick="selectTexture('stain1')">
                                                    <p class="text-center">Stain 1</p>
                                                </div>
                                            </div>
                                            <!-- Image 2 -->
                                            <div class="col-4">
                                                <div class="texture-option">
                                                    <img src="{{ asset('./images/welcome-bg.jpg') }}" alt="Stain 2" class="img-fluid" onclick="selectTexture('stain2')">
                                                    <p class="text-center">sdain 2</p>
                                                </div>
                                            </div>
                                            <!-- Image 3 -->
                                            <div class="col-4">
                                                <div class="texture-option">
                                                <img src="{{ asset('./images/welcome-bg.jpg') }}" alt="Stain 3" class="img-fluid" onclick="selectTexture('stain3')">
                                                    <p class="text-center">Stdin 3</p>
                                                </div>
                                            </div>
                                            <!-- Image 4 -->
                                            <div class="col-4">
                                                <div class="texture-option">
                                                <img src="{{ asset('./images/welcome-bg.jpg') }}" alt="Paint 1" class="img-fluid" onclick="selectTexture('paint1')">
                                                    <p class="text-center">Paint 1</p>
                                                </div>
                                            </div>
                                            <!-- Image 5 -->
                                            <div class="col-4">
                                                <div class="texture-option">
                                                <img src="{{ asset('./images/welcome-bg.jpg') }}" alt="Paint 2" class="img-fluid" onclick="selectTexture('paint2')">
                                                    <p class="text-center">Paint 2</p>
                                                </div>
                                            </div>
                                            <!-- Image 6 -->
                                            <div class="col-4">
                                                <div class="texture-option">
                                                <img src="{{ asset('./images/welcome-bg.jpg') }}" alt="Paint 3" class="img-fluid" onclick="selectTexture('paint3')">
                                                    <p class="text-center">Paint 3</p>
                                                </div>
                                            </div>
                                            <!-- Image 7 -->
                                            <div class="col-4">
                                                <div class="texture-option">
                                                <img src="{{ asset('./images/welcome-bg.jpg') }}" alt="Custom 1" class="img-fluid" onclick="selectTexture('custom1')">
                                                    <p class="text-center">Custom 1</p>
                                                </div>
                                            </div>
                                            <!-- Image 8 -->
                                            <div class="col-4">
                                                <div class="texture-option">
                                                <img src="{{ asset('./images/welcome-bg.jpg') }}" alt="Custom 2" class="img-fluid" onclick="selectTexture('custom2')">
                                                    <p class="text-center">Custom 2</p>
                                                </div>
                                            </div>
                                            <!-- Image 9 -->
                                            <div class="col-4">
                                                <div class="texture-option">
                                                <img src="{{ asset('./images/welcome-bg.jpg') }}" alt="Custom 3" class="img-fluid" onclick="selectTexture('custom3')">
                                                    <p class="text-center">Custom 3</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                           
                                </div>

                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Shapes
                                </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <label for="design" class="form-label">Select a shape:</label>
                                        <select class="form-select">
                                            <option>Rectangle</option>
                                            <option>Circle</option>
                                            <option>Heart</option>
                                            <option>Diamond</option>
                                        </select>



                                        <div class="row mt-4">
                                            <div class="col">
                                                <label for="stroke-color" class="form-label">Stroke Color</label>
                                                <input type="color" class="form-control form-control-color" id="stroke-color" value="#CCCCCC">
                                            </div>
                                            <div class="col">
                                                <label for="fill-color" class="form-label">Fill Color</label>
                                                <input type="color" class="form-control form-control-color" id="fill-color" value="#CCCCCC">
                                            </div>
                                        </div>
                    
                                        <label for="stroke-width" class="form-label">Stroke Width</label>
                                        <input type="number" class="form-control form-control" id="stroke-width" value="8">
                                        
                                        <button class="btn btn-primary mt-4 w-100">Add Shape</button>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Engravings
                                </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                        
                                    </div>
                                    <div class="container">
                                        <div id="butt-cap-stain" class="row load-stain d-flex overflow-y-auto" style="height: 350px;">
                                            <!-- Image 1 -->
                                            <div class="col-4">
                                                <div class="texture-option">
                                                <img src="{{ asset('./images/welcome-bg.jpg') }}" alt="Stain 1" class="img-fluid" onclick="selectTexture('stain1')">
                                                    <p class="text-center">Stain 1</p>
                                                </div>
                                            </div>
                                            <!-- Image 2 -->
                                            <div class="col-4">
                                                <div class="texture-option">
                                                    <img src="{{ asset('./images/welcome-bg.jpg') }}" alt="Stain 2" class="img-fluid" onclick="selectTexture('stain2')">
                                                    <p class="text-center">Stain 2</p>
                                                </div>
                                            </div>
                                            <!-- Image 3 -->
                                            <div class="col-4">
                                                <div class="texture-option">
                                                <img src="{{ asset('./images/welcome-bg.jpg') }}" alt="Stain 3" class="img-fluid" onclick="selectTexture('stain3')">
                                                    <p class="text-center">Stain 3</p>
                                                </div>
                                            </div>
                                            <!-- Image 4 -->
                                            <div class="col-4">
                                                <div class="texture-option">
                                                <img src="{{ asset('./images/welcome-bg.jpg') }}" alt="Paint 1" class="img-fluid" onclick="selectTexture('paint1')">
                                                    <p class="text-center">Paint 1</p>
                                                </div>
                                            </div>
                                            <!-- Image 5 -->
                                            <div class="col-4">
                                                <div class="texture-option">
                                                <img src="{{ asset('./images/welcome-bg.jpg') }}" alt="Paint 2" class="img-fluid" onclick="selectTexture('paint2')">
                                                    <p class="text-center">Paint 2</p>
                                                </div>
                                            </div>
                                            <!-- Image 6 -->
                                            <div class="col-4">
                                                <div class="texture-option">
                                                <img src="{{ asset('./images/welcome-bg.jpg') }}" alt="Paint 3" class="img-fluid" onclick="selectTexture('paint3')">
                                                    <p class="text-center">Paint 3</p>
                                                </div>
                                            </div>
                                            <!-- Image 7 -->
                                            <div class="col-4">
                                                <div class="texture-option">
                                                <img src="{{ asset('./images/welcome-bg.jpg') }}" alt="Custom 1" class="img-fluid" onclick="selectTexture('custom1')">
                                                    <p class="text-center">Custom 1</p>
                                                </div>
                                            </div>
                                            <!-- Image 8 -->
                                            <div class="col-4">
                                                <div class="texture-option">
                                                <img src="{{ asset('./images/welcome-bg.jpg') }}" alt="Custom 2" class="img-fluid" onclick="selectTexture('custom2')">
                                                    <p class="text-center">Custom 2</p>
                                                </div>
                                            </div>
                                            <!-- Image 9 -->
                                            <div class="col-4">
                                                <div class="texture-option">
                                                <img src="{{ asset('./images/welcome-bg.jpg') }}" alt="Custom 3" class="img-fluid" onclick="selectTexture('custom3')">
                                                    <p class="text-center">Custom 3</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="butt-cap-paint" class="row load-paint d-none overflow-y-auto mt-4" style="height: 350px;">
                                            <!-- Image 1 -->
                                            <div class="col-4">
                                                <div class="texture-option">
                                                <img src="{{ asset('./images/welcome-bg.jpg') }}" alt="Stain 1" class="img-fluid" onclick="selectTexture('stain1')">
                                                    <p class="text-center">Stain 1</p>
                                                </div>
                                            </div>
                                            <!-- Image 2 -->
                                            <div class="col-4">
                                                <div class="texture-option">
                                                    <img src="{{ asset('./images/welcome-bg.jpg') }}" alt="Stain 2" class="img-fluid" onclick="selectTexture('stain2')">
                                                    <p class="text-center">sdain 2</p>
                                                </div>
                                            </div>
                                            <!-- Image 3 -->
                                            <div class="col-4">
                                                <div class="texture-option">
                                                <img src="{{ asset('./images/welcome-bg.jpg') }}" alt="Stain 3" class="img-fluid" onclick="selectTexture('stain3')">
                                                    <p class="text-center">Stdin 3</p>
                                                </div>
                                            </div>
                                            <!-- Image 4 -->
                                            <div class="col-4">
                                                <div class="texture-option">
                                                <img src="{{ asset('./images/welcome-bg.jpg') }}" alt="Paint 1" class="img-fluid" onclick="selectTexture('paint1')">
                                                    <p class="text-center">Paint 1</p>
                                                </div>
                                            </div>
                                            <!-- Image 5 -->
                                            <div class="col-4">
                                                <div class="texture-option">
                                                <img src="{{ asset('./images/welcome-bg.jpg') }}" alt="Paint 2" class="img-fluid" onclick="selectTexture('paint2')">
                                                    <p class="text-center">Paint 2</p>
                                                </div>
                                            </div>
                                            <!-- Image 6 -->
                                            <div class="col-4">
                                                <div class="texture-option">
                                                <img src="{{ asset('./images/welcome-bg.jpg') }}" alt="Paint 3" class="img-fluid" onclick="selectTexture('paint3')">
                                                    <p class="text-center">Paint 3</p>
                                                </div>
                                            </div>
                                            <!-- Image 7 -->
                                            <div class="col-4">
                                                <div class="texture-option">
                                                <img src="{{ asset('./images/welcome-bg.jpg') }}" alt="Custom 1" class="img-fluid" onclick="selectTexture('custom1')">
                                                    <p class="text-center">Custom 1</p>
                                                </div>
                                            </div>
                                            <!-- Image 8 -->
                                            <div class="col-4">
                                                <div class="texture-option">
                                                <img src="{{ asset('./images/welcome-bg.jpg') }}" alt="Custom 2" class="img-fluid" onclick="selectTexture('custom2')">
                                                    <p class="text-center">Custom 2</p>
                                                </div>
                                            </div>
                                            <!-- Image 9 -->
                                            <div class="col-4">
                                                <div class="texture-option">
                                                <img src="{{ asset('./images/welcome-bg.jpg') }}" alt="Custom 3" class="img-fluid" onclick="selectTexture('custom3')">
                                                    <p class="text-center">Custom 3</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    Inlays
                                </button>
                                </h2>
                                <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    
                                    </div>
                                    <div class="container">
                                        <div id="butt-cap-stain" class="row load-stain d-flex overflow-y-auto" style="height: 350px;">
                                            <!-- Image 1 -->
                                            <div class="col-4">
                                                <div class="texture-option">
                                                <img src="{{ asset('./images/welcome-bg.jpg') }}" alt="Stain 1" class="img-fluid" onclick="selectTexture('stain1')">
                                                    <p class="text-center">Stain 1</p>
                                                </div>
                                            </div>
                                            <!-- Image 2 -->
                                            <div class="col-4">
                                                <div class="texture-option">
                                                    <img src="{{ asset('./images/welcome-bg.jpg') }}" alt="Stain 2" class="img-fluid" onclick="selectTexture('stain2')">
                                                    <p class="text-center">Stain 2</p>
                                                </div>
                                            </div>
                                            <!-- Image 3 -->
                                            <div class="col-4">
                                                <div class="texture-option">
                                                <img src="{{ asset('./images/welcome-bg.jpg') }}" alt="Stain 3" class="img-fluid" onclick="selectTexture('stain3')">
                                                    <p class="text-center">Stain 3</p>
                                                </div>
                                            </div>
                                            <!-- Image 4 -->
                                            <div class="col-4">
                                                <div class="texture-option">
                                                <img src="{{ asset('./images/welcome-bg.jpg') }}" alt="Paint 1" class="img-fluid" onclick="selectTexture('paint1')">
                                                    <p class="text-center">Paint 1</p>
                                                </div>
                                            </div>
                                            <!-- Image 5 -->
                                            <div class="col-4">
                                                <div class="texture-option">
                                                <img src="{{ asset('./images/welcome-bg.jpg') }}" alt="Paint 2" class="img-fluid" onclick="selectTexture('paint2')">
                                                    <p class="text-center">Paint 2</p>
                                                </div>
                                            </div>
                                            <!-- Image 6 -->
                                            <div class="col-4">
                                                <div class="texture-option">
                                                <img src="{{ asset('./images/welcome-bg.jpg') }}" alt="Paint 3" class="img-fluid" onclick="selectTexture('paint3')">
                                                    <p class="text-center">Paint 3</p>
                                                </div>
                                            </div>
                                            <!-- Image 7 -->
                                            <div class="col-4">
                                                <div class="texture-option">
                                                <img src="{{ asset('./images/welcome-bg.jpg') }}" alt="Custom 1" class="img-fluid" onclick="selectTexture('custom1')">
                                                    <p class="text-center">Custom 1</p>
                                                </div>
                                            </div>
                                            <!-- Image 8 -->
                                            <div class="col-4">
                                                <div class="texture-option">
                                                <img src="{{ asset('./images/welcome-bg.jpg') }}" alt="Custom 2" class="img-fluid" onclick="selectTexture('custom2')">
                                                    <p class="text-center">Custom 2</p>
                                                </div>
                                            </div>
                                            <!-- Image 9 -->
                                            <div class="col-4">
                                                <div class="texture-option">
                                                <img src="{{ asset('./images/welcome-bg.jpg') }}" alt="Custom 3" class="img-fluid" onclick="selectTexture('custom3')">
                                                    <p class="text-center">Custom 3</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="butt-cap-paint" class="row load-paint d-none overflow-y-auto mt-4" style="height: 350px;">
                                            <!-- Image 1 -->
                                            <div class="col-4">
                                                <div class="texture-option">
                                                <img src="{{ asset('./images/welcome-bg.jpg') }}" alt="Stain 1" class="img-fluid" onclick="selectTexture('stain1')">
                                                    <p class="text-center">Stain 1</p>
                                                </div>
                                            </div>
                                            <!-- Image 2 -->
                                            <div class="col-4">
                                                <div class="texture-option">
                                                    <img src="{{ asset('./images/welcome-bg.jpg') }}" alt="Stain 2" class="img-fluid" onclick="selectTexture('stain2')">
                                                    <p class="text-center">sdain 2</p>
                                                </div>
                                            </div>
                                            <!-- Image 3 -->
                                            <div class="col-4">
                                                <div class="texture-option">
                                                <img src="{{ asset('./images/welcome-bg.jpg') }}" alt="Stain 3" class="img-fluid" onclick="selectTexture('stain3')">
                                                    <p class="text-center">Stdin 3</p>
                                                </div>
                                            </div>
                                            <!-- Image 4 -->
                                            <div class="col-4">
                                                <div class="texture-option">
                                                <img src="{{ asset('./images/welcome-bg.jpg') }}" alt="Paint 1" class="img-fluid" onclick="selectTexture('paint1')">
                                                    <p class="text-center">Paint 1</p>
                                                </div>
                                            </div>
                                            <!-- Image 5 -->
                                            <div class="col-4">
                                                <div class="texture-option">
                                                <img src="{{ asset('./images/welcome-bg.jpg') }}" alt="Paint 2" class="img-fluid" onclick="selectTexture('paint2')">
                                                    <p class="text-center">Paint 2</p>
                                                </div>
                                            </div>
                                            <!-- Image 6 -->
                                            <div class="col-4">
                                                <div class="texture-option">
                                                <img src="{{ asset('./images/welcome-bg.jpg') }}" alt="Paint 3" class="img-fluid" onclick="selectTexture('paint3')">
                                                    <p class="text-center">Paint 3</p>
                                                </div>
                                            </div>
                                            <!-- Image 7 -->
                                            <div class="col-4">
                                                <div class="texture-option">
                                                <img src="{{ asset('./images/welcome-bg.jpg') }}" alt="Custom 1" class="img-fluid" onclick="selectTexture('custom1')">
                                                    <p class="text-center">Custom 1</p>
                                                </div>
                                            </div>
                                            <!-- Image 8 -->
                                            <div class="col-4">
                                                <div class="texture-option">
                                                <img src="{{ asset('./images/welcome-bg.jpg') }}" alt="Custom 2" class="img-fluid" onclick="selectTexture('custom2')">
                                                    <p class="text-center">Custom 2</p>
                                                </div>
                                            </div>
                                            <!-- Image 9 -->
                                            <div class="col-4">
                                                <div class="texture-option">
                                                <img src="{{ asset('./images/welcome-bg.jpg') }}" alt="Custom 3" class="img-fluid" onclick="selectTexture('custom3')">
                                                    <p class="text-center">Custom 3</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                    Add Text
                                </button>
                                </h2>
                                <div id="collapseSix" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <input type="text" name="" id="add-text" class="form-control">
                                        <label for="select-font-style" class="form-label mt-3">Font Style:</label>
                                        <select class="form-control form-select" name="" id="select-font-style">
                                            <option value="engraved">Comic Sans</option>
                                            <option value="inlay">Calibri</option>
                                        </select>

                                        <label for="select-font-size" class="form-label mt-3">Font Size:</label>
                                        <select class="form-control form-select" name="" id="select-font-Size">
                                            <option value="engraved">8</option>
                                            <option value="inlay">12</option>
                                        </select>
                                        

                                        <label for="select-font-color" class="form-label mt-3">Font Color:</label>
                                        <input type="color" class="form-color form-control" />
                                        <button class="btn btn-primary mt-3 w-100">Add</button>
                                    </div>
                                   
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    Upload a clipart
                                </button>
                                </h2>
                                <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <input type="file" name="" id="upload-clipart" class="form-control">
                                        <label for="select-clipart-type" class="form-label mt-3">Select Type of design:</label>
                                        <select class="form-control form-select" name="" id="select-clipart-type">
                                            <option value="engraved">Engraved</option>
                                            <option value="inlay">Inlay</option>
                                        </select>
                                        <button class="btn btn-primary mt-3 w-100">Add</button>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>






                    </div>
                    <div id="shapes" class="content" style="display: none;">Content for Tab 3</div>
                </div>
            </div>
        </div>
      
        <div class="bg-light" style="flex-grow: 1; overflow-y: auto; height: 100vh; overflow-x:hidden;">
            <canvas id="canvas1" class="border" height="4096" width="447"></canvas>
        </div>


        <div class="bg-light" style="flex-grow: 1; overflow-y: auto; height: 100vh; overflow-x:hidden;">
            <div id="renderer" class="border"></div>
        </div>

    </div>

</div>


<canvas id="canvas2" height="4096" width="4096" style="display:none;"></canvas>

@endsection
