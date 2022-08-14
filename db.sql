create database sign_lumintu;
use sign_lumintu;

create table pendaftaran(
    id int not null primary key auto_increment,
    username varchar(200),
    email varchar(100),
    password varchar(200)
);