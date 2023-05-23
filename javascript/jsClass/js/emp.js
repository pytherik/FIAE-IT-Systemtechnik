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

mas.forEach((ma) => {
  outDiv.innerHTML += `<h3>Mitarbeiter: ${ma.lastName}, ${ma.firstName}</h3>`;
  outDiv.innerHTML += `<p>Seit  ${ma.employedSince()} Jahren fleissig am schuften.</p>`;
})
