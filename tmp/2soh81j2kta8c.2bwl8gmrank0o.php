<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link <?php if ($titolo=='Homepage'): ?>active<?php endif; ?> " href="#">
            <span data-feather="home"></span>
            Homepage 
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if ($titolo=='Nuovo'): ?>active<?php endif; ?>" href="#">
            <span data-feather="file"></span>
            Nuovo 
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <span data-feather="layers"></span>
            Lista
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <span data-feather="bar-chart-2"></span>
            Statistiche
          </a>
        </li>
        
      </ul>
    </div>
  </nav>