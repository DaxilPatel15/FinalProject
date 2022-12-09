CREATE table admins(
	ID int not null primary key auto_increment,
	FirstName varchar (255),
	LastName varchar (255),
	Email varchar (255),
	Telephone varchar(255),
	Passwrd varchar (255)

)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO admins (FirstName, LastName, Email, Telephone, Passwrd)
VALUES
('Bob', 'Smith', 'email1@email.ca', '705-123-4567','12345'),
('Jane', 'Smith', 'email11@email.ca', '705-123-4567','45677'),
('Rob', 'Doe', 'email111@email.ca', '705-123-4567','54544'),
('Ian', 'Smith', 'email1111@email.ca', '705-123-4567','35545');

