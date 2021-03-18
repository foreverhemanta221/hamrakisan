import {setErrorFor,validateEmail,setSuccessFor} from './basic_validation_function.js';
let errorMessage = setErrorFor;
let validation = validateEmail;
let successMessage = setSuccessFor;

const farmListingRequestFrom = document.querySelector('#farmFormRequest');

// const farm_name = document.querySelector()
const farmName = document.querySelector('#farmName');
const farmProvince = document.querySelector('#farmProvince');
const farmDistrict = document.querySelector('#farmDistrict');
const farmCity = document.querySelector('#farmCity');
const farmSpecificAddress = document.querySelector('#FarmSpecificAddress');
const farmPhone = document.querySelector('#farmPhone');
const farmEmail = document.querySelector('#farmEmail');
const farmWebsite = document.querySelector('#farmWebsite');
const farmFacebook = document.querySelector('#farmFacebook');
const farmYoutube = document.querySelector('#farmYoutube');

farmListingRequestFrom.addEventListener('submit',(e)=>{
    // e.preventDefault();
    // alert('test');
    checkInputs(e);
});

function checkInputs(e) {
   const farmNameValue = farmName.value.trim();
   const farmProvinceValue = farmProvince.value.trim();
   const farmDistrictValue = farmDistrict.value.trim();
   const farmCityValue = farmCity.value.trim();
   const farmSpecificAddressValue = farmSpecificAddress.value.trim();
   const farmPhoneValue = farmPhone.value.trim();
   const farmEmailValue = farmEmail.value.trim();
   const farmWebsiteValue = farmWebsite.value.trim();
   const farmFacebookValue = farmFacebook.value.trim();
   const farmYoutubeValue = farmYoutube.value.trim();
//farmname
   if(farmNameValue===''){
       e.preventDefault();
       errorMessage(farmName,'farm name cannot be empty','errfarmName');
   }else if(farmNameValue.length>255){
       e.preventDefault();
       errorMessage(farmName,'farm name should be max 255 character','errfarmName');
   }else{
       successMessage(farmName,'errfarmName');
   }
// farm address
    if(farmProvinceValue===''){
        e.preventDefault();
        errorMessage(farmProvince,'province cannot be empty','errfarmAddress');
    }else{
        successMessage(farmProvince,'errfarmName');
    }

    if(farmDistrictValue===''){
        e.preventDefault();
        errorMessage(farmDistrict,'district cannot be empty','errfarmAddress');
    }else{
        successMessage(farmDistrict,'errfarmAddress');
    }
    if(farmCityValue===''){
        e.preventDefault();
        errorMessage(farmCity,'city cannot be empty','errfarmAddress');
    }else{
        successMessage(farmCity,'errFarmAddress');
    }
    console.log(farmSpecificAddressValue!=='' && farmSpecificAddressValue.length<6);
    e.preventDefault();
    if(farmSpecificAddressValue!=='' && farmSpecificAddressValue.length<6){
        e.preventDefault();
        errorMessage(farmSpecificAddress,'Specific Address must have six character long','errSpecificAddress');
    }else{
        successMessage(farmSpecificAddress,'FarmSpecificAddress');
    }
    //phone
    if(farmPhoneValue===''){
        e.preventDefault();
        errorMessage(farmPhone,'phone number cannot be empty','errFarmPhone');
    }else{
        successMessage(farmPhone,'errFarmPhone');
    }
    //email
    if(farmEmailValue===''){
        e.preventDefault();
        errorMessage(farmEmail,'email should not be empty','errFarmEmail');
    }



}
