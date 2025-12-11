document.addEventListener("DOMContentLoaded", () => {
  // 🌟 Мобільне меню
  const navToggle = document.querySelector(".nav-toggle");
  const nav = document.querySelector(".nav-links");

  if (navToggle) {
    navToggle.addEventListener("click", () => {
      nav.classList.toggle("open");
      navToggle.classList.toggle("active");
    });
  }

  // 🌟 Ховаємо хедер при скролі
  let lastY = 0;
  const header = document.querySelector(".top-nav");

  window.addEventListener("scroll", () => {
    const y = window.scrollY;
    if (y > lastY && y > 80) {
      header.classList.add("top-nav--hidden");
    } else {
      header.classList.remove("top-nav--hidden");
    }
    lastY = y;
  });

  // 🌟 Бейдж кошика
  function updateCartBadge() {
    fetch("cart_count.php")
      .then((res) => res.text())
      .then((count) => {
        document.querySelectorAll("[data-cart-count]").forEach((el) => {
          el.textContent = count;
          el.style.display = count > 0 ? "inline-flex" : "none";
        });
      });
  }
  updateCartBadge();

  // 🌟 Показувати час доставки
  const delivery = document.querySelector("select[name='delivery']");
  const timeWrapper = document.getElementById("time-wrapper");
  const timeSelect = document.getElementById("delivery_time");

  if (delivery && timeWrapper && timeSelect) {
    function updateTimeVisibility() {
      if (delivery.value === "courier") {
        timeWrapper.style.display = "block";
        timeSelect.required = true;
      } else {
        timeWrapper.style.display = "none";
        timeSelect.required = false;
      }
    }
    delivery.addEventListener("change", updateTimeVisibility);
    updateTimeVisibility();
  }

  document.addEventListener("click", (e) => {
    const btn = e.target.closest("[data-add-to-cart]");
    if (!btn) return;

    e.preventDefault();

    const id = btn.dataset.id;
    const name = btn.dataset.name;
    const price = btn.dataset.price;

    if (!id || !name || !price) {
      console.error("Немає даних товару!");
      return;
    }

    const formData = new FormData();
    formData.append("id", id);
    formData.append("name", name);
    formData.append("price", price);

    fetch("add_to_cart.php", {
      method: "POST",
      body: formData,
    }).then(() => {
      updateCartBadge();
      showToast(`Додано в кошик: ${name}`);
    });
  });

  // 🌟 Темна тема
  const themeToggle = document.getElementById("theme-toggle");
  if (themeToggle) {
    const saved = localStorage.getItem("lateart_theme");
    if (saved === "dark") {
      document.body.classList.add("dark-theme");
    }

    themeToggle.addEventListener("click", () => {
      document.body.classList.toggle("dark-theme");
      localStorage.setItem(
        "lateart_theme",
        document.body.classList.contains("dark-theme") ? "dark" : "light"
      );
    });
  }

  // 🌟 Форма контактів — AJAX
  const contactForm = document.getElementById("contactForm");

  if (contactForm) {
    contactForm.addEventListener("submit", function (e) {
      e.preventDefault();

      let formData = new FormData(this);

      fetch("save_message.php", {
        method: "POST",
        body: formData,
      })
        .then((r) => r.text())
        .then((result) => {
          if (result === "OK") {
            showToast("Ваше повідомлення надіслано!");
            contactForm.reset();
          } else {
            showToast("Помилка. Повідомлення порожнє.");
          }
        });
    });
  }

  // 🌟 Авто-закриття toast
  setTimeout(() => {
    const t = document.getElementById("toast");
    if (t) {
      t.classList.remove("show");
      setTimeout(() => (t.style.display = "none"), 400);
    }
  }, 3500);
});

// Виносимо showToast за межі, щоб працював скрізь
function showToast(text) {
  const toast = document.createElement("div");
  toast.className = "toast show";
  toast.innerHTML = `<p>${text}</p>`;
  document.body.appendChild(toast);

  setTimeout(() => {
    toast.classList.remove("show");
    setTimeout(() => toast.remove(), 400);
  }, 3000);
}
