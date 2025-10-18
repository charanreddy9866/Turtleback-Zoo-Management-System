

-- Populate Species Table
INSERT INTO Species (Name, AverageFoodCost)
VALUES ('African Elephant', 150.00),
       ('Bald Eagle', 45.00),
       ('King Cobra', 20.00),
       ('Chimpanzee', 60.00),
       ('Penguin', 30.00);

-- Populate Animal Table with assumed SpeciesID and EnclosureID
-- Ensure that SpeciesID and EnclosureID match the IDs from the respective tables
INSERT INTO Animal (Name, SpeciesID, Status, BirthYear, FoodCost, EnclosureID)
VALUES ('Ellie', 1, 'Healthy', 2010, 160.00, 1),
       ('Edgar', 2, 'Injured', 2015, 50.00, 2),
       ('Kaa', 3, 'Healthy', 2018, 25.00, 3),
       ('Charlie', 4, 'Healthy', 2016, 65.00, 4),
       ('Paddles', 5, 'Healthy', 2019, 35.00, 5);

-- Populate Employee Table with JobType matching the JobType table
-- SupervisorID is left NULL
INSERT INTO Employee (First, Minit, Last, StartDate, Address, City, State, Zip, JobType)
VALUES ('Jane', 'A', 'reaves', '2018-06-01', '123', 'Zootown', 'CA', '90210', 'Veterinarian'),
       ('mary', 'B', 'ann', '2019-07-15', '124 Zoo Lane', 'Zootown', 'CA', '90210', 'Animal Care Specialist'),
       ('max', 'C', 'Jones', '2017-05-23', '125 Lane', 'Zootown', 'CA', '90210', 'Maintenance Worker'),
       ('john', 'D', 'kelvin', '2020-02-10', '126 Zoo Lane', 'Zootown', 'CA', '90210',
        'Customer Service Representative'),
       ('halaand', 'E', 'db', '2021-03-12', '54 Zoo Lane', 'Zootown', 'CA', '90210', 'Ticket Seller');

-- Populate AnimalShow Table
INSERT INTO AnimalShow (Name, Type, AdultPrice, SeniorPrice, ChildPrice, PerDay)
VALUES ('Birds of Prey', 'Educational', 10.00, 8.00, 5.00, 3),
       ('Reptile Discovery', 'Interactive', 12.00, 9.00, 6.00, 2),
       ('Big Cats', 'Educational', 15.00, 12.00, 7.00, 2),
       ('Aquatic Adventures', 'Educational', 12.00, 10.00, 6.00, 1),
       ('Monkey Mania', 'Interactive', 11.00, 9.00, 5.50, 2);

-- Populate JobType Table
INSERT INTO JobType (Name, HourlyRate)
VALUES ('Veterinarian', 30.00),
       ('Animal Care Specialist', 25.00),
       ('Maintenance Worker', 20.00),
       ('Customer Service Representative', 18.00),
       ('Ticket Seller', 15.00);

-- Populate Building Table
INSERT INTO Building (Name, Type)
VALUES ('Reptile House', 'Exhibit'),
       ('Aviary', 'Exhibit'),
       ('Visitor Center', 'Amenity'),
       ('Aquatic Center', 'Exhibit'),
       ('Primate House', 'Exhibit');

-- Populate Enclosure Table with assumed BuildingID
-- Ensure that BuildingID matches the IDs from the Building table
INSERT INTO Enclosure (SqFt, BuildingID)
VALUES (1000.00, 1),
       (2000.00, 2),
       (500.00, 3),
       (1500.00, 4),
       (1200.00, 5);


-- Populate Concession Table with assumed AnimalShowID
INSERT INTO Concession (Type, AnimalShowID)
VALUES ('Food', 1),
       ('Souvenirs', 1),
       ('Food', 2),
       ('Souvenirs', 2),
       ('Food', 3);

-- Populate ZooAdmission Table
INSERT INTO ZooAdmission (AdultPrice, SeniorPrice, ChildPrice)
VALUES (20.00, 15.00, 10.00),
       (25.00, 20.00, 15.00),
       (18.00, 14.00, 9.00),
       (22.00, 17.00, 11.00),
       (21.00, 16.00, 10.50);

-- Populate RevenueTypes Table
INSERT INTO RevenueTypes (Name, Type)
VALUES ('Ticket Sales', 'Admission'),
       ('Concessions', 'Merchandise'),
       ('Gift Shop', 'Merchandise'),
       ('Parking Fees', 'Service'),
       ('Membership', 'Subscription');

-- Populate RevenueEvents Table with assumed RevenueTypeID
INSERT INTO RevenueEvents (Date, Revenue, TicketsSold, RevenueTypeID)
VALUES ('2023-05-01', 10000.00, 500, 1),
       ('2023-05-02', 3000.00, 300, 2),
       ('2023-05-03', 2000.00, 250, 3),
       ('2023-05-04', 1500.00, 350, 4),
       ('2023-05-05', 4000.00, 450, 5);

-- Populate Veterinarian Table
INSERT INTO Veterinarian (EmployeeID, Qualification)
VALUES (1, 'PhD in Veterinary Medicine'),
       (2, 'Veterinary Surgeon'),
       (3, 'General Veterinary Practitioner');

