import * as addImageToPart from './designer/addImageToPart.js';


document.addEventListener('DOMContentLoaded', function () {
    const stain = document.querySelectorAll('.stain');
    stain.forEach(tool => {
        tool.addEventListener('click', () => {
            stain.forEach(t => {
                addImageToPart.addImageToPart(t.src, 400, 400, 0, 0, 'stain', t.dataset.part);
                t.style.borderColor = "blue";
            });

        });
    });   
});