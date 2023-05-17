const container = document.querySelector('.container');
const calc = document.querySelector('#calc');

const head = ['Name', 'Anzahl', 'Einzelpreis', 'Total'];
const ids = ['name', 'anz', 'price', 'total'];

for (let i = 0; i < 4; i++) {
  let ability = '';
  container.innerHTML += `<div id="col${i}" class="column">`;
  document.getElementById(`col${i}`).innerHTML += `<span class="table-head">${head[i]}</span>`
  if (i === 3) ability = 'disabled';
  for (let j = 0; j < 4; j++) {
    document.getElementById(`col${i}`).innerHTML += `
                    <div class="input-container">
                      <input id="${ids[i]}${j}"type="text" ${ability}/>
                    </div>`;
  }
  container.innerHTML += '</div>';
}

calc.addEventListener('click', () => {
  const totalsArr = [];
  let sum = 0;
  for (let i = 0; i < 4; i++) {
    let anz = Number(document.getElementById(`${ids[1]}${i}`).value);
    let price = Number(document.getElementById(`${ids[2]}${i}`).value);
    document.getElementById(`${ids[3]}${i}`).value = `${anz * price}`;
    totalsArr.push(anz * price);
  }
  totalsArr.forEach((val) => {
    sum += val;
  });
  document.getElementById('result').innerHTML = `${sum}`;
});
