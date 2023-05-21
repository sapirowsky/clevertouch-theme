const primaryNav = document.querySelector("#primary-navigation")
const navToggle = document.querySelector(".hamburger-menu")
primaryNav.setAttribute("data-visible", "false")

navToggle.addEventListener("click", () => {
    const html = document.querySelector("html")
    const visibility = primaryNav.getAttribute("data-visible")

    if (visibility === "false") {
        primaryNav.setAttribute("data-visible", true)
        navToggle.setAttribute("aria-expanded", true)
    } else {
        primaryNav.setAttribute("data-visible", false)
        navToggle.setAttribute("aria-expanded", false)
    }

    html.addEventListener("click", (e) => {
        console.log(e)
        if (e.target != primaryNav && e.target != navToggle) {
            primaryNav.setAttribute("data-visible", false)
            navToggle.setAttribute("aria-expanded", false)
        }
    })
})
