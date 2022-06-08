<header class="flex flex-row py-10 px-40 justify-between">
    <div class="p-6">
        <h1 class="text-4xl">W@C annonces</h1>
    </div>
    <div class="flex flex-row">
        <div class="p-6 ">
            <a href="http://127.0.0.1:8000/test1">edit annonce</a>
        </div>
        <div class="p-6">
            <a href="http://127.0.0.1:8000/">Home</a>
        </div>
        <div class="p-6">
            <a href="http://127.0.0.1:8000/form">Create annonce</a>
        </div>
        <div class="p-6">
            <a href="http://127.0.0.1:8000/s">Search</a>
        </div>
        <div class="p-6">
            <a href="http://127.0.0.1:8000/editpro">edit profile</a>
        </div>
        <div class="p-6">
            <a href="http://127.0.0.1:8000/listchat">Messages</a>
        </div>
        <div class="p-6">
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>

    </div>
</header>

