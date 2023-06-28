// Lấy tất cả các radio button trong nhóm
var radioButtons = document.querySelectorAll('input[name="exampleRadios"]');

// Lặp qua từng radio button để thêm sự kiện click
radioButtons.forEach(function(radioButton) {
  radioButton.addEventListener('click', function() {
    // Kiểm tra xem radio button có được chọn hay không
    if (this.checked) {
      var value = this.value;
      console.log(value); // In ra giá trị của radio button được chọn
      // Thực hiện các thao tác khác dựa trên giá trị của radio button
      // Ví dụ: Đặt giá trị vào một phần tử HTML khác
      document.getElementById("nhot").value = value;
    }
  });
});