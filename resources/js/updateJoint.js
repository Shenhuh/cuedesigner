import Swal from "sweetalert2";

document.addEventListener('click', function(e){
    if(e.target.id === 'update-joint'){
        let formData = new FormData();
        let jointId = document.getElementById('joint-id-hidden').value; // Ensure this is the correct hidden input for the ID
        let jointImage = document.getElementById('edit-joint-image').files[0]; // Changed to edit-joint-image
        let jointName = document.getElementById('edit-joint-name').value;

        let jointAmount = document.getElementById('edit-joint-amount').value;
    
        // Append the image if it exists
        if (jointImage) {
            formData.append('image', jointImage);
        }
        formData.append('id', jointId); // Ensure this matches your API's expected parameters
        formData.append('name', jointName);

        formData.append('price', jointAmount);
    
        let xhr = new XMLHttpRequest();
        xhr.open('POST', `/admin/joints/${jointId}`, true);
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
        xhr.setRequestHeader('X-HTTP-Method-Override', 'PUT'); // Laravel expects PUT, so we override the method
    
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
          
                if (xhr.status === 200) {
                    let response = JSON.parse(xhr.responseText);
                    var jointClose = document.getElementById('edit-joint-modal-close');
                    jointClose.click();
                    document.getElementById('designer-settings').click();    
                    setTimeout(() => {
                        
                        document.getElementById('joints-tab').click();
                    }, 2000);
                    
                    Swal.fire({
                        position: "center",
                        icon: "success",
                        title: "Joint Info has been updated!",
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

