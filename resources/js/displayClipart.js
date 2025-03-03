import * as addImageToPart from './designer/addImageToPart.js';
import { selectedTextures, currentPart, fabricCanvas1, currentPosition, currentDimension } from './refabric.js';


document.addEventListener('DOMContentLoaded', function () {
    const clipart = document.querySelectorAll('.clipart');
    clipart.forEach(tool => {
        tool.addEventListener('click', (e) => {
            console.log(e)
            var clipartId = tool.dataset.id;
   
            addImageToPart.addImageToPart(tool.src, 200, 200, currentPosition.y, currentPosition.x, currentPart.value+'paxint', currentPart, true);
        });
    });

});