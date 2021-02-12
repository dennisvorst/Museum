-- Inserts for the persons table --
INSERT INTO persons (idperson, nmfirst, nmfull, nmsur, nmlast, nmnick, cdgender, dtbirth, nmbirthplace, cdcountry, dtdeath, nmdeathplace, hasdied, nmaddress, nmpostal, nmcity, ftphone, ftcell, ftemail, cdthrows, cdbats, cdsubscr, dtsend, idclub, nmclubstart, dthof, idphotohof, ftbiography, is_featured, created_at, updated_by, updated_at)
 VALUES (1084, "Jaap", NULL, "van der", "Zee", NULL, "M", NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, "Een van de oprichters van Pirates", 0, "2021-02-07 07:45:28", "ADMIN", NULL);
INSERT INTO persons (idperson, nmfirst, nmfull, nmsur, nmlast, nmnick, cdgender, dtbirth, nmbirthplace, cdcountry, dtdeath, nmdeathplace, hasdied, nmaddress, nmpostal, nmcity, ftphone, ftcell, ftemail, cdthrows, cdbats, cdsubscr, dtsend, idclub, nmclubstart, dthof, idphotohof, ftbiography, is_featured, created_at, updated_by, updated_at)
 VALUES (1085, "Rinus", NULL, NULL, "Verschuur", NULL, "M", NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, "Een van de oprichters van Pirates", 0, "2021-02-07 07:46:16", "ADMIN", NULL);
INSERT INTO persons (idperson, nmfirst, nmfull, nmsur, nmlast, nmnick, cdgender, dtbirth, nmbirthplace, cdcountry, dtdeath, nmdeathplace, hasdied, nmaddress, nmpostal, nmcity, ftphone, ftcell, ftemail, cdthrows, cdbats, cdsubscr, dtsend, idclub, nmclubstart, dthof, idphotohof, ftbiography, is_featured, created_at, updated_by, updated_at)
 VALUES (1086, "Harry", NULL, NULL, "Meijers", NULL, "M", NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, "Een van de oprichters van Pirates", 0, "2021-02-07 07:47:28", "ADMIN", NULL);
-- Updates for the persons table --
UPDATE persons SET nmfirst="Han", nmfull=NULL, nmsur=NULL, nmlast="Urbanus", nmnick=NULL, cdgender="M", dtbirth=NULL, nmbirthplace=NULL, cdcountry=NULL, dtdeath="2021-02-06", nmdeathplace=NULL, hasdied=1, nmaddress=NULL, nmpostal=NULL, nmcity=NULL, ftphone=NULL, ftcell=NULL, ftemail=NULL, cdthrows=NULL, cdbats=NULL, cdsubscr="N", dtsend=NULL, idclub=NULL, nmclubstart=NULL, dthof="1984-05-03", idphotohof=3100757, ftbiography="Hij was een van de beste all-round honkballers: 5 x de gouden balink medaille als Beste werper 1 x de zilveren medaille 1 x goud als Beste Slagman 1 x goud als meest waardevolle speler Als werper en voornaamste troef bij vijf landstitels van OVVO in successie.", is_featured=1, created_at="2015-10-01 00:00:00", updated_by="ADMIN", updated_at="2021-02-07 10:50:14" WHERE idperson = 37;
UPDATE persons SET nmfirst="Charles Sr", nmfull=NULL, nmsur=NULL, nmlast="Urbanus", nmnick=NULL, cdgender="M", dtbirth=NULL, nmbirthplace=NULL, cdcountry=NULL, dtdeath="1980-08-06", nmdeathplace=NULL, hasdied=1, nmaddress=NULL, nmpostal=NULL, nmcity=NULL, ftphone=NULL, ftcell=NULL, ftemail=NULL, cdthrows=NULL, cdbats=NULL, cdsubscr="N", dtsend=NULL, idclub=NULL, nmclubstart=NULL, dthof="1984-05-03", idphotohof=3100755, ftbiography="Charles was gedurende 25 jaar één van de steunpilaren van OVVO, in welke club hij 6 maal landskampioen werd. 12 jaar speelde hij als international.Na een coach opleiding aan het Springfield College, was hij 19 jaar coach. Hij bracht het tot Coach-manager van Oranje.", is_featured=0, created_at="2015-10-01 00:00:00", updated_by="ADMIN", updated_at="2021-02-07 10:50:21" WHERE idperson = 203;
UPDATE persons SET nmfirst="André", nmfull=NULL, nmsur="van", nmlast="Beest", nmnick=NULL, cdgender="M", dtbirth=NULL, nmbirthplace=NULL, cdcountry=NULL, dtdeath=NULL, nmdeathplace=NULL, hasdied=0, nmaddress=NULL, nmpostal=NULL, nmcity=NULL, ftphone=NULL, ftcell=NULL, ftemail=NULL, cdthrows=NULL, cdbats=NULL, cdsubscr=NULL, dtsend=NULL, idclub=NULL, nmclubstart=NULL, dthof=NULL, idphotohof=NULL, ftbiography=NULL, is_featured=0, created_at="2017-03-04 00:00:00", updated_by="ADMIN", updated_at="2021-02-09 20:47:58" WHERE idperson = 859;
UPDATE persons SET nmfirst="Loek", nmfull=NULL, nmsur=NULL, nmlast="Loevendie", nmnick=NULL, cdgender="M", dtbirth=NULL, nmbirthplace=NULL, cdcountry=NULL, dtdeath="2021-02-06", nmdeathplace=NULL, hasdied=1, nmaddress=NULL, nmpostal=NULL, nmcity=NULL, ftphone=NULL, ftcell=NULL, ftemail=NULL, cdthrows=NULL, cdbats=NULL, cdsubscr=NULL, dtsend=NULL, idclub=NULL, nmclubstart=NULL, dthof="2014-10-04", idphotohof=3100739, ftbiography="Hij verrichtte pionierswerk op honkbalgebied en legde zijn ziel en zaligheid in het trainen en coachen van de jeugd. Stond aan de basis van de oprichting van de honkbaltak van RAP, het latere Pirates. Promootte in Amsterdam het peanutbal en richtte er de honkbalschool op. ‘Ome Loek’ was ruim 60 jaar het kloppend hart en het gezicht van Pirates.", is_featured=1, created_at="2021-01-31 16:52:59", updated_by="ADMIN", updated_at="2021-02-07 07:42:23" WHERE idperson = 1064;
-- Inserts for the sources table --
INSERT INTO sources (idsource, nmsearch, nmsource, nmcontact, nmaddress, nmpostal, nmcity, ftphone, ftcell, ftemail, ftwebsite, cdpermission, created_at, updated_by, updated_at)
 VALUES (50, "TIJD", "De Tijd", NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, "N", "2021-02-08 10:48:01", "ADMIN", NULL);
INSERT INTO sources (idsource, nmsearch, nmsource, nmcontact, nmaddress, nmpostal, nmcity, ftphone, ftcell, ftemail, ftwebsite, cdpermission, created_at, updated_by, updated_at)
 VALUES (51, "HANDELSBLA", "Algemeen Handelsblad", NULL, NULL, NULL, "Amsterdam", NULL, NULL, NULL, NULL, "N", "2021-02-08 21:11:10", "ADMIN", NULL);
-- Inserts for the videos table --
INSERT INTO videos (idvideo, nmvideo, nmurl, ftdepicted, is_featured, created_at, updated_by, updated_at)
 VALUES (6, "MLB Allumni", "o8ERZrYq6rU", NULL, 0, "2021-02-05 21:35:47", "ADMIN", NULL);
INSERT INTO videos (idvideo, nmvideo, nmurl, ftdepicted, is_featured, created_at, updated_by, updated_at)
 VALUES (7, "WK Honkbal 2011", "6Lh-bf2rHBM", NULL, 0, "2021-02-05 21:36:23", "ADMIN", NULL);
INSERT INTO videos (idvideo, nmvideo, nmurl, ftdepicted, is_featured, created_at, updated_by, updated_at)
 VALUES (8, "EK BRL 1966 HAARLEM", "SqvS72T7M4M", NULL, 0, "2021-02-05 21:38:08", "ADMIN", NULL);
INSERT INTO videos (idvideo, nmvideo, nmurl, ftdepicted, is_featured, created_at, updated_by, updated_at)
 VALUES (9, "3 Generaties Urbanus", "ytOSSCjDfAc", "Han Urbanus, Nick Urbanus, Charles Urbanus Jr.", 1, "2021-02-07 16:29:25", "ADMIN", NULL);
-- Inserts for the articles table --
INSERT INTO articles (idarticle, idsource, nryear, dtpublish, nmauthor, fttitle1, fttitle2, fttitle3, cdtype, ftarticle, is_featured, created_at, updated_by, updated_at)
 VALUES (30040, 5, 1961, "1961-10-04", NULL, "vandaag ontbrandt strijd in Amerika", NULL, NULL, "HB", "NEW YORK — Vanmiddag beginnen in het Stadion van de Yankees de World Series 1961. Ook al verwacht men, dat de Cincinnati Red Legs het beter zullen doen dan In 1939 toen de Yankees in vier wedstrijden het wereldkampioenschap honkbal veroverden, toch gelden de New Yorkers als de grote favorieten. De bookmakers tippen de Yankees met 12 tegen 5. De beide managers, Ralph Ho uk van de Yankees en Fred Hutchinson van de Red Legs, smaakten beiden nog niet het genoegen van deze titel. Bij de Yankees, die al voor de 26e maal in de series uitkomen en achttien maal kampioen werden, verwacht men, dat Houk vanmiddag zijn grote troef Whitey Ford met het werpen zal belasten, terwijl voorde komende wedstrijden Ralph Terry en Bill Stafford worden genoemd. In volgorde bij de Red Legs prijken de namen van de pitchers Jim O’Toole (18-9), Joey Jay (21-9) en Bob Purkey (16-12). Nadat m-orgen de tweede wedstrijd in New York is gespeeld, verhuist het gehele gezelschap naar Cincinnati waar zaterdag, zondag en maandag gespeeld wordt. In Cincinnati is de belangstelling enorm. Er zullen heel wat enthousiasten van de Red Legs teleurgesteld moeten worden, want het Crosleyfield is met zijn bescheiden capaciteit van dertigduizend toeschouwers een van de kleinste van alle Major-leagueteams.", 0, "2021-02-07 11:27:36", "ADMIN", NULL);
INSERT INTO articles (idarticle, idsource, nryear, dtpublish, nmauthor, fttitle1, fttitle2, fttitle3, cdtype, ftarticle, is_featured, created_at, updated_by, updated_at)
 VALUES (30041, 5, 1961, "1961-10-04", NULL, "HAN URBANUS WÉÉR GOED VOOR GOUD", "Beste honkballers van \'61 gekozen", NULL, NULL, "Haarlem - Honkbalkoning Han Urbanus is weer met goud gekroond. De OVVO-werper werd door de Nederlandse sportpers, die sinds 1953 jaarlijks drie gouden medailles toekent, uitgeroepen tot „de meest waardevolle speler\". Herman Beidschat van E.H.S. verwierf voor de derde maal in successie het eremetaal als beste werper en zijn clubgenoot Nol Houtkamp toonde zich in het afgelopen seizoen de beste slagman. \r\nVoor negende maal\r\nHet was voor de negende maal dat de gouden medailles — ook ditmaal beschikbaar gesteld door de Nederlandse Amerikaan Albert Balink — werden toegewezen, terwijl er evenals in 1960 voor de nummers twee op de ranglijsten zilveren medailles werden toegekend. Voorts stelde het gemeentebestuur van Haarlem, dat er zo daadwerkelijk toe bijdroeg de honkbalweek in de Spaarnestad te doen slagen, een zilveren medaille beschikbaar voor de „meest naar voren gekomen jonge speler in het walhalla van het honkbal”. Deze onderscheiding ging naar de OVVO-catcher Crouwel. \r\nVeelzijdig \r\nToen de buit in Haarlem werd verdeeld bleken twee namen te overheersen. Die van de lakonieke EHS’er Houtkamp, door coach Ron Fraser zo verrassend buiten het Nederlands team voor Amerika gelaten, en die van Urbanus. Voor deze spelers bleek er tenslotte naast goud ook zilver weggelegd, terwijl verleden jaar bij de toekenning der prijzen de rol van de OVVO-werper uitgespeeld scheen te zijn. Dit seizoen heeft hij echter het tegendeel op overtuigende manier bewezen. Alleen door zijn veelzijdigheid en enorme kracht kon OVVO de fraaie plaats op de ranglijst bereiken, die zelfs nog kansen inhoudt op het kampioenschap. Daarom werd Urbanus gekozen tot de „meest waardevolle speler”. Hij kreeg 30 stemmen. Houtkamp en Leo Kops verwierven er 25, Beidschat 22 en Keulemans 18. De herstemming resulteerde in een zilveren medaille voor Houtkamp.\r\nBeste slagman \r\nDe naam van Han Urbanus viel ook te beluisteren bij de keuze van de „beste werper in 1961”. De Amsterdammer zal zich zeker geen illusie gemaakt hebben, dat hij Beidschat het goud, dat deze ook in de jaren 1959 en 1960 ontving, kon ontnemen. Maar gezien zijn vorm gedurende het gehele seizoen en de op papier staande cijfers, moest de Schoten-werper Ruud Zijlstra, die verleden jaar als tweede op de ranglijst eindigde, het zilver toch aan Urbanus laten. Dat Herman Beidschat onbetwist de beste werper in ons land is, illustreerden de cijfers ten overvloede. Van de veertien wedstrijden zette de EHS’er er zeven in no run-overwinningen om, gooide 171 x 3 slag, 22 x 4 wijd en kreeg 58 honkslagen tegen. \r\nEervolle vermelding \r\nDe speler die het afgelopen seizoen het hoogste slaggemiddelde op zijn naam bracht, zal geen goud ontvangen, maar het slechts met een „eervolle vermelding” moeten doen. Immers, dit was de Amerikaan Tom Campbell van UW, die het fraaie slaggemiddelde van 0.382 vergaarde. Van het feit, dat het reglement voor deze prijsuitreiking zegt, dat alleen landgenoten voor onderscheidingen in aanmerking komen, profiteerden Nol Houtkamp en Regeling, de eerste honkman van OVVO. Hun gemiddelden van resp. 0.350 en 0.328 waren goed voor goud en zilver. Na de ontgoocheling van de Verenigde Staten, maar de grootse triomf in de vorm van een grand-slamhomer tegen de Italianen in Turijn, nu dus voor Houtkamp de medaille, die hem in 1954 ook reeds ten deel viel. Maar dat het zilver voor Regeling „nipt” was, geeft de verdere volgorde van de slaglijst 1961 duidelijk aan: Han Urbanus 0.327, Keulemans en Ben Tromp 0.321, Molleman 0.309, Leo Kops 0.304 en Van der Brugge 0.302. Stimulans WAREN de traditionele medailles een gezamenlijke prooi van spelers van EHS en OVVO, het zilver van het Haarlemse gemeentebestuur maakte hierop geen uitzondering. Als de meest naar voren gekomen jonge speler werd uitgeroepen catcher Crouwel van OVVO, die ook al de reis naar de States niet kon meemaken, zij het door een blessure. \'Deze jeugdige Amsterdammer had bij de stemming zijn naaste concurrent in de HHC-midvelder Richard van Reyssen. Overigens laat de statistiek over de afgelopen negen jaren zien, dat het initiatief van het Haarlemse gemeentebestuur zeer toe te juichen valt. Wie de namen bekijkt zal ervaren, dat vrijwel alle spelers ook het afgelopen seizoen een vooraanstaande rol hebben gespeeld. Dat de jeugd dan ook wordt gestimuleerd, _ is zeker iets dat niet anders dan te prijzen valt. Vooral een vergelijking tussen de jaren 1954 en 1961 is zeer frappant.\r\n", 0, "2021-02-07 11:29:46", "ADMIN", NULL);
