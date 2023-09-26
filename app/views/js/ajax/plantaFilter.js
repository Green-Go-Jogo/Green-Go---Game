pai = document.getElementById("filtroParent");
FiltrosButton = document.getElementById("filtroButton");
//! NÃO APAGUE OS COMENTÁRIOS, PODEM SER ÚTEIS
//! ATÉ MESMO OS TODOs, QUE ME SERVEM COMO GUIA PARA AMANHÂ
caracteristicasSelected = [];
caracteristicas = [];
ADMs = [];
let selectedValues = []; 

// function findUsuario() {
//     var xhttp = new XMLHttpRequest();
//     xhttp.open("GET", "UsuarioController.php?action=findIt&word=" + input, true);
  
//     //* verifica se está preparado ou não. Quando está preparado, recebe o retorno em JSON e o transforma em um array.
//     xhttp.onreadystatechange = function() {
//         if (this.readyState == 4 && this.status == 200) {
//             var retorno = xhttp.responseText;
//             var usuarioArray = JSON.parse(retorno);

            
//             removeChildren({parentId:'usuarioTable',childName:'usuarioLinha'});
//             createChildren(usuarioArray, BASEURL);
//             console.log(usuarioArray);
//         }
//     }
//     xhttp.send();
// } 
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

    createSendFiltroButton();

    FiltrosButton.setAttribute("onclick", "closeFiltros()");
}
function createFiltroCaracteristicas() {
    i = 0;
    caracteristicas[0][1].forEach(element => {
        input = document.createElement('input');
        input.type = "checkbox";
        input.name = element;
        input.className = "filtroKids" + element;
        input.value = element;
        input.setAttribute("oninput", "findPlantas('"+element+"')");

        label = document.createElement('label');
        label.for = element;
        label.innerHTML = element;
        label.className = "filtroKids";

        pai.appendChild(input);
        pai.appendChild(label);
        i++;
    });
}
function createFiltroADMs() {
    select = document.createElement('select');
    select.className = "filtroKids";
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
    sendFiltroButton.className = "filtroKids";
    sendFiltroButton.innerHTML = "ADDadm";
    sendFiltroButton.addEventListener("click", addSelectedValue);  // Adicionando um evento de clique
    pai.appendChild(sendFiltroButton);

    const displayDiv = document.createElement('div');  // Criando uma área de exibição
    displayDiv.id = 'displaySelectedValues';  // Atribuindo um ID para a área de exibição
    pai.appendChild(displayDiv);

    // Função para adicionar o valor selecionado ao array e exibi-lo
    function addSelectedValue() {
        const selectedOption = select.options[select.selectedIndex];
        if (selectedOption) {
            const value = selectedOption.value;
            // Verifica se o valor já está no array antes de adicioná-lo
            if (!selectedValues.includes(value)) {
                selectedValues.push(value);
                displaySelectedValues();  // Atualiza a exibição
            }
        }
    }

    // Função para exibir os valores selecionados
    function displaySelectedValues() {
        displayDiv.innerHTML = selectedValues.map(value => {
            return `<div>${value} <button onclick="removeSelectedValue('${value}')">Remover</button></div>`;
        }).join('');
    }
}

// Função para remover um valor do array e atualizar a exibição
function removeSelectedValue(value) {
    const index = selectedValues.indexOf(value);
    if (index !== -1) {
        selectedValues.splice(index, 1);
        displaySelectedValues();  // Atualiza a exibição
    }
}


function createSendFiltroButton() {

    sendFiltroButton = document.createElement("button");
    sendFiltroButton.className = "filtroKids";
    sendFiltroButton.innerHTML = "Filtrar";
    sendFiltroButton.setAttribute("onclick", "sendFiltro()");

    pai.appendChild(sendFiltroButton);

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

function findPlantas (caracteristica) {
    
    if(caracteristicasSelected.includes(caracteristica) == true) {
        index = caracteristicasSelected.indexOf(caracteristica);
        caracteristicasSelected.splice(index, 1);
    }
    else {
        caracteristicasSelected.push(caracteristica);
    }
//TODO envio de um array que em seu interior, tem 2 arrays e 1 string:
//TODO 1 array das caracteristicas, 1 array dos ADMs, 1 string escrita no botão de busca.
//TODO uma única requesição dinamica por cada uma das caracteristicas. Quando uma vier vazia,
//TODO se ignora. Quando uma tiver um valor, esse valor será atribuido no SQL junto com seu SQL 
//TODO necessário para filtrar corretamente. Depois, será chamado uma função que receba as plantas filtradas
//TODO e recriará todas as cards desde zero aqui no JS. 
//* por agora, esta função consegue pegar as caracteristicas selecionadas e enfiar elas num Array.
//TODO falta poder pegar dos ADMs, coisa do Biel, e poder pegar o valor do input Buscar. estes valores
//TODO serão guardados em variaveis locais neste arquivo, para poder reutilizá-los.
//TODO para MANTER este filtro funcionando mesmo recarregando a página, os valores também serão guardados
//TODO em variaveis _SESSION, e assim se manterão dentro da página.   

    // var jsonString = JSON.stringify();
    // $.ajax({
    //      type: "POST",
    //      url: "filtrarExec.php?function=findPlantas",
    //      data: {data : jsonString}, 
    //      cache: false,
 
    //      success: function(data){
    //          var json = $.parseJSON(data);
    //          var bruh = json.parse(data);
    //          console.log(bruh);
    //      }
    //  });
}
