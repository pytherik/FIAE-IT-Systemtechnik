'use strict';
class Car {
  constructor(name, baujahr) {
    this.name = name;
    this.baujahr = baujahr;
  }
   getAlter() {
    const date = new Date();
    return date.getFullYear() - this.baujahr;
  }
}

const auto1 = new Car('Fiat', 2003);

document.getElementById('id1').innerHTML = `Ich fahre einen ${auto1.name}.<br> Es ist ${auto1.getAlter()} Jahre alt.`;