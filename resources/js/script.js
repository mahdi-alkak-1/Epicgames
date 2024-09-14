const menuToggle = document.querySelector('#mobile-btn')
const mobileMenu = document.querySelector('#mobile-menu')

menuToggle.addEventListener('click', () => {
    mobileMenu.classList.toggle('hidden');
});

// Function to initialize the slideshow
function initializeSlideshow(slideshowId) {
    const images = document.querySelectorAll(`#${slideshowId} img`);
    let currentIndex = 0;

    function showNextImage() {
        images[currentIndex].classList.remove('opacity-100'); // Hide current image
        images[currentIndex].classList.add('opacity-0');

        currentIndex = (currentIndex + 1) % images.length; // Move to next image and loop

        images[currentIndex].classList.remove('opacity-0'); // Show next image
        images[currentIndex].classList.add('opacity-100');
    }

    // Initially show the first image
    images[currentIndex].classList.remove('opacity-0');
    images[currentIndex].classList.add('opacity-100');

    // Set an interval to change the image every 3 seconds (3000 ms)
    setInterval(showNextImage, 3000);
}

// Initialize the small screen slideshow
initializeSlideshow('slideshow-small');

// Initialize the medium and large screen slideshow
initializeSlideshow('slideshow-large');
//animation
var animation1 = lottie.loadAnimation({
    container: document.getElementById('joystick'),
    renderer: 'svg',
    loop: true,
    autoplay: true,
    path: './animations/joystick.json'
});

 // Handle the click event on the joystick animation

 document.getElementById('joystick').addEventListener('click', function() {
    var popup = document.getElementById('popup-message');
    popup.style.display = 'block'; // Show the pop-up message

    //Hide the message after 3 seconds
    setTimeout(function() {
       popup.style.display = 'none';
    }, 3000);
});


