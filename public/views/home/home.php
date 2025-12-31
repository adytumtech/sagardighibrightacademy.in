<?php if ($_SERVER['REQUEST_URI'] == $_SERVER['PHP_SELF']) header("Location: home"); ?>


<!-- Banner Modal -->
<!-- <div id="bannerModal" class="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center z-[9998] hidden">
  <div class="relative max-w-4xl w-full mx-4 max-h-[90vh]">
    <button id="closeBannerModal" class="absolute top-0 right-0 text-white bg-red-600 rounded-full  w-8 md:w-16 h-8 md:h-16 flex items-center justify-center z-50 hover:bg-red-700">
      <span class="text-xl lg:text-4xl">&times;</span>
    </button>
    <img src="<?php echo URL ?>assets/img/sagardighi-poster.jpeg" class="w-full cursor-pointer h-auto max-h-[90vh] object-contain rounded-lg" alt="Don Bosco Banner">
  </div>

</div> -->

<main class=" flex flex-col bg-white z-10">
  <!-- Hero Section -->
  <section class="w-full relative">
    <!-- Hero Carousel -->
    <div id="hero-carousel" class="relative w-full overflow-hidden">
      <div id="carousel-images" class="relative w-full h-[40vh] md:h-[60vh] lg:h-[80vh]">

        <div class="absolute inset-0 w-full h-full transition-opacity duration-1000 ease-in-out opacity-100">
          <img src="<?php echo URL ?>assets/img/hero-images/img1.jpg" alt="Hero Image 1" class="w-full h-full object-cover">
        </div>
        <div class="absolute inset-0 w-full h-full transition-opacity duration-1000 ease-in-out opacity-100">
          <img src="<?php echo URL ?>assets/img/hero-images/img2.jpg" alt="Hero Image 2" class="w-full h-full object-cover">
        </div>
        <div class="absolute inset-0 w-full h-full transition-opacity duration-1000 ease-in-out opacity-100">
          <img src="<?php echo URL ?>assets/img/hero-images/img3.jpg" alt="Hero Image 3" class="w-full h-full object-cover">
        </div>
        <div class="absolute inset-0 w-full h-full transition-opacity duration-1000 ease-in-out opacity-100">
          <img src="<?php echo URL ?>assets/img/hero-images/img4.jpg" alt="Hero Image 4" class="w-full h-full object-cover">
        </div>
        <div class="absolute inset-0 w-full h-full transition-opacity duration-1000 ease-in-out opacity-100">
          <img src="<?php echo URL ?>assets/img/hero-images/img5.jpg" alt="Hero Image 5" class="w-full h-full object-cover">
        </div>
        <!-- <div class="absolute inset-0 w-full h-full transition-opacity duration-1000 ease-in-out opacity-100">
          <img src="<?php echo URL ?>assets/img/hero-images/img.jpg" alt="Hero Image 6" class="w-full h-full object-cover">
        </div> -->
        


      </div>

      <!-- Navigation Buttons -->
      <button id="carousel-prev" class="absolute left-2 top-1/2 -translate-y-1/2 bg-[#00143B]/80 text-white rounded-none w-10 h-10 md:w-14 md:h-14 flex items-center justify-center p-0 hover:bg-[#00143B] z-20 transition-all duration-300">
        <i class="fa-solid fa-chevron-left"></i>
      </button>

      <button id="carousel-next" class="absolute right-2 top-1/2 -translate-y-1/2 bg-[#00143B]/80 text-white rounded-none w-10 h-10 md:w-14 md:h-14 flex items-center justify-center p-0 hover:bg-[#00143B] z-20 transition-all duration-300">
        <i class="fa-solid fa-chevron-right"></i>
      </button>

      <!-- Indicators -->
      <div class="absolute bottom-4 left-1/2 -translate-x-1/2 flex gap-2 z-20" id="carousel-indicators">
        <span class="w-3 h-3 bg-blue-800 rounded-sm inline-block cursor-pointer opacity-80 transition-all duration-300" data-index="0"></span>
        <span class="w-3 h-3 bg-white rounded-sm inline-block cursor-pointer opacity-80 transition-all duration-300" data-index="1"></span>
        <span class="w-3 h-3 bg-white rounded-sm inline-block cursor-pointer opacity-80 transition-all duration-300" data-index="2"></span>
        <span class="w-3 h-3 bg-white rounded-sm inline-block cursor-pointer opacity-80 transition-all duration-300" data-index="2"></span>
        <span class="w-3 h-3 bg-white rounded-sm inline-block cursor-pointer opacity-80 transition-all duration-300" data-index="2"></span>
       

      </div>
    </div>
  </section>

  <div class="relative w-full bg-cover bg-center bg-[#173572] backdrop-blur-md">
    <div class="flex flex-wrap items-center justify-evenly w-full text-white min-h-[80px] md:min-h-[120px] px-4 py-4 bg-white/10 backdrop-blur-md border border-white/30 shadow-xl rounded-xl mx-auto max-w-7xl">


      <section class="px-2 md:px-10 lg:px-20 py-4 md:py-6 w-full">
        <div class="w-full">
          <div class="bg-white rounded-lg shadow-lg p-4 md:p-5 border border-blue-100">
            <h2 class="text-lg md:text-xl lg:text-xl font-bold text-blue-800 mb-4 md:mb-6 text-start">Admission Enquiry -</h2>

            <form id="admission_enquiry_form" method="POST" data-ajax-url="<?php echo URL ?>home/submitEnquiry" class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-3 gap-2 md:gap-4 items-center">
              <div>
                <label for="guardian_name" class="block text-xs sm:text-sm font-medium text-gray-700 mb-1">Guardian Name <span class="text-red-500">*</span></label>
                <input type="text" id="guardian_name" name="guardian_name" placeholder="Enter Guardian's Name" class="w-full text-gray-700 px-2 py-1 text-sm md:px-3 md:py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent guardian-name-input">
                <p class="text-red-500 text-xs md:text-sm guardian_name_error hidden">Please enter guardian's name</p>
              </div>

              <div>
                <label for="child_name" class="block text-xs sm:text-sm font-medium text-gray-700 mb-1">Child Name <span class="text-red-500">*</span></label>
                <input type="text" id="child_name" name="child_name" placeholder="Enter Child's Name" class="w-full px-2 py-1 text-gray-700 text-sm md:px-3 md:py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent child-name-input">
                <p class="text-red-500 text-xs md:text-sm child_name_error hidden">Please enter child's name</p>
              </div>

              <div>
                <label for="phone_number" class="block text-xs sm:text-sm font-medium  text-gray-700 mb-1">Phone Number <span class="text-red-500">*</span></label>
                <input type="tel" id="phone_number" name="phone_number" placeholder="Enter 10-digit Phone Number" class="w-full px-2 py-1 text-gray-700 text-sm md:px-3 md:py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent phone-input">
                <p class="text-red-500 text-xs md:text-sm phone_error hidden">Please enter a valid 10-digit phone number</p>
              </div>

              <div class="lg:col-span-4">
                <label for="enquiry_details" class="block text-xs sm:text-sm font-medium text-gray-700 mb-1">Enquiry Details</label>
                <textarea id="enquiry_details" name="enquiry_details" placeholder="Enter your enquiry details (optional)" class="w-full px-2 py-1 text-gray-700 text-sm md:px-3 md:py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent enquiry_details_input h-16"></textarea>
              </div>

              <div class="lg:col-span-4">
                <button type="submit" class="bg-blue-600 w-full self-end px-2 py-2 mt-2  rounded-md hover:bg-blue-700 transition duration-300 font-medium shadow-md hover:shadow-lg submit-btn">
                  Submit
                </button>
              </div>
            </form>
          </div>
        </div>
      </section>

    </div>

  </div>



  <!-- about -->
  <section class="px-2 md:px-10 lg:px-20 py-6 md:py-0 h-auto lg:h-[68vh]">
    <div class="flex flex-col md:flex-row gap-6 md:gap-10 lg:h-full ">
      <div class="w-full md:w-2/3 flex flex-col justify-between bg-white pt-5 lg:h-full ">
        <div>
          <h2 class="text-blue-900 text-lg md:text-2xl font-bold mb-2">ABOUT US</h2>

          <p class="text-sm md:text-md lg:text-lg text-justify text-gray-600">
                      SAGARDIGHI BRIGHT ACADEMY, established in 2007, is a dedicated educational institution committed to providing quality education in a nurturing and inclusive environment. Located in the rural region of Sagardighi, Murshidabad, the school focuses on building strong academic foundations while promoting discipline, responsibility, and moral values among student
          <p class="text-sm md:text-md lg:text-lg text-justify text-gray-600 mt-4">
                      The academy offers education from pre-primary to secondary level with Bengali as the medium of instruction and is affiliated to the West Bengal Board of Secondary Education, Calcutta, for secondary education, and the West Bengal Council of Higher Secondary Education, Calcutta, for higher secondary education. With committed teachers, well-maintained classrooms, and essential learning facilities, the school encourages curiosity, creativity, and continuous growth. Equal emphasis is given to academic learning and character development to help students gain confidence and clarity in their goals.
          <p class="text-sm md:text-md lg:text-lg text-justify text-gray-600 mt-4">
                      Guided by the belief that education shapes a brighter future, SAGARDIGHI BRIGHT ACADEMY strives to nurture responsible, knowledgeable, and compassionate individuals. The institution remains devoted to empowering students with values, skills, and education that prepare them to contribute positively to society.        </div>

      </div>
      <div class="w-full h-[70vh] md:h-full md:w-1/3 bg-blue-200 p-4 shadow">
        <h3 class="text-base md:text-lg lg:text-xl bg-red-600 font-semibold mb-2 text-white text-center"> Notice Board</h3>
        <div class="overflow-hidden h-[60vh] w-full relative" id="noticeScrollArea">
          <ul id="noticeList" class="text-sm md:text-base flex flex-col gap-2 md:gap-3 notice-container">
          </ul>
        </div>
      </div>
    </div>
  </section>

  <section class="w-full">
    <div class="bg-[#173572] py-8 md:py-12 text-white text-center" style="background-image: url('<?php echo URL ?>assets/img/pngbg.png'); background-size: cover; background-position: center;">
      <h2 class="text-2xl md:text-4xl font-bold mb-6 md:mb-10">WHY CHOOSE US</h2>
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 px-4 md:px-10 lg:px-20 pb-10">
        <!-- Card 1 - One Stop Solution -->
       <div class="bg-white hover:bg-blue-100 transition-all duration-300 shadow-lg p-6 flex flex-col items-center text-center text-blue-900 h-full">
           <div class="flex items-center gap-3 mb-4">
              <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center text-white">
                <i class="fa-solid fa-book-open text-xl"></i>
              </div>
               <h3 class="text-xl font-bold">Strong Academic Foundation</h3>
            </div>
           <p class="text-sm md:text-base">
                 Focused teaching methods that help students build clear concepts and strong fundamentals from the early classes.
            </p>     
        </div>


        <!-- Card 2 - Modern Facilities -->
      <div class="bg-white hover:bg-blue-100 transition-all duration-300 shadow-lg p-6 flex flex-col items-center text-center text-blue-900 h-full">
          <div class="flex items-center gap-3 mb-4">
            <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center text-white">
             <i class="fa-solid fa-chalkboard-user text-xl"></i>
          </div>
       <h3 class="text-xl font-bold">Dedicated Teaching Staff</h3>
      </div>
        <p class="text-sm md:text-base">
         Our teachers are committed, approachable, and focused on guiding every student with care and personal attention.
       </p>
     </div>


        <!-- Card 3 - Holistic Education -->
       <div class="bg-white hover:bg-blue-100 transition-all duration-300 shadow-lg p-6 flex flex-col items-center text-center text-blue-900 h-full">
          <div class="flex items-center gap-3 mb-4">
           <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center text-white">
            <i class="fa-solid fa-face-smile text-xl"></i>
          </div>
          <h3 class="text-xl font-bold">Student-Friendly Environment</h3>
       </div>
            <p class="text-sm md:text-base">
             A supportive and respectful atmosphere where students feel comfortable, confident, and motivated to learn.
        </p>
      </div>


        <!-- Card 4 - Safe Environment -->
       <div class="bg-white hover:bg-blue-100 transition-all duration-300 shadow-lg p-6 flex flex-col items-center text-center text-blue-900 h-full">
         <div class="flex items-center gap-3 mb-4">
          <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center text-white">
            <i class="fa-solid fa-scale-balanced text-xl"></i>
          </div>
           <h3 class="text-xl font-bold">Discipline & Values</h3>
        </div>
          <p class="text-sm md:text-base">
            Emphasis on discipline, honesty, respect, and responsibility to shape students into good human beings.
          </p>
       </div>


        <!-- Card 5 - Value Based Learning -->
   <div class="bg-white hover:bg-blue-100 transition-all duration-300 shadow-lg p-6 flex flex-col items-center text-center text-blue-900 h-full">
         <div class="flex items-center gap-3 mb-4">
          <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center text-white">
            <i class="fa-solid fa-puzzle-piece text-xl"></i>
         </div>
          <h3 class="text-xl font-bold">Balanced Learning</h3>
        </div>
       <p class="text-sm md:text-base">
         Along with academics, students are encouraged to participate in cultural activities and creative learning.
        </p>
