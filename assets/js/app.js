const btnAnalyse = document.getElementById('btn-analyse');

if (btnAnalyse) {
    // on analyse l'image

    btnAnalyse.addEventListener('click', (ev) => {
        const imgPreview = document.getElementById('img-preview');

        cocoSsd.load().then(model => {
            model.detect(imgPreview).then(predictions => {
                console.log(predictions)
                // document.getElementById('console').innerHTML = `<div class="alert alert-success" role="alert">OK</div></div><input type="hidden" id="class" name="class" value="${predictions[0].class}"> <input type="hidden" id="score" name="score" value="${predictions[0].score}"></div>`
            });
        });
    });
}