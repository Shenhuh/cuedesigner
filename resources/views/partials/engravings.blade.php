<div id="engravings" class="row load-stain d-flex overflow-y-auto" style="height: 350px;">
    @foreach ($cliparts as $clipart)
        @if ($clipart->type === 'engraving')
            <div class="col-4">
                <div class="clipart-option text-center">
                    <img src="{{ asset('storage/' . $clipart->imagePath) }}" alt="{{ $clipart->name }}" class="img-fluid clipart" data-id="{{ $clipart->id }}" style="width: 90px; height: 90px; object-fit: cover;">
                    <p>{{ $clipart->name }}</p>
                </div>
            </div>
        @endif
    @endforeach

</div>