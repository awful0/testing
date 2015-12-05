
CREATE TABLE IF NOT EXISTS `catalog` (
`id` int(6) NOT NULL,
  `Parent` int(2) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Path` varchar(100) NOT NULL,
  `Descr` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

INSERT INTO `catalog` (`id`, `Parent`, `Name`, `Path`, `Descr`) VALUES
(1, 0, 'Каталог', 'catalog', 'Наш мини каталог супер не нужных товаров'),
(2, 1, 'Телевизоры', 'tv', 'Первый товар для массового зомбирования населения'),
(3, 1, 'DVD-проигрыватели', 'dvd', 'Уже никому не нужно, но Вам предложим'),
(4, 2, 'Samsung', 'samsung', ''),
(5, 4, 'Телевизор Series 6', 's6', 'Очень хороший телевизор Series 6'),
(6, 4, 'Телевизор Series 7', 's7', 'Очень хороший телевизор Series 7'),
(7, 3, 'LG', 'lg', ''),
(8, 7, 'LG DVD', 'lgdvd', 'Бери не пожалеешь, у меня такой');

ALTER TABLE `catalog`
 ADD PRIMARY KEY (`id`);

ALTER TABLE `catalog`
MODIFY `id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
