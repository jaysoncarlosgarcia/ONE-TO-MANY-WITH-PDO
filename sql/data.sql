CREATE TABLE Owners (
  OwnerID INT auto_increment primary key,
  firstName VARCHAR(50),
  lastName VARCHAR(50),
  dateOfBirth DATE,
  phoneNumber VARCHAR(15),
  Email VARCHAR(100),
  date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE Pets (
  PetID INT auto_increment primary key,
  OwnerID INT,
  petName VARCHAR(50),
  Species VARCHAR(50),
  Breed VARCHAR(50),
  dateOfBirth DATE,
  Gender VARCHAR(10),
  date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE Appointments (
    AppointmentID INT auto_increment primary key,
    PetID INT,
    AppointmentDate DATE,
    AppointmentTime TIME,
    Description VARCHAR(255),
    Status VARCHAR(255),
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
