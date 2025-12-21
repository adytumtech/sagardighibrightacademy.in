<section>
  
    <!-- Grandparents Day -->
    <div class="max-w-7xl mx-auto my-8 p-4 lg:p-0">
      <h1 class="text-3xl md:text-4xl font-bold text-gray-700 mb-8 text-center">Grandparents Day</h1>
      <div class="py-4">
        <h2 class="text-start text-lg md:text-xl lg:text-2xl font-bold text-gray-700">About Grandparents Day</h2>
        <p class="text-sm md:text-base lg:text-lg text-justify text-gray-600">
          Don Bosco Malda hosts a heartwarming Grandparents Day to honor the love, wisdom, and support of our students’ grandparents. The event includes interactive games, performances, and storytelling sessions, creating a joyful bond between generations. Grandparents are welcomed with open arms and warm hearts, making them feel cherished and respected. It is a day of laughter, memories, and celebration of family values that strengthen the school’s community spirit.
        </p>
      </div>
      <h2 class="text-start text-lg md:text-xl lg:text-2xl font-bold text-gray-700 mb-4">Images</h2>

    <!-- Gallery Grid -->
    <div class="grid grid-cols-2 md:grid-cols-3 gap-4 px-2 md:px-0" id="gallery">

      <div><img src="<?php echo URL ?>assets/img/grandparents/img-2.jpg" alt="" class="gallery-image w-full h-64 object-cover cursor-pointer shadow border-2 border-gray-800"></div>
      <div><img src="<?php echo URL ?>assets/img/grandparents/img-3.jpg" alt="" class="gallery-image w-full h-64 object-cover cursor-pointer shadow border-2 border-gray-800"></div>
      <div><img src="<?php echo URL ?>assets/img/grandparents/img-4.jpg" alt="" class="gallery-image w-full h-64 object-cover cursor-pointer shadow border-2 border-gray-800"></div>

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