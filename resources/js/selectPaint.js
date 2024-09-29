import * as addImageToPart from './designer/addImageToPart.js';
import { selectedTextures, currentPart, fabricCanvas1 } from './refabric.js';

document.addEventListener('DOMContentLoaded', function () {
    const paintElements = document.querySelectorAll('.paint');
    const stainElements = document.querySelectorAll('.stain');
    paintElements.forEach(tool => {
        tool.addEventListener('click', () => {
            // Remove 'selected' class from all paint elements
            paintElements.forEach(t => t.classList.remove('selected'));
            stainElements.forEach(t => t.classList.remove('selected'));
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
            addImageToPart.addImageToPart(tool.src, 400, 400, 0, 0, `${currentPart.value}paint`, tool.dataset.part);
        });
    });
});
