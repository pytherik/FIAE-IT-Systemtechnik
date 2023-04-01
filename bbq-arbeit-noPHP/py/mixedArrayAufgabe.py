employeeSalesVolumes = [
  [['Freya', 'Norse', {'Umsatz' : 36123}], ['Niels', 'Johanson', {'Umsatz' : 23667}]],
  [['Chantal', 'Chani', {'Umsatz' : 54321}], ['Petrow', 'Pankow', {'Umsatz' : 45454}]],
  [['Pietra', 'Pasolini', {'Umsatz' : 111222}], ['Toni', 'Mahoni', {'Umsatz' : 78222}]],
  [['Harrison', 'Smith', {'Umsatz' : 33333}], ['Cathrin', 'Laghrey', {'Umsatz' : 23232}]]
]

gesamt = 0
for empGroup in employeeSalesVolumes:
  for employees in empGroup:
    print(f"Vorname: {employees[0]}\nNachname: {employees[1]}\n{employees[2]['Umsatz']}\n\n")
    gesamt += employees[2]['Umsatz']
print (f"Gesamtumsatz: {gesamt}")
input()
