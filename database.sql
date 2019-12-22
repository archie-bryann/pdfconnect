create table users (
    id int(30) AUTO_INCREMENT PRIMARY KEY,
    name varchar(255),
    email varchar(255),
    uid varchar(255),
    pwd varchar(255),
    status SMALLINT(1) NOT NULL DEFAULT '0',
    time varchar(255)
);


create table book (
    user_id int(20) not null AUTO_INCREMENT PRIMARY KEY,
    file_name varchar(256) not null,
    book_name varchar(256) not null,
    book_author varchar(256) not null,
    book_descri varchar(256) not null,
    course_title varchar(256) not null,
    course_descri varchar(256) not null,
    admin_name varchar(256) not null,
    uploaded_on varchar(256) not null
);