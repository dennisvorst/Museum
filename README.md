# Museum
Website for the Dutch base- and softballmuseum.

## 3rd Party website 

| Name | Source | Target |
| Mobile_Detect.php | http://mobiledetect.net/ | src\3rd\class |
| Font Awesome | https://fontawesome.com/ | src\3rd\css and src\3rd\fonts |
| Bootstrap | https://getbootstrap.com/ | HEAD tag of the index.php |

## 3rd Party development

| Name | Source | Command line | 
| XXAMP | https://www.apachefriends.org/index.html | |
| Composer | https://getcomposer.org/ | |
| phpunit | https://phinx.org/ | composer require-dev phpunit/phpunit |
| PHINX | | robmorgan/phinx | composer require robmorgan/phinx |

## Shopping list (todo)

* Figure out how to properly migrate and seed the database 
* anonimify the player data
* get rid of artisteer references 
* create tests for existing classes
* delete email class and test after creating first actual test.

## Release info
| Date | Description |
|-|-|
| 22 march 2019 | Initial commit |
| 22 march 2019 | Added migration using phinx |