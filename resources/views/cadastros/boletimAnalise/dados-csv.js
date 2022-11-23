async function renderTableFromFile(){
    let formData = new FormData();
    formData.append('arquivo-csv', fileupload.files[0]); // AQUI ACESSA DIRETAMENTE O ID DO ELEMENTO
    const response = await fetch('/cadastros/boletimAnalise/renderTableFromFile', {
        method: 'POST',
        body: formData
    });

    document.getElementById('dados-csv').innerHTML = await response.text();
}

async function getItemFromCsv(trClicked){
    const id = trClicked.rowIndex - 1;
    const response = await fetch(`/cadastros/boletimAnalise/getItemFromCsv/${id}`);
    const responseText = await response.text();
    const json = JSON.parse(responseText);

    setValues(json);
}

function setValues(json){
    document.getElementById('ba').value = json.BA;
    document.getElementById('backbone').value = json.BACKBONE;
    document.getElementById('mes').value = json.MES;
    document.getElementById('estacao').value = json.ESTACAO;
    document.getElementById('indicador_fibra').value = json.INDICADOR_FIBRA;
    document.getElementById('mnemonico').value = json.MNEMONICO;
    document.getElementById('abertura').value = json.ABERTURA;
    document.getElementById('promessa').value = json.PROMESSA;
    document.getElementById('proximo_acionamento').value = json.PROXIMO_ACIONAMENTO;
    document.getElementById('baixa').value = json.BAIXA;
    document.getElementById('sla').value = json.SLA;
    document.getElementById('cod_atividade').value = json.COD_ATIVIDADE;
    document.getElementById('ga').value = json.GA;
}


