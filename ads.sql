CREATE TABLE users (
	id int AUTO_INCREMENT, 
	email varchar(60) NOT NULL,
	password varchar(255) NOT NULL,
	PRIMARY KEY (id)
);


CREATE TABLE profiles (
	id int AUTO_INCREMENT,
	first_name varchar(50),
	last_name varchar(50),
	date_of_birth date,
	phone varchar(30),
	city varchar(50),
	user_id int,
    PRIMARY KEY (id),
    FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE ads (
	id int AUTO_INCREMENT, 
	title varchar(100) NOT NULL,
	content text,
	category varchar(40),
	created_at date,
	expires_on date,
	user_id int,
	PRIMARY KEY (id),
	FOREIGN KEY (user_id) REFERENCES users(id)
);