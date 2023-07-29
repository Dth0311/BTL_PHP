
var mon =  document.getElementById("mon").value.trim();
// console.log(mon);
for (let index = 1; index <= 6; index++) {
    var select =  document.getElementById(index).value;
    if (Object.is(mon,select)) {
        document.getElementById(index).selected = "selected";
    }
}


var gt =  document.getElementById("gioitinh").value.trim();
// console.log(gt);
for (let index = 1; index <= 3; index++) {
    var select_gt =  document.getElementById("gt"+index).value;
    if (Object.is(gt,select_gt)) {
        document.getElementById("gt"+index).selected = "selected";
    }
}