INSERT INTO articles (idarticle, idsource, nryear, dtpublish, nmauthor, fttitle1, fttitle2, fttitle3, cdtype, ftarticle, is_featured, created_at, updated_by, updated_at)
 VALUES (30042, 50, 1968, "1968-05-10", "Van onze honkbalmedewerker", "Honkbalrel blijft nog onopgelost", NULL, NULL, "HB", "AMSTERDAM, 10 mei — Een aantal spelers van de Harlem Nicols en het lid van de technische commissie van de KNHB Han Urbanus hebben gisteravond op uitnodiging van het bondsbestuur het tussen hen gerezen meningsverschil besproken.\r\n\r\nAanleiding tot dit conflict was onder meer een uitlating van Han Urbanus in een recent radio-interview. Hierin beschuldigde hij een speler van de Nicols van ongeoorloofde benadering van de OVVO-er Karel Crouwel. Verder zijn de Harlem-spelers ontevreden over de, invloed van de, gebroeders Han en Charles Urbanus bij de samenstelling van het Nederlandse negental. Zoals bekend is Charles Urbanus een fulltime bondscoach. Deze feiten deden de Nicols-spelers besluiten, voor de opstelling in het nationale team te bedanken. De standpunten van beide partijen in het conflict bleken gisteravond kennelijk ook na een ruim vier uur durende bespreking nog geen stap nader tot een oplossing te zijn gekomen.", 0, "2021-02-08 11:15:49", "ADMIN", NULL);
INSERT INTO articles (idarticle, idsource, nryear, dtpublish, nmauthor, fttitle1, fttitle2, fttitle3, cdtype, ftarticle, is_featured, created_at, updated_by, updated_at)
 VALUES (30043, 51, 1962, "1962-07-27", "Van onze honkbalmedewerker", "Han urbanus speelt vijftigste interland ", "Teleurstellend Europees honkbalkampioenschap", NULL, "HB", "Als het Nederlandse honkbalteam zondag voor de finale van het Europese kampioenschap te  Amsterdam tegen Italië in het veld komt, zal het voor één van zijn spelers een groot moment zijn. Dan immers zal de Amsterdammer Han Urbanus zijn vijftigste interlandwedstrijd gaan spelen. Meer dan van enig ander is de naam Han Urbanus in de naoorlogse jaren vastgesmeed aan het wel en wee van het honkbal in ons land. De klanken „Urbanus\" en „honkbal\" zijn één begrip geworden. \r\nMaar in zijn gehele succesrijke carrière is Urbanus ook steeds een uiterst dankbare leerling gebleven. Eerst van zijn oudere broer Charles, die hem de eerste begrippen van honkbal bijbracht en nu de assistentcoach van het Nederlandse team is, later in de trainingskampen in de Verenigde Staten bij befaamde professionals en nu nog steeds van Ron Fraser, de tegenwoordige Amerikaanse coach van de KNHB. die hij bewondert en waardeert.\r\nHoe denkt Han Urbanus over de titelstrijd, welke thans wordt gespeeld? Urbanus noemt Italië en Nederland volkomen gelijkwaardige ploegen, evenals in 1958. te Amsterdam en 1960 te Barcelona. Sindsdien is het Nederlandse spel vooruitgegaan, maar evenzeer dat van de Italianen. Urbanus was niet geïmponeerd door het werpen van de „grote\" Guilio Glorosio tegen de Westduitsers: Maar het slaan van de Italianen is aanmerkelijk beter geworden. Daarom ook is Han Urbanus het met ons eens, dat slechts één wedstrijd niet meer over de Europese titel mag beslissen. Hoe het resultaat van zondag ook mag zijn, alleen het Amerikaanse finale-systeem van de „world-series\" dat „the best of  seven\" omhelst, mag een juiste sterktemeter worden genoemd. \r\nOok voor Han Urbanus is het toernooi te Amsterdam een teleurstelling geworden. Een teleurstelling, omdat in schrille tegenstelling tot de verbeterde prestaties van Nederland en Italië, het spelpeil van de Westduitsers en Belgen (!) is gedaald. Hierdoor alleen al noemt Urbanus het toernooi gedevalueerd en wenst ook hij in de toekomst een ander wedstrijdschema. Een andere geduchte handicap noemt hij het, dat terwijl Zweden vier dagen achtereen in het veld kwam. Nederland alleen maar kon trainen.\r\n", 0, "2021-02-08 21:14:41", "ADMIN", NULL);
INSERT INTO articles (idarticle, idsource, nryear, dtpublish, nmauthor, fttitle1, fttitle2, fttitle3, cdtype, ftarticle, is_featured, created_at, updated_by, updated_at)
 VALUES (30044, 51, 1962, "1962-07-27", "Van onze honkbalmedewerker", "Herman Beidschat heeft griep", NULL, NULL, "HB", "De grote troef van het Nederlandse honkbal negental voor de wedstrijd tegen Italië, werper Herman Beidschat, is met griep naar huis gezonden. Beidschat meldde zich gisteren normaal op de training, maar voelde zich koortsig en allerminst fit. De arts van het oranjeteam, dr R. J. Bergmans, die de thermometer tot boven de 39 graden zag stijgen, heeft echter toch nog goede hoop, dat hij de griep van Beidschat tijdig zal kunnen bedwingen. Midvelder Teun de Groot, heeft last van een  kaakontsteking.", 0, "2021-02-08 21:14:47", "ADMIN", NULL);
INSERT INTO articles (idarticle, idsource, nryear, dtpublish, nmauthor, fttitle1, fttitle2, fttitle3, cdtype, ftarticle, is_featured, created_at, updated_by, updated_at)
 VALUES (30045, 7, 1990, "1990-08-27", "Peter Bruin", "Boze McGinnis valt arbiterskorps aan", NULL, NULL, "HB", "BUSSUM — Als actief honkballer kon Craig McGinnis een verliespartij moeilijk accepteren. Als assistent-coach bij HCAW/T is zijn instelling niet veranderd. Enkele uren na afloop van het duel tegen Nicols wond hij zich opnieuw op. „Indien een scheidsrechter een klein slagzone verkiest, vind ik dat best. Maar als hij niet consequent blijft, krijg ik enorm de pest erin.\"\r\nMet stemverheffing en een venijnige blik in de ogen formuleerde hij het belangrijkste punt van zijn ongenoegen. „Ik stelde hierover op serieuze toon een vraag aan de scheidsrechter. In plaats van een serieus antwoord werd er een grapje gemaakt. Zoiets vind ik verschrikkelijk.\" McGinnis richtte zijn aanval niet alleen op hoofdarbiter Bodaan, die grote moeite had een consequente lijn te vinden in de slag- en wijdbeoordelingen, maar op het volledige scheidsrechterskorps. Geheel onverwacht werd de visie van McGinnis gesteund door veldscheidsrechter Waalzaan. „Aankomende arbiters kunnen bijna niet doorbreken naar de top. Zij worden voortdurend geobserveerd door beoordelaars. Als ze een paar foutjes maken, wordt dat gerapporteerd en blijft plaatsing op de A-lijst achterwege.\" Waalzaan meent dat de grote jongens uit de scheidsrechterswereld ongehinderd hun gang kunnen gaan. „Neen, namen noem ik niet, maar ik denk dat je begrijpt wie ik bedoel. Als ze fouten maken, durft niemand kritiek op hen te leveren. Het zijn immers de gevestigde namen. Daarom blijven zij zogenaamd de toparbiters.\"\r\nHet saaie duel tussen HCAW/T en Nicols kende slechts twee hoogtepuntjes. Halverwege scoorde de landskampioene drie runs na rake tikken van Bos en Joost. De 1-4 voorsprong werd probleemloos opgevoerd naar 1-6, waarna HCAW/T het gezapig sfeertje in de achtste inning doorbrak. Dankzij Koenen, Kwakernaak en De Groot werd het plotsklaps 4-6 en schrok het publiek wakker. De opleving was echter van korte duur omdat de sterkste slagmensen van de Bussummers — Martis, Mendes en Aoki — in de slotinning niet eens het eerste honk bereikten.\r\nDe nederlaag tegen Nicols werd een dag later gevolgd door 3-1 verlies bij Kinheim. Daardoor zullen de ambitieuze Bussummers niet hoger reiken dan de zesde plaats in de eindrangschikking die echter geen enkele prijs oplevert. Desondanks gaat sponsor/manager Ron Jaarsma onverdroten voor met zijn voornemen HCAW/T naar een landstitel te voeren.\r\nDe mogelijkheid bestaat ook nog dat McGinnis het weer als werper gaat proberen. Door slijtageverschijnselen aan een heup was hij vorig jaar gedwongen zijn fraaie werpersloopbaan te beëindigen. Vorige week beklom McGinnis de heuvel in een oefenwedstrijd tegen een universiteitsteam uit Osaka. McGinnis laat zich nog niet uit over de plannen voor volgend seizoen. „Er zijn nog andere mogelijkheden. Daarover moet nog worden gesproken. Alles draait erom wat ik zelf wil. En als ik ga gooien moet daar wel wat tegenover staan.\"\r\nNicols heeft eindelijk de jacht geopend op de vierde plaats, waarbij Sparta het belangrijkste mikpunt is. Kinheim zal onbereikbaar blijven, maar de Rotterdammers zijn nog steeds niet in staat een langdurige nederlagenreeks te beëindigen. In de onderlinge confrontatie bleek Nicols met 4-7 de sterkste. PSV benutte een kans om ADO te achterhalen en degradatie te ontlopen. De Hagenaars traden aan met een door blessures gehavend team. De allesbehalve sterke slagploeg van PSV produceerde liefst negentien honkslagen, waaronder een homerun van Simonsson. Scott Khoury toonde opnieuw aan di hij de meest waardevolle speler is tijdens deze competitie. Tegen lijstaanvoerder Neptunus liet de Pirates-speler de 77ste honkslag van dit seizoen noteren. Daardoor is hij nog één honkslag verwijderd van het uit 1988 daterende nationaal record van Judsel Baranco.\r\n", 0, "2021-02-09 06:24:02", "ADMIN", NULL);
INSERT INTO articles (idarticle, idsource, nryear, dtpublish, nmauthor, fttitle1, fttitle2, fttitle3, cdtype, ftarticle, is_featured, created_at, updated_by, updated_at)
 VALUES (30046, 7, 1990, "1990-08-27", NULL, "Russisch honkbalteam ontstijgt B-niveau", NULL, NULL, "HB", "PARMA (ANP) — De oefentrip naar de Goodwill Games in de Verenigde Staten heeft de beginnende honkbalploeg van de Sovjet-Unie zo goed gedaan dat het team zondag de promotie naar de Europese A-groep heeft bewerkstelligd. In de finale van de Europese titelstrijd voor B-landen in Parma wonnen de Russen overtuigend met 8-1 van West-Duitsland, waar honkbal door de aanwezigheid van Amerikaanse soldaten de kinderschoenen enigszins ontgroeid leek. De Westduitsers spelen niettemin de komende twee jaar weer in de Europese honkbalkelder. De Sovjet-Unie is in de nabije toekomst tegenstander van Nederland en Italië, de landen die traditiegetrouw de dienst uitmaken in Europa.", 0, "2021-02-09 06:24:02", "ADMIN", NULL);
