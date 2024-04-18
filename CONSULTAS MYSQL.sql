CONSULTAS Y BUSQUEDAS MYSQL

CONSULTA:

1. Se imprimirá el nombre y el codigo de cada carnívoro que tenga más de dos  patios de recreación reservados,
 y además estos patios son accedidos por accesos que registran una cantidad de visitas mayor a 1.

SELECT carnivoro.nombre, codAnimal
FROM carnivoro, (SELECT *
                 FROM patio_de_recreo, acceso
                 WHERE (patio_de_recreo.nombre = acceso.nombrePatio) AND cantVisitas > 1) AS nuevosPatios
WHERE carnivoro.codAnimal = nuevosPatios.codCarnivoro
GROUP BY codAnimal
HAVING COUNT(*) > 2;

2. Se imprimirá las veces que se ha usado cada membresía para ingresar a los diferentes patios.

SELECT codMembresia, color, SUM(cantVisitas) unidades
FROM membresia NATURAL JOIN acceso
GROUP BY codMembresia
ORDER BY unidades DESC;

3.  Se imprimirán los animales herbivoros que no hayan reservado un patio en diciembre ni en enero. 

SELECT * 
FROM herbivoro 
WHERE codAnimal NOT IN (SELECT codHerbivoro codAnimal 
                        FROM patio_de_recreo 
                        WHERE MONTH(fechaIngreso) IN (12,1) AND codHerbivoro IS NOT NULL);




					
					
					
					