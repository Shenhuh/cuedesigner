import * as addImageToPart from './designer/addImageToPart.js';
import { selectedTextures, currentPart } from './refabric.js';

document.addEventListener('DOMContentLoaded', function () {
    const paintElements = document.querySelectorAll('.paint');
    
    paintElements.forEach(tool => {
        tool.addEventListener('click', () => {
            // Remove 'selected' class from all paint elements
            paintElements.forEach(t => {
                t.classList.remove('selected');
            });

            // Add 'selected' class to the clicked tool
            tool.classList.add('selected');

            // Ensure currentPart is being handled properly (currentPart.value if it's an object, currentPart otherwise)
            switch (currentPart.value) { 
                case "butt-cap":
                    break;
                case "butt-sleeve":
                    selectedTextures[0] = tool.dataset.id;  // Use tool.dataset.id here
                    break;
                case "butt-wrap":
                    selectedTextures[1] = tool.dataset.id;
                    break;
                case "forearm":
                    selectedTextures[2] = tool.dataset.id;
                    break;
                case "joint-collar":
                    selectedTextures[3] = tool.dataset.id;
                    break;
                default:
                    break;
            }
            alert(selectedTextures[0])
            // Call the addImageToPart function
            addImageToPart.addImageToPart(tool.src, 400, 400, 0, 0, 'paint', tool.dataset.part);
        });
    });
});
