import Swal from "sweetalert2";

document.addEventListener('click', function (e) {
    if(e.target.id === 'save-wood'){

        addClipart();
    }
});


async function addClipart() {
    const formData = new FormData();
    const woodName = document.querySelector('.wood-name').value;
    const woodImageInput = document.querySelector('.wood-image');
    const woodImage = woodImageInput.files[0];
    const woodAmount = document.querySelector('.wood-amount').value;

    formData.append('name', woodName);
    formData.append('price', woodAmount);    
    formData.append('image', woodImage);

    try {
        const response = await fetch('/admin/woods', {
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
            title: "Wood has been added!",
            showConfirmButton: false,
            timer: 1500
        });
        var woodClose = document.getElementById('wood-modal-close');
        woodClose.click();
        console.log('Clipart added:', data);
    } catch (error) {
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Something went wrong!",
        });
        console.error('Error adding wood:', error);
    }
}
