const id1 = document.getElementById('id1');
const entstehung = document.getElementById('entstehung');
const zahl1 = document.getElementById('zahl1');
const zahl2 = document.getElementById('zahl2');
const ergebnis = document.getElementById('ergebnis');

//info auf den Text zwischen Anfangs- und Endtag greift innerHTML zu
id1.innerHTML = 'Hedda';
let text1 = '<h2>Hier entstehen billige Wohnungen</h2>';
let text2 = '<h1>Alles Lüge</h1>';
entstehung.innerHTML = text1;
entstehung.setAttribute('style', 'color: green');

entstehung.addEventListener('click', (e) => {
  if (entstehung.innerHTML === text1) {
    entstehung.innerHTML = text2;
    entstehung.setAttribute('style', 'color: red');
  } else {
  entstehung.innerHTML = text1;
  entstehung.setAttribute('style', 'color: green');
}
})
//info auf input-tags greift value zu
zahl1.value = 'hier steht der Wert drin';

console.log(zahl2.value);

//info um eine Rechenoperation mit den Strings statt einer Konkatenation
// durchzuführen muss der ankommende Wert gecastet werden
let zahl = Number(zahl2.value);
console.log(ergebnis.value = zahl + zahl);

//info bisher werden Aktionen direkt ausgeführt. Meistens soll ein User
// etwas eingebun und danach soll etwas augeführt werden. Dies geschieht
// mit Events, die Funktionen aufrufen(siehe Button auf index)

const tuwas = () => {
  console.log('autsch, ich bin geklickt!!!');
}