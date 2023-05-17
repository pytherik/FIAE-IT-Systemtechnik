'use strict';

// Function Statement
const sum = add(23, 42);

console.log(sum);

function add(left, right) {
  return left + right;
}

//info javaSript scannt das file vor der Ausführung des Codes,
// deswegen kann der Aufruf einer Funktion auch vor deren Definiton stehen

//info 'use strict'; muss nur einmal pro File angegeben werden.

// Function expression
//info hier muss der Aufruf nach der Definition stehen
// console.log(add2(10, 20)); funktioniert nicht weil nur function statements
// beim Filescan berücksichtigt werden

const add2 = (left, right) => {
  return left + right;
  // return left + (right || 0); //info würde undefined durch 0 ersetzen, da undefined false ist
}

console.log(add2(10, 20));     //info wenn man mehr oder weniger Argumente übergibt als
console.log(add2(10, 20, 23)); //info Parameter vorhanden sind: 23 wird ignoriert,
console.log(add2(10));         //info resultiert in NaN

// Variable Anzahl Parameter

const add3 = (left, right, ...weitere) => {
  let lr = left + right;
  let alles = 0;
  for (let i = 0; i < weitere.length ; i++) {
    alles += weitere[i];
  }
  return `left + right = ${lr}, alles andere = ${alles}, alles zusammen = ${lr + alles}`;
}

console.log(add3(2,3,4,5,6,7));

//info ...weitere ist ein Array (rest-operator)
const add4 = (left, right, ...weitere) => {
  let lr = left + right;
  let alles = 0;
  weitere.forEach((val) => {
    alles += val;
  });
  return `left + right = ${lr}, alles andere = ${alles}, alles zusammen = ${lr + alles}`;
}

console.log(add4(3,4,5,6,7,8));

