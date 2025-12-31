<?php
if ($_SERVER['REQUEST_URI'] == $_SERVER['PHP_SELF']) header("Location: noPage");
if (!isset($this->pageTitle)) $this->pageTitle = 'Sagardighi Bright Academy | Murshidabad, West Bengal, India';
?>
<!doctype html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
<!-- SEO Meta -->
<meta name="description" content="Sagardighi Bright Academy is a Bengali-medium co-educational school in Santoshpur, Sagardighi, Murshidabad. Established in 2007 and affiliated with WBBSE and WBCHSE, the school provides quality education from pre-primary to secondary level.">
<meta name="keywords" content="Sagardighi Bright Academy, School in Sagardighi Murshidabad, Bengali Medium School in Murshidabad, WBBSE School Sagardighi, WBCHSE School Murshidabad, Santoshpur Sagardighi School">

  <!-- Canonical (query string removed) -->
  <?php
  $canonical = ($_SERVER['REQUEST_URI'] === '/' || $_SERVER['REQUEST_URI'] === '/home')
    ? 'https://www.sagardighibrightacademy.com/'
    : 'https://' . $_SERVER['HTTP_HOST'] . strtok($_SERVER['REQUEST_URI'], '?');
  ?>
  <link rel="canonical" href="<?= $canonical ?>">

 <!-- Open Graph -->
<meta property="og:title" content="Sagardighi Bright Academy">
<meta property="og:description" content="Sagardighi Bright Academy is a Bengali-medium co-educational school in Santoshpur, Sagardighi, Murshidabad, affiliated with WBBSE and WBCHSE.">
<meta property="og:type" content="website">
<meta property="og:url" content="<?php echo 'https://' . $_SERVER['HTTP_HOST'] . strtok($_SERVER['REQUEST_URI'], '?'); ?>">
<meta property="og:image" content="<?php echo URL ?>assets/img/hero-images/img-1.jpg">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">

  <!-- Robots -->
  <meta name="robots" content="index, follow">
  <meta name="googlebot" content="index, follow">
  <meta name="bingbot" content="index, follow">
  <!-- Performance: Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />


  <!-- fav icon -->
  <link rel="apple-touch-icon" sizes="180x180" href="<?php echo URL ?>assets/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="<?php echo URL ?>assets/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo URL ?>assets/favicon/favicon-16x16.png">
  <link rel="manifest" href="<?php echo URL ?>assets/favicon/site.webmanifest">


  <link href="<?php echo URL ?>assets/css/custom.css" rel="stylesheet">
  <title><?php if (isset($this->pageTitle)) echo $this->pageTitle; ?></title>


  <!-- Schema.org markup for Google -->
  <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "School",
      "name": "SagarDighi Bright Academy",
      "alternateName": "Bright Academy Sagardighi",
      "url": "https://www.sagardighibrightacademy.com",
      "logo": "https://www.sagardighibrightacademy.com/assets/img/logo.png",
      "address": {
        "@type": "PostalAddress",
        "addressLocality": "Sagardighi",
        "addressRegion": "West Bengal",
        "addressCountry": "IN"
      },
      "contactPoint": {
        "@type": "ContactPoint",
        "contactType": "Admissions",
       "email": "sagardighibrightacademy2007@gmail.com"

      },
      "sameAs": [
        "https://www.facebook.com/sagardighibrightacademy",
        "https://www.instagram.com/sagardighibrightacademy",
        "https://www.youtube.com/@sagardighibrightacademy"
      ]
    }
  </script>
  <?php
  if (isset($this->css)) {
    foreach ($this->css as $css) {
      echo '<link href="' . URL . $css . '" rel="stylesheet">';
    }
  }
  ?>

  <?php
  if (isset($this->js)) {
    foreach ($this->js as $js) {
      echo '<script src=' . URL . $js . '></script>';
    }
  }
  ?>
</head>

