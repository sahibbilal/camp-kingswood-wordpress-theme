const announcementBarUnit = () => {
  let announcementBar = document.querySelector('#announcement-bar.active');

  if (announcementBar) {
      document.documentElement.style.setProperty(
        "--ab",
        `${announcementBar.offsetHeight}px`
      );
  } else {
    document.documentElement.style.setProperty(
      "--ab",
      `0px`
    );
  }
};

export const announcementBarUnitResize = () => {
  let announcementBar = document.querySelector('#announcement-bar');

  if (announcementBar) {
    window.addEventListener("orientationchange", (e) => {
        setTimeout(announcementBarUnit, 10);
    });

    window.addEventListener("resize", (e) => {
        announcementBarUnit();
    });

    let announcementBarClose = document.querySelector('#announcement-bar-close');

    if (announcementBarClose) {
        announcementBarClose.addEventListener("click", (e) => {
          announcementBar.classList.remove('active');
          document.body.classList.remove('announcement-bar');
          
          let d = new Date();
          let numdays = 1;
          d.setTime(d.getTime() + (numdays*24*60*60*1000));
          let expires = "expires="+ d.toUTCString();
          document.cookie = "AnnouncementBarClosed=1;" + expires + ";path=/";

          document.documentElement.style.setProperty(
            "--ab",
            `0px`
          );
        });
    }
  }
};

export default announcementBarUnit;
