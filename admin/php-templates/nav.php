<nav class="navbar navbar-expand-lg navbar-dark bg-white">

    <img class="logo" src="../assets/sleepy_text.png" height="80" alt="logo">
    <img class="logo2" src="../assets/moon.png" height="60">

    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
        <ul class="navbar-nav ml-auto ">
            <li>
                <a class="nav-link <?php echo $page === 'inbox' ? "text-warning border-bottom border-warning" : 'text-dark'
                                    ?>" <?php echo $page === 'inbox' ? "type=\"button\"" : "href=\"inquiries.php\"" ?>> Inbox &nbsp;
                    <i class="fas fa-envelope" style="color:#D8C47F;"></i>
                </a>
            </li>
            <li>
                <a class="nav-link  <?php echo $page === 'profile' ? "text-warning border-bottom border-warning" : 'text-dark'
                                    ?>" <?php echo $page === 'profile' ? "type=\"button\"" : "href=\"profile.php\"" ?>> Profile &nbsp;
                    <i class="fas fa-user" style="color:#D8C47F;"></i>
                </a>
            </li>
            <li>
                <form method="post">
                    <input class="btn ml-2 btn-secondary" type="submit" name="logout" value='Logout' />
                </form>
            </li>
        </ul>
    </div>
</nav>