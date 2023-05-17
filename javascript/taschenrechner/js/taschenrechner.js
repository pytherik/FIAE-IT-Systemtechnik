const zahl1 = document.getElementById('zahl1');
const zahl2 = document.getElementById('zahl2');
const output = document.getElementById('output');
const operator = document.querySelectorAll('.operator');

const calc = (op) => {
  const clc = {
    z1: Number(zahl1.value),
    z2: Number(zahl2.value),
    add() {return `${this.z1 + this.z2}`;},
    sub() {return `${this.z1 - this.z2}`;},
    mul() {return `${this.z1 * this.z2}`;},
    div() {return `${(this.z1 / this.z2).toFixed(3)}`;},
    mod() {return `${(this.z1 % this.z2).toFixed(3)}`;},
  }
  switch(op) {
    case '+': output.innerHTML = clc.add();
      break;
    case '-': output.innerHTML = clc.sub();
      break;
    case '*': output.innerHTML = clc.mul();
      break;
    case '/': output.innerHTML = clc.div();
      break;
    case '%': output.innerHTML = clc.mod();
      break;
  }
}

// operator.forEach((op) => {
//   op.addEventListener('click', () => {
//     calc(op.innerHTML);
//   })
// });



// const calc = (op) => {
//   let z1 = Number(zahl1.value);
//   let z2 = Number(zahl2.value);
//
//   switch (op) {
//     case 'add':
//       output.innerHTML = `${z1 + z2}`;
//       break;
//     case 'sub':
//       output.innerHTML = `${z1 - z2}`;
//       break;
//     case 'mul':
//       output.innerHTML = `${z1 * z2}`;
//       break;
//     case 'div':
//       output.innerHTML = `${(z1 / z2).toFixed(3)}`;
//       break;
//     case 'mod':
//       output.innerHTML = `${(z1 % z2).toFixed(3)}`;
//       break;
//     default:
//       output.innerHTML = '0000';
//   }
// }