
async function app() {
  const img = document.getElementById('img');

  cocoSsd.load().then(model => {
    model.detect(img).then(predictions => {
        document.getElementById('console').innerHTML = `<input type="hidden" id="class" name="class" value="${predictions[0].class}"> <input type="hidden" id="score" name="score" value="${predictions[0].score}"></div>`
    });
  });
}

app();