INSERT INTO articles (idarticle, idsource, nryear, dtpublish, nmauthor, fttitle1, fttitle2, fttitle3, cdtype, ftarticle, is_featured, created_at, updated_by, updated_at)
 VALUES (30047, 8, 1971, "1971-05-01", "HANS DOELEMAN", "Europese première van peanuthonkbal was succes ", NULL, NULL, "HB", "AMSTERDAM, zaterdag — Onder glunderende supervisie van „ome Loek\" Loevendie, de vooral in Amsterdam-West zo populaire leider van de RAP-honkbalschool, werd gisteren het Peanuthonkbal van de grond geholpen. Dit qua regels aan zeven- en achtjarige jongens aangepaste spel zette tijdens de Europese première zijn eerste wankele schreden op hetzelfde terrein, waar RAP te zelf der tijd twintig ploegen tot dertien jaar uit heel Nederland in het grootste Europese Bleesing-toernooi te gast had.\r\nHet idee voor Nederland peanuthonkbal, in een iets gewijzigde vorm al buitengewoon populair in de Verenigde Staten, werd ook op het RAP-complex aan de Jan van Galenstraat geboren. „Ome Loek\" Loevendie, (38), brein en grotendeels uitvoerder van de vele jeugdactiviteiten van RAP, is in de \'hele wereld waarschijnlijk ook de enige leider van een honkbalschool. Geschrokken zegt hij daarover: „Maak maar geen reclame voor mijn honkbalschool. Verleden week woensdag hadden we hier met vijf man tweehonderd jongetjes op het veld. Eerlijk, ik kan het niet meer bijbenen.\"\r\nVia mondreclame heeft de nu drie jaar bestaande woensdagmiddagschool van „ome Loek\" zich in Amsterdam een bijzonder grote populariteit verworven. Loevendie: „Die jongens van een jaar of zes, zes, of acht komen zelfs uit Oost. Ik heb er ook een paar van vijf jaar bij.\" Trots, maar ook licht verwijtend, zegt hij: „Wij verzorgen het materiaal, zonder subsidie.\"\r\nLoek Loevendie kan sinds gisteren niet meer bezweren, wat hij zelf zo enthousiast in het leven heeft geroepen. Al die kleine mannetjes van HCK (Haarlem), Haarlem Nicols, HCAW (Bussum) en RAP rekenen voor volgend jaar weer op hem. En Loevendie wordt dan een moment praktisch als hij met een knipoogje voorrekent: „We houden er altijd wel een paar over voor het eerste team van RAP.\"\r\n", 0, "2021-02-09 06:24:02", "ADMIN", NULL);
INSERT INTO articles (idarticle, idsource, nryear, dtpublish, nmauthor, fttitle1, fttitle2, fttitle3, cdtype, ftarticle, is_featured, created_at, updated_by, updated_at)
 VALUES (30048, 8, 1976, "1976-03-01", "Van onze sportredactie", "Loek Loevendie krijgt slugger", NULL, NULL, "HB", "AMSTERDAM, maandag — De „slugger”, de jaarlijkse onderscheiding voor een zeer verdienstelijk persoon in de honkbal- en softballwereld is zaterdag uitgereikt aan Loek Loevendie, jeugdsecretaris van de Amsterdamse vereniging Pirates. Op de bondsvergadering van de KNBSB werden drie leden tot bondsridder benoemd: Goede (secretaris landelijke jeugdcommissie), Leen Volkrijk (assistent-bondscoach) en Joop Pleyt (secretaris landelijke scheidsrechterscommissie softball). De vergadering keurde een reglementswijziging goed, waardoor spelers die zich in een zaterdagwedstrijd ernstig misdragen, op staande voet een voorlopige schorsing kunnen krijgen en zondag niet mogen spelen.", 0, "2021-02-09 13:00:11", "ADMIN", NULL);
INSERT INTO articles (idarticle, idsource, nryear, dtpublish, nmauthor, fttitle1, fttitle2, fttitle3, cdtype, ftarticle, is_featured, created_at, updated_by, updated_at)
 VALUES (30049, 8, 1981, "1981-05-22", "door JOHAN CARBO", "De jeugddroom van een Piraat ", "Duizendpoot Loevendie ziet zijn club aan de top komen", NULL, "HB", "AMSTERDAM — Hij is zo’n man die nog wel eens rond etenstijd even vlug naar huis belt: of moe het ook zulk lekker weer vindt en of zij de warme hap niet naar het veld van Pirates wil komen brengen. En dan gaat zijn avondeten weer in een pannetje en stapt zijn vrouw op de fiets. Tien minuutjes rijden met een prakkie op de bagagedrager, voor het gezin Loevendie is het maar een kleinigheid. Als „Ome Loek\" alleen al zijn bezigheden bij Pirates moet opnoemen, is hij tien minuten bezig.\r\n\r\nHoewel het nog vroeg is in het honkbalseizoen valt nu al bijna met zekerheid te zeggen dat Pirates kampioen in de eerste klasse A. “Mister Pirates”, Loek Loevendie loopt inmiddels al met de gedachte rond om stickers te laten maken met daarop zoiets als “Pirates in 1981 naar de Hoofdklasse...”\r\n\r\nDe opmars van de Amsterdammers — vorig jaar nog tweede klasser — mag buitengewoon  spektakulair worden genoemd. Anderhalf jaar geleden hadden ze er aan de Jan van Galenstraat in West plotseling genoeg van dat het talent werd weggeplukt en dat onder andere Loek Loevendi zich dag-in-dag-uit voor de kapers op de kust. “in één ruk gaan we zelf we zélf naar de hoofdklasse,” klonk het strijdvaardig.\r\nParool sport zocht de nu al in feeststemming verkerende LOEK LOEVENDI op.\r\nHij gaat over het materiaal, is wedstrijd-secretaris van een hele ris senioren-teams, doet de lotto en toto en loopt iedere zaterdag- en zondagmorgen al om acht uur kalklijnen te trekken. Met nog een aantal enthousiastelingen bouwt hij met eigen handen een clubhuis van twee verdiepingen, dat een slordige acht ton gaat kosten. Maar in het Nederlandse honkbal is Loek Loevendie (49) toch wel het meest bekend vanwege zijn eindeloze geduld met kinderen, die hij van de straat af plukt en die hij een bal en een knuppel in hun handen stopt Zo gaat het al meer dan twintig Jaar. ledere woensdagmiddag instuif bij Ome Loek. Hij zegt: , .Die eerste tijd deed ik maar wat De hield dat grut bezig, zonder veel van honkbal te weten. Zo’n twaalf jaar geleden, toen ik op mijn brommertje een Antilliaanse speler naar een wedstrijd tegen OVVO bracht werd ik op de hoek van de Kruislaan in Amsterdam aangereden. Gecompliceerde dijbeenfractuur met later botinfectie. Dat kostte me m\'n baan als naaimachinemonteur. Op krukken ben ik toen mijn honkbalschool begonnen.\"\r\n\r\nJochies\r\n\r\nHij komt met namen. Marcel Joost, Frank Koot, Haitze de Vries, Ernst Engbrenghof. Spelers van wie de eerste drie nu voor Nicols in de hoofdklasse honkballen. Engbrenghof zit bij Giants. Stuk voor stuk knapen met wie Loevendie aan de gang ging. „Op een advertentietje in het Wierings Weekblad kregen we zon veertig jochies. De zeg dan ook: gelul dat sommige clubs geen jeugd kunnen krijgen. Ik gooide m\'n krukken tegen ene boom en mikte de bal desnoods óp het slaghout, als een jochie niet kon slaan. Dan komt het hard aan als de besten tegen de tijd dat ze in het eerste zitten, weglopen omdat je met Pirates te laag speelt.\"\r\n\r\nEn dus staken ze anderhalf jaar geleden de koppen bij elkaar, toen de club met opgeschoten jeugd die prima kon honkballen tóch degradeerde naar de tweede klasse. Ruud Koene als coach niet meer goed genoeg voor Giants? Pirates kon de Diemenaar best gebruiken. Het lid Rob Kruik, die een poosje in de Verenigde Staten zat, kreeg de opdracht uit te kijken naar twee Amerikanen. Op zijn advertentie van drie regels kwamen tientallen reacties. De gegevens van alle liefhebbers stopte Kruik in een computer, die Sullivan en Kalinowski als de twee besten aanwees. Vrijwel zeker komen zij volgend seizoen weer terug voor hun derde jaar in Nederland.\r\n\r\nOok als hoofdklasser, volgend seizoen, zal Pirates behalve zijn twee Amerikanen geen enkele speler centen toestoppen. Toch rekent Loevendie er op dat verscheidene jongens voor wie hij zich uitsloofde in looppas zullen terugkomen. Hij zegt zelfs al wat vage toezeggingen te hebben gehad. Loevendies grootste kracht is zijn amicale omgang met mensen, zijn flair. Zoals Pirates steunt op een heel leger vrijwilligers, van wie de bestuursleden elkaar pas geleden hebben beloofd nog zeker de komende tien jaar in functie te zullen blijven. En dat is zeker uniek in de sport, waarvan het kader doorgaans in- en uitloopt.\r\n\r\n„Een kwestie van je verantwoordelijkheid kennen. Ikzelf stop er, denk ik, nooit mee,\" haalt Loevendie zijn brede schouders op. „Als kantinebeheerder op een technische school ben ik \'s middags vroeg klaar en zit ik in een wip op het veld. Vergeet even niet dat er zelfs zonder sponsor al een ton per jaar omgaat in onze club. Die nieuwe kantine gaat Inclusief de inventaris zon acht ton kosten. Daaraan begin je niet met mensen voor wie Pirates niet meer is dan een bevlieging. Net als de profs in Amerika krijgt ons eerste team straks zijn eigen kleedkamer met voor iedere speler een kast voor zijn spullen. Een paar AOW\'ers hebben al beloofd door de week de honkbalschoenen te komen poetsen.\" \r\n\r\nVerwennerij? Laat Ome Loek niet lachen: „Dat vinden die gasten toch prachtig. En als die oudjes het nou ook leuk vinden. Je moet je club gezond houden, dus geen geronsel en geld onder de tafel. Maar als je nou hoofdklasser bent dan is het toch voor goeie spelers extraleuk als je de grote boys in Amerika een beetje naäapt?\"\r\n", 0, "2021-02-09 13:11:52", "ADMIN", NULL);
INSERT INTO articles (idarticle, idsource, nryear, dtpublish, nmauthor, fttitle1, fttitle2, fttitle3, cdtype, ftarticle, is_featured, created_at, updated_by, updated_at)
 VALUES (30050, 26, 1987, "1987-05-28", "Van onze honkbalmedewerker ", "Pirates vanuit coulissen in de schijnwerpers", NULL, NULL, "HB", "AMSTERDAM - Het leek grootspraak toen Pirates coach Ted Arnold vorige week meldde „hem bij een volgende gelegenheid nog wel eens de oren te wassen.\" Het toekomstig lijdend voorwerp was Neptunus\' fameuze werper Harry Koster die Pirates zojuist de voet dwars had gezet en het uitzicht op een landskampioenschap voor zijn Rotterdamse ploeg nog wat mooier maakte toen de tweede ontmoeting in Rotterdam verregende. \r\n\r\nDe Pietje Bell onder de Nederlandse honkbalcoaches, die met gedurfde uitspraken en onorthodox coachen Pirates naar een topklassering leidde, kreeg ook nu weer gelijk. Na de 4-0-zege,in eigen huis en de 2-7-overwinnipg in de sleutelwedstrijd in Rotterdam een dag eerder, is Pirates de nieuwe honkbalkampioen van Nederland. Het belang voor Pirates lag in de tweede aflevering van deze miniserie, waarin de Rotterdammers opnieuw Nederlands beste werper aan de start konden brengen. Maar Pirates had indachtig de woorden van Arnold nu wel een antwoord op het sterke werpen van Koster. Die werd elfmaal geraakt door de Pirates-aanval onder aanvoering van Ronald Stovelaar. Omgekeerde rollen in vergelijking met de voorgaande ontmoeting, toen enkele foutjes van het Pirates-veld de nieuwe kampioen duur kwamen te staan. Nu liet Neptunus de steken vallen, terwijl Didi Gregorius (4-3-8) met feilloze steun van zijn veldspelers de Rotterdamse aanval beteugelde. \r\n\r\nDe nederlaag van Koster c.s. betekende feitelijk ook het einde van de aanspraken op de titel van Neptunus. Na Koster beschikt Hamilton Richardson, die als coach nog nimmer een kampioenschap heeft mogen meemaken, niet over adequate werpers in de personen van Wim Martinus en Jan Venema. Voor eerstgenoemde was de taak weggelegd het \'wonder\' van Amsterdam te verrichten met de personificatie van Pirates jeugdige elan: Rikkert Faneyte als tegenstander. Martinus redde het zoals verwacht niet, al ging de Rotterdammer (4-2-11-2) zeker niet af. In de eerste drie slagbeurten kreeg de voorspelbare 4-0-overwinning van Pirates voor zo een drieduizend toeschouwers gestalte. Werd Faneyte vorige week nog aanvallend buiten de ploeg gelaten, dit keer kwam Arnold op die gedachtenkronkel terug. Pirates beste slagman verscheen ook in de aanvallende line-up en scoorde twee van de vier Amsterdamse runs. In de derde slagbeurt gebeurde dat na een homerun van Pirates man van de wedstrijd in offensief opzicht, Nelson Orman. Alleskunner Faneyte was daarvoor aan boord geklommen door een discutabel infield hitje met ingehouden knuppel, waarop ook scheidsrechter Pieterse zich verkeek. Vanaf die derde slagbeurt bleef de thuisplaat schoon aan beide kanten en was het een kwestie van tijd om het startschot van de uitgebreide feestelijkheden te bepalen. Met 11-2-4-1 werd Faneyte uiteindelijk winnend werper voor een ploeg die in de breedte een sterke indruk maakte en daarvoor terecht met het landskampioenschap werd beloond.\r\n\r\nEn dat terwijl een hoofdrol in deze competitie in het geheel niet leek te zijn weggelegd voor de Amsterdamse ploeg waar Loek Loevendie de basis legde voor tophonkbal. Vorig seizoen werd onder leiding van coach Jan Dick Leurs nog in de coulissen gestreden. Persoonlijke bemoeienis van Ted Arnold garandeerde pas laat de minimale financiële basis om een seizoen tophonkbal te bedrijven. Gaandeweg de competitie leverde die ploeg steeds beter honkbal af, en bleef met geïnspireerd in tegenstelling tot Haarlem Nicols, waar verzadiging haar tol eiste. Of het talentrijke team ook volgend seizoen in dezelfde samenstelling acte de présence geeft, is nog de vraag. Met de bierstroom leek ook de transfermarkt in Amsterdam gisteren op gang te zijn gekomen.\r\n", 0, "2021-02-09 14:32:11", "ADMIN", NULL);
