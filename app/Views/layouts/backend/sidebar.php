<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
        <a href="index.html">Stilus</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">St</a>
        </div>

        <ul class="sidebar-menu">
            <li class="menu-header">Principal</li>
            
            <li><a class="nav-link" href="blank.html"><i class="fas fa-th-large"></i> <span>Listar Produtos</span></a></li>
            
            <?php if(session("userInfo")->usr_usuario_tipo_id == 1 ):?>
                <li><a class="nav-link" href="blank.html"><i class="far fa-user"></i> <span>Listar Usuários</span></a></li>
            <?php endif; ?>

            <li><a class="nav-link" href="blank.html"><i class="fas fa-bicycle"></i> <span>Listar Pedidos</span></a></li>

        </ul>
    </aside>
</div>