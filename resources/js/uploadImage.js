import { fabricCanvas1 } from "./refabric";


document.addEventListener('DOMContentLoaded', function(){
    document.getElementById('imageUpload').addEventListener('change', function (e) {
        var reader = new FileReader();

        reader.onload = function (event) {
          var image = new Image();
          image.src = event.target.result;

          var width = image.width;
          var height = image.height;
          var top = event.dataset.top;
          var left = event.dataset.left;
          
     
          image.onload = function () {
            uploadImage(image, top, left, width, height);
          }
        }
      
        // Read the file as a data URL
        reader.readAsDataURL(e.target.files[0]);
    });
});

function uploadImage(image, top, left, width, height){
    fabric.Image.fromURL(image, function(loadedImg) {
        var img = loadedImg;

        img.set({
            left: left,
            top: top,
            scaleX: width / loadedImg.width,
            scaleY: height / loadedImg.height
        });

        fabricCanvas1.add(img);
    });
}

