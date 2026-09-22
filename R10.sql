select prenompompier, nompompier, count(*)
from pompier, exercer
where pompier.matricule = exercer.matricule
group by exercer.matricule
order by COUNT(*) desc  
limit 1;