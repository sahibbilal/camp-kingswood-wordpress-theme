import { disableBodyScroll, enableBodyScroll } from "body-scroll-lock";

const $ = jQuery.noConflict();

function openLightbox() {
  const relatedLightboxName = this.getAttribute("data-lightbox");

  const relatedLightbox = document.querySelector(
    `.lightbox[data-lightbox-name="${relatedLightboxName}"]`
  );

  if (relatedLightbox) {
    relatedLightbox.classList.add("open");
    disableBodyScroll(relatedLightbox);
  }

  if (this.hasAttribute("data-lightbox-slide")) {
    const slideNum = this.getAttribute("data-lightbox-slide");
    $(".related-slider").slick("slickGoTo", slideNum, true);
  }

  window.addEventListener("keydown", handleEscButton);
}

function closeLightbox() {
  const activeLightbox = document.querySelector(".lightbox.open");
  activeLightbox.classList.remove("open");
  enableBodyScroll(activeLightbox);

  const lightboxVideo = activeLightbox.querySelector("iframe");

  if (lightboxVideo) {
    lightboxVideo.removeAttribute("src");
    activeLightbox.querySelector(".iframe-wrapper__overlay").style.display =
      "block";
  }

  window.removeEventListener("keydown", handleEscButton);
}

const handleLightboxOpen = () => {
  const openButtons = document.querySelectorAll("button[data-lightbox]");

  if (openButtons) {
    openButtons.forEach((btn) => {
      btn.addEventListener("click", openLightbox);
    });
  }
};

const handleLightBoxClose = () => {
  const closeBtns = document.querySelectorAll(".lightbox__close-btn");

  if (closeBtns) {
    closeBtns.forEach((btn) => {
      btn.addEventListener("click", closeLightbox);
    });
  }
};

function handleEscButton(e) {
  const lightboxWrapper = document.querySelector(".lightbox.open");

  if (e.keyCode == 27 && lightboxWrapper) {
    closeLightbox();
  }
}

export const lightboxInit = () => {
  handleLightboxOpen();
  handleLightBoxClose();
};
