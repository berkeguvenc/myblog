-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 11 Mar 2021, 17:06:21
-- Sunucu sürümü: 10.4.17-MariaDB
-- PHP Sürümü: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `dbmyblog`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `blogs`
--

CREATE TABLE `blogs` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `categoryId` int(11) NOT NULL DEFAULT 0,
  `selflink` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `blogs`
--

INSERT INTO `blogs` (`id`, `name`, `content`, `image`, `categoryId`, `selflink`, `created_at`, `updated_at`) VALUES
(10, 'Norveç Yollarından…', '2015 yazıydı. Motosiklet kullanmayı öğrenip ehliyetleri aldıktan sadece bir kaç ay sonra Nordkapp (Norveç) turuna çıkmıştık Ömer ile.', 'images/blog/15101/81861.jpeg', 10, 'norvec-yollarindan', '2021-03-11 08:19:11', '2021-03-11 11:51:56'),
(11, 'Balkanlar, Alpler Motosiklet Turu (2016)', '2016 yazında yaptığım Amasya’dan başlayıp Stelvio Pass – İtalya’ya kadar uzanan motosiklet turunun videosu burada da bulunsun. Sadece yol…', 'images/blog/13481/49031.jpeg', 10, 'balkanlar-alpler-motosiklet-turu-2016', '2021-03-11 08:20:41', '2021-03-11 08:20:41'),
(12, 'Dağ Bisikletçiliği Denemeleri, Yozgat Çamlığı Milli Parkı', 'Bir önceki günlük girdisinde tur bisikletçiliği denemelerimi yazmıştım. Bu sefer dağ bisikletçiliği maceralarımdan bahsedeyim dedim.', 'images/blog/421/48403.jpeg', 12, 'dag-bisikletciligi-denemeleri-yozgat-camligi-milli-parki', '2021-03-11 08:21:33', '2021-03-11 08:21:33'),
(13, 'Tur Bisikletçiliği Denemeleri, Ladik Gölü Turu', 'Yarın bir gün atom fiziğine de profesörlüğe de lanet olsun* diyerek devreleri yakıp kendimi yollara vurduğumda, günler, haftalar, aylar, yıllar (oha!) boyunca bisiklet sürmek gibi bir ihtimal doğabilir.', 'images/blog/9410/77209.jpeg', 12, 'tur-bisikletciligi-denemeleri-ladik-golu-turu', '2021-03-11 08:22:32', '2021-03-11 08:22:32'),
(14, 'Kaçkar Tırmanışı (3932 m)', 'Benim için artık geleneksel hale gelen Kaçkar faaliyetinin bu yılki ayağını da gerçekleştirmiş bulunuyorum. Milli park sınırları içerisinde olmak, Kavrun’dan dağa doğru yürümek, geceyi “bu öküzler çadıra dalar mı lan acaba?”', 'images/blog/15668/30097.jpeg', 9, 'kackar-tirmanisi-3932-m', '2021-03-11 08:23:07', '2021-03-11 08:23:07'),
(15, 'Karlı Bir Akşamüstü', 'Kış mevsimini severim ben. Snowboarda merak saldıktan sonra ortaya çıkan bir sevgi değil bu. Tamam, belki snowboard ile birlikte biraz daha artmış olabilir sevgim ama küçükken de severdim kışı.', 'images/blog/18893/75233.jpeg', 14, 'karli-bir-aksamustu', '2021-03-11 08:23:54', '2021-03-11 08:23:54'),
(17, 'İki Binlik Zirve: Akdağ', 'Ülkemizde Akdağ olarak adlandırılmış pek çok dağ bulunmakta. Doruğunda uzun süre erimeyen karları gören yöre halkı, öyle Himalayalardaki insanlar ...', 'images/blog/8943/3638.jpeg', 9, 'iki-binlik-zirve-akdag', '2021-03-11 08:25:36', '2021-03-11 08:25:36'),
(18, 'Kaçkarlar; Buzul Göllerine Yürüyüş', 'Bu gidişle sanırım bu günlükte her yıl -en az- bir Kaçkar yazısı yer alacak. Ben Kaçkarlar’a gitmekten bıkmayacağım, siz de yazdıklarımı okumaktan bıkmayın bence. :)', 'images/blog/2518/26738.jpeg', 15, 'kackarlar-buzul-gollerine-yuruyus', '2021-03-11 08:26:03', '2021-03-11 08:26:03'),
(19, 'Meteor Yağmuru Fotoğraflama Çabaları', 'Gökyüzü merakım aslında çocukluğumdan beri olan bir şey. Küçükken her ay düzenli olarak alma imkanım olmasa da elime geçtikçe okuduğum Bilim Teknik Dergilerinde', 'images/blog/13068/10527.jpeg', 16, 'meteor-yagmuru-fotograflama-cabalari', '2021-03-11 08:27:17', '2021-03-11 08:27:17');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `topCategory` int(11) NOT NULL DEFAULT 0,
  `selflink` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `categories`
--

INSERT INTO `categories` (`id`, `name`, `topCategory`, `selflink`, `created_at`, `updated_at`) VALUES
(9, 'Dağcılık', 0, 'dagcilik', '2021-03-11 08:14:38', '2021-03-11 08:14:38'),
(10, 'Motosiklet', 11, 'motosiklet', '2021-03-11 08:14:49', '2021-03-11 08:15:50'),
(11, 'Araç Gezileri', 0, 'arac-gezileri', '2021-03-11 08:15:42', '2021-03-11 11:52:59'),
(12, 'Bisiklet', 11, 'bisiklet', '2021-03-11 08:16:13', '2021-03-11 08:16:13'),
(13, 'Gezi', 0, 'gezi', '2021-03-11 08:16:28', '2021-03-11 08:16:28'),
(14, 'Doğa', 13, 'doga', '2021-03-11 08:16:48', '2021-03-11 08:16:48'),
(15, 'Kamp', 13, 'kamp', '2021-03-11 08:16:58', '2021-03-11 08:16:58'),
(16, 'Manzara', 0, 'manzara', '2021-03-11 08:26:31', '2021-03-11 08:26:31');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_03_10_185614_create_blogs_table', 1),
(5, '2021_03_10_185914_create_categories_table', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Yağız Berke Güvenç', 'ybguvenc97@gmail.com', NULL, '$2y$10$NUUXjh6MrnUAF/CdZ9Wc6O/aYKIcH1rFzQH7Wka8Qp1IW4UVMSGqC', NULL, '2021-03-10 22:16:34', '2021-03-10 22:16:34'),
(2, 'Etli Pizza', 'deneme@firma.com', NULL, '$2y$10$98T8cD2lKr96HFKAoYTK1eWclHxZZxXDQSVYbfyGWeEb1FG0FeEJ2', NULL, '2021-03-11 12:20:07', '2021-03-11 12:20:07');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Tablo için indeksler `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Tablo için AUTO_INCREMENT değeri `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Tablo için AUTO_INCREMENT değeri `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
