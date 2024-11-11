import * as addImageToPart from './designer/addImageToPart.js';
import { selectedTextures, currentPart, fabricCanvas1, currentPosition, currentDimension } from './refabric.js';

document.addEventListener('DOMContentLoaded', function () {
    const stainElements = document.querySelectorAll('.stain');
    const paintElements = document.querySelectorAll('.paint');
    
    stainElements.forEach(tool => {
        tool.addEventListener('click', () => {
            // Remove 'selected' class from all stain elements
            stainElements.forEach(t => t.classList.remove('selected'));
            paintElements.forEach(t => t.classList.remove('selected'));
            
            // Add 'selected' class to the clicked tool
            tool.classList.add('selected');

            // Use tool.dataset.id once
            const id = tool.dataset.id;

            // Update selectedTextures based on currentPart.value
            const textureIndex = {
                "butt-sleeve": 0,
                "butt-wrap": 1,
                "forearm": 2,
                "joint-collar": 3
            }[currentPart.value];

            if (textureIndex !== undefined) {
                selectedTextures[textureIndex] = id; // Only set if currentPart.value matches
            }

            // Remove objects with matching IDs for both 'stain' and 'paint'
            const objectsToRemove = fabricCanvas1.getObjects().filter(object => {
                return object.id === `${currentPart.value}stain` || object.id === `${currentPart.value}paint`;
            });

            objectsToRemove.forEach(object => fabricCanvas1.remove(object));
            
            // Call the addImageToPart function
            addImageToPart.addImageToPart(tool.src, currentDimension.w, currentDimension.h, currentPosition.y, currentPosition.x, `${currentPart.value}stain`, tool.dataset.part, false);
        });
    });
});
