
(function(){
    const fileInput = document.querySelector('#arquivo-csv');
    fileInput.addEventListener('change', event => {
        const files = event.target.files;
        uploadFile(files[0]);
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

    

    async function uploadFileNew(file){
        let formData = new FormData();
        formData.append('arquivo-csv', file);
        await fetch('/cadastros/ba/loadFile', {
            method: 'POST',
            body: formData
        });
        alert('The file has been uploaded successfully');
    }



    /* $(document).ready(function() {
        $('#formLoadFile').submit(function(e) {
            e.preventDefault();

            $.ajax({
                type: 'POST',
                url: '/cadastros/ba/loadFile',
                data: $(this).serialize(),
                success: function (data) {
                    alert('AJAX call was successful!');
                    alert('Data from the server: ' + data);
                },
                error: function () {
                    alert('There was some error performing the AJAX call!');
                }
            });
        });
    }); */
})();