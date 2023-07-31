<header>
    <div class="header-border">
        <a class="exit_button" href="/exit" title="Выйти"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
        <ul>
            <li class="header-user-name"><i class="fa-solid fa-circle-user fa-2xl">
                </i> <?=isset($_SESSION['user_name']) ? $_SESSION['user_name']: ''?></li>
            <li><a class="menu_item" href="/settings"> Настройки</a></li>
            <li><a class="menu_item" href="/goods">Товары</a></li>
            <li><a class="menu_item" href="/users">Пользователи</a></li>
        </ul>
    </div>
</header>


<!--скрипт для подсветки активного пункта меню-->
<script>
    let allMenuItems = document.querySelectorAll('.menu_item');
    allMenuItems.forEach((item)=>{
        if (item.getAttribute('href') == window.location.pathname) item.classList.add('active')
    })
</script>