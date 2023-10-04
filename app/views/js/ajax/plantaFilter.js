const displayDiv = document.createElement('div');
const pai = document.getElementById("filtroParent");
const FiltrosButton = document.getElementById("filtroButton");
var caracteristicasSelected = [];
var caracteristicas = [];
var ADMs = [];
var selectedValues = []; 
var busca = "";
var cardNull = false;

function openFiltros() {
      var xhttp = new XMLHttpRequest();
    xhttp.open("GET", "filtrarExec.php?function=getFiltros", true);
  
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var retorno = xhttp.responseText;
            var Array = JSON.parse(retorno);

            ADMs = Array[0];
            caracteristicas = Array[1];
            caracteristicas = Object.entries(caracteristicas).slice(-1);
            show();
        }
    }
    xhttp.send();
}

function show() {
    createFiltroCaracteristicas();

    br = document.createElement("br");
    br.className = "filtroKids";
    pai.appendChild(br);

    createFiltroADMs();
    br2 = document.createElement("br");
    br2.className = "filtroKids";
    pai.appendChild(br2);

    // createSendFiltroButton();

    FiltrosButton.setAttribute("onclick", "closeFiltros()");
}
function createFiltroCaracteristicas() {
    i = 0;
    caracteristicas[0][1].forEach(element => {
        input = document.createElement('input');
        input.type = "checkbox";
        input.name = element;
        input.id = "filtroCheckbox";
        input.className = "filtroKids filtroKids" + element;
        input.value = element;
        input.setAttribute("oninput", "saveCaracteristicas('"+element+"')");

        label = document.createElement('label');
        label.for = element;
        label.innerHTML = element;
        label.className = "filtroKids";
        br = document.createElement('br');
        br.className = "filtroKids";

        pai.appendChild(input);
        pai.appendChild(label);
        pai.appendChild(br);
        i++;
    });
}
function createFiltroADMs() {
    select = document.createElement('select');
    select.className = "filtroKids";
    select.id = "selectAdm";
    select.setAttribute("oninput", "findPlantas()");
    pai.appendChild(select);

    ADMs.forEach(element => {

        option = document.createElement('option');
        option.name = element["nomeUsuario"];
        option.className = "filtroKids";
        option.value = element["nomeUsuario"];
        option.innerHTML = element["nomeUsuario"];


        select.appendChild(option);
    });
    
    const sendFiltroButton = document.createElement("button");
    sendFiltroButton.className = "btn filtroKids";
    sendFiltroButton.setAttribute('id', 'filtroAdmButton');
    sendFiltroButton.innerHTML = "Adicionar Administrador";
    sendFiltroButton.addEventListener("click", addSelectedValue);  // Adicionando um evento de clique
    pai.appendChild(sendFiltroButton);

    
    displayDiv.id = 'displaySelectedValues';  // Atribuindo um ID para a área de exibição
    pai.appendChild(displayDiv);
}
function addSelectedValue() {
    const selectedOption = select.options[select.selectedIndex];
    if (selectedOption) {
        const value = selectedOption.value;
        // Verifica se o valor já está no array antes de adicioná-lo
        if (!selectedValues.includes(value)) {
            selectedValues.push(value);
            displaySelectedValues();  // Atualiza a exibição
            findPlantas();
        }
    }
}
function displaySelectedValues() {
    displayDiv.innerHTML = selectedValues.map(value => {
        return `<div class='adms'>${value} <button class='btn' onclick="removeSelectedValue('${value}')">Remover</button></div>`;
    }).join('');
}
function removeSelectedValue(value) {
    const index = selectedValues.indexOf(value);
    if (index !== -1) {
        selectedValues.splice(index, 1);
        displaySelectedValues();  // Atualiza a exibição
        findPlantas();
    }
}

function closeFiltros() {
    removeChildren({parentId:'filtroParent',childName:'filtroKids'});
    FiltrosButton.setAttribute("onclick", "show()");
} 
function removeChildren(params) {
    var parentId = params.parentId;
    var childName = params.childName;

    var childNodesToRemove = document.getElementById(parentId).getElementsByClassName(childName);
    for(var i=childNodesToRemove.length-1;i >= 0;i--){
        var childNode = childNodesToRemove[i];
        childNode.parentNode.removeChild(childNode);
    }
}
function saveCaracteristicas(caracteristica) {
    if(caracteristicasSelected.includes(caracteristica) == true) {
        index = caracteristicasSelected.indexOf(caracteristica);
        caracteristicasSelected.splice(index, 1);
    }
    else {
        caracteristicasSelected.push(caracteristica);
    }
    findPlantas();
}
function saveBusca() {
    busca = document.getElementById("buscar").value;
    findPlantas();
}

