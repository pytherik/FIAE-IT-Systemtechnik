const cols = document.querySelectorAll('.column');

console.log(cols);

cols.forEach((col, i) => {
  for (let j = 0; j < 4 ; j++) {
  col.innerHTML += `
                    <div class="input-container">
                      <label for="row${i}">Name</label>
                      <input id="row${i}"type="text"/>
                    </div>`;
  }
})