INSERT INTO articles (idarticle, idsource, nryear, dtpublish, nmauthor, fttitle1, fttitle2, fttitle3, cdtype, ftarticle, is_featured, created_at, updated_by, updated_at)
 VALUES (30051, 8, 1976, "1976-05-04", "CAREL BRENDEL", "SPORT KNBSB ACHTER IDEE VAN LOEK LOEVENDIE", "Erkenning voor het Peanutbal", NULL, NULL, "AMSTERDAM, dinsdag — Wanneer u binnenkort op een mooie wordt opgeschrikt door met slaghouten gewapende kinderen die op het grasveld achter uw flat ronddartelen, dan hebt u dat waarschijnlijk te danken aan ene Loek Loevendie. Zes jaar geleden verzamelde de 44-jarige kantinebaas van een LTS en bestuurslid van de Amsterdamse honkbal en softballvereniging Pirates (toen nog RAP genaamd) een groepje jongens en meisjes van zo’n jaar of zes om zich heen. Hij leerde ze een uit Amerika overgewaaid slagbalspelletje met honken. Het heet naar een bekende strip peanutbal en is een soort voorloper van het echte honkbalspel.\r\n\r\nDe man, die beschouwd kan worden als vader van het Nederlandse peanutbal hoorde echter menigmaal de term „speeltuinwerk\". Een kwalificatie waar de vasthoudende clubwerker Loevendie — al zeventien jaar in touw voor de jeugd van zijn club — zich weinig van aantrok. Zes jaar na dat aarzelende begin heeft hij op vele manieren erkenning gekregen. Erkenning m de vorm van de „slugger”, de jaarlijkse onderscheiding van de KNBSB die hem op de jongste bondsvergadering werd uitgereikt. Erkenning meer nog door het feit dat Peanutbal door de honk- en softballbond nu op alle fronten wordt gepropageerd. \r\n\r\nDe KNBSB bezorgd over het stagnerende aantal jeugdleden, verklaarde 1976 tot Jaar van de jeugd. De bond presenteerde eind vorig jaar een boekje waarin de regels van ’t spel voor jongens en meisjes nader uitgewerkt werden. De brochure vond zijn weg naar het onderwijs en het recreatiewezen in een oplage 25.000 stuks. Koninginnedag vormde vorige week het begin van een gecoördineerde actie om ons land deze zomer door middel van demonstraties voor het peanutbal te winnen.  \r\n\r\nLoevendie de werker van het eerste uur: „De bond staat er nu voor honderd procent achter. Die mensen lopen zich het vuur uit de sloffen. De zaak komt in een stroomversnelling. De peanutbalstandaards vliegen met setjes tegelijk de winkel uit.\"\r\n\r\nLoevendie maakt duidelijk dat voor peanutbal geen dure investeringen nodig zijn. „De totale kosten bedragen zo’n zestig gulden. Er is geen werper maar de kinderen slaan de bal weg van een standaard. Die kost veertig gulden. Dan zijn nodig twee houten knuppeltjes, samen zestien gulden. Twee zachte ballen, bij elkaar vier gulden. Je kan dit spel overal spelen, op grasveldjes en zelfs in sportzalen. Wij van Pirates gaan deze zomer overal in Nieuw-West met onze peanutspelers demonstraties geven tussen de woonblokken. Op scholen, op campings, overal hopen we straks peanutbal te zien.\"\r\n\r\nDe KNBSB beoogt natuurlijk niet alleen de introductie van een gezellig recreatiespelletje al is zoiets op zichzelf natuurlijk nooit weg. Achterliggende gedachte vormt de verwachting dat een deel van de met peanutbal geconfronteerde kinderen zijn weg naar de clubs zal vinden. De clubs worden aangespoord het uiterste te doen om de verwachte toeloop verantwoord op te vangen. Loevendie\'s eigen Pirates is het voorbeeld van een vereniging die dank zij het peanutbal niet over gebrek aan jeugd te klagen heeft.\r\n\r\nLoevendie, iedere woensdagmiddag en veel avonden met zijn jeugd actief aan de Jan van Galenstraat: „Vier clubs in het rayon Amsterdam hebben een peanutafdeling: Thamen, Luycks/Giants, ABC, Pirates. Die clubs hebben ook voldoende oudere jeugd. Die kinderen waarmee ik zes jaar geleden het peanutbal begon, zie je nu voor een groot deel terug bij de Bleesing (pupillen) en met een sterke jeugdafdeling kan je club nooit stuk gaan. Dat hebben wij zelf twee jaar terug ondervonden toen elf spelers na een ruzie met hun coach opstapten en we desondanks overeind bleven.\"\r\n", 0, "2021-02-09 17:56:11", "ADMIN", NULL);
INSERT INTO articles (idarticle, idsource, nryear, dtpublish, nmauthor, fttitle1, fttitle2, fttitle3, cdtype, ftarticle, is_featured, created_at, updated_by, updated_at)
 VALUES (30052, 5, 1989, "1989-08-04", NULL, "Schorsing Remmerswaal\r\n", NULL, NULL, "HB", "SANTPOORT — De strafcommissie van de honkbalbond heeft Win Remmerswaal voor zes wedstrijden geschorst. De coach van Pirates was al voor de duels van morgen en overmorgen uitgesloten, zodat hij de eerste vier wedstrijden van de play-offs mist. Remmerswaal werd geschorst wegens zijn rol in het incident, dat zich vorige week vrijdag in de wedstrijd ADO Pirates afspeelde.\r\n", 0, "2021-02-09 20:50:48", "ADMIN", NULL);
INSERT INTO articles (idarticle, idsource, nryear, dtpublish, nmauthor, fttitle1, fttitle2, fttitle3, cdtype, ftarticle, is_featured, created_at, updated_by, updated_at)
 VALUES (30053, 23, 1989, "1989-08-04", NULL, "Remmerswaal mist vier wedstrijden", NULL, NULL, "HB", "SANTPOORT — De strafcommissie van de KNBSB heeft Win Remmerswaal voor zes wedstrijden geschorst. De coach van Pirates was al voor de duels van zaterdag en zondag uitgesloten, zodat hij de eerste vier wedstijden van de playoffs mist. Remmerswaal werd geschorst wegens zijn rol in het incident, dat zich vorige week vrijdag in de wedstrijd ADO - Pirates in Den Haag afspeelde. Scheidsrechter Fred de Kramer staakte het duel in de vierde slagbeurt omdat hij zich door Remmerswaal bedreigd voelde.", 0, "2021-02-09 20:52:56", "ADMIN", NULL);
INSERT INTO articles (idarticle, idsource, nryear, dtpublish, nmauthor, fttitle1, fttitle2, fttitle3, cdtype, ftarticle, is_featured, created_at, updated_by, updated_at)
 VALUES (30054, 8, 1989, "1989-08-11", "Van onze sportredactie", "Genade voor Remmerswaal", NULL, NULL, "HB", "SANTPOORT - Honkbalcoach Win Remmerswaal mag zijn club Detach Pirates weer begeleiden. De commissie van beroep zette zijn schorsing, die oorspronkelijk zes duels bedroeg, om in een straf van zes wedstrijden waarvan twee voorwaardelijk.", 0, "2021-02-09 20:56:48", "ADMIN", NULL);
INSERT INTO articles (idarticle, idsource, nryear, dtpublish, nmauthor, fttitle1, fttitle2, fttitle3, cdtype, ftarticle, is_featured, created_at, updated_by, updated_at)
 VALUES (30055, 5, 1982, "0000-00-00", "Van onze honkbalmedewerker", "Eisen van Remmerswaal \'niet mis\'", NULL, NULL, "HB", "ROTTERDAM — Het is nog altijd \'onduidelijk in welk (honkbal)tenue sterwerper Win Remmerswaal komend seizoen zal aantreden. Remmerswaal, die in Amerika bij de Boston Red Sox geen nieuw contract kreeg aangeboden, heeft inmiddels een tweede gesprek gehad met Sparta. Ook stadgenoot Neptunus heeft belangstelling getoond.\r\nVoor Neptunus-secretaris Piet Eenhoorn zijn de eisen die Remmerswaal stelt niet mis. „Het is duidelijk dat hij zijn honkbalkennis wil verkopen. Wij hebben hem het advies gegeven niet overhaast te handelen. Uiteindelijk kan hij zich vlak voor de start van de competitie nog aanmelden, omdat voor hem de overschrijvingsperiode niet geldt.\r\n„Eigenlijk\", vervolgt Piet Eenhoorn, „past Remmerswaal niet eens in onze opbouw\".\r\nZeker is dat bij Neptunus de Amerikanen Donóvan en Schultz niet zullen terugkeren. De nieuwe coach Tim Schmidt heeft de opdracht om een andere Amerikaanse werper mee naar Nederland te nemen.", 0, "2021-02-09 21:04:17", "ADMIN", NULL);
