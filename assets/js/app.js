
// temp - helpers
// const openCart = document.querySelector("#cart-checkbox").checked = 1
// const openNav = document.querySelector("#nav-checkbox").checked = 1
// ------------------
// if css is not supported js handle interaction which css was supposed to do
if (!isSelectorSupported()) {
    const controlContainer = document.querySelectorAll(".control-container")

    controlContainer.forEach(container => {
        container.addEventListener("change", () => {
            const input = container.querySelector("input")
            const sidebar = container.querySelector(".sidebar")
            const sidebarButton = container.querySelector(".sidebar-button")
            const behindSidebar = container.querySelector(".behind-sidebar")
            const closeSidebarButton = sidebar.querySelector(".sidebar-close-container label")
            if (input.checked) {
                sidebar.style.opacity = 1
                sidebar.style.transform = "translateX(0)"
                sidebar.style.pointerEvents = 'auto'
                sidebarButton?.style.setProperty('--rotate', '45deg')
                sidebarButton?.style.setProperty('--width', '100%')
                behindSidebar.style.pointerEvents = "all"
                behindSidebar.style.opacity = ".5"
                closeSidebarButton.style.setProperty("--rotate", '45deg')
                closeSidebarButton.style.setProperty("--transformY-data", '3px')
            } else {
                sidebar.style.opacity = 0
                sidebar.style.transform = "translateX(100%)"
                sidebar.style.pointerEvents = 'none'
                sidebarButton?.style.setProperty('--rotate', '0deg')
                sidebarButton?.style.setProperty('--width', '75%')
                behindSidebar.style.pointerEvents = "none"
                behindSidebar.style.opacity = "0"
                closeSidebarButton.style.setProperty("--rotate", '0')
                closeSidebarButton.style.setProperty("--transformY-data", '0')
            }
        })
    })
}
//Function checks if browser supports css by creating not existing in dom element and using desired css on it
function isSelectorSupported() {
    const dummy = document.createElement('div')
    dummy.innerHTML = '<p></p>'

    try {
        dummy.querySelector(':has(p)')
        return true
    } catch (error) {
        return false
    }
}
// ------------------

// custom login register page
let loginRegisterContainer
if (loginRegisterContainer = document.querySelector("#customer_login")) {
    const woocommerce = document.querySelector(".woocommerce")
    woocommerce.style.display = "flex"
    woocommerce.style.justifyContent = "center"
    loginRegisterContainer.style.maxWidth = "500px"
    loginRegisterContainer.style.display = "grid"
    loginRegisterContainer.style.gap = "0"
    const loginPage = loginRegisterContainer.querySelector(".u-column1")
    const registerPage = loginRegisterContainer.querySelector(".u-column2")
    registerPage.classList.add("custom-hide")

    const container = document.createElement("p")
    container.style.flexDirection = "row"
    container.style.gap = ".5em"

    loginRegisterContainer.appendChild(container)

    const button = document.createElement("span")
    button.style.color = "blue"
    button.style.cursor = "pointer"



    container.textContent = "Nie masz konta?"
    button.textContent = "Zarejestruj się"
    container.appendChild(button)

    button.addEventListener("click", () => {
        registerPage.classList.toggle("custom-hide")
        loginPage.classList.toggle("custom-hide")

        if (loginPage.classList.contains("custom-hide")) {
            container.textContent = "Masz konto?"
            button.textContent = "Zaloguj się"
            container.appendChild(button)
        } else {
            container.textContent = "Nie masz konta?"
            button.textContent = "Zarejestruj się"
            container.appendChild(button)
        }
    })


}
// ------------------

// sub-menu
const navItems = document.querySelectorAll('.nav-items ul li')
navItems.forEach(item => {
    if (item.querySelector('ul')) {
        const itemLink = item.querySelector('a')
        itemLink.setAttribute('href', '#')
        itemLink.style.display = 'flex'
        itemLink.style.justifyContent = 'space-between'
        const span = document.createElement('span')
        span.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"><path fill="currentColor" d="M8.025 22L6.25 20.225L14.475 12L6.25 3.775L8.025 2l10 10l-10 10Z"/></svg>'
        itemLink.appendChild(span)

        itemLink.addEventListener('click', () => {
            const itemChild = item.querySelector(".sub-menu")
            if (itemChild.style.display === 'block') {
                itemChild.style.display = 'none'
                span.style.rotate = "0deg"
            } else {
                itemChild.style.display = 'block'
                itemChild.style.marginLeft += '.5em'
                span.style.rotate = "90deg"
            }
        })
    }
})

// ------------------
