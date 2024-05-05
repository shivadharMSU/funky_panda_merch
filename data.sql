


CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `quiantity` int(11) DEFAULT NULL
) 



CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) DEFAULT NULL
) 



INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Apparel'),
(2, 'Plushies'),
(3, 'collectables'),
(4, 'Accessories'),
(5, 'Home Decor');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `mobile` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `gender` varchar(11) DEFAULT NULL
) 

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `first_name`, `last_name`, `mobile`, `email`, `address`, `age`, `gender`) VALUES
(1, 'snehitha', 'merlin', '789768', 'snehitha@gmail.com', '167 col hbewd', 23, 'female'),
(2, 'rohan', 'bob', '8765789876', 'rohan@gmail.com', 'jersey coty', 22, 'male');

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE `designation` (
  `designation_id` int(11) NOT NULL,
  `designation_name` varchar(100) DEFAULT NULL
) 

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`designation_id`, `designation_name`) VALUES
(1, 'Admin'),
(2, 'Employee');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `mobile` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `designation_id` int(11) DEFAULT NULL,
  `salary` int(11) DEFAULT NULL,
  `manager_id` varchar(100) DEFAULT NULL
) 

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `name`, `mobile`, `email`, `designation_id`, `salary`, `manager_id`) VALUES
(1, 'chandhu', '787657866', 'admin@gmail.com', 1, 22000, '1');

-- --------------------------------------------------------

--
-- Table structure for table `login_details`
--

CREATE TABLE `login_details` (
  `login_deatils_id` int(11) NOT NULL,
  `user_name` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `login_user_type` varchar(100) DEFAULT NULL,
  `login_user_id` int(11) DEFAULT NULL
) 

--
-- Dumping data for table `login_details`
--

