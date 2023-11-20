{{-- This file is used for menu items by any Backpack v6 theme --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<x-backpack::menu-item title="Экскурсии" icon="la la-route" :link="backpack_url('excursion')" />
<x-backpack::menu-item title="Мероприятия" icon="la la-birthday-cake" :link="backpack_url('event')" />
<x-backpack::menu-item title="Кафе" icon="la la-coffee" :link="backpack_url('cafe-event')" />
<x-backpack::menu-item title="Гостевые домики" icon="la la-home" :link="backpack_url('house')" />
<x-backpack::menu-item title="Развлечения" icon="la la-smile" :link="backpack_url('entertainment')" />
<x-backpack::menu-item title="Продукты" icon="la la-shopping-cart" :link="backpack_url('product')" />
<x-backpack::menu-item title="Адреса" icon="la la-map-marker-alt" :link="backpack_url('address')" />
<x-backpack::menu-item title="Проекты" icon="la la-dollar-sign" :link="backpack_url('project')" />
<x-backpack::menu-item title="Заявки" icon="la la-wpforms" :link="backpack_url('order')" />
<x-backpack::menu-item title='Logs' icon='la la-terminal' :link="backpack_url('log')" />
