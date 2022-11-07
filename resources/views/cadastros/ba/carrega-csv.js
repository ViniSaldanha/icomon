// EXEMPLO COM ES6
async function renderTableFromFile(){
    let formData = new FormData();
    formData.append('arquivo-csv', fileupload.files[0]); // AQUI ACESSA DIRETAMENTE O ID DO ELEMENTO
    const response = await fetch('/cadastros/ba/renderTableFromFile', {
        method: 'POST',
        body: formData
    });

    document.getElementById('dados-csv').innerHTML = await response.text();
}


(function(){

    const uploadFileNormal = file => {
        const URL = '/cadastros/ba/renderTableFromFile';
        const request = new XMLHttpRequest();
        const formData = new FormData();
        formData.append('arquivo-csv', file);

        request.open('POST', URL, true);
        request.onload = () => {
            if( request.status === 200){
                document.getElementById('dados-csv').innerHTML = request.responseText;
            }
        };
        
        request.send(formData);
    }

    /* const fileInput = document.querySelector('#arquivo-csv');
    fileInput.addEventListener('change', event => {
        const files = event.target.files;
        uploadFileNew(files[0]);
    }); */

})();