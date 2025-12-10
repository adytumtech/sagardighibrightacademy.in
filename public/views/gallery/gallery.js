document.addEventListener("DOMContentLoaded", function(){
const images = Array.from(document.querySelectorAll('.gallery-image'));
  const modal = document.getElementById('imageModal');
  const modalImage = document.getElementById('modalImage');
  let currentIndex = 0;

  // Add click event to all images
  images.forEach((img, index) => {
    img.addEventListener('click', () => {
      currentIndex = index;
      modalImage.src = img.src;
      modal.classList.remove('hidden');
      modal.classList.add('flex');
    });
  });

  // Make close/prev/next globally accessible for inline HTML onclick
  window.closeModal = function() {
    modal.classList.add('hidden');
    modal.classList.remove('flex');
  };

  window.prevImage = function() {
    currentIndex = (currentIndex - 1 + images.length) % images.length;
    modalImage.src = images[currentIndex].src;
  };

  window.nextImage = function() {
    currentIndex = (currentIndex + 1) % images.length;
    modalImage.src = images[currentIndex].src;
  };
})
