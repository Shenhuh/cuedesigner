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

            id = id.slice(0, -5);
  
            if(id === 'butt-cap'){
                const objects = fabricCanvas1.getObjects();
                const firstImage = objects.find(obj => obj.id === 'butt-capstain');
                
                if(firstImage){
                    
                    fabricCanvas1.remove(firstImage);
                    
                    
                }
                // fabricCanvas1.add(img);
                fabricCanvas1.insertAt(img, 1);
                fabricCanvas1.renderAll();
                
                
                
                
                
            }
            else if(id === 'butt-sleeve'){
               
                const objects = fabricCanvas1.getObjects();

                const firstImage = objects.find(obj => obj.id === 'butt-sleeve');
                if(firstImage){
       
                    fabricCanvas1.remove(firstImage);
                }
              
          

                // fabricCanvas1.add(img);
                fabricCanvas1.insertAt(img, 1);
                fabricCanvas1.renderAll();
            }
            else if(id === 'butt-wrap'){
                const objects = fabricCanvas1.getObjects();
                const firstImage = objects.find(obj => obj.id === 'butt-wrap');
                if(firstImage){
       
                    fabricCanvas1.remove(firstImage);
                }
              

                // fabricCanvas1.add(img);
                fabricCanvas1.insertAt(img, 1);
                fabricCanvas1.renderAll();
            }
            else if(id === 'forearm'){
                const objects = fabricCanvas1.getObjects();
                const firstImage = objects.find(obj => obj.id === 'forearm');
                if(firstImage){
       
                    fabricCanvas1.remove(firstImage);
                }
              

                // fabricCanvas1.add(img);
                fabricCanvas1.insertAt(img, 1);
                fabricCanvas1.renderAll();
            }
            else if(id === 'joint-collar'){
                const objects = fabricCanvas1.getObjects();
                const firstImage = objects.find(obj => obj.id === 'joint-collar');
                if(firstImage){
       
                    fabricCanvas1.remove(firstImage);
                }
              

                // fabricCanvas1.add(img);
                fabricCanvas1.insertAt(img, 1);
                fabricCanvas1.renderAll();
            }
            else{
                fabricCanvas1.add(img);
                fabricCanvas1.renderAll();
            }
         
            
            console.log(fabricCanvas1)
         
        });
    }, 1000);
}

//canvasx.insertAt(textureImg, 0);