<aside class="aside-navigation">
    <nav class="main-navigation">
        <ul>
            <li>
                <div class="profile-container">
                    <div class="left-side-wrapper">
                        <img src="src/pics/img-2.jpg" alt="profile image">
                        <div class="current-level"><?php echo $_SESSION['user_level']; ?></div>
                    </div>
                    <div class="profile-information">
                        <div><?php echo $_SESSION['user_first_name']; ?></div>
                        <?php if(!empty($_SESSION['user_last_name'])): ?>
                            <div><?php echo $_SESSION['user_last_name']; ?></div>
                        <?php endif; ?>
                    </div>
                </div>
            </li>
            <li class="today">
                <a href="<?php echo URLROOT; ?>">Today</a>
            </li>
            <li class="done-todos">
                <a href="<?php echo URLROOT . '/done-todo'; ?>">Done Todos</a>
            </li>
            <li class="settings">
                <a href="#">Settings</a>
            </li>
            <li>
                <form action="./?action=logout" method="post">
                    <button class="logout" type="submit">Logout</button>
                </form>
            </li>
        </ul>
    </nav>
    <div class="copyright">
        <p>&copy; Copyright <?php echo date('Y'); ?> by Dawid Oleksiuk. All rights reserved.</p>
    </div>
</aside>