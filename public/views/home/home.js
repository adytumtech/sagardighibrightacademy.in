// header carousel

document.addEventListener("DOMContentLoaded", function () {
  const slides = document.querySelectorAll("#carousel-images > div");
  const prevBtn = document.getElementById("carousel-prev");
  const nextBtn = document.getElementById("carousel-next");
  const indicators = document.querySelectorAll("#carousel-indicators span");
  const total = slides.length;
  let current = 0;
  let interval = null;

  function goToSlide(idx) {
    // Wrap around if needed
    current = (idx + total) % total;

    // Update all slides
    slides.forEach((slide, index) => {
      slide.style.opacity = index === current ? "1" : "0";
      slide.style.zIndex = index === current ? "10" : "1";
    });

    // Update indicators
    indicators.forEach((el, i) => {
      el.classList.toggle("bg-blue-800", i === current);
      el.classList.toggle("bg-white", i !== current);
    });
  }

  function nextSlide() {
    goToSlide(current + 1);
  }

  function prevSlide() {
    goToSlide(current - 1);
  }

  // Button event listeners
  prevBtn.addEventListener("click", () => {
    prevSlide();
    resetInterval();
  });

  nextBtn.addEventListener("click", () => {
    nextSlide();
    resetInterval();
  });

  // Indicator event listeners
  indicators.forEach((el, i) => {
    el.addEventListener("click", () => {
      goToSlide(i);
      resetInterval();
    });
  });

  // Auto-rotation
  function startInterval() {
    interval = setInterval(nextSlide, 7000); // Change slide every 5 seconds
  }

  function resetInterval() {
    clearInterval(interval);
    startInterval();
  }

  // Initialize
  goToSlide(0);
  startInterval();

  // Pause on hover
  const carousel = document.getElementById("hero-carousel");
  carousel.addEventListener("mouseenter", () => clearInterval(interval));
  carousel.addEventListener("mouseleave", startInterval);
});

// events sliding card
document.addEventListener("DOMContentLoaded", function () {
  const track = document.getElementById("event-carousel-track");
  const prevBtn = document.getElementById("event-prev-btn");
  const nextBtn = document.getElementById("event-next-btn");
  const items = document.querySelectorAll("#event-carousel-track > div");
  const itemCount = items.length;

  let visibleItems = 3;
  let currentIndex = 0;

  function updateVisibleItems() {
    if (window.innerWidth < 640) {
      visibleItems = 1;
    } else if (window.innerWidth < 1024) {
      visibleItems = 2;
    } else {
      visibleItems = 3;
    }
    updateCarousel();
  }

  function updateCarousel() {
    const itemWidth = 100 / visibleItems;
    track.style.transform = `translateX(-${currentIndex * itemWidth}%)`;

    // Disable buttons when at extremes
    prevBtn.disabled = currentIndex === 0;
    nextBtn.disabled = currentIndex >= itemCount - visibleItems;
  }

  prevBtn.addEventListener("click", () => {
    currentIndex = Math.max(0, currentIndex - 1);
    updateCarousel();
  });

  nextBtn.addEventListener("click", () => {
    currentIndex = Math.min(itemCount - visibleItems, currentIndex + 1);
    updateCarousel();
  });

  window.addEventListener("resize", updateVisibleItems);

  // Initialize
  updateVisibleItems();

  // Add click handler for view images buttons
  document.querySelectorAll(".event-view-btn").forEach((btn) => {
    btn.addEventListener("click", function () {
      const eventCard = this.closest(".flex-shrink-0");
      const eventTitle = eventCard.querySelector("h3").textContent;
    });
  });
});

// modal for our gallery img
document.addEventListener("DOMContentLoaded", function () {
  const images = Array.from(document.querySelectorAll(".gallery-image"));
  const modal = document.getElementById("imageModal");
  const modalImage = document.getElementById("modalImage");
  let currentIndex = 0;

  // Click image to open modal
  images.forEach((img, index) => {
    img.addEventListener("click", () => {
      currentIndex = index;
      modalImage.src = img.src;
      modal.classList.remove("hidden");
      modal.classList.add("flex");
    });
  });

  // 👇 These must be global for HTML onclick=""
  window.closeModal = function () {
    modal.classList.add("hidden");
    modal.classList.remove("flex");
  };

  window.prevImage = function () {
    currentIndex = (currentIndex - 1 + images.length) % images.length;
    modalImage.src = images[currentIndex].src;
  };

  window.nextImage = function () {
    currentIndex = (currentIndex + 1) % images.length;
    modalImage.src = images[currentIndex].src;
  };
});

