const addNominalButton = document.querySelector("#addNominal");
const addKeyButton = document.querySelector("#addKey");
const input = document.querySelector("#nominal-input");
let countNominal = 0;
let countKey = 1;

function addNominal(){
    countNominal = countNominal +1;

    const input_nominal = document.createElement("input");
    input_nominal.type = "number";
    input_nominal.placeholder = "Номинал";
    input_nominal.className = "form-control";
    input_nominal.required = true;
    input_nominal.id = countNominal+'_id'
    input_nominal.name = "product[nominal]["+countNominal+"][value]";

    const div = document.createElement("div");
    div.className = "col-12 mb-3";

    const label = document.createElement("label");
    label.className = "text-muted";
    label.innerHTML = "Номинал - "+countNominal;

    // let button = addBtnKey(countNominal);
    let button = deleteBtnNominal(countNominal);
    let priority_input = priorityInput()

    input.appendChild(div);
    div.appendChild(label);
    div.appendChild(input_nominal);
    div.appendChild(priority_input);
    div.appendChild(button);
}

function priorityInput(){
    const input_priority = document.createElement("input");
    input_priority.type = "number";
    input_priority.placeholder = "Приоритет";
    input_priority.className = "form-control";
    input_priority.value = 5;
    input_priority.required = true;
    input_priority.name = "product[nominal]["+countNominal+"][priority]";

    return input_priority;
}

function deleteNominal(n_id){
    let input = document.getElementById(n_id+'_id');
    let parent_div = input.parentNode;
    parent_div.remove();
}

function deleteBtnNominal(n_id){
    const button = document.createElement("button");
    button.innerHTML = "Удалить номинал";
    button.id = n_id+'_delete';
    button.nominal_id = n_id;
    button.type = "button";
    button.className = "mt-1 btn btn-sm btn-danger";
    button.onclick = function()
    {
        deleteNominal(n_id)
    }
    return button
}

//
// function addBtnKey(n_id){
//     const button = document.createElement("button");
//     button.innerHTML = "Добавить ключ";
//     button.id = "addKey"+n_id;
//     button.type = "button";
//     button.className = "mt-1 btn btn-sm btn-primary";
//     button.nominal_id = n_id;
//     button.onclick = function()
//     {
//         addKey(n_id)
//     }
//     return button
// }
//
// function deleteBtnKey(n_id, k_id){
//     const button = document.createElement("button");
//     button.innerHTML = "Удалить ключ";
//     button.id = n_id+"+"+k_id;
//     button.nominal_id = n_id;
//     button.key_id = k_id;
//     button.type = "button";
//     button.className = "mt-1 btn btn-sm btn-danger";
//     button.nominal_id = n_id;
//     button.onclick = function()
//     {
//         deleteKey(n_id, k_id)
//     }
//     return button
// }
//
// function addKey(nominal_id){
//     const key_input = document.createElement("input");
//     key_input.type = "text";
//     key_input.id = "nominal-"+nominal_id+"-key-"+countKey;
//     key_input.placeholder = "Key";
//     key_input.required = true;
//     key_input.className = "form-control mt-1";
//     key_input.name = "product[nominal]["+nominal_id+"][key]["+countKey+"][value]";
//
//
//     let elementBefore = document.getElementById("addKey"+nominal_id);
//     let parentDiv = elementBefore.parentNode;
//     parentDiv.insertBefore(key_input, elementBefore);
//
//     let delete_btn = deleteBtnKey(nominal_id, countKey);
//     parentDiv.insertBefore(delete_btn, elementBefore);
//
//     countKey = countKey +1;
// }
//
// function deleteKey(n_id, k_id){
//     let input = document.getElementById("nominal-"+n_id+"-key-"+k_id);
//     let btn = document.getElementById(n_id+"+"+k_id);
//     input.remove();
//     btn.remove();
// }


addNominalButton.addEventListener("click", addNominal)
