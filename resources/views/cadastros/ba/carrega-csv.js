async function renderTableFromFile(){
    let formData = new FormData();
    formData.append('arquivo-csv', fileupload.files[0]); // AQUI ACESSA DIRETAMENTE O ID DO ELEMENTO
    const response = await fetch('/cadastros/ba/renderTableFromFile', {
        method: 'POST',
        body: formData
    });

    document.getElementById('dados-csv').innerHTML = await response.text();
}