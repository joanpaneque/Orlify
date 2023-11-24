DROP DATABASE IF EXISTS orlify;
CREATE DATABASE orlify;
USE orlify;

CREATE TABLE roles (
    id INT AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
);

INSERT INTO roles (name) VALUES ("student");
INSERT INTO roles (name) VALUES ("teacher");
INSERT INTO roles (name) VALUES ("manager");
INSERT INTO roles (name) VALUES ("admin");

CREATE TABLE images (
    id INT NOT NULL AUTO_INCREMENT,
    url VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE users (
    id INT AUTO_INCREMENT,
    roleId INT NOT NULL,
    name VARCHAR(255) NOT NULL,
    surnames VARCHAR(255),
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    cardUrl VARCHAR(255),
    mainPortraitImageId INT,
    UNIQUE (username),
    UNIQUE (email),
    FOREIGN KEY (roleId) REFERENCES roles(id),
    FOREIGN KEY (mainPortraitImageId) REFERENCES images(id),
    PRIMARY KEY (id)
);

INSERT INTO users VALUES (NULL, 1, "Joan", "Paneque Domingo", "jpaneque", "joanpd0@gmail.com", "1234", NULL, NULL);
INSERT INTO users VALUES (NULL, 1, "Joan2", "Paneque Domingo2", "jpaneque2", "joanpd0@gmail.com2", "1234", NULL, NULL);
INSERT INTO users VALUES (NULL, 1, "Joan3", "Paneque Domingo3", "jpaneque3", "joanpd0@gmail.com3", "1234", NULL, NULL);
INSERT INTO users VALUES (NULL, 1, "Joan4", "Paneque Domingo4", "jpaneque4", "joanpd0@gmail.com4", "1234", NULL, NULL);
INSERT INTO users VALUES (NULL, 1, "Joan5", "Paneque Domingo5", "jpaneque5", "joanpd0@gmail.com5", "1234", NULL, NULL);

CREATE TABLE recoveries (
    id INT AUTO_INCREMENT,
    userId INT NOT NULL,
    token VARCHAR(255) NOT NULL,
    expiresAt DATETIME NOT NULL DEFAULT DATE_ADD(CURRENT_TIMESTAMP, INTERVAL 10 MINUTE),
    PRIMARY KEY (id),
    FOREIGN KEY (userId) REFERENCES users(id),
    UNIQUE (token)
);

CREATE TABLE reports (
    id INT AUTO_INCREMENT,
    userId INT NOT NULL,
    description VARCHAR(255) NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (userId) REFERENCES users(id)
);

CREATE TABLE groups (
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE portraits (
    id INT NOT NULL AUTO_INCREMENT,
    groupId INT NOT NULL,
    activated TINYINT(1) NOT NULL DEFAULT 1,
    public TINYINT(1) NOT NULL DEFAULT 0,
    PRIMARY KEY (id),
    FOREIGN KEY (groupId) REFERENCES groups(id)
);

CREATE TABLE portraitsUsersImages (
    userId INT NOT NULL,
    imageId INT NOT NULL,
    FOREIGN KEY (userId) REFERENCES users(id),
    FOREIGN KEY (imageId) REFERENCES images(id)
);

CREATE TABLE teachersUsersGroups(
    userId INT NOT NULL,
    groupId INT NOT NULL,
    FOREIGN KEY (userId) REFERENCES users(id),
    FOREIGN KEY (groupId) REFERENCES groups(id)
);

CREATE TABLE studentsUsersGroups(
    userId INT NOT NULL,
    groupId INT NOT NULL,
    FOREIGN KEY (userId) REFERENCES users(id),
    FOREIGN KEY (groupId) REFERENCES groups(id)
);