</div>


        <!-- Card 6 - Community Focus -->
<div class="bg-white hover:bg-blue-100 transition-all duration-300 shadow-lg p-6 flex flex-col items-center text-center text-blue-900 h-full">
 <div class="flex items-center gap-3 mb-4">
   <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center text-white">
      <i class="fa-solid fa-child-reaching text-xl"></i>
   </div>
  <h3 class="text-xl font-bold">Focus on Every Child</h3>
</div>
 <p class="text-sm md:text-base">
    Individual attention is given to help each student grow academically, emotionally, and socially.
  </p>
</div>


      </div>

    </div>
  </section>




  <!-- Events Section -->
  <section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center mb-12">
        <h2 class="text-3xl md:text-4xl font-bold text-blue-800 mb-3">School Events</h2>
        <p class="text-lg text-gray-600">“Celebrating our vibrant school community through memorable moments.”</p>
      </div>

      <div class="relative">
        <!-- Carousel Container -->
        <div id="event-carousel" class="overflow-hidden">
          <div id="event-carousel-track" class="flex transition-transform duration-500 ease-in-out">
            <!-- Event 1 - Annual Sports -->
            <div class="w-full sm:w-1/2 lg:w-1/3 px-4 flex-shrink-0">
              <div class="bg-white border-2 border-blue-500 rounded-lg shadow-md overflow-hidden hover:shadow-2xl hover:bg-blue-50 transition-shadow duration-300 h-full">
                <img src="<?php echo URL ?>assets/img/events-images/img1.jpg"
                  alt="Annual Sports"
                  class="w-full h-48 object-cover">
                <div class="p-6">
                  <h3 class="text-xl font-bold text-gray-800 mb-2">Annual Sports</h3>
                  <p class="text-gray-600">Annual Sports Day promotes physical fitness, teamwork, and sportsmanship through various competitive events, encouraging students to develop discipline, confidence, and a healthy lifestyle.</p>
                 
                </div>
              </div>
            </div>

            <!-- Event 2 - World Environment Day Celebration -->
            <div class="w-full sm:w-1/2 lg:w-1/3 px-4 flex-shrink-0 ">
              <div class="bg-white  border-2 border-blue-500 rounded-lg shadow-md overflow-hidden hover:shadow-2xl hover:bg-blue-50 transition-shadow duration-300 h-full">
                <img src="<?php echo URL ?>assets/img/events-images/img2.jpg"
                  alt="World Environment Day "
                  class="w-full h-48 object-cover">
                <div class="p-6">
                  <h3 class="text-xl font-bold text-gray-800 mb-2">World Environment Day </h3>
                  <p class="text-gray-600">World Environment Day raises awareness about environmental protection, encouraging students to adopt eco-friendly habits and understand the importance of preserving nature for future generations.</p>
                 
                </div>
              </div>
            </div>

            <!-- Event 3 - Holi Celebration -->
            <div class="w-full sm:w-1/2 lg:w-1/3 px-4 flex-shrink-0">
              <div class="bg-white border-2 border-blue-500 rounded-lg shadow-md overflow-hidden hover:shadow-2xl hover:bg-blue-50 transition-shadow duration-300 h-full">
                <img src="<?php echo URL ?>assets/img/events-images/img3.jpg"
                  alt="Holi Celebratio"
                  class="w-full h-48 object-cover">
                <div class="p-6">
                  <h3 class="text-xl font-bold text-gray-800 mb-2">Holi Celebration</h3>
                  <p class="text-gray-600">Holi is celebrated with colors, joy, and unity, spreading messages of friendship, harmony, and happiness among students and teachers in a vibrant school atmosphere.</p>
                
                </div>
              </div>
            </div>

            <!-- Event 4 - Grandparents Day -->
            <div class="w-full sm:w-1/2 lg:w-1/3 px-4 flex-shrink-0">
              <div class="bg-white border-2 border-blue-500 rounded-lg shadow-md overflow-hidden hover:shadow-2xl hover:bg-blue-50 transition-shadow duration-300 h-full">
                <img src="<?php echo URL ?>assets/img/events-images/img4.jpg"
                  alt="Independence Day Celebration"
                  class="w-full h-48 object-cover">
                <div class="p-6">
                  <h3 class="text-xl font-bold text-gray-800 mb-2">Independence Day Celebration</h3>
                  <p class="text-gray-600">Independence Day is celebrated with patriotic programs, speeches, and flag hoisting to honor freedom fighters and inspire students with values of unity, courage, and responsibility.</p>
               
                </div>
              </div>
            </div>

            <!-- Event 5 - Janmashtami Celebration -->
            <div class="w-full sm:w-1/2 lg:w-1/3 px-4 flex-shrink-0">
              <div class="bg-white border-2 border-blue-500 rounded-lg shadow-md overflow-hidden hover:shadow-2xl hover:bg-blue-50 transition-shadow duration-300 h-full">
                <img src="<?php echo URL ?>assets/img/events-images/img5.jpg"
                  alt="Janmashtami Celebration"
                  class="w-full h-48 object-cover">
                <div class="p-6">
                  <h3 class="text-xl font-bold text-gray-800 mb-2">Janmashtami Celebration</h3>
                  <p class="text-gray-600">Janmashtami marks the birth of Lord Krishna and is celebrated with devotional activities, cultural performances, and moral teachings highlighting truth, kindness, and righteousness.</p>
                 
                </div>
              </div>
            </div>

            <!-- Event 6 - Bengali New Year (Poila Boishakh) Celebration -->
            <div class="w-full sm:w-1/2 lg:w-1/3 px-4 flex-shrink-0">
              <div class="bg-white border-2 border-blue-500 rounded-lg shadow-md overflow-hidden hover:shadow-2xl hover:bg-blue-50 transition-shadow duration-300 h-full">
                <img src="<?php echo URL ?>assets/img/events-images/img6.jpg"
                  alt="Poila Boishakh"
                  class="w-full h-48 object-cover">
                <div class="p-6">
                  <h3 class="text-xl font-bold text-gray-800 mb-2">Bengali New Year (Poila Boishakh) Celebration</h3>
                  <p class="text-gray-600">Bengali New Year is celebrated with cultural programs, traditional music, and greetings, inspiring students to respect heritage, culture, and new beginnings with positivity.</p>
                  
                </div>
              </div>
            </div>

            <!-- Event 7 -Rabindra Jayanti Celebration -->
            <div class="w-full sm:w-1/2 lg:w-1/3 px-4 flex-shrink-0">
              <div class="bg-white border-2 border-blue-500 rounded-lg shadow-md overflow-hidden hover:shadow-2xl hover:bg-blue-50 transition-shadow duration-300 h-full">
                <img src="<?php echo URL ?>assets/img/events-images/img7.jpg"
                  alt="Rabindra Jayanti Celebration"
                  class="w-full h-48 object-cover">
                <div class="p-6">
                  <h3 class="text-xl font-bold text-gray-800 mb-2">Rabindra Jayanti Celebration</h3>
                  <p class="text-gray-600">Rabindra Jayanti honors the birth anniversary of Rabindranath Tagore through songs, poems, and performances, nurturing creativity, literature, and cultural values among students.</p>
               
                </div>
              </div>
            </div>

            <!-- Event 8 - Teachers’ Day Celebration -->
            <div class="w-full sm:w-1/2 lg:w-1/3 px-4 flex-shrink-0">
              <div class="bg-white border-2 border-blue-500 rounded-lg shadow-md overflow-hidden hover:shadow-2xl hover:bg-blue-50 transition-shadow duration-300 h-full">
                <img src="<?php echo URL ?>assets/img/events-images/img8.jpg"
                  alt="Teachers’ Day Celebration"
                  class="w-full h-48 object-cover">
                <div class="p-6">
                  <h3 class="text-xl font-bold text-gray-800 mb-2">Teachers’ Day Celebration</h3>
                  <p class="text-gray-600">Teachers’ Day is celebrated to express gratitude and respect for teachers, acknowledging their dedication, guidance, and invaluable role in shaping students’ future.</p>
                 
                </div>
              </div>
            </div>

          </div>
        </div>

        <!-- Navigation Buttons -->
        <button id="event-prev-btn" class="absolute left-0 top-1/2 -translate-y-1/2 bg-blue-800 text-white rounded-full p-3 hover:bg-blue-900 z-10 shadow-lg transform hover:scale-110 transition-transform">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
          </svg>
        </button>
        <button id="event-next-btn" class="absolute right-0 top-1/2 -translate-y-1/2 bg-blue-800 text-white rounded-full p-3 hover:bg-blue-900 z-10 shadow-lg transform hover:scale-110 transition-transform">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
          </svg>
        </button>
      </div>
    </div>
  </section>


  <!-- Reviews Section -->
  <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-16">
    <div class="text-center mb-12">
      <h2 class="text-2xl md:text-4xl font-bold text-blue-800">What Parents Say About Us</h2>

      <p class="text-lg text-gray-600 max-w-2xl mx-auto">Hear heartfelt experiences shared by parents of Sagardighi Bright Academy.</p>
    </div>

    <div class="relative">
      <!-- Review Cards Container -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
        <!-- Review Card 1 -->
        <div class="bg-red-50   shadow-lg overflow-hidden border border-gray-100 transform transition-all hover:scale-[1.02] hover:shadow-xl">
          <div class="p-6 md:p-8">
            <div class="flex items-start mb-6">
              <img src="<?php echo URL ?>assets/img/mom.png" alt="Parent Photo" class="w-16 h-16 object-fit">
              <div class="ml-4">
                <h3 class="text-lg font-semibold text-gray-800">Sunita Mondal</h3>
                <div class="flex items-center mt-1">
                  <svg class="w-5 h-5 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                  </svg>
                  <svg class="w-5 h-5 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                  </svg>
                  <svg class="w-5 h-5 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                  </svg>
                  <svg class="w-5 h-5 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                  </svg>
                </div>
              </div>
            </div>
            <p class="text-gray-600 text-base leading-relaxed">
           “Sagardighi Bright Academy আমার সন্তানের পড়াশোনার জন্য খুবই ভালো একটি স্কুল। শিক্ষকরা খুব যত্ন নিয়ে পড়ান এবং ছাত্রছাত্রীদের শৃঙ্খলা ও মূল্যবোধ শেখান। আমি এই স্কুল নিয়ে সম্পূর্ণ সন্তুষ্ট।”
            </p>
          </div>
        </div>
 <!-- Review Card 3 (New) -->
        <div class="bg-blue-50   shadow-lg overflow-hidden border border-gray-100 transform transition-all hover:scale-[1.02] hover:shadow-xl">
          <div class="p-6 md:p-8">
            <div class="flex items-start mb-6">
              <img src="<?php echo URL ?>assets/img/dad.png" alt="Parent Photo" class="w-16 h-16 object-fit  ">
              <div class="ml-4">
                <h3 class="text-lg font-semibold text-gray-800">Mr. Abdul Rahman</h3>
                <div class="flex items-center mt-1">
                  <svg class="w-5 h-5 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                  </svg>
                  <svg class="w-5 h-5 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                  </svg>
                  <svg class="w-5 h-5 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                  </svg>
                  <svg class="w-5 h-5 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                  </svg>
                </div>
              </div>
            </div>
            <p class="text-gray-600 text-base leading-relaxed">
                “এই স্কুলে পড়াশোনার পরিবেশ খুব সুন্দর ও নিরাপদ। শিক্ষকদের ব্যবহার খুবই ভালো এবং তারা প্রতিটি ছাত্রছাত্রীর দিকে আলাদা নজর দেন। গ্রামের এলাকায় এমন একটি ভালো স্কুল পাওয়া সত্যিই গর্বের বিষয়।”            </p>
          </div>
        </div>
        <!-- Review Card 3 -->
        <div class="bg-red-50  shadow-lg overflow-hidden border border-gray-100 transform transition-all hover:scale-[1.02] hover:shadow-xl">
          <div class="p-6 md:p-8">
            <div class="flex items-start mb-6">
              <img src="<?php echo URL ?>assets/img/mom.png" alt="Parent Photo" class="w-16 h-16 p-1 object-fit">
              <div class="ml-4">
                <h3 class="text-lg font-semibold text-gray-800">Kaberi Das</h3>
                <div class="flex items-center mt-1">
                  <svg class="w-5 h-5 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                  </svg>
                  <svg class="w-5 h-5 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                  </svg>
                  <svg class="w-5 h-5 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                  </svg>
                  <svg class="w-5 h-5 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                  </svg>
                </div>
              </div>
            </div>
            <p class="text-gray-600 text-base leading-relaxed">
               “Sagardighi Bright Academy provides a caring and disciplined learning environment for students. The teachers are supportive and focused on building strong academic basics. I am happy with my child’s progress and overall development.”            </p>
          </div>
        </div>

       
      </div>

      <!-- Navigation Dots -->
      <div class="flex justify-center mt-8 space-x-2 md:hidden">
        <button class="w-3 h-3 rounded-full bg-blue-600"></button>
        <button class="w-3 h-3 rounded-full bg-gray-300"></button>
        <button class="w-3 h-3 rounded-full bg-gray-300"></button>
      </div>
    </div>
  </section>


</main>