
// temp - helpers
// const openCart = document.querySelector("#cart-checkbox").checked = 1
// ------------------
// if css is not supported js handle interaction which css was supposed to do
if (!isSelectorSupported()) {
    const controlContainer = document.querySelectorAll(".control-container")

    controlContainer.forEach(container => {
        container.addEventListener("change", () => {
            const input = container.querySelector("input")
            const sidebar = container.querySelector(".sidebar")
            const sidebarButton = container.querySelector(".sidebar-button")
            if (input.checked) {
                sidebar.style.opacity = 1
                sidebar.style.transform = "translateX(0)"
                sidebar.style.pointerEvents = 'auto'
                sidebarButton?.style.setProperty('--rotate', '45deg')
                sidebarButton?.style.setProperty('--width', '100%')
            } else {
                sidebar.style.opacity = 0
                sidebar.style.transform = "translateX(100%)"
                sidebar.style.pointerEvents = 'none'
                sidebarButton?.style.setProperty('--rotate', '0deg')
                sidebarButton?.style.setProperty('--width', '75%')
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
// const 