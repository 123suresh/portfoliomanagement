

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";



CREATE TABLE `product` (
  `product_id` int(20) NOT NULL,
  `product_name` varchar(30) NOT NULL,
  `price` float NOT NULL,
  `quantity` int(10) NOT NULL,
  `transaction_type` varchar(10) NOT NULL,
  `transaction_date` date
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `product` (`product_id`, `product_name`, `price`, `quantity`,`transaction_type`,`transaction_date`) VALUES
(1, 'Standard Charter Bank', 1200, 300,'Buy','2020-01-01');


CREATE TABLE `register` (
  `username` varchar(20) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `mobile` int(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password_1` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `register` (`username`, `first_name`, `last_name`, `mobile`, `email`, `password_1`) VALUES
('suresh', 'suresh', 'thapa', 9866672002, 'suresh@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b');



ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);


ALTER TABLE `register`
  ADD PRIMARY KEY (`username`);


ALTER TABLE `product`
  MODIFY `product_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

