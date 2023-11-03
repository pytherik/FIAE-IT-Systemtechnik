/*
* Author: Christoph Böttger
* Date: 21.04.2022
* Modified by: Erik Berndt
* Date: 02.11.2023
*/

let heute = new Date();
if (config.monat === 0) config.monat = heute.getMonth() + 1;
if (config.jahr === 0) config.jahr = heute.getFullYear();
config.arbeitBeginn = new Array(31).fill(twoDigits(config.stundeBeginn) + ':' + twoDigits(config.minuteBeginn) + ' Uhr');
config.arbeitEnde = new Array(31).fill(twoDigits(config.stundeEnde) + ':' + twoDigits(config.minuteEnde) + ' Uhr');
const startDate = new Date(0, 0, 0, config.stundeBeginn, config.minuteBeginn, 0);
const endDate = new Date(0, 0, 0, config.stundeEnde, config.minuteEnde, 0);
const diff = endDate.getTime() - startDate.getTime();
config.diffStunden = new Array(31).fill(Number(diff / 3600000).toString());


function generateInputElements(id, numberOfInputs) {
  const container = document.getElementById(id);
  let html = '';
  for (let i = 0; i < 31; i++) {
    if (i < numberOfInputs) {
      html += '<input type="text">';
    } else {
      html += '<input type="text" disabled>';
    }
  }
  container.innerHTML = html;
}

function fillInputElements(
    id,
    numberOfInputs,
    defaultValue,
    arrayWeekend,
    arrayHoliday
) {
  const inputFelder = document.getElementById(id).childNodes;
  let day = 1;
  for (let i = 0; i < 31; i++) {
    if (i < numberOfInputs) {
      inputFelder[i].disabled = false;
      if (arrayWeekend.includes(day)) {
        if (id === "bemerkung") {
          inputFelder[i].value = "Wochenende";
        } else {
          inputFelder[i].className = "gray";
          inputFelder[i].value = "---";
        }
      } else if (arrayHoliday.includes(day)) {
        if (id === "bemerkung") {
          inputFelder[i].value = "Feiertag";
        } else {
          inputFelder[i].className = "gray";
          inputFelder[i].value = "---";
        }
      } else {
        inputFelder[i].value = defaultValue[i];
        inputFelder[i].removeAttribute("class");
      }
      day++;
    } else {
      // alle anderen Felder im Monat zurücksetzen
      inputFelder[i].value = '';
      inputFelder[i].disabled = true;
      inputFelder[i].removeAttribute("class");
    }
  }
}

function twoDigits(n) {
  return n.toLocaleString('de-DE', {
    minimumIntegerDigits: 2,
    useGrouping: false
  })
}

function endOfMonth(month, year) {
  if (month === 12) {
    year += 1;
    month = 0;
  }
  // Date expects month range 0-11
  // our endOfMonth function uses range 1-12 -> month+1
  // we set Date to next month (month+1), and go one day backwards (date=0) to last day of previous month
  const d = new Date(year, month, 0);
  return d.getDate();
}

function weekendDays(month, year) {
  let date = new Date(year, month - 1);
  let wd = [];
  const lastDay = endOfMonth(month, year);
  for (let i = 0; i < lastDay; i++) {
    date.setDate(i + 1);
    if (date.getDay() === 6 || date.getDay() === 0) {
      wd.push(date.getDate());
    }
  }
  return wd;
}

function nextMonth() {
  // Monat um 1 erhöhen
  saveMonth();
  if (config.monat < 12) {
    config.monat += 1;
  } else {
    config.monat = 1;
    config.jahr += 1;
  }
  updateInputs();
}

function prevMonth() {
  // Monat um 1 verringern
  saveMonth();
  if (config.monat > 1) {
    config.monat -= 1;
  } else {
    config.monat = 12;
    config.jahr -= 1;
  }
  updateInputs();
}

