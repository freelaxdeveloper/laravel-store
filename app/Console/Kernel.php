<?php
/**
->cron('* * * * * *');	Запускать задачу по пользовательскому расписанию
->everyMinute();	Запускать задачу каждую минуту
->everyFiveMinutes();	Запускать задачу каждые 5 минут
->everyTenMinutes();	Запускать задачу каждые 10 минут
->everyThirtyMinutes();	Запускать задачу каждые 30 минут
->hourly();	Запускать задачу каждый час
->hourlyAt(17);	Запускать задачу каждый час в хх:17 минут (для версии 5.3 и выше)
->daily();	Запускать задачу каждый день в полночь
->dailyAt('13:00');	Запускать задачу каждый день в 13:00
->twiceDaily(1, 13);	Запускать задачу каждый день в 1:00 и 13:00
->weekly();	Запускать задачу каждую неделю
->monthly();	Запускать задачу каждый месяц
->monthlyOn(4, '15:00');	Запускать задачу 4 числа каждого месяца в 15:00 (для версии 5.2 и выше)
->quarterly();	Запускать задачу каждые 3 месяца (для версии 5.2 и выше)
->yearly();	Запускать задачу каждый год
->timezone('America/New_York');	Задать часовой пояс (для версии 5.2 и выше)
 */
namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('ImageResize')->everyMinute();
        $schedule->command('UploadAlbumInstagram')->everyTenMinutes();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
