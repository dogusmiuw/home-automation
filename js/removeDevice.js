remove_device = (e) => {
    console.log(e.parentNode.remove());
}

device_form_toggle = () => {
    const formDOM = document.getElementById("addDeviceForm");
    formDOM.classList.toggle("d-none");
}