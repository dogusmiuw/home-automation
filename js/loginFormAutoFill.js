const producerArr = {
    email:"producer@mail.com",
    password:"12345"
};
const consumerArr = {
    email:"consumer@mail.com",
    password:"12345"
};


const user_typeDOM = document.getElementById("user_type");

const emailDOM = document.getElementById("email");

const passwordDOM = document.getElementById("password");

user_typeDOM.addEventListener("change", () => {
    if(user_typeDOM.value == "producer") {
        emailDOM.value = producerArr.email;
        passwordDOM.value = producerArr.password;
    } else if(user_typeDOM.value == "consumer") {
        emailDOM.value = consumerArr.email;
        passwordDOM.value = consumerArr.password;
    }
});