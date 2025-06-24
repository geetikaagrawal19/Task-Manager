<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Task;
use App\Mail\TaskReminderMail;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class SendTaskReminders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tasks:send-reminders';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email reminders for pending tasks due tomorrow';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $tomorrow = Carbon::tomorrow()->toDateString();

        $tasks = Task::where('due_date', $tomorrow)
                     ->where('status', 'pending')
                     ->get();

        foreach ($tasks as $task) {
            // Send to your email for now (you can make this dynamic later)
            Mail::to('geetagrawal1902@gmail.com')->send(new TaskReminderMail($task));
        }

        $this->info('Reminders sent for tasks due on ' . $tomorrow);
    }
}
