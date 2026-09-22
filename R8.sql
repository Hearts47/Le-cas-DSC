select count(*)
from pompier, exercer
where pompier.nompompier = 'Balle'
and pompier.prenompompier = 'Jean'
and pompier.matricule = exercer.matricule;