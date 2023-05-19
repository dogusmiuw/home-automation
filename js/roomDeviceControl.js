const lightDOM = document.querySelector('#light');
const acDOM = document.querySelector('#ac');
const tvDOM = document.querySelector('#tv');
const windowsDOM = document.querySelector('#windows');

const lightStatusDOM = document.querySelector('#lightStatus');
const acStatusDOM = document.querySelector('#acStatus');
const tvStatusDOM = document.querySelector('#tvStatus');
const windowsStatusDOM = document.querySelector('#windowsStatus');

const lightToggle = () => {
    if(lightDOM.classList.contains('fa-solid')){
        // if light is on, turn it off
        lightDOM.classList = "text-secondary fa-regular fa-lightbulb";
        lightStatusDOM.innerHTML = "Off";
    } else {
        // if light is off, turn it on
        lightDOM.classList = "text-warning fa-solid fa-lightbulb";
        lightStatusDOM.innerHTML = "On";
    }
}

const acToggle = () => {
    if(acDOM.classList.contains('fa-spin')){
        // if ac is on, turn it off
        acDOM.classList = "text-secondary fa-solid fa-fan";
        acStatusDOM.innerHTML = "Off";
    } else {
        // if ac is off, turn it on
        acDOM.classList = "text-primary fa-solid fa-fan fa-spin";
        acStatusDOM.innerHTML = "On";
    }
}

const tvToggle = () => {
    if(tvDOM.classList.contains('text-primary-emphasis')){
        // if tv is on, turn it off
        tvDOM.classList = "text-secondary fa-solid fa-tv";
        tvStatusDOM.innerHTML = "Off";
    } else {
        // if tv is off, turn it on
        tvDOM.classList = "text-primary-emphasis fa-solid fa-tv";
        tvStatusDOM.innerHTML = "On";
    }
}

const windowsToggle = () => {
    if(windowsDOM.classList.contains('text-primary')){
        // if windows are open, close them
        windowsDOM.classList = "text-secondary fa-solid fa-square";
        windowsStatusDOM.innerHTML = "Closed";
    } else {
        // if windows are closed, open them
        windowsDOM.classList = "text-primary fa-solid fa-table-cells-large";
        windowsStatusDOM.innerHTML = "Open";
    }
}
