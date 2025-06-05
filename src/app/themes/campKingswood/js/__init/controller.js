import Accordion from "../__shortcodes/accordions";
import Tabs from "../__page/tabs";
import GalleryLightbox from "../__page/lightboxGallery";
import video from "../__utils/video";
import { smoothScrollInit } from '../__utils/smoothScroll'
import {
  SimpleSlider,
  LightboxSlider,
  ActivitySlider,
  handleActivitySliderChange,
  BioSlider,
  BioPhotoSlider,
  ScrollHookSlider,
  TabSlider,
  ProgrammingContentSlider,
  TestimonialsSlider
} from "../__utils/sliders";
import Tables from "../__utils/tables";
import Forms from "../__utils/forms";
import vhUnit, {vhUnitResize} from "../__utils/vhUnit";
import announcementBarUnit, {announcementBarUnitResize} from "../__utils/announcementBar";
import { initHeader } from "../__header/header";
import videoBackground from "../__page/videoBackground";
import { scrollToNextSectionInit } from "../__page/scrollToNextSection";
import { lightboxInit } from "../__utils/lightbox";
import { handleKeepReadingButton } from "../__page/keepReading";
import { handleScrollHookSectionButtons } from "../__page/scrollHookSections";

// GLOBAL APP CONTROLLER
const controller = {
  init() {
    document.querySelector("html").classList.remove("no-js");
    smoothScrollInit();
    Accordion.init();
    Tabs.init();
    video.init();
    SimpleSlider.init();
    LightboxSlider.init();
    GalleryLightbox.init();
    ActivitySlider.init();
    ProgrammingContentSlider.init();
    TestimonialsSlider.init();
    BioSlider.init();
    BioPhotoSlider();
    ScrollHookSlider();
    TabSlider();
    handleActivitySliderChange();
    Tables.init();
    vhUnit();
    vhUnitResize();
    announcementBarUnit();
    announcementBarUnitResize();
    initHeader();
    videoBackground.init();
    scrollToNextSectionInit();
    lightboxInit();
    handleKeepReadingButton();
    handleScrollHookSectionButtons();
  },
  loaded() {
    document.querySelector("body").classList.add("page-has-loaded");
    Forms();
    vhUnit();
  },
  resized() {
    Tables.toggleShadow();
    GalleryLightbox.refreshSlider();
    ScrollHookSlider();
    TabSlider();
  },
  scrolled() {},
  keyDown(e) {},
  mouseUp(e) {},
};
export default controller;
