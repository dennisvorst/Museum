ALTER TABLE `articles` CHANGE `cdtype` `cdsport` VARCHAR(5) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Sport'; 

start transaction;

/* cdsport */
select * from articles where cdsport = "" or cdsport = "NULL";

update articles set cdsport = null where cdsport = "" or cdsport = "NULL";

select * from articles where cdsport = "" or cdsport = "NULL";



/* fttitle2 */
select * from articles where fttitle2 = "" or fttitle2 = "NULL";

update articles set fttitle2 = null where fttitle2 = "" or fttitle2 = "NULL";

select * from articles where fttitle2 = "" or fttitle2 = "NULL";


/* fttitle3 */
select * from articles where fttitle3 = "" or fttitle3 = "NULL";

update articles set fttitle3 = null where fttitle3 = "" or fttitle3 = "NULL";

select * from articles where fttitle3 = "" or fttitle3 = "NULL";

commit;
