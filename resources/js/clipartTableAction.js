document.addEventListener("click", function(event){
    if(event.target.parentNode.parentNode.parentNode.id === 'completed-orders'){
        document.querySelectorAll('#cliparts tbody tr').forEach(function (row) {
            // Set modal attributes for each row
            row.setAttribute('data-bs-toggle', 'modal');
            row.setAttribute('data-bs-target', '#editClipartModal');
        
            row.addEventListener('click', function () {
                var rowData = Array.from(this.cells).map(cell => cell.textContent); // Get data of the clicked row
                document.getElementById('clipart-id').innerText = rowData[0];
                document.getElementById('clipart-id-hidden').value = rowData[0];
                document.getElementById('edit-clipart-name').value = rowData[1];
                document.getElementById('edit-clipart-type').value = rowData[3].toLowerCase();
                var amount = Number(rowData[4].slice(1)); // Use slice instead of splice
                document.getElementById('edit-clipart-amount').value = amount;
        
            });
        });

    }
});