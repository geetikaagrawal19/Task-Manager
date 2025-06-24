<?php
protected function schedule(Schedule $schedule)
{
    $schedule->command('tasks:send-reminders')->dailyAt('13:00');
}
