start transaction;

/* Photos */
/* since we cant update the primary key we need to insert the new images at the correct place */
INSERT INTO `photos` (`idphoto`, `idsource`, `nmphotographer`, `nrorder`, `nryear`, `dtpublish`, `idoriginal`, `idmugshot`, `idaction`, `idteamphoto`, `ftdepicted`, `ftdescription`, `is_featured`, `created_at`, `updated_by`, `updated_at`) VALUES
(3100763, 5, NULL, NULL, 1961, '1961-10-04', 0, 1, 0, 0, 'Han Urbanus', NULL, 0, '2021-02-07 10:39:25', 'ADMIN', NULL),
(3100764, 5, NULL, NULL, 1961, '1961-10-04', 0, 1, 0, 0, 'Herman Beidschat', NULL, 0, '2021-02-07 10:39:25', 'ADMIN', NULL),
(3100765, 5, NULL, NULL, 1961, '1961-10-04', 0, 0, 0, 0, NULL, NULL, 0, '2021-02-07 10:39:52', 'ADMIN', NULL),
(3100766, 51, NULL, NULL, 1962, '1962-07-27', 0, 1, 1, 0, 'Han Urbanus', NULL, 0, '2021-02-08 20:20:57', 'ADMIN', NULL),
(3100767, 8, 'GEORGE VERBERNE', NULL, 1976, '1976-05-04', 0, 1, 0, 0, 'Loek Loevendie', NULL, 0, '2021-02-09 16:38:57', 'ADMIN', NULL),
(3100768, 8, 'GEORGE VERBERNE', NULL, 1976, '1976-05-04', 0, 0, 0, 0, NULL, NULL, 0, '2021-02-09 16:43:23', 'ADMIN', NULL),
(3100769, 8, 'GEORGE VERBERNE', NULL, 1976, '1976-05-04', 0, 0, 0, 0, NULL, NULL, 0, '2021-02-09 16:43:51', 'ADMIN', NULL),
(3100770, 8, 'GEORGE VERBERNE', NULL, 1981, '1981-05-22', 0, 0, 0, 0, 'Loek Loevendie', NULL, 0, '2021-02-09 17:05:26', 'ADMIN', NULL);

/* then we insert the articlephotos records */
update articlephotos set idphoto = 3100763 where idarticlephoto = 2578; 
update articlephotos set idphoto = 3100764 where idarticlephoto = 2579;
update articlephotos set idphoto = 3100765 where idarticlephoto = 2580;
update articlephotos set idphoto = 3100766 where idarticlephoto = 2581;
update articlephotos set idphoto = 3100767 where idarticlephoto = 2582;
update articlephotos set idphoto = 3100768 where idarticlephoto = 2583;
update articlephotos set idphoto = 3100769 where idarticlephoto = 2584;
update articlephotos set idphoto = 3100770 where idarticlephoto = 2585;

/* person photos */
/* we update the existing person photos*/
select * from personphotos where idpersonphoto in (1999, 2003, 2000, 2062, 2063);

update personphotos set idphoto = 3100763 where idpersonphoto = 1999;
update personphotos set idphoto = 3100764 where idpersonphoto= 2003;
update personphotos set idphoto = 3100766 where idpersonphoto= 2000;
update personphotos set idphoto = 3100767 where idpersonphoto= 2062;
update personphotos set idphoto = 3100770 where idpersonphoto= 2063;

select * from personphotos where idpersonphoto in (1999, 2003, 2000, 2062, 2063);


/* Photos */
/* delete the wrong photos */
select * from photos where idphoto >= 3100713;

delete from photos where idphoto = 3100713;
delete from photos where idphoto = 3100714;
delete from photos where idphoto = 3100715;
delete from photos where idphoto = 3100716;
delete from photos where idphoto = 3100717;
delete from photos where idphoto = 3100718;
delete from photos where idphoto = 3100719;
delete from photos where idphoto = 3100720;


