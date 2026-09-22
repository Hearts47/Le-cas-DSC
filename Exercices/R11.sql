select  libgrade, count(*) from pompier, grade
where pompier.idgrade = grade.idgrade
group by pompier.idgrade
order by count(*) desc;