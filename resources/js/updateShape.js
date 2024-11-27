import Swal from "sweetalert2";

document.addEventListener('click', function(e){
    if(e.target.id === 'update-admin-shape'){
        let formData = new FormData();
        let shapeId = document.getElementById('shape-id-hidden').value; // Ensure this is the correct hidden input for the ID

        let shapeName = document.getElementById('edit-shape-name').value;
        let shapeData = document.getElementById('edit-shape-data').value;

        let shapeAmount = document.getElementById('edit-shape-amount').value;
    
       
        formData.append('id', shapeId); // Ensure this matches your API's expected parameters
        formData.append('name', shapeName);
        formData.append('polygonData', shapeData);
        formData.append('price', shapeAmount);
    
        let xhr = new XMLHttpRequest();
        xhr.open('POST', `/admin/shapes/${shapeId}`, true);
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
        xhr.setRequestHeader('X-HTTP-Method-Override', 'PUT'); // Laravel expects PUT, so we override the method
    
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
          
                if (xhr.status === 200) {
                    let response = JSON.parse(xhr.responseText);
                    var shapeClose = document.getElementById('edit-shape-modal-close');
                    shapeClose.click();
                    document.getElementById('designer-settings').click();    
                    setTimeout(() => {
                        
                        document.getElementById('shapes-tab').click();
                    }, 2000);
                    
                    Swal.fire({
                        position: "center",
                        icon: "success",
                        title: "Shape Info has been updated!",
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

