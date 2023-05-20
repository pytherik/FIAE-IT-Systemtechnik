//info Elemente für spätere Verwendung als Konstanten definieren
const container = document.querySelector('.container');
const calcButton = document.querySelector('#calc');

const head = ['Name', 'Anzahl', 'Einzelpreis', 'MwSt', 'Total'];
const idTags = ['name', 'anz', 'price', 'mwst', 'total'];

//info Erstelle Tabellenüberschriften
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
      let isDisabled = false;
      let align = '';
      let size = 10;

      if (tableHead === 'Total') {
        isDisabled = true;
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
        input.disabled = isDisabled;

        inputContainer.appendChild(input);
        column.appendChild(inputContainer);
      }
    }

    container.appendChild(column);
  });
}

//info Berechne die Summen
function calculateTotals() {
  let sumTotal = 0;
  let mwst7Total = 0;
  let mwst19Total = 0;


  for (let i = 0; i < 4; i++) {
    const anz = Number(document.getElementById(`${idTags[1]}${i}`).value);
    const price = Number(document.getElementById(`${idTags[2]}${i}`).value);
    const mwst = Number(
      document.querySelector(`input[name="mwst${i}"]:checked`).value
    );

    const total = anz * price;
    const mwstForPos = total * mwst / 100;

    document.getElementById(`${idTags[4]}${i}`).value = `${total.toFixed(2)}€`;

    sumTotal += total;
    mwst7Total += mwst === 7 ? mwstForPos : 0;
    mwst19Total += mwst === 19 ? mwstForPos : 0;
  }

  document.getElementById('resultTotal').innerHTML = `${sumTotal.toFixed(2)}€`;
  document.getElementById('result7').innerHTML = `${mwst7Total.toFixed(2)}€`;
  document.getElementById('result19').innerHTML = `${mwst19Total.toFixed(2)}€`;
}

//info Event: Button wird geklickt
calcButton.addEventListener('click', calculateTotals);

//info Erstelle die Tabelle
createTableHeadings();
