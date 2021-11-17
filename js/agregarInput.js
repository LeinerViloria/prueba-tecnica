var numero=1;
function agregar(){
    numero++;
    const input = document.createElement("input");
    input.type="number";
    input.className="form-control";
    input.name="numero"+numero;
    input.placeholder="Ingrese el numero "+numero;
    input.required;

    const div = document.createElement("div");
    div.className="col-auto";
    div.appendChild(input);

    document.getElementById("adicionales").appendChild(div);

}