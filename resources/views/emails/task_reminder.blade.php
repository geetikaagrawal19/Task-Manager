<h2>⏰ Task Reminder</h2>
<p>Hi! Just a quick reminder that this task is due <strong>tomorrow</strong>:</p>

<ul>
    <li><strong>Title:</strong> {{ $task->title }}</li>
    <li><strong>Due Date:</strong> {{ $task->due_date }}</li>
    <li><strong>Status:</strong> {{ ucfirst($task->status) }}</li>
</ul>

<p>Please complete it before the due date. ✅</p>
<p>~ Laravel Task Manager</p>
