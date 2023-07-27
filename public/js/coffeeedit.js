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
"stars_evaluation"
];

classNames.forEach(className => {
    addStarEventListenerToClass(className);
})