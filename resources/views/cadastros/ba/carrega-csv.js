
(function(){
    const fileInput = document.querySelector('#arquivo-csv');
    fileInput.addEventListener('change', event => {
        const files = event.target.files;
        uploadFileNew(files[0]);
    });

    const uploadFile = file => {
        const URL = '/cadastros/ba/loadFile';
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

    
    // EXEMPLO COM ES6
    async function uploadFileNew(file){
        let formData = new FormData();
        formData.append('arquivo-csv', file);
        let response = await fetch('/cadastros/ba/loadFile', {
            method: 'POST',
            body: formData
        });

        document.getElementById('dados-csv').innerHTML = await response.text();
    }

})();