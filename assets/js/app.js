const primaryNav = document.querySelector("#primary-navigation")
primaryNav.setAttribute("data-visible", "false")
const navToggle = document.querySelector(".hamburger-menu")

navToggle.addEventListener("click", () => {
    let visibility = primaryNav.getAttribute("data-visible")

    if (visibility === "false") {
        primaryNav.setAttribute("data-visible", true)
        navToggle.setAttribute("aria-expanded", true)
    } else {
        primaryNav.setAttribute("data-visible", false)
        navToggle.setAttribute("aria-expanded", false)
    }
})
