<section>
  <!-- Rathyatra -->
<div class="max-w-7xl mx-auto my-8 p-4 lg:p-0">
  <h1 class="text-3xl md:text-4xl font-bold text-gray-700 mb-8 text-center">Rathyatra</h1>
  <div class="py-4">
    <h2 class="text-start text-lg md:text-xl lg:text-2xl font-bold text-gray-700">About Rathyatra</h2>
    <p class="text-sm md:text-base lg:text-lg text-justify text-gray-600">
      The Rathyatra at Don Bosco Malda is a colorful celebration that brings tradition and devotion together. Students actively participate in decorating chariots, singing bhajans, and learning about the cultural importance of Lord Jagannath’s journey. The festival fosters spiritual growth and unity among the students while keeping the heritage alive. It’s a unique way of blending education with cultural awareness.
    </p>
  </div>
  <h2 class="text-start text-lg md:text-xl lg:text-2xl font-bold text-gray-700 mb-4">Images</h2>

    <!-- Gallery Grid -->
    <div class="grid grid-cols-2 md:grid-cols-3 gap-4 px-2 md:px-0" id="gallery">
    
     <img src="<?php echo URL?>assets/img/donbosco-events/rath.jpg" alt="" class="gallery-image w-full h-64 object-cover cursor-pointer shadow border-2 border-gray-800">
 
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
