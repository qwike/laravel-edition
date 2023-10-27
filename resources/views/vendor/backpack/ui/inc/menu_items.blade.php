{{-- This file is used for menu items by any Backpack v6 theme --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<x-backpack::menu-item title="Экскурсии" icon="la la-route" :link="backpack_url('excursion')" />
<x-backpack::menu-item title="Развлечения" icon="la la-smile" :link="backpack_url('entertainment')" />
<x-backpack::menu-item title="Продукты" icon="la la-shopping-cart" :link="backpack_url('product')" />
<x-backpack::menu-item title="Адреса" icon="la la-map-marker-alt" :link="backpack_url('address')" />
<x-backpack::menu-item title='Logs' icon='la la-terminal' :link="backpack_url('log')" />
