import Swal from "sweetalert2";

document.addEventListener('click', function(e){
    if(e.target.id === 'update-clipart'){
        let formData = new FormData();
        let clipartId = document.getElementById('clipart-id-hidden').value; // Ensure this is the correct hidden input for the ID
        let clipartImage = document.getElementById('edit-clipart-image').files[0]; // Changed to edit-clipart-image
        let clipartName = document.getElementById('edit-clipart-name').value;
        let clipartType = document.getElementById('edit-clipart-type').value;
        let clipartAmount = document.getElementById('edit-clipart-amount').value;
    
        // Append the image if it exists
        if (clipartImage) {
            formData.append('image', clipartImage);
        }
        formData.append('id', clipartId); // Ensure this matches your API's expected parameters
        formData.append('name', clipartName);
        formData.append('type', clipartType);
        formData.append('price', clipartAmount);
    
        let xhr = new XMLHttpRequest();
        xhr.open('POST', `/admin/cliparts/${clipartId}`, true);
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
        xhr.setRequestHeader('X-HTTP-Method-Override', 'PUT'); // Laravel expects PUT, so we override the method
    
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
          
                if (xhr.status === 200) {
                    let response = JSON.parse(xhr.responseText);
                    var clipartClose = document.getElementById('edit-clipart-modal-close');
                    clipartClose.click();
                    document.getElementById('designer-settings').click();
                    setTimeout(() => {                        
                        document.getElementById('cliparts-tab').click();
                    }, 2000);
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

