--Sélectionnez tous les titres et années
SELECT title, year
FROM movies

-- idem, avec 1000 films, classé par année de la plus récente à plus ancienne
SELECT title, year
FROM movies
ORDER BY year DESC, title ASC
LIMIT 1000

--sélectionnez les titre, année et rating des 100 meilleurs films
SELECT title, year, rating
FROM movies
ORDER BY rating DESC
LIMIT 100

--nombre de films en base ?
SELECT COUNT(*)
FROM movies

--note moyenne des films ?
SELECT AVG(rating)
FROM movies

--note moyenne des films, par année ?
SELECT AVG(rating), year
FROM movies
GROUP BY year 

-- année du plus vieux film ?
SELECT MIN(year) 
FROM movies

-- année et titre du plus vieux film ?
SELECT year, title
FROM movies
ORDER BY year ASC 
LIMIT 1

-- rating et titre du moins bon film
-- avec une sous-requête
SELECT rating, title
FROM movies
WHERE rating = (SELECT MIN(rating) FROM movies)

-- sélectionnez les films dans lesquels jouent brad pitt
SELECT title, cast 
FROM movies
WHERE cast LIKE '%Brad Pitt%'

-- sélectionnez les films commencant par la lettre Z
SELECT title, cast 
FROM movies
WHERE title LIKE 'Z%'

--sélectionnez les comedies uniquement, du XXIe siècle
SELECT title, genres, year
FROM movies
WHERE year >= 2000 
AND genres LIKE '%Comedy%'
ORDER BY year DESC, rating DESC

--sélectionnez les films dans lesquels joue clint eastwood 
--ou dirigés par clint eastwood
SELECT title
FROM movies
WHERE cast LIKE '%clint eastwood%' 
OR directors LIKE '%clint eastwood%'