<body>


  <header class="w-full sticky top-0 z-50 shadow-md bg-blue-800">
    <!-- Top Contact Bar -->
    <div class="w-full text-white bg-gradient-to-r px-4 lg:px-10 py-1.5 flex flex-col md:flex-row justify-between items-center gap-2 text-xs md:text-sm">

      <!-- Left: Contact Info -->
      <div class="flex flex-wrap items-center justify-center md:justify-start gap-4 md:gap-6">
        <div class="flex items-center gap-1 ">
          <i class="fa-solid fa-phone text-sm"></i>
          <span>+91-9733656523
    </span>
        </div>
        <span>|</span>
        <div class="flex items-center gap-1.5 rounded-full">
          <i class="fa-solid fa-envelope text-sm"></i>
          <span class="hidden sm:inline">sagardighibrightacademy2007@gmail.com</span>
          <span class="sm:hidden">Email</span>
        </div>
      </div>

      <!-- Right: Social Icons -->
      <ul class="flex items-center gap-3 md:gap-4 text-base">
        <li>
          <a href="#" aria-label="Facebook" class="hover:text-blue-200 transition-colors">
            <i class="fa-brands fa-facebook-f"></i>
          </a>
        </li>
        <li>
          <a href="#" aria-label="Instagram" class="hover:text-pink-200 transition-colors">
            <i class="fa-brands fa-instagram"></i>
          </a>
        </li>
        <!-- <li>
          <a href="#" aria-label="Twitter" class="hover:text-blue-200 transition-colors">
            <i class="fa-brands fa-twitter"></i>
          </a>
        </li>
        <li>
          <a href="#" aria-label="LinkedIn" class="hover:text-blue-200 transition-colors">
            <i class="fa-brands fa-linkedin-in"></i>
          </a>
        </li> -->
      </ul>
    </div>

    <!-- Main Navigation -->
    <div class="w-full bg-white">
      <nav class="max-w-8xl mx-auto px-4  py-3 md:py-2 flex items-center justify-between" role="navigation" aria-label="Main navigation">

        <!-- Logo + Title -->
        <div class="flex items-center gap-3">
          <a href="<?php echo URL ?>home" class="focus:outline-none focus:ring-2 focus:ring-blue-500 rounded">
            <div class="w-16 h-16 ">
              <img src="<?php echo URL ?>assets/img/logo.png"
                alt="Sagardighi Bright Academy Logo"
                class="w-full h-full object-contain">
            </div>
          </a>

          <div class="leading-tight">
            <h1 class="text-sm lg:text-xl font-bold tracking-tight text-blue-800">
             SAGARDIGHI BRIGHT ACADEMY
            </h1>
            <p class="text-gray-600 text-xs lg:text-sm">ESTD – 2007 | DISE CODE: 19072010305</p>
          </div>
        </div>

        <!-- Mobile Menu Button -->
        <button id="menu-btn"
          aria-expanded="false"
          aria-controls="mobile-menu"
          class="lg:hidden text-gray-700 text-2xl focus:outline-none focus:ring-2 focus:ring-blue-500 rounded">
          <i class="fa-solid fa-bars"></i>
          <span class="sr-only">Toggle navigation menu</span>
        </button>

        <!-- Desktop & Mobile Menu -->
        <ul id="mobile-menu"
          class="absolute lg:static left-0 top-full w-full lg:w-auto lg:flex lg:items-center lg:gap-5 bg-white lg:bg-transparent flex-col lg:flex-row px-4 lg:px-0 py-4 lg:py-0 shadow-lg lg:shadow-none z-50 transition-all duration-300 ease-in-out opacity-0 invisible lg:opacity-100 lg:visible">

          <!-- About Dropdown -->
          <li class="w-full lg:w-auto"><a href="<?php echo URL ?>home" class="block py-2 lg:py-0 px-2 font-medium text-gray-800 hover:text-blue-700 transition-colors">Home</a></li>

          <!-- About Us -->
          <li class="text-gray-800 hover:text-blue-700 cursor-pointer group relative lg:h-full lg:flex w-full lg:w-auto px-2 py-1">
            <div class="submenu-btn flex gap-1 items-center  font-medium">
              About Us <i class="fa-solid fa-angle-down"></i>
            </div>
            <ul class="sub-items hidden lg:group-hover:block lg:absolute lg:left-0 lg:top-full bg-blue-700 text-white  lg:shadow-lg lg:z-50 lg:min-w-[250px] lg:max-w-[250px] whitespace-nowrap text-start">
              <li class="border-b"><a href="<?php echo URL ?>about/about_school" class="block px-4 py-2 hover:bg-blue-800 ">About School</a></li>
              <li class="border-b"><a href="<?php echo URL ?>about/principal" class="block px-4 py-2 hover:bg-blue-800 ">Principal message</a></li>
            </ul>
          </li>

          <!-- Academic  -->
          <li class="w-full lg:w-auto"><a href="<?php echo URL ?>academic" class="block py-2 lg:py-0 px-2 font-medium text-gray-800 hover:text-blue-700 transition-colors">Academic</a></li>

         

          <!-- Admission Dropdown -->
          <li class="w-full lg:w-auto"><a href="#" class="block py-2 lg:py-0 px-2  text-gray-800  font-medium hover:text-blue-700 transition-colors">Admission</a></li>

          <li class="w-full lg:w-auto"><a href="<?php echo URL ?>gallery" class="block py-2 lg:py-0 px-2 font-medium text-gray-800 hover:text-blue-700 transition-colors">Gallery</a></li>
          <li class="w-full lg:w-auto"><a href="<?php echo URL ?>events" class="block py-2 lg:py-0 px-2 font-medium text-gray-800 hover:text-blue-700 transition-colors">Events</a></li>
          <li class="w-full lg:w-auto"><a href="<?php echo URL ?>career" class="block py-2 lg:py-0 px-2 font-medium text-gray-800 hover:text-blue-700 transition-colors">Career</a></li>
          <li class="w-full lg:w-auto"><a href="<?php echo URL ?>contact" class="block py-2 lg:py-0 px-2 font-medium text-gray-800 hover:text-blue-700 transition-colors">Contact</a></li>

          <!-- CTA Button (wrapped in li for semantic HTML) -->
          <li class="mt-3 lg:mt-0 w-full lg:w-auto flex justify-center">
            <a href="#"
              class="px-5 py-2 bg-red-600 text-white font-medium rounded-full hover:bg-blue-700 transition-colors shadow-md hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 w-full lg:w-auto text-center">
              Apply Now
            </a>
          </li>
        </ul>
      </nav>
    </div>




  </header>

  <script>
    document.addEventListener("DOMContentLoaded", function() {
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
  </script>