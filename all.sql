CREATE TABLE tblproduct (
  id int(8) NOT NULL,
  name varchar(255) NOT NULL,
  code varchar(255) NOT NULL,
  image text NOT NULL,
  price double(10,2) NOT NULL,
  description varchar(500) NOT NULL
);

-- Dumping data for table `tblproduct`
--

INSERT INTO `tblproduct` (`id`, `name`, `code`, `image`, `price`, `description`) VALUES
(1, 'Indoplas Face Mask', '3DcAM01', 'product-images/indoplas.png', 90.00, ''),
(2, 'Cleene Ethyl Alcohol 70% Solution', 'USB02', 'product-images/cleene.jpg', 30.00, ''),
(3, 'Nopeet Da Shield Visor', 'nopeet', 'product-images/nopeet.jpg', 300.00, ''),
(4, 'Lifebuoy Total 10 Hand Sanitizer', 'LPN45', 'product-images/lifebuoy.jpg', 60.00, ''),
(5, 'KN95 Disposable Face Mask', '12345', 'product-images/kn95.jpg', 300.00, ''),
(6, 'Safeguard Hand Sanitizer', '67890', 'product-images/SAFEGUARD.jpg', 69.00, ''),
(7, 'Heng-De Faceshield', 'fshield', 'product-images/heng-de.jpg', 20.00, ''),
(8, 'Biogenic Isopropyl Alcohol', 'biogenic', 'product-images/biogenic.png', 115.00, '');

--
-- Indexes for table `tblproduct`
--
ALTER TABLE `tblproduct`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_code` (`code`);

--
-- AUTO_INCREMENT for dumped tables
--
ALTER TABLE `tblproduct`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

--
-- AUTO_INCREMENT for table `tblproduct`

CREATE TABLE sellers (
    UserID int auto_increment NOT NULL,
    SellerUsername varchar(255) NOT NULL,
    Name varchar(255) NOT NULL,
    telNumber varchar(255) NOT NULL,
    Email varchar(255) NOT NULL,
    password varchar(255) NOT NULL,
    PRIMARY KEY (UserID)
);
-- Users
CREATE TABLE users (
    UserID int auto_increment NOT NULL ,
    Name varchar(255) NOT NULL,
    Email varchar(255) NOT NULL,
    password varchar(255) NOT NULL,
    PRIMARY KEY (UserID)
);


CREATE TABLE admin (
    UserID int auto_increment NOT NULL,
    Username varchar(255) NOT NULL,
    Password varchar(255) NOT NULL,
    PRIMARY KEY (UserID)
);
INSERT INTO admin (Username,Password) VALUES ("admin","admin");

CREATE TABLE inquiries (
    ID int auto_increment NOT NULL ,
    Name varchar(255) NOT NULL,
    Email varchar(255) NOT NULL,
    Title varchar(255) NOT NULL,
    Subject varchar(500) NOT NULL,
    PRIMARY KEY (ID)
);
