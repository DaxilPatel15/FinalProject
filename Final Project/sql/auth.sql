use Daxil200520270;
CREATE table admins(
                       ID int primary key auto_increment,
                       FirstName varchar (255)  ,
                       LastName varchar (255) ,
                       Email varchar (255) ,
                       Telephone varchar(255)  ,
                       Passwrd varchar (255)

)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE table fb_admins(
fb_ID int not null primary key auto_increment;
fname varchar(100),
rating int(10),
comnet varchar(100)

)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;







select * from admins;

--  drop table admins;
