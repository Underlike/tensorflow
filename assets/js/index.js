
async function app() {
  const img = document.getElementById('img');

  cocoSsd.load().then(model => {
    model.detect(img).then(predictions => {
        document.getElementById('console').innerHTML = `<div id="class" value="${predictions[0].class}"></div> <div id="score" value="${predictions[0].score}"></div>`
    });
  });
}

app();