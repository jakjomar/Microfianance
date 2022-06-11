-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2022 at 08:24 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `microfinance1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `lname`, `fname`, `mname`, `password`, `email`, `position`) VALUES
(1014, 'Microfinance', ' ', ' ', '8383b7074ff913df63fd292c17e62410', 'microfinance@gmail.com', 'Administrator'),
(1018, 'dayawon', 'moises', 't', '2000b7287e012511c77a7b2517e838ba', 'moises@gmail.com', 'Loan Officer'),
(1019, 'bodino', 'jomar', 'f', '202cb962ac59075b964b07152d234b70', 'jom@gmail.com', 'Finance Manager'),
(1020, 'Marcorde', 'Jake', 'Timajo', '827ccb0eea8a706c4c34a16891f84e7b', 'jakeblack@gmail.com', 'Finance Manager'),
(1021, 'Zuniga', 'Bryan', 'tebelin', 'f772dd197b80806dbf5b1e75f2f929a6', 'zuniga@gmail.com', 'Finance Manager'),
(1022, 'bodino', 'Jomar', 'Francisco', '202cb962ac59075b964b07152d234b70', 'jom123@gmail.com', 'Loan Officer'),
(1023, 'Tebelin', 'john ray', 'Oclares', '202cb962ac59075b964b07152d234b70', 'ray@gmail.com', 'Loan Officer');

-- --------------------------------------------------------

--
-- Table structure for table `comaker`
--

CREATE TABLE `comaker` (
  `id` int(255) NOT NULL,
  `loanid` varchar(255) NOT NULL,
  `clastname` varchar(255) NOT NULL,
  `cfirstname` varchar(255) NOT NULL,
  `cmiddlename` varchar(255) NOT NULL,
  `caddress` varchar(255) NOT NULL,
  `cemail` varchar(255) NOT NULL,
  `ccontact` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `credentials`
--

CREATE TABLE `credentials` (
  `id` int(255) NOT NULL,
  `userid` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `deposit`
--

CREATE TABLE `deposit` (
  `id` int(255) NOT NULL,
  `userid` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `dateofbirth` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `barangay` varchar(255) NOT NULL,
  `municipality` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `savings` varchar(255) NOT NULL,
  `depositdate` varchar(255) NOT NULL,
  `depositamount` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deposit`
--

