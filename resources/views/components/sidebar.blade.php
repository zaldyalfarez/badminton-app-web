<div class="h-full flex flex-col px-6 py-4 border-r border-gray-200 bg-white">
    <div class="flex h-16 items-center">
        {{-- <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="Badminton App"> --}}
        <span class="text-xl font-semibold text-black">Badminton App</span>
    </div>

    <nav class="flex flex-1 flex-col mt-4">
        <ul class="flex flex-1 flex-col justify-between">
            <li>
                <ul class="-mx-2 space-y-1">
                    <li>
                        <a href="/dashboard"
                            class="group flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6 {{ $title === 'Dashboard' ? 'bg-indigo-50 text-indigo-600' : 'hover:bg-gray-50 text-gray-700' }}">
                            <svg class="h-6 w-6 shrink-0 text-gray-400" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                            </svg>
                            Dashboard
                        </a>
                    </li>

                    {{-- Dropdown: Coach --}}
                    <li x-data="{ open: false }">
                        <button type="button" @click="open = !open"
                            class="flex w-full items-center gap-x-3 rounded-md p-2 text-left text-sm font-semibold leading-6 {{ $title === 'Manage Coach' ? 'bg-indigo-50 text-indigo-600' : 'text-gray-700 hover:bg-gray-50' }}">
                            <svg class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 14.25l8.954-4.477a.75.75 0 000-1.346L12 3 3.046 8.427a.75.75 0 000 1.346L12 14.25zm0 0v6m0-6L5.25 10.5m13.5 0L12 14.25" />
                            </svg>
                            Coach
                            <svg :class="{ 'rotate-90': open }"
                                class="ml-auto h-5 w-5 shrink-0 text-gray-400 transition-transform" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                        <ul class="mt-1 px-2 space-y-1" x-show="open" x-transition>
                            <li>
                                <a href="/dashboard/coach"
                                    class="block rounded-md py-2 pl-9 pr-2 text-sm text-gray-700 hover:bg-gray-50">Coach
                                    List
                                </a>
                            </li>
                            <li>
                                <a href="/dashboard/coach/create"
                                    class="block rounded-md py-2 pl-9 pr-2 text-sm text-gray-700 hover:bg-gray-50">Add
                                    Coach
                                </a>
                            </li>
                        </ul>
                    </li>

                    {{-- Dropdown: Exam --}}
                    <li x-data="{ open: false }">
                        <button type="button" @click="open = !open"
                            class="flex w-full items-center gap-x-3 rounded-md p-2 text-left text-sm font-semibold leading-6 {{ $title === 'Manage Exam' ? 'bg-indigo-50 text-indigo-600' : 'text-gray-700 hover:bg-gray-50' }}">
                            <svg class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12h6m-6 4h6m2 4.5H7A1.5 1.5 0 015.5 19V5A1.5 1.5 0 017 3.5h10A1.5 1.5 0 0118.5 5v14A1.5 1.5 0 0117 21.5z" />
                            </svg>
                            Exam
                            <svg :class="{ 'rotate-90': open }"
                                class="ml-auto h-5 w-5 shrink-0 text-gray-400 transition-transform" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                        <ul class="mt-1 px-2 space-y-1" x-show="open" x-transition>
                            <li>
                                <a href="/dashboard/exam"
                                    class="block rounded-md py-2 pl-9 pr-2 text-sm text-gray-700 hover:bg-gray-50">Exam
                                    List
                                </a>
                            </li>
                            <li>
                                <a href="/dashboard/exam/create"
                                    class="block rounded-md py-2 pl-9 pr-2 text-sm text-gray-700 hover:bg-gray-50">Add
                                    Exam
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="/dashboard/question"
                            class="group flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6 {{ $title === 'Manage Question' ? 'bg-indigo-50 text-indigo-600' : 'hover:bg-gray-50 text-gray-700' }}">
                            <svg class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16.862 3.487a2.25 2.25 0 113.182 3.182L10.5 16.212 6.75 17.25l1.038-3.75 9.074-9.074z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19.5 12v6.75A2.25 2.25 0 0117.25 21H6.75A2.25 2.25 0 014.5 18.75V8.25A2.25 2.25 0 016.75 6h6.75" />
                            </svg>
                            Manage Question
                        </a>
                    </li>

                    {{-- Dropdown: Practice --}}
                    <li x-data="{ open: false }">
                        <button type="button" @click="open = !open"
                            class="flex w-full items-center gap-x-3 rounded-md p-2 text-left text-sm font-semibold leading-6 {{ $title === 'Manage Practice' ? 'bg-indigo-50 text-indigo-600' : 'text-gray-700 hover:bg-gray-50' }}">
                            <svg class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 6.75c-1.84-1.102-4.143-1.5-6.75-1.5v13.5c2.607 0 4.91.398 6.75 1.5M12 6.75c1.84-1.102 4.143-1.5 6.75-1.5v13.5c-2.607 0-4.91.398-6.75 1.5M12 6.75v13.5" />
                            </svg>
                            Practice
                            <svg :class="{ 'rotate-90': open }"
                                class="ml-auto h-5 w-5 shrink-0 text-gray-400 transition-transform" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                        <ul class="mt-1 px-2 space-y-1" x-show="open" x-transition>
                            <li>
                                <a href="/dashboard/practice"
                                    class="block rounded-md py-2 pl-9 pr-2 text-sm text-gray-700 hover:bg-gray-50">Practice
                                    List
                                </a>
                            </li>
                            <li>
                                <a href="/dashboard/practice/create"
                                    class="block rounded-md py-2 pl-9 pr-2 text-sm text-gray-700 hover:bg-gray-50">Add
                                    Practice
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="/dashboard/user"
                            class="group flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6 {{ $title === 'User List' ? 'bg-indigo-50 text-indigo-600' : 'hover:bg-gray-50 text-gray-700' }}">
                            <svg class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003
        c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375
        6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0
        2.625 2.625 0 015.25 0z" />
                            </svg>
                            User List
                        </a>
                    </li>
                </ul>
            </li>

            {{-- Bottom button --}}
            <li class="mt-auto -mx-6">
                <form method="POST" action="/logout">
                    @csrf
                    <button type="submit"
                        class="w-full flex items-center gap-x-4 px-6 py-3 text-sm font-semibold text-red-600 hover:bg-red-50">
                        <svg class="h-6 w-6 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3H6.75A2.25
                    2.25 0 004.5 5.25v13.5A2.25 2.25 0
                    006.75 21h6.75a2.25 2.25 0
                    002.25-2.25V15M18 15l3-3m0
                    0l-3-3m3 3H9" />
                        </svg>
                        <span>Logout</span>
                    </button>
                </form>
            </li>
        </ul>
    </nav>
</div>
