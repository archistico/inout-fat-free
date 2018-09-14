<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link <?php if ($titolo=='Homepage'): ?>active<?php endif; ?> " href="<?= (Base::instance()->alias('homepage')) ?>">
            <span data-feather="home"></span>
            Homepage 
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if ($titolo=='Nuovo'): ?>active<?php endif; ?>" href="<?= (Base::instance()->alias('nuovo')) ?>">
            <span data-feather="file"></span>
            Nuovo 
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if ($titolo=='Lista'): ?>active<?php endif; ?>" href="<?= (Base::instance()->alias('lista')) ?>">
            <span data-feather="layers"></span>
            Lista
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if ($titolo=='Report'): ?>active<?php endif; ?>" href="<?= (Base::instance()->alias('report')) ?>">
            <span data-feather="bar-chart-2"></span>
            Report
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if ($titolo=='Data'): ?>active<?php endif; ?>" href="<?= (Base::instance()->alias('data')) ?>">
            <span data-feather="bar-chart-2"></span>
            Data
          </a>
        </li>
        
      </ul>
    </div>
  </nav>