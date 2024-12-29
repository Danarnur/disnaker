-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table disnaker.news
CREATE TABLE IF NOT EXISTS `news` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table disnaker.news: ~4 rows (approximately)
INSERT INTO `news` (`id`, `nama`, `gambar`, `link`) VALUES
	(1, 'Siap Hadapi Tantangan Industri: UPT BLK Sumenep Gelar Pelatihan MTU', 'masonry-portfolio-1.jpg', 'https://disnakertrans.jatimprov.go.id/berita/20/siap-hadapi-tantangan-industri-upt-blk-sumenep-gelar-pelatihan-mtu'),
	(2, 'Sejak Pandemi Covid-19, Disnaker Sumenep Kurangi Pelatihan Kerja', 'masonry-portfolio-2.jpg', 'https://www.sumenepkab.go.id/berita/baca/sejak-pandemi-covid-19-disnaker-sumenep-kurangi-pelatihan-kerja#google_vignette'),
	(3, 'HTN 2020 Di Tengah Pandemi Covid-19 Berbagai Kegiatan Tertunda', 'masonry-portfolio-3.jpg', 'https://www.sumenepkab.go.id/berita/baca/htn-2020-di-tengah-pandemi-covid-19-berbagai-kegiatan-tertunda'),
	(4, 'Disnaker Tetap Layani Masyarakat Sambil Menunggu Kebijakan Dari Pusat', 'masonry-portfolio-4.jpg', 'https://sumenepkab.go.id/berita/baca/disnaker-tetap-layani-masyarakat-sambil-menunggu-kebijakan-dari-pusat');

-- Dumping structure for table disnaker.users
CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','user') COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table disnaker.users: ~0 rows (approximately)
INSERT INTO `users` (`username`, `password`, `email`, `nama`, `role`) VALUES
	('admin', '$2y$04$kvRpjZrkYDhdm72e/j4DVuw4UTIbR6TmbSO6QorM3/hTp7GQlps1S', 'admin@gmail.com', 'Admin', 'admin'),
	('alyan', '$2y$10$Qir/w/FSm7MEBVAxiumcvezzEicNK1jDrvlHCPNKbZq5ZOCkYbvcq', 'alyan@gmail.com', 'Alyan', 'user');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
