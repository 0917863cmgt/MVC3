<div class="row">
    <div class="col">
        <nav class="dropdown-select" tabindex=0>
            <ul tabindex=0>
                <li tabindex=0 aria-haspopup="true">{{isset($parent) ? $parent : "Parent"}}
                    <ul tabindex=0 aria-label="submenu">
                        <li tabindex=0>
                            <a class="n-t-d" href="/categories/?parent=1&{{http_build_query(request()->only('search'))}}">Protein</a>
                        </li>
                        <li tabindex=0>
                            <a class="n-t-d" href="/categories/?parent=2&{{http_build_query(request()->only('search'))}}">Vegetables</a>
                        </li>
                        <li tabindex=0>
                            <a class="n-t-d" href="/categories/?parent=3&{{http_build_query(request()->only('search'))}}">Cuisine</a>
                        </li>
                        <li tabindex=0>
                            <a class="n-t-d" href="/categories/?parent=4&{{http_build_query(request()->only('search'))}}">Course</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>
