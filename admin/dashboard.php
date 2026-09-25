<?php

require_once __DIR__ . '/includes/auth.php';

$page_title = 'Dashboard';

require_once __DIR__ . '/includes/header.php';
?>

<div class="max-w-7xl mx-auto space-y-6">


    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">

        <div>

            <h1 class="text-2xl sm:text-3xl font-extrabold">
                Dashboard
            </h1>

            <p class="text-slate-500 dark:text-slate-400 mt-1">
                Overview of your system performance.
            </p>

        </div>


        <button
            class="
                inline-flex
                items-center
                justify-center
                gap-2
                px-5
                py-3
                rounded-xl
                bg-primary-600
                hover:bg-primary-700
                text-white
                font-semibold
                shadow-lg
                shadow-primary-600/20
                transition
            "
        >
            <i class="fa-solid fa-plus"></i>
            Add New
        </button>

    </div>


    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-5">


        <div
            class="
                bg-white
                dark:bg-slate-900
                rounded-2xl
                p-5
                border
                border-slate-200
                dark:border-slate-800
                shadow-sm
            "
        >

            <div class="flex items-start justify-between">

                <div>

                    <p class="text-sm text-slate-500">
                        Total Students
                    </p>

                    <h3 class="text-3xl font-extrabold mt-2">
                        12,540
                    </h3>

                    <p class="text-xs text-emerald-500 mt-2 font-semibold">
                        <i class="fa-solid fa-arrow-trend-up"></i>
                        12.5% this month
                    </p>

                </div>


                <div
                    class="
                        w-12
                        h-12
                        rounded-xl
                        bg-blue-100
                        dark:bg-blue-950
                        text-primary-600
                        flex
                        items-center
                        justify-center
                    "
                >
                    <i class="fa-solid fa-user-graduate text-xl"></i>
                </div>

            </div>

        </div>


        <div
            class="
                bg-white
                dark:bg-slate-900
                rounded-2xl
                p-5
                border
                border-slate-200
                dark:border-slate-800
                shadow-sm
            "
        >

            <div class="flex items-start justify-between">

                <div>

                    <p class="text-sm text-slate-500">
                        Active Courses
                    </p>

                    <h3 class="text-3xl font-extrabold mt-2">
                        86
                    </h3>

                    <p class="text-xs text-emerald-500 mt-2 font-semibold">
                        <i class="fa-solid fa-arrow-trend-up"></i>
                        8.2% this month
                    </p>

                </div>


                <div
                    class="
                        w-12
                        h-12
                        rounded-xl
                        bg-violet-100
                        dark:bg-violet-950
                        text-violet-600
                        flex
                        items-center
                        justify-center
                    "
                >
                    <i class="fa-solid fa-book-open text-xl"></i>
                </div>

            </div>

        </div>


        <div
            class="
                bg-white
                dark:bg-slate-900
                rounded-2xl
                p-5
                border
                border-slate-200
                dark:border-slate-800
                shadow-sm
            "
        >

            <div class="flex items-start justify-between">

                <div>

                    <p class="text-sm text-slate-500">
                        Total Branches
                    </p>

                    <h3 class="text-3xl font-extrabold mt-2">
                        42
                    </h3>

                    <p class="text-xs text-emerald-500 mt-2 font-semibold">
                        <i class="fa-solid fa-arrow-trend-up"></i>
                        4.7% this month
                    </p>

                </div>


                <div
                    class="
                        w-12
                        h-12
                        rounded-xl
                        bg-amber-100
                        dark:bg-amber-950
                        text-amber-600
                        flex
                        items-center
                        justify-center
                    "
                >
                    <i class="fa-solid fa-building text-xl"></i>
                </div>

            </div>

        </div>


        <div
            class="
                bg-white
                dark:bg-slate-900
                rounded-2xl
                p-5
                border
                border-slate-200
                dark:border-slate-800
                shadow-sm
            "
        >

            <div class="flex items-start justify-between">

                <div>

                    <p class="text-sm text-slate-500">
                        Total Revenue
                    </p>

                    <h3 class="text-3xl font-extrabold mt-2">
                        $48,920
                    </h3>

                    <p class="text-xs text-emerald-500 mt-2 font-semibold">
                        <i class="fa-solid fa-arrow-trend-up"></i>
                        18.4% this month
                    </p>

                </div>


                <div
                    class="
                        w-12
                        h-12
                        rounded-xl
                        bg-emerald-100
                        dark:bg-emerald-950
                        text-emerald-600
                        flex
                        items-center
                        justify-center
                    "
                >
                    <i class="fa-solid fa-dollar-sign text-xl"></i>
                </div>

            </div>

        </div>

    </div>


    <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">


        <div
            class="
                xl:col-span-2
                bg-white
                dark:bg-slate-900
                rounded-2xl
                border
                border-slate-200
                dark:border-slate-800
                p-5
                shadow-sm
            "
        >

            <div class="flex items-center justify-between mb-6">

                <div>

                    <h3 class="font-bold text-lg">
                        Revenue Overview
                    </h3>

                    <p class="text-sm text-slate-400">
                        Monthly revenue performance
                    </p>

                </div>


                <select
                    class="
                        px-3
                        py-2
                        rounded-lg
                        border
                        border-slate-200
                        dark:border-slate-700
                        bg-transparent
                        text-sm
                        outline-none
                    "
                >

                    <option>2026</option>
                    <option>2025</option>
                    <option>2024</option>

                </select>

            </div>


            <div class="h-72 flex items-end gap-3 sm:gap-5">

                <?php

                $bars = [45, 62, 52, 78, 65, 88, 72, 95, 82, 70, 91, 98];

                foreach ($bars as $index => $height):

                ?>

                    <div class="flex-1 h-full flex flex-col justify-end gap-2">

                        <div
                            class="
                                w-full
                                bg-primary-500
                                rounded-t-lg
                                hover:bg-primary-600
                                transition
                            "
                            style="height: <?= $height ?>%;"
                        ></div>

                        <span class="text-[10px] sm:text-xs text-center text-slate-400">
                            <?= date('M', mktime(0, 0, 0, $index + 1, 1)) ?>
                        </span>

                    </div>

                <?php endforeach; ?>

            </div>

        </div>


        <div
            class="
                bg-white
                dark:bg-slate-900
                rounded-2xl
                border
                border-slate-200
                dark:border-slate-800
                p-5
                shadow-sm
            "
        >

            <div class="flex items-center justify-between mb-6">

                <div>

                    <h3 class="font-bold text-lg">
                        Recent Activity
                    </h3>

                    <p class="text-sm text-slate-400">
                        Latest system activities
                    </p>

                </div>

                <button class="text-primary-600 text-sm font-semibold">
                    View All
                </button>

            </div>


            <div class="space-y-5">


                <div class="flex gap-3">

                    <div
                        class="
                            w-10
                            h-10
                            shrink-0
                            rounded-full
                            bg-blue-100
                            dark:bg-blue-950
                            text-primary-600
                            flex
                            items-center
                            justify-center
                        "
                    >
                        <i class="fa-solid fa-user-plus"></i>
                    </div>

                    <div>

                        <p class="text-sm font-semibold">
                            New student registered
                        </p>

                        <p class="text-xs text-slate-400 mt-1">
                            5 minutes ago
                        </p>

                    </div>

                </div>


                <div class="flex gap-3">

                    <div
                        class="
                            w-10
                            h-10
                            shrink-0
                            rounded-full
                            bg-emerald-100
                            dark:bg-emerald-950
                            text-emerald-600
                            flex
                            items-center
                            justify-center
                        "
                    >
                        <i class="fa-solid fa-money-bill"></i>
                    </div>

                    <div>

                        <p class="text-sm font-semibold">
                            Payment received
                        </p>

                        <p class="text-xs text-slate-400 mt-1">
                            18 minutes ago
                        </p>

                    </div>

                </div>


                <div class="flex gap-3">

                    <div
                        class="
                            w-10
                            h-10
                            shrink-0
                            rounded-full
                            bg-violet-100
                            dark:bg-violet-950
                            text-violet-600
                            flex
                            items-center
                            justify-center
                        "
                    >
                        <i class="fa-solid fa-book"></i>
                    </div>

                    <div>

                        <p class="text-sm font-semibold">
                            New course published
                        </p>

                        <p class="text-xs text-slate-400 mt-1">
                            42 minutes ago
                        </p>

                    </div>

                </div>


                <div class="flex gap-3">

                    <div
                        class="
                            w-10
                            h-10
                            shrink-0
                            rounded-full
                            bg-amber-100
                            dark:bg-amber-950
                            text-amber-600
                            flex
                            items-center
                            justify-center
                        "
                    >
                        <i class="fa-solid fa-gear"></i>
                    </div>

                    <div>

                        <p class="text-sm font-semibold">
                            System settings updated
                        </p>

                        <p class="text-xs text-slate-400 mt-1">
                            1 hour ago
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>


    <div
        class="
            bg-white
            dark:bg-slate-900
            rounded-2xl
            border
            border-slate-200
            dark:border-slate-800
            overflow-hidden
            shadow-sm
        "
    >

        <div class="p-5 flex items-center justify-between">

            <div>

                <h3 class="font-bold text-lg">
                    Recent Students
                </h3>

                <p class="text-sm text-slate-400">
                    Recently registered students
                </p>

            </div>

            <a
                href="students.php"
                class="text-primary-600 text-sm font-semibold"
            >
                View All
            </a>

        </div>


        <div class="overflow-x-auto">

            <table class="w-full text-sm">

                <thead class="bg-slate-50 dark:bg-slate-800/50">

                    <tr>

                        <th class="text-left px-5 py-4 font-semibold">
                            Student
                        </th>

                        <th class="text-left px-5 py-4 font-semibold">
                            Course
                        </th>

                        <th class="text-left px-5 py-4 font-semibold">
                            Status
                        </th>

                        <th class="text-left px-5 py-4 font-semibold">
                            Date
                        </th>

                    </tr>

                </thead>


                <tbody class="divide-y divide-slate-100 dark:divide-slate-800">

                    <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50">

                        <td class="px-5 py-4">

                            <div class="flex items-center gap-3">

                                <img
                                    src="https://i.pravatar.cc/100?img=1"
                                    class="w-10 h-10 rounded-full"
                                    alt=""
                                >

                                <div>

                                    <p class="font-semibold">
                                        John Doe
                                    </p>

                                    <p class="text-xs text-slate-400">
                                        STU-2026-001
                                    </p>

                                </div>

                            </div>

                        </td>

                        <td class="px-5 py-4">
                            Web Development
                        </td>

                        <td class="px-5 py-4">

                            <span
                                class="
                                    inline-flex
                                    px-3
                                    py-1
                                    rounded-full
                                    bg-emerald-100
                                    text-emerald-700
                                    text-xs
                                    font-semibold
                                "
                            >
                                Active
                            </span>

                        </td>

                        <td class="px-5 py-4 text-slate-500">
                            Sep 20, 2026
                        </td>

                    </tr>


                    <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50">

                        <td class="px-5 py-4">

                            <div class="flex items-center gap-3">

                                <img
                                    src="https://i.pravatar.cc/100?img=5"
                                    class="w-10 h-10 rounded-full"
                                    alt=""
                                >

                                <div>

                                    <p class="font-semibold">
                                        Jane Smith
                                    </p>

                                    <p class="text-xs text-slate-400">
                                        STU-2026-002
                                    </p>

                                </div>

                            </div>

                        </td>

                        <td class="px-5 py-4">
                            Graphic Design
                        </td>

                        <td class="px-5 py-4">

                            <span
                                class="
                                    inline-flex
                                    px-3
                                    py-1
                                    rounded-full
                                    bg-amber-100
                                    text-amber-700
                                    text-xs
                                    font-semibold
                                "
                            >
                                Pending
                            </span>

                        </td>

                        <td class="px-5 py-4 text-slate-500">
                            Sep 19, 2026
                        </td>

                    </tr>

                </tbody>

            </table>

        </div>

    </div>

</div>

<?php include 'includes/footer.php'; ?>