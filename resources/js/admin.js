// require('./bootstrap');

import 'bootstrap/dist/css/bootstrap.css';
import * as bootstrap from 'bootstrap/dist/js/bootstrap'
import 'bootstrap-icons/font/bootstrap-icons.css';
import Chart from 'chart.js/auto';


document.addEventListener('DOMContentLoaded', function(){



    const toggleSidebar = document.getElementById('toggleSidebar');
    const sidebar = document.getElementById('sidebar');

    // Toggle the sidebar when the toggle button is clicked
    toggleSidebar.addEventListener('click', function (e) {
        e.stopPropagation(); // Prevent the click event from bubbling up
        sidebar.classList.toggle('collapsed');
    });

    // Close the sidebar if the user clicks outside of it
    document.addEventListener("click", function (e) {
        // Check if the clicked element is not the sidebar or the toggle button
        if (!sidebar.contains(e.target) && !toggleSidebar.contains(e.target)) {
            sidebar.classList.add('collapsed');
        }
    });



  const ctx = document.getElementById('myChart').getContext('2d');
  const myChart = new Chart(ctx, {
      type: 'bar',
      data: {
          labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
          datasets: [{
              label: '# of Votes',
              data: [12, 19, 3, 5, 2, 3],
              backgroundColor: [
                  'rgba(255, 99, 132, 0.2)',
                  'rgba(54, 162, 235, 0.2)',
                  'rgba(255, 206, 86, 0.2)',
                  'rgba(75, 192, 192, 0.2)',
                  'rgba(153, 102, 255, 0.2)',
                  'rgba(255, 159, 64, 0.2)'
              ],
              borderColor: [
                  'rgba(255, 99, 132, 1)',
                  'rgba(54, 162, 235, 1)',
                  'rgba(255, 206, 86, 1)',
                  'rgba(75, 192, 192, 1)',
                  'rgba(153, 102, 255, 1)',
                  'rgba(255, 159, 64, 1)'
              ],
              borderWidth: 1
          }]
      },
      options: {
          scales: {
              y: {
                  beginAtZero: true
              }
          }
      }
  });

})