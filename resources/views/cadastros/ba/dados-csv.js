async function renderTableFromFile(){
    let formData = new FormData();
    formData.append('arquivo-csv', fileupload.files[0]); // AQUI ACESSA DIRETAMENTE O ID DO ELEMENTO
    const response = await fetch('/cadastros/ba/renderTableFromFile', {
        method: 'POST',
        body: formData
    });

    document.getElementById('dados-csv').innerHTML = await response.text();
}

async function getItemFromCsv(trClicked){
    const id = trClicked.rowIndex - 1;
    const response = await fetch(`/cadastros/ba/getItemFromCsv/${id}`);
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
}