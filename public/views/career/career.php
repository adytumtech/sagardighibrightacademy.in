<!-- Hero Section -->
<section class="hero-section h-[470px] bg-dark-9 bg-cover bg-center flex items-center justify-center" style="background-image:url(<?php echo URL ?>assets/img/hero-2.jpg)">
    <div class="container mx-auto px-4">
        <div class="flex flex-col items-center justify-center text-white text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-2 bg-red-700 px-5 py-2">Career</h1>
           
        </div>
    </div>
</section>


</div>

<!-- Career Form & Notice -->
<section class="w-full px-4 py-12 bg-gray-50">
    <div class="max-w-4xl mx-auto flex flex-col ">
        <!-- Left Side: Notice -->
<div class="overflow-x-auto mb-10">
  <table class="min-w-full bg-[#F4D300] text-sm md:text-base shadow-lg border-2 border-[#F4D300]">
    <thead>
      <tr>
        <th colspan="3" class="text-left text-xl text-red-800 font-semibold px-4 py-3"> Current Job Openings</th>
      </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
      <tr class="hover:bg-gray-100 transition">
        <td class="text-center py-4 px-3 font-medium w-10">1</td>
        <td class="py-4 px-3">Teaching Position – Check eligibility criteria and view full details.</td>
        <td class="text-center py-4 px-3">
          <a class="bg-blue-700 hover:bg-blue-800 text-white font-semibold py-2 px-4 rounded transition text-sm md:text-base" 
             target="_blank" href="#">
            VIEW / DOWNLOAD
          </a>
        </td>
      </tr>
      <tr class="hover:bg-gray-100 transition">
        <td class="text-center py-4 px-3 font-medium">2</td>
        <td class="py-4 px-3">Staff Recruitment – Check eligibility criteria and view full details.</td>
        <td class="text-center py-4 px-3">
          <a class="bg-blue-700 hover:bg-blue-800 text-white font-semibold py-2 px-4 rounded transition text-sm md:text-base" 
             target="_blank" href="#">
            VIEW / DOWNLOAD
          </a>
        </td>
      </tr>
    </tbody>
  </table>
