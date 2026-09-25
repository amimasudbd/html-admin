<?php

session_start();

require_once __DIR__ . '/includes/db.php';


if (isset($_SESSION['admin_id'])) {

    $stmt = $conn->prepare("
        SELECT status
        FROM admins
        WHERE id = ?
        LIMIT 1
    ");

    $stmt->execute([
        $_SESSION['admin_id']
    ]);

    $admin = $stmt->fetch(PDO::FETCH_ASSOC);


    if (
        $admin &&
        (int)$admin['status'] === 1
    ) {

        header('Location: dashboard.php');
        exit;

    }


    $_SESSION = [];

    session_destroy();

}


$logoutMessage = '';

if (isset($_GET['logout'])) {

    $logoutMessage =
        'You have been logged out successfully.';

}




$error = '';

$timeoutMessage = '';

if (isset($_GET['timeout'])) {

    $timeoutMessage =
        'Your session expired due to inactivity. Please login again.';

}

if (isset($_GET['disabled'])) {

    $error =
        'Your admin account is inactive. Please contact the administrator.';

}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($username === '' || $password === '') {

        $error = 'Username and password are required.';

    } else {

        try {

            $stmt = $conn->prepare("
                SELECT *
                FROM admins
                WHERE username = ?
                LIMIT 1
            ");

            $stmt->execute([$username]);

            $admin = $stmt->fetch(PDO::FETCH_ASSOC);

            if (
                $admin &&
                (int)$admin['status'] === 1 &&
                password_verify($password, $admin['password'])
            ) {

                session_regenerate_id(true);

                $_SESSION['admin_id'] = $admin['id'];
                $_SESSION['admin_username'] = $admin['username'];
                $_SESSION['admin_name'] = $admin['name'];
                $_SESSION['login_time'] = time();
                $_SESSION['last_activity'] = time();

                $update = $conn->prepare("
                    UPDATE admins
                    SET last_login_at = NOW()
                    WHERE id = ?
                ");

                $update->execute([$admin['id']]);

                header('Location: dashboard.php');
                exit;

            } else {

                $error = 'Invalid username or password.';

            }

        } catch (PDOException $e) {

            $error = 'Something went wrong. Please try again.';

        }

    }
}

?>


<?php if ($logoutMessage): ?>

    <div
        class="
            mb-6
            flex
            items-start
            gap-3
            p-4
            rounded-xl
            bg-emerald-50
            border
            border-emerald-200
            text-emerald-700
            text-sm
        "
    >

        <i class="fa-solid fa-circle-check mt-0.5"></i>

        <span>
            <?= htmlspecialchars($logoutMessage) ?>
        </span>

    </div>

<?php endif; ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Admin Login</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <script>

        tailwind.config = {

            darkMode: 'class',

            theme: {

                extend: {

                    colors: {

                        primary: {
                            500: '#3b82f6',
                            600: '#2563eb',
                            700: '#1d4ed8'
                        }

                    }

                }

            }

        };

    </script>

    <link
        rel="preconnect"
        href="https://fonts.googleapis.com"
    >

    <link
        rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin
    >

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    >

</head>


<body
    class="
        min-h-screen
        bg-slate-100
        dark:bg-slate-950
        flex
        items-center
        justify-center
        p-4
    "
>


<div
    class="
        fixed
        inset-0
        overflow-hidden
        pointer-events-none
    "
>

    <div
        class="
            absolute
            -top-40
            -left-40
            w-96
            h-96
            bg-blue-500/20
            rounded-full
            blur-3xl
        "
    ></div>

    <div
        class="
            absolute
            -bottom-40
            -right-40
            w-96
            h-96
            bg-violet-500/20
            rounded-full
            blur-3xl
        "
    ></div>

</div>


<div
    class="
        relative
        w-full
        max-w-5xl
        bg-white
        dark:bg-slate-900
        rounded-3xl
        shadow-2xl
        overflow-hidden
        grid
        grid-cols-1
        lg:grid-cols-2
    "
>


    <div
        class="
            hidden
            lg:flex
            relative
            p-12
            bg-gradient-to-br
            from-primary-700
            via-primary-600
            to-violet-600
            text-white
            flex-col
            justify-between
        "
    >

        <div>

            <div class="flex items-center gap-3">

                <div
                    class="
                        w-12
                        h-12
                        rounded-2xl
                        bg-white/15
                        backdrop-blur
                        flex
                        items-center
                        justify-center
                    "
                >
                    <i class="fa-solid fa-layer-group text-xl"></i>
                </div>

                <div>

                    <h1 class="text-xl font-extrabold">
                        AdminPanel
                    </h1>

                    <p class="text-sm text-white/70">
                        Management System
                    </p>

                </div>

            </div>


            <div class="mt-20">

                <p
                    class="
                        text-sm
                        font-semibold
                        uppercase
                        tracking-widest
                        text-white/60
                    "
                >
                    Welcome Back
                </p>

                <h2
                    class="
                        mt-4
                        text-4xl
                        xl:text-5xl
                        font-extrabold
                        leading-tight
                    "
                >
                    Manage everything
                    from one place.
                </h2>

                <p
                    class="
                        mt-6
                        text-white/70
                        leading-7
                        max-w-md
                    "
                >
                    Access your administration panel,
                    manage users, courses, students,
                    reports and system settings.
                </p>

            </div>

        </div>


        <div class="flex items-center gap-3 text-sm text-white/60">

            <i class="fa-solid fa-shield-halved"></i>

            <span>
                Secure administration environment
            </span>

        </div>

    </div>



    <div class="p-6 sm:p-10 lg:p-12">

        <div class="lg:hidden mb-8">

            <div class="flex items-center gap-3">

                <div
                    class="
                        w-11
                        h-11
                        rounded-xl
                        bg-gradient-to-br
                        from-primary-500
                        to-violet-600
                        flex
                        items-center
                        justify-center
                        text-white
                    "
                >
                    <i class="fa-solid fa-layer-group"></i>
                </div>

                <div>

                    <h1 class="font-extrabold text-lg">
                        AdminPanel
                    </h1>

                    <p class="text-xs text-slate-400">
                        Management System
                    </p>

                </div>

            </div>

        </div>


        <div class="mb-8">

            <h2
                class="
                    text-2xl
                    sm:text-3xl
                    font-extrabold
                    text-slate-900
                    dark:text-white
                "
            >
                Sign in
            </h2>

            <p
                class="
                    mt-2
                    text-sm
                    text-slate-500
                    dark:text-slate-400
                "
            >
                Enter your credentials to access your account.
            </p>

        </div>


            <?php if ($error): ?>

                <div
                    class="
                        mb-6
                        flex
                        items-start
                        gap-3
                        p-4
                        rounded-xl
                        bg-red-50
                        dark:bg-red-950/30
                        border
                        border-red-200
                        dark:border-red-900
                        text-red-600
                        dark:text-red-400
                        text-sm
                    "
                >

                    <i class="fa-solid fa-circle-exclamation mt-0.5"></i>

                    <span>
                        <?= htmlspecialchars($error) ?>
                    </span>

                </div>

            <?php endif; ?>

            <?php if ($timeoutMessage): ?>

        <div
            class="
                mb-6
                flex
                items-start
                gap-3
                p-4
                rounded-xl
                bg-amber-50
                border
                border-amber-200
                text-amber-700
                text-sm
            "
        >

            <i class="fa-solid fa-clock mt-0.5"></i>

            <span>
                <?= htmlspecialchars($timeoutMessage) ?>
            </span>

        </div>

    <?php endif; ?>


        <form method="POST" class="space-y-5">


            <div>

                <label
                    for="username"
                    class="
                        block
                        text-sm
                        font-semibold
                        mb-2
                    "
                >
                    Username
                </label>

                <div class="relative">

                    <i
                        class="
                            fa-regular
                            fa-user
                            absolute
                            left-4
                            top-1/2
                            -translate-y-1/2
                            text-slate-400
                        "
                    ></i>

                    <input
                        type="text"
                        id="username"
                        name="username"
                        autocomplete="username"
                        placeholder="Enter your username"
                        class="
                            w-full
                            h-12
                            pl-11
                            pr-4
                            rounded-xl
                            border
                            border-slate-200
                            dark:border-slate-700
                            bg-slate-50
                            dark:bg-slate-800
                            outline-none
                            focus:ring-2
                            focus:ring-primary-500/20
                            focus:border-primary-500
                            transition
                        "
                        required
                    >

                </div>

            </div>


            <div>

                <div class="flex items-center justify-between mb-2">

                    <label
                        for="password"
                        class="
                            text-sm
                            font-semibold
                        "
                    >
                        Password
                    </label>

                    <a
                        href="forgot-password.php"
                        class="
                            text-sm
                            font-semibold
                            text-primary-600
                            hover:text-primary-700
                        "
                    >
                        Forgot password?
                    </a>

                </div>


                <div class="relative">

                    <i
                        class="
                            fa-solid
                            fa-lock
                            absolute
                            left-4
                            top-1/2
                            -translate-y-1/2
                            text-slate-400
                        "
                    ></i>

                    <input
                        type="password"
                        id="password"
                        name="password"
                        autocomplete="current-password"
                        placeholder="Enter your password"
                        class="
                            w-full
                            h-12
                            pl-11
                            pr-12
                            rounded-xl
                            border
                            border-slate-200
                            dark:border-slate-700
                            bg-slate-50
                            dark:bg-slate-800
                            outline-none
                            focus:ring-2
                            focus:ring-primary-500/20
                            focus:border-primary-500
                            transition
                        "
                        required
                    >

                    <button
                        type="button"
                        id="togglePassword"
                        class="
                            absolute
                            right-4
                            top-1/2
                            -translate-y-1/2
                            text-slate-400
                            hover:text-primary-600
                        "
                    >
                        <i
                            id="passwordIcon"
                            class="fa-regular fa-eye"
                        ></i>
                    </button>

                </div>

            </div>


            <div class="flex items-center gap-2">

                <input
                    type="checkbox"
                    id="remember"
                    name="remember"
                    class="
                        w-4
                        h-4
                        rounded
                        border-slate-300
                        text-primary-600
                        focus:ring-primary-500
                    "
                >

                <label
                    for="remember"
                    class="
                        text-sm
                        text-slate-500
                        dark:text-slate-400
                    "
                >
                    Remember me
                </label>

            </div>


            <button
                type="submit"
                class="
                    w-full
                    h-12
                    rounded-xl
                    bg-gradient-to-r
                    from-primary-600
                    to-violet-600
                    hover:from-primary-700
                    hover:to-violet-700
                    text-white
                    font-bold
                    shadow-lg
                    shadow-primary-600/20
                    transition
                    flex
                    items-center
                    justify-center
                    gap-2
                "
            >

                <i class="fa-solid fa-right-to-bracket"></i>

                Sign In

            </button>

        </form>


        <div
            class="
                mt-8
                pt-6
                border-t
                border-slate-200
                dark:border-slate-800
                text-center
            "
        >

            <p class="text-xs text-slate-400">

                Protected administration panel

            </p>

        </div>

    </div>

</div>


<script>

const togglePassword =
    document.getElementById('togglePassword');

const password =
    document.getElementById('password');

const passwordIcon =
    document.getElementById('passwordIcon');


if (togglePassword) {

    togglePassword.addEventListener('click', () => {

        const isPassword =
            password.type === 'password';

        password.type =
            isPassword ? 'text' : 'password';

        passwordIcon.classList.toggle(
            'fa-eye',
            !isPassword
        );

        passwordIcon.classList.toggle(
            'fa-eye-slash',
            isPassword
        );

    });

}

</script>

</body>

</html>