const container = document.querySelector('.container');
const calc = document.querySelector('#calc');

const head = ['Name', 'Anzahl', 'Einzelpreis', 'MwSt', 'Total'];
const idTags = ['name', 'anz', 'price', 'mwst', 'total'];

//info Tabellenheadings aus head-Array aufbauen
head.forEach((tableHead, i) => {
  //info Hilfsvariablen zum deaktivieren der Total-Spalte
  let ability = '';
  //info                und für text-align in Name-Spalte
  let align = '';
  let size = 10;
  container.innerHTML += `<div id="col${i}" class="column">`;
  document.getElementById(`col${i}`).innerHTML += `
                <div class="input-container">
                  <span class="table-head">${tableHead}</span>
                </div>`;
  //info Sonderfall MwSt: Radiobuttons
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
    //info Sonderfall deaktiviertes Input Feld
    if (tableHead === 'Total') ability = 'disabled';
    //info Sonderfall Spalte Name mit text-align: left
    if (tableHead === 'Name') {
      align = 'style="text-align:left"';
      size = 18;
    }

    //info Aufbau aller Input Felder
    for (let j = 0; j < 4; j++) {
      document.getElementById(`col${i}`).innerHTML += `
      <div class="input-container">
        <input ${align} size="${size}" id="${idTags[i]}${j}"type="text" ${ability}/>
      </div>`;
    }
    container.innerHTML += '</div>';
  }
});

//info Funktionalitäten für Event: Button wird geklickt
calc.addEventListener('click', () => {
  //info Numerisches Array wird mit assoziativen Arrays gefüllt
  const totalsArr = [];
  //info Initialisieren der benötigten Variablen
  let sumTotal = 0;
  let mwst7Total = 0;
  let mwst19Total = 0;
  for (let i = 0; i < 4; i++) {
    //info Holen der Werte aus den Input Feldern
    const anz = Number(document.getElementById(`${idTags[1]}${i}`).value);
    const price = Number(document.getElementById(`${idTags[2]}${i}`).value);
    const mwst = Number(document.querySelector(`input[name="mwst${i}"]:checked`).value);
    //info Berechnung der Positionen
    const total = anz * price;
    const mwstForPos = total * mwst / 100;
    //info Füllen der Total Spalte
    document.getElementById(`${idTags[4]}${i}`).value = `${total.toFixed(2)}€`;
    //info Aufbau totalsArr
    if (mwst === 7) {
      totalsArr.push({'total': total, 'mwst7': mwstForPos, 'mwst19': 0});
    } else {
      totalsArr.push({'total': total, 'mwst7': 0, 'mwst19': mwstForPos});
    }
  }
  //info Finale Berechnungen durchführen
  totalsArr.forEach((pos) => {
    sumTotal += pos.total;
    mwst7Total += pos.mwst7;
    mwst19Total += pos.mwst19;
  })
  //info Ausgabe der berechneten Werte in den Summenfeldern
  document.getElementById('resultTotal').innerHTML = `${sumTotal.toFixed(2)}€`;
  document.getElementById('result7').innerHTML = `${mwst7Total.toFixed(2)}€`;
  document.getElementById('result19').innerHTML = `${mwst19Total.toFixed(2)}€`;
});
