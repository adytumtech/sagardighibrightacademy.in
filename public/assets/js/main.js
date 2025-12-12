document.addEventListener("DOMContentLoaded", function () {
  const menuBtn = document.getElementById("menu-btn");
  const menu = document.getElementById("mobile-menu");
  let isMenuOpen = false;

  menuBtn.addEventListener("click", () => {
    isMenuOpen = !isMenuOpen;
    menuBtn.setAttribute("aria-expanded", isMenuOpen);

    if (isMenuOpen) {
      menu.classList.remove("opacity-0", "invisible");
      menu.classList.add("opacity-100", "visible");
    } else {
      menu.classList.remove("opacity-100", "visible");
      menu.classList.add("opacity-0", "invisible");
    }
  });

  // Close menu when clicking outside (optional)
  document.addEventListener("click", (e) => {
    if (!menu.contains(e.target) && !menuBtn.contains(e.target) && isMenuOpen) {
      isMenuOpen = false;
      menuBtn.setAttribute("aria-expanded", "false");
      menu.classList.remove("opacity-100", "visible");
      menu.classList.add("opacity-0", "invisible");
    }
  });

const buttons = document.querySelectorAll(".submenu-btn");

buttons.forEach((btn) => {
  btn.addEventListener("click", () => {
    const menu = btn.nextElementSibling; // the UL
    menu.classList.toggle("hidden");
  });
});

});

// @keyframes fadeIn {
//   0% { opacity: 0; transform: scale(0.95); }
//   100% { opacity: 1; transform: scale(1); }
// }
// .animate-fadeIn {
//   animation: fadeIn 0.3s ease-out;
// }

// Show modal on page load

// Close modal on button click

document.addEventListener("DOMContentLoaded", () => {
  const openBtn = document.getElementById("enquiryModalButton");
  const closeBtn = document.getElementById("closeModalButton");
  const modal = document.getElementById("enquiryModalGlobal");

  if (openBtn && modal) {
    openBtn.addEventListener("click", () => {
      modal.classList.remove("hidden");
    });
  }

  if (closeBtn && modal) {
    closeBtn.addEventListener("click", (e) => {
      e.stopPropagation(); // prevent bubbling to modal
      modal.classList.add("hidden");
    });
  }

  // Close modal when clicking outside the modal content
  if (modal) {
    modal.addEventListener("click", () => {
      modal.classList.add("hidden");
    });

    // Prevent closing when clicking inside modal content
    const modalContent = modal.querySelector("div"); // first inner div
    if (modalContent) {
      modalContent.addEventListener("click", (e) => {
        e.stopPropagation();
      });
    }
  }
});
