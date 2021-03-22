// let baseUrl = "http://hamrakisan.com/";
let baseUrl = "http://127.0.0.1:8000/";
axios.get(baseUrl + "/api/provinces").then(function (response) {
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
        option.value = item.province;
        select.add(option);
    });
});
// district
axios.get(baseUrl + "api/districts").then(function (response) {
    var district_node = document.querySelector(".district_dropdown");
    var length = district_node.options.length;
    for (var i = length - 1; i >= 0; i--) {
        district_node.options[i] = null;
    }

    var option = document.createElement("option");
    option.text = "select district";
    option.value = "";
    districts = response.data.data;
    districts.forEach((item, index) => {
        var option = document.createElement("option");
        option.text = item.district_name;
        option.value = item.district_id;
        district_node.add(option);
    });
});

document
    .querySelector(".province_dropdown")
    .addEventListener("change", function (e) {
        e.preventDefault();
        axios.get(baseUrl + "api/districts").then(function (response) {
            var province_node = document.querySelector(".province_dropdown");
            var province_id =
                province_node.options[province_node.selectedIndex].value;
            var district_node = document.querySelector(".district_dropdown");
            var length = district_node.options.length;
            for (var i = length - 1; i >= 0; i--) {
                district_node.options[i] = null;
            }
            var option = document.createElement("option");
            option.text = "select district";
            option.value = "";
            district_node.add(option);

            districts = response.data.data;
            districts.forEach((item, index) => {
                if (province_id == item.province_id) {
                    var option = document.createElement("option");
                    option.text = item.district_name;
                    option.value = item.district_id;
                    district_node.add(option);
                }
            });
        });
    });
