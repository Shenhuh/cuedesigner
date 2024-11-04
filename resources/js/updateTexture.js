import Swal from "sweetalert2";

document.addEventListener('click', function(e){
    if(e.target.id === 'update-texture'){
        let formData = new FormData();
        let textureId = document.getElementById('texture-id-hidden').value; // Ensure this is the correct hidden input for the ID
        let textureImage = document.getElementById('edit-texture-image').files[0]; // Changed to edit-texture-image
        let textureName = document.getElementById('edit-texture-name').value;
        let textureType = document.getElementById('edit-texture-type').value;
        let textureAmount = document.getElementById('edit-texture-amount').value;
    
        // Append the image if it exists
        if (textureImage) {
            formData.append('image', textureImage);
        }
        formData.append('id', textureId); // Ensure this matches your API's expected parameters
        formData.append('name', textureName);
        formData.append('type', textureType);
        formData.append('price', textureAmount);
    
        let xhr = new XMLHttpRequest();
        xhr.open('POST', `/admin/textures/${textureId}`, true);
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
        xhr.setRequestHeader('X-HTTP-Method-Override', 'PUT'); // Laravel expects PUT, so we override the method
    
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
          
                if (xhr.status === 200) {
                    let response = JSON.parse(xhr.responseText);
                    var textureClose = document.getElementById('edit-texture-modal-close');
                    textureClose.click();
                    document.getElementById('designer-settings').click();
                    document.getElementById('texture-tab').click();
                    Swal.fire({
                        position: "center",
                        icon: "success",
                        title: "Texture Info has been updated!",
                        showConfirmButton: false,
                        timer: 1500
                    });
                } else {
                    let response = JSON.parse(xhr.responseText);
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Something went wrong!",
                    });
                    console.log(response.error || 'Update failed')
                }
            }
        };
    
        // Send the form data
        xhr.send(formData);
    }
});

