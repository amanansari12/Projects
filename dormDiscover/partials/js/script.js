document.addEventListener("DOMContentLoaded", () => {
  const navbar = document.getElementById("navbar");
  const textColor = document.getElementsByClassName("text");
  const textColor2 = document.getElementsByClassName("textBlack");
  const btnlogin = document.getElementById("btnLogin");
  const btnsignup = document.getElementById("btnSignup");
  console.log(textColor);

  window.addEventListener("scroll", () => {
    const scrollPosition = window.scrollY;
    const changeColorHeight = 300;

    if (scrollPosition > changeColorHeight) {
      // Change Navbar Color
      navbar.classList.add("bg-body-secondary");
      navbar.classList.remove("bg-body-transparent-md");

      // console.log(btnlogin);

      // Convert HTMLCollection to an array and then loop through each element
      Array.from(textColor).forEach((element) => {
        element.classList.add("textBlack");
        element.classList.remove("text");
      });

      try {
        // Login Button Color Change
        btnlogin.classList.add("btn-outline-success");
        btnlogin.classList.remove("btn-success");

        // Signup Button Color Change
        btnsignup.classList.add("btn-outline-primary");
        btnsignup.classList.remove("btn-primary");
      } catch (error) {
        console.log("An error occurred");
      }
    } else {
      navbar.classList.remove("bg-body-secondary"); // Remove the tertiary color class
      navbar.classList.add("bg-body-transparent-md"); // Add the original color class back

      // Convert HTMLCollection to an array and then loop through each element
      Array.from(textColor2).forEach((element) => {
        element.classList.remove("textBlack");
        element.classList.add("text");
      });

      try {
        // Login Button Color Change back
        btnlogin.classList.add("btn-success");
        btnlogin.classList.remove("btn-outline-success");

        // Login Button Color Change back
        btnsignup.classList.add("btn-primary");
        btnsignup.classList.remove("btn-outline-primary");
      } catch (error) {
        console.log("An error occurred");
      }
    }
  });
});
