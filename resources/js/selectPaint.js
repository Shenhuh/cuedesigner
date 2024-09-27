import * as addImageToPart from './designer/addImageToPart.js';


document.addEventListener('DOMContentLoaded', function () {
    const paint = document.querySelectorAll('.paint');
    paint.forEach(tool => {
        tool.addEventListener('click', () => {
            paint.forEach(t => {
                addImageToPart.addImageToPart(t.src, 400, 400, 0, 0, 'paint', t.dataset.part);
                t.style.borderColor = "blue";
            });

        });
    });   
});