# Museum
Website for the Dutch base- and softballmuseum.

## 3rd Party website 

| Name | Source | Target |
|-|-|-|
| Mobile_Detect.php | http://mobiledetect.net/ | src\3rd\class |
| Font Awesome | https://fontawesome.com/ | src\3rd\css and src\3rd\fonts |
| Bootstrap | https://getbootstrap.com/ | HEAD tag of the index.php |

## 3rd Party development

| Name | Source | Command line | 
|-|-|-|
| XXAMP | https://www.apachefriends.org/index.html | |
| Composer | https://getcomposer.org/ | |
| phpunit | https://phpunit.de/ | composer require-dev phpunit/phpunit |
| PHINX | | https://phinx.org/ | composer require robmorgan/phinx |

## Shopping list (todo)

* Figure out how to properly migrate and seed the database 
* change the email adres of the site into info@honkbalmuseum.nl
* anonimify the usersseeder 
* anonimify the personsseeder
* Can all plural classes be moved to collections in their representative classes
* alter stat and stats classes in functional specific statclasses 
* find the missing fotos

## Release info
| Date | Description |
|-|-|
| 22 march 2019 | Initial commit |
| 22 march 2019 | Added migration using phinx |
| 23 march 2019 | Added seeding using phinx |
| 23 march 2019 | Added missing photo records |
| 24 march 2019 | Deleted artisteer references |
| 24 march 2019 | Changed database columns |
| 25 march 2019 | First tests added using PHPunit |
| 27 march 2019 | Tests added for all classes using PHPunit |
| 27 march 2019 | Renamed changed_by into updated_by |
| 31 march 2019 | Added the getPhotoCollection method and tests |
| 05 april 2019 | Renamed the Photos, removed the leading zeros |
| 12 april 2019 | Changed the look and feel of the search field |