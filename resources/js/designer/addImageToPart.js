import { fabricCanvas1, currentDimension } from '../refabric.js';


export function addImageToPart(image, width, height, top, left, id, part, selectable){

    setTimeout(() => {
        fabric.Image.fromURL(image, function(loadedImg) {
            var img = loadedImg;

            img.set({
                left: left,
                top: top,
                id: id,
                part: part,
                selectable: selectable,
                // width: 447,
                // height: 200,
                scaleX: width / loadedImg.width,
                scaleY: height / loadedImg.height
            });

            if(id === 'butt-cap'){
                const objects = fabricCanvas1.getObjects();
                const firstImage = objects.find(obj => obj.type === 'butt-cap');
                if(firstImage){

                    fabricCanvas1.remove(firstImage);
                }

                fabricCanvas1.add(img);
                fabricCanvas1.insertAt(img, 0);
                fabricCanvas1.renderAll();
            }
            else{
                fabricCanvas1.add(img);
                fabricCanvas1.insertAt(img, 0);
                fabricCanvas1.renderAll();
            }
         
        });
    }, 1000);
}

//canvasx.insertAt(textureImg, 0);