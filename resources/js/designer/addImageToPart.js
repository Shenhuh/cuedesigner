import { fabricCanvas1, cloneCanvasWithoutClipPath } from '../refabric.js';


export function addImageToPart(image, width, height, top, left, id, part){
    setTimeout(() => {
        fabric.Image.fromURL(image, function(loadedImg) {
            var img = loadedImg;

            img.set({
                left: left,
                top: top,
                id: id,
                part: part,
                // width: 447,
                // height: 200,
                scaleX: width / loadedImg.width,
                scaleY: height / loadedImg.height
            });

            fabricCanvas1.add(img);
            fabricCanvas1.renderAll();

        });
    }, 1000);
}