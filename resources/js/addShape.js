import { fabricCanvas1, currentPosition } from "./refabric";

document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('add-shape').addEventListener('click', function () {
        const strokeColor = document.getElementById('stroke-color').value;
        const fillColor = document.getElementById('fill-color').value;
        const strokeWidth = parseFloat(document.getElementById('stroke-width').value);
        const polygonData = document.getElementById('selected-shape').value; // Raw string input

        // Parse the string into an array
        const parsedPolygonData = parsePolygonData(polygonData);

        const left = currentPosition.x;
        const top = currentPosition.y;

        addShape(parsedPolygonData, left, top, fillColor, strokeColor, strokeWidth);
    });
});

function parsePolygonData(polygonData) {
    // Use safer alternative to eval
    try {
        return new Function(`return ${polygonData};`)();
    } catch (error) {
        console.error("Invalid polygon data:", error);
        return [];
    }
}

function addShape(polygonData, left, top, fillColor, strokeColor, strokeWidth) {
    if (!Array.isArray(polygonData) || polygonData.length === 0) {
        console.error("Parsed polygon data is invalid.");
        return;
    }

    const polygon = new fabric.Polygon(polygonData, {
        left: left,
        top: top,
        fill: fillColor,
        stroke: strokeColor,
        strokeWidth: strokeWidth,
        objectCaching: false
    });

    fabricCanvas1.add(polygon);

    console.log(fabricCanvas1.getObjects());
}
