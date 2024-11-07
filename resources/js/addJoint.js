import Swal from "sweetalert2";

document.addEventListener('click', function (e) {
    if(e.target.id === 'save-joint'){

        addClipart();
    }
});


async function addClipart() {
    const formData = new FormData();
    const jointName = document.querySelector('.joint-name').value;
    const jointImageInput = document.querySelector('.joint-image');
    const jointImage = jointImageInput.files[0];
    const jointAmount = document.querySelector('.joint-amount').value;

    formData.append('name', jointName);
    formData.append('price', jointAmount);    
    formData.append('image', jointImage);

    try {
        const response = await fetch('/admin/joints', {
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
            title: "Joint has been added!",
            showConfirmButton: false,
            timer: 1500
        });
        var jointClose = document.getElementById('joint-modal-close');
        jointClose.click();
        console.log('Clipart added:', data);
    } catch (error) {
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Something went wrong!",
        });
        console.error('Error adding joint:', error);
    }
}
