<div class="w-full">
    <ul class="flex lg:flex-col text-lg text-gray-900 suzuki-bold divide-x lg:divide-x-0 lg:divide-y divide-gray-400">
        <li class="w-full">
            <a href="{{route('form.getbroucher')}}" {{ request()->route()->getName() === 'form.getbroucher' ? ' class=text-theme-red-500' : '' }}>
                <span class="hover:text-theme-red-500 block p-4">
                    Get A Broucher
                </span>
            </a>
        </li>
        <li class="w-full">
            <a href="{{route('form.getquote')}}" {{ request()->route()->getName() === 'form.getquote' ? ' class=text-theme-red-500' : '' }}>
                <span class="hover:text-theme-red-500 block p-4">
                    Get A Quote
                </span>
            </a>
        </li>
        <li class="w-full">
            <a href="{{route('form.testdrive')}}" {{ request()->route()->getName() === 'form.testdrive' ? ' class=text-theme-red-500' : '' }}>
                <span class="hover:text-theme-red-500 block p-4">
                    Book a test drive
                </span>
            </a>
        </li>
        <li class="w-full">
            <a href="{{route('form.bookservice')}}" {{ request()->route()->getName() === 'form.bookservice' ? ' class=text-theme-red-500' : '' }}>
                <span class="hover:text-theme-red-500 block p-4">
                    Book Service
                </span>
            </a>
        </li>
        <li class="w-full">
            <a href="{{route('form.requestquoteaccessories')}}" {{ request()->route()->getName() === 'form.requestquoteaccessories' ? ' class=text-theme-red-500' : '' }}>
                <span class="hover:text-theme-red-500 block p-4">
                    Request A Quote (Accessories)
                </span>
            </a>
        </li>
        <li class="w-full">
            <a href="{{route('form.ourcommitment')}}" {{ request()->route()->getName() === 'form.ourcommitment' ? ' class=text-theme-red-500' : '' }}>
                <span class="hover:text-theme-red-500 block p-4">
                    Our Commitment
                </span>
            </a>
        </li>

    </ul>
</div>
