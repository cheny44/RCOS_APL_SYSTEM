CREATE DATABASE APL
  DEFAULT CHARACTER SET utf8;
	GRANT ALL ON APL.* TO 'kurot'@'localhost' IDENTIFIED BY '5gengliuli';
USE APL;

CREATE TABLE Color (
  color_id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
  color_description varchar(20) NOT NULL
);

CREATE TABLE Premanent_Ban (
	pb_id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,

	pb_start_date DATE NOT NULL,
	INDEX USING BTREE (pb_start_date),
	pb_end_date varchar(20),
	pb_description varchar(255) NOT NULL,
	pb_add_note varchar(255)
);

CREATE TABLE Active_Ban (
	ab_id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,

	ab_start_date DATE,
	INDEX USING BTREE (ab_start_date),
	ab_end_date Date,
	ab_description varchar(255),
	ab_add_note varchar(255)
);

CREATE TABLE Branch (
	branch_id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,

	branch_name varchar(40) NOT NULL,
	reporter varchar(40),
	INDEX USING BTREE (branch_name),
	branch_description varchar(255)
);

CREATE TABLE Client (
	client_id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,

  age INTEGER,
	pb_id INTEGER,
	ab_id INTEGER,
# 	incident_id INTEGER,

	first_name varchar(20) NOT NULL,
	last_name varchar(20) NOT NULL
# 	CONSTRAINT FOREIGN KEY (pb_id) REFERENCES Premanent_Ban (pb_id)
# 	  ON DELETE CASCADE ON UPDATE CASCADE,
# 	CONSTRAINT FOREIGN KEY (ab_id) REFERENCES Active_Ban (ab_id)
# 	  ON DELETE CASCADE ON UPDATE CASCADE,
# 	CONSTRAINT FOREIGN KEY (incident_id) REFERENCES Incident (incident_id)
# 		ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE Facility_Incident (
	fi_id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
	branch_id INTEGER NOT NULL,

	fi_date DATE,
	fi_time TIME,
	fi_description varchar(255),
	fi_following varchar(255),
	CONSTRAINT FOREIGN KEY (branch_id) REFERENCES Branch (branch_id)
	  ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE Incident (
  incident_id INTEGER NOT NULL AUTO_INCREMENT,

	incident_description varchar(255),
	affected_group varchar(255),
	Notes varchar(255),
	date_time datetime,
	INDEX USING BTREE (date_time),

	client_id INTEGER NOT NULL,
	branch_id INTEGER NOT NULL,
	pb_id INTEGER NOT NULL,
	ab_id INTEGER NOT NULL,
	color_id INTEGER NOT NULL,

	CONSTRAINT FOREIGN KEY (client_id)	REFERENCES Client (client_id)
		ON DELETE CASCADE ON UPDATE CASCADE,
 	CONSTRAINT FOREIGN KEY (branch_id)	REFERENCES Branch (branch_id)
		ON DELETE CASCADE ON UPDATE CASCADE,
# 	CONSTRAINT FOREIGN KEY (pb_id)	REFERENCES Premanent_Ban (pb_id)
# 	 	ON DELETE CASCADE ON UPDATE CASCADE,
#  	CONSTRAINT FOREIGN KEY (ab_id)	REFERENCES Active_Ban (ab_id)
# 		ON DELETE CASCADE ON UPDATE CASCADE,
	CONSTRAINT FOREIGN KEY (color_id)	REFERENCES Active_Ban (ab_id)
		ON DELETE CASCADE ON UPDATE CASCADE,

	PRIMARY KEY(incident_id, client_id)
) ENGINE = InnoDB;

select Incident.incident_description, Client.last_name, Branch.branch_name, Color.color_description
       from Incident join Client join Branch join Color on
  	Incident.client_id = Client.client_id
and Incident.branch_id = Branch.branch_id
and Incident.color_id = Color.color_id

INSERT INTO Client (first_name, last_name, age) VALUES ('Yitong', 'Chen', 21);
INSERT INTO Client (first_name, last_name, age) VALUES ('qwert', 'yuiop', 21);
INSERT INTO Client (first_name, last_name, age) VALUES ('asdfg', 'hjkl', 21);
INSERT INTO Client (first_name, last_name, age) VALUES ('zxcvb', 'nm', 21);
INSERT INTO Client (first_name, last_name, age) VALUES ('12345', '67890', 21);
