update persons set nmfirst = "Gé", updated_at = CURRENT_TIMESTAMP where idperson = 1051;
update persons set nmlast = "Grasé", updated_at = CURRENT_TIMESTAMP where idperson = 1055;

INSERT INTO `videos` (`idvideo`, `nmvideo`, `nmurl`, `nmphoto`, `ftdepicted`, `is_featured`, `created_at`, `updated_by`, `updated_at`) VALUES
(6, 'MLB Allumni', 'o8ERZrYq6rU', '', '', 0, '2021-02-05 20:35:47', '', NULL),
(7, 'WK Honkbal 2011', '6Lh-bf2rHBM', '', '', 0, '2021-02-05 20:36:23', '', NULL),
(8, 'EK BRL 1966 HAARLEM', 'SqvS72T7M4M', '', '', 0, '2021-02-05 20:38:08', '', NULL);

