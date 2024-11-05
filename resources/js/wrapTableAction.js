document.addEventListener("click", function(event){
    if(event.target.parentNode.parentNode.parentNode.id === 'wraps'){
        document.querySelectorAll('#wraps tbody tr').forEach(function (row) {
            // Set modal attributes for each row
            row.setAttribute('data-bs-toggle', 'modal');
            row.setAttribute('data-bs-target', '#editWrapModal');
        
            row.addEventListener('click', function () {
                var rowData = Array.from(this.cells).map(cell => cell.textContent); // Get data of the clicked row
                document.getElementById('wrap-id').innerText = rowData[0];
                document.getElementById('wrap-id-hidden').value = rowData[0];
                document.getElementById('edit-wrap-name').value = rowData[1];
                document.getElementById('edit-wrap-type').value = rowData[3];
                
                // Remove the first character from rowData[4] (as a string) and convert to number
                var amount = Number(rowData[4].slice(1)); // Use slice instead of splice
                document.getElementById('edit-wrap-amount').value = amount;
        
            });
        });

    }
});