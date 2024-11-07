import Swal from "sweetalert2";

document.addEventListener('click', function(e){
    if(e.target.id === 'update-wood'){
        let formData = new FormData();
        let woodId = document.getElementById('wood-id-hidden').value; // Ensure this is the correct hidden input for the ID
        let woodImage = document.getElementById('edit-wood-image').files[0]; // Changed to edit-wood-image
        let woodName = document.getElementById('edit-wood-name').value;

        let woodAmount = document.getElementById('edit-wood-amount').value;
    
        // Append the image if it exists
        if (woodImage) {
            formData.append('image', woodImage);
        }
        formData.append('id', woodId); // Ensure this matches your API's expected parameters
        formData.append('name', woodName);

        formData.append('price', woodAmount);
    
        let xhr = new XMLHttpRequest();
        xhr.open('POST', `/admin/woods/${woodId}`, true);
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
        xhr.setRequestHeader('X-HTTP-Method-Override', 'PUT'); // Laravel expects PUT, so we override the method
    
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
          
                if (xhr.status === 200) {
                    let response = JSON.parse(xhr.responseText);
                    var woodClose = document.getElementById('edit-wood-modal-close');
                    woodClose.click();
                    document.getElementById('designer-settings').click();    
                    setTimeout(() => {
                        
                        document.getElementById('woods-tab').click();
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

