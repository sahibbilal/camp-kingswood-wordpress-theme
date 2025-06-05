const $ = jQuery.noConflict();

const scrollToNextSection = (selector) => {
    $([document.documentElement, document.body]).animate(
        {
            scrollTop: $(selector).offset().top - $('.main-header').height(),
        },
        500
    );
};

export const scrollToNextSectionInit = () => {
    const homeNextSectionButton = document.querySelector(
        '.hero-home__scroll-text'
    );

    if (homeNextSectionButton) {
        homeNextSectionButton.addEventListener('click', () => {
            scrollToNextSection('.block-about');
        });
    }
};
