start transaction;

INSERT INTO `clubvideos` (`idclubvideo`, `idclub`, `idvideo`, `cdmanually`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 59, 2, 1, '2019-03-27 15:50:08', 'ADMIN', NULL),
(2, 59, 4, 1, '2020-10-30 06:36:00', 'ADMIN', NULL),
(4, 59, 5, 1, '2020-10-30 06:36:18', 'ADMIN', NULL);

commit;