document.querySelectorAll('#textures tbody tr').forEach(function (row) {
    // Set modal attributes for each row
    row.setAttribute('data-bs-toggle', 'modal');
    row.setAttribute('data-bs-target', '#editTextureModal');

    row.addEventListener('click', function () {
        var rowData = Array.from(this.cells).map(cell => cell.textContent); // Get data of the clicked row
        document.getElementById('texture-id').innerText = rowData[0];
    });
});
