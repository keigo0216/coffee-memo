// coffee imageがアップロードされた時に、画像を表示する
function previewImage(event) {
    const input = event.target;
    if (input.files[0]) {
        const reader = new FileReader();
        reader.onload = function (e) {
            const previewElement = document.getElementById('preview');
            // プレビュー要素の有効化
            previewElement.classList.remove('hidden');
            // プレビュー画像のURLをセット
            previewElement.src = e.target.result;

            // registerviewの画像を非表示にする
            const registerViewElement = document.getElementById('register-view');
            registerViewElement.classList.add('hidden');
        };
        reader.readAsDataURL(input.files[0]);
    }
}

document.getElementById('dropzone-file').addEventListener('change', previewImage);



 // Loop through the "stars" NodeList and add event listener to each
function addStarEventListenerToClass(className) {
    const stars = document.querySelectorAll(`.${className} i`);
    stars.forEach((star, index1) => {
      star.addEventListener("click", () => {
        stars.forEach((star, index2) => {
          index1 >= index2 ? star.classList.add("active") : star.classList.remove("active");
        });
      });
    });
}
  
  // Array of class names to apply the event listener
const classNames = [
"stars_evaluation",
"stars_scent",
"stars_bitterness",
"stars_acidity",
"stars_sweetness",
"stars_clearness",
"stars_rich",
"stars_aftertaste",
"stars_aftercooled",
];

classNames.forEach(className => {
    addStarEventListenerToClass(className);
})