CREATE TABLE authors (
  id SERIAL NOT NULL  PRIMARY KEY,
  first_name varchar(50) NOT NULL,
  last_name varchar(50) NOT NULL,
  email varchar(100) NOT NULL,
  age int NOT NULL,
  groupes varchar(10) NOT NULL
  );

