select libnaturesinistre, count(*) from naturesinistre, typeengin, prevoir
where naturesinistre.idnaturesinistre = prevoir.idnaturesinistre
and typeengin.idtypeengin = prevoir.idtypeengin
group by naturesinistre.idnaturesinistre, naturesinistre.libnaturesinistre;