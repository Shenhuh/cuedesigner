import Swal from "sweetalert2";

document.addEventListener('click', function(e){
    if(e.target.id === 'update-wrap'){
        let formData = new FormData();
        let wrapId = document.getElementById('wrap-id-hidden').value; // Ensure this is the correct hidden input for the ID
        let wrapImage = document.getElementById('edit-wrap-image').files[0]; // Changed to edit-wrap-image
        let wrapName = document.getElementById('edit-wrap-name').value;
        let wrapType = document.getElementById('edit-wrap-type').value;
        let wrapAmount = document.getElementById('edit-wrap-amount').value;
    
        // Append the image if it exists
        if (wrapImage) {
            formData.append('image', wrapImage);
        }
        formData.append('id', wrapId); // Ensure this matches your API's expected parameters
        formData.append('name', wrapName);
        formData.append('material_type', wrapType);
        formData.append('price', wrapAmount);
    
        let xhr = new XMLHttpRequest();
        xhr.open('POST', `/admin/wraps/${wrapId}`, true);
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
        xhr.setRequestHeader('X-HTTP-Method-Override', 'PUT'); // Laravel expects PUT, so we override the method
    
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
          
                if (xhr.status === 200) {
                    let response = JSON.parse(xhr.responseText);
                    var wrapClose = document.getElementById('edit-wrap-modal-close');
                    wrapClose.click();
                    document.getElementById('designer-settings').click();    
                    setTimeout(() => {
                        
                        document.getElementById('wraps-tab').click();
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

