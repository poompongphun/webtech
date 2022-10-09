function validateForm() {
  const error = [];
  const myForm = document.forms.myForm;
  const id = myForm.id.value;
  const numname = myForm.numname.value;
  const fname = myForm.fname.value;
  const lname = myForm.lname.value;
  const address = myForm.address.value;
  const tumbon = myForm.tumbon.value;
  const aumper = myForm.aumper.value;
  const provinces = myForm.provinces.value;
  const code = myForm.code.value;

  const check = id.match(/[0-9]/g);
  if (id === "" || id.length !== 13 || !check || check.length !== id.length) {
    error.push("บัตรประชาชนผิด");
  }
  if (numname === "") {
    error.push("กรุณาเลือกคำนำหน้านาม");
  }
  if (!(fname.length >= 2 && fname.length <= 20)) {
    error.push("ชื่อผิด");
  }
  if (!(lname.length >= 2 && lname.length <= 30)) {
    error.push("นามสกุลผิด");
  }
  if (!(address.length >= 5)) {
    error.push("ที่อยู่ผิด");
  }
  if (!(tumbon.length >= 2)) {
    error.push("ตำบลผิด");
  }
  if (!(aumper.length >= 2)) {
    error.push("อำเภอผิด");
  }
  if (provinces === "") {
    error.push("กรุณาเลือกจังหวัด");
  }
  const check1 = code.match(/[0-9]/g);
  if (
    code === "" ||
    code.length !== 5 ||
    !check1 ||
    check1.length !== code.length
  ) {
    error.push("รหัสไปรษณีย์ผิด");
  }
  if (error.length > 0) {
    alert(error.join("\n"));
    return false;
  } else {
    alert("สำเร็จ");
  }
}
