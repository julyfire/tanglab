mysql -u root -p

show databases;

create database tanglab;

use tanglab

create table plasmid (
	id int unsigned not null auto_increment primary key, 
	name varchar(200) not null,
	source varchar(200),
	host varchar(50),
	size int unsigned,
	viral_nonviral varchar(9),
	stable_transient varchar(10),
	constitutive_inducible varchar(13),
	promoter varchar(20),
	protein_tags varchar(100),
	resistance varchar(200),
	rec_site varchar(200),
	primer varchar(20),
	primer_seq text,
	gene varchar(50),
	gene_seq text,
	vector varchar(50),
	vector_seq text,
	plasmid_seq text,
	notes text,
	map varchar(200)
);

describe plasmid;

insert into plasmid values('pET-11','','',4000,'','','','','','','','','','','','','','','','');
insert into plasmid(name,seq) values('pET-30','aaaatttcgaatcgggggggaaaaaatttttt');

grant all privileges on *.* to weibo@localhost identified by '***' with grant option;
grant all privileges on *.* to weibo@"%" identified by '***' with grant option;
grant select,insert,update on tanglab.* to browser@192.168.37.13 identified by '123';
grant select,insert,update on tanglab.userlist to guest@locolhost identified by '123';

create table protocol (
	id int unsigned not null auto_increment primary key,
	title varchar(500) not null,
	subject varchar(200),
	created_by varchar(200),
	created_date datetime not null,
	modified_date datetime,
	modified_by varchar(200),
	abstract text,
	content varchar(300)	
);


create table p_history (
	id int unsigned not null auto_increment primary key,
	p_id int unsigned not null,
	author varchar(200),
	date datetime not null,
	title varchar(500),
	subject varchar(200),
	address varchar(300)
);

create table p_discussion (
	id int unsigned not null auto_increment primary key,
	p_id int unsigned not null,
	author varchar(200),
	date datetime not null,
	talk text
);

create table userlist (
	id int unsigned not null auto_increment primary key,
	username varchar(20) not null,
	password varchar(35) not null,
	email varchar(50),
	level int not null
);

create table reagent (
	id int unsigned not null auto_increment primary key,
	name varchar(300) not null,
	cas_num varchar(20),
	storage varchar(300),
	class varchar(300),
	notes text
);

create table reagent_buy_log (
	id int unsigned not null auto_increment primary key,
	r_id int unsigned not null,
	time date not null,
	quantity int,
	unit varchar(5),
	price int,
	specification varchar(50),
	total int,
	buyer varchar(50),
	vendor varchar(200)
);
	
create table notice (
	id int unsigned not null auto_increment primary key,
	title varchar(500) not null,
	time datetime not null,
	content text not null
);
	
create table attachment (
	id int unsigned not null auto_increment primary key,
	n_id int unsigned not null,
	filename varchar(300) not null,
	filesize int not null,
	path varchar(300) not null
);


update protocol set title='hello,this is title', subject='this is subject', modified_date='this is the last modified time', modified_by='this is the last author', content='this is content' where id=2;	

+-------------------+
| Tables_in_tanglab |
+-------------------+
| attachment        | 
| notice            | 
| p_discussion      | 
| p_history         | 
| plasmid           | 
| protocol          | 
| reagent           | 
| reagent_buy_log   | 
| userlist          | 
+-------------------+

drop user guest@localhost;

grant select,insert,update,delete on tanglab.* to admin@localhost identified by 'a4m1n';
grant select on tanglab.* to guest@localhost identified by '9ue57';
grant select on tanglab.* to labmember@localhost identified by 'u5e7s';
grant select,insert,update on tanglab.protocol to labmember@localhost identified by 'u5e7s';
grant select,insert,update on tanglab.p_discussion to labmember@localhost identified by 'u5e7s';
grant select,insert,update on tanglab.p_history to labmember@localhost identified by 'u5e7s';
grant select,update(password,email) on tanglab.userlist to labmember@localhost identified by 'u5e7s';
