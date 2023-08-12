document.addEventListener("DOMContentLoaded", () => {
  const links = document.querySelectorAll(".scroolPos");

  links.forEach((link) => {
    link.addEventListener("click", () => {
      // Store the current scroll position in the session
      sessionStorage.setItem("scrollPosition", window.scrollY);
      console.log(window.scrollY);
    });
  });

  // Check if there is a stored scroll position in the session
  const storedScrollPosition = sessionStorage.getItem("scrollPosition");

  if (storedScrollPosition) {
    // Scroll to the stored position
    window.scrollTo(0, storedScrollPosition);

    // Clear the stored scroll position from the session so that it won't be used again
    sessionStorage.removeItem("scrollPosition");
  }
});
