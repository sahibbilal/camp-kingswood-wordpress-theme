import { disableBodyScroll, enableBodyScroll, clearAllBodyScrollLocks } from "body-scroll-lock";

import { checkElementInView } from "../__utils/checkElementInView";

const mainHeader = document.querySelector(".main-header");
const navToggle = document.querySelector(".btn-hamburger");
const parentMenuItems = document.querySelectorAll(".main-header__nav li.menu-item-has-children.depth-0 > a");
const navWrapper = document.querySelector(".main-header__nav-wrapper");
const mobileBackButton = document.querySelector(".main-header__mobile-back-button");

const openHeaderClass = "open";
const openMenuItemClass = "active";

const closeHeader = () => {
    mainHeader.classList.remove(openHeaderClass);
    closeSubMenu();
    clearAllBodyScrollLocks();
};

const openHeader = () => {
    disableBodyScroll(navWrapper);
    mainHeader.classList.add(openHeaderClass);
};

const navToggleClickHandler = () => {
    if (mainHeader.classList.contains(openHeaderClass)) {
        closeHeader();
    } else {
        openHeader();
    }
};

const clickOffMenu = (e) => {
    if (!mainHeader.contains(e.target)) {
        mainHeader.classList.remove('submenu-open');
        document.removeEventListener('click', clickOffMenu);
        clearAllBodyScrollLocks();

        let openMenuItems = document.querySelectorAll(".main-header__nav li.active");
    
        openMenuItems.forEach(el => {
            el.classList.remove('active');
        });
    }
};

const parentMenuItemToggleOpenClose = (e) => {
    e.preventDefault();

    if (e.target.parentElement.classList.contains(openMenuItemClass)) {
        e.target.parentElement.classList.remove(openMenuItemClass);
        mainHeader.classList.remove('submenu-open');
        document.removeEventListener('click', clickOffMenu);
        clearAllBodyScrollLocks();
        disableBodyScroll(navWrapper);
    } else {
        Array.from(e.target.parentElement.parentElement.children).forEach(child => {
            child.classList.remove(openMenuItemClass);
        });

        e.target.parentElement.classList.add(openMenuItemClass);
        mainHeader.classList.add('submenu-open');
        document.addEventListener('click', clickOffMenu);
        clearAllBodyScrollLocks();
        disableBodyScroll(e.target.parentElement.querySelector('.sub-menu'));
    }
};

const closeMobileHeaderOnDesktop = () => {
    let mql = window.matchMedia("(min-width: 768px)");

    if (mql.matches) {
        closeHeader();
    }
};

const closeSubMenu = (e) => {
    if (e) {
        e.preventDefault();
    }

    mainHeader.classList.remove('submenu-open');
    clearAllBodyScrollLocks();
    disableBodyScroll(navWrapper);
    
    parentMenuItems.forEach(el => {
        el.parentElement.classList.remove(openMenuItemClass);
    });
};

export const initHeader = () => {
    navToggle.addEventListener("click", navToggleClickHandler);
    window.addEventListener("resize", closeMobileHeaderOnDesktop);
    window.addEventListener("hashchange", closeHeader);
    mobileBackButton.addEventListener("click", closeSubMenu);
    
    parentMenuItems.forEach(el => {
        el.addEventListener("click", parentMenuItemToggleOpenClose);
    });
};
