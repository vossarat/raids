<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container-fluid">

        <!-- Группируем ссылки, формы, выпадающее меню и прочие элементы -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <img src="/images/sidasz.png" class="img-responsive"> 
                </li>
                <li> <!--class="active"-->
                    <a href="/">Ввод данных</a>
                </li>
                <li>
                    <a href="/setup">Настройка</a>
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
                            <a href="/code">Коды</a>
                        </li>
                        <li class="divider"></li> <!--Separator-->
                        <li>
                            <a href="#">Пользователи</a>
                        </li>                        
                    </ul>
                </li> 
                
                <li class="dropdown"> 
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Отчеты
                        <b class="caret"></b> <!--Стрелка вниз-->
                    </a>
                    <ul class="dropdown-menu">
                        
                        <li class="dropdown-submenu"> 
                            <a tabindex="-1" href="#">Форма 4</a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a tabindex="-1" href="/reports/form4bygender">По полу</a>
                                </li>
                                <li>
                                    <a tabindex="-1" href="/reports/form4bycomparison">В сравнении</a>
                                </li>
                            </ul>
                        </li> 
                        
                        <li class="divider"></li> <!--Separator-->
                        
                        <li><a href="/reports/countbyregion">Кол-во по МО</a></li>
                        
                         <li class="divider"></li> <!--Separator-->
                        
                        <li><a href="/reports/list">Список</a></li>
                    </ul> 
                </li>                
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    	   <i class="fa fa-user"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="<?php echo e(route('logout')); ?>"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i class="fa fa-sign-out"></i> Выход
                                        </a>

                                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                            <?php echo e(csrf_field()); ?>

                                        </form>
                        </li>

                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>