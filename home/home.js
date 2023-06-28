var xang = document.getElementById("xang");
var dau = document.getElementById("dau");
var nhot = document.getElementById("nhot");

function getLoaiNhienLieu() {

    if (xang.checked) {
        console.log('checked')
        document.getElementById("loainhienlieu").value = "xăng";
    }
    if (dau.checked) {
        document.getElementById("loainhienlieu").value = "dầu";
    }
    if (nhot.checked) {
        document.getElementById("loainhienlieu").value = "nhớt";
    }
}

//Lưu trữ trạng thái click của checkbox khi load trang
// Khi checkbox được click
function getCheckedXang() {
    // Lưu trữ trạng thái của checkbox vào localStorage
    localStorage.setItem("CheckedXang", xang.checked);
}

function getCheckedDau() {
    localStorage.setItem("CheckedDau", dau.checked);
}

function getCheckedNhot() {
    localStorage.setItem("CheckedNhot", nhot.checked);
}

// Kiểm tra nếu trong localStorage đã có giá trị của checkbox
if (localStorage.getItem("CheckedXang") === "true") {
    // Nếu có, đặt trạng thái của checkbox thành checked
    xang.checked = true;
}

if (localStorage.getItem("CheckedDau") === "true") {
    dau.checked = true;
}

if (localStorage.getItem("CheckedNhot") === "true") {
    nhot.checked = true;
}