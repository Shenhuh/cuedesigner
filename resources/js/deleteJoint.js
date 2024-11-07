const Swal = require('sweetalert2');

document.addEventListener('click', function(e){
  if(e.target.id === 'delete-joint'){
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
        let jointId = document.getElementById('joint-id-hidden').value;

        let xhr = new XMLHttpRequest();
        xhr.open('DELETE', `/admin/joints/${jointId}`, true);
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
      
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                let responseMessage = document.getElementById('responseMessage');
                if (xhr.status === 200) {
                    let response = JSON.parse(xhr.responseText);
                    document.getElementById('designer-settings').click();
                    setTimeout(() => {
                        
                        document.getElementById('joints-tab').click();
                    }, 2000);
                    Swal.fire({
                      title: "Deleted!",
                      text: "Joint has been deleted.",
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
  }
})



