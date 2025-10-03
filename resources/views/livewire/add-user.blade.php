<x-layouts.app :title="__('Dashboard')">
      <div class=" w-full flex items-center justify-around">
            <div class="">
               <h1>Hello Admin</h1>
            </div>

            <div class="flex items-center justify-center ">
                <flux:button
                  href="/registerUser"
                  icon:trailing="plus"
                  >
                  Add user
                  </flux:button>
            </div>
      </div>
</x-layouts.app>
