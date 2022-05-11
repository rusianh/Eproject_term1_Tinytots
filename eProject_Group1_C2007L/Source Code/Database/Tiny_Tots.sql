CREATE DATABASE IF NOT EXISTS tinytots;

USE tinytots;
CREATE TABLE Category
(
    CategoryID    int auto_increment PRIMARY KEY,
    Name_Category NVARCHAR(50) NOT NULL

);
CREATE TABLE Brand
(
    BrandID    int auto_increment PRIMARY KEY,
    Brand_Name NVARCHAR(50) NOT NULL


);

CREATE TABLE Product
(
    ProductID           int primary key ,
    Product_Name        NVARCHAR(50) NOT NULL,
    CategoryID          int,
    Description_Product NVARCHAR(200),
    Product_status      nvarchar(20),
    BrandID             int,
    ProductImage_link   text,
    Product_Price       float,
    FOREIGN KEY (BrandID) REFERENCES Brand (BrandID),
    FOREIGN KEY (CategoryID) REFERENCES Category (CategoryID)
);



CREATE TABLE Admins
(
    AdminID    INT          NOT NULL AUTO_INCREMENT PRIMARY KEY,
    UserName   NVARCHAR(50) NOT NULL,
    Password   VARCHAR(200) NOT NULL,
    Name_Admin NVARCHAR(50) NOT NULL
);

CREATE TABLE Attribute
(
    AttributeID    int PRIMARY KEY,
    Attribute_Name nvarchar(50) NOT NULL

);



CREATE TABLE Product_Attribute
(
    ProductAttributeID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    ProductID          int NOT NULL,
    AttributeID        int NOT NULL,
    FOREIGN KEY (ProductID) REFERENCES Product (ProductID),
    FOREIGN KEY (AttributeID) REFERENCES Attribute (AttributeID)
);


Create table Customer
(
    CustomerCode  int  primary key,
    Order_Name    NVARCHAR(50),
    Order_Phone   NVARCHAR(15)  NOT NULL,
    Order_Address NVARCHAR(200) NOT NULL

);

CREATE TABLE Orders
(
    OrderID      int PRIMARY KEY,
    CustomerCode int not null,
    FOREIGN KEY (CustomerCode) REFERENCES customer (CustomerCode)
);



CREATE TABLE OrderDetail
(
    OrderDetailID int auto_increment PRIMARY KEY,
    OrderID       int NOT NULL,
    ProductID     int NOT NULL,
    Quantity      INT NOT NULL,
    FOREIGN KEY (OrderID) REFERENCES Orders (OrderID),
    FOREIGN KEY (ProductID) REFERENCES Product (ProductID)
);



