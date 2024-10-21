// require('./bootstrap');

import * as bootstrap from 'bootstrap/dist/js/bootstrap'
import Chart from 'chart.js/auto';
import DataTable from 'datatables.net-bs5';
import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap-icons/font/bootstrap-icons.css';
import 'datatables.net-bs5/css/dataTables.bootstrap5.css'; // Bootstrap 5 styling
 

require('./addTexture');
document.addEventListener('DOMContentLoaded', function(){

    let ongoingOrdersDashboard = new DataTable('#ongoing-orders-dashboard', {
        responsive: true
    });

    let ongoingOrders = new DataTable('#ongoing-orders', {
        responsive: true
    });

    let completedOrders = new DataTable('#completed-orders', {
        responsive: true
    });
    var myChart;


    function closeSidebarOnClick(e) {
        const sidebar = document.querySelector('.sidebar-mobile');
        const toggleSidebar = document.querySelector('.toggle-sidebar-mobile');
        if (sidebar && !sidebar.contains(e.target) && !toggleSidebar.contains(e.target)) {
            sidebar.classList.add('collapsed');
        }
    }
    
    function toggleSidebarOnMobile() {
        const sidebar = document.querySelector('.sidebar-mobile');
        if (sidebar) {
            // Toggle the collapsed class to open/close the sidebar
            sidebar.classList.toggle('collapsed');
        }
    }
    
    function handleResize() {
        const isMobile = window.innerWidth <= 1024;  // Adjust breakpoint as needed
        const sidebar = document.getElementById('sidebar');
        const toggleSidebarButton = document.getElementById("toggleSidebar");
    
        if (isMobile) {
            sidebar.classList.add('sidebar-mobile');
            toggleSidebarButton.classList.add('toggle-sidebar-mobile');
            toggleSidebarButton.classList.remove('d-none');
            document.querySelector('.top-nav').classList.add('shadow');
            document.getElementById('app').classList.remove('d-flex');
            document.querySelector('.dashboard-text').classList.add('d-none');
            // Ensure the event listener is added in mobile view
            document.addEventListener("click", closeSidebarOnClick);
    
            // Add event listener to toggle button for opening/closing sidebar
            toggleSidebarButton.addEventListener("click", toggleSidebarOnMobile);
        } else {
            sidebar.classList.remove('sidebar-mobile');
            toggleSidebarButton.classList.remove('toggle-sidebar-mobile');
            toggleSidebarButton.classList.add('d-none');
            document.querySelector('.top-nav').classList.remove('shadow');
            sidebar.classList.remove('collapsed');
            document.getElementById('app').classList.add('d-flex');
            document.querySelector('.dashboard-text').classList.remove('d-none');
            // Remove the event listener in desktop view
            document.removeEventListener("click", closeSidebarOnClick);
    
            // Remove the toggle button event listener when not in mobile view
            toggleSidebarButton.removeEventListener("click", toggleSidebarOnMobile);
        }
        setTimeout(() => {
            
            myChart.options.aspectRatio = getAspectRatio();
            myChart.update();
            console.log(getAspectRatio())
        }, 1000);
    }
    

    
    
    
    window.addEventListener('resize', handleResize);
    


    function getAspectRatio() {
        var val;
        if(window.innerWidth >= 1024){
            val = 2;
        }
        else{
            val = 1;
        }
        return  val; // 768px is commonly used as a breakpoint for desktop
    }


    function loadChart(data) {
        setTimeout(() => {
            var ctx;
            if (document.getElementById('myChart')) {
                ctx = document.getElementById('myChart').getContext('2d'); // Ensure 'myChart' matches the ID of your canvas
                
            }
            // Destroy existing chart instance if it exists
            if (myChart) {
                myChart.destroy();
            }

            if(ctx){

                myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: data.labels, 
                        datasets: [{
                            label: 'My Dataset',
                            data: data.values, // Your chart data
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                    responsive: true,
                    aspectRatio: getAspectRatio(),
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            }
        }, 1000);
    }
    const chartData = {
        labels: ['Label 1', 'Label 2', 'Label 3'], 
        values: [12, 19, 3] 
    };
    loadChart(chartData); 
  
    function loadContent(contentType) {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', `${window.baseUrl}/${contentType}`, true); // Use the base URL
    
        xhr.onload = function() {
            if (xhr.status >= 200 && xhr.status < 300) {
                document.getElementById('content-panel').innerHTML = xhr.responseText;
    
                // Assuming the response contains chart data
                const chartData = {
                    labels: ['Label 1', 'Label 2', 'Label 3'], // Replace with your labels
                    values: [12, 19, 3] // Replace with your values
                };
                loadChart(chartData); // Call loadChart with the data
                ongoingOrdersDashboard = new DataTable('#ongoing-orders-dashboard', {
                    responsive: true
                });

                ongoingOrders = new DataTable('#ongoing-orders', {
                    responsive: true
                });

                completedOrders = new DataTable('#completed-orders', {
                    responsive: true
                });
                
                let orders = new DataTable('#orders', {
                    responsive: true
                });
                
            } else {
                console.error('Request failed. Status:', xhr.status);
            }
        };
    
        xhr.onerror = function() {
            console.error('Network Error');
        };
    
        xhr.send();
    }
    
   
    var sidebarItems = document.querySelectorAll('.sidebar-link');

    // Function to remove active class from all sidebar items
    function removeActiveClass() {
        sidebarItems.forEach(function(item) {
            item.classList.remove('active'); // Adjust this class name as per your CSS
        });
    }

    // Add click event listeners to sidebar items
    sidebarItems.forEach(function(item) {
        item.addEventListener('click', function() {
            // Remove active class from all items
            removeActiveClass();

            // Add active class to the clicked item
            item.classList.add('active'); // Adjust this class name as per your CSS
            
            // Load the content for the clicked item
            loadContent(item.dataset.id);
        });
    });

  
    handleResize();

})