import { fabric } from 'fabric';
import * as THREE from 'three';
import { GLTFLoader } from 'three/examples/jsm/loaders/GLTFLoader.js';

import { DRACOLoader } from 'three/examples/jsm/loaders/DRACOLoader.js';
import { OrbitControls } from 'three/examples/jsm/controls/OrbitControls.js';
import myImage from '../../public/images/23.png';
import myImage2 from '../../public/assets/welcome-bg.jpg';

export var fabricCanvas1;
var fabricCanvas2;
let debounceTimer;
var texture;
export var selectedTextures = [null, null, null, null];
export var currentPart = { value: null };
export var currentPosition = { x: 0, y: 3590 };

export var currentDimension = { w: null, h: null };
var model;
var camera;
document.addEventListener('DOMContentLoaded', function() {
    // Initialize Three.js scene, camera, and renderer
    const scene = new THREE.Scene();
    fabricCanvas1 = new fabric.Canvas('canvas1');
    fabricCanvas2 = new fabric.Canvas('canvas2');

    camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
    const renderer = new THREE.WebGLRenderer({
		antialias: true
	});

    const rendererCanvas = document.getElementById('renderer');

    // Set renderer size and add it to the document
    renderer.setSize(rendererCanvas.clientWidth, rendererCanvas.clientHeight);
    renderer.setClearColor(0xffffff); // Set background color to white
    rendererCanvas.appendChild(renderer.domElement);
    renderer.setPixelRatio(window.devicePixelRatio);

    // Create a point light
    const pointLight = new THREE.PointLight(0xffffff, 1, 100);
    scene.add(pointLight);

    // Load the GLTF model
    // Import necessary loaders
    const loader = new GLTFLoader();
    const dracoLoader = new DRACOLoader();

    // Specify the path to the Draco decoder (you need to download the Draco decoder from three.js or serve it from a CDN)
    dracoLoader.setDecoderPath('https://www.gstatic.com/draco/versioned/decoders/1.5.7/'); // or 'https://www.gstatic.com/draco/v1/decoders/'

    // Set the DRACOLoader to be used with the GLTFLoader
    loader.setDRACOLoader(dracoLoader);

    // Load the GLTF model
    loader.load('assets/supppp-orig.glb', function(gltf) {
        model = gltf.scene;
        model.position.set(0, 0, 0);
        model.scale.set(4, 4, 4);
        // model.rotation.z = 120 * (Math.PI / 180); // Convert degrees to radians

        // Create a THREE.CanvasTexture from the second Fabric.js canvas
        texture = new THREE.CanvasTexture(fabricCanvas2.lowerCanvasEl);
        texture.minFilter = THREE.LinearFilter;
        texture.magFilter = THREE.LinearFilter;

        const material = new THREE.MeshBasicMaterial({ map: texture });

        model.traverse(function(child) {
            if (child.isMesh && child.name === 'CueStick_CueStick_0') {
                child.material = material;
            }
        });

        scene.add(model);
        animate();
    });


   


    // Add OrbitControls
    const controls = new OrbitControls(camera, renderer.domElement);
    controls.enableDamping = true;
    controls.dampingFactor = 0.25;
    controls.enableZoom = true;
    controls.enablePan = true;

    // Animation loop
    function animate() {
        requestAnimationFrame(animate);

        // Update texture if necessary
        if (texture) {
            texture.needsUpdate = true;
        }

        controls.update(); // Update controls
        renderer.render(scene, camera); // Render the scene
    }

    // Set initial camera position
    camera.position.set(0, 1, 5);
    camera.lookAt(new THREE.Vector3(0, 1, 0));

    // Handle window resize
    window.addEventListener('resize', () => {
        camera.aspect = window.innerWidth / window.innerHeight;
        camera.updateProjectionMatrix();
        renderer.setSize(window.innerWidth, window.innerHeight);
    });

    // Initialize Fabric.js canvases
    let img = null;

    // Load the image into the first Fabric.js canvas
    fabric.Image.fromURL(myImage, function(loadedImg) {
        img = loadedImg;

        img.set({
            left: -480,
            // top: -100,
        
            id: 's',
            selectable: false,
            flipY: true
        });

        const clipRect = new fabric.Rect({
            left: 0,
            top: 800,
            width: 447,
            height: 3990,
            absolutePositioned: true
        });

        // Apply clipping path to the image
        img.clipPath = clipRect;
        fabricCanvas1.add(img);
        fabricCanvas1.renderAll();

        // Clone Canvas 1 to Canvas 2 without the clipPath
        cloneCanvasWithoutClipPath();
    });

    // Function to debounce events
  
    

    // Debounce events
    fabricCanvas1.on('object:moving', debounce(cloneCanvasWithoutClipPath, 200));
    fabricCanvas1.on('object:added', debounce(cloneCanvasWithoutClipPath, 200));
    fabricCanvas1.on('object:scaling', debounce(cloneCanvasWithoutClipPath, 200));

    // Event listener for button clicks
    document.addEventListener("click", function(e) {
        if (e.target.id === 'x') {
            setImageSource();
        } else if (e.target.id === 'remove-clip') {
            removeClipPath();
        }
    });

    // Function to remove clipPath from Canvas 1
    function removeClipPath() {
        if (img) {
            img.clipPath = null;
            fabricCanvas1.renderAll();
            cloneCanvasWithoutClipPath(); // Update Canvas 2 after removing clipPath
        }
    }

    // Function to set image source and update canvas
    function setImageSource() {
        if (img) {
            img.clipPath = null;
            fabricCanvas1.renderAll();

            const rectangle = new fabric.Rect({
                width: 200,
                height: 100,
                fill: 'green',
                stroke: 'green',
                left: 0,
                top: 0
            });

            fabricCanvas1.add(rectangle);
            fabricCanvas1.renderAll();

            // Convert Canvas 1 to data URL
            const fullImageDataURL = fabricCanvas1.toDataURL({
                multiplier: 1,
                format: 'png',
                quality: 1
            });

            const imgElement = document.getElementById('img');
            if (imgElement) {
                imgElement.src = fullImageDataURL;
            }
        }
    }
   
    // Load and add image to Canvas 1 after a delay


    // setTimeout(() => {
    //     fabric.Image.fromURL(myImage2, function(loadedImg) {
    //         img = loadedImg;

    //         img.set({
    //             left: 0,
    //             top: 3190,
    //             // width: 447,
    //             // height: 700,
    //             scaleX: 447 / loadedImg.width,
    //             scaleY: 700 / loadedImg.height
    //         });

    //         fabricCanvas1.add(img);
    //         fabricCanvas1.renderAll();
    //         cloneCanvasWithoutClipPath();
    //     });
    // }, 1000);

    // setTimeout(() => {
    //     fabric.Image.fromURL(myImage2, function(loadedImg) {
    //         img = loadedImg;
    
    //         const targetWidth = 447;
    //         const targetHeight = 1400;
    
    //         // Ensure the image scales to the desired width and height
    //         // img.scaleToWidth(targetWidth);
    //         img.scaleToHeight(targetHeight);
    
    //         img.set({
    //             left: 0,
    //             top: 1790,
         
    //             scaleX: 447 / loadedImg.width,
    //             scaleY: 1400 / loadedImg.height
    //         });
    
    //         fabricCanvas1.add(img);
    //         fabricCanvas1.renderAll();
    //         cloneCanvasWithoutClipPath();
    //     });
    // }, 1000);

    // setTimeout(() => {
    //     fabric.Image.fromURL(myImage2, function(loadedImg) {
    //         img = loadedImg;
    
    //         const targetWidth = 447;
    //         const targetHeight = 1400;
    
    //         // Ensure the image scales to the desired width and height
    //         // img.scaleToWidth(targetWidth);
    //         img.scaleToHeight(targetHeight);
    
    //         img.set({
    //             left: 0,
    //             top: 390,
           
    //             scaleX: 447 / loadedImg.width,
    //             scaleY: 1400 / loadedImg.height
    //         });
    
    //         fabricCanvas1.add(img);
    //         fabricCanvas1.renderAll();
    //         cloneCanvasWithoutClipPath();
    //     });
    // }, 1000);
    
});

export  function moveModel(x, y, z){
    model.position.set(x,y,z);
}

export  function moveCamera(x, y, z){
    camera.position.set(x,y,z);
}

function debounce(func, wait) {
    return function(...args) {
        clearTimeout(debounceTimer);
        debounceTimer = setTimeout(() => func.apply(this, args), wait);
    };
}

// Function to clone Canvas 1 to Canvas 2 without clipPath
export function cloneCanvasWithoutClipPath() {
    fabricCanvas2.clear();

    // Clone Canvas 1 content
    fabricCanvas1.getObjects().forEach(obj => {
        const clonedObj = fabric.util.object.clone(obj);
        if (obj.id === 's') {
            clonedObj.set({ left: 0 });
        } else {
            clonedObj.left += 480;
            
        }

        clonedObj.clipPath = null;
        fabricCanvas2.add(clonedObj);
    });
    fabricCanvas2.renderAll();
    updateTexture(); // Update texture after cloning
}

// Function to update the texture
function updateTexture() {
    if (texture) {
        texture.image = fabricCanvas2.lowerCanvasEl;
        texture.needsUpdate = true;
    }
}


