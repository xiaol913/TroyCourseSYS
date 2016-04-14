-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-04-14 02:02:29
-- 服务器版本： 5.7.9
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `troycoursesys`
--

--
-- 转存表中的数据 `troy_professors`
--

INSERT INTO `troy_professors` (`id`, `profFirstName`, `profLastName`, `profEmail`, `profPhoneNum`, `profDesc`) VALUES
(1, 'suman', 'Kumar', 'skumar@troy.edu', '3346703313', 'Assistant Professor, Troy. B.Tech., Banaras Hindu University, 2004. Ph.D., Louisiana State University, 2010.'),
(2, 'karen', 'Hovsepian', 'khovsepian@troy.edu', '3343720918', 'Assistant Professor, Troy. B.S., Northland College, 1999. M.S., New Mexico Institute of Mining & Technology, 2003. Ph.D., New Mexico Institute of Mining & Technology, 2009.\r\n'),
(3, 'yanjun', 'zhao', 'yjzhao@troy.edu', '3346703405', 'Assistant Professor in Troy university'),
(4, 'bill', 'Zhong', 'jzhong@troy.edu', '3346703388', 'chair of computer science department.B.S., Southeast University-Nanjing, China, 1995. Ph.D., Georgia State University, 2006.\r\n'),
(5, 'Huijun', 'Yi', 'hyi@troy.edu', '3344043378', '. Assistant Professor, Troy. B.S., Kunming University of Science & Technology, 1996. M.S., Southern Illinois University Carbondale, 2007. Ph.D., Southern Illinois University Carbondale, 2014.\r\n'),
(6, 'Vitaly', 'Voloshin', 'vvoloshin@troy.edu', '3346700817', ' 2003. Professor, Troy. M.Sc., Kishinev State University, 1976. Ph.D., Kiev Cybernetics Institute of Ukrainian Academy of Sciences, 1983.'),
(7, 'catherine', 'Allard', 'callard@troy.edu', '3346700811', ' Professor, Troy. B.M., SUNY College at Potsdam, 1972. M.S., SUNY College at Potsdam, 1974. D.M.A., Peabody Conservatory of John Hopkins, 1990.'),
(8, 'Annette', 'Allen', 'aallen@troy.edu', '3346700812', ' Assistant Dean for Administration, College of Arts & Sciences; Associate Professor, Montgomery. B.A., Indiana University, 1983. M.A., University of North Texas, 1986. Ph.D., University of Houston, 1994.'),
(9, 'pamela', 'Allen', 'pallen@troy.edu', '3346700813', 'Associate Professor, Troy. B.A.E., University of Florida, 1977. B.F.A., Ringling School of Art and Design, 1987. M.F.A., University of Mississippi, 1989'),
(10, 'Christina', 'Amoson', 'camonson@troy.edu', '3346700814', ' Assistant Professor, Troy. B.M.E., University of Idaho, 1996. M.M., Manhattan School of Music, 1998. D.M.A., The University of Arizona, 2012'),
(11, 'David', 'Amponsah', 'kamponsah@troy.edu', '3346700815', 'Associate Professor, Troy. B.S., Andrews University, 1972. M.B.A., Andrews University, 1973.Ph.D., Michigan State University, 1987'),
(12, 'Wendy', 'Bailey', 'wbailey@troy.edu', '3346700819', ' Associate Professor, Troy. B.S., Pennsylvania State University, 1982. Ph.D., Colorado School of Mines, 1989.'),
(13, 'Benjamin', 'Bateman', 'bbateman@troy.edu', '3346700820', ' Professor, Troy. B.S., Florida State University, 1965.M.S., Texas A&M University, 1967. Ph.D., Texas A&M,1970.'),
(14, 'Sergey', 'Belyi', 'sbelyi@troy.edu', '3346700821', '. Professor, Troy. B.S., Donetsk State University, 1990. M.S., Donetsk State University, 1992. Ph.D., University of South Florida, 1996.'),
(15, 'Stephan', 'Berry', 'sberry@troy.edu', '3346700822', ' Assistant Professor, Troy. B.S., Texas Tech University, 1985. M.Ed., Texas Tech University, 1991. Ph.D., Texas Tech University, 2013.'),
(16, 'Wilfred', 'Bibbins', 'wbibbins@troy.edu', '3346700823', ' Professor,Troy. B.S., Auburn University at Montgomery, 1974. M.A., Southern Illinois University Edwardsville, 1975. Ph.D., University of Arkansas, 1981.'),
(17, 'Timothy', 'Blackstock', 'tblackstock@troy.edu', '3346700825', ' Associate Professor, Troy. B.A., Newberry College, 2002. M.A., Tennessee Technological University, 2005. D.M.A., University of Kansas, 2008.'),
(18, 'Larry', 'Blocher', 'lblocher@troy.edu', '3346700826', ' Dean, College of Communication & Fine Arts; Professor, Troy. B.M.E., Morehead State University, 1975. M.M., Morehead State University, 1977. Ph.D., Florida State University, 1986.'),
(19, 'Elizabeth', 'Blum', 'eblum@troy.edu', '3346700827', ' Professor, Troy. B.A., University of Texas 0.at Austin, 1991. M.A., University of Houston, 1997. Ph.D., University of Huston, 2000.'),
(20, 'Rhonda', 'Bowron', 'rbowron@troy.edu', '3346700828', '. Associate Professor, Troy. B.S., Troy State University, 1974. M.S., Troy State University, 1976. Ed.S., Troy State University, 1997. Ph.D., Auburn University, 2001'),
(21, 'Natalie', 'Bryant', 'nbryant@troy.edu', '3346700828', 'Assistant Professor, Troy. B.S., Troy University, 2007. J.D., Florida State University College of Law, 2011.'),
(22, 'Timothy', 'Buckner', 'tbuckner@troy.edu', '3346700829', ' Associate Professor, Troy. B.A., Georgia State University, 1996. M.A., Florida State University, 1998. Ph.D., University of Texas at Austin, 2005.'),
(23, 'Laura', 'Burmeister', 'lburmeister@troy.edu', '3346700830', ' Assistant Professor, Troy. B.S., University of South Carolina, 2001. M.A., University of Connecticut, 2004. Ph.D., University of Connecticut, 2009.'),
(24, 'Djuana', 'Burns', 'dburns@troy.edu', '3346700831', 'Assistant Professor, Troy. B.S.N., Auburn University at Montgomery, 1986. M.S.N., Troy State University, 1993. D.N.P., The University of Alabama at Birmingham, 2011.'),
(25, 'Robert', 'Carlson', 'rcarlson@troy.edu', '3346700833', 'Assistant Professor, Troy. B.F.A., Valdosta State University, 1987. M.A., Valdosta State University, 1999. Ph.D., Emory University, 2009.'),
(26, 'Keith', 'Cates', 'kcates@troy.edu', '3346700834', ' Associate Professor, Troy. B.A., University of West Georgia, 1991. B.F.A., University of West Georgia, 1991. M.A., University of West Georgia, 1997. Ed.S., University of West Georgia, 2005. Ph.D., Auburn University, 2009.'),
(27, 'Kelli', 'Cleveland', 'kcleveland@troy.edu', '3346700835', ' Associate Professor, Troy. B.S.N., Troy State University, 1996. M.S.N., Troy University, 2006. D.N.P., Troy University, 2011.'),
(28, 'Nicholas', 'DAndrea', 'dandrea@troy.edu', '3346700836', ' Professor, Troy B.S., Troy State University, 1964. M.A., University of Southern Mississippi, 1968. Ph.D., University of Southern Mississippi, 1970'),
(29, 'Gregory', 'Davis', 'gdavis@troy.edu', '3346700837', 'Associate Professor, Troy. B.A., Eckerd College, 1992. M.T.S., John Paul II Institute for Studies on Marriage and Family, 1996. M.A., The University of Arizona, 2005. Ph.D., The University of Arizona, 2008.'),
(30, 'James', 'Davis', 'jdavis@troy.edu', '3346700837', ' Assistant Professor, Troy. B.A., University of Alabama, 1978. M.F.A., University of Alabama, 1984'),
(31, 'Alvin', 'Diamond', 'adiamond@troy.edu', '3346700838', ' Associate Professor, Troy. A.A., Jefferson Davis Community College, 1982. B.S., Troy State University, 1984. M.S., Auburn University, 1987. Ph.D., Auburn University, 2006.'),
(32, 'Amanda', 'Diggs', 'adiggs@troy.edu', '3346700839', ' Associate Professor, Troy. B.S., Troy State University, 1992. M.A., Auburn University, 1994. Ph.D., Auburn University, 2000.'),
(33, 'Anthony', 'Dixon', 'adixon@troy.edu', '3346700840', ' Associate Professor, Troy. B.A., The University of North Carolina at Wilmington, 1999. M.B.A., East Carolina University, 2002. Ph.D., Clemson University, 2009.'),
(34, 'Charod', 'Dodd', 'cdodd@troy.edu', '3346700841', ' Assistant Professor, Troy. B.B.A., Alabama State University, 2003. M.B.A., Troy State University, 2005. Ph.D., Mississippi State University, 2012.'),
(35, 'John', 'Dove', 'jdove@troy.edu', '3346700842', ' Assistant Professor, Troy. B.A., Hillsdale College, 2005. M.A., Central Michigan University, 2008. Ph.D., West Virginia University, 2012.'),
(36, 'Edwin', 'Duett', 'eduett@troy.edu', '3346700842', ' Professor, Troy. B.S., Mississippi State University, 1977. M.B.A., Mississippi State University, 1980. Ph.D., The University of Georgia, 1987.'),
(37, 'Michael', 'Orlofsky', 'morlofsjy@troy.edu', '3346700846', ' Professor, Troy. B.A., Jacksonville State University, 1975. M.F.A., University of Iowa, 1985. M.A., Pennsylvania State University, 1990.'),
(38, 'Xutong', 'niu', 'xniu@troy.edu', '3346700847', ' Associate Professor, Troy. B.Sc., Zhejiang University, 1996. M.E., Zhejiang University, 1999. M.S., Ohio State University, 2001. Ph.D., Ohio State University, 2004.'),
(39, 'Festus', 'Ndeh', 'fndeh@troy.edu', '3346700849', ' Associate Professor, Troy. B.S., University of Yaounde I, 1993. M.S., University of Yaounde I, 1998.Ph.D., Duisburg Essen University, 2005.'),
(40, 'Daneell', 'Moore', 'dmoore@troy.edu', '3346700850', ' Assistant Professor, Troy. B.S., Lincoln University, 1994. M.Ed., West Chester University of Pennsylvania, 2001. Ph.D., Vanderbilt University, 2007'),
(41, 'Theron', 'Montgomery', 'tmontgomery@troy.edu', '3346700851', ' Professor, Troy. B.A., Birmingham-Southern College, 1975. M.A., Jacksonville State University, 1977. Ph.D., University of Southern Mississippi, 1982.'),
(42, 'Ingyu', 'Lee', 'ilee@troy.edu', '3346700852', ' Associate Professor, Troy. B.S., Sogang University, 1990. M.S., University of Nebraska-Lincoln, 2000. Ph.D., The Pennsylvania State University, 2007.'),
(43, 'Richard', 'Ledet', 'rledet@troy.edu', '3346700855', ' Assistant Professor, Troy. Bachelor of General Studies, Louisiana State University and A & M College, 2000. M.A., San Diego State University, 2003. M.A., University of Notre Dame, 2008. Ph.D., University of Notre Dame, 2011.'),
(44, 'Stephen', 'Landers', 'slanders@troy.edu', '3346700856', ' Professor, Troy. B.S., Iowa State University, 1983. M.S., North Carolina State University, 1985. Ph.D., North Carolina State University, 1990.'),
(45, 'Robert', 'Kruckeberg', 'rkruckeberg@troy.edu', '3346700857', ' Assistant Professor, Troy. B.A., University of North Texas, 1999. M.A., University of North Texas, 2001.Ph.D., University of Michigan, 2009.'),
(46, 'Malavika', 'Nair', 'mnair@troy.edu', '3346700857', ' Assistant Professor, Troy. B.A., Pune University, 2004. M.A., Gokhale Institute of Politics & Economics, 2006.Ph.D., Suffolk University, 2012.'),
(47, 'James', 'Rinehart', 'jrinehart@troy.edu', '3346700858', ' Dean, College of Arts And Sciences; Professor, Troy. B.A., University of Florida, 1972. M.S., Syracuse University, 1991. Ph.D., Syracuse University, 1993.'),
(48, 'Kenneth', 'Roblee', 'kroblee@troy.edu', '3346700858', ' Professor, Troy. B.S., The University of Alabama, 1994. M.S., Auburn University, 1997. Ph.D., Auburn University, 2000.'),
(49, 'Susan', 'Sarapin', 'ssarapin@troy.edu', '3346700888', ' Assistant Professor, Troy. B.S., University of Illinois, 1973.M.A., Purdue University, 2009. Ph.D., Purdue University, 2012.'),
(50, 'Patrick', 'Rossi', 'prossi@troy.edu', '3346700899', 'Professor, Troy. B.S., University of Rhode Island, 1982. M.S., University of Rhode Island, 1984. Ph.D., Auburn University, 1993.');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
