<?php
// Start the session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['login']) || !$_SESSION['login']) {
    header('Location: ../login/login.html');
    exit();
}

$profileImage = isset($_SESSION['profile_image']) ? $_SESSION['profile_image'] : 'default.png';
$fullName = isset($_SESSION['name']) ? $_SESSION['name'] : 'User';
?>

<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-light custom-navbar">
    <div class="container-fluid">
        <div class="collapse navbar-collapse justify-content-end">
            <?php if (!empty($profileImage) && file_exists("../profile_images/" . $profileImage)): ?>
                <img src="../profile_images/<?php echo htmlspecialchars($profileImage); ?>" alt="Profile Image" style="width: 40px; height: 40px; border-radius: 30px;">
            <?php else: ?>
                <img src="../profile_images/default.png" alt="Default Image" style="width: 40px; height: 40px; border-radius: 30px;">
            <?php endif; ?>
            <div class="nav-container d-flex align-items-center ms-3">
                <p class="mb-0 text-white"><?php echo htmlspecialchars($fullName); ?></p>&nbsp;&nbsp;
                <div class="btn-group">
                    <button type="button" class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        Logout
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="../login/login.html">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>
