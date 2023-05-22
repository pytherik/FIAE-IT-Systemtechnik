//info Elemente für spätere Verwendung als Konstanten definieren
const container = document.querySelector('.container');
const calcButton = document.querySelector('#calc');
const newLine = document.querySelector('#new-line');

const head = ['Name', 'Anzahl', 'Einzelpreis', 'MwSt', 'Total'];
const idTags = ['name', 'anz', 'price', 'mwst', 'total'];

//info Tabellenheadings aus head-Array aufbauen
head.forEach((tableHead, i) => {

    container.innerHTML += `<div id="col${i}" class="column">`;
    document.getElementById(`col${i}`).innerHTML += `
      <div class="input-container">
        <span class="table-head">${tableHead}</span>
      </div>`;

});
//info Deaktivieren der Total-Spalte text-align,Größenänderung Name-Spalte
let j = 0;

const addLine = (j) => {
    let ability;
    let align = '';
    let size = 10;

    for (let i = 0; i < 5; i++) {
        size = (i === 0) ? 18 : 10;
        ability = (i === 4) ? 'disabled' : '';
        align = (i === 0) ? 'style="text-align:left"' : '';
        if (i === 3) {
            //info Radiobuttons Mwst
            document.getElementById(`col${3}`).innerHTML += `
              <div class="radio-container" data-row-num=${j}>
                <input type="radio" name="mwst${j}" id="mwst${j}1" value="7">
                <label for="mwst${j}1">7%</label>
                <input type="radio" name="mwst${j}" id="mwst${j}2" value="19" checked>
                <label for="mwst${j}2">19%</label>
              </div>`;
            container.innerHTML += '</div>';
        } else {
            document.getElementById(`col${i}`).innerHTML += `
              <div class="input-container">
                <input ${align} size="${size}" id="${idTags[i]}${j}"type="text" ${ability}/>
              </div>`;
            container.innerHTML += '</div>';
        }
    }
};

newLine.addEventListener('click', () => {
    const lineCount = document.querySelector('[data-row-num]:last-child');
    j = Number(lineCount.dataset.rowNum) + 1;
    // j = lineCount.dataset.linNum;
    addLine(j)
});


//info Funktionalitäten für Event: Button wird geklickt
calcButton.addEventListener('click', () => {
    console.log(j);
    //info Initialisieren der benötigten Variablen
    let sumTotal = 0;
    let mwst7Total = 0;
    let mwst19Total = 0;
    for (let i = 0; i <= j; i++) {

        //info Holen der Werte aus den Input Feldern
        const anz = Number(document.getElementById(`${idTags[1]}${i}`).value);
        const price = Number(document.getElementById(`${idTags[2]}${i}`).value);
        const mwst = Number(document.querySelector(`input[name="mwst${i}"]:checked`).value);

        //info Berechnung der Positionen
        const total = anz * price;
        const mwstForPos =  total - (total / (100 + mwst) * 100);

        //info Füllen der Total Spalte
        document.getElementById(`${idTags[4]}${i}`).value = `${total.toFixed(2)}€`;

        sumTotal += total;
        mwst7Total += mwst === 7 ? mwstForPos : 0;
        mwst19Total += mwst === 19 ? mwstForPos : 0;
    }

    //info Ausgabe der berechneten Werte in den Summenfeldern
    document.getElementById('resultTotal').textContent = `${sumTotal.toFixed(2)}€`;
    document.getElementById('result7').textContent = `${mwst7Total.toFixed(2)}€`;
    document.getElementById('result19').textContent = `${mwst19Total.toFixed(2)}€`;
});

addLine(j);
