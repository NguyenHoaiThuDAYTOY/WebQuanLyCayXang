//lấy value loại xăng dầu nhớt theo radio button
var xang = document.getElementById("xang");
var dau = document.getElementById("dau");
var nhot = document.getElementById("nhot");

function getLoaiNhienLieu() {
    if (xang.checked) {
        document.getElementById("loainhienlieu").value = "xang";
    }
    if (dau.checked) {
        document.getElementById("loainhienlieu").value = "dau";
    }
    if (nhot.checked) {
        document.getElementById("loainhienlieu").value = "nhot";
    }
}