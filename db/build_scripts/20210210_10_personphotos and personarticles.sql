start transaction;
select created_at, updated_at from personarticles;

update personarticles set created_at = updated_at ;
update personarticles set updated_at = NULL ;
select created_at, updated_at from personarticles;


select created_at, updated_at from personphotos;
update personphotos set created_at = updated_at ;
update personphotos set updated_at = NULL ;
select created_at, updated_at from personphotos;
commit;