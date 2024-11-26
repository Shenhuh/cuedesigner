document.querySelectorAll('#shapesTable tbody tr').forEach(function (row) {
    // Set modal attributes for each row
    row.setAttribute('data-bs-toggle', 'modal');
    row.setAttribute('data-bs-target', '#editShapeccModal');

    row.addEventListener('click', function () {
        // // Example of updating modal fields with row data
        // const rowData = Array.from(this.cells).map(cell => cell.textContent.trim());

        // document.getElementById('shape-id').innerText = rowData[0];
        // document.getElementById('shape-id-hidden').value = rowData[0];
        // document.getElementById('edit-shape-name').value = rowData[1];
        
        // const amount = parseFloat(rowData[3].slice(1)); // Assuming rowData[3] is a currency value
        // document.getElementById('edit-shape-amount').value = amount;
    });
});
