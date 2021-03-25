function Limpiar() {

    let inputNombre = document.getElementById("nombre");
    inputNombre.value = "";
    inputNombre.focus();

    let inputTelefono = document.getElementById("telefono");
    inputTelefono.value = "";

    let selectTipo = document.getElementById("tipo-contacto");
    selectTipo.value = "";

}

function Validar(inputNombre, inputTelefono, selectTipo) {

    let isValit = true; 

    //validar nombre  
    let valueNombre = inputNombre.value;
  

    if (valueNombre == "" || valueNombre == null || valueNombre == undefined) {
        
        isValit = false;
        inputNombre.classList.add("input-error");
    }else
    {
        inputNombre.classList.remove("input-error")
    }

    //validar telefono 
    valueTelefono = inputTelefono.value;
   

    if (valueTelefono == "" || valueTelefono == null || valueTelefono == undefined) {
        
        isValit = false;
        inputTelefono.classList.add("input-error");
    }else
    {
        inputTelefono.classList.remove("input-error");
    }

    //validar tipo de contacto   
    let valueTipo = selectTipo.value; 

    if (valueTipo == "" || valueTipo == null || valueTipo == undefined) {

        isValit = false;
        selectTipo.classList.add("input-error");
    }else
    {
        selectTipo.classList.remove("input-error");
    }

    return isValit;

    
}

function CreateContactElements() {

    let inputNombre = document.getElementById("nombre");
    let valueNombre = inputNombre.value;

    let inputTelefono = document.getElementById("telefono");
    let valueTelefono = inputTelefono.value;

    let selectTipo = document.getElementById("tipo-contacto");
    let valueTipo = selectTipo.value;



    let isValit = Validar(inputNombre, inputTelefono, selectTipo);

    if (isValit) {

        let maincontainer = document.getElementById("contact-container");

        let DivColMd4 = document.createElement("div");
        DivColMd4.setAttribute("class","col-md-4 margen-top");
        
        let DivCard = document.createElement("div");
        DivCard.setAttribute("class","card");

        let DivCardBody1 = document.createElement("div");
        DivCardBody1.setAttribute("class","card-body bg-success text-white");

        let h5CardTitle = document.createElement("div");
        h5CardTitle.setAttribute("class","card-tilte");
        h5CardTitle.innerText = "Contacto - "+valueTipo;

        let ulListGroup = document.createElement("ul");
        ulListGroup.setAttribute("class","list-group list-group-flush");
        
        let liNombre = document.createElement("li");
        liNombre.setAttribute("class","list-group-item");
        liNombre.innerText = "Nombre: " + valueNombre;

        let liTelefono = document.createElement("li");
        liTelefono.setAttribute("class","list-group-item");
        liTelefono.innerText = "Telefono: " + valueTelefono;

        let DivCardBody2 = document.createElement("div");
        DivCardBody2.setAttribute("class","card-body");

        let buttonDelete = document.createElement("button");
        buttonDelete.setAttribute("class","btn btn-danger float-end");
        buttonDelete.innerText = "Eliminar";
        buttonDelete.addEventListener("click",function () {
            maincontainer.removeChild(DivColMd4);
            
        })

        DivCardBody2.appendChild(buttonDelete);

        ulListGroup.appendChild(liNombre);
        ulListGroup.appendChild(liTelefono);

        DivCardBody1.appendChild(h5CardTitle);

        DivCard.appendChild(DivCardBody1);
        DivCard.appendChild(ulListGroup);
        DivCard.appendChild(DivCardBody2);

        DivColMd4.appendChild(DivCard);

        maincontainer.appendChild(DivColMd4);





        Limpiar();
        
    } else {
        alert("Debe de completar todos los datos")
    }
    
}