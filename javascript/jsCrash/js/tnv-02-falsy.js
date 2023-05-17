'use strict';

let x = false;

/*info
   falsy values:
    - false
     - 0
     - ''
     - undefined
     - null
 */

if (x) {
  console.log('läuft nicht');
}

let a = 23;
let b = undefined;

let resultOr = a || b; //info: => 23 obwohl a = true wird result nicht true sondern hat Wert a
                       // nach dem erste true Wert wird abgebrochen
let resultAnd = a && b; //info: => 42 es wird immer der Wert der letzten Abfrage übernommen

console.log(resultOr);
console.log(resultAnd);