select count(distinct(matvolontaire)) from volontaire, employeur
where employeur.idemployeur=4
and volontaire.idemployeur = employeur.idemployeur;


ou : 


select count(*)
from volontaire
where idemployeur = 4;



