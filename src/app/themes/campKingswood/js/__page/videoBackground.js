class videoBackground {
    constructor() {
        this.videoBackground = document.querySelectorAll('.video-bg:not(.video-bg--yt)');
        this.playerYT = document.querySelectorAll('.video-bg--yt');
    }
    init() {
        this.setRatio();
        if ( this.playerYT ){
            this.ytPlayer();
        }
    }
    setRatio() {
        this.videoBackground.forEach( (el) => {
            const iframe = el.querySelector('iframe');
            if ( iframe ) {
                iframe.dataset.ratio = (parseInt(iframe.clientWidth) / parseInt(iframe.clientHeight)).toFixed(2);
                iframe.removeAttribute('width');
                iframe.removeAttribute('height');
                let height = (el.parentNode.clientHeight).toFixed(2); 
                const newWidth = (height * iframe.dataset.ratio).toFixed(2); 
                iframe.style.width = `${newWidth}px`;
                iframe.style.height = `${height}px`; 
                if ( window.innerWidth > newWidth) { 
                    iframe.style.width = `${parseInt(window.innerWidth)}px`;
                    iframe.style.height = `${parseInt(iframe.dataset.ratio * window.innerWidth)}px`;
                }
            }
        });
    }
    ytPlayer() {
        let wrapper = jQuery('.playerYT');
        let options = {
            showControls: false,
            loop: true,
            mute: true
        };
        wrapper.YTPlayer(options);
    }
    resized() {
        this.setRatio();
    }
}
export default new videoBackground();