import Swal from "sweetalert2";

document.addEventListener('click', function (e) {
    if(e.target.id === 'save-texture'){
        addTexture();
    }
});


async function addTexture() {
    const formData = new FormData();
    const textureName = document.querySelector('.texture-name').value;
    const textureImageInput = document.querySelector('.texture-image');
    const textureImage = textureImageInput.files[0];
    const textureType = document.querySelector('.texture-type').value;
    const textureAmount = document.querySelector('.texture-amount').value;

    formData.append('name', textureName);
    formData.append('type', textureType);
    formData.append('price', textureAmount);
    formData.append('image', textureImage);

    try {
        const response = await fetch('/admin/textures', {
            method: 'POST',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: formData,
        });

        if (!response.ok) throw new Error('Network response was not OK');
        
        const data = await response.json();
        Swal.fire({
            position: "center",
            icon: "success",
            title: "Texture has been added!",
            showConfirmButton: false,
            timer: 1500
        });
        var textureClose = document.getElementById('texture-modal-close');
        textureClose.click();
        console.log('Texture added:', data);
    } catch (error) {
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Something went wrong!",
        });
        console.error('Error adding texture:', error);
    }
}
