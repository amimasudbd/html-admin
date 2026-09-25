document.addEventListener('DOMContentLoaded', () => {

    const sidebar = document.getElementById('sidebar');
    const sidebarToggle = document.getElementById('sidebarToggle');
    const sidebarClose = document.getElementById('sidebarClose');
    const sidebarOverlay = document.getElementById('sidebarOverlay');

    const darkModeToggle = document.getElementById('darkModeToggle');
    const themeIcon = document.getElementById('themeIcon');

    const profileButton = document.getElementById('profileButton');
    const profileMenu = document.getElementById('profileMenu');


    function openSidebar() {

        sidebar.classList.add('sidebar-open');
        sidebarOverlay.classList.remove('hidden');

    }


    function closeSidebar() {

        sidebar.classList.remove('sidebar-open');
        sidebarOverlay.classList.add('hidden');

    }


    if (sidebarToggle) {

        sidebarToggle.addEventListener('click', () => {

            if (window.innerWidth < 1024) {

                openSidebar();

            }

        });

    }


    if (sidebarClose) {

        sidebarClose.addEventListener('click', closeSidebar);

    }


    if (sidebarOverlay) {

        sidebarOverlay.addEventListener('click', closeSidebar);

    }


    window.addEventListener('resize', () => {

        if (window.innerWidth >= 1024) {

            sidebarOverlay.classList.add('hidden');

            sidebar.classList.remove('sidebar-open');

        }

    });


    function updateThemeIcon() {

        if (document.documentElement.classList.contains('dark')) {

            themeIcon.classList.remove('fa-moon');

            themeIcon.classList.add('fa-sun');

        } else {

            themeIcon.classList.remove('fa-sun');

            themeIcon.classList.add('fa-moon');

        }

    }


    const savedTheme = localStorage.getItem('admin-theme');

    if (savedTheme === 'dark') {

        document.documentElement.classList.add('dark');

    }

    updateThemeIcon();


    if (darkModeToggle) {

        darkModeToggle.addEventListener('click', () => {

            document.documentElement.classList.toggle('dark');

            const isDark =
                document.documentElement.classList.contains('dark');

            localStorage.setItem(
                'admin-theme',
                isDark ? 'dark' : 'light'
            );

            updateThemeIcon();

        });

    }


    if (profileButton && profileMenu) {

        profileButton.addEventListener('click', (event) => {

            event.stopPropagation();

            profileMenu.classList.toggle('hidden');

        });


        document.addEventListener('click', (event) => {

            if (
                !profileMenu.contains(event.target) &&
                !profileButton.contains(event.target)
            ) {

                profileMenu.classList.add('hidden');

            }

        });

    }

});