function updateInputs() {
  const { zeitraum, tageMonat, wochenenden, feiertage, monthData } = provideConfiguration();

  const arbeitBeginn = monthData ? monthData.arbeitsbeginn : config.arbeitBeginn;
  const arbeitEnde = monthData ? monthData.arbeitsende : config.arbeitEnde;
  const diffStunden = monthData ? monthData.zeitstunden : config.diffStunden;
  const bemerkung = monthData ? monthData.bemerkung : new Array(31).fill('');

  // Werte der Inputs ändern
  document.getElementById("zeitraum").value = zeitraum;
  fillInputElements("arbeitsbeginn", tageMonat, arbeitBeginn, wochenenden, feiertage);
  fillInputElements("arbeitsende", tageMonat, arbeitEnde, wochenenden, feiertage);
  fillInputElements("zeitstunden", tageMonat, diffStunden, wochenenden, feiertage);
  fillInputElements("bemerkung", tageMonat, bemerkung, wochenenden, feiertage);
}

// Inputs erstellen
createInputs()

function createInputs() {
  const { zeitraum, tageMonat, wochenenden, feiertage, monthData } = provideConfiguration();

  const arbeitBeginn = monthData ? monthData.arbeitsbeginn : config.arbeitBeginn;
  const arbeitEnde = monthData ? monthData.arbeitsende : config.arbeitEnde;
  const diffStunden = monthData ? monthData.zeitstunden : config.diffStunden;
  const bemerkung = monthData ? monthData.bemerkung : new Array(31).fill('');

  // Werte in die 4 Kopffelder eintragen
  document.getElementById("teilnehmer").value = config.teilnehmer;
  document.getElementById("kunden-nr").value = config.kundenNr;
  document.getElementById("praktikumsstelle").value = config.firma;
  document.getElementById("zeitraum").value = zeitraum;

  generateInputElements("arbeitsbeginn", tageMonat);
  fillInputElements("arbeitsbeginn", tageMonat, arbeitBeginn, wochenenden, feiertage);

  generateInputElements("arbeitsende", tageMonat);
  fillInputElements("arbeitsende", tageMonat, arbeitEnde, wochenenden, feiertage);

  generateInputElements("zeitstunden", tageMonat);
  fillInputElements("zeitstunden", tageMonat, diffStunden, wochenenden, feiertage);

  generateInputElements("bemerkung", tageMonat);
  fillInputElements("bemerkung", tageMonat, bemerkung, wochenenden, feiertage);
}

function provideConfiguration() {
  const monatId = config.monat.toString() + config.jahr.toString();
  const zeitraum = twoDigits(config.monat) + ' / ' + config.jahr.toString();
  const tageMonat = endOfMonth(config.monat, config.jahr);
  const wochenenden = weekendDays(config.monat, config.jahr);
  const feiertage = beweglicheFeiertage(config.monat, config.jahr)
      .concat(unbeweglicheFeiertage(config.monat, config.bundesland));

  const monthData = JSON.parse(localStorage.getItem(monatId));
  return { zeitraum, tageMonat, wochenenden, feiertage, monthData }
}

function saveMonth() {
  const monatId = config.monat.toString() + config.jahr.toString();
  const valuesArbeitsbeginn = getValues(document.getElementById("arbeitsbeginn").childNodes);
  const valuesArbeitsende = getValues(document.getElementById("arbeitsende").childNodes);
  const valuesBemerkung = getValues(document.getElementById("bemerkung").childNodes);
  const valuesZeitstunden = calculateZeitstunden(valuesArbeitsbeginn, valuesArbeitsende)
  const month = {
    arbeitsbeginn: valuesArbeitsbeginn,
    arbeitsende: valuesArbeitsende,
    zeitstunden: valuesZeitstunden,
    bemerkung: valuesBemerkung,
  };
  localStorage.setItem(monatId, JSON.stringify(month));
}

function getValues(inputElements) {
  const result = [];
  inputElements.forEach(inputElement => result.push(inputElement.value));
  return result;
}

function calculateZeitstunden(valuesArbeitsbeginn, valuesArbeitsende) {
  const result = [];
  valuesArbeitsende.forEach((val, idx) => {
    if (val !== "---" && val !== "") {
      const timeArrArbeitsende = val.split(" ")[0].split(":");
      const timeArrArbeitsbeginn = valuesArbeitsbeginn[idx].split(" ")[0].split(":");
      const arbeitszeitInMinuten =
          (+timeArrArbeitsende[0] * 60 + +timeArrArbeitsende[1]) -
          (+timeArrArbeitsbeginn[0] * 60 + +timeArrArbeitsbeginn[1]);
      result.push(`${(arbeitszeitInMinuten / 60).toFixed(2)}`);
    } else {
      result.push(val);
    }
  })
  return result;
}