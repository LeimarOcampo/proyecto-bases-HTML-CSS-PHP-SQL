CREATE TABLE visitante
( cedula NUMBER(4) PRIMARY KEY,
  nombreCompleto VARCHAR(20) NOT NULL
);

CREATE TABLE membresia
( codMembresia NUMBER(5) PRIMARY KEY,
  tipo VARCHAR(15) NOT NULL CHECK (tipo = 'especial' OR tipo = 'simple'),
  color VARCHAR(15),
  fechaCompra DATE,
  cedulaVisitante NUMBER(4) NOT NULL REFERENCES visitante
);

CREATE TABLE  bioterio
( nombre VARCHAR(3) PRIMARY KEY,
  numeroCuidadores NUMBER(3) NOT NULL,
  capacidad NUMBER(3) NOT NULL
);

CREATE TABLE empleado
( cedula NUMBER(4) PRIMARY KEY,
  nombreCompleto VARCHAR(20) NOT NULL,
  tipo VARCHAR(20) NOT NULL CHECK (tipo = 'cuidador' OR tipo = 'veterinario'),
  informante NUMBER(4) REFERENCES empleado
);

CREATE TABLE cuidador
( cedula NUMBER(4) PRIMARY KEY REFERENCES empleado,
  ordenEncargado VARCHAR(15) NOT NULL CHECK (ordenEncargado = 'herbivoro' OR ordenEncargado = 'carnivoro'),
  contrato VARCHAR(10) NOT NULL CHECK (contrato = 'contratado' OR contrato = 'voluntario'),
  salario NUMBER(10) NOT NULL,
  nombreBioterio VARCHAR(3) REFERENCES bioterio
);
  
CREATE TABLE veterinario
( cedula NUMBER(4) PRIMARY KEY REFERENCES empleado,
  especieEncargada VARCHAR(120) NOT NULL UNIQUE,
  añosExperiencia NUMBER(2) NOT NULL,
  salario NUMBER(10) NOT NULL
);

CREATE TABLE habitat
( especie VARCHAR(20) PRIMARY KEY,
  area NUMBER(5) NOT NULL
);

CREATE TABLE especie
( cedula NUMBER(4) PRIMARY KEY REFERENCES veterinario,
  especie VARCHAR(20) NOT NULL REFERENCES habitat
);

CREATE TABLE herbivoro
( codAnimal VARCHAR(6) PRIMARY KEY,
  edad NUMBER(3) NOT NULL,
  altura NUMBER(5) NOT NULL,  
  frutaFavorita VARCHAR(20) NOT NULL
);

CREATE TABLE carnivoro
( codAnimal VARCHAR(6) PRIMARY KEY,
  nombre VARCHAR(20) NOT NULL,
  peso NUMBER(5) NOT NULL,
  comidaFavorita VARCHAR(20) NOT NULL CHECK (comidaFavorita = 'pescado' OR comidaFavorita = 'pollo' OR comidaFavorita = 'res')
);

CREATE TABLE custodia_herbivoro
( cedulaCuidador NUMBER(4) REFERENCES cuidador,
  codAnimal VARCHAR(6) REFERENCES herbivoro,
  PRIMARY KEY (cedulaCuidador, codAnimal)
);
  
CREATE TABLE custodia_carnivoro
( cedulaCuidador NUMBER(4) REFERENCES cuidador,
  codAnimal VARCHAR(6) REFERENCES carnivoro,
  PRIMARY KEY (cedulaCuidador, codAnimal)
);

CREATE TABLE animal
( codAnimal VARCHAR(6) PRIMARY KEY,
  fechaIngreso DATE NOT NULL,
  especie NUMBER(4) NOT NULL REFERENCES especie,
  sexo VARCHAR(15) NOT NULL CHECK (sexo = 'masculino' OR sexo = 'femenino'), 
  codHerbivoro VARCHAR(6) REFERENCES herbivoro(codAnimal),
  codCarnivoro VARCHAR(6) REFERENCES carnivoro(codAnimal),
  especieHabitat VARCHAR(20) NOT NULL REFERENCES habitat,
  CHECK ((codHerbivoro IS NULL AND codCarnivoro IS NOT NULL) OR (codHerbivoro IS NOT NULL AND codCarnivoro IS NULL))
);

CREATE TABLE apareamiento
( fecha DATE,
  cantidadCrias NUMBER(2) NOT NULL,
  codAnimal VARCHAR(6) NOT NULL REFERENCES animal,
  PRIMARY KEY (fecha, codAnimal)
);

CREATE TABLE patio_De_Recreo
( nombre VARCHAR(20) PRIMARY KEY,
  fechaIngreso DATE NOT NULL,
  codHerbivoro VARCHAR(6) REFERENCES herbivoro(codAnimal),
  codCarnivoro VARCHAR(6) REFERENCES carnivoro(codAnimal),
  CHECK ((codHerbivoro IS NULL AND codCarnivoro IS NOT NULL) OR (codHerbivoro IS NOT NULL AND codCarnivoro IS NULL))
);

CREATE TABLE acceso
( fechaUltimoIngreso DATE NOT NULL,
  nombrePatio VARCHAR(20) NOT NULL REFERENCES patio_De_Recreo,
  codMembresia NUMBER(5) NOT NULL REFERENCES membresia,
  cantVisitas NUMBER (4) NOT NULL,
  PRIMARY KEY (nombrePatio, codMembresia)
);
  