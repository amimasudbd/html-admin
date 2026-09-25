<?php

require_once __DIR__ . '/auth.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="Premium Admin Dashboard">

    <title><?= isset($page_title) ? htmlspecialchars($page_title) : 'Admin Dashboard' ?></title>

    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            darkMode: 'class',

            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#eff6ff',
                            100: '#dbeafe',
                            200: '#bfdbfe',
                            300: '#93c5fd',
                            400: '#60a5fa',
                            500: '#3b82f6',
                            600: '#2563eb',
                            700: '#1d4ed8',
                            800: '#1e40af',
                            900: '#1e3a8a'
                        }
                    },

                    boxShadow: {
                        soft: '0 10px 40px rgba(0,0,0,0.08)'
                    }
                }
            }
        }
    </script>

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    >

    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body class="bg-slate-100 text-slate-800 antialiased dark:bg-slate-950 dark:text-slate-100">

<div id="app" class="min-h-screen">

    <?php include 'sidebar.php'; ?>

    <div
        id="main-wrapper"
        class="lg:ml-72 min-h-screen transition-all duration-300"
    >

        <?php include 'navbar.php'; ?>

        <main class="p-4 sm:p-6 lg:p-8">