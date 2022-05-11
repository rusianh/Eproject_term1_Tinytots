-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 18, 2021 lúc 12:02 PM
-- Phiên bản máy phục vụ: 10.4.19-MariaDB
-- Phiên bản PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `tinytots`
--
CREATE DATABASE IF NOT EXISTS `tinytots` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `tinytots`;

DELIMITER $$
--
-- Thủ tục
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_admin_insert` (IN `UserName_Ip` VARCHAR(50), IN `Password_Ip` VARCHAR(200), IN `Name_Admin_Ip` VARCHAR(50))  BEGIN
INSERT INTO Admins(UserName, Password, Name_Admin)
VALUES (UserName_Ip, Password_Ip, Name_Admin_Ip);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_admin_selectName` (IN `UserName_Ip` VARCHAR(50))  BEGIN
    SELECT *
    FROM Admins
    WHERE UserName = UserName_Ip;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_admin_update` (IN `UserName_Ip` VARCHAR(50), IN `Password_Ip` VARCHAR(200))  BEGIN
UPDATE Admins
SET Password = Password_Ip
WHERE UserName = UserName_Ip;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_attibute_delete` (IN `id` INT)  BEGIN

    delete from attribute where AttributeID = id;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_attribute_insert` (IN `AttributeID_ip` INT, IN `Attribute_Name_Ip` VARCHAR(50))  BEGIN
INSERT INTO Attribute(AttributeID, Attribute_Name)
VALUES ( AttributeID_ip,Attribute_Name_Ip);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_attribute_selectAll` ()  BEGIN
SELECT Attribute_Name
FROM Attribute;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_attribute_selectID` (IN `Attribute_ID` INT)  BEGIN
SELECT Attribute_Name
FROM Attribute
WHERE AttributeID = Attribute_ID;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_attribute_update` (IN `Attribute_ID` INT, IN `Attribute_Name_Ip` VARCHAR(50))  BEGIN
UPDATE Attribute
SET Attribute_Name = Attribute_Name_Ip
WHERE AttributeID = Attribute_ID;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_brand_delete` (IN `id` INT)  BEGIN
    delete from brand where BrandID = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_brand_insert` (IN `Brand_Name_Ip` VARCHAR(50))  BEGIN
INSERT INTO Brand(Brand_Name )
VALUES (Brand_Name_Ip);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_brand_selectAll` ()  BEGIN
SELECT BrandID, Brand_Name
FROM brand;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_brand_selectId` (IN `id` INT)  BEGIN
    SELECT BrandID, Brand_Name
    FROM brand where BrandID=id;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_brand_selectName` (IN `Brand_Name_Ip` VARCHAR(50))  BEGIN
select * from brand where Brand_Name = Brand_Name_Ip;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_brand_update` (IN `Brand_ID` INT, IN `Brand_Name_Ip` VARCHAR(50))  BEGIN
UPDATE Brand
SET Brand_Name    = Brand_Name_Ip

WHERE BrandID = Brand_ID;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_category_delete` (IN `id` INT)  BEGIN
    delete from category where CategoryID = id;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_category_insert` (IN `Name_Category_Ip` VARCHAR(50))  BEGIN
INSERT INTO Category( Name_Category)
VALUES (Name_Category_Ip);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_category_selectAll` ()  BEGIN
SELECT CategoryID, Name_Category
FROM Category;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_category_selectID` (IN `Category_ID` INT)  BEGIN
SELECT Name_Category
FROM Category
WHERE CategoryID = Category_ID;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_category_selectName` (IN `Name_Category_Ip` VARCHAR(50))  BEGIN
SELECT CategoryID, Name_Category
FROM Category
WHERE Name_Category = Name_Category_Ip;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_category_update` (IN `Category_ID` INT, IN `Name_Category_Ip` VARCHAR(50))  BEGIN
UPDATE Category
SET Name_Category = Name_Category_Ip
WHERE CategoryID = Category_ID;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_customer_insert` (IN `code` INT, IN `name` VARCHAR(50), IN `phone` INT, IN `address` VARCHAR(200))  BEGIN
    insert into customer (CustomerCode, order_name, order_phone, order_address) value (code, name, phone, address);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_customer_selectAll` ()  BEGIN
    select * from customer;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_customer_selectID` (IN `id` INT)  BEGIN
    select * from customer where CustomerCode = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_customer_update` (IN `id` INT, IN `name` VARCHAR(50), IN `address` VARCHAR(200), IN `phone` INT)  BEGIN
    update customer
    set Order_Name=name,
        Order_Address = address,
        Order_Phone = phone
    where CustomerCode = id ;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_orderdetail_delete` (IN `id` INT)  BEGIN
    delete from orderdetail where OrderDetailID = id;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_orderdetail_insert` (IN `Order_ID` INT, IN `Product_ID` INT, IN `Quantity_Ip` INT)  BEGIN
