DROP DATABASE IF EXISTS orlify;
CREATE DATABASE orlify;
USE orlify;

CREATE TABLE roles (
    id INT AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
);

INSERT INTO roles(name) VALUES ("student");
INSERT INTO roles(name) VALUES ("teacher");
INSERT INTO roles(name) VALUES ("manager");
INSERT INTO roles(name) VALUES ("admin");

CREATE TABLE images (
    id INT NOT NULL AUTO_INCREMENT,
    url VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE users (
    id INT AUTO_INCREMENT,
    roleId INT NOT NULL,
    name VARCHAR(255) NOT NULL,
    surnames VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    cardUrl VARCHAR(255) NOT NULL,
    avatarImageId INT NOT NULL,
    FOREIGN KEY (roleId) REFERENCES roles(id),
    FOREIGN KEY (avatarImageId) REFERENCES images(id),
    PRIMARY KEY (id)
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