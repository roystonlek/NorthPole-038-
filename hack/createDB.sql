drop database if exists teamDB;
create database teamDB;
use teamDB;

create table accounts (
    username varchar(40)  primary key,
    password varchar(40),
    fullname varchar(40)
);

insert into accounts (username, password, fullname) values
    ('user1', 'user1', 'Barack Obama'),
    ('user2', 'user2', 'Donald Trump'),
    ('manager1', 'manager1', 'Bill Gates');


create TABLE offers(
    grpID int auto_increment primary key ,
    grpTitle varchar(25) not null ,
    grpDesc varchar(200),
    grpPax int not null,
    grpHost varchar(100) ,
    grpCategory varchar(25)
);

insert into offers (grpTitle, grpDesc, grpPax, grpHost, grpCategory) values
    ('IS112' , 'data management' , 3 , '@leeshuoan' , 'SCIS'),
    ('CS102' , 'fundamentals of programming', 2 , '@juzli' , 'SCIS');
