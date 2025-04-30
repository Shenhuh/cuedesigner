import { fabricCanvas1 } from './refabric.js';
import Swal from "sweetalert2";


document.addEventListener('click', function (e) {
    if(e.target.id === 'save-design'){
        saveDesign();
    }
});


async function saveDesign() {
    const formData = new FormData();
    const canvasData = fabricCanvas1.toJSON();

    formData.append('canvasData', JSON.stringify(canvasData));


    try {
        const response = await fetch('/designs', {
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
            title: "Design saved successfully!",
            showConfirmButton: false,
            timer: 1500
        });
      
        console.log('Design Saved:', data);
    } catch (error) {
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Something went wrong!"+error,
        });
        console.error('Error adding texture:', error);
    }
}
