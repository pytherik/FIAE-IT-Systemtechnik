// Elemente für spätere Verwendung als Konstanten definieren
const container = document.querySelector('.container');
const calcButton = document.querySelector('#calc');

const head = ['Name', 'Anzahl', 'Einzelpreis', 'MwSt', 'Total'];
const idTags = ['name', 'anz', 'price', 'mwst', 'total'];

// Tabellenheadings aus head-Array aufbauen
head.forEach((tableHead, i) => {
  // Deaktivieren der Total-Spalte text-align,Größenänderung Name-Spalte
  let ability = '';
  let align = '';
  let size = 10;
  container.innerHTML += `<div id="col${i}" class="column">`;
  document.getElementById(`col${i}`).innerHTML += `
      <div class="input-container">
        <span class="table-head">${tableHead}</span>
      </div>`;
  // Radiobuttons Mwst
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
    // deaktiviertes Input Feld, größere Spalte Name text-align: left
    if (tableHead === 'Total') ability = 'disabled';
    if (tableHead === 'Name') {
      align = 'style="text-align:left"';
      size = 18;
    }

    // Aufbau aller Input Felder
    for (let j = 0; j < 4; j++) {
      document.getElementById(`col${i}`).innerHTML += `
      <div class="input-container">
        <input ${align} size="${size}" id="${idTags[i]}${j}"type="text" ${ability}/>
      </div>`;
    }
    container.innerHTML += '</div>';
  }
});

// Funktionalitäten für Event: Button wird geklickt
calcButton.addEventListener('click', () => {
  // Initialisieren der benötigten Variablen
  let sumTotal = 0;
  let mwst7Total = 0;
  let mwst19Total = 0;
  for (let i = 0; i < 4; i++) {
    // Holen der Werte aus den Input Feldern
    const anz = Number(document.getElementById(`${idTags[1]}${i}`).value);
    const price = Number(document.getElementById(`${idTags[2]}${i}`).value);
    const mwst = Number(document.querySelector(`input[name="mwst${i}"]:checked`).value);
    // Berechnung der Positionen
    const total = anz * price;
    const mwstForPos = total * mwst / 100;
    // Füllen der Total Spalte
    document.getElementById(`${idTags[4]}${i}`).value = `${total.toFixed(2)}€`;

    sumTotal += total;
    mwst7Total += mwst === 7 ? mwstForPos : 0;
    mwst19Total += mwst === 19 ? mwstForPos : 0;
  }

  // Ausgabe der berechneten Werte in den Summenfeldern
  document.getElementById('resultTotal').innerHTML = `${sumTotal.toFixed(2)}€`;
  document.getElementById('result7').innerHTML = `${mwst7Total.toFixed(2)}€`;
  document.getElementById('result19').innerHTML = `${mwst19Total.toFixed(2)}€`;
})
