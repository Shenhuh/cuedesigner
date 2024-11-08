import * as addImageToPart from './designer/addImageToPart.js';
import { currentDimension, currentPart, currentPosition, moveCamera, moveModel } from './refabric.js';
import { moveScroll } from './canvasScroll.js';

document.addEventListener('DOMContentLoaded', function () {
    const tools = document.querySelectorAll('.side-tools');
    const panelTools = document.getElementById('panel-tools');
    const sidePanels = document.querySelectorAll('.side-panel');


    // Loop through each tool element
    tools.forEach(tool => {
        tool.addEventListener('click', (event) => {
            tools.forEach(item => item.classList.remove('active'));

            event.target.classList.add('active');
            // Hide all panels
            sidePanels.forEach(panel => {
                panel.style.display = "none";
            });

            // Show the specific panel based on the tool's data-id
            document.getElementById(tool.dataset.id).style.display = "block";

            console.log(tool.dataset.id); 
            

        });
    });
    

    document.getElementById('select-part').addEventListener('change', function(event){
        switch (event.target.value) {
            case "butt-cap":
                document.getElementById('butt-sleeve').style.display = "none";
                document.getElementById('butt-cap').style.display = "block";
                currentPart.value = "butt-cap";
                // currentPosition.x = 480;
                moveModel(0, 2.7, 0);
                moveCamera(0, 0, 0.7);
                currentPosition.y = 3590;
                moveScroll(2600);
                // currentDimension.w = 447;
                // currentDimension.h = 200;
                break;
            case "butt-sleeve":
                document.getElementById('butt-cap').style.display = "none";
                document.getElementById('butt-sleeve').style.display = "block";
                currentPart.value = "butt-sleeve";
                // currentPosition.x = 480;
                moveModel(0, 2.5, 0);
                moveCamera(0, 0, 0.7);
                moveScroll(2300);
                currentPosition.y = 3390;
                currentDimension.w = 447;
                currentDimension.h = 600;
                break;
            case "butt-wrap":
                document.getElementById('butt-cap').style.display = "none";
                document.getElementById('butt-sleeve').style.display = "block";
                currentPart.value = "butt-wrap";
                moveModel(0, 1.9, 0);
                moveCamera(0, 0, 0.7);
                moveScroll(1300);
                currentPosition.y = 2190;
                currentDimension.w = 447;
                currentDimension.h = 1200;
                break;
            case "forearm":
                document.getElementById('butt-cap').style.display = "none";
                document.getElementById('butt-sleeve').style.display = "block";
                currentPart.value = "forearm";
                moveModel(0, 1.05, 0);
                moveCamera(0, 0, 0.7);
                moveScroll(180);
                currentPosition.y = 990;
                currentDimension.w = 447;
                currentDimension.h = 1200;
                break;
            case "joint-collar":
                document.getElementById('butt-cap').style.display = "none";
                document.getElementById('butt-sleeve').style.display = "block";
                currentPart.value = "joint-collar";
                moveModel(0, 0.5, 0);
                moveCamera(0, 0, 0.7);
                moveScroll(0);
                currentPosition.y = 800;
                currentDimension.w = 447;
                currentDimension.h = 200;
                
                break;
            default:
                break;
        }
        clearToolInputs();
    });

    function clearToolInputs(){
        document.getElementById('upload-clipart').value = '';
        var stain = document.querySelectorAll('.stain');
        stain.forEach(t => t.style.border = "2px solid #ccc");
    }

    document.getElementById('butt-sleeve-material').addEventListener('change', function(event){
        const stainSection = document.getElementById('butt-sleeve-stain');
        const paintSection = document.getElementById('butt-sleeve-paint');
     
        switch (event.target.value) {
            case "butt-sleeve-stain":
                paintSection.classList.add('d-none');
                stainSection.classList.remove('d-none');
                stainSection.classList.add('d-block');
                break;
            case "butt-sleeve-paint":
                stainSection.classList.add('d-none');
                paintSection.classList.remove('d-none');
                paintSection.classList.add('d-flex');
                break;
            default:
                break;
        }
    });
    
});