INSERT INTO OrderDetail( OrderID, ProductID, Quantity)
VALUES ( Order_ID, Product_ID, Quantity_Ip);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_orderdetail_selecOrderDetailID` (IN `id` INT)  BEGIN
    select * from orderdetail where OrderDetailID = id;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_orderdetail_selecOrderID` (IN `OrderID_ip` INT)  BEGIN
select * from orderdetail where OrderID = OrderID_ip;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_orderdetail_updateProduct` (IN `OrderDetail_ID` INT, IN `Product_ID` INT, IN `Quantity_Ip` INT)  BEGIN
update orderdetail set ProductID = Product_ID, Quantity = Quantity_Ip where OrderDetailID = OrderDetail_ID ;
 end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_ordersCustomer_selectAll` ()  BEGIN
    select a.OrderID , b.Order_Name, b.Order_Phone, b.Order_Address from orders a, customer b where a.CustomerCode = b.CustomerCode;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_orders_insert` (IN `Id` INT, IN `CustomerCode_Ip` INT)  BEGIN
    INSERT
INTO `orders`
(
 `OrderID`,
`CustomerCode`)
VALUES
(
Id,

CustomerCode_Ip );

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_orders_selectID` (IN `Order_ID` INT)  BEGIN
    select * from orders where OrderID = Order_ID;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_productAttribute_delete` (IN `Product_ID` INT)  BEGIN
delete from product_attribute where ProductID = Product_ID;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_productAttribute_insert` (IN `Product_ID` INT, IN `Attribute_ID` INT)  BEGIN
INSERT INTO Product_Attribute(ProductID, AttributeID)
VALUES (Product_ID, Attribute_ID);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_productAttribute_updateAttributeID` (IN `Product_ID` INT, IN `Attribute_ID` INT)  BEGIN
UPDATE Product_Attribute
SET AttributeID = Attribute_ID
WHERE ProductID = Product_ID;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_productAttribute_updateProductID` (IN `Attribute_ID` INT, IN `Product_ID` INT)  BEGIN
UPDATE Product_Attribute
SET ProductID = Product_ID
WHERE AttributeID = Attribute_ID;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_product_delete` (IN `ProductId_ip` INT)  BEGIN
delete from product where ProductID = ProductId_ip;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_product_edit` (IN `id` INT, IN `productName` VARCHAR(50), IN `categoryId_ip` INT, IN `dcp` TEXT, IN `productStatus` VARCHAR(30), IN `brandid_ip` INT, IN `link` TEXT, IN `price` FLOAT)  BEGIN
update  `product`
SET
`Product_Name` = productName,
`CategoryID` = categoryId_ip,
`Description_Product` = dcp,
`Product_status` = productStatus,
`BrandID` = brandid_ip,
`ProductImage_link` = link,
`Product_Price` = price
WHERE `ProductID` = id ;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_product_insert` (IN `ProductID_ip` INT, IN `Product_Name_Ip` VARCHAR(50), IN `CategoryID_Ip` INT, IN `BrandID_Ip` INT, IN `Product_status_Ip` VARCHAR(20), IN `Description_Product_Ip` VARCHAR(200), IN `Product_Price_Ip` FLOAT, IN `ProductImage_Link_Ip` TEXT)  BEGIN
INSERT INTO `product`
(  `ProductID`,
 `Product_Name`,
 `CategoryID`,
 `Description_Product`,
 `Product_status`,
 `BrandID`,
 `ProductImage_link`,
 `Product_Price`)
VALUES
    (
    ProductID_ip,
    Product_Name_Ip,
    CategoryID_Ip,
    Description_Product_Ip,
    Product_status_Ip,
    BrandID_Ip,
    ProductImage_Link_Ip,
    Product_Price_Ip);


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_product_selectAll` ()  BEGIN
select * from product;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_product_selectAll_Attribute` ()  BEGIN
    select b.ProductID, a.Attribute_Name, a.AttributeID
    from attribute a,
         product b,
         product_attribute c
    where a.AttributeID = c.AttributeID
      and b.ProductID = c.ProductID;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_product_selectAll_Brand` (IN `BrandId_ip` INT)  BEGIN
