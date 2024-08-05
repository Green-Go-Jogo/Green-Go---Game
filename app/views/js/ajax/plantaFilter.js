const displayDiv = document.createElement('div');
const displayDivZona = document.createElement('div');
const tipoUsuarioLogado = document.getElementById('tipoUsuarioLogado').value;
const nomeUsuarioLogado = document.getElementById('nomeUsuarioLogado').value;
const pai = document.getElementById("filtroParent");
const FiltrosButton = document.getElementById("filtroButton");
var caracteristicasSelected = [];
var caracteristicas = [];

var ADMs = [];
var selectedValues = [];

var zonas = [];
var selectedZonas = [];

var busca = "";

var cardNull = false;

function openFiltros() {
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", "filtrarExec.php?function=getFiltros", true);

    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var retorno = xhttp.responseText;
            var Array = JSON.parse(retorno);

            ADMs = Array[0];
            caracteristicas = Array[1];
            caracteristicas = Object.entries(caracteristicas).slice(-1);
            zonas = Array[2];
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

    createFiltroZona();
    br3 = document.createElement("br");
    br3.className = "filtroKids";
    pai.appendChild(br3);

    createStopFiltroButton();
    FiltrosButton.innerHTML = "Fechar Filtro";
    FiltrosButton.setAttribute("onclick", "closeFiltros()");
}

function createFiltroCaracteristicas() {
    i = 0;
    var quebraLinhaApos = window.innerWidth >= 700 ? 5 : 2; 
    caracteristicas[0][1].forEach(element => {
        input = document.createElement('input');
        input.type = "checkbox";
        input.name = element;
        input.id = "filtroCheckbox";
        input.className = "filtroKids filtroKids" + element;
        input.value = element;
        input.setAttribute("oninput", "saveCaracteristicas('" + element + "')");

        if (caracteristicasSelected.includes(element)) {
            input.checked = true;
        }
        label = document.createElement('label');
        label.for = element;

        const labelContent = mapString(element);

        label.innerHTML = labelContent;
        label.className = "atributos filtroKids";

        pai.appendChild(input);
        pai.appendChild(label);

        if (i > 0 && i % quebraLinhaApos === quebraLinhaApos - 1) {
            br = document.createElement('br');
            br.className = "filtroKids";
            pai.appendChild(br);
        }
        i++;
    });
}

function mapString(str) {
    switch (str) {

        case "Toxicidade":
            return "Tóxica";
        case "Endemica":
            return "Endêmica";
        case "Frutifera":
            return "Frutífera";
        case "Exotica":
            return "Exótica";
        case "Comestivel":
            return "Comestível";
        default:
            return str;
            
    }
}

