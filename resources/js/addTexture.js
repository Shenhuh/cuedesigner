
document.addEventListener('click', function (e) {
    if(e.target.id === 'save-texture'){
        saveTexture();
    }
});

async function saveTexture(e) {
  

    console.log('Save Texture button clicked!'); // Debugging message

    const formData = new FormData();
    const textureName = document.querySelector('.texture-name').value;
    const textureImageInput = document.querySelector('.texture-image');
    const textureImage = textureImageInput.files[0];
    const textureType = document.querySelector('.texture-type').value;
    const textureAmount = document.querySelector('.texture-amount').value;

    formData.append('name', textureName);
    formData.append('type', textureType);
    formData.append('price', textureAmount);

    if (textureImage) {
        formData.append('image', textureImage);
    } else {
        console.error('No file selected!');
    }

    try {
        const response = await fetch(window.texturesStoreUrl, {
            method: 'POST',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: formData
        });
        
        

        if (!response.ok) {
            const errorData = await response.json();

        } else {
            const successData = await response.json();
     
        }
    } catch (error) {
        console.error('Error:', error);

    }
}

