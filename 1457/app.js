const btn = document.querySelector(".lls")
const modal = document.querySelector(".modal")
let toggle = false
btn.addEventListener("click", () => {
    toggle = !toggle

    if (toggle){
        modal.style.opacity = 1
    }
    else {
        modal.style.opacity = 0
    }
}
)

let count = 0
const value = document.querySelector("#value")
const decrease = document.querySelector(".decrease")
const reset = document.querySelector(".reset")
const increase = document.querySelector(".increase")

decrease.addEventListener("click",() => {
    count--
    value.textContent = count
})

increase.addEventListener("click",() => {
    count++
    value.textContent = count
})

reset.addEventListener("click",() => {
    count = 0
    value.textContent = count
})