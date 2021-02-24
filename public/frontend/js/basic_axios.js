let baseUrl = "http://hamrakisan.com/"; //it should be
// let baseUrl = "http://127.0.0.1:8000/";
let url_string = window.location.href;
console.log(url_string);
let url = new URL(url_string);
let province = url.searchParams.has("province")
    ? url.searchParams.get("province")
    : null;
let district = url.searchParams.has("district")
    ? url.searchParams.get("district")
    : null;
let category = url.searchParams.has("category")
    ? url.searchParams.get("category")
    : null;
// console.log(category)
//calling functions
getProvince(province);
getDistrict(province, district);
// functions
function getDistrict(province_id = null, district_id = null) {
    axios.get(baseUrl + "api/districts").then(function (response) {
        var district_node = document.querySelector(".district_dropdown");
        var length = district_node.options.length;
        for (var i = length - 1; i >= 0; i--) {
            district_node.options[i] = null;
        }
        let option = document.createElement("option");
        option.text = "select district";
        option.value = "";
        district_node.add(option);
        districts = response.data.data;
        districts.forEach((item, index) => {
            if (province_id) {
                if (parseInt(province_id) === item.province_id) {
                    let option = document.createElement("option");
                    option.text = item.district_name;
                    option.value = item.district_id;
                    if (
                        district_id &&
                        parseInt(district_id) === parseInt(option.value)
                    ) {
                        option.selected = true;
                    }
                    district_node.add(option);
                }
            } else {
                let option = document.createElement("option");
                option.text = item.district_name;
                option.value = item.district_id;
                if (
                    district_id &&
                    parseInt(district_id) === parseInt(option.value)
                ) {
                    option.selected = true;
                }
                district_node.add(option);
            }
        });
    });
}
function getProvince(province_id = null) {
    axios.get(baseUrl + "api/provinces").then(function (response) {
        var select = document.querySelector(".province_dropdown");
        var length = select.options.length;
        for (var i = length - 1; i >= 0; i--) {
            select.options[i] = null;
        }
        provinces = response.data.data;
        var option = document.createElement("option");
        option.text = "select Province";
        option.value = "";
        select.add(option);
        provinces.forEach((item, index) => {
            var option = document.createElement("option");
            option.text = item.province;
            option.value = item.province_id;
            if (province_id != null && province_id === option.value) {
                option.selected = true;
            }
            select.add(option);
        });
    });
}
document
    .querySelector(".province_dropdown")
    .addEventListener("change", (evt) => {
        provinceNode = document.querySelector(".province_dropdown");
        province_id = provinceNode.options[provinceNode.selectedIndex].value;
        getDistrict(parseInt(province_id));
    });
