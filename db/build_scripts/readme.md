The file named '10 - production database.sql' is the copy from production. In order to prepare the database for the new structure we need to run the following scripts in succession. 


| Date | Nr | Title  | Description |
| 00000000 | 00 | NA | A short script with drop database and create database statements. |
| 00000000 | 01 | Production Database | A backup of the production database made on 2021-01-23. this is the base on which all conversions scripts will be added in the order as described |
| 20210123| 10 | update tables | This script renames all the logging columns in every table to DTLASTMUT, NMLASTMUT, DTPREVMUT as well as some mandatory and default values were changed. |
| 20210124| 10 | alter tables | This script renames DTLASTMUT, NMLASTMUT, DTPREVMUT to CREATED_AT, CREATED_BY and UPDATED_AT.  |
| 20210131| 10 | alter table persons | Prepare the persons table for the halloffamers content |
| 20210131| 20 | update persons | Moving the halloffamers content to the persons table |
| 20210131| 30 | drop halloffamers | Deleting the halloffamers table |

