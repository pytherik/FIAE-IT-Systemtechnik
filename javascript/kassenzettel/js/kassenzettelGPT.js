// Elemente für spätere Verwendung als Konstanten definieren
const container = document.querySelector('.container');
const calcButton = document.querySelector('#calc');

const head = ['Name', 'Anzahl', 'Einzelpreis', 'MwSt', 'Total'];
const idTags = ['name', 'anz', 'price', 'mwst', 'total'];

// Erstelle Tabellenüberschriften
function createTableHeadings() {
  head.forEach((tableHead, i) => {
    const column = document.createElement('div');
    column.id = `col${i}`;
    column.className = 'column';

    const inputContainer = document.createElement('div');
    inputContainer.className = 'input-container';

    const tableHeadElement = document.createElement('span');
    tableHeadElement.className = 'table-head';
    tableHeadElement.textContent = tableHead;

    inputContainer.appendChild(tableHeadElement);
    column.appendChild(inputContainer);

    if (tableHead === 'MwSt') {
      for (let j = 0; j < 4; j++) {
        const radioContainer = document.createElement('div');
        radioContainer.className = 'radio-container';

        const radio1 = document.createElement('input');
        radio1.type = 'radio';
        radio1.name = `mwst${j}`;
        radio1.id = `mwst${j}1`;
        radio1.value = '7';

        const label1 = document.createElement('label');
        label1.htmlFor = `mwst${j}1`;
        label1.textContent = '7%';

        const radio2 = document.createElement('input');
        radio2.type = 'radio';
        radio2.name = `mwst${j}`;
        radio2.id = `mwst${j}2`;
        radio2.value = '19';
        radio2.checked = true;

        const label2 = document.createElement('label');
        label2.htmlFor = `mwst${j}2`;
        label2.textContent = '19%';

        radioContainer.appendChild(radio1);
        radioContainer.appendChild(label1);
        radioContainer.appendChild(radio2);
        radioContainer.appendChild(label2);

        column.appendChild(radioContainer);
      }
    } else {
      let ability = '';
      let align = '';
      let size = 10;

      if (tableHead === 'Total') {
        ability = 'disabled';
      }
      if (tableHead === 'Name') {
        align = 'left';
        size = 18;
      }

      for (let j = 0; j < 4; j++) {
        const inputContainer = document.createElement('div');
        inputContainer.className = 'input-container';

        const input = document.createElement('input');
        input.type = 'text';
        input.id = `${idTags[i]}${j}`;
        input.style.textAlign = align;
        input.size = size;
        input.disabled = ability;

        inputContainer.appendChild(input);
        column.appendChild(inputContainer);
      }
    }

    container.appendChild(column);
  });
}

// Berechne die Summen
function calculateTotals() {
  let sumTotal = 0;
  let mwst7Total = 0;
  let mwst19Total = 0;
  let totalsArr = [];
  for (let i = 0; i < 4; i++) {
    const anz = Number(document.getElementById(`${idTags[1]}${i}`).value);
    const price = Number(document.getElementById(`${idTags[2]}${i}`).value);
    const mwst = Number(
      document.querySelector(`input[name="mwst${i}"]:checked`).value
    );

    const total = anz * price;
    const mwstForPos = total * mwst / 100;

    document.getElementById(`${idTags[4]}${i}`).value = `${total.toFixed(2)}€`;

    if (mwst === 7) {
      totalsArr.push({ total, mwst7: mwstForPos, mwst19: 0 });
    } else {
      totalsArr.push({ total, mwst7: 0, mwst19: mwstForPos });
    }

    sumTotal += total;
    mwst7Total += mwst === 7 ? mwstForPos : 0;
    mwst19Total += mwst === 19 ? mwstForPos : 0;
  }

  document.getElementById('resultTotal').innerHTML = `${sumTotal.toFixed(2)}€`;
  document.getElementById('result7').innerHTML = `${mwst7Total.toFixed(2)}€`;
  document.getElementById('result19').innerHTML = `${mwst19Total.toFixed(2)}€`;
}

// Event: Button wird geklickt
calcButton.addEventListener('click', calculateTotals);

// Erstelle die Tabelle
createTableHeadings();
