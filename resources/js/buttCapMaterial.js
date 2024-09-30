import * as addImageToPart from './designer/addImageToPart.js';
import { currentDimension, currentPart, currentPosition } from './refabric.js';
import black from '../../public/assets/black.png';


document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('butt-cap-material').addEventListener("change", function(event){
     
            switch (event.target.value) {
                case "black":
                    currentPosition.y = 3990;
                    currentDimension.w = 447;
                    currentDimension.h = 100;
                    addImageToPart.addImageToPart(black, currentDimension.w, currentDimension.h, currentPosition.y, currentPosition.x, `butt-cap`, 'butt-cap');
                    break;
              
            
                default:
                    break;
            }
        });
    
});