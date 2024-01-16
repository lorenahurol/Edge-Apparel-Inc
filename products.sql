-- Create a database called codespace:

CREATE DATABASE IF NOT EXISTS codespace;

USE codespace;

-- Create a table called products: Define the columns of the table with appropriate data types and constraints.

CREATE TABLE `products` (
    `item_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, --Unsigned means that it starts at 0, then if a product gets added it will be 1.
    `item_name` varchar(250) NOT NULL,
    `item_desc` varchar(250) NOT NULL,
    `item_img` varchar(20) NOT NULL,
    `item_price` decimal(4,2) NOT NULL,
    PRIMARY KEY (`item_id`) -- set item_id as the primary key
);

-- After this, create a connection to the database.