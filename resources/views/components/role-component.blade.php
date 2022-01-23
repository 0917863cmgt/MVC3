<div class="row">
    <div class="col">
        <nav class="dropdown-select" tabindex=0>
            <ul tabindex=0>
                <li tabindex=0 aria-haspopup="true">{{isset($role) ? $role : "User Role"}}
                    <ul tabindex=0 aria-label="submenu">
                        <li tabindex=0>
                            <a class="n-t-d" href="/admin/users/?role=1&{{http_build_query(request()->except('role', 'page'))}}">Admin</a>
                        </li>
                        <li tabindex=0>
                            <a class="n-t-d" href="/admin/users/?role=2&{{http_build_query(request()->except('role', 'page'))}}">Moderator</a>
                        </li>
                        <li tabindex=0>
                            <a class="n-t-d" href="/admin/users/?role=3&{{http_build_query(request()->except('role', 'page'))}}">Normal User</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>
