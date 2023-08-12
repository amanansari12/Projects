document.addEventListener("DOMContentLoaded", () => {
    const navbar = document.getElementById("navbar");
    navbar.classList.add("bg-body-secondary");
    navbar.classList.remove("bg-body-transparent-md");
    // navbar.classList.remove("fixed-top");


    const btnlogin = document.getElementById("btnLogin");
    const btnsignup = document.getElementById("btnSignup");




    window.addEventListener("scroll", () => {
        const scrollPosition = window.scrollY;
        const changeColorHeight = 50;

        if (scrollPosition > changeColorHeight) {

            // console.log(btnlogin);
            // Login Button Color Change
            btnlogin.classList.add("btn-outline-success");
            btnlogin.classList.remove("btn-success");
            // console.log(btnlogin);
            // Signup Button Color Change
            btnsignup.classList.add("btn-outline-primary");
            btnsignup.classList.remove("btn-primary");

        } else {

            // Login Button Color Change back
            btnlogin.classList.add("btn-success");
            btnlogin.classList.remove("btn-outline-success");

            // Login Button Color Change back
            btnsignup.classList.add("btn-primary");
            btnsignup.classList.remove("btn-outline-primary");

        }
    });

});