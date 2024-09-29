import * as addImageToPart from './designer/addImageToPart.js';

document.addEventListener('DOMContentLoaded', function () {
    const stainElements = document.querySelectorAll('.stain');
    
    stainElements.forEach(tool => {
        tool.addEventListener('click', () => {
            // Remove 'selected' class from all elements
            stainElements.forEach(t => {
                t.classList.remove('selected');
            });

            // Add 'selected' class to the clicked element
            tool.classList.add('selected');

            // Call the function for the clicked element only
            addImageToPart.addImageToPart(tool.src, 400, 400, 0, 0, 'stain', tool.dataset.part);
        });
    });
});