SELECT *
FROM PRODUCT
WHERE BrandID = BrandId_ip;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_product_selectAll_Category` (IN `CategoryId_ip` INT)  BEGIN
SELECT *
FROM PRODUCT
WHERE CategoryID = CategoryId_ip;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_product_selectAll_productId` (IN `ProductId_ip` INT)  BEGIN
SELECT *
FROM PRODUCT
WHERE ProductID = ProductId_ip;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_product_selectID` ()  BEGIN
    SELECT ProductID
    FROM PRODUCT;


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_product_selectName` (IN `name` VARCHAR(200))  BEGIN
select Product_Name, ProductID from product where Product_Name = name;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_product_selectProductID_Attribute` (IN `idProduct` INT)  BEGIN
select b.ProductID,a.Attribute_Name from attribute a, product b, product_attribute c
where a.AttributeID = c.AttributeID and b.ProductID = c.ProductID and  c.ProductID = idProduct  ;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_product_updateImage` (IN `ProductId_ip` INT, IN `link` TEXT)  BEGIN
update product set ProductImage_link = link
WHERE ProductID = ProductId_ip;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admins`
--

CREATE TABLE `admins` (
  `AdminID` int(11) NOT NULL,
  `UserName` varchar(50) CHARACTER SET utf8 NOT NULL,
  `Password` varchar(200) NOT NULL,
  `Name_Admin` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `admins`
--

INSERT INTO `admins` (`AdminID`, `UserName`, `Password`, `Name_Admin`) VALUES
(1, 'chiendev111', '$2y$10$eXd8I/gnUh6q5333hmtz5u62JoZ9XiO8eSi3knlu.GBsnIOshQmr6', 'nong quoc chien');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `attribute`
--

CREATE TABLE `attribute` (
  `AttributeID` int(11) NOT NULL,
  `Attribute_Name` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `attribute`
--

INSERT INTO `attribute` (`AttributeID`, `Attribute_Name`) VALUES
(2472, 'S'),
(4324, 'M'),
(4949, 'Dimensions: 34,3 x 27,9 x 6,4 cm.'),
(8193, 'Length: 33 cm'),
(9342, 'L'),
(14790, 'XL'),
(18551, 'Size : 1M 3M'),
(24733, 'M'),
(26411, 'Length: 1m or 3m'),
(27164, 'M'),
(28916, 'Box size: 116 x 88 x 26 mm.'),
(29424, 'L'),
(29550, 'Set consists of four cups and a fountain'),
(31162, 'S'),
(31845, 'S'),
(31958, 'S'),
(32334, 'M'),
(32741, 'Measurements: 46 x 46 x 35 cm.'),
(35576, 'L'),
(35778, '3M'),
(36511, 'L'),
(38047, 'Size: big or small'),
(38654, 'Weighs up to 20 kilograms.'),
(39573, 'S'),
(43881, 'XL'),
(46987, 'Size : 1M'),
(48327, 'XL'),
(49725, 'Dimensions: 14 x 13 x 22 cm'),
(51324, 'L'),
(52368, 'M'),
(52722, '100% polypropylene'),
(54392, 'L'),
(59287, 'S'),
(60491, 'Weight: 0,4 kg '),
(60556, 'L'),
(64285, 'Length: 1m or 3m'),
(64499, 'XL'),
(64857, '90% cotton organic and 10% polyester.'),
(64949, 'Dimensions: 6 x 9 x 6 cm.'),
(65441, 'Dimensions: 70 x 70 cm.'),
(65740, 'XL'),
(65861, 'L'),
(66130, 'M'),
(66155, '3-layer filter.'),
(66232, 'Including awning, chalkboard, crates, fruit'),
(68497, 'S'),
(72539, 'Dimensions: 60 x 59 x 88 cm'),
(72545, 'Box size: 41x18x75cm'),
(74355, 'S'),
(75866, 'Size : 1M 3M'),
(77109, 'S'),
(81105, 'Size: big(300ml) or small(100ml)'),
(82026, 'Size: big or small'),
(83184, 'S'),
(87452, 'XXL'),
(87982, 'Size: 25 cm.'),
(87983, 'M'),
(90208, 'S'),
(90519, 'Length: 16 cm'),
(92461, 'M'),
(93010, 'M'),
(94579, 'M'),
(95115, 'L'),
(95569, 'Gel content: 15 grams.'),
(95730, 'S'),
(98632, '  Set 28 amimal stickers');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brand`
--

