select libhabilitation from pompier, exercer, habilitation
where pompier.nompompier = 'Balle'
and pompier.prenompompier = 'Jean'
and pompier.matricule = exercer.matricule
and exercer.idhabilitation = habilitation.idhabilitation;