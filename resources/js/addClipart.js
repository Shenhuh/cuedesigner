import Swal from "sweetalert2";

document.addEventListener('click', function (e) {
    if(e.target.id === 'save-clipart'){

        addClipart();
    }
});


async function addClipart() {
    const formData = new FormData();
    const clipartName = document.querySelector('.clipart-name').value;
    const clipartImageInput = document.querySelector('.clipart-image');
    const clipartImage = clipartImageInput.files[0];
    const clipartType = document.querySelector('.clipart-type').value;
    const clipartAmount = document.querySelector('.clipart-amount').value;

    formData.append('name', clipartName);
    formData.append('type', clipartType);
    formData.append('price', clipartAmount);    
    formData.append('image', clipartImage);

    try {
        const response = await fetch('/admin/cliparts', {
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
            title: "Clipart has been added!",
            showConfirmButton: false,
            timer: 1500
        });
        var clipartClose = document.getElementById('clipart-modal-close');
        clipartClose.click();
        console.log('Clipart added:', data);
    } catch (error) {
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Something went wrong!",
        });
        console.error('Error adding clipart:', error);
    }
}
