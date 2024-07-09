<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url() ?>">
    <div class="sidebar-brand-icon">
        <i class="fas fa-users"></i>
    </div>
    <!-- <div class="sidebar-brand-text mx-3">ERP</div> -->
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item">
    <a class="nav-link" href="<?= base_url() ?>">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dasbor</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Master Data
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item <?= ($menu === 'setup' ? 'active' : '' ); ?>">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSetup"
        aria-expanded="true" aria-controls="collapseSetup">
        <i class="fas fa-fw fa-newspaper"></i>
        <span>Setup</span>
    </a>
    <div id="collapseSetup" class="collapse <?= ($menu === 'setup' ? 'show' : '' ); ?>" aria-labelledby="headingSetup" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item <?= ($submenu === 'countries' ? 'active' : '' ); ?>" href="<?= base_url() ?>countries/index">Countries</a>
            <a class="collapse-item <?= ($submenu === 'states' ? 'active' : '' ); ?>" href="<?= base_url() ?>states/index">States</a>
            <a class="collapse-item <?= ($submenu === 'cities' ? 'active' : '' ); ?>" href="<?= base_url() ?>cities/index">Cities</a>
            <hr style="margin-top: .5rem; margin-bottom: .5rem;"/>
            <a class="collapse-item <?= ($submenu === 'company' ? 'active' : '' ); ?>" href="<?= base_url() ?>company/index">Company Master</a>
            <a class="collapse-item <?= ($submenu === 'site' ? 'active' : '' ); ?>" href="<?= base_url() ?>site/index">Site Master</a>
            <a class="collapse-item <?= ($submenu === 'dept' ? 'active' : '' ); ?>" href="<?= base_url() ?>department/index">Department Master</a>
            <a class="collapse-item <?= ($submenu === 'whs' ? 'active' : '' ); ?>" href="<?= base_url() ?>warehouse/index">Warehouse Master</a>
            <a class="collapse-item <?= ($submenu === 'loc' ? 'active' : '' ); ?>" href="<?= base_url() ?>location/index">Location Master</a>
        </div>
    </div>
</li>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item <?= ($menu === 'item' ? 'active' : '' ); ?>">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseItem"
        aria-expanded="true" aria-controls="collapseItem">
        <i class="fas fa-fw fa-newspaper"></i>
        <span>Item Master</span>
    </a>
    <div id="collapseItem" class="collapse <?= ($menu === 'item' ? 'show' : '' ); ?>" aria-labelledby="headingItem" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item <?= ($submenu === 'uom' ? 'active' : '' ); ?>" href="<?= base_url() ?>uom/index">UOM</a>
            <!-- <a class="collapse-item <?= ($submenu === 'states' ? 'active' : '' ); ?>" href="<?= base_url() ?>states/index">States</a>
            <a class="collapse-item <?= ($submenu === 'cities' ? 'active' : '' ); ?>" href="<?= base_url() ?>cities/index">Cities</a> -->
        </div>
    </div>
</li>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item <?= ($menu === 'utility' ? 'active' : '' ); ?>">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtility"
        aria-expanded="true" aria-controls="collapseUtility">
        <i class="fas fa-fw fa-newspaper"></i>
        <span>Utility</span>
    </a>
    <div id="collapseUtility" class="collapse <?= ($submenu === 'users' ? 'show' : '' ); ?>" aria-labelledby="heading2" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item active" href="<?= base_url() ?>users/index">Users</a>
        </div>
    </div>
</li>

<!-- <li class="nav-item <?= ($menu === 'utility' ? 'active' : '' ); ?>">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse3"
        aria-expanded="true" aria-controls="collapse3">
        <i class="fas fa-fw fa-newspaper"></i>
        <span>Utility</span>
    </a>
    <div id="collapse3" class="collapse <?= ($submenu === 'users' ? 'show' : '' ); ?>" aria-labelledby="heading3" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item active" href="<?= base_url() ?>users/index">Users</a>
        </div>
    </div>
</li> -->

<!-- <li class="nav-item active">
    <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
        aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Components</span>
    </a>
    <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Components:</h6>
            <a class="collapse-item active" href="buttons.html">Buttons</a>
            <a class="collapse-item" href="cards.html">Cards</a>
        </div>
    </div>
</li> -->

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->