import { fabricCanvas1 } from "./refabric";


document.addEventListener('DOMContentLoaded', function(){
  document.getElementById('add-shape').addEventListener('click', function(event){
    // const polygonData = event.dataset.polygon;
    const strokeColor = document.getElementById('stroke-color').value;
    const fillColor = document.getElementById('fill-color').value;
    const strokeWidth = document.getElementById('stroke-width').value;

    var polygon = new fabric.Polygon([polygonData], {
        left: 0,
        top: 0,
        fill: fillColor,
        strokeColor: strokeColor,
        strokeWidth: strokeWidth,
    });

    fabricCanvas1.add(polygon);
  });
});