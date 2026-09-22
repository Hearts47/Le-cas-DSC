select  libgrade, count(*) from pompier, grade
where pompier.idgrade = grade.idgrade
group by pompier.idgrade
having count(*) > 1
order by count(*) desc;
