async function app() {
  const img = document.getElementById('upload-img');

  cocoSsd.load().then(model => {
    model.detect(img).then(predictions => {
      predictions.forEach(element => 
        document.getElementById('console').innerHTML += `<li><b>Prédiction</b> : ${element.class} avec une <b>probabilité</b> de : ${element.score}%</li>`
      );
    });
  });
}

app();