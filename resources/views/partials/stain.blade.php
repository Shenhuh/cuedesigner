<div id="butt-sleeve-stain" class="row load-stain d-flex overflow-y-auto mt-4" style="height: 350px;">
    @foreach ($textures as $texture)
        @if ($texture->type === 'stain')
            <div class="col-4">
                <div class="texture-option text-center">
                    <img src="{{ asset('storage/' . $texture->imagePath) }}" alt="{{ $texture->name }}" class="img-fluid stain" data-id="{{ $texture->id }}" style="width: 90px; height: 90px; object-fit: cover;">
                    <p>{{ $texture->name }}</p>
                </div>
            </div>
        @endif
    @endforeach
</div>
