import Swal from "sweetalert2";

document.addEventListener('click', function (e) {
    if(e.target.id === 'save-shape'){

        addClipart();
    }
});


async function addClipart() {
    const formData = new FormData();
    const shapeName = document.querySelector('.shape-name').value;
    const shapeData = document.querySelector('.shape-data').value;
    const shapeAmount = document.querySelector('.shape-amount').value;

    formData.append('name', shapeName);
    formData.append('price', shapeAmount);    
    formData.append('polygonData', shapeData);

    try {
        const response = await fetch('/admin/shapes', {
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
            title: "Shape has been added!",
            showConfirmButton: false,
            timer: 1500
        });
        var shapeClose = document.getElementById('shape-modal-close');
        shapeClose.click();
        console.log('Clipart added:', data);
    } catch (error) {
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Something went wrong!",
        });
        console.error('Error adding shape:', error);
    }
}
