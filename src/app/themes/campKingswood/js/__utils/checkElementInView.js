require('intersection-observer');

/**
 * Check if the element is in the viewport
 * 
 * @param {string} selector 
 * @param {() => void} inViewCallback 
 * @param {() => void} outOfViewCallback 
 * @param {IntersectionObserverInit} customConfig 
 */

export const checkElementInView = (
    selector,
    inViewCallback,
    outOfViewCallback,
    customConfig = {}
  ) => {
    const elements = document.querySelectorAll(selector);
  
    const defaultConfig = {
      root: null,
      rootMargin: "0px 0px 0px 0px",
      threshold: [0],
    };

    const config = Object.assign({}, defaultConfig, customConfig);
  
    const observer = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          inViewCallback();
        } else {
          outOfViewCallback();
        }
      });
    }, config);
  
    elements.forEach((element) => {
      observer.observe(element);
    });


  };
  