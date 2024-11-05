import Swal from "sweetalert2";

document.addEventListener('click', function (e) {
    if(e.target.id === 'save-wrap'){
        addWrap();
    }
});


async function addWrap() {
    const formData = new FormData();
    const wrapName = document.querySelector('.wrap-name').value;
    const wrapImageInput = document.querySelector('.wrap-image');
    const wrapImage = wrapImageInput.files[0];
    const wrapType = document.querySelector('.wrap-type').value;
    const wrapAmount = document.querySelector('.wrap-amount').value;

    formData.append('name', wrapName);
    formData.append('material_type', wrapType);
    formData.append('price', wrapAmount);
    formData.append('image', wrapImage);

    try {
        const response = await fetch('/admin/wraps', {
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
            title: "Wrap has been added!",
            showConfirmButton: false,
            timer: 1500
        });
        var wrapClose = document.getElementById('wrap-modal-close');
        wrapClose.click();
        console.log('Wrap added:', data);
    } catch (error) {
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Something went wrong!",
        });
        console.error('Error adding wrap:', error);
    }
}
