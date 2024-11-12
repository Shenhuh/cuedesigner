import { currentPosition, fabricCanvas1 } from "./refabric";


document.addEventListener('DOMContentLoaded', function(){
  document.addEventListener('click', function(event){
    // const polygonData = event.dataset.polygon;

    if(event.target.id === 'add-text'){
        const fontColor = document.getElementById('font-color').value;
        var fontStyle = document.getElementById('font-style').value;
        const fontSize = document.getElementById('font-size').value;
        var orientation  = document.getElementById('text-orientation').value;
        var top = currentPosition.y;
        var left = currentPosition.x;
        addText(fontColor, fontStyle, fontSize, orientation, top, left);
      
    }
    
  });
});


function addText(fontColor, fontStyle, fontSize, orientation, top, left){
    var itext;
    switch (orientation) {
        case 'vertical':
            itext = new fabric.IText('Double Click to edit', {
                left: left,
                top: top,
                fontFamily: fontStyle,
                fill: fontColor,
                fontSize: fontSize
            });

            itext.on('changed', function() {
           
                itext.text = itext.text.split('').join('\n');
                var newText = this.text.split('').join('\n');
                fabricCanvas1.renderAll();
                
            });
            break;
    
        case 'horizontal':
            itext = new fabric.IText('Double Click to edit', {
                left: left,
                top: top,
                width: 500,
                height: 400,
                fontFamily: fontStyle,
                fill: fontColor,
    
                fontSize: fontSize
            });
            break;
        default:
            itext = new fabric.IText('Double Click to edit', {
                left: 0,
                top: 0,
                width: 500,
                height: 400,
                fontFamily: fontStyle,
                fill: fontColor,
    
                fontSize: 50
            });
      
            break;
        }
        fabricCanvas1.add(itext);
        fabricCanvas1.renderAll();
        document.getElementById('text-modal-close').click();
}