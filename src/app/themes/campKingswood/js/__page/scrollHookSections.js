function buttonClicked(button, buttons, shsNavigation) {
    if (shsNavigation.classList.contains('sliding')) {
        return;
    }

    document.body.classList.add('scrolling');

    buttons.forEach(btn => {
        btn.classList.remove('active');
    });

    button.classList.add('active');
                            
    setTimeout(function() {
        document.body.classList.remove('scrolling');
    }, 800);
}

function windowScrolled(sections, buttons, mainHeader) {
    if (document.body.classList.contains('scrolling')) {
        return;
    }

    let visibleSections = Array.from(sections).filter(
        section => section.getBoundingClientRect().top + 200 <= window.innerHeight
    );

    if (visibleSections.length == 0) {
        return;
    }
    
    let lastVisibleSection = visibleSections.pop();

    buttons.forEach(btn => {
        if ( btn.getAttribute('href') == '#' + lastVisibleSection.getAttribute('id') ) {
            btn.classList.add('active');
        } else {
            btn.classList.remove('active');
        }
    });

    lastVisibleSection.classList.add('visible');
}

export const handleScrollHookSectionButtons = () => {
    const buttons = document.querySelectorAll('.shs-nav-link');

    if (buttons) {
        const sections = document.querySelectorAll('.shs-section');
        const mainHeader = document.getElementById('main-header');
        const shsNavigation = document.getElementById('shs-navigation');

        buttons.forEach(btn => {
            btn.addEventListener('click', function() {
                buttonClicked(this, buttons, shsNavigation);
            });
        });

        if (sections) {
            window.addEventListener('scroll', function() {
                windowScrolled(sections, buttons, mainHeader);
            });
        }
    }
}