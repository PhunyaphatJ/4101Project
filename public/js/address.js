function showAmphoes() {
    let input_province = document.querySelector("#input_province");
    let url = "/api/amphoes?province=" + input_province.value;
    console.log(url);
    fetch(url)
        .then(response => response.json())
        .then(result => {
            console.log(result);
            let input_amphoe = document.querySelector("#input_amphoe");
            input_amphoe.innerHTML = '<option value="">กรุณาเลือกเขต/อำเภอ</option>';
            for (let item of result) {
                let option = document.createElement("option");
                option.text = item;
                option.value = item;
                input_amphoe.appendChild(option);
            }
            showTambons();
        });
}

function showTambons() {
    let input_province = document.querySelector("#input_province");
    let input_amphoe = document.querySelector("#input_amphoe");
    let url = "/api/tambons?province=" + input_province.value + "&amphoe=" + input_amphoe.value;
    console.log(url);
    fetch(url)
        .then(response => response.json())
        .then(result => {
            console.log(result);
            let input_tambon = document.querySelector("#input_tambon");
            input_tambon.innerHTML = '<option value="">กรุณาเลือกแขวง/ตำบล</option>';
            for (let item of result) {
                let option = document.createElement("option");
                option.text = item;
                option.value = item;
                input_tambon.appendChild(option);
            }
            showZipcode();
        });
}

function showZipcode() {
    let input_province = document.querySelector("#input_province");
    let input_amphoe = document.querySelector("#input_amphoe");
    let input_tambon = document.querySelector("#input_tambon");
    let url = "/api/zipcodes?province=" + input_province.value + "&amphoe=" + input_amphoe.value + "&tambon=" + input_tambon.value;
    console.log(url);
    fetch(url)
        .then(response => response.json())
        .then(result => {
            console.log(result);
            let input_zipcode = document.querySelector("#input_zipcode");
            input_zipcode.value = "";
            for (let item of result) {
                input_zipcode.value = item;
                break;
            }
        });
}

//EVENTS
document.addEventListener("DOMContentLoaded", function () {

    document.querySelector('#input_province').addEventListener('change', (event) => {
        showAmphoes();
    });
    document.querySelector('#input_amphoe').addEventListener('change', (event) => {
        showTambons();
    });
    document.querySelector('#input_tambon').addEventListener('change', (event) => {
        showZipcode();
    });
});
