<section>
  <!-- Rabindra Jayanti -->
<div class="max-w-7xl mx-auto my-8 p-4 lg:p-0">
  <h1 class="text-3xl md:text-4xl font-bold text-gray-700 mb-8 text-center">Rabindra Jayanti</h1>
  <div class="py-4">
    <h2 class="text-start text-lg md:text-xl lg:text-2xl font-bold text-gray-700">About Rabindra Jayanti</h2>
    <p class="text-sm md:text-base lg:text-lg text-justify text-gray-600">
      Each year, Don Bosco Malda joyfully celebrates Rabindra Jayanti, honoring the birth anniversary of Nobel laureate Rabindranath Tagore. The school organizes cultural programs where students perform songs, dances, and recitations based on Tagore’s works. The event reflects the deep respect for Bengali heritage and literary brilliance. Through these performances, students connect with Tagore’s vision of art, freedom, and education. The atmosphere is filled with creativity, inspiration, and a sense of cultural pride.
    </p>
  </div>
  <h2 class="text-start text-lg md:text-xl lg:text-2xl font-bold text-gray-700 mb-4">Images</h2>

    <!-- Gallery Grid -->
    <div class="grid grid-cols-2 md:grid-cols-3 gap-4 px-2 md:px-0" id="gallery">
      <div><img src="<?php echo URL?>assets/img/donbosco-events/rabindra jayanti.jpg" alt="" class="gallery-image w-full h-64 object-cover cursor-pointer shadow border-2 border-gray-800"></div>
      
      <!-- Add unlimited more images below -->
       
    </div>
  </div>
</section>

<!-- Modal -->
<div id="imageModal" class="fixed inset-0 bg-black bg-opacity-80 z-50 hidden items-center justify-center">
  <button onclick="closeModal()" class="absolute top-4 right-4 text-white text-3xl font-bold">&times;</button>
  <button onclick="prevImage()" class="absolute left-4 text-white text-4xl font-bold">&#10094;</button>
  <img id="modalImage" src="" class="max-w-[90%] max-h-[90%] border-4 border-white rounded shadow-xl transition-all duration-300" />
  <button onclick="nextImage()" class="absolute right-4 text-white text-4xl font-bold">&#10095;</button>
</div>
