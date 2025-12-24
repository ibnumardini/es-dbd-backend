<x-filament-widgets::widget>
    <x-filament::section>
        <div class="flex items-center gap-x-3">
            <div class="flex-1">
                <h2 class="grid flex-1 text-base font-semibold leading-6 text-gray-950 dark:text-white">
                    Welcome, {{ filament()->getUserName(auth()->user()) }}
                </h2>

                <p class="text-sm text-gray-500 dark:text-gray-400" x-data="{ 
                    currentDateTime: '',
                    days: ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
                    months: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                    updateTime() {
                        const now = new Date();
                        const dayName = this.days[now.getDay()];
                        const date = now.getDate();
                        const monthName = this.months[now.getMonth()];
                        const year = now.getFullYear();
                        const hours = String(now.getHours()).padStart(2, '0');
                        const minutes = String(now.getMinutes()).padStart(2, '0');
                        const seconds = String(now.getSeconds()).padStart(2, '0');
                        this.currentDateTime = `${dayName}, ${date} ${monthName} ${year} ${hours}:${minutes}:${seconds}`;
                    }
                }" x-init="updateTime(); setInterval(() => updateTime(), 1000)">
                    <span x-text="currentDateTime"></span>
                </p>
            </div>
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
