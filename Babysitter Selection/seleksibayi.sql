--
-- Database: `seleksibayi`
--

-- --------------------------------------------------------

--
-- Table structure for table `babysitter`
--

CREATE TABLE `babysitter` (
  `user_id` varchar(7) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `alamat` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `babysitter`
--

INSERT INTO `babysitter` (`user_id`, `nama`, `email`, `no_telp`, `tgl_lahir`, `gender`, `alamat`, `status`) VALUES
('BBS1802', 'helendia', 'helen@mail.com', '0217821982', '1997-10-10', 'Wanita', 'Griya mas 1 Jakarta Barat', ''),
('BBS2209', 'Yua', 'yua@mail.com', '08221839849', '1997-11-08', 'Pria', 'Jl. Kenangan', ''),
('BBS2210', 'Tama', 'tama@mail.com', '08223939401', '1993-11-08', 'Pria', 'Jl.kenangan', ''),
('BBS2308', 'yui', 'yui@mail.com', '082213653701', '1997-11-08', 'Wanita', 'yui street', ''),
('BBS2810', 'Lulu Nadira', 'Lulu@mail.com', '7812345676', '1994-06-04', 'Wanita', 'Depok Jawa Barat', '');

-- --------------------------------------------------------

--
-- Table structure for table `h_test`
--

CREATE TABLE `h_test` (
  `user_id` varchar(7) NOT NULL,
  `c1` int(2) NOT NULL,
  `c2` int(2) NOT NULL,
  `c3` int(2) NOT NULL,
  `c4` int(2) NOT NULL,
  `c5` int(2) NOT NULL,
  `tanggal_test` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `h_test`
--

INSERT INTO `h_test` (`user_id`, `c1`, `c2`, `c3`, `c4`, `c5`, `tanggal_test`) VALUES
('BBS2308', 5, 4, 3, 4, 4, '2019-06-20'),
('BBS1802', 2, 3, 5, 5, 4, '2019-06-20'),
('BBS1806', 5, 5, 5, 3, 3, '2019-06-20'),
('BBS2810', 4, 1, 2, 4, 5, '2019-06-20'),
('BBS2605', 3, 5, 1, 2, 2, '2019-06-20'),
('BBS1511', 5, 5, 5, 5, 5, '2019-06-20');

-- --------------------------------------------------------

--
-- Table structure for table `p_test`
--

CREATE TABLE `p_test` (
  `user_id` varchar(7) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `file_1` varchar(99) DEFAULT NULL,
  `file_2` varchar(99) DEFAULT NULL,
  `file_3` varchar(99) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `p_test`
--

INSERT INTO `p_test` (`user_id`, `nama`, `file_1`, `file_2`, `file_3`) VALUES
('BBS1802', 'helendia', 'Screenshot_2016-01-27-09-51-18.png', '20170923_075403.jpg', '20170918_100126.jpg'),
('BBS2209', 'Yua', '20170911_122211.jpg', '20170911_122254.jpg', '20170908_105941-1.jpg'),
('BBS2308', 'yui', '600px-Bismarck.png', '600px-Bismarck.png', '600px-Bismarck.png'),
('BBS2810', 'Lulu Nadira', '20170911_122144.jpg', 'IMG_20180714_181851.jpg', 'IMG_20180714_183331.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tgl_test`
--

CREATE TABLE `tgl_test` (
  `user_id` varchar(7) NOT NULL,
  `tanggal_test` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tgl_test`
--

INSERT INTO `tgl_test` (`user_id`, `tanggal_test`) VALUES
('BBS2308', '2019-06-30'),
('BBS1802', '2019-06-20'),
('BBS1806', '2019-06-26'),
('BBS2810', '2019-06-29'),
('BBS2811', '0000-00-00'),
('BBS2605', '2019-07-30'),
('BBS1511', '2019-06-20');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` varchar(7) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `level` varchar(10) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `nama`, `level`, `username`, `password`) VALUES
('ADM0001', 'Lola Lusiana', 'Admin', 'yoya', 'yoya123'),
('BBS1802', 'helendia', 'BabySitter', 'helen@mail.com', '54321'),
('BBS2209', 'Yua', 'BabySitter', 'yua@mail.com', 'lunos123'),
('BBS2210', 'Tama', 'BabySitter', 'tama@mail.com', 'tama123'),
('BBS2308', 'yui', 'BabySitter', 'yui@mail.com', 'yui123'),
('BBS2810', 'Lulu Nadira', 'BabySitter', 'Lulu@mail.com', 'lulu321');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `babysitter`
--
ALTER TABLE `babysitter`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `p_test`
--
ALTER TABLE `p_test`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
