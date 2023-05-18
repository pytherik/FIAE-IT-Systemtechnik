const container = document.querySelector('.container');
const calc = document.querySelector('#calc');

const head = ['Name', 'Anzahl', 'Einzelpreis', 'MwSt', 'Total'];
const idTags = ['name', 'anz', 'price', 'total'];

head.forEach((tableHead, i) => {
  let ability = '';
  container.innerHTML += `<div id="col${i}" class="column">`;
  document.getElementById(`col${i}`).innerHTML += `
                                                  <div class="input-container">
                                                    <span class="table-head">${tableHead}</span>
                                                  </div>`;
  if (tableHead === 'MwSt') {
    for (let j = 0; j < 4; j++) {
      document.getElementById(`col${i}`).innerHTML += `
                                                    <div class="radio-container">
                                                      <input type="radio" name="mwst${j}" id="mwst${j}1" value="7">
                                                      <label for="mwst${j}1">7%</label>
                                                      <input type="radio" name="mwst${j}" id="mwst${j}2" value="19" checked>
                                                      <label for="mwst${j}2">19%</label>
                                                    </div>`;
    }
    container.innerHTML += '</div>';
  } else {
    if (tableHead === 'Total') ability = 'disabled';
    for (let j = 0; j < 4; j++) {
      document.getElementById(`col${i}`).innerHTML += `
                                                    <div class="input-container">
                                                      <input id="${idTags[i]}${j}"type="text" ${ability}/>
                                                    </div>`;
    }
    container.innerHTML += '</div>';
  }
});

calc.addEventListener('click', () => {
  const totalsArr = [];
  let sumTotal = 0;
  let mwst7Total = 0;
  let mwst19Total = 0;
  for (let i = 0; i < 4; i++) {
    const anz = Number(document.getElementById(`${idTags[1]}${i}`).value);
    const price = Number(document.getElementById(`${idTags[2]}${i}`).value);
    const mwst = Number(document.querySelector(`input[name="mwst${i}"]:checked`).value);
    const total = anz * price;
    const mwstForPos = total * mwst / 100;
    document.getElementById(`${idTags[4]}${i}`).value = `${total.toFixed(2)}€`;
    if (mwst === 7) {
      totalsArr.push({'total': total, 'mwst7': mwstForPos, 'mwst19': 0 });
    } else {
      totalsArr.push({'total': total, 'mwst7': 0, 'mwst19': mwstForPos });
    }
  }
  totalsArr.forEach((pos) => {
    sumTotal += pos.total;
    mwst7Total += pos.mwst7;
    mwst19Total += pos.mwst19;
  })
  console.log(totalsArr);
  document.getElementById('resultTotal').innerHTML = `${sumTotal.toFixed(2)}€`;
  document.getElementById('result7').innerHTML = `${mwst7Total.toFixed(2)}€`;
  document.getElementById('result19').innerHTML = `${mwst19Total.toFixed(2)}€`;
});
