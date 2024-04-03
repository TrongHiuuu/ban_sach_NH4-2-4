document.addEventListener("DOMContentLoaded", (event) => {
    // banner
    w3.slideshow(".nature", 1000);
  });

 // show and hide dropdown list item on button click
 function show_hide() {
    var click = document.getElementById("dropDownList");
    if (click.style.display === "none") {
    click.style.display = "block";
    } else {
    click.style.display = "none";
    }
}

// check filter form
function checkFilter(form){
  console.log("hiiii");
  priceFrom = form.priceFrom.value;
  priceTo = form.priceTo.value;
  document.getElementById("alert").innerText = "";
  // de trong priceFrom hoac priceTo
  if(priceFrom=="" || priceTo==""){
    document.getElementById("alert").innerText = "Bạn chưa nhập giá.";
    return false;
  }

  // gia khong hop le
  if(priceFrom>priceTo){
    document.getElementById("alert").innerText = "Giá không hợp lệ.";
    return false;
  }

}