-- Populate AnimalCareSpecialist Table
INSERT INTO AnimalCareSpecialist (EmployeeID, TrainingLevel)
VALUES (2, 5),
       (3, 4),
       (4, 3);

-- Populate Maintenance Table
INSERT INTO Maintenance (EmployeeID, AreaOfExpertise)
VALUES (3, 'Electrical'),
       (4, 'Plumbing'),
       (5, 'Landscaping'),
       (1, 'HVAC'),
       (2, 'General Maintenance');

-- Populate CustomerService Table
INSERT INTO CustomerService (EmployeeID, ServiceArea)
VALUES (4, 'Front Desk'),
       (1, 'Information'),
       (3, 'Guided Tours'),
       (2, 'Membership Services'),
       (5, 'Lost & Found');

-- Populate TicketSeller Table with assumed ZooAdmissionID
INSERT INTO TicketSeller (EmployeeID, ZooAdmissionID)
VALUES (5, 1),
       (4, 2),
       (3, 3),
       (2, 4);

-- Populate the Attendance Table
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-06', 1, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-06', 2, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-06', 3, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-06', 4, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-06', 5, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-06', 14, 0);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-07', 1, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-07', 2, 0);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-07', 3, 0);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-07', 4, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-07', 5, 0);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-07', 14, 0);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-08', 1, 0);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-08', 2, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-08', 3, 0);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-08', 4, 0);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-08', 5, 0);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-08', 14, 0);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-09', 1, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-09', 2, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-09', 3, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-09', 4, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-09', 5, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-09', 14, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-10', 1, 0);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-10', 2, 0);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-10', 3, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-10', 4, 0);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-10', 5, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-10', 14, 0);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-11', 1, 0);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-11', 2, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-11', 3, 0);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-11', 4, 0);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-11', 5, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-11', 14, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-12', 1, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-12', 2, 0);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-12', 3, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-12', 4, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-12', 5, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-12', 14, 0);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-13', 1, 0);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-13', 2, 0);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-13', 3, 0);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-13', 4, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-13', 5, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-13', 14, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-14', 1, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-14', 2, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-14', 3, 0);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-14', 4, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-14', 5, 0);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-14', 14, 0);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-15', 1, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-15', 2, 0);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-15', 3, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-15', 4, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-15', 5, 0);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-15', 14, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-16', 1, 0);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-16', 2, 0);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-16', 3, 0);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-16', 4, 0);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-16', 5, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-16', 14, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-17', 1, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-17', 2, 0);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-17', 3, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-17', 4, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-17', 5, 0);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-17', 14, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-18', 1, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-18', 2, 0);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-18', 3, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-18', 4, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-18', 5, 0);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-18', 14, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-19', 1, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-19', 2, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-19', 3, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-19', 4, 0);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-19', 5, 0);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-19', 14, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-20', 1, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-20', 2, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-20', 3, 0);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-20', 4, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-20', 5, 0);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-20', 14, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-21', 1, 0);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-21', 2, 0);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-21', 3, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-21', 4, 0);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-21', 5, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-21', 14, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-22', 1, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-22', 2, 0);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-22', 3, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-22', 4, 0);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-22', 5, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-22', 14, 0);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-23', 1, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-23', 2, 0);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-23', 3, 0);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-23', 4, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-23', 5, 0);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-23', 14, 0);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-24', 1, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-24', 2, 0);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-24', 3, 0);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-24', 4, 0);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-24', 5, 0);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-24', 14, 0);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-25', 1, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-25', 2, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-25', 3, 0);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-25', 4, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-25', 5, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-25', 14, 0);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-26', 1, 0);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-26', 2, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-26', 3, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-26', 4, 0);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-26', 5, 0);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-26', 14, 0);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-27', 1, 0);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-27', 2, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-27', 3, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-27', 4, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-27', 5, 0);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-27', 14, 0);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-28', 1, 0);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-28', 2, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-28', 3, 0);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-28', 4, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-28', 5, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-28', 14, 0);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-29', 1, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-29', 2, 0);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-29', 3, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-29', 4, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-29', 5, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-29', 14, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-30', 1, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-30', 2, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-30', 3, 0);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-30', 4, 0);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-30', 5, 0);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-30', 14, 0);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-31', 1, 0);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-31', 2, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-31', 3, 0);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-31', 4, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-31', 5, 0);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2023-12-31', 14, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2024-01-01', 1, 0);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2024-01-01', 2, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2024-01-01', 3, 0);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2024-01-01', 4, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2024-01-01', 5, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2024-01-01', 14, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2024-01-02', 1, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2024-01-02', 2, 0);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2024-01-02', 3, 0);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2024-01-02', 4, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2024-01-02', 5, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2024-01-02', 14, 0);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2024-01-03', 1, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2024-01-03', 2, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2024-01-03', 3, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2024-01-03', 4, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2024-01-03', 5, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2024-01-03', 14, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2024-01-04', 1, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2024-01-04', 2, 0);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2024-01-04', 3, 0);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2024-01-04', 4, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2024-01-04', 5, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2024-01-04', 14, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2024-01-05', 1, 0);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2024-01-05', 2, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2024-01-05', 3, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2024-01-05', 4, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2024-01-05', 5, 1);
INSERT INTO EmployeeAttendance (Date, EmployeeID, Attended)
VALUES ('2024-01-05', 14, 1);



