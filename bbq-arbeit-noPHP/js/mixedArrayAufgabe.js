const employeeSalesVolumes = [
  [['Freya', 'Norse', {'Umsatz' : 36123}], ['Niels', 'Johanson', {'Umsatz' : 23667}]],
  [['Chantal', 'Chani', {'Umsatz' : 54321}], ['Petrow', 'Pankow', {'Umsatz' : 45454}]],
  [['Pietra', 'Pasolini', {'Umsatz' : 111222}], ['Toni', 'Mahoni', {'Umsatz' : 78222}]],
  [['Harrison', 'Smith', {'Umsatz' : 33333}], ['Cathrin', 'Laghrey', {'Umsatz' : 23232}]]
]

let gesamt = 0;
employeeSalesVolumes.forEach((empGroup) => {
  empGroup.forEach((employee) => {
      console.log("Vorname: ",employee[0],"\nNachname: ", employee[1]);
      console.log("Umsatz: ", employee[2]['Umsatz'], "\n");
      gesamt += employee[2]['Umsatz'];
  })  
})

console.log("Gesamt: ", gesamt);