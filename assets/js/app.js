const btnAnalyse = document.getElementById('btn-analyse');

if (btnAnalyse) {
    // on analyse l'image

    btnAnalyse.addEventListener('click', (ev) => {

        btnAnalyse.classList.add('disabled');
        btnAnalyse.disabled = true;
        btnAnalyse.innerText = "Analyse en cours..";

        const imgPreview = document.getElementById('img-preview');

        cocoSsd.load().then(model => {
            model.detect(imgPreview).then(predictions => {
                console.log(predictions)
                const results = document.getElementById('result-analyse');
                if (predictions.length > 0) {
                    fetch('/functions.php', {

                    }).then((result) => {
                        console.log('ok')
                    })
                    results.innerHTML = `Vos résultats sont prêts ! <a href="./results.php?id=${document.getElementById('img-token').value}">Voir les résultats</a>`
                } else {
                    results.innerText = 'Une erreur est survenue, aucune prédiction n\'a été trouvée :(';
                }
                if (results) {
                    results.classList.remove('invisible')
                }
                // document.getElementById('console').innerHTML = `<div class="alert alert-success" role="alert">OK</div></div><input type="hidden" id="class" name="class" value="${predictions[0].class}"> <input type="hidden" id="score" name="score" value="${predictions[0].score}"></div>`
            });
        });
    });
}