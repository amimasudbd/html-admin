<aside
    id="sidebar"
    class="
        fixed
        inset-y-0
        left-0
        z-50
        w-72
        bg-white
        border-r
        border-slate-200
        transform
        -translate-x-full
        lg:translate-x-0
        transition-transform
        duration-300
        dark:bg-slate-900
        dark:border-slate-800
    "
>

    <div class="h-full flex flex-col">

        <div
            class="
                h-20
                flex
                items-center
                justify-between
                px-6
                border-b
                border-slate-200
                dark:border-slate-800
            "
        >

            <a href="dashboard.php" class="flex items-center gap-3">

                <div
                    class="
                        w-11
                        h-11
                        rounded-xl
                        bg-gradient-to-br
                        from-primary-500
                        to-primary-700
                        flex
                        items-center
                        justify-center
                        text-white
                        shadow-lg
                    "
                >
                    <i class="fa-solid fa-layer-group text-lg"></i>
                </div>

                <div>

                    <h1 class="font-extrabold text-lg">
                        AdminPanel
                    </h1>

                    <p class="text-xs text-slate-500 dark:text-slate-400">
                        Management System
                    </p>

                </div>

            </a>

            <button
                id="sidebarClose"
                class="lg:hidden text-slate-500 hover:text-red-500"
            >
                <i class="fa-solid fa-xmark text-xl"></i>
            </button>

        </div>


        <div class="flex-1 overflow-y-auto px-4 py-6">

            <p
                class="
                    px-3
                    mb-3
                    text-[11px]
                    font-bold
                    uppercase
                    tracking-widest
                    text-slate-400
                "
            >
                Main Menu
            </p>


            <nav class="space-y-1">

                <a
                    href="dashboard.php"
                    class="
                        sidebar-link
                        active
                    "
                >
                    <i class="fa-solid fa-grid-2"></i>
                    <span>Dashboard</span>
                </a>


                <a
                    href="users.php"
                    class="sidebar-link"
                >
                    <i class="fa-solid fa-users"></i>
                    <span>Users</span>

                    <span
                        class="
                            ml-auto
                            text-xs
                            px-2
                            py-0.5
                            rounded-full
                            bg-primary-100
                            text-primary-700
                        "
                    >
                        24
                    </span>

                </a>


                <a
                    href="students.php"
                    class="sidebar-link"
                >
                    <i class="fa-solid fa-user-graduate"></i>
                    <span>Students</span>
                </a>


                <a
                    href="courses.php"
                    class="sidebar-link"
                >
                    <i class="fa-solid fa-book-open"></i>
                    <span>Courses</span>
                </a>


                <a
                    href="branches.php"
                    class="sidebar-link"
                >
                    <i class="fa-solid fa-building"></i>
                    <span>Branches</span>
                </a>

            </nav>


            <p
                class="
                    px-3
                    mt-8
                    mb-3
                    text-[11px]
                    font-bold
                    uppercase
                    tracking-widest
                    text-slate-400
                "
            >
                Management
            </p>


            <nav class="space-y-1">

                <a href="notices.php" class="sidebar-link">
                    <i class="fa-solid fa-bell"></i>
                    <span>Notices</span>
                </a>


                <a href="reports.php" class="sidebar-link">
                    <i class="fa-solid fa-chart-column"></i>
                    <span>Reports</span>
                </a>


                <a href="payments.php" class="sidebar-link">
                    <i class="fa-solid fa-credit-card"></i>
                    <span>Payments</span>
                </a>


                <a href="messages.php" class="sidebar-link">
                    <i class="fa-solid fa-envelope"></i>
                    <span>Messages</span>

                    <span
                        class="
                            ml-auto
                            w-2
                            h-2
                            rounded-full
                            bg-red-500
                        "
                    ></span>

                </a>

            </nav>


            <p
                class="
                    px-3
                    mt-8
                    mb-3
                    text-[11px]
                    font-bold
                    uppercase
                    tracking-widest
                    text-slate-400
                "
            >
                System
            </p>


            <nav class="space-y-1">

                <a href="profile.php" class="sidebar-link">
                    <i class="fa-solid fa-user"></i>
                    <span>Profile</span>
                </a>


                <a href="settings.php" class="sidebar-link">
                    <i class="fa-solid fa-gear"></i>
                    <span>Settings</span>
                </a>

            </nav>

        </div>


        <div class="p-4 border-t border-slate-200 dark:border-slate-800">

            <div
                class="
                    rounded-2xl
                    p-4
                    bg-gradient-to-br
                    from-primary-600
                    to-primary-800
                    text-white
                "
            >

                <div class="flex items-center gap-3">

                    <div
                        class="
                            w-10
                            h-10
                            rounded-full
                            bg-white/20
                            flex
                            items-center
                            justify-center
                        "
                    >
                        <i class="fa-solid fa-shield-halved"></i>
                    </div>

                    <div>

                        <p class="font-semibold text-sm">
                            System Secure
                        </p>

                        <p class="text-xs text-white/70">
                            All systems operational
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</aside>


<div
    id="sidebarOverlay"
    class="
        fixed
        inset-0
        z-40
        bg-slate-950/50
        hidden
        lg:hidden
    "
></div>