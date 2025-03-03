import * as addImageToPart from './designer/addImageToPart.js';
import { fabricCanvas1, currentDimension, currentPart, currentPosition } from './refabric.js';
import black from '../../public/assets/black.png';
import white from '../../public/assets/white.png';
import bone from '../../public/assets/bone.png';
import stainless from '../../public/assets/stainless.jpg';


document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('butt-cap-material').addEventListener("change", function(event){
            fabricCanvas1.getObjects().forEach(function(object) {
                if (object.id === 'but-capstain') {
                    fabricCanvas1.remove();
                    fabricCanvas1.renderAll();
                }
            });
            
        

            switch (event.target.value) {
                case "black":
                    currentPosition.y = 3990;
                    currentDimension.w = 447;
                    currentDimension.h = 100;
                    addImageToPart.addImageToPart(black, currentDimension.w, currentDimension.h, currentPosition.y, currentPosition.x, `butt-capstain`, 'butt-capstain');
                    break;

                case "white":
                    currentPosition.y = 3990;
                    currentDimension.w = 447;
                    currentDimension.h = 100;
                    addImageToPart.addImageToPart(white, currentDimension.w, currentDimension.h, currentPosition.y, currentPosition.x, `butt-capstain`, 'butt-capstain');
                    break;
                case "bone":
                    currentPosition.y = 3990;
                    currentDimension.w = 447;
                    currentDimension.h = 100;
                    addImageToPart.addImageToPart(bone, currentDimension.w, currentDimension.h, currentPosition.y, currentPosition.x, `butt-capstain`, 'butt-capstain');
                    break;
                case "stainless":
                    currentPosition.y = 3990;
                    currentDimension.w = 447;
                    currentDimension.h = 100;
                    addImageToPart.addImageToPart(stainless, currentDimension.w, currentDimension.h, currentPosition.y, currentPosition.x, `butt-capstain`, 'butt-capstain');
                    break;
              
            
                default:
                    break;
            }
        });
    
});