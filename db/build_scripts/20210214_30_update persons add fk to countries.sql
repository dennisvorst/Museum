start transaction;
select cdcountry from persons where cdcountry is not null;

update persons set cdcountry = "NLD" where cdcountry = "NL";
update persons set cdcountry = "BEL" where cdcountry = "B";
update persons set cdcountry = "CZE" where cdcountry = "CZ";
update persons set cdcountry = "VEN" where cdcountry = "VE";

select cdcountry from persons where cdcountry is not null;

commit;

start transaction;
ALTER TABLE persons
  ADD CONSTRAINT country_persons_1 FOREIGN KEY (cdcountry) REFERENCES countries (cdcountry);
commit