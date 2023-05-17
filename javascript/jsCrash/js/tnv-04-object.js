'use strict';

//info Objects sind assoziative Arrays

const companion = {
  name: 'Erik B',
  location: 'Berlin Steglitz',
  foundedIn: 1970,
  // fullName: function () {
  //   return `${this.name}erndt`;
  // }
  fullName: function () {
    return `${this.name}erndt`;
  },

  fullName2 () {return `${this.name}erndt`;} //info Method Shorthand Syntax
}

//info Properties abfragen, abrufen
console.log(companion.location);
console.log(companion['name']);
const propertyName = 'name';
console.log(companion[propertyName]);
console.log(companion.fullName());
console.log(companion.fullName2());

//info Properties hinzufügen
companion.country = 'Germany';

companion.action = () =>
{
  return `ahja`;
}

console.log(companion.action());