CREATE TABLE `brand` (
  `BrandID` int(11) NOT NULL,
  `Brand_Name` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `brand`
--

INSERT INTO `brand` (`BrandID`, `Brand_Name`) VALUES
(2, 'Bobo Choses'),
(3, 'Paul And Paula'),
(5, 'American Apparel Kid'),
(6, 'Zara Kids'),
(7, 'H&M Kids'),
(8, 'Burberry'),
(9, 'Boss Kids'),
(10, 'Munster Kids'),
(11, 'Armani Junior');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `CategoryID` int(11) NOT NULL,
  `Name_Category` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`CategoryID`, `Name_Category`) VALUES
(1, 'Fashions'),
(2, 'Baby Care'),
(3, 'Toys'),
(4, 'Wellness & Hygiene');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `CustomerCode` int(11) NOT NULL,
  `Order_Name` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `Order_Phone` varchar(15) CHARACTER SET utf8 NOT NULL,
  `Order_Address` varchar(200) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`CustomerCode`, `Order_Name`, `Order_Phone`, `Order_Address`) VALUES
(9401, 'Chiến QuôC', '394777901', '17 tố hữu, toà nhà C37 Bắc Hà, phường trung văn'),
(11766, 'B O\'Neill Lawrence', '3431134124', '87 hoang hoa tham, ha noi'),
(23115, 'Johnson Dan', '142123124', 'hoang mai, ha noi, viet nam'),
(30189, 'Thompson Joyce R ', '4799123123', '19 ly thai to , viet nam'),
(37319, 'Johnson Scott P', '1312123123', '4cau giay viet nam'),
(54402, 'kluger James', '2147483647', '50  Sycamore Fork Road, Miami, Florida'),
(62363, 'Chien James', '12312312', '092342342325'),
(97161, 'quoc chien', '2147483647', 'so 1 quan 1, hcm, viet nam');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderdetail`
--

CREATE TABLE `orderdetail` (
  `OrderDetailID` int(11) NOT NULL,
  `OrderID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `orderdetail`
--

INSERT INTO `orderdetail` (`OrderDetailID`, `OrderID`, `ProductID`, `Quantity`) VALUES
(12, 9672, 94407, 5),
(13, 74428, 62782, 1),
(14, 74428, 51819, 1),
(15, 74428, 17107, 1),
(16, 74428, 32814, 1),
(17, 17929, 5993, 1),
(18, 88629, 5993, 1),
(19, 88629, 24754, 1),
(20, 88629, 29865, 1),
(21, 75876, 32814, 1),
(22, 75876, 30452, 1),
(23, 14385, 5993, 1),
(24, 14385, 24754, 1),
(25, 14385, 49590, 1),
(26, 14385, 62782, 1),
(27, 14385, 14078, 1),
(28, 14385, 61980, 1),
(29, 14385, 40759, 1),
(30, 2845, 6478, 1),
(31, 2845, 5993, 1),
(32, 2845, 10742, 1),
(33, 78432, 6478, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `OrderID` int(11) NOT NULL,
  `CustomerCode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`OrderID`, `CustomerCode`) VALUES
(78432, 9401),
(74428, 11766),
(88629, 23115),
(17929, 30189),
(75876, 37319),
(9672, 54402),
(14385, 62363),
(2845, 97161);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `ProductID` int(11) NOT NULL,
  `Product_Name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `CategoryID` int(11) DEFAULT NULL,
  `Description_Product` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `Product_status` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `BrandID` int(11) DEFAULT NULL,
  `ProductImage_link` text CHARACTER SET utf8 DEFAULT NULL,
  `Product_Price` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`ProductID`, `Product_Name`, `CategoryID`, `Description_Product`, `Product_status`, `BrandID`, `ProductImage_link`, `Product_Price`) VALUES
