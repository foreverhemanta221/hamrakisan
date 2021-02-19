import {setErrorFor,validateEmail,setSuccessFor} from './basic_validation_function.js';
let errorMessage = setErrorFor;
let emailValidate = validateEmail;
let successMessage = setSuccessFor;

const form = document.querySelector('#registerForm');
const userId = document.querySelector('#userId');
const password = document.querySelector('#inputPassword');
const role = document.querySelector('.inputRole');

form.addEventListener('submit',(e)=>{
    // e.preventDefault();
    checkInputs(e);
});

function  checkInputs(e) {
    const userIdValue = userId.value.trim();
    const passwordValue = password.value.trim();
    if(userIdValue ===''){
        e.preventDefault();
        errorMessage(userId,'username cannot be empty','errorUserId');
    }else{

        switch (userIdValue) {
            case userIdValue.length<10 || userIdValue.length>30:
                errorMessage(userId,'invalid Email/Phone','errorUserId');
                break;
            case emailValidate(userIdValue)==false:
                errorMessage(userId,'invalid Email/Phone','errorUserId');
                break;
            default:
                successMessage(userId,'errorUserId')

        }
    }
    if(passwordValue ==='' || passwordValue.length <6){
        validation(password,'password should have at least 6 character long','errorPassword');
    }


}

