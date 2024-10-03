import { currentPosition, fabricCanvas1 } from "./refabric";

document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('upload-image').addEventListener('click', function (e) {
        var clipart = document.getElementById('upload-clipart').files[0]; // Move this inside the click event
        if (!clipart) {
            alert('Please select an image file.');
            return;
        }

        var reader = new FileReader();

        reader.onload = function(event) {
            var width = 200;
            var height = 200;
            var top = currentPosition.y;
            var left = 0;

            // Use the data URL directly
            uploadImage(event.target.result, top, left, width, height);
        };

        reader.readAsDataURL(clipart); // Read the file as a data URL
    });
});

function uploadImage(imageURL, top, left, width, height, design) {
    fabric.Image.fromURL(imageURL, function(loadedImg) {
        var img = loadedImg;

        img.set({
            left: left,
            top: top,
            type: design,
            scaleX: width / loadedImg.width,
            scaleY: height / loadedImg.height
        });

        fabricCanvas1.add(img);
    });
}