(4100, 'Father & Son Matching Shirts – Pineapple', 1, 'This bright and super trendy soft rayon button up shirt suits any modern hipster.', 'available', 7, 'assets/img/productShow/1cd4bc632b-navy-pineapple.png', 41),
(5993, 'Father & Son Matching Shirts – Blue Floral', 1, 'This bright and super trendy soft rayon button up shirt suits any modern hipster.', 'available', 6, 'assets/img/productShow/c43c2A1a71-navy-florall-matching-bb.png', 51),
(6478, 'Market Stall', 3, 'The market stall is equipped with  four wooden crates and many things.', 'available', 3, 'assets/img/productShow/5d9AA61AaB-image_22909.jpg', 81),
(10742, 'Jollein Hydrofiel multidoek small', 4, '3 hydrophilic cloths of 70 x 70 cm with design.', 'available', 6, 'assets/img/productShow/65b195B96d-image_24185.jpg', 11),
(14078, 'Yellow Rabbit Richie Cuddle Cloth 25 cm', 3, 'Soft Rabbit Richie cuddle cloth from the brand Happy Horse.', 'available', 10, 'assets/img/productShow/a7288B0c2c-image_19361.jpg', 7),
(16157, 'Zoë Music Box Pink', 3, 'Zoë penguin music box with a light and different melodies and sounds', 'available', 5, 'assets/img/productShow/0714A32055-image_22846.jpg', 32),
(17107, 'Baby Linen Romper – Aqua', 1, 'This super cute and modern Unisex Romper offers an easy and comfortable fit.', 'available', 5, 'assets/img/productShow/cb6611B6d1-1-89.jpg', 23),
(19803, 'Child Mouth Masks Boys 10pcs 4-12 Years', 4, 'Mouth mask for children from 4 to 12 years old. 3 layers with bendable nose clip.', 'available', 3, 'assets/img/productShow/19b9b2B9Aa-image_23081.jpg', 9),
(20418, 'Baby Shower Glove Polar Bear', 4, 'Have better grip on your baby while showering using the Baby Shower Glove.', 'available', 6, 'assets/img/productShow/2778A7a12B-image_23377.jpg', 14),
(24108, 'Changing Pad Dreamy Dots White', 2, 'This cotton changing pad is decorated with small dots', 'available', 6, 'assets/img/productShow/A7c206A7ba-image_3338.jpg', 42),
(24754, 'Changing Mat White', 2, 'The changing mat is made of soft foam so your child is comfortable.', 'available', 2, 'assets/img/productShow/8Ba3a66aa8-image_15421.jpg', 24),
(29865, 'Brush and Comb Mint Green', 2, 'The brush and comb are made with special regard to the tender baby\'s little head', 'available', 11, 'assets/img/productShow/50cca86d39-image_3327.jpg', 8),
(30452, 'Father & Son Matching Shirts – Cactus', 1, 'This bright and super trendy soft rayon button up shirt suits any modern hipster.', 'available', 6, 'assets/img/productShow/cdba61B35a-cactus-shirt-matching-1.png', 51),
(32814, 'Father & Son Matching Shirts – Jaguar', 1, 'This bright and super trendy soft rayon button up shirt suits any modern hipster.', 'available', 2, 'assets/img/productShow/B397a67c43-jaguar-shirt-matching.png', 46),
(35120, 'Baby Linen Romper – Blush Pink', 1, 'This super cute and modern Unisex Romper offers an easy and comfortable fit.', 'available', 3, 'assets/img/productShow/B3466ad32d-1V-1.jpg', 29),
(38104, 'Changing Mat Blush Baby', 2, 'The changing mat is made of soft foam so your child is comfortable.', 'available', 3, 'assets/img/productShow/96282a8502-image_16958.jpg', 24),
(40759, 'Baby Scale BC-30', 4, 'Comfortable baby scale  with stabilization system. Accurate to 5 grams.', 'available', 8, 'assets/img/productShow/8c895dcB7B-image_19317.jpg', 63),
(46007, 'Storage Box Baby Teeth', 4, 'Nice storage box for baby teeth and a lock of hair', 'available', 11, 'assets/img/productShow/Bd48B804B4-image_24839.jpg', 11),
(49590, 'Yoyo Rain Cover 0+', 2, 'The rain cover is easy to attach to the stroller and also easy to remove.', 'available', 3, 'assets/img/productShow/5a974957Ad-image_16446.jpg', 20),
(49870, 'Knitted Jumper – Grey', 1, 'Keep your little one comfortable and warm this season.Trendy Knitwear Sweater.', 'available', 3, 'assets/img/productShow/d5148A8Aad-2-2.jpg', 43),
(51819, 'Lawn Drying Rack Green', 2, 'Basically, we took everything you love about Grass and made it bigger!', 'available', 9, 'assets/img/productShow/2c223Aa8B3-image_3361.jpg', 28),
(55799, 'Wooden Kitchen', 3, 'Every little chef can enjoy themselves in this beautiful wooden kitchen from the brand Little Dutch.', 'available', 2, 'assets/img/productShow/6b3d64aA2a-image_21876.jpg', 99),
(59986, 'Father & Son Matching Shirts – Blue Tropical', 1, 'This bright and super trendy soft rayon button up shirt suits any modern hipster.', 'available', 7, 'assets/img/productShow/d0B3156762-6-1.jpg', 34),
(60234, 'Aquasit Mint Green', 2, 'The Aqausit is a bath seat for newborns which makes bathing easier and safer', 'available', 8, 'assets/img/productShow/54A4481b50-image_3274.jpg', 19),
(61980, 'Comfy Bath Bath Cushion', 4, 'With the Doomoo Comfy bath cushion you can keep your hands free to play and wash your baby.', 'available', 10, 'assets/img/productShow/aa4B624bB7-image_3594.jpg', 25),
(62782, 'A3 Baby & Kids Bath Seat Silver', 2, 'This A3 Baby & Kids bath seat gives your baby extra support while bathing.', 'available', 9, 'assets/img/productShow/c9Bda982b7-image_14403.jpg', 17),
(63486, 'Bath Tub Bubble Transparent', 4, 'Your baby will feel secure by the ergonomic shape of this Bebe-Jou baby bath tub, just like in the womb', 'available', 7, 'assets/img/productShow/c8786BAa0B-image_3313.jpg', 19),
(64930, 'Baby Girl Romper- Beige Floral', 1, 'The perfect addition to every girl’s wardrobe.', 'available', 5, 'assets/img/productShow/3A57b5cB5A-1-5-610x488.jpg', 23),
(65751, 'Formula Pro Advanced', 2, 'The  Formula Pro Advanced makes preparing a bottle easy as a breeze.', 'available', 6, 'assets/img/productShow/09d7650441-image_24922.jpg', 280),
(73256, 'Wash Bowl Silver', 4, 'Handy wash bowl of the brand Bebe-jou if your baby needs a quick wash.', 'available', 10, 'assets/img/productShow/3d07Bbc9c7-image_3403.jpg', 12),
(80480, 'Slackajack Elephant Small', 3, 'Slackajack Elephant is a wonderfully soft elephant', 'available', 9, 'assets/img/productShow/ba4c1a5308-image_18681.jpg', 22),
(86574, 'Miffy Blocks Farm', 3, 'With this wooden block set farm, children can build endlessly and that is exactly the intention', 'available', 8, 'assets/img/productShow/6b6523B739-image_22410.jpg', 16),
(86906, 'Nuby Citroganix Tooth Gel + Gum-eez™ - 4m+', 4, 'Nuby tooth gel, handy in use with teeth coming through', 'available', 5, 'assets/img/productShow/8b4dbb3664-image_15429.jpg', 8),
(89241, 'Natural Rubber Whale Blue', 3, 'Natural rubber whale from the brand Lanco for hours of fun while bathing.', 'available', 7, 'assets/img/productShow/2B1A44B380-image_21750.jpg', 19),
(90577, 'Plush Toy Octopus Ocean', 3, 'Soft octopus plush toy from the brand Little Dutch. ± 22 cm.', 'available', 11, 'assets/img/productShow/A767A79632-image_20489.jpg', 15),
(92412, 'Father & Son Matching Shirts – Blue Flamingo', 1, 'This bright and super trendy soft rayon button up shirt suits any modern hipster.', 'available', 6, 'assets/img/productShow/4AAca6659A-1-2.jpg', 49),
(94407, 'Father & Son Matching Shirts – Pink Pineapple', 1, 'This bright and super trendy soft rayon button up shirt suits any modern hipster.', 'available', 5, 'assets/img/productShow/788893A93b-pink-nenas-matching.png', 40),
(95388, 'Baby Girl Romper', 1, 'Perfect for special occasions, Christening, Photoshoot, Birthday Parties or Everyday wear.', 'sold out', 5, 'assets/img/productShow/AA9834a9d0-5.card_large.jpg', 43),
(97559, 'Water Fountain Flow \'N Fill Spout', 3, 'The Flow \'N Fill Spout Water Fountain makes bathing even more fun!', 'available', 6, 'assets/img/productShow/3346752BBB-image_21582.jpg', 29),
(97844, 'Brush and Comb Silver', 2, 'The brush and comb are made with special regard to the tender baby\'s little head', 'available', 10, 'assets/img/productShow/c56B556B1d-image_3329.jpg', 9);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_attribute`
--

CREATE TABLE `product_attribute` (
  `ProductAttributeID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `AttributeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product_attribute`
