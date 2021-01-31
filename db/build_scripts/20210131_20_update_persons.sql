/* move the halloffamers to the persons table */
SELECT is_hof, idphotohof, ftbiography from persons where idperson in (select idperson from halloffamers);

UPDATE persons
INNER JOIN halloffamers ON persons.idperson = halloffamers.idperson
SET persons.is_hof = 1, persons.idphotohof = halloffamers.idphoto, persons.ftbiography = halloffamers.biography
WHERE halloffamers.idperson = persons.idperson;

select is_hof, idphotohof, ftbiography from persons where idperson in (select idperson from halloffamers);