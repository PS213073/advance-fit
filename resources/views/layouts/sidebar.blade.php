<div :class="sidebarOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'"
     class="flex flex-col fixed z-30 inset-y-0 left-0 w-60 transition duration-300 transform bg-[#221551] overflow-y-auto lg:translate-x-0 lg:static lg:inset-0 items-center py-6 scrollbar-thin scrollbar-thumb-sky-700">
    <div class="sidebar__profiel">
        <a href="{{ route('admin.dashboard') }}">
            <span class="text-white text-2xl mx-2 font-semibold">Dashboard</span>
        </a>
        <a href="#" class="sidebar__close text-white">
            <i class="bi bi-x-lg"></i>
        </a>
    </div>
    <ul class="flex flex-col mt-0 px-0 pt-7">
        <a class="flex items-center mt-4 py-2 pr-6 text-white hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100 {{ Route::currentRouteNamed('admin.dashboard') ? 'active' : '' }} "
           href="{{ route('admin.dashboard') }}">
            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path>
            </svg>

            <span class="mx-3">Dashboard</span>
        </a>

        @canany(['View employee', 'Create employee', 'Edit employee', 'Delete employee'])
            <li class="pt-6 text-[#A6ADBB]">
                <p>MANAGE EMPLOYEES</p>
            </li>
            <a class="flex items-center mt-4 py-2 pr-6 text-white hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100 {{ Route::currentRouteNamed('admin.users.index') ? 'active' : '' }}"
               href="{{ route('admin.users.index') }}">
                <span class="inline-flex justify-center items-center">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                         xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </span>

                <span class="mx-3">Employees</span>
            </a>
        @endcanany
        @canany(['View role', 'Create role', 'Edit role', 'Delete role'])
            <a class="flex items-center mt-4 py-2 pr-6 text-white hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100 {{ Route::currentRouteNamed('admin.roles.index') ? 'active' : '' }}"
               href="{{ route('admin.roles.index') }}">
                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M17 14v6m-3-3h6M6 10h2a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2zm10 0h2a2 2 0 002-2V6a2 2 0 00-2-2h-2a2 2 0 00-2 2v2a2 2 0 002 2zM6 20h2a2 2 0 002-2v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2z">
                    </path>
                </svg>
                <span class="mx-3">Roles</span>
            </a>
        @endcanany
        @canany(['View permission'])
            <a class="flex items-center mt-4 py-2 pr-6 text-white hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100 {{ Route::currentRouteNamed('admin.permissions.index') ? 'active' : '' }}"
               href="{{ route('admin.permissions.index') }}">
                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                    <path fill="none" d="M0 0h24v24H0z"></path>
                    <path
                        d="M10.7577 11.8281L18.6066 3.97919L20.0208 5.3934L18.6066 6.80761L21.0815 9.28249L19.6673 10.6967L17.1924 8.22183L15.7782 9.63604L17.8995 11.7574L16.4853 13.1716L14.364 11.0503L12.1719 13.2423C13.4581 15.1837 13.246 17.8251 11.5355 19.5355C9.58291 21.4882 6.41709 21.4882 4.46447 19.5355C2.51184 17.5829 2.51184 14.4171 4.46447 12.4645C6.17493 10.754 8.81633 10.5419 10.7577 11.8281ZM10.1213 18.1213C11.2929 16.9497 11.2929 15.0503 10.1213 13.8787C8.94975 12.7071 7.05025 12.7071 5.87868 13.8787C4.70711 15.0503 4.70711 16.9497 5.87868 18.1213C7.05025 19.2929 8.94975 19.2929 10.1213 18.1213Z">
                    </path>
                </svg>

                <span class="mx-3">Permissions</span>
            </a>
        @endcanany
        @canany(['View location', 'Create location', 'Edit location', 'Delete location'])
            <a class="flex items-center mt-4 py-2 pr-6 text-white hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100 {{ Route::currentRouteNamed('admin.locations.index') ? 'active' : '' }}"
               href="{{ route('admin.locations.index') }}">
                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 2a8 8 0 018 8c0 4.418-7 12-8 12s-8-7.582-8-12a8 8 0 018-8zM12 10a2 2 0 110-4 2 2 0 010 4z"/>
                </svg>

                <span class="mx-3">Locations</span>
            </a>
        @endcanany
        @canany(['View exercise', 'Create exercise', 'Edit exercise', 'Delete exercise'])
            <a class="flex items-center mt-4 py-2 pr-6 text-white hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100 {{ Route::currentRouteNamed('admin.exercises.index') ? 'active' : '' }}"
               href="{{ route('admin.exercises.index') }}">
                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M18 8a2 2 0 100-4 2 2 0 000 4zm0 2a2 2 0 100 4 2 2 0 000-4zM6 4a2 2 0 100 4 2 2 0 000-4zm0 10a2 2 0 100 4 2 2 0 000-4zm2-6a2 2 0 11-4 0 2 2 0 014 0zm0 10a2 2 0 11-4 0 2 2 0 014 0zm6-4a2 2 0 11-4 0 2 2 0 014 0zm2-2a2 2 0 11-4 0 2 2 0 014 0zm4-4a2 2 0 11-4 0 2 2 0 014 0zm0 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                </svg>


                <span class="mx-3">exercises</span>
            </a>
        @endcanany
        @canany(['View muscle group', 'Create muscle group', 'Edit muscle group', 'Delete muscle group'])
            <a class="flex items-center mt-4 py-2 pr-6 text-white hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100 {{ Route::currentRouteNamed('admin.muscle_groups.index') ? 'active' : '' }}"
               href="{{ route('admin.muscleGroups.index') }}">
                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M14 9a4 4 0 00-8 0 4 4 0 004 4 4 4 0 014 4h2a4 4 0 004-4v-2a4 4 0 00-4-4h-2zm2 2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2v-6zm-8 8a2 2 0 01-2-2v-6h2v6a2 2 0 002 2H8z"/>
                </svg>


                <span class="mx-3">Muscle Groups</span>
            </a>
        @endcanany
        @canany(['View shift'])
            <a class="flex items-center mt-4 py-2 pr-6 text-white hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100 {{ Route::currentRouteNamed('admin.shifts.index') ? 'active' : '' }}"
               href="{{ route('admin.shifts.index') }}">
                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                    <path fill="none" d="M0 0h24v24H0z"></path>
                    <path
                        d="M9 1V3H15V1H17V3H21C21.5523 3 22 3.44772 22 4V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3H7V1H9ZM20 11H4V19H20V11ZM8 14V16H6V14H8ZM18 14V16H10V14H18ZM7 5H4V9H20V5H17V7H15V5H9V7H7V5Z">
                    </path>
                </svg>
                <span class="mx-3">Shifts</span>
            </a>
        @endcanany

        @canany(['View subscription', 'Create subscription', 'Edit subscription', 'Delete subscription'])
            <li class="pt-6">
                <a class="nav-link text-[#A6ADBB]">
                    <i class="bi bi-window-sidebar nav-icon me-2"></i>
                    <p>Subscriptions</p>
                </a>
            </li>
            <a class="flex items-center mt-4 py-2 pr-6 text-white hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100 {{ Route::currentRouteNamed('admin.subscriptions.index') ? 'active' : '' }}"
               href="{{ route('admin.subscriptions.index') }}">
                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                    <path fill="none" d="M0 0h24v24H0z"></path>
                    <path
                        d="M5 2v2H3v2h18V4h-2V2h-4V0H9v2H5zm14 4v2H5V6h14zm-2 4v2H7v-2h10zm-2 4v2H7v-2h8zm-2 4v2H7v-2h6z">
                    </path>
                </svg>
                <span class="mx-3">Subscriptions</span>
            </a>
        @endcanany
        @canany(['View client', 'Create client', 'Edit client', 'Delete client'])
            <li class="pt-6">
                <a class="nav-link text-[#A6ADBB]">
                    <i class="bi bi-window-sidebar nav-icon me-2"></i>
                    <p>Clients</p>
                </a>
            </li>
            <a class="flex items-center mt-4 py-2 pr-6 text-white hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100 {{ Route::currentRouteNamed('admin.permissions.index') ? 'active' : '' }}"
               href="{{ route('admin.clients.index') }}">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                     xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
                <span class="mx-3">Clients</span>
            </a>
        @endcanany
        @canany(['View checkin'])
            <a class="flex items-center mt-4 py-2 pr-6 text-white hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100 {{ Route::currentRouteNamed('admin.checkins.index') ? 'active' : '' }}"
               href="{{ route('admin.checkins.index') }}">
                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>

                <span class="mx-3">Check-ins</span>
            </a>
        @endcanany
    </ul>
</div>
