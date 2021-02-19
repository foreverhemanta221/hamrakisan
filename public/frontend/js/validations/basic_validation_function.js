
export function setErrorFor(input,message,errorDom) {
    const formattedMessage = '<small class="text-danger ">'+message+'</small>';
    input.className  = 'form-control  danger';
    document.getElementById(errorDom).innerHTML = formattedMessage;
}
export function setSuccessFor(input,errorDom){
    const formattedMessage = '';
    input.className= 'form-control';
    document.getElementById(errorDom).innerHTML = formattedMessage;
}
export function validateEmail(email) {
    const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return  re.test(email);
}


