<header
    class="
        sticky
        top-0
        z-30
        h-20
        bg-white/90
        backdrop-blur-xl
        border-b
        border-slate-200
        dark:bg-slate-900/90
        dark:border-slate-800
    "
>

    <div class="h-full px-4 sm:px-6 lg:px-8 flex items-center justify-between">

        <div class="flex items-center gap-4">

            <button
                id="sidebarToggle"
                class="
                    w-10
                    h-10
                    rounded-xl
                    bg-slate-100
                    hover:bg-slate-200
                    dark:bg-slate-800
                    dark:hover:bg-slate-700
                    flex
                    items-center
                    justify-center
                    transition
                "
            >
                <i class="fa-solid fa-bars"></i>
            </button>


            <div class="hidden sm:block">

                <p class="text-xs text-slate-400">
                    Welcome back
                </p>

                <h2 class="font-bold text-lg">
                    Admin Dashboard
                </h2>

            </div>

        </div>


        <div class="flex items-center gap-2 sm:gap-3">

            <button
                id="darkModeToggle"
                class="
                    w-10
                    h-10
                    rounded-xl
                    bg-slate-100
                    hover:bg-slate-200
                    dark:bg-slate-800
                    dark:hover:bg-slate-700
                    flex
                    items-center
                    justify-center
                "
            >
                <i
                    id="themeIcon"
                    class="fa-solid fa-moon"
                ></i>
            </button>


            <button
                class="
                    relative
                    w-10
                    h-10
                    rounded-xl
                    bg-slate-100
                    hover:bg-slate-200
                    dark:bg-slate-800
                    dark:hover:bg-slate-700
                    flex
                    items-center
                    justify-center
                "
            >

                <i class="fa-regular fa-bell"></i>

                <span
                    class="
                        absolute
                        top-2
                        right-2
                        w-2
                        h-2
                        rounded-full
                        bg-red-500
                        border-2
                        border-white
                        dark:border-slate-900
                    "
                ></span>

            </button>


            <div class="relative">

                <button
                    id="profileButton"
                    class="flex items-center gap-3"
                >

                    <img
                        src="https://i.pravatar.cc/100?img=12"
                        class="
                            w-10
                            h-10
                            rounded-full
                            object-cover
                            ring-2
                            ring-primary-100
                        "
                        alt="Admin"
                    >

                    <div class="hidden md:block text-left">

                        <p class="text-sm font-bold">
                            IT MASUD
                        </p>

                        <p class="text-xs text-slate-400">
                            Administrator
                        </p>

                    </div>

                    <i class="fa-solid fa-chevron-down text-xs text-slate-400"></i>

                </button>


                <div
                    id="profileMenu"
                    class="
                        hidden
                        absolute
                        right-0
                        mt-3
                        w-56
                        bg-white
                        dark:bg-slate-900
                        border
                        border-slate-200
                        dark:border-slate-800
                        rounded-2xl
                        shadow-soft
                        p-2
                    "
                >

                    <a
                        href="profile.php"
                        class="
                            flex
                            items-center
                            gap-3
                            px-4
                            py-3
                            rounded-xl
                            hover:bg-slate-100
                            dark:hover:bg-slate-800
                        "
                    >
                        <i class="fa-regular fa-user"></i>
                        Profile
                    </a>

                    <a
                        href="settings.php"
                        class="
                            flex
                            items-center
                            gap-3
                            px-4
                            py-3
                            rounded-xl
                            hover:bg-slate-100
                            dark:hover:bg-slate-800
                        "
                    >
                        <i class="fa-solid fa-gear"></i>
                        Settings
                    </a>

                    <div class="my-2 border-t border-slate-200 dark:border-slate-800"></div>

                    <a
                        href="logout.php"
                        class="
                            flex
                            items-center
                            gap-3
                            px-4
                            py-3
                            rounded-xl
                            text-red-500
                            hover:bg-red-50
                            dark:hover:bg-red-950/30
                        "
                    >
                        <i class="fa-solid fa-right-from-bracket"></i>
                        Logout
                    </a>

                </div>

            </div>

        </div>

    </div>

</header>