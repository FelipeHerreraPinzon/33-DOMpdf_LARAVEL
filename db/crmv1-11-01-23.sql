-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 12-01-2023 a las 02:57:19
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `crm`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactos`
--

CREATE TABLE `contactos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contacto_nombres` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contacto_apellidos` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contacto_tel` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contacto_direccion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `contacto_email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `contactos`
--

INSERT INTO `contactos` (`id`, `contacto_nombres`, `contacto_apellidos`, `contacto_tel`, `contacto_direccion`, `contacto_email`, `created_at`, `updated_at`) VALUES
(1, 'Sapiente quis perfer', 'Distinctio Omnis ea', 'Eaque nesciunt iure', 'Qui totam sint volu', 'rovopol@mailinator.com', '2023-01-04 05:57:46', '2023-01-04 05:57:46'),
(2, 'Quis rerum irure inc', 'Harum lorem rem vita', 'Magnam sapiente est', 'Recusandae Sunt er', 'jevetom@mailinator.com', '2023-01-04 05:57:54', '2023-01-04 05:57:54'),
(3, 'Ullam cum assumenda', 'Quae dolores reprehe', 'Aut porro ut quia cu', 'Nulla itaque accusam', 'cyduper@mailinator.com', '2023-01-04 05:58:01', '2023-01-04 05:58:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE `departamentos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `departamento_codigo` int(11) NOT NULL,
  `departamento_nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`id`, `departamento_codigo`, `departamento_nombre`, `created_at`, `updated_at`) VALUES
(1, 5, 'ANTIOQUIA', NULL, NULL),
(2, 8, 'ATLÁNTICO', NULL, NULL),
(3, 11, 'BOGOTÁ, D.C.', NULL, NULL),
(4, 13, 'BOLÍVAR', NULL, NULL),
(5, 15, 'BOYACÁ', NULL, NULL),
(6, 17, 'CALDAS', NULL, NULL),
(7, 18, 'CAQUETÁ', NULL, NULL),
(8, 19, 'CAUCA', NULL, NULL),
(9, 20, 'CESAR', NULL, NULL),
(10, 23, 'CÓRDOBA', NULL, NULL),
(11, 25, 'CUNDINAMARCA', NULL, NULL),
(12, 27, 'CHOCÓ', NULL, NULL),
(13, 41, 'HUILA', NULL, NULL),
(14, 44, 'LA GUAJIRA', NULL, NULL),
(15, 47, 'MAGDALENA', NULL, NULL),
(16, 50, 'META', NULL, NULL),
(17, 52, 'NARIÑO', NULL, NULL),
(18, 54, 'NORTE DE SANTANDER', NULL, NULL),
(19, 63, 'QUINDIO', NULL, NULL),
(20, 66, 'RISARALDA', NULL, NULL),
(21, 68, 'SANTANDER', NULL, NULL),
(22, 70, 'SUCRE', NULL, NULL),
(23, 73, 'TOLIMA', NULL, NULL),
(24, 76, 'VALLE DEL CAUCA', NULL, NULL),
(25, 81, 'ARAUCA', NULL, NULL),
(26, 85, 'CASANARE', NULL, NULL),
(27, 86, 'PUTUMAYO', NULL, NULL),
(28, 88, 'SAN ANDRÉS, PROVIDENCIA Y SANTA CATALINA', NULL, '2023-01-05 09:00:39'),
(29, 91, 'AMAZONAS', NULL, NULL),
(30, 94, 'GUAINÍA', NULL, NULL),
(31, 95, 'GUAVIARE', NULL, NULL),
(32, 97, 'VAUPÉS', NULL, NULL),
(33, 99, 'VICHADA', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles`
--

CREATE TABLE `detalles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `variable_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `detalles`
--

INSERT INTO `detalles` (`id`, `variable_id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 1, 'Turismo', NULL, '2023-01-06 10:18:48'),
(2, 1, 'Comercio', NULL, NULL),
(3, 1, 'Vivienda', NULL, NULL),
(4, 1, 'Industrial', NULL, NULL),
(5, 1, 'Institucional', NULL, NULL),
(6, 1, 'Mixto', NULL, NULL),
(7, 2, 'Terminada', NULL, NULL),
(8, 2, 'Sin Terminar', NULL, NULL),
(9, 2, 'Remodelado', NULL, NULL),
(11, 3, 'Cédula', NULL, NULL),
(12, 3, 'Pasaporte', NULL, NULL),
(13, 3, 'NIT', NULL, NULL),
(14, 3, 'RUT', NULL, NULL),
(15, 4, 'Casa', NULL, NULL),
(16, 4, 'Apartamento', NULL, NULL),
(17, 4, 'Finca', NULL, NULL),
(18, 4, 'Bodega', NULL, NULL),
(24, 5, 'Excelente', '2023-01-07 21:16:42', '2023-01-07 21:16:42'),
(27, 5, 'Muy bueno', '2023-01-07 21:38:47', '2023-01-07 21:38:47'),
(28, 5, 'Bueno', '2023-01-07 21:40:10', '2023-01-07 21:40:10'),
(29, 5, 'Regular', '2023-01-07 21:44:38', '2023-01-07 21:44:38'),
(37, 3, 'Licencia', '2023-01-07 22:03:54', '2023-01-07 22:03:54'),
(38, 6, 'Nacional', '2023-01-07 22:04:35', '2023-01-07 22:04:35'),
(39, 6, 'Departamental', '2023-01-07 22:05:09', '2023-01-07 22:05:09'),
(40, 4, 'Garage', '2023-01-07 22:06:15', '2023-01-07 22:06:15'),
(42, 5, 'Malo', '2023-01-07 22:53:31', '2023-01-07 22:53:31'),
(51, 1, 'Recreacional', '2023-01-07 23:50:42', '2023-01-07 23:50:42'),
(52, 6, 'Municipal', '2023-01-07 23:51:00', '2023-01-07 23:51:00'),
(53, 2, 'Avance', '2023-01-07 23:51:32', '2023-01-07 23:51:32'),
(63, 2, 'Usada', '2023-01-08 00:25:46', '2023-01-08 00:25:46'),
(64, 4, 'Parqueadero', '2023-01-08 00:26:08', '2023-01-08 00:26:08'),
(72, 4, 'Galpon', '2023-01-08 01:30:17', '2023-01-08 01:30:17'),
(79, 6, 'Veredal', '2023-01-08 02:14:41', '2023-01-08 07:55:05'),
(82, 6, 'caminos', '2023-01-08 07:54:54', '2023-01-08 07:54:54'),
(83, 7, 'Pavimentada', '2023-01-12 04:17:25', '2023-01-12 04:17:25'),
(84, 7, 'Destapada', '2023-01-12 04:17:41', '2023-01-12 04:17:41'),
(85, 7, 'callejuela', '2023-01-12 04:17:49', '2023-01-12 04:17:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentos`
--

CREATE TABLE `documentos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `radicado_id` bigint(20) UNSIGNED DEFAULT NULL,
  `documento_nombre` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `documento_url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `documentos`
--

INSERT INTO `documentos` (`id`, `radicado_id`, `documento_nombre`, `documento_url`, `created_at`, `updated_at`) VALUES
(18, 5, '71043194-71044089-TTUSIVTQQOJSAKLBRAAW71044089.pdf', 'kkff/yyy', '2023-01-11 22:02:44', '2023-01-11 22:02:44'),
(20, 3, '71043195-71044090-IFQULNYFCDAIJATHKFTV71044090.pdf', 'kkff/yyy', '2023-01-11 22:02:58', '2023-01-11 22:02:58'),
(21, 4, 'avaluo eds mexico.pdf', 'kkff/yyy', '2023-01-11 22:03:21', '2023-01-11 22:03:21'),
(22, 4, 'compras biomax 2017.pdf', 'kkff/yyy', '2023-01-11 22:03:21', '2023-01-11 22:03:21'),
(23, 4, 'ESCRITURA EDS (2).pdf', 'kkff/yyy', '2023-01-11 22:03:21', '2023-01-11 22:03:21'),
(24, 2, 'plano 1.pdf', 'kkff/yyy', '2023-01-11 22:03:40', '2023-01-11 22:03:40'),
(25, 2, 'plano 2.pdf', 'kkff/yyy', '2023-01-11 22:03:40', '2023-01-11 22:03:40'),
(26, 7, 'avaluo eds mexico.pdf', 'kkff/yyy', '2023-01-11 22:03:55', '2023-01-11 22:03:55'),
(27, 7, 'compras biomax 2017.pdf', 'kkff/yyy', '2023-01-11 22:03:55', '2023-01-11 22:03:55'),
(28, 8, 'costos unitarios valores eds.pdf', 'kkff/yyy', '2023-01-11 22:04:21', '2023-01-11 22:04:21'),
(29, 8, 'Valoración_empresa_servicentro_central.pdf', 'kkff/yyy', '2023-01-11 22:04:21', '2023-01-11 22:04:21'),
(30, 5, 'avaluo eds mexico.pdf', 'kkff/yyy', '2023-01-12 04:15:42', '2023-01-12 04:15:42'),
(31, 5, 'CamScanner 01-03-2023 12.04.pdf', 'kkff/yyy', '2023-01-12 04:15:42', '2023-01-12 04:15:42'),
(32, 5, 'CERTIFICACIÓN VIGENCIA CONTRATO EDS EL GUAFAL.pdf', 'kkff/yyy', '2023-01-12 04:15:42', '2023-01-12 04:15:42'),
(33, 5, 'compras biomax 2017.pdf', 'kkff/yyy', '2023-01-12 04:15:42', '2023-01-12 04:15:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(13, '2014_10_12_000000_create_users_table', 1),
(14, '2014_10_12_100000_create_password_resets_table', 1),
(15, '2019_08_19_000000_create_failed_jobs_table', 1),
(16, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(17, '2022_12_30_193053_create_tipodocumentos_table', 1),
(18, '2022_12_30_194245_create_departamentos_table', 1),
(19, '2022_12_30_194437_create_municipios_table', 1),
(20, '2022_12_30_194955_create_tipoinmuebles_table', 1),
(21, '2022_12_30_200245_create_contactos_table', 1),
(22, '2022_12_30_201448_create_personas_table', 1),
(23, '2022_12_30_202740_create_radicados_table', 1),
(24, '2022_12_31_001111_create_documentos_table', 1),
(28, '2023_01_06_014104_create_variables_table', 2),
(29, '2023_01_06_014417_create_detalles_table', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipios`
--

CREATE TABLE `municipios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `municipio_codigo` int(11) NOT NULL,
  `municipio_nombre` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `departamento_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `municipios`
--

INSERT INTO `municipios` (`id`, `municipio_codigo`, `municipio_nombre`, `departamento_id`, `created_at`, `updated_at`) VALUES
(2204, 1, 'Abriaquí', 1, NULL, '2023-01-05 18:16:48'),
(2205, 2, 'Acacías', 16, NULL, NULL),
(2206, 3, 'Acandí', 12, NULL, NULL),
(2207, 4, 'Acevedo', 13, NULL, NULL),
(2208, 5, 'Achí', 4, NULL, NULL),
(2209, 6, 'Agrado', 13, NULL, NULL),
(2210, 7, 'Agua de Dios', 11, NULL, NULL),
(2211, 8, 'Aguachica', 9, NULL, NULL),
(2212, 9, 'Aguada', 21, NULL, NULL),
(2213, 10, 'Aguadas', 6, NULL, NULL),
(2214, 11, 'Aguazul', 26, NULL, NULL),
(2215, 12, 'Agustín Codazzi', 9, NULL, NULL),
(2216, 13, 'Aipe', 13, NULL, NULL),
(2217, 14, 'Albania', 7, NULL, NULL),
(2218, 15, 'Albania', 14, NULL, NULL),
(2219, 16, 'Albania', 21, NULL, NULL),
(2220, 17, 'Albán', 11, NULL, NULL),
(2221, 18, 'Albán (San José)', 17, NULL, NULL),
(2222, 19, 'Alcalá', 16, NULL, NULL),
(2223, 20, 'Alejandria', 1, NULL, NULL),
(2224, 21, 'Algarrobo', 15, NULL, NULL),
(2225, 22, 'Algeciras', 13, NULL, NULL),
(2226, 23, 'Almaguer', 8, NULL, NULL),
(2227, 24, 'Almeida', 5, NULL, NULL),
(2228, 25, 'Alpujarra', 23, NULL, NULL),
(2229, 26, 'Altamira', 13, NULL, NULL),
(2230, 27, 'Alto Baudó (Pie de Pato)', 12, NULL, NULL),
(2231, 28, 'Altos del Rosario', 4, NULL, NULL),
(2232, 29, 'Alvarado', 23, NULL, NULL),
(2233, 30, 'Amagá', 1, NULL, NULL),
(2234, 31, 'Amalfi', 1, NULL, NULL),
(2235, 32, 'Ambalema', 23, NULL, NULL),
(2236, 33, 'Anapoima', 11, NULL, NULL),
(2237, 34, 'Ancuya', 17, NULL, NULL),
(2238, 35, 'Andalucía', 24, NULL, NULL),
(2239, 36, 'Andes', 1, NULL, NULL),
(2240, 37, 'Angelópolis', 1, NULL, NULL),
(2241, 38, 'Angostura', 1, NULL, NULL),
(2242, 39, 'Anolaima', 11, NULL, NULL),
(2243, 40, 'Anorí', 1, NULL, NULL),
(2244, 41, 'Anserma', 6, NULL, NULL),
(2245, 42, 'Ansermanuevo', 24, NULL, NULL),
(2246, 43, 'Anzoátegui', 23, NULL, NULL),
(2247, 44, 'Anzá', 1, NULL, NULL),
(2248, 45, 'Apartadó', 1, NULL, NULL),
(2249, 46, 'Apulo', 11, NULL, NULL),
(2250, 47, 'Apía', 20, NULL, NULL),
(2251, 48, 'Aquitania', 5, NULL, NULL),
(2252, 49, 'Aracataca', 15, NULL, NULL),
(2253, 50, 'Aranzazu', 6, NULL, NULL),
(2254, 51, 'Aratoca', 21, NULL, NULL),
(2255, 52, 'Arauca', 25, NULL, NULL),
(2256, 53, 'Arauquita', 25, NULL, NULL),
(2257, 54, 'Arbeláez', 11, NULL, NULL),
(2258, 55, 'Arboleda (Berruecos)', 17, NULL, NULL),
(2259, 56, 'Arboledas', 18, NULL, NULL),
(2260, 57, 'Arboletes', 1, NULL, NULL),
(2261, 58, 'Arcabuco', 5, NULL, NULL),
(2262, 59, 'Arenal', 4, NULL, NULL),
(2263, 60, 'Argelia', 1, NULL, NULL),
(2264, 61, 'Argelia', 8, NULL, NULL),
(2265, 62, 'Argelia', 24, NULL, NULL),
(2266, 63, 'Ariguaní (El Difícil)', 15, NULL, NULL),
(2267, 64, 'Arjona', 4, NULL, NULL),
(2268, 65, 'Armenia', 1, NULL, NULL),
(2269, 66, 'Armenia', 19, NULL, NULL),
(2270, 67, 'Armero (Guayabal)', 23, NULL, NULL),
(2271, 68, 'Arroyohondo', 4, NULL, NULL),
(2272, 69, 'Astrea', 10, NULL, NULL),
(2273, 70, 'Ataco', 23, NULL, NULL),
(2274, 71, 'Atrato (Yuto)', 12, NULL, NULL),
(2275, 72, 'Ayapel', 10, NULL, NULL),
(2276, 73, 'Bagadó', 12, NULL, NULL),
(2277, 74, 'Bahía Solano (Mútis)', 12, NULL, NULL),
(2278, 75, 'Bajo Baudó (Pizarro)', 12, NULL, NULL),
(2279, 76, 'Balboa', 8, NULL, NULL),
(2280, 77, 'Balboa', 20, NULL, NULL),
(2281, 78, 'Baranoa', 2, NULL, NULL),
(2282, 79, 'Baraya', 13, NULL, NULL),
(2283, 80, 'Barbacoas', 17, NULL, NULL),
(2284, 81, 'Barbosa', 1, NULL, NULL),
(2285, 82, 'Barbosa', 21, NULL, NULL),
(2286, 83, 'Barichara', 21, NULL, NULL),
(2287, 84, 'Barranca de Upía', 16, NULL, NULL),
(2288, 85, 'Barrancabermeja', 21, NULL, NULL),
(2289, 86, 'Barrancas', 14, NULL, NULL),
(2290, 87, 'Barranco de Loba', 4, NULL, NULL),
(2291, 88, 'Barranquilla', 2, NULL, NULL),
(2292, 89, 'Becerríl', 9, NULL, NULL),
(2293, 90, 'Belalcázar', 6, NULL, NULL),
(2294, 91, 'Bello', 1, NULL, NULL),
(2295, 92, 'Belmira', 1, NULL, NULL),
(2296, 93, 'Beltrán', 11, NULL, NULL),
(2297, 94, 'Belén', 5, NULL, NULL),
(2298, 95, 'Belén', 17, NULL, NULL),
(2299, 96, 'Belén de Bajirá', 12, NULL, NULL),
(2300, 97, 'Belén de Umbría', 20, NULL, NULL),
(2301, 98, 'Belén de los Andaquíes', 7, NULL, NULL),
(2302, 99, 'Berbeo', 5, NULL, NULL),
(2303, 100, 'Betania', 1, NULL, NULL),
(2304, 101, 'Beteitiva', 5, NULL, NULL),
(2305, 102, 'Betulia', 1, NULL, NULL),
(2306, 103, 'Betulia', 21, NULL, NULL),
(2307, 104, 'Bituima', 11, NULL, NULL),
(2308, 105, 'Boavita', 5, NULL, NULL),
(2309, 106, 'Bochalema', 18, NULL, NULL),
(2310, 107, 'Bogotá D.C.', 3, NULL, NULL),
(2311, 108, 'Bojacá', 11, NULL, NULL),
(2312, 109, 'Bojayá (Bellavista)', 12, NULL, NULL),
(2313, 110, 'Bolívar', 1, NULL, NULL),
(2314, 111, 'Bolívar', 8, NULL, NULL),
(2315, 112, 'Bolívar', 21, NULL, NULL),
(2316, 113, 'Bolívar', 24, NULL, NULL),
(2317, 114, 'Bosconia', 9, NULL, NULL),
(2318, 115, 'Boyacá', 5, NULL, NULL),
(2319, 116, 'Briceño', 1, NULL, NULL),
(2320, 117, 'Briceño', 5, NULL, NULL),
(2321, 118, 'Bucaramanga', 21, NULL, NULL),
(2322, 119, 'Bucarasica', 18, NULL, NULL),
(2323, 120, 'Buenaventura', 24, NULL, NULL),
(2324, 121, 'Buenavista', 5, NULL, NULL),
(2325, 122, 'Buenavista', 10, NULL, NULL),
(2326, 123, 'Buenavista', 19, NULL, NULL),
(2327, 124, 'Buenavista', 22, NULL, NULL),
(2328, 125, 'Buenos Aires', 8, NULL, NULL),
(2329, 126, 'Buesaco', 17, NULL, NULL),
(2330, 127, 'Buga', 24, NULL, NULL),
(2331, 128, 'Bugalagrande', 24, NULL, NULL),
(2332, 129, 'Burítica', 1, NULL, NULL),
(2333, 130, 'Busbanza', 5, NULL, NULL),
(2334, 131, 'Cabrera', 11, NULL, NULL),
(2335, 132, 'Cabrera', 21, NULL, NULL),
(2336, 133, 'Cabuyaro', 16, NULL, NULL),
(2337, 134, 'Cachipay', 11, NULL, NULL),
(2338, 135, 'Caicedo', 1, NULL, NULL),
(2339, 137, 'Caimito', 22, NULL, NULL),
(2340, 138, 'Cajamarca', 23, NULL, NULL),
(2341, 139, 'Cajibío', 8, NULL, NULL),
(2342, 140, 'Cajicá', 11, NULL, NULL),
(2343, 141, 'Calamar', 4, NULL, NULL),
(2344, 142, 'Calamar', 31, NULL, NULL),
(2345, 143, 'Calarcá', 19, NULL, NULL),
(2346, 144, 'Caldas', 1, NULL, NULL),
(2347, 145, 'Caldas', 5, NULL, NULL),
(2348, 146, 'Caldono', 8, NULL, NULL),
(2349, 147, 'California', 21, NULL, NULL),
(2350, 148, 'Calima (Darién)', 24, NULL, NULL),
(2351, 149, 'Caloto', 8, NULL, NULL),
(2352, 150, 'Calí', 24, NULL, NULL),
(2353, 151, 'Campamento', 1, NULL, NULL),
(2354, 152, 'Campo de la Cruz', 2, NULL, NULL),
(2355, 153, 'Campoalegre', 13, NULL, NULL),
(2356, 154, 'Campohermoso', 5, NULL, NULL),
(2357, 155, 'Canalete', 10, NULL, NULL),
(2358, 156, 'Candelaria', 2, NULL, NULL),
(2359, 157, 'Candelaria', 24, NULL, NULL),
(2360, 158, 'Cantagallo', 4, NULL, NULL),
(2361, 159, 'Cantón de San Pablo', 12, NULL, NULL),
(2362, 160, 'Caparrapí', 11, NULL, NULL),
(2363, 161, 'Capitanejo', 21, NULL, NULL),
(2364, 162, 'Caracolí', 1, NULL, NULL),
(2365, 163, 'Caramanta', 1, NULL, NULL),
(2366, 164, 'Carcasí', 21, NULL, NULL),
(2367, 165, 'Carepa', 1, NULL, NULL),
(2368, 166, 'Carmen de Apicalá', 23, NULL, NULL),
(2369, 167, 'Carmen de Carupa', 11, NULL, NULL),
(2370, 168, 'Carmen de Viboral', 1, NULL, NULL),
(2371, 169, 'Carmen del Darién (CURBARADÓ)', 12, NULL, NULL),
(2372, 170, 'Carolina', 1, NULL, NULL),
(2373, 171, 'Cartagena', 4, NULL, NULL),
(2374, 172, 'Cartagena del Chairá', 7, NULL, NULL),
(2375, 173, 'Cartago', 24, NULL, NULL),
(2376, 174, 'Carurú', 32, NULL, NULL),
(2377, 175, 'Casabianca', 23, NULL, NULL),
(2378, 176, 'Castilla la Nueva', 16, NULL, NULL),
(2379, 177, 'Caucasia', 1, NULL, NULL),
(2380, 178, 'Cañasgordas', 1, NULL, NULL),
(2381, 179, 'Cepita', 21, NULL, NULL),
(2382, 180, 'Cereté', 10, NULL, NULL),
(2383, 181, 'Cerinza', 5, NULL, NULL),
(2384, 182, 'Cerrito', 21, NULL, NULL),
(2385, 183, 'Cerro San Antonio', 15, NULL, NULL),
(2386, 184, 'Chachaguí', 17, NULL, NULL),
(2387, 185, 'Chaguaní', 11, NULL, NULL),
(2388, 186, 'Chalán', 22, NULL, NULL),
(2389, 187, 'Chaparral', 23, NULL, NULL),
(2390, 188, 'Charalá', 21, NULL, NULL),
(2391, 189, 'Charta', 21, NULL, NULL),
(2392, 190, 'Chigorodó', 1, NULL, NULL),
(2393, 191, 'Chima', 21, NULL, NULL),
(2394, 192, 'Chimichagua', 9, NULL, NULL),
(2395, 193, 'Chimá', 10, NULL, NULL),
(2396, 194, 'Chinavita', 5, NULL, NULL),
(2397, 195, 'Chinchiná', 6, NULL, NULL),
(2398, 196, 'Chinácota', 18, NULL, NULL),
(2399, 197, 'Chinú', 10, NULL, NULL),
(2400, 198, 'Chipaque', 11, NULL, NULL),
(2401, 199, 'Chipatá', 21, NULL, NULL),
(2402, 200, 'Chiquinquirá', 5, NULL, NULL),
(2403, 201, 'Chiriguaná', 9, NULL, NULL),
(2404, 202, 'Chiscas', 5, NULL, NULL),
(2405, 203, 'Chita', 5, NULL, NULL),
(2406, 204, 'Chitagá', 18, NULL, NULL),
(2407, 205, 'Chitaraque', 5, NULL, NULL),
(2408, 206, 'Chivatá', 5, NULL, NULL),
(2409, 207, 'Chivolo', 15, NULL, NULL),
(2410, 208, 'Choachí', 11, NULL, NULL),
(2411, 209, 'Chocontá', 11, NULL, NULL),
(2412, 210, 'Chámeza', 26, NULL, NULL),
(2413, 211, 'Chía', 11, NULL, NULL),
(2414, 212, 'Chíquiza', 5, NULL, NULL),
(2415, 213, 'Chívor', 5, NULL, NULL),
(2416, 214, 'Cicuco', 4, NULL, NULL),
(2417, 215, 'Cimitarra', 21, NULL, NULL),
(2418, 216, 'Circasia', 19, NULL, NULL),
(2419, 217, 'Cisneros', 1, NULL, NULL),
(2420, 218, 'Ciénaga', 5, NULL, NULL),
(2421, 219, 'Ciénaga', 15, NULL, NULL),
(2422, 220, 'Ciénaga de Oro', 10, NULL, NULL),
(2423, 221, 'Clemencia', 4, NULL, NULL),
(2424, 222, 'Cocorná', 1, NULL, NULL),
(2425, 223, 'Coello', 23, NULL, NULL),
(2426, 224, 'Cogua', 11, NULL, NULL),
(2427, 225, 'Colombia', 13, NULL, NULL),
(2428, 226, 'Colosó (Ricaurte)', 22, NULL, NULL),
(2429, 227, 'Colón', 27, NULL, NULL),
(2430, 228, 'Colón (Génova)', 17, NULL, NULL),
(2431, 229, 'Concepción', 1, NULL, NULL),
(2432, 230, 'Concepción', 21, NULL, NULL),
(2433, 231, 'Concordia', 1, NULL, NULL),
(2434, 232, 'Concordia', 15, NULL, NULL),
(2435, 233, 'Condoto', 12, NULL, NULL),
(2436, 234, 'Confines', 21, NULL, NULL),
(2437, 235, 'Consaca', 17, NULL, NULL),
(2438, 236, 'Contadero', 17, NULL, NULL),
(2439, 237, 'Contratación', 21, NULL, NULL),
(2440, 238, 'Convención', 18, NULL, NULL),
(2441, 239, 'Copacabana', 1, NULL, NULL),
(2442, 240, 'Coper', 5, NULL, NULL),
(2443, 241, 'Cordobá', 19, NULL, NULL),
(2444, 242, 'Corinto', 8, NULL, NULL),
(2445, 243, 'Coromoro', 21, NULL, NULL),
(2446, 244, 'Corozal', 22, NULL, NULL),
(2447, 245, 'Corrales', 5, NULL, NULL),
(2448, 246, 'Cota', 11, NULL, NULL),
(2449, 247, 'Cotorra', 10, NULL, NULL),
(2450, 248, 'Covarachía', 5, NULL, NULL),
(2451, 249, 'Coveñas', 22, NULL, NULL),
(2452, 250, 'Coyaima', 23, NULL, NULL),
(2453, 251, 'Cravo Norte', 25, NULL, NULL),
(2454, 252, 'Cuaspud (Carlosama)', 17, NULL, NULL),
(2455, 253, 'Cubarral', 16, NULL, NULL),
(2456, 254, 'Cubará', 5, NULL, NULL),
(2457, 255, 'Cucaita', 5, NULL, NULL),
(2458, 256, 'Cucunubá', 11, NULL, NULL),
(2459, 257, 'Cucutilla', 18, NULL, NULL),
(2460, 258, 'Cuitiva', 5, NULL, NULL),
(2461, 259, 'Cumaral', 16, NULL, NULL),
(2462, 260, 'Cumaribo', 33, NULL, NULL),
(2463, 261, 'Cumbal', 17, NULL, NULL),
(2464, 262, 'Cumbitara', 17, NULL, NULL),
(2465, 263, 'Cunday', 23, NULL, NULL),
(2466, 264, 'Curillo', 7, NULL, NULL),
(2467, 265, 'Curití', 21, NULL, NULL),
(2468, 266, 'Curumaní', 9, NULL, NULL),
(2469, 267, 'Cáceres', 1, NULL, NULL),
(2470, 268, 'Cáchira', 18, NULL, NULL),
(2471, 269, 'Cácota', 18, NULL, NULL),
(2472, 270, 'Cáqueza', 11, NULL, NULL),
(2473, 271, 'Cértegui', 12, NULL, NULL),
(2474, 272, 'Cómbita', 5, NULL, NULL),
(2475, 273, 'Córdoba', 4, NULL, NULL),
(2476, 274, 'Córdoba', 17, NULL, NULL),
(2477, 275, 'Cúcuta', 18, NULL, NULL),
(2478, 276, 'Dabeiba', 1, NULL, NULL),
(2479, 277, 'Dagua', 24, NULL, NULL),
(2480, 278, 'Dibulla', 14, NULL, NULL),
(2481, 279, 'Distracción', 14, NULL, NULL),
(2482, 280, 'Dolores', 23, NULL, NULL),
(2483, 281, 'Don Matías', 1, NULL, NULL),
(2484, 282, 'Dos Quebradas', 20, NULL, NULL),
(2485, 283, 'Duitama', 5, NULL, NULL),
(2486, 284, 'Durania', 18, NULL, NULL),
(2487, 285, 'Ebéjico', 1, NULL, NULL),
(2488, 286, 'El Bagre', 1, NULL, NULL),
(2489, 287, 'El Banco', 15, NULL, NULL),
(2490, 288, 'El Cairo', 24, NULL, NULL),
(2491, 289, 'El Calvario', 16, NULL, NULL),
(2492, 290, 'El Carmen', 18, NULL, NULL),
(2493, 291, 'El Carmen', 21, NULL, NULL),
(2494, 292, 'El Carmen de Atrato', 12, NULL, NULL),
(2495, 293, 'El Carmen de Bolívar', 4, NULL, NULL),
(2496, 294, 'El Castillo', 16, NULL, NULL),
(2497, 295, 'El Cerrito', 24, NULL, NULL),
(2498, 296, 'El Charco', 17, NULL, NULL),
(2499, 297, 'El Cocuy', 5, NULL, NULL),
(2500, 298, 'El Colegio', 11, NULL, NULL),
(2501, 299, 'El Copey', 9, NULL, NULL),
(2502, 300, 'El Doncello', 7, NULL, NULL),
(2503, 301, 'El Dorado', 16, NULL, NULL),
(2504, 302, 'El Dovio', 24, NULL, NULL),
(2505, 303, 'El Espino', 5, NULL, NULL),
(2506, 304, 'El Guacamayo', 21, NULL, NULL),
(2507, 305, 'El Guamo', 4, NULL, NULL),
(2508, 306, 'El Molino', 14, NULL, NULL),
(2509, 307, 'El Paso', 9, NULL, NULL),
(2510, 308, 'El Paujil', 7, NULL, NULL),
(2511, 309, 'El Peñol', 17, NULL, NULL),
(2512, 310, 'El Peñon', 4, NULL, NULL),
(2513, 311, 'El Peñon', 21, NULL, NULL),
(2514, 312, 'El Peñón', 11, NULL, NULL),
(2515, 313, 'El Piñon', 15, NULL, NULL),
(2516, 314, 'El Playón', 21, NULL, NULL),
(2517, 315, 'El Retorno', 31, NULL, NULL),
(2518, 316, 'El Retén', 15, NULL, NULL),
(2519, 317, 'El Roble', 22, NULL, NULL),
(2520, 318, 'El Rosal', 11, NULL, NULL),
(2521, 319, 'El Rosario', 17, NULL, NULL),
(2522, 320, 'El Tablón de Gómez', 17, NULL, NULL),
(2523, 321, 'El Tambo', 8, NULL, NULL),
(2524, 322, 'El Tambo', 17, NULL, NULL),
(2525, 323, 'El Tarra', 18, NULL, NULL),
(2526, 324, 'El Zulia', 18, NULL, NULL),
(2527, 325, 'El Águila', 24, NULL, NULL),
(2528, 326, 'Elías', 13, NULL, NULL),
(2529, 327, 'Encino', 21, NULL, NULL),
(2530, 328, 'Enciso', 21, NULL, NULL),
(2531, 329, 'Entrerríos', 1, NULL, NULL),
(2532, 330, 'Envigado', 1, NULL, NULL),
(2533, 331, 'Espinal', 23, NULL, NULL),
(2534, 332, 'Facatativá', 11, NULL, NULL),
(2535, 333, 'Falan', 23, NULL, NULL),
(2536, 334, 'Filadelfia', 6, NULL, NULL),
(2537, 335, 'Filandia', 19, NULL, NULL),
(2538, 336, 'Firavitoba', 5, NULL, NULL),
(2539, 337, 'Flandes', 23, NULL, NULL),
(2540, 338, 'Florencia', 7, NULL, NULL),
(2541, 339, 'Florencia', 8, NULL, NULL),
(2542, 340, 'Floresta', 5, NULL, NULL),
(2543, 341, 'Florida', 24, NULL, NULL),
(2544, 342, 'Floridablanca', 21, NULL, NULL),
(2545, 343, 'Florián', 21, NULL, NULL),
(2546, 344, 'Fonseca', 14, NULL, NULL),
(2547, 345, 'Fortúl', 25, NULL, NULL),
(2548, 346, 'Fosca', 11, NULL, NULL),
(2549, 347, 'Francisco Pizarro', 17, NULL, NULL),
(2550, 348, 'Fredonia', 1, NULL, NULL),
(2551, 349, 'Fresno', 23, NULL, NULL),
(2552, 350, 'Frontino', 1, NULL, NULL),
(2553, 351, 'Fuente de Oro', 16, NULL, NULL),
(2554, 352, 'Fundación', 15, NULL, NULL),
(2555, 353, 'Funes', 17, NULL, NULL),
(2556, 354, 'Funza', 11, NULL, NULL),
(2557, 355, 'Fusagasugá', 11, NULL, NULL),
(2558, 356, 'Fómeque', 11, NULL, NULL),
(2559, 357, 'Fúquene', 11, NULL, NULL),
(2560, 358, 'Gachalá', 11, NULL, NULL),
(2561, 359, 'Gachancipá', 11, NULL, NULL),
(2562, 360, 'Gachantivá', 5, NULL, NULL),
(2563, 361, 'Gachetá', 11, NULL, NULL),
(2564, 362, 'Galapa', 2, NULL, NULL),
(2565, 363, 'Galeras (Nueva Granada)', 22, NULL, NULL),
(2566, 364, 'Galán', 21, NULL, NULL),
(2567, 365, 'Gama', 11, NULL, NULL),
(2568, 366, 'Gamarra', 9, NULL, NULL),
(2569, 367, 'Garagoa', 5, NULL, NULL),
(2570, 368, 'Garzón', 13, NULL, NULL),
(2571, 369, 'Gigante', 13, NULL, NULL),
(2572, 370, 'Ginebra', 24, NULL, NULL),
(2573, 371, 'Giraldo', 1, NULL, NULL),
(2574, 372, 'Girardot', 11, NULL, NULL),
(2575, 373, 'Girardota', 1, NULL, NULL),
(2576, 374, 'Girón', 21, NULL, NULL),
(2577, 375, 'Gonzalez', 9, NULL, NULL),
(2578, 376, 'Gramalote', 18, NULL, NULL),
(2579, 377, 'Granada', 1, NULL, NULL),
(2580, 378, 'Granada', 11, NULL, NULL),
(2581, 379, 'Granada', 16, NULL, NULL),
(2582, 380, 'Guaca', 21, NULL, NULL),
(2583, 381, 'Guacamayas', 5, NULL, NULL),
(2584, 382, 'Guacarí', 24, NULL, NULL),
(2585, 383, 'Guachavés', 17, NULL, NULL),
(2586, 384, 'Guachené', 8, NULL, NULL),
(2587, 385, 'Guachetá', 11, NULL, NULL),
(2588, 386, 'Guachucal', 17, NULL, NULL),
(2589, 387, 'Guadalupe', 1, NULL, NULL),
(2590, 388, 'Guadalupe', 13, NULL, NULL),
(2591, 389, 'Guadalupe', 21, NULL, NULL),
(2592, 390, 'Guaduas', 11, NULL, NULL),
(2593, 391, 'Guaitarilla', 17, NULL, NULL),
(2594, 392, 'Gualmatán', 17, NULL, NULL),
(2595, 393, 'Guamal', 15, NULL, NULL),
(2596, 394, 'Guamal', 16, NULL, NULL),
(2597, 395, 'Guamo', 23, NULL, NULL),
(2598, 396, 'Guapota', 21, NULL, NULL),
(2599, 397, 'Guapí', 8, NULL, NULL),
(2600, 398, 'Guaranda', 22, NULL, NULL),
(2601, 399, 'Guarne', 1, NULL, NULL),
(2602, 400, 'Guasca', 11, NULL, NULL),
(2603, 401, 'Guatapé', 1, NULL, NULL),
(2604, 402, 'Guataquí', 11, NULL, NULL),
(2605, 403, 'Guatavita', 11, NULL, NULL),
(2606, 404, 'Guateque', 5, NULL, NULL),
(2607, 405, 'Guavatá', 21, NULL, NULL),
(2608, 406, 'Guayabal de Siquima', 11, NULL, NULL),
(2609, 407, 'Guayabetal', 11, NULL, NULL),
(2610, 408, 'Guayatá', 5, NULL, NULL),
(2611, 409, 'Guepsa', 21, NULL, NULL),
(2612, 410, 'Guicán', 5, NULL, NULL),
(2613, 411, 'Gutiérrez', 11, NULL, NULL),
(2614, 412, 'Guática', 20, NULL, NULL),
(2615, 413, 'Gámbita', 21, NULL, NULL),
(2616, 414, 'Gámeza', 5, NULL, NULL),
(2617, 415, 'Génova', 19, NULL, NULL),
(2618, 416, 'Gómez Plata', 1, NULL, NULL),
(2619, 417, 'Hacarí', 18, NULL, NULL),
(2620, 418, 'Hatillo de Loba', 4, NULL, NULL),
(2621, 419, 'Hato', 21, NULL, NULL),
(2622, 420, 'Hato Corozal', 26, NULL, NULL),
(2623, 421, 'Hatonuevo', 14, NULL, NULL),
(2624, 422, 'Heliconia', 1, NULL, NULL),
(2625, 423, 'Herrán', 18, NULL, NULL),
(2626, 424, 'Herveo', 23, NULL, NULL),
(2627, 425, 'Hispania', 1, NULL, NULL),
(2628, 426, 'Hobo', 13, NULL, NULL),
(2629, 427, 'Honda', 23, NULL, NULL),
(2630, 428, 'Ibagué', 23, NULL, NULL),
(2631, 429, 'Icononzo', 23, NULL, NULL),
(2632, 430, 'Iles', 17, NULL, NULL),
(2633, 431, 'Imúes', 17, NULL, NULL),
(2634, 432, 'Inzá', 8, NULL, NULL),
(2635, 433, 'Inírida', 30, NULL, NULL),
(2636, 434, 'Ipiales', 17, NULL, NULL),
(2637, 435, 'Isnos', 13, NULL, NULL),
(2638, 436, 'Istmina', 12, NULL, NULL),
(2639, 437, 'Itagüí', 1, NULL, NULL),
(2640, 438, 'Ituango', 1, NULL, NULL),
(2641, 439, 'Izá', 5, NULL, NULL),
(2642, 440, 'Jambaló', 8, NULL, NULL),
(2643, 441, 'Jamundí', 24, NULL, NULL),
(2644, 442, 'Jardín', 1, NULL, NULL),
(2645, 443, 'Jenesano', 5, NULL, NULL),
(2646, 444, 'Jericó', 1, NULL, NULL),
(2647, 445, 'Jericó', 5, NULL, NULL),
(2648, 446, 'Jerusalén', 11, NULL, NULL),
(2649, 447, 'Jesús María', 21, NULL, NULL),
(2650, 448, 'Jordán', 21, NULL, NULL),
(2651, 449, 'Juan de Acosta', 2, NULL, NULL),
(2652, 450, 'Junín', 11, NULL, NULL),
(2653, 451, 'Juradó', 12, NULL, NULL),
(2654, 452, 'La Apartada y La Frontera', 10, NULL, NULL),
(2655, 453, 'La Argentina', 13, NULL, NULL),
(2656, 454, 'La Belleza', 21, NULL, NULL),
(2657, 455, 'La Calera', 11, NULL, NULL),
(2658, 456, 'La Capilla', 5, NULL, NULL),
(2659, 457, 'La Ceja', 1, NULL, NULL),
(2660, 458, 'La Celia', 20, NULL, NULL),
(2661, 459, 'La Cruz', 17, NULL, NULL),
(2662, 460, 'La Cumbre', 24, NULL, NULL),
(2663, 461, 'La Dorada', 6, NULL, NULL),
(2664, 462, 'La Esperanza', 18, NULL, NULL),
(2665, 463, 'La Estrella', 1, NULL, NULL),
(2666, 464, 'La Florida', 17, NULL, NULL),
(2667, 465, 'La Gloria', 9, NULL, NULL),
(2668, 466, 'La Jagua de Ibirico', 9, NULL, NULL),
(2669, 467, 'La Jagua del Pilar', 14, NULL, NULL),
(2670, 468, 'La Llanada', 17, NULL, NULL),
(2671, 469, 'La Macarena', 16, NULL, NULL),
(2672, 470, 'La Merced', 6, NULL, NULL),
(2673, 471, 'La Mesa', 11, NULL, NULL),
(2674, 472, 'La Montañita', 7, NULL, NULL),
(2675, 473, 'La Palma', 11, NULL, NULL),
(2676, 474, 'La Paz', 21, NULL, NULL),
(2677, 475, 'La Paz (Robles)', 9, NULL, NULL),
(2678, 476, 'La Peña', 11, NULL, NULL),
(2679, 477, 'La Pintada', 1, NULL, NULL),
(2680, 478, 'La Plata', 13, NULL, NULL),
(2681, 479, 'La Playa', 18, NULL, NULL),
(2682, 480, 'La Primavera', 33, NULL, NULL),
(2683, 481, 'La Salina', 26, NULL, NULL),
(2684, 482, 'La Sierra', 8, NULL, NULL),
(2685, 483, 'La Tebaida', 19, NULL, NULL),
(2686, 484, 'La Tola', 17, NULL, NULL),
(2687, 485, 'La Unión', 1, NULL, NULL),
(2688, 486, 'La Unión', 17, NULL, NULL),
(2689, 487, 'La Unión', 22, NULL, NULL),
(2690, 488, 'La Unión', 24, NULL, NULL),
(2691, 489, 'La Uvita', 5, NULL, NULL),
(2692, 490, 'La Vega', 8, NULL, NULL),
(2693, 491, 'La Vega', 11, NULL, NULL),
(2694, 492, 'La Victoria', 5, NULL, NULL),
(2695, 493, 'La Victoria', 6, NULL, NULL),
(2696, 494, 'La Victoria', 24, NULL, NULL),
(2697, 495, 'La Virginia', 20, NULL, NULL),
(2698, 496, 'Labateca', 18, NULL, NULL),
(2699, 497, 'Labranzagrande', 5, NULL, NULL),
(2700, 498, 'Landázuri', 21, NULL, NULL),
(2701, 499, 'Lebrija', 21, NULL, NULL),
(2702, 500, 'Leiva', 17, NULL, NULL),
(2703, 501, 'Lejanías', 16, NULL, NULL),
(2704, 502, 'Lenguazaque', 11, NULL, NULL),
(2705, 503, 'Leticia', 29, NULL, NULL),
(2706, 504, 'Liborina', 1, NULL, NULL),
(2707, 505, 'Linares', 17, NULL, NULL),
(2708, 506, 'Lloró', 12, NULL, NULL),
(2709, 507, 'Lorica', 10, NULL, NULL),
(2710, 508, 'Los Córdobas', 10, NULL, NULL),
(2711, 509, 'Los Palmitos', 22, NULL, NULL),
(2712, 510, 'Los Patios', 18, NULL, NULL),
(2713, 511, 'Los Santos', 21, NULL, NULL),
(2714, 512, 'Lourdes', 18, NULL, NULL),
(2715, 513, 'Luruaco', 2, NULL, NULL),
(2716, 514, 'Lérida', 23, NULL, NULL),
(2717, 515, 'Líbano', 23, NULL, NULL),
(2718, 516, 'López (Micay)', 8, NULL, NULL),
(2719, 517, 'Macanal', 5, NULL, NULL),
(2720, 518, 'Macaravita', 21, NULL, NULL),
(2721, 519, 'Maceo', 1, NULL, NULL),
(2722, 520, 'Machetá', 11, NULL, NULL),
(2723, 521, 'Madrid', 11, NULL, NULL),
(2724, 522, 'Magangué', 4, NULL, NULL),
(2725, 523, 'Magüi (Payán)', 17, NULL, NULL),
(2726, 524, 'Mahates', 4, NULL, NULL),
(2727, 525, 'Maicao', 14, NULL, NULL),
(2728, 526, 'Majagual', 22, NULL, NULL),
(2729, 527, 'Malambo', 2, NULL, NULL),
(2730, 528, 'Mallama (Piedrancha)', 17, NULL, NULL),
(2731, 529, 'Manatí', 2, NULL, NULL),
(2732, 530, 'Manaure', 14, NULL, NULL),
(2733, 531, 'Manaure Balcón del Cesar', 9, NULL, NULL),
(2734, 532, 'Manizales', 6, NULL, NULL),
(2735, 533, 'Manta', 11, NULL, NULL),
(2736, 534, 'Manzanares', 6, NULL, NULL),
(2737, 535, 'Maní', 26, NULL, NULL),
(2738, 536, 'Mapiripan', 16, NULL, NULL),
(2739, 537, 'Margarita', 4, NULL, NULL),
(2740, 538, 'Marinilla', 1, NULL, NULL),
(2741, 539, 'Maripí', 5, NULL, NULL),
(2742, 540, 'Mariquita', 23, NULL, NULL),
(2743, 541, 'Marmato', 6, NULL, NULL),
(2744, 542, 'Marquetalia', 6, NULL, NULL),
(2745, 543, 'Marsella', 20, NULL, NULL),
(2746, 544, 'Marulanda', 6, NULL, NULL),
(2747, 545, 'María la Baja', 4, NULL, NULL),
(2748, 546, 'Matanza', 21, NULL, NULL),
(2749, 547, 'Medellín', 1, NULL, NULL),
(2750, 548, 'Medina', 11, NULL, NULL),
(2751, 549, 'Medio Atrato', 12, NULL, NULL),
(2752, 550, 'Medio Baudó', 12, NULL, NULL),
(2753, 551, 'Medio San Juan (ANDAGOYA)', 12, NULL, NULL),
(2754, 552, 'Melgar', 23, NULL, NULL),
(2755, 553, 'Mercaderes', 8, NULL, NULL),
(2756, 554, 'Mesetas', 16, NULL, NULL),
(2757, 555, 'Milán', 7, NULL, NULL),
(2758, 556, 'Miraflores', 5, NULL, NULL),
(2759, 557, 'Miraflores', 31, NULL, NULL),
(2760, 558, 'Miranda', 8, NULL, NULL),
(2761, 559, 'Mistrató', 20, NULL, NULL),
(2762, 560, 'Mitú', 32, NULL, NULL),
(2763, 561, 'Mocoa', 27, NULL, NULL),
(2764, 562, 'Mogotes', 21, NULL, NULL),
(2765, 563, 'Molagavita', 21, NULL, NULL),
(2766, 564, 'Momil', 10, NULL, NULL),
(2767, 565, 'Mompós', 4, NULL, NULL),
(2768, 566, 'Mongua', 5, NULL, NULL),
(2769, 567, 'Monguí', 5, NULL, NULL),
(2770, 568, 'Moniquirá', 5, NULL, NULL),
(2771, 569, 'Montebello', 1, NULL, NULL),
(2772, 570, 'Montecristo', 4, NULL, NULL),
(2773, 571, 'Montelíbano', 10, NULL, NULL),
(2774, 572, 'Montenegro', 19, NULL, NULL),
(2775, 573, 'Monteria', 10, NULL, NULL),
(2776, 574, 'Monterrey', 26, NULL, NULL),
(2777, 575, 'Morales', 4, NULL, NULL),
(2778, 576, 'Morales', 8, NULL, NULL),
(2779, 577, 'Morelia', 7, NULL, NULL),
(2780, 578, 'Morroa', 22, NULL, NULL),
(2781, 579, 'Mosquera', 11, NULL, NULL),
(2782, 580, 'Mosquera', 17, NULL, NULL),
(2783, 581, 'Motavita', 5, NULL, NULL),
(2784, 582, 'Moñitos', 10, NULL, NULL),
(2785, 583, 'Murillo', 23, NULL, NULL),
(2786, 584, 'Murindó', 1, NULL, NULL),
(2787, 585, 'Mutatá', 1, NULL, NULL),
(2788, 586, 'Mutiscua', 18, NULL, NULL),
(2789, 587, 'Muzo', 5, NULL, NULL),
(2790, 588, 'Málaga', 21, NULL, NULL),
(2791, 589, 'Nariño', 1, NULL, NULL),
(2792, 590, 'Nariño', 11, NULL, NULL),
(2793, 591, 'Nariño', 17, NULL, NULL),
(2794, 592, 'Natagaima', 23, NULL, NULL),
(2795, 593, 'Nechí', 1, NULL, NULL),
(2796, 594, 'Necoclí', 1, NULL, NULL),
(2797, 595, 'Neira', 6, NULL, NULL),
(2798, 596, 'Neiva', 13, NULL, NULL),
(2799, 597, 'Nemocón', 11, NULL, NULL),
(2800, 598, 'Nilo', 11, NULL, NULL),
(2801, 599, 'Nimaima', 11, NULL, NULL),
(2802, 600, 'Nobsa', 5, NULL, NULL),
(2803, 601, 'Nocaima', 11, NULL, NULL),
(2804, 602, 'Norcasia', 6, NULL, NULL),
(2805, 603, 'Norosí', 4, NULL, NULL),
(2806, 604, 'Novita', 12, NULL, NULL),
(2807, 605, 'Nueva Granada', 15, NULL, NULL),
(2808, 606, 'Nuevo Colón', 5, NULL, NULL),
(2809, 607, 'Nunchía', 26, NULL, NULL),
(2810, 608, 'Nuquí', 12, NULL, NULL),
(2811, 609, 'Nátaga', 13, NULL, NULL),
(2812, 610, 'Obando', 24, NULL, NULL),
(2813, 611, 'Ocamonte', 21, NULL, NULL),
(2814, 612, 'Ocaña', 18, NULL, NULL),
(2815, 613, 'Oiba', 21, NULL, NULL),
(2816, 614, 'Oicatá', 5, NULL, NULL),
(2817, 615, 'Olaya', 1, NULL, NULL),
(2818, 616, 'Olaya Herrera', 17, NULL, NULL),
(2819, 617, 'Onzaga', 21, NULL, NULL),
(2820, 618, 'Oporapa', 13, NULL, NULL),
(2821, 619, 'Orito', 27, NULL, NULL),
(2822, 620, 'Orocué', 26, NULL, NULL),
(2823, 621, 'Ortega', 23, NULL, NULL),
(2824, 622, 'Ospina', 17, NULL, NULL),
(2825, 623, 'Otanche', 5, NULL, NULL),
(2826, 624, 'Ovejas', 22, NULL, NULL),
(2827, 625, 'Pachavita', 5, NULL, NULL),
(2828, 626, 'Pacho', 11, NULL, NULL),
(2829, 627, 'Padilla', 8, NULL, NULL),
(2830, 628, 'Paicol', 13, NULL, NULL),
(2831, 629, 'Pailitas', 9, NULL, NULL),
(2832, 630, 'Paime', 11, NULL, NULL),
(2833, 631, 'Paipa', 5, NULL, NULL),
(2834, 632, 'Pajarito', 5, NULL, NULL),
(2835, 633, 'Palermo', 13, NULL, NULL),
(2836, 634, 'Palestina', 6, NULL, NULL),
(2837, 635, 'Palestina', 13, NULL, NULL),
(2838, 636, 'Palmar', 21, NULL, NULL),
(2839, 637, 'Palmar de Varela', 2, NULL, NULL),
(2840, 638, 'Palmas del Socorro', 21, NULL, NULL),
(2841, 639, 'Palmira', 24, NULL, NULL),
(2842, 640, 'Palmito', 22, NULL, NULL),
(2843, 641, 'Palocabildo', 23, NULL, NULL),
(2844, 642, 'Pamplona', 18, NULL, NULL),
(2845, 643, 'Pamplonita', 18, NULL, NULL),
(2846, 644, 'Pandi', 11, NULL, NULL),
(2847, 645, 'Panqueba', 5, NULL, NULL),
(2848, 646, 'Paratebueno', 11, NULL, NULL),
(2849, 647, 'Pasca', 11, NULL, NULL),
(2850, 648, 'Patía (El Bordo)', 8, NULL, NULL),
(2851, 649, 'Pauna', 5, NULL, NULL),
(2852, 650, 'Paya', 5, NULL, NULL),
(2853, 651, 'Paz de Ariporo', 26, NULL, NULL),
(2854, 652, 'Paz de Río', 5, NULL, NULL),
(2855, 653, 'Pedraza', 15, NULL, NULL),
(2856, 654, 'Pelaya', 9, NULL, NULL),
(2857, 655, 'Pensilvania', 6, NULL, NULL),
(2858, 656, 'Peque', 1, NULL, NULL),
(2859, 657, 'Pereira', 20, NULL, NULL),
(2860, 658, 'Pesca', 5, NULL, NULL),
(2861, 659, 'Peñol', 1, NULL, NULL),
(2862, 660, 'Piamonte', 8, NULL, NULL),
(2863, 661, 'Pie de Cuesta', 21, NULL, NULL),
(2864, 662, 'Piedras', 23, NULL, NULL),
(2865, 663, 'Piendamó', 8, NULL, NULL),
(2866, 664, 'Pijao', 19, NULL, NULL),
(2867, 665, 'Pijiño', 15, NULL, NULL),
(2868, 666, 'Pinchote', 21, NULL, NULL),
(2869, 667, 'Pinillos', 4, NULL, NULL),
(2870, 668, 'Piojo', 2, NULL, NULL),
(2871, 669, 'Pisva', 5, NULL, NULL),
(2872, 670, 'Pital', 13, NULL, NULL),
(2873, 671, 'Pitalito', 13, NULL, NULL),
(2874, 672, 'Pivijay', 15, NULL, NULL),
(2875, 673, 'Planadas', 23, NULL, NULL),
(2876, 674, 'Planeta Rica', 10, NULL, NULL),
(2877, 675, 'Plato', 15, NULL, NULL),
(2878, 676, 'Policarpa', 17, NULL, NULL),
(2879, 677, 'Polonuevo', 2, NULL, NULL),
(2880, 678, 'Ponedera', 2, NULL, NULL),
(2881, 679, 'Popayán', 8, NULL, NULL),
(2882, 680, 'Pore', 26, NULL, NULL),
(2883, 681, 'Potosí', 17, NULL, NULL),
(2884, 682, 'Pradera', 24, NULL, NULL),
(2885, 683, 'Prado', 23, NULL, NULL),
(2886, 684, 'Providencia', 17, NULL, NULL),
(2887, 685, 'Providencia', 28, NULL, NULL),
(2888, 686, 'Pueblo Bello', 9, NULL, NULL),
(2889, 687, 'Pueblo Nuevo', 10, NULL, NULL),
(2890, 688, 'Pueblo Rico', 20, NULL, NULL),
(2891, 689, 'Pueblorrico', 1, NULL, NULL),
(2892, 690, 'Puebloviejo', 15, NULL, NULL),
(2893, 691, 'Puente Nacional', 21, NULL, NULL),
(2894, 692, 'Puerres', 17, NULL, NULL),
(2895, 693, 'Puerto Asís', 27, NULL, NULL),
(2896, 694, 'Puerto Berrío', 1, NULL, NULL),
(2897, 695, 'Puerto Boyacá', 5, NULL, NULL),
(2898, 696, 'Puerto Caicedo', 27, NULL, NULL),
(2899, 697, 'Puerto Carreño', 33, NULL, NULL),
(2900, 698, 'Puerto Colombia', 2, NULL, NULL),
(2901, 699, 'Puerto Concordia', 16, NULL, NULL),
(2902, 700, 'Puerto Escondido', 10, NULL, NULL),
(2903, 701, 'Puerto Gaitán', 16, NULL, NULL),
(2904, 702, 'Puerto Guzmán', 27, NULL, NULL),
(2905, 703, 'Puerto Leguízamo', 27, NULL, NULL),
(2906, 704, 'Puerto Libertador', 10, NULL, NULL),
(2907, 705, 'Puerto Lleras', 16, NULL, NULL),
(2908, 706, 'Puerto López', 16, NULL, NULL),
(2909, 707, 'Puerto Nare', 1, NULL, NULL),
(2910, 708, 'Puerto Nariño', 29, NULL, NULL),
(2911, 709, 'Puerto Parra', 21, NULL, NULL),
(2912, 710, 'Puerto Rico', 7, NULL, NULL),
(2913, 711, 'Puerto Rico', 16, NULL, NULL),
(2914, 712, 'Puerto Rondón', 25, NULL, NULL),
(2915, 713, 'Puerto Salgar', 11, NULL, NULL),
(2916, 714, 'Puerto Santander', 18, NULL, NULL),
(2917, 715, 'Puerto Tejada', 8, NULL, NULL),
(2918, 716, 'Puerto Triunfo', 1, NULL, NULL),
(2919, 717, 'Puerto Wilches', 21, NULL, NULL),
(2920, 718, 'Pulí', 11, NULL, NULL),
(2921, 719, 'Pupiales', 17, NULL, NULL),
(2922, 720, 'Puracé (Coconuco)', 8, NULL, NULL),
(2923, 721, 'Purificación', 23, NULL, NULL),
(2924, 722, 'Purísima', 10, NULL, NULL),
(2925, 723, 'Pácora', 6, NULL, NULL),
(2926, 724, 'Páez', 5, NULL, NULL),
(2927, 725, 'Páez (Belalcazar)', 8, NULL, NULL),
(2928, 726, 'Páramo', 21, NULL, NULL),
(2929, 727, 'Quebradanegra', 11, NULL, NULL),
(2930, 728, 'Quetame', 11, NULL, NULL),
(2931, 729, 'Quibdó', 12, NULL, NULL),
(2932, 730, 'Quimbaya', 19, NULL, NULL),
(2933, 731, 'Quinchía', 20, NULL, NULL),
(2934, 732, 'Quipama', 5, NULL, NULL),
(2935, 733, 'Quipile', 11, NULL, NULL),
(2936, 734, 'Ragonvalia', 18, NULL, NULL),
(2937, 735, 'Ramiriquí', 5, NULL, NULL),
(2938, 736, 'Recetor', 26, NULL, NULL),
(2939, 737, 'Regidor', 4, NULL, NULL),
(2940, 738, 'Remedios', 1, NULL, NULL),
(2941, 739, 'Remolino', 15, NULL, NULL),
(2942, 740, 'Repelón', 2, NULL, NULL),
(2943, 741, 'Restrepo', 16, NULL, NULL),
(2944, 742, 'Restrepo', 24, NULL, NULL),
(2945, 743, 'Retiro', 1, NULL, NULL),
(2946, 744, 'Ricaurte', 11, NULL, NULL),
(2947, 745, 'Ricaurte', 17, NULL, NULL),
(2948, 746, 'Rio Negro', 21, NULL, NULL),
(2949, 747, 'Rioblanco', 23, NULL, NULL),
(2950, 748, 'Riofrío', 24, NULL, NULL),
(2951, 749, 'Riohacha', 14, NULL, NULL),
(2952, 750, 'Risaralda', 6, NULL, NULL),
(2953, 751, 'Rivera', 13, NULL, NULL),
(2954, 752, 'Roberto Payán (San José)', 17, NULL, NULL),
(2955, 753, 'Roldanillo', 24, NULL, NULL),
(2956, 754, 'Roncesvalles', 23, NULL, NULL),
(2957, 755, 'Rondón', 5, NULL, NULL),
(2958, 756, 'Rosas', 8, NULL, NULL),
(2959, 757, 'Rovira', 23, NULL, NULL),
(2960, 758, 'Ráquira', 5, NULL, NULL),
(2961, 759, 'Río Iró', 12, NULL, NULL),
(2962, 760, 'Río Quito', 12, NULL, NULL),
(2963, 761, 'Río Sucio', 6, NULL, NULL),
(2964, 762, 'Río Viejo', 4, NULL, NULL),
(2965, 763, 'Río de oro', 9, NULL, NULL),
(2966, 764, 'Ríonegro', 1, NULL, NULL),
(2967, 765, 'Ríosucio', 12, NULL, NULL),
(2968, 766, 'Sabana de Torres', 21, NULL, NULL),
(2969, 767, 'Sabanagrande', 2, NULL, NULL),
(2970, 768, 'Sabanalarga', 1, NULL, NULL),
(2971, 769, 'Sabanalarga', 2, NULL, NULL),
(2972, 770, 'Sabanalarga', 26, NULL, NULL),
(2973, 771, 'Sabanas de San Angel (SAN ANGE', 15, NULL, NULL),
(2974, 772, 'Sabaneta', 1, NULL, NULL),
(2975, 773, 'Saboyá', 5, NULL, NULL),
(2976, 774, 'Sahagún', 10, NULL, NULL),
(2977, 775, 'Saladoblanco', 13, NULL, NULL),
(2978, 776, 'Salamina', 6, NULL, NULL),
(2979, 777, 'Salamina', 15, NULL, NULL),
(2980, 778, 'Salazar', 18, NULL, NULL),
(2981, 779, 'Saldaña', 23, NULL, NULL),
(2982, 780, 'Salento', 19, NULL, NULL),
(2983, 781, 'Salgar', 1, NULL, NULL),
(2984, 782, 'Samacá', 5, NULL, NULL),
(2985, 783, 'Samaniego', 17, NULL, NULL),
(2986, 784, 'Samaná', 6, NULL, NULL),
(2987, 785, 'Sampués', 22, NULL, NULL),
(2988, 786, 'San Agustín', 13, NULL, NULL),
(2989, 787, 'San Alberto', 9, NULL, NULL),
(2990, 788, 'San Andrés', 21, NULL, NULL),
(2991, 789, 'San Andrés Sotavento', 10, NULL, NULL),
(2992, 790, 'San Andrés de Cuerquía', 1, NULL, NULL),
(2993, 791, 'San Antero', 10, NULL, NULL),
(2994, 792, 'San Antonio', 23, NULL, NULL),
(2995, 793, 'San Antonio de Tequendama', 11, NULL, NULL),
(2996, 794, 'San Benito', 21, NULL, NULL),
(2997, 795, 'San Benito Abad', 22, NULL, NULL),
(2998, 796, 'San Bernardo', 11, NULL, NULL),
(2999, 797, 'San Bernardo', 17, NULL, NULL),
(3000, 798, 'San Bernardo del Viento', 10, NULL, NULL),
(3001, 799, 'San Calixto', 18, NULL, NULL),
(3002, 800, 'San Carlos', 1, NULL, NULL),
(3003, 801, 'San Carlos', 10, NULL, NULL),
(3004, 802, 'San Carlos de Guaroa', 16, NULL, NULL),
(3005, 803, 'San Cayetano', 11, NULL, NULL),
(3006, 804, 'San Cayetano', 18, NULL, NULL),
(3007, 805, 'San Cristobal', 4, NULL, NULL),
(3008, 806, 'San Diego', 9, NULL, NULL),
(3009, 807, 'San Eduardo', 5, NULL, NULL),
(3010, 808, 'San Estanislao', 4, NULL, NULL),
(3011, 809, 'San Fernando', 4, NULL, NULL),
(3012, 810, 'San Francisco', 1, NULL, NULL),
(3013, 811, 'San Francisco', 11, NULL, NULL),
(3014, 812, 'San Francisco', 27, NULL, NULL),
(3015, 813, 'San Gíl', 21, NULL, NULL),
(3016, 814, 'San Jacinto', 4, NULL, NULL),
(3017, 815, 'San Jacinto del Cauca', 4, NULL, NULL),
(3018, 816, 'San Jerónimo', 1, NULL, NULL),
(3019, 817, 'San Joaquín', 21, NULL, NULL),
(3020, 818, 'San José', 6, NULL, NULL),
(3021, 819, 'San José de Miranda', 21, NULL, NULL),
(3022, 820, 'San José de Montaña', 1, NULL, NULL),
(3023, 821, 'San José de Pare', 5, NULL, NULL),
(3024, 822, 'San José de Uré', 10, NULL, NULL),
(3025, 823, 'San José del Fragua', 7, NULL, NULL),
(3026, 824, 'San José del Guaviare', 31, NULL, NULL),
(3027, 825, 'San José del Palmar', 12, NULL, NULL),
(3028, 826, 'San Juan de Arama', 16, NULL, NULL),
(3029, 827, 'San Juan de Betulia', 22, NULL, NULL),
(3030, 828, 'San Juan de Nepomuceno', 4, NULL, NULL),
(3031, 829, 'San Juan de Pasto', 17, NULL, NULL),
(3032, 830, 'San Juan de Río Seco', 11, NULL, NULL),
(3033, 831, 'San Juan de Urabá', 1, NULL, NULL),
(3034, 832, 'San Juan del Cesar', 14, NULL, NULL),
(3035, 833, 'San Juanito', 16, NULL, NULL),
(3036, 834, 'San Lorenzo', 17, NULL, NULL),
(3037, 835, 'San Luis', 23, NULL, NULL),
(3038, 836, 'San Luís', 1, NULL, NULL),
(3039, 837, 'San Luís de Gaceno', 5, NULL, NULL),
(3040, 838, 'San Luís de Palenque', 26, NULL, NULL),
(3041, 839, 'San Marcos', 22, NULL, NULL),
(3042, 840, 'San Martín', 9, NULL, NULL),
(3043, 841, 'San Martín', 16, NULL, NULL),
(3044, 842, 'San Martín de Loba', 4, NULL, NULL),
(3045, 843, 'San Mateo', 5, NULL, NULL),
(3046, 844, 'San Miguel', 21, NULL, NULL),
(3047, 845, 'San Miguel', 27, NULL, NULL),
(3048, 846, 'San Miguel de Sema', 5, NULL, NULL),
(3049, 847, 'San Onofre', 22, NULL, NULL),
(3050, 848, 'San Pablo', 4, NULL, NULL),
(3051, 849, 'San Pablo', 17, NULL, NULL),
(3052, 850, 'San Pablo de Borbur', 5, NULL, NULL),
(3053, 851, 'San Pedro', 1, NULL, NULL),
(3054, 852, 'San Pedro', 22, NULL, NULL),
(3055, 853, 'San Pedro', 24, NULL, NULL),
(3056, 854, 'San Pedro de Cartago', 17, NULL, NULL),
(3057, 855, 'San Pedro de Urabá', 1, NULL, NULL),
(3058, 856, 'San Pelayo', 10, NULL, NULL),
(3059, 857, 'San Rafael', 1, NULL, NULL),
(3060, 858, 'San Roque', 1, NULL, NULL),
(3061, 859, 'San Sebastián', 8, NULL, NULL),
(3062, 860, 'San Sebastián de Buenavista', 15, NULL, NULL),
(3063, 861, 'San Vicente', 1, NULL, NULL),
(3064, 862, 'San Vicente del Caguán', 7, NULL, NULL),
(3065, 863, 'San Vicente del Chucurí', 21, NULL, NULL),
(3066, 864, 'San Zenón', 15, NULL, NULL),
(3067, 865, 'Sandoná', 17, NULL, NULL),
(3068, 866, 'Santa Ana', 15, NULL, NULL),
(3069, 867, 'Santa Bárbara', 1, NULL, NULL),
(3070, 868, 'Santa Bárbara', 21, NULL, NULL),
(3071, 869, 'Santa Bárbara (Iscuandé)', 17, NULL, NULL),
(3072, 870, 'Santa Bárbara de Pinto', 15, NULL, NULL),
(3073, 871, 'Santa Catalina', 4, NULL, NULL),
(3074, 872, 'Santa Fé de Antioquia', 1, NULL, NULL),
(3075, 873, 'Santa Genoveva de Docorodó', 12, NULL, NULL),
(3076, 874, 'Santa Helena del Opón', 21, NULL, NULL),
(3077, 875, 'Santa Isabel', 23, NULL, NULL),
(3078, 876, 'Santa Lucía', 2, NULL, NULL),
(3079, 877, 'Santa Marta', 15, NULL, NULL),
(3080, 878, 'Santa María', 5, NULL, NULL),
(3081, 879, 'Santa María', 13, NULL, NULL),
(3082, 880, 'Santa Rosa', 4, NULL, NULL),
(3083, 881, 'Santa Rosa', 8, NULL, NULL),
(3084, 882, 'Santa Rosa de Cabal', 20, NULL, NULL),
(3085, 883, 'Santa Rosa de Osos', 1, NULL, NULL),
(3086, 884, 'Santa Rosa de Viterbo', 5, NULL, NULL),
(3087, 885, 'Santa Rosa del Sur', 4, NULL, NULL),
(3088, 886, 'Santa Rosalía', 33, NULL, NULL),
(3089, 887, 'Santa Sofía', 5, NULL, NULL),
(3090, 888, 'Santana', 5, NULL, NULL),
(3091, 889, 'Santander de Quilichao', 8, NULL, NULL),
(3092, 890, 'Santiago', 18, NULL, NULL),
(3093, 891, 'Santiago', 27, NULL, NULL),
(3094, 892, 'Santo Domingo', 1, NULL, NULL),
(3095, 893, 'Santo Tomás', 2, NULL, NULL),
(3096, 894, 'Santuario', 1, NULL, NULL),
(3097, 895, 'Santuario', 20, NULL, NULL),
(3098, 896, 'Sapuyes', 17, NULL, NULL),
(3099, 897, 'Saravena', 25, NULL, NULL),
(3100, 898, 'Sardinata', 18, NULL, NULL),
(3101, 899, 'Sasaima', 11, NULL, NULL),
(3102, 900, 'Sativanorte', 5, NULL, NULL),
(3103, 901, 'Sativasur', 5, NULL, NULL),
(3104, 902, 'Segovia', 1, NULL, NULL),
(3105, 903, 'Sesquilé', 11, NULL, NULL),
(3106, 904, 'Sevilla', 24, NULL, NULL),
(3107, 905, 'Siachoque', 5, NULL, NULL),
(3108, 906, 'Sibaté', 11, NULL, NULL),
(3109, 907, 'Sibundoy', 27, NULL, NULL),
(3110, 908, 'Silos', 18, NULL, NULL),
(3111, 909, 'Silvania', 11, NULL, NULL),
(3112, 910, 'Silvia', 8, NULL, NULL),
(3113, 911, 'Simacota', 21, NULL, NULL),
(3114, 912, 'Simijaca', 11, NULL, NULL),
(3115, 913, 'Simití', 4, NULL, NULL),
(3116, 914, 'Sincelejo', 22, NULL, NULL),
(3117, 915, 'Sincé', 22, NULL, NULL),
(3118, 916, 'Sipí', 12, NULL, NULL),
(3119, 917, 'Sitionuevo', 15, NULL, NULL),
(3120, 918, 'Soacha', 11, NULL, NULL),
(3121, 919, 'Soatá', 5, NULL, NULL),
(3122, 920, 'Socha', 5, NULL, NULL),
(3123, 921, 'Socorro', 21, NULL, NULL),
(3124, 922, 'Socotá', 5, NULL, NULL),
(3125, 923, 'Sogamoso', 5, NULL, NULL),
(3126, 924, 'Solano', 7, NULL, NULL),
(3127, 925, 'Soledad', 2, NULL, NULL),
(3128, 926, 'Solita', 7, NULL, NULL),
(3129, 927, 'Somondoco', 5, NULL, NULL),
(3130, 928, 'Sonsón', 1, NULL, NULL),
(3131, 929, 'Sopetrán', 1, NULL, NULL),
(3132, 930, 'Soplaviento', 4, NULL, NULL),
(3133, 931, 'Sopó', 11, NULL, NULL),
(3134, 932, 'Sora', 5, NULL, NULL),
(3135, 933, 'Soracá', 5, NULL, NULL),
(3136, 934, 'Sotaquirá', 5, NULL, NULL),
(3137, 935, 'Sotara (Paispamba)', 8, NULL, NULL),
(3138, 936, 'Sotomayor (Los Andes)', 17, NULL, NULL),
(3139, 937, 'Suaita', 21, NULL, NULL),
(3140, 938, 'Suan', 2, NULL, NULL),
(3141, 939, 'Suaza', 13, NULL, NULL),
(3142, 940, 'Subachoque', 11, NULL, NULL),
(3143, 941, 'Sucre', 8, NULL, NULL),
(3144, 942, 'Sucre', 21, NULL, NULL),
(3145, 943, 'Sucre', 22, NULL, NULL),
(3146, 944, 'Suesca', 11, NULL, NULL),
(3147, 945, 'Supatá', 11, NULL, NULL),
(3148, 946, 'Supía', 6, NULL, NULL),
(3149, 947, 'Suratá', 21, NULL, NULL),
(3150, 948, 'Susa', 11, NULL, NULL),
(3151, 949, 'Susacón', 5, NULL, NULL),
(3152, 950, 'Sutamarchán', 5, NULL, NULL),
(3153, 951, 'Sutatausa', 11, NULL, NULL),
(3154, 952, 'Sutatenza', 5, NULL, NULL),
(3155, 953, 'Suárez', 8, NULL, NULL),
(3156, 954, 'Suárez', 23, NULL, NULL),
(3157, 955, 'Sácama', 26, NULL, NULL),
(3158, 956, 'Sáchica', 5, NULL, NULL),
(3159, 957, 'Tabio', 11, NULL, NULL),
(3160, 958, 'Tadó', 12, NULL, NULL),
(3161, 959, 'Talaigua Nuevo', 4, NULL, NULL),
(3162, 960, 'Tamalameque', 9, NULL, NULL),
(3163, 961, 'Tame', 25, NULL, NULL),
(3164, 962, 'Taminango', 17, NULL, NULL),
(3165, 963, 'Tangua', 17, NULL, NULL),
(3166, 964, 'Taraira', 32, NULL, NULL),
(3167, 965, 'Tarazá', 1, NULL, NULL),
(3168, 966, 'Tarqui', 13, NULL, NULL),
(3169, 967, 'Tarso', 1, NULL, NULL),
(3170, 968, 'Tasco', 5, NULL, NULL),
(3171, 969, 'Tauramena', 26, NULL, NULL),
(3172, 970, 'Tausa', 11, NULL, NULL),
(3173, 971, 'Tello', 13, NULL, NULL),
(3174, 972, 'Tena', 11, NULL, NULL),
(3175, 973, 'Tenerife', 15, NULL, NULL),
(3176, 974, 'Tenjo', 11, NULL, NULL),
(3177, 975, 'Tenza', 5, NULL, NULL),
(3178, 976, 'Teorama', 18, NULL, NULL),
(3179, 977, 'Teruel', 13, NULL, NULL),
(3180, 978, 'Tesalia', 13, NULL, NULL),
(3181, 979, 'Tibacuy', 11, NULL, NULL),
(3182, 980, 'Tibaná', 5, NULL, NULL),
(3183, 981, 'Tibasosa', 5, NULL, NULL),
(3184, 982, 'Tibirita', 11, NULL, NULL),
(3185, 983, 'Tibú', 18, NULL, NULL),
(3186, 984, 'Tierralta', 10, NULL, NULL),
(3187, 985, 'Timaná', 13, NULL, NULL),
(3188, 986, 'Timbiquí', 8, NULL, NULL),
(3189, 987, 'Timbío', 8, NULL, NULL),
(3190, 988, 'Tinjacá', 5, NULL, NULL),
(3191, 989, 'Tipacoque', 5, NULL, NULL),
(3192, 990, 'Tiquisio (Puerto Rico)', 4, NULL, NULL),
(3193, 991, 'Titiribí', 1, NULL, NULL),
(3194, 992, 'Toca', 5, NULL, NULL),
(3195, 993, 'Tocaima', 11, NULL, NULL),
(3196, 994, 'Tocancipá', 11, NULL, NULL),
(3197, 995, 'Toguí', 5, NULL, NULL),
(3198, 996, 'Toledo', 1, NULL, NULL),
(3199, 997, 'Toledo', 18, NULL, NULL),
(3200, 998, 'Tolú', 22, NULL, NULL),
(3201, 999, 'Tolú Viejo', 22, NULL, NULL),
(3202, 1000, 'Tona', 21, NULL, NULL),
(3203, 1001, 'Topagá', 5, NULL, NULL),
(3204, 1002, 'Topaipí', 11, NULL, NULL),
(3205, 1003, 'Toribío', 8, NULL, NULL),
(3206, 1004, 'Toro', 24, NULL, NULL),
(3207, 1005, 'Tota', 5, NULL, NULL),
(3208, 1006, 'Totoró', 8, NULL, NULL),
(3209, 1007, 'Trinidad', 26, NULL, NULL),
(3210, 1008, 'Trujillo', 24, NULL, NULL),
(3211, 1009, 'Tubará', 2, NULL, NULL),
(3212, 1010, 'Tuchín', 10, NULL, NULL),
(3213, 1011, 'Tulúa', 24, NULL, NULL),
(3214, 1012, 'Tumaco', 17, NULL, NULL),
(3215, 1013, 'Tunja', 5, NULL, NULL),
(3216, 1014, 'Tunungua', 5, NULL, NULL),
(3217, 1015, 'Turbaco', 4, NULL, NULL),
(3218, 1016, 'Turbaná', 4, NULL, NULL),
(3219, 1017, 'Turbo', 1, NULL, NULL),
(3220, 1018, 'Turmequé', 5, NULL, NULL),
(3221, 1019, 'Tuta', 5, NULL, NULL),
(3222, 1020, 'Tutasá', 5, NULL, NULL),
(3223, 1021, 'Támara', 26, NULL, NULL),
(3224, 1022, 'Támesis', 1, NULL, NULL),
(3225, 1023, 'Túquerres', 17, NULL, NULL),
(3226, 1024, 'Ubalá', 11, NULL, NULL),
(3227, 1025, 'Ubaque', 11, NULL, NULL),
(3228, 1026, 'Ubaté', 11, NULL, NULL),
(3229, 1027, 'Ulloa', 24, NULL, NULL),
(3230, 1028, 'Une', 11, NULL, NULL),
(3231, 1029, 'Unguía', 12, NULL, NULL),
(3232, 1030, 'Unión Panamericana (ÁNIMAS)', 12, NULL, NULL),
(3233, 1031, 'Uramita', 1, NULL, NULL),
(3234, 1032, 'Uribe', 16, NULL, NULL),
(3235, 1033, 'Uribia', 14, NULL, NULL),
(3236, 1034, 'Urrao', 1, NULL, NULL),
(3237, 1035, 'Urumita', 14, NULL, NULL),
(3238, 1036, 'Usiacuri', 2, NULL, NULL),
(3239, 1037, 'Valdivia', 1, NULL, NULL),
(3240, 1038, 'Valencia', 10, NULL, NULL),
(3241, 1039, 'Valle de San José', 21, NULL, NULL),
(3242, 1040, 'Valle de San Juan', 23, NULL, NULL),
(3243, 1041, 'Valle del Guamuez', 27, NULL, NULL),
(3244, 1042, 'Valledupar', 9, NULL, NULL),
(3245, 1043, 'Valparaiso', 1, NULL, NULL),
(3246, 1044, 'Valparaiso', 7, NULL, NULL),
(3247, 1045, 'Vegachí', 1, NULL, NULL),
(3248, 1046, 'Venadillo', 23, NULL, NULL),
(3249, 1047, 'Venecia', 1, NULL, NULL),
(3250, 1048, 'Venecia (Ospina Pérez)', 11, NULL, NULL),
(3251, 1049, 'Ventaquemada', 5, NULL, NULL),
(3252, 1050, 'Vergara', 11, NULL, NULL),
(3253, 1051, 'Versalles', 24, NULL, NULL),
(3254, 1052, 'Vetas', 21, NULL, NULL),
(3255, 1053, 'Viani', 11, NULL, NULL),
(3256, 1054, 'Vigía del Fuerte', 1, NULL, NULL),
(3257, 1055, 'Vijes', 24, NULL, NULL),
(3258, 1056, 'Villa Caro', 18, NULL, NULL),
(3259, 1057, 'Villa Rica', 8, NULL, NULL),
(3260, 1058, 'Villa de Leiva', 5, NULL, NULL),
(3261, 1059, 'Villa del Rosario', 18, NULL, NULL),
(3262, 1060, 'Villagarzón', 27, NULL, NULL),
(3263, 1061, 'Villagómez', 11, NULL, NULL),
(3264, 1062, 'Villahermosa', 23, NULL, NULL),
(3265, 1063, 'Villamaría', 6, NULL, NULL),
(3266, 1064, 'Villanueva', 4, NULL, NULL),
(3267, 1065, 'Villanueva', 14, NULL, NULL),
(3268, 1066, 'Villanueva', 21, NULL, NULL),
(3269, 1067, 'Villanueva', 26, NULL, NULL),
(3270, 1068, 'Villapinzón', 11, NULL, NULL),
(3271, 1069, 'Villarrica', 23, NULL, NULL),
(3272, 1070, 'Villavicencio', 16, NULL, NULL),
(3273, 1071, 'Villavieja', 13, NULL, NULL),
(3274, 1072, 'Villeta', 11, NULL, NULL),
(3275, 1073, 'Viotá', 11, NULL, NULL),
(3276, 1074, 'Viracachá', 5, NULL, NULL),
(3277, 1075, 'Vista Hermosa', 16, NULL, NULL),
(3278, 1076, 'Viterbo', 6, NULL, NULL),
(3279, 1077, 'Vélez', 21, NULL, NULL),
(3280, 1078, 'Yacopí', 11, NULL, NULL),
(3281, 1079, 'Yacuanquer', 17, NULL, NULL),
(3282, 1080, 'Yaguará', 13, NULL, NULL),
(3283, 1081, 'Yalí', 1, NULL, NULL),
(3284, 1082, 'Yarumal', 1, NULL, NULL),
(3285, 1083, 'Yolombó', 1, NULL, NULL),
(3286, 1084, 'Yondó (Casabe)', 1, NULL, NULL),
(3287, 1085, 'Yopal', 26, NULL, NULL),
(3288, 1086, 'Yotoco', 24, NULL, NULL),
(3289, 1087, 'Yumbo', 24, NULL, NULL),
(3290, 1088, 'Zambrano', 4, NULL, NULL),
(3291, 1089, 'Zapatoca', 21, NULL, NULL),
(3292, 1090, 'Zapayán (PUNTA DE PIEDRAS)', 15, NULL, NULL),
(3293, 1091, 'Zaragoza', 1, NULL, NULL),
(3294, 1092, 'Zarzal', 24, NULL, NULL),
(3295, 1093, 'Zetaquirá', 5, NULL, NULL),
(3296, 1094, 'Zipacón', 11, NULL, NULL),
(3297, 1095, 'Zipaquirá', 11, NULL, NULL),
(3298, 1096, 'Zona Bananera (PRADO - SEVILLA', 15, NULL, NULL),
(3299, 1097, 'Ábrego', 18, NULL, NULL),
(3300, 1098, 'Íquira', 13, NULL, NULL),
(3301, 1099, 'Úmbita', 5, NULL, NULL),
(3302, 1100, 'Útica', 11, NULL, NULL),
(3303, 55555, 'me lo acabo de inventar', 5, '2023-01-05 08:38:48', '2023-01-05 08:38:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tipodocumento_id` bigint(20) UNSIGNED DEFAULT NULL,
  `persona_numdoc` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `persona_nombres` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `persona_apellidos` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `persona_celular` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `persona_telfijo` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `persona_email` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `persona_codpostal` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `persona_direccion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `municipio_id` bigint(20) UNSIGNED DEFAULT NULL,
  `departamento_id` bigint(20) UNSIGNED DEFAULT NULL,
  `contacto_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id`, `tipodocumento_id`, `persona_numdoc`, `persona_nombres`, `persona_apellidos`, `persona_celular`, `persona_telfijo`, `persona_email`, `persona_codpostal`, `persona_direccion`, `municipio_id`, `departamento_id`, `contacto_id`, `created_at`, `updated_at`) VALUES
(1, 1, '123456', 'Aute adipisci aliqui', 'Suscipit corrupti n', 'Nemo pariatur Quia', 'Exercitationem neces', 'dezo@mailinator.com', 'Nisi suscipit explic', 'Omnis et illum faci', 2291, 2, 3, '2023-01-04 06:05:34', '2023-01-05 19:29:40'),
(3, 3, '194502465', 'Luis Orlando', 'Castillo Gutierrez', '3208099114', '6014675763', 'sddsf@gmail.com', '1245-896', 'Carrera 4 # 56-23', 2310, 3, 2, '2023-01-04 06:15:21', '2023-01-05 19:24:14'),
(4, 4, '88888888', 'Bonifacio primero', 'fernadez de soto', '55556662', '57-6935', 'rrr@gmail.com', '8956-6', 'calle con carrerca', 2205, 16, 1, '2023-01-04 23:36:09', '2023-01-05 19:26:50'),
(5, 4, '9999', 'primero', 'apellidos', '655656', 'weww', 'dd@gmail.com', '56456', 'fgfg', 2206, 12, 3, '2023-01-05 19:35:40', '2023-01-05 19:35:40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `radicados`
--

CREATE TABLE `radicados` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `numradicado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `referente_id` int(11) NOT NULL,
  `tipoinmueble_id` bigint(20) UNSIGNED DEFAULT NULL,
  `direccion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `barrio` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zona` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `municipio_id` bigint(20) UNSIGNED DEFAULT NULL,
  `departamento_id` bigint(20) UNSIGNED DEFAULT NULL,
  `persona_id` bigint(20) UNSIGNED DEFAULT NULL,
  `solicitante_id` int(11) NOT NULL,
  `contacto_id` bigint(20) UNSIGNED DEFAULT NULL,
  `vrreferente` double NOT NULL,
  `honorarios` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `radicados`
--

INSERT INTO `radicados` (`id`, `user_id`, `numradicado`, `fecha`, `hora`, `referente_id`, `tipoinmueble_id`, `direccion`, `barrio`, `zona`, `municipio_id`, `departamento_id`, `persona_id`, `solicitante_id`, `contacto_id`, `vrreferente`, `honorarios`, `created_at`, `updated_at`) VALUES
(2, 1, 'Deserunt earum eos m', '1978-11-28', '15:55:00', 3, 2, 'Impedit ullamco ut', 'Iste nulla odit poss', 'Possimus aperiam eu', NULL, NULL, 1, 1, 3, 125000000, 12500, '2023-01-04 06:17:34', '2023-01-04 06:17:34'),
(3, 1, '55555xxxx', '2023-01-03', '12:25:00', 1, 3, 'ggfg', 'ffff', 'jjjjj', NULL, NULL, 1, 1, 2, 850000000, 350000, '2023-01-04 23:15:23', '2023-01-04 23:15:23'),
(4, 1, '87778ff', '2023-01-02', '13:25:00', 4, 5, 'rrrrr', 'ddddd', 'ssss', NULL, NULL, 3, 1, 3, 150000000, 175000, '2023-01-04 23:39:08', '2023-01-04 23:39:08'),
(5, 1, '5445646eeee', '2023-01-19', '15:53:00', 3, 2, 'ewee', 'ewrr', 'eerer', NULL, NULL, 3, 3, 3, 125000000, 560001, '2023-01-05 01:54:23', '2023-01-05 02:51:58'),
(7, 1, 'fgfgf', '2023-01-03', '20:20:00', 3, 4, 'fgfdg', 'hhjh', 'hjkj', NULL, NULL, 3, 3, 2, 25368954, 1111, '2023-01-05 04:44:03', '2023-01-05 04:44:03'),
(8, 1, 'xxx1', '2023-01-05', '21:52:00', 1, 2, 'dd', 'df', 'ff', NULL, NULL, 3, 4, 1, 222, 3, '2023-01-05 04:45:47', '2023-01-05 04:45:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipodocumentos`
--

CREATE TABLE `tipodocumentos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipodocumentos`
--

INSERT INTO `tipodocumentos` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'Cedula', '2023-01-04 05:56:29', '2023-01-04 05:56:29'),
(2, 'Pasaporte', '2023-01-04 05:56:36', '2023-01-04 05:56:36'),
(3, 'NIT', '2023-01-04 05:56:42', '2023-01-04 05:56:42'),
(4, 'RUT', '2023-01-04 05:56:50', '2023-01-04 05:56:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoinmuebles`
--

CREATE TABLE `tipoinmuebles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipoinmuebles`
--

INSERT INTO `tipoinmuebles` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'Casa', '2023-01-04 05:57:01', '2023-01-04 05:57:01'),
(2, 'Apartamento', '2023-01-04 05:57:08', '2023-01-04 05:57:08'),
(3, 'Edificio', '2023-01-04 05:57:16', '2023-01-04 05:57:16'),
(4, 'Bodega', '2023-01-04 05:57:23', '2023-01-04 05:57:23'),
(5, 'Finca', '2023-01-04 05:57:29', '2023-01-04 05:57:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Orlando', 'orcasti@gmail.com', '2023-01-04 05:56:00', '$2y$10$t/14Bi6knxue21v1ac/czulVnDxyborpT9TpC8eX0H3WfHdCNxWE2', NULL, '2023-01-04 05:54:21', '2023-01-04 05:56:00', NULL),
(2, 'Lisnelia Barrera', 'lisbamo@gmail.com', NULL, '$2y$10$3lxTiTDCZLrMRUqp8o.6EuJFzEGPY1aJstOi6aZoi4HiuPo3DLjsq', NULL, '2023-01-08 05:00:34', '2023-01-08 05:00:34', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `variables`
--

CREATE TABLE `variables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `variables`
--

INSERT INTO `variables` (`id`, `nombre`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'Uso Predominante', 'Uso predominante en el barrio o sector', NULL, NULL),
(2, 'Estado de la construcción', 'Se refiere en cuanto a su desarrollo (terminada, Remodelada, etc)', NULL, NULL),
(3, 'Tipo de Documento', 'Docuemnto de identificación', NULL, NULL),
(4, 'Tipo de Inmueble', 'Nombre como se conoce popularmente', NULL, NULL),
(5, 'Entorno Urbanistico', 'los alrededores arquitectonicos', '2023-01-06 08:05:11', '2023-01-06 10:02:23'),
(6, 'Tipo de Vias', 'En cuanto a Importancia (Nal-Dptal, etc)', '2023-01-06 08:18:03', '2023-01-06 10:05:13'),
(7, 'Vias', 'vias en cuanto a estado', '2023-01-12 04:17:12', '2023-01-12 04:17:12');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contactos`
--
ALTER TABLE `contactos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalles`
--
ALTER TABLE `detalles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detalles_variable_id_foreign` (`variable_id`);

--
-- Indices de la tabla `documentos`
--
ALTER TABLE `documentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `documentos_radicado_id_foreign` (`radicado_id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `municipios`
--
ALTER TABLE `municipios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `municipios_departamento_id_foreign` (`departamento_id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `personas_tipodocumento_id_foreign` (`tipodocumento_id`),
  ADD KEY `personas_municipio_id_foreign` (`municipio_id`),
  ADD KEY `personas_departamento_id_foreign` (`departamento_id`),
  ADD KEY `personas_contacto_id_foreign` (`contacto_id`);

--
-- Indices de la tabla `radicados`
--
ALTER TABLE `radicados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `radicados_user_id_foreign` (`user_id`),
  ADD KEY `radicados_tipoinmueble_id_foreign` (`tipoinmueble_id`),
  ADD KEY `radicados_municipio_id_foreign` (`municipio_id`),
  ADD KEY `radicados_departamento_id_foreign` (`departamento_id`),
  ADD KEY `radicados_persona_id_foreign` (`persona_id`),
  ADD KEY `radicados_contacto_id_foreign` (`contacto_id`);

--
-- Indices de la tabla `tipodocumentos`
--
ALTER TABLE `tipodocumentos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipoinmuebles`
--
ALTER TABLE `tipoinmuebles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `variables`
--
ALTER TABLE `variables`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `contactos`
--
ALTER TABLE `contactos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `detalles`
--
ALTER TABLE `detalles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT de la tabla `documentos`
--
ALTER TABLE `documentos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `municipios`
--
ALTER TABLE `municipios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3304;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `radicados`
--
ALTER TABLE `radicados`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tipodocumentos`
--
ALTER TABLE `tipodocumentos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipoinmuebles`
--
ALTER TABLE `tipoinmuebles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `variables`
--
ALTER TABLE `variables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalles`
--
ALTER TABLE `detalles`
  ADD CONSTRAINT `detalles_variable_id_foreign` FOREIGN KEY (`variable_id`) REFERENCES `variables` (`id`);

--
-- Filtros para la tabla `documentos`
--
ALTER TABLE `documentos`
  ADD CONSTRAINT `documentos_radicado_id_foreign` FOREIGN KEY (`radicado_id`) REFERENCES `radicados` (`id`);

--
-- Filtros para la tabla `municipios`
--
ALTER TABLE `municipios`
  ADD CONSTRAINT `municipios_departamento_id_foreign` FOREIGN KEY (`departamento_id`) REFERENCES `departamentos` (`id`);

--
-- Filtros para la tabla `personas`
--
ALTER TABLE `personas`
  ADD CONSTRAINT `personas_contacto_id_foreign` FOREIGN KEY (`contacto_id`) REFERENCES `contactos` (`id`),
  ADD CONSTRAINT `personas_departamento_id_foreign` FOREIGN KEY (`departamento_id`) REFERENCES `departamentos` (`id`),
  ADD CONSTRAINT `personas_municipio_id_foreign` FOREIGN KEY (`municipio_id`) REFERENCES `municipios` (`id`),
  ADD CONSTRAINT `personas_tipodocumento_id_foreign` FOREIGN KEY (`tipodocumento_id`) REFERENCES `tipodocumentos` (`id`);

--
-- Filtros para la tabla `radicados`
--
ALTER TABLE `radicados`
  ADD CONSTRAINT `radicados_contacto_id_foreign` FOREIGN KEY (`contacto_id`) REFERENCES `contactos` (`id`),
  ADD CONSTRAINT `radicados_departamento_id_foreign` FOREIGN KEY (`departamento_id`) REFERENCES `departamentos` (`id`),
  ADD CONSTRAINT `radicados_municipio_id_foreign` FOREIGN KEY (`municipio_id`) REFERENCES `municipios` (`id`),
  ADD CONSTRAINT `radicados_persona_id_foreign` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id`),
  ADD CONSTRAINT `radicados_tipoinmueble_id_foreign` FOREIGN KEY (`tipoinmueble_id`) REFERENCES `tipoinmuebles` (`id`),
  ADD CONSTRAINT `radicados_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