function findPlantas () {
    filtroArray = [caracteristicasSelected, busca, selectedValues];
    var jsonString = JSON.stringify(filtroArray);
    $.ajax({
         type: "POST",
         url: "filtrarExec.php?function=findPlantas",
         data: {data : jsonString},
         cache: false,
 
         success: function(data){
            var plantas = $.parseJSON(data);
            removeChildren({parentId:'pai',childName:'card-kid'});
            createCards(plantas);
         }
     });
}

function createCards(plantas) {
    

    if(plantas.length == 0) {
        if(cardNull == false) {
            div = document.createElement('div');
            div.id ="msgNull";
            div.innerHTML = "AHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHH";
            document.getElementById("pai").appendChild(div);
            cardNull = true;
            return;
        }
        else {
            return;
        }
    }
    else { 
        cardNull = false;
        if(document.getElementById("msgNull") != undefined) {
            document.getElementById("pai").removeChild(document.getElementById("msgNull"));
        }
        
    }

    plantas.forEach(element => {

        div = document.createElement('div');
        div.className = "card-kid col-md-4";
        document.getElementById("pai").appendChild(div);

        br1 = document.createElement('br');
        div.appendChild(br1);

        divCard = document.createElement('div');
        divCard.className = "card card-darkmode";
        divCard.style = " width: 22rem;";
        div.appendChild(divCard);

        a1 = document.createElement('a');
        a1.href = "visualizarPlanta.php?idp="+element['IdPlanta']+"&ide="+element['Especie']['IdEspecie'];

        img = document.createElement('img');
        img.src = element['ImagemPlanta'];
        img.style = "width: 90%; height: 90%; margin-right: 10px; border-radius: 5px;";
        img.className = 'card-img-top mais';
        img.alt = '...';
        a1.appendChild(img);
        divCard.appendChild(a1);

        divBody = document.createElement('div');
        divBody.className = "card-body";

        h5 = document.createElement('h5');
        
        if(element['NomeSocial'] != "") {
            h5.id = "nomePlanta";
            h5.innerHTML = element["NomeSocial"];
        }
        else {
            h5.id = "nomePlanta2";
            h5.innerHTML = element['Especie']["NomePopular"];
        }

        h5.className = 'card-title nome-soc';
        divBody.appendChild(h5);

        br2 = document.createElement('br');
        divBody.appendChild(br2);

        p1 = document.createElement('p');
        p1.className = 'card-text nome-texto';
        
        p1.innerHTML = "<a id='codplanta'>Código: "+element['CodNumerico']+"<br><br></a>Pontuação: "+element['Pontos']+"<br>";
        divBody.appendChild(p1);

        p2 = document.createElement('p');
        p2.className = "card-text nome-texto";
        p2.style = "color: #338a5f;";
        p2.innerHTML = element['zona']['NomeZona'];
        divBody.appendChild(p2);

        p3 = document.createElement('p');
        p3.className = "card-text nome-texto";
        p3.style = "color: #04574d;";
        p3.innerHTML = element['Usuario']['nomeUsuario'];
        divBody.appendChild(p3);

        // Crie o elemento button impressao
        // btn = document.createElement('button');
        // btn.setAttribute('type', 'button');
        // btn.setAttribute('id', 'imprimas');
        // btn.setAttribute('data-toggle', 'modal');
        // btn.setAttribute('data-target', '#imprimirModal');
        // btn.setAttribute('onclick', `prepararImpressao('${htmlspecialchars(addslashes($planta->getNomeSocial()), ENT_QUOTES)}', '${htmlspecialchars(addslashes($especie->getNomePopular()), ENT_QUOTES)}', '${htmlspecialchars(addslashes($especie->getNomeCientifico()), ENT_QUOTES)}', '${htmlspecialchars(addslashes($planta->getCodNumerico()), ENT_QUOTES)}', '${htmlspecialchars(addslashes($planta->getQrCode()), ENT_QUOTES)}')`);
        // btn.innerText = 'Imprimir';
        // divBody.appendChild(btn);

        a2 = document.createElement('a');
        a2.href = "editarPlanta.php?id="+element['IdPlanta'];
        a2.id = 'editas';
        a2.innerHTML = "Editar";
        divBody.appendChild(a2);

        a3 = document.createElement('a');
        a3.href = "deletarPlanta.php?id="+element['IdPlanta'];
        a3.setAttribute('onclick', 'return confirm(\"Confirma a exclusão da Planta?\");');
        a3.id = 'excluas'
        a3.className = 'btn btn-alert excluir';
        a3.innerHTML = "Excluir";
        divBody.appendChild(a3);

        br3 = document.createElement('br');
        divBody.appendChild(br3);

        divCard.appendChild(divBody);
    });
}
