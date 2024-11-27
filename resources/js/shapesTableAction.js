document.addEventListener("click", function(event) {
    // Check if a table row in the #shapesTable is clicked
    const clickedRow = event.target.closest('tr.shapeData');
    if (clickedRow) {
        const rowData = Array.from(clickedRow.cells).map(cell => cell.textContent.trim());

        // Populate the modal fields
        document.getElementById('shape-id').innerText = rowData[0];
        document.getElementById('shape-id-hidden').value = rowData[0];
        document.getElementById('edit-shape-name').value = rowData[1];
        document.getElementById('edit-shape-data').value = rowData[2];
        document.getElementById('edit-shape-amount').value = parseFloat(rowData[3].replace('$', '')); // Remove '$' and convert to number

        // If you want to update the modal dynamically for more fields, add logic here.
    }
});
