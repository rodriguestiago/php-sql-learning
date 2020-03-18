SELECT * FROM school, students;
select prenom from students;
select prenom, datenaissance, school from students;
select prenom from students where genre='F';

select prenom from students ORDER BY prenom DESC;
select prenom from students ORDER BY prenom DESC LIMIT 0 , 2 ; 
INSERT INTO `students` (`nom`,`prenom`,`datenaissance`,`genre`,`school`) VALUES ('Dalor','Ginette','1930-01-01', '', 1); 
UPDATE students 
SET 
    genre = 'F',
    prenom = 'Omer'
WHERE
    idStudent = 31;
DELETE FROM students 
WHERE
    idStudent = 3;
    