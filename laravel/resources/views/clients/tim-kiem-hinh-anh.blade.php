<div>Teachable Machine Image Model</div>
<button type="button" onclick="init()">Start</button>
<input type="file" id="image-upload" accept="image/*" onchange="predictImage(this.files[0])">
<div id="label-container"></div>
<script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@latest/dist/tf.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@teachablemachine/image@latest/dist/teachablemachine-image.min.js"></script>
<script type="text/javascript">
    // More API functions here:
    // https://github.com/googlecreativelab/teachablemachine-community/tree/master/libraries/image

    // the link to your model provided by Teachable Machine export panel
    const URL = "https://teachablemachine.withgoogle.com/models/paDAYOLqh/";

    let model, maxPredictions;

async function init() {
  const modelURL = URL + "model.json";
  const metadataURL = URL + "metadata.json";

  // load the model and metadata
  model = await tmImage.load(modelURL, metadataURL);
  maxPredictions = model.getTotalClasses();
}

async function predictImage(image) {
  if (image) {
    const prediction = await model.predict(image, false);
    updateLabelContainer(prediction);
  } else {
    console.error('No image provided.');
  }
}

function updateLabelContainer(prediction) {
  const labelContainer = document.getElementById("label-container");
  labelContainer.innerHTML = ""; // clear previous results

  for (let i = 0; i < maxPredictions; i++) {
    const classPrediction =
      prediction[i].className + ": " + prediction[i].probability.toFixed(2);
    const labelElement = document.createElement("div");
    labelElement.textContent = classPrediction;
    labelContainer.appendChild(labelElement);
  }
}
</script>
