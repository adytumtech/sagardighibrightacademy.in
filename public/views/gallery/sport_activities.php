<section>
  <div class="max-w-7xl mx-auto my-8 p-4 lg:p-0">
    <h1 class="text-3xl md:text-4xl font-bold text-gray-700 mb-8 text-center">Sports & Activities Gallery</h1>
    <div class="py-4 ">
      <h2 class="text-strat text-lg md:text-xl lg:text-2xl font-bold text-gray-700">About Sport Day</h2>
      <p class="text-sm md:text-base lg:text-lg text-justify text-gray-600">
        Don Bosco Malda’s Sports Day is a much-awaited event that promotes physical fitness, discipline, and teamwork. Students participate in track and field events, relay races, and fun games, cheered on by teachers and parents. The school grounds come alive with excitement as houses compete in a healthy and spirited manner. Through Sports Day, students learn the values of sportsmanship, perseverance, and unity. It is not just about winning but about participating with integrity and giving one’s best effort. The day ends with awards, smiles, and unforgettable memories.</p>
    </div>

    <!-- Gallery Grid -->
    <h2 class="text-strat text-lg md:text-xl lg:text-2xl font-bold text-gray-700 mb-4">Images</h2>
    <!-- Gallery Grid -->
    <div class="grid grid-cols-2 md:grid-cols-3 gap-4 px-2 md:px-0" id="gallery">

      <div><img src="<?php echo URL ?>assets/img/sports/img-0.jpg" alt="" class="gallery-image  w-full h-64 object-cover cursor-pointer shadow border-2 border-gray-800"></div>
      <div><img src="<?php echo URL ?>assets/img/sports/img-1.jpg" alt="" class="gallery-image  w-full h-64 object-cover cursor-pointer shadow border-2 border-gray-800"></div>
      <div><img src="<?php echo URL ?>assets/img/sports/img-2.jpg" alt="" class="gallery-image  w-full h-64 object-cover cursor-pointer shadow border-2 border-gray-800"></div>
      <div><img src="<?php echo URL ?>assets/img/sports/img-3.jpg" alt="" class="gallery-image w-full h-64 object-cover  cursor-pointer shadow border-2 border-gray-800"></div>
      <div><img src="<?php echo URL ?>assets/img/sports/img-4.jpg" alt="" class="gallery-image  w-full h-64 object-cover cursor-pointer shadow border-2 border-gray-800"></div>
      <div><img src="<?php echo URL ?>assets/img/sports/img-6.jpg" alt="" class="gallery-image  w-full h-64 object-cover cursor-pointer shadow border-2 border-gray-800"></div>
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