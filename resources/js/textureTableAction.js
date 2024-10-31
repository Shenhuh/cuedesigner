document.addEventListener("click", function(event){
    if(event.target.parentNode.parentNode.parentNode.id === 'textures'){
        document.querySelectorAll('#textures tbody tr').forEach(function (row) {
            // Set modal attributes for each row
            row.setAttribute('data-bs-toggle', 'modal');
            row.setAttribute('data-bs-target', '#editTextureModal');
        
            row.addEventListener('click', function () {
                var rowData = Array.from(this.cells).map(cell => cell.textContent); // Get data of the clicked row
                document.getElementById('texture-id').innerText = rowData[0];
                document.getElementById('texture-id-hidden').value = rowData[0];
                document.getElementById('edit-texture-name').value = rowData[1];
                document.getElementById('edit-texture-type').value = rowData[3];
                
                // Remove the first character from rowData[4] (as a string) and convert to number
                var amount = Number(rowData[4].slice(1)); // Use slice instead of splice
                document.getElementById('edit-texture-amount').value = amount;
        
            });
        });

    }
});