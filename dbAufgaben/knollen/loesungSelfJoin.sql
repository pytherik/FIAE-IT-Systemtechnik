SELECT v.vorname 'Chef Vorname', v.nachname 'Chef Nachname', m.vorname 'MA Vorname', m.nachname 'MA Nachname'
FROM mitarbeiter m
         JOIN mitarbeiter v
WHERE m.vorgesetzterId = v.id;