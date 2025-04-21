// Sticky Navigation Bar with blur effect
window.onscroll = function() {
    stickyNavbar();
  };
  
  var navbar = document.querySelector('header');
  var sticky = navbar.offsetTop;
  
  function stickyNavbar() {
    if (window.pageYOffset > sticky) {
      navbar.classList.add('sticky');
    } else {
      navbar.classList.remove('sticky');
    }
  }
  
  // Simple form validation
  document.getElementById('contact-form').addEventListener('submit', function(event) {
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const message = document.getElementById('message').value;
  
    if (!name || !email || !message) {
      event.preventDefault();
      alert("Please fill out all fields.");
    }
  });
  