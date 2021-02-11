The file named '10 - production database.sql' is the copy from production. In order to prepare the database for the new structure we need to run the following scripts in succession. 


| Date | Nr | Title  | Description |
| 00000000 | 00 | NA | A short script with drop database and create database statements. |
| 00000000 | 01 | Production Database | A backup of the production database made on 2021-01-23. this is the base on which all conversions scripts will be added in the order as described |
| 20210123 | 10 | update tables | This script renames all the logging columns in every table to DTLASTMUT, NMLASTMUT, DTPREVMUT as well as some mandatory and default values were changed. |
| 20210124 | 10 | alter tables | This script renames DTLASTMUT, NMLASTMUT, DTPREVMUT to CREATED_AT, CREATED_BY and UPDATED_AT.  |
| 20210131 | 10 | alter table persons | Prepare the persons table for the halloffamers content |
| 20210131 | 20 | update persons | Moving the halloffamers content to the persons table |
| 20210131 | 30 | drop halloffamers | Deleting the halloffamers table |
| 20210131 | 40 | update is_featured | Change the is_featured columns from a tinyint 3 to a tinyint(1) |
| 20210206 | 10 | creted_at additional | Adding the created_at, created_by, updated_at elements to the remaining tables.|
| 20210206 | 20 | insert clubretired | The first occupants of the clubretired jerseys table.|
| 20210210 | 10 | personphotos and personarticles | The created_at and the updated_at values where switched. This scripts corrects that.|
| 20210210 | 20 | articles 3550 and 3594 | Before we can add an article constraint we need to fix the failing records.|
| 20210210 | 30 | add additional referential integrity improvement. |