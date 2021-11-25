<nav class="navbar navbar-expand-lg navbar-dark bg-white">

    <img class="logo" src="../assets/sleepy_text.png" height="80" alt="logo">
    <img class="logo2" src="../assets/moon.png" height="60">
    <!-- collapse dual-collapse2-->
    <div class="navbar-collapse  w-100 order-3 ">
        <ul class="navbar-nav ml-auto ">
            <li class="m-2">
                <a class="nav-link <?php echo $page === 'inbox' ? "active-tab" : 'text-dark'
                                    ?>" <?php echo $page === 'inbox' ? "type=\"button\"" : "href=\"inquiries.php\"" ?>> Inbox &nbsp;
                    <i class="fas fa-envelope" style="color:#D8C47F;"></i>
                </a>
            </li>
            <li class="m-2">
                <a class="nav-link  <?php echo $page === 'profile' ? "active-tab" : 'text-dark'
                                    ?>" <?php echo $page === 'profile' ? "type=\"button\"" : "href=\"profile.php\"" ?>> Profile &nbsp;
                    <i class="fas fa-user" style="color:#D8C47F;"></i>
                </a>
            </li>
            <li class="m-2 ">
                <form method="post">
                    <input class="btn btn-secondary w-100" type="submit" name="logout" value='Logout' />
                </form>
            </li>
        </ul>
    </div>
</nav>