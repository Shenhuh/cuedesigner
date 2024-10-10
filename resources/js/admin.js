// require('./bootstrap');

import 'bootstrap/dist/css/bootstrap.css';
import * as bootstrap from 'bootstrap/dist/js/bootstrap'
import 'bootstrap-icons/font/bootstrap-icons.css';
import Chart from 'chart.js/auto';


document.addEventListener('DOMContentLoaded', function(){



    // const toggleSidebar = document.getElementById('toggleSidebar');
    // const sidebar = document.getElementById('sidebar');

    // // Toggle the sidebar when the toggle button is clicked
    // toggleSidebar.addEventListener('click', function (e) {
    //     e.stopPropagation(); // Prevent the click event from bubbling up
    //     sidebar.classList.toggle('collapsed');
    // });

    // Close the sidebar if the user clicks outside of it
    // Function to toggle the click event based on viewport size

  

    // Media query to check if the screen width is below or equal to 1024px
    // const isMobile = window.matchMedia('(max-width: 1024px)').matches;
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

        myChart.options.aspectRatio = getAspectRatio();
        myChart.update();
        console.log(getAspectRatio())
    }
    
    // Initial check when the script loads
    
    
    // Add a resize event listener to update behavior when resizing
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
        responsive: true,
        aspectRatio: getAspectRatio(),
        scales: {
            y: {
                beginAtZero: true
            }
        }
      }
  });

  
  handleResize();

})