-- Updates for the articles table --
UPDATE articles SET idsource=2, nryear=2002, dtpublish="2002-04-05", nmauthor="Gijs Moerman", fttitle1="\"Geen regels, het gaat om sfeer en saamhorigheid\"", fttitle2="Frank Koene maakt als coach van HCAW honkbal niet moeilijker dan noodzakelijk", fttitle3="NULL", cdtype="NULL", ftarticle="ONGECOMPLICEERD. Zo zou je de werkwijze van de nieuwe hoofdcoach van Mr. Cocker/HCAW waarschijnlijk het beste kunnen omschrijven. Frank Koene heeft in de Bussumse vallei het stokje overgenomen van Dave Daniels, onder wie hij vorige zomer assistent was. En hij gaat het anders doen, minder ingewikkeld. \"lk ben \'maar\' coach natuurlijk. De meeste van de jongens spelen al een jaar of twaalf in de hoofdklasse en weten echt wel wat dat inhoudt. Ik heb de term \'boerenkoolhonkbal\' wel eens gebruikt, al is dat niet terecht. Wat ik ermee wil zeggen: maak het nou niet moeilijker dan het is\".\r\n\r\nFrank Koene, bijna 34 jaar en een typisch product van Amsterdam. De jongste speler op het hoogste vaderlandse niveau was hij bij Giants in Diemen, als vijftienjarige. Verder was hij een aantal seizoenen actief bij Kinheim en bouwde hij af bij HCAW. Als honkballer had Koene een reputatie als zuiger. Je kon de Amsterdammer geen groter plezier doen dan als tegenstander in te gaan op zijn verbale provocaties.\r\n\r\n\"Ik heb dat altijd nodig gehad en op latere leeftijd zelfs meer dan in het begin. Ik ben, denk ik, wel een typische gozer met inderdaad een grote bek Maar, ik bedoel het altijd goed he, vergis je niet. Alles had ik als speler over voor mijn team. Je hebt mensen die altijd poeslief praten over van alles en iedereen, maar als het erop aankomt je een mes in je rug steken. Ik hou dan meer van het type dat je de dingen recht in je gezicht zegt. Geef mij ook maar iemand als Ron Jaarsma. Hij zegt tien keer wat en dan is het negen keer goed en een keer heel fout. Aan iemand die niets zegt, heb je helemaal niks. Ik heb door de jaren heen heel wat ruzie gehad met Ron, hij heeft me zelfs een keer uit zo\'n vip-box gekegeld,. maar dat waren we een dag later ook weer kwijt Dan dronken we gewoon weer een biertje. Ik wil dat er straks in het team ook zo\'n sfeer ontstaat. Je kunt elkaar de waarheid zeggen en dan valt er eerder het woord \'klootzak\' dan \'schatje\', maar het moet met als een persoonlijke aanval worden beschouwd.\r\n\r\nOntevreden\r\n\r\nKoene, docent lichamelijke opvoeding op een Dalton-school in de hoofdstad, was de voorbije zomer geen blije assistent. Voor de play-offs liet hij aan Jaarsma doorschemeren ermee te stoppen. \"Allereerst was ik ontevreden over mijn inbreng. Ik sprak wel met Daniels over een aantal zaken, maar in de praktijk zag ik er weinig van terug. En verder functioneerde HCAW als sportploeg heel anders dan wat ik voor ogen heb. Sfeer en saamhorigheid zijn volgens mij heel belangrijk. Die waren vorig seizoen ver te zoeken\". Toen Daniels verkondigde dat hij aan z\'n laatste seizoen bezig was in Bussum-zuid, kwam de clubleiding toch enigszins verrassend uit bij Koene, die als honkballer natuurlijk een grote staat van dienst heeft, maar als coach een groentje is. \"Ja, je kunt inderdaad wel stellen dat ik in het diepe ben gegooid. Wat voor coach ik volgens mezelf ben? In ieder geval niet eentje die met een lange lijst van regels werkt. Ik heb in al die jaren heel wat coaches meegemaakt en er werd altijd van alles afgesproken. Maar in de praktijk kwam er niets van terecht. Je zet ergens een sanctie op, lemand overtreedt de regels en wat volgt is een waarschuwing. En nog een. En nog een. Dan verlies je je geloofwaardigheid. Dus: geen regels. Op tijd komen en je best doen. De spelers moeten zelf de verantwoordelijkheid nemen\".\r\n\r\nHet lijkt allemaal wat erg simplistisch, maar Koene weet vanzelfsprekend heel veel over het spelletje. Alleen gelooft de Amsterdammer er vast in dat sfeer en teamgeest voor een sportploeg eigenlijk belangrijker zijn dan een A 4\'tje met allerlei regels. \"Als speler van HCAW ging ik altijd wat eerder van het veld Om in de kantine een maaltijd te koken voor mijn medespelers. Dat vind ik nou belangrijk. Na afloop van de training gezellig ouwehoeren. Ook over honkbal Pilsje erbij, lekker blijven hangen. Daar ontbrak het vorig jaar aan. Iedereen was zo vertrokken. Dat kan toch niet? Je bent een hele zomer lang vier, vijf dagen per week met elkaar bezig. Dan moet je toch gein hebben? Dat is toch de basis?\"\r\n\r\nSimplistisch\r\n\r\nKoene heeft de eerste tegenslag als hoofdcoach al moeten slikken. Patrick de Lange, Neerlands beste werper vorig jaar, heeft zijn pijnlijke arm onlangs laten onderzoeken. Een - inmiddels gemaakte - MRI-scan moet uitwijzen hoe ernstig de zaak is. Daarnaast bestaan er twijfels over de inzetbaarheid van de teruggekeerde Jurriaan Lobbezoo. \"De arm van Lobbezoo is in principe heel Maar die jongen heeft veertien maanden niet gegooid. Bij belasting krijgt hij pijn. Ik hoop dat dat een soort stijfheid is en dat hij daar doorheen komt. Ook mentaal moet hij zich nog oprichten. De Lange heeft na een zwaar seizoen met een WK aan het slot veel geklust in zijn nieuwe huis en ik vermoed dat de arm te weinig rust heeft gehad. Misschien valt het mee, laten we het hopen. Alleen is het wel zo dat, als het straks in september om de knikkers gaat, minimaal een van de twee er dan bij moet zijn. Wil je tenminste een redelijke kans op succes hebben. Zijn beiden het hele seizoen uitgeschakeld, dan moeten we misschien wel gaan denken aan een \'yank\'. Maar daar hebben we nog wel even de tijd voor\".\r\n", is_featured=0, created_at="2007-08-25 00:00:00", updated_by="ADMIN", updated_at="2021-02-09 00:00:00" WHERE idarticle = 2;
UPDATE articles SET idsource=2, nryear=2002, dtpublish="2002-04-08", nmauthor="door onze medewerker", fttitle1="HCAW toont tegen Neptunus wel aggressie", fttitle2="Bussumers winnen in Rotterdam na eerste duel thuis te hebben verloren", fttitle3="NULL", cdtype="NULL", ftarticle="BUSSUM, ROTTERDAM - \"Eindelijk zat er dan emotie in het spel\", glimlachte Frank Koene na afloop van het eerste weekend in het nieuwe honkbalseizoen. De HCAW-coach zag zijn pupillen met veel overtuiging en strijd het twee keer opnemen tegen Neptunus. Thuis verloren de Bussumers enigszins ongelukkig met 0-4 in tien innings. Gisteren revancheerde HCAW zich knap door de landskampioen op een 4-8-nederIaag te trakteren in Rotterdam.\r\n\r\nVorige week nog had Koene flink de balen van de matte houding van sommige van zijn spelers tijdens het Urbanus-toernooi. \"Die instelling zit toch een beetje in deze groep. Dat is nou eenmaal zo. Ik heb een paar jongens daarover even apart gesproken. Nee, namen doen er niet toe. Dat is niet belangrijk\". De ergernis van Koene en zijn onderonsjes met enkele spelers hadden het gewenste effect, want zaterdag stonden de Bussumers scherp aan de start van de competitie.\r\n\r\nIn de zesde inning kwam Neptunus dichtbij een punt. Roel Koolen belandde op het eerste honk na een slordigheid van kortestop Gino Henson. Hierna haalde Koene Draijer van de heuvel. \"Dave gooide een ijzersterke partij. Hij zat er helemaal in. Maar hij was op dat moment gewoon op\". Albert van Vuure loste Draijer al. Die kwam gelijk in de problemen toen Jeroen Sluyter een opofferingsstootslag neerlegde om Koolen op twee te krijgen. Van Vuure probeerde Koolen van twee af te kegelen, maar de bal kwam te laat in de handschoen van Henson, Met een en twee bezet legde Michael Benner ook een stootslag neer. Zelf sneuvelde de Neptuniaan, maar zowel Koolen als Sluyter schoven een kussen op. Vervolgens produceerde Rutger Veugelers een slap rollertje richting derde honkman Jurjan Koenen. Koolen zette de sprint in vanaf het derde honk richting thuis. Koenen reageerde vlug en smeet de bal naar catcher Nick Fridsma die Koolen zonder moeite uittikte. Van Vuure redde HCAW daarna uit de inning door Melfried Comenencia met drie slag aan de kant te zetten.\r\n\r\nGegrabbel\r\n\r\nHCAW verprutste zijn enige kans tot scoren in de achtste slagbeurt. Bas de Jong timmerde de bal weg voor een honkslag en kwam op twee dankzij een foute pick-off van Tom Becker. Koene gaf hierna Fridsma het teken om De Jong met een stootslag naar drie te helpen. Maar Fridsma legde de bal zo neer dat Becker gemakkelijk De Jong van drie af kon smijten. In de tiende inning viel de beslissing. Dirk van \'t Klooster haalde het eerste honk na gegrabbel van tweede honkman Lars Koehorst. Neptunus kreeg het tweede en derde kussen bezet door een tik van Percy Isenia en een fout van outfielder De Jong. Van Kampen gaf hierna Evert Jan \'t Hoen vier wijd in de hoop bij de volgende actie een dubbelspel te maken. Helaas voor HCAW sloeg Ken Brauckmiller de bal niet in de dubbel, maar timmerde hij met een driehonkslag de kussens leeg: 0-3.\r\n\r\nBrauckmiller haalde de thuisplaat op een hit van Koolen: 0-4. Koene bleef met een dubbel gevoel zitten. \"Het was een fantastische wedstrijd om te zien. Alleen is het pijnlijk dat we op zo\'n manier verliezen. De pitching was goed. Maar ja, als je niks slaat, win je nooit\".\r\n\r\nIn het uitduel raakte de Bussumse slagmachine wel op dreef. Internationals Eelco Jansen, Erik Remmerswaal en Erik de Rijcke konden de Bussumers niet afstoppen. In de zevende inning liep HCAW uit naar 1-3 dankzij hits van Fridsma en Ronald Jaarsma. Een slagbeurt later kwam daar een puntje bij na klappen van Koenen, De Jong en Quincy Bemardus: 1-4. Koenen veegde in de negende inning de honken leeg met een keurige tweehonkslag: 1-7. Op een blunder van kortestop Sluyter kon Koenen over de thuisplaat snellen: 1-8.\r\n\r\nIn de gelijkmakende negende inning werd het nog even benauwd voor HCAW. Werper Jeroen Deken had de slagploeg van Neptunus acht innings lang volledig in zijn zak zitten. Maar in die laatste inning kreeg hij het moeilijk. Neptunus scoorde een punt en kreeg twee honken bezet. \"Jeroen had meer dan honderddertig ballen gegooid. Dat is eigenlijk veel te veel. Eigenlijk ga je dan een beetje te ver. Maar ik gunde het hem om die partij helemaal uit te gooien. Toch moest ik Jeroen vervangen, want ik moet ook zuinig op hem zijn\". Closer Van Kampen hield de schade beperkt 4-8. Koene was dik tevreden met de puntendeling. \"Vooraf had ik gedacht het heel moeilijk te krijgen met Neptunus gezien onze pitchersproblemen (langdurige blessures Patrick de Lange en Jurriaan Lobbezoo, red.). Maar dan zie ik twee superpotjes honkbal en hou ik gewoon een lekker gevoel over aan dit weekend\".\r\n\r\nWerpcijfers zaterdag HCAW: Dave Draijer (6 inn. + 1) 8-2-2-2; Albert van Vuure (3 1/3 inn.+ 1) 1-2-0-1; Michiel van Kampen (4\r\nman) 0-1-3-1; Jeffrey Cranston (2/3 inn) 2-1-0-0. Neptunus: Rob Cordemans (5 inn.) 4-2-1-0; Tom Becker (5 inn.) 3-1-1-1. \r\n\r\nGisteren HCAW: Jeroen Deken (8 1/3 inn. + 2) 7-2-6-1; Michiel van Kampen (2/3 inn.) 2-0-1-0. \r\n Neptunus: Eelco Jansen (3 inn.) 4-3-5-0; Erik Remmerswaal (4 inn.) 0-1-3-1; Erik de Rijcke (2 inn.) 2-2-5-1. Overige uitslagen\r\n\r\nzaterdag \r\nPirates-Pioniers 7-0,\r\nTornado\'s-Almere 7-3, \r\nSparta - Kinheim 1-11, RCH-PSV 1-4.\r\nGisteren:\r\nPionies-Pirates 2-1,\r\nAlmere-Tomado\'s 5-7, \r\nKinheim-Sparta 3-0, \r\nPSV-RCH 10-0.\r\n\r\nStand: 1. Kinheim, PSV en Tornado\'s 2-4,4. HCAW, Neptunus, Pioniers en Pirates 2-2, 8. Almere, RCH en Sparta 2-0.\r\n", is_featured=0, created_at="2007-08-25 00:00:00", updated_by="ADMIN", updated_at="2021-02-09 06:02:26" WHERE idarticle = 5;
UPDATE articles SET idsource=8, nryear=2002, dtpublish="2002-04-13", nmauthor="MIKE VAN DAMME en CURT SIMONS", fttitle1="Samenwerken met Amerikanen: Je kunt ook zonder", fttitle2="NULL", fttitle3="NULL", cdtype="NULL", ftarticle="AMSTERDAM - Het klinkt mooi voor een honkbalclub een samenwerkingsverband met een team uit de Major League (MLB) de profcompetitie in de Verenigde Staten. Maar wat eerder de Amsterdam Pirates ondervonden zal dit keer de honkballers van Almere parten kunnen pelen. Materiaal kan geregeld worden maar versterking uit het beloofde land blijft voorlopig uit.\r\n\r\nDe Montreal Expos, dat op het punt staat opgeheven te worden vanwege grote financiële verliezen, had een vierjarig contract met de Pirates en zou vanaf dit seizoen in zee gaan met Almere 90 Deze veranderingen hadden niets met sportieve doeleinden te maken maar kwam alleen tot stand omdat Chicho Jesserun scout van de Expos de overstap als coach van de Pirates maakte naar Almere 90 waar hij sinds dit seizoen technisch directeur is. \r\n\r\nDe Expos werden door eigenaar Jeffrey Lona eind februari van de hand gedaan en hij kocht daarop de Florida Marlins Gevolg general manager Fred Perrein verhuisde met Jesserun en het samenwerkingsverband naar de Marlins. \r\n\r\nEen ander team, maar dezelfde misère. Ook de Marlins lijden verlies en stellen daardoor sportief - de beste spelers worden verkocht - niet veel meer voor.\r\n\r\nHet niveau ligt laag en de spelers die zelfs dat niet halen krijgen een ticket naar Nederland. Veel talent hoeft Almere 90 dus niet te verwachten.\r\nEen situatie die de Pirates dat vierjaar met de Expos een overeenkomst had, niet onbekend is. \"We hebben wel spelers gekregen maar geen van hen kon het verschil maken,\" zegt Pirates-voorzitter Henk Eppinga. Almere dat aan het begin staat van een driejarige overeenkomst - voorzitter Wynand Riemslag was deze week in de VS om de laatste plooien glad te strijken - krijgt nu al met hetzelfde probleem te maken. Zo werd de Venezolaanse pitcher Keino Perez aangeboden door de Marlins, maar hij weet voorlopig niet te overtuigen in Almere.\r\n\r\n\"Perez kan edit wel gooien.\", zegt pitcher-coach Peter Callenbach (39). Alleen presteert hij nog niet constant. Callenbach zegt zich verder niet bezig te houden met de samenwerking. Vergaderingen over het onderwerp heeft hij nooit bezocht. Maakt hem ook niet uit. Toch door de komst van Perez heeft Callenbach meteen kunnen ondervinden wat de gevolgen kunnen zijn. Het ontbreken van een goede pitcher betekent dat hij zelf gedwongen is om te blijven spelen ondanks zijn fysieke gesteldheid. Zijn enkel en knie hebben het zonder honkbal al zwaar te verduren. Zelfs trappenlopen doet pijn. Op het hoogste niveau honkballen lijkt dan helemaal niet meer verantwoord. \"Het valt wel mee,\"\r\n\r\nzegt Callenbach. \"Vraag me niet om honderd blokjes om mijn huis te lopen dat gaat niet meer. Maar honderdtachtig ballen gooien, lukt nog wel aardig.\" \r\nToen Callenbach vorige week in de eerste wedstrijd tegen Tornado\'s uit Den Haag na honderd ballen werd afgelost door Perez stond Almere met 3-1 voor . De wedstrijd ging echter met 7-3 verloren. \"Die jongen wordt natuurlijk niet naar Nederland gestuurd om de bank warm te houden,\" zegt Callenbach. \r\nDe ambities bij Almere zijn groot. Gedacht wordt aan een plaatsje bij de bovenste zes,. maar dat zal niet meevallen met zo weinig behoorlijke pitchers binnen de selectie. Ambities hebben is toch al moeilijk wanneer je in zee gaat met een Amerikaans team. Ook dat ondervonden de Pirates. \"Elk jaar werd er gekeken of het nut had om door te gaan, waardoor we geen langdurige plannen konden maken,\" aldus Eppinga. Goed voorbeeld van die korte termijn politiek is de handelswijze van Perreira, volgens Eppinga. \"We hadden een afspraak voor contractverlenging, die hij op het laatste moment afzegde, Stomverbaasd hoorde ik twee dagen later dat hij met Almere een deal had.\"\r\n\r\nEen samenwerking met een MLB-team klinkt wel leuk, maar of je daar als club veel profijt van hebt is nog maar de vraag. Eppinga \"Een ding heeft de samenwerking mij geleerd, je kunt ook makkelljk zonder.\"\r\n", is_featured=0, created_at="2007-08-25 00:00:00", updated_by="ADMIN", updated_at="2021-02-09 06:02:26" WHERE idarticle = 7;
UPDATE articles SET idsource=2, nryear=2002, dtpublish="2002-04-20", nmauthor="NULL", fttitle1="Profiel Micky Jansen", fttitle2="NULL", fttitle3="NULL", cdtype="NULL", ftarticle="Hoe bevalt jullie nieuwe coach Lloyd Todman?\r\nHeel goed. Vooral de agressiviteit die hij erin brengt. Zijn felle manier van coachen kan het team heel goed gebruiken. We waren de laatste twee jaar een beetje ingedut en de boel wordt nu wakker geschud.\r\n\r\nIn 1997 was HCAW voor het laatst Iandskampioen. Wanneer weer?\r\nDit seizoen! Het zit er absoluut in, omdat we beter zijn dan de rest. We zijn nu ook veel meer een team dan vorig jaar.\r\n\r\nJij bent verreweg de Jongste. Voelt dat ook zo?\r\nVorig jaar, toen ik op mijn vijftiende mijn debuut maakte, wel. Nu niet meer. Ook a! is de op een na jongste vijf, zes jaar ouder. 1k voel me een volwaardig lid van het team. 1k vind het helemaal te gek.\r\n\r\nSoftbalhumor\r\nTijdens het paasweekeinde waren we met de ploeg in Enschede en toen hebben we met Lloyd wat 1-aprilgrappen uitgehaald. Een condoom opgehangen aan zijn deurkruk en een knoop in zijn kieren gemaakt. Hij moest er gelukkig hard om lachen.\r\n\r\nPersonalia Micky Lisa Jansen.\r\nWoonplaats: Hilversum. Geboren: 29 april 1985. Studie: 5vwo op het Alberdingk Thijm College in Hilversum. Sport:\r\nsoftbalster bij HCAW.\r\n\r\nOm te huilen\r\nOnterecht verliezen.\r\n\r\nOm te lachen\r\nMijn vader, hij is een beetje gek en grappig.\r\n\r\nVan welke sport houd je niet?\r\nKorfbal.\r\n\r\nWat zou je graag willen? \r\nKampioen worden en in Oranje spelen. De top in het softbal bereiken dus.\r\n\r\nNooit meer\r\nGeen idee. Ik heb nog geen zware tijden doorgemaakt.\r\n\r\nHeld\r\nAnouk Mels, voormalig HCAWspeelster, ex-international en mijn oude coach.\r\n\r\nBij wie krommen je tenen? \r\nBij vieze, handtastelijke mannetjes in de kroeg.\r\n\r\nSlechte gewoonte\r\nIk blijf vaak te lang in bed liggen.\r\n\r\nBeste eigenschap\r\n1k ben vaak vrolijk.\r\n\r\nOp wie ben je jaloers? Op niemand. Ik ben wel happy zo.\r\n\r\nMoment van grootste triomf?\r\nNu, omdat ik op mijn zestiende in het eerste van HCAW speel.\r\n\r\nBlunder\r\nTijdens de finale van het NKjunioren tegen Onze Gezellen struikelde ik zomaar, terwijl de bal totaal niet in de buurt was.\r\n\r\nEen dag de macht\r\nDan zou ik er voor iedereen een heel groot feest van maken.\r\n\r\nFavoriet gerecht\r\nIk ben gek op eten, maar vooral op pizza.\r\n\r\nWat vind je van het uitgaansleven in Hilversum?\r\nGezellig, vooral kroegen op de Groest als Flater, De Doelen en Upside Down. Maar ik ga alleen in de winter spetterend uit. Nu gaat het softbal voor.\r\n\r\n", is_featured=0, created_at="2007-08-25 00:00:00", updated_by="ADMIN", updated_at="2021-02-09 06:04:13" WHERE idarticle = 62;
UPDATE articles SET idsource=2, nryear=2004, dtpublish="2004-01-27", nmauthor="NULL", fttitle1="Honkballers oefenen op Curaçao", fttitle2="NULL", fttitle3="NULL", cdtype="HB", ftarticle="NIEUWEGEIN - Het Nederlandse honkbalteam houdt in de voorbereiding op de Olympische Spelen in augustus een oefenstage op Curaçao. Het team vertrekt op 30 januari naar het eiland en zal op 8 februari terugkeren in Nederland.\r\n \r\nBondscoach Robert Eenhoorn neemt een ruime selectie mee naar Curaçao, die bestaat uit tien pitchers, drie catchers en dertien veldspelers. Pitcher Ferenc Jongejan (Iowa Cubs) en veldspeler Dirk van \'t Klooster (Neptunus) ontbreken wegens blessures, Rogear Bernardina (Montreal Expos) is nieuw bij de ploeg. Tijdens het verblijf op Curaçao staan oefenwedstrijden, trainingen en enkele clinics op het programma. \r\n\r\nHieronder volgt de volledige selectie. Pitchers: Beljaards, Duko Jansen (Kinheim), Cordemans, Eelco Jansen (Neptunus), Van Doornspeek, Kops (Pioniers), Drayer, De Lange (HCAW) Maduro (Newark Bears), Smit (Minnesota Twins). Catchers: Benner (Neptunus), De Jong (HCAW), Chairon Isenia (Tampa Bay). Binnenvelders: Adriana (Mexico), Coffie (Cleveland Indians), DeCaster (Pittsburgh Pirates), Rooi (Montreal Expos), \'t Hoen, Percy Isenia, Legito (Neptunus). Buitenvelders: Bernardina, Rombley (Montreal Expos), Engelhardt (Almere), Kingsale (San Diego Padres), Monte (Neptunus), Romney (Pioniers).\r\n", is_featured=0, created_at="2007-08-25 00:00:00", updated_by="ADMIN", updated_at="2021-02-09 00:00:00" WHERE idarticle = 157;
UPDATE articles SET idsource=19, nryear=1941, dtpublish="1941-05-23", nmauthor=NULL, fttitle1="Bussumsche club verloor met eere", fttitle2="HET ZILVEREN HANDSCHOEN-TOURNOOI", fttitle3=NULL, cdtype="HB", ftarticle="Op Hemelvaartsdag nam de H.C \'38 uit Bussum deel aan de voor de derde maal verspeelde serie wedstrijden in het Hilversumsche Sportpark om de Zilveren Handschoen.\r\n\r\nZooals wij reeds in onze voorbeschouwing voorspelden, hebben de Bussummers het niet tot een overwinning kunnen brengen, ofschoon zij dapper weerstand hebben geboden aan hun sterke tegenstanders.\r\n\r\nVan den winnaar van hun groep, Blauw-Wit, werd met slechts 7-1 verloren.\r\n\r\nZaterdagmiddag om 4 uur treedt H.C. \'38 aan voor den eersten competitiewedstrijd tegen D.O.S. II in de Zanderij. Dit kan een Bussumsche overwinning worden. Maar dan moet er worden aangepakt. Wij hopen dat de lessen, die de spelers op Hemelvaartsdag van de eerste klassers gekregen hebben, haar nut zullen hebben en nu evengoed in toepassing zullen worden gebracht.", is_featured=0, created_at="2007-04-24 00:00:00", updated_by="ADMIN", updated_at="2021-02-11 14:20:00" WHERE idarticle = 4018;
UPDATE articles SET idsource=19, nryear=1941, dtpublish="1941-06-10", nmauthor=NULL, fttitle1="NEPHIETEN - H.C. \'38", fttitle2=NULL, fttitle3=NULL, cdtype="HB", ftarticle="Zaterdag om vier uur speelt de H.C. \'38 haar tweeden thuiswedstrijd en ook dezen keer moet het tegen Utrechtenaren worden opgenomen. De Nephieten zijn Bussums gasten.\r\n\r\nWij hebben aan deze ploeg een prettige herinnering door den wedstrijd van twee jaar geleden op \'t Sportpark-Zuid, toen een viertal Amerikanen de drijfkracht der vereeniging vormden.\r\n\r\nHoe de ploeg nu in \'t veld zal verschijnen is ons onbekend. Daar zij ook reeds eenige overwinningen geboekt heeft, is oppassen de boodschap. Aan een voorspelling zullen wij ons dan ook maar niet wagen. Dat het echter a.s. Zaterdag zal spannen in de Zanderij, dat gelooven wij zeer zeker en de Bussummers starten, aangemoedigd door â€˜t succes van de vorige week, met den vasten wil om te winnen! En dat zegt al heel wat!\r\n", is_featured=0, created_at="2007-04-24 00:00:00", updated_by="ADMIN", updated_at="2021-02-11 10:37:35" WHERE idarticle = 4021;
UPDATE articles SET idsource=19, nryear=1941, dtpublish="1941-07-04", nmauthor=NULL, fttitle1="H.C. \'38 - HILVERSUM II", fttitle2=NULL, fttitle3=NULL, cdtype="HB", ftarticle="Voor a.s. Zaterdag is de competitiewedstrijd H.C. \'38â€”Hilversum II vastgesteld. In Hilversum verloren onze plaatsgenooten met 15â€”12, zoodat, daar de Bussummers natuurlijk met revanche-gedachten zijn bezield, een spannende strijd tegemoet kan worden gezien.\r\n\r\nWel zijn de Hilversummers den laatsten tijd goed in vorm, getuige een 40â€”2 overwinning op de Nephieten, maar dat neemt toch niet weg, dat de H.C. \'38 zich van te voren niet geslagen behoeft te gevoelen.\r\n\r\nBovendien moet er zelfs gewonnen worden, wil men nog een kleine kans op de bovenste plaats behouden.\r\n\r\nDus H.C.\'ers, van het begin af aan aangepakt en je tegenstanders aan slag zoo weinig mogelijk kansen geven!\r\n\r\nDe wedstrijd wordt gespeeld in de Zanderij en vangt om 4 uur aan.", is_featured=0, created_at="2007-04-24 00:00:00", updated_by="ADMIN", updated_at="2021-02-11 10:36:50" WHERE idarticle = 4027;
UPDATE articles SET idsource=19, nryear=1941, dtpublish="1941-08-05", nmauthor=NULL, fttitle1="Spannende strijd", fttitle2="H C- \'38 - \'T GOOI 12-13", fttitle3=NULL, cdtype="HB", ftarticle="In onze voorbeschouwing voorspelden we reeds, hoewel voor beide partijen niets meer op het spel stond, dat de wedstrijd H.C. \'38â€”\'t Gooi toch nog wel de noodige spanning zou opleveren. Deze voorspelling is inderdaad juist gebleken.\r\n\r\nHet heeft de H.C. \'38 niet mogen gelukken haar laatste wedstrijd te winnen, alhoewel de uitslag net zoo goed andersom had kunnen zijn, wanneer we het vertoonde spel in oogenschouw nemen.\r\n\r\nBeide partijen gaven elkaar weinig toe en in het begin wist \'t Gooi de leiding te nemen, welke zij gedurende 4 innings behield. In de vijfde innings scoorde de H.C. \'38 echter vijf punten en nam de leiding over. De laatste innings verliepen onder hoogspanning, maar \'t Gooi wist de H.C. \'38 juist op het kritieke moment uit te schakelen.\r\n\r\nDe wedstrijd had het volgende verloop, \'t Was even over half vier toen de scheidsrechter â€žspelen\" riep en de H.C. \'38 zich met Verver op plaat, schrap zette. De 1ste inning leverde voor \'t Gooi, dank zij eenige veldfoutjes van de Bussummers, twee punten op. De eerste slagbeurt van de schrap zette. De 1ste inning leverde dan ook niets op. Er werd trouwens den geheelen wedstrijd snel gespeeld, hetgeen de aantrekkelijkheid ten zeerste verhoogde. De 2de inning bracht \'t Gooi niets op, terwijl de H.C. \'38 een man over de thuisplaat bracht, dank zij een keurigen 3en hurkslag van Cop, die op dezelfde manier nog net door een sliding het 3de honk wist te bereiken. De volgende man bracht hem toen binnen, \'t Gooi wist 3 menschen thuis te brengen en leidde na. de derde inning met 5â€”3. De vierde inning was voor beide werpers een succes, daar het niemand gelukte te scoren. \r\n\r\nIn de vijfde inning werd er door de H.C. \'38 aardig geslagen. Goede tikken van Cop, van Oene en van Eijden brachten verscheiden menschen binnen. Daartegenover wist \'t Gooi twee punten aan haar score toe te voegen, zoodat de H.C. \'38 na de vijfde inning met 8â€”7 voorstond. De volgende inning was weer dubbel blank en zoo gingen de laatste innings in, waarin dus nog van alles mogelijk was. In de 8ste inning wist \'t Gooi weer gelijk te maken en zelfs een voorsprong te nemen welke zij in de laatste inning tot 13â€”9 vergrootte. De H.C. \'38 ging nu voor de laatste maal aan slag en zag zich voor de taak geplaatst minstens 5 punten te scoren om te willen winnen.\r\n\r\nWeer werd er aardig geslagen, maar een goede gooi naar \'t eerste honk en, een. keurige vang brachten de H.C. \'38 spoedig twee nullen. Op een aardigen stootslag van Verver wist Damman binnen te komen en zoo werd de achterstand van 13â€”9 langzamerhand teruggebracht tot 13â€”12.\r\n\r\nMet 2 nullen en het derde honk bezet ging Nordeman aan slag. Spoedig stond hij op 2-slag, maar de derde slag werd tot een paar maal toe fout slagen, zoodat de Bussummers alle hoop hadden dat van Oene op het derde honk nog wel zou worden thuisgebracht, hetgeen de gelijkmaker beteekende. De volgende bal was weer goed, een tik... slagfout... de bal werd hoog in de richting van het derde honk geslagen waar Cohen op zijn post stond en door een goeden vang van de H.C. \'38 haar derde nul bezorgde en tevens de overwinning voor zijn club tot een feit maakte. Jammer voor de H.C.-ers, die ongetwijfeld aan slag, de meerdere van hun Hilversumsche rivalen waren. Zoo kwam dus het einde met 13â€”12 in het voordeel van \'t Gooi, van dezen interessanten strijd.\r\n\r\nDe inningscijfers zijn de volgende:\r\nH.C. \'38 ... 0 1 2 0 5 0 1 0 3 = 12 \r\n\'t Gooi . 2 0 3 0 2 0 1 2 3 = 13", is_featured=0, created_at="2007-04-24 00:00:00", updated_by="ADMIN", updated_at="2021-02-11 10:35:56" WHERE idarticle = 4036;
-- Inserts for the personarticles table --
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29217, 30050, 1, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29218, 30045, 17, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29219, 30041, 37, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29220, 30042, 37, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29221, 30043, 37, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29222, 30041, 39, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29223, 30044, 39, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29224, 30050, 68, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29225, 30045, 91, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29226, 30050, 169, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29227, 30049, 218, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29228, 987, 305, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29229, 30041, 326, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29230, 30043, 326, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29231, 30049, 344, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29232, 30050, 358, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29233, 30045, 376, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29234, 30050, 768, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29235, 30050, 790, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29236, 1058, 821, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29237, 1418, 859, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29238, 5210, 859, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29239, 21290, 1018, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29240, 21306, 1018, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29241, 21312, 1018, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29242, 21314, 1018, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29243, 21322, 1018, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29244, 21325, 1018, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29245, 21326, 1018, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29246, 21337, 1018, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29247, 21338, 1018, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29248, 21345, 1018, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29249, 21349, 1018, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29250, 21392, 1018, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29251, 21409, 1018, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29252, 21445, 1018, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29253, 21468, 1018, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29254, 284, 1019, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29255, 21288, 1019, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29256, 21290, 1019, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29257, 21306, 1019, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29258, 21307, 1019, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29259, 21314, 1019, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29260, 21316, 1019, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29261, 21319, 1019, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29262, 21322, 1019, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29263, 21326, 1019, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29264, 21330, 1019, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29265, 21333, 1019, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29266, 21334, 1019, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29267, 21349, 1019, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29268, 21353, 1019, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29269, 21355, 1019, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29270, 21362, 1019, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29271, 21364, 1019, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29272, 21366, 1019, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29273, 21373, 1019, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29274, 21375, 1019, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29275, 21379, 1019, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29276, 21382, 1019, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29277, 21395, 1019, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29278, 21396, 1019, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29279, 21401, 1019, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29280, 21409, 1019, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29281, 21411, 1019, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29282, 21416, 1019, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29283, 21445, 1019, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29284, 21449, 1019, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29285, 21481, 1019, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29286, 21574, 1019, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29287, 21318, 1021, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29288, 21319, 1021, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29289, 21322, 1021, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29290, 21326, 1021, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29291, 21330, 1021, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29292, 21333, 1021, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29293, 21334, 1021, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29294, 21335, 1021, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29295, 21341, 1021, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29296, 21347, 1021, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29297, 21351, 1021, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29298, 21355, 1021, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29299, 21362, 1021, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29300, 21375, 1021, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29301, 21409, 1021, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29302, 21412, 1021, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29303, 21416, 1021, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29304, 21445, 1021, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29305, 21470, 1021, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29306, 21373, 1023, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29307, 21597, 1023, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29308, 21000, 1024, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29309, 21016, 1024, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29310, 21032, 1024, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29311, 21033, 1024, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29312, 21036, 1024, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29313, 21041, 1024, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29314, 21046, 1024, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29315, 21048, 1024, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29316, 21052, 1024, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29317, 21395, 1024, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29318, 21445, 1024, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29319, 21449, 1024, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29320, 21486, 1024, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29321, 21496, 1024, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29322, 21502, 1024, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29323, 21512, 1024, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29324, 21513, 1024, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29325, 21518, 1024, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29326, 21532, 1024, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29327, 21537, 1024, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29328, 21549, 1024, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29329, 21557, 1024, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29330, 21576, 1024, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29331, 21606, 1024, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29332, 2044, 1025, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29333, 2054, 1025, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29334, 2077, 1025, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29335, 6142, 1025, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29336, 6158, 1025, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29337, 6170, 1025, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29338, 6189, 1025, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29339, 6208, 1025, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29340, 6210, 1025, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29341, 6213, 1025, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29342, 6242, 1025, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29343, 6244, 1025, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29344, 21032, 1025, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29345, 21033, 1025, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29346, 21036, 1025, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29347, 21048, 1025, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29348, 206, 1027, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29349, 21445, 1027, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29350, 21449, 1027, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29351, 21486, 1027, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29352, 21488, 1027, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29353, 21496, 1027, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29354, 21502, 1027, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29355, 21518, 1027, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29356, 21519, 1027, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29357, 21520, 1027, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29358, 21528, 1027, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29359, 21549, 1027, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29360, 21550, 1027, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29361, 21551, 1027, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29362, 21554, 1027, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29363, 21567, 1027, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29364, 21570, 1027, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29365, 21574, 1027, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29366, 21593, 1027, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29367, 21611, 1027, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29368, 21445, 1028, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29369, 21449, 1028, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29370, 21522, 1028, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29371, 21472, 1029, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29372, 21486, 1029, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29373, 21489, 1029, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29374, 21496, 1029, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29375, 21508, 1029, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29376, 21518, 1029, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29377, 21532, 1029, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29378, 21533, 1029, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29379, 21537, 1029, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29380, 21542, 1029, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29381, 21544, 1029, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29382, 21550, 1029, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29383, 21570, 1029, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29384, 21574, 1029, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29385, 21577, 1029, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29386, 21591, 1029, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29387, 21606, 1029, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29388, 21611, 1029, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29389, 21472, 1030, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29390, 21500, 1030, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29391, 21502, 1030, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29392, 21505, 1030, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29393, 21508, 1030, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29394, 21513, 1030, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29395, 21515, 1030, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29396, 21518, 1030, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29397, 21519, 1030, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29398, 21520, 1030, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29399, 21521, 1030, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29400, 21522, 1030, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29401, 21525, 1030, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29402, 21528, 1030, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29403, 21532, 1030, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29404, 21534, 1030, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29405, 21537, 1030, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29406, 21542, 1030, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29407, 21547, 1030, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29408, 21549, 1030, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29409, 21550, 1030, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29410, 21554, 1030, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29411, 21555, 1030, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29412, 21557, 1030, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29413, 21570, 1030, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29414, 21574, 1030, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29415, 21576, 1030, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29416, 21577, 1030, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29417, 21593, 1030, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29418, 21608, 1030, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29419, 21611, 1030, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29420, 21147, 1032, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29421, 21175, 1032, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29422, 21185, 1032, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29423, 21192, 1032, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29424, 21200, 1032, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29425, 21267, 1032, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29426, 21284, 1032, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29427, 21308, 1032, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29428, 21327, 1032, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29429, 21348, 1032, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29430, 21356, 1032, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29431, 21414, 1032, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29432, 21427, 1032, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29433, 21522, 1032, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29434, 21534, 1032, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29435, 21598, 1032, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29436, 21603, 1032, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29437, 21103, 1040, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29438, 365, 1044, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29439, 746, 1044, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29440, 1085, 1044, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29441, 1175, 1044, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29442, 1196, 1044, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29443, 1215, 1044, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29444, 1251, 1044, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29445, 1305, 1044, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29446, 2151, 1044, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29447, 2164, 1044, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29448, 4244, 1044, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29449, 4269, 1044, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29450, 5242, 1044, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29451, 5315, 1044, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29452, 1087, 1046, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29453, 1303, 1047, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29454, 30041, 1047, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29455, 1164, 1058, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29456, 1255, 1058, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29457, 1272, 1058, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29458, 1293, 1058, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29459, 1303, 1058, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29460, 1507, 1058, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29461, 1719, 1058, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29462, 1721, 1058, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29463, 1784, 1058, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29464, 1984, 1058, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29465, 1985, 1058, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29466, 2020, 1058, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29467, 5467, 1058, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29468, 4248, 1059, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29469, 4249, 1059, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29470, 567, 1060, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29471, 685, 1060, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29472, 776, 1060, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29473, 1202, 1060, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29474, 1434, 1060, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29475, 1438, 1060, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29476, 1562, 1060, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29477, 1598, 1060, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29478, 1601, 1060, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29479, 1696, 1060, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29480, 1704, 1060, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29481, 1787, 1060, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29482, 1928, 1060, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29483, 1962, 1060, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29484, 4154, 1060, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29485, 30041, 1060, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29486, 4041, 1061, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29487, 30047, 1064, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29488, 30048, 1064, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29489, 30049, 1064, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29490, 30050, 1064, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29491, 30051, 1064, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29492, 943, 1065, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29493, 963, 1065, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29494, 969, 1065, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29495, 978, 1065, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29496, 1020, 1065, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29497, 1070, 1065, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29498, 1071, 1065, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29499, 1081, 1065, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29500, 1087, 1065, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29501, 1268, 1065, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29502, 1383, 1065, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29503, 1384, 1065, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29504, 1385, 1065, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29505, 1747, 1065, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29506, 2220, 1065, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29507, 5077, 1065, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29508, 1602, 1066, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29509, 1633, 1066, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29510, 1640, 1066, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29511, 1679, 1066, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29512, 1696, 1066, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29513, 5237, 1066, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29514, 1309, 1067, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29515, 263, 1069, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29516, 5460, 1069, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29517, 21019, 1069, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29518, 109, 1070, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29519, 144, 1070, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29520, 1011, 1070, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29521, 1164, 1070, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29522, 1165, 1070, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29523, 1175, 1070, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29524, 1196, 1070, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29525, 1260, 1070, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29526, 1273, 1070, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29527, 1274, 1070, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29528, 1277, 1070, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29529, 1289, 1070, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29530, 1293, 1070, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29531, 3639, 1070, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29532, 3687, 1070, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29533, 3826, 1070, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29534, 5467, 1070, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29535, 5478, 1070, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29536, 21019, 1070, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29537, 360, 1077, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29538, 587, 1077, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29539, 1097, 1077, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29540, 1132, 1077, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29541, 1626, 1077, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29542, 3198, 1077, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29543, 3638, 1077, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29544, 5134, 1077, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29545, 5459, 1077, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29546, 5461, 1077, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29547, 5864, 1077, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29548, 21244, 1077, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29549, 1232, 1079, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29550, 1294, 1079, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29551, 2021, 1079, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29552, 3109, 1079, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29553, 4159, 1079, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29554, 1272, 1080, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29555, 1303, 1081, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29556, 263, 1083, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29557, 860, 1083, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29558, 1165, 1083, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29559, 1170, 1083, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29560, 1221, 1083, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29561, 1222, 1083, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29562, 1389, 1083, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29563, 1428, 1083, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29564, 1550, 1083, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29565, 1793, 1083, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29566, 3742, 1083, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29567, 3984, 1083, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29568, 5913, 1083, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29569, 3004, 1086, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29570, 3151, 1086, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
INSERT INTO personarticles (idarticleperson, idarticle, idperson, cdmanually, created_at, updated_by, updated_at)
 VALUES (29571, 5317, 1086, 0, "2021-02-11 20:18:22", "ADMIN", NULL);
