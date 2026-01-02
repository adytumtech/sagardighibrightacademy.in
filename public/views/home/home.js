document.addEventListener("DOMContentLoaded", () => {
  console.log("Home JS loaded");

  /* =====================================================
     HERO CAROUSEL
  ===================================================== */
  (() => {
    const slides = document.querySelectorAll("#carousel-images > div");
    const prevBtn = document.getElementById("carousel-prev");
    const nextBtn = document.getElementById("carousel-next");
    const indicators = document.querySelectorAll("#carousel-indicators span");
    const carousel = document.getElementById("hero-carousel");

    if (!slides.length) return;

    let current = 0;
    let interval;
    const total = slides.length;

    function goToSlide(i) {
      current = (i + total) % total;
      slides.forEach((s, idx) => {
        s.style.opacity = idx === current ? "1" : "0";
        s.style.zIndex = idx === current ? "10" : "1";
      });
      indicators.forEach((dot, idx) => {
        dot.classList.toggle("bg-blue-800", idx === current);
        dot.classList.toggle("bg-white", idx !== current);
      });
    }

    function start() {
      interval = setInterval(() => goToSlide(current + 1), 7000);
    }

    function reset() {
      clearInterval(interval);
      start();
    }

    prevBtn?.addEventListener("click", () => { goToSlide(current - 1); reset(); });
    nextBtn?.addEventListener("click", () => { goToSlide(current + 1); reset(); });
    indicators.forEach((dot, i) =>
      dot.addEventListener("click", () => { goToSlide(i); reset(); })
    );

    carousel?.addEventListener("mouseenter", () => clearInterval(interval));
    carousel?.addEventListener("mouseleave", start);

    goToSlide(0);
    start();
  })();

 

  /* =====================================================
     EVENT SLIDER
  ===================================================== */
  (() => {
    const track = document.getElementById("event-carousel-track");
    const prev = document.getElementById("event-prev-btn");
    const next = document.getElementById("event-next-btn");

    if (!track || !prev || !next) return;

    let index = 0;
    let visible = 3;
    const items = track.children;

    function updateVisible() {
      visible = window.innerWidth < 640 ? 1 : window.innerWidth < 1024 ? 2 : 3;
      update();
    }

    function update() {
      track.style.transform = `translateX(-${index * (100 / visible)}%)`;
      prev.disabled = index === 0;
      next.disabled = index >= items.length - visible;
    }

    prev.addEventListener("click", () => { index = Math.max(0, index - 1); update(); });
    next.addEventListener("click", () => { index = Math.min(items.length - visible, index + 1); update(); });

    window.addEventListener("resize", updateVisible);
    updateVisible();
  })();


  /* =====================================================
     FETCH NOTICES + MARQUEE SCROLL
  ===================================================== */
  (() => {
    const list = document.getElementById("noticeList");
    const area = document.getElementById("noticeScrollArea");
    if (!list || !area) return;

    fetch("home/getNotices", { method: "GET" })
      .then(res => res.json())
      .then(data => {
        list.innerHTML = "";
        data.data?.forEach(item => {
          const li = document.createElement("li");
          li.textContent = item.notice_title || "";
          li.className = "cursor-pointer text-blue-700 underline mb-2";
          li.onclick = () => {
            sessionStorage.setItem("selectedNotice", JSON.stringify(item));
            window.location.href = "home/notice_details";
          };
          list.appendChild(li);
        });
        startMarquee();
      })
      .catch(() => {
        list.innerHTML = `<li class="text-red-500">Failed to load notices</li>`;
      });

    function startMarquee() {
  let paused = false;
  const speed = 0.4;

  const containerHeight = area.clientHeight;
  const restartOffset = containerHeight * 0.5; // 🔥 70% from bottom

  let pos = restartOffset;

  area.addEventListener("mouseenter", () => paused = true);
  area.addEventListener("mouseleave", () => paused = false);

  function loop() {
    if (!paused) {
      pos -= speed;

      // When list fully leaves from top → restart from 70% bottom
      if (pos <= -list.scrollHeight) {
        pos = restartOffset;
      }

      list.style.transform = `translateY(${pos}px)`;
    }
    requestAnimationFrame(loop);
  }

  loop();
}

  })();

  /* =====================================================
     ADMISSION ENQUIRY AJAX
  ===================================================== */
  (() => {
    const form = document.getElementById("admission_enquiry_form");
    if (!form) return;

    const g = form.querySelector('[name="guardian_name"]');
    const c = form.querySelector('[name="child_name"]');
    const p = form.querySelector('[name="phone_number"]');

    const ge = form.querySelector(".guardian_name_error");
    const ce = form.querySelector(".child_name_error");
    const pe = form.querySelector(".phone_error");

    function valid() {
      let ok = true;
      if (!g.value.trim()) { ge.classList.remove("hidden"); ok = false; } else ge.classList.add("hidden");
      if (!c.value.trim()) { ce.classList.remove("hidden"); ok = false; } else ce.classList.add("hidden");
      if (!/^[0-9]{10}$/.test(p.value)) { pe.classList.remove("hidden"); ok = false; } else pe.classList.add("hidden");
      return ok;
    }

    function successUI(msg) {
      form.classList.add("hidden");
      const box = document.createElement("div");
      box.className = "global-form-message mt-6 p-6 bg-green-50 border border-green-200 rounded text-center";
      box.innerHTML = `
        <h3 class="text-lg font-semibold text-green-700 mb-2">Thank you!</h3>
        <p class="text-green-600 mb-4">${msg}</p>
        <button class="ok-btn bg-green-600 text-white px-4 py-2 rounded">OK</button>
      `;
      form.parentNode.insertBefore(box, form);
      box.querySelector(".ok-btn").onclick = () => {
        box.remove();
        form.reset();
        form.classList.remove("hidden");
      };
    }

    form.addEventListener("submit", e => {
      e.preventDefault();
      if (!valid()) return;

      const btn = form.querySelector(".submit-btn");
      btn.disabled = true;
      btn.textContent = "Submitting...";

      fetch(form.dataset.ajaxUrl, { method: "POST", body: new FormData(form) })
        .then(r => r.json())
        .then(d => {
          btn.disabled = false;
          btn.textContent = "Submit";
          d.success ? successUI(d.message) : alert(d.message);
        })
        .catch(() => {
          btn.disabled = false;
          btn.textContent = "Submit";
          alert("Server error");
        });
    });
  })();
});
