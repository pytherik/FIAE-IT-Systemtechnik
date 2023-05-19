const names = [
  {first: 'Wiesje', last: 'Kolberg'},
  {first: 'Philippa', last: 'Rosendahl'},
  {first: 'Neah', last: 'Steck'},
  {first: 'Kimo', last: 'Seidel'},
  {first: 'Deniz', last: 'Schweiger'},
  {first: 'Zadie', last: 'Schroeder'},
  {first: 'Padma', last: 'Böhmer'},
  {first: 'Corvin', last: 'Schwab'},
  {first: 'Guilaume', last: 'Mack'},
  {first: 'Cuno', last: 'Riemann'}
];

const found = names.find(element => {
  return element.first === 'Kimo';
})

console.log(found);