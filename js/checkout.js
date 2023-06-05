function change(evt) {
  document.getElementById("employee_code_field").style.display = "none";
  document.getElementById("area_field").style.display = "none";
  document.querySelector("#billing_company_field label").textContent =
    "Nombre de la empresa (opcional)";
  switch (evt.value) {
    case "credito_fiscal":
      credito();
      break;
    case "consumidor_final":
      reset();
      break;
    case "venta_empleados":
      empleados();
      break;
  }
}

function setDoc(data) {
  let el = document.querySelector("#billing_dui_field label");
  el.textContent = data;
}

function setName(data) {
  el = document.querySelector("#billing_first_name_field label");
  el.textContent = data;
}

function reset() {
  setName("Nombre");
  setDoc("Documento");
}

function credito() {
  setDoc("Número de registro (NRC)");
  setName("Nombre Contribuyente");
}

// Esta seccion solo funciona con el plugin de wooboost
function empleados() {
  reset();
  document.getElementById("employee_code_field").style.display = "block";
  document.getElementById("area_field").style.display = "block";

  document.querySelector("#employee_code_field label").textContent =
    "Código de empleado (requerido)";
  document.querySelector("#area_field label").textContent =
    "Área de la empresa (requerido)";
  document.querySelector("#billing_company_field label").textContent =
    "Nombre de la empresa (requerido)";
}
