import { currentPosition, fabricCanvas1 } from "./refabric";


document.addEventListener('DOMContentLoaded', function(){
  document.getElementById('butt-cap-add-text').addEventListener('click', function(event){
    // const polygonData = event.dataset.polygon;

    const fontColor = document.getElementById('butt-cap-font-color').value;
    var fontStyle = document.getElementById('butt-cap-font-style').value;
    const fontSize = document.getElementById('butt-cap-font-size').value;
    var top = currentPosition.y;
    var left = currentPosition.x;
    addButtCapText(fontColor, fontStyle, fontSize, top, left);
    
  });
});


function addButtCapText(fontColor, fontStyle, fontSize, top, left){
    var itext;
  
    itext = new fabric.IText('Double Click to edit', {
        left: left,
        top: top,
        fontFamily: fontStyle,
        fill: fontColor,
        fontSize: fontSize
    });


    fabricCanvas1.add(itext);
    fabricCanvas1.renderAll();
}