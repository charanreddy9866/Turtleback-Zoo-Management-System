-- Create database called "turtleback"
CREATE
DATABASE IF NOT EXISTS turtleback;
USE
turtleback;


-- Employee Table
CREATE TABLE Employee
(
    ID           INT AUTO_INCREMENT PRIMARY KEY,
    First        VARCHAR(50),
    Minit        CHAR(1),
    Last         VARCHAR(50),
    StartDate    DATE,
    Address      VARCHAR(255),
    City         VARCHAR(50),
    State        VARCHAR(50),
    Zip          CHAR(5),
    JobType      VARCHAR(50),
    SupervisorID INT NULL,
    created_at   TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at   TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (JobType) REFERENCES JobType (Name),
    FOREIGN KEY (SupervisorID) REFERENCES Employee (ID)
);

CREATE TABLE EmployeeAttendance
(
    ID          INT AUTO_INCREMENT PRIMARY KEY,
    Date        DATE,
    EmployeeID  INT,
    Attended    BOOLEAN,
    created_at  TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at  TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (EmployeeID) REFERENCES Employee (ID)
);

-- AnimalShow Table
CREATE TABLE AnimalShow
(
    ID          INT AUTO_INCREMENT PRIMARY KEY,
    Name        VARCHAR(50),
    Type        VARCHAR(50),
    AdultPrice  DECIMAL(10, 2),
    SeniorPrice DECIMAL(10, 2),
    ChildPrice  DECIMAL(10, 2),
    PerDay      INT,
    created_at  TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at  TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);



-- Building Table
CREATE TABLE Building
(
    ID         INT AUTO_INCREMENT PRIMARY KEY,
    Name       VARCHAR(50),
    Type       VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Enclosure Table
CREATE TABLE Enclosure
(
    ID         INT AUTO_INCREMENT PRIMARY KEY,
    SqFt       DECIMAL(10, 2),
    BuildingID INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (BuildingID) REFERENCES Building (ID)
);

-- Species Table
CREATE TABLE Species
(
    ID              INT AUTO_INCREMENT PRIMARY KEY,
    Name            VARCHAR(255),
    AverageFoodCost DECIMAL(10, 2),
    created_at      TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at      TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Animal Table
CREATE TABLE Animal
(
    ID          INT AUTO_INCREMENT PRIMARY KEY,
    Name        VARCHAR(50),
    SpeciesID   INT,
    Status      VARCHAR(50),
    BirthYear YEAR,
    FoodCost    DECIMAL(10, 2),
    EnclosureID INT,
    created_at  TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at  TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (SpeciesID) REFERENCES Species (ID),
    FOREIGN KEY (EnclosureID) REFERENCES Enclosure (ID)
);

-- JobType Table
CREATE TABLE JobType
(
    Name       VARCHAR(50) PRIMARY KEY,
    HourlyRate DECIMAL(10, 2)
);

-- Add ID column to JobType Table
ALTER TABLE JobType
ADD ID INT AUTO_INCREMENT UNIQUE KEY FIRST,
ADD created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
ADD updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP;


-- Concession Table
CREATE TABLE Concession
(
    ID           INT AUTO_INCREMENT PRIMARY KEY,
    Type         VARCHAR(50),
    AnimalShowID INT,
    created_at   TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at   TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (AnimalShowID) REFERENCES AnimalShow (ID)
);

-- ZooAdmission Table
CREATE TABLE ZooAdmission
(
    ID          INT AUTO_INCREMENT PRIMARY KEY,
    AdultPrice  DECIMAL(10, 2),
    SeniorPrice DECIMAL(10, 2),
    ChildPrice  DECIMAL(10, 2)
);

-- RevenueTypes Table
CREATE TABLE RevenueTypes
(
    ID         INT AUTO_INCREMENT PRIMARY KEY,
    Name       VARCHAR(50),
    Type       VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- RevenueEvents Table
CREATE TABLE RevenueEvents
(
    ID            INT AUTO_INCREMENT PRIMARY KEY,
    Date          DATE,
    Revenue       DECIMAL(10, 2),
    TicketsSold   INT,
    RevenueTypeID INT,
    created_at    TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at    TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (RevenueTypeID) REFERENCES RevenueTypes (ID)
);

-- Specialized Employee Tables:

-- Veterinarian Table
CREATE TABLE Veterinarian
(
    EmployeeID    INT PRIMARY KEY,
    Qualification VARCHAR(255),
    FOREIGN KEY (EmployeeID) REFERENCES Employee (ID)
);

-- AnimalCareSpecialist Table
CREATE TABLE AnimalCareSpecialist
(
    EmployeeID    INT PRIMARY KEY,
    TrainingLevel INT,
    FOREIGN KEY (EmployeeID) REFERENCES Employee (ID)
);

-- Maintenance Table
CREATE TABLE Maintenance
(
    EmployeeID      INT PRIMARY KEY,
    AreaOfExpertise VARCHAR(255),
    FOREIGN KEY (EmployeeID) REFERENCES Employee (ID)
);

-- CustomerService Table
CREATE TABLE CustomerService
(
    EmployeeID  INT PRIMARY KEY,
    ServiceArea VARCHAR(255),
    FOREIGN KEY (EmployeeID) REFERENCES Employee (ID)
);

-- TicketSeller Table
CREATE TABLE TicketSeller
(
    EmployeeID     INT PRIMARY KEY,
    ZooAdmissionID INT,
    FOREIGN KEY (EmployeeID) REFERENCES Employee (ID),
    FOREIGN KEY (ZooAdmissionID) REFERENCES ZooAdmission (ID)
);

