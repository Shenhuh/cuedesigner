import { fabricCanvas1 } from "./refabric";


document.addEventListener('DOMContentLoaded', function(){
    document.getElementById('upload-image').addEventListener('change', function (e) {
        var reader = new FileReader();

        reader.onload = function (event) {
          var image = new Image();
          image.src = event.target.result;

          var width = 200;
          var height = 200;
          var top = event.dataset.top;
          var left = event.dataset.left;
          
     
          image.onload = function () {
            uploadImage(image, top, left, width, height);
          }
        }
     
        reader.readAsDataURL(e.target.files[0]);
    });
});

function uploadImage(image, top, left, width, height, design){
    fabric.Image.fromURL(image, function(loadedImg) {
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