</div>


       
  <h2 class="text-2xl mt-10 text-start font-bold text-gray-700  ">Apply Now</h2>
  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi, nemo. Minima obcaecati ipsam sint magnam eius reiciendis cumque officiis dolorem.</p>
        <!-- Right Side: Career Form -->
        <div class="bg-white shadow-lg p-12 w-full lg:full min-h-[680px] mt-10">
          
            <form id="contactForm" action="#" method="POST" enctype="multipart/form-data" class="space-y-5" novalidate>
                <!-- Row 1: First & Last Name -->
                <div class="flex flex-col md:flex-row gap-6">
                    <div class="w-full">
                        <label class="block mb-1 font-medium text-blue-900">First Name *</label>
                        <input type="text" name="name" required placeholder="Enter your first name"
                            class="w-full px-4 py-2 border-b-2 border-blue-800 bg-gray-50 focus:outline-none focus:border-yellow-400" />
                        <span class="text-red-600 text-xs hidden" id="nameError">Please enter your first name.</span>
                    </div>
                    <div class="w-full">
                        <label class="block mb-1 font-medium text-blue-900">Last Name *</label>
                        <input type="text" name="lastname" required placeholder="Enter your last name"
                            class="w-full px-4 py-2 border-b-2 border-blue-800 bg-gray-50 focus:outline-none focus:border-yellow-400" />
                        <span class="text-red-600 text-xs hidden" id="lastnameError">Please enter your last name.</span>
                    </div>
                </div>

                <!-- Row 2: Email & Phone -->
                <div class="flex flex-col md:flex-row gap-6">
                    <div class="w-full">
                        <label class="block mb-1 font-medium text-blue-900">Email *</label>
                        <input type="email" name="email" required placeholder="Enter a valid email"
                            class="w-full px-4 py-2 border-b-2 border-blue-800 bg-gray-50 focus:outline-none focus:border-yellow-400" />
                        <span class="text-red-600 text-xs hidden" id="emailError">Please enter a valid email address.</span>
                    </div>
                    <div class="w-full">
                        <label class="block mb-1 font-medium text-blue-900">Phone *</label>
                        <input type="tel" name="phone" pattern="[0-9]{10}" required placeholder="10-digit phone number"
                            class="w-full px-4 py-2 border-b-2 border-blue-800 bg-gray-50 focus:outline-none focus:border-yellow-400" />
                        <span class="text-red-600 text-xs hidden" id="phoneError">Please enter a valid 10-digit phone number.</span>
                    </div>
                </div>

                <!-- Row 3: Resume & Photo Upload -->
                <div class="flex flex-col md:flex-row gap-6">
                    <div class="w-full">
                        <label class="block mb-1 font-medium text-blue-900">Upload Resume (PDF/DOCX) *</label>
                        <input type="file" name="resume" accept=".pdf,.doc,.docx" required
                            class="w-full px-4 py-2 border-b-2 border-blue-800 bg-gray-50 focus:outline-none focus:border-yellow-400" />
                        <span class="text-red-600 text-xs hidden" id="resumeError">Please upload your resume.</span>
                    </div>
                    <div class="w-full">
                        <label class="block mb-1 font-medium text-blue-900">Upload Photo (JPG/JPEG) *</label>
                        <input type="file" name="photo" accept=".jpg,.jpeg" required
                            class="w-full px-4 py-2 border-b-2 border-blue-800 bg-gray-50 focus:outline-none focus:border-yellow-400" />
                        <span class="text-red-600 text-xs hidden" id="photoError">Please upload your photo.</span>
                    </div>
                </div>

                <!-- Message -->
                <div>
                    <label class="block mb-1 font-medium text-blue-900">Message / Post Applying For *</label>
                    <textarea name="message" rows="4" required placeholder="Write your message here"
                        class="w-full px-4 py-2 border-b-2 border-blue-800 bg-gray-50 focus:outline-none focus:border-yellow-400"></textarea>
                    <span class="text-red-600 text-xs hidden" id="messageError">Please enter your message.</span>
                </div>

                <!-- Submit Button -->
                <button type="submit"
                    class="w-full bg-blue-800 hover:bg-yellow-400 hover:text-blue-900 text-white py-2 px-4 font-semibold transition duration-200">
                    Submit Application
                </button>
            </form>

            <!-- Validation Script -->
            <script>
                const form = document.getElementById('contactForm');
                form.addEventListener('submit', function(e) {
                    let valid = true;

                    const name = form.name.value.trim();
                    const lastname = form.lastname.value.trim();
                    const email = form.email.value.trim();
                    const phone = form.phone.value.trim();
                    const resume = form.resume.files[0];
                    const photo = form.photo.files[0];
                    const message = form.message.value.trim();

                    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

                    // Name validation
                    document.getElementById('nameError').classList.toggle('hidden', !!name);
                    valid &= !!name;

                    // Lastname validation
                    document.getElementById('lastnameError').classList.toggle('hidden', !!lastname);
                    valid &= !!lastname;

                    // Email validation
                    document.getElementById('emailError').classList.toggle('hidden', emailPattern.test(email));
                    valid &= emailPattern.test(email);

                    // Phone validation
                    document.getElementById('phoneError').classList.toggle('hidden', /^\d{10}$/.test(phone));
                    valid &= /^\d{10}$/.test(phone);

                    // Resume file validation
                    document.getElementById('resumeError').classList.toggle('hidden', !!resume);
                    valid &= !!resume;

                    // Photo file validation
                    document.getElementById('photoError').classList.toggle('hidden', !!photo);
                    valid &= !!photo;

                    // Message validation
                    document.getElementById('messageError').classList.toggle('hidden', !!message);
                    valid &= !!message;

                    if (!valid) e.preventDefault();
                });
            </script>
        </div>
    </div>
</section>