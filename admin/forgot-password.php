<?php

session_start();

include '../includes/db.php';

$message = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = trim($_POST['email'] ?? '');

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $error = 'Please enter a valid email address.';

    } else {

        try {

            $stmt = $conn->prepare("
                SELECT id
                FROM admins
                WHERE email = ?
                AND status = 1
                LIMIT 1
            ");

            $stmt->execute([$email]);

            $admin = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($admin) {

                $token = bin2hex(random_bytes(32));

                $expires = date(
                    'Y-m-d H:i:s',
                    time() + 3600
                );

                $update = $conn->prepare("
                    UPDATE admins
                    SET reset_token = ?,
                        reset_expires_at = ?
                    WHERE id = ?
                ");

                $update->execute([
                    hash('sha256', $token),
                    $expires,
                    $admin['id']
                ]);

                $resetLink =
                    'https://yourdomain.com/admin/reset-password.php?token='
                    . urlencode($token);

                $subject = 'Admin Password Reset';

                $body =
                    "Click the following link to reset your password:\n\n"
                    . $resetLink
                    . "\n\nThis link will expire in 1 hour.";

                $headers =
                    "From: noreply@yourdomain.com\r\n"
                    . "Reply-To: noreply@yourdomain.com\r\n"
                    . "Content-Type: text/plain; charset=UTF-8";

                @mail(
                    $email,
                    $subject,
                    $body,
                    $headers
                );

            }

            $message =
                'If the email exists in our system, a password reset link has been sent.';

        } catch (PDOException $e) {

            $error =
                'Something went wrong. Please try again.';

        }

    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Forgot Password</title>

    <script src="https://cdn.tailwindcss.com"></script>

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
        flex
        items-center
        justify-center
        p-4
    "
>

<div
    class="
        w-full
        max-w-md
        bg-white
        rounded-3xl
        shadow-2xl
        p-6
        sm:p-10
    "
>

    <div class="text-center mb-8">

        <div
            class="
                mx-auto
                w-14
                h-14
                rounded-2xl
                bg-blue-100
                text-blue-600
                flex
                items-center
                justify-center
                text-xl
            "
        >
            <i class="fa-solid fa-key"></i>
        </div>

        <h1 class="mt-5 text-2xl font-extrabold">
            Forgot Password?
        </h1>

        <p class="mt-2 text-sm text-slate-500">
            Enter your registered email address.
        </p>

    </div>


    <?php if ($message): ?>

        <div
            class="
                mb-5
                p-4
                rounded-xl
                bg-emerald-50
                border
                border-emerald-200
                text-emerald-700
                text-sm
            "
        >
            <?= htmlspecialchars($message) ?>
        </div>

    <?php endif; ?>


    <?php if ($error): ?>

        <div
            class="
                mb-5
                p-4
                rounded-xl
                bg-red-50
                border
                border-red-200
                text-red-600
                text-sm
            "
        >
            <?= htmlspecialchars($error) ?>
        </div>

    <?php endif; ?>


    <form method="POST" class="space-y-5">

        <div>

            <label
                for="email"
                class="block text-sm font-semibold mb-2"
            >
                Email Address
            </label>

            <div class="relative">

                <i
                    class="
                        fa-regular
                        fa-envelope
                        absolute
                        left-4
                        top-1/2
                        -translate-y-1/2
                        text-slate-400
                    "
                ></i>

                <input
                    type="email"
                    id="email"
                    name="email"
                    placeholder="admin@example.com"
                    class="
                        w-full
                        h-12
                        pl-11
                        pr-4
                        rounded-xl
                        border
                        border-slate-200
                        bg-slate-50
                        outline-none
                        focus:border-blue-500
                        focus:ring-2
                        focus:ring-blue-500/20
                    "
                    required
                >

            </div>

        </div>


        <button
            type="submit"
            class="
                w-full
                h-12
                rounded-xl
                bg-blue-600
                hover:bg-blue-700
                text-white
                font-bold
                transition
            "
        >
            Send Reset Link
        </button>

    </form>


    <a
        href="login.php"
        class="
            mt-6
            flex
            items-center
            justify-center
            gap-2
            text-sm
            font-semibold
            text-blue-600
        "
    >
        <i class="fa-solid fa-arrow-left"></i>
        Back to Login
    </a>

</div>

</body>

</html>