-- Inserts for the photos table --
INSERT INTO photos (idphoto, idsource, nmphotographer, nrorder, nryear, dtpublish, idoriginal, idmugshot, idaction, idteamphoto, ftdepicted, ftdescription, is_featured, created_at, updated_by, updated_at)
 VALUES (3100713, 5, NULL, NULL, 1961, "1961-10-04", 0, 1, 0, 0, "Han Urbanus", NULL, 0, "2021-02-07 11:39:25", "ADMIN", NULL);
INSERT INTO photos (idphoto, idsource, nmphotographer, nrorder, nryear, dtpublish, idoriginal, idmugshot, idaction, idteamphoto, ftdepicted, ftdescription, is_featured, created_at, updated_by, updated_at)
 VALUES (3100714, 5, NULL, NULL, 1961, "1961-10-04", 0, 1, 0, 0, "Herman Beidschat", NULL, 0, "2021-02-07 11:39:25", "ADMIN", NULL);
INSERT INTO photos (idphoto, idsource, nmphotographer, nrorder, nryear, dtpublish, idoriginal, idmugshot, idaction, idteamphoto, ftdepicted, ftdescription, is_featured, created_at, updated_by, updated_at)
 VALUES (3100715, 5, NULL, NULL, 1961, "1961-10-04", 0, 0, 0, 0, NULL, NULL, 0, "2021-02-07 11:39:52", "ADMIN", NULL);
