// require('./bootstrap');

import 'bootstrap/dist/css/bootstrap.css';
import * as bootstrap from 'bootstrap/dist/js/bootstrap'
import 'bootstrap-icons/font/bootstrap-icons.css';
import Chart from 'chart.js/auto';

// require('./refabric');
// require('./tools');
// require('./selectStain');
// require('./selectPaint');
// require('./addShape');
// require('./addText');
// require('./buttCapText');
// require('./buttCapMaterial');
// require('./uploadImage');

document.addEventListener('DOMContentLoaded', function(){
  //   const referenceDiv = document.getElementById('renderer');
  //   const floatingDiv = document.getElementById('floatingDiv');
    
  //   // Get the referenceDiv's position
  //   const rect = referenceDiv.getBoundingClientRect();
    

  //   floatingDiv.style.left = rect.left+20 + 'px';



  // document.querySelectorAll('input[name="radioOption"]').forEach(radio => {
  //   radio.addEventListener('change', function() {
  //     document.querySelectorAll('.active-option').forEach(active => {
  //       active.classList.remove('active-option');
  //     });
  //     this.parentElement.classList.add('active-option');
  //   });
  // });
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