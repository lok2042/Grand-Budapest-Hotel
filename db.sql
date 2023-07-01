DROP TABLE IF EXISTS `guest`;
CREATE TABLE `guest` (
    `guest_id` INT NOT NULL AUTO_INCREMENT ,
    `first_name` VARCHAR(30) NOT NULL ,
    `last_name` VARCHAR(30) NOT NULL ,
   	`dob` DATE NOT NULL ,
    `contact_number` varchar(30) NOT NULL,
   	`email` VARCHAR(40) NOT NULL ,
   	`profile_pic` VARCHAR(20) NOT NULL ,
    CONSTRAINT guestPK
    PRIMARY KEY (`guest_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `guest`(`first_name`, `last_name`, `dob`, `contact_number`, `email`, `profile_pic`) VALUES
('Simon', 'Baker', '1969-07-30', '(123)-1234-450', 'simon.baker@email.com', 'simon123.jpg'),
('Tim ', 'Kang', '1973-03-16', '(123)-1234-451', 'tim.kang@email.com', 'tim123.jpg'),
('Robin', 'Tunney', '1972-06-19', '(123)-1234-452', 'robin.tunney@email.com', 'robin123.jpg'),
('Owen', 'Yeoman', '1978-07-02', '(123)-1234-453', 'owen.yeoman@email.com', 'owen123.jpg'),
('Amanda', 'Righetti', '1998-05-01', '(123)-1234-454', 'amanda.riguetti@email.com', 'amanda123.jpg'),
('Ashley', 'Johnson', '1983-08-09', '(123)-1234-455', 'ashley.johnson@email.com', 'ashley123.jpg'),
('Kit', 'Harrington', '1986-12-26', '(123)-1234-456', 'kit.harrington@email.com', 'kit123.jpg'),
('Richard', 'Madden', '1986-06-18', '(123)-1234-457', 'richard.madden@email.com', 'richard123.jpg'),
('Jennifer', 'Lawrence', '1990-08-15', '(123)-1234-458', 'jennifer.lawrence@email.com', 'jennifer123.jpg'),
('Hugh', 'Jackman', '1968-09-12', '(123)-1234-459', 'hugh.jackman@email.com', 'hugh123.jpg');

DROP TABLE IF EXISTS `account`;
CREATE TABLE `account` (
    `account_id` INT NOT NULL AUTO_INCREMENT ,
    `username` VARCHAR(12) NOT NULL ,
   	`password` VARCHAR(50) NOT NULL ,
    `last_updated` TIMESTAMP NOT NULL 
    DEFAULT current_timestamp() ON UPDATE current_timestamp() ,
    `guest_id` INT NULL ,
    CONSTRAINT accountPK
    PRIMARY KEY (`account_id`) ,
    UNIQUE (`username`),
    CONSTRAINT guestFK
    FOREIGN KEY (`guest_id`)
    REFERENCES `guest` (`guest_id`)
    ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `account`(`username`, `password`, `last_updated`, `guest_id`) VALUES
('simon123', '74dff597c4aac4c6fe0720d4343d3903', '2022-03-22 20:56:43', '1'),
('tim123', '5a64bf4be023a4f443d4a2373d73d679', '2022-03-22 23:08:21', '2'),
('robin123', '8dd1635ff2b8c931952663d4922956e7', '2022-03-24 20:13:04', '3'),
('owen', '43996fb100428b0d99e233c3261f7187', '2022-03-25 09:37:01', '4'),
('amanda123', '0f4004e836509904e0005999a4fadc48', '2022-03-26 11:56:19', '5'),
('ashley123', '510c123df046cfc0a8bdd961edeefff6', '2022-03-26 08:08:55', '6'),
('kit123', 'd160aef7d0ec1fd8049664c1cf67d37e', '2022-03-26 22:57:46', '7'),
('richard123', 'f9e1d2c7f00aae3f2a241982dc770f72', '2022-03-27 09:02:51', '8'),
('jennifer123', 'a3504ce3a21476e10c02b725dfba6381', '2022-03-31 11:13:54', '9'),
('hugh123', 'e1e309fa4c7524bc8c2f0adb7c1b547b', '2022-03-31 17:08:24', '10');

DROP TABLE IF EXISTS `room_type`;
CREATE TABLE `room_type` (
	`room_type_id` INT NOT NULL AUTO_INCREMENT ,
	`name` VARCHAR(20) NOT NULL , 
	`description` TEXT NOT NULL ,
	`total_occupants` INT NOT NULL ,
	`rate_per_night` DOUBLE NOT NULL ,
    `image` VARCHAR(20) NULL , 
	CONSTRAINT room_typePK
 	PRIMARY KEY (`room_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `room_type` (`room_type_id`, `name`, `description`, `total_occupants`, `rate_per_night`, `image`) VALUES
('1','Standard','The standard room will surpass your expectations in every way. While working at your wooden desk or enjoying room service after a long day in the city center, you will adore the warmth and intimacy of this elegantly appointed room, which has an earth tone palette and natural hardwood furnishings.','2','99.99', 'standard.jpg'),
('2','Deluxe', 'The deluxe rooms are large yet pleasant and attractive, with a vintage feel. Elegant oak furnishings, soft upholstery, modern conveniences, and a large, fully-equipped bathroom are just a few of the features that make these rooms so inviting.','4','199.99', 'deluxe.jpg'),
('3','Presidential','The Presidential Room has a living room, dining room, and five bedrooms decorated in the opulent Regency style. Four-poster beds, a dressing area and a luxurious master bathroom are all part of the Master Bedroom appeal. There is a separate entrance for the butler, who is present 24 hours a day, seven days a week, in the kitchen area. One, two, three, or five-bedroom suites may be leased in the Presidential Room.','8','999.99', 'presidential.jpg');

DROP TABLE IF EXISTS `room`;
CREATE TABLE `room` (
    `room_no` VARCHAR(10) NOT NULL ,
    `room_type_id` INT NOT NULL ,
    CONSTRAINT roomPK
    PRIMARY KEY (`room_no`) ,
    CONSTRAINT roomTypeFK
    FOREIGN KEY (`room_type_id`)
    REFERENCES `room_type` (`room_type_id`)
    ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `room` (`room_no`, `room_type_id`) VALUES
('A001','1'),
('A002','1'),
('A003','1'),
('A004','1'),
('A005','1'),
('A006','1'),
('A007','1'),
('A008','1'),
('A009','1'),
('A010','1'),
('B001','1'),
('B002','1'),
('B003','1'),
('B004','1'),
('B005','1'),
('B006','1'),
('B007','1'),
('B008','1'),
('B009','1'),
('B010','1'),
('C001','1'),
('C002','1'),
('C003','1'),
('C004','1'),
('C005','1'),
('C006','1'),
('C007','1'),
('C008','1'),
('C009','1'),
('C010','1'),
('D001','1'),
('D002','1'),
('D003','1'),
('D004','1'),
('D005','1'),
('D006','1'),
('D007','1'),
('D008','1'),
('D009','1'),
('D010','1'),
('E001','2'),
('E002','2'),
('E003','2'),
('E004','2'),
('E005','2'),
('F001','2'),
('F002','2'),
('F003','2'),
('F004','2'),
('F005','2'),
('G001','2'),
('G002','2'),
('G003','2'),
('G004','2'),
('G005','2'),
('H001','2'),
('H002','2'),
('H003','2'),
('H004','2'),
('H005','2'),
('I001','3'),
('I002','3'),
('I003','3'),
('J001','3'),
('J002','3'),
('J003','3'),
('K001','3'),
('K002','3'),
('K003','3'),
('L001','3'),
('L002','3'),
('L003','3');

DROP TABLE IF EXISTS `booking`;
CREATE TABLE `booking` (
    `booking_id` INT NOT NULL AUTO_INCREMENT ,
    `check_in` DATE NOT NULL ,
   	`check_out` DATE NOT NULL ,
    `room_type_id` INT NULL ,
    `quantity` INT NOT NULL ,
    `message` TEXT NOT NULL ,
    `last_updated` TIMESTAMP NOT NULL 
    DEFAULT current_timestamp() ON UPDATE current_timestamp() ,
    `guest_id` INT NULL ,
    CONSTRAINT bookingPK
    PRIMARY KEY (`booking_id`) ,
    CONSTRAINT guestBookingFK
    FOREIGN KEY (`guest_id`)
    REFERENCES `guest` (`guest_id`)
    ON DELETE SET NULL ON UPDATE CASCADE ,
    CONSTRAINT room_typeBookingFK
    FOREIGN KEY (`room_type_id`)
    REFERENCES `room_type` (`room_type_id`)
    ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `booking`(`check_in`, `check_out`, `room_type_id`, `quantity`, `message`, `last_updated`, `guest_id`) VALUES
('2022-03-22', '2022-03-25', '3', '1', 'Hi, may I get a list of the extra amenities provided?', '2022-03-19 04:08:20', '5'),
('2022-03-21', '2022-03-25', '1', '2', 'Whats included in the price? Breakfast? Wi-Fi? Lounge access? Parking?', '2022-03-19 13:21:06', '2'),
('2022-03-21', '2022-03-22', '1', '1', 'Do you have smoking/non-smoking floors in the hotel?', '2022-03-19 15:11:14', '9'),
('2022-03-21', '2022-03-22', '2', '1', 'Does the TV have Netflix in it?', '2022-03-19 19:05:41', '3'),
('2022-03-22', '2022-03-24', '2', '1', 'Do you offer pick-up or drop-off service,  or other transportation/shuttle services?', '2022-03-19 22:34:07', '8'),
('2022-03-25', '2022-03-31', '3', '3', 'Can you tell me where the hotel room will be located? What will the view be?', '2022-03-20 10:37:56', '6'),
('2022-03-22', '2022-03-24', '1', '1', 'Is there a way to get a better rate?', '2022-03-20 12:43:20', '10'),
('2022-03-23', '2022-03-26', '2', '2', 'What are the dining options in the hotel?', '2022-03-20 15:07:30', '1'),
('2022-03-22', '2022-03-26', '2', '2', 'Free breakfast?', '2022-03-20 15:25:22', '4'),
('2022-03-23', '2022-03-28', '1', '1', 'Are there any major events taking place at or near the hotel during my stay?', '2022-03-20 17:33:02', '7');


DROP TABLE IF EXISTS `review`;
CREATE TABLE `review` (
    `review_id` INT NOT NULL AUTO_INCREMENT ,
    `title` VARCHAR(30) NOT NULL ,
    `comment` TEXT NOT NULL ,
    `stars` INT NOT NULL ,
    `last_updated` TIMESTAMP NOT NULL 
    DEFAULT current_timestamp() ON UPDATE current_timestamp() ,
    `booking_id` INT NULL ,
    CONSTRAINT reviewPK
    PRIMARY KEY (`review_id`) ,
    CONSTRAINT bookingReviewFK
    FOREIGN KEY (`booking_id`)
    REFERENCES `booking` (`booking_id`)
    ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `review`(`title`, `comment`,  `stars`,  `last_updated`,  `booking_id`) VALUES
('Clean and comfortable.', 'The rooms were always clean and very comfortable. The staff were also very helpful and polite. There is a bar available on Floor L which plays good music and serves good food. Breakfast was OK.', '4', '2022-03-22 20:56:43', '3'), 
('Loved it.', 'In the sweet spot between affordable and classy. Pleasantly surprised by what the hotel has to offer. Loads of shops nearby within walking distance. Definitely was a good stopover. Recommended!', '5', '2022-03-22 23:08:21', '4'), 
('Wunderbar!', '1st time staying here. Very happy with my stay. Rooms are meticulously kept. The building is HUGE! So many great options inside. Cool architecture. Two thumbs up!', '5', '2022-03-24 20:13:04', '5'), 
('It was alright.', 'Big room and strong water pressure for bath but didnt provide floor towel in the bathroom. Charged for extra amenities.', '4', '2022-03-25 09:37:01', '7'), 
('Trash!', 'I wish I could give this hotel 0 stars. The room that we were staying in had a roof leakage. We had to wait until the next day for their plumber to come fix it.', '1', '2022-03-26 11:56:19', '1'), 
('Quite frightening.', 'We had to call the security for a disturbance as we had someone beat on our door and then run away. We definitely wont be staying here again sadly,  although it was really comfy. Maybe it was just the floor we were put on,  but not the best experience.', '3', '2022-03-26 08:08:55', '2'), 
('Wonderful peeps.', 'I loaded my rolling suitcase and had 2 boxes on top of it trying to get it down the entrance stairs. Fell down badly. A gentleman who works there carried the boxes for me. Besides,  the food in the restaurant was absolutely AMAZING!', '5', '2022-03-26 22:57:46', '8'), 
('Poor management.', 'Great hotel but the restaurant needs better management. They expect me to know how they operate between what food comes from behind the counter and what I have to pick up for myself out of the fridge. Customers cant read minds. You have to explain to them.', '3', '2022-03-27 09:02:51', '9'), 
('Nothing special.', 'I stayed there a few nights ago and I expected more from GBH. The lobby was immaculate but the room not so much. It also sucked that there wasnt any fridge or microwave in the room.', '3', '2022-03-31 11:13:54', '10'), 
('Overcrowded.', 'They had 3 lifts serving 12 floors and everyone had to wait for at least 10 minutes just to get to the lobby. You had vending machines on certain floors that made beeping noises along with loud cans clunking sounds at all times of the night.', '1', '2022-03-31 17:08:24', '6');
