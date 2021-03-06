-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 11, 2022 at 12:04 PM
-- Server version: 10.3.35-MariaDB-log-cll-lve
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `heydevxyz_doctor_letter`
--

-- --------------------------------------------------------

--
-- Table structure for table `datasets`
--

CREATE TABLE `datasets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `introduction` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diagnosis` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `anamnesis` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `physical_examination` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `summary` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `medication` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diagnostics` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `patient_id` bigint(20) UNSIGNED DEFAULT NULL,
  `date` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doctor_details` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `practitioner_address` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_examination` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `following_therapy` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `laboratory_results` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `datasets`
--

INSERT INTO `datasets` (`id`, `introduction`, `diagnosis`, `anamnesis`, `physical_examination`, `summary`, `medication`, `diagnostics`, `patient_id`, `date`, `doctor_details`, `created_at`, `updated_at`, `practitioner_address`, `other_examination`, `following_therapy`, `laboratory_results`) VALUES
(2, '<p>Sehr geehrter Herr Dr. Schmidt,</p><p><br></p><p>nachfolgend berichten wir ??ber Herr Mohammed Ahmed, geboren am 07.03.1980, wohnhaft in M??nchen, der sich vom 28.06.2022 bis 12.07.2022 in unserere station??ren Behandlung befand.</p>', '<p>beginnende atypische Pneumonie</p><p>- a.e. im Rahmen einer Exazerbation der bekannten COPD</p>', '<p>die Vorstellung des Patienten erfolgte in Begleitung des Rettungswagens aufgrund seit heute Morgen verst??rkter Atemnot und produktivem Husten. Des Weiteren f??hle er sich bereits in den letzten 2-3 Wochen deutlich schw??cher. Er sei aktuell nicht in der Lage mehr als ein Stockwerk zu Fu?? zu gehen, ohne eine l??ngere Pause einzulegen. Der Husten sei besonders w??hrend der Nacht schlimm, sodass er zurzeit kaum schlafen k??nne. Aufgrund einer vorbekannten COPD hat der Patient seit einigen Jahren Heimsauerstoff mit 2l/min. Schmerzen, Fieber oder eine AP-Symptomatik werden verneint. Eine Covid-19 Impfung lehnt der Patient ab.</p><p><br></p><p>Komorbidit??t: COPD, arterielle Hypertonie, 2-Gef???? KHK (2 Stents 2019, 2020), VHF (ED 2017)</p><p><br></p><p>Risikofaktoren/Allergien: Nikotin 30PY, Hypercholesterin??mie</p>', '<p>- Herz: rein und rhythmisch, keine Herzger??usche</p><p>- Lunge: vesikul??res Atemger??usch, basale Rasselger??usche beidseitig</p><p>- Abdomen: regelrechte Darmperistaltik, weich, kein Druckschmerz</p><p>- Niere: Nierenlager nicht klopfschmerzhaft</p>', '<p>Die Aufnahme des Patienten erfolgte bei oben geschilderter Symptomatik. W??hrend seines Aufenthaltes in der Notaufnahme war der Patient stets kardiorespiratorisch stabil. In der k??rperlichen Untersuchung zeigte sich ein beidseitiges basales feinblasiges Rasselger??usch. Laborchemisch zeigte sich eine Infektkonstellation mit einem erh??hten CRP von 78mg/dl und einer Leukozytose. Aufgrund der Symptomatik in Kombination mit der laborchemischen Infektkonstellation wurde ein R??ntgen Thorax angefertigt. Im R??ntgen Thorax stellten sich beidseitige Pleuraerg??sse und eine Zeichenvermehrung dar. In Zusammenschau mit der klinischen Symptomatik wurde der Verdacht auf eine beginnende Pneumonie gestellt. Diese ist aufgrund der bekannten COPD am ehestens als Exazerbation zu werten. Aufgrund des deutlich gesteigerten Sauerstoffbedarfs von 6l/min mit der Nasenbrille erfolgte die Empfehlung zur Aufnahme in unsere pulmologische Klinik.</p>', '<p>- Salmeterol</p><p>- Tiotropiumbromid 2,5??g 0 ??? 0 ??? 2 H??be</p><p>- Budesonid 400??g 1 ??? 1 ??? 1</p><p>- ASS 100mg 1 ??? 0 ??? 0</p><p>- Bisoprolol 10mg 1 ??? 0 ??? 0</p><p>- Ramipril 10mg 1 ??? 0 ??? 0</p><p>- Hydrochlorothiazid 25mg 1 ??? 0 ??? 0</p>', NULL, 2, '2022-07-11 16:01:22', NULL, '2022-07-07 23:57:11', '2022-07-11 20:01:22', '<p>M??nchen Klinik Bogenhausen</p><p>Englschalkinger Str. 77</p><p>81925 M??nchen</p>', '<p>- R??ntgen Thorax: beidseitige Pleuraerg??sse, Streifenvermehrung in den basalen Lungenabschnitten.</p><p>- EKG: Vorhofflimmern, HF 80/min, Linkstyp, Zeiten in der Norm, regelrechte R-Progression, R/S-Umschlag in V3/V4, keine signifikanten ERBS</p>', '<p><br></p>', '<p>- CRP 78mg/dl</p><p>- Leukozyten 14,7 TSND/??l</p><p>- BGA ven??s: pO2 50mmHg, pCO2 48mmHg</p>'),
(3, '<p>Seghr geehrte Frau Dr. Birne,</p><p><br></p><p>nachfolgend berichten ich ??ber Frau Henriette Mayer, geboren am 23.04.1965, wohnhaft in M??nchen, die sich vom 28.06.2022 bis 12.07.2022 in unserere station??ren Behandlung befand.</p>', '<p>- Lob??rpneumonie</p><p>- Arterielle Hypertonie</p><p>- Diabetes mellitus Typ 2</p><p>- Nikotinabusus 20 py</p>', '<p>Die station??re Aufnahme von Frau Mayer erfolgte bei throakalen Schmerzen, die bereits seit 3 Tagen bestanden und sich bis heute weiter verschlechtert h??tten. Dazu f??hle sie sich vor allem bei k??rperlicher Anstrenung luftn??tig. Ihr Vater habe mit 80 Jahren einen Herzinfarkt erlitten.</p>', '<p><br></p>', '<p>Bei thorakalen Schmerzen und Belastungsdyspnoe konnte ein akutes Koronarsyndrom durch ein unauff??lliges EKG und normwertige Herzenzyme ausgeschlossen werden. Ursache der Beschwerden war bei erh??htem Infektparametern, Rasselger??uschen ??ber der rechten Lunge und dauz passendem rechstseitigem Unterlappeinfiltrat im R??ntgen Thorax eine Lob??rpneumonie. Unter einer Therapie mit Ceftriaxon i.v. kam es rasch zu einer Besserung der Beschwerden. Die Infektparameter zeigten sich r??ckl??ufig, sodass die Antibiose nach 10 Tagen bendet werden konnte. Der Zusammenhang zwischen dem chronischen Nikotinabsus und der Pneumonie wurde mit der Patientin besprochen. Es wurde zu einer dringenden Nikotinkarenz geraten.</p>', '<p>- Metoformin 500 mg: 1-0-1</p><p>- Raminpiril 5mg: 1-0-0</p><p>- Amlodipin 5mg: 1-0-0</p><p>- Bisoprolol 2,5 mg: 1-0-0</p>', NULL, 3, '2022-07-11 16:02:08', NULL, '2022-07-08 18:42:20', '2022-07-11 20:02:08', '<p>Dr. med. S. Birne</p><p>Albertusstra??e 51</p><p>81377 M??nchen</p>', '<p><br></p>', '<p>Therapieempfehlung:</p><p>- Keine ??nderung der haus??rztlichen Vormedikation (siehe oben).</p><p>- Nikotinkarenz</p>', '<p>- Leukozytose 15 000/ul</p><p>- CRP Erh??hung mit 20mg/dl</p><p>- CK-MB und Troponin normwertig</p><p>- Restliche Laborwerte unauff??llig, siehe Anlage</p>'),
(6, '<p>Sehr geehrter Herr Dr. Schmidt,</p><p><br></p><p>nachfolgend berichten wir ??ber Frau Laura Stein, geboren am 23.04.1972, wohnhaft in M??nchen, der sich vom 28.06.2022 bis 12.07.2022 in unserere station??ren Behandlung befand.</p>', '<p>Akute intrakranielle Hirnblutung</p><p>- Bei bekannter arterieller Hypertonie und Einnahme von ASS 100mg</p>', '<p>die Vorstellung der Patientin erfolgte in Begleitung des Notarztes. Dieser war aufgrund einer aufgefallenen deutlichen Verschlechterung des Allgemeinzustandes alarmiert worden. Heute Morgen sei die Patientin kaum ansprechbar gewesen. Zuvor habe sie bereits ??ber st??rkste Kopfschmerzen geklagt. Kopfschmerzen habe die Patientin h??ufiger, allerdings nicht von diesem Charakter und Intensit??t. Die Kopfschmerzen seien pochend und betreffen den gesamten Kopf. Des Weiteren habe sich die Patientin am heutigen Morgen bereits 8mal ??bergeben m??ssen. Vom Notarzt habe sie bereits Dipidolor 7,5mg und Dimenhydrinat 62mg erhalten. Daraufhin haben sich die Schmerzen nur kaum gebessert. Fieber, Dyspnoe oder eine AP-Symptomatik werden verneint.</p><p><br></p><p>Komorbidit??t: arterielle Hypertonie, Z.n. Apopoplex</p><p><br></p><p>Risikofaktoren/Allergien: Keine</p>', '<p>- Vigilanz: somnolent</p><p>- Herz: rein und rhythmisch, keine Herzger??usche</p><p>- Lunge: vesikul??res Atemger??usch, keine Rasselger??usche</p><p>- Abdomen: regelrechte Darmperistaltik, weich, kein Druckschmerz</p><p>- Niere: Nierenlager nicht klopfschmerzhaft</p>', '<p>Die Aufnahme der Patientin erfolgte bei oben geschilderter Symptomatik. W??hrend ihres Aufenthaltes in der Notaufnahme war die Patientin stets kardiorespiratorisch stabil. In der k??rperlichen Untersuchung zeigte sich eine deutlich reduzierte Vigilanz. Aufgrund der starken Kopfschmerzen erfolgte die erneute Gabe von Dipidilor 7,5mg. Daraufhin zeigte sich eine Besserung der Beschwerden. Laborchemisch zeigte sich keine Auff??lligkeiten. Bei eingeschr??nkter Vigilanz erfolgte zur weiteren Abkl??rung die Durchf??hrung einer nativen kraniellen CT. In der cCT konnte eine akute Blutung in den Stammganglien rechts durchgef??hrt werden. Zur Eind??mmung der akuten Blutung erfolgte die Gabe von Tranexamns??ure. Nach R??cksprache mit den Neurochirurgen erfolgte die Aufnahme auf unsere Stroke Unit. Im Verlauf erfolgt eine erneute cCT zur Verlaufskontrolle.</p>', '<p>- ASS 100mg 1 ??? 0 ??? 0</p><p>- Bisoprolol 10mg 1 ??? 0 ??? 0</p><p>- Ramipril 10mg 1 ??? 0 ??? 0</p><p>- Hydrochlorothiazid 25mg 1 ??? 0 ??? 0</p>', NULL, 1, '2022-07-11 16:00:57', NULL, '2022-07-10 21:00:27', '2022-07-11 20:00:57', '<p>Dr. med. H. Schmidt</p><p>Marienplatz 16</p><p>81532 M??nchen</p>', '<p>- cCT: akute intrakranielle Blutung loco typico Stammganglien rechts.</p>', '<p>Tranexamns??ure</p><p><br></p><p>Therapieempfehlung:</p><p>- Analgetische Therapie mit Dipidilor 3,75mg 1 ??? 1 ??? 1</p><p>- Metamizol 500mg bei Bedarf bis zu 4xtgl</p><p><br></p><p>Anweisungen an Station:</p><p>- Messung der Vitalparameter 3xtgl</p><p>- Bei Fieber bitte Dienstarzt Bescheid geben, Bei Zeichen eines erh??hten Hirndruckes Benachrichtigung des neurochirurgischen Dienstarztes</p>', '<p><br></p>'),
(7, '<p>Sehr geehrter Herr Dr. Sommer,</p><p><br></p><p>nachfolgend berichten ich ??ber Frau Nicole Schroeder, geboren am 13.08.1985, wohnhaft in M??nchen, die sich vom 28.06.2022 bis 12.07.2022 in unserere station??ren Behandlung befand.</p>', '<p>V.a. akute Appendizitis ICD</p>', '<p>die Vorstellung der Patientin erfolgt selbstst??ndig aufgrund seit gestern Abend bestehenden Unterbauchschmerzen. Die Schmerzen seien von einem krampfartigen, stechenden Charakter und von dauerhafter Persistenz. Aktuell befinden sich die Schmerzen auf der NRS bei 7/10. Au??erdem berichtet die Patientin von bestehender ??belkeit und einmaligem Erbrechen heute Morgen um 7 Uhr. Dyspnoe oder eine AP-Symptomatik bestehen nicht. Eine Infektsymptomatik liegt nicht vor.</p><p><br></p><p>Komorbidit??t: Keine</p><p><br></p><p>Risikofaktoren/Allergien: Pollenallergie, Penicillin</p>', '<p>- Herz: rein und rhythmisch, keine Herzger??usche</p><p>- Lunge: vesikul??res Atemger??usch, keine Rasselger??usche</p><p>- Abdomen: regelrechte Darmperistaltik, weich, Druckschmerz im rechten Unterbauch, Lanz und McBurney positiv, Psoas-Schmerz negativ</p><p>- Niere: Nierenlager nicht klopfschmerzhaft</p>', '<p>Die Aufnahme der Patientin erfolgte bei oben geschilderter Symptomatik. W??hrend ihres Aufenthaltes in der Notaufnahme war die Patientin stets kardiorespiratorisch stabil. In der k??rperlichen Untersuchung zeigte sich ein ausgepr??gter Unterbauchschmerz mit Punctum Maximum im rechten Unterbauch. McBurney und Lanz positiv. Laborchemisch zeigte sich eine Infektkonstellation mit einem erh??hten CRP von 60mg/dl. In der sonographischen Untersuchung konnte eine deutlich vergr????erte Appendix mit einer Wandverdickung von 6mm sowie einem Umgebungs??dem dargestellt werden. Nach konsiliarischer R??cksprache mit den Kollegen der Viszeralchirurgie erfolgte bei dringendem Verdacht auf eine akute Appedizitis die Indikationsstellung zur station??ren Aufnahme. Die Aufnahme erfolgt zur operativen Sanierung im Verlauf. Aufgrund der bekannten Penicillinallergie erfolgte die antibiotische Therapie mit Metronidazol 500mg.</p>', '<p>Keine</p>', NULL, 5, '2022-07-11 16:01:27', NULL, '2022-07-10 22:07:23', '2022-07-11 20:01:27', '<p>Dr. med. H. Sommer</p><p>Albertusstra??e 51</p><p>81377 M??nchen</p>', '<p>- Ultraschall Abdomen: Erschwerte Ultraschallbedingungen bei Darmgas??berlagerung, Kein Harnstau darstellbar, Appendix vergr????ert (7x10cm) wandverdickt 6mm, Umgebungs??dem ???.</p><p>- Viszeralchirurgisches Konsil:</p>', '<p><br></p>', '<p>- CRP 60mg/dl</p>'),
(8, '<p>Sehr geehrte Frau Dr. Kuss,</p><p>nachfolgend berichten wir Ihnen ??ber Frau Floriana Strohl geb. am 26.05.2002, die sich vom 28.06.2022 bis zum 12.07.2022 in unserer station??ren Behandlung befand.</p>', '<p><br></p>', '<p>Die Patientin hat keine Beschwerden seitens der Gelenke. Keine Morgensteifigkeit.</p><p>Schmerz-Score:O (Skala 0-10), Aktivit??tsscore: 0 (Skala 0-10).</p><p>Kein Fieber, kein Gewichtsverlust, Apetit gut, Haut o.B., Kopf-Hals o.B., Magen-Darm o.B.,</p><p>Herz/Lunge o.B., Urogenital o.B., Neuro-/musk-/psychiatr. o.B.</p>', '<p>Allgemeiner UNtersuchungsbefund:</p><p>Gewicht: 51 kg, Gr????e 170 cm, guter Allgemeinzustand</p><p><br></p><p>Sprunggelenk re. Leichte Synoviahypertrophie, sonst unauff??llig. Leichte Synoviahypertrophie, sonst unauff??llig. Die sonstigen Gelenke sind unauff??llig. Keine Auff??lligkeiten bei der Funktionsmessung. Keine Muskulaturauff??lligkeiten. Keine Auff??lligkeiten an der Wirbels??ule</p>', '<p>Die Patientin stellte sich bei uns ambulant zur Verlaufskontrolle juveniler idopathischer Arthritis vor. Sie hat seit mindestens 6 Monaten keine Beschwerden in den Gelenken unter der Therapie. Klinisch und laborchemisch lassen sich keine Auff??lligkeiten finden, so dass wir die Dosis von Indometacion halbierten. Wir baten auch weiterhin um regelm????ige augen??rztliche Kontrolluntersuchungen alle 3 Monate zum Ausschluss einer Uveitis.</p><p><br></p><p>Eine Wiedervorstellung ist am 19.07.2022 um 9:30 Uhr geplant. Einschlie??lich mit Vorstellung in der physiotherapeutischen Abteilung und in der kinderkardiologischen Ambulanz zur Diagnostik des Systolikums.</p>', '<p>Keine</p>', NULL, 4, '2022-07-11 16:02:14', NULL, '2022-07-10 22:23:33', '2022-07-11 20:02:14', '<p>Dr. med. Susan Kuss</p><p>Sophienstra??e 18</p><p>81541 M??nchen</p>', '<p><br></p>', '<p>Therapieempfehlung:</p><p>- Quensyl 200mg Drg. : 1-0-0-1-0-0-0 w??chentlich</p><p>- Indo-paed Susp. 1ml = 5mg: 2-2-2 t??glich</p><p><br></p><p>Sonstige Therapie:</p><p>Krankengymnastische ??bungsbehandlung 1/Woche. Vorstellung in hiesiger KG-Abteilung.</p>', '<p>- Entz??ndungsparameter negativ, wei??es und rotes Blutbild unauff??llig.</p><p>- Elektrolyte, Leber- und Retentionswerte im Normbereich</p>');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_06_15_033529_create_permission_tables', 1),
(7, '2022_07_05_063014_create_patients_table', 2),
(8, '2022_07_07_094415_create_datasets_table', 3),
(9, '2022_07_10_161735_add_new_columns_to_datasets_table', 4),
(10, '2022_07_10_165959_add_new_columns2_to_datasets_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doctor` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hospital_entry` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hospital_exit` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `symptom` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `patient_id`, `first_name`, `last_name`, `dob`, `doctor`, `hospital_entry`, `hospital_exit`, `symptom`, `created_at`, `updated_at`) VALUES
(1, 'PAT004123', 'Laura Stein', NULL, '12.27.1986', 'Dannis Ritchie', '06.06.2022', '13.07.2022', 'Acute intracranial cerebral hemorrhage', '2022-07-05 18:24:40', '2022-07-05 18:24:40'),
(2, 'PAT123324', 'Mohammed Ahmed', NULL, '01.04.1978', 'James Bowman', '09.06.2022', '15.07.2022', 'Pneumonia', '2022-07-05 18:24:40', '2022-07-05 18:24:40'),
(3, 'PAT124118', 'Nicole Schroeder', NULL, '05.12.1980', 'Harry Kane', '21.06.2022', '17.07.2022', 'Acute appendicitis', '2022-07-05 18:24:40', '2022-07-05 18:24:40'),
(4, 'PAT124765', 'Henriette Mayer', NULL, '10.05.1992', 'Dannis Ritchie', '06.06.2022', '18.07.2022', 'Thoracic pain', '2022-07-05 18:24:40', '2022-07-05 18:24:40'),
(5, 'PAT123672', 'Floriana Strohl', NULL, '12.12.1978', 'Dannis Ritchie', '08.06.2022', '20.07.2022', 'Idiopathic arthritis', '2022-07-05 18:24:40', '2022-07-05 18:24:40');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'super_admin_permission', 'web', '2022-07-05 10:02:11', '2022-07-05 10:02:11'),
(2, 'organization_admin_permission', 'web', '2022-07-05 10:02:11', '2022-07-05 10:02:11'),
(3, 'manager_permission', 'web', '2022-07-05 10:02:11', '2022-07-05 10:02:11'),
(4, 'supervisor_permission', 'web', '2022-07-05 10:02:11', '2022-07-05 10:02:11'),
(5, 'accountant_permission', 'web', '2022-07-05 10:02:11', '2022-07-05 10:02:11'),
(6, 'rep_permission', 'web', '2022-07-05 10:02:11', '2022-07-05 10:02:11');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'super_admin', 'web', '2022-07-05 10:02:11', '2022-07-05 10:02:11');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@example.com', NULL, '$2y$10$huw7qvOtGPJSndV8stgi1.ZWQoYcubpf3R1bDQ1MAB/d0VIIiVrqa', NULL, NULL, NULL, NULL, '2022-07-05 10:02:11', '2022-07-05 10:02:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `datasets`
--
ALTER TABLE `datasets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `datasets_patient_id_foreign` (`patient_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `datasets`
--
ALTER TABLE `datasets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `datasets`
--
ALTER TABLE `datasets`
  ADD CONSTRAINT `datasets_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
