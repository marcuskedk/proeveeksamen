<aside>
    <div class="list-group rounded-1">
        <li class="list-group-item list-group-item-danger"><h5 class="mb-0 fw-bold">Kundeside</h5></li>
        <a href="./?page=dashboard" class="list-group-item list-group-item-action">Dashboard</a>
        <a href="./?page=account" class="list-group-item list-group-item-action">Min konto</a>
    </div>
    <div class="list-group rounded-1 mt-3">
        <li class="list-group-item list-group-item-danger"><h5 class="mb-0 fw-bold">Administrere</h5></li>
        <a href="./?page=manage-settings" data-url="./?page=manage-settings&id=<?=(isset($_GET['id'])) ? $_GET['id'] : '';?>" class="list-group-item list-group-item-action">Indstillinger</a>
        <a href="./?page=manage-abouts" data-url="./?page=manage-abouts&id=<?=(isset($_GET['id'])) ? $_GET['id'] : '';?>" class="list-group-item list-group-item-action">Om os</a>
        <a href="./?page=manage-travels" data-url="./?page=manage-travels&id=<?=(isset($_GET['id'])) ? $_GET['id'] : '';?>" class="list-group-item list-group-item-action">Rejsemål</a>
        <a href="./?page=manage-contacts" data-url="./?page=manage-contacts&id=<?=(isset($_GET['id'])) ? $_GET['id'] : '';?>" class="list-group-item list-group-item-action">Kontakt oplysninger</a>
        <a href="./?page=manage-accounts" data-url="./?page=manage-accounts&id=<?=(isset($_GET['id'])) ? $_GET['id'] : '';?>" class="list-group-item list-group-item-action">Kontoer</a>
    </div>
</aside>