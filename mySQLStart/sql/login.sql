DROP DATABASE IF EXISTS test;
CREATE DATABASE test;
use test;

CREATE TABLE pwuser
(
    id INT AUTO_INCREMENT PRIMARY KEY ,
    name VARCHAR(45),
    password VARCHAR(45)
);

INSERT INTO pwuser VALUES (NULL, 'admin', 'geheim');