/* finally we insert the hof records */
INSERT INTO `photos` (`idphoto`, `idsource`, `nmphotographer`, `nrorder`, `nryear`, `dtpublish`, `idoriginal`, `idmugshot`, `idaction`, `idteamphoto`, `ftdepicted`, `ftdescription`, `is_featured`, `created_at`, `updated_by`, `updated_at`) VALUES
(3100713, 3, NULL, NULL, NULL, NULL, 0, 1, 0, 0, 'Bill Arce', NULL, 0, '2019-03-24 07:21:22', 'info@honkbalmuseum.nl', NULL),
(3100714, 3, NULL, NULL, NULL, NULL, 0, 1, 0, 0, 'Dick Baas', NULL, 0, '2019-03-24 07:21:22', 'info@honkbalmuseum.nl', NULL),
(3100715, 3, NULL, NULL, NULL, NULL, 0, 1, 0, 0, 'M.C. Bakker', NULL, 0, '2019-03-24 07:21:22', 'info@honkbalmuseum.nl', NULL),
(3100716, 3, NULL, NULL, NULL, NULL, 0, 1, 0, 0, 'Albert Balink', NULL, 0, '2019-03-24 07:21:22', 'info@honkbalmuseum.nl', NULL),
(3100717, 3, NULL, NULL, NULL, NULL, 0, 1, 0, 0, 'Doets Beets', NULL, 0, '2019-03-24 07:21:22', 'info@honkbalmuseum.nl', NULL),
(3100718, 3, NULL, NULL, NULL, NULL, 0, 1, 0, 0, 'Herman Beidschat', NULL, 0, '2019-03-24 07:21:22', 'info@honkbalmuseum.nl', NULL),
(3100719, 3, NULL, NULL, NULL, NULL, 0, 1, 0, 0, 'Piet Besanger', NULL, 0, '2019-03-24 07:21:22', 'info@honkbalmuseum.nl', NULL),
(3100720, 3, NULL, NULL, NULL, NULL, 0, 1, 0, 0, 'Bep van Beijmerwerdt', NULL, 0, '2019-03-24 07:21:22', 'info@honkbalmuseum.nl', NULL),
(3100721, 3, NULL, NULL, NULL, NULL, 0, 1, 0, 0, 'Gé van Berkel', NULL, 0, '2019-03-24 07:21:22', 'info@honkbalmuseum.nl', NULL),
(3100722, 3, NULL, NULL, NULL, NULL, 0, 1, 0, 0, 'Emile Bleesing', NULL, 0, '2019-03-24 07:21:22', 'info@honkbalmuseum.nl', NULL),
(3100723, 3, NULL, NULL, NULL, NULL, 0, 1, 0, 0, 'Martin Bremer', NULL, 0, '2019-03-24 07:21:22', 'info@honkbalmuseum.nl', NULL),
(3100724, 3, NULL, NULL, NULL, NULL, 0, 1, 0, 0, 'Wim Drilling', NULL, 0, '2019-03-24 07:21:22', 'info@honkbalmuseum.nl', NULL),
(3100725, 3, NULL, NULL, NULL, NULL, 0, 1, 0, 0, 'Ron Fraser', NULL, 0, '2019-03-24 07:21:22', 'info@honkbalmuseum.nl', NULL),
(3100726, 3, NULL, NULL, NULL, NULL, 0, 1, 0, 0, 'J.C.G. Grasé', NULL, 0, '2019-03-24 07:21:22', 'info@honkbalmuseum.nl', NULL),
(3100727, 3, NULL, NULL, NULL, NULL, 0, 1, 0, 0, 'Jan Hartog', NULL, 0, '2019-03-24 07:21:22', 'info@honkbalmuseum.nl', NULL),
(3100728, 3, NULL, NULL, NULL, NULL, 0, 1, 0, 0, 'Co Hetem', NULL, 0, '2019-03-24 07:21:22', 'info@honkbalmuseum.nl', NULL),
(3100729, 3, NULL, NULL, NULL, NULL, 0, 1, 0, 0, 'Guus van der Heijden', NULL, 0, '2019-03-24 07:21:22', 'info@honkbalmuseum.nl', NULL),
(3100730, 3, NULL, NULL, NULL, NULL, 0, 1, 0, 0, 'John Heyt', NULL, 0, '2019-03-24 07:21:22', 'info@honkbalmuseum.nl', NULL),
(3100731, 3, NULL, NULL, NULL, NULL, 0, 1, 0, 0, 'Rob Hoffmann', NULL, 0, '2019-03-24 07:21:22', 'info@honkbalmuseum.nl', NULL),
(3100732, 3, NULL, NULL, NULL, NULL, 0, 1, 0, 0, 'G� Hoogenbos', NULL, 0, '2019-03-24 07:21:22', 'info@honkbalmuseum.nl', NULL),
(3100733, 3, NULL, NULL, NULL, NULL, 0, 1, 0, 0, 'Nol Houtkamp', NULL, 0, '2019-03-24 07:21:22', 'info@honkbalmuseum.nl', NULL),
(3100734, 3, NULL, NULL, NULL, NULL, 0, 1, 0, 0, 'Marcel Joost', NULL, 0, '2019-03-24 07:21:22', 'info@honkbalmuseum.nl', NULL),
(3100735, 3, NULL, NULL, NULL, NULL, 0, 1, 0, 0, 'Henk Keulemans', NULL, 0, '2019-03-24 07:21:22', 'info@honkbalmuseum.nl', NULL),
(3100736, 3, NULL, NULL, NULL, NULL, 0, 1, 0, 0, 'Line Klein-Desta', NULL, 0, '2019-03-24 07:21:22', 'info@honkbalmuseum.nl', NULL),
(3100737, 3, NULL, NULL, NULL, NULL, 0, 1, 0, 0, 'J.H. Kuling', NULL, 0, '2019-03-24 07:21:22', 'info@honkbalmuseum.nl', NULL),
(3100738, 3, NULL, NULL, NULL, NULL, 0, 1, 0, 0, 'Jan-Dick Leurs', NULL, 0, '2019-03-24 07:21:22', 'info@honkbalmuseum.nl', NULL),
(3100739, 3, NULL, NULL, NULL, NULL, 0, 1, 0, 0, 'Loek Loevendie', NULL, 0, '2019-03-24 07:21:22', 'info@honkbalmuseum.nl', NULL),
(3100740, 3, NULL, NULL, NULL, NULL, 0, 1, 0, 0, 'Roel de Mon', NULL, 0, '2019-03-24 07:21:22', 'info@honkbalmuseum.nl', NULL),
(3100741, 3, NULL, NULL, NULL, NULL, 0, 1, 0, 0, 'Ludy van Mourik', NULL, 0, '2019-03-24 07:21:22', 'info@honkbalmuseum.nl', NULL),
(3100742, 3, NULL, NULL, NULL, NULL, 0, 1, 0, 0, 'Janke Nijdam', NULL, 0, '2019-03-24 07:21:22', 'info@honkbalmuseum.nl', NULL),
(3100743, 3, NULL, NULL, NULL, NULL, 0, 1, 0, 0, 'Isaak Nootebaard', NULL, 0, '2019-03-24 07:21:22', 'info@honkbalmuseum.nl', NULL),
(3100744, 3, NULL, NULL, NULL, NULL, 0, 1, 0, 0, 'Wim Oosterhof', NULL, 0, '2019-03-24 07:21:22', 'info@honkbalmuseum.nl', NULL),
(3100745, 3, NULL, NULL, NULL, NULL, 0, 1, 0, 0, 'Jules de Pierre', NULL, 0, '2019-03-24 07:21:22', 'info@honkbalmuseum.nl', NULL),
(3100746, 3, NULL, NULL, NULL, NULL, 0, 1, 0, 0, 'Hamilton Richardson', NULL, 0, '2019-03-24 07:21:22', 'info@honkbalmuseum.nl', NULL),
(3100747, 3, NULL, NULL, NULL, NULL, 0, 1, 0, 0, 'Jan Rijkeboer', NULL, 0, '2019-03-24 07:21:22', 'info@honkbalmuseum.nl', NULL),
(3100748, 3, NULL, NULL, NULL, NULL, 0, 1, 0, 0, 'Daan Roodenburgh', NULL, 0, '2019-03-24 07:21:22', 'info@honkbalmuseum.nl', NULL),
(3100749, 3, NULL, NULL, NULL, NULL, 0, 1, 0, 0, 'Willem de Ruiter', NULL, 0, '2019-03-24 07:21:22', 'info@honkbalmuseum.nl', NULL),
(3100750, 3, NULL, NULL, NULL, NULL, 0, 1, 0, 0, 'Piet Schijvenaar', NULL, 0, '2019-03-24 07:21:22', 'info@honkbalmuseum.nl', NULL),
(3100751, 3, NULL, NULL, NULL, NULL, 0, 1, 0, 0, 'Jan Sibille', NULL, 0, '2019-03-24 07:21:22', 'info@honkbalmuseum.nl', NULL),
(3100752, 3, NULL, NULL, NULL, NULL, 0, 1, 0, 0, 'Els Smit-ter Meulen', NULL, 0, '2019-03-24 07:21:22', 'info@honkbalmuseum.nl', NULL),
(3100753, 3, NULL, NULL, NULL, NULL, 0, 1, 0, 0, 'Bob Sullivan', NULL, 0, '2019-03-24 07:21:22', 'info@honkbalmuseum.nl', NULL),
(3100754, 3, NULL, NULL, NULL, NULL, 0, 1, 0, 0, 'Evert van Tuyl', NULL, 0, '2019-03-24 07:21:22', 'info@honkbalmuseum.nl', NULL),
(3100755, 3, NULL, NULL, NULL, NULL, 0, 1, 0, 0, 'Charles sr. Urbanus', NULL, 0, '2019-03-24 07:21:22', 'info@honkbalmuseum.nl', NULL),
(3100756, 3, NULL, NULL, NULL, NULL, 0, 1, 0, 0, 'Charles jr. Urbanus', NULL, 0, '2019-03-24 07:21:22', 'info@honkbalmuseum.nl', NULL),
(3100757, 3, NULL, NULL, NULL, NULL, 0, 1, 0, 0, 'Han Urbanus', NULL, 0, '2019-03-24 07:21:22', 'info@honkbalmuseum.nl', NULL),
(3100758, 3, NULL, NULL, NULL, NULL, 0, 1, 0, 0, 'Theo Vleeshhouwer', NULL, 0, '2019-03-24 07:21:22', 'info@honkbalmuseum.nl', NULL),
(3100759, 3, NULL, NULL, NULL, NULL, 0, 1, 0, 0, 'Gerard Voogd', NULL, 0, '2019-03-24 07:21:22', 'info@honkbalmuseum.nl', NULL),
(3100760, 3, NULL, NULL, NULL, NULL, 0, 1, 0, 0, 'Maarten Vrij', NULL, 0, '2019-03-24 07:21:22', 'info@honkbalmuseum.nl', NULL),
(3100761, 3, NULL, NULL, NULL, NULL, 0, 1, 0, 0, 'Cor Wilders', NULL, 0, '2019-03-24 07:21:22', 'info@honkbalmuseum.nl', NULL),
(3100762, 3, NULL, NULL, NULL, NULL, 0, 1, 0, 0, 'Dries de Zwaan', NULL, 0, '2019-03-24 07:21:22', 'info@honkbalmuseum.nl', NULL);

select * from photos where idphoto >= 3100713;

commit