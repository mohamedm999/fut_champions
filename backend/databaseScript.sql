use fut_champions ;

INSERT INTO nationalite (name_nationality, flag) VALUES 
('France', 'france_flag.png'),
('Brazil', 'brazil_flag.png'),
('Germany', 'germany_flag.png'),
('Argentina', 'argentina_flag.png'),
('Spain', 'spain_flag.png');

INSERT INTO club (name_club, logo) VALUES 
('Paris Saint-Germain', 'psg_logo.png'),
('Real Madrid', 'real_madrid_logo.png'),
('Bayern Munich', 'bayern_logo.png'),
('Manchester City', 'man_city_logo.png'),
('Barcelona', 'barcelona_logo.png');

INSERT INTO player (nom_player, positions, rating, statuus, club_id, nationalite_id) VALUES 
('Kylian Mbappé', 'LW', 91, 'principal', 1, 1),
('Neymar Jr', 'RW', 89, 'principal', 1, 2),
('Lionel Messi', 'ST', 93, 'principal', 2, 4),
('Kevin De Bruyne', 'CM', 91, 'principal', 4, 3),
('Virgil van Dijk', 'LCB', 89, 'principal', 5, NULL),
('Thibaut Courtois', 'GK', 90, 'principal', 2, 1);

INSERT INTO goal_keeper (player_id, diving, handling, kicking, positioning, reflexes, speed) VALUES 
(6, 85, 82, 75, 83, 88, 76);

INSERT INTO no_goal_keeper (player_id, pace, shooting, passing, dribbling, defending, physical) VALUES 
(1, 97, 90, 80, 93, 34, 75),
(2, 86, 84, 86, 94, 42, 72),
(3, 80, 94, 92, 96, 45, 70),
(4, 84, 89, 95, 88, 68, 76),
(5, 75, 65, 74, 82, 90, 88);