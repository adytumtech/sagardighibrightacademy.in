
<?php /* our_teachers Page - Sagardighi Bright Academy */ ?>

<!-- Hero Section -->
<section class="relative hero-section h-[300px] bg-dark-9 bg-cover bg-center flex items-center justify-center" style="background-image:url(<?php echo URL ?>assets/img/hero_img.jpg)">
  <div class="relative container mx-auto px-4  z-20">

    <div class="flex flex-col items-center justify-center text-white text-center">
      <h1 class="text-2xl md:text-4xl font-bold  bg-red-700 px-5 py-2">Our Teachers</h1>
    </div>
  </div>
</section>


<!-- Teachers Section -->
<section class="py-12 sm:py-16 bg-gray-50">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    <!-- Heading -->
    <div class="text-center mb-10 sm:mb-14 lg:mb-16">
      <p class="mt-4 sm:mt-6 
               text-sm sm:text-base md:text-lg
               text-gray-700 max-w-3xl mx-auto">
        Meet our passionate educators who inspire, guide, and empower students
        to achieve academic excellence and lifelong success.
      </p>
    </div>

    <!-- Teachers Grid -->
    <div id="teachersGrid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10">

     
      <!-- Same structure will repeat via API -->

    </div>

  </div>
</section>



<!-- Script -->
<script>
  async function loadTeachers() {
    const grid = document.getElementById("teachersGrid");

    // Loading state
    grid.innerHTML = `
      <div class="col-span-full text-center text-gray-500">
        Loading teachers...
      </div>
    `;

    try {
      const response = await fetch("<?php echo URL ?>about/getTeachers");

      if (!response.ok) {
        throw new Error("Network error");
      }

      const result = await response.json();

      // API-level error check
      if (!result.success || !Array.isArray(result.data)) {
        throw new Error("Invalid API response");
      }

      const teachers = result.data;

      if (teachers.length === 0) {
        grid.innerHTML = `
          <div class="col-span-full text-center text-gray-500">
            No teachers found.
          </div>
        `;
        return;
      }

     grid.innerHTML = "";

teachers.forEach((teacher) => {
  grid.innerHTML += `
    <div class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition duration-300 overflow-hidden">

      <!-- Image -->
      <div class="relative pt-10 flex justify-center">
        
        <!-- Gradient Circle Border -->
        <div class="w-36 h-36 rounded-full bg-gradient-to-r from-red-500 via-red-500 to-blue-800 p-1
                    group-hover:scale-105 transition duration-300">

          <!-- Actual Image -->
          <img src="${teacher.image_path}" alt="${teacher.employee_name}"
            class="w-full h-full rounded-full object-cover bg-white"/>
        
        </div>

      </div>

      <!-- Content -->
      <div class="text-center px-6 py-8">
        <h3 class="text-xl font-bold text-blue-900">
          ${teacher.employee_name}
        </h3>

        <p class="text-blue-600 font-medium mt-1">
          ${teacher.designation}
        </p>

        <p class="text-gray-600 mt-3 text-sm leading-relaxed">
          Qualification:
          <span class="font-medium">
            ${teacher.qualification}
          </span>
        </p>
      </div>

    </div>
  `;
});



    } catch (error) {
      console.error("Teacher Load Error:", error);
      grid.innerHTML = `
        <div class="col-span-full text-center text-red-600">
          Failed to load teachers. Please try again later.
        </div>
      `;
    }
  }

  document.addEventListener("DOMContentLoaded", loadTeachers);
</script>