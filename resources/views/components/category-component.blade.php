<div class="row">
    @foreach($parentCategories as $parent)
        <div class="col">
            <nav class="dropdown-select" tabindex=0>
                <ul tabindex=0>
                    <li tabindex=0 aria-haspopup="true">{{isset($category) ? $category->name : $parent->name}}
                        <ul tabindex=0 aria-label="submenu">
                            <x-category-li :children="$childrenCategories" :parent="$parent"></x-category-li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    @endforeach
</div>
