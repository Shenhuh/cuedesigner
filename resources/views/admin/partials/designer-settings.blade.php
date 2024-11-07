
<!-- resources/views/dynamic-content.blade.php -->

<div class="container mt-5 bg-white mt-5 rounded-3 shadow">
    <ul class="designer-settings-tab nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link active" id="texture-tab" data-bs-toggle="tab" data-bs-target="#texture" type="button" 
        role="tab" aria-controls="texture" aria-selected="true">Textures</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="cliparts-tab" data-bs-toggle="tab" data-bs-target="#cliparts" type="button" 
        role="tab" aria-controls="cliparts" aria-selected="false">Clip Arts</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="wraps-tab" data-bs-toggle="tab" data-bs-target="#wrap" type="button" 
        role="tab" aria-controls="wrap" aria-selected="false">Wrap</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="woods-tab" data-bs-toggle="tab" data-bs-target="#wood" type="button" 
        role="tab" aria-controls="wood" aria-selected="false">Wood</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="joints-tab" data-bs-toggle="tab" data-bs-target="#joints" type="button" 
        role="tab" aria-controls="joints" aria-selected="false">Joints</button>
    </li>
    </ul>

    <div class="tab-content overflow-auto" id="myTabContent">
        <div class="tab-pane fade show active" id="texture" role="tabpanel" aria-labelledby="texture-tab">
            @include('admin.partials._texture', ['textures' => $textures])
        </div>
        <div class="tab-pane fade" id="cliparts" role="tabpanel" aria-labelledby="cliparts-tab">
            @include('admin.partials._cliparts', ['cliparts' => $cliparts])
        </div>
        <div class="tab-pane fade" id="wrap" role="tabpanel" aria-labelledby="wrap-tab">
            @include('admin.partials._wrap', ['wraps' => $wraps])
        </div>
        <div class="tab-pane fade" id="wood" role="tabpanel" aria-labelledby="wood-tab">
            @include('admin.partials._wood', ['woods' => $woods])
        </div>
        <div class="tab-pane fade" id="joints" role="tabpanel" aria-labelledby="joints-tab">
            @include('admin.partials._joints', ['joints' => $joints])
        </div>
    </div>
</div>


