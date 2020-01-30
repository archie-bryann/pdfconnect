create table users (
    id int(30) AUTO_INCREMENT PRIMARY KEY,
    firstname varchar(255),
    lastname varchar(255),
    telephone varchar(255),
    email varchar(255),
    uid varchar(255),
    pwd varchar(255),
    pure_pwd varchar(255),
    picture varchar(256) NOT NULL DEFAULT 'profiledefault.jpg',  --make profiledefault.jpg default  
    
    student_of varchar(256),
    work_at varchar(256),
    about_me varchar(256),

    allow_telephone varchar(256) DEFAULT '0',
    allow_email varchar(256) DEFAULT '0',

    status SMALLINT(1) NOT NULL DEFAULT '0',
    time varchar(255),
    updated varchar(255),

    code varchar(256),
    verified varchar(255) DEFAULT '0'
);

create table public_books (
    id int(30) not null AUTO_INCREMENT PRIMARY KEY,  
    file_name varchar(256) not null,
    searchFileName varchar(256) not null,
    extension varchar(256) not null,
    file_size varchar(256) not null,
    book_name varchar(256) not null,
    book_author varchar(256),
    code varchar(256) not null,
    course varchar(256),
    uploaded_by varchar(256) not null,
    user_id varchar(256) not null,
    visible varchar(256) DEFAULT '1' not null ,
    time varchar(256) not null,
    updated varchar(256)
);

create table report (
    id int(30) not null AUTO_INCREMENT PRIMARY KEY,
    name varchar(256) not null,
    telephone varchar(256) not null,
    email varchar(256) not null,
    title varchar(256) not null,
    message varchar(256) not null,
    user_id varchar(256) not null
);

create table searches (
    id int(30) not null AUTO_INCREMENT PRIMARY KEY,
    user_id varchar(256) not null,
    search varchar(256) not null,
    time varchar(256) not null
);

create table requests (
    id int(30) not null AUTO_INCREMENT PRIMARY KEY,
    url varchar(30) not null
);



create table privatebooks (
    id int(30) not null AUTO_INCREMENT PRIMARY KEY,
    file_name varchar(256) not null,
    user_id varchar(256) not null,
    link varchar(256) not null
);