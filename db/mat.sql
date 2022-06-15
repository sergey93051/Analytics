-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Мар 01 2022 г., 14:31
-- Версия сервера: 10.4.18-MariaDB
-- Версия PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `mat`
--

-- --------------------------------------------------------

--
-- Структура таблицы `apichoose`
--

CREATE TABLE `apichoose` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `domen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `apichoose`
--

INSERT INTO `apichoose` (`id`, `domen`) VALUES
(2, 'test-store-tigran.myshopify.com');

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
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
-- Структура таблицы `fbapi`
--

CREATE TABLE `fbapi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `FCAPP_ID` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `FCAPP_SECRET` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `FCGRAPH_VERSION` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `FCACCAUNT` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `FCToken` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `FCNAME` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `fbapi`
--

INSERT INTO `fbapi` (`id`, `FCAPP_ID`, `FCAPP_SECRET`, `FCGRAPH_VERSION`, `FCACCAUNT`, `FCToken`, `FCNAME`) VALUES
(1, '298043502338137', 'c7189ce424781cba78f56e0cf908e4ed', 'v12.0', '100869649148470', 'EAAEPEakVoFkBAOZBa7ksd2oGszA2F2FZB943JBSLMcuZCgbKqkZAg5mchZCPlTbAzQd6aZBDrolz9ttZAZBIsVaDQg8naWXsEfAm6MdbvFbqt81ZBbOiKFuGgVfmb9yom3PcmFuKDVpa59B2DWoRVszVziIs2w6oaP1iMh5fLHKKsj5ZCTNKGHl6FDinaihsFQL2QZD', 'TestPage');

-- --------------------------------------------------------

--
-- Структура таблицы `fbchoose`
--

CREATE TABLE `fbchoose` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fbApi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `fbchoose`
--

INSERT INTO `fbchoose` (`id`, `fbApi`) VALUES
(3, '100869649148470');

-- --------------------------------------------------------

--
-- Структура таблицы `googleapi`
--

CREATE TABLE `googleapi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `view_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_account_credentials_json` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shopify_domen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `googleapi`
--

INSERT INTO `googleapi` (`id`, `view_id`, `service_account_credentials_json`, `shopify_domen`) VALUES
(1, '259404833', 'app/google/zpellison.json', 'zpellison.myshopify.com'),
(2, '255306798', 'app/google/newstorefriday.json', 'newstorefriday.myshopify.com'),
(3, '256570323', 'app/google/test-store.json', 'test-store-tigran.myshopify.com'),
(4, '259803703', 'app/google/store-test-shop.json', 'store-test-shop.myshopify.com');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_09_09_075008_add_fb_id_column_in_users_table', 1),
(6, '2021_09_09_150545_g_add_google_id_column_in_users_tableoogle_migration', 1),
(7, '2021_12_07_073453_shopify_choose_api_migration', 1),
(8, '2021_12_08_071104_google_api_change_migration', 1),
(9, '2022_01_26_063002_choose_api_migration', 1),
(10, '2022_02_02_082234_fb_apichoosemigration', 2),
(11, '2022_02_02_082258_fb_apimigration', 2),
(12, '2022_02_02_125653_choose_api_update_migration', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `shopifyapi`
--

CREATE TABLE `shopifyapi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `APIkey` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SHOPIFY_DOMAIN` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `APIversion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `protocol` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `shopifyapi`
--

INSERT INTO `shopifyapi` (`id`, `APIkey`, `SHOPIFY_DOMAIN`, `Password`, `APIversion`, `protocol`) VALUES
(1, '79653343ad31b561c6424fe37f0590c3', 'zpellison.myshopify.com', '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', '2021-10', 'https://'),
(2, '614b7b61e53dfe16f78bd128f2fd3cc9', 'newstorefriday.myshopify.com', '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', '2021-10', 'https://'),
(3, '5bb9a0a69445a65431f4d94bd87fdfd2', 'test-store-tigran.myshopify.com', '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', '2021-10', 'https://'),
(4, 'f2e855b05963d26c68b9da035d1d7538', 'store-test-shop.myshopify.com', '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', '2021-10', 'https://');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `fb_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fb_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gl_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gl_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `img`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `fb_id`, `fb_img`, `gl_id`, `gl_img`) VALUES
(1, 'admin', 'Test', NULL, 'admin@test.com', NULL, '$2y$10$nu8ZyDm9dHlUFtlYbGzFPOm6giX9jng8nUv5LtaJsm0JkFNB0bQIe', NULL, '2022-01-26 04:02:19', '2022-01-26 04:02:19', NULL, NULL, NULL, NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `apichoose`
--
ALTER TABLE `apichoose`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Индексы таблицы `fbapi`
--
ALTER TABLE `fbapi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `fbapi_fcapp_id_unique` (`FCAPP_ID`),
  ADD UNIQUE KEY `fbapi_fctoken_unique` (`FCToken`);

--
-- Индексы таблицы `fbchoose`
--
ALTER TABLE `fbchoose`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `googleapi`
--
ALTER TABLE `googleapi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `googleapi_view_id_unique` (`view_id`),
  ADD UNIQUE KEY `googleapi_service_account_credentials_json_unique` (`service_account_credentials_json`),
  ADD UNIQUE KEY `googleapi_shopify_domen_unique` (`shopify_domen`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Индексы таблицы `shopifyapi`
--
ALTER TABLE `shopifyapi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `shopifyapi_apikey_unique` (`APIkey`),
  ADD UNIQUE KEY `shopifyapi_shopify_domain_unique` (`SHOPIFY_DOMAIN`),
  ADD UNIQUE KEY `shopifyapi_password_unique` (`Password`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `apichoose`
--
ALTER TABLE `apichoose`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `fbapi`
--
ALTER TABLE `fbapi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `fbchoose`
--
ALTER TABLE `fbchoose`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `googleapi`
--
ALTER TABLE `googleapi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `shopifyapi`
--
ALTER TABLE `shopifyapi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
