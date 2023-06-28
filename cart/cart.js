//ajax xóa giỏ hàng
function delGiohang(magiohang) {
    const data = new FormData()
    data.append('magiohang', magiohang)
    data.append('delGiohang', 'delGiohang')

    const callback = (response) => {
        // Xóa phần tử có thuộc tính data-giohang bằng giá trị magiohang
        const userElements = document.querySelectorAll(`[data-giohang="${magiohang}"]`)
        userElements.forEach(element => {
            element.parentNode.removeChild(element)
        })
        alert(response);
    }
    sendRequest(data, callback)
}

const sendRequest = (data, callback) => {
    let xhr = new XMLHttpRequest()
    xhr.onreadystatechange = async function () {
        if (this.readyState == 4 && this.status == 200) {
            callback(this.responseText)
        }
    };
    xhr.open("POST", "", true);
    xhr.send(data)
}

//set value cho radio button
var tienmat = document.getElementById("tienmat");
var chuyenkhoan = document.getElementById("chuyenkhoan");

function getPayment() {
    if (tienmat.checked) {
        console.log('checked')
        document.getElementById("payment").value = "Tiền mặt";
    }
    if (chuyenkhoan.checked) {
        document.getElementById("payment").value = "Chuyển khoản";
    }
}