INSERT INTO `deposit` (`id`, `userid`, `lastname`, `firstname`, `middlename`, `dateofbirth`, `age`, `gender`, `barangay`, `municipality`, `province`, `email`, `contact`, `savings`, `depositdate`, `depositamount`) VALUES
(1027, '202086', 'abundo', 'lea', 'sarmiento', '1966-09-08', '55 years old', 'Female', 'salvacion ', 'virac', 'catanduanes', 'abundo@gmail.com', '09564356532', '250', '2022-06-16', '250'),
(1028, '202086', 'abundo', 'lea', 'sarmiento', '1966-09-08', '55 years old', 'Female', 'salvacion ', 'virac', 'catanduanes', 'abundo@gmail.com', '09564356532', '500', '2022-06-16', '250'),
(1029, '202086', 'abundo', 'lea', 'sarmiento', '1966-09-08', '55 years old', 'Female', 'salvacion ', 'virac', 'catanduanes', 'abundo@gmail.com', '09564356532', '750', '2022-06-16', '250'),
(1030, '202086', 'abundo', 'lea', 'sarmiento', '1966-09-08', '55 years old', 'Female', 'salvacion ', 'virac', 'catanduanes', 'abundo@gmail.com', '09564356532', '1000', '2022-06-16', '250'),
(1031, '202086', 'abundo', 'lea', 'sarmiento', '1966-09-08', '55 years old', 'Female', 'salvacion ', 'virac', 'catanduanes', 'abundo@gmail.com', '09564356532', '10750', '2022-06-16', '10000'),
(1032, '202086', 'abundo', 'lea', 'sarmiento', '1966-09-08', '55 years old', 'Female', 'salvacion ', 'virac', 'catanduanes', 'abundo@gmail.com', '09564356532', '60750', '2022-06-16', '50000'),
(1033, '202087', 'Abundo', 'Shirley', 'Cua', '1988-01-11', '34 years old', 'Male', 'Cavinitan', 'Virac ', 'Catanduanes ', 'Shirley@gmail.com', '0987654321', '250', '2022-06-16', '250'),
(1034, '202073', 'bautista', 'richard', 'ubalde', '1967-10-07', '54 years old', 'Male', 'sta. cruz', 'virac', 'catanduanes', 'bautista@gmail.com', '09785646538', '250', '2022-06-16', '250'),
(1035, '202082', 'benavidez', 'allysa', 'tapit', '1976-12-07', '45 years old', 'Male', 'salvacion', 'san andress', 'catanduanes', 'benavidez@gmail.com', '09565438939', '250', '2022-06-16', '250'),
(1036, '202095', 'Bermejo', 'Kathlyn', 'Villegas', '1989-05-15', '33 years old', 'Female', 'Sipocot', 'Bato', 'Catanduanes ', 'Kathlyn@gmail.com', '0978654311', '250', '2022-06-16', '250'),
(1037, '202093', 'Bernal', 'mark', 'gianan', '1978-12-09', '43 years old', 'Male', 'sta. cruz', 'virac', 'catanduanes', 'markbernal@gmail.com', '09655434339', '250', '2022-06-16', '250'),
(1038, '202108', 'bernal', 'ma. rowena', 'templo', '1995-05-10', '27 years old', 'Female', 'batalay', 'bato', 'catanduanes', 'rowenatemplo1995@gmail.com', '09519325937', '250', '2022-06-16', '250'),
(1039, '202096', 'boco', 'limuel', 'rojas', '1967-07-09', '54 years old', 'Male', 'balongbong', 'bato', 'Catanduanes', 'boco15@gmail.com', '09534542359', '250', '2022-06-16', '250'),
(1040, '202081', 'Bodino', 'Jojelyn', 'Francisco', '1999-03-18', '23 years old', 'Female', 'Buhi', 'San miguel', 'Catanduanes', 'Jojelyn@gmail.com', '09123456789', '250', '2022-06-16', '250'),
(1041, '202112', 'bodino', 'jomar', 'francisco', '1996-04-18', '26 years old', 'Male', 'buhi', 'san miguel', 'catanduanes', 'jakjomar@gmail.com', '09123456789', '250', '2022-06-16', '250'),
(1042, '202076', 'brutas', 'edward', 'tabuzo', '1978-06-04', '44 years old', 'Male', 'bote', 'bato', 'catanduanes', 'brutas@gmail.com', '09764326553', '250', '2022-06-16', '250'),
(1043, '202083', 'Cantalejo', 'Catherine', 'Nazareno', '1998-02-10', '24 years old', 'Female', 'Bagong Sirang ', 'San andres ', 'Catanduanes ', 'Catherine@gmail.com', '0978123456', '250', '2022-06-16', '250'),
(1044, '202089', 'Coma', 'Ashley ', 'Navales', '1997-09-14', '24 years old', 'Female', 'Calatagan', 'Virac ', 'Catanduanes ', 'Ashley@gmail.com', '0959152634', '250', '2022-06-16', '250'),
(1045, '202102', 'Condino', 'Mikaela', 'Santelicea', '1986-09-12', '35 years old', 'Female', 'Tubang ', 'San miguel', 'Catanduanea', 'Condino@gmail.com', '09784846464', '250', '2022-06-16', '250'),
(1046, '202075', 'david', 'ronald', 'tabo', '1985-08-19', '36 years old', 'Male', 'antipolo', 'virac', 'catanduanes', 'david@gmail.com', '09756421612', '2500', '2022-06-16', '2500'),
(1047, '202105', 'dela cruz', 'micheal', 'santos', '2001-07-01', '20 years old', 'Male', 'gogon', 'virac', 'catanduanes', 'delacruz321@gmail.com', '09071257780', '250', '2022-06-16', '250'),
(1048, '202070', 'Garcia', 'Genebe', 'go', '1997-12-11', '24 years old', 'Female', 'sta. elena', 'Virac', 'catanduanes', 'garcia@gmail.com', '09765498216', '250', '2022-06-16', '250'),
(1049, '202109', 'gianan', 'diane faye', ' ', '2000-02-12', '22 years old', 'Female', 'summit', 'viga', 'catanduanes', 'gyiagianan@gmail.com', '09305318301', '250', '2022-06-16', '250'),
(1050, '202106', 'gil', 'princess', 'vergara', '1998-02-12', '24 years old', 'Female', 'buenavista', 'bato', 'catanduanes', 'princessgail912@gmail.com', '09071527288', '250', '2022-06-16', '250'),
(1051, '202078', 'Hecita', 'Rosabel', 'Taroy', '2002-02-17', '20 years old', 'Female', 'Summit p.vera', 'Viga ', 'Catanduanes', 'rosabel@gmail.com', '09488752432', '250', '2022-06-16', '250'),
(1052, '202079', 'lopez', 'karen', 'tarnate', '1978-12-06', '43 years old', 'Female', 'rawis', 'virac', 'catanduanes', 'lopez@gmail.com', '09642115471', '250', '2022-06-16', '250'),
(1053, '202100', 'Marcelo', 'Garcia', 'Vargas ', '1970-11-26', '51 years old', 'Male', 'San vicente ', 'Bagamanoc', 'Catanduanes', 'Sanvicente@gmail.com', '0978456389', '250', '2022-06-16', '250'),
(1054, '202111', 'matienzo', 'rhodiniel', 'vargas', '1999-11-02', '22 years old', 'Male', 'hicming', 'virac', 'catanduanes', 'rhodinelmatienzo1120@gmail.com', '09123456789', '250', '2022-06-16', '250'),
(1055, '202101', 'sorrera', 'marialyn', 'ilig', '1998-04-04', '24 years old', 'Female', 'danicop', 'virac', 'catanduanes', 'emailynsorrera@gmail.com', '09518719273', '250', '2022-06-16', '250'),
(1056, '202074', 'molina', 'emelyn', 'david', '1987-03-08', '35 years old', 'Female', 'magnesia', 'virac', 'catanduanes', 'molina@gmail.com', '09755376243', '250', '2022-06-16', '250'),
(1057, '202103', 'morales', 'jemuel', 'terrrazola', '1999-11-09', '22 years old', 'Male', 'buhi', 'san miguel', 'catanduanes', 'nevergonnagiveup.jm@gmail.com', '09123456789', '250', '2022-06-16', '250'),
(1058, '202091', 'Navales', 'Jenny', 'Satairapan', '1995-01-10', '27 years old', 'Male', 'Baliti ', 'San andreas ', 'Catanduanes', 'Jenny@gmail.com', '0978645312', '250', '2022-06-16', '250'),
(1059, '202094', 'sumalde', 'almar', 'ibayan', '1956-09-08', '65 years old', 'Male', 'poniton', 'virac', 'catanduanes', 'sumalde@gmail.com', '09554213249', '250', '2022-06-16', '250'),
(1060, '202080', 'rojas', 'catherine', 'vega', '1956-07-02', '65 years old', 'Female', 'catagbagan', 'san andress', 'catanduanes', 'rojas@gmail.com', '09453456679', '250', '2022-06-16', '250'),
(1061, '202077', 'tabuzo', 'nikko', 'rojas', '1967-10-09', '54 years old', 'Male', 'talisoy', 'virac', 'catanduanes', 'tabuzo@gmail.com', '09765432523', '250', '2022-06-16', '250'),
(1062, '202072', 'tabo', 'jherlyn', 'supat', '1996-06-09', '26 years old', 'Male', 'cabcab', 'san andress ', 'catanduanes', 'tabojherlyn@gmail.com', '0975437665324', '250', '2022-06-16', '250'),
(1063, '202088', 'sarmiento', 'norme', 'garcia', '1984-04-07', '38 years old', 'Female', 'guinobatan', 'bato', 'catanduanes', 'sarmiento@gamil.com', '09436535639', '250', '2022-06-16', '250'),
(1064, '202092', 'Satairapan ', 'Babylyn', 'Villazenor', '1985-08-10', '36 years old', 'Female', 'San juan', 'Viga', 'Catanduanes ', 'Babylyn@gmail.com', '0978645324', '250', '2022-06-16', '250'),
(1065, '202099', 'sipocot', 'bryan', 'yuga', '1987-11-11', '34 years old', 'Male', 'catagbagan', 'san andress', 'catanduanes', 'sipocot@gmail.com', '09564325463', '250', '2022-06-16', '250'),
(1066, '202104', 'tapel', 'jeric', 'vitalicio', '2001-01-08', '21 years old', 'Male', 'buhi', 'san miguel', 'catanduanes', 'cardodalisay@gmail.com', '09071585716', '250', '2022-06-16', '250'),
(1067, '202084', 'tapit ', 'rosella', 'abundo', '1978-11-09', '43 years old', 'Female', 'san pablo', 'virac', 'catanduanes', 'tapit@gmail.com', '09763324177', '250', '2022-06-16', '250'),
(1068, '202098', 'tarnate', 'cherry', 'abella', '1967-12-08', '54 years old', 'Female', 'buyo', 'virac', 'catanduanes', 'tarnate14@gmail.com', '09355645679', '250', '2022-06-16', '250'),
(1069, '202113', 'tasarra', 'mariju', 'tedera', '1991-08-07', '30 years old', 'Male', 'aroyao', 'bato', 'catanduanes', 'tasarramariju5@gmail.com', '09515492887', '250', '2022-06-16', '250'),
(1070, '202071', 'taule', 'jenny', 'oscar', '1998-08-07', '23 years old', 'Female', 'cabugao', 'bato', 'catanduanes', 'taule@gmail.com', '09345278926', '250', '2022-06-16', '250'),
(1071, '202110', 'tavera', 'dhutz', 'tevar', '1998-01-13', '24 years old', 'Male', 'pagsangahan', 'san miguel', 'catanduanes', 'dhutskiesalvadortavera@gmail.com', '09127281861', '250', '2022-06-16', '250'),
(1072, '202107', 'tumpang', 'jhoel', 'tabirao', '1992-05-23', '30 years old', 'Male', 'lictin', 'san andress', 'catanduanes', 'joelpogi23@gmail.com', '09089373628', '250', '2022-06-16', '250'),
(1073, '202097', 'Vargas ', 'Angelica', 'Surban', '1993-12-12', '28 years old', 'Female', 'Manambrag', 'Panda ', 'Catanduanes ', 'Suraban@gmail.com', '0978654153', '250', '2022-06-16', '250'),
(1074, '202085', 'Zuniega', 'Zyrill ', 'Vargas ', '1990-06-20', '31 years old', 'Female', 'San juan ', 'Gigmoto ', 'Catanduanea', 'Zyrill@gmail.com', '0986147258', '2500', '2022-06-16', '2500'),
(1075, '202090', 'tadoy', 'maria', 'tarnate', '1965-12-08', '56 years old', 'Female', 'tilis', 'bato', 'catanduanes', 'tadoy@gmail.com', '09565354569', '2500', '2022-06-16', '2500');

