
function showContent() {
    const wrapper = this.closest('.keep-reading') 
    wrapper.classList.toggle('visible');

    if (wrapper.classList.contains('visible')) {
        this.textContent = "Read Less"
    } else {
        this.textContent = "Keep Reading";
    }

}

export const handleKeepReadingButton = () => {
    const buttons = document.querySelectorAll('.keep-reading__button');

    if (buttons) {
        buttons.forEach(btn => {
            btn.addEventListener('click', showContent);
        })
    }
}