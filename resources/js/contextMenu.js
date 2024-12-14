import { fabricCanvas1 } from './refabric.js';
const Swal = require('sweetalert2');
const contextMenu = document.getElementById('contextMenu');

// Show custom context menu only when an object is selected
fabricCanvas1.wrapperEl.addEventListener('contextmenu', (event) => {
    event.preventDefault(); // Prevent the browser's default context menu

    // Check if an object is selected on the canvas
   
        // Position the custom context menu at the mouse pointer
        contextMenu.style.left = `${event.pageX}px`;
        contextMenu.style.top = `${event.pageY}px`;
        contextMenu.style.display = 'block';
   
});

// Hide the context menu when clicking elsewhere
document.addEventListener('click', () => {
    contextMenu.style.display = 'none';
});

// Optional: Add functionality to menu items
contextMenu.addEventListener('click', (event) => {
    if (event.target.tagName === 'LI') {
 
        contextMenu.style.display = 'none'; // Hide the menu
    }
});


const menuItems = contextMenu.querySelectorAll('li');

menuItems.forEach((item) => {
    item.addEventListener('click', (event) => {
        const id = event.target.dataset.id; // Use data attributes for identifying actions
      
        if (id) {
            switch(id){
                case 'copy':
                    Copy();
                    break;

                case 'paste':
                    Paste();
                    break;
                case 'group':
                    Group();
                    break;
                case 'ungroup':
                    Ungroup();
                    break;
                case 'delete':
                    Delete();
                    break;
                default:
                    alert(`Action ${action} is not implemented.`);
                    break;
            }
        }
        contextMenu.style.display = 'none'; // Hide the menu after clicking
    });
});



var _clipboard;



//Functions
function Copy(){
    fabricCanvas1.getActiveObject().clone(function(cloned) {
		_clipboard = cloned;
	});
}

function Paste(){
    _clipboard.clone(function(clonedObj) {
		fabricCanvas1.discardActiveObject();
		const retinaScaling = fabricCanvas1.getRetinaScaling();
		clonedObj.set({
			left: clonedObj.left + 10 / retinaScaling,
			top: clonedObj.top + 10 / retinaScaling,
			id: "extra",
			evented: true,
			scaleX: clonedObj.scaleX / retinaScaling,
			scaleY: clonedObj.scaleY / retinaScaling
		});

		
		if(clonedObj.type === 'activeSelection') {
			clonedObj.canvas = fabricCanvas1;
			clonedObj.forEachObject(function(obj) {
				obj.set({
					id: "extra",
					scaleX: obj.scaleX / retinaScaling,
					scaleY: obj.scaleY / retinaScaling,
					left: obj.left / retinaScaling,
					top: obj.top / retinaScaling
				});
				fabricCanvas1.add(obj);
				updateCountsAndPrices();
			});
			clonedObj.setCoords();
			fabricCanvas1.renderAll();
		} else {
			fabricCanvas1.add(clonedObj);

			fabricCanvas1.renderAll();
		}
		_clipboard.top += 10 / retinaScaling;
		_clipboard.left += 10 / retinaScaling;
		fabricCanvas1.setActiveObject(clonedObj);
		fabricCanvas1.renderAll();
	});
}


function Group(){
	if (!fabricCanvas1.getActiveObject()) {
		return;
	  }
	  if (fabricCanvas1.getActiveObject().type !== 'activeSelection') {
		return;
	  }
	  fabricCanvas1.getActiveObject().toGroup();
	  fabricCanvas1.requestRenderAll();
}

function Ungroup(){
	if (!fabricCanvas1.getActiveObject()) {
		return;
	  }
	  if (fabricCanvas1.getActiveObject().type !== 'group') {
		return;
	  }
	  fabricCanvas1.getActiveObject().toActiveSelection();
	  fabricCanvas1.requestRenderAll();
}

function Delete() {
	Swal.fire({
		title: "Are you sure?",
		text: "This will apply the current canvas in the model immediately!",
		icon: "warning",
		showCancelButton: true,
		confirmButtonColor: "#3085d6",
		cancelButtonColor: "#d33",
		confirmButtonText: "Yes, delete it!"
	}).then((result) => {
		if(result.isConfirmed) {
			var activeObjects = fabricCanvas1.getActiveObjects();
			activeObjects.forEach(function(obj) {			
				fabricCanvas1.remove(obj);
                fabricCanvas1.renderAll();
			});
			fabricCanvas1.discardActiveObject().renderAll();
			Swal.fire({
				title: "Deleted!",
				text: "Your file has been deleted.",
				html: "The changes including in price will be applied after you click the apply button.",
				icon: "success"
			});
		}
	});
}