-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 14 feb 2021 om 08:01
-- Serverversie: 10.4.14-MariaDB
-- PHP-versie: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `museum`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `countries`
--

DROP TABLE IF EXISTS `countries`;
CREATE TABLE `countries` (
  `cdcountry` char(5) NOT NULL,
  `nmcountry` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Insert records
--
INSERT INTO `countries` (`cdcountry`, `nmcountry`) VALUES
('AFG', 'Afghanistan'),
('ALA', 'Åland'),
('ALB', 'Albanië'),
('DZA', 'Algerije'),
('VIR', 'Amerikaanse Maagdeneilanden'),
('ASM', 'Amerikaans-Samoa'),
('AND', 'Andorra'),
('AGO', 'Angola'),
('AIA', 'Anguilla'),
('ATA', 'Antarctica'),
('ATG', 'Antigua en Barbuda'),
('ARG', 'Argentinië'),
('ARM', 'Armenië'),
('ABW', 'Aruba'),
('AUS', 'Australië'),
('AZE', 'Azerbeidzjan'),
('BHS', 'Bahama\'s'),
('BHR', 'Bahrein'),
('BGD', 'Bangladesh'),
('BRB', 'Barbados'),
('BEL', 'België'),
('BLZ', 'Belize'),
('BEN', 'Benin'),
('BMU', 'Bermuda'),
('BTN', 'Bhutan'),
('BOL', 'Bolivia'),
('BIH', 'Bosnië en Herzegovina'),
('BWA', 'Botswana'),
('BVT', 'Bouveteiland'),
('BRA', 'Brazilië'),
('VGB', 'Britse Maagdeneilanden'),
('IOT', 'Brits Indische Oceaanterritorium'),
('BRN', 'Brunei'),
('BGR', 'Bulgarije'),
('BFA', 'Burkina Faso'),
('BDI', 'Burundi'),
('KHM', 'Cambodja'),
('CAN', 'Canada'),
('BES', 'Caribisch Nederland'),
('CAF', 'Centraal-Afrikaanse Republiek'),
('CHL', 'Chili'),
('CHN', 'China'),
('CXR', 'Christmaseiland'),
('CCK', 'Cocoseilanden'),
('COL', 'Colombia'),
('COM', 'Comoren'),
('COG', 'Congo-Brazzaville'),
('COD', 'Congo-Kinshasa'),
('COK', 'Cookeilanden'),
('CRI', 'Costa Rica'),
('CUB', 'Cuba'),
('CUW', 'Curaçao'),
('CYP', 'Cyprus'),
('DNK', 'Denemarken'),
('DJI', 'Djibouti'),
('DMA', 'Dominica'),
('DOM', 'Dominicaanse Republiek'),
('DEU', 'Duitsland'),
('ECU', 'Ecuador'),
('EGY', 'Egypte'),
('SLV', 'El Salvador'),
('GNQ', 'Equatoriaal-Guinea'),
('ERI', 'Eritrea'),
('EST', 'Estland'),
('ETH', 'Ethiopië'),
('FRO', 'Faeröer'),
('FLK', 'Falklandeilanden'),
('FJI', 'Fiji'),
('PHL', 'Filipijnen'),
('FIN', 'Finland'),
('FRA', 'Frankrijk'),
('ATF', 'Franse Zuidelijke en Antarctische Gebieden'),
('GUF', 'Frans-Guyana'),
('PYF', 'Frans-Polynesië'),
('GAB', 'Gabon'),
('GMB', 'Gambia'),
('GEO', 'Georgië'),
('GHA', 'Ghana'),
('GIB', 'Gibraltar'),
('GRD', 'Grenada'),
('GRC', 'Griekenland'),
('GRL', 'Groenland'),
('GLP', 'Guadeloupe'),
('GUM', 'Guam'),
('GTM', 'Guatemala'),
('GGY', 'Guernsey'),
('GIN', 'Guinee'),
('GNB', 'Guinee-Bissau'),
('GUY', 'Guyana'),
('HTI', 'Haïti'),
('HMD', 'Heard en McDonaldeilanden'),
('HND', 'Honduras'),
('HUN', 'Hongarije'),
('HKG', 'Hongkong'),
('IRL', 'Ierland'),
('ISL', 'IJsland'),
('IND', 'India'),
('IDN', 'Indonesië'),
('IRQ', 'Irak'),
('IRN', 'Iran'),
('ISR', 'Israël'),
('ITA', 'Italië'),
('CIV', 'Ivoorkust'),
('JAM', 'Jamaica'),
('JPN', 'Japan'),
('YEM', 'Jemen'),
('JEY', 'Jersey'),
('JOR', 'Jordanië'),
('CYM', 'Kaaimaneilanden'),
('CPV', 'Kaapverdië'),
('CMR', 'Kameroen'),
('KAZ', 'Kazachstan'),
('KEN', 'Kenia'),
('KGZ', 'Kirgizië'),
('KIR', 'Kiribati'),
('UMI', 'Kleine afgelegen eilanden van de Verenigde Staten'),
('KWT', 'Koeweit'),
('HRV', 'Kroatië'),
('LAO', 'Laos'),
('LSO', 'Lesotho'),
('LVA', 'Letland'),
('LBN', 'Libanon'),
('LBR', 'Liberia'),
('LBY', 'Libië'),
('LIE', 'Liechtenstein'),
('LTU', 'Litouwen'),
('LUX', 'Luxemburg'),
('MAC', 'Macau'),
('MDG', 'Madagaskar'),
('MWI', 'Malawi'),
('MDV', 'Maldiven'),
('MYS', 'Maleisië'),
('MLI', 'Mali'),
('MLT', 'Malta'),
('IMN', 'Man'),
('MAR', 'Marokko'),
('MHL', 'Marshalleilanden'),
('MTQ', 'Martinique'),
('MRT', 'Mauritanië'),
('MUS', 'Mauritius'),
('MYT', 'Mayotte'),
('MEX', 'Mexico'),
('FSM', 'Micronesia'),
('MDA', 'Moldavië'),
('MCO', 'Monaco'),
('MNG', 'Mongolië'),
('MNE', 'Montenegro'),
('MSR', 'Montserrat'),
('MOZ', 'Mozambique'),
('MMR', 'Myanmar'),
('NAM', 'Namibië'),
('NRU', 'Nauru'),
('NLD', 'Nederland'),
('NPL', 'Nepal'),
('NIC', 'Nicaragua'),
('NCL', 'Nieuw-Caledonië'),
('NZL', 'Nieuw-Zeeland'),
('NER', 'Niger'),
('NGA', 'Nigeria'),
('NIU', 'Niue'),
('MNP', 'Noordelijke Marianen'),
('PRK', 'Noord-Korea'),
('MKD', 'Noord-Macedonië'),
('NOR', 'Noorwegen'),
('NFK', 'Norfolk'),
('UGA', 'Oeganda'),
('UKR', 'Oekraïne'),
('UZB', 'Oezbekistan'),
('OMN', 'Oman'),
('AUT', 'Oostenrijk'),
('TLS', 'Oost-Timor'),
('PAK', 'Pakistan'),
('PLW', 'Palau'),
('PSE', 'Palestina'),
('PAN', 'Panama'),
('PNG', 'Papoea-Nieuw-Guinea'),
('PRY', 'Paraguay'),
('PER', 'Peru'),
('PCN', 'Pitcairneilanden'),
('POL', 'Polen'),
('PRT', 'Portugal'),
('PRI', 'Puerto Rico'),
('QAT', 'Qatar'),
('REU', 'Réunion'),
('ROU', 'Roemenië'),
('RUS', 'Rusland'),
('RWA', 'Rwanda'),
('BLM', 'Saint-Barthélemy'),
('KNA', 'Saint Kitts en Nevis'),
('LCA', 'Saint Lucia'),
('SPM', 'Saint-Pierre en Miquelon'),
('VCT', 'Saint Vincent en de Grenadines'),
('SLB', 'Salomonseilanden'),
('WSM', 'Samoa'),
('SMR', 'San Marino'),
('SAU', 'Saoedi-Arabië'),
('STP', 'Sao Tomé en Principe'),
('SEN', 'Senegal'),
('SRB', 'Servië'),
('SYC', 'Seychellen'),
('SLE', 'Sierra Leone'),
('SGP', 'Singapore'),
('SHN', 'Sint-Helena, Ascension en Tristan da Cunha'),
('MAF', 'Sint-Maarten'),
('SXM', 'Sint Maarten'),
('SVN', 'Slovenië'),
('SVK', 'Slowakije'),
('SDN', 'Soedan'),
('SOM', 'Somalië'),
('ESP', 'Spanje'),
('SJM', 'Spitsbergen en Jan Mayen'),
('LKA', 'Sri Lanka'),
('SUR', 'Suriname'),
('SWZ', 'Swaziland'),
('SYR', 'Syrië'),
('TJK', 'Tadzjikistan'),
('TWN', 'Taiwan'),
('TZA', 'Tanzania'),
('THA', 'Thailand'),
('TGO', 'Togo'),
('TKL', 'Tokelau'),
('TON', 'Tonga'),
('TTO', 'Trinidad en Tobago'),
('TCD', 'Tsjaad'),
('CZE', 'Tsjechië'),
('TUN', 'Tunesië'),
('TUR', 'Turkije'),
('TKM', 'Turkmenistan'),
('TCA', 'Turks- en Caicoseilanden'),
('TUV', 'Tuvalu'),
('URY', 'Uruguay'),
('VUT', 'Vanuatu'),
('VAT', 'Vaticaanstad'),
('VEN', 'Venezuela'),
('ARE', 'Verenigde Arabische Emiraten'),
('USA', 'Verenigde Staten'),
('GBR', 'Verenigd Koninkrijk'),
('VNM', 'Vietnam'),
('WLF', 'Wallis en Futuna'),
('ESH', 'Westelijke Sahara'),
('BLR', 'Wit-Rusland'),
('ZMB', 'Zambia'),
('ZWE', 'Zimbabwe'),
('ZAF', 'Zuid-Afrika'),
('SGS', 'Zuid-Georgia en de Zuidelijke Sandwicheilanden'),
('KOR', 'Zuid-Korea'),
('SSD', 'Zuid-Soedan'),
('SWE', 'Zweden'),
('CHE', 'Zwitserland');

/* alter the table to get the created_at stuff */
ALTER TABLE countries
    ADD created_at TIMESTAMP NULL AFTER nmcountry, 
    ADD updated_by VARCHAR(50) NULL AFTER created_at, 
    ADD updated_at TIMESTAMP NULL AFTER updated_by; 

/* update the records */
UPDATE countries SET updated_by = "ADMIN", created_at = CURRENT_TIMESTAMP;

/* make itmore strict */
ALTER TABLE countries CHANGE created_at created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP; 
ALTER TABLE countries CHANGE updated_by updated_by VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL; 

--
-- Indexen voor tabel `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`cdcountry`);

ALTER TABLE clubs ADD INDEX (cdcountry);

ALTER TABLE clubs 
  ADD CONSTRAINT country_clubs_1 FOREIGN KEY (cdcountry) REFERENCES countries (cdcountry);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
