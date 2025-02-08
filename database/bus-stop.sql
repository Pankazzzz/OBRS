CREATE TABLE IF NOT EXISTS bus_stops (
    id INT AUTO_INCREMENT PRIMARY KEY,
    bus_id INT,
    stop_name VARCHAR(255),
    arrival_time TIME,
    departure_time TIME,
	day VARCHAR(255),
    sequence INT,  
    FOREIGN KEY (bus_id) REFERENCES bus(bus_id)
);

INSERT INTO bus_stops (bus_id, stop_name, arrival_time, departure_time, day, sequence) 
VALUES 
(31, 'Indore', '10:00:00', '10:05:00', 'Day 1', 1),
(31, 'Jhansi', '20:30:00', '20:35:00', 'Day 1', 2),
(31, 'Prayagraj', '11:00:00', '11:05:00', 'Day 2', 3);
