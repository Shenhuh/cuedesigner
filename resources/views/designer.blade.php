@extends('layouts.designer')
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
    .clipart-option img {
    border: 2px solid #ccc;
    padding: 5px;
    cursor: pointer;
    transition: transform 0.3s;
}

    .clipart-option img:hover {
        transform: scale(1.05);
        border-color: #000;
    }
    .selected {
        border: 3px solid #007bff !important; /* Blue border when selected */
    }
 
</style>

<div class="d-flex" style="height: 100vh;">

    @include('partials.sidebar')

    <div class="d-flex">

        <div class="bg-white side-panel" id="panel-tools" style="width: 25rem;">
            <div class="container m-2">
                <div class="panel">

                    <label for="select-part" class="form-label">Select Part:</label>
                    <select class="form-select form-control" id="select-part">
                        <option value="butt-cap">Butt Cap</option>
                        <option value="butt-sleeve">Butt Sleeve</option>
                        <option value="butt-wrap">Butt Wrap</option>
                        <option value="forearm">Forearm</option>
                        <option value="joint-collar">Joint Collar</option>
        
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
                        <select class="form-select" id="butt-cap-material">
                            <option value="black">Black</option>
                            <option value="white">White</option>
                            <option value="bone">Bone</option>
                            <option value="stainless">Stainless Steel</option>
    
                        </select>
    

                     

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
                                        <select id="butt-sleeve-material" class="form-control form-select mr-4">
                                            <option value="butt-sleeve-stain">Stain</option>
                                            <option value="butt-sleeve-paint">Paint</option>
                                        </select>
                                    </div>

                                <div class="container mt-4">
                                    <!-- Include the Stain Partial -->
                                    @include('partials.stain', ['textures' => $textures])

                                    <!-- Include the Paint Partial -->
                                    @include('partials.paint', ['textures' => $textures])
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
                                        @include('partials.engravings', ['cliparts' => $cliparts])                                    
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
                                    @include('partials.inlays', ['cliparts' => $cliparts])      
                                    </div>
                                </div>
                            </div>
                        

    
                        </div>






                    </div>
                    <div id="shapes" class="content" style="display: none;">Content for Tab 3</div>
                </div>
            </div>
        </div>


        <div class="bg-white side-panel" id="pool-cue-setup" style="width: 25rem; display:none;">
            <div class="container m-2">
                <h4>Pool Cue Configuration</h4>

                <label for="select-part" class="form-label">Cue Weight:</label>
                <select class="form-select form-control" id="select-part">
                    <option value="butt-cap">1/2 oz</option>
                    <option value="butt-sleeve">18 oz</option>
                    <option value="butt-wrap">19 oz</option>
                    <option value="forearm">20 oz</option>
                    <option value="joint-collar">Joint Collar</option>
                </select>

                <label for="select-part" class="form-label">Select Wood:</label>
                <select class="form-select form-control" id="select-part">
                    <option value="butt-cap">Maple</option>
                    <option value="butt-sleeve">Birds Eye Maple</option>
                    <option value="butt-wrap">Zebrawood</option>
                    <option value="forearm">Bocote</option>
                    <option value="joint-collar">Brown Burl</option>
                </select>

                <div class="container mt-4">
                    <label class="form-label">Select Joint:</label>
                    <div class="row">
                        <div class="col-3">
                        <label class="d-block text-center">
                            <input type="radio" name="radioOption" value="1" class="d-none">
                            <img src="https://via.placeholder.com/300" class="img-fluid img-thumbnail" alt="Option 1">
                            <p>3/8"-10 Standard</p>
                        </label>
                        </div>
                        <div class="col-3">
                        <label class="d-block text-center">
                            <input type="radio" name="radioOption" value="2" class="d-none">
                            <img src="https://via.placeholder.com/300" class="img-fluid img-thumbnail" alt="Option 2">
                            <p>McDermott Quick Release</p>
                        </label>
                        </div>
                        <div class="col-3">
                        <label class="d-block text-center">
                            <input type="radio" name="radioOption" value="3" class="d-none">
                            <img src="https://via.placeholder.com/300" class="img-fluid img-thumbnail" alt="Option 3">
                            <p>Radial </p>
                        </label>
                        </div>
                        <div class="col-3">
                        <label class="d-block text-center">
                            <input type="radio" name="radioOption" value="4" class="d-none">
                            <img src="https://via.placeholder.com/300" class="img-fluid img-thumbnail" alt="Option 4">
                            <p>Uni-Loc</p>
                        </label>
                        </div>
                    </div>
                </div>

                <label for="select-part" class="form-label">Cue Tip Diameter:</label>
                <select class="form-select form-control" id="select-part">
                    <option value="butt-cap">0.25mm</option>
                    <option value="butt-sleeve">11.75mm</option>
                    <option value="butt-wrap">13.75mm</option>
                    
                </select>
            </div>
        </div>
    
        <div id="floatingDiv" class="rounded-bottom fixed-top price d-flex justify-content-between align-items-center">
            <label class="form-label mt-2 ms-3" for="price"><strong>Price:</strong> <span id="price">$200</span></label>
            <button class="btn btn-success me-3">Save</button>
            
        </div>
        <div class="bg-light" id="canvas-div" style="flex-grow: 1; overflow-y: auto; height: 100vh; overflow-x:hidden;">
            <canvas id="canvas1" class="border" height="4096" width="447"></canvas>
        </div>


        <div class="bg-light" style="flex-grow: 1; overflow-y: auto; height: 100vh; overflow-x:hidden;">
            <div id="renderer" class="border"></div>
        </div>

    </div>

</div>


<canvas id="canvas2" height="4096" width="4096" style="display:none;"></canvas>


@include('partials.text')
@include('partials.upload')
@include('partials.shape')
@include('partials.contextmenu')
@endsection
