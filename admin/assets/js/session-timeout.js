document.addEventListener('DOMContentLoaded', () => {

    const timeoutDuration = 10 * 60 * 1000;

    const warningDuration = 60 * 1000;

    let inactivityTimer;
    let warningTimer;

    let warningShown = false;


    const warningBox = document.createElement('div');

    warningBox.id = 'sessionWarning';

    warningBox.className = `
        fixed
        bottom-5
        right-5
        z-[9999]
        hidden
        w-[calc(100%-2rem)]
        max-w-sm
        rounded-2xl
        bg-white
        dark:bg-slate-900
        border
        border-amber-200
        dark:border-amber-900
        shadow-2xl
        p-5
    `;

    warningBox.innerHTML = `
        <div class="flex items-start gap-4">

            <div
                class="
                    w-11
                    h-11
                    shrink-0
                    rounded-xl
                    bg-amber-100
                    text-amber-600
                    flex
                    items-center
                    justify-center
                "
            >
                <i class="fa-solid fa-clock"></i>
            </div>

            <div class="flex-1">

                <h3
                    class="
                        font-bold
                        text-slate-900
                        dark:text-white
                    "
                >
                    Session Expiring
                </h3>

                <p
                    class="
                        mt-1
                        text-sm
                        text-slate-500
                        dark:text-slate-400
                    "
                >
                    You will be logged out due to inactivity.
                </p>

                <p
                    id="sessionCountdown"
                    class="
                        mt-2
                        text-sm
                        font-bold
                        text-amber-600
                    "
                ></p>

                <div class="flex gap-2 mt-4">

                    <button
                        id="stayLoggedIn"
                        type="button"
                        class="
                            px-4
                            py-2
                            rounded-lg
                            bg-primary-600
                            hover:bg-primary-700
                            text-white
                            text-sm
                            font-semibold
                        "
                    >
                        Stay Logged In
                    </button>

                    <a
                        href="logout.php"
                        class="
                            px-4
                            py-2
                            rounded-lg
                            bg-slate-100
                            dark:bg-slate-800
                            text-slate-700
                            dark:text-slate-200
                            text-sm
                            font-semibold
                        "
                    >
                        Logout
                    </a>

                </div>

            </div>

        </div>
    `;


    document.body.appendChild(warningBox);


    const countdown =
        warningBox.querySelector('#sessionCountdown');

    const stayLoggedIn =
        warningBox.querySelector('#stayLoggedIn');


    function hideWarning() {

        warningBox.classList.add('hidden');

        warningShown = false;

        clearInterval(warningTimer);

    }


    function resetTimers() {

        clearTimeout(inactivityTimer);

        clearTimeout(warningTimer);

        hideWarning();


        inactivityTimer = setTimeout(() => {

            showWarning();

        }, timeoutDuration - warningDuration);

    }


    function showWarning() {

        if (warningShown) {
            return;
        }

        warningShown = true;

        warningBox.classList.remove('hidden');

        let remaining =
            Math.floor(warningDuration / 1000);


        countdown.textContent =
            `Logging out in ${remaining} seconds.`;


        warningTimer = setInterval(() => {

            remaining--;

            countdown.textContent =
                `Logging out in ${remaining} seconds.`;


            if (remaining <= 0) {

                clearInterval(warningTimer);

                window.location.href =
                    'logout.php?timeout=1';

            }

        }, 1000);

    }


    if (stayLoggedIn) {

        stayLoggedIn.addEventListener('click', async () => {

            try {

                const response =
                    await fetch('includes/session-refresh.php', {
                        method: 'POST',
                        credentials: 'same-origin'
                    });


                if (response.ok) {

                    resetTimers();

                }

            } catch (error) {

                resetTimers();

            }

        });

    }


    const activityEvents = [
        'mousemove',
        'mousedown',
        'keydown',
        'scroll',
        'touchstart',
        'click'
    ];


    let activityThrottle = false;


    activityEvents.forEach(eventName => {

        document.addEventListener(
            eventName,
            () => {

                if (activityThrottle) {
                    return;
                }

                activityThrottle = true;

                setTimeout(() => {

                    activityThrottle = false;

                }, 1000);

                resetTimers();

            },
            {
                passive: true
            }
        );

    });


    resetTimers();

});