INSERT INTO photos (idphoto, idsource, nmphotographer, nrorder, nryear, dtpublish, idoriginal, idmugshot, idaction, idteamphoto, ftdepicted, ftdescription, is_featured, created_at, updated_by, updated_at)
 VALUES (3100716, 51, NULL, NULL, 1962, "1962-07-27", 0, 1, 1, 0, "Han Urbanus", NULL, 0, "2021-02-08 21:20:57", "ADMIN", NULL);
INSERT INTO photos (idphoto, idsource, nmphotographer, nrorder, nryear, dtpublish, idoriginal, idmugshot, idaction, idteamphoto, ftdepicted, ftdescription, is_featured, created_at, updated_by, updated_at)
 VALUES (3100717, 8, "GEORGE VERBERNE", NULL, 1976, "1976-05-04", 0, 1, 0, 0, "Loek Loevendie", NULL, 0, "2021-02-09 17:38:57", "ADMIN", NULL);
INSERT INTO photos (idphoto, idsource, nmphotographer, nrorder, nryear, dtpublish, idoriginal, idmugshot, idaction, idteamphoto, ftdepicted, ftdescription, is_featured, created_at, updated_by, updated_at)
 VALUES (3100718, 8, "GEORGE VERBERNE", NULL, 1976, "1976-05-04", 0, 0, 0, 0, NULL, NULL, 0, "2021-02-09 17:43:23", "ADMIN", NULL);
