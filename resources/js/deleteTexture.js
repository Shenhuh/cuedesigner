const Swal = require('sweetalert2');
var deleteTexture = document.getElementById('delete-texture');
deleteTexture.addEventListener("click", function(){
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
      }).then((result) => {
        if (result.isConfirmed) {
          let textureId = document.getElementById('texture-id-hidden').value;

          let xhr = new XMLHttpRequest();
          xhr.open('DELETE', `/admin/textures/${textureId}`, true);
          xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
          xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
        
          xhr.onreadystatechange = function () {
              if (xhr.readyState === 4) {
                  let responseMessage = document.getElementById('responseMessage');
                  if (xhr.status === 200) {
                      let response = JSON.parse(xhr.responseText);
                      Swal.fire({
                        title: "Deleted!",
                        text: "Texture has been deleted.",
                        icon: "success"
                      });
                  } else {
                      let response = JSON.parse(xhr.responseText);
                      Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Something went wrong!",
                    });
                  }
              }
          };
        
          xhr.send();
    
        }
      });
});



