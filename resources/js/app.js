// require('./bootstrap');

import 'bootstrap/dist/css/bootstrap.css';
import * as bootstrap from 'bootstrap/dist/js/bootstrap'
import 'bootstrap-icons/font/bootstrap-icons.css';
import Chart from 'chart.js/auto';

require('./refabric');
require('./tools');
require('./selectStain');
require('./selectPaint');
require('./addShape');
require('./addText');
require('./buttCapText');
require('./buttCapMaterial');
require('./uploadImage');
require('./displayClipart');
document.addEventListener('DOMContentLoaded', function(){
    const referenceDiv = document.getElementById('renderer');
    const floatingDiv = document.getElementById('floatingDiv');
    
    // Get the referenceDiv's position
    const rect = referenceDiv.getBoundingClientRect();
    

    floatingDiv.style.left = rect.left+20 + 'px';



  document.querySelectorAll('input[name="radioOption"]').forEach(radio => {
    radio.addEventListener('change', function() {
      document.querySelectorAll('.active-option').forEach(active => {
        active.classList.remove('active-option');
      });
      this.parentElement.classList.add('active-option');
    });
  });


   




})