INSERT INTO `login_details` (`login_deatils_id`, `user_name`, `password`, `login_user_type`, `login_user_id`) VALUES
(1, 'snehitha', 'shehithapassword', 'customer', 1),
(2, 'rohan', 'rohanpassword', 'customer', 2),
(3, 'change', 'chandupassword', 'employee', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `color` varchar(100) DEFAULT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) 

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `name`, `description`, `color`, `price`, `quantity`, `category_id`) VALUES
(1, 'Kung Fu Panda 3 Po T-shirt', 'Kung Fu Panda 3 Po Partrait Movie Poster Premium cotton T-shirt', 'Black', 20, 5, 1),
(2, 'Zhen vintage T-shirt', 'Kung Fu Panda 4 Zhen vintage shot Premium T-shirt', 'Slate Grey', 43, 3, 1),
(3, 'Master Tigress T-shirt', 'Men\'s Kung Fu Panda Master Tigress Iron Fist Sketch Portrait Tee', 'White', 43, 1, 1),
(4, 'Furious 5 T-shirt', 'Kung Fu Panda Furious Five T-Shirt', 'White', 23, 9, 1),
(5, 'Pullover Hoodie', 'DreamWorks Kung Fu Panda 4 Kawaii Zhen Pullover Hoodie', 'Navy Blue', 54, 2, 1),
(6, 'Hoodie', 'DreamWorks Kung Fu Panda 4 Po & Zhen Zip Hoodie', 'Navy Blue', 23, 4, 1),
(7, 'Dumpling image Hoodie', 'Kung Fu Panda 4 Dumplings Hoodie', 'Black', 43, 3, 1),
(8, 'panda 4 Hoodie', 'Kung Fu Panda 4 The Big City Hoodie', 'Black', 11, 4, 1),
(9, 'Warrior Hoodie', 'Kung Fu Panda 4 The Dragon Warrior Hoodie', 'Black', 65, 5, 1),
(10, 'Panda with wristie soft toy', 'Panda 4 Po Staff Wristie', 'white and black', 45, 1, 2),
(11, 'cute zhen soft toy', 'Kung Fu Panda Zhen cute Plush Toy', 'multi coloured', 34, 3, 2),
(12, 'Zhen soft toy', 'Zhen plushie', 'Beige', 24, 3, 2),
(13, 'cute panda soft toy', 'Kung Fu Panda Po cute Plush Toy', 'white and black', 35, 2, 2),
(14, 'Po and Tigress 2 pc set plushies', 'Great combo of warriors Po and Tigress soft Plushies', 'multi coloured', 55, 5, 2),
(15, 'Vinyl action figure of po', 'Kung Fu Panda Po Bendyfigs Action Figure', 'white and black', 76, 3, 3),
(16, 'Kung Fu Panda - Tigress vinyl figure', 'Kung Fu Panda Funko POP Movies Tigress Vinyl Figure', 'golden yellow', 44, 1, 3),
(17, 'Po Mini versioFigurine', 'Miniature Panda Decor 4Pcs Mini Panda Figurine Cute Panda Doll Kung Fu PVC Panda Statue Fairy Garden Animals for Plant Pots Bonsai Craft Cake Topper Mini Panda Figurines', 'white and black', 65, 3, 3),
(18, 'Kung Fu Panda - Po Figure', 'Funko Pop! Kung Fu Panda Flocked Po EE Exclusive', 'white and black', 54, 1, 3),
(19, 'Kung Fu Panda - Po Action Figure', 'The Fighter Po Action Figure', 'white and black', 55, 2, 3),
(20, 'Po key chain', 'round plastic asthetic key chain', 'Green', 76, 1, 4),
(21, 'Dragon key chain', 'Kung Fu Panda series Dragon key chain', 'multi coloured', 48, 2, 4),
(22, 'Ping key chain ', 'Mr.Ping Mongram key chain', ' ', 76, 1, 4),
(23, 'Key chain', 'copper craft Kung Fu Panda Series key chain', 'copper', 34, 1, 4),
(24, 'Tumbler with Po', 'Kung Fu Panda Dragon Warrior Tumbler Cup', 'multi coloured', 87, 2, 4),
(25, 'warrior Tumbler', 'Kung Fu Panda the Dragon Warrior Tumbler Cup', 'multi coloured', 34, 1, 4),
(26, 'Coffee Mug', 'Dragon Master Mug', 'multi coloured', 77, 4, 5),
(27, 'Po Mug', 'wanna drink coffee with Po', 'white and black', 44, 5, 5),
(28, 'Peaceful Po Mug', 'Mug with peaceful Po', 'white and black', 87, 3, 5),
(29, 'Panda wall poster', 'Trends International Kung Fu Panda 4 - Practice Framed Wall Poster Prints', 'red with white and black', 45, 2, 5),
(30, 'Zhen poster', 'Zhen KUNG FU PANDA 4 movie poster - Wall Art Decor Cinephile Gift', 'multi coloured', 45, 1, 5),
(31, 'KFP 4 Poster', 'Kung Fu Panda 4 Poster', 'multi coloured', 44, 5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `purchase_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `total_purchase_cost` decimal(10,0) DEFAULT NULL,
  `purchase_method` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_product`
--

CREATE TABLE `purchase_product` (
  `purchase_product_id` int(11) NOT NULL,
  `purchase_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `cart_customer` (`customer_id`),
  ADD KEY `cart_product` (`product_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `designation`
--
ALTER TABLE `designation`
  ADD PRIMARY KEY (`designation_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`),
  ADD KEY `employee_designation` (`designation_id`);

--
-- Indexes for table `login_details`
--
ALTER TABLE `login_details`
  ADD PRIMARY KEY (`login_deatils_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `product_category_relation` (`category_id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`purchase_id`),
  ADD KEY `purchase_customer` (`customer_id`);

--
-- Indexes for table `purchase_product`
--
ALTER TABLE `purchase_product`
  ADD PRIMARY KEY (`purchase_product_id`),
  ADD KEY `purchase_product_relation` (`product_id`),
  ADD KEY `purchase_customer_relation` (`purchase_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
  MODIFY `designation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `login_details`
--
ALTER TABLE `login_details`
  MODIFY `login_deatils_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `purchase_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `purchase_product`
--
ALTER TABLE `purchase_product`
  MODIFY `purchase_product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_customer` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `cart_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE NO ACTION;

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_designation` FOREIGN KEY (`designation_id`) REFERENCES `designation` (`designation_id`) ON DELETE NO ACTION;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_category_relation` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE NO ACTION;

--
-- Constraints for table `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `purchase_customer` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE NO ACTION;

--
-- Constraints for table `purchase_product`
--
ALTER TABLE `purchase_product`
  ADD CONSTRAINT `purchase_customer_relation` FOREIGN KEY (`purchase_id`) REFERENCES `purchases` (`purchase_id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `purchase_product_relation` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE NO ACTION;

