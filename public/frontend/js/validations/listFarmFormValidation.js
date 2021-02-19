import {setErrorFor,validateEmail,setSuccessFor} from './basic_validation_function.js';
let errorMessage = setErrorFor;
let validation = validateEmail;
let successMessage = setSuccessFor;

const farmListingRequestFrom = document.querySelector('#listFarmFormRequest');
const farmName = document.querySelector('#inputFarmName');
const farmerName = document.querySelector('#inputFarmerName');
const farmEmail = document.querySelector('#inputFarmEmail');
const farmPhone = document.querySelector('#inputFarmPhone');
const farmLocation= document.querySelector('#inputFarmLocation');
const farmDescription= document.querySelector('#inputFarmDescription');

farmListingRequestFrom.addEventListener('submit',(e)=>{

    e.preventDefault();
    checkInputs(e);
});
function checkInputs(e){
    const farmNameValue = farmName.value.trim();
    const farmerNameValue = farmerName.value.trim();
    const farmEmailValue = farmEmail.value.trim();
    const farmPhoneValue = farmPhone.value.trim();
    const farmerLocationValue = farmLocation.value.trim();
    const  farmDescriptionValue = farmDescription.value.trim();

    //farm name
    if(farmNameValue===''){
        e.preventDefault();
        errorMessage(farmName,'farm name cannot be empty','errfarmName')
    }else{
        successMessage(farmName,'errfarmName')
    }
    //farmer name
    if(farmerNameValue===''){
        e.preventDefault();
        errorMessage(farmerName,'farmer name cannot be empty','errfarmerName')
    }else{
        successMessage(farmerName,'errfarmerName')
    }
    //farmemail
    if(farmEmailValue===''){
        e.preventDefault();
        errorMessage(farmEmail,'farmer email cannot be empty','errfarmEmail')
    }else if(!validation(farmEmailValue)){
        e.preventDefault();
        errorMessage(farmEmail,'farmer email cannot be empty','errfarmEmail')
    }else{
        setSuccessFor(farmEmail,'errfarmEmail');
    }
    //farmphone

    if(farmPhoneValue===''){
        e.preventDefault();
        errorMessage(farmPhone,'farmer email cannot be empty','errfarmPhone')
    }else{
        successMessage(farmPhone,'errfarmPhone');
    }

    if(farmerLocationValue===''){
        e.preventDefault();
        errorMessage(farmLocation,'farmer email cannot be empty','errfarmLocation')
    }else{
        successMessage(farmLocation,'errfarmLocation');
    }


}

