--
-- 테이블 구조 `board`
--
CREATE TABLE IF NOT EXISTS `board` (
  `userID` varchar(10) COLLATE utf8_bin NOT NULL,
  `name` varchar(10) COLLATE utf8_bin NOT NULL,
  `addr` varchar(10) COLLATE utf8_bin NOT NULL,
  `mobile` varchar(10) COLLATE utf8_bin NOT NULL,
  `email` varchar(20) COLLATE utf8_bin NOT NULL,
  `mDate` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
