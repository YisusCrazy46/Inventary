
 

<nav class="navbar" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item" href="index.php?vista=home">
      <img src="./img/SUP.png" width="300" height="800">
    </a>

    <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>

  <div id="navbarBasicExample" class="navbar-menu">
    <div class="navbar-start">
     
    <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link">
               Usuarios
                </a>

                <div class="navbar-dropdown">
                    <a class="navbar-item"href="index.php?vista=user_new">Nuevo</a>
                    <a class="navbar-item"href="index.php?vista=user_list">Listar</a>
                    <a class="navbar-item"href="index.php?vista=user_search">Buscar</a>
                    
                    
                    </a>
                </div>
                </div>
      <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link">
                Equipos
                </a>

                <div class="navbar-dropdown">
                    <a class="navbar-item"href="index.php?vista=equi_new">Nuevo</a>
                    <a class="navbar-item"href="index.php?vista=equi_listar">Listar</a>
                    <a class="navbar-item"href="index.php?vista=equi_buscar">Buscar</a>
                    
                    
                    </a>
                </div>
                </div>
                <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link">
                Colaborador
                </a>

                <div class="navbar-dropdown">
                <a class="navbar-item"href="index.php?vista=colabor_new">Nuevo</a>
                    <a class="navbar-item"href="index.php?vista=colabor_listar">Listar</a>
                    <a class="navbar-item"href="index.php?vista=colabor_buscar">Buscar</a>
                   
                </div>
                </div>
                <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link">
                Responsivas
                </a>

                <div class="navbar-dropdown">
                <a class="navbar-item"href="index.php?vista=resp_new">Nueva</a>
                    <a class="navbar-item"href="index.php?vista=resp_listar">Listar</a>
                    <a class="navbar-item"href="index.php?vista=resp_buscar">Buscar</a>
                   
                    
                   
                    </a>
                </div>
                </div>
               
                
            </div>
            </div>

    <div class="navbar-end">
      <div class="navbar-item">
        <div class="buttons">
        <a href="index.php?vista=informacion" class="button is-danger is-rounded is-hovered" >
          Informacion
            
          </a>
          <a href="index.php?vista=logout"  class="button is-danger is-rounded is-outlined">Salir

          </a>
        </div>
      </div>
    </div>
  </div>
</nav>