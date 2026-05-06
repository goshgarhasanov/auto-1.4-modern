-- phpMyAdmin SQL Dump
-- version 3.2.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 08, 2023 at 01:23 AM
-- Server version: 5.1.40
-- PHP Version: 5.2.12

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `chat`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_toy`
--

CREATE TABLE IF NOT EXISTS `add_toy` (
  `key` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) NOT NULL,
  `user1` varchar(255) NOT NULL,
  `usid` int(11) NOT NULL,
  `user2` varchar(255) NOT NULL,
  `date` varchar(5) NOT NULL DEFAULT '22:00',
  `time` int(11) NOT NULL,
  PRIMARY KEY (`key`),
  KEY `kimi` (`usid`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `add_toy`
--

INSERT INTO `add_toy` (`key`, `id`, `user1`, `usid`, `user2`, `date`, `time`) VALUES
(3, 369, 'Romantika', 363, 'Hicissss', '17:00', 1497093736);

-- --------------------------------------------------------

--
-- Table structure for table `albom`
--

CREATE TABLE IF NOT EXISTS `albom` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idfoto` int(11) NOT NULL DEFAULT '0',
  `photo` text NOT NULL,
  `vote` int(11) DEFAULT '0',
  `sex` tinyint(11) DEFAULT '0',
  `info` text CHARACTER SET utf8 NOT NULL,
  `comment` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idfoto` (`idfoto`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `albom`
--


-- --------------------------------------------------------

--
-- Table structure for table `albom_down`
--

CREATE TABLE IF NOT EXISTS `albom_down` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(50) DEFAULT NULL,
  `usid` int(11) DEFAULT '0',
  `id_albom` int(11) DEFAULT '0',
  `time` int(11) NOT NULL DEFAULT '0',
  `count` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251 PACK_KEYS=0 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `albom_down`
--


-- --------------------------------------------------------

--
-- Table structure for table `albom_fikir`
--

CREATE TABLE IF NOT EXISTS `albom_fikir` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usid` int(11) DEFAULT '0',
  `user` varchar(80) DEFAULT NULL,
  `message` text NOT NULL,
  `time` int(11) NOT NULL DEFAULT '0',
  `key` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `usid` (`usid`,`key`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `albom_fikir`
--


-- --------------------------------------------------------

--
-- Table structure for table `albom_vote`
--

CREATE TABLE IF NOT EXISTS `albom_vote` (
  `key` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) NOT NULL DEFAULT '0',
  `user` varchar(50) NOT NULL,
  `id_albom` int(11) NOT NULL DEFAULT '0',
  `vote` int(11) NOT NULL DEFAULT '0',
  `time` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`key`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `albom_vote`
--


-- --------------------------------------------------------

--
-- Table structure for table `AN_reklam`
--

CREATE TABLE IF NOT EXISTS `AN_reklam` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adi` blob NOT NULL,
  `urlu` blob NOT NULL,
  `shuar` blob NOT NULL,
  `harda` int(1) NOT NULL,
  `mud` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `AN_reklam`
--


-- --------------------------------------------------------

--
-- Table structure for table `auto_ban_v2`
--

CREATE TABLE IF NOT EXISTS `auto_ban_v2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usid` int(11) NOT NULL DEFAULT '0',
  `user` varchar(100) DEFAULT NULL,
  `message` blob,
  `sebeb` varchar(255) DEFAULT NULL,
  `banned` int(2) NOT NULL DEFAULT '0',
  `banmsg` varchar(255) DEFAULT NULL,
  `time` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `auto_ban_v2`
--

INSERT INTO `auto_ban_v2` (`id`, `usid`, `user`, `message`, `sebeb`, `banned`, `banmsg`, `time`) VALUES
(38, 0, NULL, 0x2859656e6920697374696661646526233233313b692071657964697979617464616e29204c65716562206226233234363b6c6d6573696e64653a2043414e2d417a, 'reklam olmaz', 2, '-AZ', 1500394695);

-- --------------------------------------------------------

--
-- Table structure for table `azercell_show`
--

CREATE TABLE IF NOT EXISTS `azercell_show` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `user` varchar(30) NOT NULL,
  `tarif` int(11) NOT NULL,
  `code` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `azercell_show`
--

INSERT INTO `azercell_show` (`id`, `userid`, `user`, `tarif`, `code`) VALUES
(20, 48, 'STARIK', 5, '8363648383935'),
(23, 1, 'QARA_PELENG', 5, '7671522547732'),
(24, 1, 'QARA_PELENG', 5, '7671522547732'),
(25, 1, 'ADMiN', 1, '6578997653786');

-- --------------------------------------------------------

--
-- Table structure for table `bannlist`
--

CREATE TABLE IF NOT EXISTS `bannlist` (
  `klu4` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(255) CHARACTER SET cp1251 COLLATE cp1251_bin NOT NULL DEFAULT '',
  `soft` varchar(255) CHARACTER SET cp1251 COLLATE cp1251_bin NOT NULL DEFAULT '',
  `user` varchar(30) CHARACTER SET cp1251 COLLATE cp1251_bin NOT NULL,
  `moder` varchar(30) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `sebeb` text NOT NULL,
  PRIMARY KEY (`klu4`),
  KEY `ip` (`ip`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=59 ;

--
-- Dumping data for table `bannlist`
--

INSERT INTO `bannlist` (`klu4`, `ip`, `soft`, `user`, `moder`, `sebeb`) VALUES
(58, '5.44.3', 'Mozilla/5.0 (SymbianOS/9.4; Series60/5.0 Nokia5230/21.0.004; Profile/MIDP-2.1 Configuration/CLDC-1.1 ) AppleWebKit/525 (KHTML, like Gecko) Version/3.0 BrowserNG/7.2.5.2 3gpp-gba', 'Qaqaw', 'HICRAN', '');

-- --------------------------------------------------------

--
-- Table structure for table `beyen`
--

CREATE TABLE IF NOT EXISTS `beyen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kim` int(11) NOT NULL,
  `kimi` int(11) NOT NULL,
  `vaxt` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `kimi` (`kimi`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `beyen`
--

INSERT INTO `beyen` (`id`, `kim`, `kimi`, `vaxt`) VALUES
(1, 1144, 11, 1492457443),
(2, 1142, 11, 1492505581),
(18, 324, 283, 1496940082),
(4, 36, 30, 1494423212),
(5, 19, 46, 1494609872),
(6, 27, 19, 1494616726),
(7, 74, 30, 1494659117),
(8, 1, 123, 1495046760),
(9, 124, 27, 1495598619),
(10, 211, 46, 1495747255),
(11, 46, 211, 1495748115),
(12, 211, 27, 1495799446),
(13, 211, 208, 1495801125),
(14, 240, 124, 1495879309),
(15, 124, 111, 1496217176),
(17, 211, 351, 1496923592),
(19, 324, 355, 1497086374);

-- --------------------------------------------------------

--
-- Table structure for table `bilik`
--

CREATE TABLE IF NOT EXISTS `bilik` (
  `id` int(11) NOT NULL,
  `n` int(5) NOT NULL DEFAULT '0',
  `xal` int(11) NOT NULL DEFAULT '0',
  `mer` int(5) NOT NULL DEFAULT '0',
  `qid` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bilik`
--

INSERT INTO `bilik` (`id`, `n`, `xal`, `mer`, `qid`) VALUES
(1, 0, 0, 0, 0),
(418, 0, 0, 0, 0),
(430, 0, 0, 0, 0),
(508, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `bots`
--

CREATE TABLE IF NOT EXISTS `bots` (
  `number` int(11) NOT NULL AUTO_INCREMENT,
  `vopros` blob NOT NULL,
  `answer` varchar(100) NOT NULL DEFAULT '',
  `tran` varchar(60) NOT NULL DEFAULT '',
  PRIMARY KEY (`number`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=180 ;

--
-- Dumping data for table `bots`
--

INSERT INTO `bots` (`number`, `vopros`, `answer`, `tran`) VALUES
(1, 0xefbbbf417a657262617963616e696e207061797461787469206f6c616e2042616b6964612065762074656c65666f6e6c617269206e65636520726571656d6c6572696469723f2e, 'Yeddi', 'Yeddi'),
(2, 0x5368657271646520696c6b2064656d6f6b7261696b2063756d68757269797965743f3f2e, 'Azerbaycan', 'Azerbaycan'),
(3, 0x4e656674206978726163206564656e206f6c6b656c6572696e206265796e656c78616c7120746573686b696c617469206e6563652061646c616e69723f2e, 'OPEK', 'OPEK'),
(4, 0x496e67696c69732064696c696e64652061696c6520736f7a75206e6563652061646c616e69723f2e, 'Family', 'Family'),
(5, 0x5469626220656c696d696e696e2062616e697369206b696d6469723f2e, 'Hipokrat', 'Hipokrat'),
(6, 0x48616e73692063616e6c6920656e2079756b73656b2065736869746d6520716162696c69796574696e65206d616c696b6469723f2e, 'Yarasa', 'Yarasa'),
(7, 0x44756e79616e696e20656e2073686972696e206269746b6973692068616e73696469723f2e, 'Katalife', 'Katalife'),
(8, 0xe2809c53657274204469736be2809d206e616469723f2e, 'Komputer hissesi', 'Komputer hissesi'),
(9, 0x5175e2809972616e6461206e6563686520617965207661723f2e, 'Yuz ondord', 'Yuz ondord'),
(10, 0x5275736c617220417a657262617963616e69206973686768616c20657464696b64656e20736f6e61722047656e636520736865686572696e696e206164696e69206465796973686962206e6520716f7964756c61723f2e, 'Yelzavetapol', 'Yelzavetapol'),
(11, 0x596572206b7572657369206f7a206f787528786579616c69206f787529206574726166696e64612074616d20646f76722065746d65206d756464657469206e652071656465726469723f2e, '24 saat', '24 saat'),
(12, 0x4179696e696e20656e2063686f7820796564697969206d657976652068616e73696469723f2e, 'Armud', 'Armud'),
(13, 0x4b7572206368617969206f7a206d656e626579696e69206861726164616e20676f74757275723f2e, 'Turkiyeden', 'Turkiyeden'),
(14, 0x44756e79616e696e20656e20626f79756b20676f6c752068616e73696469723f2e, 'Xezer', 'Xezer'),
(15, 0x417a657262617963616e696e2078657269746573692068616e73692063616e6c696e696e20746573766972696e6920796172616469723f2e, 'Qartal', 'Qartal'),
(16, 0x417a657262617963616e696e206d7573746571696c6c696b2067756e752068616e73696469723f2e, '18 oktyabr', '18 oktyabr'),
(17, 0x417a657262617963616e2078616c712043756d68757269796574696e696e20696c6b2062617972616768696e64612068616e73692072656e676c657264656e206973746966616465206f6c756e6d7573686475723f2e, 'Qirmizi ve agh', 'Qirmizi ve agh'),
(18, 0xe2809c4c5941e2809d206e6f74752068616e736920686572666c652079617a696c69723f2e, 'A herfi', 'A herfi'),
(19, 0x4d756472696b20736f7a752074616d616d6c6179696e3ae2809d446f766c6574696e20656e207961787368697369e280a6e2809d3f2e, 'Aghildir', 'Aghildir'),
(20, 0x4d6573656c6520676f72653ae2809d47656c696e206576696e20202e2e2ee2809d3f2e, 'Supurgesidir', 'Supurgesidir'),
(21, 0x41696c65207175726d616768696e20353020696c6c697969206e6563652061646c616e69723f2e, 'Qizil', 'Qizil'),
(22, 0x4e657372656464696e2054757369206e656368656e636920696c646520616e6164616e206f6c6d7573686475723f2e, '1201', '1201'),
(23, 0x536865727120656465626979796174696e646120696c6b206f706572612068616e73696469723f2e, 'Leyli ve Mecnun', 'Leyli ve Mecnun'),
(24, 0x417a657262617963616e20656c6966626173696e646120e2809c46e2809d2068657266696e64656e20736f6e61722068616e736920686572662067656c69723f2e, 'G herfi', 'G herfi'),
(25, 0x4e6579692064756e79616e696e20656e2061636920766520656e2073686972696e20736865796920686573616220656469726c65723f2e, 'Dili', 'Dili'),
(26, 0x457372696e206d75716176696c657369206e656368656e636920696c646520696d7a616c616e69623f2e, '1994 cu il', '1994 cu il'),
(27, 0x5275736979616e696e206568616c697369206e652071656465726469723f2e, '150 milyon', '150 milyon'),
(28, 0x4172692062616c2068617a69726c61646967686920796572206e6563652061646c616e69723f2e, 'Petek', 'Petek'),
(29, 0x4167686162657920736f7a756e756e20716973612079617a696c69736869206e6563656469723f2e, 'Abi', 'Abi'),
(30, 0x4c656f6e6172646f2064612056696e63696e696e2064756e79616361206d6573687572206f6c616e2065736572696e696e20616469206e616469723f2e, 'Mona liza', 'Mona liza'),
(31, 0x4b616e6164616e696e206e6963686520646f766c65742064696c69207661723f2e, 'Iki dene', 'Iki dene'),
(32, 0x4176726f706120736875726173696e64612063656d69206e6563686520646f766c6574207661723f2e, 'Qirx uch', 'Qirx uch'),
(33, 0x44756e7961646120656e20626f79756b206d657964616e2068616e7369207368656865726469723f2e, 'Pekinde', 'Pekinde'),
(34, 0x44756e79616e696e20656e20676f7a656c207965726c6572696e64656e2062697269206f6c616e2053687573612065726d656e69206973686768616c6368696c617269207465726566696e64656e206e652076617874206973686768616c206f6c756e75623f2e, '8 may 1992', '8 may 1992'),
(35, 0x54756c6b75206e6579696e2073696d766f6c756475723f2e, 'Hiylegerliyin', 'Hiylegerliyin'),
(36, 0x4e65636865204d61746572696b206d6f766375646475723f2e, 'Alti', 'Alti'),
(37, 0x4d6f6e61727869796120736f7a756e756e206d656e617369206e656469723f2e, 'Tek hakimliyetlilik', 'Tek hakimliyetlilik'),
(38, 0x58656d7365206e656469723f2e, 'Beshlik', 'Beshlik'),
(39, 0x53656d6564205675726768756e206e656368656e636920696c646520616e6164616e206f6c75623f2e, '1906 ci ilde', '1906 ci ilde'),
(40, 0x4e69747120686973736573696e6465206973696d64656e20736f6e61722068616e73692067656c69723f2e, 'Sifet', 'Sifet'),
(41, 0x4b6f726f67686c756e756e2065736c20616469206e656469723f2e, 'Rovshen', 'Rovshen'),
(42, 0xe2809c446f6861e2809d2068616e7369206f6c6b656e696e2070617974617874696469723f2e, 'Qatar', 'Qatar'),
(43, 0x4d65796d756e2065736173656e2068616e7369206d657976656e692079657969723f2e, 'Banan', 'Banan'),
(44, 0x33302079616e7661722066616369657369206e656368656e636920696c646520626173682076657269623f2e, '1990 ci ilde', '1990 ci ilde'),
(45, 0x46696c696e207675637564756e646120656e2064657965726c69207965722068616e73696469723f2e, 'Dishi', 'Dishi'),
(46, 0x50697368696b6c65722065747261666461206f6c616e20686572207368657969206e652072656e67646520676f7275726c65723f2e, 'Boz rengde', 'Boz rengde'),
(47, 0x547566616e696e2062617368207665726d6520736562656269206e656469723f2e, '12 bal gucunde kulek', '12 bal gucunde kulek'),
(48, 0x4b656c6265636572206e6520766178742073686768616c206f6c756e75623f2e, '2 aprel 1992', '2 aprel 1992'),
(49, 0x4974616c6979616e696e2070617974617874692068616e7369207368656865726469723f2e, 'Roma', 'Roma'),
(50, 0xe2809c4e6f6b6961e2809d206d6f62696c2074656c65666f6e6c6172696e692065736173656e2068616e7369206f6c6b6520697374656873616c20656469723f2e, 'Finlandiya', 'Finlandiya'),
(51, 0x417a657262617963616e2064696c69206e65207661787420646f766c65742064696c69206b696d6920c3a96c616e206f6c756e75623f2e, '1918 ci ilde', '1918 ci ilde'),
(52, 0x47757263757374616e696e206d696c6c692070756c207661686964693f2e, 'Lari', 'Lari'),
(53, 0x50656e7461676f6e206e652064656d656b6469723f2e, '5 gushe', '5 gushe'),
(54, 0x45686d6564696c657220646f766c6574696e696e20696c6b2063617269206b696d206964693f2e, 'Kir', 'Kir'),
(55, 0x44756e79616461207361686573696e6520676f726520656e20626f79756b206f6c6b652068616e73696469723f2e, 'Rusiya', 'Rusiya'),
(56, 0x434420736f7a752068616e736920736f7a206269726c6573686d656c6572696e64656e20656d656c652067656c69623f2e, 'Compact Disk', 'Compact Disk'),
(57, 0x596572206b75726573696e6465206e69636865206d61716e6974207175746275207661723f2e, 'Iki dene', 'Iki dene'),
(58, 0x44756e7961646120656e20626f79756b2062696e612068616e7369206f6c6b6564656469723f2e, 'Hong Kong', 'Hong Kong'),
(59, 0x496e73616e696e207572657969206e69636865206b616d6572616c696469723f2e, 'Dord', 'Dord'),
(60, 0x44756e79616e696e20656e20626f6c2073756c752063686179692068616e73696469723f2e, 'Amazon', 'Amazon'),
(61, 0x44756e796120417a657262617963616e6c696c6172696e696e203120636920717572756c74617969206e652076617874206b65636972696c69623f2e, '2001', '2001'),
(62, 0x516562656c656e696e206b6563686d69736820616469206e656469723f2e, 'Qurtqashin', 'Qurtqashin'),
(63, 0x42617961742071616c617369206861726164616469723f2e, 'Shekide', 'Shekide'),
(64, 0x4e6f7672757a20736f7a756e756e206d656e617369206e656469723f2e, 'Yeni gun', 'Yeni gun'),
(65, 0xe2809c45686d656420686172616461646972e2809d2066696c6d696e64652045686d6564696e2061746173696e696e20616469206e656469723f2e, 'Shirin', 'Shirin'),
(66, 0xe2809c4465686e616d65e2809d2065736572696e696e206d75656c6c696669206b696d6469723f2e, 'Shah Ismayil Xetayi', 'Shah Ismayil Xetayi'),
(67, 0x506f636874206d61726b61736920696c6b206465666520686172616461206275726178696c69623f2e, 'Boyuk Britaniyada', 'Boyuk Britaniyada'),
(68, 0x48657964657220456c69796576206e656368656e636920696c64656e2068616b696d6979796574652067656c6d6973686469723f2e, '1969', '1969'),
(69, 0x48616e73692066656e6e20656c6d696e206163686172696469723f2e, 'Riyaziyyat', 'Riyaziyyat'),
(70, 0x417a657262617963616e6461206e696368652069716c696d2074697069207661723f2e, 'Doqquz', 'Doqquz'),
(71, 0x46656e65726261686365206b6c7562756e756e2073696d766f6c752068616e73692068657976616e6469723f2e, 'Kanarya', 'Kanarya'),
(72, 0xe2809c4573747261716f6ee2809d2068616e7369206269746b69796520646579696c69723f2e, 'Terxun', 'Terxun'),
(73, 0x497376656368696e207061726c616d656e7469206e6563652061646c616e69723f2e, 'Riksdaq', 'Riksdaq'),
(74, 0x506c6174696e204176726f706179612068616e7369206f6c6b6564656e206765746972696c6d6973686469723f2e, 'Perudan', 'Perudan'),
(75, 0x41676864616d206e652076617874206973686768616c206f6c756e75623f2e, '23 iyul 1993', '23 iyul 1993'),
(76, 0x4b6f686e656c6d69736820736f7a206e6563652061646c616e69723f2e, 'Arxaizm', 'Arxaizm'),
(77, 0x44756e79616e696e20656e20656e6c69207368656c616c6573692068616e73696469723f2e, 'Kleopas', 'Kleopas'),
(78, 0x44756e79616e696e20656e20626f79756b207368656865722076652070617974617874692068616e73696469723f2e, 'Mexiko', 'Mexiko'),
(79, 0x417a657262617963616e20646f766c65742068696d6e696e696e20736f7a6c6572696e69206b696d2079617a69623f2e, 'Ehmed Cavad', 'Ehmed Cavad'),
(80, 0x4d2e462e4178756e646f76756e20746578656c6c757375206e65206f6c75623f2e, 'Sebuhi', 'Sebuhi'),
(81, 0x4e65667420646173686979616e2067656d69206e6563652061646c616e69723f2e, 'Tanker', 'Tanker'),
(82, 0x47756e64656c696b206e616d617a206e656368652064656665206f6c6d616c696469723f2e, 'Besh defe', 'Besh defe'),
(83, 0x4e6f726d616c20696e73616e65206e696368652064657169716564656e20736f6e6172207975787579612067656469723f2e, 'Yeddi', 'Yeddi'),
(84, 0xe2809c48656c696b6f70746572e2809d2068616e7369206e65716c697961742076617369746573696e696e206d7561736972206164696469723f2e, 'Vertalyot', 'Vertalyot'),
(85, 0x516564696d2079756e616e206d6966616c6f6769796173696e6120676f7265206166726f64697461206b696d6469723f2e, 'Sevgi allahi', 'Sevgi allahi'),
(86, 0x496e73616e646120746172617a696c6971206d65726b657a6920686172616461207965726c65736869723f2e, 'Qulaghin ichinde', 'Qulaghin ichinde'),
(87, 0x417a657262617963616e646120e2809c5265737075626c696b612067756e75e2809d206e6520766178742071657964206f6c756e75723f2e, '28 may', '28 may'),
(88, 0x54756c757a6120736865686572692068616e7369206f6c6b656465207965726c65736869723f2e, 'Fransa', 'Fransa'),
(89, 0x4d61646b61736b6172696e2070617974617874693f2e, 'Antananarivu', 'Antananarivu'),
(90, 0x46657272617269206176746f6d6f62696c206d61726b6173692068616e7369206f6c6b656e696e20696874656873616c696469723f2e, 'Italiya', 'Italiya'),
(91, 0x44756e7961646120656e20626f79756b20796172696d6164612068616e73696469723f2e, 'Erebistan', 'Erebistan'),
(92, 0x4f72746120657369726c657264652076656e6574736979616e696e206b7563656c657269206e6563652074656d697a6c656e697264693f2e, 'Leysan yagishla', 'Leysan yagishla'),
(93, 0x496c6b206d65736e65766920206b696d207465726566696e64656e2079617a696c6d6973686469723f2e, 'Xeqani Shirvani', 'Xeqani Shirvani'),
(94, 0x536861686d6174696e20766574656e693f2e, 'Hindistan', 'Hindistan'),
(95, 0x496e73616e206f6b736967656e73697a206e656368652064657169716520796173686179612062696c65723f2e, 'Besh deqiqe', 'Besh deqiqe'),
(96, 0x446167686c6971205161726162616768206d756e61716973686573696e646520656e2063686f782073686568696420766572656e207261796f6e3f2e, 'Aghdam', 'Aghdam'),
(97, 0x4b6f6d70757465722070726f6772616d6c6172696e6461207368656b696c6c6572696e206d6f6e74616a6920756368756e206973746966616465206564696c656e206d65736875722070726f6772616d3f2e, 'Photoshop', 'Photoshop'),
(98, 0x496c6b206465666520716c6f62757375206b696d20796172616469623f2e, 'El Biruni', 'El Biruni'),
(99, 0x4d616e6e6120646f766c657469206e65207661787420796172616e6d6973686469723f2e, '9 cu esrde', '9 cu esrde'),
(100, 0x31352053656e7479616272206e652067756e756475723f2e, 'Bilik', 'Bilik'),
(101, 0x5368696d616c2042757a6c75206f6b65616e69206469676572206f6b65616e6c617264616e20666572716c656e646972656e20626173686c6963612063656865743f2e, 'Temperaturun artmasi', 'Temperaturun artmasi'),
(102, 0x5369716172657420696e73616e696e20626564656e696e652065736173656e206e65206b696d69207a6979616e2076757275723f596f6420636861746973686d616d617a6c69676869, '', ''),
(103, 0x496e67696c697320656c6966626173696e6461206e656368652068657266207661723f2e, 'Iyirmi alti', 'Iyirmi alti'),
(104, 0x42616b6920446f766c657420556e69766572736974657469202842445529206e656368656e636920696c646520796172616e69623f2e, '1919 cu ilde', '1919 cu ilde'),
(105, 0x58756c6971616e20736f7a75206e6564656e20796172616e69623f2e, 'Caninin adindan', 'Caninin adindan'),
(106, 0x5475726b6979656e696e204d696c6c69206c6f746f7375206e6563652061646c616e69723f2e, 'Milli piyango', 'Milli piyango'),
(107, 0xe2809c4365796d7320426f6e642c204167656e7420303037e2809d2066696c6d696e696e20626173682071656872656d616e696e696e20616469206e656469723f2e, 'Pirs Bosman', 'Pirs Bosman'),
(108, 0x44756e79616e696e206d65736875722072657373616d6c6172696d64616e20626972692c2068616e73696b69207169736864612070756c206f6c6d6164696768696e6461206f7a20726573696d6c6572696e692079616e64697269622071697a696e69726d6973683f2e, 'Picasso', 'Picasso'),
(109, 0x4875736579696e204361766964206e6563686520696c206f6d7572207375726d7573686475723f2e, 'Elli doqquz il', 'Elli doqquz il'),
(110, 0x424d54206e696e206e65636865206461696d6920757a7675207661723f2e, 'Besh', 'Besh'),
(111, 0x416c696d6c65722068616e7369206d657976656e696e207865726368656e672078657374656c6979696e65206465726d616e206f6c64756768756e752062696c64697269723f2e, 'Nar', 'Nar'),
(112, 0x59656e6920626972206d656e612062696c646972656e2c6368617020766520656c79617a6d616461206275726178696c616e20617261206e6563652061646c616e69723f2e, 'Abzas', 'Abzas'),
(113, 0x516564696d206d6973697264652067756e65736820616c6c616869206b696d206f6c6d7573686475723f2e, 'Ra', 'Ra'),
(114, 0x532e452e5368697276616e69202c20536162697265206e6520626167686973686c617969623f2e, 'Nizaminin xemsesini', 'Nizaminin xemsesini'),
(115, 0x4d696b6179696c204d757368766971696e20736f79616469206e656469723f2e, 'Ismayilzade', 'Ismayilzade'),
(116, 0x53696c61686c6172696e207361786c616e64696768692062617a61206e6563652061646c616e69723f2e, 'Cebbexana', 'Cebbexana'),
(117, 0x53696368616e696e20647573686d616e693f2e, 'Pishik', 'Pishik'),
(118, 0x4e616469722068657976616e6c6172696e20716579646520616c696e6469676869206b697461623f2e, 'Qirmizi kitab', 'Qirmizi kitab'),
(119, 0x497376656368696e2070617974617874692068616e7369207368656865726469723f2e, 'Stokholm', 'Stokholm'),
(120, 0x313536206865667465206e656368652067756e6475723f2e, '1092', '1092'),
(121, 0xe2809c566f6c766fe2809d206176746f6d6f62696c6c6572692068616e7369206f6c6b656465206978726163206f6c756e75723f2e, 'Isvechre', 'Isvechre'),
(122, 0x526164696f6e756e206e657a657269206f6c6172617120736865726820676f726b656d6c6920616c696d206b696d6469723f2e, 'Markevich', 'Markevich'),
(123, 0x4d6166696120736f7a752068617261646120796172616e69623f2e, 'Italiyada', 'Italiyada'),
(124, 0x526573686964204265686275646f762068617261646120616e6164616e206f6c75623f2e, 'Tiflisde', 'Tiflisde'),
(125, 0xe2809c4b656e71757275e2809d206e652064656d656b6469723f2e, 'Sizi basha dushmurem', 'Sizi basha dushmurem'),
(126, 0xe2809c4665726861642076652053686972696ee2809d2070796573696e696e206d75656c6c696669206b696d6469723f2e, 'Semed Vurghun', 'Semed Vurghun'),
(127, 0x416d617a6f6e64616e20736f6e72612064756e7961646120656e2073756c7520636861793f2e, 'Lena', 'Lena'),
(128, 0x41425320696e2071697a696c20656874697979617469206861726164616469723f2e, 'Fort Noksda', 'Fort Noksda'),
(129, 0x313932312d333120636920696c6c6572646520417a657262617963616e696e20696c6b206d696c6c6920617469636920646976697a69796173696e696e206b6f6d616e646972693f2e, 'Cemshid Naxchivanski', 'Cemshid Naxchivanski'),
(130, 0x44756e79616e696e20656e20626f79756b2071757262616768617369206e65207165646572206368656b6964656469723f2e, '800 qram', '800 qram'),
(131, 0x496d616d656464696e204e6573696d692068617261646120616e6164616e206f6c75623f2e, 'Shamaxida', 'Shamaxida'),
(132, 0x5368657271646520696c6b20726573656478616e61206861726164612074696b696c6d6973686469723f2e, 'Maraghada', 'Maraghada'),
(133, 0x416c696d6572696e2066696b6972696e6365206e652071616e696e206c617874616c616e6d6173696e692073757265746c656e64697269723f2e, 'Yer findighi', 'Yer findighi'),
(134, 0x4a616e204461726b2068616e73692073686568657264652079616e646972696c6d6973686469723f2e, 'Ruanda', 'Ruanda'),
(135, 0x44656e697a206e65716c6979796174696e696e2064617368696d616c617220756368756e206b697261796520766572696c6d6573696e64656e20656c6465206f6c756e616e2078657263206e6563652061646c616e69723f2e, 'Fraxt', 'Fraxt'),
(136, 0xe2809c436861726c20436861706c696ee2809d206f736b6172206d756b61666174696e69206e656368652079617368696e646120616c69623f2e, 'Seksen doqquz', 'Seksen doqquz'),
(137, 0x456c207573756c7520696c65206d616c20696874656873616c206564656e2073656e65746b6172206e6563652061646c616e69723f2e, 'Kustar', 'Kustar'),
(138, 0xe2809c43756d6875726979796574e2809d20736f7a752068616e73692064696c64656e20676f747572756c75623f2e, 'Ereb', 'Ereb'),
(139, 0x58657a65722064656e697a696e69206661697a6c6520626f6c73656b20656e20626f79756b206661697a2068616e7369206f6c6b657965206475736865723f2e, 'Qazaxstana', 'Qazaxstana'),
(140, 0x42616b6920736865686572696e69206e656365207368656865722061646c616e64697269726c61723f2e, 'Kulekler sheheri', 'Kulekler sheheri'),
(141, 0x506c616e65746c65722061726173696e6461207169726d697a6920706c616e65742061646c616e646972696c616e20706c616e65742068616e73696469723f2e, 'Mars', 'Mars'),
(142, 0x4e697a616d692047656e636576696e696e2065736c20616469206e65206f6c6d7573686475723f2e, 'Ilyas', 'Ilyas'),
(143, 0x4c656e61206368617969206f7a206d656e626579696e69206861726164616e20676f74757275723f2e, 'Baykal golunden', 'Baykal golunden'),
(144, 0x42657a7a2071616c617369206e656368656e636920696c646520747574756c75623f2e, '837', '837'),
(145, 0x4172696e696e206e656368652071616e616469206f6c75723f2e, 'Dord', 'Dord'),
(146, 0x44756e79616e696e20656e207a656865726c692063616e6c6973692068616e73696469723f2e, 'Chironex', 'Chironex'),
(147, 0x4f2068616e7369206f6c6b656469726b69206f7a206572617a6973696e692064656e697a692071757275646d61716c612063686f78616c6469723f2e, 'Hollandiya', 'Hollandiya'),
(148, 0x44756e79616e696e20656e2079756b73656b206461676820676f6c753f2e, 'Titikaka', 'Titikaka'),
(149, 0x496c6b207265737075626c696b612068617261646120796172616e69623f2e, 'Roma', 'Roma'),
(150, 0xe2809c4b61756368756be2809d20736f7a756e756e206d656e617369206e656469723f2e, 'Aghlayan aghac', 'Aghlayan aghac'),
(151, 0x44696c696e2068616e7369206869737365736920686563682064616420686973732065746d69723f2e, 'Orta hissesi', 'Orta hissesi'),
(152, 0x516173696d20626579205a616b69722068617261646120616e6164616e206f6c75623f2e, 'Shushada', 'Shushada'),
(153, 0x417a657262617963616e20446f766c65742054656c6576697a79617369206e65207661787420616368696c69623f2e, '1956', '1956'),
(154, 0x417a657262617963616e646120696c6b20646566652048657169716920446f766c65742045646c697965204d757368617669726c697969206b696d6520766572696c69623f2e, 'Ismet Qayibov', 'Ismet Qayibov'),
(155, 0x4861636920516172616e696e206172766164696e696e20616469206e65206964693f2e, 'Tukez', 'Tukez'),
(156, 0x546163696b697374616e696e2070617974617874692068616e73696469723f2e, 'Dushenbe', 'Dushenbe'),
(157, 0x4d757165646465732079656c656e612061646173696e696e206b696d206b6573686620656469623f2e, 'Vasqo da Qama', 'Vasqo da Qama'),
(158, 0x536574746172204265686c756c7a616465206e656368696469723f2e, 'Ressam', 'Ressam'),
(159, 0x4265726c696e20686173617269206e65207661787420736f6b756c75623f2e, '1989', '1989'),
(160, 0x417a657262617963616e204d696c6c69204469726368656c6973682067756e75206e6520766178746469723f2e, '17 noyabr', '17 noyabr'),
(161, 0x416b74796f72e2809d204a616e204b6c6f75642056616e64616d6d65e2809d2068617261646120616e6164616e206f6c75623f2e, 'Belchikada', 'Belchikada'),
(162, 0x5961706f6e6979616e696e20696c6b207061797461787469206e6563652061646c616e69623f2e, 'Nara', 'Nara'),
(163, 0x46656e6572626168636865206e65207661787420796172616e69623f2e, '1907', '1907'),
(164, 0x46656e65726261686368656e696e20626173686b616e693f2e, 'Aziz Yildirim', 'Aziz Yildirim'),
(165, 0x56616c656e73697961206b6c7562756e756e2073696d766f6c753f2e, 'Yarasa', 'Yarasa'),
(166, 0x73697a6365206e6563652079617364612065766c696c696b20757175726c75206f6c6162696c65723f, '26', '26'),
(167, 0x55736d692c74616e696e6d6973682c686572206b6573696e2074616e696469676920696e73616e61206e652064657969726c65723f, 'meshur', 'meshur');

-- --------------------------------------------------------

--
-- Table structure for table `bot_message_error`
--

CREATE TABLE IF NOT EXISTS `bot_message_error` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `soz` text NOT NULL,
  `mesaj` text NOT NULL,
  `nov` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=86 ;

--
-- Dumping data for table `bot_message_error`
--

INSERT INTO `bot_message_error` (`id`, `soz`, `mesaj`, `nov`) VALUES
(16, 'salam', 'salam!', 1),
(15, 'salam', 'salam', 1),
(8, 'adin nedi', 'nikimde yazilib', 3),
(10, 'adin nedi..?', 'hele tez deyilki.?;(', 6),
(11, 'evlisen..?', 'yox subayam;)', 5),
(13, 'netersen', 'yaxsi bes sen?', 0),
(17, 'salam', 'slm', 1),
(19, 'salam', 'salam....', 1),
(20, 'salam', 'SALAM', 1),
(22, 'adin nedi?', 'adsizam))', 3),
(23, 'adin nedi?', 'anketde var', 3),
(24, 'necesen', 'ela', 3),
(25, 'necesen', 'yaxsi sen?', 3),
(26, 'necesen', 'yaxsiyam', 3),
(27, 'necesen', 'yaxsi olasan', 3),
(28, 'necesiz?', 'twk siz?', 3),
(29, 'necesiz?', 'twk', 3),
(30, 'necesiz?', 'tewekkur yaxsiyam', 3),
(31, 'burdasan?', 'he burdayam', 3),
(32, 'yaxsiyam adin ne', 'adim nikimde var', 3),
(33, 'yaxwiyam adin ne', 'adim nikimde var', 3),
(34, 'yaxwiyam adin ne', 'adim qokkuw)', 3),
(36, 'salam necesen', 'salam elaa', 1),
(37, 'salamda', 'hello', 1),
(38, 'hey', 'can', 1),
(40, 'hey', 'azzar', 1),
(41, 'Sizi tanimaq isterdim', 'tanis olmuram', 3),
(42, 'Sizi tanimaq isterdim', 'dost kimi olar', 3),
(43, 'Sizi tanimaq isterdim', 'taniwim var', 3),
(44, 'Sizi tanimaq isterdim', 'buyur', 3),
(45, 'Sizi tanimaq isterdim', 'olar', 3),
(46, 'menim adim', 'Sad oldum', 3),
(47, 'menim adim', 'memnun oldum', 3),
(48, 'menim adim', 'bildim', 3),
(49, 'harda qalansiz', 'bakida', 3),
(50, 'harda qalansiz', 'sumqayitda', 3),
(51, 'harda qalansiz', 'evde', 3),
(52, 'harda qalansiz', 'neynirsen', 3),
(53, 'harda qalirsan', 'bakida', 3),
(54, 'harda qalirsan', 'sumqayitda', 3),
(55, 'harda qalirsan', 'evde', 3),
(56, 'harda qalirsan', 'olmaz', 3),
(57, 'Men bura yeni geldim', 'ele mende yeniyem', 3),
(58, 'Men bura yeni geldim', 'bildim', 3),
(59, 'Men bura yeni geldim', 'lap yaxsi', 3),
(60, 'Men bura yeni geldim', 'bawa duwdum', 3),
(61, 'Sizi yaxindan tanimaq isterdim', 'niye', 3),
(62, 'Sizi yaxindan tanimaq isterdim', 'olmaz', 3),
(63, 'Sizi yaxindan tanimaq isterdim', 'taniwim varda', 3),
(64, 'yaxsi gununuz olsun', 'tewekkur sizinde', 3),
(65, 'yaxsi gununuz olsun', 'sizinde', 3),
(66, 'yaxsi gununuz olsun', 'bahem', 3),
(67, 'gelirem indi', 'yaxsi', 1),
(68, 'gelirem indi', 'oldu', 1),
(69, 'gelirem indi', 'ele mende', 1),
(70, 'gelirem indi', 'anladim', 1),
(71, 'gellem indi', 'oldu', 1),
(72, 'gellem indi', 'bildim', 1),
(73, 'gellem indi', 'yaxsi', 1),
(74, 'gellem indi', 'burdayam men', 1),
(75, 'gellem indi', 'gozleyirem', 1),
(76, 'sik', 'cann', 9),
(78, 'adiniz nedi?', 'adimgulerdi bes sizin?', 3),
(79, 'yenisiz burda?', 'beli yeniyem darixiram nese', 3),
(80, 'hardansan?', 'bakidan bes sen?', 3),
(81, 'niye bele kefsizsen nese olub?', 'yo sadece biraz darixiram', 3),
(82, 'sevgilin var?', 'yox sevgiye inanmiram', 3),
(83, 'botdi adin', 'yox gulerdi gormursen?))', 3),
(84, 'noldu?', 'hec utaniram biraz(((', 3),
(85, 'Neyse olmus mu', 'yok ya sikiliyorum sadece', 3);

-- --------------------------------------------------------

--
-- Table structure for table `bot_user_error`
--

CREATE TABLE IF NOT EXISTS `bot_user_error` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `act` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=55 ;

--
-- Dumping data for table `bot_user_error`
--

INSERT INTO `bot_user_error` (`id`, `userid`, `user`, `act`) VALUES
(52, 15, 'Simpaticni', 0),
(53, 20, 'Guler_31', 0),
(54, 22, 'Sema8', 0);

-- --------------------------------------------------------

--
-- Table structure for table `capchat`
--

CREATE TABLE IF NOT EXISTS `capchat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(20) NOT NULL,
  `soft` varchar(150) NOT NULL DEFAULT '',
  `operator` varchar(10) NOT NULL,
  `time` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `capchat`
--


-- --------------------------------------------------------

--
-- Table structure for table `card_active_game`
--

CREATE TABLE IF NOT EXISTS `card_active_game` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `us` int(11) NOT NULL,
  `nk` int(11) NOT NULL,
  `xod` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `game` varchar(1024) NOT NULL,
  `status` int(1) NOT NULL,
  `kozer` varchar(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `card_active_game`
--

INSERT INTO `card_active_game` (`id`, `us`, `nk`, `xod`, `time`, `game`, `status`, `kozer`) VALUES
(1, 2, 1, 1, 1427539332, 'qk,jx,ku,ju,6k,ax,8u,kk,6p,10u,9u,kx,kp,7k,au,10p,10x,9x,7x,6x,8k,7u,8x,ak', 4, 'ak');

-- --------------------------------------------------------

--
-- Table structure for table `card_cards`
--

CREATE TABLE IF NOT EXISTS `card_cards` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `card_cards`
--

INSERT INTO `card_cards` (`id`, `name`) VALUES
(1, '6x'),
(2, '6u'),
(3, '6k'),
(4, '6p'),
(5, '7x'),
(6, '7u'),
(7, '7k'),
(8, '7p'),
(9, '8x'),
(10, '8u'),
(11, '8k'),
(12, '8p'),
(13, '9x'),
(14, '9u'),
(15, '9k'),
(16, '9p'),
(17, '10x'),
(18, '10u'),
(19, '10k'),
(20, '10p'),
(21, 'jx'),
(22, 'ju'),
(23, 'jk'),
(24, 'jp'),
(25, 'qx'),
(26, 'qu'),
(27, 'qk'),
(28, 'qp'),
(29, 'kx'),
(30, 'ku'),
(31, 'kk'),
(32, 'kp'),
(33, 'ax'),
(34, 'au'),
(35, 'ak'),
(36, 'ap');

-- --------------------------------------------------------

--
-- Table structure for table `card_devet`
--

CREATE TABLE IF NOT EXISTS `card_devet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `us` int(11) NOT NULL,
  `nk` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `time` (`status`,`time`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `card_devet`
--


-- --------------------------------------------------------

--
-- Table structure for table `card_end_games`
--

CREATE TABLE IF NOT EXISTS `card_end_games` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usid` int(11) NOT NULL,
  `nkid` int(11) NOT NULL,
  `shot` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `card_end_games`
--

INSERT INTO `card_end_games` (`id`, `usid`, `nkid`, `shot`) VALUES
(1, 1, 2, '0-0'),
(2, 2, 1, '0-0');

-- --------------------------------------------------------

--
-- Table structure for table `card_game_user`
--

CREATE TABLE IF NOT EXISTS `card_game_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `game_id` int(11) NOT NULL,
  `card1` varchar(5) NOT NULL,
  `card2` varchar(5) NOT NULL,
  `action` int(2) NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `card_2` (`card1`,`card2`),
  KEY `cards` (`id`,`card1`,`card2`),
  KEY `action` (`game_id`,`action`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `card_game_user`
--

INSERT INTO `card_game_user` (`id`, `game_id`, `card1`, `card2`, `action`, `time`) VALUES
(1, 1, 'qx', '', 0, 1427539212);

-- --------------------------------------------------------

--
-- Table structure for table `card_message`
--

CREATE TABLE IF NOT EXISTS `card_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usid` int(11) NOT NULL,
  `toid` int(11) NOT NULL,
  `text` varchar(255) NOT NULL,
  `read` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `toid` (`toid`),
  KEY `index` (`toid`,`usid`,`read`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `card_message`
--


-- --------------------------------------------------------

--
-- Table structure for table `card_setting`
--

CREATE TABLE IF NOT EXISTS `card_setting` (
  `key` varchar(50) NOT NULL,
  `value` varchar(1124) NOT NULL,
  UNIQUE KEY `key` (`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED;

--
-- Dumping data for table `card_setting`
--

INSERT INTO `card_setting` (`key`, `value`) VALUES
('level-1', 'Qonaq'),
('level-2', 'Heveskar'),
('level-3', 'Qumarbaz'),
('levle-4', ''),
('level-5', ''),
('level_default', '1'),
('point_default', '50'),
('time_online', '300'),
('time_up', '120'),
('point_1', '1'),
('point_2', '10'),
('point_3', '50');

-- --------------------------------------------------------

--
-- Table structure for table `card_users`
--

CREATE TABLE IF NOT EXISTS `card_users` (
  `point` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usid` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `sex` int(1) NOT NULL,
  `level` int(2) NOT NULL,
  `time` int(11) NOT NULL,
  `room` int(11) NOT NULL,
  `active_game` int(11) NOT NULL,
  `cards` varchar(1000) NOT NULL,
  `con` int(2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `time` (`id`,`time`),
  KEY `usid` (`usid`),
  KEY `point` (`level`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `card_users`
--

INSERT INTO `card_users` (`point`, `id`, `usid`, `user`, `sex`, `level`, `time`, `room`, `active_game`, `cards`, `con`) VALUES
(50, 1, 12, 'Cesus', 0, 1, 1488563291, 0, 0, '', 0),
(50, 2, 1, 'ADMiN', 0, 1, 1507139909, 0, 0, '', 0),
(50, 3, 39, 'StaRik2', 0, 1, 1492077601, 0, 0, '', 0),
(50, 4, 1050, 'ayka252', 1, 1, 1492544332, 0, 0, '', 0),
(50, 5, 11, 'KuSguN', 1, 1, 1492459713, 0, 0, '', 0),
(50, 6, 138, 'Menimsen', 1, 1, 1495228960, 0, 0, '', 0),
(50, 7, 19, 'Semih', 0, 1, 1495737622, 0, 0, '', 0),
(50, 8, 296, 'sseevvmeni', 0, 1, 1496251154, 0, 0, '', 0),
(50, 9, 254, 'GOPCU', 0, 1, 1496314356, 0, 0, '', 0),
(50, 10, 485, 'varrrr', 0, 1, 1499258385, 0, 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `conf`
--

CREATE TABLE IF NOT EXISTS `conf` (
  `acar` smallint(1) NOT NULL DEFAULT '0',
  `qadin` int(11) NOT NULL DEFAULT '0',
  `kisi` int(11) NOT NULL DEFAULT '0',
  `son` varchar(15) DEFAULT NULL,
  `max` int(11) DEFAULT '0',
  `tarix` varchar(20) NOT NULL DEFAULT '',
  `ipp` varchar(200) NOT NULL,
  `soft` varchar(200) NOT NULL,
  `qip` varchar(20) NOT NULL,
  `qsoft` varchar(200) NOT NULL,
  `time` int(11) DEFAULT '0',
  KEY `acar` (`acar`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `conf`
--

INSERT INTO `conf` (`acar`, `qadin`, `kisi`, `son`, `max`, `tarix`, `ipp`, `soft`, `qip`, `qsoft`, `time`) VALUES
(1, 120, 178, 'Aghayeff', 277, '19.06.17 /05:51', '5.44.3', 'Mozilla/5.0 (SymbianOS/9.4; Series60/5.0 Nokia5230/21.0.004; Profile/MIDP-2.1 Configuration/CLDC-1.1 ) AppleWebKit/525 (KHTML, like Gecko) Version/3.0 BrowserNG/7.2.5.2 3gpp-gba', '5.191.18.69', 'Mozilla/5.0 (Linux; Android 8.1.0; Redmi 5A) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.125 Mobile Safari/537.36', 1598247074);

-- --------------------------------------------------------

--
-- Table structure for table `c_nick`
--

CREATE TABLE IF NOT EXISTS `c_nick` (
  `lid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id` int(11) NOT NULL DEFAULT '0',
  `to` int(11) DEFAULT '0',
  `photo` varchar(25) DEFAULT NULL,
  `date` text CHARACTER SET cp1251 NOT NULL,
  `time` int(11) unsigned NOT NULL DEFAULT '0',
  `gun` tinyint(4) DEFAULT '0',
  `qeyd` text NOT NULL,
  PRIMARY KEY (`lid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `c_nick`
--


-- --------------------------------------------------------

--
-- Table structure for table `data_reg`
--

CREATE TABLE IF NOT EXISTS `data_reg` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `sid` int(11) NOT NULL,
  `date` varchar(10) NOT NULL,
  `site_url` varchar(50) NOT NULL,
  `amount` varchar(5) NOT NULL,
  `active` tinyint(4) NOT NULL,
  `code` varchar(13) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=642 ;

--
-- Dumping data for table `data_reg`
--


-- --------------------------------------------------------

--
-- Table structure for table `data_reg_sum`
--

CREATE TABLE IF NOT EXISTS `data_reg_sum` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `hour` varchar(2) NOT NULL,
  `price` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=25 ;

--
-- Dumping data for table `data_reg_sum`
--

INSERT INTO `data_reg_sum` (`id`, `hour`, `price`) VALUES
(1, '00', '10'),
(2, '01', '5'),
(3, '02', '5'),
(4, '03', '3'),
(5, '04', '2'),
(6, '05', '1'),
(7, '06', '1'),
(8, '07', '2'),
(9, '08', '3'),
(10, '09', '3'),
(11, '10', '5'),
(12, '11', '5'),
(13, '12', '5'),
(14, '13', '2'),
(15, '14', '5'),
(16, '15', '10'),
(17, '16', '10'),
(18, '17', '10'),
(19, '18', '10'),
(20, '19', '10'),
(21, '20', '10'),
(22, '21', '10'),
(23, '22', '10'),
(24, '23', '10');

-- --------------------------------------------------------

--
-- Table structure for table `data_reklam`
--

CREATE TABLE IF NOT EXISTS `data_reklam` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `yeri` varchar(10) NOT NULL,
  `action` varchar(30) NOT NULL,
  `time` int(11) NOT NULL,
  `clicks` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `data_reklam`
--


-- --------------------------------------------------------

--
-- Table structure for table `domino_bazari`
--

CREATE TABLE IF NOT EXISTS `domino_bazari` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `oyunid` int(11) NOT NULL,
  `son` int(11) NOT NULL DEFAULT '0',
  `vaxt` int(11) NOT NULL DEFAULT '0',
  `daslar` varchar(1000) NOT NULL,
  `qalan` int(11) NOT NULL DEFAULT '28',
  `oyna` varchar(2000) NOT NULL,
  `yerde` int(11) NOT NULL DEFAULT '0',
  `point` int(11) NOT NULL DEFAULT '0',
  `oyuncu` int(11) NOT NULL DEFAULT '0',
  `gedis` int(11) NOT NULL DEFAULT '0',
  `oyuncular` varchar(20) NOT NULL,
  `a` varchar(11) NOT NULL,
  `b` varchar(11) NOT NULL,
  `c` varchar(11) NOT NULL,
  `d` varchar(11) NOT NULL,
  `qat` int(11) NOT NULL DEFAULT '0',
  `qosadanqat` int(11) NOT NULL DEFAULT '0',
  `taym` int(11) NOT NULL DEFAULT '0',
  `round` int(11) NOT NULL DEFAULT '0',
  `ilkdas` varchar(20) NOT NULL DEFAULT '0',
  `baglidi` int(11) NOT NULL DEFAULT '0',
  `songeldi` varchar(20) NOT NULL,
  `yenilendi` int(11) NOT NULL DEFAULT '0',
  `sonbagli` int(11) NOT NULL DEFAULT '0',
  `tambaglidi` int(11) NOT NULL DEFAULT '0',
  `tapilmadiqosa` int(11) NOT NULL DEFAULT '0',
  `pointuddu` int(11) NOT NULL DEFAULT '0',
  `cixdilar` int(11) NOT NULL DEFAULT '0',
  `goturdu` int(11) NOT NULL DEFAULT '0',
  `kimcixdi` varchar(20) NOT NULL,
  `taymbagla` int(11) NOT NULL DEFAULT '0',
  `anik` varchar(30) NOT NULL,
  `bnik` varchar(30) NOT NULL,
  `cnik` varchar(30) NOT NULL,
  `dnik` varchar(30) NOT NULL,
  `oyunvaxti` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 PACK_KEYS=0 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `domino_bazari`
--

INSERT INTO `domino_bazari` (`id`, `oyunid`, `son`, `vaxt`, `daslar`, `qalan`, `oyna`, `yerde`, `point`, `oyuncu`, `gedis`, `oyuncular`, `a`, `b`, `c`, `d`, `qat`, `qosadanqat`, `taym`, `round`, `ilkdas`, `baglidi`, `songeldi`, `yenilendi`, `sonbagli`, `tambaglidi`, `tapilmadiqosa`, `pointuddu`, `cixdilar`, `goturdu`, `kimcixdi`, `taymbagla`, `anik`, `bnik`, `cnik`, `dnik`, `oyunvaxti`) VALUES
(1, 1, 0, 1488614505, '1.3,2.6,', 2, '5.0,0.3,3.5,5.4,4.1,1.1,1.0,0.0,0.6,6.6,6.4,4.4,4.0,0.2,', 14, 50, 2, 2, '1,2,', '0', '0', '', '', 1, 0, 0, 1, '4.4', 0, '', 1, 1, 0, 0, 100, 0, 1, 'a', 0, 'Admin', 'Agilli', '', '', 1488615589),
(2, 1, 0, 1488616054, '0.0,0.1,0.2,0.3,0.4,0.5,0.6,1.1,1.2,1.3,1.4,1.5,1.6,2.2,2.3,2.4,2.5,2.6,3.3,3.4,3.5,3.6,4.4,4.5,4.6,5.5,5.6,6.6,', 28, '', 0, 50, 2, 0, '1,', '0', '0', '', '', 0, 0, 0, 0, '0', 0, '', 0, 0, 0, 0, 100, 0, 0, '', 0, 'Admin', '', '', '', 0),
(3, 2, 0, 1488616083, '0.0,0.1,0.2,0.3,0.4,0.5,0.6,1.1,1.2,1.3,1.4,1.5,1.6,2.2,2.3,2.4,2.5,2.6,3.3,3.4,3.5,3.6,4.4,4.5,4.6,5.5,5.6,6.6,', 28, '', 0, 50, 2, 0, '2,', '0', '0', '', '', 0, 0, 0, 0, '0', 0, '', 0, 1, 0, 0, 100, 0, 0, '', 0, 'Agilli', '', '', '', 0),
(4, 1, 0, 1488709166, '0.0,0.1,0.2,0.3,0.4,0.5,0.6,1.1,1.2,1.3,1.4,1.5,1.6,2.2,2.3,2.4,2.5,2.6,3.3,3.4,3.5,3.6,4.4,4.5,4.6,5.5,5.6,6.6,', 28, '', 0, 50, 2, 0, '1,', '0', '0', '', '', 0, 0, 0, 0, '0', 0, '', 0, 1, 0, 0, 100, 0, 0, '', 0, 'Admin', '', '', '', 0),
(5, 1, 0, 1492150190, '0.0,0.6,1.2,1.3,1.5,1.6,2.2,2.4,2.6,3.3,3.5,3.6,4.5,5.6,', 14, '0.1,1.1,1.4,', 3, 0, 2, 2, '1,48,', '0', '0', '', '', 0, 0, 0, 0, '1.1', 0, '', 0, 1, 0, 0, 0, 0, 1, 'b', 0, 'ADMIN', 'StaRik3', '', '', 1492150418),
(6, 44, 0, 1492151687, '0.0,0.1,0.2,0.3,0.4,0.5,0.6,1.1,1.2,1.3,1.4,1.5,1.6,2.2,2.3,2.4,2.5,2.6,3.3,3.4,3.5,3.6,4.4,4.5,4.6,5.5,5.6,6.6,', 28, '', 0, 50, 2, 0, '44,', '0', '0', '', '', 0, 0, 0, 0, '0', 0, '', 0, 1, 0, 0, 100, 0, 0, '', 0, 'Avara', '', '', '', 0),
(7, 1066, 0, 1492375559, '0.0,0.1,0.2,0.3,0.4,0.5,0.6,1.1,1.2,1.3,1.4,1.5,1.6,2.2,2.3,2.4,2.5,2.6,3.3,3.4,3.5,3.6,4.4,4.5,4.6,5.5,5.6,6.6,', 28, '', 0, 40, 4, 0, '1066,', '0', '0', '0', '0', 0, 0, 0, 0, '0', 0, '', 0, 0, 0, 0, 160, 0, 0, '', 0, 'BaRcA_LIO_MeSsI', '', '', '', 0),
(8, 46, 0, 1492447365, '0.0,0.1,0.2,0.3,0.4,0.5,0.6,1.1,1.2,1.3,1.4,1.5,1.6,2.2,2.3,2.4,2.5,2.6,3.3,3.4,3.5,3.6,4.4,4.5,4.6,5.5,5.6,6.6,', 28, '', 0, 100, 2, 0, '46,', '0', '0', '', '', 0, 0, 0, 0, '0', 0, '', 0, 0, 0, 0, 200, 0, 0, '', 0, 'KuSguN', '', '', '', 0),
(9, 1033, 0, 1492454573, '0.0,0.1,0.2,0.3,0.4,0.5,0.6,1.1,1.2,1.3,1.4,1.5,1.6,2.2,2.3,2.4,2.5,2.6,3.3,3.4,3.5,3.6,4.4,4.5,4.6,5.5,5.6,6.6,', 28, '', 0, 0, 2, 0, '1033,', '0', '0', '', '', 0, 0, 0, 0, '0', 0, '', 0, 0, 0, 0, 0, 0, 0, '', 0, 'By_ELiK-', '', '', '', 0),
(10, 48, 0, 1492454606, '0.0,0.1,0.3,0.5,1.1,1.2,1.3,2.2,3.3,3.4,4.4,4.6,5.5,5.6,', 14, '', 0, 0, 2, 1, '48,1033,', '0', '0', '', '', 0, 0, 0, 0, '6.6', 0, '', 0, 1, 0, 0, 0, 0, 1, 'b', 0, 'STARIK', 'By_ELiK-', '', '', 0),
(11, 48, 0, 1492454922, '0.0,0.5,1.2,1.4,1.5,1.6,2.2,2.3,2.6,3.4,3.5,3.6,4.6,5.6,', 14, '4.2,2.0,0.6,6.6,', 4, 5, 2, 2, '48,1033,', '0', '0', '', '', 0, 0, 0, 1, '2.2', 0, '', 0, 1, 0, 0, 10, 0, 1, 'b', 0, 'STARIK', 'By_ELiK-', '', '', 1492455754),
(12, 1, 0, 1492459186, '0.0,0.1,0.2,0.3,0.4,0.5,0.6,1.1,1.2,1.3,1.4,1.5,1.6,2.2,2.3,2.4,2.5,2.6,3.3,3.4,3.5,3.6,4.4,4.5,4.6,5.5,5.6,6.6,', 28, '', 0, 50, 2, 0, '1,11,', '0', '0', '', '', 0, 0, 0, 0, '0', 0, '', 0, 1, 0, 0, 100, 0, 0, '', 0, 'ADMIN', 'KuSguN', '', '', 0),
(13, 1, 0, 1492524445, '0.0,0.1,0.2,0.3,0.4,0.5,0.6,1.1,1.2,1.3,1.4,1.5,1.6,2.2,2.3,2.4,2.5,2.6,3.3,3.4,3.5,3.6,4.4,4.5,4.6,5.5,5.6,6.6,', 28, '', 0, 50, 2, 0, '1,', '0', '0', '', '', 0, 0, 0, 0, '0', 0, '', 0, 0, 0, 0, 100, 0, 0, '', 0, 'ADMIN', '', '', '', 0),
(14, 1, 0, 1492524735, '0.0,0.1,0.2,0.3,0.4,0.5,0.6,1.1,1.2,1.3,1.4,1.5,1.6,2.2,2.3,2.4,2.5,2.6,3.3,3.4,3.5,3.6,4.4,4.5,4.6,5.5,5.6,6.6,', 28, '', 0, 50, 2, 0, '1,', '0', '0', '', '', 0, 0, 0, 0, '0', 0, '', 0, 1, 0, 0, 100, 0, 0, '', 0, 'ADMIN', '', '', '', 0),
(15, 1, 0, 1492546248, '0.0,0.1,0.2,0.3,0.4,0.5,0.6,1.1,1.2,1.3,1.4,1.5,1.6,2.2,2.3,2.4,2.5,2.6,3.3,3.4,3.5,3.6,4.4,4.5,4.6,5.5,5.6,6.6,', 28, '', 0, 50, 2, 0, '1,', '0', '0', '', '', 0, 0, 0, 0, '0', 0, '', 0, 0, 0, 0, 100, 0, 0, '', 0, 'ADMIN', '', '', '', 0),
(16, 2, 0, 1492546479, '0.0,0.2,0.4,1.1,1.2,1.5,1.6,2.2,2.3,2.6,3.6,4.4,4.5,6.6,', 14, '4.3,3.3,', 2, 50, 2, 2, '2,1,', '0', '0', '', '', 0, 0, 0, 0, '3.3', 0, '', 0, 1, 0, 0, 100, 0, 1, 'a', 0, 'Agilli', 'ADMIN', '', '', 1492546563),
(17, 2, 0, 1492546891, '0.0,0.1,0.2,1.2,1.3,2.3,2.5,2.6,3.3,4.4,4.5,4.6,5.5,5.6,', 14, '6.6,6.1,1.1,', 3, 50, 2, 2, '2,1,', '0', '0', '', '', 0, 0, 0, 0, '1.1', 0, '', 0, 1, 0, 0, 100, 0, 1, 'b', 0, 'Agilli', 'ADMIN', '', '', 1492546825),
(18, 48, 0, 1492547664, '0.0,0.2,0.3,0.5,0.6,1.1,1.5,1.6,2.2,2.3,2.5,2.6,3.3,3.4,3.5,3.6,4.4,4.5,4.6,5.5,6.6,', 21, '', 0, 50, 2, 0, '48,1,', '0', '0', '', '', 0, 0, 0, 0, '0', 0, '', 0, 1, 0, 0, 100, 0, 0, '', 0, 'STARIK', 'ADMIN', '', '', 0),
(19, 48, 0, 1492547874, '0.0,0.3,0.4,1.3,1.5,2.2,2.3,2.4,3.3,3.4,3.5,5.5,5.6,6.6,', 14, '', 0, 50, 2, 0, '48,1,1,', '0', '0', '', '', 0, 0, 0, 0, '0', 0, '', 0, 1, 0, 0, 100, 0, 0, '', 0, 'STARIK', 'ADMIN', '', '', 0),
(20, 48, 0, 1492548084, '1.5,2.3,2.5,2.6,3.5,4.4,5.5,5.6,', 8, '4.5,5.0,0.3,3.1,1.4,4.3,3.6,6.6,6.4,4.0,0.1,1.6,6.0,0.2,2.2,2.1,', 16, 50, 2, 2, '48,1,', '0', '0', '', '', 0, 0, 1, 1, '2.2', 0, '', 0, 1, 0, 0, 100, 0, 1, 'b', 0, 'STARIK', 'ADMIN', '', '', 1492549389),
(21, 1187, 0, 1492590614, '0.0,0.1,0.2,0.3,0.4,0.5,0.6,1.1,1.2,1.3,1.4,1.5,1.6,2.2,2.3,2.4,2.5,2.6,3.3,3.4,3.5,3.6,4.4,4.5,4.6,5.5,5.6,6.6,', 28, '', 0, 50, 2, 0, '1187,', '1187', '0', '', '', 0, 0, 0, 0, '0', 0, '', 0, 0, 0, 0, 100, 0, 0, '', 0, 'Kayott', '', '', '', 0),
(22, 1033, 0, 1492593305, '0.0,0.1,0.2,0.3,0.4,0.5,0.6,1.1,1.2,1.3,1.4,1.5,1.6,2.2,2.3,2.4,2.5,2.6,3.3,3.4,3.5,3.6,4.4,4.5,4.6,5.5,5.6,6.6,', 28, '', 0, 50, 2, 0, '1033,', '1033', '0', '', '', 0, 0, 0, 0, '0', 0, '', 0, 0, 0, 0, 100, 0, 0, '', 0, 'By_ELiK-', '', '', '', 0),
(23, 52, 0, 1494621817, '0.0,0.1,0.2,0.3,0.4,0.5,0.6,1.1,1.2,1.3,1.4,1.5,1.6,2.2,2.3,2.4,2.5,2.6,3.3,3.4,3.5,3.6,4.4,4.5,4.6,5.5,5.6,6.6,', 28, '', 0, 50, 2, 0, '52,', '0', '0', '', '', 0, 0, 0, 0, '0', 0, '', 0, 0, 0, 0, 100, 0, 0, '', 0, 'Nici', '', '', '', 0),
(24, 87, 0, 1494835886, '0.0,0.1,0.2,0.3,0.4,0.5,0.6,1.1,1.2,1.3,1.4,1.5,1.6,2.2,2.3,2.4,2.5,2.6,3.3,3.4,3.5,3.6,4.4,4.5,4.6,5.5,5.6,6.6,', 28, '', 0, 50, 2, 0, '87,', '87', '0', '', '', 0, 0, 0, 0, '0', 0, '', 0, 0, 0, 0, 100, 0, 0, '', 0, 'KARA_SEVDA', '', '', '', 0),
(25, 1, 0, 1494883436, '0.0,0.1,0.2,0.3,0.4,0.5,0.6,1.1,1.2,1.3,1.4,1.5,1.6,2.2,2.3,2.4,2.5,2.6,3.3,3.4,3.5,3.6,4.4,4.5,4.6,5.5,5.6,6.6,', 28, '', 0, 50, 2, 0, '1,', '0', '0', '', '', 0, 0, 0, 0, '0', 0, '', 0, 1, 0, 0, 100, 0, 0, '', 0, 'Admin', '', '', '', 0),
(26, 138, 0, 1495229244, '0.0,0.1,0.2,0.3,0.4,0.5,0.6,1.1,1.2,1.3,1.4,1.5,1.6,2.2,2.3,2.4,2.5,2.6,3.3,3.4,3.5,3.6,4.4,4.5,4.6,5.5,5.6,6.6,', 28, '', 0, 50, 2, 0, '138,', '138', '0', '', '', 0, 0, 0, 0, '0', 0, '', 0, 0, 0, 0, 100, 0, 0, '', 0, 'Menimsen', '', '', '', 0),
(27, 230, 0, 1495704482, '0.0,0.1,0.2,0.3,0.4,0.5,0.6,1.1,1.2,1.3,1.4,1.5,1.6,2.2,2.3,2.4,2.5,2.6,3.3,3.4,3.5,3.6,4.4,4.5,4.6,5.5,5.6,6.6,', 28, '', 0, 50, 2, 0, '230,', '230', '0', '', '', 0, 0, 0, 0, '0', 0, '', 0, 1, 0, 0, 100, 0, 0, '', 0, 'idmaci', '', '', '', 0),
(28, 46, 0, 1495831684, '0.0,0.1,0.2,0.3,0.4,0.5,0.6,1.1,1.2,1.3,1.4,1.5,1.6,2.2,2.3,2.4,2.5,2.6,3.3,3.4,3.5,3.6,4.4,4.5,4.6,5.5,5.6,6.6,', 28, '', 0, 50, 2, 0, '46,', '46', '0', '', '', 0, 0, 0, 0, '0', 0, '', 0, 1, 0, 0, 100, 0, 0, '', 0, 'NURA', '', '', '', 0),
(29, 42, 0, 1495894779, '0.0,0.1,0.2,0.3,0.4,0.5,0.6,1.1,1.2,1.3,1.4,1.5,1.6,2.2,2.3,2.4,2.5,2.6,3.3,3.4,3.5,3.6,4.4,4.5,4.6,5.5,5.6,6.6,', 28, '', 0, 50, 2, 0, '42,', '0', '0', '', '', 0, 0, 0, 0, '0', 0, '', 0, 0, 0, 0, 100, 0, 0, '', 0, 'GULLER_PRENCESSI', '', '', '', 0),
(30, 42, 0, 1495894908, '0.0,0.1,0.2,0.3,0.4,0.5,0.6,1.1,1.2,1.3,1.4,1.5,1.6,2.2,2.3,2.4,2.5,2.6,3.3,3.4,3.5,3.6,4.4,4.5,4.6,5.5,5.6,6.6,', 28, '', 0, 50, 2, 0, '42,', '0', '0', '', '', 0, 0, 0, 0, '0', 0, '', 0, 1, 0, 0, 100, 0, 0, '', 0, 'GULLER_PRENCESSI', '', '', '', 0),
(31, 248, 0, 1495895793, '0.0,0.1,0.2,0.3,0.4,0.5,0.6,1.1,1.2,1.3,1.4,1.5,1.6,2.2,2.3,2.4,2.5,2.6,3.3,3.4,3.5,3.6,4.4,4.5,4.6,5.5,5.6,6.6,', 28, '', 0, 50, 2, 0, '248,', '248', '0', '', '', 0, 0, 0, 0, '0', 0, '', 0, 0, 0, 0, 100, 0, 0, '', 0, 'Okyan', '', '', '', 0),
(32, 170, 0, 1496227302, '0.0,0.1,0.2,0.3,0.4,0.5,0.6,1.1,1.2,1.3,1.4,1.5,1.6,2.2,2.3,2.4,2.5,2.6,3.3,3.4,3.5,3.6,4.4,4.5,4.6,5.5,5.6,6.6,', 28, '', 0, 50, 2, 0, '170,', '0', '0', '', '', 0, 0, 0, 0, '0', 0, '', 0, 0, 0, 0, 100, 0, 0, '', 0, 'SURUCU', '', '', '', 0),
(33, 1, 0, 1496858550, '0.0,0.1,0.2,0.3,0.4,0.5,0.6,1.1,1.2,1.3,1.4,1.5,1.6,2.2,2.3,2.4,2.5,2.6,3.3,3.4,3.5,3.6,4.4,4.5,4.6,5.5,5.6,6.6,', 28, '', 0, 50, 2, 0, '1,', '0', '0', '', '', 0, 0, 0, 0, '0', 0, '', 0, 0, 0, 0, 100, 0, 0, '', 0, 'QARA_PELENG', '', '', '', 0),
(34, 400, 0, 1497526739, '0.0,0.1,0.2,0.3,0.4,0.5,0.6,1.1,1.2,1.3,1.4,1.5,1.6,2.2,2.3,2.4,2.5,2.6,3.3,3.4,3.5,3.6,4.4,4.5,4.6,5.5,5.6,6.6,', 28, '', 0, 50, 2, 0, '400,', '400', '0', '', '', 0, 0, 0, 0, '0', 0, '', 0, 0, 0, 0, 100, 0, 0, '', 0, 'ByON', '', '', '', 0),
(35, 418, 0, 1497882364, '0.0,0.1,0.2,0.3,0.4,0.5,0.6,1.1,1.2,1.3,1.4,1.5,1.6,2.2,2.3,2.4,2.5,2.6,3.3,3.4,3.5,3.6,4.4,4.5,4.6,5.5,5.6,6.6,', 28, '', 0, 50, 2, 0, '418,', '0', '0', '', '', 0, 0, 0, 0, '0', 0, '', 0, 0, 0, 0, 100, 0, 0, '', 0, 'NeoN', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `domino_message`
--

CREATE TABLE IF NOT EXISTS `domino_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `domid` int(11) NOT NULL,
  `text` varchar(255) NOT NULL,
  `usid` int(11) NOT NULL DEFAULT '0',
  `time` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=102 ;

--
-- Dumping data for table `domino_message`
--

INSERT INTO `domino_message` (`id`, `domid`, `text`, `usid`, `time`) VALUES
(1, 1, 'Admin Qalib geldi. 73 Xal elave olundu..', 0, 0),
(2, 1, 'Agilli Qalib geldi. 30 Xal elave olundu...', 0, 0),
(3, 1, 'Admin Qalib geldi. 81 Xal elave olundu..', 0, 0),
(4, 1, 'Admin Qalib geldi. Tebrikler...', 0, 0),
(5, 3, 'Oyun&#231;ular tamamlanmad&#305;&#287;&#305; &#252;&#231;&#252;n oyun bitdi. Oyunu terk edin...', 0, 0),
(6, 4, 'Oyun&#231;ular tamamlanmad&#305;&#287;&#305; &#252;&#231;&#252;n oyun bitdi. Oyunu terk edin...', 0, 0),
(7, 5, 'obaa', 48, 1492150032),
(8, 5, 'ele etki mesajlari tam olaraq admin oxuya bilsinnurey', 48, 1492150057),
(9, 5, 'nece yeni?', 1, 1492150093),
(10, 5, '1 qosa mendedi usden vurram get mir', 48, 1492150094),
(11, 5, 'bes niye getdi?', 1, 1492150121),
(12, 5, 'yazandan sonra yenilendi indi gondere bildim', 48, 1492150122),
(13, 5, 'he isleyir cixaq daha gedim xalqimi qurum', 1, 1492150170),
(14, 5, 'ADMIN Oyunu Terk Etdi. Oyunu Terk Edin.', 0, 0),
(15, 5, 'oynadee', 48, 1492150196),
(16, 5, 'he yaxsi', 48, 1492150213),
(17, 8, 'kaw ki tek oynamaq olardi ovtomatik yani', 46, 1492447104),
(18, 10, 'salam polad abi', 1033, 1492454416),
(19, 10, '.u56.', 1033, 1492454430),
(20, 10, 'oyyy', 1033, 1492454452),
(21, 10, 'oyna', 48, 1492454496),
(22, 10, 'salam alik', 48, 1492454511),
(23, 10, 'mende qowa yoxdu.bazar gorunmur.kim oynamalidi indi', 48, 1492454557),
(24, 10, 'hani bazar? saniyye vaxt  da gorsenmirey', 48, 1492454597),
(25, 10, 'STARIK Oyunu Terk Etdi. Oyunu Terk Edin.', 0, 0),
(26, 11, 'geldim', 1033, 1492454687),
(27, 11, 'das gotur basliyaq', 48, 1492454727),
(28, 11, 'gotrdm', 1033, 1492454762),
(29, 11, 'oyna', 48, 1492454868),
(30, 11, 'oyna', 48, 1492454900),
(31, 11, 'yazandan sonra yenilendi indi gondere bildim', 48, 1492454979),
(32, 11, 'sen niye yazi yazmirsanki dominoda?', 48, 1492455004),
(33, 11, 'yazrame duwmib?', 1033, 1492455075),
(34, 11, 'set zefdi onandu brlke nese qatwdiebdawdar', 1033, 1492455100),
(35, 11, 'hani duwmeyibdaa', 48, 1492455107),
(36, 11, 'bu iwlekdi axi. bazara getmek lazim olanda bazar gorunur bele yox', 48, 1492455139),
(37, 11, 'oyna oyna bazari yig gorum', 48, 1492455175),
(38, 11, 'he oynursm braz gotrdm bazardan ', 1033, 1492455218),
(39, 11, 'STARIK Qalib Geldi.. 27 Xal Elave Oludnu..', 0, 0),
(40, 11, 'oyun bitdi,ama mende bazaraget yazilib.daw goturen giclerde olar bu oyunda yeqinki .g3.', 48, 1492455271),
(41, 11, 'oyna', 48, 1492455318),
(42, 11, '.g5. heye nese taraz deyil bayaq men senen qabaq qtarmalfm.dala dusdm', 1033, 1492455347),
(43, 11, 'niye qutarmadin bes?cunku bazara getdindaa', 48, 1492455386),
(44, 11, 'ola ola niye bazara yoladi?', 1033, 1492455532),
(45, 6, 'Oyuncular Tamamlanmadiqi Ucun Oyun Bitdi. Oyunu Terk Edin.', 0, 0),
(46, 12, 'Oyuncular Tamamlanmadiqi Ucun Oyun Bitdi. Oyunu Terk Edin.', 0, 0),
(47, 11, 'STARIK Oyunu Terk Etdi. Oyunu Terk Edin.', 0, 0),
(48, 14, 'Oyuncular Tamamlanmadiqi Ucun Oyun Bitdi. Oyunu Terk Edin.', 0, 0),
(49, 16, 'oyna day', 1, 1492546426),
(50, 16, 'Agilli Oyunu terk etdi. Oyunu terk edin...', 0, 0),
(51, 18, 'kim var domnodaa', 48, 1492547515),
(52, 18, 'admin oxunur mesajim gor dominodan yaziramaa', 48, 1492547541),
(53, 17, 'Agilli Oyunu terk etdi. Oyunu terk edin...', 0, 0),
(54, 18, 'geldim', 1, 1492547618),
(55, 18, 'he oxunur', 1, 1492547630),
(56, 18, 'daw gotur', 1, 1492547659),
(57, 18, 'Oyun&#231;ular tamamlanmad&#305;&#287;&#305; &#252;&#231;&#252;n oyun bitdi. Oyunu terk edin...', 0, 0),
(58, 19, 'iconlar acilmir,', 48, 1492547727),
(59, 19, 'lisenzeni duzeldey gerey', 48, 1492547747),
(60, 19, 'icon asantdi sen hele bunu yoxla de', 1, 1492547750),
(61, 19, 'oxunur mesaj?', 48, 1492547766),
(62, 19, 'a kisi sen onlara baxma ey sene dedim bax gor duzfun isleyir ya yox gelib mene license deyir hele sen islemeyine bax belke hec islemedi?', 1, 1492547797),
(63, 19, 'daw goturdee', 48, 1492547820),
(64, 19, 'Nick	DaÅŸ sayÄ±	Xal A: STARIK	7	0 B: Reqib Yoxdu		', 48, 1492547846),
(65, 19, 'daw gotuur', 48, 1492547873),
(66, 19, 'Oyun&#231;ular tamamlanmad&#305;&#287;&#305; &#252;&#231;&#252;n oyun bitdi. Oyunu terk edin...', 0, 0),
(67, 19, 'neoldu', 48, 1492547890),
(68, 20, 'polad vurqar burda', 1, 1492547945),
(69, 20, 'daw goturdee', 48, 1492547963),
(70, 20, 'he burda', 48, 1492547979),
(71, 20, 'goturdum', 1, 1492547983),
(72, 20, 'oyna', 48, 1492547991),
(73, 20, ' iyag niyedaw gotrmurdun be?', 48, 1492548032),
(74, 20, 'cixmiwdim', 1, 1492548059),
(75, 20, 'cum bazara', 48, 1492548062),
(76, 20, 'mesajlar oxunur?', 48, 1492548116),
(77, 20, 'he oxunur burda yazdigin?', 1, 1492548152),
(78, 20, 'burdan yoxey opwi mesaja baxanda burda yazdixlarimizi gorurseen?mesaj panelden', 48, 1492548197),
(79, 20, 'diyan baxim', 1, 1492548222),
(80, 20, 'yox oxunmur', 1, 1492548268),
(81, 20, 'burdan onlayna asant kecid olmalidi', 48, 1492548271),
(82, 20, 'yoxdu axi', 1, 1492548306),
(83, 20, 'ta neoldu deyiwmeyin xeyri neolduku', 48, 1492548328),
(84, 20, 'oynadee', 48, 1492548370),
(85, 20, 'bilmirem axi qaqa', 1, 1492548378),
(86, 20, 'Oyun ba&#287;l&#305;d&#305;. En az da&#351; ADMIN nickinde idi ve Qalib geldi 15 Xal qazand&#305;... ', 0, 0),
(87, 20, ',,,,,,,', 48, 1492548387),
(88, 20, 'oyna', 48, 1492548439),
(89, 20, 'ADMIN Qalib geldi. 9 Xal elave olundu...', 0, 0),
(90, 20, 'STARIK Qalib geldi. 37 Xal elave olundu..', 0, 0),
(91, 20, 'STARIK Qalib geldi. 12 Xal elave olundu..', 0, 0),
(92, 20, 'STARIK Oyunu terk etdi. Oyunu terk edin...', 0, 0),
(93, 22, 'hgdegfs', 1033, 1492593155),
(94, 25, 'Oyun&#231;ular tamamlanmad&#305;&#287;&#305; &#252;&#231;&#252;n oyun bitdi. Oyunu terk edin...', 0, 0),
(95, 25, '10', 1, 1495894360),
(96, 29, 'He', 42, 1495894673),
(97, 30, '10', 42, 1495894747),
(98, 25, '10', 1, 1495894861),
(99, 30, 'Oyun&#231;ular tamamlanmad&#305;&#287;&#305; &#252;&#231;&#252;n oyun bitdi. Oyunu terk edin...', 0, 0),
(100, 28, 'Oyun&#231;ular tamamlanmad&#305;&#287;&#305; &#252;&#231;&#252;n oyun bitdi. Oyunu terk edin...', 0, 0),
(101, 27, 'Oyun&#231;ular tamamlanmad&#305;&#287;&#305; &#252;&#231;&#252;n oyun bitdi. Oyunu terk edin...', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `domino_p`
--

CREATE TABLE IF NOT EXISTS `domino_p` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL DEFAULT '0',
  `sifre` varchar(70) NOT NULL,
  `time` int(11) NOT NULL DEFAULT '0',
  `qiymet` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `domino_p`
--

INSERT INTO `domino_p` (`id`, `userid`, `sifre`, `time`, `qiymet`) VALUES
(1, 1170, '3689000781657', 1492473410, 'Azercell');

-- --------------------------------------------------------

--
-- Table structure for table `d_teklif`
--

CREATE TABLE IF NOT EXISTS `d_teklif` (
  `klu4` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) NOT NULL DEFAULT '0',
  `usid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`klu4`),
  KEY `usid` (`usid`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `d_teklif`
--


-- --------------------------------------------------------

--
-- Table structure for table `elan`
--

CREATE TABLE IF NOT EXISTS `elan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `date` varchar(25) NOT NULL,
  `saat` int(11) unsigned DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `saat` (`saat`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251 PACK_KEYS=0 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `elan`
--


-- --------------------------------------------------------

--
-- Table structure for table `elit_on`
--

CREATE TABLE IF NOT EXISTS `elit_on` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `yazan` int(11) NOT NULL,
  `vaxt` int(11) NOT NULL,
  `mesaj` varchar(210) CHARACTER SET cp1251 COLLATE cp1251_bin DEFAULT NULL,
  `reng` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `elit_on`
--

INSERT INTO `elit_on` (`id`, `yazan`, `vaxt`, `mesaj`, `reng`) VALUES
(9, 1, 1498044236, 'aktiv olun', '#990000'),
(5, 12, 1497361589, 'he yaxsidir', ''),
(8, 170, 1497505097, 'salam', ''),
(7, 396, 1497377951, 'Salam sayt ehli necesiz?', '');

-- --------------------------------------------------------

--
-- Table structure for table `etiraf_sherh`
--

CREATE TABLE IF NOT EXISTS `etiraf_sherh` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ideti` int(11) NOT NULL DEFAULT '0',
  `idwho` int(11) NOT NULL DEFAULT '0',
  `message` text NOT NULL,
  `time` int(11) NOT NULL DEFAULT '0',
  `date` varchar(50) NOT NULL DEFAULT '',
  `icaze` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `etiraf_sherh`
--


-- --------------------------------------------------------

--
-- Table structure for table `etiraf_text`
--

CREATE TABLE IF NOT EXISTS `etiraf_text` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idwho` int(11) NOT NULL DEFAULT '0',
  `topic` varchar(80) NOT NULL DEFAULT '',
  `message` text NOT NULL,
  `time` int(11) NOT NULL DEFAULT '0',
  `read_msg` tinyint(1) NOT NULL DEFAULT '0',
  `count_read` int(11) NOT NULL DEFAULT '0',
  `date` varchar(50) NOT NULL DEFAULT '',
  `icaze` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `icaze` (`icaze`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `etiraf_text`
--


-- --------------------------------------------------------

--
-- Table structure for table `fb_prognoz`
--

CREATE TABLE IF NOT EXISTS `fb_prognoz` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `football_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `kafcent` int(1) NOT NULL,
  `status` int(1) NOT NULL,
  `bal` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `fb_prognoz`
--


-- --------------------------------------------------------

--
-- Table structure for table `fikirler`
--

CREATE TABLE IF NOT EXISTS `fikirler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author` tinyblob NOT NULL,
  `title` tinyblob NOT NULL,
  `body` blob NOT NULL,
  `uid` int(11) NOT NULL DEFAULT '0',
  `mid` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `fikirler`
--

INSERT INTO `fikirler` (`id`, `author`, `title`, `body`, `uid`, `mid`) VALUES
(8, 0x63616e63616e, '', 0x47207520492075206d20732065205f5f5f615f5f5f7a5f5f5f67756c757320646f6c752074656b20756e76616e6e2062757972756e6e6e6e2067656c6e6e6e6e6e6e2e2e, 163, 185),
(11, 0x63616e63616e, '', 0x47207520492075206d20732065205f5f5f615f5f5f7a5f5f5f67756c757320646f6c752074656b20756e76616e6e2062757972756e6e6e6e2067656c6e6e6e6e6e6e6e6e6e, 178, 185),
(17, 0x2a452a4d2a492a4c2a5a2a562a452a522a, '', 0x63616e696d2073656e206d656e696d206865796174696d646120676f72647579756d20656e20676f7a656c2078616e696d73616e2073656e69207365766972656d2075726579696d206d656e696d206275207861746972656e69206d656e64656e20736f6e73757a63616e207361786c61206865796174696d2073656e696e6c6520636f7820786f7362657864656d2079617873696b692067656c64696e2075726579696d6520786f732067656c6d6973656e2075726579696d2073656e696e64692073656e6465206d656e696d73656e20676f7a656c6572696e20676f7a656c692063616e696d206865796174696d20796173616d61207365626562696d73656e, 392, 166);

-- --------------------------------------------------------

--
-- Table structure for table `filtr`
--

CREATE TABLE IF NOT EXISTS `filtr` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `soz` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `evez` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `filtr`
--


-- --------------------------------------------------------

--
-- Table structure for table `football`
--

CREATE TABLE IF NOT EXISTS `football` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `team_one` varchar(50) NOT NULL,
  `team_two` varchar(50) NOT NULL,
  `kafcent_0` varchar(25) NOT NULL,
  `kafcent_1` varchar(25) NOT NULL,
  `kafcent_2` varchar(25) NOT NULL,
  `foot_date` varchar(30) NOT NULL,
  `foot_status` int(1) NOT NULL DEFAULT '0',
  `foot_shot` varchar(10) NOT NULL DEFAULT '0 - 0',
  `time` int(11) NOT NULL,
  `bal` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `football`
--


-- --------------------------------------------------------

--
-- Table structure for table `football_comments`
--

CREATE TABLE IF NOT EXISTS `football_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usid` int(11) DEFAULT '0',
  `user` varchar(80) DEFAULT NULL,
  `message` text NOT NULL,
  `time` int(11) NOT NULL DEFAULT '0',
  `key` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `football_comments`
--


-- --------------------------------------------------------

--
-- Table structure for table `foto_beyen`
--

CREATE TABLE IF NOT EXISTS `foto_beyen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `like_uid` int(11) NOT NULL,
  `like` int(11) NOT NULL DEFAULT '0',
  `like_us` varchar(50) CHARACTER SET cp1251 COLLATE cp1251_bin DEFAULT NULL,
  `tarix` int(11) NOT NULL,
  `like_type` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `foto_beyen`
--


-- --------------------------------------------------------

--
-- Table structure for table `foto_fikir`
--

CREATE TABLE IF NOT EXISTS `foto_fikir` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `muellif` int(11) NOT NULL,
  `vaxt` int(11) NOT NULL,
  `fikir` varchar(210) CHARACTER SET cp1251 COLLATE cp1251_bin DEFAULT NULL,
  `reng` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `like_type` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `foto_fikir`
--


-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE IF NOT EXISTS `friends` (
  `klu4` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) NOT NULL DEFAULT '0',
  `usid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`klu4`),
  KEY `id` (`id`),
  KEY `usid` (`usid`,`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`klu4`, `id`, `usid`) VALUES
(11, 1119, 1148),
(12, 1148, 1119),
(15, 19, 46),
(16, 46, 19),
(23, 46, 51),
(24, 51, 46),
(25, 27, 46),
(26, 46, 27),
(29, 27, 124),
(30, 124, 27),
(39, 51, 124),
(40, 124, 51),
(41, 51, 172),
(42, 172, 51),
(43, 46, 172),
(44, 172, 46),
(45, 111, 124),
(46, 124, 111);

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE IF NOT EXISTS `group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text CHARACTER SET utf8 NOT NULL,
  `info` text CHARACTER SET utf8 NOT NULL,
  `admin` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `say` int(11) NOT NULL,
  `act` int(1) NOT NULL,
  `host` int(11) NOT NULL,
  `hit` int(11) NOT NULL,
  `beyen` int(11) NOT NULL,
  `znak_date` int(11) NOT NULL,
  `znak` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `group`
--

INSERT INTO `group` (`id`, `name`, `info`, `admin`, `time`, `say`, `act`, `host`, `hit`, `beyen`, `znak_date`, `znak`) VALUES
(1, 'Yuxusuzlar', 'qaydalari pozmayin', 1, 1498060357, 0, 0, 1, 8, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `group_ban`
--

CREATE TABLE IF NOT EXISTS `group_ban` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usid` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `group_id` int(11) NOT NULL,
  `sebeb` varchar(500) CHARACTER SET utf8 NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `group_ban`
--


-- --------------------------------------------------------

--
-- Table structure for table `group_count`
--

CREATE TABLE IF NOT EXISTS `group_count` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` text NOT NULL,
  `ip` text NOT NULL,
  `brow` text NOT NULL,
  `host` int(1) NOT NULL,
  `hit` int(11) NOT NULL,
  `date` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `group_count`
--

INSERT INTO `group_count` (`id`, `group_id`, `ip`, `brow`, `host`, `hit`, `date`) VALUES
(1, '1', '5.191.19.64', 'Mozilla/5.0 (Linux; Android 4.4.2; SM-T231 Build/KOT49H) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/40.0.2214.109 Safari/537.36', 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `group_like`
--

CREATE TABLE IF NOT EXISTS `group_like` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usid` int(11) DEFAULT '0',
  `user` varchar(80) CHARACTER SET latin1 COLLATE latin1_bin DEFAULT NULL,
  `key` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `group_like`
--

INSERT INTO `group_like` (`id`, `usid`, `user`, `key`) VALUES
(1, 470, 'ByOn', 1);

-- --------------------------------------------------------

--
-- Table structure for table `group_room`
--

CREATE TABLE IF NOT EXISTS `group_room` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usid` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `group_id` int(11) NOT NULL,
  `text` varchar(500) CHARACTER SET utf8 NOT NULL,
  `time` int(11) NOT NULL,
  `kime_nik` varchar(50) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `nov` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `group_room`
--

INSERT INTO `group_room` (`id`, `usid`, `name`, `group_id`, `text`, `time`, `kime_nik`, `nov`) VALUES
(2, 1, 'ADMiN', 1, '<b>salamlar</b>', 1498060424, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `group_sikayet`
--

CREATE TABLE IF NOT EXISTS `group_sikayet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `aid` int(11) NOT NULL,
  `aid_name` varchar(100) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `usid` int(11) NOT NULL,
  `usid_name` varchar(100) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `group_id` int(11) NOT NULL,
  `text` varchar(500) CHARACTER SET utf8 NOT NULL,
  `act` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `group_sikayet`
--


-- --------------------------------------------------------

--
-- Table structure for table `hediyye`
--

CREATE TABLE IF NOT EXISTS `hediyye` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `who` varchar(50) NOT NULL,
  `whoid` int(11) NOT NULL,
  `to` varchar(50) NOT NULL,
  `toid` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `text` varchar(30) NOT NULL,
  `gif` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=56 ;

--
-- Dumping data for table `hediyye`
--

INSERT INTO `hediyye` (`id`, `who`, `whoid`, `to`, `toid`, `time`, `text`, `gif`) VALUES
(10, 'HICRAN', 27, 'KARA_SEVDA', 87, 1495032120, 'ad gunun mubu&#351; )))', 'Bahali/203.png'),
(11, 'Zr_deli', 240, '(VUSQA)', 124, 1495879378, 'Bu urey menimdi sevsen senin', 'Sevgi/197.png'),
(12, 'CHATIN_SAHBI', 240, '(VUSQA)', 124, 1495880016, 'Sendeliynen mendeli -.g5.', 'Sevgi/20.png'),
(13, '(VUSQA)', 124, 'CHATIN_SAHBI', 240, 1495880446, 'bizi axtarirlar delxananin mud', 'Sevgi/180.png'),
(14, '(VUSQA)', 124, 'CHATIN_SAHBI', 240, 1495880587, 'qebul etdim arxayin ol', 'Sevgi/197.png'),
(15, 'CHATIN_SAHBI', 240, '(VUSQA)', 124, 1495880927, 'Sen her &#351;eyden deyerlisen', 'Bahali/216.png'),
(18, 'CHATIN_SAHIBI', 111, 'REHBERKA', 124, 1496212692, 'Menim Ureyim', 'Sevgi/70.png'),
(19, 'REHBERKA', 124, 'CHATIN_SAHIBI', 111, 1496217418, 'al bunu vur ureyimden', 'Bahali/123.png'),
(20, 'CHATIN_SAHIBI', 111, 'REHBERKA', 124, 1496218041, 'Sen bunsuzda gozelsen', 'Bahali/105.png'),
(21, 'CHATIN_SAHIBI', 111, 'REHBERKA', 124, 1496225757, 'Iyudanin arvadi -.g5.', 'Sade/89.png'),
(22, 'SURUCU', 170, 'Sevinc@@@', 326, 1496833203, 'senin ucundu gozelim genceli b', 'Bahali/41.png'),
(23, 'QARA_PELENG', 1, '!_KaYFuLLa_!', 324, 1496857255, 'Bugur', 'Sade/298.png'),
(24, 'QARA_PELENG', 1, '!_KaYFuLLa_!', 324, 1496857260, 'Buyur', 'Sade/298.png'),
(26, 'Rehbelik', 324, 'HICRAN', 27, 1496917305, 'Hmm', 'Xususi/29.png'),
(29, 'Damla', 283, 'Rehbelik', 324, 1496946310, 'Sene bagsl?±yram amma ehtyatl?', 'Bahali/123.png'),
(30, 'Damla', 283, 'Rehbelik', 324, 1496946637, 'Sen ald?±m buyur', 'Bahali/341.png'),
(35, 'Damla', 283, 'Rehbelik', 324, 1496981758, '', 'Xususi/27.png'),
(37, 'Rehbelik', 324, 'LuBoY_OgLaNa_AtVaL', 355, 1496994489, 'Beyaz gulum', 'Sevgi/67.png'),
(38, 'Rehbelik', 324, 'LuBoY_OgLaNa_AtVaL', 355, 1497011206, 'Mac seni', 'Sevgi/138.png'),
(39, 'Rehbelik', 324, 'LuBoY_OgLaNa_AtVaL', 355, 1497031484, '', 'Sevgi/35.png'),
(40, 'Rehbelik', 324, 'LuBoY_OgLaNa_AtVaL', 355, 1497087338, 'Buyur sana a&#351;kim sen meni', 'Bahali/199.png'),
(41, 'Rehbelik', 324, 'LuBoY_OgLaNa_AtVaL', 355, 1497087710, 'Bitanem senincun aldim buyur', 'Xususi/186.png'),
(42, 'Romantika', 369, 'Hicissss', 363, 1497094548, 'Sizinle tani&#351; olmaq istey', 'Sevgi/197.png'),
(43, 'Romantika', 369, 'Hicissss', 363, 1497094624, 'seni sevirem', 'Sevgi/20.png'),
(45, 'Deli~Qizam', 392, '*E*M*I*L*Z*V*E*R*', 166, 1497349171, 'buyur gozel insan', 'Sade/284.png'),
(46, '*E*M*I*L*Z*V*E*R*', 166, 'Deli~Qizam', 392, 1497382530, 'seni sevirem ureyim buda biz', 'Sevgi/20.png'),
(47, 'Rehberlik', 324, 'Damla', 283, 1497495531, 'Bunu ele bagla acan olmasin', 'Sevgi/35.png'),
(48, 'Rehberlik', 324, 'Damla', 283, 1497495589, 'Heqiqetende beledir', 'Sevgi/16.png'),
(49, 'Rehberlik', 324, 'Damla', 283, 1497495632, '', 'Sevgi/197.png'),
(50, 'Rehberlik', 324, 'Damla', 283, 1497495697, 'Mac seni', 'Sevgi/138.png'),
(51, 'Rehberlik', 324, 'Damla', 283, 1497495753, '', 'Sevgi/70.png'),
(52, 'Rehberlik', 324, 'Damla', 283, 1497496420, 'Adimi kalbine yaz', 'Xususi/204.png'),
(53, 'Rehberlik', 324, 'Damla', 283, 1497496459, 'Sevgi hekayesi', 'Xususi/72.png'),
(54, 'Rehberlik', 324, 'Damla', 283, 1497496534, 'Hmm yanmi&#351; ne ge&#351;eyd', 'Xususi/166.png'),
(55, 'BAWDAN_XARAB_ROWQA', 435, 'Kederimsen', 442, 1498064360, '', 'Xususi/166.png');

-- --------------------------------------------------------

--
-- Table structure for table `hesab`
--

CREATE TABLE IF NOT EXISTS `hesab` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `leqeb` text,
  `usid` int(11) DEFAULT NULL,
  `tarix` varchar(25) DEFAULT NULL,
  `saat` int(11) unsigned DEFAULT '0',
  `x` int(5) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `x` (`x`,`saat`),
  KEY `x_2` (`x`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=56 ;

--
-- Dumping data for table `hesab`
--

INSERT INTO `hesab` (`id`, `leqeb`, `usid`, `tarix`, `saat`, `x`) VALUES
(3, 'Cesus', 0, '06.03.17 [17:20]', 1491398439, 3),
(4, 'Cesus', 0, '06.03.17 [17:21]', 1491398470, 3),
(5, 'Ayxan_Ugur', 1039, '14.04.17 [21:04]', 1494781461, 4),
(6, 'Ayxan_Ugur', 1039, '14.04.17 [21:04]', 1494781469, 6),
(7, 'Ayxan_Ugur', 1039, '14.04.17 [21:04]', 1494781492, 2),
(8, 'KuSguN', 10, '16.04.17 [12:11]', 1494922296, 2),
(9, 'KuSguN', 10, '16.04.17 [12:40]', 1494924017, 5),
(11, '**__V_I_P__**__Y_E_R_A_Z__**', 1164, '18.04.17 [01:56]', 1495058170, 4),
(12, '**__V_I_P__**__Y_E_R_A_Z__**', 1164, '18.04.17 [01:56]', 1495058184, 5),
(14, '_ChAmPiOnS_LeAgUe_BaRcElOnA_', 1000, '19.04.17 [02:58]', 1495148330, 5),
(18, 'kapriznaya', 50, '12.05.17 [19:02]', 1497193373, 5),
(19, 'Semih', 19, '14.05.17 [06:53]', 1497322384, 5),
(20, 'ZIR-BAKILI', 12, '14.05.17 [12:39]', 1497343160, 2),
(23, 'GUNAY-XANIM', 123, '17.05.17 [20:27]', 1497630478, 5),
(27, '))=.._Bop[o]Bckoe_eQ[o]!sT_..=((', 157, '21.05.17 [15:47]', 1497959221, 5),
(33, 'Blatnoy_mujik', 219, '24.05.17 [23:32]', 1498246358, 5),
(35, 'QISMETIM', 166, '25.05.17 [02:54]', 1498258451, 5),
(36, '(VUSQA)', 124, '25.05.17 [10:49]', 1498286975, 6),
(38, 'Blatnoy_mujik', 219, '26.05.17 [00:35]', 1498336532, 3),
(39, '=DONCARLEON=', 172, '26.05.17 [21:04]', 1498410293, 5),
(41, ')_QaRanLiQ--KuCeLeR_(', 177, '30.05.17 [06:17]', 1498702636, 5),
(44, '_D_O_S_T_U_M_', 260, '30.05.17 [11:11]', 1498720307, 5),
(45, 'NURA', 46, '30.05.17 [19:41]', 1498750919, 6),
(48, 'QARA_PELENG', 1, '09.06.17 [12:44]', 1499589893, 5),
(49, 'LuBoY_OgLaNa_AtVaL', 355, '09.06.17 [15:01]', 1499598061, 5),
(50, 'Mahir_', 217, '10.06.17 [07:31]', 1499657515, 3),
(52, 'Deli~Qizam', 392, '13.06.17 [08:28]', 1499920133, 4),
(53, 'Deli~Qizam', 392, '13.06.17 [16:58]', 1499950701, 5),
(54, 'Damla', 283, '14.06.17 [20:53]', 1500051224, 6),
(55, 'Zeze', 397, '16.06.17 [15:20]', 1500204035, 5);

-- --------------------------------------------------------

--
-- Table structure for table `ignor`
--

CREATE TABLE IF NOT EXISTS `ignor` (
  `klu4` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) NOT NULL DEFAULT '0',
  `usid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`klu4`),
  KEY `id` (`id`),
  KEY `usid` (`usid`,`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `ignor`
--

INSERT INTO `ignor` (`klu4`, `id`, `usid`) VALUES
(8, 1099, 1100),
(9, 1100, 1000),
(10, 1100, 1127),
(11, 1100, 1122),
(12, 1100, 1132),
(13, 1100, 1134),
(15, 1105, 1100),
(16, 1105, 1210),
(17, 1220, 1219),
(21, 124, 20),
(22, 124, 294),
(23, 308, 20),
(24, 51, 334),
(25, 361, 20),
(26, 396, 20);

-- --------------------------------------------------------

--
-- Table structure for table `info_qov`
--

CREATE TABLE IF NOT EXISTS `info_qov` (
  `klu4` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) NOT NULL DEFAULT '0',
  `usid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`klu4`),
  KEY `id` (`id`),
  KEY `usid` (`usid`,`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `info_qov`
--


-- --------------------------------------------------------

--
-- Table structure for table `lchat`
--

CREATE TABLE IF NOT EXISTS `lchat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usid` int(11) NOT NULL,
  `status` varchar(200) NOT NULL,
  `file` text NOT NULL,
  `time` int(11) NOT NULL,
  `admin` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `lchat`
--

INSERT INTO `lchat` (`id`, `usid`, `status`, `file`, `time`, `admin`) VALUES
(1, 1, 'her kes kohne zaklatkalari silsin,yeniden qeyd olsunlar..saytimiz yenilendi', 'Wap.Dur.Az_438590805c417a243d9280af630.jpg', 1498045109, 0),
(2, 435, 'Heyat gozeldi', '', 1498063774, 0);

-- --------------------------------------------------------

--
-- Table structure for table `lchat_c`
--

CREATE TABLE IF NOT EXISTS `lchat_c` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sid` int(11) NOT NULL,
  `whoid` int(11) NOT NULL,
  `comment` blob NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `lchat_c`
--

INSERT INTO `lchat_c` (`id`, `sid`, `whoid`, `comment`, `time`) VALUES
(1, 2, 442, 0x456c62657474652c67c3b67a656c646972, 1498063888),
(2, 2, 435, 0x68657220696e73616e206f20676f7a656c6979696e20776168696469206f6c6d7572207961206665726173656769206361746d69722079616461206665726173657469206361746972207361646563652077616e7369206f6c6d7572212121, 1498064010),
(3, 2, 442, 0x496e73616e206973646573656e20676f7a656c6577646972652062696c65722e2e53616465636520697364656b206c617a696d2e2e426178697264612068616e736920696e73616e6c61726469206f, 1498064065),
(4, 2, 435, 0x6574726166206d7568757464656e20636f787765792061736c69646972202073656e206f2071656465722069736465206b6920616d6d612062656c6564652064757a647572206973646579696e2068617261206d656e7a696c696e206f7261, 1498064162),
(5, 2, 442, 0x456c62657474652c62657a656e20697364656b207661722e2e497a696e20796f7864752e2e2e, 1498064212),
(6, 2, 435, 0x6d656e20696e64692073697a65206865647965207665726d656b20697364657972656d20206e65636520716562756c206564657264697a2062752069736465796d652071617265696c69713f, 1498064259),
(7, 2, 442, 0x4e6563652076617220656c655e5f5e, 1498064344),
(8, 2, 442, 0x496c6b20686564697979656d20746577656b6b75726c6572, 1498064419),
(9, 2, 435, 0x64656d656c692073697a206c6179697173697a2074776b, 1498064420),
(10, 2, 435, 0x786f77647572, 1498064475);

-- --------------------------------------------------------

--
-- Table structure for table `lchat_l`
--

CREATE TABLE IF NOT EXISTS `lchat_l` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sid` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `whoid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `lchat_l`
--


-- --------------------------------------------------------

--
-- Table structure for table `letife_like`
--

CREATE TABLE IF NOT EXISTS `letife_like` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usid` int(11) DEFAULT '0',
  `user` varchar(80) DEFAULT NULL,
  `key` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `letife_like`
--


-- --------------------------------------------------------

--
-- Table structure for table `letife_sherh`
--

CREATE TABLE IF NOT EXISTS `letife_sherh` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ideti` int(11) NOT NULL DEFAULT '0',
  `idwho` int(12) NOT NULL DEFAULT '0',
  `message` text NOT NULL,
  `time` int(11) NOT NULL DEFAULT '0',
  `date` varchar(50) NOT NULL DEFAULT '',
  `icaze` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `letife_sherh`
--


-- --------------------------------------------------------

--
-- Table structure for table `letife_text`
--

CREATE TABLE IF NOT EXISTS `letife_text` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idwho` int(12) NOT NULL DEFAULT '0',
  `topic` varchar(80) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `message` text CHARACTER SET utf8 NOT NULL,
  `time` int(11) NOT NULL DEFAULT '0',
  `read_msg` tinyint(1) NOT NULL DEFAULT '0',
  `count_read` int(11) NOT NULL DEFAULT '0',
  `date` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `icaze` int(11) NOT NULL DEFAULT '0',
  `beyen` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `letife_text`
--


-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE IF NOT EXISTS `levels` (
  `level` smallint(5) NOT NULL DEFAULT '0',
  `name` blob,
  PRIMARY KEY (`level`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`level`, `name`) VALUES
(0, 0x516f6e6171),
(1, 0x416b7469762049737469666164656369),
(2, 0x446f7374),
(3, 0x4b6f6d656b6369),
(4, 0x562e492e50),
(5, 0x4d6f64657261746f72),
(6, 0x41444d494e4b41),
(7, 0x41646d696e),
(8, 0x53757065722041646d696e),
(9, 0x5265686265726c696b);

-- --------------------------------------------------------

--
-- Table structure for table `like_info`
--

CREATE TABLE IF NOT EXISTS `like_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usid` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=63 ;

--
-- Dumping data for table `like_info`
--

INSERT INTO `like_info` (`id`, `usid`, `user`, `time`) VALUES
(62, 1, 'ADMiN', 1507257753);

-- --------------------------------------------------------

--
-- Table structure for table `mafia`
--

CREATE TABLE IF NOT EXISTS `mafia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ad` varchar(30) NOT NULL,
  `start` int(11) NOT NULL DEFAULT '0',
  `bal` int(11) NOT NULL DEFAULT '0',
  `udus` int(11) NOT NULL DEFAULT '0',
  `bilet` int(11) NOT NULL DEFAULT '0',
  `qalib` varchar(70) NOT NULL,
  `say` int(11) NOT NULL DEFAULT '0',
  `kartlar` varchar(10000) NOT NULL,
  `son` int(11) NOT NULL DEFAULT '0',
  `vaxt` int(22) NOT NULL,
  `sayi` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=66 ;

--
-- Dumping data for table `mafia`
--

INSERT INTO `mafia` (`id`, `ad`, `start`, `bal`, `udus`, `bilet`, `qalib`, `say`, `kartlar`, `son`, `vaxt`, `sayi`) VALUES
(65, 'Mafia Game Round 1', 1, 50, 5000, 0, '', 8, 'Vetenda&#351;1,Manyak,Qurd Mafia,Satq&#305;n,Komissar,Don Mafia,Mafiozi1,Mer,', 0, 1498128856, 8);

-- --------------------------------------------------------

--
-- Table structure for table `mafia_ban`
--

CREATE TABLE IF NOT EXISTS `mafia_ban` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usid` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `mafia_id` int(11) NOT NULL,
  `sebeb` varchar(500) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `mafia_ban`
--


-- --------------------------------------------------------

--
-- Table structure for table `mafia_room`
--

CREATE TABLE IF NOT EXISTS `mafia_room` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usid` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `mafia_id` int(11) NOT NULL,
  `text` varchar(500) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `time` int(11) NOT NULL,
  `kime_nik` varchar(50) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `nov` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `mafia_room`
--

INSERT INTO `mafia_room` (`id`, `usid`, `name`, `mafia_id`, `text`, `time`, `kime_nik`, `nov`) VALUES
(15, 1, 'Admin', 1, '<span style=''color:red''><b>Admin niki oyuna qosuldu.!</b></span>', 1485358370, '', 0),
(16, 1, 'Admin', 1, 'salamlar', 1485358382, '', 0),
(17, 1, 'Admin', 1, '<span style=''color:red''><b>SaMuRaY niki oyuna qosuldu.!</b></span>', 1485445320, '', 0),
(18, 118, 'SaMuRaY', 1, '<i>bbbb</i>', 1485446535, 'Admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mafia_topic`
--

CREATE TABLE IF NOT EXISTS `mafia_topic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ad` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `mafia_topic`
--

INSERT INTO `mafia_topic` (`id`, `ad`) VALUES
(1, '12:00 Xedice');

-- --------------------------------------------------------

--
-- Table structure for table `mduel`
--

CREATE TABLE IF NOT EXISTS `mduel` (
  `did` int(11) NOT NULL AUTO_INCREMENT,
  `dkim` int(11) NOT NULL,
  `dk_bal` int(11) NOT NULL DEFAULT '0',
  `dkimle` int(11) NOT NULL,
  `dkl_bal` int(11) NOT NULL DEFAULT '0',
  `dtime` int(11) NOT NULL,
  `ddate` varchar(50) CHARACTER SET cp1251 NOT NULL,
  `devet` int(2) NOT NULL,
  `gpass` varchar(50) CHARACTER SET cp1251 DEFAULT NULL,
  `dk_ses` int(11) NOT NULL DEFAULT '0',
  `dkl_ses` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`did`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=39 ;

--
-- Dumping data for table `mduel`
--

INSERT INTO `mduel` (`did`, `dkim`, `dk_bal`, `dkimle`, `dkl_bal`, `dtime`, `ddate`, `devet`, `gpass`, `dk_ses`, `dkl_ses`) VALUES
(6, 111, 0, 1039, 0, 0, '19.04.2017 [21:09]', 1, 'WXFjVHNWbkQ3ZkczNVd2', 0, 0),
(18, 276, 0, 85, 0, 0, '28.05.2017 [22:03]', 1, 'SGF2SnFRWGh6Rkd4Z2JL', 0, 0),
(14, 157, 0, 184, 0, 0, '22.05.2017 [13:40]', 1, 'cndUV3hGRGxlUjhxbU43', 0, 0),
(17, 124, 0, 166, 0, 0, '27.05.2017 [03:47]', 1, 'Nzk1RFlzaEpUelNVeWJ0', 0, 0),
(21, 157, 0, 111, 0, 0, '31.05.2017 [14:28]', 1, 'dVpweFZqSjIxRVdxUjZB', 0, 0),
(20, 170, 0, 124, 0, 0, '31.05.2017 [14:21]', 1, 'VncxVVpSeTRxOHhwM0pu', 0, 0),
(27, 325, 0, 318, 0, 0, '04.06.2017 [14:37]', 1, 'dHVoRmx5eEo2Z1VqY3JW', 0, 0),
(26, 319, 0, 315, 0, 0, '03.06.2017 [22:14]', 1, 'NkdDYXpLWnM0NUJEUUpX', 0, 0),
(29, 329, 0, 42, 0, 0, '05.06.2017 [00:24]', 1, 'WHFEcEZMVmpXU2tIbmJQ', 0, 0),
(36, 392, 0, 166, 0, 0, '13.06.2017 [08:17]', 1, 'YkRzdWRDUFQxTFUyZlM3', 0, 0),
(31, 329, 0, 321, 0, 0, '05.06.2017 [00:26]', 1, 'R2d5QXE4QlpGUzEyamJF', 0, 0),
(32, 329, 0, 318, 0, 0, '05.06.2017 [00:26]', 1, 'TkJkZjd3dkRqdGxxckpH', 0, 0),
(35, 39, 0, 373, 0, 0, '11.06.2017 [01:23]', 1, 'd3BNckNVZFBFajF2QmZE', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `md_ses`
--

CREATE TABLE IF NOT EXISTS `md_ses` (
  `kim` int(11) NOT NULL AUTO_INCREMENT,
  `kime` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `gpass` int(11) NOT NULL,
  `date` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`kim`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=1067 ;

--
-- Dumping data for table `md_ses`
--


-- --------------------------------------------------------

--
-- Table structure for table `mesaj`
--

CREATE TABLE IF NOT EXISTS `mesaj` (
  `klu4` int(11) NOT NULL AUTO_INCREMENT,
  `who` varchar(40) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `idwho` int(11) NOT NULL DEFAULT '0',
  `message` blob NOT NULL,
  `towhom` varchar(40) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `idtowhom` int(11) DEFAULT '0',
  `time` int(11) NOT NULL DEFAULT '0',
  `readd` tinyint(1) NOT NULL DEFAULT '0',
  `icaze` int(2) DEFAULT '0',
  `date` varchar(50) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `insend` tinyint(1) NOT NULL DEFAULT '1',
  `ininc` tinyint(1) NOT NULL DEFAULT '1',
  `posts` int(11) NOT NULL DEFAULT '0',
  `photo` varchar(25) DEFAULT NULL,
  `d1` tinyint(1) DEFAULT '0',
  `d2` tinyint(1) DEFAULT '0',
  `kod` text,
  `multimesaj` int(11) DEFAULT '0',
  `reng` varchar(10) DEFAULT NULL,
  `olcu` varchar(300) NOT NULL,
  `type` int(11) NOT NULL,
  PRIMARY KEY (`klu4`),
  KEY `ininc` (`ininc`),
  KEY `idtowhom` (`idtowhom`),
  KEY `readd` (`readd`),
  KEY `who` (`who`),
  KEY `time` (`time`),
  KEY `idtowhom_2` (`idtowhom`,`ininc`,`readd`),
  KEY `insend` (`insend`,`ininc`),
  KEY `idtowhom_3` (`idtowhom`,`ininc`),
  KEY `idwho` (`idwho`,`idtowhom`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `mesaj`
--

INSERT INTO `mesaj` (`klu4`, `who`, `idwho`, `message`, `towhom`, `idtowhom`, `time`, `readd`, `icaze`, `date`, `insend`, `ininc`, `posts`, `photo`, `d1`, `d2`, `kod`, `multimesaj`, `reng`, `olcu`, `type`) VALUES
(1, 'ADMiN', 1, 0x73616c616d, 'ureyim_aglar', 440, 1498144961, 0, 0, '', 1, 1, 0, NULL, 0, 0, NULL, 0, NULL, '', 0),
(2, 'UnuDulmaZ!', 504, 0x6468646826233238373b, 'cffc', 498, 1507153260, 0, 0, '', 1, 1, 5, NULL, 0, 0, NULL, 0, NULL, '', 0),
(3, 'ADMiN', 1, 0x547374, 'sasasas', 505, 1507171390, 0, 0, '', 1, 1, 0, NULL, 0, 0, NULL, 0, NULL, '', 0),
(4, 'Canann', 507, 0x53616c616d, 'ureyim_aglar', 440, 1507182285, 0, 0, '', 1, 1, 5, NULL, 0, 0, NULL, 0, NULL, '', 0),
(5, 'Canann', 507, 0x53616c616d, 'dowan)))))', 428, 1507182303, 0, 0, '', 1, 1, 0, NULL, 0, 0, NULL, 0, NULL, '', 0),
(6, 'Sevgilim', 513, 0x53616c616d, 'ADMiN', 1, 1597823848, 1, 0, '', 0, 1, 5, NULL, 0, 0, NULL, 0, NULL, '', 0),
(7, 'ADMiN', 1, 0x616c65796b756d, 'Sevgilim', 513, 1597824164, 1, 0, '', 0, 1, 5153, NULL, 0, 0, NULL, 0, NULL, '', 0),
(8, 'Sevgilim', 513, 0x4e65636573656e20566173696620646579696c73656e20796f787361, 'ADMiN', 1, 1597825035, 1, 0, '', 0, 1, 6, NULL, 0, 0, NULL, 0, NULL, '', 0),
(9, 'ADMiN', 1, 0x746526233335313b656b6b7572207865797220766173696620646579696c, 'Sevgilim', 513, 1597826038, 1, 0, '', 0, 1, 5154, NULL, 0, 0, NULL, 0, NULL, '', 0),
(10, 'Sevgilim', 513, 0x4275206b696d6469207361797464692074c9997ac99920616c6d6973616e, 'ADMiN', 1, 1597826601, 1, 0, '', 0, 1, 7, NULL, 0, 0, NULL, 0, NULL, '', 0),
(11, 'ADMiN', 1, 0x616c6c61682062656e6465736964692073656e65206e65206c617a696d6469, 'Sevgilim', 513, 1597826935, 1, 0, '', 0, 1, 0, NULL, 0, 0, NULL, 0, NULL, '', 0),
(12, 'Sevgilim', 513, 0x4865636e6520697374656d6972656d207361676f6c756e, 'ADMiN', 1, 1597836575, 1, 0, '', 0, 1, 8, NULL, 0, 0, NULL, 0, NULL, '', 0),
(13, 'ADMiN', 1, 0x796178736920796f6c, 'Sevgilim', 513, 1597843357, 0, 0, '', 1, 1, 5156, NULL, 0, 0, NULL, 0, NULL, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `mesaj1`
--

CREATE TABLE IF NOT EXISTS `mesaj1` (
  `klu4` int(11) NOT NULL DEFAULT '0',
  `who` varchar(40) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `idwho` int(11) NOT NULL DEFAULT '0',
  `message` blob NOT NULL,
  `towhom` varchar(40) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `idtowhom` int(11) DEFAULT '0',
  `time` int(11) NOT NULL DEFAULT '0',
  `readd` tinyint(1) NOT NULL DEFAULT '0',
  `icaze` int(2) DEFAULT '0',
  `date` varchar(50) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `insend` tinyint(1) NOT NULL DEFAULT '1',
  `ininc` tinyint(1) NOT NULL DEFAULT '1',
  `posts` int(11) NOT NULL DEFAULT '0',
  `photo` varchar(25) CHARACTER SET latin1 DEFAULT NULL,
  `d1` tinyint(1) DEFAULT '0',
  `d2` tinyint(1) DEFAULT '0',
  `kod` text CHARACTER SET latin1,
  `multimesaj` int(11) DEFAULT '0',
  `reng` varchar(10) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mesaj1`
--

INSERT INTO `mesaj1` (`klu4`, `who`, `idwho`, `message`, `towhom`, `idtowhom`, `time`, `readd`, `icaze`, `date`, `insend`, `ininc`, `posts`, `photo`, `d1`, `d2`, `kod`, `multimesaj`, `reng`) VALUES
(0, 'Guler_31', 20, 0x73616c616d, 'Sene_GoRe', 255, 1495901543, 0, 0, '20:12', 1, 1, 0, NULL, 0, 0, NULL, 0, '1495901547'),
(0, 'Sema8', 22, 0x73616c616d2e2e2e2e, 'yamaha', 60, 1494655987, 0, 0, '10:13', 1, 1, 0, NULL, 0, 0, NULL, 0, '1494655991'),
(0, 'Guler_31', 20, 0x28282828282828, 'EMIRCANLI', 245, 1497182166, 0, 0, '15:56', 1, 1, 0, NULL, 0, 0, NULL, 0, '1497182170');

-- --------------------------------------------------------

--
-- Table structure for table `mms`
--

CREATE TABLE IF NOT EXISTS `mms` (
  `lid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id` int(11) NOT NULL DEFAULT '0',
  `to` int(11) unsigned NOT NULL DEFAULT '0',
  `from` int(11) unsigned NOT NULL DEFAULT '0',
  `photo` varchar(25) DEFAULT NULL,
  `kod` text,
  `body` text CHARACTER SET cp1251 NOT NULL,
  `date` text CHARACTER SET cp1251 NOT NULL,
  `time` int(11) unsigned NOT NULL DEFAULT '0',
  `read` tinyint(1) NOT NULL DEFAULT '0',
  `d1` tinyint(1) DEFAULT '0',
  `d2` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`lid`),
  KEY `to` (`to`,`read`,`d2`),
  KEY `to_1` (`read`),
  KEY `to_2` (`d2`),
  KEY `to_3` (`d1`),
  KEY `to_4` (`to`,`d2`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `mms`
--


-- --------------------------------------------------------

--
-- Table structure for table `mp3ler`
--

CREATE TABLE IF NOT EXISTS `mp3ler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pos` blob NOT NULL,
  `img` text NOT NULL,
  `bolme` varchar(50) NOT NULL DEFAULT '',
  `who` varchar(40) NOT NULL DEFAULT '',
  `vaxt` varchar(30) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `bax` int(100) NOT NULL,
  `kim` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `down` int(11) DEFAULT '0',
  `yukleyen` varchar(200) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `mp3ler`
--


-- --------------------------------------------------------

--
-- Table structure for table `mp3_bolme`
--

CREATE TABLE IF NOT EXISTS `mp3_bolme` (
  `bolme` smallint(5) NOT NULL DEFAULT '0',
  `name` blob,
  PRIMARY KEY (`bolme`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mp3_bolme`
--

INSERT INTO `mp3_bolme` (`bolme`, `name`) VALUES
(0, 0x417a657269),
(1, 0x5475726b),
(2, 0x4d757874656c6966),
(3, 0x586172696369),
(4, 0x5a656e6720c3bcc3a7c3bc6e),
(5, 0x4d6573616a20c3bcc3a7c3bc6e),
(6, 0x49736c616d2064696e69);

-- --------------------------------------------------------

--
-- Table structure for table `mp3_fikir`
--

CREATE TABLE IF NOT EXISTS `mp3_fikir` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usid` int(11) DEFAULT '0',
  `user` varchar(80) DEFAULT NULL,
  `message` text NOT NULL,
  `time` int(11) NOT NULL DEFAULT '0',
  `key` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `mp3_fikir`
--


-- --------------------------------------------------------

--
-- Table structure for table `nihad_panel`
--

CREATE TABLE IF NOT EXISTS `nihad_panel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usid` int(11) DEFAULT '0',
  `login` varchar(30) DEFAULT NULL,
  `pass` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `nihad_panel`
--


-- --------------------------------------------------------

--
-- Table structure for table `nikoreg2`
--

CREATE TABLE IF NOT EXISTS `nikoreg2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reklam` text NOT NULL,
  `date` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=416 ;

--
-- Dumping data for table `nikoreg2`
--

INSERT INTO `nikoreg2` (`id`, `reklam`, `date`) VALUES
(394, 'ADMIN', '09-04-2015'),
(401, '.biz', '19-04-2017'),
(402, '.j3iz', '19-04-2017'),
(403, '.Az', '19-04-2017'),
(404, '.com', '19-04-2017'),
(405, '.net', '19-04-2017'),
(406, '.ru', '19-04-2017'),
(407, '.ws', '19-04-2017'),
(408, '.vvs', '19-04-2017'),
(409, '.in', '19-04-2017'),
(410, '.im', '19-04-2017'),
(411, '.info', '19-04-2017'),
(412, '.TK', '10-05-2017'),
(413, '.tk', '10-05-2017'),
(414, '-TK', '10-05-2017'),
(415, 'REHBERLIK', '21-06-2017');

-- --------------------------------------------------------

--
-- Table structure for table `obiav`
--

CREATE TABLE IF NOT EXISTS `obiav` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` text NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `obiav`
--


-- --------------------------------------------------------

--
-- Table structure for table `online`
--

CREATE TABLE IF NOT EXISTS `online` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mebleg` int(5) NOT NULL DEFAULT '0',
  `name` varchar(30) NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `online`
--

INSERT INTO `online` (`id`, `mebleg`, `name`, `time`) VALUES
(34, 1, 'bal', 1428280157),
(35, 2, 'bal', 1428280159),
(36, 3, 'bal', 1428280161),
(37, 3, 'posts', 1428280165);

-- --------------------------------------------------------

--
-- Table structure for table `onlines`
--

CREATE TABLE IF NOT EXISTS `onlines` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mebleg` int(5) NOT NULL DEFAULT '0',
  `name` varchar(30) NOT NULL,
  `time` int(11) NOT NULL,
  `key` int(11) NOT NULL DEFAULT '1',
  `text` varchar(200) NOT NULL DEFAULT '0',
  `hed_t` int(11) NOT NULL,
  `kod` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=17475 ;

--
-- Dumping data for table `onlines`
--

INSERT INTO `onlines` (`id`, `mebleg`, `name`, `time`, `key`, `text`, `hed_t`, `kod`) VALUES
(17474, 3, 'bal', 1597863573, 1, '', 1597863593, 3489);

-- --------------------------------------------------------

--
-- Table structure for table `onlinesms`
--

CREATE TABLE IF NOT EXISTS `onlinesms` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `usid` int(11) NOT NULL DEFAULT '0',
  `user` varchar(50) DEFAULT NULL,
  `mesaj` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `time` int(11) unsigned NOT NULL DEFAULT '0',
  `key` int(1) NOT NULL DEFAULT '0',
  `reng` varchar(15) NOT NULL,
  `sms_foto` varchar(50) CHARACTER SET cp1251 NOT NULL,
  `hiss` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `key` (`key`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `onlinesms`
--

INSERT INTO `onlinesms` (`id`, `usid`, `user`, `mesaj`, `time`, `key`, `reng`, `sms_foto`, `hiss`) VALUES
(1, 1, 'ADMiN', 'Novbe sizin', 1498048705, 0, '#990000', '1-9281871.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `online_sms_beyen`
--

CREATE TABLE IF NOT EXISTS `online_sms_beyen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `like_uid` int(11) NOT NULL,
  `like` int(11) NOT NULL DEFAULT '0',
  `like_us` varchar(50) CHARACTER SET cp1251 COLLATE cp1251_bin DEFAULT NULL,
  `tarix` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `online_sms_beyen`
--


-- --------------------------------------------------------

--
-- Table structure for table `online_sms_fikir`
--

CREATE TABLE IF NOT EXISTS `online_sms_fikir` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `muellif` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `fikir` varchar(900) CHARACTER SET cp1251 COLLATE cp1251_bin DEFAULT NULL,
  `reng` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `online_sms_fikir`
--


-- --------------------------------------------------------

--
-- Table structure for table `qefes`
--

CREATE TABLE IF NOT EXISTS `qefes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `usid` int(11) NOT NULL,
  `ses` int(11) DEFAULT '0',
  `nses` int(11) DEFAULT '0',
  `user` varchar(20) DEFAULT NULL,
  `ruser` varchar(20) DEFAULT NULL,
  `on` int(2) DEFAULT '0',
  `off` int(2) DEFAULT '0',
  `duel` int(2) DEFAULT '0',
  `qeyd` text,
  `date` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `off` (`off`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251 PACK_KEYS=0 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `qefes`
--


-- --------------------------------------------------------

--
-- Table structure for table `qefess`
--

CREATE TABLE IF NOT EXISTS `qefess` (
  `klu4` int(11) NOT NULL AUTO_INCREMENT,
  `kim` int(11) NOT NULL DEFAULT '0',
  `kime` int(11) NOT NULL DEFAULT '0',
  `ses` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`klu4`),
  KEY `kim` (`kim`,`kime`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `qefess`
--


-- --------------------------------------------------------

--
-- Table structure for table `reg_bots`
--

CREATE TABLE IF NOT EXISTS `reg_bots` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(50) CHARACTER SET cp1251 COLLATE cp1251_bin NOT NULL DEFAULT '',
  `name` varchar(30) CHARACTER SET latin1 COLLATE latin1_bin DEFAULT NULL,
  `sex` int(1) NOT NULL DEFAULT '0',
  `infa` blob,
  `act` smallint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `sex` (`sex`),
  KEY `user` (`user`(15)),
  KEY `sex_2` (`sex`),
  KEY `sex_3` (`sex`),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 PACK_KEYS=0 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `reg_bots`
--


-- --------------------------------------------------------

--
-- Table structure for table `reklam`
--

CREATE TABLE IF NOT EXISTS `reklam` (
  `klu4` int(11) NOT NULL AUTO_INCREMENT,
  `who` varchar(40) CHARACTER SET cp1251 COLLATE cp1251_bin NOT NULL DEFAULT '',
  `idwho` int(11) NOT NULL DEFAULT '0',
  `message` text NOT NULL,
  `towhom` varchar(40) CHARACTER SET cp1251 COLLATE cp1251_bin NOT NULL DEFAULT '',
  `idtowhom` int(11) NOT NULL DEFAULT '0',
  `time` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`klu4`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `reklam`
--


-- --------------------------------------------------------

--
-- Table structure for table `reytinq`
--

CREATE TABLE IF NOT EXISTS `reytinq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kim` int(11) NOT NULL DEFAULT '0',
  `kime` int(11) NOT NULL DEFAULT '0',
  `ses` int(11) NOT NULL DEFAULT '0',
  `user` varchar(50) NOT NULL,
  `sex` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `reytinq`
--


-- --------------------------------------------------------

--
-- Table structure for table `room0`
--

CREATE TABLE IF NOT EXISTS `room0` (
  `klu4` int(8) NOT NULL DEFAULT '0',
  `time` varchar(5) NOT NULL DEFAULT '',
  `zn` varchar(20) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `who` varchar(40) NOT NULL DEFAULT '',
  `message` blob NOT NULL,
  `uid` int(11) NOT NULL DEFAULT '0',
  `id` double NOT NULL DEFAULT '0',
  `towhom` varchar(11) NOT NULL DEFAULT '',
  `hid` smallint(1) NOT NULL DEFAULT '0',
  `usid` int(11) NOT NULL DEFAULT '0',
  `reng` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`klu4`),
  KEY `id` (`id`),
  KEY `usid` (`usid`,`towhom`,`uid`),
  KEY `usid_2` (`usid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room0`
--

INSERT INTO `room0` (`klu4`, `time`, `zn`, `who`, `message`, `uid`, `id`, `towhom`, `hid`, `usid`, `reng`) VALUES
(14431185, '14:28', '', 'TEAM', 0x3c753e6c657165626c6920697374696661646526233233313b692059656e692051657964206f6c64753c2f753e21, 0, 1498127332, '1', 0, 447, NULL),
(55332588, '15:37', '', 'hmmm', 0x3c753e6c657165626c6920697374696661646526233233313b692059656e692051657964206f6c64753c2f753e21, 0, 1498131476, '1', 0, 448, NULL),
(46225249, '15:39', '', 'test*IBc', 0x3c753e6c657165626c6920697374696661646526233233313b692059656e692051657964206f6c64753c2f753e21, 0, 1498131586, '1', 0, 449, NULL),
(10775683, '15:40', '', 'test*Lbl', 0x3c753e6c657165626c6920697374696661646526233233313b692059656e692051657964206f6c64753c2f753e21, 0, 1498131646, '1', 0, 450, NULL),
(48878379, '15:40', '', 'test*leS', 0x3c753e6c657165626c6920697374696661646526233233313b692059656e692051657964206f6c64753c2f753e21, 0, 1498131646, '1', 0, 451, NULL),
(8010222, '15:41', '', 'test*yyn', 0x3c753e6c657165626c6920697374696661646526233233313b692059656e692051657964206f6c64753c2f753e21, 0, 1498131706, '1', 0, 452, NULL),
(72217127, '15:42', '', 'test*byM', 0x3c753e6c657165626c6920697374696661646526233233313b692059656e692051657964206f6c64753c2f753e21, 0, 1498131766, '1', 0, 453, NULL),
(30738507, '15:42', '', 'test*PYI', 0x3c753e6c657165626c6920697374696661646526233233313b692059656e692051657964206f6c64753c2f753e21, 0, 1498131766, '1', 0, 454, NULL),
(49554461, '15:42', '', 'test*uFt', 0x3c753e6c657165626c6920697374696661646526233233313b692059656e692051657964206f6c64753c2f753e21, 0, 1498131766, '1', 0, 455, NULL),
(73121335, '15:43', '', 'test*lxK', 0x3c753e6c657165626c6920697374696661646526233233313b692059656e692051657964206f6c64753c2f753e21, 0, 1498131826, '1', 0, 456, NULL),
(73929803, '15:43', '', 'test*jJj', 0x3c753e6c657165626c6920697374696661646526233233313b692059656e692051657964206f6c64753c2f753e21, 0, 1498131826, '1', 0, 457, NULL),
(40495275, '15:43', '', 'test*hhb', 0x3c753e6c657165626c6920697374696661646526233233313b692059656e692051657964206f6c64753c2f753e21, 0, 1498131826, '1', 0, 458, NULL),
(95068494, '15:44', '', 'test*MGz', 0x3c753e6c657165626c6920697374696661646526233233313b692059656e692051657964206f6c64753c2f753e21, 0, 1498131886, '1', 0, 459, NULL),
(36870783, '15:44', '', 'test*Vfc', 0x3c753e6c657165626c6920697374696661646526233233313b692059656e692051657964206f6c64753c2f753e21, 0, 1498131886, '1', 0, 460, NULL),
(73063909, '15:45', '', 'test*asI', 0x3c753e6c657165626c6920697374696661646526233233313b692059656e692051657964206f6c64753c2f753e21, 0, 1498131948, '1', 0, 461, NULL),
(61929441, '15:46', '', 'test*HJD', 0x3c753e6c657165626c6920697374696661646526233233313b692059656e692051657964206f6c64753c2f753e21, 0, 1498132008, '1', 0, 462, NULL),
(48604101, '15:47', '', 'test*nLV', 0x3c753e6c657165626c6920697374696661646526233233313b692059656e692051657964206f6c64753c2f753e21, 0, 1498132069, '1', 0, 463, NULL),
(57025416, '15:48', '', 'test*OSR', 0x3c753e6c657165626c6920697374696661646526233233313b692059656e692051657964206f6c64753c2f753e21, 0, 1498132129, '1', 0, 464, NULL),
(90107159, '15:48', '', 'test*mrI', 0x3c753e6c657165626c6920697374696661646526233233313b692059656e692051657964206f6c64753c2f753e21, 0, 1498132129, '1', 0, 465, NULL),
(29797454, '15:49', '', 'test*SIr', 0x3c753e6c657165626c6920697374696661646526233233313b692059656e692051657964206f6c64753c2f753e21, 0, 1498132189, '1', 0, 466, NULL),
(31145718, '15:49', '', 'test*EYu', 0x3c753e6c657165626c6920697374696661646526233233313b692059656e692051657964206f6c64753c2f753e21, 0, 1498132189, '1', 0, 467, NULL),
(74586302, '15:49', '', 'test*bWY', 0x3c753e6c657165626c6920697374696661646526233233313b692059656e692051657964206f6c64753c2f753e21, 0, 1498132189, '1', 0, 468, NULL),
(17000717, '15:50', '', 'test*KFX', 0x3c753e6c657165626c6920697374696661646526233233313b692059656e692051657964206f6c64753c2f753e21, 0, 1498132249, '1', 0, 469, NULL),
(43623442, '16:11', '', 'ByOn', 0x3c753e6c657165626c6920697374696661646526233233313b692059656e692051657964206f6c64753c2f753e21, 0, 1498133475, '1', 0, 470, NULL),
(96874560, '16:41', '', 'hmmm*ocn', 0x3c753e6c657165626c6920697374696661646526233233313b692059656e692051657964206f6c64753c2f753e21, 0, 1498135271, '1', 0, 471, NULL),
(13171767, '16:42', '', 'hmmm*YuU', 0x3c753e6c657165626c6920697374696661646526233233313b692059656e692051657964206f6c64753c2f753e21, 0, 1498135331, '1', 0, 472, NULL),
(18459323, '16:43', '', 'hmmm*ivx', 0x3c753e6c657165626c6920697374696661646526233233313b692059656e692051657964206f6c64753c2f753e21, 0, 1498135391, '1', 0, 473, NULL),
(25308527, '16:44', '', 'hmmm*swU', 0x3c753e6c657165626c6920697374696661646526233233313b692059656e692051657964206f6c64753c2f753e21, 0, 1498135451, '1', 0, 474, NULL),
(35360223, '16:44', '', 'hmmm*tIo', 0x3c753e6c657165626c6920697374696661646526233233313b692059656e692051657964206f6c64753c2f753e21, 0, 1498135451, '1', 0, 475, NULL),
(11344472, '18:08', '', 'djrjffj', 0x3c753e6c657165626c6920697374696661646526233233313b692059656e692051657964206f6c64753c2f753e21, 0, 1498140504, '1', 0, 476, NULL),
(32056027, '23:08', '', 'dcms', 0x3c753e6c657165626c6920697374696661646526233233313b692059656e692051657964206f6c64753c2f753e21, 0, 1498158506, '1', 0, 477, NULL),
(75618082, '09:35', '', 'Hhkbg', 0x3c753e6c657165626c6920697374696661646526233233313b692059656e692051657964206f6c64753c2f753e21, 0, 1498196125, '1', 0, 478, NULL),
(61449483, '17:38', '', 'fghjtjr', 0x3c753e6c657165626c6920697374696661646526233233313b692059656e692051657964206f6c64753c2f753e21, 0, 1498225110, '1', 0, 479, NULL),
(89686541, '11:53', '', 'jjdjjsj', 0x3c753e6c657165626c6920697374696661646526233233313b692059656e692051657964206f6c64753c2f753e21, 0, 1498550032, '1', 0, 480, NULL),
(27042956, '17:57', '', 'manyak', 0x3c753e6c657165626c6920697374696661646526233233313b692059656e692051657964206f6c64753c2f753e21, 0, 1498658222, '1', 0, 481, NULL),
(57458041, '02:07', '', 'UnuDulmaZ', 0x3c753e6c657165626c6920697374696661646526233233313b692059656e692051657964206f6c64753c2f753e21, 0, 1499033261, '1', 0, 482, NULL),
(23702677, '17:54', '', 'recebdi', 0x3c753e6c657165626c6920697374696661646526233233313b692059656e692051657964206f6c64753c2f753e21, 0, 1499176465, '1', 0, 483, NULL),
(59628355, '16:10', '', 'noayyn', 0x3c753e6c657165626c6920697374696661646526233233313b692059656e692051657964206f6c64753c2f753e21, 0, 1499256615, '1', 0, 484, NULL),
(16706235, '16:37', '', 'varrrr', 0x3c753e6c657165626c6920697374696661646526233233313b692059656e692051657964206f6c64753c2f753e21, 0, 1499258231, '1', 0, 485, NULL),
(47590420, '21:18', '', 'bshshsb', 0x3c753e6c657165626c6920697374696661646526233233313b692059656e692051657964206f6c64753c2f753e21, 0, 1499534335, '1', 0, 486, NULL),
(32734231, '20:18', '', '', 0x3c753e6c657165626c6920697374696661646526233233313b692059656e692051657964206f6c64753c2f753e21, 0, 1500394695, '1', 0, 487, NULL),
(83254488, '13:45', '', 'ISMA_BIKES', 0x3c753e6c657165626c6920697374696661646526233233313b692059656e692051657964206f6c64753c2f753e21, 0, 1500630357, '1', 0, 488, NULL),
(20527068, '11:31', '', 'sgsgeggw', 0x3c753e6c657165626c6920697374696661646526233233313b692059656e692051657964206f6c64753c2f753e21, 0, 1500708688, '1', 0, 489, NULL),
(150523, '02:21', '', '_volk', 0x3c753e6c657165626c6920697374696661646526233233313b692059656e692051657964206f6c64753c2f753e21, 0, 1500762080, '1', 0, 490, NULL),
(88926397, '03:50', '', 'xmmma', 0x3c753e6c657165626c6920697374696661646526233233313b692059656e692051657964206f6c64753c2f753e21, 0, 1501113034, '1', 0, 491, NULL),
(87119872, '03:51', '', 'Alim', 0x566178742062697464692e204e26233234363b7662657469207375616c2031302073616e69796564656e20736f6e72612e, 0, 1501113077, '', 0, 2, NULL),
(78754999, '00:49', '', 'gththrht', 0x3c753e6c657165626c6920697374696661646526233233313b692059656e692051657964206f6c64753c2f753e21, 0, 1501534155, '1', 0, 492, NULL),
(37902688, '19:31', '', 'xacmaz', 0x3c753e6c657165626c6920697374696661646526233233313b692059656e692051657964206f6c64753c2f753e21, 0, 1502292676, '1', 0, 493, NULL),
(32177975, '23:03', '', 'Ghhhjj', 0x3c753e6c657165626c6920697374696661646526233233313b692059656e692051657964206f6c64753c2f753e21, 0, 1503342235, '1', 0, 494, NULL),
(42949164, '16:40', '', 'Ggghj', 0x3c753e6c657165626c6920697374696661646526233233313b692059656e692051657964206f6c64753c2f753e21, 0, 1503578431, '1', 0, 495, NULL),
(31389299, '16:45', '', 'By_MaGa', 0x3c753e6c657165626c6920697374696661646526233233313b692059656e692051657964206f6c64753c2f753e21, 0, 1503578705, '1', 0, 496, NULL),
(41308120, '21:47', '', 'dadasd', 0x3c753e6c657165626c6920697374696661646526233233313b692059656e692051657964206f6c64753c2f753e21, 0, 1503596870, '1', 0, 497, NULL),
(49707208, '10:07', '', 'Alim', 0x3c623e5375616c3a203c2f623e506f636874206d61726b61736920696c6b206465666520686172616461206275726178696c69623f2e20283c623e313720686572663c2f623e29, 0, 1504764475, '', 0, 2, NULL),
(6183988, '20:52', '', 'cffc', 0x3c753e6c657165626c6920697374696661646526233233313b692059656e692051657964206f6c64753c2f753e21, 0, 1506012745, '1', 0, 498, NULL),
(96394381, '02:51', '', 'Ureyim_olarsan', 0x3c753e6c657165626c6920697374696661646526233233313b692059656e692051657964206f6c64753c2f753e21, 0, 1506034277, '1', 0, 499, NULL),
(98743675, '11:34', '', 'sabahinxeyr', 0x3c753e6c657165626c6920697374696661646526233233313b692059656e692051657964206f6c64753c2f753e21, 0, 1506670483, '1', 0, 500, NULL),
(36615771, '17:07', '', 'Hdjdjjdjd', 0x3c753e6c657165626c6920697374696661646526233233313b692059656e692051657964206f6c64753c2f753e21, 0, 1506690422, '1', 0, 501, NULL),
(30663653, '16:07', '', 'Sergio', 0x3c753e6c657165626c6920697374696661646526233233313b692059656e692051657964206f6c64753c2f753e21, 0, 1506773254, '1', 0, 502, NULL),
(8706952, '00:22', '', 'azadd', 0x3c753e6c657165626c6920697374696661646526233233313b692059656e692051657964206f6c64753c2f753e21, 0, 1507148526, '1', 0, 503, NULL),
(74924037, '01:39', '', 'UnuDulmaZ!', 0x3c753e6c657165626c6920697374696661646526233233313b692059656e692051657964206f6c64753c2f753e21, 0, 1507153195, '1', 0, 504, NULL),
(75938692, '04:04', '', 'sasasas', 0x3c753e6c657165626c6920697374696661646526233233313b692059656e692051657964206f6c64753c2f753e21, 0, 1507161859, '1', 0, 505, NULL),
(27544404, '04:18', '', 'Ruslandata', 0x3c753e6c657165626c6920697374696661646526233233313b692059656e692051657964206f6c64753c2f753e21, 0, 1507162682, '1', 0, 506, NULL),
(30154483, '04:21', '', 'Canann', 0x3c753e6c657165626c6920697374696661646526233233313b692059656e692051657964206f6c64753c2f753e21, 0, 1507162880, '1', 0, 507, NULL),
(84052139, '06:42', '', 'Alim', 0x566178742062697464692e204e26233234363b7662657469207375616c2031302073616e69796564656e20736f6e72612e, 0, 1507171377, '', 0, 2, NULL),
(24550234, '11:02', '', 'Hhvvvvvvv', 0x3c753e6c657165626c6920697374696661646526233233313b692059656e692051657964206f6c64753c2f753e21, 0, 1507186952, '1', 0, 508, NULL),
(17452457, '12:41', '', 'nnnnj', 0x3c753e6c657165626c6920697374696661646526233233313b692059656e692051657964206f6c64753c2f753e21, 0, 1507192860, '1', 0, 509, NULL),
(94964680, '14:27', '', '!mPoSsiBLe', 0x3c753e6c657165626c6920697374696661646526233233313b692059656e692051657964206f6c64753c2f753e21, 0, 1507199269, '1', 0, 510, NULL),
(51068186, '14:29', '', 'Pionses', 0x3c753e6c657165626c6920697374696661646526233233313b692059656e692051657964206f6c64753c2f753e21, 0, 1507199394, '1', 0, 511, NULL),
(94567073, '16:14', '', 'Volk', 0x3c753e6c657165626c6920697374696661646526233233313b692059656e692051657964206f6c64753c2f753e21, 0, 1507205651, '1', 0, 512, NULL),
(77775532, '10:55', '', 'Alim', 0x3c623e5375616c3a203c2f623e4f72746120657369726c657264652076656e6574736979616e696e206b7563656c657269206e6563652074656d697a6c656e697264693f2e20283c623e313520686572663c2f623e29, 0, 1597820129, '', 0, 2, NULL),
(8507505, '10:55', '', 'Xeber&#231;i', 0x3c623e41444d694e3c2f623e2c202042616e206564696c6d69c59f20223c753e746573742a6257593c2f753e22206c657165626c6920697374696661646526233233313b69203c623ec3876174612071617974617264c4b13c2f623e, 0, 1597820148, '', 0, 7, NULL),
(14760365, '11:57', '', 'Sevgilim', 0x3c753e6c657165626c6920697374696661646526233233313b692059656e692051657964206f6c64753c2f753e21, 0, 1597823831, '1', 0, 513, NULL),
(70549226, '12:04', '', 'Alim', 0x566178742062697464692e204e26233234363b7662657469207375616c2031302073616e69796564656e20736f6e72612e, 0, 1597824243, '', 0, 2, NULL),
(19039377, '20:39', '', 'Alim', 0x3c623e5375616c3a203c2f623ee2809c4365796d7320426f6e642c204167656e7420303037e2809d2066696c6d696e696e20626173682071656872656d616e696e696e20616469206e656469723f2e20283c623e313120686572663c2f623e29, 0, 1597855178, '', 0, 2, NULL),
(89941334, '22:47', '', 'Alim', 0x566178742062697464692e204e26233234363b7662657469207375616c2031302073616e69796564656e20736f6e72612e, 0, 1597862878, '', 0, 2, NULL),
(24279189, '22:56', '', 'Alim', 0x3c623e5375616c3a203c2f623e4861636920516172616e696e206172766164696e696e20616469206e65206964693f2e20283c623e3520686572663c2f623e29, 0, 1597863373, '', 0, 2, NULL),
(72109731, '01:39', '', 'Status', 0x3c623e446951514554212041444d694e203c753e41444d694e3c2f753e20204c657165626c692020697374696661646526233233313b696e69205265686265726c696b2076657a69666573696e6520746579696e2065746469213c2f623e, 0, 1597873195, '', 0, 1, NULL),
(40278671, '20:41', '', 'Kenan22', 0x3c753e6c657165626c6920697374696661646526233233313b692059656e692051657964206f6c64753c2f753e21, 0, 1598200867, '1', 0, 514, NULL),
(32399255, '20:48', '', 'KR!STaL', 0x3c753e6c657165626c6920697374696661646526233233313b692059656e692051657964206f6c64753c2f753e21, 0, 1598201305, '1', 0, 515, NULL),
(1728594, '09:31', '', 'Aghayeff', 0x3c753e6c657165626c6920697374696661646526233233313b692059656e692051657964206f6c64753c2f753e21, 0, 1598247074, '1', 0, 516, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `room1`
--

CREATE TABLE IF NOT EXISTS `room1` (
  `klu4` int(8) NOT NULL DEFAULT '0',
  `time` varchar(5) NOT NULL DEFAULT '',
  `zn` varchar(20) NOT NULL DEFAULT '',
  `who` varchar(40) NOT NULL DEFAULT '',
  `message` blob NOT NULL,
  `uid` int(11) NOT NULL DEFAULT '0',
  `id` double NOT NULL DEFAULT '0',
  `towhom` varchar(12) NOT NULL DEFAULT '',
  `hid` smallint(1) NOT NULL DEFAULT '0',
  `usid` int(11) NOT NULL DEFAULT '0',
  `reng` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`klu4`),
  KEY `id` (`id`),
  KEY `usid` (`usid`,`towhom`,`uid`),
  KEY `usid_2` (`usid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room1`
--

INSERT INTO `room1` (`klu4`, `time`, `zn`, `who`, `message`, `uid`, `id`, `towhom`, `hid`, `usid`, `reng`) VALUES
(8507505, '10:55', '', 'Xeber&#231;i', 0x3c623e41444d694e3c2f623e2c202042616e206564696c6d69c59f20223c753e746573742a6257593c2f753e22206c657165626c6920697374696661646526233233313b69203c623ec3876174612071617974617264c4b13c2f623e, 0, 1597820148, '', 0, 7, NULL),
(89086890, '01:39', '', 'Status', 0x3c623e446951514554212041444d694e203c753e41444d694e3c2f753e20204c657165626c692020697374696661646526233233313b696e69205265686265726c696b2076657a69666573696e6520746579696e2065746469213c2f623e, 0, 1597873195, '', 0, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `room2`
--

CREATE TABLE IF NOT EXISTS `room2` (
  `klu4` int(8) NOT NULL DEFAULT '0',
  `time` varchar(5) NOT NULL DEFAULT '',
  `zn` varchar(20) NOT NULL DEFAULT '',
  `who` varchar(40) NOT NULL DEFAULT '',
  `message` blob NOT NULL,
  `uid` int(11) NOT NULL DEFAULT '0',
  `id` double NOT NULL DEFAULT '0',
  `towhom` varchar(12) NOT NULL DEFAULT '',
  `hid` smallint(1) NOT NULL DEFAULT '0',
  `usid` int(11) NOT NULL DEFAULT '0',
  `reng` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`klu4`),
  KEY `id` (`id`),
  KEY `usid` (`usid`,`towhom`,`uid`),
  KEY `usid_2` (`usid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room2`
--

INSERT INTO `room2` (`klu4`, `time`, `zn`, `who`, `message`, `uid`, `id`, `towhom`, `hid`, `usid`, `reng`) VALUES
(8507505, '10:55', '', 'Xeber&#231;i', 0x3c623e41444d694e3c2f623e2c202042616e206564696c6d69c59f20223c753e746573742a6257593c2f753e22206c657165626c6920697374696661646526233233313b69203c623ec3876174612071617974617264c4b13c2f623e, 0, 1597820148, '', 0, 7, NULL),
(41858979, '01:39', '', 'Status', 0x3c623e446951514554212041444d694e203c753e41444d694e3c2f753e20204c657165626c692020697374696661646526233233313b696e69205265686265726c696b2076657a69666573696e6520746579696e2065746469213c2f623e, 0, 1597873195, '', 0, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `room3`
--

CREATE TABLE IF NOT EXISTS `room3` (
  `klu4` int(8) NOT NULL DEFAULT '0',
  `time` varchar(5) NOT NULL DEFAULT '',
  `zn` varchar(20) NOT NULL DEFAULT '',
  `who` varchar(40) NOT NULL DEFAULT '',
  `message` blob NOT NULL,
  `uid` int(11) NOT NULL DEFAULT '0',
  `id` double NOT NULL DEFAULT '0',
  `towhom` varchar(12) NOT NULL DEFAULT '',
  `hid` smallint(1) NOT NULL DEFAULT '0',
  `usid` int(11) NOT NULL DEFAULT '0',
  `reng` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`klu4`),
  KEY `id` (`id`),
  KEY `usid` (`usid`,`towhom`,`uid`),
  KEY `usid_2` (`usid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room3`
--

INSERT INTO `room3` (`klu4`, `time`, `zn`, `who`, `message`, `uid`, `id`, `towhom`, `hid`, `usid`, `reng`) VALUES
(8507505, '10:55', '', 'Xeber&#231;i', 0x3c623e41444d694e3c2f623e2c202042616e206564696c6d69c59f20223c753e746573742a6257593c2f753e22206c657165626c6920697374696661646526233233313b69203c623ec3876174612071617974617264c4b13c2f623e, 0, 1597820148, '', 0, 7, NULL),
(41161634, '01:39', '', 'Status', 0x3c623e446951514554212041444d694e203c753e41444d694e3c2f753e20204c657165626c692020697374696661646526233233313b696e69205265686265726c696b2076657a69666573696e6520746579696e2065746469213c2f623e, 0, 1597873195, '', 0, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `room4`
--

CREATE TABLE IF NOT EXISTS `room4` (
  `klu4` int(8) NOT NULL DEFAULT '0',
  `time` varchar(5) NOT NULL DEFAULT '',
  `zn` varchar(20) NOT NULL DEFAULT '',
  `who` varchar(40) NOT NULL DEFAULT '',
  `message` blob NOT NULL,
  `uid` int(11) NOT NULL DEFAULT '0',
  `id` double NOT NULL DEFAULT '0',
  `towhom` varchar(12) NOT NULL DEFAULT '',
  `hid` smallint(1) NOT NULL DEFAULT '0',
  `usid` int(11) NOT NULL DEFAULT '0',
  `reng` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`klu4`),
  KEY `id` (`id`),
  KEY `usid` (`usid`,`towhom`,`uid`),
  KEY `usid_2` (`usid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room4`
--

INSERT INTO `room4` (`klu4`, `time`, `zn`, `who`, `message`, `uid`, `id`, `towhom`, `hid`, `usid`, `reng`) VALUES
(8507505, '10:55', '', 'Xeber&#231;i', 0x3c623e41444d694e3c2f623e2c202042616e206564696c6d69c59f20223c753e746573742a6257593c2f753e22206c657165626c6920697374696661646526233233313b69203c623ec3876174612071617974617264c4b13c2f623e, 0, 1597820148, '', 0, 7, NULL),
(83832681, '01:39', '', 'Status', 0x3c623e446951514554212041444d694e203c753e41444d694e3c2f753e20204c657165626c692020697374696661646526233233313b696e69205265686265726c696b2076657a69666573696e6520746579696e2065746469213c2f623e, 0, 1597873195, '', 0, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `room5`
--

CREATE TABLE IF NOT EXISTS `room5` (
  `klu4` int(8) NOT NULL DEFAULT '0',
  `time` varchar(5) NOT NULL DEFAULT '',
  `zn` varchar(20) NOT NULL DEFAULT '',
  `who` varchar(40) NOT NULL DEFAULT '',
  `message` blob NOT NULL,
  `uid` int(11) NOT NULL DEFAULT '0',
  `id` double NOT NULL DEFAULT '0',
  `towhom` varchar(12) NOT NULL DEFAULT '',
  `hid` smallint(1) NOT NULL DEFAULT '0',
  `usid` int(11) NOT NULL DEFAULT '0',
  `reng` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`klu4`),
  KEY `id` (`id`),
  KEY `usid` (`usid`,`towhom`,`uid`),
  KEY `usid_2` (`usid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room5`
--

INSERT INTO `room5` (`klu4`, `time`, `zn`, `who`, `message`, `uid`, `id`, `towhom`, `hid`, `usid`, `reng`) VALUES
(8507505, '10:55', '', 'Xeber&#231;i', 0x3c623e41444d694e3c2f623e2c202042616e206564696c6d69c59f20223c753e746573742a6257593c2f753e22206c657165626c6920697374696661646526233233313b69203c623ec3876174612071617974617264c4b13c2f623e, 0, 1597820148, '', 0, 7, NULL),
(62807684, '01:39', '', 'Status', 0x3c623e446951514554212041444d694e203c753e41444d694e3c2f753e20204c657165626c692020697374696661646526233233313b696e69205265686265726c696b2076657a69666573696e6520746579696e2065746469213c2f623e, 0, 1597873195, '', 0, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `room6`
--

CREATE TABLE IF NOT EXISTS `room6` (
  `klu4` int(8) NOT NULL DEFAULT '0',
  `time` varchar(5) NOT NULL DEFAULT '',
  `zn` varchar(20) NOT NULL DEFAULT '',
  `who` varchar(40) NOT NULL DEFAULT '',
  `message` blob NOT NULL,
  `uid` int(11) NOT NULL DEFAULT '0',
  `id` double NOT NULL DEFAULT '0',
  `towhom` varchar(12) NOT NULL DEFAULT '',
  `hid` smallint(1) NOT NULL DEFAULT '0',
  `usid` int(11) NOT NULL DEFAULT '0',
  `reng` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`klu4`),
  KEY `id` (`id`),
  KEY `usid` (`usid`,`towhom`,`uid`),
  KEY `usid_2` (`usid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room6`
--

INSERT INTO `room6` (`klu4`, `time`, `zn`, `who`, `message`, `uid`, `id`, `towhom`, `hid`, `usid`, `reng`) VALUES
(68384110, '14:52', '', 'Sistem', 0x3c623e4170617226233330353b6326233330353b3c2f623e203c753e4d616669612047616d6520526f756e6420313c2f753e203c623e61646c26233330353b206f79756e612073746172742076657264692e213c2f623e, 0, 1498128734, '', 0, 0, ''),
(8507505, '10:55', '', 'Xeber&#231;i', 0x3c623e41444d694e3c2f623e2c202042616e206564696c6d69c59f20223c753e746573742a6257593c2f753e22206c657165626c6920697374696661646526233233313b69203c623ec3876174612071617974617264c4b13c2f623e, 0, 1597820148, '', 0, 7, NULL),
(64416919, '01:39', '', 'Status', 0x3c623e446951514554212041444d694e203c753e41444d694e3c2f753e20204c657165626c692020697374696661646526233233313b696e69205265686265726c696b2076657a69666573696e6520746579696e2065746469213c2f623e, 0, 1597873195, '', 0, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `room7`
--

CREATE TABLE IF NOT EXISTS `room7` (
  `klu4` int(8) NOT NULL DEFAULT '0',
  `time` varchar(5) NOT NULL DEFAULT '',
  `zn` varchar(20) NOT NULL DEFAULT '',
  `who` varchar(40) NOT NULL DEFAULT '',
  `message` blob NOT NULL,
  `uid` int(11) NOT NULL DEFAULT '0',
  `id` double NOT NULL DEFAULT '0',
  `towhom` varchar(12) NOT NULL DEFAULT '',
  `hid` smallint(1) NOT NULL DEFAULT '0',
  `usid` int(11) NOT NULL DEFAULT '0',
  `reng` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`klu4`),
  KEY `id` (`id`),
  KEY `usid` (`usid`,`towhom`,`uid`),
  KEY `usid_2` (`usid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room7`
--

INSERT INTO `room7` (`klu4`, `time`, `zn`, `who`, `message`, `uid`, `id`, `towhom`, `hid`, `usid`, `reng`) VALUES
(8507505, '10:55', '', 'Xeber&#231;i', 0x3c623e41444d694e3c2f623e2c202042616e206564696c6d69c59f20223c753e746573742a6257593c2f753e22206c657165626c6920697374696661646526233233313b69203c623ec3876174612071617974617264c4b13c2f623e, 0, 1597820148, '', 0, 7, NULL),
(85131542, '01:39', '', 'Status', 0x3c623e446951514554212041444d694e203c753e41444d694e3c2f753e20204c657165626c692020697374696661646526233233313b696e69205265686265726c696b2076657a69666573696e6520746579696e2065746469213c2f623e, 0, 1597873195, '', 0, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `room8`
--

CREATE TABLE IF NOT EXISTS `room8` (
  `klu4` int(8) NOT NULL DEFAULT '0',
  `time` varchar(5) NOT NULL DEFAULT '',
  `zn` varchar(20) NOT NULL DEFAULT '',
  `who` varchar(40) NOT NULL DEFAULT '',
  `message` blob NOT NULL,
  `uid` int(11) NOT NULL DEFAULT '0',
  `id` double NOT NULL DEFAULT '0',
  `towhom` varchar(12) NOT NULL DEFAULT '',
  `hid` smallint(1) NOT NULL DEFAULT '0',
  `usid` int(11) NOT NULL DEFAULT '0',
  `reng` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`klu4`),
  KEY `id` (`id`),
  KEY `usid` (`usid`,`towhom`,`uid`),
  KEY `usid_2` (`usid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room8`
--

INSERT INTO `room8` (`klu4`, `time`, `zn`, `who`, `message`, `uid`, `id`, `towhom`, `hid`, `usid`, `reng`) VALUES
(8507505, '10:55', '', 'Xeber&#231;i', 0x3c623e41444d694e3c2f623e2c202042616e206564696c6d69c59f20223c753e746573742a6257593c2f753e22206c657165626c6920697374696661646526233233313b69203c623ec3876174612071617974617264c4b13c2f623e, 0, 1597820148, '', 0, 7, NULL),
(4391470, '01:39', '', 'Status', 0x3c623e446951514554212041444d694e203c753e41444d694e3c2f753e20204c657165626c692020697374696661646526233233313b696e69205265686265726c696b2076657a69666573696e6520746579696e2065746469213c2f623e, 0, 1597873195, '', 0, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `room9`
--

CREATE TABLE IF NOT EXISTS `room9` (
  `klu4` int(8) NOT NULL DEFAULT '0',
  `time` varchar(5) NOT NULL DEFAULT '',
  `zn` varchar(20) NOT NULL DEFAULT '',
  `who` varchar(40) NOT NULL DEFAULT '',
  `message` blob NOT NULL,
  `uid` int(11) NOT NULL DEFAULT '0',
  `id` double NOT NULL DEFAULT '0',
  `towhom` varchar(12) NOT NULL DEFAULT '',
  `hid` smallint(1) NOT NULL DEFAULT '0',
  `usid` int(11) NOT NULL DEFAULT '0',
  `reng` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`klu4`),
  KEY `id` (`id`),
  KEY `usid` (`usid`,`towhom`,`uid`),
  KEY `usid_2` (`usid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room9`
--

INSERT INTO `room9` (`klu4`, `time`, `zn`, `who`, `message`, `uid`, `id`, `towhom`, `hid`, `usid`, `reng`) VALUES
(8507505, '10:55', '', 'Xeber&#231;i', 0x3c623e41444d694e3c2f623e2c202042616e206564696c6d69c59f20223c753e746573742a6257593c2f753e22206c657165626c6920697374696661646526233233313b69203c623ec3876174612071617974617264c4b13c2f623e, 0, 1597820148, '', 0, 7, NULL),
(78960999, '01:39', '', 'Status', 0x3c623e446951514554212041444d694e203c753e41444d694e3c2f753e20204c657165626c692020697374696661646526233233313b696e69205265686265726c696b2076657a69666573696e6520746579696e2065746469213c2f623e, 0, 1597873195, '', 0, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `room10`
--

CREATE TABLE IF NOT EXISTS `room10` (
  `klu4` int(8) NOT NULL DEFAULT '0',
  `time` varchar(5) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `zn` varchar(20) NOT NULL DEFAULT '',
  `who` varchar(40) NOT NULL DEFAULT '',
  `message` blob NOT NULL,
  `uid` int(11) NOT NULL DEFAULT '0',
  `id` double NOT NULL DEFAULT '0',
  `towhom` varchar(12) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `hid` smallint(1) NOT NULL DEFAULT '0',
  `usid` int(11) NOT NULL DEFAULT '0',
  `pwd` varchar(255) NOT NULL DEFAULT '',
  `reng` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`klu4`),
  KEY `id` (`id`),
  KEY `usid` (`usid`,`towhom`,`uid`,`pwd`),
  KEY `usid_2` (`usid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room10`
--

INSERT INTO `room10` (`klu4`, `time`, `zn`, `who`, `message`, `uid`, `id`, `towhom`, `hid`, `usid`, `pwd`, `reng`) VALUES
(2068827, '01:39', '', 'Status', 0x3c623e446951514554212041444d694e203c753e41444d694e3c2f753e20204c657165626c692020697374696661646526233233313b696e69205265686265726c696b2076657a69666573696e6520746579696e2065746469213c2f623e, 0, 1597873195, '', 0, 1, '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE IF NOT EXISTS `rooms` (
  `rm` smallint(5) NOT NULL AUTO_INCREMENT,
  `name` blob,
  `topic` blob,
  `pos` tinyint(2) NOT NULL DEFAULT '0',
  `nov` int(1) NOT NULL DEFAULT '0',
  `point` int(11) NOT NULL DEFAULT '0',
  `activ` int(3) NOT NULL DEFAULT '1',
  PRIMARY KEY (`rm`),
  KEY `activ` (`activ`,`rm`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 PACK_KEYS=0 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`rm`, `name`, `topic`, `pos`, `nov`, `point`, `activ`) VALUES
(0, 0x5375616c2d4361766162, 0x5375616c204361766162, 0, 0, 0, 1),
(1, 0xc39c6d756d69206f746171, 0x564546414c4920444f53544c4152494e204d454b414e49, 1, 0, 0, 1),
(2, 0x526f6d616e74696b61, 0x526f6d616e74696b61, 2, 0, 0, 1),
(3, 0xc4b0736c616d, 0x49736c616d, 3, 0, 0, 1),
(4, 0x54656e68616c6172, 0x54454b4c494b, 4, 0, 2000, 1),
(5, 0x536576676920416c656d69, 0x536576676920416c656d69, 5, 0, 0, 1),
(6, 0x48696372616e, 0x54616e6973686c6971206f74616769, 6, 0, 0, 1),
(7, 0x53657667696c696c6572, 0x53657667696c696c6572, 7, 0, 1, 1),
(8, 0x41646d696e206f74617169, 0x546f7069636b, 8, 0, 0, 0),
(9, 0x516179646173697a, 0xd091d0b5d0b720d181d182d0b8d181d0bdd0b5d0bdd0b8d18f203a29, 9, 0, 0, 0),
(10, 0x47697a6c69204f746171, 0x546574612d546574, 10, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sekiller`
--

CREATE TABLE IF NOT EXISTS `sekiller` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pos` text CHARACTER SET latin1 NOT NULL,
  `img` text NOT NULL,
  `bolme` varchar(50) NOT NULL DEFAULT '',
  `who` varchar(40) NOT NULL DEFAULT '',
  `vaxt` varchar(30) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `bax` int(100) NOT NULL,
  `kim` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `down` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `sekiller`
--


-- --------------------------------------------------------

--
-- Table structure for table `sekil_bolme`
--

CREATE TABLE IF NOT EXISTS `sekil_bolme` (
  `bolme` smallint(5) NOT NULL DEFAULT '0',
  `name` blob,
  PRIMARY KEY (`bolme`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sekil_bolme`
--

INSERT INTO `sekil_bolme` (`bolme`, `name`) VALUES
(0, 0x44696e692053656b696c6c6572),
(1, 0x4176746f206b6174616c6f71),
(2, 0x4469676572202f2051617269736971),
(3, 0x51697a6c6172202f20476f7a656c6c6572),
(4, 0x48657976616e6c617220616c656d69),
(5, 0x4b696e6f202f2046696c6d),
(6, 0x54616e696e6d6973202f204d6573687572);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE IF NOT EXISTS `setting` (
  `klu4` smallint(1) NOT NULL DEFAULT '0',
  `vict` smallint(1) NOT NULL DEFAULT '0',
  `victint` smallint(4) NOT NULL DEFAULT '0',
  `prod` smallint(1) NOT NULL DEFAULT '0',
  `reg` smallint(1) NOT NULL DEFAULT '0',
  `computer` smallint(1) NOT NULL DEFAULT '1',
  `komputer` smallint(1) NOT NULL DEFAULT '1',
  `bal1` int(11) NOT NULL DEFAULT '0',
  `posts1` int(11) NOT NULL DEFAULT '0',
  `bal2` int(11) NOT NULL DEFAULT '0',
  `posts2` int(11) NOT NULL DEFAULT '0',
  `xerc` int(11) DEFAULT '0',
  `bal` int(11) DEFAULT '0',
  `balq` int(11) NOT NULL DEFAULT '0',
  `reg_time` int(11) NOT NULL,
  PRIMARY KEY (`klu4`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`klu4`, `vict`, `victint`, `prod`, `reg`, `computer`, `komputer`, `bal1`, `posts1`, `bal2`, `posts2`, `xerc`, `bal`, `balq`, `reg_time`) VALUES
(1, 1, 10, 0, 1, 1, 1, 5, 5, 5, 5, 180290, 20, 25, 0);

-- --------------------------------------------------------

--
-- Table structure for table `show_fikir`
--

CREATE TABLE IF NOT EXISTS `show_fikir` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usid` int(11) DEFAULT '0',
  `user` varchar(80) DEFAULT NULL,
  `message` text NOT NULL,
  `time` int(11) NOT NULL DEFAULT '0',
  `key` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `show_fikir`
--


-- --------------------------------------------------------

--
-- Table structure for table `show_foto`
--

CREATE TABLE IF NOT EXISTS `show_foto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idfoto` int(11) NOT NULL DEFAULT '0',
  `photo` text NOT NULL,
  `vote` int(11) DEFAULT '0',
  `info` text CHARACTER SET utf8 NOT NULL,
  `date` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idfoto` (`idfoto`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=333 ;

--
-- Dumping data for table `show_foto`
--

INSERT INTO `show_foto` (`id`, `idfoto`, `photo`, `vote`, `info`, `date`) VALUES
(321, 48, '48-6718247.jpg', 0, 'ANNELERIMIZ BI MELEKLER', '14-04-2017'),
(322, 46, '46-5746917.jpg', 0, 'ozledimm', '16-04-2017'),
(323, 48, '48-485781.jpg', 0, 'OÑ…ÑƒÑÐ½ Ð³Ð¾Ð·Ð»ÐµÑ€ Ð²Ð°Ñ€ Ð¾Ð»ÑÑƒÐ½', '16-04-2017'),
(324, 46, '46-1761009.jpg', 0, '.......', '17-04-2017'),
(325, 1, '1-5010709.jpg', 0, 'ATANIN UREYI ATASI &#350;URBAN BOYUNA', '18-04-2017'),
(326, 219, '219-9872223.jpg', 2, 'Ses verende sagolsun vermiyende', '24-05-2017'),
(327, 219, '219-8314859.jpg', 540, 'Ses verende sagolsun vermiyende', '25-05-2017'),
(328, 177, '177-4726163.jpg', 0, '.........', '30-05-2017'),
(329, 170, '170-8089513.jpg', 0, 'bayraximiz nanusumu qeyretimizdi qoruyun bayraximizi', '31-05-2017'),
(330, 283, '283-5638020.jpeg', 1000, 'Tapsan getir???', '09-06-2017'),
(331, 392, '392-9246008.jpg', 2080, 'gozel qizim', '13-06-2017'),
(332, 392, '392-9362608.jpg', 0, 'hmm beladi', '14-06-2017');

-- --------------------------------------------------------

--
-- Table structure for table `show_ses`
--

CREATE TABLE IF NOT EXISTS `show_ses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idwho` int(11) NOT NULL,
  `whoid` int(11) NOT NULL,
  `login` varchar(20) NOT NULL,
  `vote` int(11) NOT NULL,
  `data` varchar(20) NOT NULL,
  `saat` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `show_ses`
--


-- --------------------------------------------------------

--
-- Table structure for table `sh_cat`
--

CREATE TABLE IF NOT EXISTS `sh_cat` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `kataloq` int(6) NOT NULL DEFAULT '0',
  `movzu` int(8) NOT NULL DEFAULT '0',
  `abc` int(2) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 PACK_KEYS=0 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `sh_cat`
--


-- --------------------------------------------------------

--
-- Table structure for table `sh_new`
--

CREATE TABLE IF NOT EXISTS `sh_new` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `time` varchar(15) NOT NULL,
  `date` varchar(20) NOT NULL,
  `name` varchar(40) NOT NULL,
  `text` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `description` text NOT NULL,
  `avtor` int(7) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `sh_new`
--


-- --------------------------------------------------------

--
-- Table structure for table `sh_podcat`
--

CREATE TABLE IF NOT EXISTS `sh_podcat` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `refid` int(10) NOT NULL,
  `post` int(8) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `sh_podcat`
--


-- --------------------------------------------------------

--
-- Table structure for table `sh_post`
--

CREATE TABLE IF NOT EXISTS `sh_post` (
  `id` int(7) NOT NULL AUTO_INCREMENT,
  `time` varchar(20) NOT NULL,
  `avtor` int(7) NOT NULL,
  `date` varchar(25) NOT NULL DEFAULT '2010.05.20 15:50',
  `text` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `tema` int(6) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tema` (`tema`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `sh_post`
--


-- --------------------------------------------------------

--
-- Table structure for table `sh_tem`
--

CREATE TABLE IF NOT EXISTS `sh_tem` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `avtor` int(6) NOT NULL,
  `time` varchar(15) NOT NULL,
  `name` varchar(35) NOT NULL,
  `cat` int(6) NOT NULL,
  `close` int(1) NOT NULL,
  `tesdiq` int(1) DEFAULT '2',
  PRIMARY KEY (`id`),
  KEY `tesdiq` (`tesdiq`,`close`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 PACK_KEYS=0 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `sh_tem`
--


-- --------------------------------------------------------

--
-- Table structure for table `sifarish`
--

CREATE TABLE IF NOT EXISTS `sifarish` (
  `lid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id` int(11) NOT NULL DEFAULT '0',
  `to` int(11) DEFAULT '0',
  `date` text CHARACTER SET cp1251 NOT NULL,
  `time` int(11) unsigned NOT NULL DEFAULT '0',
  `nov` tinyint(4) DEFAULT '0',
  `qeyd` text NOT NULL,
  PRIMARY KEY (`lid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `sifarish`
--


-- --------------------------------------------------------

--
-- Table structure for table `sikayet`
--

CREATE TABLE IF NOT EXISTS `sikayet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `us` int(11) DEFAULT '0',
  `sikayyetci` varchar(50) NOT NULL,
  `uid` int(11) DEFAULT '0',
  `cinayetkar` varchar(50) NOT NULL,
  `sikayet` blob,
  `nov` varchar(20) NOT NULL,
  `data` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 PACK_KEYS=0 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `sikayet`
--


-- --------------------------------------------------------

--
-- Table structure for table `smiles`
--

CREATE TABLE IF NOT EXISTS `smiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usid` int(11) NOT NULL DEFAULT '0',
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `smile` varchar(50) NOT NULL,
  `posts` int(11) NOT NULL DEFAULT '0',
  `a` int(1) NOT NULL DEFAULT '0',
  `b` int(6) NOT NULL DEFAULT '0',
  `time` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=566 ;

--
-- Dumping data for table `smiles`
--

INSERT INTO `smiles` (`id`, `usid`, `name`, `smile`, `posts`, `a`, `b`, `time`) VALUES
(1, 1, '.aaa.', 'smile_v2/1.gif', 0, 0, 2, 0),
(2, 1, '.aaa2.', 'smile_v2/2.gif', 0, 0, 2, 0),
(3, 1, '.aggressive.', 'smile_v2/3.gif', 0, 0, 2, 0),
(4, 1, '.agree.', 'smile_v2/4.gif', 0, 0, 2, 0),
(5, 1, '.aikido.', 'smile_v2/5.gif', 0, 0, 2, 0),
(6, 1, '.airkiss.', 'smile_v2/6.gif', 0, 0, 2, 0),
(7, 1, '.airkiss2.', 'smile_v2/7.gif', 0, 0, 2, 0),
(8, 1, '.alien.', 'smile_v2/8.gif', 0, 0, 2, 0),
(9, 1, '.amur.', 'smile_v2/9.gif', 0, 0, 2, 0),
(10, 1, '.angel.', 'smile_v2/10.gif', 0, 0, 2, 0),
(11, 1, '.angel2.', 'smile_v2/11.gif', 0, 0, 2, 0),
(12, 1, '.angel3.', 'smile_v2/12.gif', 0, 0, 2, 0),
(13, 1, '.angel4.', 'smile_v2/13.gif', 0, 0, 2, 0),
(14, 1, '.angel5.', 'smile_v2/14.gif', 0, 0, 2, 0),
(15, 1, '.aspaz.', 'smile_v2/15.gif', 0, 0, 2, 0),
(16, 1, '.au.', 'smile_v2/16.gif', 0, 0, 2, 0),
(17, 1, '.bad.', 'smile_v2/17.gif', 0, 0, 2, 0),
(18, 1, '.ball.', 'smile_v2/18.gif', 0, 0, 2, 0),
(19, 1, '.ban.', 'smile_v2/19.gif', 0, 0, 2, 0),
(20, 1, '.bandana.', 'smile_v2/20.gif', 0, 0, 2, 0),
(21, 1, '.banned.', 'smile_v2/21.gif', 0, 0, 2, 0),
(22, 1, '.banned2.', 'smile_v2/22.gif', 0, 0, 2, 0),
(23, 1, '.basket.', 'smile_v2/23.gif', 0, 0, 2, 0),
(24, 1, '.bax.', 'smile_v2/24.gif', 0, 0, 2, 0),
(25, 1, '.bee.', 'smile_v2/25.gif', 0, 0, 2, 0),
(26, 1, '.beee.', 'smile_v2/26.gif', 0, 0, 2, 0),
(27, 1, '.belarus.', 'smile_v2/27.gif', 0, 0, 2, 0),
(28, 1, '.betman.', 'smile_v2/28.gif', 0, 0, 2, 0),
(29, 1, '.bis.', 'smile_v2/29.gif', 0, 0, 2, 0),
(30, 1, '.black.', 'smile_v2/30.gif', 0, 0, 2, 0),
(31, 1, '.blat.', 'smile_v2/31.gif', 0, 0, 2, 0),
(32, 1, '.blev.', 'smile_v2/32.gif', 0, 0, 2, 0),
(33, 1, '.blev2.', 'smile_v2/33.gif', 0, 0, 2, 0),
(34, 1, '.blink.', 'smile_v2/34.gif', 0, 0, 2, 0),
(35, 1, '.bog.', 'smile_v2/35.gif', 0, 0, 2, 0),
(36, 1, '.bog2.', 'smile_v2/36.gif', 0, 0, 2, 0),
(37, 1, '.bomb.', 'smile_v2/37.gif', 0, 0, 2, 0),
(38, 1, '.bomb2.', 'smile_v2/38.gif', 0, 0, 2, 0),
(39, 1, '.boo.', 'smile_v2/39.gif', 0, 0, 2, 0),
(40, 1, '.boom.', 'smile_v2/40.gif', 0, 0, 2, 0),
(41, 1, '.bous.', 'smile_v2/41.gif', 0, 0, 2, 0),
(42, 1, '.box.', 'smile_v2/42.gif', 0, 0, 2, 0),
(43, 1, '.brovi.', 'smile_v2/43.gif', 0, 0, 2, 0),
(44, 1, '.buba.', 'smile_v2/44.gif', 0, 0, 2, 0),
(45, 1, '.buba2.', 'smile_v2/45.gif', 0, 0, 2, 0),
(46, 1, '.budupozje.', 'smile_v2/46.gif', 0, 0, 2, 0),
(47, 1, '.caplin.', 'smile_v2/47.gif', 0, 0, 2, 0),
(48, 1, '.cegevara.', 'smile_v2/48.gif', 0, 0, 2, 0),
(49, 1, '.cempion.', 'smile_v2/49.gif', 0, 0, 2, 0),
(50, 1, '.cempion2.', 'smile_v2/50.gif', 0, 0, 2, 0),
(51, 1, '.coctail.', 'smile_v2/51.gif', 0, 0, 2, 0),
(52, 1, '.co&#351;boy.', 'smile_v2/52.gif', 0, 0, 2, 0),
(53, 1, '.cry2.', 'smile_v2/53.gif', 0, 0, 2, 0),
(54, 1, '.cukca.', 'smile_v2/54.gif', 0, 0, 2, 0),
(55, 1, '.cvetok.', 'smile_v2/55.gif', 0, 0, 2, 0),
(56, 1, '.ded.', 'smile_v2/56.gif', 0, 0, 2, 0),
(57, 1, '.devil.', 'smile_v2/57.gif', 0, 0, 2, 0),
(58, 1, '.devil2.', 'smile_v2/58.gif', 0, 0, 2, 0),
(59, 1, '.devil3.', 'smile_v2/59.gif', 0, 0, 2, 0),
(60, 1, '.dil.', 'smile_v2/60.gif', 0, 0, 2, 0),
(61, 1, '.dont.', 'smile_v2/61.gif', 0, 0, 2, 0),
(62, 1, '.dry.', 'smile_v2/62.gif', 0, 0, 2, 0),
(63, 1, '.ehh.', 'smile_v2/63.gif', 0, 0, 2, 0),
(64, 1, '.ejik.', 'smile_v2/64.gif', 0, 0, 2, 0),
(65, 1, '.elcal.', 'smile_v2/65.gif', 0, 0, 2, 0),
(66, 1, '.elfa.', 'smile_v2/66.gif', 0, 0, 2, 0),
(67, 1, '.evrey.', 'smile_v2/67.gif', 0, 0, 2, 0),
(68, 1, '.faraon.', 'smile_v2/68.gif', 0, 0, 2, 0),
(69, 1, '.goz.', 'smile_v2/69.gif', 0, 0, 2, 0),
(70, 1, '.hamam.', 'smile_v2/70.gif', 0, 0, 2, 0),
(71, 1, '.kapitan.', 'smile_v2/71.gif', 0, 0, 2, 0),
(72, 1, '.opdum.', 'smile_v2/72.gif', 0, 0, 2, 0),
(73, 1, '.oxlu.', 'smile_v2/73.gif', 0, 0, 2, 0),
(74, 1, '.pis.', 'smile_v2/74.gif', 0, 0, 2, 0),
(75, 1, '.pis2.', 'smile_v2/75.gif', 0, 0, 2, 0),
(76, 1, '.qarmon.', 'smile_v2/76.gif', 0, 0, 2, 0),
(77, 1, '.qiriqqelb.', 'smile_v2/77.gif', 0, 0, 2, 0),
(78, 1, '.qoca.', 'smile_v2/78.gif', 0, 0, 2, 0),
(79, 1, '.sirindecel.', 'smile_v2/79.gif', 0, 0, 2, 0),
(80, 1, '.sklet.', 'smile_v2/80.gif', 0, 0, 2, 0),
(81, 1, '.soska.', 'smile_v2/81.gif', 0, 0, 2, 0),
(82, 1, '.vur.', 'smile_v2/82.gif', 0, 0, 2, 0),
(83, 1, '.xixi.', 'smile_v2/83.gif', 0, 0, 2, 0),
(84, 1, '.xleb.', 'smile_v2/84.gif', 0, 0, 2, 0),
(85, 1, '.s1.', 'smile_v2/85.gif', 0, 0, 3, 0),
(86, 1, '.s2.', 'smile_v2/86.gif', 0, 0, 3, 0),
(87, 1, '.s3.', 'smile_v2/87.gif', 0, 0, 3, 0),
(88, 1, '.s4.', 'smile_v2/88.gif', 0, 0, 3, 0),
(89, 1, '.s5.', 'smile_v2/89.gif', 0, 0, 3, 0),
(90, 1, '.s6.', 'smile_v2/90.gif', 0, 0, 3, 0),
(91, 1, '.s7.', 'smile_v2/91.gif', 0, 0, 3, 0),
(92, 1, '.s8.', 'smile_v2/92.gif', 0, 0, 3, 0),
(93, 1, '.s9.', 'smile_v2/93.gif', 0, 0, 3, 0),
(94, 1, '.s10.', 'smile_v2/94.gif', 0, 0, 3, 0),
(95, 1, '.s11.', 'smile_v2/95.gif', 0, 0, 3, 0),
(96, 1, '.s12.', 'smile_v2/96.gif', 0, 0, 3, 0),
(97, 1, '.s13.', 'smile_v2/97.gif', 0, 0, 3, 0),
(98, 1, '.s14.', 'smile_v2/98.gif', 0, 0, 3, 0),
(99, 1, '.s15.', 'smile_v2/99.gif', 0, 0, 3, 0),
(100, 1, '.s16.', 'smile_v2/100.gif', 0, 0, 3, 0),
(101, 1, '.s17.', 'smile_v2/101.gif', 0, 0, 3, 0),
(102, 1, '.s18.', 'smile_v2/102.gif', 0, 0, 3, 0),
(103, 1, '.s19.', 'smile_v2/103.gif', 0, 0, 3, 0),
(104, 1, '.s20.', 'smile_v2/104.gif', 0, 0, 3, 0),
(105, 1, '.s21.', 'smile_v2/105.gif', 0, 0, 3, 0),
(106, 1, '.s22.', 'smile_v2/106.gif', 0, 0, 3, 0),
(107, 1, '.s23.', 'smile_v2/107.gif', 0, 0, 3, 0),
(108, 1, '.s24.', 'smile_v2/108.gif', 0, 0, 3, 0),
(109, 1, '.s25.', 'smile_v2/109.gif', 0, 0, 3, 0),
(110, 1, '.s26.', 'smile_v2/110.gif', 0, 0, 3, 0),
(111, 1, '.s27.', 'smile_v2/111.gif', 0, 0, 3, 0),
(112, 1, '.s28.', 'smile_v2/112.gif', 0, 0, 3, 0),
(113, 1, '.d1.', 'smile_v2/113.gif', 0, 0, 4, 0),
(114, 1, '.d2.', 'smile_v2/114.gif', 0, 0, 4, 0),
(115, 1, '.d3.', 'smile_v2/115.gif', 0, 0, 4, 0),
(116, 1, '.d4.', 'smile_v2/116.gif', 0, 0, 4, 0),
(117, 1, '.d5.', 'smile_v2/117.gif', 0, 0, 4, 0),
(118, 1, '.d6.', 'smile_v2/118.gif', 0, 0, 4, 0),
(119, 1, '.d7.', 'smile_v2/119.gif', 0, 0, 4, 0),
(120, 1, '.d8.', 'smile_v2/120.gif', 0, 0, 4, 0),
(121, 1, '.d9.', 'smile_v2/121.gif', 0, 0, 4, 0),
(122, 1, '.d10.', 'smile_v2/122.gif', 0, 0, 4, 0),
(123, 1, '.d11.', 'smile_v2/123.gif', 0, 0, 4, 0),
(124, 1, '.d12.', 'smile_v2/124.gif', 0, 0, 4, 0),
(125, 1, '.d13.', 'smile_v2/125.gif', 0, 0, 4, 0),
(126, 1, '.d14.', 'smile_v2/126.gif', 0, 0, 4, 0),
(127, 1, '.d15.', 'smile_v2/127.gif', 0, 0, 4, 0),
(128, 1, '.d16.', 'smile_v2/128.gif', 0, 0, 4, 0),
(129, 1, '.d17.', 'smile_v2/129.gif', 0, 0, 4, 0),
(130, 1, '.d18.', 'smile_v2/130.gif', 0, 0, 4, 0),
(131, 1, '.d19.', 'smile_v2/131.gif', 0, 0, 4, 0),
(132, 1, '.d20.', 'smile_v2/132.gif', 0, 0, 4, 0),
(133, 1, '.d21.', 'smile_v2/133.gif', 0, 0, 4, 0),
(134, 1, '.d22.', 'smile_v2/134.gif', 0, 0, 4, 0),
(135, 1, '.d23.', 'smile_v2/135.gif', 0, 0, 4, 0),
(136, 1, '.d24.', 'smile_v2/136.gif', 0, 0, 4, 0),
(137, 1, '.d25.', 'smile_v2/137.gif', 0, 0, 4, 0),
(138, 1, '.d26.', 'smile_v2/138.gif', 0, 0, 4, 0),
(139, 1, '.d27.', 'smile_v2/139.gif', 0, 0, 4, 0),
(140, 1, '.d28.', 'smile_v2/140.gif', 0, 0, 4, 0),
(141, 1, '.d29.', 'smile_v2/141.gif', 0, 0, 4, 0),
(142, 1, '.d30.', 'smile_v2/142.gif', 0, 0, 4, 0),
(143, 1, '.d31.', 'smile_v2/143.gif', 0, 0, 4, 0),
(144, 1, '.d32.', 'smile_v2/144.gif', 0, 0, 4, 0),
(145, 1, '.d33.', 'smile_v2/145.gif', 0, 0, 4, 0),
(146, 1, '.d34.', 'smile_v2/146.gif', 0, 0, 4, 0),
(147, 1, '.d35.', 'smile_v2/147.gif', 0, 0, 4, 0),
(148, 1, '.d36.', 'smile_v2/148.gif', 0, 0, 4, 0),
(149, 1, '.d37.', 'smile_v2/149.gif', 0, 0, 4, 0),
(150, 1, '.d38.', 'smile_v2/150.gif', 0, 0, 4, 0),
(151, 1, '.d39.', 'smile_v2/151.gif', 0, 0, 4, 0),
(152, 1, '.d40.', 'smile_v2/152.gif', 0, 0, 4, 0),
(153, 1, '.d41.', 'smile_v2/153.gif', 0, 0, 4, 0),
(154, 1, '.d42.', 'smile_v2/154.gif', 0, 0, 4, 0),
(155, 1, '.d43.', 'smile_v2/155.gif', 0, 0, 4, 0),
(156, 1, '.d44.', 'smile_v2/156.gif', 0, 0, 4, 0),
(157, 1, '.d45.', 'smile_v2/157.gif', 0, 0, 4, 0),
(158, 1, '.d46.', 'smile_v2/158.gif', 0, 0, 4, 0),
(159, 1, '.d47.', 'smile_v2/159.gif', 0, 0, 4, 0),
(160, 1, '.d48.', 'smile_v2/160.gif', 0, 0, 4, 0),
(161, 1, '.d49.', 'smile_v2/161.gif', 0, 0, 4, 0),
(162, 1, '.d50.', 'smile_v2/162.gif', 0, 0, 4, 0),
(163, 1, '.u1.', 'smile_v2/163.gif', 0, 0, 5, 0),
(164, 1, '.u2.', 'smile_v2/164.gif', 0, 0, 5, 0),
(165, 1, '.u3.', 'smile_v2/165.gif', 0, 0, 5, 0),
(166, 1, '.u4.', 'smile_v2/166.gif', 0, 0, 5, 0),
(167, 1, '.u5.', 'smile_v2/167.gif', 0, 0, 5, 0),
(168, 1, '.u6.', 'smile_v2/168.gif', 0, 0, 5, 0),
(169, 1, '.u7.', 'smile_v2/169.gif', 0, 0, 5, 0),
(170, 1, '.u8.', 'smile_v2/170.gif', 0, 0, 5, 0),
(171, 1, '.u9.', 'smile_v2/171.gif', 0, 0, 5, 0),
(172, 1, '.u10.', 'smile_v2/172.gif', 0, 0, 5, 0),
(173, 1, '.u11.', 'smile_v2/173.gif', 0, 0, 5, 0),
(174, 1, '.u12.', 'smile_v2/174.gif', 0, 0, 5, 0),
(175, 1, '.u13.', 'smile_v2/175.gif', 0, 0, 5, 0),
(176, 1, '.u16.', 'smile_v2/176.gif', 0, 0, 5, 0),
(177, 1, '.u18.', 'smile_v2/177.gif', 0, 0, 5, 0),
(178, 1, '.u19.', 'smile_v2/178.gif', 0, 0, 5, 0),
(179, 1, '.u20.', 'smile_v2/179.gif', 0, 0, 5, 0),
(180, 1, '.u21.', 'smile_v2/180.gif', 0, 0, 5, 0),
(181, 1, '.u22.', 'smile_v2/181.gif', 0, 0, 5, 0),
(182, 1, '.u23.', 'smile_v2/182.gif', 0, 0, 5, 0),
(183, 1, '.u24.', 'smile_v2/183.gif', 0, 0, 5, 0),
(184, 1, '.u25.', 'smile_v2/184.gif', 0, 0, 5, 0),
(185, 1, '.u26.', 'smile_v2/185.gif', 0, 0, 5, 0),
(186, 1, '.u27.', 'smile_v2/186.gif', 0, 0, 5, 0),
(187, 1, '.u28.', 'smile_v2/187.gif', 0, 0, 5, 0),
(188, 1, '.u29.', 'smile_v2/188.gif', 0, 0, 5, 0),
(189, 1, '.u30.', 'smile_v2/189.gif', 0, 0, 5, 0),
(190, 1, '.u31.', 'smile_v2/190.gif', 0, 0, 5, 0),
(191, 1, '.u32.', 'smile_v2/191.gif', 0, 0, 5, 0),
(192, 1, '.u33.', 'smile_v2/192.gif', 0, 0, 5, 0),
(193, 1, '.u34.', 'smile_v2/193.gif', 0, 0, 5, 0),
(194, 1, '.u35.', 'smile_v2/194.gif', 0, 0, 5, 0),
(195, 1, '.u36.', 'smile_v2/195.gif', 0, 0, 5, 0),
(196, 1, '.u37.', 'smile_v2/196.gif', 0, 0, 5, 0),
(197, 1, '.u38.', 'smile_v2/197.gif', 0, 0, 5, 0),
(198, 1, '.u39.', 'smile_v2/198.gif', 0, 0, 5, 0),
(199, 1, '.u40.', 'smile_v2/199.gif', 0, 0, 5, 0),
(200, 1, '.u41.', 'smile_v2/200.gif', 0, 0, 5, 0),
(201, 1, '.u42.', 'smile_v2/201.gif', 0, 0, 5, 0),
(202, 1, '.u45.', 'smile_v2/202.gif', 0, 0, 5, 0),
(203, 1, '.u46.', 'smile_v2/203.gif', 0, 0, 5, 0),
(204, 1, '.u47.', 'smile_v2/204.gif', 0, 0, 5, 0),
(205, 1, '.u48.', 'smile_v2/205.gif', 0, 0, 5, 0),
(206, 1, '.u49.', 'smile_v2/206.gif', 0, 0, 5, 0),
(207, 1, '.u50.', 'smile_v2/207.gif', 0, 0, 5, 0),
(208, 1, '.u51.', 'smile_v2/208.gif', 0, 0, 5, 0),
(209, 1, '.u52.', 'smile_v2/209.gif', 0, 0, 5, 0),
(210, 1, '.u53.', 'smile_v2/210.gif', 0, 0, 5, 0),
(211, 1, '.u54.', 'smile_v2/211.gif', 0, 0, 5, 0),
(212, 1, '.u55.', 'smile_v2/212.gif', 0, 0, 5, 0),
(213, 1, '.u56.', 'smile_v2/213.gif', 0, 0, 5, 0),
(214, 1, '.i.', 'smile_v2/214.gif', 0, 0, 6, 0),
(215, 1, '.i1.', 'smile_v2/215.gif', 0, 0, 6, 0),
(216, 1, '.i2.', 'smile_v2/216.gif', 0, 0, 6, 0),
(217, 1, '.i3.', 'smile_v2/217.gif', 0, 0, 6, 0),
(218, 1, '.i4.', 'smile_v2/218.gif', 0, 0, 6, 0),
(219, 1, '.i5.', 'smile_v2/219.gif', 0, 0, 6, 0),
(220, 1, '.i6.', 'smile_v2/220.gif', 0, 0, 6, 0),
(221, 1, '.i7.', 'smile_v2/221.gif', 0, 0, 6, 0),
(222, 1, '.i8.', 'smile_v2/222.gif', 0, 0, 6, 0),
(223, 1, '.i9.', 'smile_v2/223.gif', 0, 0, 6, 0),
(224, 1, '.i10.', 'smile_v2/224.gif', 0, 0, 6, 0),
(225, 1, '.i11.', 'smile_v2/225.gif', 0, 0, 6, 0),
(226, 1, '.i12.', 'smile_v2/226.gif', 0, 0, 6, 0),
(227, 1, '.i13.', 'smile_v2/227.gif', 0, 0, 6, 0),
(228, 1, '.i14.', 'smile_v2/228.gif', 0, 0, 6, 0),
(229, 1, '.i15.', 'smile_v2/229.gif', 0, 0, 6, 0),
(230, 1, '.i16.', 'smile_v2/230.gif', 0, 0, 6, 0),
(231, 1, '.i17.', 'smile_v2/231.gif', 0, 0, 6, 0),
(232, 1, '.i18.', 'smile_v2/232.gif', 0, 0, 6, 0),
(233, 1, '.i19.', 'smile_v2/233.gif', 0, 0, 6, 0),
(234, 1, '.i20.', 'smile_v2/234.gif', 0, 0, 6, 0),
(235, 1, '.i21.', 'smile_v2/235.gif', 0, 0, 6, 0),
(236, 1, '.i22.', 'smile_v2/236.gif', 0, 0, 6, 0),
(237, 1, '.i23.', 'smile_v2/237.gif', 0, 0, 6, 0),
(238, 1, '.i24.', 'smile_v2/238.gif', 0, 0, 6, 0),
(239, 1, '.i25.', 'smile_v2/239.gif', 0, 0, 6, 0),
(240, 1, '.i26.', 'smile_v2/240.gif', 0, 0, 6, 0),
(241, 1, '.i27.', 'smile_v2/241.gif', 0, 0, 6, 0),
(242, 1, '.i28.', 'smile_v2/242.gif', 0, 0, 6, 0),
(243, 1, '.i29.', 'smile_v2/243.gif', 0, 0, 6, 0),
(244, 1, '.i30.', 'smile_v2/244.gif', 0, 0, 6, 0),
(249, 1, '.h1.', 'smile_v2/245.gif', 0, 0, 7, 0),
(250, 1, '.h2.', 'smile_v2/250.gif', 0, 0, 7, 0),
(251, 1, '.h3.', 'smile_v2/251.gif', 0, 0, 7, 0),
(252, 1, '.h4.', 'smile_v2/252.gif', 0, 0, 7, 0),
(253, 1, '.h5.', 'smile_v2/253.gif', 0, 0, 7, 0),
(254, 1, '.h6.', 'smile_v2/254.gif', 0, 0, 7, 0),
(255, 1, '.h7.', 'smile_v2/255.gif', 0, 0, 7, 0),
(256, 1, '.h8.', 'smile_v2/256.gif', 0, 0, 7, 0),
(257, 1, '.h9.', 'smile_v2/257.gif', 0, 0, 7, 0),
(258, 1, '.h10.', 'smile_v2/258.gif', 0, 0, 7, 0),
(259, 1, '.h11.', 'smile_v2/259.gif', 0, 0, 7, 0),
(260, 1, '.h12.', 'smile_v2/260.gif', 0, 0, 7, 0),
(261, 1, '.h13.', 'smile_v2/261.gif', 0, 0, 7, 0),
(262, 1, '.h14.', 'smile_v2/262.gif', 0, 0, 7, 0),
(263, 1, '.h15.', 'smile_v2/263.gif', 0, 0, 7, 0),
(264, 1, '.h16.', 'smile_v2/264.gif', 0, 0, 7, 0),
(265, 1, '.h17.', 'smile_v2/265.gif', 0, 0, 7, 0),
(266, 1, '.h18.', 'smile_v2/266.gif', 0, 0, 7, 0),
(267, 1, '.h19.', 'smile_v2/267.gif', 0, 0, 7, 0),
(268, 1, '.o1.', 'smile_v2/268.gif', 0, 0, 8, 0),
(269, 1, '.o2.', 'smile_v2/269.gif', 0, 0, 8, 0),
(270, 1, '.o3.', 'smile_v2/270.gif', 0, 0, 8, 0),
(271, 1, '.o4.', 'smile_v2/271.gif', 0, 0, 8, 0),
(272, 1, '.o5.', 'smile_v2/272.gif', 0, 0, 8, 0),
(273, 1, '.o6.', 'smile_v2/273.gif', 0, 0, 8, 0),
(274, 1, '.o7.', 'smile_v2/274.gif', 0, 0, 8, 0),
(275, 1, '.o8.', 'smile_v2/275.gif', 0, 0, 8, 0),
(276, 1, '.o9.', 'smile_v2/276.gif', 0, 0, 8, 0),
(277, 1, '.o10.', 'smile_v2/277.gif', 0, 0, 8, 0),
(278, 1, '.o11.', 'smile_v2/278.gif', 0, 0, 8, 0),
(279, 1, '.o12.', 'smile_v2/279.gif', 0, 0, 8, 0),
(280, 1, '.o13.', 'smile_v2/280.gif', 0, 0, 8, 0),
(281, 1, '.o14.', 'smile_v2/281.gif', 0, 0, 8, 0),
(282, 1, '.o15.', 'smile_v2/282.gif', 0, 0, 8, 0),
(283, 1, '.o16.', 'smile_v2/283.gif', 0, 0, 8, 0),
(284, 1, '.o17.', 'smile_v2/284.gif', 0, 0, 8, 0),
(285, 1, '.g1.', 'smile_v2/285.gif', 0, 0, 9, 0),
(286, 1, '.g2.', 'smile_v2/286.gif', 0, 0, 9, 0),
(287, 1, '.g3.', 'smile_v2/287.gif', 0, 0, 9, 0),
(288, 1, '.g4.', 'smile_v2/288.gif', 0, 0, 9, 0),
(289, 1, '.g5.', 'smile_v2/289.gif', 0, 0, 9, 0),
(290, 1, '.g6.', 'smile_v2/290.gif', 0, 0, 9, 0),
(291, 1, '.g7.', 'smile_v2/291.gif', 0, 0, 9, 0),
(292, 1, '.g8.', 'smile_v2/292.gif', 0, 0, 9, 0),
(293, 1, '.g9.', 'smile_v2/293.gif', 0, 0, 9, 0),
(294, 1, '.g10.', 'smile_v2/294.gif', 0, 0, 9, 0),
(295, 1, '.g11.', 'smile_v2/295.gif', 0, 0, 9, 0),
(296, 1, '.g12.', 'smile_v2/296.gif', 0, 0, 9, 0),
(297, 1, '.g13.', 'smile_v2/297.gif', 0, 0, 9, 0),
(298, 1, '.g14.', 'smile_v2/298.gif', 0, 0, 9, 0),
(299, 1, '.g15.', 'smile_v2/299.gif', 0, 0, 9, 0),
(300, 1, '.a1.', 'smile_v2/300.gif', 0, 0, 10, 0),
(301, 1, '.a2.', 'smile_v2/301.gif', 0, 0, 10, 0),
(302, 1, '.a3.', 'smile_v2/302.gif', 0, 0, 10, 0),
(303, 1, '.a4.', 'smile_v2/303.gif', 0, 0, 10, 0),
(304, 1, '.a5.', 'smile_v2/304.gif', 0, 0, 10, 0),
(305, 1, '.a6.', 'smile_v2/305.gif', 0, 0, 10, 0),
(306, 1, '.a7.', 'smile_v2/306.gif', 0, 0, 10, 0),
(307, 1, '.a8.', 'smile_v2/307.gif', 0, 0, 10, 0),
(308, 1, '.a9.', 'smile_v2/308.gif', 0, 0, 10, 0),
(309, 1, '.a10.', 'smile_v2/309.gif', 0, 0, 10, 0),
(310, 1, '.a11.', 'smile_v2/310.gif', 0, 0, 10, 0),
(311, 1, '.a12.', 'smile_v2/311.gif', 0, 0, 10, 0),
(312, 1, '.a13.', 'smile_v2/312.gif', 0, 0, 10, 0),
(313, 1, '.novruz.', 'smile_v2/313.gif', 0, 0, 11, 0),
(314, 1, '.qogal.', 'smile_v2/314.gif', 0, 0, 11, 0),
(315, 1, '.semeni.', 'smile_v2/315.gif', 0, 0, 11, 0),
(316, 1, '.papaq1.', 'smile_v2/316.gif', 0, 0, 11, 0),
(317, 1, '.papaq2.', 'smile_v2/317.gif', 0, 0, 11, 0),
(318, 1, '.papaq3.', 'smile_v2/318.gif', 0, 0, 11, 0),
(319, 1, '.papaq4.', 'smile_v2/319.gif', 0, 0, 11, 0),
(320, 1, '.papaq5.', 'smile_v2/320.gif', 0, 0, 11, 0),
(321, 1, '.papaq6.', 'smile_v2/321.gif', 0, 0, 11, 0),
(322, 1, '.papaq7.', 'smile_v2/322.gif', 0, 0, 11, 0),
(323, 1, '.papaq8.', 'smile_v2/323.gif', 0, 0, 11, 0),
(324, 1, '.papaq9.', 'smile_v2/324.gif', 0, 0, 11, 0),
(325, 1, '.papaq10.', 'smile_v2/325.gif', 0, 0, 11, 0),
(326, 1, '.m1.', 'smile_v2/326.gif', 0, 0, 12, 0),
(327, 1, '.m2.', 'smile_v2/327.gif', 0, 0, 12, 0),
(328, 1, '.m3.', 'smile_v2/328.gif', 0, 0, 12, 0),
(329, 1, '.m4.', 'smile_v2/329.gif', 0, 0, 12, 0),
(330, 1, '.m5.', 'smile_v2/330.gif', 0, 0, 12, 0),
(331, 1, '.m6.', 'smile_v2/331.gif', 0, 0, 12, 0),
(332, 1, '.m7.', 'smile_v2/332.gif', 0, 0, 12, 0),
(333, 1, '.m8.', 'smile_v2/333.gif', 0, 0, 12, 0),
(334, 1, '.m9.', 'smile_v2/334.gif', 0, 0, 12, 0),
(335, 1, '.m10.', 'smile_v2/335.gif', 0, 0, 12, 0),
(336, 1, '.m11.', 'smile_v2/336.gif', 0, 0, 12, 0),
(337, 1, '.m12.', 'smile_v2/337.gif', 0, 0, 12, 0),
(338, 1, '.m13.', 'smile_v2/338.gif', 0, 0, 12, 0),
(339, 1, '.m14.', 'smile_v2/339.gif', 0, 0, 12, 0),
(340, 1, '.m15.', 'smile_v2/340.gif', 0, 0, 12, 0),
(341, 1, '.k1.', 'smile_v2/341.gif', 0, 0, 13, 0),
(342, 1, '.k2.', 'smile_v2/342.gif', 0, 0, 13, 0),
(343, 1, '.k3.', 'smile_v2/343.gif', 0, 0, 13, 0),
(344, 1, '.k4.', 'smile_v2/344.gif', 0, 0, 13, 0),
(345, 1, '.k5.', 'smile_v2/345.gif', 0, 0, 13, 0),
(346, 1, '.k6.', 'smile_v2/346.gif', 0, 0, 13, 0),
(347, 1, '.k7.', 'smile_v2/347.gif', 0, 0, 13, 0),
(348, 1, '.k8.', 'smile_v2/348.gif', 0, 0, 13, 0),
(349, 1, '.k9.', 'smile_v2/349.gif', 0, 0, 13, 0),
(350, 1, '.k10.', 'smile_v2/350.gif', 0, 0, 13, 0),
(351, 1, '.k11.', 'smile_v2/351.gif', 0, 0, 13, 0),
(352, 1, '.av1.', 'smile_v2/352.gif', 0, 0, 14, 0),
(353, 1, '.av2.', 'smile_v2/353.gif', 0, 0, 14, 0),
(354, 1, '.av3.', 'smile_v2/354.gif', 0, 0, 14, 0),
(355, 1, '.av4.', 'smile_v2/355.gif', 0, 0, 14, 0),
(356, 1, '.av5.', 'smile_v2/356.gif', 0, 0, 14, 0),
(357, 1, '.av6.', 'smile_v2/357.gif', 0, 0, 14, 0),
(358, 1, '.av7.', 'smile_v2/358.gif', 0, 0, 14, 0),
(359, 1, '.av8.', 'smile_v2/359.gif', 0, 0, 14, 0),
(360, 1, '.av9.', 'smile_v2/360.gif', 0, 0, 14, 0),
(361, 1, '.av10.', 'smile_v2/361.gif', 0, 0, 14, 0),
(362, 1, '.av11.', 'smile_v2/362.gif', 0, 0, 14, 0),
(363, 1, '.av12.', 'smile_v2/363.gif', 0, 0, 14, 0),
(364, 1, '.av13.', 'smile_v2/364.gif', 0, 0, 14, 0),
(365, 1, '.y1.', 'smile_v2/365.gif', 0, 0, 15, 0),
(366, 1, '.y2.', 'smile_v2/366.gif', 0, 0, 15, 0),
(367, 1, '.y3.', 'smile_v2/367.gif', 0, 0, 15, 0),
(368, 1, '.y4.', 'smile_v2/368.gif', 0, 0, 15, 0),
(369, 1, '.y5.', 'smile_v2/369.gif', 0, 0, 15, 0),
(370, 1, '.y6.', 'smile_v2/370.gif', 0, 0, 15, 0),
(371, 1, '.y7.', 'smile_v2/371.gif', 0, 0, 15, 0),
(372, 1, '.y8.', 'smile_v2/372.gif', 0, 0, 15, 0),
(373, 1, '.y9.', 'smile_v2/373.gif', 0, 0, 15, 0),
(374, 1, '.e1.', 'smile_v2/374.gif', 0, 0, 16, 0),
(375, 1, '.e2.', 'smile_v2/375.gif', 0, 0, 16, 0),
(376, 1, '.e3.', 'smile_v2/376.gif', 0, 0, 16, 0),
(377, 1, '.e4.', 'smile_v2/377.gif', 0, 0, 16, 0),
(378, 1, '.e5.', 'smile_v2/378.gif', 0, 0, 16, 0),
(379, 1, '.e6.', 'smile_v2/379.gif', 0, 0, 16, 0),
(380, 1, '.e7.', 'smile_v2/380.gif', 0, 0, 16, 0),
(381, 1, '.e8.', 'smile_v2/381.gif', 0, 0, 16, 0),
(382, 1, '.ut1.', 'smile_v2/382.gif', 0, 0, 16, 0),
(383, 1, '.ut2.', 'smile_v2/383.gif', 0, 0, 16, 0),
(384, 1, '.ut3.', 'smile_v2/384.gif', 0, 0, 16, 0),
(385, 1, '.ut4.', 'smile_v2/385.gif', 0, 0, 16, 0),
(386, 1, '.ut5.', 'smile_v2/386.gif', 0, 0, 16, 0),
(387, 1, '.g16.', 'smile_v2/387.gif', 0, 0, 9, 0),
(388, 1, '.g17.', 'smile_v2/388.gif', 0, 0, 9, 0),
(389, 1, '.g18.', 'smile_v2/389.gif', 0, 0, 9, 0),
(390, 1, '.cry3.', 'smile_v2/390.gif', 0, 0, 10, 0),
(391, 1, '.test.', 'smile_v2/391.gif', 0, 0, 2, 0),
(393, 1, '.ks1.', 'smile_v2/392.gif', 0, 0, 17, 0),
(394, 1, '.ks2.', 'smile_v2/394.gif', 0, 0, 17, 0),
(395, 1, '.ks3.', 'smile_v2/395.gif', 0, 0, 17, 0),
(396, 1, '.ks4.', 'smile_v2/396.gif', 0, 0, 17, 0),
(397, 1, '.ks5.', 'smile_v2/397.gif', 0, 0, 17, 0),
(398, 1, '.ks6.', 'smile_v2/398.gif', 0, 0, 17, 0),
(399, 1, '.ks7.', 'smile_v2/399.gif', 0, 0, 17, 0),
(400, 1, '.ks8.', 'smile_v2/400.gif', 0, 0, 17, 0),
(401, 1, '.ks9.', 'smile_v2/401.gif', 0, 0, 17, 0),
(402, 1, '.ks10.', 'smile_v2/402.gif', 0, 0, 17, 0),
(403, 1, '.ks11.', 'smile_v2/403.gif', 0, 0, 17, 0),
(404, 1, '.ks12.', 'smile_v2/404.gif', 0, 0, 17, 0),
(405, 1, '.ks13.', 'smile_v2/405.gif', 0, 0, 17, 0),
(406, 1, '.ks14.', 'smile_v2/406.gif', 0, 0, 17, 0),
(407, 1, '.ks15.', 'smile_v2/407.gif', 0, 0, 17, 0),
(408, 1, '.ks16.', 'smile_v2/408.gif', 0, 0, 17, 0),
(409, 1, '.ks17.', 'smile_v2/409.gif', 0, 0, 17, 0),
(410, 1, '.ks18.', 'smile_v2/410.gif', 0, 0, 17, 0),
(411, 1, '.ks19.', 'smile_v2/411.gif', 0, 0, 17, 0),
(412, 1, '.ks20.', 'smile_v2/412.gif', 0, 0, 17, 0),
(413, 1, '.ks21.', 'smile_v2/413.gif', 0, 0, 17, 0),
(414, 1, '.ks22.', 'smile_v2/414.gif', 0, 0, 17, 0),
(415, 1, '.ks23.', 'smile_v2/415.gif', 0, 0, 17, 0),
(416, 1, '.ks24.', 'smile_v2/416.gif', 0, 0, 17, 0),
(417, 1, '.ks25.', 'smile_v2/417.gif', 0, 0, 17, 0),
(418, 1, '.ks26.', 'smile_v2/418.gif', 0, 0, 17, 0),
(419, 1, '.ks27.', 'smile_v2/419.gif', 0, 0, 17, 0),
(420, 1, '.ks28.', 'smile_v2/420.gif', 0, 0, 17, 0),
(421, 1, '.ks29.', 'smile_v2/421.gif', 0, 0, 17, 0),
(422, 1, '.ks30.', 'smile_v2/422.gif', 0, 0, 17, 0),
(423, 1, '.ks31.', 'smile_v2/423.gif', 0, 0, 17, 0),
(424, 1, '.ks32.', 'smile_v2/424.gif', 0, 0, 17, 0),
(425, 1, '.ks33.', 'smile_v2/425.gif', 0, 0, 17, 0),
(426, 1, '.ks34.', 'smile_v2/426.gif', 0, 0, 17, 0),
(427, 1, '.ks35.', 'smile_v2/427.gif', 0, 0, 17, 0),
(428, 1, '.ks36.', 'smile_v2/428.gif', 0, 0, 17, 0),
(429, 1, '.ks37.', 'smile_v2/429.gif', 0, 0, 17, 0),
(430, 1, '.ks38.', 'smile_v2/430.gif', 0, 0, 17, 0),
(431, 1, '.ks39.', 'smile_v2/431.gif', 0, 0, 17, 0),
(432, 1, '.ks40.', 'smile_v2/432.gif', 0, 0, 17, 0),
(433, 1, '.ks41.', 'smile_v2/433.gif', 0, 0, 17, 0),
(434, 1, '.ks42.', 'smile_v2/434.gif', 0, 0, 17, 0),
(435, 1, '.ks43.', 'smile_v2/435.gif', 0, 0, 17, 0),
(436, 1, '.ks44.', 'smile_v2/436.gif', 0, 0, 17, 0),
(437, 1, '.ks45.', 'smile_v2/437.gif', 0, 0, 17, 0),
(438, 1, '.ks46.', 'smile_v2/438.gif', 0, 0, 17, 0),
(439, 1, '.ks47.', 'smile_v2/439.gif', 0, 0, 17, 0),
(440, 1, '.ks48.', 'smile_v2/440.gif', 0, 0, 17, 0),
(441, 1, '.ks49.', 'smile_v2/441.gif', 0, 0, 17, 0),
(442, 1, '.ks50.', 'smile_v2/442.gif', 0, 0, 17, 0),
(443, 1, '.ks51.', 'smile_v2/443.gif', 0, 0, 17, 0),
(444, 1, '.ks52.', 'smile_v2/444.gif', 0, 0, 17, 0),
(445, 1, '.ks53.', 'smile_v2/445.gif', 0, 0, 17, 0),
(447, 1, '.ks54.', 'smile_v2/446.gif', 0, 0, 17, 0),
(448, 1, '.ks55.', 'smile_v2/448.gif', 0, 0, 17, 0),
(449, 1, '.ks56.', 'smile_v2/449.gif', 0, 0, 17, 0),
(450, 1, '.ks57.', 'smile_v2/450.gif', 0, 0, 17, 0),
(451, 1, '.ks58.', 'smile_v2/451.gif', 0, 0, 17, 0),
(452, 1, '.ks59.', 'smile_v2/452.gif', 0, 0, 17, 0),
(453, 1, '.ks60.', 'smile_v2/453.gif', 0, 0, 17, 0),
(454, 1, '.ks61.', 'smile_v2/454.gif', 0, 0, 17, 0),
(455, 1, '.ks62.', 'smile_v2/455.gif', 0, 0, 17, 0),
(456, 1, '.ks63.', 'smile_v2/456.gif', 0, 0, 17, 0),
(457, 1, '.ks64.', 'smile_v2/457.gif', 0, 0, 17, 0),
(458, 1, '.ks65.', 'smile_v2/458.gif', 0, 0, 17, 0),
(459, 1, '.ks66.', 'smile_v2/459.gif', 0, 0, 17, 0),
(460, 1, '.ks67.', 'smile_v2/460.gif', 0, 0, 17, 0),
(461, 1, '.ks68.', 'smile_v2/461.gif', 0, 0, 17, 0),
(462, 1, '.ks69.', 'smile_v2/462.gif', 0, 0, 17, 0),
(463, 1, '.ks70.', 'smile_v2/463.gif', 0, 0, 17, 0),
(464, 1, '.ks71.', 'smile_v2/464.gif', 0, 0, 17, 0),
(465, 1, '.ks72.', 'smile_v2/465.gif', 0, 0, 17, 0),
(466, 1, '.ks73.', 'smile_v2/466.gif', 0, 0, 17, 0),
(467, 1, '.ks74.', 'smile_v2/467.gif', 0, 0, 17, 0),
(468, 1, '.ks75.', 'smile_v2/468.gif', 0, 0, 17, 0),
(469, 1, '.ks76.', 'smile_v2/469.gif', 0, 0, 17, 0),
(470, 1, '.ks77.', 'smile_v2/470.gif', 0, 0, 17, 0),
(471, 1, '.ks78.', 'smile_v2/471.gif', 0, 0, 17, 0),
(472, 1, '.ks79.', 'smile_v2/472.gif', 0, 0, 17, 0),
(473, 1, '.ks80.', 'smile_v2/473.gif', 0, 0, 17, 0),
(474, 1, '.ks81.', 'smile_v2/474.gif', 0, 0, 17, 0),
(475, 1, '.ks82.', 'smile_v2/475.gif', 0, 0, 17, 0),
(476, 1, '.ks83.', 'smile_v2/476.gif', 0, 0, 17, 0),
(477, 1, '.ks84.', 'smile_v2/477.gif', 0, 0, 17, 0),
(478, 1, '.ks85.', 'smile_v2/478.gif', 0, 0, 17, 0),
(479, 1, '.ks86.', 'smile_v2/479.gif', 0, 0, 17, 0),
(480, 1, '.ks87.', 'smile_v2/480.gif', 0, 0, 17, 0),
(481, 1, '.ks88.', 'smile_v2/481.gif', 0, 0, 17, 0),
(482, 1, '.ks89.', 'smile_v2/482.gif', 0, 0, 17, 0),
(483, 1, '.ks90.', 'smile_v2/483.gif', 0, 0, 17, 0),
(484, 1, '.ks91.', 'smile_v2/484.gif', 0, 0, 17, 0),
(485, 1, '.ks92.', 'smile_v2/485.gif', 0, 0, 17, 0),
(486, 1, '.ks93.', 'smile_v2/486.gif', 0, 0, 17, 0),
(487, 1, '.ks94.', 'smile_v2/487.gif', 0, 0, 17, 0),
(488, 1, '.ks95.', 'smile_v2/488.gif', 0, 0, 17, 0),
(489, 1, '.ks96.', 'smile_v2/489.gif', 0, 0, 17, 0),
(490, 1, '.ks97.', 'smile_v2/490.gif', 0, 0, 17, 0),
(491, 1, '.ks98.', 'smile_v2/491.gif', 0, 0, 17, 0),
(492, 1, '.ks99.', 'smile_v2/492.gif', 0, 0, 17, 0),
(493, 1, '.ks100.', 'smile_v2/493.gif', 0, 0, 17, 0),
(494, 1, '.ks101.', 'smile_v2/494.gif', 0, 0, 17, 0),
(495, 1, '.ks102.', 'smile_v2/495.gif', 0, 0, 17, 0),
(496, 1, '.ks103.', 'smile_v2/496.gif', 0, 0, 17, 0),
(497, 1, '.ks104.', 'smile_v2/497.gif', 0, 0, 17, 0),
(498, 1, '.ks105.', 'smile_v2/498.gif', 0, 0, 17, 0),
(499, 1, '.ks106.', 'smile_v2/499.gif', 0, 0, 17, 0),
(500, 1, '.ks107.', 'smile_v2/500.gif', 0, 0, 17, 0),
(501, 1, '.ks108.', 'smile_v2/501.gif', 0, 0, 17, 0),
(502, 1, '.ks109.', 'smile_v2/502.gif', 0, 0, 17, 0),
(503, 1, '.ks110.', 'smile_v2/503.gif', 0, 0, 17, 0),
(504, 1, '.ks111.', 'smile_v2/504.gif', 0, 0, 17, 0),
(505, 1, '.ks112.', 'smile_v2/505.gif', 0, 0, 17, 0),
(506, 1, '.ks113.', 'smile_v2/506.gif', 0, 0, 17, 0),
(507, 1, '.ks114.', 'smile_v2/507.gif', 0, 0, 17, 0),
(508, 1, '.ks115.', 'smile_v2/508.gif', 0, 0, 17, 0),
(509, 1, '.ks116.', 'smile_v2/509.gif', 0, 0, 17, 0),
(510, 1, '.ks117.', 'smile_v2/510.gif', 0, 0, 17, 0),
(511, 1, '.ks118.', 'smile_v2/511.gif', 0, 0, 17, 0),
(512, 1, '.ks119.', 'smile_v2/512.gif', 0, 0, 17, 0),
(513, 1, '.ks120.', 'smile_v2/513.gif', 0, 0, 17, 0),
(514, 1, '.ks121.', 'smile_v2/514.gif', 0, 0, 17, 0),
(515, 1, '.ks122.', 'smile_v2/515.gif', 0, 0, 17, 0),
(516, 1, '.ks123.', 'smile_v2/516.gif', 0, 0, 17, 0),
(517, 1, '.ks124.', 'smile_v2/517.gif', 0, 0, 17, 0),
(518, 1, '.ks125.', 'smile_v2/518.gif', 0, 0, 17, 0),
(519, 1, '.ks126.', 'smile_v2/519.gif', 0, 0, 17, 0),
(520, 1, '.ks127.', 'smile_v2/520.gif', 0, 0, 17, 0),
(521, 1, '.ks128.', 'smile_v2/521.gif', 0, 0, 17, 0),
(522, 1, '.ks129.', 'smile_v2/522.gif', 0, 0, 17, 0),
(523, 1, '.ks130.', 'smile_v2/523.gif', 0, 0, 17, 0),
(524, 1, '.ks131.', 'smile_v2/524.gif', 0, 0, 17, 0),
(525, 1, '.ks132.', 'smile_v2/525.gif', 0, 0, 17, 0),
(526, 1, '.ks133.', 'smile_v2/526.gif', 0, 0, 17, 0),
(527, 1, '.ks134.', 'smile_v2/527.gif', 0, 0, 17, 0),
(528, 1, '.ks135.', 'smile_v2/528.gif', 0, 0, 17, 0),
(529, 1, '.ks136.', 'smile_v2/529.gif', 0, 0, 17, 0),
(530, 1, '.ks137.', 'smile_v2/530.gif', 0, 0, 17, 0),
(531, 1, '.ks138.', 'smile_v2/531.gif', 0, 0, 17, 0),
(532, 1, '.ks139.', 'smile_v2/532.gif', 0, 0, 17, 0),
(533, 1, '.ks140.', 'smile_v2/533.gif', 0, 0, 17, 0),
(564, 1, '.ks155.', 'smile_v2/564.gif', 0, 0, 17, 0),
(563, 1, '.ks154.', 'smile_v2/563.gif', 0, 0, 17, 0),
(562, 1, '.ks153.', 'smile_v2/562.gif', 0, 0, 17, 0),
(561, 1, '.ks152.', 'smile_v2/561.gif', 0, 0, 17, 0),
(560, 1, '.ks151.', 'smile_v2/560.gif', 0, 0, 17, 0),
(559, 1, '.ks150.', 'smile_v2/559.gif', 0, 0, 17, 0),
(558, 1, '.ks149.', 'smile_v2/558.gif', 0, 0, 17, 0),
(557, 1, '.ks148.', 'smile_v2/557.gif', 0, 0, 17, 0),
(556, 1, '.ks147.', 'smile_v2/556.gif', 0, 0, 17, 0),
(555, 1, '.ks146.', 'smile_v2/555.gif', 0, 0, 17, 0),
(554, 1, '.ks145.', 'smile_v2/554.gif', 0, 0, 17, 0),
(553, 1, '.ks144.', 'smile_v2/553.gif', 0, 0, 17, 0),
(552, 1, '.ks143.', 'smile_v2/552.gif', 0, 0, 17, 0),
(551, 1, '.ks142.', 'smile_v2/551.gif', 0, 0, 17, 0),
(565, 1, '.ks141.', 'smile_v2/565.gif', 0, 0, 17, 0);

-- --------------------------------------------------------

--
-- Table structure for table `smiles_cat`
--

CREATE TABLE IF NOT EXISTS `smiles_cat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `posts` int(11) NOT NULL DEFAULT '0',
  `order` int(6) NOT NULL DEFAULT '0',
  `line` int(1) NOT NULL DEFAULT '1',
  `count` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `smiles_cat`
--

INSERT INTO `smiles_cat` (`id`, `name`, `posts`, `order`, `line`, `count`) VALUES
(2, 'Umumi ve Qarisiqq', 0, 1, 1, 85),
(3, 'Sevgi ve Urekler', 0, 2, 1, 28),
(4, 'Doyu&#351; ve Muharibe', 0, 3, 1, 50),
(5, 'Yeni ve Maraqli', 0, 4, 1, 51),
(6, 'Her Nov idman', 0, 5, 1, 31),
(7, 'Hirsli ve Esebi', 0, 6, 1, 19),
(8, 'Opu&#351; ve Dodaqlar', 0, 7, 1, 17),
(9, 'Gulmek ve Zarafatlar', 0, 8, 1, 18),
(10, 'Aglamaq ve Kovrelmek', 0, 9, 1, 14),
(11, 'Novruzda Papaq Atdi', 0, 10, 1, 13),
(12, 'Musiqi ve Reqs', 0, 11, 1, 15),
(13, 'Krutoy Oglanlar', 0, 12, 1, 11),
(14, 'Avto ve Moto', 0, 13, 1, 13),
(15, 'Yatmaq ve Yuxu', 0, 14, 1, 9),
(16, 'Etiraz ve Utanmaq', 0, 15, 1, 13),
(17, 'vhatapps', 0, 16, 1, 155);

-- --------------------------------------------------------

--
-- Table structure for table `status_beyen`
--

CREATE TABLE IF NOT EXISTS `status_beyen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `like_uid` int(11) NOT NULL,
  `like` int(11) NOT NULL DEFAULT '0',
  `like_us` varchar(50) CHARACTER SET cp1251 COLLATE cp1251_bin DEFAULT NULL,
  `tarix` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `status_beyen`
--


-- --------------------------------------------------------

--
-- Table structure for table `status_fikir`
--

CREATE TABLE IF NOT EXISTS `status_fikir` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `muellif` int(11) NOT NULL,
  `vaxt` int(11) NOT NULL,
  `fikir` varchar(210) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `reng` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `status_fikir`
--

INSERT INTO `status_fikir` (`id`, `uid`, `muellif`, `vaxt`, `fikir`, `reng`) VALUES
(1, 508, 508, 1680738061, '508', '');

-- --------------------------------------------------------

--
-- Table structure for table `sual`
--

CREATE TABLE IF NOT EXISTS `sual` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sual` text CHARACTER SET cp1251 NOT NULL,
  `a` blob NOT NULL,
  `b` blob NOT NULL,
  `c` blob NOT NULL,
  `d` blob NOT NULL,
  `answer` text NOT NULL,
  `n` int(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=88 ;

--
-- Dumping data for table `sual`
--

INSERT INTO `sual` (`id`, `sual`, `a`, `b`, `c`, `d`, `answer`, `n`) VALUES
(2, 'Azerbaycan Sefeviler dovleti nevaxt yaranib', 0x31353031, 0x31373336, 0x31343138, 0x31363030, 'a', 0),
(3, 'Robot sozunu ilk kim fikirlewib', 0x536579626c, 0x55676f20566574657265, 0x4b6172656c20436170656b, 0x4c617272792050616765, 'c', 1),
(4, 'Robot sozu hansi sozden yaradilib', 0x4c6f626172, 0x4c61626f72, 0x526f626f72, 0x5269626172, 'b', 1),
(5, 'Hansi quwlar ucuw zamani yata bilirler', 0x4c65796c656b6c6572, 0x53657263656c6572, 0x51617a6c6172, 0x516172616e7175776c6172, 'a', 1),
(6, 'Hansi dunyada taninmiw korporasiyanin adi orfoqrafiya sehvi neticesinde yarandi', 0x676f6f676c65, 0x57696e616d70, 0x53616d73756e67, 0x536f6e79, 'a', 1),
(7, 'Mekteb sozu haradan yaranmisdir', 0x416c6d616e6979616461, 0x496e67696c746572656465, 0x59756e616e26233b3330357374616e6461, 0x4672616e73616461, 'c', 1),
(8, 'Hansi mehwur varli oz ogulunu boyuk bacilarin donlarini geyinmeye mecbur edirdi', 0x536572676579204272696e, 0x55676f20566574657265, 0x4c617272792050616765, 0x4a6f686e20526f636b6566656c6c6572, 'd', 1),
(9, 'Deizm nedir', 0x44696e6920696e616e6320666f726d617326233b333035, 0x50736978692078657374656c696b, 0x46656c73656669206365726579616e, 0x26233330343b6e71696c61626920686572656b6174, 'a', 1),
(10, 'internet saytlarindaki .org sonlugu...... menasi verir', 0x5465776b696c6174, 0x54656873696c, 0x5769726b6574, 0x53656869797965, 'a', 1),
(11, 'Eqoizmin eksi', 0x4574696b61, 0x4865646f6e697a6d, 0x416c747275697a6d, 0x5574696c6974617269616e697a6d, 'c', 2),
(12, 'Benilyuks olkeleri Belcika,Luksemburq ve ...dir', 0x4d6164617161736b6172, 0x4e69676572697961, 0x456c63657a616972, 0x486f6c6c616e64697961, 'd', 2),
(13, 'Piratlig awagidakilardan hansina uygundur', 0x44656e697a207469636172657469, 0x51616e756e73757a2064656e697a207469636172657469, 0x4d75656c6c69662068757175716c6172692068617164612071616e756e6c617220746f706c757375, 0x4d75656c6c69662068757175716c617226233b3330356e26233b3330356e20706f7a756c6d617326233b333035, 'd', 2),
(14, '5-liye daxil olmayan 5-cini tapin', 0x51617a61787374616e, 0x5475726b697965, 0x546163696b697374616e, 0x417a657262617963616e, 'c', 2),
(15, '20-ci esrin hansi ixtirasini yaponlar en vacib hesab edirler', 0x53757265746c692065742063656b656e206d6177696e, 0x4d757369716920706c6579657269, 0x53757265746c69206572697774652068617a69726c6179616e, 0x42616c61636120766964656f6b616d657261, 'c', 2),
(16, 'Gemiler yeyen kimi taninan ada harda yerlewir', 0x4b616e616461, 0x4672616e7361, 0x5475726b697965, 0x416c6d616e697961, 'a', 2),
(17, 'Felsefe(Philosophy) sozu menaca awagidakilardan hansina uygun gelir', 0x4d756472696b20656c6d, 0x4d756472696b6c69792073657667697369, 0x4d75647269796c69796520646f677275, 0x447577756e6365207465727a69, 'b', 2),
(18, 'Yeri kosmik wualardan hansi qurwag qoruyur', 0x56616e20616c6c656e, 0x446520627572, 0x516f6f72, 0x446520416e6472616465, 'a', 2),
(19, '100 iwig ili uzaqliqda olan ulduzda her hansi sezile bilen deyiwiklik baw verse o yerde teleskopla ne vaxt muwahide olunar', 0x456c652068656d696e20616e, 0x31303020696c20736f6e7261, 0x33303030303020696c20736f6e7261, 0x426972206e6563652073616e6979657965, 'b', 2),
(20, 'Bele bir dumanliq var', 0x49742071757972756775207865747469, 0x51757a752071756c616769, 0x41742062617769, 0x5175746220706172696c74697369, 'c', 2),
(21, 'Bizim qalaktika hansi formadadir', 0x53706972616c76617269, 0x5865747469, 0x456c6c697074696b, 0x4869706572626f6c696b, 'a', 3),
(22, 'Gunew sisteminde nece planet var', 0x343030206d696c79617264, 0x323030206d696c796f6e, 0x39, 0x38, 'd', 3),
(23, 'Yere en yaxin ulduz', 0x41737465726f69646c6572207172757075647572, 0x53656e7461767226233b3330356e20616c66617326233b3330356426233b33303572, 0x47756e6577, 0x4d617273, 'c', 3),
(24, 'Gunew sisteminde cemi nece ulduz var', 0x323030206d696c79617264, 0x343030206d696c79617264, 0x536f6e73757a, 0x31, 'd', 3),
(25, 'Bizim yawadigimiz planet hansi qalaktikaya daxildir', 0x4b6963696b20706c616e65746c65722073697374656d69, 0x47756e65772073697374656d69, 0x416e64726f6d6564612064756d616e6c26233b3330356769, 0x53756420796f6c75, 'd', 3),
(26, 'Hansi en boyuk planetdir', 0x596572, 0x56656e657261, 0x5572616e, 0x506c75746f6e, 'c', 3),
(27, 'Hansi felsefi anlayiw qadinlardan behs edir', 0x4e6968696c697a6d, 0x57696e746f697a696d, 0x56756d656e697a6d, 0x536b657074697a6d, 'b', 3),
(28, 'Yoqa qedim ...... felsefesinin 6 klassik sisteminden biridirlardan behs edir', 0x43696e, 0x45726562, 0x48696e64, 0x59756e616e, 'c', 3),
(29, 'Hansi terminin herfi menasi yeniden dogulma demekdir', 0x48756d616e, 0x52656e657373616e73, 0x44656d6f6b726174697961, 0x45766f6c797573697961, 'b', 3),
(30, 'wexsi azadligi ve sosial inkiwafi esas goturur', 0x4c69626572616c697a6d, 0x48756d616e697a6d, 0x44616f697a6d, 0x536f66697a6d, 'a', 3),
(31, 'Hansi artiqdir?', 0x4574696b61, 0x4573746574696b61, 0x53786f6c617374696b61, 0x4570697374656d6f6c6f67697961, 'c', 4),
(32, 'Sofist nedir?', 0x516564696d2079756e616e697374616e6461206d756472756b206164616d, 0x516564696d2079756e616e697374616e64612066696c6f736f666c6172696e2077616769726469, 0x46656c7365666577756e6173, 0x516564696d2079756e616e697374616e646120726979617a69797961746369, 'a', 4),
(33, 'Sokratin eserleri esasen kimin terefinden qeleme alinmidir?', 0x506c61746f6e756e, 0x536f6b72617426233b3330356e, 0x41726973746f74656c696e, 0x486f6d6572696e, 'a', 4),
(34, 'Hansi alim Atomizmin banilerindendir?', 0x416e616b7361716f726173, 0x44656d6f6b726974, 0x50726f7461676f72, 0x536f6b726174, 'b', 4),
(35, 'Hansi filosof Makedoniyali Iskenderin muellimi olub?', 0x506c61746f6e, 0x44656d6f6b726974, 0x536f6b726174, 0x41726973746f74656c, 'd', 4),
(36, 'Bilogoya,Mentiq,Fizika ve.s. elmlerinin ilkin esassns ... qoymusdur', 0x486970706f6b726174, 0x41726973746f74656c, 0x49626e2053696e61, 0x4265686d656e796172, 'b', 4),
(37, 'Hansi Radikal nezeriyyelerden sayilir?', 0x507261716d6174697a6d, 0x41746f6d697a6d, 0x4e6968696c697a6d, 0x536f66697a6d, 'c', 4),
(38, 'Her weyi inkar etme,hec neye inanmama hansi baxiwa uygundur??', 0x4e6968696c697a6d, 0x41746f6d697a6d, 0x536f66697a6d, 0x5265616c697a6d, 'a', 4),
(39, 'Ilk umumi teyinatli teleskopu kim duzeldib??', 0x4861626c, 0x51616c696c6579, 0x4b65706c6572, 0x76616e2042757272656e, 'a', 4),
(40, 'Eclips nedir?', 0x41792020747574756c6d617369, 0x47756e657720747574756c6d617369, 0x556d756d69797965746c6520747574756c6d61, 0x5175746220706172696c74697369, 'c', 4),
(41, 'Qedim insanlarin mezolit dovrundeki teserufati', 0x69737465686c616b, 0x697374656873616c, 0x656b696e63696c696b, 0x6d616c6461726c6971, 'b', 5),
(42, 'Simali Qafqazin qerb hissesi ilkin veteni sayilir', 0x6d69646979616c696c6172696e, 0x6c756c6c7562696c6572696e, 0x6d616e6e616c696c6172696e, 0x6b696d6d65726c6572696e, 'b', 5),
(43, 'Manna dovletinin suqutundan nece il sora atrepotene musteqil dovlete cevrildi', 0x333132, 0x333532, 0x323639, 0x313534, 'c', 5),
(44, 'Elektrik dovrelerinde cereyan widdeti ne adlanir', 0x416d7065726d657472, 0x5465726d6f6d657472, 0x46696e6f6d657472, 0x416d70657465726d6f6d657472, 'a', 5),
(45, 'qazlardan elektirik cereyanin kecmesi prosesi ne adlanir', 0x456e65726a692074756b656e6d65, 0x51617a20626f77616c6d617369, 0x4861766120626f77616c6d617369, 0x4861766173697a6c6967, 'b', 5),
(46, 'Cinde olkeni 300 il idare etmiwdi', 0x57616e2073756c616c6573, 0x5375792073756c616c657369, 0x54616e2073756c616c657369, 0x53756e2073756c616c657369, 'c', 6),
(47, '8esrdan etibaren cinda kendlilerdan alinan esas vergi', 0x546f796375, 0x47697a74, 0x426163, 0x5861726171, 'c', 6),
(48, 'Dunyada ilk dafe Farmakologiya kitabin yazmiwdi', 0x42616d62696c696c6572, 0x48696e646c696c6572, 0x43696e6c696c6572, 0x59756e616e6c6172, 'c', 6),
(49, 'Gurcustanda iri feodallar adlanirdikitabin yazmiwdi', 0x417a6e617572, 0x50617472696b, 0x417a6164, 0x50657266696b, 'a', 6),
(50, 'Hophop imzasi kime mexsusdu', 0x536579696420657a696d2077697276616e69, 0x4162626173207365686574, 0x4d69727a6520656c656b626572207361626972, 0x4d69727a6520776566692076617a6568, 'c', 6),
(51, 'Qaraqoyunlu doveltii ne vaxt yaradilmiwdi', 0x786c6c20657372, 0x786c6c6c20657372, 0x78697620657372, 0x787620657372, 'c', 7),
(52, 'Dunyada en uzun dag silsilesi hansidir.', 0x51616671617a2073696c73696c657369, 0x5572616c206461676c617269, 0x416c70206461676c617269, 0x4b6f7264696c796572206461676c617269, 'd', 7),
(53, 'Meredian hansi weherlerden kecir', 0x4d6f736b76612062616b69, 0x546f6b696f2070656b696e, 0x566177696e71746f6e20686176616e61, 0x4c6f6e646f6e20706172696a, 'd', 7),
(54, 'Azerbaycanin xi ci esrin medeniyyet abidesi hansidir', 0x577577612071616c617369, 0x57697276616e7761686c617220736172617969, 0x417477676168, 0x51697a2071616c617369, 'd', 7),
(55, 'En yuksek huquqi quvveye malik olan normativ akt', 0x4665726d616e, 0x4b6f6e737469747573697961, 0x5165726172, 0x456d72, 'b', 7),
(56, 'Bu agaclardan hansi sertdir', 0x466973746967, 0x476f727577, 0x436f6b65, 0x57616d, 'b', 7),
(57, 'Erken orta esrlerda ilK ali mekteb acilmiwdi', 0x497367656e646172697979656461, 0x4b6f7374616e74696e6f706f6c6461, 0x4166696e616461, 0x526f6d616461, 'b', 8),
(58, 'Muxtelif rengli xirda dawlar ve smatadan hazirlanmiw tesvir adlaridi', 0x4d6f7a61696b61, 0x496b6f6e61, 0x467265736b61, 0x5365646566, 'a', 8),
(59, 'Sasaniler dovletinin paytaxti olmuw weherdi', 0x54656272697a, 0x51617a616b61, 0x4b74657369666f6e64, 0x59656e696b656e64, 'c', 8),
(60, '622-ci ildan bawlanan tarix nece adlanir', 0x4d696c61646f, 0x4869637269, 0x51656d657269, 0x57656d7369, 'b', 8),
(61, 'Bunlardan hansi bezeyli agcdir', 0x51757720676f7a75, 0x48696c, 0x57656e6765, 0x516172612061676163, 'a', 9),
(62, 'Azerbaycanin ilk qedim dovletidir', 0x536b6966207061747761686c696769, 0x4b757469, 0x4d616e6e61, 0x57756d6572, 'c', 9),
(63, 'II sarqonun yuruwu erefesinda mannanin subi vilayeti tabeliyinda idi', 0x55726172746f72756e, 0x41737375726979616e696e, 0x4d69646979616e696e, 0x4d65736f706174616d6979616e696e, 'c', 8),
(64, 'Midiya dovletinin varisidir', 0x4174726f706174656e6120646f766c657469, 0x4568656d656e6920696d70657279617369, 0x53656c65766b6920646f766c657469, 0x5065726669796120646f766c657469, 'b', 8),
(65, 'E.e III esrdan kiremitdan tikinti materiali kim istifada etmiwdir', 0x4b7574696c6572, 0x417261747464616c696c6172, 0x4d616e6e616c696c6172, 0x416c62616e6c6172, 'b', 8),
(66, 'Alatou , alataa, aladag ve.s sozlerinin erken formasi olmuwdur', 0x4174726f706174656e61, 0x416c746179, 0x417261747461, 0x416c617a616e, 'a', 8),
(67, 'Gorkemli riyaziyyatci,astronom olmuwdur', 0x456c2062656c68696e696e, 0x456c207961736572, 0x49626e20586f72646164626568, 0x4f6d65722078657979616d, 'd', 9),
(77, 'Bunlardan hansinin displeyi daha temizdir', 0x53616d73756e67, 0x41636572, 0x42656b6f, 0x50616e61736f6e6963, 'a', 2),
(69, 'Bizansd cerrahiyenin esasini qoymuwdur', 0x49626e2073696e61, 0x4c6576206d6174656d6174696b, 0x4e696b697461, 0x486970706f6b726174, 'c', 9),
(70, 'monastirlarin nezdinda kewiwler hazirlayan mekteb acmiwdir', 0x54726179616e, 0x59757374696e69616e, 0x426f79756b206b72616c, 0x4b6f6e7374616e74696e, 'c', 9),
(71, 'VIII esrda hindistanda uwaqlarina Deyilirdi', 0x5161726c7571, 0x57656872697374616e, 0x5261626174, 0x526163656c7574, 'd', 10),
(72, 'Mehemmed peygemberIn ssa mekkedan Medineye koc etmesindan nece il sora samaniler dovleti yarandi', 0x323533, 0x3939, 0x313031, 0x323033, 'a', 10),
(73, 'Xuan cao usyanin bawlamasinda cinda sun sulalesinin hakimiyete gelmesinedek kecmiwdir', 0x3836, 0x3636, 0x3736, 0x3536, 'a', 10),
(74, 'ix esrda meydana gelmiwdir', 0x4b6979657620646f766c657469, 0x4672616e6b20646f766c657469, 0x41672068756e20646f766c657469, 0x476f797475726b20646f766c657469, 'a', 10),
(75, 'Bizans inperiyasinda feodalizim quruluwunun inkiwafi bir bawa baglidir', 0x416c6d616e6c617261, 0x536c617679616e6c617261, 0x5475726b6c657265, 0x457265626c657265, 'b', 10),
(76, 'Azerbaycanin paytaxti?', 0x42616b69, 0x47656e6365, 0x4c656e6b6572616e, 0x4d696e67656365766972, 'a', 1),
(78, '2014 -ci il ne ilidir?', 0x446f6e757a, 0x4d65796d756e, 0x6974, 0x4174, 'd', 11),
(79, 'Yolun yarД±sД±nД±n yarД±sД±nД±n yarД±sД±nД± gedЙ™n adam yolun daha neГ§Й™ faizini getmЙ™lidir?', 0x37382e35, 0x38382e35, 0x3530, 0x38372e35, 'd', 12),
(80, 'William Harley vЙ™ William, Walter, Arthur Davidson qardaЕџlarД±nД±n banilЙ™ri olduqlarД± nЙ™qliyyat vasitЙ™si hansД± nГ¶vЙ™ aid olub?', 0x4176746f6d6f62696c, 0x54c99979796172c999, 0x4d6f746f73696b6c6574, 0x56656c6f7369706564, 'c', 13),
(81, 'YarД±sД±nД±n yarД±sД±nД±n yarД±sД±nД±n 3 misli 24 olan Й™dЙ™di 8-lЙ™ cЙ™mlЙ™sЙ™k nЙ™ alarД±q?', 0x3634, 0x3732, 0x3430, 0x3231, 'b', 14),
(82, 'Д°nternet domenlerindЙ™ .mil uzantД±sД± hansД± mЙ™nanД± verir?', 0x48c9997262692073617974, 0x54c9996873696cc99920646169722073617974, 0x44c3b6766cc999742073617974c4b1, 0x42656cc9992062697220757a616e74c4b120796f786475722e, 'a', 15),
(83, 'ay iwiqi restaraninin elekdirik muhendisi kimdir', 0x4d4548455252454d2e2041, 0x4159415a2e4f, 0x454854494241522e4d45585649, 0x54414c45482e5a, 'a', 1),
(87, 'jjjjjjjjjjjjjjjj', 0x61, 0x6161, 0x616161, 0x616161, 'a', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sukan`
--

CREATE TABLE IF NOT EXISTS `sukan` (
  `id` int(11) NOT NULL,
  `n` int(5) NOT NULL DEFAULT '0',
  `xal` int(11) NOT NULL DEFAULT '0',
  `mer` int(5) NOT NULL DEFAULT '0',
  `qid` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

--
-- Dumping data for table `sukan`
--

INSERT INTO `sukan` (`id`, `n`, `xal`, `mer`, `qid`) VALUES
(1, 0, 6, 3, 0),
(0, 0, 0, 0, 0),
(634, 0, 0, 0, 0),
(673, 0, 0, 0, 0),
(674, 3, 0, 0, 0),
(675, 0, 0, 0, 0),
(676, 0, 0, 0, 0),
(678, 0, 0, 0, 0),
(631, 0, 0, 0, 2),
(692, 0, 0, 0, 0),
(695, 0, 0, 0, 2),
(702, 0, 0, 0, 0),
(707, 0, 0, 0, 0),
(716, 0, 0, 0, 0),
(720, 0, 0, 0, 0),
(737, 0, 0, 0, 0),
(562, 1, 0, 0, 1),
(758, 0, 0, 0, 0),
(2, 0, 0, 0, 2),
(31, 3, 0, 0, 0),
(5, 0, 0, 0, 0),
(8, 1, 0, 0, 0),
(78457, 0, 0, 0, 0),
(78460, 1, 0, 0, 0),
(78463, 0, 0, 0, 0),
(78466, 1, 0, 0, 0),
(78470, 0, 0, 0, 0),
(78476, 0, 0, 0, 0),
(78477, 0, 0, 0, 0),
(78481, 1, 0, 0, 0),
(78482, 0, 0, 0, 0),
(78484, 0, 0, 0, 0),
(78485, 0, 0, 0, 0),
(78486, 0, 0, 0, 0),
(78492, 0, 0, 0, 0),
(78501, 1, 0, 0, 0),
(78505, 1, 0, 0, 0),
(78507, 0, 0, 0, 0),
(78509, 0, 0, 0, 0),
(78512, 0, 0, 0, 0),
(78513, 0, 0, 0, 0),
(114, 0, 0, 0, 0),
(44, 0, 0, 0, 0),
(33, 0, 0, 0, 0),
(46, 0, 0, 0, 0),
(48, 0, 0, 0, 0),
(52, 0, 0, 0, 0),
(79, 0, 0, 0, 0),
(106, 0, 0, 0, 0),
(87, 0, 0, 0, 0),
(27, 0, 0, 0, 0),
(219, 0, 0, 0, 0),
(19, 0, 0, 0, 0),
(186, 0, 0, 0, 0),
(170, 0, 0, 0, 0),
(325, 0, 0, 0, 0),
(327, 0, 0, 0, 0),
(369, 0, 0, 0, 0),
(366, 0, 0, 0, 0),
(394, 0, 0, 0, 0),
(392, 0, 0, 0, 0),
(400, 0, 0, 0, 0),
(490, 0, 0, 0, 0),
(507, 0, 0, 0, 0),
(512, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sukan_sual`
--

CREATE TABLE IF NOT EXISTS `sukan_sual` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sual` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `a` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `b` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `c` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `answer` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `n` int(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `sukan_sual`
--


-- --------------------------------------------------------

--
-- Table structure for table `surucu`
--

CREATE TABLE IF NOT EXISTS `surucu` (
  `id` int(11) NOT NULL,
  `n` int(5) NOT NULL DEFAULT '0',
  `xal` int(11) NOT NULL DEFAULT '0',
  `mer` int(5) NOT NULL DEFAULT '0',
  `qid` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

--
-- Dumping data for table `surucu`
--

INSERT INTO `surucu` (`id`, `n`, `xal`, `mer`, `qid`) VALUES
(1, 0, 6, 3, 1),
(0, 0, 0, 0, 0),
(634, 0, 0, 0, 0),
(673, 0, 0, 0, 0),
(674, 3, 0, 0, 0),
(675, 0, 0, 0, 0),
(676, 0, 0, 0, 0),
(678, 0, 0, 0, 0),
(631, 0, 0, 0, 2),
(692, 0, 0, 0, 0),
(695, 0, 0, 0, 2),
(702, 0, 0, 0, 0),
(707, 0, 0, 0, 0),
(716, 0, 0, 0, 0),
(720, 0, 0, 0, 0),
(737, 0, 0, 0, 0),
(562, 1, 0, 0, 1),
(758, 0, 0, 0, 0),
(2, 0, 0, 0, 2),
(31, 3, 0, 0, 0),
(5, 0, 0, 0, 0),
(8, 1, 0, 0, 0),
(78457, 0, 0, 0, 0),
(78460, 1, 0, 0, 0),
(78463, 0, 0, 0, 0),
(78466, 1, 0, 0, 0),
(78470, 0, 0, 0, 0),
(78476, 0, 0, 0, 0),
(78477, 0, 0, 0, 0),
(78481, 1, 0, 0, 0),
(78482, 0, 0, 0, 0),
(78484, 0, 0, 0, 0),
(78485, 0, 0, 0, 0),
(78486, 0, 0, 0, 0),
(78492, 0, 0, 0, 0),
(78501, 1, 0, 0, 0),
(78505, 1, 0, 0, 0),
(78507, 0, 0, 0, 0),
(78509, 0, 0, 0, 0),
(78512, 0, 0, 0, 0),
(78513, 0, 0, 0, 0),
(1, 0, 6, 3, 1),
(0, 0, 0, 0, 0),
(634, 0, 0, 0, 0),
(673, 0, 0, 0, 0),
(674, 3, 0, 0, 0),
(675, 0, 0, 0, 0),
(676, 0, 0, 0, 0),
(678, 0, 0, 0, 0),
(631, 0, 0, 0, 2),
(692, 0, 0, 0, 0),
(695, 0, 0, 0, 2),
(702, 0, 0, 0, 0),
(707, 0, 0, 0, 0),
(716, 0, 0, 0, 0),
(720, 0, 0, 0, 0),
(737, 0, 0, 0, 0),
(562, 1, 0, 0, 1),
(758, 0, 0, 0, 0),
(2, 0, 0, 0, 2),
(31, 3, 0, 0, 0),
(5, 0, 0, 0, 0),
(8, 1, 0, 0, 0),
(78457, 0, 0, 0, 0),
(78460, 1, 0, 0, 0),
(78463, 0, 0, 0, 0),
(78466, 1, 0, 0, 0),
(78470, 0, 0, 0, 0),
(78476, 0, 0, 0, 0),
(78477, 0, 0, 0, 0),
(78481, 1, 0, 0, 0),
(78482, 0, 0, 0, 0),
(78484, 0, 0, 0, 0),
(78485, 0, 0, 0, 0),
(78486, 0, 0, 0, 0),
(78492, 0, 0, 0, 0),
(78501, 1, 0, 0, 0),
(78505, 1, 0, 0, 0),
(78507, 0, 0, 0, 0),
(78509, 0, 0, 0, 0),
(78512, 0, 0, 0, 0),
(78513, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `svadbi`
--

CREATE TABLE IF NOT EXISTS `svadbi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `zhenih` text NOT NULL,
  `nevesta` text NOT NULL,
  `frzhenih` blob NOT NULL,
  `frnevesta` blob NOT NULL,
  `saat` int(11) DEFAULT '0',
  `vremya` varchar(10) CHARACTER SET latin1 COLLATE latin1_bin DEFAULT NULL,
  `organizatory` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `svadbi`
--


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `giris` int(11) NOT NULL DEFAULT '0',
  `user` varchar(50) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `pass` varchar(30) CHARACTER SET latin1 COLLATE latin1_bin DEFAULT NULL,
  `name` varchar(30) CHARACTER SET latin1 COLLATE latin1_bin DEFAULT NULL,
  `sex` int(1) NOT NULL DEFAULT '0',
  `birth` varchar(10) DEFAULT NULL,
  `nomre` varchar(20) CHARACTER SET latin1 COLLATE latin1_bin DEFAULT NULL,
  `meqsed` tinyint(1) DEFAULT '0',
  `year` varchar(4) CHARACTER SET cp1251 COLLATE cp1251_bin DEFAULT NULL,
  `city` varchar(100) CHARACTER SET latin1 COLLATE latin1_bin DEFAULT NULL,
  `infa` blob,
  `roompost` int(11) NOT NULL DEFAULT '0',
  `posts` int(11) NOT NULL DEFAULT '0',
  `status` varchar(100) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT 'Qonaq',
  `xstatus` int(2) NOT NULL DEFAULT '0',
  `date` varchar(10) CHARACTER SET latin1 COLLATE latin1_bin DEFAULT NULL,
  `avr` smallint(3) NOT NULL DEFAULT '300',
  `max` smallint(2) NOT NULL DEFAULT '10',
  `level` smallint(6) NOT NULL DEFAULT '0',
  `panel` int(1) NOT NULL DEFAULT '0',
  `kik` int(20) NOT NULL DEFAULT '0',
  `whokik` varchar(20) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `whykik` varchar(200) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `user_ip` varchar(20) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `user_soft` varchar(200) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `inv` tinyint(1) NOT NULL DEFAULT '0',
  `say` smallint(6) NOT NULL DEFAULT '0',
  `credits` int(11) NOT NULL DEFAULT '0',
  `gposts` int(11) NOT NULL DEFAULT '0',
  `img` varchar(50) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '0',
  `image_fon` varchar(20) NOT NULL,
  `visit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ruser` varchar(30) CHARACTER SET cp1251 COLLATE cp1251_bin DEFAULT NULL,
  `latuser` varchar(50) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `time` int(11) DEFAULT '0',
  `time_active` int(11) NOT NULL DEFAULT '0',
  `time_active1` int(11) NOT NULL DEFAULT '0',
  `time_active2` int(11) NOT NULL DEFAULT '0',
  `room` int(2) NOT NULL DEFAULT '0',
  `smiles` tinyint(1) NOT NULL DEFAULT '2',
  `safe` tinyint(1) NOT NULL DEFAULT '1',
  `nastroi` varchar(100) CHARACTER SET latin1 COLLATE latin1_bin DEFAULT NULL,
  `bal` double DEFAULT '0',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `avtootvet` blob NOT NULL,
  `para` varchar(50) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `reng` tinyint(1) NOT NULL DEFAULT '1',
  `umnik` int(1) NOT NULL DEFAULT '1',
  `mektub_qebulu` int(11) NOT NULL DEFAULT '0',
  `fsize` int(1) DEFAULT '0',
  `rutbe` int(11) DEFAULT '0',
  `byeotv` int(11) NOT NULL DEFAULT '0',
  `gizlilik` int(1) NOT NULL DEFAULT '0',
  `con` int(1) NOT NULL DEFAULT '0',
  `mesaj` int(2) NOT NULL DEFAULT '0',
  `delmsg` int(1) NOT NULL DEFAULT '0',
  `zn` varchar(6) DEFAULT NULL,
  `tox` tinyint(1) NOT NULL DEFAULT '0',
  `mexvi` tinyint(1) NOT NULL DEFAULT '0',
  `rnikler` tinyint(2) NOT NULL DEFAULT '0',
  `shrift` varchar(10) DEFAULT NULL,
  `requ` varchar(6) DEFAULT 'time',
  `onsex` int(1) NOT NULL DEFAULT '3',
  `ontime` int(11) NOT NULL DEFAULT '0',
  `xal` int(11) NOT NULL DEFAULT '0',
  `ses` int(11) NOT NULL DEFAULT '0',
  `msn` int(5) NOT NULL DEFAULT '0',
  `qefes` tinyint(2) NOT NULL DEFAULT '0',
  `forum` smallint(6) DEFAULT '0',
  `fpost` int(11) DEFAULT '0',
  `fr_limit` int(2) NOT NULL DEFAULT '0',
  `beyen` int(11) NOT NULL DEFAULT '0',
  `stsonline` varchar(600) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `zn_time` int(11) NOT NULL DEFAULT '0',
  `st_bal_time` int(11) NOT NULL DEFAULT '1',
  `st_bal_count` int(11) NOT NULL DEFAULT '1',
  `st_bal_count1` int(11) NOT NULL DEFAULT '0',
  `version` varchar(10) NOT NULL,
  `action` float(11,2) NOT NULL DEFAULT '0.00',
  `array` text NOT NULL,
  `rn_time` int(11) NOT NULL DEFAULT '0',
  `rn_nik` int(1) NOT NULL DEFAULT '0',
  `meqa` int(11) NOT NULL,
  `meqa_time` int(11) NOT NULL DEFAULT '0',
  `shekil` int(1) NOT NULL DEFAULT '0',
  `infostat` varchar(1000) CHARACTER SET cp1251 COLLATE cp1251_bin NOT NULL,
  `nnposts` int(1) NOT NULL DEFAULT '0',
  `anket` tinyint(1) NOT NULL DEFAULT '0',
  `ankets` varchar(600) CHARACTER SET cp1251 COLLATE cp1251_bin NOT NULL,
  `avtootvetm` blob NOT NULL,
  `vanket` int(1) NOT NULL DEFAULT '0',
  `spam` int(1) NOT NULL DEFAULT '0',
  `sms` int(1) NOT NULL DEFAULT '0',
  `ssms` int(1) NOT NULL DEFAULT '0',
  `dehlizi` int(11) NOT NULL,
  `onphp` int(11) NOT NULL,
  `infophp` int(11) NOT NULL,
  `mduelphp` int(11) NOT NULL,
  `hesabphp` int(11) NOT NULL,
  `znakalphp` int(11) NOT NULL,
  `chatphp` int(11) NOT NULL,
  `meqanickphp` int(11) NOT NULL,
  `forumphp` int(11) NOT NULL,
  `hekayephp` int(11) NOT NULL,
  `statphp` int(11) NOT NULL,
  `msgphp` int(11) NOT NULL,
  `profilephp` int(11) NOT NULL,
  `cabinetphp` int(11) NOT NULL,
  `changephp` int(11) NOT NULL,
  `dost` int(1) NOT NULL DEFAULT '0',
  `anketb` int(1) NOT NULL DEFAULT '0',
  `azn_show` int(11) NOT NULL DEFAULT '0',
  `dominoreytinq` int(11) NOT NULL DEFAULT '150',
  `dominodayam` int(11) NOT NULL DEFAULT '0',
  `mafia` int(1) NOT NULL,
  `mafia_cp` int(1) NOT NULL,
  `mafia_write` int(11) NOT NULL,
  `mafia_act` int(1) NOT NULL,
  `bot` int(11) NOT NULL,
  `qazan2` int(30) NOT NULL,
  `qazan` int(30) NOT NULL,
  `arxivim2` int(30) NOT NULL,
  `arxivim` int(30) NOT NULL,
  `fut_level` int(11) NOT NULL,
  `qeyd_micro` int(2) NOT NULL DEFAULT '0',
  `azn` int(11) NOT NULL,
  `color_nick_time` int(11) NOT NULL DEFAULT '0',
  `color_nick` int(11) NOT NULL DEFAULT '0',
  `st1` double NOT NULL,
  `stat` double NOT NULL,
  `baxis` varchar(12) DEFAULT NULL,
  `youtibe` varchar(50) DEFAULT NULL,
  `group` int(1) NOT NULL,
  `group_cp` int(1) NOT NULL,
  `group_write` int(11) NOT NULL,
  `group_act` int(1) NOT NULL,
  `group_call` int(11) NOT NULL,
  `elit` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `mafia_ap` varchar(20) NOT NULL,
  `mafia_xal` int(11) NOT NULL,
  `mafia_olu` int(11) NOT NULL,
  `mafia_kart` varchar(20) NOT NULL,
  `mafia_level` int(11) NOT NULL,
  `mafiaxal` int(11) NOT NULL,
  `apxaric` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `time` (`time`),
  KEY `time_1` (`time`,`room`,`inv`),
  KEY `sex` (`time`,`sex`),
  KEY `sex_1` (`time`,`sex`,`inv`),
  KEY `inv` (`time`,`inv`),
  KEY `latuser` (`latuser`),
  KEY `date` (`date`),
  KEY `id` (`id`,`banned`),
  KEY `birth` (`birth`,`banned`),
  KEY `date2` (`date`,`banned`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 PACK_KEYS=0 AUTO_INCREMENT=517 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `giris`, `user`, `pass`, `name`, `sex`, `birth`, `nomre`, `meqsed`, `year`, `city`, `infa`, `roompost`, `posts`, `status`, `xstatus`, `date`, `avr`, `max`, `level`, `panel`, `kik`, `whokik`, `whykik`, `user_ip`, `user_soft`, `inv`, `say`, `credits`, `gposts`, `img`, `image_fon`, `visit`, `ruser`, `latuser`, `time`, `time_active`, `time_active1`, `time_active2`, `room`, `smiles`, `safe`, `nastroi`, `bal`, `banned`, `avtootvet`, `para`, `reng`, `umnik`, `mektub_qebulu`, `fsize`, `rutbe`, `byeotv`, `gizlilik`, `con`, `mesaj`, `delmsg`, `zn`, `tox`, `mexvi`, `rnikler`, `shrift`, `requ`, `onsex`, `ontime`, `xal`, `ses`, `msn`, `qefes`, `forum`, `fpost`, `fr_limit`, `beyen`, `stsonline`, `zn_time`, `st_bal_time`, `st_bal_count`, `st_bal_count1`, `version`, `action`, `array`, `rn_time`, `rn_nik`, `meqa`, `meqa_time`, `shekil`, `infostat`, `nnposts`, `anket`, `ankets`, `avtootvetm`, `vanket`, `spam`, `sms`, `ssms`, `dehlizi`, `onphp`, `infophp`, `mduelphp`, `hesabphp`, `znakalphp`, `chatphp`, `meqanickphp`, `forumphp`, `hekayephp`, `statphp`, `msgphp`, `profilephp`, `cabinetphp`, `changephp`, `dost`, `anketb`, `azn_show`, `dominoreytinq`, `dominodayam`, `mafia`, `mafia_cp`, `mafia_write`, `mafia_act`, `bot`, `qazan2`, `qazan`, `arxivim2`, `arxivim`, `fut_level`, `qeyd_micro`, `azn`, `color_nick_time`, `color_nick`, `st1`, `stat`, `baxis`, `youtibe`, `group`, `group_cp`, `group_write`, `group_act`, `group_call`, `elit`, `mafia_ap`, `mafia_xal`, `mafia_olu`, `mafia_kart`, `mafia_level`, `mafiaxal`, `apxaric`) VALUES
(1, 0, 'ADMiN', 'MDA=', 'Admin', 0, '01-05-1982', '', 3, '1994', 'Seher', 0x4d65787669, 201, 5157, 'V.I.P', 23, '19-04-2017', 300, 50, 9, 1, 1495629831, 'Sistem', 'Online Mesaj-da flood  + 214748364 post cerime', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 0, 0, 8, 4, '4', '1-41695.jpg', '2023-04-06 02:51:15', NULL, 'admin', 1680738675, 2066, 0, 7658, 30, 2, 0, NULL, 6904648, 0, '', '', 1, 0, 0, 0, 0, 0, 2, 0, 0, 1, '', 2, 0, 0, '#990000', 'time', 3, 1680738665, 0, 0, 0, 0, 3, 0, 0, -1, '', 0, 48, 20, 25, 'vista3', 23.36, '', 0, 0, 0, 0, 0, '', 0, 1, 'info Baglidir!!!', '', 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 150, 1507139880, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, NULL, NULL, 1, 1, 0, 1, 1, '0', '', 0, 0, '', 0, 0, 0),
(478, 0, 'Hhkbg', 'R2hoaGo=', 'Ggbb', 0, '02-02-1990', NULL, 3, '1990', 'Abseron', 0x5676767676, 0, 5, 'Qonaq', 0, '23-06-2017', 300, 10, 0, 0, 0, '', '', '91.135.247.245', 'Mozilla/5.0 (Linux; Android 6.0.1; SAMSUNG SM-G532F Build/MMB29T) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/5.4 Chrome/51.0.2704.106 Mobile Safari/537.36', 0, 0, 0, 0, '0', '', '2017-07-31 23:02:54', NULL, 'hhkbg', 1498196206, 0, 0, 0, 30, 2, 1, NULL, 5, 0, '', '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, NULL, 'time', 3, 1498196206, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 2, 20, 25, 'vista1', 0.00, '', 0, 0, 0, 0, 0, '', 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 150, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, NULL, '', 0, 0, '', 0, 0, 0),
(0, 0, 'ZIR-BAKILI', 'Zmpna2doanRn', 'TUNAR', 0, '14-01-1990', NULL, 0, '1990', 'Goranboy', 0x5375626179616d, 0, 0, 'Qonaq', 0, '05-05-2017', 300, 10, 0, 0, 0, 'Admin', '', '5.191.16.48', 'SAMSUNG-GT-E2252/E2252XXMG1 NetFront/4.2 Profile/MIDP-2.0 Configuration/CLDC-1.1', 0, 0, 0, 0, '0', '', '2017-10-04 20:44:59', NULL, 'zir-bakili', 1496632119, 0, 0, 0, 82, 2, 1, NULL, 200, 2, '', '', 1, 1, 0, 0, 0, 0, 0, 1, 0, 0, NULL, 0, 0, 0, '', 'time', 1, 1495457363, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 37, 20, 25, 'vista1', 0.42, '', 0, 0, 0, 0, 0, '', 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 150, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, '', '', 0, 0, '', 0, 0, 0),
(419, 0, '~Milyaner~', 'MzI2OTQ4Ng==', 'Vusal', 0, '19-07-1991', NULL, 3, '1991', 'Baki', 0x43696c71696e, 0, 600, 'Qonaq', 0, '21-06-2017', 300, 10, 0, 0, 0, '', '', '134.19.212.116', 'Mozilla/5.0 (Linux; Android 4.2.2; HUAWEI G730-U10 Build/HuaweiG730-U10) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.91 Mobile Safari/537.36 OPR/42.7.2246.114996', 0, 0, 0, 0, '0', '', '2017-10-04 20:44:59', NULL, '~milyaner~', 1498058436, 0, 0, 0, 28, 2, 1, NULL, 5000, 0, '', '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, '', 'time', 1, 1498058436, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 28, 20, 25, 'vista1', 0.02, '', 0, 0, 0, 0, 0, '', 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 150, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, NULL, '', 0, 0, '', 0, 0, 0),
(420, 0, 'Miko_-_', 'ODU5MDAy', 'ElÃ§in', 0, '16-01-1995', NULL, 1, '1995', 'Agdam', 0x48657220676f72647579756d75206164616d207361796d6972616d, 0, 541, 'Qonaq', 0, '21-06-2017', 300, 10, 0, 0, 0, '', '', '5.191.19.255', 'Opera/9.80 (J2ME/MIDP; Opera Mini/8.0.40377/64.228; U; az) Presto/2.12.423 Version/12.16', 0, 0, 0, 0, '0', '', '2017-10-04 20:44:59', NULL, 'miko_-_', 1498066395, 0, 0, 0, 28, 2, 1, NULL, 5000, 0, '', '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, '', 'time', 1, 1498066349, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 47, 20, 25, 'vista1', 0.82, '', 0, 0, 0, 0, 0, '', 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 150, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, '1', '', 0, 0, '', 0, 0, 0),
(421, 0, '*OnU_CeNnEtE_DeYiSmErEm*', 'RG92bGV0MTIz', 'Mi_KaLbInE_YaZ', 0, '01-01-1992', NULL, 3, '1992', 'Abseron', '', 0, 701, 'Qonaq', 0, '21-06-2017', 300, 10, 0, 0, 0, 'Sistem', 'reklam olmaz', '5.44.37.129', 'Mozilla/5.0 (Linux; Android 6.0.1; SAMSUNG SM-G900F Build/MMB29M) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/4.0 Chrome/44.0.2403.133 Mobile Safari/537.36', 0, 0, 0, 0, '0', '', '2017-10-04 20:44:59', NULL, '*onu_cennete_deyismerem*', 1498064809, 0, 0, 0, 30, 2, 1, NULL, 4640, 0, '', '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, '', 'time', 0, 1498064777, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 15, 20, 25, 'vista1', 0.06, '', 0, 0, 0, 0, 1, '', 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 150, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, '1', '', 0, 0, '', 0, 0, 0),
(456, 0, 'test*lxK', 'T1Jmck1FSXBPUg==', 'l&#351;ihm', 1, '11-12-1950', NULL, 3, '1950', 'euaKBx', 0x584661476a6b, 0, 5, 'Qonaq', 0, '22-06-2017', 300, 10, 0, 0, 0, 'Sistem', 'Olmaz', '194.67.213.73', 'Nokia7455/MIDP 2.0 CLDP6485', 0, 0, 0, 0, '0', '', '2020-08-19 09:56:17', NULL, 'test*lxk', 1498131827, 0, 0, 0, 28, 2, 1, NULL, 5, 0, '', '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, NULL, 'time', 3, 1498131826, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 1, 20, 25, 'vista1', 0.00, '', 0, 0, 0, 0, 0, '', 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 150, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, NULL, '', 0, 0, '', 0, 0, 0),
(422, 0, 'rusiya', 'YXl4YWIxMg==', 'eli', 0, '01-01-1994', NULL, 3, '1994', 'Abseron', 0x656c6179616d, 0, 804, 'Qonaq', 0, '21-06-2017', 300, 10, 0, 0, 0, '', '', '185.30.88.76', 'Mozilla/5.0 (Linux; Android 5.0.2; SM-G530H Build/LRX22G) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.83 Mobile Safari/537.36', 0, 0, 0, 0, '0', '', '2017-10-04 20:44:59', NULL, 'rusiya', 1498133372, 0, 0, 0, 28, 2, 1, NULL, 9500, 0, '', '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, '', 'time', 3, 1498133332, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 17, 20, 25, 'vista1', 0.14, '', 0, 0, 0, 0, 0, '', 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 150, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, NULL, '', 0, 0, '', 0, 0, 0),
(423, 0, '_Gul_ve_Su_', 'NjY3Nw==', 'NAR TANESI', 1, '16-05-1994', '', 3, '1999', 'BORCALI MAHALI', 0x51656c62696d20716972696c646978636120636f782071656c626c6572207169726163616d, 0, 570, 'Qonaq', 0, '21-06-2017', 300, 10, 0, 0, 0, 'Sistem', 'Olmaz', '66.249.93.73', 'Mozilla/5.0 (Linux; Android 5.1.1; SM-J120H Build/LMY47V) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.83 Mobile Safari/537.36', 0, 0, 0, 0, '0', '', '2020-08-19 09:56:17', NULL, '_gul_ve_su_', 1498063997, 0, 0, 0, 28, 2, 1, NULL, 4680, 0, '', '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, '', 'time', 3, 1498063977, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 25, 20, 25, 'vista1', 1.40, '', 0, 0, 0, 0, 0, '', 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 150, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, NULL, '', 0, 0, '', 0, 0, 0),
(425, 0, 'Djanavar)))))', 'OTB2ajY5MA==', 'Djanavar))))', 0, '02-03-1988', NULL, 3, '1988', 'Abseron', 0x786d6d6d6d, 0, 525, 'Qonaq', 0, '21-06-2017', 300, 10, 0, 0, 0, 'Sistem', 'reklam', '5.44.36.227', 'Opera/9.80 (Android; Opera Mini/20.1.2254/64.228; U; az) Presto/2.12.423 Version/12.16', 0, 0, 0, 0, '0', '', '2020-08-19 09:56:17', NULL, 'djanavar)))))', 1498046793, 0, 0, 0, 28, 2, 1, NULL, 5000, 0, '', '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, '', 'time', 1, 1498046793, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 33, 20, 25, 'vista1', 0.82, '', 0, 0, 0, 0, 0, '', 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 150, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, NULL, '', 0, 0, '', 0, 0, 0),
(426, 0, 'ureyim1', 'c2FkaXE5NjM=', 'roma', 0, '03-04-1994', NULL, 3, '1994', 'Abseron', 0x6f7a20686171696d6461206e6520646979696d2068657226233335313b657969207a616d616e20676f736465726572, 0, 8, 'Qonaq', 0, '21-06-2017', 300, 10, 0, 0, 0, '', '', '5.191.22.165', 'Mozilla/5.0 (Linux; U; Android 2.3.6; ru-ru; ONE TOUCH 4007D Build/GRK39F) AppleWebKit/533.1 (KHTML, like Gecko) Version/4.0 Mobile Safari/533.1', 0, 0, 0, 0, '0', '', '2017-07-31 23:02:54', NULL, 'ureyim1', 1498059872, 0, 0, 0, 28, 2, 1, NULL, 5, 0, '', '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, NULL, 'time', 1, 1498059840, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 4, 20, 25, 'vista1', 0.06, '', 0, 0, 0, 0, 0, '', 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 150, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, NULL, '', 0, 0, '', 0, 0, 0),
(427, 0, 'Sahin', 'MTIzNDVoZmRn', 'Sahib', 0, '05-04-1990', NULL, 3, '1990', 'Abseron', 0x456c652062656c65, 0, 25, 'Qonaq', 0, '21-06-2017', 300, 10, 0, 0, 0, '', '', '77.244.119.161', 'Mozilla/5.0 (Linux; Android 5.1.1; SM-J320H Build/LMY47V) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.83 Mobile Safari/537.36', 0, 0, 0, 0, '0', '', '2017-10-04 20:44:59', NULL, 'sahin', 1498066224, 0, 0, 0, 28, 2, 1, NULL, 5, 0, '', '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, NULL, 'time', 1, 1498066224, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 40, 20, 25, 'vista1', 0.40, '', 0, 0, 0, 0, 0, '', 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 150, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, NULL, '', 0, 0, '', 0, 0, 0),
(428, 0, 'dowan)))))', 'aWtpbWl6', 'yoxdu', 1, '01-01-1998', NULL, 3, '1998', 'Abseron', 0x73616465, 0, 529, 'Qonaq', 0, '21-06-2017', 300, 10, 0, 0, 0, '', '', '5.191.16.153', 'Mozilla/5.0 (Linux; U; Android 4.0.4; tr-tr; GT-S7562 Build/IMM76I) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Mobile Safari/534.30', 0, 0, 0, 0, '0', '', '2020-08-19 09:55:27', NULL, 'dowan)))))', 1498046962, 0, 0, 0, 28, 2, 1, NULL, 5000, 0, '', '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, '', 'time', 3, 1498046962, 0, 0, 1000, 0, 0, 0, 0, 0, '', 0, 35, 20, 25, 'vista1', 0.92, '', 0, 0, 0, 0, 0, '', 0, 0, '', '', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 150, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, NULL, '', 0, 0, '', 0, 0, 0),
(455, 0, 'test*uFt', 'UGpBWEJqaElwdA==', 'pOIPP', 0, '13-11-1957', NULL, 3, '1957', 'TkYMnX', 0x624b6a527544, 0, 5, 'Qonaq', 0, '22-06-2017', 300, 10, 0, 0, 0, 'Sistem', 'Olmaz', '194.67.213.73', 'Nokia6987/MIDP 2.0 CLDP6110', 0, 0, 0, 0, '0', '', '2020-08-19 09:56:17', NULL, 'test*uft', 1498131767, 0, 0, 0, 28, 2, 1, NULL, 5, 0, '', '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, NULL, 'time', 3, 1498131766, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 1, 20, 25, 'vista1', 0.00, '', 0, 0, 0, 0, 0, '', 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 150, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, NULL, '', 0, 0, '', 0, 0, 0),
(430, 0, 'Bahar_ciceyi', 'bXM5d0hqNUc=', '?', 1, '07-04-1988', NULL, 3, '1988', 'Abseron', 0x3f, 0, 527, 'Qonaq', 5, '21-06-2017', 300, 10, 7, 1, 0, '', '', '185.30.90.114', 'Mozilla/5.0 (Linux; U; Android 4.1.2; ru-ru; GT-I8190 Build/JZO54K) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Mobile Safari/534.30', 0, 0, 0, 0, '0', '', '2020-08-19 11:19:37', NULL, 'bahar_ciceyi', 1498066337, 0, 0, 0, 28, 2, 1, NULL, 6287, 0, '', '', 1, 1, 0, 0, 0, 0, 2, 0, 0, 0, NULL, 2, 0, 0, '#990000', 'time', 3, 1498066310, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 13, 20, 25, 'vista1', 0.42, '', 0, 0, 0, 0, 0, '', 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 150, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, NULL, '', 0, 0, '', 0, 0, 0),
(431, 0, 'VEFALI-UREY', 'RXZleno=', 'Taley', 0, '03-03-1996', NULL, 3, '1996', 'Abseron', 0x59616c616e64616e20c59f6572206174616ec4b1206b69622070756c756e207665726d656d6579, 0, 6, 'Qonaq', 0, '21-06-2017', 300, 10, 0, 0, 0, '', '', '5.191.18.218', 'Mozilla/5.0 (Linux; Android 4.1.2; GT-I8552 Build/JZO54K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.132 Mobile Safari/537.36', 0, 0, 0, 0, '0', '', '2017-07-31 23:02:54', NULL, 'vefali-urey', 1498051725, 0, 0, 0, 0, 2, 1, NULL, 105, 0, '', '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, NULL, 'time', 1, 1498051725, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 3, 20, 25, 'vista1', 0.02, '', 0, 0, 0, 0, 0, '', 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 150, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, NULL, '', 0, 0, '', 0, 0, 0),
(432, 0, 'Canavar', 'OTB2ajY5MA==', 'Rufet', 0, '04-03-1988', NULL, 3, '1988', 'Abseron', 0x586d6d6d, 0, 6, 'Qonaq', 0, '21-06-2017', 300, 10, 0, 0, 0, '', '', '5.44.36.227', 'Opera/9.80 (Android; Opera Mini/20.1.2254/64.228; U; az) Presto/2.12.423 Version/12.16', 0, 0, 0, 0, '0', '', '2017-10-04 20:44:59', NULL, 'canavar', 1498064675, 0, 0, 0, 28, 2, 1, NULL, 5, 0, '', '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, NULL, 'time', 0, 1498064675, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 2, 20, 25, 'vista1', 0.02, '', 0, 0, 0, 0, 0, '', 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 150, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, NULL, '', 0, 0, '', 0, 0, 0),
(454, 0, 'test*PYI', 'V0hoTWNaZGxVTQ==', 'cHrzZ', 1, '13-11-1954', NULL, 3, '1954', 'G&#350;QONl', 0x614c796e795a, 0, 5, 'Qonaq', 0, '22-06-2017', 300, 10, 0, 0, 0, 'Sistem', 'Olmaz', '194.67.213.73', 'Nokia1036/MIDP 2.0 CLDP7926', 0, 0, 0, 0, '0', '', '2020-08-19 09:56:17', NULL, 'test*pyi', 1498131767, 0, 0, 0, 28, 2, 1, NULL, 5, 0, '', '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, NULL, 'time', 3, 1498131766, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 1, 20, 25, 'vista1', 0.00, '', 0, 0, 0, 0, 0, '', 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 150, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, NULL, '', 0, 0, '', 0, 0, 0),
(452, 0, 'test*yyn', 'UkhmYldkdmZjTA==', 'XzUYO', 1, '26-10-1973', NULL, 3, '1973', 'QKBLPp', 0x506326233335313b644975, 0, 5, 'Qonaq', 0, '22-06-2017', 300, 10, 0, 0, 0, 'Sistem', 'Olmaz', '194.67.213.73', 'Nokia9849/MIDP 2.0 CLDP4784', 0, 0, 0, 0, '0', '', '2020-08-19 09:56:17', NULL, 'test*yyn', 1498131707, 0, 0, 0, 28, 2, 1, NULL, 5, 0, '', '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, NULL, 'time', 3, 1498131706, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 1, 20, 25, 'vista1', 0.00, '', 0, 0, 0, 0, 0, '', 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 150, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, NULL, '', 0, 0, '', 0, 0, 0),
(453, 0, 'test*byM', 'a0dGbmRUdFpmSg==', 'JbyV&#350;', 1, '22-10-1976', NULL, 3, '1976', 'KLSELk', 0x744b4d63456e, 0, 5, 'Qonaq', 0, '22-06-2017', 300, 10, 0, 0, 0, 'Sistem', 'Olmaz', '194.67.213.73', 'Nokia6775/MIDP 2.0 CLDP1913', 0, 0, 0, 0, '0', '', '2020-08-19 09:56:17', NULL, 'test*bym', 1498131767, 0, 0, 0, 28, 2, 1, NULL, 5, 0, '', '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, NULL, 'time', 3, 1498131766, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 1, 20, 25, 'vista1', 0.00, '', 0, 0, 0, 0, 0, '', 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 150, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, NULL, '', 0, 0, '', 0, 0, 0),
(435, 0, 'BAWDAN_XARAB_ROWQA', 'bWlyaQ==', 'Atam oglum deyr', 0, '22-02-1991', '', 3, '1991', 'Baki papalin', 0x6f676c616e20646f67756c6d617120646f67757364616e2067656c656e20616c696e2079617a697369206f6c73616461206b6926233335313b69206f6c6d617120686572206f676c616e696e20616c696e2079617a697369206f6c6d7572202e526579616c64612073657667696c696d646520766172206275726120766178642063656b69726d6579652067656c6972656d206865636b65736c6564652069c59f696d20796f78, 0, 702, 'Qonaq', 5, '21-06-2017', 300, 10, 0, 0, 0, '', '', '5.191.15.74', 'Mozilla/5.0 (Linux; Android 4.1.2; GT-S7262 Build/JZO54K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/28.0.1500.94 Mobile Safari/537.36', 0, 0, 0, 0, '1', '', '2017-07-31 23:02:54', NULL, 'bawdan_xarab_rowqa', 1498066450, 0, 0, 0, 28, 2, 1, 'herkesden uzaq', 5385, 0, '', '', 1, 1, 0, 0, 0, 0, 0, 0, 2, 0, NULL, 0, 0, 0, '', 'time', 1, 1498066417, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 2, 20, 25, 'vista1', 0.18, '', 0, 0, 0, 0, 0, '', 0, 0, '', 0x63617661622067656c6d65646973652064656d656c69206f6e656d6c69206465796c73656e206d656e63756e, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 150, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, '0', '', 0, 0, '', 0, 0, 0),
(451, 0, 'test*leS', 'RUNIUnRBUlN4VQ==', 'LBCuf', 1, '23-10-1975', NULL, 3, '1975', 'vRLCTI', 0x6a46674c4c56, 0, 5, 'Qonaq', 0, '22-06-2017', 300, 10, 0, 0, 0, 'Sistem', 'Olmaz', '194.67.213.73', 'Nokia9920/MIDP 2.0 CLDP7244', 0, 0, 0, 0, '0', '', '2020-08-19 09:56:17', NULL, 'test*les', 1498131647, 0, 0, 0, 28, 2, 1, NULL, 5, 0, '', '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, NULL, 'time', 3, 1498131646, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 1, 20, 25, 'vista1', 0.00, '', 0, 0, 0, 0, 0, '', 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 150, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, NULL, '', 0, 0, '', 0, 0, 0),
(437, 0, 'Rafayil27', 'MTk2Mw==', 'Rafayil', 0, '03-08-1990', NULL, 1, '1990', 'Baki', 0x53656d696d69, 0, 6, 'Qonaq', 0, '21-06-2017', 300, 10, 0, 0, 0, '', '', '31.170.249.55', 'Mozilla/5.0 (Linux; Android 5.1.1; A33f Build/LMY47V; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/58.0.3029.83 Mobile Safari/537.36', 0, 0, 0, 0, '0', '', '2017-07-31 23:02:54', NULL, 'rafayil27', 1498061049, 0, 0, 0, 30, 2, 1, NULL, 5, 0, '', '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, NULL, 'time', 3, 1498061018, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 17, 20, 25, 'vista1', 0.02, '', 0, 0, 0, 0, 0, '', 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 150, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, NULL, '', 0, 0, '', 0, 0, 0),
(450, 0, 'test*Lbl', 'alV0SHNzcXZmYg==', 'YXcsB', 1, '11-11-1957', NULL, 3, '1957', 'UenyXL', 0x63505a664153, 0, 5, 'Qonaq', 0, '22-06-2017', 300, 10, 0, 0, 0, 'Sistem', 'Olmaz', '194.67.213.73', 'Nokia1895/MIDP 2.0 CLDP8618', 0, 0, 0, 0, '0', '', '2020-08-19 09:56:17', NULL, 'test*lbl', 1498131646, 0, 0, 0, 28, 2, 1, NULL, 5, 0, '', '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, NULL, 'time', 3, 1498131646, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 1, 20, 25, 'vista1', 0.00, '', 0, 0, 0, 0, 0, '', 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 150, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, NULL, '', 0, 0, '', 0, 0, 0),
(439, 0, 'lotu@bala@', 'U2FsYTltazRkMGs=', 'emin', 0, '18-10-1992', NULL, 3, '1992', 'Abseron', '', 0, 902, 'Qonaq', 0, '21-06-2017', 300, 50, 0, 0, 0, '', '', '93.184.233.208', 'Mozilla/5.0 (Linux; U; Android 4.1.1; tr-tr; HUAWEI G510-0200 Build/HuaweiG510-0200) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Mobile Safari/534.30', 0, 0, 0, 0, '1', '', '2017-07-31 23:02:54', NULL, 'lotu@bala@', 1498063930, 0, 0, 0, 30, 2, 1, NULL, 8000, 0, '', '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, '', 'time', 1, 1498063919, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 8, 20, 25, 'vista1', 0.12, '', 0, 0, 0, 0, 0, '', 0, 0, '', '', 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 150, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, NULL, '', 0, 0, '', 0, 0, 0),
(440, 0, 'ureyim_aglar', 'YXl0YWMxOTk3', 'Aytac', 1, '08-12-1997', '', 3, '1997', 'Abseron', 0x45736562692c71697371616e632c736562697273697a2c67756c6572757a2929, 1, 69, 'Qonaq', 0, '21-06-2017', 300, 10, 0, 0, 0, '', '', '5.191.22.85', 'Mozilla/5.0 (Linux; U; Android 4.2.2; tr-tr; GT-S7582 Build/JDQ39) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Mobile Safari/534.30', 0, 0, 0, 0, '0', '', '2020-08-19 09:55:27', NULL, 'ureyim_aglar', 1498066456, 0, 0, 0, 30, 2, 1, NULL, 706, 0, '', '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, NULL, 'xal', 1, 1498066443, 0, 0, 1000, 0, 0, 0, 0, 0, '', 0, 43, 20, 25, 'vista1', 1.16, '', 0, 0, 0, 0, 0, '', 0, 0, '', '', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 150, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, NULL, '', 0, 0, '', 0, 0, 0),
(441, 0, 'KAYFUSHA', 'bWVuMTEx', 'C', 0, '09-09-1994', NULL, 3, '1994', 'Imisli', 0x2a2a2a2a, 0, 8, 'Qonaq', 0, '21-06-2017', 300, 10, 0, 0, 0, '', '', '5.191.18.107', 'Mozilla/5.0 (Linux; Android 4.2.2; GT-S7582 Build/JDQ39) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.91 Mobile Safari/537.36 OPR/42.8.2246.117704', 0, 0, 0, 0, '0', '', '2017-07-31 23:02:54', NULL, 'kayfusha', 1498061468, 0, 0, 0, 28, 2, 1, NULL, 5, 0, '', '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, NULL, 'time', 3, 1498061437, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 11, 20, 25, 'vista1', 0.06, '', 0, 0, 0, 0, 0, '', 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 150, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, NULL, '', 0, 0, '', 0, 0, 0),
(442, 0, 'Kederimsen', 'MTIzNDU2Nzg5c3M=', 'AdiMi SeN QoY', 1, '10-06-2000', '', 3, '2001', 'Abseron', 0x4d696e6e6fc59f, 0, 648, 'Qonaq', 5, '21-06-2017', 300, 10, 0, 0, 0, 'Sistem', 'reklam', '194.135.162.27', 'Mozilla/5.0 (Linux; U; Android 2.3.6; tr-tr; GT-S6802 Build/GINGERBREAD) AppleWebKit/533.1 (KHTML, like Gecko) Version/4.0 Mobile Safari/533.1', 0, 0, 0, 0, '0', '', '2020-08-19 09:56:17', NULL, 'kederimsen', 1498064750, 0, 0, 0, 28, 2, 1, 'Deyi&#351;ken', 5600, 0, '', '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, '', 'time', 3, 1498064694, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 49, 20, 25, 'vista1', 0.98, '', 0, 0, 0, 0, 0, '', 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 150, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, NULL, '', 0, 0, '', 0, 0, 0),
(472, 0, 'hmmm*YuU', 'V3VNSG5tdWRnTw==', 'eREqO', 1, '12-10-1985', NULL, 3, '1985', 'lvdCko', 0x26233335303b665a507550, 0, 5, 'Qonaq', 0, '22-06-2017', 300, 10, 0, 0, 0, 'Sistem', 'Olmaz', '194.67.213.73', 'Nokia6420/MIDP 2.0 CLDP8805', 0, 0, 0, 0, '0', '', '2020-08-19 09:56:17', NULL, 'hmmm*yuu', 1498135331, 0, 0, 0, 28, 2, 1, NULL, 5, 0, '', '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, NULL, 'time', 3, 1498135331, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 1, 20, 25, 'vista1', 0.00, '', 0, 0, 0, 0, 0, '', 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 150, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, NULL, '', 0, 0, '', 0, 0, 0),
(449, 0, 'test*IBc', 'TVNvamxSR1F2bQ==', 'eVYOD', 0, '10-12-1965', NULL, 3, '1965', 'TkrirG', 0x476e54746558, 0, 5, 'Qonaq', 0, '22-06-2017', 300, 10, 0, 0, 0, 'Sistem', 'Olmaz', '194.67.213.73', 'Nokia9647/MIDP 2.0 CLDP7234', 0, 0, 0, 0, '0', '', '2020-08-19 09:56:17', NULL, 'test*ibc', 1498131586, 0, 0, 0, 28, 2, 1, NULL, 5, 0, '', '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, NULL, 'time', 3, 1498131586, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 1, 20, 25, 'vista1', 0.00, '', 0, 0, 0, 0, 0, '', 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 150, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, NULL, '', 0, 0, '', 0, 0, 0),
(448, 0, 'hmmm', 'cGFyb2w=', 'hmmmm', 0, '04-04-1991', NULL, 3, '1991', 'Abseron', 0x63697a7a61, 0, 5, 'Qonaq', 0, '22-06-2017', 300, 10, 0, 0, 0, '', '', '168.235.206.115', 'Mozilla/5.0 (Linux; U; Android 4.1.2; en-US; GT-S7262 Build/JZO54K) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 UCBrowser/10.8.0.718 U3/0.8.0 Mobile Safari/534.30', 0, 0, 0, 0, '0', '', '2017-07-31 23:02:54', NULL, 'hmmm', 1499540542, 0, 0, 0, 30, 2, 1, NULL, 5, 0, '', '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, NULL, 'time', 3, 1499540542, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 10, 20, 25, 'vista1', 0.00, '', 0, 0, 0, 0, 0, '', 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 150, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, NULL, '', 0, 0, '', 0, 0, 0),
(445, 0, 'Heyat_Varsa', 'QXlhejEyMzQ1', 'Mi_KaLbInE_YaZ', 0, '01-01-1992', NULL, 3, '1992', 'Abseron', '', 0, 6, 'Qonaq', 0, '21-06-2017', 300, 10, 0, 0, 0, '', '', '5.44.39.26', 'Mozilla/5.0 (Linux; Android 6.0.1; SAMSUNG SM-G900F Build/MMB29M) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/4.0 Chrome/44.0.2403.133 Mobile Safari/537.36', 0, 0, 0, 0, '0', '', '2017-10-04 20:44:59', NULL, 'heyat_varsa', 1498063077, 0, 0, 0, 30, 2, 1, NULL, 5, 0, '', '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, NULL, 'time', 0, 1498063069, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 2, 20, 25, 'vista1', 0.02, '', 0, 0, 0, 0, 0, '', 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 150, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, NULL, '', 0, 0, '', 0, 0, 0),
(446, 0, '_gul_su_', 'Nzc4OA==', 'NI&#350;A', 1, '03-04-1994', NULL, 2, '1994', 'Qazax', 0x2e2e2e2e, 0, 45, 'Qonaq', 0, '21-06-2017', 300, 10, 0, 0, 0, '', '', '66.249.93.68', 'Mozilla/5.0 (Linux; Android 5.1.1; SM-J120H Build/LMY47V) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.83 Mobile Safari/537.36', 0, 0, 0, 0, '0', '', '2017-10-04 20:44:59', NULL, '_gul_su_', 1498066453, 0, 0, 0, 28, 2, 1, NULL, 55, 0, '', '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, NULL, 'time', 3, 1498066430, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 26, 20, 25, 'vista1', 0.80, '', 0, 0, 0, 0, 0, '', 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 150, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, NULL, '', 0, 0, '', 0, 0, 0),
(447, 0, 'TEAM', 'NTk5OTY=', '?????', 0, '01-01-1990', NULL, 3, '1990', 'Abseron', 0x3f3f3f, 0, 5, 'Qonaq', 0, '22-06-2017', 300, 10, 0, 0, 0, '', '', '94.20.224.16', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36', 0, 0, 0, 0, '0', '', '2017-06-23 00:01:33', NULL, 'team', 1498127332, 0, 0, 0, 0, 2, 1, NULL, 5, 0, '', '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, NULL, 'time', 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 1, 20, 25, 'vista1', 0.00, '', 0, 0, 0, 0, 0, '', 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 150, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, NULL, '', 0, 0, '', 0, 0, 0),
(457, 0, 'test*jJj', 'bW5EbFhORGFtYw==', 'f&#350;hVE', 1, '17-11-1964', NULL, 3, '1964', 'Y&#351;Zpj&#350;', 0x7072736a4456, 0, 5, 'Qonaq', 0, '22-06-2017', 300, 10, 0, 0, 0, 'Sistem', 'Olmaz', '194.67.213.73', 'Nokia5239/MIDP 2.0 CLDP9218', 0, 0, 0, 0, '0', '', '2020-08-19 09:56:17', NULL, 'test*jjj', 1498131827, 0, 0, 0, 28, 2, 1, NULL, 5, 0, '', '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, NULL, 'time', 3, 1498131826, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 1, 20, 25, 'vista1', 0.00, '', 0, 0, 0, 0, 0, '', 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 150, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, NULL, '', 0, 0, '', 0, 0, 0),
(458, 0, 'test*hhb', 'WkRKaXNtZnRvdQ==', 'KaqzU', 1, '13-10-1987', NULL, 3, '1987', 'BDOtJJ', 0x6f26233335303b59454154, 0, 5, 'Qonaq', 0, '22-06-2017', 300, 10, 0, 0, 0, 'Sistem', 'Olmaz', '194.67.213.73', 'Nokia3603/MIDP 2.0 CLDP6764', 0, 0, 0, 0, '0', '', '2020-08-19 09:56:17', NULL, 'test*hhb', 1498131827, 0, 0, 0, 28, 2, 1, NULL, 5, 0, '', '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, NULL, 'time', 3, 1498131827, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 1, 20, 25, 'vista1', 0.00, '', 0, 0, 0, 0, 0, '', 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 150, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, NULL, '', 0, 0, '', 0, 0, 0),
(459, 0, 'test*MGz', 'WWxPSVFaZndRcw==', '&#351;rHhY', 1, '17-10-1958', NULL, 3, '1958', 'hQFyyF', 0x6243726d634a, 0, 5, 'Qonaq', 0, '22-06-2017', 300, 10, 0, 0, 0, 'Sistem', 'Olmaz', '194.67.213.73', 'Nokia7714/MIDP 2.0 CLDP5706', 0, 0, 0, 0, '0', '', '2020-08-19 09:56:17', NULL, 'test*mgz', 1498131887, 0, 0, 0, 28, 2, 1, NULL, 5, 0, '', '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, NULL, 'time', 3, 1498131887, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 1, 20, 25, 'vista1', 0.00, '', 0, 0, 0, 0, 0, '', 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 150, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, NULL, '', 0, 0, '', 0, 0, 0),
(460, 0, 'test*Vfc', 'eHZ2Rk9STmJhaA==', 'inLRL', 0, '10-11-1957', NULL, 3, '1957', 'BcDiPt', 0x517570766244, 0, 5, 'Qonaq', 0, '22-06-2017', 300, 10, 0, 0, 0, 'Sistem', 'Olmaz', '194.67.213.73', 'Nokia6156/MIDP 2.0 CLDP7351', 0, 0, 0, 0, '0', '', '2020-08-19 09:56:17', NULL, 'test*vfc', 1498131887, 0, 0, 0, 28, 2, 1, NULL, 5, 0, '', '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, NULL, 'time', 3, 1498131887, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 1, 20, 25, 'vista1', 0.00, '', 0, 0, 0, 0, 0, '', 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 150, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, NULL, '', 0, 0, '', 0, 0, 0),
(461, 0, 'test*asI', 'UFdUQ0t1cUxnRg==', 'iRccy', 0, '11-12-1955', NULL, 3, '1955', 'jNlOGj', 0x4d4f6c6c697a, 0, 5, 'Qonaq', 0, '22-06-2017', 300, 10, 0, 0, 0, 'Sistem', 'Olmaz', '194.67.213.73', 'Nokia3699/MIDP 2.0 CLDP4911', 0, 0, 0, 0, '0', '', '2020-08-19 09:56:17', NULL, 'test*asi', 1498131949, 0, 0, 0, 28, 2, 1, NULL, 5, 0, '', '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, NULL, 'time', 3, 1498131949, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 1, 20, 25, 'vista1', 0.00, '', 0, 0, 0, 0, 0, '', 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 150, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, NULL, '', 0, 0, '', 0, 0, 0),
(462, 0, 'test*HJD', 'eXhSU3Z3SkhLaA==', 'brnso', 1, '20-10-1977', NULL, 3, '1977', 'uduXFc', 0x546350646c54, 0, 5, 'Qonaq', 0, '22-06-2017', 300, 10, 0, 0, 0, 'Sistem', 'Olmaz', '194.67.213.73', 'Nokia8186/MIDP 2.0 CLDP3663', 0, 0, 0, 0, '0', '', '2020-08-19 09:56:17', NULL, 'test*hjd', 1498132010, 0, 0, 0, 28, 2, 1, NULL, 5, 0, '', '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, NULL, 'time', 3, 1498132009, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 1, 20, 25, 'vista1', 0.00, '', 0, 0, 0, 0, 0, '', 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 150, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, NULL, '', 0, 0, '', 0, 0, 0),
(463, 0, 'test*nLV', 'TVZMZG1lYklwUw==', 'gvKcj', 1, '24-12-1954', NULL, 3, '1954', 'EVuMXR', 0x484e6e6326233335313b51, 0, 5, 'Qonaq', 0, '22-06-2017', 300, 10, 0, 0, 0, 'Sistem', 'Olmaz', '194.67.213.73', 'Nokia9860/MIDP 2.0 CLDP3981', 0, 0, 0, 0, '0', '', '2020-08-19 09:56:17', NULL, 'test*nlv', 1498132070, 0, 0, 0, 28, 2, 1, NULL, 5, 0, '', '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, NULL, 'time', 3, 1498132069, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 1, 20, 25, 'vista1', 0.00, '', 0, 0, 0, 0, 0, '', 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 150, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, NULL, '', 0, 0, '', 0, 0, 0),
(464, 0, 'test*OSR', 'bE5MdlFXdU1VZg==', 'KUEid', 0, '24-10-1971', NULL, 3, '1971', 'FXoYd&#350;', 0x6f7a6569434b, 0, 5, 'Qonaq', 0, '22-06-2017', 300, 10, 0, 0, 0, 'Sistem', 'Olmaz', '194.67.213.73', 'Nokia8025/MIDP 2.0 CLDP5813', 0, 0, 0, 0, '0', '', '2020-08-19 09:56:17', NULL, 'test*osr', 1498132129, 0, 0, 0, 28, 2, 1, NULL, 5, 0, '', '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, NULL, 'time', 3, 1498132129, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 1, 20, 25, 'vista1', 0.00, '', 0, 0, 0, 0, 0, '', 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 150, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, NULL, '', 0, 0, '', 0, 0, 0),
(465, 0, 'test*mrI', 'aWZHT0hKYXRndg==', 'Ce&#351;ku', 0, '14-12-1985', NULL, 3, '1985', 'QFbZGG', 0x4b5526233335313b7a26233335313b49, 0, 5, 'Qonaq', 0, '22-06-2017', 300, 10, 0, 0, 0, 'Sistem', 'Olmaz', '194.67.213.73', 'Nokia6193/MIDP 2.0 CLDP3636', 0, 0, 0, 0, '0', '', '2020-08-19 09:56:17', NULL, 'test*mri', 1498132129, 0, 0, 0, 28, 2, 1, NULL, 5, 0, '', '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, NULL, 'time', 3, 1498132129, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 1, 20, 25, 'vista1', 0.00, '', 0, 0, 0, 0, 0, '', 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 150, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, NULL, '', 0, 0, '', 0, 0, 0),
(466, 0, 'test*SIr', 'WW1HVUlpUFJyUw==', '&#351;bZNt', 0, '27-10-1978', NULL, 3, '1978', 'CnBNYq', 0x754d624f5665, 0, 5, 'Qonaq', 0, '22-06-2017', 300, 10, 0, 0, 0, 'Sistem', 'Olmaz', '194.67.213.73', 'Nokia8446/MIDP 2.0 CLDP8964', 0, 0, 0, 0, '0', '', '2020-08-19 09:56:17', NULL, 'test*sir', 1498132190, 0, 0, 0, 28, 2, 1, NULL, 5, 0, '', '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, NULL, 'time', 3, 1498132189, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 1, 20, 25, 'vista1', 0.00, '', 0, 0, 0, 0, 0, '', 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 150, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, NULL, '', 0, 0, '', 0, 0, 0),
(467, 0, 'test*EYu', 'cnZHWmlhY0NVYg==', 'QeMZD', 1, '18-12-1960', NULL, 3, '1960', 'kdmc&#350;F', 0x414c4626233335303b457a, 0, 5, 'Qonaq', 0, '22-06-2017', 300, 10, 0, 0, 0, 'Sistem', 'Olmaz', '194.67.213.73', 'Nokia9554/MIDP 2.0 CLDP4280', 0, 0, 0, 0, '0', '', '2020-08-19 09:56:17', NULL, 'test*eyu', 1498132190, 0, 0, 0, 28, 2, 1, NULL, 5, 0, '', '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, NULL, 'time', 3, 1498132189, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 1, 20, 25, 'vista1', 0.00, '', 0, 0, 0, 0, 0, '', 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 150, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, NULL, '', 0, 0, '', 0, 0, 0),
(468, 0, 'test*bWY', 'Qk9nTUhTV214bQ==', 'fuSmT', 1, '20-10-1977', NULL, 3, '1977', 'YdZyDn', 0x58416e696b4f, 0, 5, 'Qonaq', 0, '22-06-2017', 300, 10, 0, 0, 0, 'Sistem', 'Olmaz', '194.67.213.73', 'Nokia4253/MIDP 2.0 CLDP7157', 0, 0, 0, 0, '0', '', '2020-08-19 09:55:48', NULL, 'test*bwy', 1498132190, 0, 0, 0, 28, 2, 1, NULL, 5, 0, '', '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, NULL, 'time', 3, 1498132189, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 1, 20, 25, 'vista1', 0.00, '', 0, 0, 0, 0, 0, '', 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 150, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, NULL, '', 0, 0, '', 0, 0, 0),
(469, 0, 'test*KFX', 'QVVlSmxET055dQ==', 'oOZRC', 0, '25-10-1990', NULL, 3, '1990', 'eaqNIM', 0x79645162767a, 0, 5, 'Qonaq', 0, '22-06-2017', 300, 10, 0, 0, 0, 'Sistem', 'Olmaz', '194.67.213.73', 'Nokia9651/MIDP 2.0 CLDP2856', 0, 0, 0, 0, '0', '', '2020-08-19 09:56:17', NULL, 'test*kfx', 1498132250, 0, 0, 0, 28, 2, 1, NULL, 5, 0, '', '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, NULL, 'time', 3, 1498132250, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 1, 20, 25, 'vista1', 0.00, '', 0, 0, 0, 0, 0, '', 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 150, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, NULL, '', 0, 0, '', 0, 0, 0),
(470, 0, 'ByOn', 'QWRhbW0=', 'Oka', 0, '01-01-1991', NULL, 3, '1991', 'Agdas', 0x4f6b6b6b, 0, 5, 'Qonaq', 0, '22-06-2017', 300, 10, 0, 0, 0, '', '', '178.76.32.29', 'Mozilla/5.0 (Linux; Android 4.4.2; HTC Desire 626G dual sim Build/KOT49H) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.125 Mobile Safari/537.36', 0, 0, 0, 0, '0', '', '2017-08-16 15:44:17', NULL, 'byon', 1502887457, 0, 0, 0, 28, 2, 1, NULL, 50, 0, '', '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, NULL, 'time', 3, 1502887444, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 5, 20, 25, 'vista1', 0.00, '', 0, 0, 0, 0, 0, '', 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 150, 1499770704, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, '0', '', 0, 0, '', 0, 0, 0),
(471, 0, 'hmmm*ocn', 'd215S0VRZ2dRWQ==', 'bMFMT', 0, '17-10-1950', NULL, 3, '1950', 'JjcXqB', 0x504b65436672, 0, 5, 'Qonaq', 0, '22-06-2017', 300, 10, 0, 0, 0, 'Sistem', 'Olmaz', '194.67.213.73', 'Nokia2541/MIDP 2.0 CLDP2320', 0, 0, 0, 0, '0', '', '2020-08-19 09:56:17', NULL, 'hmmm*ocn', 1498135271, 0, 0, 0, 28, 2, 1, NULL, 5, 0, '', '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, NULL, 'time', 3, 1498135271, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 1, 20, 25, 'vista1', 0.00, '', 0, 0, 0, 0, 0, '', 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 150, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, NULL, '', 0, 0, '', 0, 0, 0),
(473, 0, 'hmmm*ivx', 'dWJGdFJ4WUxaeA==', 'TUXUH', 0, '19-10-1977', NULL, 3, '1977', 'vxtjZa', 0x53716b6a7254, 0, 5, 'Qonaq', 0, '22-06-2017', 300, 10, 0, 0, 0, 'Sistem', 'Olmaz', '194.67.213.73', 'Nokia6899/MIDP 2.0 CLDP3470', 0, 0, 0, 0, '0', '', '2020-08-19 09:56:17', NULL, 'hmmm*ivx', 1498135391, 0, 0, 0, 28, 2, 1, NULL, 5, 0, '', '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, NULL, 'time', 3, 1498135391, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 1, 20, 25, 'vista1', 0.00, '', 0, 0, 0, 0, 0, '', 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 150, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, NULL, '', 0, 0, '', 0, 0, 0),
(474, 0, 'hmmm*swU', 'S09TYnRXZHd3RA==', 'hKM&#350;t', 0, '22-10-1990', NULL, 3, '1990', 'RYKc&#350;N', 0x716f506d5926233335313b, 0, 5, 'Qonaq', 0, '22-06-2017', 300, 10, 0, 0, 0, 'Sistem', 'Olmaz', '194.67.213.73', 'Nokia6239/MIDP 2.0 CLDP8671', 0, 0, 0, 0, '0', '', '2020-08-19 09:56:17', NULL, 'hmmm*swu', 1498135451, 0, 0, 0, 28, 2, 1, NULL, 5, 0, '', '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, NULL, 'time', 3, 1498135451, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 1, 20, 25, 'vista1', 0.00, '', 0, 0, 0, 0, 0, '', 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 150, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, NULL, '', 0, 0, '', 0, 0, 0),
(475, 0, 'hmmm*tIo', 'UkVRenVIaUJQSw==', 'UFXnT', 1, '13-11-1984', NULL, 3, '1984', 'rBmnON', 0x444153766663, 0, 5, 'Qonaq', 0, '22-06-2017', 300, 10, 0, 0, 0, 'Sistem', 'Olmaz', '194.67.213.73', 'Nokia1386/MIDP 2.0 CLDP1866', 0, 0, 0, 0, '0', '', '2020-08-19 09:56:17', NULL, 'hmmm*tio', 1498135451, 0, 0, 0, 28, 2, 1, NULL, 5, 0, '', '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, NULL, 'time', 3, 1498135451, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 1, 20, 25, 'vista1', 0.00, '', 0, 0, 0, 0, 0, '', 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 150, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, NULL, '', 0, 0, '', 0, 0, 0),
(476, 0, 'djrjffj', 'ZmpkamRqamRq', 'dkekdkdj', 0, '01-02-1990', NULL, 3, '1990', 'Abseron', 0x73646a646a646a6a64, 0, 5, 'Qonaq', 0, '22-06-2017', 300, 10, 0, 0, 0, '', '', '5.191.19.98', 'Mozilla/5.0 (Linux; Android 6.0.1; SAMSUNG SM-A500F Build/MMB29M) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/5.4 Chrome/51.0.2704.106 Mobile Safari/537.36', 0, 0, 0, 0, '0', '', '2017-07-31 23:02:54', NULL, 'djrjffj', 1498140574, 0, 0, 0, 28, 2, 1, NULL, 55, 0, '', '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, NULL, 'time', 3, 1498140570, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 2, 20, 25, 'vista1', 0.00, '', 0, 0, 0, 0, 0, '', 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 150, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, NULL, '', 0, 0, '', 0, 0, 0),
(477, 0, 'dcms', 'bmVzZQ==', '?????', 0, '01-01-1991', NULL, 3, '1991', 'Abseron', 0x3f3f3f3f3f3f3f3f3f2f, 0, 5, 'Qonaq', 0, '22-06-2017', 300, 10, 0, 0, 0, '', '', '185.30.90.233', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36', 0, 0, 0, 0, '0', '', '2017-09-01 14:50:48', NULL, 'dcms', 1498158619, 0, 0, 0, 28, 2, 1, NULL, 105, 0, '', '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, NULL, 'time', 3, 1498158581, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 2, 20, 25, 'vista1', 0.00, '', 0, 0, 0, 0, 0, '', 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 150, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, NULL, '', 0, 0, '', 0, 0, 0),
(480, 0, 'jjdjjsj', 'aGhqaGpzaGo=', 'jh&#351;&#351;', 0, '01-01-1992', NULL, 3, '1992', 'Abseron', 0x26233238373b6826233238373b26233238373b6764, 0, 5, 'Qonaq', 0, '27-06-2017', 300, 10, 0, 0, 0, '', '', '91.135.246.213', 'Opera/9.80 (Windows NT 6.1; U; MRA 6.5 (build 9316); az) Presto/2.10.229 Version/11.64', 0, 0, 0, 0, '0', '', '2017-10-04 20:44:59', NULL, 'jjdjjsj', 1498550069, 0, 0, 0, 30, 2, 1, NULL, 5, 0, '', '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, NULL, 'time', 3, 1498550035, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 1, 20, 25, 'vista1', 0.00, '', 0, 0, 0, 0, 0, '', 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 150, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, NULL, '', 0, 0, '', 0, 0, 0),
(479, 0, 'fghjtjr', 'anRyanlyag==', 'ertrjtrj', 0, '05-04-1990', NULL, 3, '1990', 'Abseron', 0x726a747274666a26233335313b7279, 0, 5, 'Qonaq', 0, '23-06-2017', 300, 10, 0, 0, 0, '', '', '89.219.41.192', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.135 Safari/537.36', 0, 0, 0, 0, '0', '', '2017-10-04 20:44:59', NULL, 'fghjtjr', 1498225149, 0, 0, 0, 28, 2, 1, NULL, 5, 0, '', '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, NULL, 'time', 3, 1498225113, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 1, 20, 25, 'vista1', 0.00, '', 0, 0, 0, 0, 0, '', 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 150, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, NULL, '', 0, 0, '', 0, 0, 0),
(481, 0, 'manyak', 'ZWtzbQ==', 'elmin', 0, '06-05-1990', NULL, 3, '1990', 'Abseron', 0x2340363636, 0, 5, 'Qonaq', 0, '28-06-2017', 300, 10, 0, 0, 0, '', '', '5.191.15.236', 'Mozilla/5.0 (Linux; Android 4.4.2; SM-G355H Build/KOT49H) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/40.0.2214.109 Mobile Safari/537.36', 0, 0, 0, 0, '0', '', '2017-10-04 20:44:59', NULL, 'manyak', 1498658291, 0, 0, 0, 30, 2, 1, NULL, 55, 0, '', '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, NULL, 'time', 3, 1498658291, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 2, 20, 25, 'vista1', 0.00, '', 0, 0, 0, 0, 0, '', 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 150, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, '1', '', 0, 0, '', 0, 0, 0),
(482, 0, 'UnuDulmaZ', 'dXNlcjEx', '.....', 0, '01-01-1988', NULL, 3, '1988', 'Baki', 0x2e2e2e2e2e2e2e, 0, 5, 'Qonaq', 0, '03-07-2017', 300, 10, 0, 0, 0, '', '', '77.244.120.90', 'Opera/9.80 (Android; Opera Mini/26.0.2254/65.257; U; az) Presto/2.12.423 Version/12.16', 0, 0, 0, 0, '0', '', '2017-10-04 20:44:59', NULL, 'unudulmaz', 1499033362, 0, 0, 0, 28, 2, 1, NULL, 5, 0, '', '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, NULL, 'time', 3, 1499033324, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 2, 20, 25, 'vista1', 0.00, '', 0, 0, 0, 0, 0, '', 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 150, 1499033401, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, NULL, '', 0, 0, '', 0, 0, 0),
(483, 0, 'recebdi', 'cmVjZWJkaWRl', 'receb', 0, '05-05-1995', NULL, 3, '1995', 'Abseron', 0x62626274, 0, 5, 'Qonaq', 0, '04-07-2017', 300, 10, 0, 0, 0, '', '', '77.244.119.60', 'Opera/9.80 (Android; Opera Mini/18.0.2254/65.268; U; az) Presto/2.12.423 Version/12.16', 0, 0, 0, 0, '0', '', '2017-10-04 20:44:59', NULL, 'recebdi', 1499176471, 0, 0, 0, 30, 2, 1, NULL, 5, 0, '', '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, NULL, 'time', 3, 1499176471, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 1, 20, 25, 'vista1', 0.00, '', 0, 0, 0, 0, 0, '', 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 150, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, NULL, '', 0, 0, '', 0, 0, 0),
(484, 0, 'noayyn', 'MzMzNDQ0', 'data', 0, '17-02-1999', NULL, 3, '1999', 'Abseron', 0x787878787878787878787878787878, 0, 5, 'Qonaq', 0, '05-07-2017', 300, 10, 0, 0, 0, '', '', '178.76.33.229', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.96 Safari/537.36', 0, 0, 0, 0, '0', '', '2017-10-04 20:44:59', NULL, 'noayyn', 1499256677, 0, 0, 0, 28, 2, 1, NULL, 5, 0, '', '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, NULL, 'time', 3, 1499256677, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 2, 20, 25, 'vista1', 0.00, '', 0, 0, 0, 0, 0, '', 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 150, 1499256783, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, NULL, '', 0, 0, '', 0, 0, 0),
(485, 0, 'varrrr', 'em9vaQ==', 'tuuuu', 0, '03-04-1990', NULL, 3, '1990', 'Abseron', '', 0, 5, 'Qonaq', 0, '05-07-2017', 300, 10, 0, 0, 0, '', '', '168.235.200.58', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/31.0.1650.63 Safari/537.36', 0, 0, 0, 0, '0', '', '2017-10-04 20:44:59', NULL, 'varrrr', 1499275911, 0, 0, 0, 30, 2, 1, NULL, 5, 0, '', '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, NULL, 'time', 1, 1499275853, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 6, 20, 25, 'vista1', 0.00, '', 0, 0, 0, 0, 0, '', 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 150, 1499258489, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, NULL, '', 0, 0, '', 0, 0, 0),
(486, 0, 'bshshsb', 'YWJhaHNoc2g=', 'sbsbsbsb', 0, '03-04-1990', NULL, 3, '1990', 'Abseron', 0x78616e736e6e73, 0, 5, 'Qonaq', 0, '08-07-2017', 300, 10, 0, 0, 0, '', '', '77.244.119.162', 'Mozilla/5.0 (Linux; Android 5.1; N9200s Build/LMY47I; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/43.0.2357.121 Mobile Safari/537.36', 0, 0, 0, 0, '0', '', '2017-10-04 20:44:59', NULL, 'bshshsb', 1502966590, 0, 0, 0, 30, 2, 1, NULL, 5, 0, '', '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, NULL, 'time', 3, 1502966558, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 4, 20, 25, 'vista1', 0.00, '', 0, 0, 0, 0, 0, '', 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 150, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, NULL, '', 0, 0, '', 0, 0, 0),
(487, 0, '', 'dHR0YWdhZ3M=', 'sbzhhz', 0, '03-05-1999', NULL, 3, '1999', 'Abseron', '', 0, 5, 'Qonaq', 0, '18-07-2017', 300, 10, 0, 0, 0, '', '', '8.37.232.236', 'Mozilla/5.0 (Linux; U; Android 4.1.2; en-US; GT-S5310 Build/JZO54K) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 UCBrowser/11.3.8.976 U3/0.8.0 Mobile Safari/534.30', 0, 0, 0, 0, '0', '', '2017-10-04 20:44:59', NULL, '', 1500394695, 0, 0, 0, 0, 2, 1, NULL, 5, 0, '', '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, NULL, 'time', 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 1, 20, 25, 'vista1', 0.00, '', 0, 0, 0, 0, 0, '', 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 150, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, NULL, '', 0, 0, '', 0, 0, 0);
INSERT INTO `users` (`id`, `giris`, `user`, `pass`, `name`, `sex`, `birth`, `nomre`, `meqsed`, `year`, `city`, `infa`, `roompost`, `posts`, `status`, `xstatus`, `date`, `avr`, `max`, `level`, `panel`, `kik`, `whokik`, `whykik`, `user_ip`, `user_soft`, `inv`, `say`, `credits`, `gposts`, `img`, `image_fon`, `visit`, `ruser`, `latuser`, `time`, `time_active`, `time_active1`, `time_active2`, `room`, `smiles`, `safe`, `nastroi`, `bal`, `banned`, `avtootvet`, `para`, `reng`, `umnik`, `mektub_qebulu`, `fsize`, `rutbe`, `byeotv`, `gizlilik`, `con`, `mesaj`, `delmsg`, `zn`, `tox`, `mexvi`, `rnikler`, `shrift`, `requ`, `onsex`, `ontime`, `xal`, `ses`, `msn`, `qefes`, `forum`, `fpost`, `fr_limit`, `beyen`, `stsonline`, `zn_time`, `st_bal_time`, `st_bal_count`, `st_bal_count1`, `version`, `action`, `array`, `rn_time`, `rn_nik`, `meqa`, `meqa_time`, `shekil`, `infostat`, `nnposts`, `anket`, `ankets`, `avtootvetm`, `vanket`, `spam`, `sms`, `ssms`, `dehlizi`, `onphp`, `infophp`, `mduelphp`, `hesabphp`, `znakalphp`, `chatphp`, `meqanickphp`, `forumphp`, `hekayephp`, `statphp`, `msgphp`, `profilephp`, `cabinetphp`, `changephp`, `dost`, `anketb`, `azn_show`, `dominoreytinq`, `dominodayam`, `mafia`, `mafia_cp`, `mafia_write`, `mafia_act`, `bot`, `qazan2`, `qazan`, `arxivim2`, `arxivim`, `fut_level`, `qeyd_micro`, `azn`, `color_nick_time`, `color_nick`, `st1`, `stat`, `baxis`, `youtibe`, `group`, `group_cp`, `group_write`, `group_act`, `group_call`, `elit`, `mafia_ap`, `mafia_xal`, `mafia_olu`, `mafia_kart`, `mafia_level`, `mafiaxal`, `apxaric`) VALUES
(488, 0, 'ISMA_BIKES', 'S3V6ZXkyOTgzNg==', 'Kuzey', 0, '28-07-1992', NULL, 3, '1992', 'Baki', 0x4261c59f6b616c6172c4b16e61206b656e64696e64656e2066617a6c61206465c49f6572207665726d652e205961206f6e75206b6179626564657273696e2c207961206461206b656e64696e69206d6168766564657273696e2e205465726b206564656e64656e20616cc4b16e6163616b20656e2062c3bc79c3bc6b20696e74696b616d2c206f6e61206b75706b7572752c20736576676973697a2067c3b67a6c65726c652062616b6d616b74c4b1722e, 0, 5, 'Qonaq', 0, '21-07-2017', 300, 10, 0, 0, 0, '', '', '62.217.152.50', 'Opera/9.80 (Windows NT 6.1; WOW64; U; az) Presto/2.10.289 Version/12.00', 0, 0, 0, 0, '0', '', '2017-10-04 20:44:59', NULL, 'isma_bikes', 1501531709, 0, 0, 0, 28, 2, 1, NULL, 105, 0, '', '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, NULL, 'time', 3, 1501531706, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 4, 20, 25, 'vista1', 0.00, '', 0, 0, 0, 0, 0, '', 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 150, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, NULL, '', 0, 0, '', 0, 0, 0),
(492, 0, 'gththrht', 'aHRyaHRyaHQ=', 'hthtrhth', 0, '01-02-1989', NULL, 3, '1989', 'Abseron', 0x74727468747268747268, 0, 5, 'Qonaq', 0, '01-08-2017', 300, 10, 0, 0, 0, '', '', '62.217.152.50', 'Opera/9.80 (Windows NT 6.1; WOW64; U; az) Presto/2.10.289 Version/12.00', 0, 0, 0, 0, '0', '', '2017-10-04 20:44:59', NULL, 'gththrht', 1501534156, 0, 0, 0, 30, 2, 1, NULL, 5, 0, '', '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, NULL, 'time', 3, 1501534156, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 1, 20, 25, 'vista1', 0.00, '', 0, 0, 0, 0, 0, '', 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 150, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, NULL, '', 0, 0, '', 0, 0, 0),
(489, 0, 'sgsgeggw', 'd3dnd2dncw==', 'gsgsg', 0, '06-10-1999', NULL, 3, '1999', 'Abseron', '', 0, 5, 'Qonaq', 0, '22-07-2017', 300, 10, 0, 0, 0, '', '', '212.47.147.94', 'Mozilla/5.0 (Linux; U; Android 6.0.1; en-US; SM-G532F Build/MMB29T) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 UCBrowser/11.3.8.976 U3/0.8.0 Mobile Safari/534.30', 0, 0, 0, 0, '0', '', '2017-10-04 20:44:59', NULL, 'sgsgeggw', 1500708742, 0, 0, 0, 30, 2, 1, NULL, 5, 0, '', '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, NULL, 'time', 3, 1500708691, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 1, 20, 25, 'vista1', 0.00, '', 0, 0, 0, 0, 0, '', 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 150, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, NULL, '', 0, 0, '', 0, 0, 0),
(490, 0, '_volk', 'MTIzNA==', 'volk', 0, '06-08-1992', NULL, 3, '1992', 'Abseron', 0x73616465, 0, 5, 'Qonaq', 0, '23-07-2017', 300, 10, 0, 0, 0, '', '', '158.181.43.91', 'Mozilla/5.0 (Linux; Android 4.4.4; G620S-L01 Build/HuaweiG620S-L01) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/33.0.1750.117 Mobile Safari/537.36 OPR/20.0.1396.72047', 0, 0, 0, 0, '0', '', '2017-10-04 20:44:59', NULL, '_volk', 1500762205, 0, 0, 0, 28, 2, 1, NULL, 5, 0, '', '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, NULL, 'time', 3, 1500762205, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 3, 20, 25, 'vista1', 0.00, '', 0, 0, 0, 0, 0, '', 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 150, 1500762251, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, NULL, '', 0, 0, '', 0, 0, 0),
(491, 0, 'xmmma', 'MTExMQ==', '......', 0, '02-02-1988', NULL, 3, '1988', 'Abseron', 0x2e2e2e2e2e2e2e, 0, 5, 'Qonaq', 0, '27-07-2017', 300, 10, 0, 0, 0, '', '', '77.244.121.22', 'Opera/9.80 (Android; Opera Mini/20.0.2254/66.247; U; az) Presto/2.12.423 Version/12.16', 0, 0, 0, 0, '0', '', '2017-10-04 20:44:59', NULL, 'xmmma', 1501113092, 0, 0, 0, 28, 2, 1, NULL, 5, 0, '', '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, NULL, 'time', 3, 1501113037, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 1, 20, 25, 'vista1', 0.00, '', 0, 0, 0, 0, 0, '', 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 150, 1501113187, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, NULL, '', 0, 0, '', 0, 0, 0),
(493, 0, 'xacmaz', 'c2hzaHNoc3Nn', 'fayiq', 0, '18-11-1990', NULL, 0, '1990', 'Celilabad', '', 0, 5, 'Qonaq', 0, '09-08-2017', 300, 10, 0, 0, 0, '', '', '94.20.93.248', 'Mozilla/5.0 (Linux; U; Android 6.0.1; en-US; SM-G532F Build/MMB29T) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 UCBrowser/11.3.8.976 U3/0.8.0 Mobile Safari/534.30', 0, 0, 0, 0, '0', '', '2017-10-04 20:44:59', NULL, 'xacmaz', 1502292737, 0, 0, 0, 28, 2, 1, NULL, 5, 0, '', '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, NULL, 'time', 3, 1502292679, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 1, 20, 25, 'vista1', 0.00, '', 0, 0, 0, 0, 0, '', 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 150, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, NULL, '', 0, 0, '', 0, 0, 0),
(494, 0, 'Ghhhjj', 'SGJqamo=', 'Hhjjj', 0, '05-06-1991', NULL, 3, '1991', 'Abseron', 0x4726233238373b6868, 0, 5, 'Qonaq', 0, '21-08-2017', 300, 10, 0, 0, 0, '', '', '185.30.88.16', 'Mozilla/5.0 (Linux; Android 5.0.2; SM-G530H Build/LRX22G) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.107 Mobile Safari/537.36', 0, 0, 0, 0, '0', '', '2017-09-07 09:07:46', NULL, 'ghhhjj', 1503342273, 0, 0, 0, 30, 2, 1, NULL, 5, 0, '', '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, NULL, 'time', 3, 1503342237, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 1, 20, 25, 'vista1', 0.00, '', 0, 0, 0, 0, 0, '', 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 150, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, NULL, '', 0, 0, '', 0, 0, 0),
(495, 0, 'Ggghj', 'SGhqampraw==', 'Ghjkkl', 0, '04-08-1990', NULL, 3, '1990', 'Abseron', 0x4768686a, 0, 5, 'Qonaq', 0, '24-08-2017', 300, 10, 0, 0, 0, '', '', '194.135.152.41', 'Mozilla/5.0 (Linux; Android 4.2.2; HUAWEI Y320-U10 Build/HUAWEIY320-U10) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.91 Mobile Safari/537.36 OPR/42.7.2246.114996', 0, 0, 0, 0, '0', '', '2017-10-04 20:46:28', NULL, 'ggghj', 1503578455, 0, 0, 0, 28, 2, 1, NULL, 5, 0, '', '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, NULL, 'time', 3, 1503578433, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 1, 20, 25, 'vista1', 0.00, '', 0, 0, 0, 0, 0, '', 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 150, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, NULL, '', 0, 0, '', 0, 0, 0),
(496, 0, 'By_MaGa', 'bWFnYQ==', 'MaGa', 0, '18-04-1999', NULL, 3, '1999', 'Abseron', 0x78, 0, 5, 'Qonaq', 0, '24-08-2017', 300, 10, 0, 0, 0, '', '', '185.30.88.204', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.101 Safari/537.36', 0, 0, 0, 0, '0', '', '2017-10-04 20:44:59', NULL, 'by_maga', 1503578754, 0, 0, 0, 30, 2, 1, NULL, 5, 0, '', '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, NULL, 'time', 3, 1503578707, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 1, 20, 25, 'vista1', 0.00, '', 0, 0, 0, 0, 0, '', 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 150, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, NULL, '', 0, 0, '', 0, 0, 0),
(498, 0, 'cffc', 'Y2NjZg==', 'fcffg', 0, '06-08-1987', NULL, 3, '1987', 'Abseron', 0x67676726233238373b, 0, 5, 'Qonaq', 0, '21-09-2017', 300, 10, 0, 0, 0, '', '', '94.20.65.145', 'Mozilla/5.0 (Linux; U; Android 6.0.1; en-US; SM-G900F Build/MMB29M) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 UCBrowser/11.4.5.1005 U3/0.8.0 Mobile Safari/534.30', 0, 0, 0, 0, '0', '', '2017-10-05 05:42:54', NULL, 'cffc', 1506012883, 0, 0, 71, 30, 2, 1, NULL, 5, 0, '', '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, NULL, 'time', 3, 1506012877, 0, 0, 1000, 0, 0, 0, 0, 0, '', 0, 2, 20, 25, 'vista1', 0.00, '', 0, 0, 0, 0, 0, '', 0, 0, '', '', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 150, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, NULL, '', 0, 0, '', 0, 0, 0),
(499, 0, 'Ureyim_olarsan', 'MTIxMjEyYXplZQ==', 'X', 0, '01-01-1990', NULL, 3, '1990', 'Abseron', 0x53616465, 0, 5, 'Qonaq', 0, '22-09-2017', 300, 10, 0, 0, 0, '', '', '194.135.152.253', 'Mozilla/5.0 (Linux; Android 6.0.1; SAMSUNG SM-G800H Build/MMB29M) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/5.4 Chrome/51.0.2704.106 Mobile Safari/537.36', 0, 0, 0, 0, '0', '', '2017-10-04 20:46:28', NULL, 'ureyim_olarsan', 1506034354, 0, 0, 62, 30, 2, 1, NULL, 5, 0, '', '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, NULL, 'time', 1, 1506034340, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 2, 20, 25, 'vista1', 0.00, '', 0, 0, 0, 0, 0, '', 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 150, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, NULL, '', 0, 0, '', 0, 0, 0),
(500, 0, 'sabahinxeyr', 'c2FiYWhkaQ==', 'gunorta', 0, '05-06-1990', NULL, 3, '1990', 'Abseron', 0x676763637667, 0, 5, 'Qonaq', 0, '29-09-2017', 300, 10, 0, 0, 0, '', '', '5.44.36.162', 'Mozilla/5.0 (Linux; U; Android 4.2.2; ru-ru; HUAWEI Y511-U10 Build/HUAWEIY511-U10) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Mobile Safari/534.30', 0, 0, 0, 0, '0', '', '2017-10-04 20:46:28', NULL, 'sabahinxeyr', 1506693043, 0, 0, 133, 28, 2, 1, NULL, 0, 0, '', '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, NULL, 'time', 3, 1506693005, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 3, 20, 25, 'vista1', 0.00, '', 0, 0, 0, 0, 0, '', 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 150, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, NULL, '', 0, 0, '', 0, 0, 0),
(502, 0, 'Sergio', 'YTEyMzQ1YQ==', 'Emin', 0, '02-01-1993', NULL, 3, '1993', 'Abseron', 0x3f3f3f3f, 0, 5, 'Qonaq', 0, '30-09-2017', 300, 10, 0, 0, 0, '', '', '5.44.39.134', 'Mozilla/5.0 (Linux; Android 7.0; SAMSUNG SM-A310F Build/NRD90M) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/5.4 Chrome/51.0.2704.106 Mobile Safari/537.36', 0, 0, 0, 0, '0', '', '2017-10-04 20:46:28', NULL, 'sergio', 1506773387, 0, 0, 121, 30, 2, 1, NULL, 55, 0, '', '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, NULL, 'time', 3, 1506773377, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 3, 20, 25, 'vista1', 0.00, '', 0, 0, 0, 0, 0, '', 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 150, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, NULL, '', 0, 0, '', 0, 0, 0),
(501, 0, 'Hdjdjjdjd', 'TmZuZG5kbmRu', 'Nfnfnfndn', 0, '06-06-1991', NULL, 3, '1991', 'Abseron', 0x4a6a646a646a64646b, 0, 5, 'Qonaq', 0, '29-09-2017', 300, 10, 0, 0, 0, '', '', '185.30.88.110', 'Mozilla/5.0 (Linux; Android 5.0.2; SM-G530H Build/LRX22G) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.98 Mobile Safari/537.36', 0, 0, 0, 0, '0', '', '2017-10-04 20:46:28', NULL, 'hdjdjjdjd', 1506690525, 0, 0, 67, 30, 2, 1, NULL, 5, 0, '', '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, NULL, 'time', 3, 1506690490, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 2, 20, 25, 'vista1', 0.00, '', 0, 0, 0, 0, 0, '', 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 150, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, NULL, '', 0, 0, '', 0, 0, 0),
(503, 0, 'azadd', 'YXphZDEy', 'Azad', 0, '18-01-1995', NULL, 3, '1995', 'Abseron', 0x737361, 0, 5, 'Qonaq', 0, '05-10-2017', 300, 10, 0, 0, 0, '', '', '107.167.104.143', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.110 Safari/537.36 OPR/36.0.2130.65', 0, 0, 0, 0, '0', '', '2017-10-04 23:34:34', NULL, 'azadd', 1507149274, 0, 0, 0, 30, 2, 1, NULL, 5, 0, '', '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, NULL, 'time', 3, 1507149274, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 1, 20, 25, 'vista1', 0.00, '', 0, 0, 0, 0, 0, '', 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 150, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, NULL, '', 0, 0, '', 0, 0, 0),
(504, 0, 'UnuDulmaZ!', 'MTExMQ==', '....', 0, '02-02-1988', NULL, 3, '1988', 'Baki', 0x2e2e2e2e2e, 0, 6, 'Qonaq', 0, '05-10-2017', 300, 10, 0, 0, 0, '', '', '107.167.107.5', 'Opera/9.80 (Android; Opera Mini/29.0.2254/71.119; U; az) Presto/2.12.423 Version/12.16', 0, 0, 0, 0, '0', '', '2020-08-24 08:31:16', NULL, 'unudulmaz!', 1507153260, 0, 0, 62, 28, 2, 1, NULL, 5, 0, '', '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, NULL, 'time', 3, 1507153260, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 2, 20, 25, 'vista1', 0.02, '', 0, 0, 0, 0, 0, '', 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 150, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, NULL, '', 0, 0, '', 0, 0, 0),
(505, 0, 'sasasas', 'c2FzYXM=', 'sasas', 0, '04-03-1991', NULL, 3, '1991', 'Saatli', 0x7361736173617361, 0, 5, 'Qonaq', 0, '05-10-2017', 300, 10, 0, 0, 0, '', '', '91.191.198.88', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.137 YaBrowser/17.4.0.2461 Yowser/2.5 Safari/537.36', 0, 0, 0, 0, '0', '', '2020-08-24 08:31:16', NULL, 'sasasas', 1507163368, 0, 0, 1485, 28, 2, 1, NULL, 10, 0, '', '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, NULL, 'time', 3, 1507163345, 0, 0, 1000, 0, 0, 0, 0, 0, '', 0, 24, 20, 25, 'vista1', 0.00, '', 0, 0, 0, 0, 0, '', 0, 0, '', '', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 150, 1507163479, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, NULL, '', 0, 0, '', 0, 0, 0),
(506, 0, 'Ruslandata', 'UjEyMzMyMQ==', 'Ruslan', 0, '05-06-1997', NULL, 3, '1997', 'Abseron', 0x5368656a656a656a6e65, 0, 5, 'Qonaq', 0, '05-10-2017', 300, 10, 0, 0, 0, '', '', '185.40.33.205', 'Mozilla/5.0 (Linux; Android 7.0; SM-A310F Build/NRD90M) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.98 Mobile Safari/537.36', 0, 0, 0, 0, '0', '', '2020-08-24 08:31:16', NULL, 'ruslandata', 1507162755, 0, 0, 63, 30, 2, 1, NULL, 5, 0, '', '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, NULL, 'time', 3, 1507162746, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 2, 20, 25, 'win', 0.00, '', 0, 0, 0, 0, 0, '', 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 150, 1507162815, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, NULL, '', 0, 0, '', 0, 0, 0),
(507, 0, 'Canann', 'MTIxMjEyYXp6', '???', 0, '01-01-1990', NULL, 3, '1990', 'Abseron', 0x5361646565, 0, 7, 'Qonaq', 0, '05-10-2017', 300, 10, 0, 0, 0, '', '', '185.30.91.220', 'Mozilla/5.0 (Linux; Android 6.0.1; SAMSUNG SM-G800H Build/MMB29M) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/5.4 Chrome/51.0.2704.106 Mobile Safari/537.36', 0, 0, 0, 0, '0', '', '2020-08-24 08:31:16', NULL, 'canann', 1507194088, 0, 0, 249, 30, 2, 1, NULL, 5, 0, '', '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, NULL, 'time', 1, 1507194088, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 5, 20, 25, 'vista1', 0.04, '', 0, 0, 0, 0, 0, '', 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 150, 1507182473, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, NULL, '', 0, 0, '', 0, 0, 0),
(510, 0, '!mPoSsiBLe', 'NDYzNDI2OQ==', 'Ziko', 0, '07-08-1988', NULL, 3, '1988', 'Abseron', 0x2e2e2e2e2e2e6865722026233335313b65792062656c652073616465206f6c652062696c6d657a2121, 0, 5, 'Qonaq', 0, '05-10-2017', 300, 10, 0, 0, 0, '', '', '5.44.37.202', 'Mozilla/5.0 (Linux; Android 5.1.1; D2502 Build/19.4.A.0.182) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.116 Mobile Safari/537.36', 0, 0, 0, 0, '0', '', '2020-08-19 09:50:01', NULL, '!mpossible', 1507199306, 0, 0, 0, 30, 2, 1, NULL, 5, 0, '', '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, NULL, 'time', 3, 1507199271, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 1, 20, 25, 'vista1', 0.00, '', 0, 0, 0, 0, 0, '', 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 150, 1507199408, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, NULL, '', 0, 0, '', 0, 0, 0),
(508, 0, 'Hhvvvvvvv', 'TG1tbmJi', 'Mmbbbbb', 0, '02-02-1991', NULL, 2, '1991', 'Abseron', 0x4b6b6b6b6a, 0, 50, 'Qonaq', 0, '05-10-2017', 300, 10, 0, 0, 0, '', '', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 0, 0, 0, 40, '0', '', '2023-04-06 02:52:23', NULL, 'hhvvvvvvv', 1680738743, 835, 0, 68, 28, 2, 1, NULL, 40, 0, '', '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, '', 'time', 3, 1680738730, 0, 0, 0, 0, 0, 0, 0, 0, 'test', 0, 9, 20, 25, 'win', 0.00, '', 0, 0, 0, 0, 0, '', 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 150, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, NULL, '', 0, 0, '', 0, 0, 0),
(509, 0, 'nnnnj', 'ZGJ6aHh6', 'bdbxh', 0, '06-07-1987', NULL, 3, '1987', 'Abseron', 0x6278627862787a, 0, 5, 'Qonaq', 0, '05-10-2017', 300, 10, 0, 0, 0, '', '', '94.20.65.52', 'Mozilla/5.0 (Linux; U; Android 6.0.1; en-US; SM-G900F Build/MMB29M) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 UCBrowser/11.4.5.1005 U3/0.8.0 Mobile Safari/534.30', 0, 0, 0, 0, '0', '', '2020-08-19 09:50:01', NULL, 'nnnnj', 1507192914, 0, 0, 0, 28, 2, 1, NULL, 10, 0, '', '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, NULL, 'time', 3, 1507192862, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 1, 20, 25, 'vista1', 0.00, '', 0, 0, 0, 0, 0, '', 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 150, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, NULL, '', 0, 0, '', 0, 0, 0),
(511, 0, 'Pionses', 'OTg5a2s=', 'Hecde', 0, '01-01-1996', NULL, 3, '1996', 'Abseron', 0x4865636565, 0, 5, 'Qonaq', 0, '05-10-2017', 300, 10, 0, 0, 0, '', '', '5.191.22.119', 'Mozilla/5.0 (Linux; Android 6.0.1; SAMSUNG SM-J510F Build/MMB29M) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/4.0 Chrome/44.0.2403.133 Mobile Safari/537.36', 0, 0, 0, 0, '0', '', '2020-08-24 08:31:16', NULL, 'pionses', 1507199481, 0, 0, 60, 30, 2, 1, NULL, 5, 0, '', '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, NULL, 'time', 3, 1507199456, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 2, 20, 25, 'vista2', 0.00, '', 0, 0, 0, 0, 0, '', 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 150, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, NULL, '', 0, 0, '', 0, 0, 0),
(512, 0, 'Volk', 'MTIzNDVzYWxhbQ==', 'volk', 0, '07-08-1992', NULL, 3, '1992', 'Abseron', 0x73616465, 0, 5, 'Qonaq', 0, '05-10-2017', 300, 10, 0, 0, 0, '', '', '158.181.40.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 0, 0, 0, 0, '0', '', '2020-08-24 08:31:16', NULL, 'volk', 1507205739, 0, 0, 69, 28, 2, 1, NULL, 5, 0, '', '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, NULL, 'time', 3, 1507205725, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 2, 20, 25, 'vista1', 0.00, '', 0, 0, 0, 0, 0, '', 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 150, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, NULL, '', 0, 0, '', 0, 0, 0),
(513, 0, 'Sevgilim', 'MTIzNA==', 'Ã–zÃ¼ bilir', 1, '04-03-1998', '', 2, '1998', 'Abseron', 0x53616c616d, 0, 9, 'Qonaq', 0, '19-08-2020', 300, 10, 0, 0, 0, '', '', '158.181.45.177', 'Mozilla/5.0 (Linux; Android 9; Redmi 8A) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.125 Mobile Safari/537.36', 0, 0, 0, 0, '0', '', '2020-08-24 08:31:16', NULL, 'sevgilim', 1597836605, 0, 0, 412, 28, 2, 1, NULL, 5, 0, '', '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, NULL, 'time', 0, 1597836548, 0, 0, 1000, 0, 0, 0, 0, 0, '', 0, 5, 20, 25, 'vista1', 0.08, '', 0, 0, 0, 0, 0, '', 0, 0, '', '', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 150, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, NULL, '', 0, 0, '', 0, 0, 0),
(514, 0, 'Kenan22', 'UGFyb2w1NQ==', 'Kenan', 0, '06-06-1990', NULL, 3, '1990', 'Abseron', 0x2e2e2e2e2e, 0, 5, 'Qonaq', 0, '23-08-2020', 300, 10, 0, 0, 0, '', '', '5.191.51.194', 'Mozilla/5.0 (Linux; Android 10; SM-A107F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.96 Mobile Safari/537.36', 0, 0, 0, 0, '0', '', '2020-08-24 08:31:16', NULL, 'kenan22', 1598200902, 0, 0, 0, 28, 2, 1, NULL, 5, 0, '', '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, NULL, 'time', 3, 1598200868, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 1, 20, 25, 'vista1', 0.00, '', 0, 0, 0, 0, 0, '', 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 150, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, NULL, '', 0, 0, '', 0, 0, 0),
(515, 0, 'KR!STaL', 'RWVlZQ==', 'Nihat', 0, '06-06-1999', NULL, 3, '1999', 'Abseron', 0x42696c656e2042696c6972, 0, 5, 'Qonaq', 0, '23-08-2020', 300, 10, 0, 0, 0, '', '', '5.197.223.93', 'Mozilla/5.0 (Linux; Android 10; Redmi Note 7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.125 Mobile Safari/537.36', 0, 0, 0, 0, '0', '', '2020-08-24 08:31:16', NULL, 'kr!stal', 1598201421, 0, 61, 61, 28, 2, 1, NULL, 5, 0, '', '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, NULL, 'time', 3, 1598201367, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 2, 20, 25, 'win', 0.00, '', 0, 0, 0, 0, 0, '', 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 150, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, NULL, '', 0, 0, '', 0, 0, 0),
(516, 0, 'Aghayeff', 'MTIzNDV4', 'cms', 0, '04-04-1999', NULL, 3, '1999', 'Abseron', 0x55736572, 0, 5, 'Qonaq', 0, '24-08-2020', 300, 10, 0, 0, 0, '', '', '5.191.18.69', 'Mozilla/5.0 (Linux; Android 8.1.0; Redmi 5A) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.125 Mobile Safari/537.36', 0, 0, 0, 0, '0', '', '2023-04-06 02:05:38', NULL, 'aghayeff', 1598247144, 0, 61, 61, 30, 2, 1, NULL, 5, 0, '', '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, NULL, 'time', 3, 1598247137, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 2, 20, 25, 'vista1', 0.00, '', 0, 0, 0, 0, 0, '', 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 150, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, NULL, '', 0, 0, '', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_dom`
--

CREATE TABLE IF NOT EXISTS `users_dom` (
  `idim` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(50) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `daslarim` varchar(500) NOT NULL DEFAULT '',
  `das` int(11) NOT NULL DEFAULT '0',
  `domino` int(11) NOT NULL DEFAULT '0',
  `dgedis` int(11) NOT NULL DEFAULT '0',
  `pas` int(11) NOT NULL DEFAULT '0',
  `gedistarix` int(11) NOT NULL DEFAULT '0',
  `dominouddu` int(11) NOT NULL DEFAULT '0',
  `dominoqat` int(11) NOT NULL DEFAULT '0',
  `oyunmesaji` varchar(200) NOT NULL,
  `kohnepas` int(11) NOT NULL DEFAULT '0',
  `dominoxal` int(11) NOT NULL DEFAULT '0',
  `dominoreytinq` int(11) NOT NULL DEFAULT '200',
  `dgedistarix` int(11) NOT NULL DEFAULT '0',
  `dominodayam` int(11) NOT NULL DEFAULT '0',
  `id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idim`),
  KEY `idim` (`idim`),
  KEY `user` (`user`(15))
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 PACK_KEYS=0 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `users_dom`
--

INSERT INTO `users_dom` (`idim`, `user`, `daslarim`, `das`, `domino`, `dgedis`, `pas`, `gedistarix`, `dominouddu`, `dominoqat`, `oyunmesaji`, `kohnepas`, `dominoxal`, `dominoreytinq`, `dgedistarix`, `dominodayam`, `id`) VALUES
(32, 'Kayott', '', 0, 21, 0, 0, 0, 0, 0, '', 0, 0, 200, 0, 0, 1187),
(33, 'By_ELiK-', '', 0, 22, 0, 0, 0, 0, 0, '', 0, 0, 200, 0, 0, 1033),
(35, 'KARA_SEVDA', '', 0, 24, 0, 0, 0, 0, 0, '', 0, 0, 200, 0, 0, 87),
(37, 'Menimsen', '', 0, 26, 0, 0, 0, 0, 0, '', 0, 0, 200, 0, 0, 138),
(38, 'idmaci', '', 0, 27, 0, 0, 0, 0, 0, '', 0, 0, 200, 0, 0, 230),
(39, 'NURA', '', 0, 28, 0, 0, 0, 0, 0, '', 0, 0, 200, 0, 0, 46),
(42, 'Okyan', '', 0, 31, 0, 0, 0, 0, 0, '', 0, 0, 200, 0, 0, 248),
(45, 'ByON', '', 0, 34, 0, 0, 0, 0, 0, '', 0, 0, 200, 0, 0, 400);

-- --------------------------------------------------------

--
-- Table structure for table `user_books`
--

CREATE TABLE IF NOT EXISTS `user_books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usid` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `body` blob NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `like` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `read` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `user_books`
--


-- --------------------------------------------------------

--
-- Table structure for table `user_book_likes`
--

CREATE TABLE IF NOT EXISTS `user_book_likes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `book_id` int(11) NOT NULL,
  `usid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `user_book_likes`
--


-- --------------------------------------------------------

--
-- Table structure for table `videolar`
--

CREATE TABLE IF NOT EXISTS `videolar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pos` text CHARACTER SET latin1 NOT NULL,
  `img` text NOT NULL,
  `bolme` varchar(50) NOT NULL DEFAULT '',
  `who` varchar(40) NOT NULL DEFAULT '',
  `vaxt` varchar(30) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `bax` int(100) NOT NULL,
  `kim` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `down` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `videolar`
--


-- --------------------------------------------------------

--
-- Table structure for table `video_bolme`
--

CREATE TABLE IF NOT EXISTS `video_bolme` (
  `bolme` smallint(5) NOT NULL DEFAULT '0',
  `name` blob,
  PRIMARY KEY (`bolme`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `video_bolme`
--

INSERT INTO `video_bolme` (`bolme`, `name`) VALUES
(0, 0x417a657269206b6c69706c6572),
(1, 0x527573206b6c69706c6572),
(2, 0x4d656b7465626c692071697a6c6172),
(3, 0x75736171),
(4, 0x5161726973697120766964656f6c6172),
(5, 0x67756c6d656c69),
(6, 0x64696e69);

-- --------------------------------------------------------

--
-- Table structure for table `viewanket`
--

CREATE TABLE IF NOT EXISTS `viewanket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(50) DEFAULT NULL,
  `usid` int(11) DEFAULT '0',
  `myid` int(11) DEFAULT '0',
  `vanket` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `usid` (`usid`,`myid`),
  KEY `myid` (`myid`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251 PACK_KEYS=0 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `viewanket`
--


-- --------------------------------------------------------

--
-- Table structure for table `vopros`
--

CREATE TABLE IF NOT EXISTS `vopros` (
  `klu4` tinyint(1) NOT NULL DEFAULT '0',
  `number` int(11) NOT NULL DEFAULT '0',
  `time` int(11) NOT NULL DEFAULT '0',
  `question` blob NOT NULL,
  `answer` varchar(100) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `tran` varchar(100) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`klu4`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vopros`
--

INSERT INTO `vopros` (`klu4`, `number`, `time`, `question`, `answer`, `tran`) VALUES
(1, 0, 1597863613, 0x4861636920516172616e696e206172766164696e696e20616469206e65206964693f2e20283c623e3520686572663c2f623e29, 'Tukez', 'Tukez');

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE IF NOT EXISTS `votes` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `avtor` varchar(20) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `date` varchar(10) NOT NULL DEFAULT '',
  `vopros` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `v1` varchar(100) NOT NULL DEFAULT '',
  `v2` varchar(100) NOT NULL DEFAULT '',
  `v3` varchar(100) NOT NULL DEFAULT '',
  `v4` varchar(100) NOT NULL DEFAULT '',
  `v5` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `votes`
--


-- --------------------------------------------------------

--
-- Table structure for table `voting`
--

CREATE TABLE IF NOT EXISTS `voting` (
  `klu4` int(3) NOT NULL AUTO_INCREMENT,
  `vote` int(2) NOT NULL DEFAULT '0',
  `date` varchar(10) NOT NULL DEFAULT '',
  `var` smallint(1) NOT NULL DEFAULT '0',
  `who` int(5) NOT NULL DEFAULT '0',
  `tarix` varchar(100) NOT NULL,
  PRIMARY KEY (`klu4`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `voting`
--


-- --------------------------------------------------------

--
-- Table structure for table `vstrechi`
--

CREATE TABLE IF NOT EXISTS `vstrechi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` text NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `organizatory` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `vstrechi`
--


-- --------------------------------------------------------

--
-- Table structure for table `xeberler`
--

CREATE TABLE IF NOT EXISTS `xeberler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `yazan` text NOT NULL,
  `basliq` blob NOT NULL,
  `xeber` blob NOT NULL,
  `qeyd_tarix` varchar(25) NOT NULL,
  `baxilib` int(11) NOT NULL DEFAULT '0',
  `bolme_id` int(11) NOT NULL DEFAULT '0',
  `tesdiq` int(11) NOT NULL DEFAULT '0',
  `photo` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251 PACK_KEYS=0 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `xeberler`
--


-- --------------------------------------------------------

--
-- Table structure for table `xeberler_serh`
--

CREATE TABLE IF NOT EXISTS `xeberler_serh` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_xeber` int(11) NOT NULL DEFAULT '0',
  `yazan` blob NOT NULL,
  `mesaj` blob NOT NULL,
  `time` int(11) NOT NULL DEFAULT '0',
  `date` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `xeberler_serh`
--


-- --------------------------------------------------------

--
-- Table structure for table `xeber_bolmeler`
--

CREATE TABLE IF NOT EXISTS `xeber_bolmeler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bolme` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `xeber_bolmeler`
--

INSERT INTO `xeber_bolmeler` (`id`, `bolme`) VALUES
(24, 0x556d756d69),
(26, 0x536979617369),
(35, 0x49646d616e),
(36, 0x44696e69);

-- --------------------------------------------------------

--
-- Table structure for table `xo_game`
--

CREATE TABLE IF NOT EXISTS `xo_game` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL DEFAULT '0',
  `to` int(11) NOT NULL DEFAULT '0',
  `tip` tinyint(1) NOT NULL DEFAULT '0',
  `time` varchar(15) NOT NULL DEFAULT '0',
  `de` tinyint(1) NOT NULL DEFAULT '0',
  `ge` varchar(20) NOT NULL,
  `win` int(11) NOT NULL DEFAULT '0',
  `no` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `xo_game`
--


-- --------------------------------------------------------

--
-- Table structure for table `zapiski`
--

CREATE TABLE IF NOT EXISTS `zapiski` (
  `klu4` int(11) NOT NULL AUTO_INCREMENT,
  `who` varchar(40) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `idwho` int(11) NOT NULL DEFAULT '0',
  `message` blob NOT NULL,
  `towhom` varchar(40) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `idtowhom` int(11) NOT NULL DEFAULT '0',
  `time` int(11) NOT NULL DEFAULT '0',
  `readd` tinyint(1) NOT NULL DEFAULT '0',
  `topic` varchar(80) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `date` varchar(50) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `insend` tinyint(1) NOT NULL DEFAULT '1',
  `ininc` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`klu4`),
  KEY `ininc` (`ininc`),
  KEY `idtowhom` (`idtowhom`),
  KEY `readd` (`readd`),
  KEY `idwho` (`idwho`),
  KEY `insend` (`insend`),
  KEY `idtowhom_2` (`idtowhom`,`ininc`,`readd`),
  KEY `idwho_2` (`idtowhom`,`ininc`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32663698 ;

--
-- Dumping data for table `zapiski`
--

INSERT INTO `zapiski` (`klu4`, `who`, `idwho`, `message`, `towhom`, `idtowhom`, `time`, `readd`, `topic`, `date`, `insend`, `ininc`) VALUES
(2, 'Admin', 0, 0x53616c616d203c623e5445414d3c2f623e2e2021204d656e2026233139393b6174612079656e752026233235323b7a76206f6c616e20697374696661646526233233313b696c657269206d656c756d61746c616e6426233330353b7226233330353b72616d2e3c62722f3e2053697a6520616964206f6c616e206226233235323b7426233235323b6e206d656c756d61746c617220223c753e4465686c697a6465222f2226233335303b657873692d4b6162696e65743c2f753e22206226233234363b6c6d6573696e6465207965726c6526233335313b646972696c69622e204461686120656c617665206d656c756d61746c6172206861717126233330353b6e646120206973652c20223c753e4465686c697a6465222f224d656c756d61746c61723c2f753e22206226233234363b6c6d6573696e64656469722e205374617475732c205226233235323b7462652076652e7320616c6d61712026233235323b26233233313b26233235323b6e20223c753e4465686c697a6465222f2242616c205869646d65746c6572693c2f753e222d6e6520646178696c206f6c756e2e, 'TEAM', 447, 1498127332, 0, 'Xo&#351; geldiz TEAM', '22-Jun-2017 [14:28]', 1, 1),
(5, 'Sistem', 0, 0x486f726d65746c69203c623e3c2f623e2e203c753e41444d694e3c2f753e2c2053697a692026233234363b7a20646f73746c617220736979616826233330353b7326233330353b6e64616e2073696c64692e, '', 366, 1498130447, 0, 'Dostluq', '', 1, 1),
(7, 'Admin', 0, 0x53616c616d203c623e746573742a4942633c2f623e2e2021204d656e2026233139393b6174612079656e752026233235323b7a76206f6c616e20697374696661646526233233313b696c657269206d656c756d61746c616e6426233330353b7226233330353b72616d2e3c62722f3e2053697a6520616964206f6c616e206226233235323b7426233235323b6e206d656c756d61746c617220223c753e4465686c697a6465222f2226233335303b657873692d4b6162696e65743c2f753e22206226233234363b6c6d6573696e6465207965726c6526233335313b646972696c69622e204461686120656c617665206d656c756d61746c6172206861717126233330353b6e646120206973652c20223c753e4465686c697a6465222f224d656c756d61746c61723c2f753e22206226233234363b6c6d6573696e64656469722e205374617475732c205226233235323b7462652076652e7320616c6d61712026233235323b26233233313b26233235323b6e20223c753e4465686c697a6465222f2242616c205869646d65746c6572693c2f753e222d6e6520646178696c206f6c756e2e, 'test*IBc', 449, 1498131586, 0, 'Xo&#351; geldiz test*IBc', '22-Jun-2017 [15:39]', 1, 1),
(8, 'Admin', 0, 0x53616c616d203c623e746573742a4c626c3c2f623e2e2058616e26233330353b6d21204d656e2026233139393b6174612079656e752026233235323b7a76206f6c616e20697374696661646526233233313b696c657269206d656c756d61746c616e6426233330353b7226233330353b72616d2e3c62722f3e2053697a6520616964206f6c616e206226233235323b7426233235323b6e206d656c756d61746c617220223c753e4465686c697a6465222f2226233335303b657873692d4b6162696e65743c2f753e22206226233234363b6c6d6573696e6465207965726c6526233335313b646972696c69622e204461686120656c617665206d656c756d61746c6172206861717126233330353b6e646120206973652c20223c753e4465686c697a6465222f224d656c756d61746c61723c2f753e22206226233234363b6c6d6573696e64656469722e205374617475732c205226233235323b7462652076652e7320616c6d61712026233235323b26233233313b26233235323b6e20223c753e4465686c697a6465222f2242616c205869646d65746c6572693c2f753e222d6e6520646178696c206f6c756e2e, 'test*Lbl', 450, 1498131646, 0, 'Xo&#351; geldiz test*Lbl', '22-Jun-2017 [15:40]', 1, 1),
(9, 'Admin', 0, 0x53616c616d203c623e746573742a6c65533c2f623e2e2058616e26233330353b6d21204d656e2026233139393b6174612079656e752026233235323b7a76206f6c616e20697374696661646526233233313b696c657269206d656c756d61746c616e6426233330353b7226233330353b72616d2e3c62722f3e2053697a6520616964206f6c616e206226233235323b7426233235323b6e206d656c756d61746c617220223c753e4465686c697a6465222f2226233335303b657873692d4b6162696e65743c2f753e22206226233234363b6c6d6573696e6465207965726c6526233335313b646972696c69622e204461686120656c617665206d656c756d61746c6172206861717126233330353b6e646120206973652c20223c753e4465686c697a6465222f224d656c756d61746c61723c2f753e22206226233234363b6c6d6573696e64656469722e205374617475732c205226233235323b7462652076652e7320616c6d61712026233235323b26233233313b26233235323b6e20223c753e4465686c697a6465222f2242616c205869646d65746c6572693c2f753e222d6e6520646178696c206f6c756e2e, 'test*leS', 451, 1498131646, 0, 'Xo&#351; geldiz test*leS', '22-Jun-2017 [15:40]', 1, 1),
(10, 'Admin', 0, 0x53616c616d203c623e746573742a79796e3c2f623e2e2058616e26233330353b6d21204d656e2026233139393b6174612079656e752026233235323b7a76206f6c616e20697374696661646526233233313b696c657269206d656c756d61746c616e6426233330353b7226233330353b72616d2e3c62722f3e2053697a6520616964206f6c616e206226233235323b7426233235323b6e206d656c756d61746c617220223c753e4465686c697a6465222f2226233335303b657873692d4b6162696e65743c2f753e22206226233234363b6c6d6573696e6465207965726c6526233335313b646972696c69622e204461686120656c617665206d656c756d61746c6172206861717126233330353b6e646120206973652c20223c753e4465686c697a6465222f224d656c756d61746c61723c2f753e22206226233234363b6c6d6573696e64656469722e205374617475732c205226233235323b7462652076652e7320616c6d61712026233235323b26233233313b26233235323b6e20223c753e4465686c697a6465222f2242616c205869646d65746c6572693c2f753e222d6e6520646178696c206f6c756e2e, 'test*yyn', 452, 1498131706, 0, 'Xo&#351; geldiz test*yyn', '22-Jun-2017 [15:41]', 1, 1),
(11, 'Admin', 0, 0x53616c616d203c623e746573742a62794d3c2f623e2e2058616e26233330353b6d21204d656e2026233139393b6174612079656e752026233235323b7a76206f6c616e20697374696661646526233233313b696c657269206d656c756d61746c616e6426233330353b7226233330353b72616d2e3c62722f3e2053697a6520616964206f6c616e206226233235323b7426233235323b6e206d656c756d61746c617220223c753e4465686c697a6465222f2226233335303b657873692d4b6162696e65743c2f753e22206226233234363b6c6d6573696e6465207965726c6526233335313b646972696c69622e204461686120656c617665206d656c756d61746c6172206861717126233330353b6e646120206973652c20223c753e4465686c697a6465222f224d656c756d61746c61723c2f753e22206226233234363b6c6d6573696e64656469722e205374617475732c205226233235323b7462652076652e7320616c6d61712026233235323b26233233313b26233235323b6e20223c753e4465686c697a6465222f2242616c205869646d65746c6572693c2f753e222d6e6520646178696c206f6c756e2e, 'test*byM', 453, 1498131766, 0, 'Xo&#351; geldiz test*byM', '22-Jun-2017 [15:42]', 1, 1),
(12, 'Admin', 0, 0x53616c616d203c623e746573742a5059493c2f623e2e2058616e26233330353b6d21204d656e2026233139393b6174612079656e752026233235323b7a76206f6c616e20697374696661646526233233313b696c657269206d656c756d61746c616e6426233330353b7226233330353b72616d2e3c62722f3e2053697a6520616964206f6c616e206226233235323b7426233235323b6e206d656c756d61746c617220223c753e4465686c697a6465222f2226233335303b657873692d4b6162696e65743c2f753e22206226233234363b6c6d6573696e6465207965726c6526233335313b646972696c69622e204461686120656c617665206d656c756d61746c6172206861717126233330353b6e646120206973652c20223c753e4465686c697a6465222f224d656c756d61746c61723c2f753e22206226233234363b6c6d6573696e64656469722e205374617475732c205226233235323b7462652076652e7320616c6d61712026233235323b26233233313b26233235323b6e20223c753e4465686c697a6465222f2242616c205869646d65746c6572693c2f753e222d6e6520646178696c206f6c756e2e, 'test*PYI', 454, 1498131766, 0, 'Xo&#351; geldiz test*PYI', '22-Jun-2017 [15:42]', 1, 1),
(13, 'Admin', 0, 0x53616c616d203c623e746573742a7546743c2f623e2e2021204d656e2026233139393b6174612079656e752026233235323b7a76206f6c616e20697374696661646526233233313b696c657269206d656c756d61746c616e6426233330353b7226233330353b72616d2e3c62722f3e2053697a6520616964206f6c616e206226233235323b7426233235323b6e206d656c756d61746c617220223c753e4465686c697a6465222f2226233335303b657873692d4b6162696e65743c2f753e22206226233234363b6c6d6573696e6465207965726c6526233335313b646972696c69622e204461686120656c617665206d656c756d61746c6172206861717126233330353b6e646120206973652c20223c753e4465686c697a6465222f224d656c756d61746c61723c2f753e22206226233234363b6c6d6573696e64656469722e205374617475732c205226233235323b7462652076652e7320616c6d61712026233235323b26233233313b26233235323b6e20223c753e4465686c697a6465222f2242616c205869646d65746c6572693c2f753e222d6e6520646178696c206f6c756e2e, 'test*uFt', 455, 1498131766, 0, 'Xo&#351; geldiz test*uFt', '22-Jun-2017 [15:42]', 1, 1),
(14, 'Admin', 0, 0x53616c616d203c623e746573742a6c784b3c2f623e2e2058616e26233330353b6d21204d656e2026233139393b6174612079656e752026233235323b7a76206f6c616e20697374696661646526233233313b696c657269206d656c756d61746c616e6426233330353b7226233330353b72616d2e3c62722f3e2053697a6520616964206f6c616e206226233235323b7426233235323b6e206d656c756d61746c617220223c753e4465686c697a6465222f2226233335303b657873692d4b6162696e65743c2f753e22206226233234363b6c6d6573696e6465207965726c6526233335313b646972696c69622e204461686120656c617665206d656c756d61746c6172206861717126233330353b6e646120206973652c20223c753e4465686c697a6465222f224d656c756d61746c61723c2f753e22206226233234363b6c6d6573696e64656469722e205374617475732c205226233235323b7462652076652e7320616c6d61712026233235323b26233233313b26233235323b6e20223c753e4465686c697a6465222f2242616c205869646d65746c6572693c2f753e222d6e6520646178696c206f6c756e2e, 'test*lxK', 456, 1498131826, 0, 'Xo&#351; geldiz test*lxK', '22-Jun-2017 [15:43]', 1, 1),
(15, 'Admin', 0, 0x53616c616d203c623e746573742a6a4a6a3c2f623e2e2058616e26233330353b6d21204d656e2026233139393b6174612079656e752026233235323b7a76206f6c616e20697374696661646526233233313b696c657269206d656c756d61746c616e6426233330353b7226233330353b72616d2e3c62722f3e2053697a6520616964206f6c616e206226233235323b7426233235323b6e206d656c756d61746c617220223c753e4465686c697a6465222f2226233335303b657873692d4b6162696e65743c2f753e22206226233234363b6c6d6573696e6465207965726c6526233335313b646972696c69622e204461686120656c617665206d656c756d61746c6172206861717126233330353b6e646120206973652c20223c753e4465686c697a6465222f224d656c756d61746c61723c2f753e22206226233234363b6c6d6573696e64656469722e205374617475732c205226233235323b7462652076652e7320616c6d61712026233235323b26233233313b26233235323b6e20223c753e4465686c697a6465222f2242616c205869646d65746c6572693c2f753e222d6e6520646178696c206f6c756e2e, 'test*jJj', 457, 1498131826, 0, 'Xo&#351; geldiz test*jJj', '22-Jun-2017 [15:43]', 1, 1),
(16, 'Admin', 0, 0x53616c616d203c623e746573742a6868623c2f623e2e2058616e26233330353b6d21204d656e2026233139393b6174612079656e752026233235323b7a76206f6c616e20697374696661646526233233313b696c657269206d656c756d61746c616e6426233330353b7226233330353b72616d2e3c62722f3e2053697a6520616964206f6c616e206226233235323b7426233235323b6e206d656c756d61746c617220223c753e4465686c697a6465222f2226233335303b657873692d4b6162696e65743c2f753e22206226233234363b6c6d6573696e6465207965726c6526233335313b646972696c69622e204461686120656c617665206d656c756d61746c6172206861717126233330353b6e646120206973652c20223c753e4465686c697a6465222f224d656c756d61746c61723c2f753e22206226233234363b6c6d6573696e64656469722e205374617475732c205226233235323b7462652076652e7320616c6d61712026233235323b26233233313b26233235323b6e20223c753e4465686c697a6465222f2242616c205869646d65746c6572693c2f753e222d6e6520646178696c206f6c756e2e, 'test*hhb', 458, 1498131826, 0, 'Xo&#351; geldiz test*hhb', '22-Jun-2017 [15:43]', 1, 1),
(17, 'Admin', 0, 0x53616c616d203c623e746573742a4d477a3c2f623e2e2058616e26233330353b6d21204d656e2026233139393b6174612079656e752026233235323b7a76206f6c616e20697374696661646526233233313b696c657269206d656c756d61746c616e6426233330353b7226233330353b72616d2e3c62722f3e2053697a6520616964206f6c616e206226233235323b7426233235323b6e206d656c756d61746c617220223c753e4465686c697a6465222f2226233335303b657873692d4b6162696e65743c2f753e22206226233234363b6c6d6573696e6465207965726c6526233335313b646972696c69622e204461686120656c617665206d656c756d61746c6172206861717126233330353b6e646120206973652c20223c753e4465686c697a6465222f224d656c756d61746c61723c2f753e22206226233234363b6c6d6573696e64656469722e205374617475732c205226233235323b7462652076652e7320616c6d61712026233235323b26233233313b26233235323b6e20223c753e4465686c697a6465222f2242616c205869646d65746c6572693c2f753e222d6e6520646178696c206f6c756e2e, 'test*MGz', 459, 1498131886, 0, 'Xo&#351; geldiz test*MGz', '22-Jun-2017 [15:44]', 1, 1),
(18, 'Admin', 0, 0x53616c616d203c623e746573742a5666633c2f623e2e2021204d656e2026233139393b6174612079656e752026233235323b7a76206f6c616e20697374696661646526233233313b696c657269206d656c756d61746c616e6426233330353b7226233330353b72616d2e3c62722f3e2053697a6520616964206f6c616e206226233235323b7426233235323b6e206d656c756d61746c617220223c753e4465686c697a6465222f2226233335303b657873692d4b6162696e65743c2f753e22206226233234363b6c6d6573696e6465207965726c6526233335313b646972696c69622e204461686120656c617665206d656c756d61746c6172206861717126233330353b6e646120206973652c20223c753e4465686c697a6465222f224d656c756d61746c61723c2f753e22206226233234363b6c6d6573696e64656469722e205374617475732c205226233235323b7462652076652e7320616c6d61712026233235323b26233233313b26233235323b6e20223c753e4465686c697a6465222f2242616c205869646d65746c6572693c2f753e222d6e6520646178696c206f6c756e2e, 'test*Vfc', 460, 1498131886, 0, 'Xo&#351; geldiz test*Vfc', '22-Jun-2017 [15:44]', 1, 1),
(19, 'Admin', 0, 0x53616c616d203c623e746573742a6173493c2f623e2e2021204d656e2026233139393b6174612079656e752026233235323b7a76206f6c616e20697374696661646526233233313b696c657269206d656c756d61746c616e6426233330353b7226233330353b72616d2e3c62722f3e2053697a6520616964206f6c616e206226233235323b7426233235323b6e206d656c756d61746c617220223c753e4465686c697a6465222f2226233335303b657873692d4b6162696e65743c2f753e22206226233234363b6c6d6573696e6465207965726c6526233335313b646972696c69622e204461686120656c617665206d656c756d61746c6172206861717126233330353b6e646120206973652c20223c753e4465686c697a6465222f224d656c756d61746c61723c2f753e22206226233234363b6c6d6573696e64656469722e205374617475732c205226233235323b7462652076652e7320616c6d61712026233235323b26233233313b26233235323b6e20223c753e4465686c697a6465222f2242616c205869646d65746c6572693c2f753e222d6e6520646178696c206f6c756e2e, 'test*asI', 461, 1498131948, 0, 'Xo&#351; geldiz test*asI', '22-Jun-2017 [15:45]', 1, 1),
(20, 'Admin', 0, 0x53616c616d203c623e746573742a484a443c2f623e2e2058616e26233330353b6d21204d656e2026233139393b6174612079656e752026233235323b7a76206f6c616e20697374696661646526233233313b696c657269206d656c756d61746c616e6426233330353b7226233330353b72616d2e3c62722f3e2053697a6520616964206f6c616e206226233235323b7426233235323b6e206d656c756d61746c617220223c753e4465686c697a6465222f2226233335303b657873692d4b6162696e65743c2f753e22206226233234363b6c6d6573696e6465207965726c6526233335313b646972696c69622e204461686120656c617665206d656c756d61746c6172206861717126233330353b6e646120206973652c20223c753e4465686c697a6465222f224d656c756d61746c61723c2f753e22206226233234363b6c6d6573696e64656469722e205374617475732c205226233235323b7462652076652e7320616c6d61712026233235323b26233233313b26233235323b6e20223c753e4465686c697a6465222f2242616c205869646d65746c6572693c2f753e222d6e6520646178696c206f6c756e2e, 'test*HJD', 462, 1498132008, 0, 'Xo&#351; geldiz test*HJD', '22-Jun-2017 [15:46]', 1, 1),
(21, 'Admin', 0, 0x53616c616d203c623e746573742a6e4c563c2f623e2e2058616e26233330353b6d21204d656e2026233139393b6174612079656e752026233235323b7a76206f6c616e20697374696661646526233233313b696c657269206d656c756d61746c616e6426233330353b7226233330353b72616d2e3c62722f3e2053697a6520616964206f6c616e206226233235323b7426233235323b6e206d656c756d61746c617220223c753e4465686c697a6465222f2226233335303b657873692d4b6162696e65743c2f753e22206226233234363b6c6d6573696e6465207965726c6526233335313b646972696c69622e204461686120656c617665206d656c756d61746c6172206861717126233330353b6e646120206973652c20223c753e4465686c697a6465222f224d656c756d61746c61723c2f753e22206226233234363b6c6d6573696e64656469722e205374617475732c205226233235323b7462652076652e7320616c6d61712026233235323b26233233313b26233235323b6e20223c753e4465686c697a6465222f2242616c205869646d65746c6572693c2f753e222d6e6520646178696c206f6c756e2e, 'test*nLV', 463, 1498132069, 0, 'Xo&#351; geldiz test*nLV', '22-Jun-2017 [15:47]', 1, 1),
(22, 'Admin', 0, 0x53616c616d203c623e746573742a4f53523c2f623e2e2021204d656e2026233139393b6174612079656e752026233235323b7a76206f6c616e20697374696661646526233233313b696c657269206d656c756d61746c616e6426233330353b7226233330353b72616d2e3c62722f3e2053697a6520616964206f6c616e206226233235323b7426233235323b6e206d656c756d61746c617220223c753e4465686c697a6465222f2226233335303b657873692d4b6162696e65743c2f753e22206226233234363b6c6d6573696e6465207965726c6526233335313b646972696c69622e204461686120656c617665206d656c756d61746c6172206861717126233330353b6e646120206973652c20223c753e4465686c697a6465222f224d656c756d61746c61723c2f753e22206226233234363b6c6d6573696e64656469722e205374617475732c205226233235323b7462652076652e7320616c6d61712026233235323b26233233313b26233235323b6e20223c753e4465686c697a6465222f2242616c205869646d65746c6572693c2f753e222d6e6520646178696c206f6c756e2e, 'test*OSR', 464, 1498132129, 0, 'Xo&#351; geldiz test*OSR', '22-Jun-2017 [15:48]', 1, 1),
(23, 'Admin', 0, 0x53616c616d203c623e746573742a6d72493c2f623e2e2021204d656e2026233139393b6174612079656e752026233235323b7a76206f6c616e20697374696661646526233233313b696c657269206d656c756d61746c616e6426233330353b7226233330353b72616d2e3c62722f3e2053697a6520616964206f6c616e206226233235323b7426233235323b6e206d656c756d61746c617220223c753e4465686c697a6465222f2226233335303b657873692d4b6162696e65743c2f753e22206226233234363b6c6d6573696e6465207965726c6526233335313b646972696c69622e204461686120656c617665206d656c756d61746c6172206861717126233330353b6e646120206973652c20223c753e4465686c697a6465222f224d656c756d61746c61723c2f753e22206226233234363b6c6d6573696e64656469722e205374617475732c205226233235323b7462652076652e7320616c6d61712026233235323b26233233313b26233235323b6e20223c753e4465686c697a6465222f2242616c205869646d65746c6572693c2f753e222d6e6520646178696c206f6c756e2e, 'test*mrI', 465, 1498132129, 0, 'Xo&#351; geldiz test*mrI', '22-Jun-2017 [15:48]', 1, 1),
(24, 'Admin', 0, 0x53616c616d203c623e746573742a5349723c2f623e2e2021204d656e2026233139393b6174612079656e752026233235323b7a76206f6c616e20697374696661646526233233313b696c657269206d656c756d61746c616e6426233330353b7226233330353b72616d2e3c62722f3e2053697a6520616964206f6c616e206226233235323b7426233235323b6e206d656c756d61746c617220223c753e4465686c697a6465222f2226233335303b657873692d4b6162696e65743c2f753e22206226233234363b6c6d6573696e6465207965726c6526233335313b646972696c69622e204461686120656c617665206d656c756d61746c6172206861717126233330353b6e646120206973652c20223c753e4465686c697a6465222f224d656c756d61746c61723c2f753e22206226233234363b6c6d6573696e64656469722e205374617475732c205226233235323b7462652076652e7320616c6d61712026233235323b26233233313b26233235323b6e20223c753e4465686c697a6465222f2242616c205869646d65746c6572693c2f753e222d6e6520646178696c206f6c756e2e, 'test*SIr', 466, 1498132189, 0, 'Xo&#351; geldiz test*SIr', '22-Jun-2017 [15:49]', 1, 1),
(25, 'Admin', 0, 0x53616c616d203c623e746573742a4559753c2f623e2e2058616e26233330353b6d21204d656e2026233139393b6174612079656e752026233235323b7a76206f6c616e20697374696661646526233233313b696c657269206d656c756d61746c616e6426233330353b7226233330353b72616d2e3c62722f3e2053697a6520616964206f6c616e206226233235323b7426233235323b6e206d656c756d61746c617220223c753e4465686c697a6465222f2226233335303b657873692d4b6162696e65743c2f753e22206226233234363b6c6d6573696e6465207965726c6526233335313b646972696c69622e204461686120656c617665206d656c756d61746c6172206861717126233330353b6e646120206973652c20223c753e4465686c697a6465222f224d656c756d61746c61723c2f753e22206226233234363b6c6d6573696e64656469722e205374617475732c205226233235323b7462652076652e7320616c6d61712026233235323b26233233313b26233235323b6e20223c753e4465686c697a6465222f2242616c205869646d65746c6572693c2f753e222d6e6520646178696c206f6c756e2e, 'test*EYu', 467, 1498132189, 0, 'Xo&#351; geldiz test*EYu', '22-Jun-2017 [15:49]', 1, 1),
(26, 'Admin', 0, 0x53616c616d203c623e746573742a6257593c2f623e2e2058616e26233330353b6d21204d656e2026233139393b6174612079656e752026233235323b7a76206f6c616e20697374696661646526233233313b696c657269206d656c756d61746c616e6426233330353b7226233330353b72616d2e3c62722f3e2053697a6520616964206f6c616e206226233235323b7426233235323b6e206d656c756d61746c617220223c753e4465686c697a6465222f2226233335303b657873692d4b6162696e65743c2f753e22206226233234363b6c6d6573696e6465207965726c6526233335313b646972696c69622e204461686120656c617665206d656c756d61746c6172206861717126233330353b6e646120206973652c20223c753e4465686c697a6465222f224d656c756d61746c61723c2f753e22206226233234363b6c6d6573696e64656469722e205374617475732c205226233235323b7462652076652e7320616c6d61712026233235323b26233233313b26233235323b6e20223c753e4465686c697a6465222f2242616c205869646d65746c6572693c2f753e222d6e6520646178696c206f6c756e2e, 'test*bWY', 468, 1498132189, 0, 'Xo&#351; geldiz test*bWY', '22-Jun-2017 [15:49]', 1, 1),
(27, 'Admin', 0, 0x53616c616d203c623e746573742a4b46583c2f623e2e2021204d656e2026233139393b6174612079656e752026233235323b7a76206f6c616e20697374696661646526233233313b696c657269206d656c756d61746c616e6426233330353b7226233330353b72616d2e3c62722f3e2053697a6520616964206f6c616e206226233235323b7426233235323b6e206d656c756d61746c617220223c753e4465686c697a6465222f2226233335303b657873692d4b6162696e65743c2f753e22206226233234363b6c6d6573696e6465207965726c6526233335313b646972696c69622e204461686120656c617665206d656c756d61746c6172206861717126233330353b6e646120206973652c20223c753e4465686c697a6465222f224d656c756d61746c61723c2f753e22206226233234363b6c6d6573696e64656469722e205374617475732c205226233235323b7462652076652e7320616c6d61712026233235323b26233233313b26233235323b6e20223c753e4465686c697a6465222f2242616c205869646d65746c6572693c2f753e222d6e6520646178696c206f6c756e2e, 'test*KFX', 469, 1498132249, 0, 'Xo&#351; geldiz test*KFX', '22-Jun-2017 [15:50]', 1, 1),
(29, 'Admin', 0, 0x53616c616d203c623e686d6d6d2a6f636e3c2f623e2e2021204d656e2026233139393b6174612079656e752026233235323b7a76206f6c616e20697374696661646526233233313b696c657269206d656c756d61746c616e6426233330353b7226233330353b72616d2e3c62722f3e2053697a6520616964206f6c616e206226233235323b7426233235323b6e206d656c756d61746c617220223c753e4465686c697a6465222f2226233335303b657873692d4b6162696e65743c2f753e22206226233234363b6c6d6573696e6465207965726c6526233335313b646972696c69622e204461686120656c617665206d656c756d61746c6172206861717126233330353b6e646120206973652c20223c753e4465686c697a6465222f224d656c756d61746c61723c2f753e22206226233234363b6c6d6573696e64656469722e205374617475732c205226233235323b7462652076652e7320616c6d61712026233235323b26233233313b26233235323b6e20223c753e4465686c697a6465222f2242616c205869646d65746c6572693c2f753e222d6e6520646178696c206f6c756e2e, 'hmmm*ocn', 471, 1498135271, 0, 'Xo&#351; geldiz hmmm*ocn', '22-Jun-2017 [16:41]', 1, 1),
(30, 'Admin', 0, 0x53616c616d203c623e686d6d6d2a5975553c2f623e2e2058616e26233330353b6d21204d656e2026233139393b6174612079656e752026233235323b7a76206f6c616e20697374696661646526233233313b696c657269206d656c756d61746c616e6426233330353b7226233330353b72616d2e3c62722f3e2053697a6520616964206f6c616e206226233235323b7426233235323b6e206d656c756d61746c617220223c753e4465686c697a6465222f2226233335303b657873692d4b6162696e65743c2f753e22206226233234363b6c6d6573696e6465207965726c6526233335313b646972696c69622e204461686120656c617665206d656c756d61746c6172206861717126233330353b6e646120206973652c20223c753e4465686c697a6465222f224d656c756d61746c61723c2f753e22206226233234363b6c6d6573696e64656469722e205374617475732c205226233235323b7462652076652e7320616c6d61712026233235323b26233233313b26233235323b6e20223c753e4465686c697a6465222f2242616c205869646d65746c6572693c2f753e222d6e6520646178696c206f6c756e2e, 'hmmm*YuU', 472, 1498135331, 0, 'Xo&#351; geldiz hmmm*YuU', '22-Jun-2017 [16:42]', 1, 1),
(31, 'Admin', 0, 0x53616c616d203c623e686d6d6d2a6976783c2f623e2e2021204d656e2026233139393b6174612079656e752026233235323b7a76206f6c616e20697374696661646526233233313b696c657269206d656c756d61746c616e6426233330353b7226233330353b72616d2e3c62722f3e2053697a6520616964206f6c616e206226233235323b7426233235323b6e206d656c756d61746c617220223c753e4465686c697a6465222f2226233335303b657873692d4b6162696e65743c2f753e22206226233234363b6c6d6573696e6465207965726c6526233335313b646972696c69622e204461686120656c617665206d656c756d61746c6172206861717126233330353b6e646120206973652c20223c753e4465686c697a6465222f224d656c756d61746c61723c2f753e22206226233234363b6c6d6573696e64656469722e205374617475732c205226233235323b7462652076652e7320616c6d61712026233235323b26233233313b26233235323b6e20223c753e4465686c697a6465222f2242616c205869646d65746c6572693c2f753e222d6e6520646178696c206f6c756e2e, 'hmmm*ivx', 473, 1498135391, 0, 'Xo&#351; geldiz hmmm*ivx', '22-Jun-2017 [16:43]', 1, 1),
(32, 'Admin', 0, 0x53616c616d203c623e686d6d6d2a7377553c2f623e2e2021204d656e2026233139393b6174612079656e752026233235323b7a76206f6c616e20697374696661646526233233313b696c657269206d656c756d61746c616e6426233330353b7226233330353b72616d2e3c62722f3e2053697a6520616964206f6c616e206226233235323b7426233235323b6e206d656c756d61746c617220223c753e4465686c697a6465222f2226233335303b657873692d4b6162696e65743c2f753e22206226233234363b6c6d6573696e6465207965726c6526233335313b646972696c69622e204461686120656c617665206d656c756d61746c6172206861717126233330353b6e646120206973652c20223c753e4465686c697a6465222f224d656c756d61746c61723c2f753e22206226233234363b6c6d6573696e64656469722e205374617475732c205226233235323b7462652076652e7320616c6d61712026233235323b26233233313b26233235323b6e20223c753e4465686c697a6465222f2242616c205869646d65746c6572693c2f753e222d6e6520646178696c206f6c756e2e, 'hmmm*swU', 474, 1498135451, 0, 'Xo&#351; geldiz hmmm*swU', '22-Jun-2017 [16:44]', 1, 1),
(33, 'Admin', 0, 0x53616c616d203c623e686d6d6d2a74496f3c2f623e2e2058616e26233330353b6d21204d656e2026233139393b6174612079656e752026233235323b7a76206f6c616e20697374696661646526233233313b696c657269206d656c756d61746c616e6426233330353b7226233330353b72616d2e3c62722f3e2053697a6520616964206f6c616e206226233235323b7426233235323b6e206d656c756d61746c617220223c753e4465686c697a6465222f2226233335303b657873692d4b6162696e65743c2f753e22206226233234363b6c6d6573696e6465207965726c6526233335313b646972696c69622e204461686120656c617665206d656c756d61746c6172206861717126233330353b6e646120206973652c20223c753e4465686c697a6465222f224d656c756d61746c61723c2f753e22206226233234363b6c6d6573696e64656469722e205374617475732c205226233235323b7462652076652e7320616c6d61712026233235323b26233233313b26233235323b6e20223c753e4465686c697a6465222f2242616c205869646d65746c6572693c2f753e222d6e6520646178696c206f6c756e2e, 'hmmm*tIo', 475, 1498135451, 0, 'Xo&#351; geldiz hmmm*tIo', '22-Jun-2017 [16:44]', 1, 1),
(34, 'Sistem', 0, 0x4826233234363b726d65746c69203c623e4e5552413c2f623e2c2053697a696e20223c623e416e74692d26233330343b716e6f723c2f623e222053697374656d696e697a696e207661787426233330353b2062697464692e3c62722f3e59656e6964656e20416e74692d26233330343b716e6f722053697374656d696e64656e2069737469666164652065746d656b2026233235323b26233233313b26233235323b6e2062616c207869646d6574696e64656e206973746966616465206564696e2e0a, 'NURA', 46, 1498139048, 0, 'Anti-&#304;qnor haqq&#305;nda', '', 1, 1),
(35, 'Sistem', 0, 0x4826233234363b726d65746c69203c623e5149534d4554494d3c2f623e2c2053697a696e20223c623e52656e676c69204e696b3c2f623e22204426233235323b7a656c746d656b2026233235323b26233233313b26233235323b6e206f6c616e207661787426233330353b6e26233330353b7a2062697464692e3c62722f3e59656e6964656e206275207869646d657464656e2069737469666164652065746d656b2026233235323b26233233313b26233235323b6e2062616c207869646d6574696e64656e206973746966616465206564696e2e0a, 'QISMETIM', 166, 1498139048, 0, 'Rengli nik haqq&#305;nda', '', 1, 1),
(36, 'Admin', 0, 0x53616c616d203c623e646a726a66666a3c2f623e2e2021204d656e2026233139393b6174612079656e752026233235323b7a76206f6c616e20697374696661646526233233313b696c657269206d656c756d61746c616e6426233330353b7226233330353b72616d2e3c62722f3e2053697a6520616964206f6c616e206226233235323b7426233235323b6e206d656c756d61746c617220223c753e4465686c697a6465222f2226233335303b657873692d4b6162696e65743c2f753e22206226233234363b6c6d6573696e6465207965726c6526233335313b646972696c69622e204461686120656c617665206d656c756d61746c6172206861717126233330353b6e646120206973652c20223c753e4465686c697a6465222f224d656c756d61746c61723c2f753e22206226233234363b6c6d6573696e64656469722e205374617475732c205226233235323b7462652076652e7320616c6d61712026233235323b26233233313b26233235323b6e20223c753e4465686c697a6465222f2242616c205869646d65746c6572693c2f753e222d6e6520646178696c206f6c756e2e, 'djrjffj', 476, 1498140504, 0, 'Xo&#351; geldiz djrjffj', '22-Jun-2017 [18:08]', 1, 1),
(37, 'Admin', 0, 0x53616c616d203c623e64636d733c2f623e2e2021204d656e2026233139393b6174612079656e752026233235323b7a76206f6c616e20697374696661646526233233313b696c657269206d656c756d61746c616e6426233330353b7226233330353b72616d2e3c62722f3e2053697a6520616964206f6c616e206226233235323b7426233235323b6e206d656c756d61746c617220223c753e4465686c697a6465222f2226233335303b657873692d4b6162696e65743c2f753e22206226233234363b6c6d6573696e6465207965726c6526233335313b646972696c69622e204461686120656c617665206d656c756d61746c6172206861717126233330353b6e646120206973652c20223c753e4465686c697a6465222f224d656c756d61746c61723c2f753e22206226233234363b6c6d6573696e64656469722e205374617475732c205226233235323b7462652076652e7320616c6d61712026233235323b26233233313b26233235323b6e20223c753e4465686c697a6465222f2242616c205869646d65746c6572693c2f753e222d6e6520646178696c206f6c756e2e, 'dcms', 477, 1498158506, 0, 'Xo&#351; geldiz dcms', '22-Jun-2017 [23:08]', 1, 1),
(39, 'Admin', 0, 0x53616c616d203c623e6667686a746a723c2f623e2e2021204d656e2026233139393b6174612079656e752026233235323b7a76206f6c616e20697374696661646526233233313b696c657269206d656c756d61746c616e6426233330353b7226233330353b72616d2e3c62722f3e2053697a6520616964206f6c616e206226233235323b7426233235323b6e206d656c756d61746c617220223c753e4465686c697a6465222f2226233335303b657873692d4b6162696e65743c2f753e22206226233234363b6c6d6573696e6465207965726c6526233335313b646972696c69622e204461686120656c617665206d656c756d61746c6172206861717126233330353b6e646120206973652c20223c753e4465686c697a6465222f224d656c756d61746c61723c2f753e22206226233234363b6c6d6573696e64656469722e205374617475732c205226233235323b7462652076652e7320616c6d61712026233235323b26233233313b26233235323b6e20223c753e4465686c697a6465222f2242616c205869646d65746c6572693c2f753e222d6e6520646178696c206f6c756e2e, 'fghjtjr', 479, 1498225110, 0, 'Xo&#351; geldiz fghjtjr', '23-Jun-2017 [17:38]', 1, 1),
(41, 'Admin', 0, 0x53616c616d203c623e6d616e79616b3c2f623e2e2021204d656e2026233139393b6174612079656e752026233235323b7a76206f6c616e20697374696661646526233233313b696c657269206d656c756d61746c616e6426233330353b7226233330353b72616d2e3c62722f3e2053697a6520616964206f6c616e206226233235323b7426233235323b6e206d656c756d61746c617220223c753e4465686c697a6465222f2226233335303b657873692d4b6162696e65743c2f753e22206226233234363b6c6d6573696e6465207965726c6526233335313b646972696c69622e204461686120656c617665206d656c756d61746c6172206861717126233330353b6e646120206973652c20223c753e4465686c697a6465222f224d656c756d61746c61723c2f753e22206226233234363b6c6d6573696e64656469722e205374617475732c205226233235323b7462652076652e7320616c6d61712026233235323b26233233313b26233235323b6e20223c753e4465686c697a6465222f2242616c205869646d65746c6572693c2f753e222d6e6520646178696c206f6c756e2e, 'manyak', 481, 1498658222, 0, 'Xo&#351; geldiz manyak', '28-Jun-2017 [17:57]', 1, 1),
(43, 'Admin', 0, 0x53616c616d203c623e726563656264693c2f623e2e2021204d656e2026233139393b6174612079656e752026233235323b7a76206f6c616e20697374696661646526233233313b696c657269206d656c756d61746c616e6426233330353b7226233330353b72616d2e3c62722f3e2053697a6520616964206f6c616e206226233235323b7426233235323b6e206d656c756d61746c617220223c753e4465686c697a6465222f2226233335303b657873692d4b6162696e65743c2f753e22206226233234363b6c6d6573696e6465207965726c6526233335313b646972696c69622e204461686120656c617665206d656c756d61746c6172206861717126233330353b6e646120206973652c20223c753e4465686c697a6465222f224d656c756d61746c61723c2f753e22206226233234363b6c6d6573696e64656469722e205374617475732c205226233235323b7462652076652e7320616c6d61712026233235323b26233233313b26233235323b6e20223c753e4465686c697a6465222f2242616c205869646d65746c6572693c2f753e222d6e6520646178696c206f6c756e2e, 'recebdi', 483, 1499176465, 0, 'Xo&#351; geldiz recebdi', '04-Jul-2017 [17:54]', 1, 1),
(46, 'Admin', 0, 0x53616c616d203c623e627368736873623c2f623e2e2021204d656e2026233139393b6174612079656e752026233235323b7a76206f6c616e20697374696661646526233233313b696c657269206d656c756d61746c616e6426233330353b7226233330353b72616d2e3c62722f3e2053697a6520616964206f6c616e206226233235323b7426233235323b6e206d656c756d61746c617220223c753e4465686c697a6465222f2226233335303b657873692d4b6162696e65743c2f753e22206226233234363b6c6d6573696e6465207965726c6526233335313b646972696c69622e204461686120656c617665206d656c756d61746c6172206861717126233330353b6e646120206973652c20223c753e4465686c697a6465222f224d656c756d61746c61723c2f753e22206226233234363b6c6d6573696e64656469722e205374617475732c205226233235323b7462652076652e7320616c6d61712026233235323b26233233313b26233235323b6e20223c753e4465686c697a6465222f2242616c205869646d65746c6572693c2f753e222d6e6520646178696c206f6c756e2e, 'bshshsb', 486, 1499534335, 0, 'Xo&#351; geldiz bshshsb', '08-Jul-2017 [21:18]', 1, 1),
(32663644, 'Sistem', 0, 0x53697a204475656c64652071616c69622067656c64696e697a207665203c623e31303c2f623e2062616c2071617a616e6426233330353b7a2e2e2e, 'Bahar_ciceyi', 430, 1499534566, 0, 'Sistem', '08.07.2017 |22:22', 1, 1),
(32663645, 'Admin', 0, 0x53616c616d203c623e3c2f623e2e2021204d656e2026233139393b6174612079656e752026233235323b7a76206f6c616e20697374696661646526233233313b696c657269206d656c756d61746c616e6426233330353b7226233330353b72616d2e3c62722f3e2053697a6520616964206f6c616e206226233235323b7426233235323b6e206d656c756d61746c617220223c753e4465686c697a6465222f2226233335303b657873692d4b6162696e65743c2f753e22206226233234363b6c6d6573696e6465207965726c6526233335313b646972696c69622e204461686120656c617665206d656c756d61746c6172206861717126233330353b6e646120206973652c20223c753e4465686c697a6465222f224d656c756d61746c61723c2f753e22206226233234363b6c6d6573696e64656469722e205374617475732c205226233235323b7462652076652e7320616c6d61712026233235323b26233233313b26233235323b6e20223c753e4465686c697a6465222f2242616c205869646d65746c6572693c2f753e222d6e6520646178696c206f6c756e2e, '', 487, 1500394695, 0, 'Xo&#351; geldiz ', '18-Jul-2017 [20:18]', 1, 1),
(32663647, 'Admin', 0, 0x53616c616d203c623e73677367656767773c2f623e2e2021204d656e2026233139393b6174612079656e752026233235323b7a76206f6c616e20697374696661646526233233313b696c657269206d656c756d61746c616e6426233330353b7226233330353b72616d2e3c62722f3e2053697a6520616964206f6c616e206226233235323b7426233235323b6e206d656c756d61746c617220223c753e4465686c697a6465222f2226233335303b657873692d4b6162696e65743c2f753e22206226233234363b6c6d6573696e6465207965726c6526233335313b646972696c69622e204461686120656c617665206d656c756d61746c6172206861717126233330353b6e646120206973652c20223c753e4465686c697a6465222f224d656c756d61746c61723c2f753e22206226233234363b6c6d6573696e64656469722e205374617475732c205226233235323b7462652076652e7320616c6d61712026233235323b26233233313b26233235323b6e20223c753e4465686c697a6465222f2242616c205869646d65746c6572693c2f753e222d6e6520646178696c206f6c756e2e, 'sgsgeggw', 489, 1500708688, 0, 'Xo&#351; geldiz sgsgeggw', '22-Jul-2017 [11:31]', 1, 1),
(32663655, 'Admin', 0, 0x53616c616d203c623e7861636d617a3c2f623e2e2021204d656e2026233139393b6174612079656e752026233235323b7a76206f6c616e20697374696661646526233233313b696c657269206d656c756d61746c616e6426233330353b7226233330353b72616d2e3c62722f3e2053697a6520616964206f6c616e206226233235323b7426233235323b6e206d656c756d61746c617220223c753e4465686c697a6465222f2226233335303b657873692d4b6162696e65743c2f753e22206226233234363b6c6d6573696e6465207965726c6526233335313b646972696c69622e204461686120656c617665206d656c756d61746c6172206861717126233330353b6e646120206973652c20223c753e4465686c697a6465222f224d656c756d61746c61723c2f753e22206226233234363b6c6d6573696e64656469722e205374617475732c205226233235323b7462652076652e7320616c6d61712026233235323b26233233313b26233235323b6e20223c753e4465686c697a6465222f2242616c205869646d65746c6572693c2f753e222d6e6520646178696c206f6c756e2e, 'xacmaz', 493, 1502292676, 0, 'Xo&#351; geldiz xacmaz', '09-Aug-2017 [19:31]', 1, 1),
(32663649, 'Admin', 0, 0x53616c616d203c623e5f766f6c6b3c2f623e2e2021204d656e2026233139393b6174612079656e752026233235323b7a76206f6c616e20697374696661646526233233313b696c657269206d656c756d61746c616e6426233330353b7226233330353b72616d2e3c62722f3e2053697a6520616964206f6c616e206226233235323b7426233235323b6e206d656c756d61746c617220223c753e4465686c697a6465222f2226233335303b657873692d4b6162696e65743c2f753e22206226233234363b6c6d6573696e6465207965726c6526233335313b646972696c69622e204461686120656c617665206d656c756d61746c6172206861717126233330353b6e646120206973652c20223c753e4465686c697a6465222f224d656c756d61746c61723c2f753e22206226233234363b6c6d6573696e64656469722e205374617475732c205226233235323b7462652076652e7320616c6d61712026233235323b26233233313b26233235323b6e20223c753e4465686c697a6465222f2242616c205869646d65746c6572693c2f753e222d6e6520646178696c206f6c756e2e, '_volk', 490, 1500762080, 0, 'Xo&#351; geldiz _volk', '23-Jul-2017 [02:21]', 1, 1),
(32663650, 'Admin', 0, 0x53616c616d203c623e786d6d6d613c2f623e2e2021204d656e2026233139393b6174612079656e752026233235323b7a76206f6c616e20697374696661646526233233313b696c657269206d656c756d61746c616e6426233330353b7226233330353b72616d2e3c62722f3e2053697a6520616964206f6c616e206226233235323b7426233235323b6e206d656c756d61746c617220223c753e4465686c697a6465222f2226233335303b657873692d4b6162696e65743c2f753e22206226233234363b6c6d6573696e6465207965726c6526233335313b646972696c69622e204461686120656c617665206d656c756d61746c6172206861717126233330353b6e646120206973652c20223c753e4465686c697a6465222f224d656c756d61746c61723c2f753e22206226233234363b6c6d6573696e64656469722e205374617475732c205226233235323b7462652076652e7320616c6d61712026233235323b26233233313b26233235323b6e20223c753e4465686c697a6465222f2242616c205869646d65746c6572693c2f753e222d6e6520646178696c206f6c756e2e, 'xmmma', 491, 1501113034, 0, 'Xo&#351; geldiz xmmma', '27-Jul-2017 [03:50]', 1, 1),
(32663653, 'Admin', 0, 0x486f726d65746c69205f47756c5f76655f53755f2053697a20627520617920416b7469766c696b2072657974696e71696e64652032207965726520636978646971696e697a207563756e203130302062616c20686564697979652071617a616e64696e697a2e2054656272696b6c6572, '_Gul_ve_Su_', 423, 1501531374, 0, 'Qalib olduz!', '', 1, 1),
(32663654, 'Admin', 0, 0x53616c616d203c623e67746874687268743c2f623e2e2021204d656e2026233139393b6174612079656e752026233235323b7a76206f6c616e20697374696661646526233233313b696c657269206d656c756d61746c616e6426233330353b7226233330353b72616d2e3c62722f3e2053697a6520616964206f6c616e206226233235323b7426233235323b6e206d656c756d61746c617220223c753e4465686c697a6465222f2226233335303b657873692d4b6162696e65743c2f753e22206226233234363b6c6d6573696e6465207965726c6526233335313b646972696c69622e204461686120656c617665206d656c756d61746c6172206861717126233330353b6e646120206973652c20223c753e4465686c697a6465222f224d656c756d61746c61723c2f753e22206226233234363b6c6d6573696e64656469722e205374617475732c205226233235323b7462652076652e7320616c6d61712026233235323b26233233313b26233235323b6e20223c753e4465686c697a6465222f2242616c205869646d65746c6572693c2f753e222d6e6520646178696c206f6c756e2e, 'gththrht', 492, 1501534155, 0, 'Xo&#351; geldiz gththrht', '01-Aug-2017 [00:49]', 1, 1),
(32663658, 'Admin', 0, 0x53616c616d203c623e476767686a3c2f623e2e2021204d656e2026233139393b6174612079656e752026233235323b7a76206f6c616e20697374696661646526233233313b696c657269206d656c756d61746c616e6426233330353b7226233330353b72616d2e3c62722f3e2053697a6520616964206f6c616e206226233235323b7426233235323b6e206d656c756d61746c617220223c753e4465686c697a6465222f2226233335303b657873692d4b6162696e65743c2f753e22206226233234363b6c6d6573696e6465207965726c6526233335313b646972696c69622e204461686120656c617665206d656c756d61746c6172206861717126233330353b6e646120206973652c20223c753e4465686c697a6465222f224d656c756d61746c61723c2f753e22206226233234363b6c6d6573696e64656469722e205374617475732c205226233235323b7462652076652e7320616c6d61712026233235323b26233233313b26233235323b6e20223c753e4465686c697a6465222f2242616c205869646d65746c6572693c2f753e222d6e6520646178696c206f6c756e2e, 'Ggghj', 495, 1503578431, 0, 'Xo&#351; geldiz Ggghj', '24-Aug-2017 [16:40]', 1, 1),
(32663659, 'Admin', 0, 0x53616c616d203c623e42795f4d6147613c2f623e2e2021204d656e2026233139393b6174612079656e752026233235323b7a76206f6c616e20697374696661646526233233313b696c657269206d656c756d61746c616e6426233330353b7226233330353b72616d2e3c62722f3e2053697a6520616964206f6c616e206226233235323b7426233235323b6e206d656c756d61746c617220223c753e4465686c697a6465222f2226233335303b657873692d4b6162696e65743c2f753e22206226233234363b6c6d6573696e6465207965726c6526233335313b646972696c69622e204461686120656c617665206d656c756d61746c6172206861717126233330353b6e646120206973652c20223c753e4465686c697a6465222f224d656c756d61746c61723c2f753e22206226233234363b6c6d6573696e64656469722e205374617475732c205226233235323b7462652076652e7320616c6d61712026233235323b26233233313b26233235323b6e20223c753e4465686c697a6465222f2242616c205869646d65746c6572693c2f753e222d6e6520646178696c206f6c756e2e, 'By_MaGa', 496, 1503578705, 0, 'Xo&#351; geldiz By_MaGa', '24-Aug-2017 [16:45]', 1, 1),
(32663660, 'Admin', 0, 0x53616c616d203c623e6461646173643c2f623e2e2021204d656e2026233139393b6174612079656e752026233235323b7a76206f6c616e20697374696661646526233233313b696c657269206d656c756d61746c616e6426233330353b7226233330353b72616d2e3c62722f3e2053697a6520616964206f6c616e206226233235323b7426233235323b6e206d656c756d61746c617220223c753e4465686c697a6465222f2226233335303b657873692d4b6162696e65743c2f753e22206226233234363b6c6d6573696e6465207965726c6526233335313b646972696c69622e204461686120656c617665206d656c756d61746c6172206861717126233330353b6e646120206973652c20223c753e4465686c697a6465222f224d656c756d61746c61723c2f753e22206226233234363b6c6d6573696e64656469722e205374617475732c205226233235323b7462652076652e7320616c6d61712026233235323b26233233313b26233235323b6e20223c753e4465686c697a6465222f2242616c205869646d65746c6572693c2f753e222d6e6520646178696c206f6c756e2e, 'dadasd', 497, 1503596870, 0, 'Xo&#351; geldiz dadasd', '24-Aug-2017 [21:47]', 1, 1),
(32663662, 'Admin', 0, 0x486f726d65746c692064636d732053697a20627520617920416b7469766c696b2072657974696e71696e64652032207965726520636978646971696e697a207563756e203130302062616c20686564697979652071617a616e64696e697a2e2054656272696b6c6572, 'dcms', 477, 1504266648, 0, 'Qalib olduz!', '', 1, 1),
(32663664, 'Admin', 0, 0x53616c616d203c623e636666633c2f623e2e2021204d656e2026233139393b6174612079656e752026233235323b7a76206f6c616e20697374696661646526233233313b696c657269206d656c756d61746c616e6426233330353b7226233330353b72616d2e3c62722f3e2053697a6520616964206f6c616e206226233235323b7426233235323b6e206d656c756d61746c617220223c753e4465686c697a6465222f2226233335303b657873692d4b6162696e65743c2f753e22206226233234363b6c6d6573696e6465207965726c6526233335313b646972696c69622e204461686120656c617665206d656c756d61746c6172206861717126233330353b6e646120206973652c20223c753e4465686c697a6465222f224d656c756d61746c61723c2f753e22206226233234363b6c6d6573696e64656469722e205374617475732c205226233235323b7462652076652e7320616c6d61712026233235323b26233233313b26233235323b6e20223c753e4465686c697a6465222f2242616c205869646d65746c6572693c2f753e222d6e6520646178696c206f6c756e2e, 'cffc', 498, 1506012745, 0, 'Xo&#351; geldiz cffc', '21-Sep-2017 [20:52]', 1, 1),
(32663667, 'Sistem', 0, 0x4826233234363b726d65746c69203c623e4252454e443c2f623e2c2053697a696e20223c623e476f6c6420557365723c2f623e22206f6c6d617126233330353b6e26233330353b7a26233330353b6e207661787426233330353b2062697464692e3c62722f3e59656e6964656e20476f6c642055736572206f6c6d61712026233235323b26233233313b26233235323b6e2062616c207869646d6574696e64656e206973746966616465206564696e2e0a, 'BREND', 167, 1506012856, 0, 'Gold User haqq&#305;nda', '', 1, 1),
(32663668, 'Sistem', 0, 0x4826233234363b726d65746c69203c623e426c61746e6f795f6d756a696b3c2f623e2c2053697a696e20223c623e476f6c6420557365723c2f623e22206f6c6d617126233330353b6e26233330353b7a26233330353b6e207661787426233330353b2062697464692e3c62722f3e59656e6964656e20476f6c642055736572206f6c6d61712026233235323b26233233313b26233235323b6e2062616c207869646d6574696e64656e206973746966616465206564696e2e0a, 'Blatnoy_mujik', 219, 1506012856, 0, 'Gold User haqq&#305;nda', '', 1, 1),
(32663669, 'Sistem', 0, 0x4826233234363b726d65746c69203c623e48696372616e2a3c2f623e2c2053697a696e20223c623e476f6c6420557365723c2f623e22206f6c6d617126233330353b6e26233330353b7a26233330353b6e207661787426233330353b2062697464692e3c62722f3e59656e6964656e20476f6c642055736572206f6c6d61712026233235323b26233233313b26233235323b6e2062616c207869646d6574696e64656e206973746966616465206564696e2e0a, 'Hicran*', 220, 1506012856, 0, 'Gold User haqq&#305;nda', '', 1, 1),
(32663670, 'Sistem', 0, 0x4826233234363b726d65746c69203c623e4b494e475f4f465f434841543c2f623e2c2053697a696e20223c623e476f6c6420557365723c2f623e22206f6c6d617126233330353b6e26233330353b7a26233330353b6e207661787426233330353b2062697464692e3c62722f3e59656e6964656e20476f6c642055736572206f6c6d61712026233235323b26233233313b26233235323b6e2062616c207869646d6574696e64656e206973746966616465206564696e2e0a, 'KING_OF_CHAT', 324, 1506012856, 0, 'Gold User haqq&#305;nda', '', 1, 1),
(32663671, 'Sistem', 0, 0x4826233234363b726d65746c69203c623e526f6d616e74696b613c2f623e2c2053697a696e20223c623e476f6c6420557365723c2f623e22206f6c6d617126233330353b6e26233330353b7a26233330353b6e207661787426233330353b2062697464692e3c62722f3e59656e6964656e20476f6c642055736572206f6c6d61712026233235323b26233233313b26233235323b6e2062616c207869646d6574696e64656e206973746966616465206564696e2e0a, 'Romantika', 369, 1506012856, 0, 'Gold User haqq&#305;nda', '', 1, 1),
(32663672, 'Sistem', 0, 0x4826233234363b726d65746c69203c623e44616d6c613c2f623e2c2053697a696e20223c623e52656e676c69204e696b3c2f623e22204426233235323b7a656c746d656b2026233235323b26233233313b26233235323b6e206f6c616e207661787426233330353b6e26233330353b7a2062697464692e3c62722f3e59656e6964656e206275207869646d657464656e2069737469666164652065746d656b2026233235323b26233233313b26233235323b6e2062616c207869646d6574696e64656e206973746966616465206564696e2e0a, 'Damla', 283, 1506012856, 0, 'Rengli nik haqq&#305;nda', '', 1, 1),
(32663673, 'Sistem', 0, 0x4826233234363b726d65746c69203c623e295f516152616e4c69512d2d4b7543654c65525f283c2f623e2c2053697a696e20223c623e52656e676c69204e696b3c2f623e22204426233235323b7a656c746d656b2026233235323b26233233313b26233235323b6e206f6c616e207661787426233330353b6e26233330353b7a2062697464692e3c62722f3e59656e6964656e206275207869646d657464656e2069737469666164652065746d656b2026233235323b26233233313b26233235323b6e2062616c207869646d6574696e64656e206973746966616465206564696e2e0a, ')_QaRanLiQ--KuCeLeR_(', 177, 1506012856, 0, 'Rengli nik haqq&#305;nda', '', 1, 1),
(32663674, 'Sistem', 0, 0x4826233234363b726d65746c69203c623e5f445f4f5f535f545f555f4d5f3c2f623e2c2053697a696e20223c623e52656e676c69204e696b3c2f623e22204426233235323b7a656c746d656b2026233235323b26233233313b26233235323b6e206f6c616e207661787426233330353b6e26233330353b7a2062697464692e3c62722f3e59656e6964656e206275207869646d657464656e2069737469666164652065746d656b2026233235323b26233233313b26233235323b6e2062616c207869646d6574696e64656e206973746966616465206564696e2e0a, '_D_O_S_T_U_M_', 260, 1506012856, 0, 'Rengli nik haqq&#305;nda', '', 1, 1),
(32663675, 'Sistem', 0, 0x4826233234363b726d65746c69203c623e4c75426f595f4f674c614e615f417456614c3c2f623e2c2053697a696e20223c623e52656e676c69204e696b3c2f623e22204426233235323b7a656c746d656b2026233235323b26233233313b26233235323b6e206f6c616e207661787426233330353b6e26233330353b7a2062697464692e3c62722f3e59656e6964656e206275207869646d657464656e2069737469666164652065746d656b2026233235323b26233233313b26233235323b6e2062616c207869646d6574696e64656e206973746966616465206564696e2e0a, 'LuBoY_OgLaNa_AtVaL', 355, 1506012856, 0, 'Rengli nik haqq&#305;nda', '', 1, 1),
(32663677, 'Admin', 0, 0x53616c616d203c623e7361626168696e786579723c2f623e2e2021204d656e2026233139393b6174612079656e752026233235323b7a76206f6c616e20697374696661646526233233313b696c657269206d656c756d61746c616e6426233330353b7226233330353b72616d2e3c62722f3e2053697a6520616964206f6c616e206226233235323b7426233235323b6e206d656c756d61746c617220223c753e4465686c697a6465222f2226233335303b657873692d4b6162696e65743c2f753e22206226233234363b6c6d6573696e6465207965726c6526233335313b646972696c69622e204461686120656c617665206d656c756d61746c6172206861717126233330353b6e646120206973652c20223c753e4465686c697a6465222f224d656c756d61746c61723c2f753e22206226233234363b6c6d6573696e64656469722e205374617475732c205226233235323b7462652076652e7320616c6d61712026233235323b26233233313b26233235323b6e20223c753e4465686c697a6465222f2242616c205869646d65746c6572693c2f753e222d6e6520646178696c206f6c756e2e, 'sabahinxeyr', 500, 1506670483, 0, 'Xo&#351; geldiz sabahinxeyr', '29-Sep-2017 [11:34]', 1, 1),
(32663680, '', 7, 0x486f726d65746c69203c623e7361626168696e786579723c2f623e20416c646967696e697a204d657161204e696b696e204d7564646574692042697464692e2e2e, 'sabahinxeyr', 500, 1506690423, 0, 'Meqa Nik Muddet', '17:07 - 29.09.17', 1, 1),
(32663682, 'Admin', 0, 0x53616c616d203c623e617a6164643c2f623e2e2021204d656e2026233139393b6174612079656e752026233235323b7a76206f6c616e20697374696661646526233233313b696c657269206d656c756d61746c616e6426233330353b7226233330353b72616d2e3c62722f3e2053697a6520616964206f6c616e206226233235323b7426233235323b6e206d656c756d61746c617220223c753e4465686c697a6465222f2226233335303b657873692d4b6162696e65743c2f753e22206226233234363b6c6d6573696e6465207965726c6526233335313b646972696c69622e204461686120656c617665206d656c756d61746c6172206861717126233330353b6e646120206973652c20223c753e4465686c697a6465222f224d656c756d61746c61723c2f753e22206226233234363b6c6d6573696e64656469722e205374617475732c205226233235323b7462652076652e7320616c6d61712026233235323b26233233313b26233235323b6e20223c753e4465686c697a6465222f2242616c205869646d65746c6572693c2f753e222d6e6520646178696c206f6c756e2e, 'azadd', 503, 1507148526, 0, 'Xo&#351; geldiz azadd', '05-Oct-2017 [00:22]', 1, 1);
INSERT INTO `zapiski` (`klu4`, `who`, `idwho`, `message`, `towhom`, `idtowhom`, `time`, `readd`, `topic`, `date`, `insend`, `ininc`) VALUES
(32663683, 'Admin', 0, 0x53616c616d203c623e556e7544756c6d615a213c2f623e2e2021204d656e2026233139393b6174612079656e752026233235323b7a76206f6c616e20697374696661646526233233313b696c657269206d656c756d61746c616e6426233330353b7226233330353b72616d2e3c62722f3e2053697a6520616964206f6c616e206226233235323b7426233235323b6e206d656c756d61746c617220223c753e4465686c697a6465222f2226233335303b657873692d4b6162696e65743c2f753e22206226233234363b6c6d6573696e6465207965726c6526233335313b646972696c69622e204461686120656c617665206d656c756d61746c6172206861717126233330353b6e646120206973652c20223c753e4465686c697a6465222f224d656c756d61746c61723c2f753e22206226233234363b6c6d6573696e64656469722e205374617475732c205226233235323b7462652076652e7320616c6d61712026233235323b26233233313b26233235323b6e20223c753e4465686c697a6465222f2242616c205869646d65746c6572693c2f753e222d6e6520646178696c206f6c756e2e, 'UnuDulmaZ!', 504, 1507153195, 0, 'Xo&#351; geldiz UnuDulmaZ!', '05-Oct-2017 [01:39]', 1, 1),
(32663688, 'Admin', 0, 0x53616c616d203c623e6e6e6e6e6a3c2f623e2e2021204d656e2026233139393b6174612079656e752026233235323b7a76206f6c616e20697374696661646526233233313b696c657269206d656c756d61746c616e6426233330353b7226233330353b72616d2e3c62722f3e2053697a6520616964206f6c616e206226233235323b7426233235323b6e206d656c756d61746c617220223c753e4465686c697a6465222f2226233335303b657873692d4b6162696e65743c2f753e22206226233234363b6c6d6573696e6465207965726c6526233335313b646972696c69622e204461686120656c617665206d656c756d61746c6172206861717126233330353b6e646120206973652c20223c753e4465686c697a6465222f224d656c756d61746c61723c2f753e22206226233234363b6c6d6573696e64656469722e205374617475732c205226233235323b7462652076652e7320616c6d61712026233235323b26233233313b26233235323b6e20223c753e4465686c697a6465222f2242616c205869646d65746c6572693c2f753e222d6e6520646178696c206f6c756e2e, 'nnnnj', 509, 1507192860, 0, 'Xo&#351; geldiz nnnnj', '05-Oct-2017 [12:41]', 1, 1),
(32663689, 'Admin', 0, 0x53616c616d203c623e216d506f537369424c653c2f623e2e2021204d656e2026233139393b6174612079656e752026233235323b7a76206f6c616e20697374696661646526233233313b696c657269206d656c756d61746c616e6426233330353b7226233330353b72616d2e3c62722f3e2053697a6520616964206f6c616e206226233235323b7426233235323b6e206d656c756d61746c617220223c753e4465686c697a6465222f2226233335303b657873692d4b6162696e65743c2f753e22206226233234363b6c6d6573696e6465207965726c6526233335313b646972696c69622e204461686120656c617665206d656c756d61746c6172206861717126233330353b6e646120206973652c20223c753e4465686c697a6465222f224d656c756d61746c61723c2f753e22206226233234363b6c6d6573696e64656469722e205374617475732c205226233235323b7462652076652e7320616c6d61712026233235323b26233233313b26233235323b6e20223c753e4465686c697a6465222f2242616c205869646d65746c6572693c2f753e222d6e6520646178696c206f6c756e2e, '!mPoSsiBLe', 510, 1507199269, 0, 'Xo&#351; geldiz !mPoSsiBLe', '05-Oct-2017 [14:27]', 1, 1),
(32663690, 'Admin', 0, 0x53616c616d203c623e50696f6e7365733c2f623e2e2021204d656e2026233139393b6174612079656e752026233235323b7a76206f6c616e20697374696661646526233233313b696c657269206d656c756d61746c616e6426233330353b7226233330353b72616d2e3c62722f3e2053697a6520616964206f6c616e206226233235323b7426233235323b6e206d656c756d61746c617220223c753e4465686c697a6465222f2226233335303b657873692d4b6162696e65743c2f753e22206226233234363b6c6d6573696e6465207965726c6526233335313b646972696c69622e204461686120656c617665206d656c756d61746c6172206861717126233330353b6e646120206973652c20223c753e4465686c697a6465222f224d656c756d61746c61723c2f753e22206226233234363b6c6d6573696e64656469722e205374617475732c205226233235323b7462652076652e7320616c6d61712026233235323b26233233313b26233235323b6e20223c753e4465686c697a6465222f2242616c205869646d65746c6572693c2f753e222d6e6520646178696c206f6c756e2e, 'Pionses', 511, 1507199394, 0, 'Xo&#351; geldiz Pionses', '05-Oct-2017 [14:29]', 1, 1),
(32663691, 'Admin', 0, 0x53616c616d203c623e566f6c6b3c2f623e2e2021204d656e2026233139393b6174612079656e752026233235323b7a76206f6c616e20697374696661646526233233313b696c657269206d656c756d61746c616e6426233330353b7226233330353b72616d2e3c62722f3e2053697a6520616964206f6c616e206226233235323b7426233235323b6e206d656c756d61746c617220223c753e4465686c697a6465222f2226233335303b657873692d4b6162696e65743c2f753e22206226233234363b6c6d6573696e6465207965726c6526233335313b646972696c69622e204461686120656c617665206d656c756d61746c6172206861717126233330353b6e646120206973652c20223c753e4465686c697a6465222f224d656c756d61746c61723c2f753e22206226233234363b6c6d6573696e64656469722e205374617475732c205226233235323b7462652076652e7320616c6d61712026233235323b26233233313b26233235323b6e20223c753e4465686c697a6465222f2242616c205869646d65746c6572693c2f753e222d6e6520646178696c206f6c756e2e, 'Volk', 512, 1507205651, 0, 'Xo&#351; geldiz Volk', '05-Oct-2017 [16:14]', 1, 1),
(32663692, 'Admin', 0, 0x53616c616d203c623e53657667696c696d3c2f623e2e2021204d656e2026233139393b6174612079656e752026233235323b7a76206f6c616e20697374696661646526233233313b696c657269206d656c756d61746c616e6426233330353b7226233330353b72616d2e3c62722f3e2053697a6520616964206f6c616e206226233235323b7426233235323b6e206d656c756d61746c617220223c753e4465686c697a6465222f2226233335303b657873692d4b6162696e65743c2f753e22206226233234363b6c6d6573696e6465207965726c6526233335313b646972696c69622e204461686120656c617665206d656c756d61746c6172206861717126233330353b6e646120206973652c20223c753e4465686c697a6465222f224d656c756d61746c61723c2f753e22206226233234363b6c6d6573696e64656469722e205374617475732c205226233235323b7462652076652e7320616c6d61712026233235323b26233233313b26233235323b6e20223c753e4465686c697a6465222f2242616c205869646d65746c6572693c2f753e222d6e6520646178696c206f6c756e2e, 'Sevgilim', 513, 1597823831, 1, 'Xo&#351; geldiz Sevgilim', '19-Aug-2020 [11:57]', 1, 1),
(32663695, 'Admin', 0, 0x53616c616d203c623e4b656e616e32323c2f623e2e2021204d656e2026233139393b6174612079656e752026233235323b7a76206f6c616e20697374696661646526233233313b696c657269206d656c756d61746c616e6426233330353b7226233330353b72616d2e3c62722f3e2053697a6520616964206f6c616e206226233235323b7426233235323b6e206d656c756d61746c617220223c753e4465686c697a6465222f2226233335303b657873692d4b6162696e65743c2f753e22206226233234363b6c6d6573696e6465207965726c6526233335313b646972696c69622e204461686120656c617665206d656c756d61746c6172206861717126233330353b6e646120206973652c20223c753e4465686c697a6465222f224d656c756d61746c61723c2f753e22206226233234363b6c6d6573696e64656469722e205374617475732c205226233235323b7462652076652e7320616c6d61712026233235323b26233233313b26233235323b6e20223c753e4465686c697a6465222f2242616c205869646d65746c6572693c2f753e222d6e6520646178696c206f6c756e2e, 'Kenan22', 514, 1598200867, 0, 'Xo&#351; geldiz Kenan22', '23-Aug-2020 [20:41]', 1, 1),
(32663696, 'Admin', 0, 0x53616c616d203c623e4b52215354614c3c2f623e2e2021204d656e2026233139393b6174612079656e752026233235323b7a76206f6c616e20697374696661646526233233313b696c657269206d656c756d61746c616e6426233330353b7226233330353b72616d2e3c62722f3e2053697a6520616964206f6c616e206226233235323b7426233235323b6e206d656c756d61746c617220223c753e4465686c697a6465222f2226233335303b657873692d4b6162696e65743c2f753e22206226233234363b6c6d6573696e6465207965726c6526233335313b646972696c69622e204461686120656c617665206d656c756d61746c6172206861717126233330353b6e646120206973652c20223c753e4465686c697a6465222f224d656c756d61746c61723c2f753e22206226233234363b6c6d6573696e64656469722e205374617475732c205226233235323b7462652076652e7320616c6d61712026233235323b26233233313b26233235323b6e20223c753e4465686c697a6465222f2242616c205869646d65746c6572693c2f753e222d6e6520646178696c206f6c756e2e, 'KR!STaL', 515, 1598201305, 0, 'Xo&#351; geldiz KR!STaL', '23-Aug-2020 [20:48]', 1, 1),
(32663697, 'Admin', 0, 0x53616c616d203c623e41676861796566663c2f623e2e2021204d656e2026233139393b6174612079656e752026233235323b7a76206f6c616e20697374696661646526233233313b696c657269206d656c756d61746c616e6426233330353b7226233330353b72616d2e3c62722f3e2053697a6520616964206f6c616e206226233235323b7426233235323b6e206d656c756d61746c617220223c753e4465686c697a6465222f2226233335303b657873692d4b6162696e65743c2f753e22206226233234363b6c6d6573696e6465207965726c6526233335313b646972696c69622e204461686120656c617665206d656c756d61746c6172206861717126233330353b6e646120206973652c20223c753e4465686c697a6465222f224d656c756d61746c61723c2f753e22206226233234363b6c6d6573696e64656469722e205374617475732c205226233235323b7462652076652e7320616c6d61712026233235323b26233233313b26233235323b6e20223c753e4465686c697a6465222f2242616c205869646d65746c6572693c2f753e222d6e6520646178696c206f6c756e2e, 'Aghayeff', 516, 1598247074, 1, 'Xo&#351; geldiz Aghayeff', '24-Aug-2020 [09:31]', 1, 1);