// youtube overview video
document.addEventListener("DOMContentLoaded", function () {
  const ytIframe = document.getElementById("overview-video");

  if (!ytIframe) return;

  // Load YouTube IFrame API
  if (!window.YT) {
    const tag = document.createElement("script");
    tag.src = "https://www.youtube.com/iframe_api";
    document.body.appendChild(tag);
  }

  let player;

  function initPlayer() {
    player = new YT.Player("overview-video", {
      events: {
        onReady: () => setupObserver(),
      },
    });
  }

  if (window.YT && window.YT.Player) {
    initPlayer();
  } else {
    window.onYouTubeIframeAPIReady = initPlayer;
  }

  function setupObserver() {
    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            player.unMute();
            player.playVideo();
          } else {
            player.pauseVideo();
          }
        });
      },
      {
        threshold: 0.5, //
      }
    );
    observer.observe(ytIframe);
  }
});



// API call to fetch notices
document.addEventListener("DOMContentLoaded", async function () {
  try {
    const response = await fetch("home/getNotices", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
    });

    if (!response.ok) {
      throw new Error(`HTTP error! status: ${response.status}`);
    }

    const notices = await response.json();
    console.log("Notices:", notices);
    const noticeList = document.getElementById("noticeList");
    noticeList.innerHTML = "";

    notices.data.forEach((item) => {
      const li = document.createElement("li");
      
      // Make the notice item clickable to navigate to the notice details page
      li.style.cursor = 'pointer';
      li.style.textDecoration = 'underline';
      li.style.color = '#1d4ed8'; // blue color for links
      li.style.marginBottom = '8px';
      li.textContent =item.notice_title ;
      
      // Add click event to redirect to notice details page
      li.addEventListener('click', function() {
        // Store the entire notice data in sessionStorage
        sessionStorage.setItem('selectedNotice', JSON.stringify(item));
        
        // Redirect to the notice details page
        window.location.href = 'home/notice_details';
      });
      
      noticeList.appendChild(li);
    });
    
    // Set up infinite scrolling after notices are loaded
    setTimeout(() => {
      setupInfiniteScroll();
    }, 100);
    
  } catch (error) {
    console.error("Error fetching notices:", error);
  }
  
  // Function to setup infinite scrolling
  function setupInfiniteScroll() {
    const noticeList = document.getElementById("noticeList");
    if (!noticeList) return;
    
    // Duplicate the notices to create a seamless loop (only if we have content)
    const originalItems = Array.from(noticeList.children);
    if (originalItems.length > 0) {
      // Clone all items and add them again to create a seamless loop
      originalItems.forEach(item => {
        const clonedItem = item.cloneNode(true);
        noticeList.appendChild(clonedItem);
      });
    }
    
    // Start the list positioned so the bottom items are visible initially
    // Calculate the height of the container to position correctly
    const scrollArea = document.getElementById('noticeScrollArea');
    if (scrollArea) {
      // Set initial position to start from bottom (showing bottom items first)
      const containerHeight = scrollArea.clientHeight;
      const listHeight = noticeList.scrollHeight;
      
      // Position the list so it starts scrolled to the bottom
      // This means we'll see the duplicated items first as they scroll up
      let position = containerHeight;
      
      // Set up JavaScript-based scrolling
      const scrollSpeed = 0.5; // Adjust this value to change scroll speed
      let isPaused = false;
      
      // Set initial position
      noticeList.style.transform = `translateY(${position}px)`;
      
      // Set up pause on hover
      scrollArea.addEventListener('mouseenter', () => {
        isPaused = true;
      });
      
      scrollArea.addEventListener('mouseleave', () => {
        isPaused = false;
      });
      
      // Main animation loop
      function animationLoop() {
        if (!isPaused) {
          position -= scrollSpeed;
          
          // When we've scrolled to the end of the content, loop back
          if (position <= -listHeight/2) {
            position = containerHeight;
          }
          
          noticeList.style.transform = `translateY(${position}px)`;
        }
        requestAnimationFrame(animationLoop);
      }
      
      // Start the main animation loop
      animationLoop();
    }
  }
});
