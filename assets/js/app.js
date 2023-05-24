// ------------------
// if css isnt supported js handle interaction which css was supposed to do
if (!isSelectorSupported()) {
    const cartContainer = document.querySelector(".cart-container")
    const cartInput = cartContainer.querySelector("input")
    const navContainer = document.querySelector(".sidebar-container")
    const navInput = navContainer.querySelector("input")

    cartContainer.addEventListener("change", () => {
        if (cartInput.checked) {
            cartContainer.querySelector(".cart-sidebar").style.opacity = 1
            cartContainer.querySelector(".cart-sidebar").style.transform = "translateX(0)"
            cartContainer.querySelector(".close").style.setProperty('--rotate', '45deg')
        } else {
            cartContainer.querySelector(".cart-sidebar").style.opacity = 0
            cartContainer.querySelector(".cart-sidebar").style.transform = "translateX(100%)"
            cartContainer.querySelector(".close").style.setProperty('--rotate', '0deg')
        }
    })
    navContainer.addEventListener("change", () => {
        if (navInput.checked) {
            navContainer.querySelector(".nav-sidebar").style.opacity = 1
            navContainer.querySelector(".nav-sidebar").style.transform = "translateX(0)"
            navContainer.querySelector(".hamburger-menu").style.setProperty('--rotate', '45deg')
            navContainer.querySelector(".hamburger-menu").style.right = '1em'
        } else {
            navContainer.querySelector(".nav-sidebar").style.opacity = 0
            navContainer.querySelector(".nav-sidebar").style.transform = "translateX(100%)"
            navContainer.querySelector(".hamburger-menu").style.setProperty('--rotate', '0deg')
        }
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
// const 