import * as addImageToPart from './designer/addImageToPart.js';



document.addEventListener('DOMContentLoaded', function () {
    const tools = document.querySelectorAll('.side-tools');
    const panelTools = document.getElementById('panel-tools');

    // A mapping of tools to their respective loading functions
    const toolActions = {
        'textures-button': loadTexturesContent,
        'shapes-button': loadShapesContent,
        // Add more tools and their corresponding functions here
    };
 

    // Function to clear and load new content into 'panel-tools'
    function loadTexturesContent() {
        clearPanel();

        const header = document.createElement('h3');
        header.textContent = 'Textures';

        const description = document.createElement('p');
        description.textContent = 'Choose a texture for your design:';
// Create a label element
        const materialLabel = document.createElement('label');
        materialLabel.textContent = 'Choose Material:';
        materialLabel.setAttribute('for', 'material-select'); // Associate the label with the select element

        // Create a select element
        const material = document.createElement('select');
        material.setAttribute('id', 'material-select'); // Set the id so that the label can reference it

        // Add some options to the select element
        const option1 = document.createElement('option');
        option1.value = 'wood';
        option1.textContent = 'Wood';

        const option2 = document.createElement('option');
        option2.value = 'leather';
        option2.textContent = 'Leather';

        // Append options to the select element
        material.appendChild(option1);
        material.appendChild(option2);



        const list = document.createElement('ul');
        const textures = [
            { name: 'Wood', imgSrc: '/images/welcome-bg.jpg' },
            { name: 'Metal', imgSrc: 'path/to/metal.png' },
            { name: 'Leather', imgSrc: 'path/to/leather.png' },
            { name: 'Fabric', imgSrc: 'path/to/fabric.png' }
        ];

        textures.forEach(texture => {
            const listItem = document.createElement('li');

            // Create an image element
            const img = document.createElement('img');
            img.src = texture.imgSrc;  // Set the image source
            img.alt = texture.name;     // Set alt text for accessibility
            img.classList.add('texture-image'); // Optional: Add a class for styling
            img.width = 200;
            img.height = 200;
            // Set a data-id attribute for the list item
            img.setAttribute('data-id', texture.name);
            listItem.classList.add('clickable');  // Add a class for styling and interactivity

            // Append the image to the list item
            listItem.appendChild(img);

            // Add a click event listener to handle clicks
            listItem.addEventListener('click', function(event) {
            alert(event.target.src)
            addImageToPart.addImageToPart(event.target.src, 447, 200, 3887, 0, 'sd');
            });

            list.appendChild(listItem);
        });

        panelTools.appendChild(header);
        panelTools.appendChild(description);
        panelTools.appendChild(materialLabel);
        panelTools.appendChild(material);
        panelTools.appendChild(list);
    }


    function loadShapesContent() {
        clearPanel();
        
        const header = document.createElement('h3');
        header.textContent = 'Shapes';

        const description = document.createElement('p');
        description.textContent = 'Choose a shape for your design:';

        const shapes = ['Circle', 'Square', 'Triangle', 'Polygon'];
        const shapeContainer = document.createElement('div');
        
        shapes.forEach(shape => {
            const button = document.createElement('button');
            button.textContent = shape;
            button.classList.add('shape-btn');  // Add a class for styling and interactivity
            shapeContainer.appendChild(button);
        });

        panelTools.appendChild(header);
        panelTools.appendChild(description);
        panelTools.appendChild(shapeContainer);
    }

    function clearPanel() {
        // Clear the panel content efficiently
        while (panelTools.firstChild) {
            panelTools.removeChild(panelTools.firstChild);
        }
    }

    // Loop through each tool element
    tools.forEach(tool => {
        tool.addEventListener('click', () => {
            // Remove 'active' class from all tools
            tools.forEach(t => t.classList.remove('active'));

            // Add 'active' class to the clicked tool
            tool.classList.add('active');

            // Check if the clicked tool has a corresponding action
            const action = toolActions[tool.id];
            if (action) {
                action();  // Call the corresponding function to load content
            }
        });
    });


    document.getElementById('select-part').addEventListener('change', function(event){
        switch (event.target.value) {
            case "butt-cap":
                document.getElementById('butt-sleeve').style.display = "none";
                document.getElementById('butt-cap').style.display = "block";
                break;
            case "butt-sleeve":
                document.getElementById('butt-cap').style.display = "none";
                document.getElementById('butt-sleeve').style.display = "block";
                break;
            case "butt-wrap":
                document.getElementById('butt-cap').style.display = "none";
                document.getElementById('butt-sleeve').style.display = "block";
                break;
            case "forearm":
                document.getElementById('butt-cap').style.display = "none";
                document.getElementById('butt-sleeve').style.display = "block";
                break;
            case "joint-collar":
                document.getElementById('butt-cap').style.display = "none";
                document.getElementById('butt-sleeve').style.display = "block";
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

    document.getElementById('butt-cap-material').addEventListener('change', function(event){
        const stainSection = document.getElementById('butt-cap-stain');
        const paintSection = document.getElementById('butt-cap-paint');
    
        switch (event.target.value) {
            case "butt-cap-stain":
                paintSection.classList.add('d-none');
                stainSection.classList.remove('d-none');
                stainSection.classList.add('d-block');
                break;
            case "butt-cap-paint":
                stainSection.classList.add('d-none');
                paintSection.classList.remove('d-none');
                paintSection.classList.add('d-flex');
                break;
            default:
                break;
        }
    });
    
});