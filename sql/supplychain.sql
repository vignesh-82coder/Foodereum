CREATE DATABASE supplychain;

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `email` varchar(60) DEFAULT NULL,
  `username` varchar(60) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `role` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

INSERT INTO `users` (`id`, `email`, `username`, `password`, `role`) VALUES
(1, 'educationminister@gmail.com', 'Education_Minister', '827ccb0eea8a706c4c34a16891f84e7b', 0),
(2, 'tehsildar@gmail.com', 'Tehsildar', '827ccb0eea8a706c4c34a16891f84e7b', 1),
(3, 'districtcollector@gmail.com', 'District_Collector', '827ccb0eea8a706c4c34a16891f84e7b', 1),
(4, 'sarpanch@gmail.com', 'Sarpanch', '827ccb0eea8a706c4c34a16891f84e7b', 1),
(5, 'govt_institute@gmail.com', 'Institute', '827ccb0eea8a706c4c34a16891f84e7b', 2);

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender` varchar(255) NOT NULL,
  `title` varchar(250) NOT NULL,
  `message` text NOT NULL,
  `ntime` datetime DEFAULT NULL,
  `repeat` int(11) DEFAULT 1,
  `nloop` int(11) NOT NULL DEFAULT 1,
  `publish_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `username` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;