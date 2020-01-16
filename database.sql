create table users (
    id int(30) AUTO_INCREMENT PRIMARY KEY,
    firstname varchar(255),
    lastname varchar(255),
    telephone varchar(255),
    email varchar(255),
    uid varchar(255),
    pwd varchar(255),
    status SMALLINT(1) NOT NULL DEFAULT '0',
    time varchar(255)
);

create table public_books (
    id int(30) not null AUTO_INCREMENT PRIMARY KEY,  
    file_name varchar(256) not null,
    file_size varchar(256) not null,
    book_name varchar(256) not null,
    book_author varchar(256) not null,
    book_descri varchar(256) not null,
    course_title varchar(256) not null,
    course_descri varchar(256) not null,
    uploaded_by varchar(256) not null,
    user_id varchar(256) not null,
    time varchar(256) not null
);


create table privatebooks (
    id int(30) not null AUTO_INCREMENT PRIMARY KEY,
    file_name varchar(256) not null,
    user_id varchar(256) not null,
    link varchar(256) not null
);