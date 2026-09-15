select nomcaserne from caserne, affectation, pompier
where pompier.matricule = 986995
and pompier.matricule = affectation.matricule
and affectation.idcaserne = caserne.idcaserne
order by affectation.date desc
limit 1;