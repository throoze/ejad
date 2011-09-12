CREATE TABLE BulletinType (id BIGINT UNSIGNED AUTO_INCREMENT, name VARCHAR(30) NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE Confirmation (user_id BIGINT UNSIGNED, hash VARCHAR(64) NOT NULL, PRIMARY KEY(user_id)) ENGINE = INNODB;
CREATE TABLE Subscription (user_id INT UNSIGNED, bulletin_type_id INT UNSIGNED, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(user_id, bulletin_type_id)) ENGINE = INNODB;
CREATE TABLE User (id BIGINT UNSIGNED AUTO_INCREMENT, username VARCHAR(50) NOT NULL, name VARCHAR(50) NOT NULL, lastname VARCHAR(50), gender VARCHAR(1) NOT NULL, email VARCHAR(100) NOT NULL, passwd VARCHAR(128), status INT DEFAULT '0', lastlogin DATETIME, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, UNIQUE INDEX usrname_unique_idx (username ASC), INDEX emailIdx_idx (email ASC), PRIMARY KEY(id)) ENGINE = INNODB;
ALTER TABLE Subscription ADD CONSTRAINT Subscription_user_id_User_id FOREIGN KEY (user_id) REFERENCES User(id);
ALTER TABLE Subscription ADD CONSTRAINT Subscription_bulletin_type_id_BulletinType_id FOREIGN KEY (bulletin_type_id) REFERENCES BulletinType(id);
