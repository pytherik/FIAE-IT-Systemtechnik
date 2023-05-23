'use strict';
const outDiv = document.getElementById('id1');

class Emp {
  constructor(firstName, lastName, employmentDate) {
    this.firstName = firstName;
    this.lastName = lastName;
    this.employmentDate = employmentDate;
  }

  employedSince() {
    const date = new Date();
    return date.getFullYear() - this.employmentDate;
  }
}

const mas = [
  new Emp('Hansi', 'Pampel', 1999),
  new Emp('Eugen', 'Sauter', 2019),
  new Emp('Nanette', 'Lichtenberg', 1879)
]

//info JSON Object with array of objects
const mitarbeiterJson = '{"mitarbeiter" : ' +
  '[ {"firstName": "Hansi", "lastName": "Pampel", "employmentDate": 1999},' +
    '{"firstName": "Eugen", "lastName": "Sauter", "employmentDate": 2019},' +
    '{"firstName": "Nanette", "lastName": "Lichtenberg", "employmentDate": 1879}]}';

//info nur Array mit JSON Objekten
const mitarbeiterJson2 = '[{"firstName": "Hansi", "lastName": "Pampel", "employmentDate": 1999},' +
    '{"firstName": "Eugen", "lastName": "Sauter", "employmentDate": 2019},' +
    '{"firstName": "Nanette", "lastName": "Lichtenberg", "employmentDate": 1879}]';

const mitarbeiter = JSON.parse(mitarbeiterJson2);
console.log('Array mit Json objects: ', mitarbeiter);

const mitarbeiter2 = JSON.parse(mitarbeiterJson);
console.log('Json object with array of objects', mitarbeiter2);
console.log(mitarbeiterJson);

const alleMitarbeiter = [];
  mitarbeiter2.mitarbeiter.forEach((ma, i) => {
  alleMitarbeiter.push(new Emp(ma.firstName, ma.lastName, ma.employmentDate));
})

console.log(mitarbeiter2.mitarbeiter[0].firstName)
// console.log(masJson);
alleMitarbeiter.forEach((ma) => {
  outDiv.innerHTML += `<h3>Mitarbeiter: ${ma.lastName}, ${ma.firstName}</h3>`;
  outDiv.innerHTML += `<p>Seit  ${ma.employedSince()} Jahren fleissig am schuften.</p>`;
})
