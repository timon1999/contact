create database if not exists contact;

use contact;

create table if not exists user (
    id int not null AUTO_INCREMENT,
    email varchar(45) not null,
    password varchar(500) not null,
    create_date timestamp not null default CURRENT_TIMESTAMP,
    update_date timestamp ON UPDATE CURRENT_TIMESTAMP,
    primary key (id)
);