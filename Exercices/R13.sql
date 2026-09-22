select libnaturesinistre, count(*) from naturesinistre, typeengin, prevoir
where naturesinistre.idnaturesinistre = prevoir.idnaturesinistre
group by naturesinistre.idnaturesinistre, naturesinistre.libnaturesinistre
order by count(*) desc;