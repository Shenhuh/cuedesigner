// require('./bootstrap');

import 'bootstrap/dist/css/bootstrap.css';
import * as bootstrap from 'bootstrap/dist/js/bootstrap'
import 'bootstrap-icons/font/bootstrap-icons.css';

require('./refabric');
require('./tools');
require('./selectStain');
require('./selectPaint');
require('./addShape');
require('./addText');
require('./buttCapText');
require('./buttCapMaterial');
require('./uploadImage');

document.addEventListener('DOMContentLoaded', function(){
    const referenceDiv = document.getElementById('canvas1');
    const floatingDiv = document.getElementById('floatingDiv');
    
    // Get the referenceDiv's position
    const rect = referenceDiv.getBoundingClientRect();
    

    floatingDiv.style.left = rect.left + 'px';
})