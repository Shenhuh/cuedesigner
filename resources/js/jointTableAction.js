document.addEventListener("click", function(event){
    if(event.target.parentNode.parentNode.parentNode.id === 'joint'){
        document.querySelectorAll('#joint tbody tr').forEach(function (row) {
            // Set modal attributes for each row
            row.setAttribute('data-bs-toggle', 'modal');
            row.setAttribute('data-bs-target', '#editJointModal');
        
            row.addEventListener('click', function () {
                var rowData = Array.from(this.cells).map(cell => cell.textContent); // Get data of the clicked row
                document.getElementById('joint-id').innerText = rowData[0];
                document.getElementById('joint-id-hidden').value = rowData[0];
                document.getElementById('edit-joint-name').value = rowData[1];
            
                
                // Remove the first character from rowData[4] (as a string) and convert to number
                var amount = Number(rowData[3].slice(1)); // Use slice instead of splice
                document.getElementById('edit-joint-amount').value = amount;
        
            });
        });

    }
});