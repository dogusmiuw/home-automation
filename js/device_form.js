// remove_device = (e) => {
//     console.log(e.parentNode.remove());
// }

device_form_toggle = () => {
    const formDOM = document.getElementById("addDeviceForm");
    formDOM.classList.toggle("d-none");
}

remove_device = (device_id, home_id) => {
    console.log(device_id);
    console.log(home_id);

    window.location.replace(`remove_device.php?house=${home_id}&device_id=${device_id}`);

    // $.ajax({
    //     url: `remove_device.php?device_id=${device_id}`,
    //     success: function(response) {
    //         alert("Device: ", device_id , " | successfully removed.");
    //     }
    // });
}
