drop database owo;
create database owo;
use owo;
create table usr_type
(
  usr_type_id int not null,
  name varchar(255) not null,
  primary key(usr_type_id)
);
insert into usr_type values(1, 'sensei');
insert into usr_type values(2, 'waterBringer');

create table path
(
path_id int not null,
primary key(path_id),
path_name varchar(255)
);

insert into path values(1,'chessMaster');
insert into path values(2,'artsGuru');
insert into path values(3,'sportsSavage');
insert into path values(4,'scienceMancer');
insert into path values(5,'wordBender');

create table affiliations
(
affil_id int not null,
primary key(affil_id),
affil_name varchar(255)
);

insert into affiliations values(1,'streetBoys');
insert into affiliations values(2,'crawlers');
insert into affiliations values(3,'B-men');
insert into affiliations values(4,'librariens');



create table usr
(
    usr_id int not null AUTO_INCREMENT,
    email varchar(255) not null unique,
    username varchar(40) not null,
    password varchar(40) not null,
    primary key(usr_id),
    usr_type_id int not null,
    foreign key(usr_type_id) references usr_type(usr_type_id) ON UPDATE CASCADE,
    usr_path_id int not null,
    foreign key(usr_path_id) references path(path_id) ON UPDATE CASCADE
  
 );

insert into usr(email, username, password, usr_type_id, usr_path_id) values ('admin', 'Admin', 'admin', 1, 2);
insert into usr(email, username, password, usr_type_id, usr_path_id) values ('user', 'User', 'user', 2, 3); 


create table login_history
(
  history_id int not null AUTO_INCREMENT, 
  primary key(history_id),
  usr_id int not null unique,
  foreign key(usr_id) references usr(usr_id) ON DELETE CASCADE ON UPDATE CASCADE, 
  login_time int,
  logout_time int
);

create table usr_affils
(
  usr_id int not null AUTO_INCREMENT,
  affil_id int not null,
  foreign key(usr_id) references usr(usr_id),
  foreign key(affil_id) references affiliations(affil_id)
);


create table post
(
post_id int not null AUTO_INCREMENT,
primary key(post_id),
body varchar(255) not null,
author_id int not null,
foreign key (author_id) references usr(usr_id) on delete cascade on update cascade

);


insert into post(body, author_id) values('Love, which in gentlest hearts will soonest bloom
  seized my lover with passion for that sweet body
  from which I was torn unshriven to my doom.
Love, which permits no loved one not to love,
  took me so strongly with delight in him
  that we are one in Hell, as we were above.
Love led us to one death. In the depths of Hell
  Caina waits for him who took our lives."
  This was the piteous tale they stopped to tell.', 1);

insert into post(body, author_id) values('Sir, in my heart there was a kind of fighting
That would not let me sleep. Methought I lay
Worse than the mutines in the bilboes. Rashly—
And prais"d be rashness for it—let us know
Our indiscretion sometimes serves us well ...', 1);







