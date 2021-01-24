The file named '10 - production database.sql' is the copy from production. In order to prepare the database for the new structure we need to run the following scripts in succession. 


| Date | Nr | Title  | Description |
| 000000 | 01 | Production Database | A backup of the production database made on 2021-01-23. this is the base on which all conversions scripts will be added in the order as described |
| 20210123| 01 | update tables | a few constraints on tables will fail if we alter the tables, so we need to fix those before we can run the next script. |
| 20210123| 02 | alter tables | a script to rename some of the fields to a better name |
