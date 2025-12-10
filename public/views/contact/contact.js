document.addEventListener("DOMContentLoaded",()=>{
const form = document.getElementById('contactForm');
          form.addEventListener('submit', function(e) {
            let valid = true;
            // Name
            const name = form.name.value.trim();
            const nameError = document.getElementById('nameError');
            if (!name) {
              nameError.classList.remove('hidden');
              valid = false;
            } else {
              nameError.classList.add('hidden');
            }
            // Email
            const email = form.email.value.trim();
            const emailError = document.getElementById('emailError');
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(email)) {
              emailError.classList.remove('hidden');
              valid = false;
            } else {
              emailError.classList.add('hidden');
            }
            // Phone
            const phone = form.phone.value.trim();
            const phoneError = document.getElementById('phoneError');
            if (!/^\d{10}$/.test(phone)) {
              phoneError.classList.remove('hidden');
              valid = false;
            } else {
              phoneError.classList.add('hidden');
            }
            // Message
            const message = form.message.value.trim();
            const messageError = document.getElementById('messageError');
            if (!message) {
              messageError.classList.remove('hidden');
              valid = false;
            } else {
              messageError.classList.add('hidden');
            }
            if (!valid) e.preventDefault();
          });

})
