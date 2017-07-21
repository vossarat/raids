<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
        <!-- Название компании и кнопка, которая отображается для мобильных устройств группируются для лучшего отображения при сужении -->
        <div class="navbar-header">
            <a class="navbar-brand" href="#">...</a>
        </div>

        <!-- Группируем ссылки, формы, выпадающее меню и прочие элементы -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li> <!--class="active"-->
                    <a href="#">Link 1</a>
                </li>
                <li>
                    <a href="#">Link 2</a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Cправочники
                        <b class="caret"></b> <!--Стрелка вниз-->
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="/region">МО и регионы</a>
                        </li>
                        <li class="divider"></li> <!--Separator-->
                        <li>
                            <a href="#">Another action</a>
                        </li>                        
                    </ul>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown 2
                        <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#">Logout</a>
                        </li>

                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>