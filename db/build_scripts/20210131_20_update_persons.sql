/* move the halloffamers to the persons table */
SELECT dthof, idphotohof, ftbiography from persons where idperson in (select idperson from halloffamers);

UPDATE persons
INNER JOIN halloffamers ON persons.idperson = halloffamers.idperson
SET persons.dthof = halloffamers.dthof, persons.idphotohof = halloffamers.idphoto, persons.ftbiography = halloffamers.biography
WHERE halloffamers.idperson = persons.idperson;

select dthof, idphotohof, ftbiography from persons where idperson in (select idperson from halloffamers);