INSERT INTO photos (idphoto, idsource, nmphotographer, nrorder, nryear, dtpublish, idoriginal, idmugshot, idaction, idteamphoto, ftdepicted, ftdescription, is_featured, created_at, updated_by, updated_at)
 VALUES (3100719, 8, "GEORGE VERBERNE", NULL, 1976, "1976-05-04", 0, 0, 0, 0, NULL, NULL, 0, "2021-02-09 17:43:51", "ADMIN", NULL);
INSERT INTO photos (idphoto, idsource, nmphotographer, nrorder, nryear, dtpublish, idoriginal, idmugshot, idaction, idteamphoto, ftdepicted, ftdescription, is_featured, created_at, updated_by, updated_at)
 VALUES (3100720, 8, "GEORGE VERBERNE", NULL, 1981, "1981-05-22", 0, 0, 0, 0, "Loek Loevendie", NULL, 0, "2021-02-09 18:05:26", "ADMIN", NULL);
-- Inserts for the articlephotos table --
INSERT INTO articlephotos (idarticlephoto, idarticle, idphoto, ftdescription, created_at, updated_by, updated_at)
 VALUES (2578, 30041, 3100713, "Han Urbanus\r\n\"Meest waardevol\"", "2021-02-07 11:48:17", "ADMIN", NULL);
INSERT INTO articlephotos (idarticlephoto, idarticle, idphoto, ftdescription, created_at, updated_by, updated_at)
 VALUES (2579, 30041, 3100714, "Beidschat: de beste werper", "2021-02-07 11:48:17", "ADMIN", NULL);
INSERT INTO articlephotos (idarticlephoto, idarticle, idphoto, ftdescription, created_at, updated_by, updated_at)
 VALUES (2580, 30041, 3100715, "tabel", "2021-02-07 11:48:48", "ADMIN", NULL);
INSERT INTO articlephotos (idarticlephoto, idarticle, idphoto, ftdescription, created_at, updated_by, updated_at)
 VALUES (2581, 30043, 3100716, "Han Urbanus", "2021-02-08 21:23:07", "ADMIN", NULL);
INSERT INTO articlephotos (idarticlephoto, idarticle, idphoto, ftdescription, created_at, updated_by, updated_at)
 VALUES (2582, 30051, 3100717, "LOEK LOEVENDIE\r\n... erkenning ...", "2021-02-09 17:59:44", "ADMIN", NULL);
INSERT INTO articlephotos (idarticlephoto, idarticle, idphoto, ftdescription, created_at, updated_by, updated_at)
 VALUES (2583, 30051, 3100718, "Als de spanning te veel wordt", "2021-02-09 18:01:09", "ADMIN", NULL);
INSERT INTO articlephotos (idarticlephoto, idarticle, idphoto, ftdescription, created_at, updated_by, updated_at)
 VALUES (2584, 30051, 3100719, "Mag ik nu slaan, scheidsrechter?", "2021-02-09 18:01:46", "ADMIN", NULL);
INSERT INTO articlephotos (idarticlephoto, idarticle, idphoto, ftdescription, created_at, updated_by, updated_at)
 VALUES (2585, 30049, 3100720, "LOEK LOEVENDIE bezig met de training van dePirates-jeugd", "2021-02-09 18:08:36", "ADMIN", NULL);
-- Inserts for the personphotos table --
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (1939, 432, 3100337, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (1940, 2, 3100540, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (1941, 286, 3100701, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (1942, 1005, 3100569, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (1943, 1005, 3100611, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (1944, 1005, 3100617, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (1945, 443, 3100204, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (1946, 443, 3100205, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (1947, 443, 3100268, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (1948, 443, 3100697, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (1949, 443, 3100698, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (1950, 975, 3100600, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (1951, 975, 3100653, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (1952, 1012, 3100338, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (1953, 444, 3100183, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (1954, 444, 3100377, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (1955, 447, 3100301, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (1956, 450, 3100378, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (1957, 1044, 621, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (1958, 416, 3100323, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (1959, 416, 3100429, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (1960, 416, 3100435, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (1961, 416, 3100454, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (1962, 416, 3100474, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (1963, 416, 3100560, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (1964, 1077, 3100501, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (1965, 10, 3100288, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (1966, 459, 3100697, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (1967, 459, 3100698, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (1968, 279, 3100195, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (1969, 279, 3100331, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (1970, 279, 3100386, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (1971, 279, 3100393, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (1972, 279, 3100412, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (1973, 279, 3100413, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (1974, 279, 3100414, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (1975, 463, 3100591, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (1976, 1024, 3100350, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (1977, 16, 3100194, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (1978, 139, 3100391, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (1979, 139, 3100458, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (1980, 488, 3100184, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (1981, 488, 3100217, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (1982, 488, 3100241, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (1983, 1013, 3100175, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (1984, 1013, 3100345, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (1985, 1013, 3100438, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (1986, 1013, 3100482, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (1987, 500, 3100210, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (1988, 500, 3100377, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (1989, 506, 3100270, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (1990, 264, 3100705, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (1991, 28, 3100445, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (1992, 29, 3100171, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (1993, 29, 3100332, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (1994, 29, 3100630, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (1995, 36, 3100219, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (1996, 36, 3100234, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (1997, 36, 3100401, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (1998, 1058, 933, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (1999, 37, 3100713, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2000, 37, 3100716, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2001, 421, 3100645, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2002, 1061, 216, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2003, 39, 3100714, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2004, 535, 3100697, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2005, 535, 3100698, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2006, 786, 3100486, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2007, 1006, 3100585, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2008, 546, 3100187, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2009, 546, 3100193, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2010, 546, 3100261, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2011, 546, 3100319, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2012, 546, 3100341, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2013, 546, 3100349, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2014, 546, 3100351, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2015, 546, 3100364, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2016, 550, 3100256, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2017, 1032, 3100272, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2018, 1032, 3100275, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2019, 47, 3100608, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2020, 284, 3100486, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2021, 558, 3100270, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2022, 979, 3100286, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2023, 979, 3100291, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2024, 979, 3100534, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2025, 572, 3100186, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2026, 572, 3100340, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2027, 1020, 3100293, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2028, 583, 3100632, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2029, 52, 3100565, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2030, 52, 3100616, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2031, 52, 3100623, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2032, 52, 3100627, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2033, 52, 3100709, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2034, 587, 3100242, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2035, 587, 3100342, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2036, 591, 3100660, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2037, 1028, 3100200, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2038, 599, 3100289, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2039, 599, 3100299, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2040, 599, 3100306, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2041, 599, 3100344, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2042, 599, 3100359, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2043, 599, 3100363, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2044, 599, 3100451, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2045, 599, 3100452, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2046, 974, 3100307, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2047, 974, 3100310, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2048, 974, 3100462, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2049, 974, 3100468, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2050, 974, 3100558, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2051, 974, 3100647, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2052, 974, 3100651, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2053, 974, 3100662, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2054, 611, 3100513, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2055, 611, 3100514, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2056, 611, 3100564, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2057, 1019, 3100360, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2058, 1019, 3100551, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2059, 614, 3100690, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2060, 615, 3100196, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2061, 615, 3100342, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2062, 1064, 3100717, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2063, 1064, 3100720, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2064, 370, 3100312, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2065, 370, 3100685, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2066, 628, 3100180, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2067, 636, 3100302, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2068, 636, 3100466, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2069, 1021, 3100314, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2070, 71, 3100347, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2071, 1000, 3100672, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2072, 1000, 3100679, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2073, 135, 3100677, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2074, 288, 3100687, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2075, 665, 3100342, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2076, 665, 3100362, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2077, 665, 3100697, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2078, 665, 3100698, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2079, 1074, 155, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2080, 1074, 374, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2081, 672, 3100342, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2082, 1027, 3100236, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2083, 87, 3100557, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2084, 165, 3100331, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2085, 165, 3100580, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2086, 696, 3100209, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2087, 696, 3100342, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2088, 696, 3100427, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2089, 696, 3100697, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2090, 696, 3100698, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2091, 1011, 3100490, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2092, 1016, 3100539, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2093, 1016, 3100697, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2094, 1016, 3100698, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2095, 1015, 3100482, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2096, 1015, 3100485, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2097, 1015, 3100491, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2098, 93, 3100332, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2099, 93, 3100565, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2100, 93, 3100629, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2101, 94, 3100394, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2102, 94, 3100643, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2103, 94, 3100673, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2104, 94, 3100696, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2105, 94, 3100704, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2106, 705, 3100261, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2107, 709, 3100223, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2108, 709, 3100232, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2109, 709, 3100240, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2110, 716, 3100260, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2111, 716, 3100378, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2112, 190, 3100626, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2113, 191, 3100384, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2114, 191, 3100598, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2115, 191, 3100610, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2116, 191, 3100630, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2117, 191, 3100707, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2118, 748, 3100374, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2119, 748, 3100377, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2120, 1018, 3100303, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2121, 1018, 3100318, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2122, 757, 3100291, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2123, 1014, 3100461, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2124, 1014, 3100482, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2125, 1014, 3100487, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);
INSERT INTO personphotos (idpersonphoto, idperson, idphoto, cdtype, cdmanually, created_at, updated_by, updated_at)
 VALUES (2126, 1014, 3100494, NULL, 0, "2021-02-11 20:18:23", "ADMIN", NULL);