--

INSERT INTO `product_attribute` (`ProductAttributeID`, `ProductID`, `AttributeID`) VALUES
(96, 59986, 31162),
(97, 59986, 4324),
(98, 59986, 29424),
(102, 49870, 68497),
(103, 49870, 87983),
(104, 49870, 51324),
(105, 49870, 43881),
(106, 49870, 87452),
(107, 64930, 95730),
(108, 64930, 92461),
(113, 17107, 59287),
(114, 17107, 24733),
(115, 17107, 35576),
(116, 94407, 39573),
(117, 94407, 27164),
(118, 94407, 95115),
(119, 94407, 65740),
(120, 30452, 31845),
(121, 30452, 52368),
(122, 30452, 9342),
(126, 32814, 77109),
(127, 32814, 94579),
(128, 32814, 64499),
(129, 95388, 31958),
(130, 95388, 93010),
(131, 95388, 65861),
(132, 5993, 90208),
(133, 5993, 36511),
(134, 5993, 48327),
(135, 92412, 83184),
(136, 92412, 66130),
(137, 92412, 54392),
(138, 35120, 2472),
(139, 35120, 60556),
(140, 35120, 14790),
(141, 4100, 74355),
(142, 4100, 32334),
(152, 38104, 46987),
(153, 38104, 35778),
(154, 24754, 75866),
(155, 97844, 82026),
(156, 29865, 38047),
(157, 24108, 18551),
(158, 60234, 26411),
(159, 62782, 64285),
(160, 65751, 81105),
(161, 51819, 4949),
(162, 49590, 72545),
(163, 90577, 49725),
(164, 14078, 87982),
(165, 80480, 8193),
(166, 86574, 98632),
(167, 89241, 64949),
(169, 97559, 29550),
(170, 16157, 90519),
(172, 55799, 72539),
(173, 6478, 66232),
(174, 46007, 28916),
(175, 40759, 38654),
(176, 19803, 66155),
(177, 86906, 95569),
(178, 10742, 65441),
(179, 63486, 32741),
(180, 20418, 64857),
(181, 73256, 60491),
(182, 61980, 52722);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`AdminID`);

