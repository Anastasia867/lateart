// 🌟 Мобільне меню
document.addEventListener("DOMContentLoaded", () => {
  const navToggle = document.querySelector(".nav-toggle");
  const nav = document.querySelector(".nav-links");

  if (navToggle) {
    navToggle.addEventListener("click", () => {
      nav.classList.toggle("open");
      navToggle.classList.toggle("active");
    });
  }
});

// 🌟 Ховаємо хедер при скролі вниз
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

// 🌟 Динамічний бейдж кількості товарів
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

// 🌟 Показати/сховати час доставки
document.addEventListener("DOMContentLoaded", () => {
  const delivery = document.querySelector("select[name='delivery']");
  const timeWrapper = document.getElementById("time-wrapper");
  const timeSelect = document.getElementById("delivery_time");

  if (!delivery || !timeWrapper || !timeSelect) return;

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
});

// 🌟 AJAX додавання в кошик (кнопки data-add-to-cart)
document.addEventListener("click", (e) => {
  if (!e.target.hasAttribute("data-add-to-cart")) return;

  const card = e.target.closest(".menu-item");
  if (!card) return;

  const formData = new FormData();
  formData.append("id", card.dataset.id);
  formData.append("name", card.dataset.name);
  formData.append("price", card.dataset.price);

  fetch("add_to_cart.php", { method: "POST", body: formData }).then(() => {
    updateCartBadge();
  });
});
document.addEventListener("DOMContentLoaded", () => {
  const toggle = document.getElementById("theme-toggle");
  if (!toggle) return;

  // завантажити попередній вибір
  const saved = localStorage.getItem("lateart_theme");
  if (saved === "dark") {
    document.body.classList.add("dark-theme");
  }

  toggle.addEventListener("click", () => {
    document.body.classList.toggle("dark-theme");
    const mode = document.body.classList.contains("dark-theme")
      ? "dark"
      : "light";
    localStorage.setItem("lateart_theme", mode);
  });
});
