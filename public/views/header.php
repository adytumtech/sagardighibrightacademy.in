<?php
if ($_SERVER['REQUEST_URI'] == $_SERVER['PHP_SELF']) header("Location: noPage");
if (!isset($this->pageTitle)) $this->pageTitle = 'Don Bosco Malda | Malda, West Bengal, India';
?>
<!doctype html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />



  <!-- fav icon -->
  <link rel="apple-touch-icon" sizes="180x180" href="<?php echo URL ?>assets/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="<?php echo URL ?>assets/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo URL ?>assets/favicon/favicon-16x16.png">
  <link rel="manifest" href="<?php echo URL ?>assets/favicon/site.webmanifest">

  <link href="<?php echo URL ?>assets/css/custom.css" rel="stylesheet">
  <title><?php if (isset($this->pageTitle)) echo $this->pageTitle; ?></title>
  <script src="<?php echo URL ?>assets/js/main.js"></script>

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
          <span>999999999</span>
        </div>
      <span>|</span>  
        <div class="flex items-center gap-1.5 rounded-full">
          <i class="fa-solid fa-envelope text-sm"></i>
          <span class="hidden sm:inline">sagardighi@gmail.com</span>
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
        <li>
          <a href="#" aria-label="Twitter" class="hover:text-blue-200 transition-colors">
            <i class="fa-brands fa-twitter"></i>
          </a>
        </li>
        <li>
          <a href="#" aria-label="LinkedIn" class="hover:text-blue-200 transition-colors">
            <i class="fa-brands fa-linkedin-in"></i>
          </a>
        </li>
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
            <p class="text-gray-600 text-xs lg:text-sm">Established – 2002</p>
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

          <!-- About Us -->
          <li class="text-gray-800 hover:text-blue-700 cursor-pointer group relative lg:h-full lg:flex w-full lg:w-auto px-2 py-1">
            <div class="submenu-btn flex gap-1 items-center  font-medium">
              About Us <i class="fa-solid fa-angle-down"></i>
            </div>
            <ul class="sub-items hidden lg:group-hover:block lg:absolute lg:left-0 lg:top-full bg-blue-700 text-white  lg:shadow-lg lg:z-50 lg:min-w-[250px] lg:max-w-[250px] whitespace-nowrap text-start">
              <li class="border-b"><a href="<?php echo URL ?>about/about_school" class="block px-4 py-2 hover:bg-blue-800 ">About School</a></li>
              <li class="border-b"><a href="<?php echo URL ?>about/st_donbosc_visionary" class="block px-4 py-2 hover:bg-blue-800 ">St. Don Bosco: The Visionary</a></li>
              <li class="border-b"><a href="<?php echo URL ?>about/founder" class="block px-4 py-2 hover:bg-blue-800 ">Founder</a></li>
              <li class="border-b"><a href="<?php echo URL ?>about/chairman" class="block px-4 py-2 hover:bg-blue-800 ">Chairman message</a></li>
              <li class="border-b"><a href="<?php echo URL ?>about/principal" class="block px-4 py-2 hover:bg-blue-800 ">Principal message</a></li>
              <li class="border-t"><a href="<?php echo URL ?>about/director" class="block px-4 py-2 hover:bg-blue-800 ">Director</a></li>
            </ul>
          </li>

          <!-- Academic Dropdown -->

          <!-- About Us -->
          <li class="text-gray-800 hover:text-blue-700  font-medium cursor-pointer group relative lg:h-full lg:flex w-full lg:w-auto px-2 py-1">
            <div class="submenu-btn flex gap-1 items-center ">
              Academic <i class="fa-solid fa-angle-down"></i>
            </div>
            <ul class="sub-items hidden lg:group-hover:block lg:absolute lg:left-0 lg:top-full bg-blue-700 text-white  lg:shadow-lg lg:z-50 lg:min-w-[250px] lg:max-w-[250px] whitespace-nowrap text-start">
              <li class="border-b"><a href="<?php echo URL ?>about/about_school" class="block px-4 py-2  hover:bg-blue-800 ">About School</a></li>
              <li class="border-b"><a href="<?php echo URL ?>about/st_donbosc_visionary" class="block px-4 py-2 hover:bg-blue-800 ">St. Don Bosco: The Visionary</a></li>
              <li class="border-b"><a href="<?php echo URL ?>about/founder" class="block px-4 py-2 hover:bg-blue-800 ">Founder</a></li>
              <li class="border-b"><a href="<?php echo URL ?>about/chairman" class="block px-4 py-2 hover:bg-blue-800 ">Chairman message</a></li>
              <li class="border-b"><a href="<?php echo URL ?>about/principal" class="block px-4 py-2 hover:bg-blue-800 ">Principal message</a></li>
              <li class="border-t"><a href="<?php echo URL ?>about/director" class="block px-4 py-2 hover:bg-blue-800 ">Director</a></li>
            </ul>
          </li>

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