function createFiltroADMs() {
    labelAdm = document.createElement('label');
    labelAdm.htmlFor = "selectAdm";
    labelAdm.innerHTML = "Escolher Administrador:";
    labelAdm.className = "labelAdm filtroKids";
    br1 = document.createElement('br');
    br1.className = 'filtroKids'; 
    select = document.createElement('select');
    select.className = "filtroKids";
    select.id = "selectAdm";
    // select.setAttribute("oninput", "findPlantas()");
    pai.appendChild(labelAdm);
    pai.appendChild(br1);
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
    sendFiltroButton.innerHTML = "<svg xmlns='http://www.w3.org/2000/svg' width='30' height='20' fill='#20A494' viewBox='0 0 16 16'><path d='M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zM8.5 6v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 1 0z'/></svg>";
    sendFiltroButton.addEventListener("click", addSelectedValue);  // Adicionando um evento de clique
    pai.appendChild(sendFiltroButton);

    if (selectedValues.length > 0) {
        displaySelectedValues();
    }

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
        return `<div class='adms'>${value} <button class='btn' onclick="removeSelectedValue('${value}')"><a><i class="fas fa-trash" style="color: #078071;"></i></a></button></div>`;
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

function createFiltroZona() {
    labelZonas = document.createElement('label');
    labelZonas.htmlFor = "selectZona";
    labelZonas.innerHTML = "Escolher Zona:";
    labelZonas.className = "labelZona filtroKids";
    br1 = document.createElement('br');
    br1.className = 'filtroKids'; 
    selectZonas = document.createElement('select');
    selectZonas.className = "filtroKids";
    selectZonas.id = "selectZona";

    pai.appendChild(labelZonas);
    pai.appendChild(br1);
    pai.appendChild(selectZonas);
    zonas.forEach(element => {

        option = document.createElement('option');
        option.name = element["NomeZona"];
        option.className = "filtroKids";
        option.value = element["NomeZona"];
        option.innerHTML = element["NomeZona"];

        selectZonas.appendChild(option);
    });

    const sendZonaButton = document.createElement("button");
    sendZonaButton.className = "btn filtroKids";
    sendZonaButton.setAttribute('id', 'filtroZonaButton');
    sendZonaButton.innerHTML = "<svg xmlns='http://www.w3.org/2000/svg' width='30' height='20' fill='#20A494' viewBox='0 0 16 16'><path d='M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zM8.5 6v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 1 0z'/></svg>";
    sendZonaButton.addEventListener("click", addSelectedZona);  // Adicionando um evento de clique
    pai.appendChild(sendZonaButton);

    if (selectedZonas.length > 0) {
        displaySelectedZonas();
    }

    displayDivZona.id = 'displaySelectedZonas';  // Atribuindo um ID para a área de exibição
    pai.appendChild(displayDivZona);

}
function addSelectedZona() {
    const selectedOptionZonas = selectZonas.options[selectZonas.selectedIndex];
    if (selectedOptionZonas) {
        const valueZonas = selectedOptionZonas.value;
        // Verifica se o valor já está no array antes de adicioná-lo
        if (!selectedZonas.includes(valueZonas)) {
            selectedZonas.push(valueZonas);
            displaySelectedZonas();  // Atualiza a exibição
            findPlantas();
        }
    }
}
function displaySelectedZonas() {
    displayDivZona.innerHTML = selectedZonas.map(valueZonas => {
        return `<div class='zonas'>${valueZonas} <button class='btn' onclick="removeSelectedZona('${valueZonas}')"><a><i class="fas fa-trash" style="color: #078071;"></i></a></button></div>`;
    }).join('');
}
function removeSelectedZona(valueZonas) {
    const indexZonas = selectedZonas.indexOf(valueZonas);
    if (indexZonas !== -1) {
        selectedZonas.splice(indexZonas, 1);
        displaySelectedZonas();  // Atualiza a exibição
        findPlantas();
    }
}

function createStopFiltroButton() {
    button = document.createElement('button');
    button.setAttribute("onclick", "stopFiltros()");
    button.className = "btn filtroKids limpar";
    button.innerHTML = "Limpar Filtro";
    pai.appendChild(button);

}
function stopFiltros() {
    removeChildren({ parentId: 'displaySelectedValues', childName: 'adms' });
    removeChildren({ parentId: 'displaySelectedZonas', childName: 'zonas' });
    document.getElementById("buscar").value = "";
    document.querySelectorAll('input[type=checkbox]').forEach(el => el.checked = false);
    selectedValues = [];
    selectedZonas = [];
    caracteristicasSelected = [];
    busca = "";
    findPlantas();
}

function closeFiltros() {
    removeChildren({ parentId: 'filtroParent', childName: 'filtroKids' });
    removeChildren({ parentId: 'displaySelectedValues', childName: 'adms' });
    removeChildren({ parentId: 'displaySelectedZonas', childName: 'zonas' });

    FiltrosButton.innerHTML = "Abrir Filtro";
    FiltrosButton.setAttribute("onclick", "show()");

}


function removeChildren(params) {
    var parentId = params.parentId;
    var childName = params.childName;

    var childNodesToRemove = document.getElementById(parentId).getElementsByClassName(childName);
    for (var i = childNodesToRemove.length - 1; i >= 0; i--) {
        var childNode = childNodesToRemove[i];
        childNode.parentNode.removeChild(childNode);
    }
}
function saveCaracteristicas(caracteristica) {
    if (caracteristicasSelected.includes(caracteristica) == true) {
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

function findPlantas() {
    filtroArray = [caracteristicasSelected, busca, selectedValues, selectedZonas];
    var jsonString = JSON.stringify(filtroArray);
    $.ajax({
        type: "POST",
        url: "filtrarExec.php?function=findPlantas",
        data: { data: jsonString },
        cache: false,

        success: function (data) {
            var plantas = $.parseJSON(data);
            removeChildren({ parentId: 'pai', childName: 'card-kid' });
            createCards(plantas);
        }
    });
}

function createCards(plantas) {


    if (plantas.length == 0) {
        if (cardNull == false) {
            div = document.createElement('div');
            div.id = "msgNull";
            div.innerHTML = "<br><p>Nenhuma planta foi encontrada!</p><img src='../../public/icon/florvaso_icon.png' id='imgNull' alt='Descrição da imagem'><p>Tente buscar novamente!</p>";
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
        if (document.getElementById("msgNull") != undefined) {
            document.getElementById("pai").removeChild(document.getElementById("msgNull"));
        }

    }

    plantas.forEach(element => {
        console.log(element);
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
        a1.href = "visualizarPlanta.php?idp=" + element['IdPlanta'] + "&ide=" + element['Especie']['IdEspecie'];

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

        if (element['NomeSocial'] != "") {
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

        p1.innerHTML = "<a id='codplanta'>Código: " + element['CodNumerico'] + "<br><br></a>Pontuação: " + element['Pontos'] + "<br>";
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
        btn = document.createElement('button');
        btn.setAttribute('type', 'button');
        btn.setAttribute('id', 'imprimas');
        btn.setAttribute('data-toggle', 'modal');
        btn.setAttribute('data-target', '#imprimirModal');
        btn.setAttribute('onclick', `prepararImpressao(${JSON.stringify(element["NomeSocial"])}, ${JSON.stringify(element["Especie"]["NomePopular"])}, ${JSON.stringify(element["Especie"]["NomeCientifico"])}, ${JSON.stringify(element["CodNumerico"])}, ${JSON.stringify(element["QrCode"])})`);
        btn.innerText = 'Imprimir';
        divBody.appendChild(btn);

        br68 = document.createElement("br");
        br69 = document.createElement("br");
        divBody.appendChild(br68);
        divBody.appendChild(br69);

        if ((tipoUsuarioLogado == 3 && nomeUsuarioLogado == element['Usuario']['nomeUsuario']) || tipoUsuarioLogado == 2) {
            a2 = document.createElement('a');
            a2.href = "editarPlanta.php?id=" + element['IdPlanta'];
            a2.id = 'editas';
            a2.innerHTML = "Editar";
            divBody.appendChild(a2);
        }

        if ((tipoUsuarioLogado == 3 && nomeUsuarioLogado == element['Usuario']['nomeUsuario']) || tipoUsuarioLogado == 2) {
            a3 = document.createElement('a');
            a3.href = "deletarPlanta.php?id=" + element['IdPlanta'];
            a3.setAttribute('onclick', 'return confirm(\"Confirma a exclusão da Planta?\");');
            a3.id = 'excluas'
            a3.className = 'btn btn-alert excluir';
            a3.innerHTML = "Excluir";
            divBody.appendChild(a3);
        }

        br3 = document.createElement('br');
        divBody.appendChild(br3);

        divCard.appendChild(divBody);
    });
}
