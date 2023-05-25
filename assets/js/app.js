
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
    loginRegisterContainer.style.maxWidth = "500px"
    loginRegisterContainer.style.display = "block"
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

// function


// ------------------