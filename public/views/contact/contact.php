<section class="w-full px-4 py-12 bg-gray-50">
  <div class="max-w-7xl mx-auto flex flex-col lg:flex-row gap-10">
    <!-- Left: Info + Map -->
    <div class="space-y-6 w-full lg:w-1/3 flex flex-col">
      <!-- Contact Info Card -->
      <div class="bg-blue-800 border-l-4 border-yellow-400 p-6 shadow">
        <h2 class="text-xl font-semibold text-yellow-400 mb-4"><i class="fa-solid fa-location-dot text-xl text-yellow-400"></i> Don Bosco City Office</h2>
        <ul class="text-white space-y-2 list-disc pl-5 text-sm">
          <li>Don Bosco More, Village. Surjapur,</li>
          <li>Malda By-Pass, Near Old Malda Court Station,</li>
          <li>Madhaipur, Dist. Malda - 732142.</li>
          <li><strong>Phone:</strong> <a href="tel:+918509544564" class="text-yellow-300 hover:underline">+91 8509544564</a></li>
          <li><strong>Email:</strong> <a href="mailto: donboscoschoolmalda24@gmail.com" class="text-yellow-300 hover:underline"> donboscoschoolmalda24@gmail.com
            </a></li>
        </ul>
      </div>
      <!-- Embedded Google Map -->
      <div class="w-full h-80 overflow-hidden shadow">
        <iframe class="w-full h-full" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3615.5138971825754!2d88.16822187525223!3d25.016628477827652!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39fb03b1616fb205%3A0xfcf854fab9a7edaf!2sDon%20Bosco%20School!5e0!3m2!1sen!2sin!4v1751964248341!5m2!1sen!2sin" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </div>
    <!-- Right: Contact Form -->
    <div class="bg-white shadow-lg p-8 w-full lg:w-2/3">
      <h2 class="text-2xl font-bold text-blue-800 mb-6">Get in Touch</h2>
      <form id="contactForm" 
      method="POST"
      
      data-ajax-url = "<?php echo URL?>contact/submitContact"
      
      class="space-y-5" novalidate>
        <div>
          <label class="block mb-1 font-medium text-blue-900">Your Name</label>
          <input type="text" name="guardian_name" required placeholder="Enter your full name"
            class="w-full px-4 py-2 border-b-2 border-blue-800 bg-gray-50 focus:outline-none focus:border-yellow-400" />
          <span class="text-red-600 text-xs hidden" id="nameError">Please enter your name.</span>
        </div>
        <!-- <div>
          <label class="block mb-1 font-medium text-blue-900">Your Email</label>
          <input type="email" name="email" required placeholder="Enter a valid email"
            class="w-full px-4 py-2 border-b-2 border-blue-800 bg-gray-50 focus:outline-none focus:border-yellow-400" />
          <span class="text-red-600 text-xs hidden" id="emailError">Please enter a valid email address.</span>
        </div> -->
        <div>
          <label class="block mb-1 font-medium text-blue-900">Phone</label>
          <input type="tel" name="phone_number" pattern="[0-9]{10}" required placeholder="10-digit phone number"
            class="w-full px-4 py-2 border-b-2 border-blue-800 bg-gray-50 focus:outline-none focus:border-yellow-400" />
          <span class="text-red-600 text-xs hidden" id="phoneError">Please enter a valid 10-digit phone number.</span>
        </div>
        <div>
          <label class="block mb-1 font-medium text-blue-900">Message</label>
          <textarea name="enquiry_details" rows="4" required placeholder="Write your message here"
            class="w-full px-4 py-2 border-b-2 border-blue-800 bg-gray-50 focus:outline-none focus:border-yellow-400"></textarea>
          <span class="text-red-600 text-xs hidden" id="messageError">Please enter your message.</span>
        </div>
        <button type="submit"
          class="w-full bg-blue-800 hover:bg-yellow-400 hover:text-blue-900 text-white py-2 px-4 font-semibold transform hover:scale-105 transition duration-300 ease-in-out">
          Send Message
        </button>
      </form>

    </div>
  </div>

<script>
document.addEventListener("DOMContentLoaded", () => {
  const form = document.getElementById("contactForm");
  if (!form) return;

  form.addEventListener("submit", async function (e) {
    e.preventDefault();

    let valid = true;

    // Name validation
    const name = form.guardian_name.value.trim();
    const nameError = document.getElementById("nameError");

    if (!name) {
      nameError.classList.remove("hidden");
      valid = false;
    } else {
      nameError.classList.add("hidden");
    }

    // Phone validation
    const phone = form.phone_number.value.trim();
    const phoneError = document.getElementById("phoneError");

    if (!/^\d{10}$/.test(phone)) {
      phoneError.classList.remove("hidden");
      valid = false;
    } else {
      phoneError.classList.add("hidden");
    }

    // Stop if validation fails
    if (!valid) return;

    // Button state
    const btn = form.querySelector("button[type='submit']");
    const oldText = btn.textContent;
    btn.disabled = true;
    btn.textContent = "Submitting...";

    try {
      const response = await fetch("<?php echo URL; ?>contact/submitContact", {
        method: "POST",
        body: new FormData(form)
      });

      // Safety check
      if (!response.ok) {
        throw new Error("Network response was not OK");
      }

      const data = await response.json();

      btn.disabled = false;
      btn.textContent = oldText;

      if (data.success) {
        // Success UI
        form.classList.add("hidden");

        const successBox = document.createElement("div");
        successBox.className =
          "contact-success-message mt-6 p-6 bg-green-50 border border-green-200 rounded text-center";

        successBox.innerHTML = `
          <h3 class="text-lg font-semibold text-green-700 mb-2">Thank you!</h3>
          <p class="text-green-600 mb-4">
            ${data.message || "Message sent successfully"}
          </p>
          <button class="ok-btn bg-green-600 text-white px-4 py-2 rounded">
            OK
          </button>
        `;

        form.parentNode.insertBefore(successBox, form);

        successBox.querySelector(".ok-btn").onclick = () => {
          successBox.remove();
          form.reset();
          form.classList.remove("hidden");
        };

      } else {
        alert(data.message || "Submission failed");
      }

    } catch (error) {
      console.error("Contact form error:", error);
      btn.disabled = false;
      btn.textContent = oldText;
      alert("Server error. Please try again.");
    }
  });
});
</script>



</section>