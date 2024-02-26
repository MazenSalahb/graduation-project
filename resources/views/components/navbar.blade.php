<nav class="nav">
    <div class="rightNav">
        <a href="/"><img src="{{ asset('images/navicon.png') }}" alt="nav icon" /></a>
        @auth
            <span>/اهلا mazen.edu&commat;</span>
        @else
            <span>/اهلا بكم</span>
        @endauth
    </div>

    <div class="midNav">
        <span>الاخبار .</span>
        <span> المساهمة .</span>
        <span> تواصل معنا</span>
    </div>

    <div class="leftNav">
        @auth
            <a href="/" class="login">تسجيل خروج</a>
        @else
            <a href="/" class="login">تسجيل دخول</a>
            <a href="/" class="joinNow">سجل الآن</a>
        @endauth
    </div>
</nav>
