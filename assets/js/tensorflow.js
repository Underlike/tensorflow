
async function app() {
  const img = document.getElementById('img');

  if (img) {
    cocoSsd.load().then(model => {
      model.detect(img).then(predictions => {
        document.getElementById('console').innerHTML = `<div class="alert alert-success m-0" role="alert">OK</div></div><input type="hidden" id="class" name="class" value="${predictions[0].class}"> <input type="hidden" id="score" name="score" value="${predictions[0].score}"></div>`
      });
    });
  }
}

app();