--
-- Chỉ mục cho bảng `attribute`
--
ALTER TABLE `attribute`
  ADD PRIMARY KEY (`AttributeID`);

--
-- Chỉ mục cho bảng `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`BrandID`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CustomerCode`);

--
-- Chỉ mục cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`OrderDetailID`),
  ADD KEY `OrderID` (`OrderID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `CustomerCode` (`CustomerCode`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductID`),
  ADD KEY `BrandID` (`BrandID`),
  ADD KEY `CategoryID` (`CategoryID`);

--
-- Chỉ mục cho bảng `product_attribute`
--
ALTER TABLE `product_attribute`
  ADD PRIMARY KEY (`ProductAttributeID`),
  ADD KEY `ProductID` (`ProductID`),
  ADD KEY `AttributeID` (`AttributeID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admins`
--
ALTER TABLE `admins`
  MODIFY `AdminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `brand`
--
ALTER TABLE `brand`
  MODIFY `BrandID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `CategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  MODIFY `OrderDetailID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `product_attribute`
--
ALTER TABLE `product_attribute`
  MODIFY `ProductAttributeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `orderdetail_ibfk_1` FOREIGN KEY (`OrderID`) REFERENCES `orders` (`OrderID`),
  ADD CONSTRAINT `orderdetail_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `product` (`ProductID`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`CustomerCode`) REFERENCES `customer` (`CustomerCode`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`BrandID`) REFERENCES `brand` (`BrandID`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`CategoryID`) REFERENCES `category` (`CategoryID`);

--
-- Các ràng buộc cho bảng `product_attribute`
--
ALTER TABLE `product_attribute`
  ADD CONSTRAINT `product_attribute_ibfk_1` FOREIGN KEY (`ProductID`) REFERENCES `product` (`ProductID`),
  ADD CONSTRAINT `product_attribute_ibfk_2` FOREIGN KEY (`AttributeID`) REFERENCES `attribute` (`AttributeID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
