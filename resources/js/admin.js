// require('./bootstrap');

import 'bootstrap/dist/css/bootstrap.css';
import * as bootstrap from 'bootstrap/dist/js/bootstrap'
import 'bootstrap-icons/font/bootstrap-icons.css';
import Chart from 'chart.js/auto';


document.addEventListener('DOMContentLoaded', function(){


  var toggleButton = document.getElementById('toggleSidebar');
  var toggleIcon = document.getElementById('toggleSidebarIcon');
  var sidebar = document.getElementById('sidebar');

  toggleButton.addEventListener('click', function() {
    sidebar.classList.toggle('d-none');  
    sidebar.classList.toggle('collapsed');
    

    if (sidebar.classList.contains('collapsed')) {
        toggleIcon.classList.remove('bi-x-lg'); // Change back to list icon when expanding
        toggleIcon.classList.add('bi-list');
    } else {
        toggleIcon.classList.remove('bi-list');
        toggleIcon.classList.add('bi-x-lg');
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