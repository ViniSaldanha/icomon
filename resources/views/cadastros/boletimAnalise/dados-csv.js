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
    document.getElementById('ba').value = json.data.BA;
    document.getElementById('backbone').value = json.data.BACKBONE;
    document.getElementById('mes').value = json.data.MES;
    document.getElementById('estacao').value = json.data.ESTACAO;
    document.getElementById('indicador_fibra').value = json.data.INDICADOR_FIBRA;
    document.getElementById('mnemonico').value = json.data.MNEMONICO;
    document.getElementById('abertura').value = json.data.ABERTURA;
    document.getElementById('promessa').value = json.data.PROMESSA;
    document.getElementById('proximo_acionamento').value = json.data.PROXIMO_ACIONAMENTO;
    document.getElementById('baixa').value = json.data.BAIXA;
    document.getElementById('sla').value = json.data.SLA;
    document.getElementById('cod_atividade').value = json.data.COD_ATIVIDADE;
    document.getElementById('ga').value = json.data.GA;
    document.getElementById('prazo').value = json.data.PRAZO_PSR;
    document.getElementById('descricao_trecho').value = json.mascaraEncerramento.localidade;
    document.getElementById('numero_cis').value = json.mascaraEncerramento.ro_cis;
}

function exibir_jm( el ){
    var inputJm = document.getElementById('numero_jm');
    if (el.value === 'Sim'){ 
       inputJm.style.display = "Block";
    }
    else {
        inputJm.style.display = "none";
    }
    var inputJm = document.getElementById('numero_jm2');
    if (el.value === 'Sim'){ 
       inputJm.style.display = "Block";
    }
    else {
        inputJm.style.display = "none";
    }
    var inputJm = document.getElementById('data_abertura');
    if (el.value === 'Sim'){ 
       inputJm.style.display = "Block";
    }
    else {
        inputJm.style.display = "none";
    }
    var inputJm = document.getElementById('data_abertura2');
    if (el.value === 'Sim'){ 
       inputJm.style.display = "Block";
    }
    else {
        inputJm.style.display = "none";
    }
    var inputJm = document.getElementById('prev_regularizacao');
    if (el.value === 'Sim'){ 
       inputJm.style.display = "Block";
    }
    else {
        inputJm.style.display = "none";
    }
    var inputJm = document.getElementById('prev_regularizacao2');
    if (el.value === 'Sim'){ 
       inputJm.style.display = "Block";
    }
    else {
        inputJm.style.display = "none";
    }
}

function exibir_pend( el ){
    var inputPend = document.getElementById('informe_pendencia');
    if (el.value === 'Yes'){ 
       inputPend.style.display = "Block";
    }
    else {
        inputPend.style.display = "none";
    }
    var inputPend = document.getElementById('informe_pendencia2');
        if (el.value === 'Yes'){ 
   	    inputPend.style.display = "Block";
    }
    else {
        inputPend.style.display = "none";
    }
    var inputPend = document.getElementById('material_pendencia');
        if (el.value === 'Yes'){ 
       inputPend.style.display = "Block";
    }
    else {
        inputPend.style.display = "none";
    }
    var inputPend = document.getElementById('material_pendencia2');
        if (el.value === 'Yes'){ 
   	    inputPend.style.display = "Block";
    }
    else {
        inputPend.style.display = "none";
    }
    var inputPend = document.getElementById('resp_pendencia');
        if (el.value === 'Yes'){ 
       inputPend.style.display = "Block";
    }
    else {
        inputPend.style.display = "none";
    }
    var inputPend = document.getElementById('resp_pendencia2');
        if (el.value === 'Yes'){ 
   	    inputPend.style.display = "Block";
    }
    else {
        inputPend.style.display = "none";
    }
}

function exibir_cabo( el ){
    var inputCabos = document.getElementById('lote_cabo',);
    if (el.value === 'Sim'){ 
        inputCabos.style.display = "block";
    }
    else {
        inputCabos.style.display = "none";
    }
    var inputCabos = document.getElementById('lote_cabo2',);
    if (el.value === 'Sim'){ 
        inputCabos.style.display = "block";
    }
    else {
    inputCabos.style.display = "none";
    }
    var inputCabos = document.getElementById('metro_cabo',);
    if (el.value === 'Sim'){ 
        inputCabos.style.display = "block";
    }
    else {
        inputCabos.style.display = "none";
    }
    var inputCabos = document.getElementById('metro_cabo2',);
    if (el.value === 'Sim'){ 
        inputCabos.style.display = "block";
    }
    else {
        inputCabos.style.display = "none";
    }
    var inputCabos = document.getElementById('cod_sap_cabo',);
    if (el.value === 'Sim'){ 
        inputCabos.style.display = "block";
    }
    else {
        inputCabos.style.display = "none";
    }
    var inputCabos = document.getElementById('cod_sap_cabo2',);
    if (el.value === 'Sim'){ 
        inputCabos.style.display = "block";
    }
    else {
        inputCabos.style.display = "none";
    }
    var inputCabos = document.getElementById('coordenadas_cabo',);
    if (el.value === 'Sim'){ 
        inputCabos.style.display = "block";
    }
    else {
        inputCabos.style.display = "none";
    }
    var inputCabos = document.getElementById('coordenadas_cabo2',);
    if (el.value === 'Sim'){ 
        inputCabos.style.display = "block";
    }
    else {
        inputCabos.style.display = "none";
    }
    var inputCabos = document.getElementById('quantidade_cx',);
    if (el.value === 'Sim'){ 
        inputCabos.style.display = "block";
    }
    else {
        inputCabos.style.display = "none";
    }
    var inputCabos = document.getElementById('quantidade_cx2',);
    if (el.value === 'Sim'){ 
        inputCabos.style.display = "block";
    }
    else {
        inputCabos.style.display = "none";
    }
    var inputCabos = document.getElementById('numero_emenda',);
    if (el.value === 'Sim'){ 
        inputCabos.style.display = "block";
    }
    else {
        inputCabos.style.display = "none";
    }
    var inputCabos = document.getElementById('numero_emenda2',);
    if (el.value === 'Sim'){ 
        inputCabos.style.display = "block";
    }
    else {
        inputCabos.style.display = "none";
    }
    var inputCabos = document.getElementById('coordenadas_enpe',);
    if (el.value === 'Sim'){ 
        inputCabos.style.display = "block";
    }
    else {
        inputCabos.style.display = "none";
    }
    var inputCabos = document.getElementById('coordenadas_enpe2',);
    if (el.value === 'Sim'){ 
        inputCabos.style.display = "block";
    }
    else {
        inputCabos.style.display = "none";
    }
    var inputCabos = document.getElementById('endereco_enpe',);
    if (el.value === 'Sim'){ 
        inputCabos.style.display = "block";
    }
    else {
        inputCabos.style.display = "none";
    }
    var inputCabos = document.getElementById('endereco_enpe2',);
    if (el.value === 'Sim'){ 
        inputCabos.style.display = "block";
    }
    else {
        inputCabos.style.display = "none";
    }
}
