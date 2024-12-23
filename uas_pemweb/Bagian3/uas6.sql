USE DATABASE uas_pemweb;

CREATE TABLE `matakuliah` (
  `kode` VARCHAR(11) NOT NULL,
  `namamk` VARCHAR(100) DEFAULT NULL,
  `pengampu` VARCHAR(100) DEFAULT NULL,
  PRIMARY KEY (`kode`),
  UNIQUE KEY `namamk` (`namamk`)
);
