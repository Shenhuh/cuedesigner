import { fabricCanvas1 } from "./refabric";


document.addEventListener('DOMContentLoaded', function(){
  document.getElementById('add-text').addEventListener('click', function(event){
    // const polygonData = event.dataset.polygon;
    const text = document.getElementById('stroke-color').value;
    const fontColor = document.getElementById('fill-color').value;
    var fontStyle;
    const fontSize = document.getElementById('stroke-width').value;
    var orientation;
    var top;
    var left;

    
    addText(text, fontColor, fontStyle, fontSize, orientation, top, left);
    
  });
});


function addText(text, fontColor, fontStyle, fontSize, orientation, top, left){
    var itext;
    switch (orientation) {
        case 'vertical':
            itext = new fabric.IText(text, {
                left: left,
                top: top,
                fontFamily: fontStyle,
                fill: fontColor,
                fontSize: fontSize
            });
            break;
    
        default:
            itext = new fabric.IText(text, {
                left: left,
                top: top,
                fontFamily: fontStyle,
                fill: fontColor,
                fontSize: fontSize
            });
            break;
    }
    fabricCanvas1.add(itext);
}