-- --------------------------------------------------------

--
-- Table structure for table `loanpayment`
--

CREATE TABLE `loanpayment` (
  `id` int(11) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `dateofbirth` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `barangay` varchar(255) NOT NULL,
  `municipality` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `userid` varchar(255) NOT NULL,
  `loantype` varchar(255) NOT NULL,
  `loandate` varchar(255) NOT NULL,
  `months` varchar(255) NOT NULL,
  `interest` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `monthlypayment` varchar(255) NOT NULL,
  `duedate` varchar(255) NOT NULL,
  `totalpayableamount` varchar(255) NOT NULL,
  `totalbalance` varchar(255) NOT NULL,
  `lasttransaction` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `clastname` varchar(255) NOT NULL,
  `cfirstname` varchar(255) NOT NULL,
  `cmiddlename` varchar(255) NOT NULL,
  `caddress` varchar(255) NOT NULL,
  `cemail` varchar(255) NOT NULL,
  `ccontact` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loanpayment`
--

INSERT INTO `loanpayment` (`id`, `lastname`, `firstname`, `middlename`, `dateofbirth`, `age`, `gender`, `barangay`, `municipality`, `province`, `contact`, `email`, `userid`, `loantype`, `loandate`, `months`, `interest`, `amount`, `monthlypayment`, `duedate`, `totalpayableamount`, `totalbalance`, `lasttransaction`, `status`, `clastname`, `cfirstname`, `cmiddlename`, `caddress`, `cemail`, `ccontact`) VALUES
(100033, 'sipocot', 'bryan', 'yuga', '1987-11-11', '24 years old', 'Male', 'catagbagan', 'san andress', 'catanduanes', '09564325463', 'sipocot@gmail.com', '202099', 'micro business', '2022-06-02', '6', '12', '10000', '1866.67', '2022-06-16', '11196', '9330', '2022-06-09', 'On Process', 'Benavidez', 'Jomar', 'Co', 'Gogon,  virac catanduanes', 'Jomar@gmail.com', '09471239989'),
(100034, 'Garcia', 'Genebe', 'go', '1997-12-11', '24 years old', 'Female', 'sta. elena', 'Virac', 'catanduanes', '09765498216', 'garcia@gmail.com', '202070', 'educational business', '2022-06-02', '6', '12', '5000', '933.33', '2022-06-16', '5598', '4665', '2022-06-09', 'On Process', 'Tevar', 'Lovely', 'Sarmiento', 'Sta. Elena,  Virac catanduanes', 'Lovely@gmail.com', '09785545589'),
(100035, 'taule', 'jenny', 'oscar', '1998-08-07', '24 years old', 'Female', 'cabugao', 'bato', 'catanduanes', '09345278926', 'taule@gmail.com', '202071', 'water and sanitation', '2022-06-02', '6', '12', '3000', '560.00', '2022-06-16', '3360', '2800', '2022-06-09', 'On Process', 'Manigote', 'Kurt', 'Sta Ines', 'Cabugao,  bato catanduanes', 'Manigote6@gmail.com', '09452618846'),
(100036, 'tabo', 'jherlyn', 'supat', '1996-06-09', '24 years old', 'Male', 'cabcab', 'san andress ', 'catanduanes', '0975437665324', 'tabojherlyn@gmail.com', '202072', 'housing loan', '2022-06-02', '6', '12', '20000', '3733.33', '2022-06-16', '22398', '18665', '2022-06-09', 'On Process', 'Suman', 'Angie', 'Istong', 'Cabcab,  san andress catanduanes', 'Istong@gmail.com', '09785421399'),
(100037, 'bautista', 'richard', 'ubalde', '1967-10-07', '24 years old', 'Male', 'sta. cruz', 'virac', 'catanduanes', '09785646538', 'bautista@gmail.com', '202073', 'educational business', '2022-06-02', '6', '12', '5000', '933.33', '2022-06-16', '5598', '4665', '2022-06-09', 'On Process', 'Pascal', 'Charles', 'Turing', 'Rawis virac, catanduanes', 'Turing@gmail.com', '09785213948'),
(100038, 'molina', 'emelyn', 'david', '1987-03-08', '24 years old', 'Female', 'magnesia', 'virac', 'catanduanes', '09755376243', 'molina@gmail.com', '202074', 'water and sanitation', '2022-06-02', '6', '12', '3000', '560.00', '2022-06-16', '3360', '2800', '2022-06-09', 'On Process', 'Occray', 'Jessa', 'Yugan', 'Magnesia,  virac catanduanes', 'Occryajessa@gmail.com', '09855494948'),
(100039, 'david', 'ronald', 'tabo', '1985-08-19', '24 years old', 'Male', 'antipolo', 'virac', 'catanduanes', '09756421612', 'david@gmail.com', '202075', 'micro business', '2022-06-02', '6', '12', '10000', '1866.67', '2022-06-16', '11196', '9330', '2022-06-09', 'On Process', 'Tabuzo', 'Nikko', 'Goste', 'Antipolo,  virac catanduanes', 'Tabuzo@gmail.com', '09785454949'),
(100040, 'brutas', 'edward', 'tabuzo', '1978-06-04', '24 years old', 'Male', 'bote', 'bato', 'catanduanes', '09764326553', 'brutas@gmail.com', '202076', 'water and sanitation', '2022-06-02', '6', '12', '3000', '560.00', '2022-06-16', '3360', '2800', '2022-06-09', 'On Process', 'Neggi', 'Allan', 'Sipocot', 'Bote,  bato catanduanes', 'Allan18@gmail.com', '09748454649'),
(100041, 'tabuzo', 'nikko', 'rojas', '1967-10-09', '24 years old', 'Male', 'talisoy', 'virac', 'catanduanes', '09765432523', 'tabuzo@gmail.com', '202077', 'educational business', '2022-06-02', '6', '12', '5000', '933.33', '2022-06-16', '5598', '4665', '2022-06-09', 'On Process', 'Bartik', 'Blaise', 'Klien', 'Talisoy,  virac catanduanes', 'Klien19@gmail.com', '09458848549'),
(100042, 'Hecita', 'Rosabel', 'Taroy', '2002-02-17', '24 years old', 'Female', 'Summit p.vera', 'Viga ', 'Catanduanes', '09488752432', 'rosabel@gmail.com', '202078', 'housing loan', '2022-06-02', '6', '12', '20000', '3733.33', '2022-06-16', '22398', '14932', '2022-06-09', 'On Process', 'Zuniega', 'Bryan', 'Tabo', 'Vega,  catanduanes', 'Bryan18@gmail.com', '0945484669'),
(100043, 'lopez', 'karen', 'tarnate', '1978-12-06', '24 years old', 'Female', 'rawis', 'virac', 'catanduanes', '09642115471', 'lopez@gmail.com', '202079', 'educational business', '2022-06-02', '6', '12', '5000', '933.33', '2022-06-16', '5598', '4665', '2022-06-09', 'On Process', 'Marcos', 'Leny', 'Arroyo', 'Rawis,  virac catanduanes', 'Lenlen17@gmail.com', '09785546499'),
(100044, 'sarmiento', 'norme', 'garcia', '1984-04-07', '24 years old', 'Female', 'guinobatan', 'bato', 'catanduanes', '09436535639', 'sarmiento@gamil.com', '202088', 'housing loan', '2022-06-02', '6', '12', '20000', '3733.33', '2022-06-16', '22398', '18665', '2022-06-09', 'On Process', 'Co', 'Marleth', 'Estrada', 'Guinobatan,  bato catanduanes', 'Co06@gmail.com', '09785454455'),
(100045, 'sumalde', 'almar', 'ibayan', '1956-09-08', '24 years old', 'Male', 'poniton', 'virac', 'catanduanes', '09554213249', 'sumalde@gmail.com', '202094', 'micro business', '2022-06-02', '6', '12', '10000', '1866.67', '2022-06-16', '11196', '9330', '2022-06-09', 'On Process', 'Tatad', 'Erika', 'Tabuzo', 'Buyo,  virac catanduanes', 'Tatad@gmail.com', '09785542499'),
(100046, 'tadoy', 'maria', 'tarnate', '1965-12-08', '24 years old', 'Female', 'tilis', 'bato', 'catanduanes', '09565354569', 'tadoy@gmail.com', '202090', 'water and sanitation', '2022-06-02', '6', '12', '3000', '560.00', '2022-06-16', '3360', '2800', '2022-06-09', 'On Process', 'Vergara', 'Bong', 'Tribiana', 'Tilis,  bato catanduanes', 'Vergara@gmail.com', '09178754699'),
(100047, 'tavera', 'dhutz', 'tevar', '1998-01-13', '24 years old', 'Male', 'pagsangahan', 'san miguel', 'catanduanes', '09127281861', 'dhutskiesalvadortavera@gmail.com', '202110', 'educational business', '2022-06-02', '6', '12', '5000', '933.33', '2022-06-16', '5598', '4665', '2022-06-09', 'On Process', 'Tevar', 'Antonio', 'Ubalde', 'Pagsangahan,  San Miguel  catanduanes', 'Junjun@gmail.com', '09458894999'),
(100048, 'Navales', 'Jenny', 'Satairapan', '1995-01-10', '24 years old', 'Male', 'Baliti ', 'San andreas ', 'Catanduanes', '0978645312', 'Jenny@gmail.com', '202091', 'housing loan', '2022-06-02', '6', '12', '20000', '3733.33', '2022-06-16', '22398', '18665', '2022-06-09', 'On Process', 'Bernal', 'Estelle', 'Hodie', 'Baliti,  san Andress catanduanes', 'Hodiess@gmail.com', '09745449949'),
(100049, 'sorrera', 'marialyn', 'ilig', '1998-04-04', '24 years old', 'Female', 'danicop', 'virac', 'catanduanes', '09518719273', 'emailynsorrera@gmail.com', '202101', 'micro business', '2022-06-02', '6', '12', '10000', '1866.67', '2022-06-16', '11196', '9330', '2022-06-09', 'On Process', 'Isorena', 'Rowena', 'Oscar', 'Danicop,  virac catanduanes', 'Wenwen17@gmail.com', '09454594999'),
(100050, 'morales', 'jemuel', 'terrrazola', '1999-11-09', '24 years old', 'Male', 'buhi', 'san miguel', 'catanduanes', '09123456789', 'nevergonnagiveup.jm@gmail.com', '202103', 'micro business', '2022-06-02', '6', '12', '10000', '1866.67', '2022-06-16', '11196', '9330', '2022-06-09', 'On Process', 'Zafe', 'Omar', 'Omadto', 'Buhi,  san miguel  Catanduanea', 'Omadto17@gmail.com', '098456494999'),
(100051, 'gil', 'princess', 'vergara', '1998-02-12', '24 years old', 'Female', 'buenavista', 'bato', 'catanduanes', '09071527288', 'princessgail912@gmail.com', '202106', 'housing loan', '2022-06-02', '6', '12', '20000', '3733.33', '2022-06-16', '22398', '18665', '2022-06-09', 'On Process', 'Guerero', 'Felipi', 'Tayas', 'Bagumbayan,  bato catanduanes', 'Tayas@gmail.com', '09542464699'),
(100052, 'gianan', 'diane faye', ' ', '2000-02-12', '', 'Female', 'summit', 'viga', 'catanduanes', '09305318301', 'gyiagianan@gmail.com', '202109', 'water and sanitation', '2022-06-03', '6', '12', '3000', '560.00', '2022-06-10', '3360', '3360', '', 'On Process', 'Coronejo', 'Ricky', 'Yowyow', 'Summit,  catanduanea', 'Ricky20@gmail.com', '09754546949'),
(100053, 'Bodino', 'Jojelyn', 'Francisco', '1999-03-18', '', 'Female', 'Buhi', 'San miguel', 'Catanduanes', '09123456789', 'Jojelyn@gmail.com', '202081', 'educational business', '2022-06-03', '6', '12', '5000', '933.33', '2022-06-10', '5598', '5598', '', 'On Process', 'bodino', 'jomar', 'francisco', 'buhi, san miguel catanduanes', 'jakjom@gmail.com', '09123456789'),
(100054, 'Malinana', 'Maricel', 'Vargas', '1993-06-02', '', 'Male', 'Buyo', 'Virac', 'Catanduanes', '09471580096', 'Vargas05@gmail.com', '202114', 'educational business', '2022-06-03', '6', '12', '5000', '933.33', '2022-06-10', '5598', '5598', '', 'On Process', 'Vargas', 'Mark', 'Malinana', 'Buyo,  virac catanduanes', 'Mark09@gmail.com', '09787546499'),
(100055, 'Salvador', 'Alvin', 'Oscar', '1993-07-21', '', 'Male', 'Binanuahan', 'Bato', 'Catanduanes', '09785566169', 'Badong@gmail.com', '202115', 'water and sanitation', '2022-06-03', '6', '12', '3000', '560.00', '2022-06-10', '3360', '3360', '', 'On Process', 'Traquena', 'Mitch', 'Oming', 'Binanuahan,  bato catanduanes', 'Mitch@gmail.com', '09785661649'),
(100056, 'Sattelis', 'Jezrel', 'Tui', '1991-08-25', '', 'Male', 'Marinawa,  Bato catanduanes', 'Bato', 'Catanduanes', '09787459449', 'Bon@gmail.com', '202116', 'water and sanitation', '2022-06-03', '6', '12', '3000', '560.00', '2022-06-10', '3360', '3360', '', 'On Process', 'Lopez', 'Patrick', 'Franz', 'Marinawa,  bato catanduanes', 'Pat18@gmail.com', '09454649499'),
(100057, 'Tabuzo', 'Francis', 'Bernal', '1987-09-30', '', 'Female', 'San juan', 'Virac', 'Catanduanes', '09785454949', 'Francis@gmail.Com', '202117', 'micro business', '2022-06-03', '6', '12', '10000', '1866.67', '2022-06-10', '11196', '11196', '', 'On Process', 'Korne', 'Richard', 'Magsaysay', 'San Juan,  Virac catanduanes', 'Ric@gmail.com', '09475699499'),
(100058, 'Dalisay', 'Cardo', 'Lucar', '1986-10-28', '', 'Male', 'Marinawa', 'Bato', 'Catanduanes', '09756643499', 'Cards@gmail.com', '202118', 'educational business', '2022-06-03', '6', '12', '5000', '933.33', '2022-06-10', '5598', '5598', '', 'On Process', 'Owin', 'Maricar', 'Tiong', 'Marinawa,  bato catanduanes', 'Tiong@gmail.com', '09785569949'),
(100059, 'Padilla', 'Ronnie', 'Roias', '1997-12-16', '', 'Male', 'Rawis', 'Virac', 'Catanduanes', '09785549166', 'Ronnie@gmail.com', '202119', 'micro business', '2022-06-03', '6', '12', '10000', '1866.67', '2022-06-10', '11196', '11196', '', 'On Process', 'Magnote', 'Kurt', 'Yup', 'Rawis, virac catanduanes', 'Kurt@gmail.com', '09856494999'),
(100060, 'tapel', 'jeric', 'vitalicio', '2001-01-08', '', 'Male', 'buhi', 'san miguel', 'catanduanes', '09071585716', 'cardodalisay@gmail.com', '202104', 'educational business', '2022-06-03', '6', '12', '5000', '933.33', '2022-06-10', '5598', '5598', '', 'On Process', 'Tarnate', 'Joy', 'Taperla', 'Buhi,  San miguel catanduanes', 'Joy@gmail.com', '09787549949'),
(100061, 'bodino', 'jomar', 'francisco', '1996-04-18', '26 years old', 'Male', 'buhi', 'san miguel', 'catanduanes', '09123456789', 'jakjomar@gmail.com', '202112', 'water and sanitation', '2021-12-09', '6', '12', '3000', '560.00', 'Loan Settled', '3360', '0', '2022-01-20', 'Finished', 'bodino', 'jojelyn', 'francisco', 'buhi, san miguel catanduanes', 'joj@gmail.com', '09172537612');

-- --------------------------------------------------------

--
-- Table structure for table `loanplans`
--

CREATE TABLE `loanplans` (
  `loanplansid` int(255) NOT NULL,
  `planid` varchar(255) NOT NULL,
  `loantype` varchar(255) NOT NULL,
  `monthlypayment` varchar(255) NOT NULL,
  `totalpayment` varchar(255) NOT NULL,
  `months` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `interest` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loanplans`
--

INSERT INTO `loanplans` (`loanplansid`, `planid`, `loantype`, `monthlypayment`, `totalpayment`, `months`, `amount`, `interest`) VALUES
(20211, '84264', 'micro business', '1866.67', '11196', '6', '10000', '12'),
(20212, '54264', 'educational business', '933.33', '5598', '6', '5000', '12'),
(20213, '144264', 'housing loan', '3733.33', '22398', '6', '20000', '12'),
(20214, '42264', 'water and sanitation', '560.00', '3360', '6', '3000', '12');

-- --------------------------------------------------------

--
-- Table structure for table `loantypes`
--

CREATE TABLE `loantypes` (
  `id` int(255) NOT NULL,
  `types` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loantypes`
--

INSERT INTO `loantypes` (`id`, `types`, `description`) VALUES
(48, 'micro business', 'Micro Business'),
(49, 'educational business', 'Educational Business'),
(50, 'housing loan', 'housing loan'),
(51, 'water and sanitation', 'water and sanitation');

-- --------------------------------------------------------

--
-- Table structure for table `loanuserpayment`
--

CREATE TABLE `loanuserpayment` (
  `id` int(255) NOT NULL,
  `loanid` varchar(255) NOT NULL,
  `userid` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `dateofbirth` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `barangay` varchar(255) NOT NULL,
  `municipality` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `loandate` varchar(255) NOT NULL,
  `loantype` varchar(255) NOT NULL,
  `months` varchar(255) NOT NULL,
  `interest` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `totalpayableamount` varchar(255) NOT NULL,
  `monthlypayment` varchar(255) NOT NULL,
  `duedate` varchar(255) NOT NULL,
  `totalbalance` varchar(255) NOT NULL,
  `payment` varchar(255) NOT NULL,
  `lasttransaction` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loanuserpayment`
--

INSERT INTO `loanuserpayment` (`id`, `loanid`, `userid`, `lastname`, `firstname`, `middlename`, `dateofbirth`, `age`, `barangay`, `municipality`, `province`, `gender`, `contact`, `email`, `loandate`, `loantype`, `months`, `interest`, `amount`, `totalpayableamount`, `monthlypayment`, `duedate`, `totalbalance`, `payment`, `lasttransaction`, `status`) VALUES
(296, '100033', '202099', 'sipocot', 'bryan', 'yuga', '1987-11-11', '', 'catagbagan', 'san andress', 'catanduanes', 'Male', '09564325463', 'sipocot@gmail.com', '2022-06-02', 'micro business', '6', '12', '10000', '11196', '1866.67', '2022-07-09', '9330', '1866.67', '2022-06-09', 'On Process'),
(297, '100034', '202070', 'Garcia', 'Genebe', 'go', '1997-12-11', '', 'sta. elena', 'Virac', 'catanduanes', 'Female', '09765498216', 'garcia@gmail.com', '2022-06-02', 'educational business', '6', '12', '5000', '5598', '933.33', '2022-07-09', '4665', '933.33', '2022-06-09', 'On Process'),
(298, '100035', '202071', 'taule', 'jenny', 'oscar', '1998-08-07', '', 'cabugao', 'bato', 'catanduanes', 'Female', '09345278926', 'taule@gmail.com', '2022-06-02', 'water and sanitation', '6', '12', '3000', '3360', '560.00', '2022-07-09', '2800', '560.00', '2022-06-09', 'On Process'),
(299, '100036', '202072', 'tabo', 'jherlyn', 'supat', '1996-06-09', '', 'cabcab', 'san andress ', 'catanduanes', 'Male', '0975437665324', 'tabojherlyn@gmail.com', '2022-06-02', 'housing loan', '6', '12', '20000', '22398', '3733.33', '2022-07-09', '18665', '3733.33', '2022-06-09', 'On Process'),
(300, '100037', '202073', 'bautista', 'richard', 'ubalde', '1967-10-07', '', 'sta. cruz', 'virac', 'catanduanes', 'Male', '09785646538', 'bautista@gmail.com', '2022-06-02', 'educational business', '6', '12', '5000', '5598', '933.33', '2022-07-09', '4665', '933.33', '2022-06-09', 'On Process'),
(301, '100038', '202074', 'molina', 'emelyn', 'david', '1987-03-08', '', 'magnesia', 'virac', 'catanduanes', 'Female', '09755376243', 'molina@gmail.com', '2022-06-02', 'water and sanitation', '6', '12', '3000', '3360', '560.00', '2022-07-09', '2800', '560.00', '2022-06-09', 'On Process'),
(302, '100039', '202075', 'david', 'ronald', 'tabo', '1985-08-19', '', 'antipolo', 'virac', 'catanduanes', 'Male', '09756421612', 'david@gmail.com', '2022-06-02', 'micro business', '6', '12', '10000', '11196', '1866.67', '2022-07-09', '9330', '1866.67', '2022-06-09', 'On Process'),
(303, '100040', '202076', 'brutas', 'edward', 'tabuzo', '1978-06-04', '', 'bote', 'bato', 'catanduanes', 'Male', '09764326553', 'brutas@gmail.com', '2022-06-02', 'water and sanitation', '6', '12', '3000', '3360', '560.00', '2022-07-09', '2800', '560.00', '2022-06-09', 'On Process'),
(304, '100041', '202077', 'tabuzo', 'nikko', 'rojas', '1967-10-09', '', 'talisoy', 'virac', 'catanduanes', 'Male', '09765432523', 'tabuzo@gmail.com', '2022-06-02', 'educational business', '6', '12', '5000', '5598', '933.33', '2022-07-09', '4665', '933.33', '2022-06-09', 'On Process'),
(305, '100042', '202078', 'Hecita', 'Rosabel', 'Taroy', '2002-02-17', '', 'Summit p.vera', 'Viga ', 'Catanduanes', 'Female', '09488752432', 'rosabel@gmail.com', '2022-06-02', 'housing loan', '6', '12', '20000', '22398', '3733.33', '2022-07-09', '18665', '3733.33', '2022-06-09', 'On Process'),
(306, '100043', '202079', 'lopez', 'karen', 'tarnate', '1978-12-06', '', 'rawis', 'virac', 'catanduanes', 'Female', '09642115471', 'lopez@gmail.com', '2022-06-02', 'educational business', '6', '12', '5000', '5598', '933.33', '2022-07-09', '4665', '933.33', '2022-06-09', 'On Process'),
(307, '100044', '202088', 'sarmiento', 'norme', 'garcia', '1984-04-07', '', 'guinobatan', 'bato', 'catanduanes', 'Female', '09436535639', 'sarmiento@gamil.com', '2022-06-02', 'housing loan', '6', '12', '20000', '22398', '3733.33', '2022-07-09', '18665', '3733.33', '2022-06-09', 'On Process'),
(308, '100045', '202094', 'sumalde', 'almar', 'ibayan', '1956-09-08', '', 'poniton', 'virac', 'catanduanes', 'Male', '09554213249', 'sumalde@gmail.com', '2022-06-02', 'micro business', '6', '12', '10000', '11196', '1866.67', '2022-07-09', '9330', '1866.67', '2022-06-09', 'On Process'),
(309, '100045', '202094', 'sumalde', 'almar', 'ibayan', '1956-09-08', '', 'poniton', 'virac', 'catanduanes', 'Male', '09554213249', 'sumalde@gmail.com', '2022-06-02', 'micro business', '6', '12', '10000', '11196', '1866.67', '2022-07-09', '9330', '1866.67', '2022-06-09', 'On Process'),
(310, '100046', '202090', 'tadoy', 'maria', 'tarnate', '1965-12-08', '', 'tilis', 'bato', 'catanduanes', 'Female', '09565354569', 'tadoy@gmail.com', '2022-06-02', 'water and sanitation', '6', '12', '3000', '3360', '560.00', '2022-07-09', '2800', '560.00', '2022-06-09', 'On Process'),
(311, '100047', '202110', 'tavera', 'dhutz', 'tevar', '1998-01-13', '', 'pagsangahan', 'san miguel', 'catanduanes', 'Male', '09127281861', 'dhutskiesalvadortavera@gmail.com', '2022-06-02', 'educational business', '6', '12', '5000', '5598', '933.33', '2022-07-09', '4665', '933.33', '2022-06-09', 'On Process'),
(312, '100048', '202091', 'Navales', 'Jenny', 'Satairapan', '1995-01-10', '', 'Baliti ', 'San andreas ', 'Catanduanes', 'Male', '0978645312', 'Jenny@gmail.com', '2022-06-02', 'housing loan', '6', '12', '20000', '22398', '3733.33', '2022-07-09', '18665', '3733.33', '2022-06-09', 'On Process'),
(313, '100049', '202101', 'sorrera', 'marialyn', 'ilig', '1998-04-04', '', 'danicop', 'virac', 'catanduanes', 'Female', '09518719273', 'emailynsorrera@gmail.com', '2022-06-02', 'micro business', '6', '12', '10000', '11196', '1866.67', '2022-07-09', '9330', '1866.67', '2022-06-09', 'On Process'),
(314, '100042', '202078', 'Hecita', 'Rosabel', 'Taroy', '2002-02-17', '', 'Summit p.vera', 'Viga ', 'Catanduanes', 'Female', '09488752432', 'rosabel@gmail.com', '2022-06-02', 'housing loan', '6', '12', '20000', '22398', '3733.33', '2022-07-09', '14932', '3733.33', '2022-06-09', 'On Process'),
(315, '100050', '202103', 'morales', 'jemuel', 'terrrazola', '1999-11-09', '', 'buhi', 'san miguel', 'catanduanes', 'Male', '09123456789', 'nevergonnagiveup.jm@gmail.com', '2022-06-02', 'micro business', '6', '12', '10000', '11196', '1866.67', '2022-07-09', '9330', '1866.67', '2022-06-09', 'On Process'),
(316, '100050', '202103', 'morales', 'jemuel', 'terrrazola', '1999-11-09', '', 'buhi', 'san miguel', 'catanduanes', 'Male', '09123456789', 'nevergonnagiveup.jm@gmail.com', '2022-06-02', 'micro business', '6', '12', '10000', '11196', '1866.67', '2022-07-09', '9330', '1866.67', '2022-06-09', 'On Process'),
(317, '100051', '202106', 'gil', 'princess', 'vergara', '1998-02-12', '', 'buenavista', 'bato', 'catanduanes', 'Female', '09071527288', 'princessgail912@gmail.com', '2022-06-02', 'housing loan', '6', '12', '20000', '22398', '3733.33', '2022-07-09', '18665', '3733.33', '2022-06-09', 'On Process'),
(318, '100061', '202112', 'bodino', 'jomar', 'francisco', '1996-04-18', '', 'buhi', 'san miguel', 'catanduanes', 'Male', '09123456789', 'jakjomar@gmail.com', '2021-12-09', 'water and sanitation', '6', '12', '3000', '3360', '560.00', '2022-01-15', '2800', '560.00', '2021-12-16', 'On Process'),
(319, '100061', '202112', 'bodino', 'jomar', 'francisco', '1996-04-18', '', 'buhi', 'san miguel', 'catanduanes', 'Male', '09123456789', 'jakjomar@gmail.com', '2021-12-09', 'water and sanitation', '6', '12', '3000', '3360', '560.00', '2022-01-22', '2240', '560.00', '2021-12-23', 'On Process'),
(320, '100061', '202112', 'bodino', 'jomar', 'francisco', '1996-04-18', '', 'buhi', 'san miguel', 'catanduanes', 'Male', '09123456789', 'jakjomar@gmail.com', '2021-12-09', 'water and sanitation', '6', '12', '3000', '3360', '560.00', '2022-01-22', '2240', '560.00', '2021-12-23', 'On Process'),
(321, '100061', '202112', 'bodino', 'jomar', 'francisco', '1996-04-18', '', 'buhi', 'san miguel', 'catanduanes', 'Male', '09123456789', 'jakjomar@gmail.com', '2021-12-09', 'water and sanitation', '6', '12', '3000', '3360', '560.00', '2022-01-29', '1680', '560.00', '2021-12-30', 'On Process'),
(322, '100061', '202112', 'bodino', 'jomar', 'francisco', '1996-04-18', '', 'buhi', 'san miguel', 'catanduanes', 'Male', '09123456789', 'jakjomar@gmail.com', '2021-12-09', 'water and sanitation', '6', '12', '3000', '3360', '560.00', '2022-02-05', '1120', '560.00', '2022-01-06', 'On Process'),
(323, '100061', '202112', 'bodino', 'jomar', 'francisco', '1996-04-18', '', 'buhi', 'san miguel', 'catanduanes', 'Male', '09123456789', 'jakjomar@gmail.com', '2021-12-09', 'water and sanitation', '6', '12', '3000', '3360', '560.00', '2022-02-12', '560', '560.00', '2022-01-13', 'On Process'),
(324, '100061', '202112', 'bodino', 'jomar', 'francisco', '1996-04-18', '', 'buhi', 'san miguel', 'catanduanes', 'Male', '09123456789', 'jakjomar@gmail.com', '2021-12-09', 'water and sanitation', '6', '12', '3000', '3360', '560.00', '2022-02-19', '0', '560.00', '2022-01-20', 'Finished');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `dateofbirth` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `municipality` varchar(255) NOT NULL,
  `barangay` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `loanstatus` varchar(255) NOT NULL,
  `savings` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `firstname`, `lastname`, `middlename`, `dateofbirth`, `age`, `gender`, `province`, `municipality`, `barangay`, `email`, `password`, `contact`, `loanstatus`, `savings`) VALUES
(202070, 'Genebe', 'Garcia', 'go', '1997-12-11', '24 years old', 'Female', 'catanduanes', 'Virac', 'sta. elena', 'garcia@gmail.com', '', '09765498216', 'On Process', '250'),
(202071, 'jenny', 'taule', 'oscar', '1998-08-07', '23 years old', 'Female', 'catanduanes', 'bato', 'cabugao', 'taule@gmail.com', '', '09345278926', 'On Process', '250'),
(202072, 'jherlyn', 'tabo', 'supat', '1996-06-09', '26 years old', 'Male', 'catanduanes', 'san andress ', 'cabcab', 'tabojherlyn@gmail.com', '', '0975437665324', 'On Process', '250'),
(202073, 'richard', 'bautista', 'ubalde', '1967-10-07', '54 years old', 'Male', 'catanduanes', 'virac', 'sta. cruz', 'bautista@gmail.com', '', '09785646538', 'On Process', '250'),
(202074, 'emelyn', 'molina', 'david', '1987-03-08', '35 years old', 'Female', 'catanduanes', 'virac', 'magnesia', 'molina@gmail.com', '', '09755376243', 'On Process', '250'),
(202075, 'ronald', 'david', 'tabo', '1985-08-19', '36 years old', 'Male', 'catanduanes', 'virac', 'antipolo', 'david@gmail.com', '', '09756421612', 'On Process', '2500'),
(202076, 'edward', 'brutas', 'tabuzo', '1978-06-04', '44 years old', 'Male', 'catanduanes', 'bato', 'bote', 'brutas@gmail.com', '', '09764326553', 'On Process', '250'),
(202077, 'nikko', 'tabuzo', 'rojas', '1967-10-09', '54 years old', 'Male', 'catanduanes', 'virac', 'talisoy', 'tabuzo@gmail.com', '', '09765432523', 'On Process', '250'),
(202078, 'Rosabel', 'Hecita', 'Taroy', '2002-02-17', '20 years old', 'Female', 'Catanduanes', 'Viga ', 'Summit p.vera', 'rosabel@gmail.com', '', '09488752432', 'On Process', '250'),
(202079, 'karen', 'lopez', 'tarnate', '1978-12-06', '43 years old', 'Female', 'catanduanes', 'virac', 'rawis', 'lopez@gmail.com', '', '09642115471', 'On Process', '250'),
(202080, 'catherine', 'rojas', 'vega', '1956-07-02', '65 years old', 'Female', 'catanduanes', 'san andress', 'catagbagan', 'rojas@gmail.com', '', '09453456679', '', '250'),
(202081, 'Jojelyn', 'Bodino', 'Francisco', '1999-03-18', '23 years old', 'Male', 'Catanduanes', 'San miguel', 'Buhi', 'Jojelyn@gmail.com', '', '09123456789', 'On Process', '250'),
(202082, 'allysa', 'benavidez', 'tapit', '1976-12-07', '45 years old', 'Male', 'catanduanes', 'san andress', 'salvacion', 'benavidez@gmail.com', '', '09565438939', '', '250'),
(202083, 'Catherine', 'Cantalejo', 'Nazareno', '1998-02-10', '24 years old', 'Male', 'Catanduanes', 'San andres ', 'Bagong Silang ', 'Catherine@gmail.com', '', '0978123456', '', '250'),
(202084, 'rosella', 'tapit ', 'abundo', '1978-11-09', '43 years old', 'Female', 'catanduanes', 'virac', 'san pablo', 'tapit@gmail.com', '', '09763324177', '', '250'),
(202085, 'Zyrill ', 'Zuniega', 'Vargas ', '1990-06-20', '31 years old', 'Male', 'Catanduanes', 'Gigmoto ', 'San juan ', 'Zyrill@gmail.com', '', '0986147258', '', '2500'),
(202086, 'lea', 'abundo', 'sarmiento', '1966-09-08', '55 years old', 'Female', 'catanduanes', 'virac', 'salvacion ', 'abundo@gmail.com', '', '09564356532', '', '57750'),
(202087, 'Shirley', 'Abundo', 'Cua', '1988-01-11', '34 years old', 'Male', 'Catanduanes', 'Virac ', 'Cavinitan', 'Shirley@gmail.com', '', '0987654321', '', '250'),
(202088, 'norme', 'sarmiento', 'garcia', '1984-04-07', '38 years old', 'Female', 'catanduanes', 'bato', 'guinobatan', 'sarmiento@gamil.com', '', '09436535639', 'On Process', '250'),
(202089, 'Ashley ', 'Coma', 'Navales', '1997-09-14', '24 years old', 'Male', 'Catanduanes', 'Virac ', 'Calatagan', 'Ashley@gmail.com', '', '0959152634', '', '250'),
(202090, 'maria', 'tadoy', 'tarnate', '1965-12-08', '56 years old', 'Female', 'catanduanes', 'bato', 'tilis', 'tadoy@gmail.com', '', '09565354569', 'On Process', '2500'),
(202091, 'Jenny', 'Navales', 'Satairapan', '1995-01-10', '27 years old', 'Male', 'Catanduanes', 'San andreas ', 'Baliti ', 'Jenny@gmail.com', '', '0978645312', 'On Process', '250'),
(202092, 'Babylyn', 'Satairapan ', 'Villazenor', '1985-08-10', '36 years old', 'Male', 'Catanduanes', 'Viga', 'San juan', 'Babylyn@gmail.com', '', '0978645324', '', '250'),
(202093, 'mark', 'Bernal', 'gianan', '1978-12-09', '43 years old', 'Male', 'catanduanes', 'virac', 'sta. cruz', 'markbernal@gmail.com', '', '09655434339', '', '250'),
(202094, 'almar', 'sumalde', 'ibayan', '1956-09-08', '65 years old', 'Male', 'catanduanes', 'virac', 'poniton', 'sumalde@gmail.com', '', '09554213249', 'On Process', '250'),
(202095, 'Kathlyn', 'Bermejo', 'Villegas', '1989-05-15', '33 years old', 'Male', 'Catanduanes', 'Bato', 'Sipocot', 'Kathlyn@gmail.com', '', '0978654311', '', '250'),
(202096, 'limuel', 'boco', 'rojas', '1967-07-09', '54 years old', 'Male', 'Catanduanes', 'bato', 'balongbong', 'boco15@gmail.com', '', '09534542359', '', '250'),
(202097, 'Angelica', 'Vargas ', 'Surban', '1993-12-12', '28 years old', 'Male', 'Catanduanes', 'Panda ', 'Manambrag', 'Suraban@gmail.com', '', '0978654153', '', '250'),
(202098, 'cherry', 'tarnate', 'abella', '1967-12-08', '54 years old', 'Female', 'catanduanes', 'virac', 'buyo', 'tarnate14@gmail.com', '', '09355645679', '', '250'),
(202099, 'bryan', 'sipocot', 'yuga', '1987-11-11', '34 years old', 'Male', 'catanduanes', 'san andress', 'catagbagan', 'sipocot@gmail.com', '', '09564325463', 'On Process', '250'),
(202100, 'Garcia', 'Marcelo', 'Vargas ', '1970-11-26', '51 years old', 'Male', 'Catanduanes', 'Bagamanoc', 'San vicente ', 'Sanvicente@gmail.com', '', '0978456389', '', '250'),
(202101, 'marialyn', 'sorrera', 'ilig', '1998-04-04', '24 years old', 'Female', 'catanduanes', 'virac', 'danicop', 'emailynsorrera@gmail.com', '', '09518719273', 'On Process', '250'),
(202102, 'Mikaela', 'Condino', 'Santelicea', '1986-09-12', '35 years old', 'Male', 'Catanduanes', 'San miguel', 'Tubang ', 'Condino@gmail.com', '', '09784846464', '', '250'),
(202103, 'jemuel', 'morales', 'terrrazola', '1999-11-09', '22 years old', 'Male', 'catanduanes', 'san miguel', 'buhi', 'nevergonnagiveup.jm@gmail.com', '', '09123456789', 'On Process', '250'),
(202104, 'jeric', 'tapel', 'vitalicio', '2001-01-08', '21 years old', 'Male', 'catanduanes', 'san miguel', 'buhi', 'cardodalisay@gmail.com', '', '09071585716', 'On Process', '250'),
(202105, 'micheal', 'dela cruz', 'santos', '2001-07-01', '20 years old', 'Male', 'catanduanes', 'virac', 'gogon', 'delacruz321@gmail.com', '', '09071257780', '', '250'),
(202106, 'princess', 'gil', 'vergara', '1998-02-12', '24 years old', 'Female', 'catanduanes', 'bato', 'buenavista', 'princessgail912@gmail.com', '', '09071527288', 'On Process', '250'),
(202107, 'jhoel', 'tumpang', 'tabirao', '1992-05-23', '30 years old', 'Male', 'catanduanes', 'san andress', 'lictin', 'joelpogi23@gmail.com', '', '09089373628', '', '250'),
(202108, 'ma. rowena', 'bernal', 'templo', '1995-05-10', '27 years old', 'Female', 'catanduanes', 'bato', 'batalay', 'rowenatemplo1995@gmail.com', '', '09519325937', '', '250'),
(202109, 'diane faye', 'gianan', ' ', '2000-02-12', '22 years old', 'Female', 'catanduanes', 'viga', 'summit', 'gyiagianan@gmail.com', '', '09305318301', 'On Process', '250'),
(202110, 'dhutz', 'tavera', 'tevar', '1998-01-13', '24 years old', 'Male', 'catanduanes', 'san miguel', 'pagsangahan', 'dhutskiesalvadortavera@gmail.com', '', '09127281861', 'On Process', '250'),
(202111, 'rhodiniel', 'matienzo', 'vargas', '1999-11-02', '22 years old', 'Male', 'catanduanes', 'virac', 'hicming', 'rhodinelmatienzo1120@gmail.com', '', '09123456789', '', '250'),
(202112, 'jomar', 'bodino', 'francisco', '1996-04-18', '26 years old', 'Male', 'catanduanes', 'san miguel', 'buhi', 'jakjomar@gmail.com', '', '09123456789', 'Finished', '250'),
(202113, 'mariju', 'tasarra', 'tedera', '1991-08-07', '30 years old', 'Male', 'catanduanes', 'bato', 'aroyao', 'tasarramariju5@gmail.com', '', '09515492887', '', '250'),
(202114, 'Maricel', 'Malinana', 'Vargas', '1993-06-02', '29 years old', 'Male', 'Catanduanes', 'Virac', 'Buyo', 'Vargas05@gmail.com', '', '09471580096', 'On Process', '0'),
(202115, 'Alvin', 'Salvador', 'Oscar', '1993-07-21', '28 years old', 'Male', 'Catanduanes', 'Bato', 'Binanuahan', 'Badong@gmail.com', '', '09785566169', 'On Process', '0'),
(202116, 'Jezrel', 'Sattelis', 'Tui', '1991-08-25', '30 years old', 'Male', 'Catanduanes', 'Bato', 'Marinawa', 'Bon@gmail.com', '', '09787459449', 'On Process', '0'),
(202117, 'Francis', 'Tabuzo', 'Bernal', '1987-09-30', '34 years old', 'Female', 'Catanduanes', 'Virac', 'San juan', 'Francis@gmail.Com', '', '09785454949', 'On Process', '0'),
(202118, 'Cardo', 'Dalisay', 'Lucar', '1986-10-28', '35 years old', 'Male', 'Catanduanes', 'Bato', 'Marinawa', 'Cards@gmail.com', '', '09756643499', 'On Process', '0'),
(202119, 'Ronnie', 'Padilla', 'Roias', '1997-12-16', '24 years old', 'Male', 'Catanduanes', 'Virac', 'Rawis', 'Ronnie@gmail.com', '', '09785549166', 'On Process', '0'),
(202120, 'moises', 'dayawon', 't', '2000-11-10', '21 years old', 'Male', 'catanduanes', 'bato', 'sipi', 'dayawon@gmail.com', '', '09123456789', '', '0'),
(202121, 'john mhar', 'vargas', 'robles', '1999-01-31', '23 years old', 'Male', 'catanduanes', 'san miguel', 'buhi', 'vargasjohnmhar6@gmail.com', '', '09511257828', '', '0');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int(255) NOT NULL,
  `userid` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `withdraw`
--

CREATE TABLE `withdraw` (
  `id` int(255) NOT NULL,
  `userid` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `dateofbirth` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `barangay` varchar(255) NOT NULL,
  `municipality` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `savings` varchar(255) NOT NULL,
  `withdrawdate` varchar(255) NOT NULL,
  `withdrawamount` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `withdraw`
--

INSERT INTO `withdraw` (`id`, `userid`, `lastname`, `firstname`, `middlename`, `dateofbirth`, `age`, `gender`, `barangay`, `municipality`, `province`, `email`, `contact`, `savings`, `withdrawdate`, `withdrawamount`) VALUES
(1021, '202086', 'abundo', 'lea', 'sarmiento', '1966-09-08', '55 years old', 'Female', 'salvacion ', 'virac', 'catanduanes', 'abundo@gmail.com', '09564356532', '750', '2022-06-16', '250'),
(1022, '202086', 'abundo', 'lea', 'sarmiento', '1966-09-08', '55 years old', 'Female', 'salvacion ', 'virac', 'catanduanes', 'abundo@gmail.com', '09564356532', '57750', '2022-01-20', '3000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comaker`
--
ALTER TABLE `comaker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `credentials`
--
ALTER TABLE `credentials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deposit`
--
ALTER TABLE `deposit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loanpayment`
--
ALTER TABLE `loanpayment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loanplans`
--
ALTER TABLE `loanplans`
  ADD PRIMARY KEY (`loanplansid`);

--
-- Indexes for table `loantypes`
--
ALTER TABLE `loantypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loanuserpayment`
--
ALTER TABLE `loanuserpayment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdraw`
--
ALTER TABLE `withdraw`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1024;

--
-- AUTO_INCREMENT for table `credentials`
--
ALTER TABLE `credentials`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `deposit`
--
ALTER TABLE `deposit`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1076;

--
-- AUTO_INCREMENT for table `loanpayment`
--
ALTER TABLE `loanpayment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100062;

--
-- AUTO_INCREMENT for table `loanplans`
--
ALTER TABLE `loanplans`
  MODIFY `loanplansid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20215;

--
-- AUTO_INCREMENT for table `loantypes`
--
ALTER TABLE `loantypes`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `loanuserpayment`
--
ALTER TABLE `loanuserpayment`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=325;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202122;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `withdraw`
--
ALTER TABLE `withdraw`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1023;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
