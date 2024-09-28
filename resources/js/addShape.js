import { fabricCanvas1 } from "./refabric";


document.addEventListener('DOMContentLoaded', function(){
  document.getElementById('add-shape').addEventListener('click', function(event){
    // const polygonData = event.dataset.polygon;
    const strokeColor = document.getElementById('stroke-color').value;
    const fillColor = document.getElementById('fill-color').value;
    const strokeWidth = document.getElementById('stroke-width').value;
    var left;
    var top;

    addShape(polygonData, left, top, fillColor, strokeColor, strokeWidth);
   
  });
});

function addShape(polygonData, left, top,fillColor, strokeColor, strokeWidth){
  var polygon = new fabric.Polygon([polygonData], {
      left: left,
      top: top,
      fill: fillColor,
      strokeColor: strokeColor,
      strokeWidth: strokeWidth,
  });

  fabricCanvas1.add(polygon);
}