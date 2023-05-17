'use strict';
// 1. number (= double)
let a = 3;
const pi = 3.1415; // möglichst viel mit const arbeiten
let b = 4;
console.log(`Das Ergebnis von ${a} + ${b} ist ${a +b}`);
// 2. string
let d = 'erik';
// 3. boolean
let c = false;

// 4. undefined
let e = undefined;

// 5. null
let f = null;
console.log(`a ist vom Typ ${typeof (a)}, `);
console.log(`b ist vom Typ ${typeof(b/0)}, `);
console.log(`c ist vom Typ ${typeof(c)}, `);
console.log(`d ist vom Typ ${typeof(d)}, `);
console.log(`e ist vom Typ ${typeof(e)}, `);
console.log(`f ist vom Typ ${typeof(f)}, `);
console.log(`g ist vom Typ ${typeof(NaN)}, `);

// Wertetypen (Stack)   : number, bolean, undefined, null
// Referenztypen (Heap) : string
let h = 'Hallo Welt!';       // h und i sind in Java nicht gleich
let i = 'Hallo ' + 'Welt!';  // in javaScript aber schon
let j = h;
if (h === i){
  console.log("h=i=true")
} else {
  console.log("h=i=false")
}
let res = (j === h) ? "j=h=true" : "j=h=fales";
console.log(res);

console.log(0 == '0'); // wird true weil 0 mit toString gecastet wird
console.log(0 === '0'); // wird false weil auch auf Typ geprüft wird
console.log(0 == ''); // wird true weit '' boolean = false = 0 ist
console.log(0 === ''); // wird false weil auch auf Typ geprüft wird

// Typsichere Vergleichsoperatoren sind === und !==
// javaScript hat wie php auch einen strict mode

