<aside>
<div class="">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="person-circle-outline"></ion-icon>
                        </span>
                        <span class="title">{{ Auth::user()->name }} {{ Auth::user()->role }}</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('accueil') }}">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Site public</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('dashboard') }}">
                        <span class="icon">
                        <ion-icon name="speedometer-outline"></ion-icon>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('list_categorie') }}">
                        <span class="icon">
                            <ion-icon name="basket-sharp"></ion-icon>
                        </span>
                        <span class="title">Gestion catégories</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('list_product') }}">
                        <span class="icon">
                            <ion-icon name="podium-sharp"></ion-icon>
                        </span>
                        <span class="title">Gestion produits</span>
                    </a>
                </li>
                @if(auth()->user()->role != 'user')
                <li>
                    <a href="{{ route('user') }}">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">Gestions utilisateurs</span>
                    </a>
                </li>
                @endif
                <li>
                    <a href="{{route('profile.edit')}}">
                        <span class="icon">
                            <ion-icon name="settings-outline"></ion-icon>
                        </span>
                        <span class="title">Edition infos du compte</span>
                    </a>
                </li>
            </ul>
        </div> 
</aside>