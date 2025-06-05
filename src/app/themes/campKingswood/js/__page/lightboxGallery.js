import lockScroll from '../__utils/lockScroll';

const $ = jQuery.noConflict();

class LightboxGallery {
    constructor() {
        this.lightboxes = $('.lightbox-gallery__slider');
        this.lightboxOpen = $('.lightbox-gallery__single-thumb');
        this.lightboxClose = $('.lightbox-gallery__close');
    }
    init() {
        this.bindEvents();
    }
    bindEvents() {
        this.lightboxOpen.on('click', this.openLightbox);
        this.lightboxClose.on('click', this.closeLightbox);
    }
    openLightbox(e) {
        e.preventDefault();
        const slideNum = $(this).attr('data-slide');
        const lightboxBlock = $(this).closest('.block-gallery-lightbox');

        lightboxBlock.find('.lightbox-gallery__gallery-wrapper').addClass('active');
        lightboxBlock.find('.lightbox-gallery__slider').slick('slickGoTo', slideNum, true);
        lockScroll.lock();
    }
    refreshSlider() {
        this.lightboxes.slick('refresh');
    }
    closeLightbox() {
        const lightboxWrapper = $(this).parent('.lightbox-gallery__gallery-wrapper');
        lightboxWrapper.removeClass('active');
        lockScroll.unlock();
    }
}
export default new LightboxGallery();
