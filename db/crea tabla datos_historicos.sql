use appsys;
create table datos_historicos(
id int primary key,
codigo varchar(30),
valor_avaluo double,
latitud double,
longitud double,
id_tipo_inmueble int(10),
banos int(10),
habitaciones int(10),
parqueaderos int(10),
estrato int(10),
area_privada double,
area_construida double,
area_terreno double,
barrio varchar(50),
id_municipio int,
id_departamento int,
fecha_avaluo date);

